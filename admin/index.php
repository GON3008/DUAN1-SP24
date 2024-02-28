<?php
include "../model/pdo.php";
include "../model/danh_muc.php";
include "../model/sanpham.php";
include "header.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                if ($_POST['tenloai'] == '') {
                    echo '
                        <script>
                        function thongbao(){
                         alert("Xin vui lòng nhập vào ô trống !");
                        }
                        thongbao();
                        </script>
                        ';
                } else {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
            }
            include "danhmuc/danhmuc_add.php";
            break;
        case 'listdm':
            $xuatDM = load_danh_all();
            include "danhmuc/danhmuc_list.php";
            break;
        case 'suadm':
            if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'] > 0)) {
                $sua_dm = load_one($_GET['id_danhmuc']);
            }
            include "danhmuc/danhmuc_update.php";
            break;
        case 'xoadm':
            if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'])) {
                delete_danhmuc($_GET['id_danhmuc']);
            }
            $sql = " select * from danhmuc order by id_danhmuc";
            $xuatDM = pdo_query($sql);
            include "danhmuc/danhmuc_list.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_danhmuc = $_POST['id'];
                $name_danhmuc = $_POST['ten'];
                update_dm($id_danhmuc, $name_danhmuc);
                $thongbao = "Cập nhật thành công";
            }
            $load_dm = load_danh_all();
            include "danhmuc/danhmuc_update.php";
            break;
        case 'list_bl':
            $xuatBL = load_binhluan1_all(0);
            include "binhluan/list_bl.php";
            break;
        case 'xoabl':
            if (isset($_GET['id_bl']) && ($_GET['id_bl'])) {
                delete_bl($_GET['id_bl']);
            }
        case 'don_hang':
            if (isset($_POST['kwn']) && ($_POST['kwn'] != "")) {
                $kwn = $_POST['kwn'];
            } else {
                $kwn = "";
            }
            $list_bill = load_all_bill1($kwn, 0);
            include 'bill/list_bill.php';
            break;
        case 'xoabill':
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
            include "bill/list_bill.php";
            break;
        case 'suabill':
            if (isset($_GET['id_bill']) && ($_GET['id_bill'])) {
                $bill = load_one_bill($_GET['id_bill']);
            }
            $xem_sp_cua_don_hang = lay_sp_theo_id_bill($_GET['id_bill']);
            include "bill/sua_bill.php";
            break;
        case 'update_bill':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_bill = $_POST['id_bill'];
                $status_hang = $_POST['status_bill'];
                update_bill($id_bill, $status_hang);
                $thongbao = "Cập nhật thành công";
            }
            if (isset($_POST['kwn']) && ($_POST['kwn'] != "")) {
                $kwn = $_POST['kwn'];
            } else {
                $kwn = "";
            }
            $list_bill = load_all_bill1($kwn, 0);
            include "bill/list_bill.php";
            break;
        case 'tk_sp':
            $list_tk = loadall_thongke();
            include "thongke/list_tk.php";
            break;

        case 'bieudo':
            include "thongke/bieu_do.php";
            break;
        case 'doanhthu':
            $list_tk_tien_thang = loadall_thongke_tien_thang();
            include 'thongke/doanhthu.php';
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php"
    ?>