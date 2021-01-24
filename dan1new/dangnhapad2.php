<?php
		session_start();
  if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  //mở kết nối
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password' AND trangthai=1 ";
  $result = mysqli_query($con, $sql);
  $admin = mysqli_fetch_array($result);
  $check = mysqli_num_rows($result);
  if ($check == 0) {
    header("Location: dangnhapadm.php?err=1");
  }
	  else {
	  $_SESSION["username"]=$username;
	  
	   $_SESSION["quyen"] = $admin["quyen"];

	  if (isset($_POST["remember"])) {
      setcookie("username", $username, time() + 84600 * 2);
      setcookie("password", $password, time() + 84600 * 2);
    } else {
      setcookie("username", $username, time() - 100);
      setcookie("password", $password, time() - 100);
    }
   header("location: index.php");
  }
  mysqli_close($con);
}
	else {
  header("Location: dangnhapadm.php");
		
}
	?>
