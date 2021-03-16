<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<style>
		#l{
			border-spacing: 0px;
			text-align: center;
		}
	</style>

<body>
		<?php
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
	$limit = 8;
  $start = 0;
  // Viết câu sql đếm tổng sản phẩm
  $sqlDemSp = "SELECT COUNT(*) AS tongSoHang FROM `hangsx`";
  $resultDemSp = mysqli_query($con, $sqlDemSp);
  $demSp = mysqli_fetch_array($resultDemSp);
  // Lấy tổng số trang 
  $tongTrang = ceil($demSp["tongSoHang"] / $limit);
  if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    $start = ($trang - 1) * $limit;
  }
  $sql = "SELECT * FROM hangsx LIMIT $start,$limit";
  $search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `hangsx` WHERE ten_hang LIKE '%$search%'  LIMIT $start,$limit ";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../admin/hangsx/xem-hang.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button><br><br>
  <table id="l"  align="center" border="1" >
    <tr>
      <th>Mã</th>
      <th>Tên</th>
      <th colspan="2">Thao tác</th>
    </tr>
    <?php
    while ($hangsx = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $hangsx["ma_hang"] ?></td>
        <td><?php echo $hangsx["ten_hang"] ?></td>
		   <td><a href="../admin/hangsx/xoahang.php?ma_hang=<?php echo $hangsx["ma_hang"] ?>" onclick="return confirm('Are u sure?')">Xóa</a></td>
		   <td><a href="../admin/hangsx/suahang.php?ma_hang=<?php echo $hangsx["ma_hang"] ?>">Sửa</a></td>
      </tr>
    <?php
    }
    ?>
	  
  </table>
	<br><br>
		<?php for ($i = 1; $i <= $tongTrang; $i++) {
  ?>
    &ensp; <a href="?cat=<?php echo $cat; ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
  <?php
  }
  ?>
	<a href="../index.php"> Back </a>
</body>
</html>