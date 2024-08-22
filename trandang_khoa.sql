-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 25, 2024 lúc 06:19 AM
-- Phiên bản máy phục vụ: 10.5.22-MariaDB-cll-lve
-- Phiên bản PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trandang_khoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `trading` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `id_fb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `code`, `trading`, `id_fb`, `note`, `time`) VALUES
(1, NULL, 'via-ip-viet-name-viet-2faavt-tren-1k-ban-be', NULL, 'ps_l=0;ps_n=0;sb=9p29ZfN2ZO6xL6pQksak2mSd;wd=1366x607;datr=9p29ZQMc6GT0xTjB1d7IBATs;locale=vi_VN;c_user=61556011026595;xs=4%3ArVQrTEOdfYuhyA%3A2%3A1706926705%3A-1%3A-1;usida=eyJ2ZXIiOjEsImlkIjoiQXM4OWQ0dHFpbWhzYiIsInRpbWUiOjE3MDY5MjY4MjZ9;presence=C%7B%22t3%22%3A%5B%5D%2C%22utc3%22%3A1706926938815%2C%22v%22%3A1%7D;fr=0NmWaz6jj06pyc72q.AWXapklmwqN9qulka28UX70i2SA.BlvZ4O.E4.AAA.0.0.BlvaPm.AWWfw0ZDGQo;', 'ps_l=0;ps_n=0;sb=9p29ZfN2ZO6xL6pQksak2mSd;wd=1366x607;datr=9p29ZQMc6GT0xTjB1d7IBATs;locale=vi_VN;c_user=61556011026595;xs=4%3ArVQrTEOdfYuhyA%3A2%3A1706926705%3A-1%3A-1;usida=eyJ2ZXIiOjEsImlkIjoiQXM4OWQ0dHFpbWhzYiIsInRpbWUiOjE3MDY5MjY4MjZ9;presence=C%7B%22t3%22%3A%5B%5D%2C%22utc3%22%3A1706926938815%2C%22v%22%3A1%7D;fr=0NmWaz6jj06pyc72q.AWXapklmwqN9qulka28UX70i2SA.BlvZ4O.E4.AAA.0.0.BlvaPm.AWWfw0ZDGQo;|EAAGNO4a7r2wBOyZCZAQPMTZBwadsbICussaMaoGyoyMlxOxoIJKK7Fjkq0diLNt14b8phz5ZA1BXsWtfa6AHEBUKTKhUCMMTH22XAie25quLJb1vE4PKzTg2596ppuDDEjDAZBxD9839lLV2o71h6dG69KWJMZBhiE25na02vAwQkRk70vX7y77j47zSjEDaZCrlgZDZD|EAABsbCS1iHgBO08EsZB9eebXoXlF6OkIvqIZCxlxjJsdQd9yFOUNHSPo3FZBi4xbpS6qUZAw4MAgly5JpDzRoYnzmRsVyVmUgUcJHhldNKKI1oOFcWVEWYnP6gMHZAbYcAFyBRRT8pUEhNsOSSuLxlRnWZAAPbwt5UprPEbyVwmZBgFRopZCsQPxX2ZAdnBULxmZBK7QZDZD', '09:25 03-02-2024'),
(2, 'khoatran06', 'clone-viet-name-vie-2fa-avt-0---5FR-goi-y-ban-be-viet-very-hotmail', 'BER9ZD5LNCFS', 'tijaco4552@rohoza.com', 'tijaco4552@rohoza.com|khoatran2006', '23:14 20-02-2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ctk` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `stk` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `toi_thieu` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bank`
--

INSERT INTO `bank` (`id`, `img`, `name`, `ctk`, `stk`, `toi_thieu`) VALUES
(4, 'https://play-lh.googleusercontent.com/g4opzz09xGJxjSJjkP_TABKffpRu7i4xJPXLerYMbyXUWjDB6cTGy07ebyth91ZBQYs', 'Mb Bank', 'TRAN DANG KHOA', '0936763612', '10000'),
(6, 'https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png', 'Momo', 'TRAN DANG KHOA', '0936763612', '10000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `code` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `taskId` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `seri` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `pin` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `loaithe` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `menhgia` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `thucnhan` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `callback` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `cards`
--

INSERT INTO `cards` (`id`, `code`, `taskId`, `seri`, `pin`, `loaithe`, `menhgia`, `thucnhan`, `username`, `status`, `note`, `callback`, `time`) VALUES
(3, '891373', 'TĐK | Zalo:0936763612', '45654875465423', '546875465125465', 'Viettel', '10000', '8000', 'Khoatran06', 'thatbai', 'Nạp Thẻ Thất Bại', NULL, '21:31 02-08-2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categoriesGame`
--

