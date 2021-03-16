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
  $sqlDemSp = "SELECT COUNT(*) AS tongSoTl FROM `the_loai`";
  $resultDemSp = mysqli_query($con, $sqlDemSp);
  $demSp = mysqli_fetch_array($resultDemSp);
  // Lấy tổng số trang 
  $tongTrang = ceil($demSp["tongSoTl"] / $limit);
  if (isset($_GET["trang"])) {
    $trang = $_GET["trang"];
    $start = ($trang - 1) * $limit;
  }
  $sql = "SELECT * FROM the_loai LIMIT $start,$limit";
  $search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `the_loai` WHERE ten_tl LIKE '%$search%' LIMIT $start,$limit ";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../admin/theloai/xem-tl.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button><br><br>
  </form>
  <table id="l"  align="center" border="1" >
    <tr>
      <th>Mã</th>
      <th>Tên</th>
	  <th colspan="2">Thao tác</th>
    </tr>
    <?php
    while ($the_loai = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $the_loai["ma_tl"] ?></td>
        <td><?php echo $the_loai["ten_tl"] ?></td>
		  <td><a href="../admin/theloai/xoatl.php?ma_tl=<?php echo $the_loai["ma_tl"] ?>" onclick="return confirm('Are u sure?')">Xóa</a></td>
		   <td><a href="../admin/theloai/suatl.php?ma_tl=<?php echo $the_loai["ma_tl"] ?>">Sửa</a></td>
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
</body>
</html>