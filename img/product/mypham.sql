-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 06:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypham`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `mabl` int(10) NOT NULL,
  `matk` int(20) NOT NULL,
  `masp` int(20) NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `thoigianbinhluan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`mabl`, `matk`, `masp`, `noidung`, `thoigianbinhluan`) VALUES
(129, 77, 235, 'Sản phẩm tuyệt vời', '2023-11-17 11:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `madhchitiet` int(11) NOT NULL,
  `madh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giasp` int(200) NOT NULL,
  `tongtiensp` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `madm` int(11) NOT NULL,
  `tendm` varchar(50) NOT NULL,
  `anh` varchar(50) DEFAULT NULL,
  `thutu` varchar(50) DEFAULT NULL COMMENT 'Thứ tự hiển thị các danh mục',
  `soluongsp` int(11) DEFAULT 0,
  `mota` varchar(100) NOT NULL DEFAULT '0',
  `xoa` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`madm`, `tendm`, `anh`, `thutu`, `soluongsp`, `mota`, `xoa`) VALUES
(1, 'Mặt Nạ', 'dm1.jpg', '1', 218, 'Danh mục mặt nạ', NULL),
(2, 'Kem Mắt', 'dm2.jpg', '2', 218, 'Danh mục kem mắt', NULL),
(3, 'Kem Body', 'dm3.jpg', '3', 218, 'Danh mục kem body', NULL),
(4, 'Trang Điểm', 'dm4.jpg', '4', 218, 'Danh mục trang điểm', NULL),
(5, 'Kem Chống Nắng', 'dm5.jpg', '5', 218, 'Danh mục kem chống nắng', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(11) NOT NULL,
  `matk` int(11) DEFAULT NULL COMMENT 'Liên kết đến bảng taikhoan',
  `tenkhachhang` varchar(100) NOT NULL,
  `ngaydathang` date NOT NULL DEFAULT current_timestamp(),
  `tongtien` int(11) NOT NULL,
  `ghichu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `magiohang` int(11) NOT NULL,
  `matk` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thoigianthem` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `gia` int(11) NOT NULL,
  `giakhuyenmai` int(11) NOT NULL,
  `motangan` text NOT NULL,
  `motachitiet` text NOT NULL,
  `madm` int(11) NOT NULL DEFAULT 0 COMMENT 'Danh mục chứa sản phẩm',
  `ngaytao` datetime NOT NULL,
  `anhsp` text NOT NULL COMMENT 'Lưu mảng chứa tên ảnh',
  `soluong` int(11) NOT NULL,
  `trangthaidacbiet` varchar(200) NOT NULL,
  `soluotxem` int(100) NOT NULL,
  `xoa` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `giakhuyenmai`, `motangan`, `motachitiet`, `madm`, `ngaytao`, `anhsp`, `soluong`, `trangthaidacbiet`, `soluotxem`, `xoa`) VALUES
