<?php
include("../Connection/open.php");
$error = "";
$success = "";
if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["fname"]) && !empty($_POST["pnumber"]) && !empty($_POST["email"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $pnumber = $_POST["pnumber"];
    // SELECT * FROM `khach_hang` WHERE `email` LIKE 'v@j' ORDER BY `ma_kh` ASC
    $sql_checkemail = "select *from khach_hang where email like '$email'";
    $sql_username = "select *from khach_hang where username like '$username'";
    $sql_phone = "select *from khach_hang where sdt like '$pnumber'";
    $result_checkmail = mysqli_query($conn, $sql_checkemail);
    $result_checkphone = mysqli_query($conn, $sql_phone);
    $result_checkuser = mysqli_query($conn, $sql_username);
    $demketqua1 = mysqli_num_rows($result_checkmail);
    $demketqua2 = mysqli_num_rows($result_checkphone);
    $demketqua3 = mysqli_num_rows($result_checkuser);
    exit;
    if ($demketqua1 > 0) {
        $err = "Email này đã được đăng kí";
    } elseif ($demketqua2 > 0) {
        $err = "Số điện thoại này đã được đăng kí";
    } elseif ($demketqua2 > 0) {
        $err = "Tên đăng nhập này đã được đăng kí";
    }
    if (($demketqua1 + $demketqua2 + $demketqua3) == 0) {
        $sql = "INSERT INTO khach_hang(username,password,ten_kh,sdt,email) VALUES ('$username', '$password', '$fname',$pnumber,' $email')";
        mysqli_query($conn, $sql);
        header("Location: ../user/login.php?success=Đăng kí tài khoản thành công , hãy cập nhật thêm thông tin ở mục thông tin tài khoản");
    } else {
        header("Location: ../user/register.php?err='$err'");
    }
} else {
    header("Location: ../user/register.php");
}

include("../Connection/close.php");
