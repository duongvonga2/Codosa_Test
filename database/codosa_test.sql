-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 26, 2019 lúc 09:36 PM
-- Phiên bản máy phục vụ: 10.3.12-MariaDB-1:10.3.12+maria~bionic-log
-- Phiên bản PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `codosa_test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `user_name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(1, 'Hoc tap'),
(2, 'Giai tri'),
(3, 'Giao duc'),
(4, 'Ca nhac'),
(5, 'Dien anh'),
(6, 'Hoat hinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `titles`
--

CREATE TABLE `titles` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `titles`
--

INSERT INTO `titles` (`id`, `title_name`) VALUES
(1, 'Hien dai'),
(2, 'Co dien'),
(3, 'Thieu nhi'),
(4, 'Lich su');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `facebook_id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `front_id_card` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `backside_id_card` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `selfie` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `facebook_id`, `first_name`, `last_name`, `email`, `avatar`, `front_id_card`, `backside_id_card`, `selfie`, `status`) VALUES
(6, 1753470361425293, 'Vá»ng', 'DÆ°Æ¡ng', 'duongvonga2@gmail.com', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1753470361425293&height=200&width=200&ext=1550834558&hash=AeRLYdsBvgNA1mI1', 'uploads/1e4e4962c45b4c0192ccdbbe737916e0.jpg', 'uploads/946533.jpg', 'uploads/946536.jpg', 'Ban'),
(7, 15547459538537200, 'Mizukage', 'Hoka', 'duongvonga2mt@gmail.com', 'https://scontent.fdad3-2.fna.fbcdn.net/v/t1.0-9/42576630_155474598718705_3438064631174660096_n.jpg?_nc_cat=107&_nc_oc=AQm_lweTujwwTQAF41WZjewF3FnFE1RGCHTeVzPBIvF1tZFlf13yBR2b1x9rZHu2r3o&_nc_ht=scontent.fdad3-2.fna&oh=8b22b8c5ad0410cec1870ad49ada1c88&oe=5CF7753E', ' ', ' ', ' ', 'ban');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `facebook_id` bigint(20) NOT NULL,
  `title_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `videos`
--

INSERT INTO `videos` (`id`, `facebook_id`, `title_id`, `subject_id`, `youtube_link`, `description`, `status`) VALUES
(7, 1753470361425293, 2, 3, '0xOSEcSOBvo', 'Tráº¥n ThÃ nh', 'Waiting'),
(8, 1753470361425293, 1, 6, '0xOSEcSOBvo', 'vong', 'Ban'),
(9, 1753470361425293, 1, 6, '0xOSEcSOBvo', 'ha ha ha', 'Ban'),
(10, 1753470361425293, 1, 6, '0xOSEcSOBvo', 'ha ha ha', 'Waiting'),
(11, 1753470361425293, 2, 3, '2Vv-BfVoq4g', 'nhac UK', 'Accept'),
(12, 1753470361425293, 2, 3, 'CLvnA3JoL7g', 'Hai', 'Waiting');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
