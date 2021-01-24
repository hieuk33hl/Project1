<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<?php
	include("../Connection/open.php");
	$sql = "SELECT *from san_pham ";
	$result = mysqli_query($conn, $sql);
	include("../Connection/close.php");
	?>

	<?php while ($sp = mysqli_fetch_array($result)) { ?>
		<div>
			<img src="../upload/<?= $sp['anh_sp'] ?>">
		</div>
	<?php  } ?>
</body>

</html>