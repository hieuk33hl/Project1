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
  $sql = "select * from the_loai";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table border="1">
    <tr>
      <th>Mã</th>
      <th>Tên</th>
		<th></th>
		<th></th>
    </tr>
    <?php
    while ($the_loai = mysqli_fetch_array($result)) {	
    ?>
      <tr>
        <td><?php echo $the_loai["ma_tl"] ?></td>
        <td><?php echo $the_loai["ten_tl"] ?></td>
		  <td><a href="../admin/theloai/xoatl.php?ma_tl=<?php echo $the_loai["ma_tl"] ?>" onclick="return confirm('Are u sure?')">Xóa</a></td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>
</html>