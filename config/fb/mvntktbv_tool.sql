-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 28, 2023 lúc 09:44 PM
-- Phiên bản máy phục vụ: 10.3.39-MariaDB-log-cll-lve
-- Phiên bản PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvntktbv_tool`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cookiefb`
--

CREATE TABLE `cookiefb` (
  `id` bigint(20) NOT NULL,
  `data` varchar(20) NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `idfb` varchar(30) NOT NULL,
  `cookie` varchar(5000) NOT NULL,
  `token` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `cookiefb`
--

INSERT INTO `cookiefb` (`id`, `data`, `name`, `idfb`, `cookie`, `token`, `date`, `ip`) VALUES
(1120, 'Live', 'Trần Đăng Khoa', '100087109204883', 'sb=QylsZKR_TO7L1Sl6shoFdZv4; datr=QylsZOIIc9oEZOO2-5xsyH7d; vpd=v1%3B650x400x2.0000000298023224; locale=vi_VN; dpr=1.375; c_user=100087109204883; xs=6%3A7wz4XuQld531Dw%3A2%3A1688012964%3A-1%3A6280; fr=0a8x1Qte44fGrMHyZ.AWXChKBsoXiDW1g85F3UKlPYlsk.BknQg_.pi.AAA.0.0.BknQim.AWUU0Rwwm38; wd=897x678', '', '2023-06-29', '58.187.74.196, 172.71.218.134'),
(1121, 'Live', 'Trần Đăng Khoa', '100087109204883', 'sb=QylsZKR_TO7L1Sl6shoFdZv4; datr=QylsZOIIc9oEZOO2-5xsyH7d; vpd=v1;650x400x2.0000000298023224; locale=vi_VN; dpr=1.375; c_user=100087109204883; xs=6:7wz4XuQld531Dw:2:1688012964:-1:6280; fr=0a8x1Qte44fGrMHyZ.AWXChKBsoXiDW1g85F3UKlPYlsk.BknQg_.pi.AAA.0.0.BknQim.AWUU0Rwwm38; wd=897x678', '', '2023-06-29', '58.187.74.196, 172.71.214.196');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cookietiktok`
--

CREATE TABLE `cookietiktok` (
  `id` bigint(20) NOT NULL,
  `cookie` varchar(500) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `cookietiktok`
--

INSERT INTO `cookietiktok` (`id`, `cookie`, `user_name`, `user_id`, `date`, `ip`) VALUES
(1, '_ttp=2A5ylcwYpBgL87g0ElAgiE5kRDi; from_way=paid; tta_attr_id=0.1671469829.7178908253827383298; _gcl_au=1.1.1133767573.1674143671; tiktok_webapp_theme=light; __tea_cache_tokens_1988={%22_type_%22:%22default%22%2C%22user_unique_id%22:%227190392243172902402%22%2C%22timestamp%22:1674143715151}; passport_csrf_token=ad4067ba8cd274f610b14aed02618850; passport_csrf_token_default=ad4067ba8cd274f610b14aed02618850; cmpl_token=AgQQAPOFF-RO0rP3iU3OpN08-aj-lbWUv4AOYMpZTw; passport_auth_status=4305a77c676638a8', 'user9788281762713', '7190392535977952261', '2023-01-24', '184.193.29'),
(2, '_ttp=2A5ylcwYpBgL87g0ElAgiE5kRDi; from_way=paid; tta_attr_id=0.1671469829.7178908253827383298; _gcl_au=1.1.1133767573.1674143671; tiktok_webapp_theme=light; __tea_cache_tokens_1988={\"_type_\":\"default\",\"user_unique_id\":\"7190392243172902402\",\"timestamp\":1674143715151}; passport_csrf_token=ad4067ba8cd274f610b14aed02618850; passport_csrf_token_default=ad4067ba8cd274f610b14aed02618850; cmpl_token=AgQQAPOFF-RO0rP3iU3OpN08-aj-lbWUv4AOYMpZTw; passport_auth_status=4305a77c676638a8f1c9ba717bb02d20,; passp', 'tichvugiareml_keynga', '7190392535977952261', '2023-01-24', '58.186.165.155'),
(3, '_ttp=2A5ylcwYpBgL87g0ElAgiE5kRDi; from_way=paid; tta_attr_id=0.1671469829.7178908253827383298; _gcl_au=1.1.1133767573.1674143671; tiktok_webapp_theme=light; __tea_cache_tokens_1988={\"_type_\":\"default\",\"user_unique_id\":\"7190392243172902402\",\"timestamp\":1674143715151}; passport_csrf_token=ad4067ba8cd274f610b14aed02618850; passport_csrf_token_default=ad4067ba8cd274f610b14aed02618850; cmpl_token=AgQQAPOFF-RO0rP3iU3OpN08-aj-lbWUv4AOYMpZTw; passport_auth_status=4305a77c676638a8f1c9ba717bb02d20,; passp', 'tichvugiareml_keynga', '7190392535977952261', '2023-01-24', '58.186.165.155'),
(4, '_ttp=2A5ylcwYpBgL87g0ElAgiE5kRDi; from_way=paid; tta_attr_id=0.1671469829.7178908253827383298; _gcl_au=1.1.1133767573.1674143671; tiktok_webapp_theme=light; __tea_cache_tokens_1988={\"_type_\":\"default\",\"user_unique_id\":\"7190392243172902402\",\"timestamp\":1674143715151}; passport_csrf_token=ad4067ba8cd274f610b14aed02618850; passport_csrf_token_default=ad4067ba8cd274f610b14aed02618850; cmpl_token=AgQQAPOFF-RO0rP3iU3OpN08-aj-lbWUv4AOYMpZTw; passport_auth_status=4305a77c676638a8f1c9ba717bb02d20,; passp', 'tichvugiareml_keynga', '7190392535977952261', '2023-01-24', '58.186.165.155'),
(5, '_ttp=2A5ylcwYpBgL87g0ElAgiE5kRDi; from_way=paid; tta_attr_id=0.1671469829.7178908253827383298; _gcl_au=1.1.1133767573.1674143671; tiktok_webapp_theme=light; __tea_cache_tokens_1988={\"_type_\":\"default\",\"user_unique_id\":\"7190392243172902402\",\"timestamp\":1674143715151}; passport_csrf_token=ad4067ba8cd274f610b14aed02618850; passport_csrf_token_default=ad4067ba8cd274f610b14aed02618850; cmpl_token=AgQQAPOFF-RO0rP3iU3OpN08-aj-lbWUv4AOYMpZTw; passport_auth_status=4305a77c676638a8f1c9ba717bb02d20,; passp', 'tichvugiareml_keynga', '7190392535977952261', '2023-01-24', '58.186.165.155');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `keyngay`
--

CREATE TABLE `keyngay` (
  `id` bigint(20) NOT NULL,
  `key` varchar(50) NOT NULL,
  `songay` int(11) NOT NULL,
  `ngaytao` varchar(50) NOT NULL,
  `ngayhan` varchar(50) NOT NULL,
  `rutgon1` varchar(50) NOT NULL,
  `rutgon2` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `keyngay`
--

INSERT INTO `keyngay` (`id`, `key`, `songay`, `ngaytao`, `ngayhan`, `rutgon1`, `rutgon2`, `ip`) VALUES
(87, 'cADHAWavM4', 1, '2023-06-29 07:27:33', '2023-06-30 07:27:33', 'https://mneylink.com/dkORltjT', 'https://link1s.com/kdiR', '103.189.202.24, 162.158.178.26');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cookiefb`
--
ALTER TABLE `cookiefb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cookietiktok`
--
ALTER TABLE `cookietiktok`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `keyngay`
--
ALTER TABLE `keyngay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cookiefb`
--
ALTER TABLE `cookiefb`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1122;

--
-- AUTO_INCREMENT cho bảng `cookietiktok`
--
ALTER TABLE `cookietiktok`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `keyngay`
--
ALTER TABLE `keyngay`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
