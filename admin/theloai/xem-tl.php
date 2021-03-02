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
  $sql = "SELECT * FROM `the_loai` WHERE ten_tl LIKE '%$search%'";
  //Chạy query
  $result = mysqli_query($con, $sql);
	
  //Đóng kết nối csdl
  mysqli_close($con);
  ?>
	<form action="../admin/theloai/xem-tl.php" method="get">
    <input type="text" name="search" value="<?php if (isset($_GET["search"])) {
                                              echo $_GET["search"];
                                            } ?>">
    <button>Tìm kiếm</button><br><br>
  </form>
  <table id="l"  align="center" border="1" >
    <tr>
      <th>Mã</th>
      <th>Tên</th>
    </tr>
    <?php
    while ($the_loai = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $the_loai["ma_tl"] ?></td>
        <td><?php echo $the_loai["ten_tl"] ?></td>
      </tr>
    <?php
    }
    ?>
	  
  </table>
	<br><br>
	<a href="../index.php"> Back </a>
</body>
</html>