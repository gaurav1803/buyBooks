<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include ('include/loginCheck.php');
    include ('include/authorization.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Login
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    
    <body>
          <div class="col-sm-3"></div>
          <form action= "#" method="post">
            <div class="container col-sm-6">
              <h2 align="center"><b>Log In to Book Kart <b></h2>
              
              <span class="error"><?php echo $fieldsErr;?></span><br>
              
              <label><b>User Name</b></label> 
              <input type="text" placeholder="Enter User Name" name="uname" >
           
              <span class="error"><?php echo $passErr;?></span><br>
              <label><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" >
            

              <!--<input type="checkbox" checked="checked"> Remember me-->
              

               <div class="clearfix">
                    <button type="submit"  class="loginbtn" >Log In</button>
                    <button type="button" class="signupbtn" onclick="location.href='index.php'">Sign Up</button>
              </div>
              
            </div>
        </form>
         
    </body>
</html>

