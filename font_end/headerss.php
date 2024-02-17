<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/tienda/tienda/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Nov 2022 15:28:46 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title></title>
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets_fontend/img/favicon.ico" type="image/x-icon"/>

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
          integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!--=== Bootstrap CSS ===-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Font-Awesome CSS ===-->
    <link href="assets_fontend/css/vendor/font-awesome.css" rel="stylesheet">
    <!--=== Plugins CSS ===-->
    <link href="assets_fontend/css/plugins.css" rel="stylesheet">
    <!--=== Helper CSS ===-->
    <link href="assets_fontend/css/helper.min.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="assets_fontend/css/style.css" rel="stylesheet">

    <!-- Modernizer JS -->
    <script src="assets_fontend/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <![endif]-->
</head>

<body>

<!--== Start Header Section ==-->
<header id="header-area">
    <!-- Start PreHeader Area -->
    <!-- End PreHeader Area -->

    <!-- Start Header Middle Area -->
    <div class="header-middle-area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-4 col-md-2 col-xl-3 m-auto text-center text-lg-left">
                    <a href="index.html" class="logo-wrap d-block">
                        <img src="assets/images/Airazor.png" alt="Airazor" class="img-fluid"
                             style="width: 100px;"/>

                    </a>
                </div>
                <!-- Logo Area End -->

                <!-- Search Box Area Start -->
                <div class="col-8 col-md-7 col- m-auto ">
                    <div class="search-box-wrap">
                        <form class="search-form d-flex" action="index.php?act=load_sp" method="POST">
                            <input type="text" name="search" placeholder="Gõ và nhấn enter"
                                   style="width: 609px; height: 61px;"/>
                            <!-- <button class="btn btn-search" name="tim" type="submit">
                            <img src="assets_fontend/img/icons/icon-search.png"
                                                            alt="Search Icon"/> -->
                            <input type="submit" name="tim" value="Tìm kiếm"
                                   style="width: 100px; height: 61px; color: white; background-color: #2192FF;">
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Search Box Area End -->

                <!-- Mini Cart Area Start -->
                <div class="col-12 col-md-3 col-xl-2 m-auto text-center text-lg-right mt-xs-15"
                     style="width: 220px">
                    <!--                    <div style="width: 20px; height: 20px; background-color: #F5EBE0; color: black; position: absolute; z-index: 1; margin-left: 90px; border-radius: 50px;">-->
                    <!---->
                    <!--                    </div>-->
                    <div class="minicart-wrapper" style="display: flex; gap: 30px; position: relative;">
                        <?php
                        // Kiểm tra giỏ hàng, nếu chưa tồn tại thì tạo mới
                        if (!isset($_SESSION['mua_cart'])) {
                            $_SESSION['mua_cart'] = array();
                        }

                        // Đếm số lượng đơn hàng
                        $total_orders = array_sum(array_column($_SESSION['mua_cart'], 4));
                        ?>

                        <a href="index.php?act=dohang">
                                <span class="position-absolute" id="cart-count"
                                      style="margin-left: 32px; font-size: 25px; color: red;"><?php echo $total_orders ?></span>
                            <i class="bi bi-basket" style="font-size: 35px; color: white;"></i>
                        </a>
                        <a href="index.php?act=load_bill">
                            <i class="bi bi-bag-check" style="font-size: 35px; color: white"></i>
                        </a>
                        <a href="index.php?act=login">
                            <i style="font-size: 35px; color: white" class="bi bi-box-arrow-in-right"></i>
                        </a>

                        <a href="index.php?act=myaccount">
                            <i style="font-size: 35px; color: white" class="bi bi-person-circle"></i>
                        </a>
                    </div>
                </div>
                <!-- Mini Cart Area End -->
            </div>
        </div>
    </div>
    <!-- End Header Middle Area -->

    <!-- Start Main Menu Area -->
    <div class="navigation-area" id="fixheader">
        <div class="container">
            <div class="row">
                <!-- Categories List Start -->
                <!-- Categories List End -->

                <!-- Main Menu Start -->
                <div class="col-2 col-lg-9 d-none d-lg-block">
                    <div class="main-menu-wrap">
                        <nav class="mainmenu">
                            <ul class="main-navbar clearfix">
                                <li class="dropdown-show"><a href="index.php?act=go_home" class="arrow-toggle">Trang
                                        chủ</a>
                                <li><a href="index.php?act=about">Về chúng tôi</a></li>
                                <li class="dropdown-show"><a href="index.php?act=show_product"
                                                             class="arrow-toggle">Sản
                                        phẩm</a>
                                    <ul class="mega-menu-wrap dropdown-nav">
                                        <li class="mega-menu-item"><a href="" class="mega-item-title">Danh mục</a>
                                            <ul>
                                                <?php
                                                foreach ($danhmuc_all as $key) {
                                                    extract($key);
                                                    $link = "index.php?act=load_sp&id_danhmuc= " . $id_danhmuc;
                                                    echo '
                                                        <li><a href="' . $link . '">' . $name_danhmuc . '</a></li>
                                                        ';
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Main Menu End -->
            </div>
        </div>
    </div>
    <!-- End Main Menu Area -->
</header>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  // Hàm để cập nhật số lượng sản phẩm trong giỏ hàng từ trang chi tiết sản phẩm
  function updateCartCount(count) {
    $("#cart-count").text(count);
  }
</script>

<!--== End Header Section ==-->