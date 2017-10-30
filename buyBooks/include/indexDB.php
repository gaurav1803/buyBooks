<?php
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once 'config.php';
    
    $fnameErr= $lnameErr=$unameErr=$emailErr=$dobErr=$passErr= $matchErr=$choose=$choos="";
    $haveError = false;
  
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      
       $fname=$_POST["fname"];
       $lname=$_POST["lname"];
       $uname=$_POST["uname"];
       $email=$_POST["email"];
       $dob=$_POST["dob"];
       $pass=  md5($_POST["psw"]);
       
       
        if (empty($_POST["fname"]))
        {
            $fnameErr="* First Name is Required.";
            $haveError = true;
        }
        else {
            $fname = test_input($_POST["fname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
              $fnameErr = "Only letters and white space allowed."; 
              $haveError = true;
            }
        }
        
        if (empty($_POST["lname"]))
        {
            $lnameErr="* Last Name is Required.";
            $haveError = true;
        }
        
        if (empty($_POST["uname"]))
        {
            $unameErr="* User Name is Required.";
            $haveError = true;
        }
        
        if (empty($_POST["email"]))
        {
            $emailErr="* Email is Required.";
            $haveError = true;
        }
        else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format."; 
              $haveError = true;
            }
        }
        
        if (empty($_POST["dob"]))
        {  
            $dobErr="* Date of Birth is Required.";
            $haveError = true;
        }
        
        if (empty($_POST["psw"]))
        {
            $passErr="* Password is Required.";
            $haveError = true;
        }
        
        if($_POST["psw"]!=$_POST["cpsw"])
        {
            $matchErr="Password didn't match.";
            $haveError = true;
        }
        
        // Date of Birth check;
       $dobInserted= strtotime($dob);
       $currentTime=  time();
       
       if($dobInserted>$currentTime){
            $dobErr="Enter valid Date of Birth.";
            $haveError = true;
       }
       

       if(!$haveError) {
           
           
            $sql="INSERT INTO users (fname,lname, uname, email, dob, pass) VALUES('$fname', '$lname', '$uname', '$email', '$dob', '$pass')";

                 // CHECK USER NAME UNIQE OR NOT AND EMAIL AS WELL AS//
            $check="SELECT * FROM users where uname='$uname' or email='$email'";
            
            $result= mysqli_query($con, $check);

       
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
           
                if($row["uname"]==$uname)
                    $choose= "Choose another User Name.";

                else
                    $choos="  Email already registered.";
               
            }
        
            //INSERT DATA INTO DATABASE FROM SIGN UP FORM//
            
            elseif(mysqli_query($con, $sql))
                header("Location:login.php");
            else
                echo"Error ".$sql. "<br>" . mysqli_error ($con); 
        }
    }
    
    
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    mysqli_close($con);


?>

