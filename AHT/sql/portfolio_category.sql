-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 11, 2019 lúc 02:31 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `magento`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `portfolio_category`
--

CREATE TABLE `portfolio_category` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='portfolio_category';

--
-- Đang đổ dữ liệu cho bảng `portfolio_category`
--

INSERT INTO `portfolio_category` (`id`, `name`) VALUES
(1, 'Developer'),
(2, 'Shiper'),
(3, 'Coder');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `portfolio_category`
--
ALTER TABLE `portfolio_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `portfolio_category`
--
ALTER TABLE `portfolio_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
