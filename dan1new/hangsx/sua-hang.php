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
  $sql = "select * from hangsx";
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
    </tr>
    <?php
    while ($hangsx = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $hangsx["ma_hang"] ?></td>
        <td><?php echo $hangsx["ten_hang"] ?></td>
		   <td><a href="../dan1/hangsx/suahang.php?ma_hang=<?php echo $hangsx["ma_hang"] ?>">Sửa</a></td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>
</html>