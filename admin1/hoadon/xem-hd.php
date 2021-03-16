<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
</head>
<style>
  #l {
    border-spacing: 0px;
    text-align: center;
    margin: 20px 50px;
  }
</style>

<body>
  <?php
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
	$limit = 8;
  $start = 0;
  // Viết câu sql đếm tổng sản phẩm
  $sqlDemSp = "SELECT COUNT(*) AS tongSoHd FROM `hoa_don`";
  $resultDemSp = mysqli_query($con, $sqlDemSp);
  $demSp = mysqli_fetch_array($resultDemSp);
  // Lấy tổng số trang 
  $tongTrang = ceil($demSp["tongSoHd"] / $limit);
  if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    $start = ($trang - 1) * $limit;
  }
  $sql = "SELECT * FROM hoa_don LIMIT $start,$limit";
  $search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `hoa_don` WHERE ma_kh LIKE '%$search%' LIMIT $start,$limit ";
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../admin/hoadon/xem-hd.php" method="get">
		
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button><br><br><br><br>
  </form><br>

  <table id="l" align="center" border="1">
    <tr>
      <th>Mã hd</th>
	  <th>Mã khách hàng</th>
      <th>Tên người nhận</th>
      <th>Địa chỉ</th>
      <th>Sđt</th>
      <th>Ngày đặt</th>
      <th>Chi tiết</th>
      <th>Trạng thái</th>
    </tr>
    <?php
    while ($hoadon = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $hoadon["ma_hd"] ?></td>
		<td><?php echo $hoadon["ma_kh"] ?></td>
        <td><?php echo $hoadon["ten_nguoi_nhan"] ?></td>
        <td><?php echo $hoadon["dia_chi"] ?></td>
        <td><?php echo $hoadon["sdt"] ?></td>
        <td><?php echo $hoadon["ngay_nhap"] ?></td>
        <td>
          <a href="index.php?cat=7.1&ma_hd=<?= $hoadon["ma_hd"] ?>">Xem</a>
        </td>
        <td>
          <?php if ($hoadon['status_order'] == 0) {  ?>
            <span class="processing" style="color:green;">Đang chờ xử lý</span>
          <?php } elseif ($hoadon['status_order'] == 1) { ?>
            <span class="huy" style="color:red;">Đã hủy</span>
          <?php } elseif ($hoadon['status_order'] == 2) { ?>
            <span class="huy" style="color:blue;">Đã xác nhận</span>
          <?php } ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </table><br>
	 <?php for ($i = 1; $i <= $tongTrang; $i++) {
  ?>
    &ensp; <a href="?cat=<?php echo $cat; ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
  <?php
  }
  ?>
</body>

</html>