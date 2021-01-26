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
  $sql = "SELECT * FROM `binh_luan` WHERE ma_kh LIKE '%$search%'";
  //Chạy query
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../admin/binhluan/xem-bl.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button>
  <table border="1">
    <tr>
      <th>Mã bình luận</th>
      <th>mã khách hàng</th>
      <th>comment</th>
		<th></th>
    </tr>
    <?php
    while ($binhluan= mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $binhluan["ma_bl"] ?></td>
        <td><?php echo $binhluan["ma_kh"] ?></td>
        <td><?php echo $binhluan["comment"] ?></td>
		 <td><a href="../admin/binhluan/xoabl.php?ma_bl=<?php echo $binhluan["ma_bl"] ?>" onclick="return confirm('Are u sure?')">Xóa</a></td>
      </tr>
    <?php
    }
    ?>
	</table>
	<br><br>
	<a href="../index.php"> Back </a>
</body>
</html>