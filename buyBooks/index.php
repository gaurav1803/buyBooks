<?php     
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include ('include/authorization.php');
    include ('include/indexDB.php');
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
             Book Kart Sign Up 
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <link rel="stylesheet" href="styles/styles.css">
    </head> 
    
    <body>
         <div class="col-sm-3"></div>
         <form action= "#" method="post">
            <div class="container col-sm-6">
              <h2 align="center"><b>Sign Up in Book Kart <b></h2>
              
              <label><b>First Name</b></label> 
              <input type="text" placeholder="Enter First Name" name="fname" >
              <span class="error">  <?php echo $fnameErr;?></span><br>
              
              <label><b>Last Name</b></label>
              <input type="text" placeholder="Enter Last Name" name="lname" >
              <span class="error"> <?php echo $lnameErr;?></span><br>
              
              <label><b>User Name</b></label> <span class="error"><?php echo $choose;?></span>
              <input type="text" placeholder="Enter User Name" name="uname" >
              <span class="error"><?php echo $unameErr;?></span><br>
              
              <label><b>Email</b></label><span class="error"><?php echo $choos;?></span>
              <input type="text" placeholder="Enter Email" name="email" >
              <span class="error"><?php echo $emailErr;?></span><br>
              
              <label><b>Date of Birth</b></label>
              <input type="Date" name="dob" > 
              <span class="error"> <?php echo $dobErr;?></span><br>
               
              <label><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" >
              <span class="error"><?php echo $passErr;?></span><br>

              <label><b>Repeat Password</b></label>
              <input type="password" placeholder="Confirm Password" name="cpsw" ><br>
              <span class="error"> <?php echo $matchErr;?></span>
               
              <!--<input type="checkbox" checked="checked"> Remember me-->
              
              <div class="clearfix">
                   <button type="button"  class="loginbtn" onclick="window.location.href='login.php'">Log In</button>
                <button type="submit" class="signupbtn">Sign Up</button>
              </div>
            </div>
        </form>
         
    </body>
    
</html>
    



