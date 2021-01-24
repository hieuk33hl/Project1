<?php
session_start();
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    include("../Connection/open.php");
    $sql = "SELECT * FROM khach_hang WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ($check == 1) {

        $each = mysqli_fetch_array($result);
        $_SESSION['id_customer'] = $each['ma_kh'];
        $_SESSION['fullname']  = $each['ten_kh'];
        if (isset($_POST["remember"])) {     //Ghi nho Mat Khau!!!
            setcookie("user", $username, time() + 846000 * 2);
            setcookie("pass", $password, time() + 846000 * 2);
        } else {                           //Khong ghi nho Mat Khau!!!!
            setcookie("user", $username, time() - 3600);
            setcookie("pass", $password, time() - 3600);
        }
        header("Location: ../index.php");
    } else {
        header("Location: ../user/login.php?error=1");
    }
} else {
    header("location:../user/login.php?error=1");
}

include("../Connection/close.php");
