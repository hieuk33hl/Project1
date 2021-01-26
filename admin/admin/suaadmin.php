
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
  $ma= $_GET["maadmin"];	
  $con = mysqli_connect("localhost", "root", "", "da1");
  $sql = "SELECT * FROM admin where maadmin=$ma";
  $result = mysqli_query($con, $sql);
 $admin= mysqli_fetch_array($result);
  mysqli_close($con);
  ?>
  <form action="suaadm.php" method="get">
	  
     <input type="hidden" name="maadmin" value="<?php echo $ma; ?>"><br>
    Tên: <input type="text" name="tenadmin" value='<?php echo $admin["ten_admin"] ?>'><br>
    tk: <input type="text" name="tk" value='<?php echo $admin["username"] ?>'><br>
	   mk: <input type="text" name="mk" value='<?php echo $admin["password"] ?>'><br>
	   email: <input type="email" name="email" value='<?php echo $admin["email"] ?>'><br>
	   sdt: <input type="text" name="sdt" value='<?php echo $admin["sdt"] ?>'><br>
	    Giới tính: <input type="radio" name="gioi-tinh" value="1" <?php
                                                                if ($admin["gt"] == 1) {
                                                                  echo "checked";
                                                                }
                                                                ?>>Nam
      <input type="radio" name="gioi-tinh" value="0" <?php
                                                      if ($admin["gt"] == 0) {
                                                        echo "checked";
                                                      }
                                                      ?>>Nữ <br>
	   diachi: <input type="text" name="diachi" value='<?php echo $admin["diachi"] ?>'><br>
	    quyen: <input type="radio" name="quyen" value="1" <?php
                                                                if ($admin["quyen"] == 1) {
                                                                  echo "checked";
                                                                }
                                                                ?>>superadmin
      <input type="radio" name="quyen" value="0" <?php
                                                      if ($admin["quyen"] == 0) {
                                                        echo "checked";
                                                      }
                                                      ?>> admin <br>
	  trạng thái<input type="radio" name="tt" value="1" <?php
                                                                if ($admin["trangthai"] == 1) {
                                                                  echo "checked";
                                                                }
                                                                ?>>on
      <input type="radio" name="tt" value="0" <?php
                                                      if ($admin["trangthai"] == 0) {
                                                        echo "checked";
                                                      }
                                                      ?>>off <br>
    <button> Sửa </button>
  </form>

</body>
</html>
