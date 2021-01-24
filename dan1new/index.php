	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<style>
		#tong{
		
			width: 100%;
			height: 1100px;
			background: #9C9C9C;
		}
		#left{
			width: 20%;
			height: 100%;
			float: left;
		}
		#right{
			background: #FFFFFF;
			width: 80%;
			height: 100%;
			float: right;
		}
		ul{
		list-style-type: none;
		padding: 15px;
		
	}
		
	a{
		
		text-decoration: none;	
		font-size: 20px;
		}
	a:hover{
		background: #FAFAFA;
	}
	li:hover ul{
		display: block;
	}
	</style>

<body>
	<div id="tong">
		<div id="left">
    <ul>
    <li><a href="?cat=1">Quản lý admin</a>
      <ul>
          <li><a href="?cat=1.1">Xem admin</a></li>
	       <li><a href="?cat=1.2">Thêm admin</a></li>
		  <li><a href="?cat=1.3">Sửa admin</a></li>
		  <li><a href="?cat=1.4">Xóa admin</a></li>
      </ul>
    </li>
	<li><a href="?cat=2"> Thể loại </a>
	   <ul>
          <li><a href="?cat=2.1">Xem </a></li>
	      <li><a href="?cat=2.2">Thêm </a></li>
		  <li><a href="?cat=2.3">Sửa </a></li>
		  <li><a href="?cat=2.4">Xóa </a></li>
		</ul>
	</li>
		<li><a href="?cat=3">Hãng sản xuất</a>
		<ul>
          <li><a href="?cat=3.1">Xem </a></li>
	      <li><a href="?cat=3.2">Thêm </a></li>
		  <li><a href="?cat=3.3">Sửa </a></li>
		  <li><a href="?cat=3.4">Xóa </a></li>
		</ul>
		</li>

		<li><a href="?cat=4">Sản phẩm</a>
			<ul>
          <li><a href="?cat=4.1">Xem </a></li>
	      <li><a href="?cat=4.2">Thêm </a></li>
		  <li><a href="?cat=4.3">Sửa </a></li>
		  <li><a href="?cat=4.4">Xóa </a></li>
		</ul>
		</li>
	<li><a href="?cat=5">Khách hàng </a>
		 <li><a href="?cat=5.1">Xem </a></li>	
	      <li><a href="?cat=5.2">vô hiệu hóa </a></li>
	</li>
	<li><a href="?cat=6">Hóa đơn</a>
		<ul>
          <li><a href="?cat=6.1">Xem </a></li>
	      <li><a href="?cat=6.2">Thêm </a></li>
		  <li><a href="?cat=6.3">Xóa - sửa</a></li>
		</ul>
	</li>
		<li><a href="?cat=7">Hóa đơn chi tết</a>
		<ul>
          <li><a href="?cat=7.1">Xem </a></li>
	      <li><a href="?cat=7.2">Thêm </a></li>
		  <li><a href="?cat=7.3">Xóa - sửa</a></li>
		</ul>	
		</li>
	<li><a href="?cat=8">Bình luận</a>
		<ul>
          <li><a href="?cat=8.1">Xem </a></li>
		</ul>
	</li>
  </ul>	
<br> <a href="dangxuat.php" onclick="return confirm('Muốn đăng xuất không?');">Đăng xuất</a>
		</div>
	<div id="right">
   <?php
	if (isset($_GET["cat"])) {
    $cat = $_GET["cat"];
		
    switch ($cat) {
      case 1:
			
        break;
      case 1.1:
        include("../dan1/admin/xem-admin.php");
        break;
			 case 1.2:
      include("../dan1/admin/them-admin.php");
        break;
			case 1.3:
      include("../dan1/admin/sua-admin.php");
        break;
			case 1.4:
      include("../dan1/admin/xoa-admin.php");
        break;
	        case 2.1:
      include("../dan1/theloai/xem-tl.php");
        break;
		case 2.2:
	  include("../dan1/theloai/them-tl.php");
        break;
			case 2.3:
	  include("../dan1/theloai/sua-tl.php");
        break;
			case 2.4:
	  include("../dan1/theloai/xoa-tl.php");
        break;
			case 3.1:
      include("../dan1/hangsx/xem-hang.php");
        break;
		case 3.2:
	  include("../dan1/hangsx/them-hang.php");
        break;
			case 3.3:
	  include("../dan1/hangsx/sua-hang.php");
        break;
			case 3.4:
	  include("../dan1/hangsx/xoa-hang.php");
        break;
			case 4.1:
	  include("../dan1/sanpham/xem-sp.php");
        break;
			case 4.2:
	  include("../dan1/sanpham/them-sp.php");
        break;
			case 4.3:
	  include("../dan1/sanpham/sua-sp.php");
        break;
			case 4.4:
	  include("../dan1/sanpham/xoa-sp.php");
        break;
		case 5.1:
			include("../dan1/khachhang/xem-kh.php");
		break;
		case 5.2:
			include("../dan1/khachhang/vo-hieu-hoa.php");
		break;
		case 6.1:
			include("../dan1/hoadon/xem-hd.php");
		break;
			case 6.2:
			include("../dan1/hoadon/them-hd.php");
		break;
			case 6.3:
			include("../dan1/hoadon/xoa-sua-hd.php");
		break;
			case 7.1:
			include("../dan1/hdct/xem-hdct.php");
		break;
			case 7.2:
			include("../dan1/hdct/them-hdct.php");
		break;
			case 7.3:
			include("../dan1/hdct/sua-xoa-hdct.php");
		break;
			case 8.1:
			include("../dan1/binhluan/xem-bl.php");
		break;		
    }
  }
	?></div>
</div>
</body>
</html>