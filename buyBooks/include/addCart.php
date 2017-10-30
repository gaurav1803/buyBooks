<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';



//if ($_SERVER["REQUEST_METHOD"]=="POST")) {
$id = $_GET['id'];

$sql_addBooks = "SELECT * FROM books WHERE id='$id'";
$books_Order  = mysqli_query($con, $sql_addBooks);
$Books_row    = mysqli_fetch_assoc($books_Order); // Fetch all data from books database//
//Store Books in Session;

$newBook   = array();
$newBook[] = $Books_row['id'];
$newBook[] = $Books_row['image_path'];
$newBook[] = $Books_row['title'];


if (isset($_SESSION['order_books'])) {
    $cart = $_SESSION['order_books'];
    array_push($cart, $newBook);
    $_SESSION['order_books'] =$cart;
} else {
    $_SESSION['order_books']=array($newBook);

}


header("Location: ../welcomeBook_Kart_usr.php ");
//echo '<pre>';
//print_r($_SESSION['order_books']);
//echo '</pre>';

mysqli_close($con);
?>



















<!--////Run Query//
//$books_Order = mysqli_query($con, $sql_addBooks);
////die('**');
//
//if (mysqli_num_rows($books_Order) > 0) {
//    //Store value in associated array//
//    $Books_row   = mysqli_fetch_assoc($books_Order);
//    $books_title = $Books_row['title'];
//    $books_path  = $Books_row['image_path'];
//
//
//    //INSERT BOOKS_ORDERED INTO ORDERED_BOOKS TABLE//
//    $ordered_books = "INSERT INTO books_order (users_id, books_id, books_title, books_path) VALUES('$users_id','$id', '$books_title','$books_path')";
//    mysqli_query($con, $ordered_books);
//
//    echo "added";
//
//    //Message to User //
//    $msgUsr = "Book added to Cart";
//}-->