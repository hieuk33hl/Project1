<?php
$conn = mysqli_connect('localhost', 'root', '', 'da1');
$queery = 'SELECT * FROM hangsx';
$sql = 'SELECT * FROM size';
$sql_2 = 'SELECT * FROM the_loai';
$result = mysqli_query($conn, $queery);
$result_sql = mysqli_query($conn, $sql);
$result_sql2 = mysqli_query($conn, $sql_2);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../assets/jquery-3.1.1.min.js"></script>
  <script src="../assets/ckeditor/ckeditor.js"></script>
  <script src="../assets/ckfinder/ckfinder.js"></script>
</head>

<body>
  <h1>Thêm sản phẩm</h1>
  <form action="them-san-pham-process.php" method="post" enctype="multipart/form-data">
    Tên: <input type="text" name="ten-sp"><br>
    Hang SX <select name="hangsx">
      <?php while ($brand = mysqli_fetch_array($result)) { ?>
        <option value="<?php echo $brand["ma_hang"] ?>"><?php echo $brand["ten_hang"] ?></option>
      <?php } ?>
    </select> <br>
    Thể Loại <select name="theloai">
      <?php while ($theloai = mysqli_fetch_array($result_sql2)) { ?>
        <option value="<?php echo $theloai["ma_tl"] ?>"> <?php echo $theloai["ten_tl"] ?></option>
      <?php } ?>
    </select> <br>
    Giá: <input type="number" name="gia"> <br>
    Ảnh: <input type="file" name="anh"><br>
    Mô tả: <textarea name="mo-ta" id="mo-ta" cols="30" rows="10"></textarea><br>
    Số lượng: <input type="number" name="so-luong"> <br>
    Size :
    <?php while ($tick_size = mysqli_fetch_array($result_sql)) { ?>
      <input type="checkbox" name="size" value="" <?php echo $tick_size["id_size"]; ?>"> <?php echo $tick_size["size_number"]; ?>
    <?php } ?>
    <br>
    <button>Thêm</button>
  </form>
  <script>
    CKEDITOR.replace('mo-ta', {
      filebrowserBrowseUrl: '../assets/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '../assets/ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl: '../assets/ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl: '../assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '../assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: '../assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
  </script>
</body>

</html>