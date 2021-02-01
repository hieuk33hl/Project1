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
  $sql = "SELECT * FROM `hoa_don`";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table border="1">
    <tr>
      <th>Mã hd</th>
      <th>mã kh</th>
	  <th>tên người nhận</th>
	  <th>địa chỉ</th>
	  <th>sđt</th>
	  <th>ngày </th>
	  <th></th>
		<th></th>
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
		  <td><a href="../admin/hoadon/suahd.php?ma_hd=<?php echo $hoadon["ma_hd"] ?>">Sửa</a></td>
		  <td><a href="../admin/hoadon/xoahd.php?ma_hd=<?php echo $hoadon["ma_hd"] ?>" onclick="return confirm('Are u sure?')">Xóa</a></td>
      </tr>
    <?php
    }
    ?>
</body>
</html>