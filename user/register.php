<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web bán giày</title>
    <link rel="stylesheet" href="../CSS/register.css" />
    <link rel="shortcut icon" type="image/png" href="../img/logo.ico" />
    <script type="text/javascript" src="../JS/function.js"></script>
    <script src='https://cdn.jsdelivr.net/g/lodash@4(lodash.min.js+lodash.fp.min.js)'></script>
</head>

<body>
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>
    <form action="../process/register_process.php" method="POST" id="form">
        <div id="login">
            <h2>ĐĂNG KÍ TÀI KHOẢN</h2>
            <input type="text" name="fname" placeholder="Họ và tên" id="fullname"> <span id="fullname-err" class="err-notice"></span>
            <input type="email" name="email" placeholder="Email" id="email"><span id="email-err" class="err-notice"></span>
            <input type="text" name="pnumber" placeholder="Số điện thoại" id="phone"><span id="phone-err" class="err-notice"></span>
            <input type="text" name="username" placeholder="Tên đăng nhập" id=""><span id="fullname-err" class="err-notice"></span>
            <input type="password" name="password" placeholder="Mật khẩu" id="password"><span id="password-err" class="err-notice"></span> <br>

            <?php if (isset($_GET['err'])) { ?>
                <span class="err" style="color: red;">
                    <?= $_GET['err'] ?>
                </span>
            <?php } ?>
            <button onclick="register();">Đăng Kí</button> <br>
            <span>Nếu bạn đã có tài khoản</span> <a href="login.php">Đăng nhập</a>
        </div>
    </form>
    <?php include("subcrise.php"); ?>
    <?php include("footer.php"); ?>

</body>

</html>