(187, 'Mặt Nạ Chống Nước SPF 50', 50000, 45000, 'Mặt nạ chống nước với SPF 50, bảo vệ da khỏi tác động của tia UV', 'Mặt nạ chống nước với chỉ số chống nắng cao', 1, '2023-11-16 15:07:00', 'sp1-1.jpg', 20, 'Mới', 0, NULL),
(188, 'Mặt Nạ Dưỡng Ẩm Vitamin E', 60000, 55000, 'Mặt nạ dưỡng ẩm, giúp da trở nên mềm mại và săn chắc', 'Chứa Vitamin E, giúp tái tạo tế bào da', 1, '2023-11-16 15:08:00', 'sp1-2.jpg', 25, 'Mới', 0, NULL),
(189, 'Mặt Nạ Trắng Da Tinh Chất Lô Hội', 75000, 70000, 'Mặt nạ giúp làm trắng da, chống oxi hóa và nuôi dưỡng làn da', 'Chứa lô hội, giúp da trở nên trắng sáng và khỏe mạnh', 1, '2023-11-16 15:09:00', 'sp1-3.jpg', 15, 'Mới', 0, NULL),
(190, 'Mặt Nạ Làm Dịu Da Calendula', 45000, 40000, 'Mặt nạ chứa chiết xuất từ hoa cúc Calendula, giúp làm dịu và làm dịu da', 'Thích hợp cho làn da nhạy cảm', 1, '2023-11-16 15:10:00', 'sp1-4.jpg', 30, 'Mới', 0, NULL),
(191, 'Mặt Nạ Tái Tạo Da Collagen', 70000, 65000, 'Mặt nạ chứa collagen giúp tái tạo cấu trúc da, giảm nếp nhăn', 'Kích thích sự đàn hồi và săn chắc của da', 1, '2023-11-16 15:11:00', 'sp1-5.jpg', 18, 'Mới', 0, NULL),
(192, 'Mặt Nạ Dưỡng Ẩm Hạt Dẻ Cười', 55000, 50000, 'Mặt nạ chứa hạt dẻ cười, giúp dưỡng ẩm và làm mềm da', 'Hương thơm dễ chịu từ hạt dẻ cười', 1, '2023-11-16 15:12:00', 'sp1-6.jpg', 22, 'Mới', 0, NULL),
(193, 'Mặt Nạ Làm Trắng Da Arbutin', 65000, 60000, 'Mặt nạ chứa Arbutin giúp làm trắng da và ngăn chặn sự hình thành melanin', 'Đặc biệt thích hợp cho làn da tối màu', 1, '2023-11-16 15:13:00', 'sp1-7.jpg', 28, 'Mới', 0, NULL),
(194, 'Mặt Nạ Dưỡng Ẩm Squalane', 48000, 43000, 'Mặt nạ chứa Squalane giúp dưỡng ẩm sâu và tái tạo lớp lipid da', 'Thích hợp cho da khô và da thiếu dưỡng', 1, '2023-11-16 15:14:00', 'sp1-8.jpg', 25, 'Mới', 0, NULL),
(195, 'Mặt Nạ Tẩy Tế Bào Chết AHA BHA', 58000, 53000, 'Mặt nạ chứa AHA và BHA giúp loại bỏ tế bào chết và làm sáng da', 'Giúp tái tạo làn da mới mẻ', 1, '2023-11-16 15:15:00', 'sp1-9.jpg', 20, 'Mới', 0, NULL),
(196, 'Mặt Nạ Dưỡng Ẩm Hạt Nho', 72000, 67000, 'Mặt nạ chứa chiết xuất từ hạt nho, giúp dưỡng ẩm và làm mịn da', 'Chứa các dưỡng chất chống oxy hóa', 1, '2023-11-16 15:16:00', 'sp1-10.jpg', 15, 'Mới', 0, NULL),
(197, 'Kem Mắt Dưỡng Ẩm Intensive', 120000, 110000, 'Kem mắt dưỡng ẩm cao cấp, giúp làm mờ nếp nhăn và quầng thâm', 'Chứa các thành phần dưỡng ẩm và chống lão hóa', 2, '2023-11-16 15:17:00', 'sp2-1.jpg', 25, 'Mới', 0, NULL),
(198, 'Kem Mắt Tái Tạo Da Retinol', 150000, 140000, 'Kem mắt chứa Retinol giúp tái tạo da và cải thiện độ đàn hồi', 'Thích hợp cho làn da có dấu hiệu lão hóa', 2, '2023-11-16 15:18:00', 'sp2-2.jpg', 20, 'Mới', 0, NULL),
(199, 'Kem Mắt Dưỡng Ẩm Hyaluronic Acid', 110000, 100000, 'Kem mắt dưỡng ẩm với Hyaluronic Acid giúp giữ nước cho da', 'Làm dịu và làm mờ vết nhăn quanh vùng mắt', 2, '2023-11-16 15:19:00', 'sp2-3.jpg', 30, 'Mới', 0, NULL),
(200, 'Kem Mắt Chống Nám Arbutin', 130000, 120000, 'Kem mắt chứa Arbutin giúp làm mờ vết nám và tăng sáng vùng mắt', 'Ngăn chặn sự hình thành melanin', 2, '2023-11-16 15:20:00', 'sp2-4.jpg', 15, 'Mới', 0, NULL),
(201, 'Kem Mắt Collagen Tăng Đàn Hồi', 140000, 130000, 'Kem mắt chứa Collagen giúp tăng đàn hồi cho vùng da quanh mắt', 'Giúp làm mờ vết thâm và nếp nhăn', 2, '2023-11-16 15:21:00', 'sp2-5.jpg', 18, 'Mới', 0, NULL),
(202, 'Kem Mắt Dưỡng Ẩm Với Vitamin C', 160000, 150000, 'Kem mắt dưỡng ẩm chứa Vitamin C, giúp làm sáng da và ngăn chặn lão hóa', 'Thích hợp cho da khô và da mệt mỏi', 2, '2023-11-16 15:22:00', 'sp2-6.jpg', 22, 'Mới', 0, NULL),
(203, 'Kem Mắt Dưỡng Ẩm Cho Da Nhạy Cảm', 130000, 120000, 'Kem mắt dưỡng ẩm cho da nhạy cảm, giúp giảm kích ứng và đỏ da', 'Không chứa hương liệu và chất tạo màu', 2, '2023-11-16 15:23:00', 'sp2-7.jpg', 28, 'Mới', 0, NULL),
(204, 'Kem Mắt Chống Nếp Nhăn Peptide', 180000, 170000, 'Kem mắt chống nếp nhăn chứa Peptide, giúp làm mờ vết nhăn và tăng đàn hồi', 'Thích hợp cho da có dấu hiệu lão hóa nhanh', 2, '2023-11-16 15:24:00', 'sp2-8.jpg', 25, 'Mới', 0, NULL),
(205, 'Kem Mắt Dưỡng Ẩm Cho Người Mắc Kính', 120000, 110000, 'Kem mắt dưỡng ẩm không gây kích ứng cho người đeo kính', 'Giảm mệt mỏi và căng thẳng cho vùng da quanh mắt', 2, '2023-11-16 15:25:00', 'sp2-9.jpg', 20, 'Mới', 0, NULL),
(206, 'Kem Mắt Dưỡng Ẩm Dành Cho Nam Giới', 130000, 120000, 'Kem mắt dưỡng ẩm dành cho nam giới, giúp giảm quầng thâm và nếp nhăn', 'Thẩm thấu nhanh và không gây bóng dầu', 2, '2023-11-16 15:26:00', 'sp2-10.jpg', 15, 'Mới', 0, NULL),
(207, 'Kem Dưỡng Thể Cacao', 180000, 160000, 'Kem dưỡng thể chứa cacao giúp dưỡng ẩm và nuôi dưỡng da', 'Thích hợp cho làn da khô và da cần dưỡng ẩm', 3, '2023-11-16 15:27:00', 'sp3-1.jpg', 25, 'Mới', 0, NULL),
(208, 'Kem Dưỡng Thể Hoa Hồng', 150000, 140000, 'Kem dưỡng thể với hương hoa hồng, giúp làm mềm mại và thơm dịu da', 'Chứa tinh chất dưỡng ẩm cho làn da mềm mại', 3, '2023-11-16 15:28:00', 'sp3-2.jpg', 20, 'Mới', 0, NULL),
(209, 'Kem Dưỡng Thể Lavender', 160000, 150000, 'Kem dưỡng thể với hương lavender, giúp giảm căng thẳng và thư giãn', 'Làm dịu và làm mềm da', 3, '2023-11-16 15:29:00', 'sp3-3.jpg', 30, 'Mới', 0, NULL),
(210, 'Kem Dưỡng Thể Dưỡng Trắng SPF 30', 200000, 180000, 'Kem dưỡng thể chống nắng với SPF 30, giúp bảo vệ da khỏi tác động của tia UV', 'Dưỡng trắng và làm mềm da', 3, '2023-11-16 15:30:00', 'sp3-4.jpg', 15, 'Mới', 0, NULL),
(211, 'Kem Dưỡng Thể Hương Nước Hoa', 220000, 200000, 'Kem dưỡng thể với hương nước hoa quyến rũ, giúp làm mềm mại và thơm dịu da', 'Dưỡng ẩm sâu và làm sáng da', 3, '2023-11-16 15:31:00', 'sp3-5.jpg', 18, 'Mới', 0, NULL),
(212, 'Kem Dưỡng Thể Dưỡng Ẩm Sâu', 190000, 170000, 'Kem dưỡng thể chứa thành phần dưỡng ẩm sâu, giúp làm mềm mại và nuôi dưỡng da', 'Thích hợp cho da khô và da thiếu dưỡng', 3, '2023-11-16 15:32:00', 'sp3-6.jpg', 22, 'Mới', 0, NULL),
(213, 'Kem Dưỡng Thể Dành Cho Trẻ Em', 120000, 110000, 'Kem dưỡng thể dành cho trẻ em, an toàn và nhẹ nhàng cho làn da nhạy cảm', 'Không chứa hương liệu và chất tạo màu', 3, '2023-11-16 15:33:00', 'sp3-7.jpg', 28, 'Mới', 0, NULL),
(214, 'Kem Dưỡng Thể Dưỡng Ẩm Olive', 170000, 150000, 'Kem dưỡng thể chứa chiết xuất từ olive, giúp dưỡng ẩm và nuôi dưỡng da', 'Làm mềm mại và tái tạo làn da khô ráp', 3, '2023-11-16 15:34:00', 'sp3-8.jpg', 25, 'Mới', 0, NULL),
(215, 'Kem Dưỡng Thể Cho Da Nhạy Cảm', 140000, 130000, 'Kem dưỡng thể cho da nhạy cảm, không gây kích ứng và dầu nhờn', 'Nhẹ nhàng và thấm nhanh, làm dịu làn da nhạy cảm', 3, '2023-11-16 15:35:00', 'sp3-9.jpg', 20, 'Mới', 0, NULL),
(216, 'Kem Dưỡng Thể Cho Người Cao Tuổi', 160000, 150000, 'Kem dưỡng thể chăm sóc da cho người cao tuổi, giúp làm mềm mại và tái tạo da', 'Chứa các thành phần dưỡng ẩm cho da khô và già', 3, '2023-11-16 15:36:00', 'sp3-10.jpg', 15, 'Mới', 0, NULL),
(217, 'Bộ Trang Điểm Hoàn Hảo', 300000, 280000, 'Bộ trang điểm gồm son, phấn, má hồng và mascara, tạo nên vẻ đẹp hoàn hảo', 'Thích hợp cho mọi dịp và phong cách trang điểm', 4, '2023-11-16 15:37:00', 'sp4-1.jpg', 25, 'Mới', 0, NULL),
(218, 'Kem Nền Lì Siêu Mịn', 150000, 140000, 'Kem nền lì siêu mịn, che phủ tốt các khuyết điểm trên da', 'Tạo lớp nền mịn màng và tự nhiên', 4, '2023-11-16 15:38:00', 'sp4-2.jpg', 20, 'Mới', 0, NULL),
(219, 'Bảng Màu Mắt Chuyên Nghiệp', 180000, 160000, 'Bảng màu mắt chuyên nghiệp với nhiều gam màu đa dạng', 'Tạo nên đôi mắt quyến rũ và sáng bóng', 4, '2023-11-16 15:39:00', 'sp4-3.jpg', 30, 'Mới', 0, NULL),
(220, 'Son Môi Đẹp Mắt', 90000, 80000, 'Son môi với nhiều màu sắc đẹp mắt, giữ màu lâu và dưỡng ẩm cho đôi môi', 'Chất son mịn màng và dễ tán', 4, '2023-11-16 15:40:00', 'sp4-4.jpg', 15, 'Mới', 0, NULL),
(221, 'Mascara Cao Cấp', 120000, 110000, 'Mascara chất lượng cao, làm dài và cong mi dài lâu', 'Không gây vón cục và dễ tẩy trang', 4, '2023-11-16 15:41:00', 'sp4-5.jpg', 18, 'Mới', 0, NULL),
(222, 'Bút Kẻ Mắt Nước Siêu Mảnh', 80000, 75000, 'Bút kẻ mắt nước siêu mảnh, tạo nét đẹp tự nhiên và sắc nét', 'Dễ vẽ và tạo nét đẹp hoàn hảo cho đôi mắt', 4, '2023-11-16 15:42:00', 'sp4-6.jpg', 22, 'Mới', 0, NULL),
(223, 'Phấn Má Hồng Tự Nhiên', 100000, 95000, 'Phấn má hồng tạo nên đôi má hồng tự nhiên và tươi tắn', 'Chất phấn mịn, dễ tán và không gây kích ứng', 4, '2023-11-16 15:43:00', 'sp4-7.jpg', 28, 'Mới', 0, NULL),
(224, 'Bút Kẻ Môi Dưỡng Ẩm', 95000, 90000, 'Bút kẻ môi dưỡng ẩm, giúp duy trì màu sắc và dưỡng ẩm cho đôi môi', 'Thích hợp cho làn môi khô và nứt nẻ', 4, '2023-11-16 15:44:00', 'sp4-8.jpg', 25, 'Mới', 0, NULL),
(225, 'Bộ Cọ Trang Điểm Chuyên Nghiệp', 200000, 180000, 'Bộ cọ trang điểm chuyên nghiệp với nhiều loại cọ khác nhau', 'Giúp bạn tạo nên vẻ đẹp chuyên nghiệp và hoàn hảo', 4, '2023-11-16 15:45:00', 'sp4-9.jpg', 20, 'Mới', 0, NULL),
(226, 'Kem Tạo Khối Sculpting', 130000, 120000, 'Kem tạo khối với công thức dễ tán, giúp tạo nên khuôn mặt thon gọn và đẹp tự nhiên', 'Chất kem mịn màng và không gây kích ứng', 4, '2023-11-16 15:46:00', 'sp4-10.jpg', 15, 'Mới', 0, NULL),
(227, 'Kem Chống Nắng SPF 50+', 150000, 140000, 'Kem chống nắng với chỉ số SPF 50+, bảo vệ da khỏi tác động của tia UVB và UVA', 'Thích hợp cho mọi loại da, không gây kích ứng', 5, '2023-11-16 15:47:00', 'sp5-1.jpg', 25, 'Mới', 0, NULL),
(228, 'Kem Chống Nắng Cho Da Nhạy Cảm', 180000, 160000, 'Kem chống nắng dành cho da nhạy cảm, không chứa hương liệu và chất tạo màu', 'Chống nắng hiệu quả và dễ tán', 5, '2023-11-16 15:48:00', 'sp5-2.jpg', 20, 'Mới', 0, NULL),
(229, 'Kem Chống Nắng Dưỡng Ẩm', 120000, 110000, 'Kem chống nắng kết hợp dưỡng ẩm, giúp giữ cho làn da mềm mại và không khô ráp', 'Chống nắng và dưỡng ẩm hiệu quả', 5, '2023-11-16 15:49:00', 'sp5-3.jpg', 30, 'Mới', 0, NULL),
(230, 'Kem Chống Nắng Dạng Gel', 130000, 120000, 'Kem chống nắng dạng gel, thấm nhanh và không gây cảm giác nhờn rít', 'Bảo vệ da khỏi tác động của tác nhân môi trường', 5, '2023-11-16 15:50:00', 'sp5-4.jpg', 15, 'Mới', 0, NULL),
(231, 'Kem Chống Nắng Cho Da Dầu', 140000, 130000, 'Kem chống nắng dành cho da dầu, kiểm soát dầu và bóng dầu suốt cả ngày', 'Chống nắng hiệu quả mà không làm bóng dầu', 5, '2023-11-16 15:51:00', 'sp5-5.jpg', 18, 'Mới', 0, NULL),
(232, 'Kem Chống Nắng Dành Cho Trẻ Em', 110000, 100000, 'Kem chống nắng dành cho trẻ em, an toàn và không gây kích ứng cho làn da nhạy cảm', 'Chống nắng hiệu quả và dễ tán', 5, '2023-11-16 15:52:00', 'sp5-6.jpg', 22, 'Mới', 0, NULL),
(233, 'Kem Chống Nắng Dành Cho Nam Giới', 120000, 110000, 'Kem chống nắng dành cho nam giới, không gây cảm giác nhờn rít và bết dính', 'Bảo vệ da khỏi tác động của tác nhân môi trường', 5, '2023-11-16 15:53:00', 'sp5-7.jpg', 28, 'Mới', 0, NULL),
(234, 'Kem Chống Nắng Dưỡng Ẩm Cho Da Khô', 160000, 150000, 'Kem chống nắng kết hợp dưỡng ẩm, giúp da khô không bị căng tróc và khô ráp', 'Chống nắng và dưỡng ẩm hiệu quả', 5, '2023-11-16 15:54:00', 'sp5-8.jpg', 25, 'Mới', 0, NULL),
(235, 'Kem Chống Nắng Dưỡng Trắng', 170000, 160000, 'Kem chống nắng kết hợp dưỡng trắng, giúp làm sáng da và ngăn chặn tác động của tia UV', 'Chống nắng và dưỡng trắng hiệu quả', 5, '2023-11-16 15:55:00', 'sp5-9.jpg', 20, 'Mới', 3, NULL),
(236, 'Kem Chống Nắng Dành Cho Mọi Loại Da', 190000, 180000, 'Kem chống nắng phù hợp cho mọi loại da, bảo vệ da khỏi tác động của tia UV', 'Chống nắng hiệu quả và dễ tán', 5, '2023-11-16 15:56:00', 'sp5-10.jpg', 15, 'Mới', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `matk` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `gioitinh` varchar(11) DEFAULT NULL COMMENT '0 là nam, 1 là nữ, 2 là khác',
  `email` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `sodienthoai` varchar(20) NOT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `quyen` varchar(11) DEFAULT 'user' COMMENT 'admin hoặc user',
  `ngaydangky` datetime DEFAULT current_timestamp(),
  `anh` varchar(50) DEFAULT NULL,
  `hoatdong` tinyint(1) DEFAULT 1 COMMENT '1 (true) hoạt động, 0 (false) không hoạt động',
  `xoa` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`matk`, `hoten`, `gioitinh`, `email`, `matkhau`, `sodienthoai`, `diachi`, `ngaysinh`, `quyen`, `ngaydangky`, `anh`, `hoatdong`, `xoa`) VALUES
