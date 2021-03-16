<?php
// session_start();
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
</head>
<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	body {
		font-family: sans-serif;
		font-size: 18px;
	}

	#tong {

		width: 100%;
		/* height: 1500px; */
		background: #9C9C9C;
		position: absolute;
	}

	#left {
		width: 20%;
		/* height: 100%; */
		float: left;
		position: absolute;
	}

	#right {
		background: #FFFFFF;
		width: 80%;
		/* height: 100%; */
		float: right;
	}

	#left .submenu {
		position: absolute;
		left: 270px;
		top: 0px;
	}

	ul.root>li {

		list-style: none;
		position: relative;
		background: #027FFF;
	}

	ul.root>li>a {
		text-decoration: none;
		color: #fff;
		border: 1px solid #ccc;
		padding: 0px 20px 0px 20px;
		line-height: 50px;
		display: block;
	}

	ul.root>li>a:hover {
		background-color: yellow;
		color: red;

	}

	ul.submenu {
		width: 100%;
		background: #868686;
		min-height: 80px;


	}

	ul.submenu li {
		list-style: none;
	}

	ul.submenu li a {
		text-transform: none;
		text-decoration: none;
		color: #fff;
		display: block;
		border: 1px solid #ccc;
		line-height: 40px;
		text-indent: 50px;

	}

	ul.root>li:hover ul.submenu {
		display: block;

		background-color: #868686;
		color: red;


	}

	ul.submenu li a:hover {
		background-color: yellow;
		color: red;

	}

	li ul {
		display: none;
	}

	li:hover ul {
		display: block;
	}

	.header .logo {
		position: absolute;
		left: 0;
		bottom: -5px;
	}

	.header .name {
		text-align: right;
		position: absolute;
		right: 10px;
		top: 10px;
	}

	.header {
		background-color: #868686;
		position: relative;
		height: 50px;
	}

	.bold-text {
		font-weight: bold;
	}

	.root2 a {
		color: black;
		text-decoration: none;
	}

	.root2 a:hover {
		color: white;
	}

	.root2 li {
		list-style: none;
	}
</style>

<body>
	<div class="header">
		<div class="logo">
			<img src="../img/chu.png" width="150px" height="50px">
		</div>
		<div class="name">

			<ul class="root2">
				<li><a href="dangxuat.php" onclick="return confirm('Muốn đăng xuất không?')">Đăng xuất </a></li>
			</ul>
		</div>
	</div>
	<div id=" tong">
		<div id="left">
			<ul class="root">
				<li><a href="?cat=1">Quản lý admin</a>
					<ul class="submenu">
						<li><a href="?cat=1.1">Xem admin</a></li>
						<li><a href="?cat=1.2">Thêm admin</a></li>
						<li><a href="?cat=1.3">Xóa - sửa</a></li>
					</ul>
				</li>
				<li><a href="?cat=2"> Thể loại </a>
					<ul class="submenu">
						<li><a href="?cat=2.1">Xem </a></li>
						<li><a href="?cat=2.2">Thêm </a></li>
						<li><a href="?cat=2.3">Xóa - sửa</a></li>
					</ul>
				</li>
				<li><a href="?cat=3">Hãng sản xuất</a>
					<ul class="submenu">
						<li><a href="?cat=3.1">Xem </a></li>
						<li><a href="?cat=3.2">Thêm </a></li>
						<li><a href="?cat=3.3">Xóa - sửa</a></li>
					</ul>
				</li>

				<li><a href="?cat=4">Sản phẩm</a>
					<ul class="submenu">
						<li><a href="?cat=4.1">Xem </a></li>
						<li><a href="?cat=4.2">Thêm </a></li>
						<li><a href="?cat=4.3">Xóa - sửa</a></li>
					</ul>
				</li>
				<li><a href="?cat=5">Khách hàng </a>
					<ul class="submenu">
						<li><a href="?cat=5.1">Xem </a></li>
						<li><a href="?cat=5.2">vô hiệu hóa </a></li>
					</ul>
				</li>
				<li><a href="?cat=6">Hóa đơn</a>
					<ul class="submenu">
						<li><a href="?cat=6.1">Xem </a></li>
						<li><a href="?cat=6.4">tình trạng </a></li>
					</ul>
				</li>


			</ul>

		</div>
		<div id="right">
			<?php
			if (isset($_GET["cat"])) {
				$cat = $_GET["cat"];

				switch ($cat) {
					case 1:

						break;
					case 1.1:
						include("../admin/admin/xem-admin.php");
						break;
					case 1.2:
						include("../admin/admin/them-admin.php");
						break;
					case 1.3:
						include("../admin/admin/xoa-sua-admin.php");
						break;
					case 2.1:
						include("../admin/theloai/xem-tl.php");
						break;
					case 2.2:
						include("../admin/theloai/them-tl.php");
						break;
					case 2.3:
						include("../admin/theloai/xoa-sua-tl.php");
						break;
					case 3.1:
						include("../admin/hangsx/xem-hang.php");
						break;
					case 3.2:
						include("../admin/hangsx/them-hang.php");
						break;
					case 3.3:
						include("../admin/hangsx/xoa-sua-hang.php");
						break;
					case 4.1:
						include("../admin/sanpham/xem-sp.php");
						break;
					case 4.2:
						include("../admin/sanpham/them-sp.php");
						break;
					case 4.3:
						include("../admin/sanpham/xoa-sua-sp.php");
						break;
					case 5.1:
						include("../admin/khachhang/xem-kh.php");
						break;
					case 5.2:
						include("../admin/khachhang/vo-hieu-hoa.php");
						break;
					case 6.1:
						include("../admin/hoadon/xem-hd.php");
						break;
					case 6.2:
						include("../admin/hoadon/them-hd.php");
						break;
					case 6.3:
						include("../admin/hoadon/xoa-sua-hd.php");
						break;
					case 6.4:
						include("../admin/hoadon/tinh_trang.php");
						break;
					case 7.1:
						include("../admin/hdct/xem-hdct.php");
						break;
					case 7.2:
						include("../admin/hdct/them-hdct.php");
						break;
					case 7.3:
						include("../admin/hdct/sua-xoa-hdct.php");
						break;
					case 8.1:
						include("../admin/binhluan/xem-bl.php");
						break;
				}
			}
			?></div>
	</div>
</body>

</html>