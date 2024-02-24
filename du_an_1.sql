-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2024 at 01:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bill` int NOT NULL,
  `iduser` int DEFAULT '0',
  `name_bill` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_bill` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address_bill` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tel_bill` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ordernote_bill` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tongtien_bill` int NOT NULL DEFAULT '0',
  `pttt_bill` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1. Thanh toán trực tiếp\r\n2. Chuyển khoản',
  `ngaydathang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `status_bill` tinyint(1) DEFAULT '0' COMMENT '0. Đơn hàng mới\r\n1. Đang sử lý\r\n2. Đang giao hàng\r\n3. Giao thành công',
  `receive` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receive_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receive_tel` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vnp_Amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_BankCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_BankTranNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_CardType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_OrderInfo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_PayDate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_TmnCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vnp_TransactionNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_order` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id_bill`, `iduser`, `name_bill`, `email_bill`, `address_bill`, `tel_bill`, `ordernote_bill`, `tongtien_bill`, `pttt_bill`, `ngaydathang`, `status_bill`, `receive`, `receive_address`, `receive_tel`, `vnp_Amount`, `vnp_BankCode`, `vnp_BankTranNo`, `vnp_CardType`, `vnp_OrderInfo`, `vnp_PayDate`, `vnp_TmnCode`, `vnp_TransactionNo`, `code_order`) VALUES
(247, 41, 'user123', 'longbtph22048@fpt.edu.vn', 'HN', '123456789', '', 85690, 1, '2024-02-12 10:42:01', 0, NULL, NULL, NULL, '', '', '', '', '', '', '7CTLVVW1', '', '86760'),
(249, 41, 'user123', 'longbtph22048@fpt.edu.vn', 'HN', '123456789', '', 171380, 1, '2024-02-15 11:32:30', 0, NULL, NULL, NULL, '', '', '', '', '', '', '7CTLVVW1', '', '23904'),
(250, 18, 'admin', 'admin@gmail.com', 'HaNoi', '12345678', '', 342760, 1, '2024-02-19 23:25:57', 3, NULL, NULL, NULL, '', '', '', '', '', '', '7CTLVVW1', '', '28630');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int NOT NULL,
  `content_bl` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `id_pro` int NOT NULL,
  `date_bl` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `role_tk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id_bl`, `content_bl`, `id_user`, `id_pro`, `date_bl`, `user_name`, `role_tk`) VALUES
(34, 'ghnhgmjuk', 18, 85, '04:01:59am 24/11/2023', 'admin', 1),
(35, 'ythytuytjuu', 18, 85, '04:04:09am 24/11/2023', 'admin', 1),
(36, 'ghhhjhh', 20, 83, '07:41:06am 27/01/2024', 'BUI THIN LONG', 0),
(37, 'dff', 20, 83, '07:42:00am 27/01/2024', 'BUI THIN LONG', 0),
(38, '<b>hhh</b>', 20, 83, '07:42:35am 27/01/2024', 'BUI THIN LONG', 0),
(39, 'sản phẩm ok', 41, 83, '04:49:38am 03/02/2024', 'user123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL,
  `id_user` int NOT NULL,
  `idpro` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` int NOT NULL,
  `soluong` int NOT NULL,
  `id_bill` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `idpro`, `img`, `name`, `price`, `soluong`, `id_bill`) VALUES
(270, 41, 86, 'product-5.jpg', 'MacBook Pro 16 inch M2 Max 2023 12CPU 38GPU', 85690, 1, 247),
(272, 41, 86, 'product-5.jpg', 'MacBook Pro 16 inch M2 Max 2023 12CPU 38GPU', 85690, 2, 249),
(273, 18, 86, 'product-5.jpg', 'MacBook Pro 16 inch M2 Max 2023 12CPU 38GPU', 85690, 4, 250);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int NOT NULL,
  `name_danhmuc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `name_danhmuc`) VALUES
