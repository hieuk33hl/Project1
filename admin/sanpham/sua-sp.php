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
  $sql = "SELECT * FROM `san_pham`";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table border="1">
    <tr>
      <th>Mã</th>
      <th>Tên</th>
      <th>thể loai</th>
	  <th>hãng sản xuất</th>
	  <th>số lượng sản phẩm</th>
	  <th>giá sản phẩm</th>
	  <th>ttsp</th>
	  <th>ảnh </th>
	  <th>size</th>
		<th></th>
    </tr>
    <?php
    while ($sanpham = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $sanpham["ma_sp"] ?></td>
        <td><?php echo $sanpham["ten_sp"] ?></td>
        <td><?php echo $sanpham["the_loai"] ?></td>
		<td><?php echo $sanpham["hang_sx"] ?></td>
		<td><?php echo $sanpham["sl_sp"] ?></td>
		<td><?php echo $sanpham["gia_sp"] ?></td>
	    <td><?php echo $sanpham["ttsp"] ?></td>
		<td><img src="../../upload/<?php echo $sanpham["anh_sp"]; ?> " alt=""  width="100px" height="100px" /></td>
		<td><?php echo $sanpham["size"] ?></td>
		  <td><a href="../admin/sanpham/suasp.php?ma_sp=<?php echo $sanpham["ma_sp"] ?>">Sửa</a></td>
      </tr>
    <?php
    }
    ?>
	  
  </table>
</body>
</html>