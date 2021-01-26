<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php	
if(isset($_POST["ma_sp"]) && isset($_POST["ten"]) && isset($_POST["tl"]) && isset($_POST["hang"]) && isset($_POST["sl"])  && isset($_POST["gia"]) && isset($_POST["tt"]) && isset($_FILES["anh"]) && isset($_POST["size"])) {
  $ma_sp = $_POST["ma_sp"];
  $tenSp = $_POST["ten"];
  $theloai = $_POST["tl"];
  $hang = $_POST["hang"];
  $gia = $_POST["gia"];
  $tt = $_POST["tt"];
  $sl = $_POST["sl"];
  $size= $_POST['size'];
  $anh = $_FILES["anh"];
  $tenAnh = $anh["name"];
  //B2: Tạo đường dẫn ảnh đến thư mục upload
  $duongDan = "../../upload/" . $tenAnh;
  //B3: Di chuyển ảnh từ file tạm thời đến file upload
		
   $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE san_pham SET ten_sp='$tenSp', the_loai=$theloai , hang_sx=$hang , sl_sp=$sl, gia_sp=$gia, ttsp='$tt', anh_sp='$tenAnh',size=$size WHERE ma_sp=$ma_sp";
	
 mysqli_query($con, $sql);
	mysqli_close($con);
  //Đóng kết nối
 header("Location: xem-sp.php");
}
	else {
  header("Location: them-sp.php");
}
	?>
</body>
</html>