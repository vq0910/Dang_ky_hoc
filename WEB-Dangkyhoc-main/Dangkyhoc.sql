-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 10, 2021 lúc 08:49 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `Dangkyhoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Account`
--

CREATE TABLE `Account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Account`
--

INSERT INTO `Account` (`id`, `username`, `password`, `roles`) VALUES
(1, 'san', '123', 'admin'),
(5, 'SV1', 'SV1', 'Sinh viên'),
(6, 'SV2', 'SV2', 'Sinh viên'),
(7, 'SV3', 'SV3', 'Sinh viên'),
(8, 'GV1', 'GV1', 'Giảng viên'),
(9, 'GV2', 'GV2', 'Giảng viên'),
(10, 'GV3', 'GV3', 'Giảng viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Chitietkhoahoc`
--

CREATE TABLE `Chitietkhoahoc` (
  `id` int(11) NOT NULL,
  `MKH` int(11) NOT NULL,
  `id_Monhoc` int(11) NOT NULL,
  `id_Giangvien` int(11) NOT NULL,
  `id_Lop` int(11) NOT NULL,
  `id_Hocky` int(11) NOT NULL,
  `id_Namhoc` int(11) NOT NULL,
  `Syso` int(11) NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `Diadiem` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Chitietkhoahoc`
--

INSERT INTO `Chitietkhoahoc` (`id`, `MKH`, `id_Monhoc`, `id_Giangvien`, `id_Lop`, `id_Hocky`, `id_Namhoc`, `Syso`, `NgayBatDau`, `NgayKetThuc`, `Diadiem`) VALUES
(17, 7, 4, 15, 2, 2, 1, 72, '2021-11-15', '2022-01-20', '345 A3'),
(18, 7, 3, 17, 2, 2, 1, 45, '2021-11-15', '2022-01-20', '345 A4'),
(20, 7, 2, 18, 2, 2, 1, 70, '2021-11-15', '2022-01-20', '226 A4'),
(21, 7, 1, 15, 2, 2, 1, 72, '2022-01-30', '2022-03-20', '228 A4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Giangvien`
--

CREATE TABLE `Giangvien` (
  `id` int(11) NOT NULL,
  `MGV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hovaten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Bomon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_khoa` int(11) NOT NULL,
  `id_acc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Giangvien`
--

INSERT INTO `Giangvien` (`id`, `MGV`, `Hovaten`, `Bomon`, `Diachi`, `id_khoa`, `id_acc`) VALUES
(15, 'GV1', 'Nguyễn Tu Trung', 'Công nghệ thông tin', 'Hải Dương', 1, 8),
(17, 'GV2', 'Phạm Xuân Trung', 'Công nghệ thông tin', 'Hải Dương', 1, 9),
(18, 'GV3', 'Nguyễn Văn A', 'Công nghệ thông tin', 'Hà Nội', 1, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Hocky`
--

CREATE TABLE `Hocky` (
  `id` int(11) NOT NULL,
  `Tenhocky` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Hocky`
--

INSERT INTO `Hocky` (`id`, `Tenhocky`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Ketquadangky`
--

CREATE TABLE `Ketquadangky` (
  `id_dk` int(11) NOT NULL,
  `id_sv` int(11) NOT NULL,
  `id_Chitietkhoahoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Ketquadangky`
--

INSERT INTO `Ketquadangky` (`id_dk`, `id_sv`, `id_Chitietkhoahoc`) VALUES
(54, 45, 17),
(81, 44, 17),
(84, 44, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Khoa`
--

CREATE TABLE `Khoa` (
  `id` int(11) NOT NULL,
  `tenkhoa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Khoa`
--

INSERT INTO `Khoa` (`id`, `tenkhoa`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Cơ Khí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Khoahoc`
--

CREATE TABLE `Khoahoc` (
  `MKH` int(11) NOT NULL,
  `Tenkhoahoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDangKy` datetime NOT NULL,
  `HanDangKy` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Khoahoc`
--

INSERT INTO `Khoahoc` (`MKH`, `Tenkhoahoc`, `NgayDangKy`, `HanDangKy`) VALUES
(7, 'Khoá học 2', '2021-11-01 23:06:00', '2021-11-28 23:06:00'),
(21, 'Khoá học 4', '2021-11-20 19:25:00', '2021-11-28 19:25:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Lop`
--

CREATE TABLE `Lop` (
  `id` int(11) NOT NULL,
  `Tenlop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Siso` int(11) NOT NULL,
  `id_khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Lop`
--

INSERT INTO `Lop` (`id`, `Tenlop`, `Siso`, `id_khoa`) VALUES
(2, '60TH1', 72, 1),
(3, '61TH6', 69, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Monhoc`
--

CREATE TABLE `Monhoc` (
  `id` int(11) NOT NULL,
  `Tenmonhoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sotinchi` tinyint(4) NOT NULL,
  `Hocphi` int(255) NOT NULL,
  `id_khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Monhoc`
--

INSERT INTO `Monhoc` (`id`, `Tenmonhoc`, `Sotinchi`, `Hocphi`, `id_khoa`) VALUES
(1, 'Toán rời rạc', 3, 1500000, 1),
(2, 'Nhập môn tư duy tính toán', 3, 1500000, 1),
(3, 'Tư tưởng Hồ Chí Minh', 3, 1500000, 1),
(4, 'Công nghệ Web', 3, 1500000, 1),
(5, 'Toán 1', 3, 1500000, 1),
(6, 'Bơi', 3, 1500000, 1),
(8, 'Chuyên đề 1', 1, 500000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Namhoc`
--

CREATE TABLE `Namhoc` (
  `id` int(11) NOT NULL,
  `Tennamhoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Namhoc`
--

INSERT INTO `Namhoc` (`id`, `Tennamhoc`) VALUES
(1, '2021-2022'),
(2, '2022-2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Sinhvien`
--

CREATE TABLE `Sinhvien` (
  `id` int(11) NOT NULL,
  `Hovaten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MSV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Doituong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CMND` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sodienthoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_lop` int(11) NOT NULL,
  `id_acc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `Sinhvien`
--

INSERT INTO `Sinhvien` (`id`, `Hovaten`, `MSV`, `Doituong`, `CMND`, `Diachi`, `Sodienthoai`, `id_lop`, `id_acc`) VALUES
(44, 'Nguyễn Đức Giang', 'SV1', 'K60', '030200007789', 'Hải Dương', '0981467233', 2, 5),
(45, 'Nguyễn Thuý Vân', 'SV2', 'K61', '030200007791', 'Thái Bình', '0981488068', 3, 6),
(46, 'Hoàng Tiến Sơn', 'SV3', 'K60', '030200007791', 'Thanh Hoá', '0981488068', 2, 7);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Chitietkhoahoc`
--
ALTER TABLE `Chitietkhoahoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MKH` (`MKH`),
  ADD KEY `id_Giangvien` (`id_Giangvien`),
  ADD KEY `id_Hocky` (`id_Hocky`),
  ADD KEY `id_Lop` (`id_Lop`),
  ADD KEY `id_Namhoc` (`id_Namhoc`),
  ADD KEY `id_Monhoc` (`id_Monhoc`);

--
-- Chỉ mục cho bảng `Giangvien`
--
ALTER TABLE `Giangvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khoa` (`id_khoa`),
  ADD KEY `id_acc` (`id_acc`);

--
-- Chỉ mục cho bảng `Hocky`
--
ALTER TABLE `Hocky`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Ketquadangky`
--
ALTER TABLE `Ketquadangky`
  ADD PRIMARY KEY (`id_dk`),
  ADD KEY `id_Chitietkhoahoc` (`id_Chitietkhoahoc`),
  ADD KEY `id_sv` (`id_sv`);

--
-- Chỉ mục cho bảng `Khoa`
--
ALTER TABLE `Khoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Khoahoc`
--
ALTER TABLE `Khoahoc`
  ADD PRIMARY KEY (`MKH`);

--
-- Chỉ mục cho bảng `Lop`
--
ALTER TABLE `Lop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khoa` (`id_khoa`);

--
-- Chỉ mục cho bảng `Monhoc`
--
ALTER TABLE `Monhoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khoa` (`id_khoa`);

--
-- Chỉ mục cho bảng `Namhoc`
--
ALTER TABLE `Namhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `Sinhvien`
--
ALTER TABLE `Sinhvien`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_lop` (`id_lop`),
  ADD KEY `id_acc` (`id_acc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Account`
--
ALTER TABLE `Account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `Chitietkhoahoc`
--
ALTER TABLE `Chitietkhoahoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `Giangvien`
--
ALTER TABLE `Giangvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `Hocky`
--
ALTER TABLE `Hocky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `Ketquadangky`
--
ALTER TABLE `Ketquadangky`
  MODIFY `id_dk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `Khoa`
--
ALTER TABLE `Khoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `Khoahoc`
--
ALTER TABLE `Khoahoc`
  MODIFY `MKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `Lop`
--
ALTER TABLE `Lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `Monhoc`
--
ALTER TABLE `Monhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `Namhoc`
--
ALTER TABLE `Namhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `Sinhvien`
--
ALTER TABLE `Sinhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Chitietkhoahoc`
--
ALTER TABLE `Chitietkhoahoc`
  ADD CONSTRAINT `chitietkhoahoc_ibfk_1` FOREIGN KEY (`MKH`) REFERENCES `Khoahoc` (`MKH`),
  ADD CONSTRAINT `chitietkhoahoc_ibfk_2` FOREIGN KEY (`id_Giangvien`) REFERENCES `Giangvien` (`id`),
  ADD CONSTRAINT `chitietkhoahoc_ibfk_3` FOREIGN KEY (`id_Hocky`) REFERENCES `Hocky` (`id`),
  ADD CONSTRAINT `chitietkhoahoc_ibfk_4` FOREIGN KEY (`id_Lop`) REFERENCES `Lop` (`id`),
  ADD CONSTRAINT `chitietkhoahoc_ibfk_5` FOREIGN KEY (`id_Namhoc`) REFERENCES `Namhoc` (`id`),
  ADD CONSTRAINT `chitietkhoahoc_ibfk_6` FOREIGN KEY (`id_Monhoc`) REFERENCES `Monhoc` (`id`);

--
-- Các ràng buộc cho bảng `Giangvien`
--
ALTER TABLE `Giangvien`
  ADD CONSTRAINT `giangvien_ibfk_2` FOREIGN KEY (`id_khoa`) REFERENCES `Khoa` (`id`),
  ADD CONSTRAINT `giangvien_ibfk_3` FOREIGN KEY (`id_acc`) REFERENCES `Account` (`id`);

--
-- Các ràng buộc cho bảng `Ketquadangky`
--
ALTER TABLE `Ketquadangky`
  ADD CONSTRAINT `ketquadangky_ibfk_1` FOREIGN KEY (`id_Chitietkhoahoc`) REFERENCES `Chitietkhoahoc` (`id`),
  ADD CONSTRAINT `ketquadangky_ibfk_2` FOREIGN KEY (`id_sv`) REFERENCES `Sinhvien` (`id`);

--
-- Các ràng buộc cho bảng `Lop`
--
ALTER TABLE `Lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`id_khoa`) REFERENCES `Khoa` (`id`);

--
-- Các ràng buộc cho bảng `Monhoc`
--
ALTER TABLE `Monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`id_khoa`) REFERENCES `Khoa` (`id`);

--
-- Các ràng buộc cho bảng `Sinhvien`
--
ALTER TABLE `Sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`id_lop`) REFERENCES `Lop` (`id`),
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`id_acc`) REFERENCES `Account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
