<?php
if (isset($_POST["ten-sp"]) && isset($_POST["gia"]) && isset($_POST["mo-ta"]) && isset($_POST["so-luong"]) && isset($_FILES["anh"]) && isset($_POST["size"]) && isset($_POST["hangsx"])) {
  $tenSp = $_POST["ten-sp"];
  $gia = $_POST["gia"];
  $moTa = $_POST["mo-ta"];
  $soLuong = $_POST["so-luong"];
  $anh = $_FILES["anh"];
  $size = $_POST["size"];
  $hangsx = $_POST["hangsx"];
  //B1: lấy tên ảnh
  $tenAnh = $anh["name"];
  //B2: Tạo đường dẫn ảnh đến thư mục upload
  $duongDan = "../../upload/" . $tenAnh;
  //B3: Di chuyển ảnh từ file tạm thời đến file upload
  move_uploaded_file($anh["tmp_name"], $duongDan);
  //Mở kết nối
  include("../../connect/open.php");
  $sql = "INSERT INTO san_pham(ten_sp,gia_sp,anh_sp,ttsp,sl_sp,size,hang_sx) VALUES ('$tenSp',$gia,'$tenAnh','$moTa',$soLuong,$size,$hangsx)";
  mysqli_query($con, $sql);
  //Đóng kết nối
  include("../../connect/close.php");
  header("Location: index.php");
} else {
  header("Location: index.php?er=1");
}
