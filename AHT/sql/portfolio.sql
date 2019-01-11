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
-- Cấu trúc bảng cho bảng `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Id',
  `thumbnail` varchar(255) NOT NULL DEFAULT '' COMMENT 'Thumbnail',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT 'Image',
  `client` varchar(255) NOT NULL DEFAULT '' COMMENT 'Client',
  `project` varchar(255) NOT NULL DEFAULT '' COMMENT 'Project',
  `skill` varchar(255) NOT NULL DEFAULT '' COMMENT 'Skill',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Status',
  `content` mediumtext NOT NULL COMMENT 'Content',
  `category_id` int(11) NOT NULL COMMENT 'Category_id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='portfolio';

--
-- Đang đổ dữ liệu cho bảng `portfolio`
--

INSERT INTO `portfolio` (`id`, `thumbnail`, `image`, `client`, `project`, `skill`, `status`, `content`, `category_id`) VALUES
(2, 'portfolio/anh-dep-1_4.jpg', 'portfolio/ed5ae74eca67a14cbf5ed4f779b38097_6.jpg', 'Đỗ Đức', 'Project nodejs', 'Nodejs', 1, 'Đây là project nodejs', 2),
(3, 'portfolio/anh-dep-1_5.jpg', 'portfolio/ed5ae74eca67a14cbf5ed4f779b38097_7.jpg', 'Nguyễn Hữu Yên', 'PHP 01', 'PHP', 1, 'Project PHP', 2),
(4, 'portfolio/children-around-the-world-16-ohay-tv-360.jpg', 'portfolio/an9_TDCP.jpg', 'Đỗ Văn Nga', 'Website khách sạn', 'java', 1, 'Ông này kinh nghiệm tốt này', 1),
(5, 'portfolio/hinh-anh-cuoc-song-buon-be-tac-co-don-35.jpg', 'portfolio/t_i_xu_ng.jpg', 'Trần Vượng', 'Java Trường học', 'java', 0, 'Chịu không biết viết gì cả', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
