<?php
$total_products = count($listsanpham);
$total_comments = count($xuatBL);
$total_user = count($xuattk);
$total_bill = count($list_bill);
?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                        <!--begin::Page Title-->
                        <h1 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Tổng quan</h1>

                        <!--end::Page Title-->
                </div>
                <!--end::Info-->
        </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid py-5">
        <!--begin::Container-->
        <div class="container">
                <div class="container px-4">
                        <div class="row gx-5">
                                <div class="col">
                                        <div style="height: 150px; " class="p-3 border bg-light">
                                                <div class="d-flex p-6">
                                                        <img style="width: 90px;" src="../assets/images/box.png" alt="">
                                                        <div>
                                                                <p style="text-align: center; font-size: 15px;">
                                                                      <?php echo $total_products ?>
                                                                </p>
                                                                <h4>Sản phẩm</h4>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col">
                                        <div style="height: 150px; " class="p-3 border bg-light">
                                                <div class="d-flex p-6">
                                                        <img style="width: 90px;" src="../assets/images/comments.png"
                                                                alt="">
                                                        <div>
                                                                <p style="text-align: center; font-size: 15px;">
                                                                        <?php echo $total_comments ?>
                                                                </p>
                                                                <h4 style="">Bình luận</h4>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col">
                                        <div style="height: 150px; " class="p-3 border bg-light">
                                                <div class="d-flex p-6">
                                                        <img style="width: 90px;" src="../assets/images/target.png"
                                                                alt="">
                                                        <div>
                                                                <p style="text-align: center; font-size: 15px;">
                                                                        <?php echo $total_user ?>
                                                                </p>
                                                                <h4 style="">Thành viên</h4>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col">
                                        <div style="height: 150px; " class="p-3 border bg-light">
                                                <div class="d-flex p-6">
                                                        <img style="width: 90px;" src="../assets/images/bill.png"
                                                                alt="">
                                                        <div>
                                                                <p style="text-align: center; font-size: 15px;">
                                                                        <?php echo $total_bill ?>
                                                                </p>
                                                                <h4 style="">Đơn hàng</h4>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <!--end::Container-->

</div><!--end::Entry-->


