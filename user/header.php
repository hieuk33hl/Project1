<!DOCTYPE html>
<html lang="en">

<head>
  <title>Web bán giày</title>
  <link rel="stylesheet" href="../Font/fontawesome-free-5.15.1-web/css/all.min.css" />
  <link rel="stylesheet" href="../CSS/base.css" />
  <link rel="stylesheet" href="../CSS/main.css" />
  <link rel="stylesheet" href="../Font/LICENSE.txt" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
</head>

<body>

  <div class="app">
    <!-- phần đầu -->
    <header class="header">
      <div class="grid">
        <nav class="header_navbar">
          <ul class="header_navbar-list">
            <li class="header_navbar-item header_navbar-item-separate">
              <span class="no_pointer">Liên Hệ:</span><i class="fas fa-phone-alt"></i>
              <span class="sdt">0909300746</span>
            </li>
            <li class="header_navbar-item">
              <span class="no_pointer">Kết nối</span>
              <a href="" class="icon">
                <i class="header_navbar-item-icon fab fa-facebook"></i>
              </a>
              <a href="" class="icon">
                <i class="header_navbar-item-icon fab fa-instagram"></i>
              </a>
            </li>
          </ul>

          <ul class="header_navbar-list">
            <li class="header_navbar-item">
              <a href="" class="header_navbar-item-link">
                <i class="header_navbar-item-icon far fa-bell"></i>
                Thông báo
              </a>
            </li>
            <li class="header_navbar-item">
              <a href="" class="header_navbar-item-link">
                <i class="header_navbar-item-icon far fa-question-circle"></i>
                Trợ giúp
              </a>
            </li>

            <!-- Nếu không tồn tại Session id thì sẽ in ra đăng nhập, đăng xuất  -->
            <?php if (!isset($_SESSION['id_customer'])) : ?>

              <li class="header_navbar-item">
                <a href="register.php" class="header_navbar-item-link header_navbar-item-link-bold header_navbar-item-separate">Đăng kí</a>
              </li>
              <li class="header_navbar-item">
                <a href="login.php" class="header_navbar-item-link header_navbar-item-link-bold">Đăng nhập</a>
              </li>

            <?php else : ?>
              <li class="header_navbar-item">
                <a href="#" class="header_navbar-item-link header_navbar-item-link-bold header_navbar-item-separate" id="drop"> <span class="no_pointer-nobold">Xin chào </span><?= $_SESSION['fullname'] ?><i class="fas fa-caret-down"></i></a>

                <ul class="dropdown">
                  <li class="dropdown-item">
                    <a href="edit.php?=<?php echo $_SESSION['id_customer']; ?> "><i class="fas fa-user-circle"></i>Tài khoản của tôi</a>
                  </li>
                  <li class="dropdown-item">
                    <a href="order_list.php"><i class="far fa-copy"></i>Đơn hàng của tôi</a>
                  </li>
                  <li class="dropdown-item">
                    <a href="../process/logout_process.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                  </li>

                </ul>
              </li>
            <?php endif ?>

          </ul>
        </nav>

        <!-- thanh tìm kiêms vs logo vs giỏ hàng -->
        <div class="header_logo">
          <div class="header_logo-img">
            <a href="index.php"><img src="../img/chu.png" /></a>
          </div>
          <div class="header_logo-search">
            <form action="" method="GET">
              <div class="header_logo-search-input-wrap">
                <input type="text" name="name" value="<?= isset($_GET['name']) ? $_GET['name'] : " "; ?>" class="header_logo-search-input" placeholder="Nhập để tìm kiếm sản phẩm..." />
                <!-- search products -->
                <!-- <div class="header_logo-product">
                  <h3 class="header_logo-product-heading">
                    Danh Sách Sản Phẩm
                  </h3>
                  <ul class="header_logo-product-list">
                    <li class="header_logo-product-list-item">
                      <a href="">Giay Nike</a>
                    </li>
                    <li class="header_logo-product-list-item">
                      <a href="">Giay Adidas</a>
                    </li>
                  </ul>
                </div> -->
              </div>
              <div class="header_logo-btn">
                <button value="timkiem" type="submit "><i class="header_logo-btn-icon fas fa-search"></i></button>
              </div>
          </div>
          </form>
          <div class="header_logo-cart">
            <a href="cart.php"><i class="header_logo-cart-icon fas fa-shopping-cart"></i></a>
          </div>
        </div>
      </div>
    </header>
</body>

</html>