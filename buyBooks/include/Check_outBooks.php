<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';
if (isset($_POST['checkout'])) {

    $usr_id = $_SESSION['id'];
    if (isset($_SESSION['order_books'])) {
        foreach ($_SESSION['order_books'] as $book) {
            $sql_checkOut = "INSERT INTO books_order (users_id, books_id, books_title, books_path) VALUES ('$usr_id','$book[0]','$book[1]', '$book[2]') ";
            mysqli_query($con, $sql_checkOut);
        }
        echo'<div class=error align="center">';
        echo '<strong> <br>';
        echo "Please, first add book in your cart to check out!";
        echo '</strong>';
        echo'</div>';
        $_SESSION['order_books'] = array();
        header("Location:../showCart.php");
    } else {
        echo "Please, first add book in your cart to check out!";
    }
}
?>