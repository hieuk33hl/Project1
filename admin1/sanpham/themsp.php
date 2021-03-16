
<?php	
if(isset($_POST["ten"]) && isset($_POST["theloai"]) && isset($_POST["hang"]) && isset($_POST["sl"])  && isset($_POST["gia"]) && isset($_POST["tt"]) && isset($_FILES["anh"]) && isset($_POST["size"])) {
  $tenSp = $_POST["ten"];
  $theloai = $_POST["theloai"];
  $hang = $_POST["hang"];
  $gia = $_POST["gia"];
  $tt = $_POST["tt"];
  $sl = $_POST["sl"];
  $size= $_POST['size'];
  $anh = $_FILES["anh"];
  $tenAnh = $anh["name"];
  //B2: Tạo đường dẫn ảnh đến thư mục upload
  $duongDan = "../upload/" . $tenAnh;
  //B3: Di chuyển ảnh từ file tạm thời đến file upload
	
   $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "INSERT INTO san_pham(`ten_sp`, `the_loai`, `hang_sx`, `sl_sp`, `gia_sp`, `ttsp`, `anh_sp`, `size`) VALUES ('$tenSp',$theloai,$hang,$sl,$gia,'$tt','$tenAnh',$size)";
	var_dump($sql);
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