(2, 'Võ Tấn ', 'nam', 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0', '', '2023-07-07', 'user', '0000-00-00 00:00:00', 'Đức Diệu.jpg', 1, '2023-10-10 22:04:16'),
(3, 'Hoàng Nam', 'nam', 'tanphuoc@gmail.com', '002d9a5e3059c47210d7f4757adc5994', '0395116155', 'q12', '2016-07-14', 'user', '2023-08-01 10:06:21', 'user.jpg', 1, NULL),
(8, 'Chí Hùng', 'nam', 'demo1@gmail.com', '12345', '', 'quận 12', '2023-08-06', 'user', '0000-00-00 00:00:00', 'photographer-920128_1280.jpg', 1, NULL),
(9, 'tan phuoc', 'nam', 'tanphuoc1@gmail.com', '12345', '', NULL, '2023-08-03', 'admin', '0000-00-00 00:00:00', 'image.jpg', 1, NULL),
(22, 'phượng', 'nam', 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '324242424', NULL, '2023-09-12', 'user', '2023-09-19 13:39:56', 'HinhNen.jpg', 1, NULL),
(28, 'kimphuong', 'nữ', 'kimphuong@gmail.com', '543023830d1c67aadadd68641c1e274b', '0929949399', NULL, '2016-02-17', 'admin', '2023-10-04 11:45:54', 'Đức Diệu.jpg', 1, NULL),
(30, 'à ầgaafag', NULL, 'tanphuoc0803@gmail.com', 'a8625c202ecf8dc3c044e80a7442007d', '', NULL, '0000-00-00', 'user', '2023-10-07 14:53:22', NULL, 1, '2023-10-10 05:31:39'),
(31, 'Tấn Phước', 'nam', 'tanphuoc03@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', NULL, '2023-10-05', 'user', '2023-10-07 15:35:34', 'CCCDTruoc.jpg', 1, '2023-10-10 22:08:25'),
(33, 'dimuadi', NULL, 'tanphuoc123@gmail.com', '543023830d1c67aadadd68641c1e274b', '', NULL, '0000-00-00', 'user', '2023-10-07 16:50:17', NULL, 1, NULL),
(35, 'tanphuoc', NULL, 'tanphuoc666@gmail.com', '51d1805861c84762397ee7a985b6bdd3', '', NULL, '0000-00-00', 'user', '2023-10-07 17:04:01', NULL, 1, '2023-10-10 05:33:19'),
(37, 'Kim Phượng', NULL, 'phuong@gmail.com', 'cbdb454fbb14d72ea24f5a7e103be9d1', '', NULL, '0000-00-00', 'user', '2023-10-07 23:29:53', NULL, 1, '2023-10-10 05:32:09'),
(38, 'kitttt', 'nam', 'votanphuoc666@gmail.com', 'f757dc8b6fe5396894b6e5eff2ee8a54', '039611741874', NULL, '2023-09-12', 'user', '2023-10-08 15:46:05', 'airplane-takes-off-into-wind.jpg', 1, NULL),
(39, 'Thanh Hương', 'nam', 'thanhhuong@gmail.com', 'd04640d9f12512299218109d1625d969', '', NULL, '0000-00-00', 'user', '2023-10-09 08:05:09', 'image.jpg', 1, '2023-10-10 05:33:19'),
(42, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-10 22:54:53', NULL, 1, NULL),
(43, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-10 22:54:59', NULL, 1, NULL),
(44, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-10 23:02:19', NULL, 1, NULL),
(45, 'tan phuoc', 'nam', 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', '2023-10-13', 'user', '2023-10-10 23:05:42', 'user.jpg', 1, NULL),
(46, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-10 23:10:30', NULL, 1, NULL),
(47, 'Võ Tấn Phước', 'nam', 'tanphuoc2008033333@gmail.com', '543023830d1c67aadadd68641c1e274b', '1', 'ban long', '0000-00-00', 'user', '2023-10-11 00:30:40', NULL, 1, '2023-10-10 22:08:25'),
(48, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '1', 'ban long', NULL, 'user', '2023-10-11 00:32:11', NULL, 1, NULL),
(49, 'tan phuoc', NULL, 'tanphuoc2008033333@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:34:15', NULL, 1, NULL),
(50, 'tan phuoc', NULL, 'tanphuoc2008033333@gmail.com', 'Tanphuoc!2008', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:35:18', NULL, 1, '2023-10-10 22:08:17'),
(51, 'tan phuoc', NULL, 'tanphuoc2008033333@gmail.com', 'Tanphuoc!2008', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:35:40', NULL, 1, '2023-10-10 22:08:17'),
(52, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:36:42', NULL, 1, NULL),
(53, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:37:03', NULL, 1, NULL),
(54, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:37:43', NULL, 1, NULL),
(55, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:42:15', NULL, 1, NULL),
(56, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:42:18', NULL, 1, NULL),
(57, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:43:22', NULL, 1, NULL),
(58, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:44:05', NULL, 1, NULL),
(59, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 00:44:50', NULL, 1, NULL),
(60, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 10:05:39', NULL, 1, NULL),
(61, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 10:07:03', NULL, 1, NULL),
(62, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 10:09:29', NULL, 1, NULL),
(63, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 10:09:31', NULL, 1, NULL),
(64, 'tan phuoc2222222222222222', 'nam', 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', '0000-00-00', 'user', '2023-10-11 10:11:50', 'bn5.png', 1, NULL),
(65, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 10:12:44', NULL, 1, '2023-10-10 22:10:49'),
(66, 'Võ Tấn Phước', NULL, 'tanphuoc2008033333@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 11:00:24', NULL, 1, '2023-10-10 22:04:23'),
(67, 'tan phuoc', 'nam', 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', '0000-00-00', 'user', '2023-10-11 11:04:10', 'bn1.jpg', 1, '2023-10-10 22:10:49'),
(68, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'ban long', NULL, 'user', '2023-10-11 11:04:14', NULL, 1, '2023-10-10 22:10:43'),
(69, 'nguyenhung0', 'nam', 'nguyenhung050703@gmail.com', '543023830d1c67aadadd68641c1e274b', '', NULL, '2023-10-08', 'user', '2023-10-11 13:13:00', NULL, 1, NULL),
(70, '', 'nam', '', '543023830d1c67aadadd68641c1e274b', '', '', '0000-00-00', 'user', '2023-10-15 14:45:37', 'teambilding.PNG', 1, NULL),
(71, 'valaplap', NULL, 'valaplap@gmail.com', '422367825d18937e075b1bea56ea38ae', '', NULL, '0000-00-00', 'user', '2023-10-18 08:46:12', NULL, 1, NULL),
(72, 'root', NULL, 'abc@gmail.com', '543023830d1c67aadadd68641c1e274b', '', NULL, '0000-00-00', 'admin', '2023-11-03 13:34:15', NULL, 1, NULL),
(73, 'root', NULL, 'abcd@gmail.com', '543023830d1c67aadadd68641c1e274b', '', NULL, '0000-00-00', 'user', '2023-11-03 13:36:19', NULL, 1, NULL),
(74, 'tan phuoc', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '395116155', 'ban long', NULL, 'user', '2023-11-08 12:35:15', NULL, 1, NULL),
(75, 'Võ Tấn Phước', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'Ấp Long Thạnh, xã Bàn Long, huyện Châu Thành, tỉnh Tiền Giang', NULL, 'user', '2023-11-13 12:05:23', NULL, 1, NULL),
(76, 'Võ Tấn Phước', NULL, 'tanphuoc200803@gmail.com', '543023830d1c67aadadd68641c1e274b', '0395116155', 'Ấp Long Thạnh, xã Bàn Long, huyện Châu Thành, tỉnh Tiền Giang', NULL, 'user', '2023-11-13 12:05:27', NULL, 1, NULL),
(77, 'Phước', 'nam', 'phuoc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', NULL, '0000-00-00', 'user', '2023-11-17 11:52:42', 'banner3.jpg', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`mabl`),
  ADD KEY `binhluan_ibfk1` (`masp`),
  ADD KEY `binhluan_ibfk2` (`matk`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`madhchitiet`),
  ADD KEY `chitietsp_fk1_sp` (`masp`),
  ADD KEY `chitietsp_fk2_dh` (`madh`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`madm`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `makh` (`matk`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`magiohang`),
  ADD KEY `giohang_fk1_matk` (`matk`),
  ADD KEY `giohang_fk2_masp` (`masp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `madm` (`madm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`matk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `mabl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `madhchitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `madm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magiohang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_ibfk2` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`matk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietsp_fk1_sp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietsp_fk2_dh` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`matk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk1_matk` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`matk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giohang_ibfk2_masp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`madm`) REFERENCES `danhmuc` (`madm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
