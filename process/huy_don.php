<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    include("../Connection/open.php");
    mysqli_query($conn, "UPDATE hoa_don  SET status_order = 1 WHERE `hoa_don`.`ma_hd` = $order_id");
    // Cập nhật lại số lượng của bảng sản phẩm
    // Lấy tất cả sản phẩm từ bảng hóa đơn chi tiết thông qua mã hóa đơn
    $sqlHoaDonChiTiet = "SELECT * FROM hoa_don_ct WHERE ma_don_hang=$order_id";
    $resultHoaDonChiTiet = mysqli_query($conn, $sqlHoaDonChiTiet);
    while ($hoaDonChiTiet = mysqli_fetch_array($resultHoaDonChiTiet)) {
        // Lấy số lượng đã đặt
        $soLuongHoaDon = $hoaDonChiTiet["so_luong"];
        // Lấy số lượng sản phẩm
        // Lấy mã sản phẩm
        $maSanPham = $hoaDonChiTiet["ma_sp"];
        $sqlSanPham = "SELECT * FROM san_pham WHERE ma_sp=$maSanPham";
        $resultSanPham = mysqli_query($conn, $sqlSanPham);
        $sanPham = mysqli_fetch_array($resultSanPham);
        $soLuongBanDau = $sanPham["sl_sp"];
        // Số lượng update = số lượng sản phẩm + số lượng đã đặt
        $soLuongHienTai = $soLuongBanDau + $soLuongHoaDon;
        // Update Sản phẩm
        $sqlUpdateSanPham = "UPDATE san_pham SET sl_sp=$soLuongHienTai WHERE ma_sp=$maSanPham";
        mysqli_query($conn, $sqlUpdateSanPham);
    }
    include("../Connection/close.php");
    header('location:../user/order_list.php');
} else {
    header('location:../user/order_list.php?err=1');
}
