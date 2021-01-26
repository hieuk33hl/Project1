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
  //Tạo câu query
  $sql = "SELECT * FROM `hoa_don_ct`";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table border="1">
     <tr>
      <th>Mã đơn hàng </th>
      <th>Mã sản phẩm</th>
      <th> số lượng </th>
		<th> giá tiền </th>
	  <th></th>
 	  <th></th>
    </tr>
    <?php
    while ($hoadonct = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $hoadonct["ma_don_hang"] ?></td>
        <td><?php echo $hoadonct["ma_sp"] ?></td>
		<td><?php echo $hoadonct["slsp"] ?></td>
		  <td><?php echo $hoadonct["gia_tien"] ?></td>
		<td><a href="../admin/hdct/suahdct.php?ma_don_hang=<?php echo $hoadonct["ma_don_hang"] ?>">Sửa</a></td>
		<td><a href="../admin/hdct/xoahdct.php?ma_don_hang=<?php echo $hoadonct["ma_don_hang"] ?>" onclick="return confirm('Are u sure?')">Xóa</a></td>
      </tr>
    <?php
    }
    ?>
</body>
</html>