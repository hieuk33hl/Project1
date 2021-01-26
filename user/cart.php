<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/png" href="../img/logo.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
	<title>Giỏ hàng</title>
	<link rel="stylesheet" href="../CSS/main.css">
	<link rel="stylesheet" href="../CSS/base.css">
</head>

<body>
	<?php include("header.php"); ?>
	<?php include("menu.php"); ?>

	<?php
	// error_reporting(0);
	$id_cus = $_SESSION['id_customer'];
	include("../Connection/open.php");
	$thanhtien = 0;
	$tongtien = 0;
	if (!isset($_SESSION["cart"])) {   //nếu chưa có session thì kahi báo nó dạng mảng
		$_SESSION["cart"] = array();
	}
	$error = false;
	$success = false;
	$GLOBALS['changed_cart'] = false;
	if (isset($_GET['action'])) {

		function cart_update($conn, $add = false)
		{
			foreach ($_POST['quantity'] as $id => $quantity) {
				if ($quantity == 0) {
					unset($_SESSION["cart"][$id]);
				} else {
					if (!isset($_SESSION["cart"][$id])) {
						$_SESSION["cart"][$id] = 0;
					}
					if ($add) {
						$_SESSION["cart"][$id] = $quantity + $_SESSION["cart"][$id];    //nếu tồn tại sản phẩm đó thì lần click tiếp theo sẽ tăng thêm
					} else {
						$_SESSION["cart"][$id] = $quantity;
					}
					$addProduct = mysqli_query($conn, "SELECT `sl_sp` FROM `san_pham` WHERE `ma_sp` = " . $id);
					$addProduct = mysqli_fetch_assoc($addProduct);
					if ($_SESSION["cart"][$id] > $addProduct['sl_sp']) {      // nếu số lương sản phẩm muốn mua nhiều hơn số lg sp trong database thì sẽ đưa về số lưognj tối đa trong DB
						$_SESSION["cart"][$id] = $addProduct['sl_sp'];
						$GLOBALS['changed_cart'] = true;
					}
				}
			}
		}
		switch ($_GET['action']) {
			case "add":
				cart_update($conn, true);
				if ($GLOBALS['changed_cart'] == false) {
					// header('Location:cart.php');
				}
				break;

			case "delete":
				if (isset($_GET['id'])) {
					unset($_SESSION["cart"][$_GET['id']]);
				}
				// header('Location: cart.php');
				break;

			case "submit":
				// var_dump("NULL,'" . $id_cus . "','" . $tongtien . "','" . $_POST['name'] . "','" . $_POST['address'] . "'," . $_POST['sdt'] . ",'" . $_POST['note'] . "','" . $_POST['email'] . "','" . date("Y-m-d H:i:s") . "'");
				// exit;
				if (isset($_POST['update'])) {               //nếu click vào nút update -> cũng như thêm sản phẩm vào giỏ hàng 
					cart_update($conn);
					// header('Location: cart.php');
				} elseif (isset(($_POST['order']))) {         //nếu click vào nút order -> Tiến hành đặt hàng

					if (empty($_POST['name'])) {
						$error = "Bạn chưa nhập tên của người nhận";
					} elseif (empty($_POST['sdt'])) {
						$error = "Bạn chưa nhập số điện thoại người nhận";
					} elseif (empty($_POST['address'])) {
						$error = "Bạn chưa nhập địa chỉ người nhận";
					} elseif (empty($_POST['email'])) {
						$error = "Bạn chưa nhập email người nhận";
					} elseif (empty($_POST['quantity'])) {
						$error = "Giỏ hàng rỗng vui lòng chọn sản phẩm vào gỉỏ hàng";
					}

					if (!empty($_POST['quantity']) && $error == false) {
						$tongtien = 0;
						$orderProducts = array();
						$updateString = "";
						//SELECT *FROM san_pham WHERE ma_sp IN (21,31)
						$result = mysqli_query($conn, "SELECT *FROM san_pham WHERE ma_sp IN (" . implode(",", array_keys($_POST['quantity'])) . ")");

						while ($row = mysqli_fetch_array($result)) {
							$orderProducts[] = $row;

							//xử lý số lươgnj đặt hàng lúc hàng thiếu
							if ($_POST['quantity'][$row['ma_sp']] > $row['sl_sp']) {     //nếu số lượng sản phẩm post lên > số sp có trong database thì đưa về = sl_sp trong database
								$_POST['quantity'][$row['ma_sp']] = $row['sl_sp'];
								$GLOBALS['changed_cart'] = true;
							} else {
								$tongtien += $row['gia_sp'] * $_POST['quantity'][$row['ma_sp']];

								//when ma_sp = 21 then sl_sp - 3
								$updateString .= " when ma_sp = " . $row['ma_sp'] . " then sl_sp - " . $_POST['quantity'][$row['ma_sp']];     //trừ sản phẩm trong databse lúc đặt hàng xong

							}
						}


						if ($GLOBALS['changed_cart'] == false) {  // nếu giỏ hàng k có gì thay dổi thì k làm bthuon
							//CASE WHEN ma_sp =1  THEN sl_sp - 3 ; WHEN ma_sp =2  THEN sl_sp - 6;END
							$updateQuantity = mysqli_query($conn, "update `san_pham` set sl_sp = CASE" . $updateString . " END where ma_sp in (" . implode(",", array_keys($_POST['quantity'])) . ")");
							//INSERT INTO `hoa_don` (`ma_hd`, `ma_kh`, `tong_tien`, `ten_nguoi_nhan`, `dia_chi`, `sdt`, `ghi_chu`, `email`, `ngay_nhap`) VALUES (NULL, '4', '1234567', 'minh hieu', 'ha noi', '0123456789', 'khong', 'admin@gmail.com', '2021-01-05 15:55:49');
							$sql_order = "INSERT INTO `hoa_don` (`ma_hd`, `ma_kh`, `tong_tien`, `ten_nguoi_nhan`, `dia_chi`, `sdt`, `ghi_chu`, `email`, `ngay_nhap`) VALUES (NULL,'" . $id_cus . "','" . $tongtien . "','" . $_POST['name'] . "','" . $_POST['address'] . "'," . $_POST['sdt'] . ",'" . $_POST['note'] . "','" . $_POST['email'] . "','" . date("Y-m-d H:i:s") . "');";
							$insertOrder = mysqli_query($conn, $sql_order);
							// var_dump($sql_order);
							// exit;
							$orderID = ($conn->insert_id);

							$insertString = "";
							foreach ($orderProducts as $key => $product) {
								//INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES (NULL, '29', '2', '1', '123', '123124112', '123124112');
								$insertString .= "(NULL, '" . $orderID . "', '" . $product['ma_sp'] . "', '" . $_POST['quantity'][$product['ma_sp']] . "', '" . $product['gia_sp'] . "','" . date("Y-m-d H:i:s") . "')";

								if ($key != count($orderProducts) - 1) {   //nếu key khác count -1 thì thêm dấu phẩy , nếu bằng thì dừng lại vì cuối câu sql k đc có dấu " , "
									$insertString .= ",";
								}
							}
							//INSERT INTO `hoa_don_ct` (`id`, `ma_don_hang`, `ma_sp`, `so_luong`, `gia_tien`) VALUES (NULL, '9', '29', '12', '12555');
							$insertOrder = mysqli_query($conn, "INSERT INTO `hoa_don_ct` (`id`, `ma_don_hang`, `ma_sp`, `so_luong`, `gia_tien`, `ngay_nhap`) VALUES " . $insertString . ";");
							$success = "Đặt hàng thành công";
							unset($_SESSION['cart']);
						}
					}
				}
				// header('Location: cart.php');
				break;
		}
	}
	if (!empty($_SESSION["cart"])) {
		$sql = "SELECT *FROM san_pham WHERE ma_sp IN (" . implode(",", array_keys($_SESSION["cart"])) . ")";  //". implode(",", array_keys($_POST['quantity'])) ."
		$result = mysqli_query($conn, $sql);
	}

	?>


	<section class="cart">
		<div class="grid">
			<div class="grid__row">
				<div class="grid__column10">
					<div class="cart-page">
						<?php if (!empty($error)) { ?>
							<div class="noti">
								<?= $error ?>. <a href="cart.php?action=submit">Quay lại</a>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } elseif (!empty($success)) { ?>
	<div class="noti">
		<?= $success ?>. <a href="index.php">Tiếp tục mua hàng</a> hoặc <a href="order_list.php">Xem đơn hàng của tôi</a>
	</div>
	</div>
	</div>
	</div>
	</div>
	</section>
<?php } else { ?>
	<?php if ($GLOBALS['changed_cart']) { ?>
		<h2> Do lượng sản phẩm tồn kho không đủ nên số lượng sản phẩm trong giỏ hàng cảu bạn đã thay đổi. Xin hãy <a href="cart.php" style="color:red;text-decoration:none;">tải lại </a> giỏ hàng</h2>
	<?php } else { ?>

		<form action="cart.php?action=submit" method="POST">

			<?php
								if (!empty($result)) {
									while ($row = mysqli_fetch_array($result)) {
			?>
					<div class="cart-item-info">
						<div class="img" style="background-image: url(../upload/<?= preg_replace('/\s+/', '', $row["anh_sp"]) ?>);"></div>
						<div class="price">
							<div class="name">
								<h3><a href="product_detail.php?ma_sp=<?= $row["ma_sp"] ?>"><?= $row["ten_sp"] ?></a></h3>
							</div>
							<div class="custom">
								<button onclick="giamsoluong()" type="button">
									<i class="fas fa-minus"></i>
								</button>
								<input id="inc" type="text" value="<?= $_SESSION["cart"][$row['ma_sp']] ?>" name="quantity[<?= $row['ma_sp'] ?>]">
								<button onclick=tangsoluong()" type="button">
									<i class="fas fa-plus"></i>
								</button>
								<p class="text">&nbsp;X&nbsp;<span class="textPrice"><?= number_format($row['gia_sp'], 0, ",", ".") ?></span></p>
							</div>
						</div>
						<div class="sumprice">

							&nbsp;&ensp;Thành tiền: <span class="textPrice"><?= number_format($thanhtien = $row['gia_sp'] * $_SESSION["cart"][$row['ma_sp']], 0, ",", ".") ?>&nbsp;VNĐ</span>
						</div>
						<div class="btn-cart">
							<a href="cart.php?action=delete&id=<?= $row['ma_sp'] ?>">
								<button class="btn-del" type="button">
									<i class="fa fa-times"></i>
								</button>
							</a>
						</div>
					</div>
				<?php
										$tongtien += $thanhtien;
									}
				?>
				<?php if (!empty($_SESSION['cart'])) { ?>

					<div class="money">
						<div class="total_price">
							<b>Tổng tiền:</b>
							<span class="textPrice"><?= number_format($tongtien, 0, ",", ".") ?>&nbsp;VNĐ</span>
						</div>
						<div class="buynext-btn">
							<button class="buynext" name="update">
								Cập nhật
							</button>
						</div>
					</div>

				<?php } ?>

			<?php
								}
			?>
			<div class="cart__info">
				<div class="cart__info-heading">
					<h2 class="cart__info-title" data-mask="Info">- Thông tin đơn hàng</h2>
				</div>
				<div class="cart__info-customer">
					<table cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<label>Họ tên </label>
								<input type="text" placeholder="Họ và tên" class="form-control" name="name">
							</td>
							<td class="right_td">
								<label>Số điện thoại</label>
								<input type="text" placeholder="Số điện thoại" class="form-control" name="sdt">
							</td>
						</tr>
						<tr>
							<td>
								<label>Email</label>
								<input type="Email" placeholder="Email" class="form-control" name="email">
							</td>
							<td class="right_td">
								<label>Địa chỉ nhận hàng</label>
								<input type="text" placeholder="Địa chỉ nhận hàng" class="form-control" name="address">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<label>Ghi chú </label>
								<textarea cols="30" rows="10" name="note"></textarea>
							</td>
						</tr>
					</table>
					<button name="order">
						Xác nhận đơn hàng
					</button>
				</div>
			</div>
		</form>
	<?php } ?>

	</div>

	</div>
	</div>
	</div>
	</div>
	</section>

<?php } ?>


</body>

</html>