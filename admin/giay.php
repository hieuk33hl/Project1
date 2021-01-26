<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: dangnhapadm.php");
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
</head>

<body>
	<?php
	include("index.php");
	?>

</body>
</html>