CREATE TABLE `categoriesGame` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `giamgia` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `categoriesGame`
--

INSERT INTO `categoriesGame` (`id`, `code`, `img`, `title`, `giamgia`) VALUES
(1, 'nick-free-fire-gia-re', 'https://cdn.upanh.info/storage/upload/images/MUA-NICK-FF-SIEU-RE.gif?t=1661178731', 'Nick Free Fire Giá Rẻ', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `code`, `img`, `title`, `note`, `money`, `status`) VALUES
(1, 'clone-viet-name-vie-2fa-avt-0---5FR-goi-y-ban-be-viet-very-hotmail', 'https://i.imgur.com/C4PA73D.png', 'Clone IP Viẹt, Name Việt, 2FA+AVT , 0-5FR, 50% Gợi ý Bạn Bè Việt, Very HOTMAIL', 'Dịnh Dạng: ID|PASS|@FA|TOKEN', '1300', 'on'),
(3, 'via-ip-viet-name-viet-2faavt-tren-1k-ban-be', 'https://i.imgur.com/C4PA73D.png', 'TOKEN FB DẠNG EAAD6V7 (NEW, bảo hành 1-1 khi mua bị die)', 'Dạng xuất: token tỉ lệ block 1%', '3000', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkscam_uytin`
--

CREATE TABLE `checkscam_uytin` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `id_fb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `website` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `dich_vu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `checkscam_uytin`
--

INSERT INTO `checkscam_uytin` (`id`, `code`, `id_fb`, `name`, `phone`, `website`, `money`, `dich_vu`, `mo_ta`) VALUES
(1, 'tran-dang-khoa', '100026315003067', 'Trần Đăng Khoa', '0936763612', 'dichvuquare.com', '1000000', 'Thiết Kế Website', '<li><strong>MB Bank:</strong> 0936763612</li>\n<li><strong>MOMO:</strong> 0936763612</li>'),
(2, 'nguyen-trung-kien', '100024356925527', 'Nguyễn Trung Kiên', '0378949827', '', '1000000', 'DVFB', '<li><strong> Mb Bank:</strong>838618828</li>\n<li><strong> Momo:</strong>0378949827</li>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cron`
--

CREATE TABLE `cron` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tranId` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `partnerId` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `partnerName` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `partnerCode` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `amount` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `demo_img_code`
--

CREATE TABLE `demo_img_code` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_sitecon`
--

CREATE TABLE `ds_sitecon` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `site_con` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_accGame`
--

CREATE TABLE `history_accGame` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `idGame` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `trading` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noteAcc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_Code`
--

CREATE TABLE `history_Code` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `trading` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_createWeb`
--

CREATE TABLE `history_createWeb` (
  `id` int(11) NOT NULL,
  `trading` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `domain` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `timemua` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note_giahan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `end` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_Dvmxh`
--

CREATE TABLE `history_Dvmxh` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `user_tds` varchar(999) DEFAULT NULL,
  `trading` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `type_service` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `type_server` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `uid` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sever` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `amount` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `cmt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `type` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_Host`
--

CREATE TABLE `history_Host` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `goi` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `login` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `taikhoan` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `matkhau` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngaymua` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngayhet` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `domain` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_Momo`
--

CREATE TABLE `history_Momo` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `transactionId` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `amount` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sender` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `senderId` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `key_log`
--

CREATE TABLE `key_log` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `key_code` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `amount` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `start` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `end` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `listGame`
--

CREATE TABLE `listGame` (
  `id` int(11) NOT NULL,
  `code_categories` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `idGame` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `giagoc` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `giagiam` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noteAccount` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `imgDemo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `trading` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_Host`
--

CREATE TABLE `list_Host` (
  `id` int(11) NOT NULL,
  `code` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `capacity` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `list_Host`
--

INSERT INTO `list_Host` (`id`, `code`, `title`, `capacity`, `money`, `note`) VALUES
(1, 'goi-hong-kong-1', 'Gói HongKong 1', '300', '10000', '<li>Băng thông: vô hạn <i class=\'text-success fa fa-check-circle\'></i></li>\r\n                <li class=\"text-primary\">Free chứng chỉ SSL <i class=\'text-success fa fa-check-circle\'></i></li>\r\n                <li>Miền khác: vô hạn <i class=\'text-success fa fa-check-circle\'></i></li>\r\n                <li>Miền bí danh: vô hạn <i class=\'text-success fa fa-check-circle\'></i></li>\r\n                <li>Các thông số khác: vô hạn <i class=\'text-success fa fa-check-circle\'></i></li>\r\n                <li>Backup: không có <i class=\'text-danger fa fa-times-circle\'></i></li>'),
(2, 'goi-hongkong-2', 'Gói HongKong 2', '1000', '20000', '<li>Băng thông: vô hạn <i class=\'text-success fa fa-check-circle\'></i></li>\n                <li class=\"text-primary\">Free chứng chỉ SSL <i class=\'text-success fa fa-check-circle\'></i></li>\n                <li>Miền khác: vô hạn <i class=\'text-success fa fa-check-circle\'></i></li>\n                <li>Miền bí danh: vô hạn <i class=\'text-success fa fa-check-circle\'></i></li>\n                <li>Các thông số khác: vô hạn <i class=\'text-success fa fa-check-circle\'></i></li>\n                <li>Backup: không có <i class=\'text-danger fa fa-times-circle\'></i></li>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_site`
--

CREATE TABLE `log_site` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `type` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ip` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `useragent` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momo_auto`
--

CREATE TABLE `momo_auto` (
  `id` int(11) NOT NULL,
  `user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `apikey` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `momo_auto`
--

INSERT INTO `momo_auto` (`id`, `user`, `apikey`, `phone`) VALUES
(1, 'khoatran06', 'TRAN-DANG-KHOA-2006', '0936763612');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`id`, `note`, `time`) VALUES
(1, '<h5>Các Chức Năng Của Website</h5>\n<li>Bán Clone - Gmail...</li>\n<li>Gạch Thẻ - Rút Tiền - Chuyển Tiền - API</li>\n<li>Bán Hosting Cpanel Auto</li>\n<li>Bán Key Tool</li>\n<li>Kiểm Tra Tên Miền</li>\n<li>Dịch Vụ Mạng xã Hội: Fb, TikTok, Instagram... Tự Thêm Trong Admin</li>\n<li>Quỹ Bảo Hiểm Website</li>', '26-09-2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `key_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `key_code`, `value`, `status`) VALUES
(1, 'note_modal', 'Chào mừng mọi người đến với Website của chúng tôi', 'ON'),
(2, 'account', 'Mua Bán Tài Khoản', 'ON'),
(3, 'card', 'Gạch Thẻ Cào', 'ON'),
(4, 'domain', 'Check Domain', 'ON'),
(5, 'hosting', 'Bán Hosting', 'ON'),
(6, 'coder', 'Bán Code Website', 'ON'),
(7, 'keytool', 'Bán Key Tool', 'ON'),
(8, 'mxh', 'Dịch Vụ Mạng Xã Hội', 'ON'),
(9, 'checkscam', 'Checkscam', 'ON'),
(10, 'key_card', 'c98068edaf58a6d82c74a16e69af2287', 'ON'),
(11, 'api_key_host', '1b787e9614225a7caaf76e23ef5172f71d6faf78f0a5253893e9dd27c', 'ON'),
(12, 'nd_bank', 'NAPTIEN ', 'ON'),
(13, 'money_key', '500', 'ON'),
(14, 'website', 'Tạo Website', 'ON'),
(15, 'token_subgiare', 'nuIKS51cbI0NOtkeJkkFPUvEUZJwoYJ60n1cIzri', 'ON\r\n'),
(16, 'nickgame', 'Bán Tài Khoản Game', 'ON'),
(17, 'api_key_momo', 'TRAN-DANG-KHOA-2006', 'ON'),
(18, 'api_key_mbbank', 'CtqwJNseRVYoWiLmgMBlHjnOkdvErTQZDXUcKaGpzfuPAhFIyxbS', 'ON'),
(19, 'api_key_vcb', '8A3164E3-955D-E909-2025-70A5528B9A58', 'ON'),
(20, 'stk_mbbank', '0936763612', 'ON\r\n'),
(21, 'captcha', '6Leb78wlAAAAAE7M0b6KrYplY9Y255o4nrn2RvNI', 'ON'),
(23, 'order_auto', 'Dịch Vụ MXH Auto?', 'ON'),
(24, 'id_tele', '-853880434', 'ON'),
(25, 'token_tele', '6169189509:AAHSjVloGnIF3flPykn9iEDFf-rCNFFwGOo', 'ON'),
(26, 'api_key_acb', '444', 'ON'),
(27, 'stk_acb', '555', 'ON\r\n'),
(28, 'pass_acb', '666', 'ON'),
(29, 'secret-key-captcha', '6Leb78wlAAAAAAp5nGvO4wzDixhILcnIZXSwKlW1', 'ON'),
(30, 'id_card', '59436046738', 'ON'),
(32, 'top', 'dark', 'ON'),
(33, 'body', 'dark', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `amount` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `trading` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `server`
--

CREATE TABLE `server` (
  `id` int(11) NOT NULL,
  `code_service` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `code_type` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sever` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `max_buff` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `display` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `server`
--

INSERT INTO `server` (`id`, `code_service`, `code_type`, `title`, `sever`, `money`, `status`, `max_buff`, `display`) VALUES
(6, 'like-post', 'facebook', 'Like Việt Giá Rẻ', '02', '20', 'on', '1500000', ' <b class=\"text-info\">(nên dùng ổn định)</b>'),
(10, 'sub-follow', 'facebook', 'Follow dạng mới, max 3m/id Độc quyền (Max Tốc Nên Dùng Bá nhất)', '01', '40', 'on', '99999999', ' <b class=\"text-warning\">(New)</b>'),
(13, 'like', 'instagram', '(Like việt (nên dùng ổn định))	', 'SV!', '20', 'on', '9999999', ' <b class=\"text-success\">(Nên Dùng)</b>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `code`, `title`, `img`) VALUES
(6, 'dich-vu-facebook', 'Dịch Vu Facebook', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `nameAdmin` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phoneAdmin` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `faceAdmin` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `idPage` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `nameWeb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noidungbank` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `logoWeb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `biaWeb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `faviWeb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `motaWeb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tukhoaWeb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `discountWeb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `heartWeb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `colorWeb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `nameAdmin`, `phoneAdmin`, `faceAdmin`, `idPage`, `nameWeb`, `noidungbank`, `logoWeb`, `biaWeb`, `faviWeb`, `motaWeb`, `tukhoaWeb`, `discountWeb`, `heartWeb`, `colorWeb`) VALUES
(1, 'Trần Đăng Khoa', '0936763612', '100026315003067', '100086847108415', 'Trần Đăng Khoa', '', 'https://t4.ftcdn.net/jpg/03/62/59/03/360_F_362590351_nM6CWER6PMhuDw7j3WqIhpmiHWxMHZmv.jpg', 'https://static.kinhtedothi.vn/images/upload/2022/05/25/f1.jpg', 'https://www.facebook.com/images/fb_icon_325x325.png', 'Hệ Thống Chuyên Cung Cấp Dịch Vụ Mạng Xã Hội Phục Vụ Bạn Mọi Lúc Mọi Nơi - Các Dịch Vụ Trên Website Hoàn Toàn Tự Động - Thiết Kế Độc Đáo - An Toàn Cho Người Dùng.', 'Hệ Thống Chuyên Cung Cấp Dịch Vụ Mạng Xã Hội Phục Vụ Bạn Mọi Lúc Mọi Nơi - Các Dịch Vụ Trên Website Hoàn Toàn Tự Động - Thiết Kế Độc Đáo - An Toàn Cho Người Dùng.', '20', '1', '#1833cc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soucerCode`
--

CREATE TABLE `soucerCode` (
  `id` int(11) NOT NULL,
  `img` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `download` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `linkDown` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soucerWeb`
--

CREATE TABLE `soucerWeb` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `title` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `url` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `support`
--

INSERT INTO `support` (`id`, `title`, `url`) VALUES
(3, 'Facebook', 'https://fb.com/trandangkhoa.com.vn'),
(4, 'Zalo', 'https://zalo.me/0936763612');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tds`
--

CREATE TABLE `tds` (
  `id` bigint(20) NOT NULL,
  `username` varchar(999) DEFAULT NULL,
  `password` varchar(999) DEFAULT NULL,
  `xu` varchar(999) DEFAULT '0',
  `trangthai` varchar(999) DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tds`
--

INSERT INTO `tds` (`id`, `username`, `password`, `xu`, `trangthai`) VALUES
(1, 'phknxuu3509', 'khoatran2006', '12700', 'off'),
(2, 'khoa_tran06', 'khoatran2006', '0', 'off'),
(3, 'GMZ5W94', 'khoatran2006', '0', 'off'),
(4, 'kshrmb160', 'khoatran2006', '460', 'off'),
(5, 'Khoa_tran', 'khoa311206', '0', 'off'),
(6, 'vj1wfAZ3DP', 'khoatran2006', '1866100', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transferMoney`
--

CREATE TABLE `transferMoney` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `receiver` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `type` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `type_service` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `code_service` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`id`, `code`, `title`, `img`, `type`, `type_service`, `code_service`, `note`) VALUES
(6, 'like-post-sale', 'like post sale', 'dfsf', 'Like', 'Facebook', 'dich-vu-facebook', 'kkk');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `password` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `password2` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tong_nap` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tong_tru` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `level` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `securityEmail` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `securityPass` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `otp_code` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `bannd` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `apitoken` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `lastdate` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `withdrawCard`
--

CREATE TABLE `withdrawCard` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `banking` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `nameBank` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `numberBank` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `branchBank` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `statusBank` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `moneyBank` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categoriesGame`
--
ALTER TABLE `categoriesGame`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `checkscam_uytin`
--
ALTER TABLE `checkscam_uytin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cron`
--
ALTER TABLE `cron`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `demo_img_code`
--
ALTER TABLE `demo_img_code`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ds_sitecon`
--
ALTER TABLE `ds_sitecon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_accGame`
--
ALTER TABLE `history_accGame`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_Code`
--
ALTER TABLE `history_Code`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_createWeb`
--
ALTER TABLE `history_createWeb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_Dvmxh`
--
ALTER TABLE `history_Dvmxh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_Host`
--
ALTER TABLE `history_Host`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_Momo`
--
ALTER TABLE `history_Momo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `key_log`
--
ALTER TABLE `key_log`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `listGame`
--
ALTER TABLE `listGame`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_Host`
--
ALTER TABLE `list_Host`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `log_site`
--
ALTER TABLE `log_site`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `momo_auto`
--
ALTER TABLE `momo_auto`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `soucerCode`
--
ALTER TABLE `soucerCode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `soucerWeb`
--
ALTER TABLE `soucerWeb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tds`
--
ALTER TABLE `tds`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transferMoney`
--
ALTER TABLE `transferMoney`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `withdrawCard`
--
ALTER TABLE `withdrawCard`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categoriesGame`
--
ALTER TABLE `categoriesGame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `checkscam_uytin`
--
ALTER TABLE `checkscam_uytin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cron`
--
ALTER TABLE `cron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `demo_img_code`
--
ALTER TABLE `demo_img_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ds_sitecon`
--
ALTER TABLE `ds_sitecon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_accGame`
--
ALTER TABLE `history_accGame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_Code`
--
ALTER TABLE `history_Code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_createWeb`
--
ALTER TABLE `history_createWeb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_Dvmxh`
--
ALTER TABLE `history_Dvmxh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_Host`
--
ALTER TABLE `history_Host`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_Momo`
--
ALTER TABLE `history_Momo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `key_log`
--
ALTER TABLE `key_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `listGame`
--
ALTER TABLE `listGame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `list_Host`
--
ALTER TABLE `list_Host`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `log_site`
--
ALTER TABLE `log_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `momo_auto`
--
ALTER TABLE `momo_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `server`
--
ALTER TABLE `server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `soucerCode`
--
ALTER TABLE `soucerCode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `soucerWeb`
--
ALTER TABLE `soucerWeb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tds`
--
ALTER TABLE `tds`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `transferMoney`
--
ALTER TABLE `transferMoney`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `withdrawCard`
--
ALTER TABLE `withdrawCard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
