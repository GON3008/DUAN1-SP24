<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets_fontend/assets/img/favicon.png" rel="icon">
    <link href="assets_fontend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets_fontend/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets_fontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets_fontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets_fontend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets_fontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets_fontend/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets_fontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets_fontend/assets/css/style.css" rel="stylesheet">


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
    <link rel="stylesheet" href="assets_fontend/css/style.scss">
    <link rel="stylesheet" href="assets_fontend/css/search.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Modernizer JS -->
    <script src="assets_fontend/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- =======================================================
    * Template Name: Arsha
    * Updated: Jan 09 2024 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
        <a href="index.php?act=go_home">
            <img width="12%" src="assets_fontend/img/design.png" alt="">
        </a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="index.php?act=go_home">Home</a></li>
                <li><a class="nav-link scrollto" href="index.php?act=about">About</a></li>
                <li class="dropdown"><a href="index.php?act=show_product"><span>Product</span> <i
                                class="bi bi-chevron-down"></i></a>
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
                <li>
                    <!-- search -->
                </li>
                <!--                <li>-->
                <!--                    --><?php
                //                    // Kiểm tra giỏ hàng, nếu chưa tồn tại thì tạo mới
                //                    if (!isset($_SESSION['mua_cart'])) {
                //                        $_SESSION['mua_cart'] = array();
                //                    }
                //
                //                    // Đếm số lượng đơn hàng
                //                    $total_orders = array_sum(array_column($_SESSION['mua_cart'], 4));
                //                    ?>
                <!--                    <a class="nav-link scrollto" href="index.php?act=dohang">-->
                <!--              <span class="position-absolute" id="cart-count" style="margin-left: 32px; font-size: 25px; color: red;">-->
                <!--                --><?php //echo $total_orders ?>
                <!--              </span>-->
                <!--                        <i class="bi bi-basket" style="font-size: 30px; color: white;"></i>-->
                <!--                    </a>-->
                <!--                </li>-->

                <li>
                    <?php
                    // Kiểm tra giỏ hàng, nếu chưa tồn tại thì tạo mới
                    if (!isset($_SESSION['mua_cart'])) {
                        $_SESSION['mua_cart'] = array();
                    }

                    // Đếm số lượng đơn hàng
                    $total_orders = array_sum(array_column($_SESSION['mua_cart'], 4));
                    ?>
                    <a class="nav-link scrollto" href="index.php?act=dohang">
        <span class="position-absolute" id="cart-count" style="margin-left: 32px; font-size: 25px; color: red;">
            <?php echo $total_orders ?>
        </span>
                        <i class="bi bi-basket" style="font-size: 30px; color: white;"></i>
                    </a>
                </li>


                <li class="dropdown">
                    <a href="#">
                        <i style="font-size: 30px; color: white" class="bi bi-person-circle"></i>
                    </a>
                    <ul>
                        <?php
                        // Kiểm tra xem người dùng đã đăng nhập hay chưa
                        if (isset($_SESSION['user'])) {
                            // Nếu đã đăng nhập, hiển thị các tùy chọn tài khoản và đơn hàng
                            echo '<li><a href="index.php?act=myaccount">Tài khoản</a></li>';
                            echo '<li><a href="index.php?act=load_bill">Đơn hàng</a></li>';
                            // Thêm tùy chọn đăng xuất
                            echo '<li><a href="index.php?act=log_out">Đăng xuất</a></li>';
                        } else {
                            // Nếu chưa đăng nhập, hiển thị tùy chọn đăng nhập
                            echo '<li><a href="index.php?act=login">Đăng nhập</a></li>';
                        }
                        ?>
                    </ul>
                </li>

                <!-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->

<div class="slider-area-wrap">
    <div class="home-slider-carousel owl-carousel">
        <div class="single-slide-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-text">
                            <h2>Canvas Gear</h2>
                            <h3>Rất nhiều mặt hàng chính hãng</h3>
                            <h4>Và phần quà đang chờ bạn</h4>
                            <a href="index.php?act=show_product" class="btn">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-slide-item slide-item_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-text">
                            <h2>Ajaira Mobile</h2>
                            <h3>Rất nhiều mặt hàng chính hãng</h3>
                            <h4>Và phần quà đang chờ bạn</h4>
                            <a href="index.php?act=show_product" class="btn">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-slide-item slide-item_3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-text">
                            <h2>HasMobile</h2>
                            <h3>Rất nhiều mặt hàng chính hãng</h3>
                            <h4>Và phần quà đang chờ bạn</h4>
                            <a href="index.php?act=show_product" class="btn">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


<!-- Template Main JS File -->
<script src="assets_fontend/assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!--<script>-->
<!--    // Hàm để cập nhật số lượng sản phẩm trong giỏ hàng từ trang chi tiết sản phẩm-->
<!--    function updateCartCount(count) {-->
<!--        $("#cart-count").text(count);-->
<!--    }-->
<!---->
<!--    document.addEventListener("touchstart", function () {-->
<!--    }, true);-->
<!--</script>-->



</body>

</html>