<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/main.css" />
</head>

<body>

  <?php
  include("../Connection/open.php");
  $result = mysqli_query($conn, "SELECT * FROM hangsx");
  include("../Connection/close.php");
  ?>
  <div class="menu_ngang">
    <div class="grid">
      <div id="menu">
        <ul>
          <li><a href="#">GIỚI THIỆU</a></li>
          <?php
          while ($hangsx = mysqli_fetch_array($result)) {
          ?>
            <li>
              <a href="product.php?id_brand=<?= $hangsx['ma_hang'] ?>">
                <?= $hangsx['ten_hang'] ?>
              </a>
            </li>
          <?php } ?>
          <li><a href="#">LIÊN HỆ</a></li>
        </ul>
      </div>
    </div>
  </div>

</body>

</html>