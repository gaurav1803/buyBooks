<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';
$uploadSuccess=$er="";
$haveError=FALSE;
if (isset($_POST['submit_image'])) {
    if (isset($_FILES["file"]["error"])>0) {

        $er = "ERROR Return Code: " . $_FILES["image"]["error"] ." Please choose an image. <br />";
        $haveError= TRUE;
    } else {

        $name = $_FILES["image"]["name"];    //line 26
        $type = $_FILES["image"]["type"];    //line 27
        $size = $_FILES["image"]["size"]; //line 28
        $tmp = $_FILES["image"]["tmp_name"]; //line 29
        $path = "images";
    }
    if(!$haveError){
        $title = $_POST['title'];
        $discription = $_POST['discription'];
        $price = $_POST['price'];

            if (move_uploaded_file($tmp, "images/" . $name)) {
               $mysql_path = $path . "/" . $name;

               $sql = "INSERT INTO books(title, discription, price, image_name, image_path) VALUES('$title', '$discription','$price', '$name','$mysql_path')";

              
                if (mysqli_query($con, $sql)) {

                      $uploadSuccess= "Image successfully uploaded. ";

                } 
                else {

                    $uploadSuccess="Image can't upload";
                }
            }
    }
}

mysqli_close($con);
?>