(22, 'iphone 12'),
(23, 'iphone 13'),
(24, 'iphone 14'),
(26, 'iphone 8plus'),
(27, 'iphone 11'),
(28, 'oppo'),
(29, 'sam sung'),
(30, 'MacBook');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int NOT NULL,
  `name_sp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `img_sp` char(40) COLLATE utf8mb4_general_ci NOT NULL,
  `price_sp` int NOT NULL,
  `mota_sp` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `id_danhmuc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name_sp`, `img_sp`, `price_sp`, `mota_sp`, `id_danhmuc`) VALUES
(79, 'samsung galaxy a33', 'a333.jpg', 231123123, 'Ưu đãi thêm 1 triệu, thu cũ đổi mới đồng thời nhiều thiết bị, hỗ trợ thêm 3 triệu', 29),
(82, 'samsung a23', 'a23.jpg', 5, 'P/N:  \r\nMNWA3SA/A\r\nThương hiệu:  \r\nApple\r\nXuất xứ:  \r\nTrung Quốc\r\nThời điểm ra mắt:  \r\n2023\r\nThời gian bảo hành (tháng):  \r\n12\r\nHướng dẫn bảo quản:  \r\nĐể nơi khô ráo, nhẹ tay, dễ vỡ.\r\nHướng dẫn sử dụng:  \r\nXem trong sách hướng dẫn sử dụng\r\nThiết kế & Trọng lượng\r\nKích thước	35.57 x 24.81 x 1.68 cm\r\nTrọng lượng sản phẩm	2.16 kg\r\nMàu sắc	Xám\r\nChất liệu	\r\nKhung màn hình: Nhựa\r\nMặt bàn phím + kê tay: Nhôm\r\nMặt bên ngoài cùng: Nhôm\r\nMặt lưng máy: Nhôm\r\nBộ xử lý\r\nHãng CPU	Apple\r\nCông nghệ CPU	M2 Max\r\nLoại CPU	12-Core\r\nSố nhân	12\r\nRAM\r\nDung lượng RAM	32 GB\r\nSố khe cắm rời	Không\r\nSố khe RAM còn lại	Không\r\nSố RAM onboard	Có\r\nHỗ trợ RAM tối đa	32 GB\r\nMàn hình\r\nKích thước màn hình	16.2 inch\r\nCông nghệ màn hình	Retina\r\nĐộ phân giải	3456 x 2234 Pixels\r\nLoại màn hình	LED\r\nTần số quét	120\r\nTấm nền	OLED\r\nĐộ sáng	1000 nits\r\nĐộ tương phản	1.000.000: 1\r\nĐồ họa\r\nCard onboard\r\nHãng	Apple\r\nLưu trữ\r\nKiểu ổ cứng	\r\nSSD\r\nHỗ trợ công nghệ Optane	Không\r\nSSD\r\nDung lượng	1 TB\r\nBảo mật\r\nMật khẩu\r\nMở khóa khuôn mặt\r\nMở khóa vân tay\r\nGiao tiếp & kết nối\r\nCổng giao tiếp	\r\n1 HDMI\r\n1 Jack 3.5 mm\r\n3 Type C\r\nWifi	\r\n802.11 ax\r\nBluetooth	v5.0\r\nWebcam	\r\nFull HD Webcam (1080p Webcam)\r\nÂm thanh\r\nSố lượng loa	6\r\nBàn phím & TouchPad\r\nKiểu bàn phím	English International Backlit Keyboard\r\nBàn phím số	Không\r\nĐèn bàn phím	LED\r\nCông nghệ đèn bàn phím	Đơn sắc\r\nMàu đèn LED	Trắng\r\nTouchPad	Multi-touch touchpad\r\nThông tin pin & Sạc\r\nLoại PIN	Lithium polymer\r\nPower Supply	140 W\r\nDung lượng pin	\r\n22 Giờ\r\nHệ điều hành\r\nOS	macOS\r\nVersion	Ventura', 29),
(83, 'samsung galaxy a73', 'a73.jpg', 27000000, 'P/N:  \r\nMNWA3SA/A\r\nThương hiệu:  \r\nApple\r\nXuất xứ:  \r\nTrung Quốc\r\nThời điểm ra mắt:  \r\n2023\r\nThời gian bảo hành (tháng):  \r\n12\r\nHướng dẫn bảo quản:  \r\nĐể nơi khô ráo, nhẹ tay, dễ vỡ.\r\nHướng dẫn sử dụng:  \r\nXem trong sách hướng dẫn sử dụng\r\nThiết kế & Trọng lượng\r\nKích thước	35.57 x 24.81 x 1.68 cm\r\nTrọng lượng sản phẩm	2.16 kg\r\nMàu sắc	Xám\r\nChất liệu	\r\nKhung màn hình: Nhựa\r\nMặt bàn phím + kê tay: Nhôm\r\nMặt bên ngoài cùng: Nhôm\r\nMặt lưng máy: Nhôm\r\nBộ xử lý\r\nHãng CPU	Apple\r\nCông nghệ CPU	M2 Max\r\nLoại CPU	12-Core\r\nSố nhân	12\r\nRAM\r\nDung lượng RAM	32 GB\r\nSố khe cắm rời	Không\r\nSố khe RAM còn lại	Không\r\nSố RAM onboard	Có\r\nHỗ trợ RAM tối đa	32 GB\r\nMàn hình\r\nKích thước màn hình	16.2 inch\r\nCông nghệ màn hình	Retina\r\nĐộ phân giải	3456 x 2234 Pixels\r\nLoại màn hình	LED\r\nTần số quét	120\r\nTấm nền	OLED\r\nĐộ sáng	1000 nits\r\nĐộ tương phản	1.000.000: 1\r\nĐồ họa\r\nCard onboard\r\nHãng	Apple\r\nLưu trữ\r\nKiểu ổ cứng	\r\nSSD\r\nHỗ trợ công nghệ Optane	Không\r\nSSD\r\nDung lượng	1 TB\r\nBảo mật\r\nMật khẩu\r\nMở khóa khuôn mặt\r\nMở khóa vân tay\r\nGiao tiếp & kết nối\r\nCổng giao tiếp	\r\n1 HDMI\r\n1 Jack 3.5 mm\r\n3 Type C\r\nWifi	\r\n802.11 ax\r\nBluetooth	v5.0\r\nWebcam	\r\nFull HD Webcam (1080p Webcam)\r\nÂm thanh\r\nSố lượng loa	6\r\nBàn phím & TouchPad\r\nKiểu bàn phím	English International Backlit Keyboard\r\nBàn phím số	Không\r\nĐèn bàn phím	LED\r\nCông nghệ đèn bàn phím	Đơn sắc\r\nMàu đèn LED	Trắng\r\nTouchPad	Multi-touch touchpad\r\nThông tin pin & Sạc\r\nLoại PIN	Lithium polymer\r\nPower Supply	140 W\r\nDung lượng pin	\r\n22 Giờ\r\nHệ điều hành\r\nOS	macOS\r\nVersion	Ventura', 29),
(84, 'samsung galaxy a70', 'a73.jpg', 30000000, 'P/N:  \r\nMNWA3SA/A\r\nThương hiệu:  \r\nApple\r\nXuất xứ:  \r\nTrung Quốc\r\nThời điểm ra mắt:  \r\n2023\r\nThời gian bảo hành (tháng):  \r\n12\r\nHướng dẫn bảo quản:  \r\nĐể nơi khô ráo, nhẹ tay, dễ vỡ.\r\nHướng dẫn sử dụng:  \r\nXem trong sách hướng dẫn sử dụng\r\nThiết kế & Trọng lượng\r\nKích thước	35.57 x 24.81 x 1.68 cm\r\nTrọng lượng sản phẩm	2.16 kg\r\nMàu sắc	Xám\r\nChất liệu	\r\nKhung màn hình: Nhựa\r\nMặt bàn phím + kê tay: Nhôm\r\nMặt bên ngoài cùng: Nhôm\r\nMặt lưng máy: Nhôm\r\nBộ xử lý\r\nHãng CPU	Apple\r\nCông nghệ CPU	M2 Max\r\nLoại CPU	12-Core\r\nSố nhân	12\r\nRAM\r\nDung lượng RAM	32 GB\r\nSố khe cắm rời	Không\r\nSố khe RAM còn lại	Không\r\nSố RAM onboard	Có\r\nHỗ trợ RAM tối đa	32 GB\r\nMàn hình\r\nKích thước màn hình	16.2 inch\r\nCông nghệ màn hình	Retina\r\nĐộ phân giải	3456 x 2234 Pixels\r\nLoại màn hình	LED\r\nTần số quét	120\r\nTấm nền	OLED\r\nĐộ sáng	1000 nits\r\nĐộ tương phản	1.000.000: 1\r\nĐồ họa\r\nCard onboard\r\nHãng	Apple\r\nLưu trữ\r\nKiểu ổ cứng	\r\nSSD\r\nHỗ trợ công nghệ Optane	Không\r\nSSD\r\nDung lượng	1 TB\r\nBảo mật\r\nMật khẩu\r\nMở khóa khuôn mặt\r\nMở khóa vân tay\r\nGiao tiếp & kết nối\r\nCổng giao tiếp	\r\n1 HDMI\r\n1 Jack 3.5 mm\r\n3 Type C\r\nWifi	\r\n802.11 ax\r\nBluetooth	v5.0\r\nWebcam	\r\nFull HD Webcam (1080p Webcam)\r\nÂm thanh\r\nSố lượng loa	6\r\nBàn phím & TouchPad\r\nKiểu bàn phím	English International Backlit Keyboard\r\nBàn phím số	Không\r\nĐèn bàn phím	LED\r\nCông nghệ đèn bàn phím	Đơn sắc\r\nMàu đèn LED	Trắng\r\nTouchPad	Multi-touch touchpad\r\nThông tin pin & Sạc\r\nLoại PIN	Lithium polymer\r\nPower Supply	140 W\r\nDung lượng pin	\r\n22 Giờ\r\nHệ điều hành\r\nOS	macOS\r\nVersion	Ventura', 29),
(86, 'MacBook Pro 16 inch M2 Max 2023 12CPU 38GPU', 'product-5.jpg', 85690, 'Thông tin hàng hóa\r\nP/N:  \r\nMNWA3SA/A\r\nThương hiệu:  \r\nApple\r\nXuất xứ:  \r\nTrung Quốc\r\nThời điểm ra mắt:  \r\n2023\r\nThời gian bảo hành (tháng):  \r\n12\r\nHướng dẫn bảo quản:  \r\nĐể nơi khô ráo, nhẹ tay, dễ vỡ.\r\nHướng dẫn sử dụng:  \r\nXem trong sách hướng dẫn sử dụng\r\nThiết kế & Trọng lượng\r\nKích thước	35.57 x 24.81 x 1.68 cm\r\nTrọng lượng sản phẩm	2.16 kg\r\nMàu sắc	Xám\r\nChất liệu	\r\nKhung màn hình: Nhựa\r\nMặt bàn phím + kê tay: Nhôm\r\nMặt bên ngoài cùng: Nhôm\r\nMặt lưng máy: Nhôm\r\nBộ xử lý\r\nHãng CPU	Apple\r\nCông nghệ CPU	M2 Max\r\nLoại CPU	12-Core\r\nSố nhân	12\r\nRAM\r\nDung lượng RAM	32 GB\r\nSố khe cắm rời	Không\r\nSố khe RAM còn lại	Không\r\nSố RAM onboard	Có\r\nHỗ trợ RAM tối đa	32 GB\r\nMàn hình\r\nKích thước màn hình	16.2 inch\r\nCông nghệ màn hình	Retina\r\nĐộ phân giải	3456 x 2234 Pixels\r\nLoại màn hình	LED\r\nTần số quét	120\r\nTấm nền	OLED\r\nĐộ sáng	1000 nits\r\nĐộ tương phản	1.000.000: 1\r\nĐồ họa\r\nCard onboard\r\nHãng	Apple\r\nLưu trữ\r\nKiểu ổ cứng	\r\nSSD\r\nHỗ trợ công nghệ Optane	Không\r\nSSD\r\nDung lượng	1 TB\r\nBảo mật\r\nMật khẩu\r\nMở khóa khuôn mặt\r\nMở khóa vân tay\r\nGiao tiếp & kết nối\r\nCổng giao tiếp	1 HDMI   1 Jack 3.5 mm  3 Type C\r\nWifi	\r\n802.11 ax\r\nBluetooth	v5.0\r\nWebcam	\r\nFull HD Webcam (1080p Webcam)\r\nÂm thanh\r\nSố lượng loa	6\r\nBàn phím & TouchPad\r\nKiểu bàn phím	English International Backlit Keyboard\r\nBàn phím số	Không\r\nĐèn bàn phím	LED\r\nCông nghệ đèn bàn phím	Đơn sắc\r\nMàu đèn LED	Trắng\r\nTouchPad	Multi-touch touchpad\r\nThông tin pin & Sạc\r\nLoại PIN	Lithium polymer\r\nPower Supply	140 W\r\nDung lượng pin	\r\n22 Giờ\r\nHệ điều hành\r\nOS	macOS\r\nVersion	Ventura', 30);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int NOT NULL,
  `name_tk` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pass_tk` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email_tk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address_tk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tel_tk` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `name_tk`, `pass_tk`, `email_tk`, `address_tk`, `tel_tk`, `role`) VALUES
(18, 'admin', '12345', 'admin@gmail.com', 'HaNoi', '', 1),
(20, 'BUI THIN LONG', '12345', 'longbt300820@gmail.com', 'abc', '1234567890', 0),
(41, 'user123', '12345678', 'longbtph22048@fpt.edu.vn', 'HN', '123456789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `thongke`
--

CREATE TABLE `thongke` (
  `id` int NOT NULL,
  `ngaydat` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `donhang` int NOT NULL,
  `doanhthu` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `soluong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `thongke`
--

INSERT INTO `thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluong`) VALUES
(1, '2024-01-01 ', 11, '121213', 12),
(2, '2024-02-16\r\n\r\n', 34, '43434', 343),
(3, '2024-01-23 ', 33, '234', 56),
(4, '2024-01-24 ', 34, '343', 4545),
(5, '2024-01-25 ', 2, '23', 109),
(6, '2024-01-15 ', 10, '35', 2),
(7, '2024-01-28 ', 20, '2344', 10),
(8, '2024-01-26 ', 10, '34', 1),
(9, '2024-01-27 ', 1, '45', 2),
(10, '2024-01-28 ', 3, '43', 3),
(11, '2024-02-19 ', 34, '3434', 4),
(12, '2023-09-30', 23, '34', 3),
(13, '2024-02-12', 34, '6778', 76);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `idpro` (`idpro`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_tk`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
