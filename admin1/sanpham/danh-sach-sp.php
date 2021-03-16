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
  $sql = "SELECT * FROM `san_pham` WHERE ten_sp LIKE '%$search%'";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../dan1/sanpham/xem-sp.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button>
  </form>
  <table border="1" >
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
		<td><img src=" ../upload<?php echo $sanpham["anh_sp"]; ?> " alt=""  width="100px" height="100px" /></td>
		<td><?php echo $sanpham["size"] ?></td>
      </tr>
    <?php
    }
    ?>
	  
  </table>
	<br><br>
	<a href="../index.php"> Back </a>
</body>
</html>