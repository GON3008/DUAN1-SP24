<?php

session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "global.php";
include "model/taikhoan.php";
include "model/danh_muc.php";
include "model/cart.php";
include_once "config_vnpay.php";
$danhmuc_all = load_danh_all();
include "font_end/header.php";
$spnew = load_sp_home();
$spnew1 = load_sp_home2();
$spnew2 = load_sp_home1();
$spnew3 = load_sp_home3();
$spnew4 = load_sp_home4();
$spnew5 = load_sp_home5();
$spnew6 = load_sp_home6();
$spnew7 = load_sp_home7();

$code_order = rand(0, 99999);

if (!isset($_SESSION['mua_cart']))
    $_SESSION['mua_cart'] = [];

if (!isset($_SESSION['cart']))
    $_SESSION['cart'] = [];

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanphamct':
            if (isset($_GET["id_sp"]) && ($_GET['id_sp'] > 0)) {
                $id = $_GET['id_sp'];
                $one_sp = load_one_sanpham($id);
                extract($one_sp);
                $sp_cung_loai = sanpham_cungloai($id, $id_danhmuc);
                include "font_end/detail.php";
            }
            if (isset($_POST['add_to_cart']) && ($_POST['add_to_cart'])) {
                $id_sp = $_POST['id_sp'];
                $name_sp = $_POST['name_sp'];
                $img_sp = $_POST['img_sp'];
                $price_sp = $_POST['price_sp'];
                $soluong = $_POST['soluong'];
                $sp_add_to_cart = [$id_sp, $name_sp, $img_sp, $price_sp, $soluong];
                array_push($_SESSION['mua_cart'], $sp_add_to_cart);
        case 'go_home':
            $list_bill = load_all_bill1();
            include "font_end/home.php";
            break;
        case 'login':
            include "font_end/login-register.php";
            break;
            case 'dangky':
                if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $name_tk = $_POST['name_tk'];
                    $pass_tk = $_POST['pass_tk'];
                    $email_tk = $_POST['email_tk'];
                    $address_tk = $_POST['address_tk'];
                    $tel_tk = $_POST['tel_tk'];
                    insert_taikhoan($name_tk, $pass_tk, $email_tk, $address_tk, $tel_tk);
                    $thongbao = "chúc mừng bạn đã đăng ký thành công";
                }
                include "font_end/login-register.php";
                break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $name_tk = $_POST['name_tk'];
                $pass_tk = $_POST['pass_tk'];
                $email_tk = $_POST['email_tk'];
                $address_tk = $_POST['address_tk'];
                $tel_tk = $_POST['tel_tk'];
                insert_taikhoan($name_tk, $pass_tk, $email_tk, $address_tk, $tel_tk);
                $thongbao = "chúc mừng bạn đã đăng ký thành công";
            }
            include "font_end/login-register.php";
            break;
            case 'dangnhap':
                if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    $name_tk = $_POST['name_tk'];
                    $pass_tk = $_POST['pass_tk'];
                    $checktk = checklogin($name_tk, $pass_tk);
                    if ($checktk) {
                        $_SESSION['user'] = $checktk;
                        $thongbao = "Đăng nhập thành công";
                        // include "font_end/login-register.php";
                    } else {
                        $thongbao = "Đăng nhập Thất bại xin vui lòng nhập lại";
                        // include "font_end/login-register.php";
                    }
                    include "font_end/login-register.php";
                }
                $yourURL = "http://localhost/DuAnLapTop/DuAnLapTop/index.php?";
                echo ("<script>location.href='$yourURL'</script>");
                break;
        case 'myaccount':

            include "font_end/my-account.php";
            break;
            case 'log_out':
                session_unset();
                $yourURL = "http://localhost/DuAnLapTop/DuAnLapTop/index.php?";
                echo ("<script>location.href='$yourURL'</script>");
                include "font_end/my-account.php";
    
                break;
        case 'dohang':
            // $yourURL = "http://duanlaptop.test/index.php?act=dohang";
            // echo ("<script>location.href='$yourURL'</script>");
            include "font_end/dohang.php";
            break;
        case 'cart':
            if (isset($_POST['add_to_cart']) && ($_POST['add_to_cart'])) {
                $id_sp = $_POST['id_sp'];
                $name_sp = $_POST['name_sp'];
                $img_sp = $_POST['img_sp'];
                $price_sp = $_POST['price_sp'];
                $soluong = $_POST['soluong'];

                $sp_add_to_cart = [$id_sp, $name_sp, $img_sp, $price_sp, $soluong];

                // Check if the product already exists in the cart
                $product_exists = false;
                foreach ($_SESSION['mua_cart'] as $product) {
                    if ($product[0] == $id_sp) {
                        $product_exists = true;
                        break;
                    }
                }

                if ($product_exists) {
                    // Product already exists in the cart, notify the user
                    echo '
                    <script>
                        alert("Sản phẩm đã được thêm vào giỏ hàng");
                    </script>
                    ';
                } else {
                    // Product doesn't exist in the cart, add it to the cart
                    array_push($_SESSION['mua_cart'], $sp_add_to_cart);
                    $yourURL = "http://duanlaptop.test/index.php?act=dohang";
                    echo ("<script>location.href='$yourURL'</script>");

                }
            }
            include "font_end/home.php";
            break;

       



        case 'delete_bill':
            if (isset($_GET['id_bill']) && ($_GET['id_bill'] > 0)) {
                delete_bill($_GET['id_bill']);
                delete_bill1($_GET['id_bill']);
            }
            if (isset($_POST['kwn']) && ($_POST['kwn'] != "")) {
                $kwn = $_POST['kwn'];
            } else {
                $kwn = "";
            }
            $list_bill = load_all_bill1($kwn, 0);
            $yourURL = "http://duanlaptop.test/index.php?act=load_bill";
            echo ("<script>location.href='$yourURL'</script>");
            include "admin/bill/list_bill.php";
            break;

        case 'dat_hang':
            include 'font_end/dat_hang.php';
            break;


        case 'bill_confirm':
            if (isset($_POST['redirect']) && ($_POST['redirect'])) {
                if (isset($_SESSION['user'])) {
                    $userid = $_SESSION['user']['id_tk'];
                } else {
                    $id = 0;
                }

                if ($_POST['name_tk'] == "" || $_POST['email_tk'] == "" || $_POST['address_tk'] == "" || $_POST['tel_tk'] == "") {
                    echo '
                     <script>
                         function thongbao(){
                             alert("Xin vui lòng nhập vào ô trống !");
                         }
                         thongbao();
                     </script>
                 ';
                    include "font_end/dat_hang.php";
                } else {
                    if (isset($_POST['paymentmethod'])) {
                        $pttt_bill = $_POST['paymentmethod'];


                        if ($pttt_bill != 'cash' && $pttt_bill != 'vnpay') {
                            echo '
                         <script>
                             function thongbao(){
                                 alert("Phương thức thanh toán không hợp lệ!");
                             }
                             thongbao();
                         </script>
                     ';
                            include "font_end/dat_hang.php";
                            break;
                        }

                     

                        } elseif ($pttt_bill == 'cash') {
                            //CASH THANH TOAN
                            $name_bill = $_POST['name_tk'];
                            $email_bill = $_POST['email_tk'];
                            $address_bill = $_POST['address_tk'];
                            $tel_bill = $_POST['tel_tk'];
                            $ordernote_bill = $_POST['ordernote'];
                            $pttt_bill = 1;
                            $ngay_dat_hang = date('h:i:sa d/m/Y');
                            $tongtien_bill = tong_donhang();
                            $yourURL = "http://duanlaptop.test/index.php?act=load_bill";
                            echo ("<script>location.href='$yourURL'</script>");
                        }

                    }

                    // Inserting data into the database
                    $id_bill = insert_bill(
                        $userid,
                        $name_bill,
                        $email_bill,
                        $address_bill,
                        $tel_bill,
                        $ordernote_bill,
                        $tongtien_bill,
                        $pttt_bill,
                        $ngay_dat_hang
                        ,
                        $vnp_Amount,
                        $vnp_BankCode,
                        $vnp_BankTranNo,
                        $vnp_CardType,
                        $vnp_OrderInfo,
                        $vnp_PayDate,
                        $vnp_TmnCode,
                        $vnp_TransactionNo,
                        $code_order
                    );
                    foreach ($_SESSION['mua_cart'] as $cart) {
                        insert_cart($_SESSION['user']['id_tk'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $id_bill);
                    }
                    $_SESSION['mua_cart'] = [];
                    $bill = load_one_bill($id_bill);
                    $billct = load_all_cart($id_bill);

                    // Display success message
                    echo '
                     <script>
                         function thongbao(){
                             alert("Đặt hàng thành công !");
                         }
                         thongbao();
                     </script>
                 ';
                    include "font_end/xac_nhan_don_hang.php";
                }
            }

            break;

            case 'show_product':
                if (isset($_GET["id_sp"]) && ($_GET['id_sp'] > 0)) {
                    $id = $_GET['id_sp'];
                    $one_sp = load_one_sanpham($id);
                    extract($one_sp);
                    $sp_cung_loai = sanpham_cungloai($id, $id_danhmuc);
                    include "font_end/detail.php";
                }
                include "font_end/show_product.php";
                break;
      
        default:
            include "font_end/home.php";
            break;
    }
} else {
    include "font_end/home.php";
}
include "font_end/footer.php";
