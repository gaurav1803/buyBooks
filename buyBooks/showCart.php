<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'include/config.php';




//echo "<td align='center'><strong>".'Discription'."</strong></td>";
//echo "<td align='center'><strong>".'Price'."</strong></td>";


if (isset($_SESSION['order_books'])) {
    echo "<table border='1' width='100%'>";
    echo "<tr>";
    echo "<td align='center'><strong>".'Book ID'."</strong></td>";
    echo "<td align='center'><strong>".'Book'."</strong></td>";
    echo "<td align='center'><strong>".'Title'."</strong></td>";
    foreach ($_SESSION['order_books'] as $book) {
        echo "<tr>";
        echo "<td align='center' width=120>".$book[0]." </td>";

        echo "<td align='center' width=120 >".' <img width=100 height=100 src=  '.$book[1].' /> '." </td>";
        echo "<td align='center' width=120>".$book[2]." </td>";
        echo "</tr>";
    }
}
echo "</table>";

mysqli_close($con);
?>
<html>
    <head>
        <title></title>

        <link rel="stylesheet" href="styles/welcomeBook_kart.css" >

    </head>
    <style>
        .checkout{
            float: right;
            margin-right: 575px;
        }
        .error{
            color: #FF0000;

        }
    </style>
    <body>
        

    <?php
    if (isset($_SESSION['order_books'])) {
        echo '<form action="include/Check_outBooks.php" method="post"> <br>';
        echo '<button  type="submit"  name="checkout"   class="checkout" >';
        echo 'Check Out';
        echo '</button>';
        echo '</form>';
    } else {

        echo'<div class=error align="center">';
        echo '<strong> <br>';
        echo "Please, first add book in your cart to check out!";
        echo '</strong>';
        echo'</div>';
    }
    ?>
    <button type="submit" class="logout" onclick="location.href = 'welcomeBook_Kart_usr.php'" >Home</button>


</body>
</html>