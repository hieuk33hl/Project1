<?php
session_start();
if (isset($_SESSION["username"])) {
  header("Location: giay.php");
} else {
  if (isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<style>
		#tong{
			width: 100%;
			height: 700px;
			background: #858585;
		}
		#mid{
			align-content: center;
			width:1050px;
			height:700px;
			background:url("anhh/meo3.jfif");
			position: absolute;
			right: 220px;
			
		}
		#form{
			position: absolute;
			top: 200px;
			left: 200px;
		}
	</style>
<body>
	<form  action="dangnhapad2.php" method="post">
		
		<div id="tong">
			<div id="mid">
				<div id="form">
				<p><font color="#E90003 " size="+3"><b>Tài khoản:</b></font></p><input type="text" name="username" value="<?php if (isset($_COOKIE["username"])) {
                                                      echo $username;
                                                    } ?>" required><br>
				<p><font color="#E90003 " size="+3"><b>Mật khẩu:</b></font></p><input type="password" name="password" value="<?php if (isset($_COOKIE["password"])) {
                                                      echo $password;
                                                    } ?>" required ><br><br>
					
					<p><font color="#E90003 " ><b>
						 <input type="checkbox"  name="remember" <?php
                                            if (isset($_COOKIE["user"])) {
                                              echo "checked";
                                            }
                                            ?>> Ghi nhớ mật khẩu <br>
						<?php
     						if (isset($_GET["err"])) {
						  echo "Sai tài khoản hoặc mật khẩu";
						}
						?>
						</b></font></p><br>
						<button>Đăng nhập</button>
				</div>
			</div>	
		</div>	
	</form>
</body>
</html>