<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	include("gg.php");
	?>
	
	<?php
  //Mở kết nối csdl
  $con = mysqli_connect("localhost", "root", "", "da1");
	$search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `admin` WHERE ten_admin LIKE '%$search%'";
  $result = mysqli_query($con, $sql);
	if (isset($_SESSION["quyen"])==0);
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
   <form action="../admin/admin/xem-admin.php" method="get">
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
	  <th>quyền</th>
	<th>trạng thái</th>
    </tr>
    <?php
    while ($admin = mysqli_fetch_array($result)) {
		
    ?>
      <tr>
        <td><?php echo $admin["maadmin"] ?></td>
        <td><?php echo $admin["ten_admin"] ?></td>
        <td><?php echo $admin["username"] ?></td>
		<td><?php echo $admin["password"] ?></td>
		<td><?php echo $admin["email"] ?></td>
		<td><?php echo $admin["sdt"] ?></td>
		<td><?php if ($admin["gt"] == 0) {
              echo "Nữ";
            } else {
              echo "Nam";
            } ?></td>
		<td><?php echo $admin["diachi"] ?></td>
		<td><?php echo $admin["quyen"] ?></td>
		  <td><?php if ($admin["trangthai"] == 0) {
              echo "off";
            } else {
              echo "on";
            } ?></td>
      </tr>
    <?php
    }
    ?>
	  
  </table><br><br>
	<a href="../index.php"> Back </a>
</body>
</html>