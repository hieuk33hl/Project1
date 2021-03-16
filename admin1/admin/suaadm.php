
	<?php
if (isset($_GET["maadmin"]) && isset($_GET["tenadmin"]) && isset($_GET["tk"]) && isset($_GET["mk"]) && isset($_GET["email"])&& isset($_GET["sdt"])&& isset($_GET["gioi-tinh"])&& isset($_GET["diachi"])&& isset($_GET["quyen"]) && isset($_GET["tt"])) {
  $maadmin = $_GET["maadmin"];
  $tenadmin = $_GET["tenadmin"];
  $tk = $_GET["tk"];
	 $mk = $_GET["mk"];
	 $email = $_GET["email"];
	 $sdt = $_GET["sdt"];
	 $gt = $_GET["gioi-tinh"];
	 $diachi = $_GET["diachi"];
	 $quyen = $_GET["quyen"];
	$trangthai = $_GET["tt"];
//Mở connect
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE admin SET ten_admin='$tenadmin', username='$tk' , password='$mk' , email='$email', sdt=$sdt, gt=$gt, diachi='$diachi', quyen=$quyen , trangthai=$trangthai WHERE maadmin='$maadmin'";
  mysqli_query($con, $sql);
  //Đóng connect
  mysqli_close($con);
	  header("Location:  xem-admin.php");
} else {
  header("Location: sua-admin.php");
}
?>
	
  
