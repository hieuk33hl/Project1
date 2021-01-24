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
  $sql = "SELECT * FROM `khach_hang`";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table border="1">
    <tr>
      <th>vô hiệu hóa </th>
		<th></th>
    </tr>
    <?php
    while ($khachhang = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $khachhang["status"] ?></td>
		  <td><a href="../dan1/khachhang/suakh.php?ma_kh=<?php echo $khachhang["ma_kh"] ?>">Sửa</a></td>
      </tr>
    <?php
    }
    ?>
	  
  </table>
</body>
</html>