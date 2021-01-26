<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Untitled Document</title>
</head>

<body>
  <?php
  $ma = $_GET["ma_sp"];
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM san_pham where ma_sp=$ma";
  $result_hangsx = mysqli_query($con, "SELECT * FROM hangsx");
  $result_theloai = mysqli_query($con, "SELECT * FROM the_loai");
  $result_size = mysqli_query($con, "SELECT * FROM size_number");
  $result = mysqli_query($con, $sql);
  $sanpham = mysqli_fetch_array($result);
  mysqli_close($con);
  ?>
  <form action="suasp2.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="ma_sp" value="<?php echo $ma; ?>"><br>
    Tên: <input type="text" name="ten" value='<?php echo $sanpham["ten_sp"] ?>'><br>
    thể loại: <select name="theloai">
      <?php
      while ($tl = mysqli_fetch_array($result_theloai)) {
      ?>
        <option value="<?php echo $tl["ma_tl"] ?>"><?php echo $tl["ten_tl"] ?></option>
      <?php
      }
      ?>
    </select><br>
    hãng: <select name="hang">
      <?php
      while ($hang_sx = mysqli_fetch_array($result_hangsx)) {
      ?>
        <option value="<?php echo $hang_sx["ma_hang"] ?>"><?php echo $hang_sx["ten_hang"] ?></option>
      <?php
      }
      ?>
    </select><br>
    số lượng: <input type="number" name="sl" value='<?php echo $sanpham["sl_sp"] ?>'><br>
    giá: <input type="number" name="gia" value='<?php echo $sanpham["gia_sp"] ?>'><br>
    thông tin: <textarea name="tt" cols="30" rows="10"> <?php echo $sanpham["ttsp"] ?> </textarea><br>
    ảnh: <input type="file" name="anh" value="<?php echo $sanpham["anh_sp"] ?> " alt="hh" width="100px" height="100px" /><img src="../upload/<?= preg_replace('/\s+/', '', $sanpham["anh_sp"]) ?>" width="100px" height="100px" /> <br>
    Size
    <?php
    while ($size = mysqli_fetch_array($result_size)) {
    ?>
      <input type="checkbox" value="<?= $size['id'] ?>" name="size"><?= $size['size'] ?>
    <?php
    }
    ?> <br>
    <button> Sửa </button>
  </form>
</body>

</html>