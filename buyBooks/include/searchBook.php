<?php
// Error Display//
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

$errBook  = $notFound = "";

if (isset($_POST['search'])) {
        $_POST['book_name']=  trim($_POST['book_name']);
    if ($_POST['book_name']==""|| $_POST['book_name']==" ") $errBook = "Enter a specific Book Name!";

    else {

        $title  = $_POST['book_name'];
        $sql    = "SELECT * FROM books WHERE title LIKE '%$title%'"; // SELECT BOOK FROM DATABASE;

        // RUN QUERY//
        $result = mysqli_query($con, $sql);
    }
}
mysqli_close($con);
?>
