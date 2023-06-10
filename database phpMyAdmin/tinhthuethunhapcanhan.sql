-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 10, 2023 lúc 04:51 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tinhthuethunhapcanhan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'hiendz', 'levanhien17@gmail.com', '$2y$10$mVuGEiUYG8uEEnnXTG1X9O3Tp0q3ar64mDwnMk9Np65ZvBfx7dQr6'),
(2, 'hiendz', 'levanhien1711@gmail.com', '$2y$10$4eMeKVOO4Ph8FFTZf./tpuw0r5S5IwIFLO4Nddw6eFNQlYJ85.8SO'),
(3, 'hiendz', 'levanhien171100@gmail.com', '$2y$10$yRwiXAWPJ7uyrO66lZFLzuEWBVPGpWOOJSVC./yTRXSRnNuTTgIiG'),
(9, 'levanhien', 'levanhienss@gmail.com', '$2y$10$RDy0ad5OmuKD.yeeoHRAe.8lWEYMx6fc0BUVePa55gnBSb75T0J6C');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `tongthunhap` int(100) NOT NULL,
  `songuoiphuthuoc` int(100) NOT NULL,
  `thuephainop` int(100) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id`, `customer_id`, `tongthunhap`, `songuoiphuthuoc`, `thuephainop`, `thoigian`) VALUES
(16, 2, 120000000, 0, 28300000, '2023-06-06 13:26:24'),
(17, 2, 50000000, 0, 6500000, '2023-06-06 13:26:35'),
(18, 2, 23000000, 0, 1050000, '2023-06-06 13:33:32'),
(53, 1, 0, 0, 0, '2023-06-08 18:27:49'),
(54, 1, 0, 0, 0, '2023-06-08 18:43:55'),
(55, 1, 2000000000, 1, 684760000, '2023-06-09 11:30:50'),
(56, 1, 2000000000, 1, 684760000, '2023-06-09 11:30:58'),
(57, 1, 2000000000, 2, 683220000, '2023-06-09 11:31:39'),
(58, 1, 2000000000, 2, 683220000, '2023-06-09 11:31:49'),
(59, 1, 200000000, 3, 51680000, '2023-06-09 11:32:11'),
(60, 1, 200000000, 3, 51680000, '2023-06-09 11:32:23'),
(61, 1, 0, 1, 0, '2023-06-09 11:32:39'),
(62, 1, 0, 1, 0, '2023-06-09 11:32:46'),
(63, 1, 0, 0, 0, '2023-06-09 11:32:56'),
(64, 1, 0, 0, 0, '2023-06-09 11:34:20'),
(65, 1, 0, 0, 0, '2023-06-09 11:34:29'),
(66, 1, 2000000000, 0, 686300000, '2023-06-09 11:34:46'),
(67, 1, 2000000000, 0, 686300000, '2023-06-09 11:34:59');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
