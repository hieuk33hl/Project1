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
  $sql = "SELECT * FROM `khach_hang` WHERE ten_kh LIKE '%$search%'";
  //Chạy query
  $result = mysqli_query($con, $sql);

  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../admin/khachhang/xem-kh.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button>
  </form>
  <table border="1">
    <tr>
      <th>Mã</th>
      <th>Tên</th>
      <th>tk</th>
	  <th>Mk</th>
	  <th>email</th>
	  <th>sdt</th>
	  <th>gt</th>
	  <th>địa chỉ</th>
	  <th>status</th>
    </tr>
    <?php
    while ($khachhang = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $khachhang["ma_kh"] ?></td>
        <td><?php echo $khachhang["ten_kh"] ?></td>
        <td><?php echo $khachhang["username"] ?></td>
		<td><?php echo $khachhang["password"] ?></td>
		<td><?php echo $khachhang["email"] ?></td>
		<td><?php echo $khachhang["sdt"] ?></td>
		<td><?php if ($khachhang["gt"] == 0) {
              echo "Nữ";
            } else {
              echo "Nam";
            } ?></td>
		<td><?php echo $khachhang["diachi"] ?></td>
		<td><?php if( $khachhang["status"]==0){
		echo("ko");
	}else{
		echo("ok");
	}
	?></td>
      </tr>
    <?php
    }
    ?>
	  
  </table>
	<br><br>
	<a href="../index.php"> Back </a>
</body>
</html>