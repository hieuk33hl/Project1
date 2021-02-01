<?php session_start(); ?>
<?php
$id_sp = $_GET["ma_sp"];
include("../Connection/open.php");
$sql = "SELECT *from san_pham where ma_sp='$id_sp' ";
$result = mysqli_query($conn, $sql);
$sp = mysqli_fetch_array($result);

// lay size giay
// $sql2 = "SELECT *from size where id_sanpham='$id_sp' ";

$result2 = mysqli_query($conn, "SELECT *from size where id_sanpham='$id_sp' ORDER BY `size`.`size` ASC");
include("../Connection/close.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/base.css">
	<link rel="stylesheet" href="../CSS/main.css">
	<link rel="shortcut icon" type="image/png" href="../img/logo.ico" />
	<title>Document</title>
</head>

<body>
	<?php include("header.php"); ?>
	<?php include("menu.php"); ?>
	<section class="detail">
		<div class="grid">
			<div class="grid__row">
				<div class="grid__column10">
					<div class="grid__column1">

						<form <?php if (isset($_SESSION['id_customer'])) { ?> action="cart.php?action=add" <?php } else { ?> action="login.php" <?php } ?> method="POST">
							<div class="detail-thumnail">
								<div class="detail-thumnail__img" style="background-image: url(../upload/<?= preg_replace('/\s+/', '', $sp["anh_sp"]) ?>);">
								</div>
							</div>
							<div class="detail-info">
								<div class="detail-info__rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
									<i class="far fa-star"></i>
								</div>
								<h1 class="detail-info__heading">
									<?php echo $sp["ten_sp"]; ?>
								</h1>
								<h3 class="detail-info__price">
									<?= number_format($sp['gia_sp'], 0, ",", ".") ?>&nbsp;VNĐ
								</h3>
								<div class="detail-info__size">
									<span>Chọn size</span> <br>

									<input type="radio" name="size" value="<?= $sp['size'] ?>"><span id="text-size"><?= $sp['size'] ?></span>

									<div class="tonkho">
										<span>Tồn kho:<strong><?= $sp["sl_sp"] ?></strong></span>
									</div>
								</div>
								<div class="detail-info__number">
									<div class="custom">
										<button onclick="giamsoluong()" type="button">
											<i class="fas fa-minus"></i>
										</button>
										<form action="">
											<?php if ($sp["sl_sp"] == 0) { ?>
												<input id="inc" type="text" name="quantity[<?= $sp["ma_sp"] ?>]" value="0" disabled>
											<?php } else { ?>
												<input id="inc" type="text" name="quantity[<?= $sp["ma_sp"] ?>]" value="1">
											<?php }	?>
										</form>
										<button onclick=tangsoluong() type="button">
											<i class="fas fa-plus"></i>
										</button>
									</div>
									<script>
										var i = 0;

										function tangsoluong() {
											var value = parseInt(document.getElementById('inc').value);
											if (value + 1 <= <?= $sp["sl_sp"] ?>) {
												document.getElementById('inc').value = ++i;
											}
										}

										function giamsoluong() {
											var value = document.getElementById('inc').value;
											if (value - 1 > 0) {
												document.getElementById('inc').value = --i;
											}
										}
									</script>
								</div>
								<div class="detail-info__add">
									<?php if ($sp["sl_sp"] == 0) { ?>

										<button class="btn-hethang" type="button" disable>
											Hết hàng
										</button>

									<?php } else { ?>

										<button class="btn">
											Thêm vào giỏ
										</button>

										<button class="detail-info__add-btn">
											Đến giỏ hàng
										</button>

									<?php }	?>


								</div>
						</form>
						<div class="detail-info__phone">
							<span>
								Hoặc đặt mua: <a href="">0909300746</a>
								( Tư vấn Miễn phí )
							</span>
						</div>
						<div class="detail-info__free">
							<div class="detail-info__free-ship">
								<strong>Free Ship</strong>
								tại khu vực Hà Nội
							</div>
						</div>
					</div>
					<div class="detail-content">
						<div class="detail-content-item">
							<p>
								<strong>KINGSHOES.VN</strong>
								✓15 Ngày Đổi Hàng ✓Giao Hàng Miễn Phí ✓Thanh Toán Khi Nhận Hàng ✓Bảo Hành Hàng Chính Hãng Trọn Đời.!!!
							</p>
							<p>
								<strong>KINGSHOES.VN "You're King In Your&nbsp;Way".!!!&nbsp;</strong>
							</p>
							<p>
								<strong>KING'S &amp; QUEEN'S Check in Tại KINGSHOES.VN</strong>
							</p>
							<p>
								Đến với "KINGSHOES.VN”quý khách hàng sẽ có những sản phẩm ưng ý nhất, chất lượng phục vụ tốt và giá thành tốt nhất, cùng những“ Chương Trình Khuyến Mãi Đặc Biệt”.
							</p>
							<p>
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.663697490385!2d105.82951101429741!3d21.006113793928428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab87520578f1%3A0x561b2de8490c0c9c!2zVmluY29tIENlbnRlciBQaOG6oW0gTmfhu41jIFRo4bqhY2g!5e0!3m2!1sen!2s!4v1610739087584!5m2!1sen!2s" width="969" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<?php include("subcrise.php"); ?>
	<?php include("footer.php"); ?>
</body>

</html>