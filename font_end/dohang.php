<!--== End Header Section ==-->

<!--== Start Page Breadcrumb ==-->
<!--== End Page Breadcrumb ==-->

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper">
    <div class="container">
        <!-- Cart Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-dark pro-thumbnail">Ảnh sản phẩm</th>
                            <th class="text-dark pro-title">Tên sản phẩm</th>
                            <th class="text-dark pro-price">Giá</th>
                            <th class="text-dark pro-subtotal">Số lượng</th>
                            <th class="text-dark pro-remove">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $tongtien = 0;
                        $totalQuantity = 0;
                        $i = 0;
                        foreach ($_SESSION['mua_cart'] as $cart) {
                            $hinh = "upload/" . $cart[2];
                            $ttien = $cart[3] * $cart[4];
                            $totalQuantity += $cart[4];
                            $format_number_1 = number_format($cart[3]);
                            $xoa_cart = '<a href="index.php?act=delete_cart&idcart=' . $i . '"><input type="button" value="Xóa"></a>';
                            echo '
                                    <tr>
                                    <td class="pro-thumbnail"><img class="img-fluid" src="' . $hinh . '"
                                                                       alt="Product"/></td>
                                    <td class="pro-title">' . $cart[1] . '</td>
                                    <td class="pro-price"><span>' . $format_number_1 . 'Đ</span></td>
                                    <td class="pro-quantity">
                                    <div class="pro-qty">
                                    <a href="index.php?act=minus_action&idcart=' . $i . '">-</a>
                                    <input type="number" id="quantity<?php echo $i; ?>" name="soluong" min="1" disabled value=' . $cart[4] . '>
                                    <a href="index.php?act=plus_action&idcart=' . $i . '">+</a> 
                                    </div>
                                    </td>
                                    <td class="pro-remove">' . $xoa_cart . '</td>
                                    </tr>
                                    ';
                            $i += 1;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-lg-flex">
                    <div class="apply-coupon-wrapper">
                    </div>
                    <div class="cart-update">
                        <?php
                        if (isset($_SESSION['user']['id_tk'])) {
                            // Kiểm tra xem giỏ hàng có sản phẩm không
                            if (!empty($_SESSION['mua_cart'])) {
                                echo '<a href="index.php?act=dat_hang" class="btn">Xác nhận đơn hàng</a>';
                            } else {
                                echo '<span class="btn disabled text-danger">Giỏ hàng trống. Thêm sản phẩm vào giỏ hàng trước khi xác nhận đơn hàng.</span>';
                            }
                        } else {
                            echo '<a href="index.php?act=dohang" onclick="confirmDesactiv1()" class="btn">Xác nhận đơn hàng</a>';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 ms-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <h3>Tổng số giỏ hàng</h3>
                    <div class="cart-calculate-items">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <?php
                                $tongtien = 0;
                                $format_number_1 = 0;
                                foreach ($_SESSION['mua_cart'] as $cart) {

                                    $ttien = $cart[3] * $cart[4];
                                    $tongtien += $ttien;
                                    $format_number_1 = number_format($tongtien);
                                    $format_number_2 = number_format($cart[3]);
                                    echo '
                                <tr>
                                    <td>' . $cart[1] . '</td>
                                    <td>' . $format_number_2 . '</td>
                                </tr>
                                ';
                                }
                                echo '
                            <tr>
                                <td>Tổng tiền</td>
                                <td class="total-amount">' . $format_number_1 . 'Đ</td>
                            </tr>
                            ';
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->

<!--== Start Newsletter Area ==-->
<!--== End Newsletter Area ==-->
<script>
    function confirmDesactiv() {
        if (confirm("Chúc mừng bạn đã đặt hàng thành công"))
            return true;

        return false;
    }

    function confirmDesactiv1() {
        if (confirm("Xin vui lòng nhập Tài khoản!")){
            window.location.href = "index.php?act=login";
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




<!-- <a href="index.php?act=minus_action&idcart=' . $i . '">-</a>
<input type="number" id="quantity_<?php echo $i; ?>" name="soluong" min="1" disabled value=' . $cart[4]. '>
<a href="index.php?act=plus_action&idcart=' . $i . '">+</a> -->