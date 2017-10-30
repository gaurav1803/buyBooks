<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'include/config.php';

if (!isset($_SESSION['fname'])) header("Location: login.php");
include ('include/authorization.php');
include 'include/searchBook.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Welcome to Book Kart
        </title>
        <link rel="stylesheet" href="styles/welcomeBook_kart.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <style>
        h1 {
            margin-left: 200px;
        }


        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;

            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            width: 85%;
        }

        /*        input[type=text]:focus {
                    width: 85%;
                }*/
        .error{ color: #FF0000;}

        .search{
            float: right;
            margin-right: 60px;
        }

        .msg{
            color: #009900;
        }

    </style>

    <body>

        <button type="submit" class="logout" onclick="location.href = 'include/logout.php'" >Logout</button>
        <button type="submit" class="cart" name="cart" onclick="location.href = 'showCart.php'" >Cart</button>

        <h1 align='center' ><strong>Welcome to Book Kart, <b> <?php echo ucfirst($_SESSION['fname']); ?></strong></b> </h1>
    <br>
    <form action="#" method="post">


        <div align="center"><strong><span class="error"><?php echo $notFound; ?></span></strong></div>

        <input type="text" name="book_name" placeholder="Search Book with Title Name..." >

        <button type="submit" name="search" class="search" >Search</button>
        <br>
        <br>
        <div align="center"><strong><span class="error"><?php echo $errBook; ?></span></strong></div>
<?php
if (isset($result)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1.5' width='100%' id='myTable'>";
        echo "<tr>";
        echo "<td align='center'><strong>".'Book'."</strong></td>";
        echo "<td align='center'><strong>".'Title'."</strong></td>";
        echo "<td align='center'><strong>".'Discription'."</strong></td>";
        echo "<td align='center'><strong>".'Price'."</strong></td>";
        echo "<td align='center'><strong>".'Add to Cart'."</strong></td>";
        echo "</tr>";
        echo "<br>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td align='center' width=120 >".' <img width=100 height=100 src= '.$row["image_path"].' /> '."<br> </td>";
            echo "<td align='center' width=120>".$row["title"]."<br> </td>";
            echo "<td align='center' width=150>".$row["discription"]."<br></td>";
            echo "<td align='center' width=120>".$row["price"]."<br></td>";
            echo "<td align='center' width=120>".' <a  type="submit" name="add" class="add" href="include/addCart.php?id='.$row["id"].'" >Add</a>'."<br></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // echo '<h4>';
        echo '<div class="error" align="center">';
        echo '<strong> ';
        echo'Book not Found! ';
        echo '</strong>';
        echo '</div>';
        // echo '</h4>';
    }
}
?>

       


        <div align="center"><strong><span class="msg"><?php if (isset($_SESSION['order_books'])) {
            echo "Book added to Cart";
        } ?></span></strong></div>

    </form>
</body>
</html>
