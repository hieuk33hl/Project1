<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
  $search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `hoa_don_ct` WHERE ma_sp LIKE '%$search%'";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../dan1/hdct/xem-hdct.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button>
  </form>
  <table border="1">
    <tr>
      <th>Mã đơn hàng </th>
      <th>Mã sản phẩm</th>
      <th> số lượng </th>
		<th> giá tiền </th>
    </tr>
    <?php
    while ($hoadonct = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $hoadonct["ma_don_hang"] ?></td>
        <td><?php echo $hoadonct["ma_sp"] ?></td>
        <td><?php echo $hoadonct["slsp"] ?></td>
		 <td><?php echo $hoadonct["gia_tien"] ?></td>
      </tr>
    <?php
    }
    ?>
	</table>
	<br><br>
	<a href="../index.php"> Back </a>
</body>
</html>