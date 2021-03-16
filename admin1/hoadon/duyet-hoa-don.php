<?php
if (isset($_GET["mahd"])) {
  $mahd = $_GET["mahd"];

  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "UPDATE hoa_don SET status_order=2 WHERE ma_hd=$mahd";
  mysqli_query($con, $sql);

  mysqli_close($con);

  header("Location: ../index.php?cat=7.1&ma_hd=$mahd");
} else {

  header("Location: ../index.php?cat=7.1&ma_hd=$mahd");
}
