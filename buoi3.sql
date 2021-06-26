-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2021 lúc 05:04 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `buoi3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(10) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `chitietsp` text NOT NULL,
  `giasp` int(30) NOT NULL,
  `hinhanhsp` varchar(50) NOT NULL,
  `idtv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `chitietsp`, `giasp`, `hinhanhsp`, `idtv`) VALUES
(6, 'HP', 'Laptop cá nhân', 20000000, '../img/hp.jpg', 34),
(7, 'Asus', 'Laptop cá nhân', 12000000, '../img/asus.jpg', 34),
(13, 'ACER', 'Laptop cá nhân', 15000000, '../img/acer.jpg', 34),
(14, 'DELL', 'Laptop cá nhân', 15000000, '../img/dell.jpg', 34);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(5) NOT NULL,
  `tendangnhap` varchar(30) NOT NULL,
  `matkhau` varchar(40) NOT NULL,
  `hinhanh` varchar(30) NOT NULL,
  `gioitinh` varchar(10) NOT NULL,
  `nghenghiep` varchar(30) NOT NULL,
  `sothich` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `tendangnhap`, `matkhau`, `hinhanh`, `gioitinh`, `nghenghiep`, `sothich`) VALUES
(1, 'Trần Thị Ngọc Diệp', ' 0cc175b9c0f1b6a831c', '../img/header.jpg', ' Nữ', 'Sinh viên', 'Du lịch, Âm nhạc, Thời trang, '),
(4, 'b', ' 92eb5ffee6ae2fec3ad', '../img/Screenshot (24).png', ' Nam', 'Học sinh', 'Du lịch, Âm nhạc, Thời trang, '),
(6, 'sdag', ' 0cc175b9c0f1b6a831c', '../img/Screenshot (26).png', ' Khác', 'Học sinh', 'Thể thao, Du lịch, Thời trang,'),
(17, 'a', ' 7215ee9c7d9dc229d29', '../img/header.jpg', ' ', 'Học sinh', 'Du lịch, '),
(18, 'ajgajk', ' 0cc175b9c0f1b6a831c', '../img/', ' ', 'Học sinh', 'Du lịch, '),
(20, 'sban', ' 0cc175b9c0f1b6a831c', '../img/header.jpg', ' ', 'Học sinh', 'Thể thao, Du lịch, '),
(22, 'sbanada', ' 0cc175b9c0f1b6a831c', '../img/header.jpg', ' ', 'Học sinh', 'Thể thao, Du lịch, '),
(24, 'd', ' 8277e0910d750195b44', '../img/header.jpg', ' Nữ', 'Học sinh', 'Du lịch, Thời trang, '),
(25, 'c', ' 4a8a08f09d37b737956', '../img/header.jpg', ' Nữ', 'Học sinh', 'Thể thao, Du lịch, '),
(26, 'e', ' e1671797c52e15f763380b45e841ec32', '../img/header.jpg', ' Nữ', 'Học sinh', 'Thể thao, Thời trang, '),
(27, 'thanh', ' 8478e2bdb758f8467225ae87ed3750c2', '../img/', ' Nam', 'Học sinh', 'Du lịch, '),
(28, 'thanh1', '6b5a94a55646a8bcd3588923ac495338', '../img/', ' Nam', 'Học sinh', 'Thể thao, '),
(29, 'f', '8fa14cdd754f91cc6554c9e71929cce7', '../img/header.jpg', ' Nữ', 'Học sinh', 'Thể thao, Thời trang, '),
(30, 'g', 'b2f5ff47436671b6e533d8dc3614845d', '../img/header.jpg', ' Nữ', 'Học sinh', 'Thể thao, Thời trang, '),
(31, 'h', '2510c39011c5be704182423e3a695e91', '../img/front-end-back-end-là-g', ' Nữ', 'Học sinh', 'Thể thao, Du lịch, '),
(32, 'v', '9e3669d19b675bd57058fd4664205d2a', '../img/header.jpg', ' Nữ', 'Học sinh', 'Thể thao, '),
(33, 'k', '8ce4b16b22b58894aa86c421e8759df3', '../img/header.jpg', ' Nữ', 'Học sinh', 'Du lịch, Thời trang, '),
(34, 'p', '83878c91171338902e0fe0fb97a8c47a', '../img/header.jpg', ' Nữ', 'Học sinh', 'Du lịch, Thời trang, '),
(35, 'q', '7694f4a66316e53c8cdd9d9954bd611d', '../img/header.jpg', ' Nữ', 'Học sinh', 'Du lịch, Thời trang, '),
(36, 'abcde', '0cc175b9c0f1b6a831c399e269772661', '../img/', ' Nữ', 'Học sinh', 'Du lịch, '),
(37, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(38, 'ak', '17540aef7b8470cc3ea8b2b9046af3b6', '../img/front-end-back-end-là-g', ' Nữ', 'Học sinh', 'Thể thao, '),
(39, 'ap', '0cc175b9c0f1b6a831c399e269772661', '../img/', ' Nữ', 'Học sinh', 'Thời trang, '),
(40, 'apk', '0cc175b9c0f1b6a831c399e269772661', '../img/header.jpg', ' Nữ', 'Học sinh', 'Thời trang, '),
(41, 'aka', '0cc175b9c0f1b6a831c399e269772661', '../img/', ' Nam', 'Học sinh', 'Thể thao, '),
(42, 'aab', '0cc175b9c0f1b6a831c399e269772661', '../img/', ' Nữ', 'Học sinh', 'Du lịch, Thời trang, '),
(43, 'aab', '0cc175b9c0f1b6a831c399e269772661', '../img/', ' Nữ', 'Học sinh', 'Du lịch, Thời trang, '),
(44, 'c', '4a8a08f09d37b73795649038408b5f33', '../img/header.jpg', ' Nữ', 'Học sinh', 'Du lịch, '),
(45, 'baby', '0cc175b9c0f1b6a831c399e269772661', '../img/', ' Nữ', 'Học sinh', 'Thể thao, '),
(46, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', '', ''),
(47, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', '', ''),
(48, 'diep', '0cc175b9c0f1b6a831c399e269772661', '../img/header.jpg', ' Nữ', 'Học sinh', 'Âm nhạc, '),
(50, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(51, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(52, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(53, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(54, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(55, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(56, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(57, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(58, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(59, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(60, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(61, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(62, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(63, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(64, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(65, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(66, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(67, '', 'd41d8cd98f00b204e9800998ecf8427e', '../img/', ' ', 'Học sinh', ''),
(68, 'abcdef6', 'efe15549dc4d6abc020fa13c6d6576b6', '../img/', ' ', 'Học sinh', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `foreign_key` (`idtv`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`idtv`) REFERENCES `thanhvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
