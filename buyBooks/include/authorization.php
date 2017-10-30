<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

//$url = array('/book/index.php', 'book/login.php', '/book/uploadBook.php', '/book/welcomeBook_kart.php',
//    '/book/welcomeBook_Kart_usr.php', '/book/showCart.php');
//$uri = $_SERVER['REQUEST_URI'];
//echo $uri;
if (isset($_SESSION['fname'])) {
    $uri = $_SERVER['REQUEST_URI'];
    if ($_SESSION['is_admin'] == 1) {
        $notAllowed = array('/book/index.php', '/book/login.php', '/book/welcomeBook_Kart_usr.php');
        if (in_array($uri, $notAllowed)) {
            header("Location: welcomeBook_kart.php");
        }
    } else {

        $notAllowed = array('/book/index.php', '/book/login.php', '/book/welcomeBook_kart.php',
            '/book/uploadBook.php','/book/');
        if (in_array($uri, $notAllowed)) {

            header("Location: welcomeBook_Kart_usr.php");
        }
    }
}
?>