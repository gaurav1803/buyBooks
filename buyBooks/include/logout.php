<?php
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once 'config.php';
    
    $_SESSION['order_books']=array();
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    
    
?>

