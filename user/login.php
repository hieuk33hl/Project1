<?php
if (isset($_GET['success'])) {
  $notice = $_GET['success'];
  echo "
  <script>
    alert('$notice');
  </script>
  ";
}
if (isset($_SESSION["username"])) {
  header("location: index.php");
} else {
  if (isset($_COOKIE["user"])) {
    $username = $_COOKIE["user"];
    $password = $_COOKIE["pass"];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web bán giày</title>
  <link rel="stylesheet" href="../CSS/login.css" />
  <link rel="shortcut icon" type="image/png" href="../img/logo.ico" />
</head>

<body>
  <?php include("header.php"); ?>
  <?php include("menu.php"); ?>
  <form action="../process/login_process.php" method="post">
    <div id="login">
      <h1>ĐĂNG NHẬP</h1>
      <input type="text" name="username" placeholder="Tên đăng nhập" value="<?php if (isset($_COOKIE["user"])) {
                                                                              echo $username;
                                                                            } ?>" required>
      <input id="pass" type="password" name="password" placeholder="Mật khẩu" value="<?php if (isset($_COOKIE["user"])) {
                                                                                        echo $password;
                                                                                      } ?>" required><br>
      <i class="far fa-eye" onclick="an_hien_pass()"></i>
      <input type="checkbox" name="remember" <?php if (isset($_COOKIE["user"])) {
                                                echo "checked";
                                              } ?>> <span>Ghi nhớ mật khẩu</span> <br> <br>
      <span id="err">
        <?php
        if (isset($_GET["error"])) {
          echo "Sai tên đăng nhập hoặc mật khẩu";
        }
        ?>
      </span><br>
      <button>Đăng Nhập</button> <br>

      <span>Nếu bạn chưa có tài khoản</span> <a href="register.php">Đăng kí</a>
    </div>
  </form>

  <script type="text/javascript">
    var check = true;

    function an_hien_pass() {

      if (check) {
        document.getElementById('pass').type = "text";
        check = false;
      } else {
        document.getElementById('pass').type = "password";
        check = true;
      }
    }
  </script>

  <?php include("subcrise.php"); ?>
  <?php include("footer.php"); ?>

</body>

</html>