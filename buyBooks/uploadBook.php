<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once 'include/config.php';
    include ('include/authorization.php');
    include ('include/uploadDatabase.php');
    
    if(!isset($_SESSION['fname']))
        header('Location: login.php');
   
    
        
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Book Upload
        </title>
         <link rel="stylesheet" href="styles/styles.css" >
        <link rel="stylesheet" href="styles/welcomeBook_kart.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       
    </head>
    <style>
        h1 {
             margin-left: 200px;
        }
        
/*        .upload{
            margin-left: 200px;
        }*/
    </style>
    
    <body>
        
        <button type="submit" class="logout" onclick="location.href='include/logout.php'" >Logout</button>
        <button type="submit" class="cart" onclick="location.href='welcomeBook_kart.php'"> Show Books</button>
        
        <h1 align='center' ><strong>Welcome Admin, <b id="admin"> <?php echo ucfirst($_SESSION['fname']);?></strong></b> </h1>
        <br> 
        
        <div class="col-sm-2"></div>
        <form method="POST" action="#" enctype="multipart/form-data">
            
       
        
            <div class="container col-sm-8">
                
                <div align="center"><strong><span class="error"><?php echo $uploadSuccess;?></span></strong></div><br>
               <div align="center"><strong><span class="error"><?php echo $er;?></span></strong></div><br>
               <input type="file" name="image" accept="image/jpeg" ><br>
               
              <label>Book Title</label> <br>
              <input type="text" placeholder="Book Title" name="title" ><br>
              
              
              <label>Discription </label><br>
              <input type="text" placeholder=" Discription " name="discription" ><br>
             
              
              <label>Price</label> <br>
              <input type="number" placeholder="Price" name="price" >
              <br>
              <br>
              
              
              <button type="submit" name="submit_image" class="upload" >Upload</button>
            </div>
        </form>      
    </body>
</html>