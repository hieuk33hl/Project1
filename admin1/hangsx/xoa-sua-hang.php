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
  //Tạo câu query
  $sql = "select * from hangsx";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
  <table id="l"  align="center" border="1" >
    <tr>
      <th>Mã</th>
      <th>Tên</th>
		<th></th>
		<th></th>
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
</body>
</html>