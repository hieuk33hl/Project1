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
 $search = "";
  if (isset($_GET["search"])) {
    $search = $_GET["search"];
  }
  $sql = "SELECT * FROM `san_pham`INNER JOIN the_loai ON san_pham.the_loai=the_loai.ma_tl INNER JOIN hangsx ON san_pham.hang_sx=hangsx.ma_hang  WHERE ten_sp LIKE '%$search%'";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../admin/sanpham/danh-sach-sp.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button><br><br><br><br>
  </form>
  <table id="l"  align="center" border="1" >
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
	  <th></th>	
    </tr>
    <?php
    while ($sanpham = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $sanpham["ma_sp"] ?></td>
        <td><?php echo $sanpham["ten_sp"] ?></td>
        <td><?php echo $sanpham["ten_tl"] ?></td>
		<td><?php echo $sanpham["ten_hang"] ?></td>
		<td><?php echo $sanpham["sl_sp"] ?></td>
		<td><?php echo $sanpham["gia_sp"] ?></td>
	    <td><?php echo $sanpham["ttsp"] ?></td>
		<td><img src="../../upload/<?= preg_replace('/\s+/', '', $sanpham["anh_sp"]) ?> "  width="100px" height="100px" /></td>
		<td><?php echo $sanpham["size"] ?></td>
		<td><a href="../admin/sanpham/xoasp.php?ma_sp=<?php echo $sanpham["ma_sp"] ?>" onclick="return confirm('Are u sure?')">Xóa</a></td>
		<td><a href="../admin/sanpham/suasp.php?ma_sp=<?php echo $sanpham["ma_sp"] ?>">Sửa</a></td>
      </tr>
    <?php
    }
    ?>
	  <?= preg_replace('/\s+/', '', $sanpham["anh_sp"]) ?>
  </table>
	<br><br>
	<a href="../index.php"> Back </a>
</body>
</html>