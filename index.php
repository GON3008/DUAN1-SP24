<?php

session_start();
require "mail/sendMail.php";
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
                $_SESSION['cart'] = $soluong;
                $response = array(
                    'cartItems' => count($_SESSION['cart'])
                );
                echo json_encode($response);
            }
            // include "font_end/show_product.php";
            break;
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
            $yourURL = "http://duanlaptop.test/index.php";
            echo ("<script>location.href='$yourURL'</script>");
            break;
        case 'myaccount':

            include "font_end/my-account.php";
            break;
        case 'changes':

            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $name_tk = $_POST['name_tk'];
                $pass_tk = $_POST['pass_tk'];
                $email_tk = $_POST['email_tk'];
                $address_tk = $_POST['address_tk'];
                $tel_tk = $_POST['tel_tk'];
                $id_tk = $_POST['id_tk'];
                update($id_tk, $name_tk, $pass_tk, $email_tk, $address_tk, $tel_tk);
                $_SESSION['user'] = checklogin($name_tk, $pass_tk);
            }
            include "font_end/my-account.php";
            break;
        case 'log_out':
            session_unset();
            $yourURL = "http://duanlaptop.test/index.php";
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

        case 'plus_action':
            $_SESSION['mua_cart'][$_GET['idcart']][4] += 1;
            $yourURL = "http://duanlaptop.test/index.php?act=dohang";
            echo ("<script>location.href='$yourURL'</script>");
            break;

        case 'minus_action':
            $_SESSION['mua_cart'][$_GET['idcart']][4] -= 1;
            $yourURL = "http://duanlaptop.test/index.php?act=dohang";
            echo ("<script>location.href='$yourURL'</script>");
            break;



        case 'update_quantity':
            // Xử lý cập nhật số lượng sản phẩm ở đây
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $idcart = isset($_POST['idcart']) ? $_POST['idcart'] : '';
                $actionType = isset($_POST['action_type']) ? $_POST['action_type'] : '';

                // Kiểm tra xem idcart có tồn tại trong giỏ hàng hay không
                if (isset($_SESSION['mua_cart'][$idcart])) {
                    // Thực hiện tăng/giảm số lượng tùy thuộc vào actionType
                    if ($actionType === 'plus') {
                        $_SESSION['mua_cart'][$idcart][4] += 1;
                    } elseif ($actionType === 'minus' && $_SESSION['mua_cart'][$idcart][4] > 1) {
                        $_SESSION['mua_cart'][$idcart][4] -= 1;
                    }

                    // Trả về số lượng mới để cập nhật trên giao diện người dùng
                    echo $_SESSION['mua_cart'][$idcart][4];
                }

                exit(); // Dừng xử lý tiếp theo để tránh xuất thêm HTML
            }
            break;


        case 'delete_cart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mua_cart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mua_cart'] = [];
            }
            $yourURL = "http://duanlaptop.test/index.php?act=dohang";
            echo ("<script>location.href='$yourURL'</script>");
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

                        // Add VNPay handling logic
                        if ($pttt_bill == 'vnpay') {
                            $vnp_Amount = $_GET['vnp_Amount'];
                            $vnp_BankCode = $_GET['vnp_BankCode'];
                            $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
                            $vnp_CardType = $_GET['vnp_CardType'];
                            $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
                            $vnp_PayDate = $_GET['vnp_PayDate'];
                            $vnp_tmncode = $_GET['vnp_tmncode'];
                            $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
                            $name_bill = $_POST['name_tk'];
                            $email_bill = $_POST['email_tk'];
                            $address_bill = $_POST['address_tk'];
                            $tel_bill = $_POST['tel_tk'];
                            $ordernote_bill = $_POST['ordernote'];
                            $pttt_bill = 2;
                            $ngay_dat_hang = date('h:i:sa d/m/Y');
                            $tongtien_bill = tong_donhang();
                            // }else
                            // {
                            //     echo 'Giao dịch thanh toán bi loi. Xin kiểm tra lai !';
                            //     $yourURL = "http://duanlaptop.test/index.php?act=dat_hang";
                            //     echo("<script>location.href='$yourURL'</script>");
                            // }



                            //VNPAY THANH TOAN
                            $vnp_TxnRef = $code_order; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này
                            $vnp_OrderInfo = 'Thanh toán hóa đơn Vnpay';
                            $vnp_OrderType = 'billpayment';
                            $vnp_Amount = tong_donhang() * 100;
                            $vnp_Locale = 'vn';
                            $vnp_BankCode = 'NCB';
                            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                            //Add Params of 2.0.1 Version
                            $vnp_ExpireDate = $expire;

                            $inputData = array(
                                "vnp_Version" => "2.1.0",
                                "vnp_TmnCode" => $vnp_TmnCode,
                                "vnp_Amount" => $vnp_Amount,
                                "vnp_Command" => "pay",
                                "vnp_CreateDate" => date('YmdHis'),
                                "vnp_CurrCode" => "VND",
                                "vnp_IpAddr" => $vnp_IpAddr,
                                "vnp_Locale" => $vnp_Locale,
                                "vnp_OrderInfo" => $vnp_OrderInfo,
                                "vnp_OrderType" => $vnp_OrderType,
                                "vnp_ReturnUrl" => $vnp_Returnurl,
                                "vnp_TxnRef" => $vnp_TxnRef,
                                "vnp_ExpireDate" => $vnp_ExpireDate
                            );

                            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                                $inputData['vnp_BankCode'] = $vnp_BankCode;
                            }
                            // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                            //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                            // }

                            //var_dump($inputData);
                            ksort($inputData);
                            $query = "";
                            $i = 0;
                            $hashdata = "";
                            foreach ($inputData as $key => $value) {
                                if ($i == 1) {
                                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                                } else {
                                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                                    $i = 1;
                                }
                                $query .= urlencode($key) . "=" . urlencode($value) . '&';
                            }

                            $vnp_Url = $vnp_Url . "?" . $query;
                            if (isset($vnp_HashSecret)) {
                                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                            }
                            $returnData = array(
                                'code' => '00',
                                'message' => 'success',
                                'data' => $vnp_Url
                            );

                            if (isset($_POST['redirect'])) {
                                // Nếu có tham số 'redirect', chuyển hướng người dùng đến VNPay
                                $yourURL = $vnp_Url;
                                echo ("<script>location.href='$yourURL'</script>");
                            } else {
                                // Nếu không, trả về JSON
                                echo json_encode($returnData);
                                exit;
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
                    // Initialize the content variable outside the loop
                    $content = '';
                    $content = 'Quý khách hàng thân mến,<br><br>'
                        . 'Cảm ơn bạn đã đặt hàng tại My G-Store. Chúng tôi rất trân trọng sự hỗ trợ của bạn!<br><br>'
                        . 'Chi tiết đơn hàng:<br>';

                    foreach ($_SESSION['mua_cart'] as $cart) {
                        // Insert cart item into the database
                        insert_cart($_SESSION['user']['id_tk'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $id_bill);

                        // Append details to the email content
                        $content .= 'Sản phẩm: ' . $cart[1] . '<br>'
                            . 'Số lượng: ' . $cart[4] . '<br>'
                            . 'Tổng cộng: ' . $cart[3] * $cart[4] . '<br><br>';
                    }

// Additional content
                    $content .= 'Nếu bạn có bất kỳ câu hỏi hoặc nhu cầu hỗ trợ nào, đừng ngần ngại liên hệ với chúng tôi.<br><br>'
                        . 'Trân trọng,<br>'
                        . 'Đội ngũ My G-Store';

// Send a single email with all the items listed
                    $title = 'Đơn hàng';
                    $mail_order = $_POST['email_tk'];
                    $mail = new Mailer();
                    $mail->orderMail($title, $content, $mail_order);

// Clear the shopping cart session
                    $_SESSION['mua_cart'] = [];

// Load additional data (if needed)
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


        case 'load_bill':
            if (isset($_SESSION['user'])) {
                $list_bill = load_all_bill($_SESSION['user']['id_tk']);
            } else {
                $list_bill = [];
            }
            include 'font_end/load_bill.php';
            break;
        case 'about':
            include "font_end/about.php";
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
        case 'load_sp':
            if (isset($_POST['tim']) && ($_POST['tim'])) {
                if ($_POST['search'] == '') {
                    echo '
                     <script>
                     function thongbao(){
                      alert("Xin vui lòng nhập sản phẩm muốn tìm !");
                     }
                     thongbao();
                     </script>
                     ';
                    include "font_end/home.php";
                }
                if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'] > 0)) {
                    $id = $_GET['id_danhmuc'];
                } else {
                    $id = 0;
                }
                if (isset($_POST['search']) && ($_POST['search'] != "")) {
                    $kwy = $_POST['search'];
                } else {
                    $kwy = "";
                }
                $dssp = load_sanpham($kwy, $id);
                $tendm = load_ten_dm($id);
                include "font_end/sp_theo_dm.php";
            }
            if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'] > 0)) {
                $id = $_GET['id_danhmuc'];
            } else {
                $id = 0;
            }
            $dssp = load_sanpham($kwy = "", $id);
            $tendm = load_ten_dm($id);
            include "font_end/sp_theo_dm.php";
            break;
        // case 'timkiem':
        //    // if (isset($_POST['search']) && ($_POST['search']) != "") {
        //    //    $kwy = $_POST['search'];
        //    // }else{
        //    //    $kwy = "";
        //    // }
        //    // if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'] > 0)) {
        //    //    $id = $_GET['id_danhmuc'];
        //    // }else{
        //    //    $id = "";
        //    // }

        //    // $dssp = load_sanpham($kwy,$id);
        //    // $tendm = load_ten_dm($id);
        //    break;
        default:
            include "font_end/home.php";
            break;
    }
} else {
    include "font_end/home.php";
}
include "font_end/footer.php";
