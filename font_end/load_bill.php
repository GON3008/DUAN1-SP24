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
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th class="text-dark pro-thumbnail">Mã đơn hàng</th>
                                <th class="text-dark pro-title" style="width: 30px;">Số lượng</th>
                                <th class="text-dark pro-price">Ngày đặt hàng</th>
                                <th class="text-dark pro-subtotal">Tổng Tiền</th>
                                <th class="text-dark">Phương thức thanh toán</th>
                                <th class="text-dark pro-thumbnail">Trạng thái</th>
                                <th class="text-dark pro-remove">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($list_bill)) {
                                foreach ($list_bill as $bill) {
                                    $xoasp = "index.php?act=delete_bill&id_bill=".$bill["id_bill"];
                                    extract($bill);
                                    $trang_thai_dh = get_ttdh($bill['status_bill']);
                                    $sl_sp = dem_sl_mat_hang($bill['id_bill']);

                                    // Check if the order is "Đơn hàng mới" and not yet paid
                                    $isCancelable = ($bill['status_bill'] == '0');

                                    echo '<tr>';
                                    echo '<td class="pro-thumbnail">' . $bill['id_bill'] . '</td>';
                                    echo '<td class="pro-title">' . $sl_sp . '</td>';
                                    echo '<td class="pro-price"><span>' . $bill['ngaydathang'] . '</span></td>';
                                    echo '<td class="pro-quantity">
                                   <div class="pro-qty">
                                   <p>' . $bill['tongtien_bill'] . '</p>
                                   </div>
                                   </td>';
                                    echo '<td><span>' . $payment_method= get_payment( $bill['pttt_bill']) . '</span> </td>';
                                    echo '<td class="pro-title">' . $trang_thai_dh . '</td>';

                                    // Display "Hủy Đơn Hàng" button if the order is cancelable
                                    if ($isCancelable) {
                                        echo '<td class="pro-title">
                                        <a href="' . $xoasp . '">
                                        <input style="color: #fff;background-color: #da542e;border-color: #da542e; border-radius: 2px; width: 150px; height: 35px; cursor: pointer;"  type="button" value="Hủy đơn hàng" class="check">
                                        </a>
                                        </td>';

                                    } else {
                                        echo '<td class="pro-title">Không thể hủy đơn hàng</td>'; // Empty cell if not cancelable
                                    }

                                    echo '</tr>';
                                }
                            }
                            ?>


                        </tbody>
                    </table>
                </div>

                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-lg-flex">
                    <div class="apply-coupon-wrapper">
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
                                foreach ($_SESSION['mua_cart'] as $bill) {
                                    $ttien = $bill[3] * $bill[4];
                                    $tongtien += $ttien;
                                    $format_number_1 = number_format($tongtien);
                                    $format_number_2 = number_format($bill[3]);
                                    echo '
                                <tr>
                                    <td>' . $bill[1] . '</td>
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
<div class="newsletter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 m-auto">
                <!-- Newsletter Content Start -->
                <div class="newsletter-content-wrap text-center text-lg-left d-lg-flex">
                    <h2><i class="fa fa-envelope-square"></i> Sign up for Newsletter</h2>
                    <div class="newsletter-form-wrap">
                        <form id="subscribe-form" action="https://htmlmail.hasthemes.com/raju/tienda-subscribe.php"
                            method="post">
                            <input type="email" name="newsletter_email" id="address"
                                placeholder="Enter Your Email Address" required />
                            <button class="btn" type="submit">Subscribe</button>
                        </form>
                        <!-- Show Error & Success Message -->
                        <div id="subscribeResult"></div>
                    </div>
                </div>
                <!-- Newsletter Content End -->
            </div>

            <div class="col-lg-3 m-auto text-center text-lg-right">
                <!-- Social Icons Area Start -->
                <div class="social-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
                <!-- Social Icons Area End -->
            </div>
        </div>
    </div>
</div>
<!--== End Newsletter Area ==-->
<script>
    function confirmDesactiv() {
        if (confirm("Chúc mừng bạn đã đặt hàng thành công"))
            return true;

        return false;
    }