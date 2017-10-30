<?php
require_once 'config.php';

$fieldsErr = $passErr   = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if ($_POST['uname'] == "" || $_POST['psw'] == "")
            $fieldsErr = "All fields are required.";
    else {
        $uname = $_POST['uname'];
        $pass  = md5($_POST['psw']);

        // select user name from database(DB);
        $sql = "SELECT * FROM users where uname='$uname'";

        // Run mysqli Query;
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            //Checking password
            if ($row['pass'] != $pass) {
                $passErr = "Please, enter correct Password.";
            } else {
                $_SESSION['fname']    = $row['fname'];
                $_SESSION['id']       = $row['users_id'];
                $_SESSION['is_admin'] = $row['is_admin'];
                // Admin Check//
                if ($row['is_admin'] == 1) {
                    header("Location:uploadBook.php");
                }

                // User can access only this page//
                else {
                    header("Location: welcomeBook_Kart_usr.php");
                }
            }
        } else {
            $fieldsErr = "Please, enter correct User name.";
        }
    }
}
// Close server connection;
mysqli_close($con);
?>
