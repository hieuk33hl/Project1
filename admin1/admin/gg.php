<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	
		if (isset($_SESSION['quyen']) == true) {
		// Ngược lại nếu đã đăng nhập
		$permission = $_SESSION['quyen'];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($permission =='0') {
			// Nếu không phải admin thì xuất thông báo
			echo "Bạn không đủ quyền truy cập vào trang này<br>";
			
			exit();
		}
			
	}
	
	?><br>
	
</body>
</html>