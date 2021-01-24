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
  $sql = "SELECT * FROM `hangsx` WHERE ten_hang LIKE '%$search%'";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../dan1/hangsx/xem-hang.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button>
  <table border="1">
    <tr>
      <th>Mã</th>
      <th>Tên</th>
    </tr>
    <?php
    while ($hangsx = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $hangsx["ma_hang"] ?></td>
        <td><?php echo $hangsx["ten_hang"] ?></td>
      </tr>
    <?php
    }
    ?>
	  
  </table>
	<br><br>
	<a href="../index.php"> Back </a>
</body>
</html>