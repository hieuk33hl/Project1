<?php
if (isset($_GET["mahd"])) {
  $mahd = $_GET["mahd"];
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE hoa_don SET status_order=1 WHERE ma_hd=$mahd";
  mysqli_query($con, $sql);
  // Cập nhật lại số lượng của bảng sản phẩm
  // Lấy tất cả sản phẩm từ bảng hóa đơn chi tiết thông qua mã hóa đơn
  $sqlHoaDonChiTiet = "SELECT * FROM hoa_don_ct WHERE ma_don_hang=$mahd";
  $resultHoaDonChiTiet = mysqli_query($con, $sqlHoaDonChiTiet);
  while ($hoaDonChiTiet = mysqli_fetch_array($resultHoaDonChiTiet)) {
    // Lấy số lượng đã đặt
    $soLuongHoaDon = $hoaDonChiTiet["so_luong"];
    // Lấy số lượng sản phẩm
    // Lấy mã sản phẩm
    $maSanPham = $hoaDonChiTiet["ma_sp"];
    $sqlSanPham = "SELECT * FROM san_pham WHERE ma_sp=$maSanPham";
    $resultSanPham = mysqli_query($con, $sqlSanPham);
    $sanPham = mysqli_fetch_array($resultSanPham);
    $soLuongBanDau = $sanPham["sl_sp"];
    // Số lượng update = số lượng sản phẩm + số lượng đã đặt
    $soLuongHienTai = $soLuongBanDau + $soLuongHoaDon;
    // Update Sản phẩm
    $sqlUpdateSanPham = "UPDATE san_pham SET sl_sp=$soLuongHienTai WHERE ma_sp=$maSanPham";
    var_dump($sqlUpdateSanPham);
    exit;
    mysqli_query($con, $sqlUpdateSanPham);
  }
  mysqli_close($con);
  header("Location: ../index.php?cat=7.1&ma_hd=$mahd");
} else {
  header("Location: ../index.php?cat=7.1&ma_hd=$mahd");
}
