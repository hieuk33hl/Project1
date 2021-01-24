<!DOCTYPE html>
<html lang="en">

<head>
    <title>Web bán giày</title>
    <link rel="stylesheet" href="../Font/fontawesome-free-5.15.1-web/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/base.css" />
    <link rel="stylesheet" href="../CSS/main.css" />
    <link rel="stylesheet" href="../Font/LICENSE.txt" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/png" href="../img/logo.ico" />
</head>

<body>
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>

    <?php
    $notice = "";
    if (isset($_GET['success'])) {
        $notice = $_GET['success'];
        echo "
		<script>
			alert('$notice');
		</script>
		";
    }
    ?>



    <?php include("subcrise.php"); ?>
    <?php include("footer.php"); ?>
</body>

</html>