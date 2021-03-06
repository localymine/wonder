-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 6 月 03 日 11:40
-- サーバのバージョン： 5.5.60
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speed_force`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `brands`
--

INSERT INTO `brands` (`id`, `name`, `remarks`, `created`, `updated`) VALUES
(1, 'Adidas', NULL, '2019-01-03 00:00:00', '2019-01-03 00:00:00'),
(2, 'Chivas Regal Mizunara', 'Blended Scotch Whisky', '2019-01-03 00:00:00', '2019-01-03 00:00:00'),
(3, 'Pigeon', 'nội địa jp\r\nhttps://www.pigeon.co.jp/\r\nhttps://www.amazon.co.jp/stores/Pigeon%E3%83%94%E3%82%B8%E3%83%A7%E3%83%B3/Pigeon%E3%83%94%E3%82%B8%E3%83%A7%E3%83%B3/page/3E7C6BE4-A6D0-424A-A298-3429EBF594D2', '2019-02-19 00:00:00', '2019-05-31 12:08:41'),
(4, 'Kowa', 'nội địa jp', '2019-02-19 00:00:00', '2019-02-19 00:00:00'),
(5, 'Aneron', 'エスエス製薬株式会社', '2019-02-19 00:00:00', '2019-02-19 00:00:00'),
(6, 'Transino', 'nội địa jp', '2019-02-22 00:00:00', '2019-02-22 00:00:00'),
(7, 'Shiseido', 'https://www.shiseido.co.jp/', '2019-03-20 00:00:00', '2019-05-27 11:54:22'),
(8, 'Asahi', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(9, 'DHC', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(10, 'Attonon', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(11, 'iSDG', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(12, 'Botanical', 'ボタニカル', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(13, 'Santen', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(14, 'Rohto', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(15, 'Labo', '', '2019-03-22 00:00:00', '2019-05-12 00:25:51'),
(16, 'Shu Uemura', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(17, 'Zeria', NULL, '2019-03-25 00:00:00', '2019-03-25 00:00:00'),
(18, 'Kose', NULL, '2019-03-26 00:00:00', '2019-03-26 00:00:00'),
(19, 'Morishita Jintan', '森下仁丹', '2019-03-26 00:00:00', '2019-03-26 00:00:00'),
(20, 'Orihiro', NULL, '2019-03-30 00:00:00', '2019-03-30 00:00:00'),
(21, 'Inochi no haha', NULL, '2019-03-30 00:00:00', '2019-03-30 00:00:00'),
(22, 'GRAPHICO', 'グラフィコ', '2019-03-30 00:00:00', '2019-03-30 00:00:00'),
(23, 'Unilever', NULL, '2019-04-05 00:00:00', '2019-04-05 00:00:00'),
(24, 'Okinawan Fucoidan', NULL, '2019-04-05 00:00:00', '2019-04-05 00:00:00'),
(25, 'byKuro', NULL, '2019-04-05 00:00:00', '2019-04-05 00:00:00'),
(26, 'Muhi', 'Ikeda Mohando', '2019-04-05 00:00:00', '2019-04-05 00:00:00'),
(27, 'SK-II', 'https://www.sk-ii.jp/', '2019-04-05 00:00:00', '2019-05-27 11:53:42'),
(28, 'Maquillage', NULL, '2019-04-06 00:00:00', '2019-04-06 00:00:00'),
(29, 'Botanist', NULL, '2019-04-07 00:00:00', '2019-04-07 00:00:00'),
(30, 'Nivea', NULL, '2019-04-08 00:00:00', '2019-04-08 00:00:00'),
(31, 'Mentholatum', NULL, '2019-04-08 00:00:00', '2019-04-08 00:00:00'),
(32, 'BLV', NULL, '2019-04-08 00:00:00', '2019-04-08 00:00:00'),
(33, 'Revlon', 'lipstick', '2019-04-10 00:00:00', '2019-04-10 00:00:00'),
(34, 'Chifure', NULL, '2019-04-10 00:00:00', '2019-04-10 00:00:00'),
(35, 'Wakodo', NULL, '2019-04-11 00:00:00', '2019-04-11 00:00:00'),
(36, 'Meiji', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(37, 'Kobayashi', '', '2019-04-12 00:00:00', '2019-04-17 15:13:15'),
(38, 'UHA', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(39, 'Everish', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(40, 'Mimi', 'エムアンドエム', '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(41, 'Nike', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(42, 'Pepee', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(43, 'RyuKaKuSan', NULL, '2019-04-13 00:00:00', '2019-04-13 00:00:00'),
(44, 'Taisho', NULL, '2019-04-13 00:00:00', '2019-04-13 00:00:00'),
(45, 'Country & Stream', NULL, '2019-04-14 00:00:00', '2019-04-14 00:00:00'),
(46, 'Muji', NULL, '2019-04-15 00:00:00', '2019-04-15 00:00:00'),
(47, 'Cola', NULL, '2019-04-15 00:00:00', '2019-04-15 00:00:00'),
(48, 'Fine', NULL, '2019-04-15 00:00:00', '2019-04-15 00:00:00'),
(49, 'Pelican Soap', 'http://www.pelicansoap.co.jp/item/allproduct.html', '2019-04-15 00:00:00', '2019-06-02 01:03:05'),
(50, 'Kate', NULL, '2019-04-15 00:00:00', '2019-04-15 00:00:00'),
(51, 'Calbee', NULL, '2019-04-15 00:00:00', '2019-04-15 00:00:00'),
(52, 'WHITE CONC', NULL, '2019-04-15 00:00:00', '2019-04-15 00:00:00'),
(53, 'Nissin', '', '2019-04-17 16:57:04', '2019-04-17 16:57:04'),
(54, 'MaybeLine', '', '2019-04-23 11:51:41', '2019-04-23 11:51:41'),
(55, 'YSL', 'lips', '2019-04-26 16:22:51', '2019-04-26 16:22:51'),
(56, 'ECOVACS', 'cleaning robot', '2019-04-28 01:49:17', '2019-04-28 01:49:17'),
(57, 'ILIFE', 'cleaning robot', '2019-04-28 01:50:07', '2019-04-28 01:50:07'),
(58, 'TOSHIBA', '東芝', '2019-04-28 01:53:10', '2019-04-28 11:31:03'),
(59, 'Hada Labo', 'https://jp.rohto.com/hadalabo/\r\nhttps://www.rohto.co.jp/global/brands/\r\nhttps://www.rohto.co.jp/global/company/nsn/skincare/', '2019-05-12 00:26:03', '2019-05-29 17:06:09'),
(60, 'PITTA', '', '2019-05-13 12:52:02', '2019-05-13 12:52:02'),
(61, 'Deonatulle', '', '2019-05-18 01:45:51', '2019-05-18 01:45:51'),
(62, 'Kailijumei', '', '2019-05-18 10:47:14', '2019-05-18 10:47:14'),
(63, '8x4', '', '2019-05-19 02:43:53', '2019-05-19 02:43:53'),
(64, 'Morinaga', '', '2019-05-19 13:33:44', '2019-05-19 13:33:44'),
(65, 'Canmake', 'https://www.canmake.com\r\nhttps://www.canmake.com/item/detail/76', '2019-05-26 19:26:53', '2019-06-02 01:35:07'),
(66, 'Cezanne', 'https://www.cezanne.co.jp', '2019-05-27 11:23:17', '2019-05-27 11:49:49'),
(67, 'Mochida', 'http://hc.mochida.co.jp\r\nhttp://hc.mochida.co.jp/brand/furfur.html', '2019-05-27 11:46:14', '2019-05-27 11:52:19'),
(68, 'Daiso', '', '2019-05-27 12:07:27', '2019-05-27 12:07:27'),
(69, 'Lush', 'https://jn.lush.com/', '2019-05-27 12:08:15', '2019-05-27 12:08:28'),
(70, 'Iwako', 'イワコー', '2019-05-28 18:31:03', '2019-05-28 18:31:03'),
(71, 'GU', 'https://www.gu-japan.com/jp/pc/', '2019-06-02 01:00:39', '2019-06-02 01:56:34');

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`id`, `name`, `remarks`, `created`, `updated`) VALUES
(1, 'Sport Shoe', NULL, '2019-01-03 00:00:00', '2019-01-03 00:00:00'),
(2, 'Scotch whiskey', 'water and malted barley', '2019-01-03 00:00:00', '2019-01-03 00:00:00'),
(3, 'Spray', NULL, '2019-02-19 00:00:00', '2019-02-19 00:00:00'),
(4, 'Plastic', NULL, '2019-02-19 00:00:00', '2019-02-19 00:00:00'),
(5, 'Matcha', 'loại blending', '2019-02-19 00:00:00', '2019-02-19 00:00:00'),
(6, 'Capsule', 'thuốc viên con nhộng', '2019-02-19 00:00:00', '2019-02-19 00:00:00'),
(7, 'Beauty Care', NULL, '2019-02-22 00:00:00', '2019-02-22 00:00:00'),
(8, 'Healthcare', NULL, '2019-02-22 00:00:00', '2019-02-22 00:00:00'),
(9, 'Diet', NULL, '2019-02-22 00:00:00', '2019-02-22 00:00:00'),
(10, 'Medicine', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(11, 'Gel', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(12, 'Cream', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(13, 'Eye Drops', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(14, 'Sunscreen', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(15, 'Foundation', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(16, 'Medicare', NULL, '2019-03-26 00:00:00', '2019-03-26 00:00:00'),
(17, 'Food', NULL, '2019-03-31 00:00:00', '2019-03-31 00:00:00'),
(18, 'Lipstick', '', '2019-04-06 00:00:00', '2019-04-28 01:52:03'),
(19, 'Perfume', NULL, '2019-04-08 00:00:00', '2019-04-08 00:00:00'),
(20, 'Hair Care', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(21, 'Face Wash', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(22, 'Candy', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(23, 'Gummy', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(24, 'Mask', NULL, '2019-04-12 00:00:00', '2019-04-12 00:00:00'),
(25, 'Treatment', '', '2019-04-23 12:02:22', '2019-04-23 12:02:22'),
(26, 'Cleaning Robot', '', '2019-04-28 01:51:34', '2019-04-28 01:51:34'),
(27, 'Placenta', '', '2019-05-13 12:19:09', '2019-05-13 12:19:09'),
(28, 'EyeCare', '', '2019-05-18 01:03:37', '2019-05-18 01:03:37'),
(29, 'Deodorant', '', '2019-05-18 01:48:05', '2019-05-18 01:48:05'),
(30, 'Supplement', '', '2019-05-18 10:45:38', '2019-05-18 10:45:38'),
(31, 'Pregnant Milk', '', '2019-05-19 13:34:08', '2019-05-19 13:34:08'),
(32, 'Baby Food', '', '2019-05-26 12:53:39', '2019-05-26 12:53:39'),
(33, 'Water Lotion', 'Mineral Water Location', '2019-05-26 13:11:34', '2019-05-26 13:11:34'),
(34, 'Toy', '', '2019-05-28 18:32:09', '2019-05-28 18:34:56');

-- --------------------------------------------------------

--
-- テーブルの構造 `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: KH bthg; 1: KH si; 2: Transport',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `country_id`, `name`, `firstname`, `lastname`, `postal`, `address`, `email`, `phone`, `remarks`, `type`, `disabled`, `created`, `updated`) VALUES
(1, 1, 1, 'Thái Mập', 'Phạm Phong', 'Thái', NULL, '56/15 Tô Hiệu P.Tân Thới Hòa Q.Tân Phú', NULL, '0835138178', NULL, 0, 0, '2019-01-01 00:00:00', '2019-01-01 00:00:00'),
(2, 1, 1, 'Quí VTA', 'Tống Thị Kim', 'Quí', NULL, '163/15/9 tô hiến thành p13 q10', '', '0902398633', 'chuyên bán hàng Quảng Châu, mỹ phẩm', 0, 0, '2019-01-03 00:53:14', '2019-04-08 12:08:52'),
(3, 1, 1, 'Lan (Aris)', 'Lan', 'Nguyễn Thị', NULL, '', '', '0933906061', '0071005548715 - vcb chi nhánh HCM\r\nnguyễn thị lan', 0, 0, '2019-02-18 17:35:19', '2019-02-19 15:23:19'),
(4, 1, 1, 'Hy Aris', 'Hy', 'Nguyễn Đức', NULL, '', '', '01223891366', 'Vietcombank 0441000636934', 0, 0, '2019-02-18 17:36:07', '2019-02-19 11:26:42'),
(5, 1, 1, 'Hậu VTA', 'Hậu', 'Phan Hữu', NULL, '148/12/7/21 Tôn Đản, Phường 8, Quận 4', '', '0935457566', '', 0, 0, '2019-02-22 11:33:06', '2019-02-24 11:11:46'),
(6, 1, 1, 'Nam Cargo', 'Nam', 'Trần Văn', NULL, '', 'netnam82@gmail.com', '+81 - 036912.9337', 'Vietcombank chi nhánh Thành Công\r\n0451000229321\r\n\r\n+84 93 457 42 39', 2, 0, '2019-03-01 18:14:00', '2019-04-10 17:19:14'),
(7, 1, 2, 'Nguyễn Tiến ', 'Dũng', '', NULL, '830-0033 福岡県久留米市天神町82-3天神ウエノビル405号', '', '08064337979', '830-0033\r\n福岡県久留米市天神町82-3天神ウエノビル405号', 0, 0, '2019-03-12 10:29:08', '2019-03-12 10:29:08'),
(8, 1, 1, 'Bé Cẩm (ốp lưng)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-06 20:56:18', '2019-04-06 20:56:18'),
(9, 1, 1, 'Bé Trâm', '', '', NULL, '', '', '', '', 0, 0, '2019-04-06 21:03:14', '2019-04-06 21:03:14'),
(10, 1, 1, 'Như Như', 'Như', 'Trần Lê Quỳnh', NULL, '350/36 Huỳnh Tấn Phát, P.Bình Thuận Q7, Tp.HCM', '', '0938051575', '', 1, 0, '2019-04-06 21:03:31', '2019-04-21 09:54:25'),
(11, 1, 1, 'Mi Nhon', '', '', NULL, '', '', '', '', 1, 0, '2019-04-06 21:03:53', '2019-04-14 02:45:05'),
(12, 1, 1, 'Linda', '', '', NULL, '101/1 đình nghi xuân KP 10 .Bình trị đông Bình tân', 'shopping@client.com', '0939.658.579', '', 0, 0, '2019-04-07 22:28:56', '2019-04-08 00:00:30'),
(13, 1, 1, 'Bé Tiền', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-08 00:10:18', '2019-04-08 00:10:18'),
(14, 1, 1, 'Chị Phượng', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-08 00:22:55', '2019-04-08 00:22:55'),
(15, 1, 1, 'Chị Trang (nhà)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-08 00:28:42', '2019-04-08 00:28:42'),
(16, 1, 1, 'Dì Trang (nhà)', '', '', NULL, '', '', '', '', 1, 0, '2019-04-08 01:52:00', '2019-04-08 01:52:00'),
(17, 1, 1, 'Luyến (Nail)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-08 11:48:36', '2019-04-08 11:48:36'),
(18, 1, 1, 'Ngọc (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-08 12:01:50', '2019-04-08 12:01:50'),
(19, 1, 1, 'Nana', '', '', NULL, '508-527 điện biên phủ .p,15 bình thạnh', 'shopping@client.com', '0945.585.508', '', 0, 0, '2019-04-08 12:07:24', '2019-04-08 12:07:53'),
(20, 1, 1, 'Trung (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-08 12:42:54', '2019-04-08 12:42:54'),
(21, 1, 1, 'Uyên (nhà)', '', '', NULL, '', '', '', '', 1, 0, '2019-04-08 12:54:46', '2019-04-08 12:54:46'),
(22, 1, 1, 'Hà (Chị Linh)', '', '', NULL, '70 lữ gia q11', '', '0937.009.376', '', 0, 0, '2019-04-08 14:04:01', '2019-04-08 14:04:01'),
(23, 1, 1, 'Bé Phương (Kho VTA)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-08 14:13:50', '2019-04-08 14:13:50'),
(24, 1, 1, 'Nhung (Lagi)', '', '', NULL, '', 'shopping@client.com', '', '', 1, 0, '2019-04-08 14:17:16', '2019-04-08 14:17:30'),
(25, 1, 1, 'Bé Tín (Lagi)', '', '', NULL, '', 'shopping@client.com', '', '', 1, 0, '2019-04-08 14:25:54', '2019-04-14 02:44:33'),
(26, 1, 1, 'Trinh (Nail)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-08 14:39:11', '2019-04-08 14:39:11'),
(27, 1, 1, 'Bé Minh', '', '', '', '', 'shopping@client.com', '', '', 0, 0, '2019-04-10 02:44:22', '2019-04-29 03:22:40'),
(28, 1, 1, 'Bé Lý', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 02:47:10', '2019-04-10 02:47:10'),
(29, 1, 1, 'Chị Hương', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 02:53:55', '2019-04-10 02:53:55'),
(30, 1, 1, 'Chị Bi (aThanh)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 02:55:46', '2019-04-10 02:55:46'),
(31, 1, 1, 'Đạt (VTA)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 02:57:38', '2019-04-10 02:57:38'),
(32, 1, 1, 'Bé Na', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 03:09:47', '2019-04-10 03:09:47'),
(33, 1, 1, 'Giang (Q6)', '', '', NULL, '', 'shopping@client.com', '', '', 0, 0, '2019-04-10 03:15:03', '2019-04-10 14:36:00'),
(34, 1, 1, 'Trinh (Pops)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 03:20:01', '2019-04-10 03:20:01'),
(35, 1, 1, 'Chị Linh', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 03:50:55', '2019-04-10 03:50:55'),
(36, 1, 1, 'Dũng Gấu Japan', 'Dũng', 'Nguyễn Tiến', '830-0033', '福岡県久留米市天神町82-3　天神ウエノビル405号', 'Nguyendung3006jp@gmail.com', '080-6433-7979', '福岡県久留米市天神町82-3　天神ウエノビル405号', 2, 0, '2019-04-10 03:52:04', '2019-04-27 14:40:35'),
(37, 1, 1, 'Bé Hà Bom', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 12:24:42', '2019-04-10 12:24:42'),
(38, 1, 1, 'Chị Bi (Bo)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 12:31:16', '2019-04-10 12:31:16'),
(39, 1, 1, 'Bé Vân (Ma Lâm)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 12:48:51', '2019-04-10 12:48:51'),
(40, 1, 1, 'Bé Phương (Thu ngân VTA)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 12:53:02', '2019-04-10 12:53:02'),
(41, 1, 1, 'Bạn Thanh', '', '', NULL, '', 'shopping@client.com', '', '', 0, 0, '2019-04-10 14:59:49', '2019-04-10 15:02:10'),
(42, 1, 1, 'Phước (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 19:49:02', '2019-04-10 19:49:02'),
(43, 1, 1, 'Ngà (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-10 19:49:26', '2019-04-10 19:49:26'),
(44, 1, 1, 'Chị Hai (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-11 00:37:11', '2019-04-11 00:37:11'),
(45, 1, 1, 'Ku Phúc', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-11 01:13:30', '2019-04-11 01:13:30'),
(46, 1, 1, 'Bé Phương (PL)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-11 01:46:52', '2019-04-11 01:46:52'),
(47, 1, 1, 'Bé Giỏi', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-11 01:48:22', '2019-04-11 01:48:22'),
(48, 1, 1, 'Bé Huyền', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-11 01:52:13', '2019-04-11 01:52:13'),
(49, 1, 1, 'Mợ Ngôn (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-11 02:16:14', '2019-04-11 02:16:14'),
(50, 1, 1, 'Như (nhỏ)', '', '', '', '', 'shopping@client.com', '', '', 1, 0, '2019-04-11 02:29:13', '2019-05-12 01:01:44'),
(51, 1, 1, 'Bé Kiều', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-11 02:30:39', '2019-04-11 02:30:39'),
(52, 1, 1, 'Trinh (KHS)', '', '', NULL, '', 'shopping@client.com', '', '', 1, 0, '2019-04-11 10:45:27', '2019-04-14 02:44:53'),
(53, 1, 1, 'Khang', 'Khang', 'Le Duong', NULL, NULL, 'leduongkhang@gmail.com', NULL, NULL, 3, 0, '2019-04-11 15:57:07', '2019-04-11 15:57:07'),
(54, 1, 1, 'Vân (Ma Lâm)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-14 00:15:18', '2019-04-14 00:15:18'),
(55, 1, 1, 'Bé Vy (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-14 00:21:24', '2019-04-14 00:21:24'),
(56, 1, 1, 'Tiểu Duy', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-14 00:49:53', '2019-04-14 00:49:53'),
(57, 1, 1, 'Bé Sương', '', '', '', '', 'shopping@client.com', '', '', 0, 0, '2019-04-14 00:52:09', '2019-05-12 01:05:39'),
(58, 1, 1, 'Lan Uyên', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-14 01:46:44', '2019-04-14 01:46:44'),
(59, 1, 1, 'Uyên (Đà Lạt)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-14 01:49:57', '2019-04-14 01:49:57'),
(60, 1, 3, 'A Dương', 'Dương', 'Nguyễn Văn', '', '2 Maddison CCT Darley Victoria Australia', 'shopping@client.com', '+61402370680', 'Nguyễn Văn Dương\r\n+61402370680\r\n2 Maddison CCT Darley Victoria Australia', 0, 0, '2019-04-14 02:04:25', '2019-04-28 11:19:26'),
(61, 1, 1, '*', '', '', NULL, '', '', '', 'khách vãn lai', 0, 0, '2019-04-16 10:17:37', '2019-04-16 10:17:37'),
(62, 1, 2, 'Huong Kantoh HCM', 'Hương', 'Vu Lan', '', '千葉県千葉市緑区越智町1701-84', '', '090-6589-0436', 'Tiếng Nhật\r\nMã Bưu điện: 267－0055\r\nSố phone: 090-6589-0436\r\nĐịa chỉ: 千葉県千葉市緑区越智町1701-84\r\nHọ tên: Huong Kantoh HCM\r\n\r\nTiếng Anh\r\nMã Bưu điện: 267-0055\r\nSố phone: 090-6589-0436\r\nĐịa chỉ: Chiba shi Midori ku Ochi cho 1701-84 \r\nHọ tên: Huong Kantoh HCM\r\n\r\n***\r\nđi hàng t2 & t6\r\nbay t2 -> t5 trả hàng\r\nbay t6 -> t5 trả hàng\r\n220k/kg\r\nphát miễn phí cho KH với đơn hàng từ 5kg trở lên trong bán kính 10km\r\n\r\n***\r\nNếu đồng hồ trị giá dưới 2tr/c : k tính phụ thu\r\nTrên 2tr dưới 3tr: phụ thu 50k/c\r\nTrên 3tr : phụ thu 70k/c\r\nTrên 5tr : phụ thu 5%', 2, 0, '2019-04-18 18:25:13', '2019-05-13 11:16:40'),
(63, 1, 1, 'Rose Huong', 'Hương', 'Nguyễn Diệu', '', '173-0025 東京都板橋区熊野町32－5　鯉渕ビル1階', 'nhinlen24@gmail.com', '+84 906 225 173', 'Thông tin tài khoản\r\n0021002092695\r\nVCB hà nội\r\nNguyễn Diệu Hương\r\n\r\nThông tin chuyển hàng như sau:\r\n\r\n1. Thông tin gửi hàng lên Tokyo:\r\n\r\nNgười gửi: tên khách hàng (RH)\r\nNgười nhận : YOUCARGO VIETNAM\r\nĐịa chỉ: 173-0025\r\nFLOOR 1ST KOIBUCHI BLDG., 32-5 KUMANOCHO, ITABASHIKU, TOKYO\r\nTEL : 080 9663 7122\r\n\r\n2. Lịch trình hàng hóa:\r\n\r\nNhận hàng tại vp tokyo vào thứ 2=>giao thứ 6 tại trung tâm Hà Nội\r\nNhận hàng  vào thứ 3=>giao thứ 7 \r\nNhận hàng vào thứ 4,5 và 6 => giao thứ 5 kế tiếp.\r\n\r\nHàng về HCM,thời gian cộng thêm 1 ngày( k tính chủ nhật và ngày lễ)\r\n\r\n3. Giá cả vận chuyển:\r\nĐối với hàng tạp thông thường: 195.000vnd/kg về HAN.\r\n\r\nCước phí từ HN vào HCM : 25.000vnd/kg\r\n\r\nĐối với hàng điện tử điện lạnh,hàng giá trị cao,hàng cũ,hàng đặc biệt khác : vui lòng kiểm tra thông tin với bên vận chuyển.\r\n\r\n4. Hàng hóa yêu cầu đầy đủ hóa đơn mua bán tại nhật(hóa đơn giấy hoặc hóa đơn điện tử,k bắt buộc đủ 100%)\r\n\r\n5. Khi gửi hàng lên,yêu cầu khách hàng gửi phiếu tabukin chuyển hàng và danh sách kê khai hàng hóa cho bên vận chuyển,gửi qua viber,zalo hoặc email đều được chấp nhận.\r\n\r\nHóa đơn giấy để trong thùng hàng,k cần phải gửi trước cho bên vận chuyển.\r\n\r\nPhiếu tabukin gửi hàng và list hàng phải được gửi trước hoặc trong ngày hàng lên đến văn phòng tokyo của bên vận chuyển.\r\n\r\n6. Không nhận vận chuyển hàng dễ cháy nổ(nước hoa,những sản phẩm dạng xịt có áp suất...) hàng cấm,hàng có thành phần chiết xuất từ động thực vật quý hiếm( GH Creation,nhân sâm...),hàng cấm theo quy định,vũ khí,ma túy....\r\n\r\n7. Hàng phải được đóng gói và bảo quản chắc chắn trong thùng hàng.\r\nKhông bọc hàng trong các túi nhỏ,bọc nhỏ mà xếp hàng ngay ngắn,cẩn thận và chắc chắn.\r\n\r\nNếu là hàng dễ vỡ,cần phải bọc xốp,bọc túi sao cho tránh va đập.\r\n\r\nRiêng đối với hàng mua miễn thuế có niêm phong tại nhật,bên vận chuyển chỉ nhận chuyển hàng về khi gói hàng phải được bóc dỡ niêm phong,vì theo nguyên tắc của nhật,hàng miễn thuế có niêm phong k được xuất khẩu.Vì vậy,khách hàng nên lưu ý điểm này khi mua hàng miễn thuế.\r\n\r\nĐối với hàng quần áo mùa đông,có thể hút/ép chân không hoặc bọc theo từng đơn hàng.Nhưng cần ghi danh sách chi tiết các món hàng bằng tiếng anh hoặc nhật,và được dán hoặc kẹp bên ngoài bọc hàng/hút chân không đó,mục đích thuận lợi để kiểm hàng cho bên vận chuyển.\r\n\r\nChi tiết cụ thể để đóng gói cho hàng nhạy cảm,cần hỏi trước thông tin với bên vận chuyển.\r\n\r\n8. Đối với những mặt hàng nhạy cảm hoặc đồ cũ,hàng giá trị cao,cần hỏi bên vận chuyển trước khi gửi.\r\n\r\n9.Hàng hóa được vận chuyển đảm bảo và an toàn. Nếu xảy ra mất mát,thất lạc do nguyên nhân khách quan liên quan đến vận chuyển,bên vận chuyển sẽ đền bù 100% giá trị tiền hàng với đầy đủ hóa đơn đã mua tại Nhật.\r\n\r\nXin chân thành cảm ơn sự hợp tác của Quý khách!\r\n\r\nĐể biết thêm chi tiết về dịch vụ,xin vui long liên hệ theo thông tin:\r\nMs : Rose Huong/YOUCARGO VIET NAM\r\nViber/zalo: +84 906 225 173\r\nEmail: nhinlen24@gmail.com', 2, 0, '2019-04-19 17:37:03', '2019-05-09 00:41:28'),
(64, 1, 1, 'Bé Thoa', '', '', '', '', 'shopping@client.com', '', '', 1, 0, '2019-04-20 01:10:13', '2019-05-12 01:41:36'),
(65, 1, 1, 'Bé Phương (Sỉ)', '', '', NULL, '', '', '', '', 1, 0, '2019-04-20 01:19:21', '2019-04-20 01:19:21'),
(66, 1, 1, 'Bạn Huệ (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-20 01:26:07', '2019-04-20 01:26:07'),
(67, 1, 2, 'KLM KHIEM', 'KLM', 'KHIEM', '173-0025', '東京都板橋区熊野町32－5鯉渕ビル1階', '', '080-9663-7122', 'tên cty ; KLM KHIEM  \r\nđịa chỉ  : 東京都板橋区熊野町32－5鯉渕ビル1階\r\nFLOOR 1ST KOIBUCHI BLDG. , 32-5 KUMANOCHO, . ITABASHIKU, . TOKYO \r\nTEL:080-9663-7122\r\nHòm thư: 173-0025\r\nLưu ý: Trên phiếu nội địa ghi người nhận: KHIEM LE\r\nnhớ chụp phiếu gửi hàng lại cho bên mình nhé! \r\nlịch bay thứ 6 hàng tuần', 2, 0, '2019-04-23 10:26:35', '2019-04-23 10:34:40'),
(68, 1, 2, 'Luyen vu', 'Luyen', 'Vu', '170-0002', '東京都豊島区巣鴨２丁目５−９藤田マンション 701', '', '070 1181 3456', 'Công ty tại nhật\r\nNhận hàng tại Nhật cách ga sugamo 2 phút.\r\n(株)NOMIDO Luyên\r\n〒170-0002 東京都豊島区巣鴨２丁目５−９藤田マンション 701.\r\nHotline : 070 1181 3456.\r\n\r\nNMD: Luyen vu\r\n170-0002\r\nTokyo toshimaku sugamo 2-5-9 Fujita manson 701\r\nHot line:07011813456\r\nNhận hàng từ 11 h chiều 6 h tối\r\nCông ty mình nhận hàng tại Tokyo và trả hàng tại Vp hoàng mai hà nội, bạn ngoại tỉnh hàng về hà nội bên m sẽ gửi phát nhanh về tận nhà cho bạn qua bưu điện, người nhà bạn nhận hàng sẽ trả phí ship đó cho bưu điện nhé, phí đó cũng rẻ thôi a \r\nĐịa chỉ công ty mình nhé, bạn o gần có thể mang hang đến công ty m, còn o xa bạn có thể gửi hang qua combini hoặc bưu điện đến địa chỉ công ty m.\r\n-	Khi đóng hang xong bạn ghi rõ họ tên, sdt người nhận tại VN lên thùng hang rồi chụp ảnh lại cho m.\r\n-	Khi gửi hang qua combini hoặc bưu điện đến công ty m xong ban chụp lại bưu gửi hàng đến cho m nhé, bên mình nhận dc hàng của bạn sẽ kg và báo cước cho bạn.\r\n-	Có 2 hình thức thanh toán; 1 là ck tại Nhật, 2 là người nhà nhận hàng ktra hàng  rồi trả tại VN. \r\n-	1 tuần bên mình có 3 chuyến, tối thứ 3,5,7 . Bạn gửi hàng vào đúng chuyến 4-5 ngày sau hàng về hà nội, sau đó bạn o ngoại tỉnh công ty sẽ gửi phát nhanh từ hà nội về nhà bạn tầm 3-4 ngày nếu ở tỉnh xa\r\n\r\n*Tạm thời 10-30 kg giá 1 sen/1 kg. sau đó công ty sẽ theo dõi bạn gửi thường xuyên và ổn định công ty sẽ lấy bạn giá 950Y/1 kg', 2, 0, '2019-04-23 10:37:44', '2019-04-23 10:37:44'),
(69, 1, 1, 'Cô Trân', '', '', '', '', '', '', '', 0, 0, '2019-04-29 01:18:17', '2019-04-29 01:18:17'),
(70, 1, 1, 'Thảo My Lê', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-29 03:33:50', '2019-04-29 03:33:50'),
(71, 1, 1, 'Oanh', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-29 03:34:19', '2019-04-29 03:34:19'),
(72, 1, 2, 'Như Ý Shop', '金華成 株式会社', 'Như Ý Shop', '116-0014', '東京都荒川区東日暮里6-36-3コーポ小池102', 'shopping@client.com', '080-4478-1412', 'Kho Hàng Tổng\r\n金華成 株式会社 - Như Ý Shop\r\nMã bưu điện: 116-0014\r\n東京都荒川区東日暮里6-36-3コーポ小池102\r\nNgười nhận: Như Ý Shop\r\n080-4478-1412\r\nNhận 20時～21時\r\n\r\nCơ sở 1:\r\nSố 19 ngõ 12 Phan Văn Trường - Quận Cầu Giấy - Hà Nội\r\nSđt: 0168 998 6002 (Sơn)\r\n\r\nSài Gòn\r\n50 đường T 4B phường Tây Thạnh quận Tân Phú\r\nSđt: 01628366183 (Hằng)\r\n\r\nCơ sở 3:\r\nNgõ 22 - Nhà số 2 - Tả Thanh Oai - Thanh Trì - Hà Nội\r\nSđt: 0982902389 (Như Ý Shop)', 2, 0, '2019-04-29 03:35:50', '2019-05-13 14:27:55'),
(73, 1, 1, 'Bé Dương (Aris)', 'DUONG', 'PHAN THUY', '', '', '', '', '銀行名：みずほ銀行\r\n支店名：162\r\n口座番号：1637712\r\n名前（カナ）：PHAN THUY DUONG\r\n\r\nTên chi nhánh (店舗名) là \r\n渋谷中央支店', 9, 0, '2019-04-29 03:45:35', '2019-05-07 12:07:45'),
(74, 1, 1, 'Bé Tín (nhỏ)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-29 10:52:44', '2019-04-29 10:52:44'),
(75, 1, 1, 'Vân (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-05 18:58:23', '2019-05-05 18:58:23'),
(76, 1, 1, 'Nhung (VTA)', '', '', '', '', 'shopping@client.com', '', '', 1, 0, '2019-05-05 19:15:47', '2019-05-12 01:24:01'),
(77, 1, 1, 'Trúc (sỉ)', '', '', '', '', 'shopping@client.com', '', '', 1, 0, '2019-05-05 19:17:37', '2019-05-19 03:12:17'),
(78, 1, 1, 'Liên', '', '', '', '', 'shopping@client.com', '', '', 0, 0, '2019-05-05 19:20:59', '2019-05-19 03:13:54'),
(79, 1, 1, 'Nghĩa (Phan Thiết)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-12 00:53:00', '2019-05-12 00:53:00'),
(80, 1, 1, 'Anh (Lagi)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-12 00:55:36', '2019-05-12 00:55:36'),
(81, 1, 1, 'Anh Kiện', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-12 00:56:32', '2019-05-12 00:56:32'),
(82, 1, 1, 'Anh Duy', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-19 03:18:52', '2019-05-19 03:18:52'),
(83, 1, 1, 'Bé Hiền (ĐN)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-26 19:18:10', '2019-05-26 19:18:10'),
(84, 1, 1, 'Thanh (Sỉ)', '', '', '', '', '', '', '', 1, 0, '2019-05-26 19:21:04', '2019-05-26 19:21:04'),
(85, 1, 1, 'Thủy (Nail)', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-26 19:24:06', '2019-05-26 19:24:06'),
(86, 1, 1, 'Bé Thuận', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-26 19:28:22', '2019-05-26 19:28:22'),
(87, 1, 1, 'Uyên Thanh', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-26 19:33:11', '2019-05-26 19:33:11'),
(88, 1, 1, 'Lan Thanh', NULL, NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-05-26 19:41:20', '2019-05-26 19:41:20'),
(89, 1, 1, 'Ruby Lê', '', '', '', '', '', '', '', 0, 0, '2019-06-02 02:07:22', '2019-06-02 02:07:22'),
(90, 1, 1, 'Mi Mi', '', '', '', '', '', '', '', 0, 0, '2019-06-03 10:44:50', '2019-06-03 10:44:50');

-- --------------------------------------------------------

--
-- テーブルの構造 `commons`
--

CREATE TABLE `commons` (
  `id` int(11) UNSIGNED NOT NULL,
  `cid` int(4) UNSIGNED NOT NULL COMMENT '定義グループid',
  `seq` int(4) UNSIGNED NOT NULL DEFAULT '0' COMMENT '定義値ソート順',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '定義値表示名',
  `value` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '値',
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '備考',
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '有効化フラグ 0:有効,1:無効',
  `created` datetime NOT NULL COMMENT '登録日時',
  `updated` datetime NOT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `commons`
--

INSERT INTO `commons` (`id`, `cid`, `seq`, `name`, `value`, `remarks`, `deleted`, `created`, `updated`) VALUES
(1, 1, 1, 'par_level', '2', 'product par levels', 0, '2019-03-15 00:00:00', '2019-03-15 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `countries`
--

CREATE TABLE `countries` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`) VALUES
(1, 'Viet Nam', 'vn'),
(2, 'Nhat Ban', 'jp'),
(3, 'Australia', 'au');

-- --------------------------------------------------------

--
-- テーブルの構造 `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `type_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float UNSIGNED NOT NULL,
  `remarks` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exec_date` datetime NOT NULL,
  `disabled` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` float UNSIGNED NOT NULL DEFAULT '0' COMMENT 'invoice total price',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0:unpaid;1:paid',
  `deliver` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:shop;1:delivering;2:finished',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `client_id`, `remarks`, `total_price`, `status`, `deliver`, `disabled`, `created`, `updated`) VALUES
(1, 1, 12, '', 5000000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(2, 1, 13, '', 1300000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(3, 1, 14, '', 1950000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(4, 1, 15, '', 2348000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(5, 1, 16, '', 4415000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(6, 1, 17, '', 1550000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(7, 1, 19, '', 1400000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(8, 1, 18, '', 4960000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(9, 1, 22, '', 1400000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(10, 1, 2, '', 6482000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(11, 1, 20, '', 1000000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(12, 1, 21, '', 3635000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(13, 1, 23, '', 1750000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(14, 1, 24, '', 1800000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(15, 1, 25, '', 1450000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(16, 1, 26, '', 4650000, 1, 2, 0, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(17, 1, 27, '', 1800000, 1, 2, 0, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(18, 1, 28, '', 700000, 1, 2, 0, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(19, 1, 29, '', 2100000, 1, 2, 0, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(20, 1, 15, '', 700000, 1, 2, 0, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(21, 1, 31, '', 800000, 1, 2, 0, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(22, 1, 25, '', 2750000, 1, 2, 0, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(23, 1, 26, '', 3250000, 1, 2, 0, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(24, 1, 34, '', 450000, 1, 2, 0, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(25, 1, 23, '', 700000, 1, 2, 0, '2019-03-02 00:00:00', '2019-05-12 02:24:08'),
(26, 1, 35, '', 850000, 1, 2, 0, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(27, 1, 16, '', 300000, 1, 2, 0, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(28, 1, 37, '', 540000, 1, 2, 0, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(29, 1, 24, '', 2350000, 1, 2, 0, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(30, 1, 39, '', 600000, 1, 2, 0, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(31, 1, 40, '', 2050000, 1, 2, 0, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(32, 1, 26, 'Có kèm quà tặng, giá bằng 0', 0, 1, 2, 0, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(33, 1, 12, 'Có kèm quà tặng, giá bằng 0', 0, 1, 2, 0, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(34, 1, 25, '', 1500000, 1, 2, 0, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(35, 1, 15, '', 900000, 1, 2, 0, '2019-03-22 00:00:00', '2019-05-12 02:24:18'),
(36, 1, 42, '', 0, 1, 2, 0, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(37, 1, 43, '', 0, 1, 2, 0, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(38, 1, 24, '', 0, 1, 2, 0, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(39, 1, 41, '', 450000, 1, 2, 0, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(40, 1, 33, '', 370000, 1, 2, 0, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(41, 1, 25, '', 840000, 1, 2, 0, '2019-03-22 00:00:00', '2019-04-20 01:02:01'),
(42, 1, 20, '', 3350000, 1, 2, 0, '2019-03-22 00:00:00', '2019-04-20 01:02:03'),
(43, 1, 32, '', 1850000, 1, 2, 0, '2019-03-22 00:00:00', '2019-04-20 01:02:35'),
(44, 1, 30, '', 0, 1, 2, 0, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(45, 1, 38, '', 700000, 1, 2, 0, '2019-03-22 00:00:00', '2019-04-20 01:02:50'),
(46, 1, 17, '', 550000, 1, 2, 0, '2019-03-22 00:00:00', '2019-04-20 01:02:57'),
(47, 1, 44, '', 1650000, 1, 2, 0, '2019-03-22 00:00:00', '2019-04-20 01:03:00'),
(48, 1, 45, '', 0, 1, 2, 0, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(49, 1, 24, '', 0, 1, 2, 0, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(50, 1, 46, '', 650000, 1, 2, 0, '2019-03-29 00:00:00', '2019-04-20 01:03:51'),
(51, 1, 47, '', 300000, 1, 2, 0, '2019-03-29 00:00:00', '2019-04-20 01:03:59'),
(52, 1, 48, '', 420000, 1, 2, 0, '2019-03-29 00:00:00', '2019-04-29 10:54:22'),
(53, 1, 49, '', 800000, 1, 2, 0, '2019-03-29 00:00:00', '2019-04-20 01:04:12'),
(54, 1, 24, '', 1590000, 1, 2, 0, '2019-03-29 00:00:00', '2019-05-12 02:24:49'),
(55, 1, 10, '', 1070000, 1, 2, 0, '2019-03-29 00:00:00', '2019-05-12 02:25:43'),
(56, 1, 12, '', 920000, 1, 2, 0, '2019-03-29 00:00:00', '2019-04-20 01:04:38'),
(57, 1, 50, '', 640000, 1, 2, 0, '2019-03-29 00:00:00', '2019-05-12 02:26:08'),
(58, 1, 51, '', 140000, 1, 2, 0, '2019-03-29 00:00:00', '2019-04-20 01:04:56'),
(59, 1, 52, '', 870000, 0, 2, 0, '2019-03-29 00:00:00', '2019-05-12 02:26:33'),
(60, 1, 8, '', 950000, 1, 2, 0, '2019-04-11 15:57:07', '2019-04-20 01:05:14'),
(61, 1, 8, '', 7900000, 1, 1, 0, '2019-04-14 00:00:31', '2019-05-12 02:26:59'),
(62, 1, 9, '', 4150000, 1, 2, 0, '2019-04-14 00:02:41', '2019-05-12 02:27:23'),
(63, 1, 10, '', 7150000, 1, 2, 0, '2019-04-14 00:06:36', '2019-05-12 02:27:49'),
(64, 1, 11, '', 820000, 1, 2, 0, '2019-04-14 00:11:25', '2019-05-12 02:27:51'),
(65, 1, 18, '', 300000, 1, 2, 0, '2019-04-14 00:13:32', '2019-05-12 02:27:52'),
(66, 1, 54, '', 400000, 1, 2, 0, '2019-04-14 00:15:18', '2019-05-12 02:27:52'),
(67, 1, 14, '', 1530000, 1, 2, 0, '2019-04-14 00:19:29', '2019-05-12 02:27:53'),
(68, 1, 55, '', 150000, 1, 2, 0, '2019-04-14 00:21:24', '2019-05-12 02:27:54'),
(69, 1, 24, '', 1150000, 1, 2, 0, '2019-04-14 00:22:28', '2019-05-12 02:27:56'),
(70, 1, 56, '', 120000, 1, 2, 0, '2019-04-14 00:49:53', '2019-05-12 02:27:57'),
(71, 1, 15, '', 1000000, 1, 2, 0, '2019-04-14 00:50:30', '2019-05-12 02:27:58'),
(72, 1, 48, '', 550000, 1, 2, 0, '2019-04-14 00:52:09', '2019-05-12 02:28:00'),
(73, 1, 11, '', 620000, 1, 2, 0, '2019-04-14 01:42:35', '2019-05-12 02:28:01'),
(74, 1, 8, '', 1050000, 1, 2, 0, '2019-04-14 01:43:21', '2019-05-12 02:28:04'),
(75, 1, 58, '', 380000, 1, 2, 0, '2019-04-14 01:46:44', '2019-05-12 02:28:06'),
(76, 1, 24, '', 1520000, 1, 2, 0, '2019-04-14 01:48:29', '2019-05-12 02:28:51'),
(77, 1, 59, '', 1350000, 1, 2, 0, '2019-04-14 01:49:57', '2019-05-12 02:28:46'),
(78, 1, 52, '', 1695000, 1, 2, 0, '2019-04-14 01:59:19', '2019-05-12 02:30:27'),
(79, 1, 25, '', 704000, 1, 2, 0, '2019-04-14 02:04:26', '2019-05-12 02:29:59'),
(80, 1, 45, '', 785000, 1, 2, 0, '2019-04-14 02:06:28', '2019-05-12 02:29:59'),
(81, 1, 33, '', 8020000, 1, 2, 0, '2019-04-14 02:14:54', '2019-05-12 02:29:58'),
(82, 1, 61, '', 350000, 1, 2, 0, '2019-04-16 10:18:24', '2019-04-20 01:07:31'),
(83, 1, 61, '', 1000000, 1, 2, 0, '2019-04-16 10:21:42', '2019-04-20 01:08:00'),
(84, 1, 51, '', 175000, 1, 2, 0, '2019-04-16 17:43:14', '2019-05-12 02:30:24'),
(85, 1, 44, '', 1070000, 1, 2, 0, '2019-04-20 01:10:13', '2019-04-20 01:10:21'),
(86, 1, 45, '', 1500000, 1, 2, 0, '2019-04-20 01:14:11', '2019-05-12 02:30:22'),
(87, 1, 33, '', 1140000, 1, 2, 0, '2019-04-20 01:15:16', '2019-05-12 02:30:21'),
(88, 1, 59, '', 1340000, 1, 2, 0, '2019-04-20 01:16:51', '2019-05-12 02:30:19'),
(89, 1, 8, '', 1000000, 1, 2, 0, '2019-04-20 01:17:44', '2019-05-12 02:30:18'),
(90, 1, 25, '', 2300000, 1, 2, 0, '2019-04-20 01:18:12', '2019-05-12 02:30:15'),
(91, 1, 65, '', 2060000, 1, 2, 0, '2019-04-20 01:20:16', '2019-05-12 02:30:14'),
(92, 1, 66, '', 1180000, 1, 2, 0, '2019-04-20 01:26:07', '2019-05-12 02:30:12'),
(93, 1, 11, '', 650000, 1, 2, 0, '2019-04-20 01:26:42', '2019-05-12 02:30:11'),
(94, 1, 66, '', 310000, 1, 2, 0, '2019-04-21 00:30:38', '2019-05-12 02:30:09'),
(95, 1, 55, '', 200000, 1, 2, 0, '2019-04-21 00:41:29', '2019-05-12 02:30:08'),
(96, 1, 24, '', 1350000, 1, 2, 0, '2019-04-21 00:43:23', '2019-05-12 02:30:05'),
(97, 1, 29, '', 300000, 1, 2, 0, '2019-04-21 00:45:16', '2019-05-12 02:29:42'),
(98, 1, 61, '', 940000, 1, 2, 0, '2019-04-26 10:55:16', '2019-04-26 10:55:16'),
(99, 1, 60, '', 1950000, 1, 1, 0, '2019-04-29 03:17:12', '2019-05-12 00:50:55'),
(100, 1, 33, '', 2740000, 1, 2, 0, '2019-04-29 03:19:23', '2019-05-12 02:29:52'),
(101, 1, 11, '', 770000, 0, 0, 0, '2019-04-29 03:21:28', '2019-04-29 03:21:28'),
(102, 1, 54, '', 330000, 0, 0, 0, '2019-04-29 03:22:07', '2019-04-29 03:22:07'),
(103, 1, 27, '', 900000, 0, 0, 0, '2019-04-29 03:23:31', '2019-04-29 03:23:31'),
(104, 1, 25, '', 350000, 0, 0, 0, '2019-04-29 03:25:57', '2019-04-29 03:25:57'),
(105, 1, 24, '', 3150000, 0, 0, 0, '2019-04-29 03:27:20', '2019-04-29 03:30:25'),
(106, 1, 8, '', 860000, 0, 0, 0, '2019-04-29 03:31:51', '2019-04-29 03:31:51'),
(107, 1, 2, '', 5500000, 0, 0, 0, '2019-04-29 03:32:55', '2019-04-29 03:32:55'),
(108, 1, 70, '', 420000, 0, 0, 0, '2019-04-29 03:33:50', '2019-04-29 03:33:50'),
(109, 1, 71, '', 300000, 0, 0, 0, '2019-04-29 03:34:19', '2019-04-29 03:34:19'),
(110, 1, 66, '', 610000, 0, 0, 0, '2019-04-29 03:35:50', '2019-04-29 03:35:50'),
(111, 1, 3, '', 850000, 0, 0, 0, '2019-04-29 03:45:35', '2019-04-29 03:45:35'),
(112, 1, 45, '', 260000, 0, 0, 0, '2019-04-29 03:49:18', '2019-05-01 23:20:10'),
(113, 1, 74, '', 650000, 0, 0, 0, '2019-04-29 10:52:44', '2019-04-29 10:52:44'),
(114, 1, 69, '', 1500000, 0, 0, 0, '2019-04-29 10:53:50', '2019-04-29 10:53:50'),
(115, 1, 75, '* quà tặng kèm giá 0₫', 1462000, 0, 0, 0, '2019-05-05 18:58:23', '2019-05-05 18:58:23'),
(116, 1, 27, '', 360000, 0, 0, 0, '2019-05-05 18:59:57', '2019-05-05 18:59:57'),
(117, 1, 10, '', 6590000, 0, 0, 0, '2019-05-05 19:03:11', '2019-05-05 19:13:46'),
(118, 1, 33, '', 1950000, 0, 0, 0, '2019-05-05 19:04:22', '2019-05-05 19:04:22'),
(119, 1, 5, '', 930000, 0, 0, 0, '2019-05-05 19:05:06', '2019-05-05 19:05:06'),
(120, 1, 8, '', 1170000, 0, 0, 0, '2019-05-05 19:11:21', '2019-05-05 19:11:21'),
(121, 1, 76, '', 265000, 0, 0, 0, '2019-05-05 19:15:47', '2019-05-05 19:15:47'),
(122, 1, 3, '', 300000, 0, 0, 0, '2019-05-05 19:17:37', '2019-05-05 19:17:37'),
(123, 1, 21, '', 310000, 0, 0, 0, '2019-05-05 19:19:02', '2019-05-05 19:27:18'),
(124, 1, 15, '', 300000, 0, 0, 0, '2019-05-05 19:20:04', '2019-05-05 19:20:04'),
(125, 1, 11, 'tặng', 0, 0, 0, 0, '2019-05-05 19:20:59', '2019-05-05 19:20:59'),
(126, 1, 45, '', 6000000, 0, 0, 0, '2019-05-12 00:52:12', '2019-05-12 00:52:12'),
(127, 1, 79, '', 300000, 0, 0, 0, '2019-05-12 00:53:00', '2019-05-12 00:53:00'),
(128, 1, 80, '', 1920000, 0, 0, 0, '2019-05-12 00:55:36', '2019-05-12 00:55:36'),
(129, 1, 81, '', 5500000, 0, 0, 0, '2019-05-12 00:56:32', '2019-05-12 00:56:32'),
(130, 1, 50, '', 350000, 0, 0, 0, '2019-05-12 01:02:09', '2019-05-12 01:02:09'),
(131, 1, 51, '- Adidas sọc xanh', 1650000, 0, 0, 0, '2019-05-12 01:05:01', '2019-05-12 01:05:01'),
(132, 1, 57, '- giày sọc đen\r\n- nón trắng', 2590000, 0, 0, 0, '2019-05-12 01:08:23', '2019-05-12 01:08:23'),
(133, 1, 10, '', 1840000, 0, 0, 0, '2019-05-12 01:15:26', '2019-05-12 01:15:26'),
(134, 1, 16, '', 1650000, 0, 0, 0, '2019-05-12 01:17:46', '2019-05-12 01:17:46'),
(135, 1, 15, '', 200000, 0, 0, 0, '2019-05-12 01:22:00', '2019-05-12 01:22:00'),
(136, 1, 70, '', 670000, 0, 0, 0, '2019-05-12 01:22:50', '2019-05-12 01:22:50'),
(137, 1, 76, '', 1430000, 0, 0, 0, '2019-05-12 01:25:08', '2019-05-12 01:25:08'),
(138, 1, 11, '', 470000, 0, 0, 0, '2019-05-12 01:26:10', '2019-05-12 01:26:10'),
(139, 1, 33, '', 4200000, 0, 0, 0, '2019-05-12 01:32:54', '2019-05-12 01:32:54'),
(140, 1, 65, '', 1230000, 0, 0, 0, '2019-05-12 01:41:04', '2019-05-12 01:41:04'),
(141, 1, 64, '', 2310000, 0, 0, 0, '2019-05-12 01:45:33', '2019-05-12 01:45:33'),
(142, 1, 8, '', 1470000, 0, 0, 0, '2019-05-19 03:10:26', '2019-05-19 03:10:26'),
(143, 1, 64, '', 300000, 0, 0, 0, '2019-05-19 03:11:24', '2019-05-19 03:11:24'),
(144, 1, 77, '', 680000, 0, 0, 0, '2019-05-19 03:12:59', '2019-05-19 03:12:59'),
(145, 1, 52, '', 680000, 0, 0, 0, '2019-05-19 03:13:22', '2019-05-19 03:13:22'),
(146, 1, 78, '', 700000, 0, 0, 0, '2019-05-19 03:15:43', '2019-05-19 03:15:43'),
(147, 1, 65, 'tặng kèm 8x4', 4050000, 0, 0, 0, '2019-05-19 03:17:11', '2019-05-19 03:17:11'),
(148, 1, 82, '', 250000, 0, 0, 0, '2019-05-19 03:18:52', '2019-05-19 03:18:52'),
(149, 1, 15, '', 1272000, 0, 0, 0, '2019-05-19 03:24:49', '2019-05-19 03:24:49'),
(150, 1, 21, '', 200000, 0, 0, 0, '2019-05-19 03:27:40', '2019-05-19 03:27:40'),
(151, 1, 24, '', 900000, 0, 0, 0, '2019-05-19 03:28:11', '2019-05-19 03:28:11'),
(152, 1, 10, '', 2550000, 0, 0, 0, '2019-05-19 13:45:14', '2019-05-19 13:45:14'),
(153, 1, 83, '', 7660000, 0, 0, 0, '2019-05-26 19:18:10', '2019-05-26 19:20:10'),
(154, 1, 18, '', 1340000, 0, 0, 0, '2019-05-26 19:19:47', '2019-05-26 19:19:47'),
(155, 1, 84, '', 220000, 0, 0, 0, '2019-05-26 19:22:03', '2019-05-26 19:22:03'),
(156, 1, 33, '', 2540000, 0, 0, 0, '2019-05-26 19:22:57', '2019-05-26 19:22:57'),
(157, 1, 85, '', 1340000, 0, 0, 0, '2019-05-26 19:24:06', '2019-05-26 19:24:06'),
(158, 1, 11, '', 530000, 0, 0, 0, '2019-05-26 19:25:43', '2019-05-26 19:25:43'),
(159, 1, 86, '', 350000, 0, 0, 0, '2019-05-26 19:28:22', '2019-05-26 19:28:22'),
(160, 1, 52, '', 630000, 0, 0, 0, '2019-05-26 19:29:01', '2019-05-26 19:29:01'),
(161, 1, 25, '', 170000, 0, 0, 0, '2019-05-26 19:30:09', '2019-05-26 19:30:09'),
(162, 1, 87, '', 1200000, 0, 0, 0, '2019-05-26 19:33:11', '2019-05-26 19:33:11'),
(163, 1, 15, '', 930000, 0, 0, 0, '2019-05-26 19:37:08', '2019-05-26 19:37:08'),
(164, 1, 81, '', 1100000, 0, 0, 0, '2019-05-26 19:37:34', '2019-05-26 19:37:34'),
(165, 1, 11, '', 0, 0, 0, 0, '2019-05-26 19:38:28', '2019-05-26 19:38:28'),
(166, 1, 10, '', 0, 0, 0, 0, '2019-05-26 19:38:42', '2019-05-26 19:39:20'),
(167, 1, 45, '', 0, 0, 0, 0, '2019-05-26 19:40:14', '2019-05-26 19:40:14'),
(168, 1, 27, '', 0, 0, 0, 0, '2019-05-26 19:40:48', '2019-05-26 19:40:48'),
(169, 1, 88, '', 0, 0, 0, 0, '2019-05-26 19:41:20', '2019-05-26 19:41:20'),
(170, 1, 45, '', 8500000, 0, 0, 0, '2019-06-02 02:01:46', '2019-06-02 02:01:46'),
(171, 1, 16, '', 1450000, 0, 0, 0, '2019-06-02 02:02:44', '2019-06-02 02:02:44'),
(172, 1, 81, '', 5500000, 1, 0, 0, '2019-06-02 02:03:59', '2019-06-02 02:03:59'),
(173, 1, 11, '', 340000, 0, 0, 0, '2019-06-02 02:06:11', '2019-06-02 02:06:11'),
(174, 1, 89, '', 665000, 0, 0, 0, '2019-06-02 02:15:00', '2019-06-02 02:15:00'),
(175, 1, 8, '', 150000, 0, 0, 0, '2019-06-02 02:15:56', '2019-06-02 02:15:56'),
(176, 1, 10, '', 2100000, 0, 0, 0, '2019-06-02 02:21:38', '2019-06-02 02:21:38'),
(177, 1, 90, '', 0, 0, 0, 0, '2019-06-02 02:22:36', '2019-06-02 02:22:36'),
(178, 1, 48, '', 900000, 0, 0, 0, '2019-06-02 02:25:42', '2019-06-02 02:25:42');

-- --------------------------------------------------------

--
-- テーブルの構造 `invoices_details`
--

CREATE TABLE `invoices_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `warehouse_id` tinyint(3) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL DEFAULT '0',
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `invoices_details`
--

INSERT INTO `invoices_details` (`id`, `client_id`, `invoice_id`, `product_id`, `warehouse_id`, `price`, `quantity`, `remarks`, `created`, `updated`) VALUES
(1, 12, 1, 1, 1, 650000, 4, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(2, 12, 1, 3, 1, 650000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(3, 12, 1, 19, 1, 650000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(4, 12, 1, 86, 1, 1100000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(5, 13, 2, 1, 1, 650000, 2, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(6, 14, 3, 13, 1, 1550000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(7, 14, 3, 4, 2, 200000, 2, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(8, 15, 4, 9, 1, 763000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(9, 15, 4, 11, 2, 1440000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(10, 15, 4, 4, 2, 145000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(11, 16, 5, 87, 1, 90000, 6, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(12, 16, 5, 88, 1, 120000, 4, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(13, 16, 5, 89, 1, 95000, 4, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(14, 16, 5, 90, 1, 95000, 3, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(15, 16, 5, 91, 1, 55000, 10, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(16, 16, 5, 92, 1, 55000, 6, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(17, 16, 5, 93, 1, 450000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(18, 16, 5, 5, 1, 650000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(19, 16, 5, 94, 1, 450000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(20, 16, 5, 35, 1, 300000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(21, 17, 6, 94, 1, 450000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(22, 17, 6, 95, 1, 450000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(23, 17, 6, 2, 1, 650000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(24, 19, 7, 30, 1, 140000, 10, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(25, 18, 8, 15, 1, 160000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(26, 18, 8, 16, 1, 150000, 2, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(27, 18, 8, 11, 1, 1500000, 3, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(28, 22, 9, 1, 1, 650000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(29, 2, 10, 9, 1, 763000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(30, 2, 10, 11, 1, 1440000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(31, 2, 10, 8, 1, 848000, 2, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(32, 2, 10, 10, 1, 763000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(33, 2, 10, 96, 1, 500000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(34, 2, 10, 32, 1, 220000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(35, 2, 10, 97, 1, 1100000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(36, 20, 11, 98, 2, 1000000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(37, 21, 12, 15, 1, 90000, 11, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(38, 21, 12, 16, 1, 95000, 22, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(39, 21, 12, 31, 1, 555000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(40, 22, 9, 14, 1, 750000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(41, 23, 13, 1, 1, 650000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(42, 23, 13, 13, 1, 1100000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(43, 23, 13, 27, 1, 0, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(44, 24, 14, 8, 2, 1000000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(45, 24, 14, 14, 2, 600000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(46, 24, 14, 4, 2, 200000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(47, 25, 15, 13, 2, 1450000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(48, 26, 16, 99, 1, 850000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(49, 26, 16, 45, 1, 400000, 1, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(50, 26, 16, 26, 1, 1100000, 2, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(51, 26, 16, 69, 1, 600000, 2, NULL, '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(52, 27, 17, 17, 1, 1000000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(53, 27, 17, 18, 1, 400000, 2, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(54, 28, 18, 14, 1, 700000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(55, 29, 19, 19, 1, 650000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(56, 29, 19, 17, 1, 1050000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(57, 29, 19, 100, 1, 200000, 2, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(58, 15, 20, 14, 2, 700000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(59, 31, 21, 62, 1, 800000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(60, 25, 22, 2, 2, 550000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(61, 25, 22, 20, 2, 200000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(62, 25, 22, 14, 2, 600000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(63, 25, 22, 45, 1, 450000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(64, 25, 22, 17, 1, 950000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(65, 26, 23, 45, 1, 450000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(66, 26, 23, 26, 1, 1100000, 2, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(67, 26, 23, 69, 1, 600000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(68, 34, 24, 101, 1, 450000, 1, NULL, '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(69, 23, 25, 64, 1, 700000, 1, NULL, '2019-03-02 00:00:00', '2019-04-20 00:33:50'),
(70, 35, 26, 37, 1, 300000, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(71, 35, 26, 33, 1, 550000, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(72, 16, 27, 36, 2, 300000, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(73, 37, 28, 102, 1, 270000, 2, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(74, 24, 29, 34, 2, 600000, 2, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(75, 24, 29, 39, 1, 1150000, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(76, 39, 30, 34, 1, 600000, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(77, 40, 31, 26, 2, 1300000, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(78, 40, 31, 14, 1, 750000, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(79, 26, 32, 27, 1, 0, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(80, 12, 33, 27, 1, 0, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(81, 25, 34, 13, 1, 1500000, 1, NULL, '2019-03-19 00:00:00', '2019-03-19 00:00:00'),
(82, 15, 35, 103, 1, 900000, 1, NULL, '2019-03-22 00:00:00', '2019-04-20 01:00:11'),
(83, 42, 36, 104, 1, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(84, 43, 37, 104, 1, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(85, 24, 38, 105, 2, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(86, 41, 39, 106, 1, 450000, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(87, 33, 40, 107, 1, 185000, 2, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(88, 25, 41, 108, 1, 80000, 3, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(89, 25, 41, 20, 2, 200000, 3, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(90, 20, 42, 42, 1, 1850000, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(91, 20, 42, 103, 1, 1500000, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(92, 32, 43, 42, 1, 1850000, 1, NULL, '2019-03-22 00:00:00', '2019-04-20 01:02:35'),
(93, 30, 44, 42, 1, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(94, 38, 45, 63, 1, 700000, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(95, 17, 46, 38, 1, 550000, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(96, 44, 47, 38, 1, 550000, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(97, 44, 47, 40, 1, 550000, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(98, 44, 47, 34, 1, 550000, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(99, 43, 37, 34, 1, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(100, 45, 48, 109, 1, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(101, 45, 48, 110, 1, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(102, 45, 48, 32, 1, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(103, 45, 48, 70, 1, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(104, 24, 49, 32, 1, 0, 1, NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(105, 46, 50, 43, 1, 650000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(106, 47, 51, 48, 1, 300000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(107, 48, 52, 66, 1, 140000, 3, NULL, '2019-03-29 00:00:00', '2019-04-11 16:11:46'),
(108, 49, 53, 113, 1, 800000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(109, 24, 54, 48, 1, 250000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(110, 24, 54, 38, 1, 520000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(111, 24, 54, 34, 1, 550000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(112, 24, 54, 44, 1, 270000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(113, 10, 55, 65, 1, 120000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(114, 10, 55, 25, 1, 350000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(115, 10, 55, 47, 1, 600000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(116, 12, 56, 38, 1, 570000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(117, 12, 56, 51, 1, 350000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(118, 50, 57, 56, 1, 320000, 2, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(119, 51, 58, 65, 1, 140000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(120, 52, 59, 71, 1, 220000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(121, 52, 59, 53, 1, 650000, 1, NULL, '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(122, 8, 60, 34, 1, 600000, 1, NULL, '2019-04-11 15:57:07', '2019-04-11 15:57:07'),
(123, 8, 60, 25, 1, 350000, 1, NULL, '2019-04-11 15:57:07', '2019-04-11 15:57:07'),
(124, 8, 61, 82, 1, 3750000, 1, NULL, '2019-04-14 00:00:31', '2019-04-14 00:00:31'),
(125, 8, 61, 77, 1, 4150000, 1, NULL, '2019-04-14 00:00:31', '2019-04-14 00:00:31'),
(126, 9, 62, 77, 1, 4150000, 1, NULL, '2019-04-14 00:02:41', '2019-04-14 00:02:41'),
(127, 10, 63, 76, 1, 2750000, 1, NULL, '2019-04-14 00:06:36', '2019-04-14 00:06:36'),
(128, 10, 63, 72, 1, 2900000, 1, NULL, '2019-04-14 00:06:36', '2019-04-14 00:06:36'),
(129, 10, 63, 80, 1, 1500000, 1, NULL, '2019-04-14 00:06:36', '2019-04-14 00:06:36'),
(130, 11, 64, 18, 1, 350000, 1, NULL, '2019-04-14 00:11:25', '2019-04-17 13:09:43'),
(131, 11, 64, 144, 1, 200000, 1, NULL, '2019-04-14 00:11:25', '2019-04-17 13:09:43'),
(132, 18, 65, 145, 1, 300000, 1, NULL, '2019-04-14 00:13:32', '2019-04-14 00:13:32'),
(133, 54, 66, 146, 1, 400000, 1, NULL, '2019-04-14 00:15:18', '2019-04-14 00:15:18'),
(134, 14, 67, 145, 1, 300000, 3, NULL, '2019-04-14 00:19:29', '2019-04-14 00:19:29'),
(135, 14, 67, 147, 1, 630000, 1, NULL, '2019-04-14 00:19:29', '2019-04-14 00:19:29'),
(136, 55, 68, 148, 1, 150000, 1, NULL, '2019-04-14 00:21:24', '2019-04-14 00:21:24'),
(137, 24, 69, 39, 1, 1150000, 1, NULL, '2019-04-14 00:22:28', '2019-04-14 00:22:28'),
(138, 56, 70, 135, 1, 40000, 3, NULL, '2019-04-14 00:49:53', '2019-04-14 00:49:53'),
(139, 15, 71, 39, 1, 1000000, 1, NULL, '2019-04-14 00:50:30', '2019-04-14 00:50:30'),
(140, 48, 72, 149, 1, 550000, 1, NULL, '2019-04-14 00:52:09', '2019-04-14 00:52:09'),
(141, 11, 73, 150, 1, 350000, 1, NULL, '2019-04-14 01:42:35', '2019-04-24 16:37:01'),
(142, 8, 74, 152, 1, 280000, 1, NULL, '2019-04-14 01:43:21', '2019-04-14 22:25:59'),
(143, 8, 74, 151, 1, 120000, 1, NULL, '2019-04-14 01:43:21', '2019-04-14 22:25:59'),
(144, 58, 75, 121, 1, 190000, 2, NULL, '2019-04-14 01:46:44', '2019-04-14 01:46:44'),
(145, 24, 76, 44, 1, 270000, 1, NULL, '2019-04-14 01:48:29', '2019-04-29 03:15:16'),
(146, 24, 76, 152, 1, 230000, 1, NULL, '2019-04-14 01:48:29', '2019-04-29 03:15:16'),
(147, 59, 77, 120, 1, 950000, 1, NULL, '2019-04-14 01:49:57', '2019-04-29 01:40:24'),
(148, 59, 77, 119, 1, 400000, 1, NULL, '2019-04-14 01:49:57', '2019-04-29 01:40:24'),
(149, 52, 78, 153, 1, 30000, 5, NULL, '2019-04-14 01:59:19', '2019-04-14 11:14:01'),
(150, 52, 78, 117, 1, 370000, 1, NULL, '2019-04-14 01:59:19', '2019-04-14 11:14:02'),
(151, 25, 79, 141, 1, 290000, 1, NULL, '2019-04-14 02:04:26', '2019-04-14 02:04:26'),
(152, 25, 79, 140, 1, 114000, 1, NULL, '2019-04-14 02:04:26', '2019-04-14 02:04:26'),
(153, 25, 79, 154, 1, 300000, 1, NULL, '2019-04-14 02:04:26', '2019-04-14 02:04:26'),
(154, 52, 78, 47, 1, 730000, 1, NULL, '2019-04-14 02:05:26', '2019-04-14 11:14:02'),
(155, 45, 80, 18, 1, 290000, 1, NULL, '2019-04-14 02:06:28', '2019-05-01 23:18:31'),
(156, 45, 80, 71, 1, 195000, 1, NULL, '2019-04-14 02:06:28', '2019-05-01 23:18:31'),
(157, 45, 80, 138, 1, 150000, 1, NULL, '2019-04-14 02:06:28', '2019-05-01 23:18:31'),
(158, 45, 80, 139, 1, 150000, 1, NULL, '2019-04-14 02:06:28', '2019-05-01 23:18:31'),
(159, 33, 81, 114, 1, 380000, 5, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:07'),
(160, 33, 81, 155, 1, 350000, 6, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:07'),
(161, 33, 81, 116, 1, 650000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:07'),
(162, 33, 81, 120, 1, 980000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:07'),
(163, 33, 81, 115, 1, 1050000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:07'),
(164, 33, 81, 119, 1, 420000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:08'),
(165, 33, 81, 134, 1, 40000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:08'),
(166, 33, 81, 142, 1, 40000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:08'),
(167, 33, 81, 143, 1, 40000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:08'),
(168, 33, 81, 136, 1, 40000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:08'),
(169, 33, 81, 130, 1, 40000, 2, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:08'),
(170, 33, 81, 132, 1, 40000, 2, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:08'),
(171, 33, 81, 128, 1, 40000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:08'),
(172, 33, 81, 131, 1, 40000, 1, NULL, '2019-04-14 02:14:54', '2019-05-01 22:50:08'),
(173, 52, 78, 118, 1, 445000, 1, NULL, '2019-04-14 11:14:02', '2019-04-14 11:14:02'),
(174, 33, 81, 118, 1, 520000, 1, NULL, '2019-04-14 11:17:53', '2019-05-01 22:50:08'),
(175, 8, 74, 53, 1, 650000, 1, NULL, '2019-04-14 22:25:59', '2019-04-14 22:25:59'),
(176, 61, 82, 51, 1, 350000, 1, NULL, '2019-04-16 10:18:24', '2019-04-16 15:58:10'),
(177, 61, 83, 6, 2, 650000, 1, NULL, '2019-04-16 10:21:42', '2019-04-16 10:21:56'),
(178, 61, 83, 51, 2, 350000, 1, NULL, '2019-04-16 10:21:42', '2019-04-16 10:21:56'),
(180, 51, 84, 134, 1, 40000, 1, NULL, '2019-04-16 17:43:14', '2019-04-16 17:43:14'),
(181, 51, 84, 135, 1, 40000, 1, NULL, '2019-04-16 17:43:14', '2019-04-16 17:43:14'),
(182, 51, 84, 156, 1, 50000, 1, NULL, '2019-04-16 17:43:14', '2019-04-16 17:43:14'),
(183, 51, 84, 128, 1, 45000, 1, NULL, '2019-04-16 17:43:14', '2019-04-16 17:43:14'),
(184, 11, 64, 84, 1, 270000, 1, NULL, '2019-04-17 13:09:43', '2019-04-17 13:09:43'),
(185, 44, 85, 38, 1, 520000, 1, NULL, '2019-04-20 01:10:13', '2019-04-20 01:10:13'),
(186, 44, 85, 33, 1, 550000, 1, NULL, '2019-04-20 01:10:13', '2019-04-20 01:10:13'),
(187, 45, 86, 109, 1, 260000, 3, NULL, '2019-04-20 01:14:11', '2019-05-01 23:19:16'),
(188, 45, 86, 110, 1, 240000, 3, NULL, '2019-04-20 01:14:11', '2019-05-01 23:19:16'),
(189, 33, 87, 109, 1, 320000, 1, NULL, '2019-04-20 01:15:16', '2019-05-01 22:51:17'),
(190, 33, 87, 110, 1, 300000, 1, NULL, '2019-04-20 01:15:16', '2019-05-01 22:51:17'),
(191, 33, 87, 159, 1, 520000, 1, NULL, '2019-04-20 01:15:16', '2019-05-01 22:51:17'),
(192, 59, 88, 109, 1, 270000, 2, NULL, '2019-04-20 01:16:51', '2019-04-20 01:16:51'),
(193, 59, 88, 110, 1, 290000, 2, NULL, '2019-04-20 01:16:51', '2019-04-20 01:16:51'),
(194, 59, 88, 50, 1, 220000, 1, NULL, '2019-04-20 01:16:51', '2019-04-20 01:16:51'),
(195, 8, 89, 119, 1, 420000, 1, NULL, '2019-04-20 01:17:44', '2019-04-21 00:39:17'),
(196, 8, 89, 158, 1, 160000, 1, NULL, '2019-04-20 01:17:44', '2019-04-21 00:39:17'),
(197, 25, 90, 17, 1, 950000, 1, NULL, '2019-04-20 01:18:12', '2019-04-21 00:39:51'),
(198, 65, 91, 46, 1, 600000, 1, NULL, '2019-04-20 01:20:16', '2019-04-20 01:20:16'),
(199, 65, 91, 47, 1, 730000, 2, NULL, '2019-04-20 01:20:16', '2019-04-20 01:20:16'),
(200, 66, 92, 161, 1, 295000, 4, NULL, '2019-04-20 01:26:07', '2019-04-21 00:29:33'),
(201, 11, 93, 162, 1, 390000, 1, NULL, '2019-04-20 01:26:42', '2019-04-21 00:40:40'),
(202, 66, 94, 161, 1, 310000, 1, NULL, '2019-04-21 00:30:38', '2019-04-21 00:30:38'),
(203, 8, 89, 163, 1, 420000, 1, NULL, '2019-04-21 00:39:17', '2019-04-21 00:39:17'),
(204, 25, 90, 13, 1, 1350000, 1, NULL, '2019-04-21 00:39:51', '2019-04-21 00:39:51'),
(205, 11, 93, 161, 1, 260000, 1, NULL, '2019-04-21 00:40:40', '2019-04-21 00:40:40'),
(206, 55, 95, 161, 1, 200000, 1, NULL, '2019-04-21 00:41:29', '2019-04-21 00:41:29'),
(207, 24, 96, 13, 1, 1350000, 1, NULL, '2019-04-21 00:43:23', '2019-04-21 00:43:23'),
(208, 29, 97, 160, 1, 60000, 5, NULL, '2019-04-21 00:45:16', '2019-04-21 00:45:16'),
(209, 11, 73, 18, 1, 270000, 1, NULL, '2019-04-24 16:37:01', '2019-04-24 16:37:01'),
(210, 61, 98, 117, 1, 470000, 2, NULL, '2019-04-26 10:55:16', '2019-04-26 10:55:16'),
(211, 24, 76, 114, 1, 340000, 3, NULL, '2019-04-29 03:15:16', '2019-04-29 03:15:16'),
(212, 60, 99, 167, 1, 650000, 3, NULL, '2019-04-29 03:17:12', '2019-04-29 03:17:12'),
(213, 33, 100, 167, 1, 620000, 2, NULL, '2019-04-29 03:19:23', '2019-05-01 22:52:30'),
(215, 33, 100, 42, 1, 1500000, 1, NULL, '2019-04-29 03:19:23', '2019-05-01 22:52:30'),
(216, 11, 101, 149, 1, 770000, 1, NULL, '2019-04-29 03:21:28', '2019-04-29 03:21:28'),
(217, 54, 102, 18, 1, 330000, 1, NULL, '2019-04-29 03:22:07', '2019-04-29 03:22:07'),
(218, 27, 103, 17, 1, 900000, 1, NULL, '2019-04-29 03:23:31', '2019-04-29 03:23:31'),
(219, 25, 104, 168, 1, 350000, 1, NULL, '2019-04-29 03:25:57', '2019-04-29 03:25:57'),
(220, 24, 105, 114, 1, 340000, 1, NULL, '2019-04-29 03:27:20', '2019-04-29 03:30:25'),
(221, 24, 105, 45, 2, 400000, 1, NULL, '2019-04-29 03:30:25', '2019-04-29 03:30:25'),
(222, 24, 105, 50, 2, 210000, 1, NULL, '2019-04-29 03:30:25', '2019-04-29 03:30:25'),
(223, 24, 105, 10, 2, 850000, 1, NULL, '2019-04-29 03:30:25', '2019-04-29 03:30:25'),
(224, 24, 105, 13, 2, 1350000, 1, NULL, '2019-04-29 03:30:25', '2019-04-29 03:30:25'),
(225, 8, 106, 138, 1, 160000, 1, NULL, '2019-04-29 03:31:51', '2019-04-29 03:31:51'),
(226, 8, 106, 139, 1, 160000, 1, NULL, '2019-04-29 03:31:51', '2019-04-29 03:31:51'),
(227, 8, 106, 110, 1, 280000, 1, NULL, '2019-04-29 03:31:51', '2019-04-29 03:31:51'),
(228, 8, 106, 109, 1, 260000, 1, NULL, '2019-04-29 03:31:51', '2019-04-29 03:31:51'),
(229, 2, 107, 170, 1, 5500000, 1, NULL, '2019-04-29 03:32:55', '2019-04-29 03:32:55'),
(230, 70, 108, 168, 1, 420000, 1, NULL, '2019-04-29 03:33:50', '2019-04-29 03:33:50'),
(231, 71, 109, 48, 1, 300000, 1, NULL, '2019-04-29 03:34:19', '2019-04-29 03:34:19'),
(232, 66, 110, 161, 1, 310000, 1, NULL, '2019-04-29 03:35:50', '2019-04-29 03:35:50'),
(233, 66, 110, 48, 1, 300000, 1, NULL, '2019-04-29 03:35:50', '2019-04-29 03:35:50'),
(234, 3, 111, 47, 1, 550000, 1, NULL, '2019-04-29 03:45:35', '2019-04-29 03:45:35'),
(235, 3, 111, 50, 1, 150000, 2, NULL, '2019-04-29 03:45:35', '2019-04-29 03:45:35'),
(237, 74, 113, 20, 2, 350000, 1, NULL, '2019-04-29 10:52:44', '2019-04-29 10:52:44'),
(238, 74, 113, 48, 1, 300000, 1, NULL, '2019-04-29 10:52:44', '2019-04-29 10:52:44'),
(239, 69, 114, 2, 1, 500000, 2, NULL, '2019-04-29 10:53:50', '2019-04-29 10:53:50'),
(240, 69, 114, 48, 1, 250000, 2, NULL, '2019-04-29 10:53:50', '2019-04-29 10:53:50'),
(241, 45, 112, 44, 1, 260000, 1, NULL, '2019-05-01 23:20:10', '2019-05-01 23:20:10'),
(242, 75, 115, 68, 1, 1462000, 1, NULL, '2019-05-05 18:58:23', '2019-05-05 18:58:23'),
(243, 75, 115, 181, 1, 0, 1, NULL, '2019-05-05 18:58:23', '2019-05-05 18:58:23'),
(244, 27, 116, 182, 1, 360000, 1, NULL, '2019-05-05 18:59:57', '2019-05-05 18:59:57'),
(245, 10, 117, 182, 1, 400000, 1, NULL, '2019-05-05 19:03:11', '2019-05-05 19:13:46'),
(246, 10, 117, 181, 1, 250000, 3, NULL, '2019-05-05 19:03:11', '2019-05-05 19:13:46'),
(247, 10, 117, 183, 1, 890000, 2, NULL, '2019-05-05 19:03:11', '2019-05-05 19:13:46'),
(248, 33, 118, 184, 1, 1950000, 1, NULL, '2019-05-05 19:04:22', '2019-05-05 19:04:22'),
(249, 5, 119, 169, 1, 930000, 1, NULL, '2019-05-05 19:05:06', '2019-05-05 19:05:06'),
(250, 8, 120, 185, 1, 200000, 1, NULL, '2019-05-05 19:11:21', '2019-05-05 19:11:21'),
(251, 8, 120, 186, 1, 230000, 1, NULL, '2019-05-05 19:11:21', '2019-05-05 19:11:21'),
(252, 8, 120, 187, 1, 390000, 1, NULL, '2019-05-05 19:11:21', '2019-05-05 19:11:21'),
(253, 8, 120, 188, 1, 50000, 1, NULL, '2019-05-05 19:11:21', '2019-05-05 19:11:21'),
(254, 8, 120, 189, 1, 20000, 15, NULL, '2019-05-05 19:11:21', '2019-05-05 19:11:21'),
(255, 10, 117, 104, 1, 1650000, 2, NULL, '2019-05-05 19:13:46', '2019-05-05 19:13:46'),
(256, 76, 121, 152, 1, 220000, 1, NULL, '2019-05-05 19:15:47', '2019-05-05 19:15:47'),
(257, 76, 121, 191, 1, 45000, 1, NULL, '2019-05-05 19:15:47', '2019-05-05 19:15:47'),
(258, 3, 122, 50, 1, 150000, 2, NULL, '2019-05-05 19:17:37', '2019-05-05 19:17:37'),
(259, 21, 123, 190, 1, 310000, 1, NULL, '2019-05-05 19:19:02', '2019-05-05 19:27:18'),
(260, 15, 124, 187, 1, 300000, 1, NULL, '2019-05-05 19:20:04', '2019-05-05 19:20:04'),
(261, 11, 125, 181, 1, 0, 1, NULL, '2019-05-05 19:20:59', '2019-05-05 19:20:59'),
(262, 21, 123, 193, 1, 0, 5, NULL, '2019-05-05 19:27:18', '2019-05-05 19:27:18'),
(263, 21, 123, 194, 1, 0, 10, NULL, '2019-05-05 19:27:18', '2019-05-05 19:27:18'),
(264, 21, 123, 195, 1, 0, 6, NULL, '2019-05-05 19:27:18', '2019-05-05 19:27:18'),
(265, 45, 126, 170, 1, 6000000, 1, NULL, '2019-05-12 00:52:12', '2019-05-12 00:52:12'),
(266, 79, 127, 201, 1, 300000, 1, NULL, '2019-05-12 00:53:00', '2019-05-12 00:53:00'),
(267, 80, 128, 207, 1, 300000, 2, NULL, '2019-05-12 00:55:36', '2019-05-12 00:55:36'),
(268, 80, 128, 208, 1, 300000, 1, NULL, '2019-05-12 00:55:36', '2019-05-12 00:55:36'),
(269, 80, 128, 209, 1, 510000, 2, NULL, '2019-05-12 00:55:36', '2019-05-12 00:55:36'),
(270, 81, 129, 197, 1, 1100000, 5, NULL, '2019-05-12 00:56:32', '2019-05-12 00:56:32'),
(271, 50, 130, 190, 1, 350000, 1, NULL, '2019-05-12 01:02:09', '2019-05-12 01:02:09'),
(272, 51, 131, 104, 1, 1650000, 1, NULL, '2019-05-12 01:05:01', '2019-05-12 01:05:01'),
(273, 57, 132, 104, 1, 1800000, 1, NULL, '2019-05-12 01:08:23', '2019-05-12 01:08:23'),
(274, 57, 132, 210, 1, 790000, 1, NULL, '2019-05-12 01:08:23', '2019-05-12 01:08:23'),
(275, 10, 133, 190, 1, 350000, 1, NULL, '2019-05-12 01:15:26', '2019-05-12 01:15:26'),
(276, 10, 133, 211, 1, 1490000, 1, NULL, '2019-05-12 01:15:26', '2019-05-12 01:15:26'),
(277, 16, 134, 195, 1, 100000, 11, NULL, '2019-05-12 01:17:46', '2019-05-12 01:17:46'),
(278, 16, 134, 210, 1, 550000, 1, NULL, '2019-05-12 01:17:46', '2019-05-12 01:17:46'),
(279, 15, 135, 212, 1, 200000, 1, NULL, '2019-05-12 01:22:00', '2019-05-12 01:22:00'),
(280, 70, 136, 149, 1, 670000, 1, NULL, '2019-05-12 01:22:50', '2019-05-12 01:22:50'),
(281, 76, 137, 209, 1, 510000, 2, NULL, '2019-05-12 01:25:08', '2019-05-12 01:25:08'),
(282, 76, 137, 176, 1, 410000, 1, NULL, '2019-05-12 01:25:08', '2019-05-12 01:25:08'),
(283, 11, 138, 205, 1, 470000, 1, NULL, '2019-05-12 01:26:10', '2019-05-12 01:26:10'),
(284, 33, 139, 115, 1, 1050000, 2, NULL, '2019-05-12 01:32:54', '2019-05-12 01:32:54'),
(285, 33, 139, 155, 1, 350000, 6, NULL, '2019-05-12 01:32:54', '2019-05-12 01:32:54'),
(286, 65, 140, 166, 1, 670000, 1, NULL, '2019-05-12 01:41:04', '2019-05-12 01:41:04'),
(287, 65, 140, 204, 1, 240000, 1, NULL, '2019-05-12 01:41:04', '2019-05-12 01:41:04'),
(288, 65, 140, 200, 1, 160000, 2, NULL, '2019-05-12 01:41:04', '2019-05-12 01:41:04'),
(289, 64, 141, 206, 1, 1155000, 2, NULL, '2019-05-12 01:45:33', '2019-05-12 01:45:33'),
(290, 8, 142, 221, 1, 750000, 1, NULL, '2019-05-19 03:10:26', '2019-05-19 03:10:26'),
(291, 8, 142, 191, 1, 40000, 10, NULL, '2019-05-19 03:10:26', '2019-05-19 03:10:26'),
(292, 8, 142, 218, 1, 40000, 5, NULL, '2019-05-19 03:10:26', '2019-05-19 03:10:26'),
(293, 8, 142, 219, 1, 40000, 3, NULL, '2019-05-19 03:10:26', '2019-05-19 03:10:26'),
(294, 64, 143, 198, 1, 300000, 1, NULL, '2019-05-19 03:11:24', '2019-05-19 03:11:24'),
(295, 77, 144, 214, 1, 340000, 2, NULL, '2019-05-19 03:12:59', '2019-05-19 03:12:59'),
(296, 52, 145, 214, 1, 340000, 2, NULL, '2019-05-19 03:13:22', '2019-05-19 03:13:22'),
(297, 78, 146, 214, 1, 390000, 1, NULL, '2019-05-19 03:15:43', '2019-05-19 03:15:43'),
(298, 78, 146, 161, 1, 310000, 1, NULL, '2019-05-19 03:15:43', '2019-05-19 03:15:43'),
(299, 65, 147, 199, 1, 450000, 9, NULL, '2019-05-19 03:17:11', '2019-05-19 03:17:11'),
(300, 65, 147, 217, 1, 0, 1, NULL, '2019-05-19 03:17:11', '2019-05-19 03:17:11'),
(301, 82, 148, 216, 1, 250000, 1, NULL, '2019-05-19 03:18:52', '2019-05-19 03:18:52'),
(302, 15, 149, 220, 1, 730000, 1, NULL, '2019-05-19 03:24:49', '2019-05-19 03:24:49'),
(303, 15, 149, 222, 1, 112000, 1, NULL, '2019-05-19 03:24:49', '2019-05-19 03:24:49'),
(304, 15, 149, 216, 1, 200000, 1, NULL, '2019-05-19 03:24:49', '2019-05-19 03:24:49'),
(305, 15, 149, 223, 1, 230000, 1, NULL, '2019-05-19 03:24:49', '2019-05-19 03:24:49'),
(306, 21, 150, 224, 1, 200000, 1, NULL, '2019-05-19 03:27:40', '2019-05-19 03:27:40'),
(307, 24, 151, 39, 1, 900000, 1, NULL, '2019-05-19 03:28:11', '2019-05-19 03:28:11'),
(308, 10, 152, 225, 1, 255000, 3, NULL, '2019-05-19 13:45:14', '2019-05-19 13:45:14'),
(309, 10, 152, 226, 1, 255000, 3, NULL, '2019-05-19 13:45:14', '2019-05-19 13:45:14'),
(310, 10, 152, 227, 1, 255000, 4, NULL, '2019-05-19 13:45:14', '2019-05-19 13:45:14'),
(311, 83, 153, 229, 1, 250000, 1, NULL, '2019-05-26 19:18:10', '2019-05-26 19:20:09'),
(312, 83, 153, 82, 1, 3750000, 1, NULL, '2019-05-26 19:18:10', '2019-05-26 19:20:09'),
(313, 83, 153, 235, 1, 3300000, 1, NULL, '2019-05-26 19:18:10', '2019-05-26 19:20:10'),
(314, 18, 154, 166, 1, 670000, 2, NULL, '2019-05-26 19:19:47', '2019-05-26 19:19:47'),
(315, 83, 153, 232, 1, 60000, 6, NULL, '2019-05-26 19:20:10', '2019-05-26 19:20:10'),
(316, 84, 155, 233, 1, 220000, 1, NULL, '2019-05-26 19:22:03', '2019-05-26 19:22:03'),
(317, 33, 156, 230, 1, 1270000, 2, NULL, '2019-05-26 19:22:57', '2019-05-26 19:22:57'),
(318, 85, 157, 149, 1, 670000, 2, NULL, '2019-05-26 19:24:06', '2019-05-26 19:24:06'),
(319, 11, 158, 33, 1, 530000, 1, NULL, '2019-05-26 19:25:43', '2019-05-26 19:25:43'),
(320, 86, 159, 236, 1, 350000, 1, NULL, '2019-05-26 19:28:22', '2019-05-26 19:28:22'),
(321, 52, 160, 234, 1, 210000, 3, NULL, '2019-05-26 19:29:01', '2019-05-26 19:29:01'),
(322, 25, 161, 181, 1, 170000, 1, NULL, '2019-05-26 19:30:09', '2019-05-26 19:30:09'),
(323, 87, 162, 237, 1, 300000, 4, NULL, '2019-05-26 19:33:11', '2019-05-26 19:33:11'),
(324, 15, 163, 238, 1, 140000, 1, NULL, '2019-05-26 19:37:08', '2019-05-26 19:37:08'),
(325, 15, 163, 187, 1, 380000, 1, NULL, '2019-05-26 19:37:08', '2019-05-26 19:37:08'),
(326, 15, 163, 231, 1, 410000, 1, NULL, '2019-05-26 19:37:08', '2019-05-26 19:37:08'),
(327, 81, 164, 197, 1, 1100000, 1, NULL, '2019-05-26 19:37:34', '2019-05-26 19:37:34'),
(328, 11, 165, 149, 1, 0, 1, NULL, '2019-05-26 19:38:28', '2019-05-26 19:38:28'),
(329, 10, 166, 149, 1, 0, 1, NULL, '2019-05-26 19:38:42', '2019-05-26 19:39:20'),
(330, 10, 166, 153, 1, 0, 3, NULL, '2019-05-26 19:39:20', '2019-05-26 19:39:20'),
(331, 45, 167, 195, 1, 0, 1, NULL, '2019-05-26 19:40:14', '2019-05-26 19:40:14'),
(332, 27, 168, 195, 1, 0, 1, NULL, '2019-05-26 19:40:48', '2019-05-26 19:40:48'),
(333, 88, 169, 195, 1, 0, 1, NULL, '2019-05-26 19:41:20', '2019-05-26 19:41:20'),
(334, 45, 170, 243, 1, 8500000, 1, NULL, '2019-06-02 02:01:46', '2019-06-02 02:01:46'),
(335, 16, 171, 210, 1, 550000, 2, NULL, '2019-06-02 02:02:44', '2019-06-02 02:02:44'),
(336, 16, 171, 250, 1, 350000, 1, NULL, '2019-06-02 02:02:44', '2019-06-02 02:02:44'),
(337, 81, 172, 197, 1, 1100000, 5, NULL, '2019-06-02 02:03:59', '2019-06-02 02:03:59'),
(338, 11, 173, 239, 1, 340000, 1, NULL, '2019-06-02 02:06:11', '2019-06-02 02:06:11'),
(339, 89, 174, 244, 1, 420000, 1, NULL, '2019-06-02 02:15:00', '2019-06-02 02:15:00'),
(340, 89, 174, 252, 1, 245000, 1, NULL, '2019-06-02 02:15:00', '2019-06-02 02:15:00'),
(341, 8, 175, 245, 1, 150000, 1, NULL, '2019-06-02 02:15:56', '2019-06-02 02:15:56'),
(342, 10, 176, 251, 1, 550000, 1, NULL, '2019-06-02 02:21:38', '2019-06-02 02:21:38'),
(343, 10, 176, 253, 1, 680000, 1, NULL, '2019-06-02 02:21:38', '2019-06-02 02:21:38'),
(344, 10, 176, 246, 1, 870000, 1, NULL, '2019-06-02 02:21:38', '2019-06-02 02:21:38'),
(345, 11, 177, 247, 1, 0, 1, NULL, '2019-06-02 02:22:36', '2019-06-02 02:22:36'),
(346, 48, 178, 247, 1, 900000, 1, NULL, '2019-06-02 02:25:42', '2019-06-02 02:25:42');

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`id`, `user_id`, `name`, `email`, `phone`, `login`, `password`, `remarks`, `disabled`, `created`, `updated`) VALUES
(1, 1, 'Khang', 'leduongkhang@gmail.com', '', 'khang', 'khang', '', 0, '2019-05-25 10:24:59', '2019-05-25 10:24:59'),
(2, 1, 'Thoa', 'nguyenthingockimthoa@gmail.com', '', 'thoa', 'thoa', '', 0, '2019-05-25 10:25:31', '2019-05-25 10:25:31'),
(3, 1, 'Như Như', 'quynhnhu24888@gmail.com', '', 'nhu', 'nhu', '', 0, '2019-05-25 10:30:25', '2019-05-25 10:30:25');

-- --------------------------------------------------------

--
-- テーブルの構造 `other_costs`
--

CREATE TABLE `other_costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `transport_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `other_costs`
--

INSERT INTO `other_costs` (`id`, `transport_id`, `name`, `price`, `remarks`, `disabled`, `created`, `updated`) VALUES
(1, 3, 'Saitama -> Fukuoka', 408000, 'rate 208', 0, '2019-04-10 17:25:22', '2019-04-16 16:49:27'),
(2, 4, 'Saitama -> Fukuoka', 408000, 'rate 208', 0, '2019-04-11 01:26:03', '2019-04-20 01:02:42'),
(3, 5, 'Saitama -> Fukuoka', 408000, 'rate 208', 0, '2019-04-11 10:58:00', '2019-05-01 23:26:33'),
(4, 6, 'Saitama -> Fukuoka', 408000, 'rate 208', 0, '2019-04-14 00:55:36', '2019-05-01 23:30:40'),
(5, 7, 'Saitama -> Fukuoka', 457000, 'rate 208', 0, '2019-04-14 02:24:09', '2019-05-01 23:32:09'),
(6, 7, 'JP -> VN', 2320000, '13kg', 0, '2019-04-14 22:31:20', '2019-05-01 23:32:09'),
(7, 8, 'saitama - kumanocho', 317000, 'rate 207', 0, '2019-04-21 12:27:43', '2019-05-08 15:14:17'),
(8, 6, 'JP -> VN', 2320000, '13kg', 0, '2019-04-27 15:15:07', '2019-05-01 23:30:40'),
(9, 7, 'HN -> SG', 315000, '', 0, '2019-04-27 15:26:18', '2019-05-01 23:32:09'),
(10, 6, 'HN -> SG', 178000, '', 0, '2019-04-27 15:27:26', '2019-05-01 23:30:40'),
(11, 5, 'JP -> VN', 0, '', 0, '2019-04-27 15:30:03', '2019-05-01 23:26:33'),
(12, 5, 'HN -> SG', 324000, '', 0, '2019-04-27 15:30:03', '2019-05-01 23:26:33'),
(13, 9, 'Saitama -> Fukuoka', 715000, '3418 * rate 209', 0, '2019-05-02 00:19:23', '2019-05-19 15:47:47'),
(14, 9, 'JP -> VN', 0, '', 0, '2019-05-02 00:19:23', '2019-05-19 15:47:47'),
(15, 9, 'HN -> SG', 0, '', 0, '2019-05-02 00:19:23', '2019-05-19 15:47:47'),
(16, 10, 'Saitama -> Fukuoka', 333000, '1593 * 209', 0, '2019-05-06 23:17:48', '2019-05-19 23:55:38'),
(17, 10, 'JP -> VN', 0, '', 0, '2019-05-06 23:17:48', '2019-05-19 23:55:38'),
(18, 10, 'HN -> SG', 0, '', 0, '2019-05-06 23:17:48', '2019-05-19 23:55:38'),
(19, 8, 'JP -> VN', 2790000, '', 0, '2019-05-08 15:14:02', '2019-05-08 15:14:17'),
(20, 8, 'HN -> SG', 0, '', 0, '2019-05-08 15:14:02', '2019-05-08 15:14:17'),
(21, 11, 'Saitama -> Kuma', 0, '', 0, '2019-05-13 11:34:58', '2019-05-29 18:02:56'),
(22, 11, 'JP -> VN', 0, '', 0, '2019-05-13 11:34:58', '2019-05-29 18:02:56'),
(23, 11, 'HN -> SG', 0, '', 0, '2019-05-13 11:34:58', '2019-05-29 18:02:56'),
(24, 12, 'Nhà -> Fukuoka', 473000, '2262 * 209 (25.5kg -> size160)', 0, '2019-05-20 00:00:41', '2019-05-29 18:04:46'),
(25, 12, 'JP -> HN', 0, '', 0, '2019-05-20 00:00:41', '2019-05-29 18:04:46'),
(26, 12, 'HN -> SG', 0, '', 0, '2019-05-20 00:00:41', '2019-05-29 18:04:46'),
(27, 13, 'Nhà -> Itabashi', 339000, '1614 * 210 (24.5kg)', 0, '2019-05-28 17:40:01', '2019-06-02 13:32:46'),
(28, 13, 'JP -> HN', 4797000, '24.6kg', 0, '2019-05-28 17:40:01', '2019-06-02 13:32:46'),
(29, 13, 'HN -> SG', 0, '', 0, '2019-05-28 17:40:01', '2019-06-02 13:32:46'),
(30, 14, 'Nhà -> Itabashi', 385000, '1830 * 210 (19kg)', 0, '2019-06-03 10:42:00', '2019-06-03 10:42:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `outgoing`
--

CREATE TABLE `outgoing` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `type_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float UNSIGNED NOT NULL,
  `remarks` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exec_date` datetime NOT NULL,
  `disabled` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `outgoing`
--

INSERT INTO `outgoing` (`id`, `user_id`, `member_id`, `type_id`, `name`, `amount`, `remarks`, `exec_date`, `disabled`, `created`, `updated`) VALUES
(1, 1, 1, 2, 'Bọc bong bóng', 402000, 'D2KeYoDeTsu\r\n1922 * 209', '2019-05-12 18:37:00', 0, '2019-05-25 10:47:01', '2019-05-25 10:47:01'),
(2, 1, 1, 1, 'Nhà -> Fukuoka', 473000, 'KuronekoYamato\r\n1 kiện size 160, 25kg\r\n2262 * 209', '2019-05-21 15:00:00', 0, '2019-05-25 10:50:44', '2019-05-25 10:50:44'),
(3, 1, 1, 1, 'Nhà -> Itabashi', 340000, '3308-6607-4453 (Hương)\r\n1614 * 210 (24.5kg) \r\n', '2019-05-26 20:30:00', 0, '2019-05-29 18:15:39', '2019-06-03 11:10:41'),
(4, 1, 1, 2, 'Thung hang 160 140', 1405000, '6723 * 209\r\n5 size 160\r\n10 size 140', '2019-05-07 00:00:00', 0, '2019-06-01 02:28:50', '2019-06-01 02:28:50'),
(5, 1, 3, 1, 'Hương JP -> HN 24.6 kg', 4800000, '3308-6607-4453\r\nCK Hương\r\n24.6kg', '2019-06-02 12:20:00', 0, '2019-06-03 10:58:31', '2019-06-03 11:10:24'),
(6, 1, 1, 1, 'Dũng JP -> HN', 5281500, 'CK Dũng bằng tk tại jp\r\n25.150 y * 210', '2019-05-14 00:00:00', 0, '2019-06-03 11:16:43', '2019-06-03 11:17:38'),
(7, 1, 1, 1, 'Hương Nhà -> Itabashi 19.0 kg', 385000, '3308-6667-4681 (19.0 kg)\r\n1830 * 210', '2019-06-02 15:20:00', 0, '2019-06-03 11:26:33', '2019-06-03 11:26:33');

-- --------------------------------------------------------

--
-- テーブルの構造 `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(1) UNSIGNED NOT NULL,
  `resource` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `resource`, `action`) VALUES
(1, 1, '*', '*'),
(2, 2, '*', '*'),
(3, 3, '*', '*'),
(4, 4, '*', '*');

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float UNSIGNED NOT NULL DEFAULT '0',
  `wholesale_price` float UNSIGNED NOT NULL DEFAULT '0',
  `purchase_price` float UNSIGNED NOT NULL DEFAULT '0',
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'type of good',
  `brand_id` smallint(5) UNSIGNED DEFAULT NULL COMMENT 'branchname of goods',
  `description` text COLLATE utf8mb4_unicode_ci,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `size`, `unit`, `price`, `wholesale_price`, `purchase_price`, `quantity`, `image`, `category_id`, `brand_id`, `description`, `remarks`, `disabled`, `created`, `updated`) VALUES
(1, 1, 'The Shiseido Collagen Powder V', '126g', '', 500000, 430000, 1618, 9, 'shiseido-collagen-powder.jpg', 7, 7, '', 'collagen shiseido', 0, '2019-03-20 12:18:22', '2019-05-02 23:47:20'),
(2, 1, 'Slim Up Slim Berry Yogurt (Strawberry)', '300g', '', 550000, 450000, 1468, 4, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Mixberry.jpg', 9, 8, 'dâu', 'bột giảm cân slim up slim', 0, '2019-03-20 13:03:13', '2019-06-03 11:37:29'),
(3, 1, 'Slim Up Slim Mango', '300g', '', 550000, 450000, 1358, 1, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Mango.jpg', 9, 8, 'xoài', 'bột giảm cân slim up slim', 0, '2019-03-20 13:06:09', '2019-05-02 23:44:55'),
(4, 1, 'Aneron 9 cap', '9 viên', '', 250000, 200000, 612, 13, 'aneron_9.jpg', 10, 5, '', 'thuốc say tàu xe', 0, '2019-03-20 13:09:54', '2019-05-02 07:51:32'),
(5, 1, 'Slim Up Slim Mix Berry Latte', '315g', '', 550000, 450000, 1358, 7, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Mix_Berry_Latte.jpg', 9, 8, 'mix nhiều loại trái berry', 'bột giảm cân slim up slim', 0, '2019-03-20 14:02:57', '2019-05-02 23:45:12'),
(6, 1, 'Slim Up Slim Matcha Latte', '315g', '', 550000, 450000, 0, 0, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Matcha_Latte.jpg', 9, 8, 'Trà xanh', 'bột giảm cân slim up slim', 0, '2019-03-20 14:09:32', '2019-05-02 23:45:04'),
(7, 1, 'Slim Up Slim Cafe Latte', '360g', '', 550000, 450000, 0, 3, 'slimup-cafe-lattte-takatanpaku.jpg', 9, 8, '', 'bột giảm cân slim up slim', 0, '2019-03-20 14:11:01', '2019-05-02 23:44:29'),
(8, 1, 'Transino Whitening Repair Cream 35g', '35g', 'hộp', 1100000, 1000000, 3778, 4, 'transino_whitening_repair_cream.jpg', 7, 6, 'Kem đêm\r\nトランシーノ薬用ホワイトニングリペアクリーム　（夜用美白クリーム）', 'kem đêm', 0, '2019-03-20 14:55:04', '2019-05-02 23:52:22'),
(9, 1, 'Transino Whitening Day Protector SPF35 PA+++ 40ml', '40ml', 'chai', 850000, 720000, 3130, 0, 'transino_whitening_day_protector_SPF35_PA+++.jpg', 7, 6, 'chống nắng Transino\r\nトランシーノ薬用ホワイトニングデイプロテクター（日中用乳液）（40ml）［日焼け止め］', 'chống nắng(VN cân nhắc khi sử dụng)', 0, '2019-03-20 14:56:21', '2019-05-02 23:48:49'),
(10, 1, 'Transino Whitening Clear Lotion 175ml', '175ml', 'hộp', 950000, 850000, 3480, 2, 'transino_whitening_clear_lotion.jpg', 7, 6, 'nước hoa hồng\r\nトランシーノ薬用ホワイトニングクリアローション　（美白化粧水）　175ml', 'nước hoa hồng', 0, '2019-03-20 15:07:03', '2019-05-02 23:48:01'),
(11, 1, 'Transino Whitening Esscence EX 50g', '50g', 'tuýp', 1450000, 1350000, 5378, 2, 'transino_whitening_essence_ex.jpg', 7, 6, 'Serum\r\nトランシーノ薬用 ホワイトニングエッセンス ＥＸ 50g', 'serum chuyên trị nám', 0, '2019-03-20 15:12:15', '2019-05-02 23:51:59'),
(12, 1, 'Transino Whitening Clear Milk 120ml', '120ml', 'tuýp', 900000, 800000, 0, 0, 'transino_whitening_clear_milk.jpg', 7, 6, 'Sữa dưỡng\r\nトランシーノ薬用ホワイトニングクリアミルク　120ml', 'sữa dưỡng', 0, '2019-03-20 15:19:49', '2019-05-02 23:48:29'),
(13, 1, 'Transino ii 240', '240viên', 'hộp', 1450000, 1350000, 5891, 7, 'transino_ii_240.jpg', 10, 6, 'thuốc trị nám, tàn nhang\r\nトランシーノII　240錠\r\nトランシーノ 錠剤 しみ そばかす', 'thuốc trị nám 240 viên', 0, '2019-03-20 15:53:27', '2019-06-02 01:32:14'),
(14, 1, 'Transino WhiteC Clear 120 tablets', '120 viên', 'hộp', 680000, 600000, 2260, 11, 'transino_whiteC_clear.jpg', 10, 6, 'thuốc trắng da, trị nám\r\ntrang da\r\nトランシーノ　ホワイトCクリア　120錠 ', 'thuốc trắng da 120 viên', 0, '2019-03-20 16:00:17', '2019-05-02 23:47:45'),
(15, 1, 'DHC Vitamin C 60 Days (120 Tablets)', '120 viên', 'bịch', 230000, 170000, 420, 10, 'dhc_vitamin_C_60days.jpg', 10, 9, 'DHC ビタミンC ハードカプセル 60日(120粒)', 'Viên Vitamin C DHC 60 ngày', 0, '2019-03-20 16:36:23', '2019-05-18 23:09:34'),
(16, 1, 'DHC Hatomugi 20 Days (20 Tablets)', '20 viên', 'bịch', 150000, 120000, 363, 0, 'dhc_hatomugi_20days.jpg', 10, 9, 'trắng da\r\nＤＨＣ はとむぎエキス ２０日分 ２０粒入', 'viên trắng da DHC 20 ngày', 0, '2019-03-20 16:50:58', '2019-05-02 08:08:56'),
(17, 1, 'Inclear 1.7g×10', '10', 'cây', 900000, 800000, 2651, 3, 'inclear_vaginal_cleaner_10.jpg', 10, 0, 'Inclear - Vaginal Cleaner\r\n', 'gel đặt trị huyết trắng', 0, '2019-03-20 16:58:46', '2019-06-03 11:33:54'),
(18, 1, 'Attonon EX Gel 15g', '15 g', 'tuýp', 330000, 290000, 658, 10, 'attonon_ex_gel_15g.jpg', 25, 37, 'アットノンEX ジェル 15g \r\nGel liền xẹo\r\nGel lien xeo\r\nGel lien theo', 'gel trị thẹo', 0, '2019-03-20 17:12:07', '2019-05-12 01:48:18'),
(19, 1, 'Slim Up Slim Kiwi 300g', '300 g', 'bịch', 550000, 450000, 1358, 2, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Kiwi.jpg', 9, 8, 'スリムアップスリム　ベジフルチャージスムージー　300g ', 'bột giảm cân slim up slim', 0, '2019-03-20 17:22:41', '2019-05-02 23:44:48'),
(20, 1, 'iSDG Diet Beauty 121 (pink) 30 days (60 tablets)', '60 viên', 'bịch', 350000, 280000, 540, 2, 'iSDG_diet_beauty_121_pink.jpg', 9, 11, '', 'viên giảm cân 121 loại', 0, '2019-03-20 17:37:06', '2019-05-02 08:27:03'),
(21, 1, 'iSDG Diet 121 (blue) 30 days (60 tablets)', '60 viên', 'bịch', 350000, 280000, 540, 4, 'iSDG_diet_beauty_121_blue.jpg', 9, 11, '', 'viên giảm cân 121 loại', 0, '2019-03-20 17:52:35', '2019-05-02 08:26:54'),
(22, 1, 'iSDG Diet Hot 121 (red) 30 days (60 tablets)', '60 viên', 'bịch', 350000, 280000, 540, 6, 'iSDG_diet_beauty_121_red.jpg', 9, 11, '', 'viên giảm cân 121 loại', 0, '2019-03-20 17:57:26', '2019-05-02 08:27:14'),
(23, 1, '232 Diet Enzyme Premium (120 tablets) (green)', '120 viên', 'bịch', 570000, 450000, 1500, 5, 'iSDG_diet_green_232.jpg', 9, 11, 'giảm cân\r\n232ダイエット酵素プレミアム（120粒）\r\n🍀🍀🍀🍀🍀Công dụng của viên uống giảm cân thực vật lên men Enzyme Diet Premium nhật bản\r\nViên uống giảm cân thực vật lên men enzyme diet premium nhật bản được chiết xuất từ hơn 232 loại rau củ quả tự nhiên lên men giúp đốt cháy mỡ thừa tốt nhất, giúp bạn trở lại dáng thon gọn. \r\n👉Với Enzyme diet Premium không những giúp bạn giảm cân hiệu quả mà còn làm cho bạn khỏe, trẻ đẹp ra với công dụng như sau:\r\n\r\n-👉Viên uống giảm cân Enzyme Diet Premium Nhật Bản hỗ trợ đào thải mỡ, đốt cháy mỡ thừa trong cơ thể giúp giảm cân\r\n\r\n- 👉Enzyme Diet Premium Nhật Bản bổ sung chất xúc tác để phân giải hết năng lượng trong cơ thể để tránh tích tụ mỡ.\r\n\r\n- 👉Viên giảm cân Enzyme Diet Premium thanh lọc cơ thể, tăng sức đề kháng phòng ngừa bệnh\r\n\r\n- 👉Enzyme rất cần thiết cho các hoạt động trao đổi chất trong tế bào khi tuổi càng cao thì Enzyme càng giảm vì vậy hoạt động trao đổi chất cũng giảm theo nên đó cũng là nguyên nhân bạn ăn ít hơn lúc còn trẻ mà tại sao ngày càng mập ra, vì thế cần bổ sung enzyme từ bên ngoài.\r\n\r\n🍀🍀🍀Viên uống giảm cân Enzyme Diet Premium còn được bổ sung thêm men Koubo và Koji tự nhiên từ ngũ cốc giúp phân giải đường để tạo năng lượng cho cơ thể hoạt động khỏe mạnh.\r\n🥰🥰Ngày 2 lần mỗi lần 2 viên viên uống giảm cân thực vật lên men Enzyme Diet Premium Nhật Bản vào buổi sáng hoặc tối, uống trước bữa ăn 30 phút.', 'giảm cân 232 loại', 0, '2019-03-20 18:03:16', '2019-05-02 07:50:38'),
(24, 1, 'WHITE CONC Watery Gel II 90g', '90 g', 'chai', 350000, 300000, 1049, 1, 'white_conc_body_gel.jpg', 16, 52, '薬用ホワイトコンク　ウォータリークリームII　90g\r\nGel duong trang da', 'gel dưỡng trắng da ban đêm', 0, '2019-03-20 18:11:27', '2019-05-02 23:55:27'),
(25, 1, 'WHITE CONC Body Sampoo CII 360ml', '360 ml', 'chai', 400000, 350000, 0, 4, 'white_conc_body_sampoo.jpg', 16, 52, '薬用ホワイトコンク　ボディシャンプーCII　360ml', 'sữa tắm trắng da', 0, '2019-03-20 18:18:17', '2019-05-18 23:11:14'),
(26, 1, 'Pueraria Mirifica 99EX (66 tablets)', '66 viên', 'hộp', 750000, 650000, 3024, 2, 'pueraria_mirifica_99_ex.jpg', 10, 0, 'プエラリア99EX（66粒）', 'viên nở ngực', 0, '2019-03-20 18:31:07', '2019-05-02 12:11:09'),
(27, 1, 'Botanical Oil Hair Treatment 100ml', '100 ml', 'chai', 490000, 400000, 540, 8, 'botanical_hair_oil.jpg', 7, 12, 'dưỡng tóc botanical\r\nArgan Serum Vitamin Not washed type 100ml.', 'dầu dưỡng tóc botanist', 0, '2019-03-22 10:48:08', '2019-05-02 07:54:20'),
(28, 1, 'Botanical Honey Oil Hair Treatment 100ml', '100 ml', 'chai', 0, 0, 0, 0, 'botanical_honey_hair_oil.jpg', 7, 12, 'dưỡng tóc botanical\r\nArgan Serum Vitamin Not washed type 100ml.', 'dầu dưỡng tóc botanist', 1, '2019-03-22 10:51:47', '2019-05-02 07:54:35'),
(29, 1, 'Plant Liquid Capsule 350 (60 capsules)', '350 viên', 'bịch', 350000, 290000, 540, 4, 'plant_liquid_capsule_350.jpg', 8, 0, '', 'thuốc giảm cân 350 loại', 0, '2019-03-22 11:05:08', '2019-05-02 12:10:57'),
(30, 1, 'SANTEN FX Neo Eye Drop 12ml', '12 ml', 'chai', 140000, 110000, 298, 0, 'santen_fx_neo_black_12ml.jpg', 13, 13, '', 'thuốc nhỏ mắt người lớn', 0, '2019-03-22 12:19:04', '2019-05-02 12:12:25'),
(31, 1, 'DHC Hyaluronic Acid 60 Days (120 Tablets)', '120 viên', 'bịch', 630000, 550000, 2580, 0, 'dhc_axit_hiaruron_60days.jpg', 10, 9, 'DHC ヒアルロン酸 60日分 120粒', 'viên cấp nước 60 ngày', 0, '2019-03-22 12:40:30', '2019-05-02 08:14:04'),
(32, 1, 'Mentholatum Medical Lip 8.5g', '8.5 g', 'tuýp', 300000, 240000, 906, 5, 'mentholatum_medicare_lip.jpg', 11, 14, 'ロート製薬 メンソレータム メディカルリップnc (8.5g) 口唇炎・口角炎治療薬\r\nTrị lở miệng Rohto\r\ntri lo mieng rohto', 'tuýp lở mép miệng', 0, '2019-03-22 13:18:54', '2019-05-02 08:32:33'),
(33, 1, 'Anessa Whitening UV Gel SPF 50+ PA++++ 90g', '90 g', 'tuýp', 590000, 540000, 2138, 1, 'anessa_white.png', 14, 7, 'シミを防ぐ薬用美白*UVジェル\r\nホワイトニングUV ジェルn （医薬部外品）\r\n〈日焼け止め用ジェル〉90g\r\nGel chống nắng, ngăn ngừa nám, trắng da\r\nGel chong nang, nang ngua nam, trang da', 'gel chống nắng trắng', 0, '2019-03-22 15:36:17', '2019-05-26 19:25:43'),
(34, 1, 'Anessa Perfect Skin Gel SPF 50+ PA++++ 90g', '90 g', 'tuýp', 590000, 540000, 2138, 4, 'anessa_gold.png', 14, 7, 'スキンケアする強力UVジェル\r\nパーフェクトUV スキンケアジェル\r\n〈日焼け止め用ジェル〉90g\r\nGel chống nắng, Gel UV mạnh mẽ\r\nGel chong nang, Gel UV manh me\r\nChống nắng toàn diện với Anessa Whitening UV Sunscreen Gel\r\n🍀🍀🍀🍀🍀Gel chống nắng dưỡng trắng Anessa Whitening UV Sunscreen Gel 90g:\r\nlà giải pháp chống nắng toàn diện, hiệu quả. Với công nghệ Aqua Booster chống nước kết hợp cùng hoạt chất làm mờ vết thâm nám, giúp bảo vệ làn da khỏi tác hại của ánh nắng mặt trời, đồng thời cung cấp thành phần dưỡng da cho bạn làn da trắng sáng rạng rỡ.\r\n\r\n🍀🍀🍀Công dụng của gel chống nắng dưỡng trắng Anessa Whitening UV Sunscreen:\r\n- ❄️Chỉ số chống nắng cao, bảo vệ làn da bạn dưới tác hại của ánh nắng mặt trời. \r\n- ❄️Chứa thành phần dưỡng trắng và dưỡng ẩm da, ức chế sự phát triển của hắc tố melanin, trả lại làn da trắng sáng, đều màu.\r\n- ❄️Chống lão hóa da và dưỡng ẩm chuyên sâu cho làn da mềm mịn, mượt mà.\r\n- ❄️Dạng gel sữa thấm nhanh vào da, không gây bết dính, bí bách tạo cảm giác thoải mái, thông thoáng cho da, hạn chế gây mụn.\r\n\r\n🍀🍀🍀Hướng dẫn sử dụng gel chống nắng dưỡng trắng Anessa Whitening UV Sunscreen:\r\n- 🥑Thoa kem trước khi ra nắng 15-20 phút để kem có thời gian phát huy hiệu quả và giúp những dưỡng chất thấm sâu vào da.\r\n- 🍓Bước 1: Thực hiện các bước chăm sóc da cơ bản, sử dụng kem chống nắng sau khi dưỡng ẩm. \r\n- 🍓Bước 2: Làm sạch tay, lắc đều và sử dụng:\r\n+ 🥝Đối với vùng mặt: Cho một lượng vừa đủ (khoảng bằng hạt ngọc trai) thoa đều lên mặt và cổ theo hướng từ trong ra ngoài, vỗ nhẹ để kem thấm vào da tốt hơn.\r\n+ 🥝Đối với cơ thể: Cho sản phẩm lên da theo đường dọc cơ thể, nên sử dụng một lượng nhiều sản phẩm và thoa bằng lòng bàn tay với động tác xoay tròn.\r\n- 🍓Bước 3: Thoa lại sau 2-3 giờ tiếp xúc với nắng để được bảo vệ tối ưu nhất.\r\n\r\n* Kem chống nắng Anessa màu vàng: Khả năng chống thấm nước vượt trội, thích hợp cho người chơi thể thao, đi biển.', 'gel chống nắng vàng', 0, '2019-03-22 15:36:27', '2019-05-26 19:07:35'),
(35, 1, 'Labo BB Essence Cream SPF50 PA++++ 03 33g', '33 g', 'tuýt', 320000, 260000, 768, 3, 'labo_essence_cream_03.jpg', 12, 15, 'モイストラボBB エッセンスクリーム ナチュラルオークル(SPF50 PA++++) 33g', 'kem nền', 0, '2019-03-22 16:55:31', '2019-05-02 08:28:29'),
(36, 1, 'Labo BB Essence Cream SPF50 PA++++ 01 33g', '33 g', 'tuýt', 320000, 260000, 800, 1, 'labo_essence_cream_01.jpg', 12, 15, 'モイストラボBBエッセンスクリームナチュラルベージュ', 'kem nền', 0, '2019-03-22 17:04:08', '2019-05-02 08:28:19'),
(37, 1, 'Melano CC 20ml', '20 ml', 'tuýp', 340000, 280000, 1052, 5, 'merano_cc.jpg', 12, 14, 'メラノCC 薬用しみ集中美容液20ml', 'serum melano', 0, '2019-03-22 17:25:59', '2019-05-19 02:37:27'),
(38, 1, 'AQUALABEL Special Gel Cream Oil In 90g', '90 g', '', 490000, 420000, 2030, 2, 'aqualabel_special_gel_cream_oil_in_gold_90g.jpg', 12, 7, 'アクアレーベル スペシャルジェルクリーム (オイルイン) エイジングケアタイプオールインワン 90g\r\n\r\nKem Dưỡng Trắng Da Shiseido Aqualabel (xanh, đỏ, vàng)\r\n     \r\n Trọng lượng: 50g\r\n Xuất xứ: Nhật Bản\r\nCông dụng từng loại :\r\n- Kem màu xanh: Giúp dưỡng trắng sáng da, ngăn ngừa nám, tàn nhang và các vùng da sậm màu, cho bạn làn da trắng hồng rạng rỡ một cách tự nhiên.\r\n- Kem màu đỏ: Có chứa Na Axit Hyaluronic là thành phần rất hiệu quả trong việc cấp & giữ nước cho bề mặt da giúp da bạn mịn màng & mềm mại hơn. Điều này sẽ cảm nhận được sau lần đầu tiên sử dụng.\r\n- Kem màu vàng: Với tinh chất sâm và sữa ong chúa, Aqualabel nhãn vàng được mọi người ưa chuộng vì nó cung cấp dưỡng chất mà da cần, kéo dài vẻ mịn màng, tươi mới của làn da, ngăn ngừa những dấu hiệu lão hóa đến sớm của da.', 'kem dưỡng đêm shiseido', 0, '2019-03-22 18:30:11', '2019-05-13 19:07:17'),
(39, 1, 'Shu Uemura Smoothfit Mineral Foundation', '', '', 1000000, 900000, 4980, 0, 'shu_uemura_spf_18_pa++.jpg', 15, 16, 'シュウウエムラ スムースフィット ミネラル ファンデーション\r\nhttps://www.shuuemura.jp/?p_id=MFD009', 'kem nền shu', 0, '2019-03-22 18:43:02', '2019-05-19 03:28:11'),
(40, 1, 'AQUALABEL White Up Cream 50g (Blue)', '50 g', '', 490000, 420000, 1640, 0, 'shiseido_aqua_blue.jpg', 12, 7, 'アクアレーベル ホワイトアップ クリーム 保湿・美白クリーム (3) とてもしっとり 50g ', 'ken dưỡng trắng da đêm shiseido', 0, '2019-03-25 14:09:25', '2019-05-02 07:53:00'),
(41, 1, 'Skin Aqua Tone Up UV Essence SPF 50+ PA++++ 80g', '80 g', 'tuýp', 310000, 250000, 861, 5, 'skin_aqua_uv.jpg', 14, 14, 'SKIN AQUA（スキンアクア） トーンアップUVエッセンス （80g）', 'chống nắng', 0, '2019-03-25 14:31:22', '2019-05-02 23:44:00'),
(42, 1, 'Chondroitin ZS Tablets 270 (tablets)', '270 viên', 'hủ', 1600000, 1500000, 7500, 1, 'chonroitin_zs_270.jpg', 10, 17, 'コンドロチンZS錠（270錠）', 'thuốc trị đau nhức xương khớp và trị gout', 0, '2019-03-25 15:23:13', '2019-05-02 08:02:46'),
(43, 1, 'Sekkisei White UV Milk Kit', '', 'bộ', 700000, 650000, 2106, 4, 'kose_white_uv_milk.jpg', 14, 18, '雪肌精 (せっきせい) ホワイトUVミルクキット（日焼止め乳液・化粧水付） ［日焼け止め］', 'sữa chống nắng kose', 0, '2019-03-26 18:30:12', '2019-06-03 11:36:54'),
(44, 1, 'Dental Medicare Cream 5g', '5 g', 'tuýp', 310000, 260000, 922, 8, 'medicare_dental.jpg', 16, 19, '【第2類医薬品】 メディケアデンタルクリーム（5g）\r\nthuoc tri nhiet mieng', 'thuốc trị nhiệt miệng', 0, '2019-03-26 18:38:56', '2019-05-02 08:03:21'),
(45, 1, 'WHITE CONC Body Gommage C', '', 'chai', 450000, 400000, 1404, 5, 'white_conc_body_gommage.jpg', 16, 52, '薬用ホワイトコンク ボディゴマージュCII\r\ntẩy tế bào chết', 'tẩy tế bào chết trắng da', 0, '2019-03-26 18:49:06', '2019-05-26 12:45:18'),
(46, 1, 'Sekkisei White UV Gel Kit', '', 'bộ', 650000, 600000, 1965, 4, 'kose_white_uv_gel.jpg', 14, 18, '雪肌精 (せっきせい) ホワイトUVジェルキット（日焼止め乳液・化粧水付） ［日焼け止め］', 'gel chống nắng kose', 0, '2019-03-30 01:34:32', '2019-06-03 11:36:39'),
(47, 1, 'Spirulina 100% 2200 cap', '2200 viên', 'hủ', 800000, 730000, 2570, 1, 'supirurina_2200.jpg', 8, 0, '🌸🌸🌸🌸🌸Tảo biển spirulina 2200 viên:\r\nTảo biển spirulina Nhật Bản được chế biến từ 100 % tảo xoắn Nhật nguyên chất và đã được các tổ chứcTokyo Chamber of Commerce and Industry và Japan Food Research Laboratories (JFRL) công nhận là một loại thực phẩm chức năng có chất lượng và có nhiều tác dụng cho con người. \r\n🌸Tảo biển spirulina Nhật Bản 2200 viên là sản phẩm phù hợp với mọi lứa tuổi khi giúp bổ sung nguồn dinh dưỡng dồi dào cho cơ thể, giúp tăng cường sức đề kháng, nâng cao hệ thống miễn dịch.\r\n🌸Tác dụng của tảo biển Nhật Bản còn giúp điều hòa huyết áp, giảm cholesterol. Theo đó, nghiên cứu tại Mexico cho thấy, cả nam và nữ dùng 4,5g tảo spirulina hàng ngày đã làm giảm tỉ lệ huyết áp cao trong vòng 6 tuần.\r\n🌸Công dụng tảo Nhật Bản 2200 viên giúp giải độc cho gan, giải độc cho cơ thể rất hiệu quả nhờ thành phần chất diệp lục và chất chống oxy hóa cao trong sản phẩm tảo biển này.\r\n🌸Ngoài ra, một nghiên cứu khác về tảo biển của Nhật trên bệnh nhân cao tuổi cho thấy mức cholesterol thấp có liên quan đến việc tiêu thụ 8g spirulina mỗi ngày trong 16 tuần.\r\n🌸Tác dụng của tảo spirulina chống lão hóa và ngừa ung thư nhờ có chứa hàm lượng chất chống oxy hóa cao như là Beta-caroten, vitamin E, các sắc tố Carotenoid, Chlorophyll và Phycocyanin, hay selenium, mangan, kẽm, đồng, sắt và crôm…\r\n🌸Tảo Spirulina còn được chứng minh hiệu quả trong hỗ trợ chữa trị các chứng dị ứng ở mũi bằng cách ngăn chặn sự giải phóng histamine. Việc sử dụng tảo xoắn giúp cải thiện triệu chứng như hắt hơi, nghẹt mũi, ngứa mũi và xổ mũi.\r\n🌸Bên cạnh đó, tảo Spirulina còn hỗ trợ phòng và điều trị bệnh tiểu đường bằng cách kích thích insulin, kiểm soát lượng đường huyết, giúp chuyển hóa đường thành năng lượng.\r\n🌸Ngoài ra, tảo Spirulina là thực phẩm dinh dưỡng tự nhiên có tính kiềm giúp trung hòa axit trong dạ dày, đồng thời bổ sung dinh dưỡng đầy đủ mà không sợ người bệnh thiếu chất.\r\n🌸Công dụng của tảo Spirulina Nhật không những thế còn giúp tăng cường sinh lý, sinh lực cho phái mạnh, giúp bổ thận tráng dương, cho nam giới có được những giây phút thăng hoa.\r\n🌸Tác dụng của tảo biển spirulina còn đặc biệt giúp làm đẹp da, kháng khuẩn, giảm dị ứng, sưng tấy cho làn da, hỗ trợ đẩy lùi quá trình lão hóa, bên cạnh đó còn tốt cho răng và tóc.\r\n🌸Hơn thế, tảo biển Spirulina Nhật Bản còn hỗ trợ chống béo phì giúp cho quá trình tiêu hóa được tốt hơn, đem lại cho chị em một vóc dáng và thân hình cân đối, khỏe mạnh nhất.\r\n🌸🌸🌸Hướng dẫn sử dụng tảo biển Spirulina Nhật Bản:\r\n🌸Đối với người lớn ngày uống 20 - 30 viên trước bữa ăn hoặc sau bữa ăn (có thể chia làm 2 - 3 lần).\r\n🌸Đối với trẻ em dưới 5 tuổi: uống dưới 5 viên/lần, có thể nghiền thành bột chung với thức ăn (nên hỏi ý kiến bác sĩ trước khi sử dụng).\r\n🌸Đối với trẻ em trên 5 tuổi: uống 10 - 20 viên/ngày, mỗi ngày uống 2 - 3 lần.\r\n🌸Người đang giảm cân: uống tảo trước bữa ăn 30 phút.\r\n🌸Nếu muốn tăng cân: uống tảo biển sau bữa ăn 30 phút. \r\n🌸Tảo biển Spirulina còn dùng để đắp mặt nạ mỗi ngày.\r\n-Mặt nạ tảo biển khô: bột tảo biển khô cũng có giá trị dinh dưỡng tương tự như tảo tươi,khi đắp mặt nạ tảo biển nhật bản sẽ giúp thanh lọc da, tăng cường dưỡng chất, bổ sung độ ẩm giúp da mềm mại, cung cấp chất chống oxy hoá xóa đi các nếp nhăn, đốm nám, mụn đầu đen trên mũi,mặt. Do có đặc tính lành nên khi sử dụng mặt nạ này bạn có thể kết hợp với các nguyên liệu khác như: mật ong, nha đam, cam,tinh dầu dừa, bưởi.v..v. mà không lo có tác dụng phụ xảy ra.\r\n-Để chế mặt nạ từ tảo biển này không khó, chị em cần dùng 2 - 5 thìa tảo biển đã nghiền nát tương đương 13 - 15 gam tảo biển. Pha cùng 20ml nước nóng để tạo thành hỗn hợp bột nhão. Tiếp đó thêm 1 thìa gel lô hội, 1 thìa mật ong vào hỗn hợp vừa tạo được.\r\nRửa mặt thật sạch bằng sữa rửa mặt có hoạt tính dịu nhẹ, sau đó thoa hỗn hợp này lên da mặt và cả vùng cổ. Nằm thư giãn 20 - 30 phút cho đến khi lớp mặt nạ se và khô lại. Cuối cùng rửa sạch da mặt và da vùng cổ bằng nước ấm.\r\n\r\n=====\r\nスピルリナ100% 海洋深層水スピルリナブレンド 2200粒\r\nSpirulina 100% Kaiyoushinsosui Spirulina Blend 2200 tablets\r\nTao xoan\r\nTảo xoắn', 'tảo biển 2200 viên dạng hủ', 0, '2019-03-30 03:44:15', '2019-05-03 02:22:42'),
(48, 1, 'Night Diet Tea (2g x 20 follicles)', '20 gói', 'bịch', 290000, 230000, 753, 13, 'night_diet_tea.jpg', 9, 20, 'Trà giảm cân', 'trà giảm cân ban đêm', 0, '2019-03-30 10:28:20', '2019-05-12 00:31:21'),
(49, 1, 'DHC Vitamin B Mix 60 days (120 tablets)', '120 viên', 'bịch', 230000, 170000, 321, 5, 'dhc_vitamin_B_60days.jpg', 10, 9, 'DHC（ディーエイチシー） ビタミンBミックス 60日分（120粒）〔栄養補助食品〕', 'Viên vitamin B Mix 60 ngày', 0, '2019-03-30 10:32:09', '2019-05-02 08:17:07'),
(50, 1, 'DHC Multi Vitamin 60 days (120 tablets)', '120 viên', 'bịch', 260000, 200000, 555, 7, 'dhc_multi_vitamin_60days.jpg', 10, 9, 'DHC（ディーエイチシー） マルチビタミン 60日分（60粒）〔栄養補助食品〕', 'viên vitamin tổng hợp DHC 60 ngày', 0, '2019-03-30 11:11:12', '2019-05-18 23:03:35'),
(51, 1, 'DHC Fragrant Bulgarian Rose 20 days (40 tablets)', '40 viên', 'bịch', 350000, 300000, 1004, 9, 'dhc_burugaria_rose_20days.jpg', 10, 9, 'DHC（ディーエイチシー） 香るブルガリアンローズ 20日分（40粒）〔栄養補助食品〕\r\n🌹🌹🌹🌹🌹Viên uống dầu hoa hồng thơm cơ thể DHC:20 ngày\r\n🌹Viên uống dầu hoa hồng thơm cơ thể DHC kết hợp thành phần Citronellol (có trong tinh dầu xả) và Geraniol (có trong tinh dầu hoa hồng) là một chất chống oxy hóa tự nhiên và hương thơm của nó khi vào cơ thể, sẽ được bài tiết qua lỗ chân lông, tạo mùi ngọt tự nhiên có thể kéo dài hàng giờ.\r\n\r\n🌹Trong dầu hoa hồng là chất chống oxy hóa mạnh, nó có đến 850 thành phần có thể tạo ra mùi hương cho cơ thể, bạn sẽ cảm nhận được cơ thể sẽ thay đổi sau 2-3 giờ uống.\r\n🌹Có thể nói, cơ thể có mùi tuy không gây hại nhưng nó vô tình làm chúng ta mất đi cảm giác tự tin trong giao tiếp, mọi người sẽ vô tình cảm thấy khó chịu và muốn đứng xa mình 1 chút. \r\n🌹🌹Liều dùng:\r\nUống mỗi ngày 2 viên sau bữa ăn để duy trì và tránh được sự tiết mùi không đáng có.', 'viên hoa hồng thơm cơ thể 20 ngày', 0, '2019-03-30 12:47:15', '2019-05-02 08:03:47'),
(52, 1, 'DHC Vitamin E 60 days (60 tablets)', '60 viên', 'bịch', 290000, 230000, 606, 5, 'dhc_vitamin_E_60days.jpg', 10, 9, 'DHC（ディーエイチシー） ビタミンE 60日分（60粒）〔栄養補助食品〕', 'Viên Vitamin E DHC 60 ngày', 0, '2019-03-30 13:09:25', '2019-05-02 08:17:35'),
(53, 1, 'Inochi no haha 420 pills', '420 viên', 'hủ', 630000, 560000, 2138, 3, 'inochinohana_420.jpg', 10, 21, '【第2類医薬品】 女性保健薬命の母A（420錠）\r\n\r\ntien man kinh', 'thuốc tiền mãn kinh', 0, '2019-03-30 22:22:30', '2019-05-02 08:26:34'),
(54, 1, 'Nakatta Kotoni Red 120 pills', '120 viên', 'bịch', 370000, 300000, 1382, 4, 'nakatta_kotoni_red.jpg', 9, 22, 'なかったコトに　９９粒\r\n🍏🍏🍏Enzyme giảm cân ban ngày từ đậu trắng tây: màu đỏ\r\n👉Enzym giảm cân ban ngày của Nhật có tác dụng ngăn chặn lại quá trình hấp thu các chất béo, đốt cháy thành mỡ thừa, carlories ở những người thừa cân và béo bụng sẽ được đào thải theo đường bài tiết một cách tự nhiên và từ từ, enzym có trong viên béo giúp hệ tiêu hóa được hoạt động tốt hơn.\r\n\r\n👉Khi sử dụng enzym giảm cân ban ngày bạn yên tâm là cơ thể khỏe mạnh, hoạt bát, nhanh nhẹn hơn, không phải lo với những bài tập thể dục mạnh, không phải ăn kiêng, không lo viên uống khó uống. Mà ngược lại viên uống giúp bạn giữ lại đc vóng dáng thon gọn mà không phải thực hiện chế độ ăn khắc nghiệt.\r\n\r\n🐥🐥🐥Enzym giảm cân ban ngày có những công dụng gì?\r\n😱Enzym giảm cân bằng thảo dược được lên men hơn 1000 ngày đang là trào lưu được người tiêu dùng nhật tin tưởng truy tìm ở tất cả các kệ siêu thị, store…với công dụng tuyệt vời nhất mà y học Nhật đã chỉ ra mọi vấn đề sức khỏe, sắc đẹp giảm cân đều bắt nguồn từ hệ tiêu hóa.\r\n😱Chính vì thế muốn giảm cân hiệu quả và an toàn bạn phải dùng enzym lên men để giúp hệ tiêu hóa đặc biệt là hệ vi khuẩn đường ruột được khỏe mạnh, giúp kích thích sản xuất năng lượng, tăng cường trao đổi chất, không tích tụ mỡ thừa để có thể giảm cân nhanh.\r\n😱Hỗ trợ đốt cháy calo và carbohydrate\r\n😱Thanh lọc cơ thể, giúp tăng sức đề kháng cho cơ thể phòng ngừa bệnh.\r\n😱Giảm phù nề hiệu quả.\r\n👌👌Với thành phần đậu thận trắng, bột lá sen, bột trà xanh được lên men giúp ngăn ngừa các chất béo có trong thức ăn, đốt cháy mỡ một cách tự nhiên, hiệu quả an toàn, đem đến cho bạn thân hình vóc dáng cân bằng.\r\nCách sử dụng enzyme giảm cân ban ngày như sau:120 viên 40 ngày\r\n• Ngày uống 3 viên vào buổi sáng\r\n• Nên dùng viên uống trước bữa ăn 30 phút\r\n• Nên sử dụng viên uống với nhiều nước ấm', 'thuốc giản cân ban ngày', 0, '2019-03-30 22:30:57', '2019-05-02 12:08:52'),
(55, 1, 'Nakatta Kotoni Night Diet Supplement 30 pills', '30 viên', 'bịch', 390000, 320000, 0, 6, 'nakatta_kotoni_night.jpg', 9, 22, 'なかったコトに!夜用ダイエットサプリ 30粒\r\n🍏🍏🍏Enzyme giảm cân ban đêm:màu xanh\r\n👉Dù biết rằng nạp quá nhiều calories sau những bữa nướng, lẩu vào buổi tối, nó làm thân hình bạn càng thêm phì nhiêu, nhưng cũng không thể bỏ qua những bữa tiệc, những buổi liên hoan tụ tập công ty, bạn bè được.\r\n\r\n👉Vậy sau những bữa ăn quá thừa calor đó bạn làm thế nào để vẫn duy trì vóng dáng cân đối đó, những đồ ăn luôn hấp dẫn nhưng nó lại quá nhiều đạm và chất béo, những chất béo đó khi vào cơ thể nó sẽ tích tụ, lâu ngày thì càng khó giảm, bạn có thể chọn giải pháp đi tập thể dục, tập gym, hay giảm ăn nhưng không đảm bảo sức khỏe cho công việc hàng ngày.\r\n👉Nên những người cơ thể hấp thụ tốt, mà lại lười vận động…. các nhà nghiên cứu của Graphico của Nhật đã nghiên cứu và đưa ra thị trường Enzym dâu tây trắng giúp thanh lọc cơ thể, giảm cân, phá hủy các khối mỡ thừa, Enzym dâu tây trắng giúp thúc đẩy quá trình tiêu hóa mạnh, đào thải các chất mỡ thừa ra khỏi cơ thể, nhờ enzym dâu tây trắng mà bạn hãy quên đi những chế độ ăn khắc nghiệt và những bài tập thể dục nặng, mang lại cho bạn vóc dáng cân bằng và sức khỏe.\r\n👌👌Thành phần trong Enzyme giảm cân ban đêm của Nhật\r\n+ Dâu tây trắng, tinh bột, nghệ tươi, bột lô hội Nam Phi, râu ngô, ngũ cốc, gừng đen, xả chanh, macca hữu cơ, súp lơ, cây trúc quỳ, cỏ râu mèo, gelatin, silicon dioxide, bột hến, arginine….\r\nCách sử dụng enzyme giảm cân ban đêm như sau:30 viên 15 ngày\r\n* Ngày sử dụng 2 viên trước khi đi ngủ\r\n* Nên uống với nước ấm để đạt hiệu quả tốt nhất', 'thuốc giảm cân ban đêm', 0, '2019-03-30 23:20:19', '2019-05-26 11:43:07'),
(56, 1, 'Honey Butter Almond 250 g', '250 g', 'bịch', 350000, 320000, 1058, 0, 'honey_butter_almond.jpg', 17, 0, 'ハニーバターアーモンド 250g', 'hạt hạnh nhân', 0, '2019-03-31 00:14:15', '2019-05-02 08:25:46'),
(57, 1, 'Caramel Almond & Pretzel 210 g', '210 g', 'bịch', 350000, 320000, 1058, 1, 'caramel_almond_pretzel.jpg', 17, 0, 'アーモンド　キャラメルアーモンド ＆ プレッツェル　ハニーバターアーモンド系列　\r\nCARAMEL ALMOND&PRETZEL/ Besmiが販売/ゆうパケット便', 'hạt hạnh nhân', 0, '2019-03-31 00:38:17', '2019-05-02 07:57:59'),
(58, 1, 'Honey Butter MixNut 220 g', '220 g', 'bịch', 350000, 320000, 1058, 2, 'honey_butter_mixnut.jpg', 17, 0, 'ハニーバターミックスナッツ/220g\r\nHONEY BUTTER MIXNUT', 'hạt hạnh nhân', 0, '2019-03-31 00:41:41', '2019-05-02 08:26:01'),
(59, 1, 'DHC Soy Isoflavones Absorption Type 20 days (40 tablets)', '40 viên', 'bịch', 290000, 230000, 753, 2, 'dhc_soy_isoflavones_absorption_type.jpg', 10, 9, 'DHC（ディーエイチシー） 20日大豆イソフラボン吸収型（40粒）〔栄養補助食品〕\r\n🍀🍀🍀🍀🍀Viên uống mầm đậu nành DHC:20 ngày 40 viên\r\n👉Tinh chất mầm đậu nành DHC bổ sung hoạt chất insoflavone được chiết xuất từ đậu nành, được xem là một trong những thành phần rất quan trọng làm giảm hoạt động của estrogen nội sinh ở phụ nữ, giảm nguy cơ ung thư tử cung và ung thư vú.\r\n👉Ở nam giới Hormone Androgen, Testosterol quyết định vẻ nam tính, cơ bắp săn chắc, thì sự mềm mại ở nữ giới đó chính là Estrogen. Tuy nhiên sau tuổi 30 khả năng cơ thể tự sản sinh Estrogen suy giảm dần, cơ thể bắt đầu có những dấu hiệu của quá trình lão hóa. Da xuất hiện nếp nhăn, giảm độ đàn hồi, chức năng sinh lý suy giảm, da tóc khô, khô âm đạo khiến nhiều chị em mất tự tin. Không những thế hiện nay nhiều phụ nữ trẻ thiếu hụt hormone estrogen cũng gây vấn đề suy giảm khả năng sinh lý, ngực nhỏ, da nhiều mụn trứng cá…\r\nTinh chất mầm đậu nành DHC có thể được xem là viên thần dược cho sức khoẻ và sắc đẹp của phụ nữ, bởi vì trong viên thuốc có chứa hoạt chất insoflavone được chiết xuất từ đậu nành, được xem là một trong những thành phần rất quan trọng làm giảm hoạt động của estrogen nội sinh ở phụ nữ, giảm nguy cơ ung thư tử cung và ung thư vú .\r\n\r\n🍀🍀🍀Công dụng viên uống mầm đậu nành DHC:\r\nTăng dịch tiết âm đạo,điều hòa kinh nguyệt, chống suy thoái chức năng buồng trứng, làm chậm quá trình lão hóa, giảm nám, giúp da bóng mịn và hồng hào.\r\nCải thiện nhiều triệu chứng tiền mãn kinh như: mất ngủ, đau đầu, giảm trí nhớ, loãng xương, người mệt mỏi, đau xương khớp, ra mồ hôi trộm.\r\n🍀🍀🍀Hướng dẫn sử dụng:Thiên về vóc dáng', 'viên mầm đậu nành DHC 20 ngày', 0, '2019-03-31 00:49:46', '2019-05-02 08:16:52'),
(60, 1, 'DHC Soy Isoflavones 20 days (40 tablets)', '40 viên', 'bịch', 290000, 250000, 0, 5, 'dhc_soy_isoflavones.jpg', 10, 9, '大豆イソフラボン　20日分（40粒）', NULL, 1, '2019-03-31 01:03:07', '2019-05-01 02:25:24'),
(61, 1, 'DHC Placenta 20 days (60 tablets)', '60 viên', 'bịch', 310000, 250000, 753, 5, 'dhc_placenta.jpg', 10, 9, 'DHC（ディーエイチシー） プラセンタ 20日分（60粒）〔栄養補助食品〕\r\n🐑🐑🐑🐑🐑Viên uống DHC nhau thai cừu 3600mg: 60 viên dùng trong 20 ngày\r\nViên uống DHC chứa thành phần Nhau thai cừu 3600mg,ngoài ra sản phẩm còn bổ sung các thành phần Vitamin B2 cùng Axit Amin, Carbohydrate, Enzyme, thành phần dầu Olive, thành phần sáp ong và các khoáng chất cần thiết giúp nuôi dưỡng và bổ sung sâu từ các tế bào bên trong cơ thể, từ đó giúp cơ thể luôn khỏe mạnh, giúp phục hồi nét thanh xuân và đánh bật dấu hiệu của tuổi tác.\r\n🐑🐑🐑Những công dụng:\r\n👉🐑Nhật Bản là tinh chất nuôi dưỡng vẻ đẹp của chị em phụ nữ từ sâu bên trong, đặt biệt là với phụ nữ độ tuổi mãn kinh giúp làn da trở nên mịn màng, những đốm nâu được làm mờ và ngăn cản các tác nhân hình thành nếp nhăn, tàng nhang hiệu quả.\r\n👉🐑Không những thế, sản phẩm viên vitamin DHC Nhật Bản này còn tốt cho sinh lý nữ, giúp phòng chống các bệnh về sinh dục hiệu quả.', 'viên nhau thai cừu DHC 20 ngày', 0, '2019-03-31 01:49:44', '2019-05-02 08:16:17'),
(62, 1, '232 Nighttime Diet Enzyme Premium (120 tablets) (blue)', '120 viên', 'bịch', 570000, 450000, 1500, 5, 'iSDG_diet_night_232.jpg', 9, 11, 'giảm cân\r\n232種の酵素シリーズ　夜間Diet酵素プレミアム (120粒) ', 'giảm cân 232 loại', 0, '2019-03-31 02:16:51', '2019-05-02 07:50:59'),
(63, 1, '232 Refreshing Enzyme Premium (120 tablets) (white)', '120 viên', 'bịch', 570000, 450000, 1500, 5, 'iSDG_refreshing_232.jpg', 9, 11, 'giảm cân\r\n232爽快酵素プレミアム（120粒）', 'giảm cân 232 loại', 0, '2019-03-31 02:24:40', '2019-05-02 07:51:07'),
(64, 1, '232 Beauty Enzyme (120 tablets) (pink)', '120 viên', 'bịch', 570000, 450000, 1500, 0, 'iSDG_beauty_232.jpg', 9, 11, 'giảm cân\r\n232種の酵素シリーズ　美妃酵素（ビューティーこうそ）＋真珠＆ツバメの巣　(120粒) ［美容］', 'giảm cân 232 loại', 0, '2019-03-31 02:30:24', '2019-05-02 07:50:12'),
(65, 1, 'Vaseline lip balm rosy lips 7g', '7 g', 'hủ', 140000, 120000, 0, 0, '2019-04-07_234730.png', 7, 23, 'lip balm\r\nrosy lips\r\nfor soft, pink lips', 'vaseline', 0, '2019-04-05 02:17:32', '2019-05-02 23:53:43'),
(66, 1, 'Vaseline lip therapy cocoa butter 7g', '7 g', 'hủ', 140000, 120000, 0, 0, 'Vaseline_lip_therapy_cocoa_butter.jpg', 7, 23, 'lip therapy\r\ncocoa butter\r\nfor soft, glowing lips', 'vaseline', 0, '2019-04-05 02:22:01', '2019-05-02 23:53:51'),
(67, 1, 'Vaseline lip therapy creme brulee 7g', '7 g', 'hủ', 140000, 120000, 0, 1, 'Vaseline_lip_therapy_creme_brulee_7g.JPG', 7, 23, 'lip therapy\r\ncreme brulee\r\nfor deliciously kissable lips', 'vaseline', 0, '2019-04-05 02:24:42', '2019-05-02 23:54:12'),
(68, 1, 'Okinawan Fucoidan 180 cap', '180 viên', 'hủ', 1750000, 1650000, 0, 1, 'Okinawan_Fucoidan_180_cap.jpg', 10, 24, 'Okinawa Fucoidan (Kanehide Bio) by Okinawa Fucoidan Extract 180 Cap\r\n100% Okinawan Fucoidan!\r\nNo Additives. Highly-Concentrated Fucoidan Extract Capsules.\r\n42000mg fucoidan per container (53.1g)\r\nServings per container : 53.1g (295mg×180capsules)', 'thuốc phòng và đìu trị ung thư', 0, '2019-04-05 02:30:32', '2019-05-05 18:58:23'),
(69, 1, 'Charcoal Diet byKuro 15 days', '30 viên', 'bịch', 490000, 410000, 1450, 0, 'Charcoal_Diet_byKuro_15.jpg', 9, 25, '15日分（30粒）1,600円＋税\r\n【原材料】\r\n伊那赤松妙炭、ヤシ殻活性炭、デキストリン、イソマルトオリゴ糖粉あめ、植物性乳酸菌（殺菌）末／HPMC、ステアリン酸カルシウム\r\n【お召し上がり方】\r\n1日2粒を目安に、水またはぬるま湯でお召し上がりください。', 'giảm cân than hoạt tính', 0, '2019-04-05 02:37:55', '2019-05-02 07:58:19'),
(70, 1, '生葉口内塗薬 20g ', '20 g', 'tuýp', 310000, 260000, 857, 0, 'ShohYoh_口内塗薬_20g.jpg', 10, 0, 'Sung nuou rang\r\nSưng nướu răng\r\n\r\n【第3類医薬品】 生葉口内塗薬（20g）\r\n\r\n生葉（しょうよう）口内塗薬\r\n歯ぐきの出血・腫れ・うみ・痛み・むずがゆさ、口臭など歯肉炎・歯槽膿漏における諸症状、口内炎に優れた効きめがあります\r\n高粘着性軟膏タイプなので、4つの有効成分が歯周ポケット内に長く留まって効果的に作用し、優れた効きめを発揮します\r\n歯ぐき全体にマッサージしながら塗り込むと効果的です\r\n歯ぐきにスーッとしみ込むような爽やかな使用感です', 'gel trị sưng nướu răng', 0, '2019-04-05 03:10:14', '2019-05-02 23:56:19'),
(71, 1, 'Muhi Baby Cream 15g', '15 g', 'tuýt', 235000, 195000, 714, 0, 'Muhi_Baby_Cream_15g.jpg', 16, 26, '【第3類医薬品】お肌にしみない ムヒ・ベビー 15g クリーム \r\nsức côn trùng cắn\r\nsuc con trung can', 'thuốc côn trùng cắn', 0, '2019-04-05 03:22:45', '2019-05-02 12:06:52'),
(72, 1, 'SK-II R.N.A.POWER Radical New Age Essence 30ml', '30 ml', '', 3100000, 2900000, 13500, 0, 'SK-II_R.N.A.POWER_Radical_New_Age_Essence_30ml.jpg', 7, 27, 'https://www.sk-ii.com.sg/product/serum/rna-power-radical-new-age-essence\r\n', 'tinh chất chống lão hoá', 0, '2019-04-05 11:44:50', '2019-05-02 23:43:31'),
(73, 1, 'SK-II R.N.A.POWER Radical New Age Essence 50ml', '50 ml', '', 4150000, 4000000, 0, 0, 'SK-II_R.N.A.POWER_Radical_New_Age_Essence_50ml.jpg', 7, 27, 'https://www.sk-ii.com.sg/product/serum/rna-power-radical-new-age-essence\r\n', 'tinh chất chống lão hoá', 0, '2019-04-05 11:52:57', '2019-05-02 23:43:44'),
(74, 1, 'SK-II Genoptics AURA Essence 30ml', '30 ml', '', 3900000, 3750000, 0, 0, 'SK-II_Genoptics_AURA_Essence_30ml.jpg', 7, 27, 'https://www.sk-ii.com.sg/product/serum/genoptics-aura-essence', 'tinh chất sáng da', 0, '2019-04-05 12:09:15', '2019-05-02 12:16:21'),
(75, 1, 'SK-II Genoptics AURA Essence 50ml', '50 ml', '', 5500000, 5350000, 0, 0, 'SK-II_Genoptics_AURA_Essence_50ml.jpg', 7, 27, 'https://www.sk-ii.com.sg/product/serum/genoptics-aura-essence\r\n', 'tinh chất sáng da', 0, '2019-04-05 12:10:48', '2019-05-02 12:16:41'),
(76, 1, 'SK-II R.N.A.Power Radical New Age 50g', '50 g', '', 2900000, 2750000, 12420, 0, 'SK-II_R.N.A.Power_Radical_New_Age_50g.jpg', 7, 27, 'https://www.sk-ii.com.sg/product/moisturiser/rna-power-radical-new-age\r\nkem chống lão hoá', 'kem chống lão hoá', 0, '2019-04-05 12:15:03', '2019-05-02 23:43:03'),
(77, 1, 'SK-II R.N.A.Power Radical New Age 80g', '80 g', '', 4150000, 4000000, 17172, 0, 'SK-II_R.N.A.Power_Radical_New_Age_80g.jpg', 7, 27, 'https://www.sk-ii.com.sg/product/moisturiser/rna-power-radical-new-age\r\nkem chống lão hoá', 'kem chống lão hoá', 0, '2019-04-05 12:29:39', '2019-05-02 23:43:18'),
(78, 1, 'SK-II Genoptics Spot Esence Serum 30ml', '30 ml', '', 2670000, 2520000, 0, 0, 'SK-II_Genoptics_Spot_Esence_Serum_30ml.webp', 7, 27, 'https://www.sk-ii.com/beauty-essence/radiant-skin-/sk-ii-genoptics-spot-essence/00730870307915.html\r\nserum trị nám', 'tinh chất giảm thâm nám', 0, '2019-04-05 12:32:32', '2019-05-05 03:10:38'),
(79, 1, 'SK-II Genoptics Spot Esence Serum 50ml', '50 ml', '', 3650000, 3500000, 0, 0, 'SK-II_Genoptics_Spot_Esence_Serum_50ml.jpg', 7, 27, 'https://www.sk-ii.com/beauty-essence/radiant-skin-/sk-ii-genoptics-spot-essence/00730870307915.html\r\nserum trị nám', 'tinh chất giảm thâm nám', 0, '2019-04-05 12:34:15', '2019-05-05 03:10:48'),
(80, 1, 'SK-II Facial Treatment Essence 75ml', '75 ml', '', 1650000, 1500000, 6426, 0, 'SK-II_Facial_Treatment_Essence_75ml.jpg', 7, 27, 'https://www.sk-ii.com/women/super-premium-skin-care/facial-treatment-essence/sk-ii-facial-treatment-essence/SK2-HR-FT-ESS.html?navid=search#q=Facial%2BTreatment%2BEssence%2B&start=1\r\nNước thần', 'tinh chất dưỡng da', 0, '2019-04-05 12:36:51', '2019-05-02 12:14:53'),
(81, 1, 'SK-II Facial Treatment Essence 160ml', '160 ml', '', 3000000, 2850000, 0, 0, 'SK-II_Facial_Treatment_Essence_160ml.jpg', 7, 27, 'https://www.sk-ii.com/women/super-premium-skin-care/facial-treatment-essence/sk-ii-facial-treatment-essence/SK2-HR-FT-ESS.html?navid=search#q=Facial%2BTreatment%2BEssence%2B&start=1\r\nNước thần', 'tinh chất dưỡng da', 0, '2019-04-05 12:39:07', '2019-05-02 12:14:19'),
(82, 1, 'SK-II Facial Treatment Essence 230ml', '230 ml', '', 3750000, 3600000, 16632, 0, 'SK-II_Facial_Treatment_Essence_230ml.jpg', 7, 27, 'https://www.sk-ii.com/women/super-premium-skin-care/facial-treatment-essence/sk-ii-facial-treatment-essence/SK2-HR-FT-ESS.html?navid=search#q=Facial%2BTreatment%2BEssence%2B&start=1\r\nNước thần', 'tinh chất dưỡng da', 0, '2019-04-05 12:39:53', '2019-05-26 19:18:10'),
(83, 1, 'SK-II Facial Treatment Essence 330ml', '330 ml', '', 0, 0, 0, 0, 'SK-II_Facial_Treatment_Essence_330ml.jpg', 7, 27, 'https://www.sk-ii.com/women/super-premium-skin-care/facial-treatment-essence/sk-ii-facial-treatment-essence/SK2-HR-FT-ESS.html#start=1\r\nNước thần', 'tinh chất dưỡng da', 0, '2019-04-05 15:14:19', '2019-05-02 12:14:41'),
(84, 1, 'Fino Premium Touch Penetration Beauty Liquid Hair Mask 230g', '230g', '', 320000, 270000, 645, 5, 'shiseido-fino-230.jpg', 20, 7, '', 'kem ủ tóc shiseido', 0, '2019-04-06 20:00:57', '2019-05-02 08:22:27'),
(85, 1, 'Super Lustrus Lipstick 120', '', '', 450000, 0, 0, 0, '120-SL-lip-w420-1-2-420x625.jpg', 18, 33, 'レブロン スーパー ラストラス リップスティック', NULL, 1, '2019-04-06 20:41:08', '2019-05-01 18:19:15'),
(86, 1, 'Botanical Special Winter Set', '', 'cặp', 1050000, 900000, 0, 0, 'botanical_winter_set.jpg', 7, 29, 'Shampoo hiiragi & white rose\r\nTreatment hiiragi & white jasmine', 'dầu gội và xã botanist', 0, '2019-04-07 23:28:38', '2019-05-02 07:56:16'),
(87, 1, 'Vaseline lip therapy original 7g', '7 g', 'hủ', 140000, 120000, 0, 0, 'vaseline_lip_original.jpg', 7, 23, 'lip therapy\r\nfor smooth, soft lips', 'vaseline', 0, '2019-04-08 00:58:57', '2019-05-02 23:54:25'),
(88, 1, 'Nivea Rich Care & Color Lip, Smoky Rose', '', '', 135000, 120000, 0, 0, 'nivea_rich_color_smoky_rose.jpg', 18, 30, '', NULL, 1, '2019-04-08 01:15:07', '2019-05-01 17:00:45'),
(89, 1, 'Kao Nivea Natural Color Lip Bright Up, Cherry Red SPF20/PA++', '', '', 180000, 140000, 0, 0, 'Kao_Nivea_Natural_Color_Lip_Bright_Up_Cherry_Red_SPF20_PA++.jpg', 18, 30, '', 'son dưỡng nivea', 0, '2019-04-08 01:20:32', '2019-05-02 08:27:36'),
(90, 1, 'NIVEA Flavor Lip Delicious Drop 3.5g (Peach Fragrance)', '', '', 105000, 95000, 0, 0, 'NIVEA_Flavor_Lip_Delicious_Drop_3.5g_Peach_Fragrance.jpg', 18, 30, '', NULL, 1, '2019-04-08 01:25:19', '2019-05-01 16:59:54'),
(91, 1, 'Mentholatum Lip Fondue, Coral Pink', '', '', 120000, 80000, 0, 0, 'Mentholatum_Lip_Fondue_Coral_Pink.jpg', 18, 31, '', 'son dưỡng có màu', 0, '2019-04-08 01:29:09', '2019-05-02 08:31:20'),
(92, 1, 'Mentholatum Lip Baby Fruits, White Peach Fragrance', '', '', 120000, 80000, 0, 0, 'Mentholatum_Lip_Baby_Fruits_White_Peach_Fragrance.jpg', 18, 31, '', 'son dưỡng có màu', 0, '2019-04-08 01:36:04', '2019-05-02 08:31:09'),
(93, 1, 'Santa Marche Deep Cleansing, Green Tea, 400mL', '400 ml', '', 500000, 450000, 0, 0, 'Santa_Marche_Deep_Cleansing_Green_Tea_400mL.jpg', 7, 0, '', NULL, 1, '2019-04-08 01:39:37', '2019-05-01 17:44:47'),
(94, 1, 'Kose Mask Prevent Dry Skin', '50 miếng', 'bịch', 500000, 450000, 0, 0, 'kose_mask_red.jpg', 24, 18, 'クリアターン 乾燥小じわ対策\r\n肌ふっくらマスク 50枚入\r\nKose clear turn dry fine wrinkles measures skin plump mask 50 pieces of packs\r\nngăn ngừa khô da, nếp nhăng ..', 'mặt na kose', 0, '2019-04-08 01:49:32', '2019-05-02 08:27:54'),
(95, 1, 'Kose Mask Prevent Stain', '50 miếng', 'bịch', 500000, 450000, 0, 0, 'kose_mask_white.jpg', 24, 18, 'クリアターン シミ・乾燥小じわ対策 薬用美白 肌ホワイト マスク 50枚入 \r\nngăn ngừa nám', 'mặt na kose', 0, '2019-04-08 11:39:18', '2019-05-02 08:28:06'),
(96, 1, 'en Natural Beauty Berry Smoothie 170g', '170 g', '', 650000, 500000, 0, 0, 'en_Natural_Beauty_Berry_Smoothie.jpg', 8, 0, 'エンナチュラル ビューティベリー スムージー(170g) ', NULL, 1, '2019-04-08 12:18:03', '2019-05-01 02:38:06'),
(97, 1, 'BVLGARI EDT 100mL', '100 ml', '', 1300000, 1100000, 0, 0, 'blv_100ml.jpg', 19, 32, 'BVLGARI ブルガリ ブループールオム EDT/100mL ', '', 1, '2019-04-08 12:23:07', '2019-05-02 07:56:38'),
(98, 1, 'Valentino for Women - Eau de Parfum 80 ml', '80 ml', '', 1200000, 1000000, 0, 0, 'valentino_rose.jpg', 19, 0, '', NULL, 1, '2019-04-08 12:41:03', '2019-05-01 18:24:40'),
(99, 1, 'Botanical Special Spring Set', '', 'cặp', 1050000, 900000, 0, 0, 'botanist_sarkura_set.jpg', 7, 29, 'Shampoo sakura & peach rose\r\nTreatment sakura & white strawberry', 'dầu gội và xã botanist', 0, '2019-04-08 14:30:46', '2019-05-02 07:56:04'),
(100, 1, 'Calbee Fruit granola 800g', '800 g', '', 390000, 350000, 0, 0, 'Calbee_Fruit_granola_800g.jpg', 17, 51, 'ngu coc', 'ngủ cốc calbee', 0, '2019-04-10 02:51:13', '2019-05-02 07:56:54'),
(101, 1, 'Revlon Super Lustrous Lipstick', '', '', 450000, 390000, 0, 0, 'revsuperlustrouslipstick_10.jpg', 18, 33, '', 'son revlon', 0, '2019-04-10 03:17:40', '2019-05-02 12:11:36'),
(102, 1, 'Chifure Sun Veil Cream Waterproof SPF25 PA++ 50g', '50g', '', 350000, 300000, 0, 0, 'chifure_sun_veil_cream_waterproof_SPF25_PA++.jpg', 14, 0, 'ちふれ化粧品 UV サン ベール クリーム（WP） ５０Ｇ\r\nKem chong nang ', 'kem chống nắng', 0, '2019-04-10 04:06:02', '2019-05-02 07:59:17'),
(103, 1, 'Giày Nike', '', '', 0, 0, 0, 0, 'nike.png', 1, 41, '', NULL, 0, '2019-04-10 19:35:19', '2019-04-12 17:38:24'),
(104, 1, 'Adidas Shoes', '', '', 0, 0, 5940, 0, 'adidas.png', 1, 1, '', 'Giày Adidas', 0, '2019-04-10 19:38:17', '2019-06-03 11:31:43'),
(105, 1, 'Botanical Refresh Shampoo - Moist (Limited Edition)', '', '', 0, 0, 0, 0, 'botanist_refresh.png', 7, 29, '', 'dầu gội botanist', 1, '2019-04-10 20:33:23', '2019-05-02 07:55:45'),
(106, 1, 'Gel Pepee', '', '', 0, 0, 1393, 0, 'gel-pepee.jpg', 11, 42, '', NULL, 1, '2019-04-10 22:07:54', '2019-05-01 18:45:46'),
(107, 1, 'Sesame Oil', '', '', 0, 0, 0, 0, 'sesame_oil.jpg', 17, 0, 'dau me', NULL, 1, '2019-04-11 00:04:21', '2019-05-01 17:56:45'),
(108, 1, 'Wakado Cookie 9', '', '', 80000, 0, 0, 0, 'wakado_yamaimo_cookie.jpg', 32, 35, '', '', 1, '2019-04-11 00:19:38', '2019-05-26 13:07:44'),
(109, 1, 'Muhi Seki Dome 120ml', '120 ml', '', 320000, 260000, 980, 3, 'apanman_sekidome.jpg', 10, 26, '【第（2）類医薬品】 ムヒのこどもせきどめシロップSa（イチゴ味） 120mL\r\nthuoc ho tre em', 'thuốc ho cho trẻ em', 0, '2019-04-11 00:47:49', '2019-06-03 11:35:22'),
(110, 1, 'Muhi Rhinitis Syrup for nose 120ml', '120 ml', '', 300000, 240000, 1080, 2, 'muhi_nose.jpg', 10, 26, '【第（2）類医薬品】 ムヒのこども鼻炎シロップS（120mL）〔鼻炎薬〕\r\nsiro sổ mũi \r\nsiro so mui', 'thuốc sổ mũi cho trẻ em', 0, '2019-04-11 00:48:24', '2019-06-03 11:35:04'),
(111, 1, 'Muhi  Kaze Ichigo Syrup', '', '', 340000, 290000, 0, 0, 'muhi_kaze.jpg', 10, 26, '【第（2）類医薬品】 ムヒのこどもかぜシロップイチゴ味（Sa）（120mL）〔風邪薬〕\r\nsiro trị cam vi dau', 'thuốc cảm vị dâu cho trẻ', 0, '2019-04-11 00:57:06', '2019-05-02 12:06:07'),
(112, 1, 'Muhi  Kaze Peach Syrup', '', '', 340000, 290000, 0, 0, 'muhi_kaze_peach.jpg', 10, 26, '【第（2）類医薬品】 ムヒのこどもかぜシロップイチゴ味（Sa）（120mL）〔風邪薬〕\r\nsiro trị cam vi dao', 'thuốc cảm vị đào cho trẻ', 0, '2019-04-11 01:03:34', '2019-05-02 12:06:35'),
(113, 1, 'Fine Omega EPA + DHA Krill Oil 150 tablets', '150 viên', '', 680000, 600000, 0, 0, 'omega.jpg', 10, 48, 'ファイン オメガEPA+DHAクリルオイル 150粒', 'omega có DHA', 0, '2019-04-11 02:14:32', '2019-05-02 08:20:24'),
(114, 1, 'DHC Kokusai Perfect Vegetables 60 days', '60 days', 'bịch', 380000, 340000, 1215, 6, 'dhc_kokusai_perfect_yasai.jpg', 10, 9, 'DHC 国産パーフェクト野菜プレミアム 60日分 240粒 \r\n🥬🥬🥬🥬🥬Viên uống dhc rau củ 60 ngày 240 viên:\r\n🥬Viên rau củ quả DHC Nhật Bản bổ sung 32 loại rau xanh, củ quả cung cấp nhiều dưỡng chất cơ bản cần thiết cho cơ thể, dành cho những bạn bận rộn không có thời gian ăn uống đủ chất, hay những bạn ghét và lười ăn rau, tránh được nhiều căn bệnh như nóng người, nổi mụn, táo bón…\r\n🥬Viên rau củ DHC cùng với bột lá lúa non grass barley và bột rau xanh Orihiro của Nhật nằm trong top sản phẩm bổ sung chất xơ bán chạy nhất ở Nhật năm 2018 vừa rồi: thành phần giàu chất xơ, axit amin, khoáng cho người ăn uống thiếu chất, tạo bón, nóng trong cơ thể.\r\n🥬Viên rau củ quả DHC là sản phẩm bổ sung chất xơ dạng viên, được sản xuất từ 32 loại rau củ quả cung cấp dinh dưỡng cơ bản cần thiết cho cơ thể. Cần thiết cho những người bận rộn hoặc những người không thích ăn rau xanh, củ quả hàng ngày.\r\nSản phẩm thích hợp với mọi người: người già, trẻ nhỏ ăn uống kém, người lớn. người đang trong thời kỳ chữa bệnh mãn tính.\r\n🥬🥬🥬Viên rau củ quả DHC Nhật Bản gồm những loại rau gì?\r\nViên rau củ quả Nhật Bản DHC với đầy đủ các thành phần dưỡng chất từ : bột lúa mạch,cải xoăn , một số loại rau màu xanh lá cây: lúa mạch non, cải xoăn, cà rốt, cà chua, khoai lang, hành tây, bí ngô, ngô ngọt , khoai lang tím, bắp cải, tía tô đỏ, rau bina, lá củ cải, củ sen, nozawana, choy bok, cải thảo, hành lá, tỏi, gừng, rau mùi tây, cây ngưu bàng, bông cải xanh, cần tây, lá mai, mướp đắng, cây ngải, cỏ linh lăng, đậu xanh, măng tây khí, tía tô màu xanh.\r\n\r\n🥬🥬🥬Thành phần viên uống dhc rau củ Nhật Bản gồm:\r\nCà rốt, cà chua, bí ngô, bắp, khoai lang, bắp cải, măng tây; lá củ cải, củ sen và lúa mạch, cải xoăn, hành tây, bí ngô, ngô ngọt, khoai lang tím; tía tô đỏ, rau bina, lá củ cải, hoa sen gốc; Nozawana, bok-choy, cải bắp Trung Quốc; bột rau, hành lá, tỏi, gừng, rau mùi tây, cây ngưu bàng, bông cải xanh; cần tây, lá, mướp đắng, ngải cứu, cỏ linh lăng, đậu xanh, măng tây, tía tô…\r\n\r\n🥬🥬🥬Viên rau củ DHC phù hợp với những ai?\r\n🥬Người bận rộn khó bổ sung rau xanh vào bữa ăn hàng ngày\r\n🥬Người hay bị táo bón, nổi mụn\r\n🥬Người ăn kiêng, người chỉ ăn được một hoặc 1 vài loại rau\r\n🥬Người lười hoặc ghét ăn rau\r\n\r\n🥬🥬🥬Cách sử dụng viên rau củ quả DHC:\r\nMỗi ngày 4 viên, có thể chia đều ra uống hay uống cùng 1 lúc trong ngày sau khi ăn\r\n\r\nVien uong rau cu', 'vien rau củ DHC 60 ngày', 0, '2019-04-11 12:12:18', '2019-05-02 08:14:40'),
(115, 1, 'The Collagen Ex 120 cap', '120 viên', '', 1225000, 1175000, 4549, 0, 'shiseido-collagen-ex.jpg', 7, 7, 'TheCollagen（ザ・コラーゲン） EX タブレット 120粒', '', 0, '2019-04-11 12:50:28', '2019-05-12 01:32:54'),
(116, 1, 'Chlorella Royal Dex 1550 cap', '1550 viên', '', 850000, 780000, 2742, 0, 'chlorella_royal_dx_1550.jpg', 8, 0, 'クロレラロイヤルDX 51-103日分 1550粒\r\ntảo lục hoàng gia\r\ntao luc hoang gia', 'tảo hoàng gia', 0, '2019-04-11 12:58:13', '2019-05-02 08:01:06'),
(117, 1, 'Mama Ramune 200 cap', '200 viên', '', 470000, 410000, 1598, 2, 'mama-ramune-200.jpg', 8, 40, 'ﾏﾏﾗﾑﾈ　200粒\r\nPhân phối L-Arginine, canxi và vitamin A C E\r\nTan chảy trong miệng, có thể uống không cần nước\r\nVị sữa dâu, bất cứ trẻ e nào cũng dễ dàng ăn được\r\n\r\nKẹo biếng ăn cho trẻ\r\nKeo bieng an cho tre', 'kẹo biếng ăn vitamin,canxi cho trẻ', 0, '2019-04-11 13:03:39', '2019-05-02 08:29:10'),
(118, 1, 'Mama Jelly 200 cap', '200 viên', '', 570000, 510000, 1216, 2, 'mama-jelly.jpg', 8, 40, 'ﾏﾏ青汁ジェリー　200粒\r\nVị trái cây dạng thạch, bổ sung vitamin A C E, enzim, Lactoferrin\r\n\r\nKẹo biếng ăn cho trẻ\r\nKeo bieng an cho tre', 'jelly bổ sung vitamin cho trẻ nhỏ', 0, '2019-04-11 13:06:04', '2019-05-02 08:28:49'),
(119, 1, 'Eye Love Mama Ramune 200 cap', '200 viên', '', 470000, 420000, 1598, 1, 'eyelove-mama-ramune.jpg', 8, 40, 'ｱｲﾗﾌﾞﾏﾏﾗﾑﾈ　200粒\r\nchiết xuất từ blue berry giàu Anthocyanin, tăng hàm lượng vitamin A\r\nPhân phối Arginine, canxi và vitamin A C E\r\nbằng sự kết hợp vị sữa + vị blue berry ức chế vị chua, nên trẻ nhỏ cũng dễ ăn\r\n\r\nKẹo biếng ăn cho trẻ\r\nKeo bieng an cho tre', 'kẹo biếng ăn bổ sung sáng mắt tím', 0, '2019-04-11 13:08:40', '2019-05-02 08:19:51'),
(120, 1, 'Canxi Gumi BCAA (yogurt) 180 cap', '180 viên', '', 1065000, 1015000, 4400, 0, 'canxi-gumi.jpg', 8, 0, 'カルシウムグミBCAA (ヨーグルト味) 180粒入 (60日分)', 'kẹo gumi bổ sung canxi cho trẻ', 0, '2019-04-11 13:14:18', '2019-05-02 07:57:41'),
(121, 1, 'Everish Ocha Scrub Face Wash 135g', '135 g', '', 195000, 145000, 440, 0, 'everish-matcha.jpg', 21, 39, 'everish（エブリッシュ）お茶スクラブ洗顔（135g）〔洗顔フォーム〕', 'rửa mặt tẩy tế bào chết trà xanh', 0, '2019-04-11 13:25:33', '2019-05-02 08:18:50'),
(122, 1, 'Everish Charcoal Scrub Face Wash 135g', '135 g', '', 195000, 145000, 0, 0, 'everish-charcoal.jpg', 21, 39, 'everish（エブリッシュ）炭スクラブ洗顔（135g）〔洗顔フォーム〕', 'rửa mặt tẩy tế bào chết than hoạt tính', 0, '2019-04-11 13:26:36', '2019-05-02 08:18:37'),
(123, 1, 'Everish Aloe Scrub Face Wash 135g', '135 g', '', 195000, 145000, 0, 0, 'everish-aloe.jpg', 21, 39, 'everish（エブリッシュ） アロエスクラブ洗顔（135g）〔洗顔フォーム〕', 'rửa mặt tẩy tế bào chết nha đam', 0, '2019-04-11 13:30:15', '2019-05-02 08:18:26'),
(124, 1, 'Everish White Clay Scrub Face Wash 120g', '120 g', '', 195000, 145000, 0, 0, 'everish-white-clay.jpg', 21, 39, 'everish（エブリッシュ） ホワイトクレイスクラブ洗顔 （120g）〔洗顔料〕', 'rửa mặt tẩy tế bào chết đất sét trắng', 0, '2019-04-11 13:35:05', '2019-05-02 08:19:20'),
(125, 1, 'Fruit juice gummy - GrapeFruit 68g', '68 g', '', 45000, 35000, 0, 0, 'meiji_gumi_iron.jpg', 23, 36, '果汁グミ鉄分グレープフルーツ\r\nThành phần sắt 4mg\r\n- Có thể cảm nhận vị chua ngay ngất và hương vị chín ngọt của bưởi\r\n- Có thể hấp thụ hàm lượng 4mg sắt bằng 17g (tiếu cuẩn 5 viên)\r\n(Lượng thiếu hụt sắt trong ngày của phụ nữ tuổi 20: 3.9mg)\r\n- Bạn của phụ nữ tuyệt vời đem đến chu kỳ sinh hoạt tốt đầy cảm hứng\r\n- Mỗi ngày rạng ngời, bằng cách bổ sung đúng cách hàm lượng sắt có xu hướng bị thiếu.\r\n- Hãy tạo thói quen ngon đẹp, khéo léo tốt đẹp bằng cách sử dụng kẹo dẽo trái cây', 'kẹo dẻo vuông', 1, '2019-04-12 15:07:29', '2019-05-31 11:19:52'),
(126, 1, 'Fruit juice gummy - Ginger Aleup 100g', '100 g', '', 45000, 35000, 0, 0, 'meiji_gumi_gung.jpg', 23, 36, '', NULL, 1, '2019-04-12 15:09:11', '2019-05-01 02:52:04'),
(127, 1, 'Fruit juice gummy - Peach', '', '', 45000, 35000, 0, 0, 'meiji_gumi_dao.jpg', 23, 36, '', 'kẹo dẻo vuông', 1, '2019-04-12 15:55:26', '2019-05-31 11:20:00'),
(128, 1, 'Fruit juice gummy - Strawberry', '', '', 45000, 35000, 100, 1, 'meiji_gumi_dau.jpg', 23, 36, '', 'kẹo dẻo vuông', 1, '2019-04-12 15:55:55', '2019-05-31 11:20:08'),
(129, 1, 'Fruit juice gummy - Collagen', '', '', 45000, 35000, 0, 0, 'meiji_gumi_kolagen.jpg', 23, 36, '1 gói bổ sung 5000mg Collagen', 'kẹo dẻo vuông', 1, '2019-04-12 15:57:37', '2019-05-31 11:20:18'),
(130, 1, 'Fruit juice gummy - Grape', '', '', 45000, 35000, 100, 4, 'meiji_gumi_nho-den.jpg', 23, 36, '', 'kẹo dẻo vuông', 1, '2019-04-12 16:05:23', '2019-05-31 11:20:25'),
(131, 1, 'Fruit juice gummy - Apple', '', '', 45000, 35000, 95, 4, 'meiji_gumi_tao.jpg', 23, 36, 'táo', 'kẹo dẻo vuông', 1, '2019-04-12 16:25:13', '2019-05-31 11:20:33'),
(132, 1, 'Fruit juice gummy - Mikan', '', '', 45000, 35000, 100, 4, 'meiji_gumi_cam.jpg', 23, 36, '', 'kẹo dẻo vuông', 1, '2019-04-12 16:25:51', '2019-05-31 11:20:42'),
(133, 1, 'Fruit juice gummy - Colaup', '', '', 45000, 35000, 0, 0, 'meiji_gumi_colaup.jpg', 23, 36, '', NULL, 1, '2019-04-12 16:27:31', '2019-05-01 02:50:19'),
(134, 1, 'UHA Kororo - Peach', '', '', 40000, 35000, 95, 2, 'uha-kororo-gumi-dao.jpg', 23, 38, '', 'kẹo dẻo tròn', 1, '2019-04-12 16:35:06', '2019-05-31 11:20:59'),
(135, 1, 'UHA Kororo - Strawberry', '', '', 40000, 35000, 0, 2, 'uha-kororo-gumi-dau.jpg', 23, 38, 'dâu', 'kẹo dẻo tròn', 1, '2019-04-12 16:36:06', '2019-05-31 11:21:07');
INSERT INTO `products` (`id`, `user_id`, `name`, `size`, `unit`, `price`, `wholesale_price`, `purchase_price`, `quantity`, `image`, `category_id`, `brand_id`, `description`, `remarks`, `disabled`, `created`, `updated`) VALUES
(136, 1, 'UHA Kororo - Melon', '', '', 40000, 35000, 95, 3, 'uha-kororo-gumi-meron.jpg', 23, 38, 'dưa lưới', 'kẹo dẻo tròn', 1, '2019-04-12 16:36:39', '2019-05-31 11:21:15'),
(137, 1, 'Sekkisei Premium Set', '', 'bộ', 1690000, 1600000, 10000, 2, '55933670_2279366722127682_4437331979960057856_n.jpg', 7, 18, '🌹🌹🌹🌹🌹Nước hoa hồng Kose Medicated Sekkisei Lotion 200ml:\r\n🌹Dòng mỹ phẩm chăm sóc da KOSE SEKKISEI của hãng mỹ phẩm Kosé danh tiếng hàng đầu tại Nhật Bản giới thiệu sản phẩm nước hoa hồng cung cấp ẩm, làm mềm và sáng da, ngăn chặn sự hình thành hắc tố. Da sẽ được giữ ẩm và mát dịu trong suốt thời gian sử dụng, hấp thu tối đa dưỡng chất từ kem dưỡng.\r\n🌹Nước hoa hồng Kose Sekkisei Medicated Lotion kết hợp thành phần chiết xuất hơn 30 loại thảo dược tinh túy, an toàn và không gây kích ứng da, các sản phẩm trong dòng Sekkisei cung cấp đầy đủ độ ẩm, giúp ngăn chặn việc hình thành hắc tố da đồng thời xóa mờ tối đa các vết thâm nám, đốm đen, giúp làn da trắng sáng rạng rỡ.\r\n🌹Kose Sekkisei Medicated Lotion cung cấp ẩm, làm mềm và sáng da, ngăn chặn sự hình thành hắc tố. Da sẽ được giữ ẩm và mát dịu trong suốt thời gian sử dụng, hấp thu tối đa dưỡng chất từ kem dưỡng.Bạn sẽ cảm nhận ngay làn da mát dịu ngay sau khi sử dụng. Nên sử dụng Lotion với kem dưỡng để tăng cường hiệu quả tối đa.\r\n\r\n🌹🌹🌹Cách dùng nước hoa hồng Kose Medicated Sekkisei Lotion Nhật Bản:\r\nSáng & tối. Sau khi rửa sạch mặt, thấm 1 lượng nhỏ vào miếng bông, lau đều khắp mặt và cổ. Kết thúc bằng vỗ nhẹ các ngón ta vào mặt để tinh chất được thấm sâu.\r\n\r\n🌹🌹🌹🌹🌹Sữa dưỡng trắng da Kose Sekkisei Medicated 140ml:\r\nSữa dưỡng trắng da Kose Sekkisei Medicated 140ml là dòng mỹ phẩm cao cấp của thương hiệu Kose nổi tiếng hàng đầu Nhật Bản với chiết xuất từ hơn 30 loại thảo dược thiên nhiên sẽ cung cấp độ ẩm và dưỡng trắng da hiệu quả cho bạn làn da chắc khỏe, sáng mịn đầy sức sống.\r\n\r\n🌹🌹🌹Công dụng của sữa dưỡng trắng da Kose:\r\n🌹Sữa dưỡng da Kose Sekkisei Medicated làm sáng da, bảo vệ da, giảm sự sản sinh hắc tố melanin để ngăn ngừa tàn nhang, giúp da dần trắng sáng tự nhiên.\r\n🌹Cung cấp đầy đủ độ ẩm, giúp ngăn chặn việc hình thành hắc tố melanin làm sạm da đồng thời xóa mờ tối đa các vết thâm nám, đốm đen giúp làn da trắng sáng rạng rỡ và mang lại hiệu quả chăm sóc da tối ưu. \r\n🌹Có thể sử dụng như kem lót trang điểm cho nền da mượt mà và rạng rỡ hơn.\r\n🌹Sữa dưỡng da Kose dễ dàng thẩm thấu vào các tế bào sâu trong da, không làm dính khó chịu và thoải mái khi sử dụng.\r\n\r\n🌹🌹🌹Hướng dẫn sử dụng:\r\nDùng sữa dưỡng Kose vào buổi sáng, sau khi dùng nước hoa hồng, lấy 1 lượng kem vừa đủ, chấm kem vào 5 điểm trên mặt, thoa đều khắp mặt và cổ.', 'bộ hoa hồng và sữa dưỡng', 0, '2019-04-12 16:40:23', '2019-05-02 12:12:42'),
(138, 1, 'RyuKaKuSan Direct Mint 6ps', '', '', 200000, 150000, 547, 0, 'direct-mint.png', 10, 43, '', 'thuốc ho ng lớn vị bạc hà dạng bột', 0, '2019-04-13 22:37:09', '2019-05-02 12:12:02'),
(139, 1, 'RyuKaKuSan Direct Peach 6ps', '', '', 200000, 150000, 547, 0, 'direct-peach.png', 10, 43, 'đào', 'thuốc ho ng lớn vị đào dạng bột', 0, '2019-04-13 22:38:33', '2019-05-02 12:12:14'),
(140, 1, 'RyuKaKuSan Direct Mango 6cap', '6 viên', '', 210000, 160000, 547, 0, 'direct-mango.png', 10, 43, 'xoài', 'thuốc ho ng lớn vị xoài dạng bột', 0, '2019-04-13 22:39:40', '2019-05-02 12:11:51'),
(141, 1, 'Pavlon Gold A 210 cap', '210 viên', '', 390000, 340000, 1382, 0, 'pavlon-gold-A.jpg', 10, 44, '', 'thuốc cảm cho người lớn', 0, '2019-04-13 23:04:50', '2019-05-02 12:10:38'),
(142, 1, 'UHA Kororo - Grape', '', '', 40000, 35000, 95, 0, 'uha-kororo-gumi-grape.jpg', 23, 38, 'nho đỏ', 'kẹo dẻo tròn', 1, '2019-04-13 23:29:06', '2019-05-31 11:21:21'),
(143, 1, 'UHA Kororo - Muscat', '', '', 40000, 35000, 95, 0, 'uha-kororo-gumi-muscat.jpg', 23, 38, 'nho xanh', 'kẹo dẻo tròn', 1, '2019-04-13 23:29:42', '2019-05-31 11:21:28'),
(144, 1, 'Natural Honey Lip', '', '', 220000, 170000, 0, 0, 'natural-honey-lip.jpg', 18, 45, '', 'son dưỡng môi ko màu vị mật ong', 0, '2019-04-13 23:58:58', '2019-05-02 12:09:25'),
(145, 1, 'Son Kate', '', '', 370000, 310000, 0, 0, NULL, 18, 50, '', 'son KATE', 0, '2019-04-13 23:58:58', '2019-05-02 23:45:32'),
(146, 1, 'Son Revlon', '', '', 400000, 340000, 0, 0, NULL, 18, 33, '', 'son revlon', 0, '2019-04-14 00:14:48', '2019-05-02 23:46:01'),
(147, 1, 'Son Shiseido', '', '', 630000, 0, 0, 0, NULL, 18, 7, '', 'son shiseido', 0, '2019-04-14 00:16:44', '2019-05-02 23:46:14'),
(148, 1, 'Soap For Back Soap', '', '', 150000, 0, 0, 0, 'for-back-soap.jpg', 16, 49, '薬用石鹸ForBack 135g', NULL, 1, '2019-04-14 00:20:30', '2019-05-01 18:12:53'),
(149, 1, 'Son ShuUeMuRa', '', '', 550000, 0, 0, 0, 'Shu-Uemura-Rouge-Unlimited-Supreme-Matte.jpg', 18, 16, '', 'Son Shu Uemura', 0, '2019-04-14 00:51:29', '2019-05-28 18:11:22'),
(150, 1, 'Muji Loose Powder Natural 18g', '18 g', 'hộp', 410000, 350000, 1161, 0, 'muji-loose-powder-natural.jpg', 7, 46, 'ルースパウダー　大・ナチュラル　１８ｇ', 'phấn phủ muji', 0, '2019-04-14 01:38:29', '2019-05-02 12:07:38'),
(151, 1, 'Muji Peel Cotton 162 sheets', '', '', 190000, 140000, 449, 0, 'muji-coton.jpg', 7, 46, 'bong tay trang', 'bông tẩy trang muji', 0, '2019-04-14 01:38:42', '2019-05-02 12:08:20'),
(152, 1, 'Melano CC Vitamin White Mist', '', '', 280000, 220000, 767, 2, 'xit-khoang-cc-melano-cua-nhat.jpg', 7, 14, 'メラノCCミスト', 'xịt khoáng', 0, '2019-04-14 01:42:03', '2019-06-03 11:34:31'),
(153, 1, 'Qoo Jelly Drink Grape', '', '', 55000, 45000, 0, 0, 'Qoo-drin-grape.jpg', 17, 47, '', 'nước uống trái cây jelly cho trẻ', 0, '2019-04-14 01:50:55', '2019-05-26 19:39:20'),
(154, 1, 'Fine Bifizusu KIN Juhre', '', '', 350000, 290000, 987, 1, 'bifizusuko-jure.jpg', 8, 48, ' ファイン ビフィズス菌\r\nmen tieu hoa', 'men tiêu hoá cho trẻ', 0, '2019-04-14 02:01:42', '2019-05-02 08:20:11'),
(155, 1, 'Orihiro Okusai Organic Green Juice 30ps', '30 packages', '', 380000, 330000, 1335, 0, 'orihiro-kokusai-oganic-aoju.jpg', 17, 20, '', 'bột rau xanh', 0, '2019-04-14 02:08:15', '2019-05-12 01:32:54'),
(156, 1, 'Mix Fruit juice gummy', '', '', 50000, 45000, 0, 0, 'meiji-mix-gummy.jpg', 23, 36, '', NULL, 1, '2019-04-14 02:08:26', '2019-05-01 16:10:39'),
(157, 1, 'Slim Up Slim Cafe Latte Colalgen 360g', '360g', '', 550000, 450000, 0, 2, 'slimup-caef-latte-colalgen.jpg', 9, 8, 'collagen', 'bột giảm cân slim up slim', 0, '2019-04-15 11:24:33', '2019-05-02 23:44:39'),
(158, 1, 'Muhi  Children Eyedrops 15ml', '15 ml', '', 190000, 150000, 512, 0, 'muhi-eyedrops.jpg', 13, 26, '【第3類医薬品】ムヒのこども目薬 15mL', 'nhỏ mắt cho trẻ', 0, '2019-04-17 15:40:24', '2019-05-02 12:05:40'),
(159, 1, 'Chikunain 56 caps', '56 viên', '', 520000, 450000, 1665, 0, 'chikunain.jpg', 10, 37, '【第2類医薬品】チクナインb 56錠\r\nthuoc tri viem xoang', 'thuốc trị viêm xoang', 0, '2019-04-17 16:07:56', '2019-05-02 08:00:38'),
(160, 1, 'Nissin Mug Noodle 2tp', '', '', 80000, 70000, 195, 30, 'nissin-mug-noodle.jpg', 17, 53, '', 'mì gói trẻ em', 0, '2019-04-17 16:58:51', '2019-05-18 22:56:16'),
(161, 1, 'Dai Ginjo Sake Kasu Mask 33 (peach sake)', '', '', 310000, 260000, 703, 19, 'sake-kasu-face-mask.jpg', 24, 0, '大吟醸酒粕マスク　桃酒の香り（３３枚入り）', 'mặt nạ sake', 0, '2019-04-18 10:48:12', '2019-05-19 03:15:43'),
(162, 1, 'Muji Mairudo Oil Cleansing 400ml', '400 ml', '', 450000, 390000, 1071, 0, 'muji-mairudo-oil-cleansing.jpg', 7, 46, '', 'tẩy trang muji', 0, '2019-04-19 22:51:01', '2019-05-02 12:07:55'),
(163, 1, 'Son MaybeLine', '', '', 470000, 420000, 1620, 0, NULL, 18, 54, '', 'son maybeline dạng nước', 0, '2019-04-21 00:36:15', '2019-05-02 23:45:49'),
(164, 1, 'Chondroitin ZS Tablets 180 (tablets)', '180 viên', 'hủ', 1330000, 1250000, 5466, 0, 'chondroitin-zs-180.jpg', 10, 17, 'コンドロチンZS錠（180錠）', 'thuốc trị đau nhức xương khớp và trị gout', 0, '2019-04-21 12:39:03', '2019-05-02 08:02:34'),
(165, 1, 'Chondroitin ZS Tablets 108 (tablets)', '108 viên', 'hủ', 1000000, 930000, 0, 0, 'chondroitin-zs-108.jpg', 10, 17, 'コンドロチンZS錠（108錠）', 'thuốc trị đau nhức xương khớp và trị gout', 0, '2019-04-21 12:40:28', '2019-05-02 08:02:22'),
(166, 1, 'Spirulina 100% 2200 + 400 cap', '2400 viên', 'bịch', 750000, 670000, 2116, 7, 'supirurina_2200_400.jpg', 8, 0, 'スピルリナ100%　【2000粒+400粒増量】1粒200mg（約2ヵ月分）\r\nTao xoan\r\nTảo xoắn', 'tảo biển 2400 viên dạng túi', 0, '2019-04-26 14:11:37', '2019-06-02 01:11:33'),
(167, 1, 'Natto Kinaze 2000FU 60 caps', '', '60 viên', 620000, 540000, 2108, 4, 'natto-kinaze-60.jpg', 10, 36, '明治薬品 納豆キナーゼ　６０粒\r\n\r\n\r\n💊💊💊💊💊Viên Uống Nattokinase 2000FU Noguchi phòng ngừa và hỗ trợ điều trị đột quỵ: 60 viên\r\nMột sản phẩm chăm sóc sức khỏe đến từ xứ sở hoa anh đào nằm trong top những loại thuốc chống đột quỵ tốt nhất hiện nay chính là Viên uống Nattokinase 2000FU Noguchi. Sản phẩm được sản xuất từ sự kết hợp tuyệt vời giữa Công ty Dược phẩm Meiji và Viện Nghiên Cứu Y học Noguchi hàng đầu Nhật Bản.\r\n💊💊💊Thành phần của viên Nattokinase 2000FU Noguchi:\r\n💊Men bia, gelatin, dextrin, natto chiết xuất (nattokinase men), da củ hành (chứa quercetin), axit stearic Ca, chiết xuất bột tiêu đen, hạt silic oxit, (bao gồm cả một số trong những đậu nành thô).\r\n💊Thành phần dinh dưỡng trong mỗi 2 viên uống nattokinase (420 mg) : Năng lượng -1.6 kcal, Lipid 0,013 g, Protein 0,19 g, Carbohydrate 0,18 g, Natto chiết xuất (Nattokinase) 100mg (2000FU), Natri 1,25 mg, màng vỏ hành tây 40 mg, tinh chất bột tiêu đen 3mg.\r\n💊💊💊Công dụng tuyệt vời của viên uống Nattokinase 2000FU Noguchi:\r\n💊Nattokinase 2000FU Noguchi có khả năng làm tan huyết khối, điều hòa ổn định huyết áp, phòng ngừa đột quỵ một cách hiệu quả.\r\n💊Bên cạnh đó, nó còn hỗ trợ tích cực cho việc điều trị những di chứng của tai biến mạch máu não.\r\n💊Một ưu điểm nữa của Nattokinase 2000FU Noguchi đó là nó có khả năng làm tăng tuần hoàn não, cải thiện tình trạng suy giảm trí nhớ.\r\n💊Ngoài ra, viên uống Nattokinase 2000FU Noguchi còn giúp tăng cường sinh lực, ngăn ngừa sự hình thành các cục máu đông và phòng ngừa tình trạng xơ vữa động mạch hiệu quả cho người sử dụng.\r\n💊💊💊Những ai nên dùng viên uống Nattokinase 2000FU Noguchi: người bị tắc mạch máu do có cục máu đông, người béo phì, tiểu đường, mắc bệnh xơ vữa động mạch,người bị cao huyết áp, người cao tuổi,…\r\n💊💊💊Liều dùng và cách dùng viên uống Nattokinase 2000FU Noguchi:\r\n💊Dùng để dự phòng thì bạn chỉ cần uống 1 viên/ngày trước khi đi ngủ.\r\n💊Dùng để hỗ trợ điều trị: dùng 2 viên/ngày, chia làm 2 lần uống, mỗi lần 1 viên.\r\n💊Nên dùng thuốc trước bữa ăn 30 phút và sua bữa ăn 1 tiếng, không uống thuốc với nước nóng trên 40 độ vì có thể làm mất tác dụng của thuốc.\r\n💊Những trường hợp không nên dùng viên uống Nattokinase 2000FU Noguchi: người bị viêm loét nặng, người mới phẫu thuật trong vòng nửa năm, người bị chảy máu nội so, người huyết áp quá cao, người đáng dùng thuốc chống đông máu. Phụ nữ mang thai và cho con bú thì cần tham khảo ý kiến của bác sĩ trước khi dùng thuốc.\r\n💊Viên uống Nattokinase 2000FU Noguchi không phải là thuốc điều trị mà chỉ là thuốc hỗ trợ điều trị vì thế nó không có tác dụng thay thế thuốc chữa bệnh.', 'thuốc chống đột quỵ', 0, '2019-04-26 14:26:07', '2019-05-02 12:09:05'),
(168, 1, 'WHITE CONC Whitening CC Cream CII 200g', '200 g', 'bịch', 400000, 350000, 1080, 10, 'white_conc_whitening_cream_200.jpg', 16, 52, '薬用ホワイトコンク ホワイトニングCCクリーム CII 200g\r\n\r\n🍓🍓🍓🍓🍓Dưỡng thể White Con CC cream 200g:\r\nSữa dưỡng thể White Conc White CC Cream có thành phần chính là vitamin C chiết xuất từ những quả cam tự nhiên giúp dưỡng da trắng sáng an toàn và mềm mịn hiệu quả. Thành phần vitamin C còn kích thích tái tạo lại tế bào da, điều trị các tổn thương từ sâu bên trong đảm bảo da căng mịn và luôn trong trạng thái tươi trẻ.\r\n🍓🍓🍓Thành phần dưỡng thể White CC White ConC gồm:\r\nSữa dưỡng trắng White conc white cc Cream có thành phần chính là Vitamin C chiết xuất từ những quả cam giúp dưỡng trắng da toàn thân. Vitamin C còn giúp kích thích tái tạo tế bào da, điều trị các tổn thương từ sâu bên trong.\r\n🍓🍓🍓Công dụng dưỡng thể White Conc như sau:\r\n🍓Dưỡng thể CC Cream dạng chất kem lỏng nhẹ giúp nhanh chóng dưỡng da trắng sáng, mịn màng, thành phần vitamin C chính trong sữa dưỡng thể còn có tác dụng tái tạo tế bào, da căng mịn và luôn tươi trẻ.\r\n🍓Hylaluronic Acid như tấm màng bảo vệ giúp da luôn được dưỡng ẩm đầy đủ, chấm dứt tình trạng da khô nứt hay bong tróc vào những ngày khô hanh, ngăn chặn các tia UV hiệu quả.\r\n🍓Collagen trong sữa dưỡng thể là nhân tố vô cùng quan trọng để da ngày càng sáng khỏe, đẩy lùi các dấu hiệu lão hóa.\r\n🍓🍓🍓Hướng dẫn dụng dưỡng thể White Conc:\r\n🍓Cho một lượng kem vừa đủ lên lòng bàn tay, thoa đều lên những nơi vùng da bạn cần dưỡng trắng và massage nhẽ nhàng, kết hợp vỗ nhẹ để kem thấm nhanh và đều.\r\n🍓Sử dụng kết hợp với sữa tắm white conc để cho kết quả tốt nhất', 'kem dưỡng trắng da ban đêm', 0, '2019-04-26 14:50:54', '2019-05-26 12:44:38'),
(169, 1, 'Son YSL', '', '', 1200000, 1100000, 4447, 1, NULL, 18, 55, '', 'son YSL', 0, '2019-04-26 16:23:10', '2019-05-05 19:05:05'),
(170, 1, 'Ecovacs Deebot N79', '3.5 kg', '', 6300000, 5800000, 19900, 0, 'deebot-n79-1.jpg', 26, 56, 'https://youtu.be/vrPEQAA9i-Q\r\nnormal price: 6500000 / 6000000\r\n\r\nSản phẩm đang được giảm giá hốt lẹ hốt lẹ!!!!\r\n\r\n🥴🥴🥴🥴🥴Bạn là người hiện đại với nhiều công việc bận rộn, hãy tiết kiệm thời gian và công sức của mình cho việc dọn dẹp nhà cửa bằng Robot hút bụi tự động Ecovacs Deebot N79 thông minh đầy tiện dụng.\r\n\r\n👍👍👍Tiết kiệm thời gian và công sức với Robot hút bụi Ecovacs Deebot N79:\r\nTheo bước phát triển hiện đại của công nghệ thì đã có không ít những phát minh Robot tiên tiến ra đời. Một trong số đó phải kể đến Robot hút bụi Ecovacs Deebot N79, dòng thiết bị thông minh được trang bị nhiều tính năng hữu ích để hỗ trợ người dùng dọn dẹp nhà cửa một cách nhanh chóng và tiết kiệm thời gian nhất có thể.\r\n🤪🤪🤪Bạn đã biết gì về Robot hút bụi tự động?\r\n\r\n👉Khái niệm về Robot hút bụi:\r\n\r\n🥴Đúng như những gì bạn đang nghĩ, chức năng chính của nó là hút bụi. Nhưng không giống như những máy hút bụi thông thường, Robot hút bụi rất “thông minh”. Thông minh ở đây không có nghĩa là nó có khả năng như một con người mà chỉ đơn giản là nó có thể giúp bạn làm được những gì bạn cần mà không cần bất kỳ tác động hay kiểm soát từ con người với khả năng thích ứng với môi trường xung quanh.\r\n🥴Robot sẽ giúp bạn hút sạch bụi từ sàn nhà, thảm rồi sau đó tự làm sạch thùng chứa bụi. Khi kết thúc nhiệm vụ hầu hết chúng sẽ tự động tìm và đứng trên trạm sạc của mình hoặc một số trang bị hỗ trợ khác.\r\n\r\n👉Cấu tạo của Robot hút bụi:\r\n\r\n🥴Trên thị trường hiện nay đã có không ít thương hiệu Robot húi bụi ra đời với thiết kế khác nhau về kích thước, hình dáng nhưng cơ bản thì chúng thường có cấu tạo gồm hai bộ phận chính là thân máy và phụ kiện đi kèm.\r\n\r\n🥴Thân máy được làm nên từ các chi tiết như bánh xe, vỏ, hệ thống phần cữngs, hộp xử lý rác, wifi thông minh và các kết nối laser.\r\n🥴Phụ kiện kèm theo cho Robot hút bụi thường là sạc, dây và chổi quét…\r\n\r\n👉Cơ chế hoạt động của một Robot hút bụi:\r\n\r\n🥴Theo thống kế cơ bản thì hầu hết Robot hút bụi hoạt động tương tự như máy hút bụi thông thường, chính là dựa trên cơ chế hoạt động phản lực để tạo ra sức hút lớn rồi từ đó hút sạch toàn bộ bụi bẩn trên suốt quãng đường mà nó di chuyển qua.\r\n🥴Hệ thống bánh xe bên dưới giúp Robot hút bụi di chuyển, bên trong máy là bộ phận cảm biến giúp nó cảm nhận và phản hồi địa hình xung quanh, như việc nó có khả năng phát hiện những vật gây cản trở như tường, tủ, cầu thang… để tránh qua một bên.\r\n\r\n👉👉👉Những ưu và nhược điểm của Robot hút bụi:\r\n👌Ưu điểm:\r\n👍Tiết kiệm thời gian và sức lực: Robot hút bụi tự động thông minh ở chỗ chúng có khả năng tự vận hành, người dùng chỉ cần thiết lập sẵn các chức năng thì Robot sẽ dựa theo đó làm theo một cách trơn tru nhất có thể, từ đó giúp bạn tiết kiệm được khá nhiều thời gian và công sức của mình.\r\n👍Tiết kiệm chi phí: So với việc bỏ ra một khoảng để mua máy hút bụi thì Robot hút bụi vừa nhỏ gọn lại vừa mang đến hiệu quả tốt hơn. Về lâu về dài sẽ giúp bạn tiết kiệm được khá nhiều chi phí cho gia đình.\r\n👍Hiệu quả hút bụi khá cao: Kiểu dáng gọn nhẹ cùng thiết kế mỏng như một chiếc đĩa giúp robot hút bụi thuận lợi di chuyển và luồn lách vào những vị trí mà máy hút bụi thông thường khó mà hút được như gầm tủ, gầm giường, gầm ghế sofa…\r\n👍Điều khiển thông minh: Với Robot hút bụi bạn có thể dễ dàng kết nối chúng với các thiết bị thông minh như máy tính bảng hay Smartphone góp phần giúp bạn kiểm soát tốt hơn các hoạt động của Robot.\r\n\r\n👉👉👉Nhược điểm:\r\n\r\n🥴Giá thành hơi cao, một con Robot hút bụi tự động thấp nhất cũng khoảng 5 triệu đồng.\r\n🥴Chỉ hoạt động hiệu quả tốt đối với sàn nhà bằng phẳng, nếu sàn có độ dốc từ 30-35 độ thì khả năng hoạt động của Robot sẽ bị hạn chế, và dĩ nhiên là không leo được cầu thang.\r\n🥴Đối với những bề mặt có màu quá tối cũng ảnh hưởng đến cơ chế hoạt động của Robot do cảm biến ánh sáng không làm việc.\r\n\r\n👉👉👉Thông số kĩ thuật:\r\n• Màu: Đen\r\n• Chế độ làm việc: Auto Spot Edge\r\n• Kết nối điện thoại: Có\r\n• Thời gian sạch sẽ tại chỗ: 2-5 phút\r\n• Lọc: Bộ lọc hiệu quả cao\r\n• Chổi bên: 2 chổi\r\n• Chổi cuốn: 3D đảm bảo hút được rác lớn hơn\r\n• Điện áp đầu vào & Tần số: 100V AC 50 / 60Hz\r\n• Tự động sạc: Có\r\n• Cảm biết tránh tường, chống rơi: Siêu nhạy\r\n• Lập kế hoạch Thời gian: Vệ sinh chu kỳ hàng ngày\r\n• Mức ồn (db.): Khoảng 64\r\n• Thời gian sạc (h): Khoảng 3-4 giờ\r\n• Dung lượng pin (mAH): NI-MH (2600)\r\n• Dung tích thùng rác (mL): 500ml\r\n• Thời gian làm việc tối đa mỗi lần (phí): 100 phút\r\n\r\n👉👉👉Tính năng của Ecovacs Deebot N79:\r\n\r\n👍Là một thiết bị tự động có kết nối WiFi với ứng dụng điện thoại thông minh cho phép bạn truy cập và điều khiển Robot từ xa.\r\n👍Không có tangle, hút mạnh mẽ giúp làm sạch bụi bẩn, tóc, lông thú, mảnh vụn một cách dễ dàng và hiệu quả, vô cùng phù hợp cho các hộ gia đình có vật nuôi.\r\n👍Có hệ thống bàn chải 2 mặt giúp dễ dàng làm sạch bụi bẩn.\r\n👍Chổi quét Double V cung cấp tốt kích động cho việc thu thập bụi, rác trên sàn nhà.\r\n👍Hệ thống lọc hiệu quả cao làm giảm các tác nhân không khí có liên quan đến dị ứng và hen.\r\n👍Bộ cảm biến thông minh, cảm biến hồng ngoại được trang bị để tránh cầu thang và đồ nội thất.\r\n👍Pin Lithium ion 2.600 mAh giúp Robot hoạt động trong khoảng 100 phút.\r\n👍Được hãng ECOVACS bảo hành một năm.\r\n\r\n👉👉👉Điểm mạnh:\r\n\r\n👍Ecovacs Deebot N79 là một trong những chân không Robot giá rẻ với kết nối WiFi.\r\n👍Thời gian chạy lâu với công suất tối thiểu mờ dần nhờ vào Pin Lithium ion.\r\n👍Hoạt động vượt trội trên sàn trần, có cửa hút lớn kèm lô cuốn 3D giúp đảm bảo hút được những rác lớn.\r\n👍Hai bên bàn chải làm việc tuyệt vời và dễ dàng trong việc hút bụi bẩn trong các góc khuất.\r\n👍Ứng dụng thông minh cho phép bạn lên lịch và điều khiển robot mà không cần phải ở nhà vô cùng tiện lợi.\r\n\r\n🥴🥴🥴Điểm yếu:\r\n\r\n🥴Điều hướng ngẫu nhiên không hiệu quả.\r\n🥴Không hoạt động được trên những tấm thảm dày hoặc địa hình gồ ghề.', 'robot quét nhà N79', 0, '2019-04-27 21:14:11', '2019-05-12 00:52:12'),
(171, 1, 'Mentholatum Water Lip Raspberry Red', '', '', 120000, 80000, 0, 5, 'mentholatum-lip-spf20-pa++-uv-cut.png', 18, 31, 'メンソレータム ウォーターリップ\r\nラズベリーレッド', 'son dưỡng có màu', 0, '2019-04-29 00:43:18', '2019-05-02 08:36:23'),
(172, 1, 'Mentholatum Water Lip Milky Pink', '', '', 120000, 80000, 203, 4, 'waterlip-tinted-milky-pink.jpg', 18, 31, 'メンソレータム ウォーターリップ\r\nミルキィピンク', 'son dưỡng có màu', 0, '2019-04-29 00:51:11', '2019-05-02 08:34:08'),
(173, 1, 'Mentholatum Water Lip Peach Gold', '', '', 120000, 80000, 203, 2, 'waterlip-tinted-peach-gold.jpg', 18, 31, 'メンソレータム ウォーターリップ\r\nピーチゴールド', 'son dưỡng có màu', 0, '2019-04-29 00:53:47', '2019-05-02 08:35:55'),
(174, 1, 'Mentholatum Water Lip Tone Up CC Pure Red', '', '', 120000, 80000, 203, 7, 'waterlip-cc-pure-red.jpg', 18, 31, 'メンソレータム ウォーターリップ\r\nピュアレッド', 'son dưỡng có màu', 0, '2019-04-29 00:57:13', '2019-05-02 08:39:18'),
(175, 1, 'Mentholatum Water Lip Tone Up CC Rose Pink', '', '', 120000, 80000, 203, 5, 'waterlip-cc-rose-pink.jpg', 18, 31, 'メンソレータム ウォーターリップ\r\nローズピンク', 'son dưỡng có màu', 0, '2019-04-29 00:59:37', '2019-05-02 12:05:08'),
(176, 1, 'DHC Fragrant Bulgarian Rose 30 days (60 tablets)', '60 viên', 'bịch', 460000, 410000, 1579, 2, 'dhc-rose-30.jpg', 10, 9, 'DHC（ディーエイチシー） 香るブルガリアンローズ 30日分（60粒）〔栄養補助食品〕\r\n🌹🌹🌹🌹🌹Viên uống dầu hoa hồng thơm cơ thể DHC:30 ngày\r\n🌹Viên uống dầu hoa hồng thơm cơ thể DHC kết hợp thành phần Citronellol (có trong tinh dầu xả) và Geraniol (có trong tinh dầu hoa hồng) là một chất chống oxy hóa tự nhiên và hương thơm của nó khi vào cơ thể, sẽ được bài tiết qua lỗ chân lông, tạo mùi ngọt tự nhiên có thể kéo dài hàng giờ.\r\n\r\n🌹Trong dầu hoa hồng là chất chống oxy hóa mạnh, nó có đến 850 thành phần có thể tạo ra mùi hương cho cơ thể, bạn sẽ cảm nhận được cơ thể sẽ thay đổi sau 2-3 giờ uống.\r\n🌹Có thể nói, cơ thể có mùi tuy không gây hại nhưng nó vô tình làm chúng ta mất đi cảm giác tự tin trong giao tiếp, mọi người sẽ vô tình cảm thấy khó chịu và muốn đứng xa mình 1 chút. \r\n🌹🌹Liều dùng:\r\nUống mỗi ngày 2 viên sau bữa ăn để duy trì và tránh được sự tiết mùi không đáng có.', 'viên hoa hồng thơm cơ thể 30 ngày', 0, '2019-05-01 01:50:14', '2019-05-12 01:25:08'),
(177, 1, 'DHC Hatomugi 30 Days (30 Tablets)', '30 viên', 'bịch', 250000, 200000, 533, 0, 'dhc-hatomugi-30.jpg', 10, 9, 'trắng da\r\nＤＨＣ はとむぎエキス ３０日分 ３０粒入', 'viên trắng da DHC 30 ngày', 0, '2019-05-01 01:59:11', '2019-05-02 08:10:00'),
(178, 1, 'DHC Hatomugi 60 Days (60 Tablets)', '60 viên', 'bịch', 390000, 320000, 1110, 0, 'dhc-hatomugi-60.png', 10, 9, 'trắng da\r\nＤＨＣ はとむぎエキス ６０日分 ６０粒入', 'viên trắng da DHC 60 ngày', 0, '2019-05-01 02:01:13', '2019-05-02 08:11:44'),
(179, 1, 'DHC Hyaluronic Acid 30 Days (60 Tablets)', '60 viên', 'bịch', 380000, 320000, 1136, 0, 'dhc-hiaruron-30.png', 10, 9, 'DHC ヒアルロン酸 30日分 60粒', 'viên cấp nước 30 ngày', 0, '2019-05-01 02:05:31', '2019-05-02 08:13:30'),
(180, 1, 'The Collagen 126 cap', '126 viên', '', 750000, 700000, 4549, 0, 'shiseido-the-collagen-cap.jpg', 7, 7, 'The Collagen（ザ・コラーゲン） 126粒\r\n\r\n🌺🌺🌺Viên uống Shiseido the Collagen giúp phục hồi cấu trúc Collagen từ bên trong:\r\n🌺Bổ sung lượng Collagen, HA & Gaba hòan chỉnh giúp da trẻ hóa, gia tăng sự đàn hồi cấu trúc da từ bên trong, ngăn chặn tiến trình làm lão hóa da bởi tác động từ bên ngòai, liên tục thúc đẩy sự tuần hoàn sản sinh mô mới, làm da luôn chắc khỏe & căng mịn.\r\n🌺Tinh chất sữa ong chúa cô đặc là sự tổng hợp hoàn hảo các Vitamin nhóm B, ngoài ra còn có Vitamin A, C, D, E, protein, lipid, glucid, hormon, enzym cùng 18 acid amin & các khóang chất thiết yếu đặc biệt nuôi dưỡng và tái tạo từng tế bào trong cơ thể giúp da được mịn màng, hồng hào; làm cho móng & tóc vừa chắc khỏe vừa bóng mượt.\r\n🌺Ngòai tác dụng làm đẹp da rõ rệt, sử dụng thường xuyên giúp nâng cao sức đề kháng, đặc biệt tốt cho người làm việc căng thẳng, thiếu ngủ.\r\nCách sử dụng collagen shiseido 126 viên như sau\r\n👉Liều dùng: uống 2 – 3 lần/ ngày, mỗi lần 02 viên (ngày uống tối đa là 06 viên)\r\n👉Cách dùng: có thể uống trước hoặc sau bữa ăn, không cần phải nhai.', '', 1, '2019-05-03 02:27:45', '2019-05-03 02:30:14'),
(181, 1, 'Cezane Lipstick', '', '', 250000, 170000, 518, 0, 'item_016_3.jpg', 18, 66, 'https://www.cezanne.co.jp/lineup/lip/item_016.html', 'Son Cezane', 0, '2019-05-05 18:57:19', '2019-06-03 11:32:28'),
(182, 1, 'Pigeon Breastfeeding bottle (plastic Mickey) 240ml', '240 ml', '', 0, 0, 0, 0, 'pigeon-mickey-limited.jpg', 0, 3, 'ベビーザらス限定　母乳実感哺乳びんプラスチック240ml（ベビーザらス限定柄/ミッキー）', 'Bình sữa Pigeon (plastic Mickey) 240ml', 0, '2019-05-05 18:58:58', '2019-05-10 10:49:42'),
(183, 1, 'The Placenta', '', '', 1050000, 0, 2999, 0, 'the-placenta.jpg', 0, 0, '', '', 0, '2019-05-05 19:02:05', '2019-06-03 11:38:22'),
(184, 1, 'Keiyou Premium 90 pills', '90 pills', '', 1950000, 0, 0, 0, 'keiyou-premium.jpg', 0, 0, '恵葉プレミアム90粒', 'Thuốc trị Gout 90 viên', 0, '2019-05-05 19:03:31', '2019-05-12 00:42:31'),
(185, 1, 'Dầu gội trẻ em', '', '', 0, 0, 593, 0, NULL, 0, 0, '', '', 0, '2019-05-05 19:06:11', '2019-06-03 11:32:58'),
(186, 1, 'Sữa rửa mặt Muji', '', '', 0, 0, 900, 0, NULL, 0, 46, '', '', 0, '2019-05-05 19:07:10', '2019-06-03 11:37:47'),
(187, 1, 'Mochida Awasekken Pink Refill 210ml', '210 ml', '', 450000, 390000, 390000, 4, 'mochida-awasekken-refill.jpg', 25, 67, 'コラージュフルフル 泡石鹸 ピンク つめかえ用 210mL (医薬部外品)', 'Mochida nước rửa phụ khoa', 0, '2019-05-05 19:08:01', '2019-05-27 12:05:57'),
(188, 1, 'Viết bi Muji', '', '', 50000, 0, 240, 0, NULL, 0, 46, '', '', 0, '2019-05-05 19:09:01', '2019-06-03 11:39:11'),
(189, 1, 'Ruột viết bi Muji', '', '', 20000, 0, 70, 0, NULL, 0, 46, '', '', 0, '2019-05-05 19:09:37', '2019-06-03 11:35:43'),
(190, 1, 'Yunopap sID 30 sheets', '', '', 390000, 350000, 0, 1, 'yunopappu-sid-30.jpg', 0, 0, '腰痛，筋肉痛，肩こりに伴う肩の痛み，関節痛，腱鞘炎（手・手首の痛み），肘の痛み（テニス肘など），打撲，捻挫', 'Yunopap sID hộp 30 miếng', 0, '2019-05-05 19:11:56', '2019-05-12 01:15:26'),
(191, 1, 'Orihiro Jelly drink', '', '', 45000, 40000, 108, 0, NULL, 0, 20, '', 'Jelly Orihiro', 0, '2019-05-05 19:15:05', '2019-05-19 03:10:26'),
(192, 1, 'Yakult Lúa mạch', '', '', 0, 0, 0, 2, NULL, 0, 0, '', 'ヤクルト 私の青汁 4g×60袋', 0, '2019-05-05 19:22:31', '2019-05-05 19:23:16'),
(193, 1, 'Daiso Đèn Pin Xe Đạp', '', '', 0, 0, 0, 0, NULL, 0, 68, '', 'Daiso Đèn Pin Xe Đạp', 0, '2019-05-05 19:24:14', '2019-05-27 12:07:51'),
(194, 1, 'Daiso Cạo lông mày', '', '', 0, 0, 0, 0, NULL, 0, 68, '', 'Daiso Cạo lông mày', 0, '2019-05-05 19:25:24', '2019-05-27 12:07:40'),
(195, 1, 'Cool Eraser', '', '', 0, 0, 0, 3, 'keshigomu.jpg', 34, 70, '', 'Gôm', 0, '2019-05-05 19:26:27', '2019-05-28 18:32:49'),
(196, 1, 'Mochida Awasekken Pink 300ml', '300 ml', '', 670000, 610000, 610000, 1, 'mochida-awasekken-bottle.jpg', 25, 67, 'コラージュフルフル 泡石鹸 ピンク 300m L (医薬部外品)', 'Mochida nước rửa phụ khoa 300ml', 0, '2019-05-11 23:09:40', '2019-05-27 12:05:43'),
(197, 1, 'Hepally Plus II 180 pills', '180 viên', '', 1100000, 1020000, 4018, 0, 'hepally-Zeria-ii.jpg', 10, 17, '【第3類医薬品】ヘパリーゼプラスII 180錠', 'Thuốc bổ gan Zeria II 180 viên', 0, '2019-05-11 23:21:13', '2019-06-03 11:33:26'),
(198, 1, 'White Label Luxury Placenta', '', '', 370000, 300000, 0, 0, 'whitelabel-pracenta.jpg', 0, 0, 'ホワイトラベル 贅沢プラセンタのもっちり白肌クマトール\r\nWhite Label Luxury placentitis of a Crepe 白肌 Bear Tall\r\nKem tan mở mắt', 'Kem tan mở mắt nhau thai 100%', 0, '2019-05-11 23:36:45', '2019-05-19 03:11:24'),
(199, 1, 'Spring・Autumn・Purple 3 Turmeric 240 pills', '240 pills', '', 550000, 450000, 0, 1, '3-turmeric.jpg', 10, 36, '野口医学研究所 春・秋・紫3種ウコン 240粒\r\nUkon', '3 Loại củ nghệ 240 viên', 0, '2019-05-11 23:44:19', '2019-05-19 03:17:11'),
(200, 1, 'Fine Bone Kids Calcium', '', '', 250000, 190000, 0, 7, 'fine-bone-kids-calcium.jpg', 8, 48, 'ファイン 骨キッズカルシウム カルシウム500mg ビタミンD5.0μg ビタミンK2 7.0μg配合 チョコレート風味 14杯分 (1回20g/140g入)', 'Fine Canxi bổ xương trẻ em bột cá tuyết', 0, '2019-05-11 23:51:34', '2019-05-26 19:48:15'),
(201, 1, 'Unicharm Softoku Super Solid Mask 100 p', '100 miếng', '', 350000, 300000, 0, 0, 'softoku-mask-100.jpg', 24, 0, 'ユニチャーム ソフトーク 超立体マスク 100枚入', 'Khẩu trang Softoku 100 cái', 0, '2019-05-12 00:05:27', '2019-05-13 13:25:42'),
(202, 1, 'PITTA MASK GRAY 3 Sheets', '', '', 140000, 100000, 0, 1, 'pitta-mask-gray-3.jpg', 24, 60, 'ピッタマスク(PITTA MASK) GRAY 3枚入', 'Khẩu trang Pitta xám set 3', 0, '2019-05-12 00:08:43', '2019-05-18 00:47:14'),
(203, 1, 'PITTA MASK for Kids 3 Sheets', '', '', 150000, 110000, 0, 1, 'pitta-mask-kids-3.jpg', 24, 60, 'ピッタマスクキッズクール(PITTA MASK KIDS COOL) 3枚入 青・グレー・黄緑各色1枚入', 'Khẩu trang Pitta trẻ em set 3', 0, '2019-05-12 00:09:31', '2019-05-13 13:18:47'),
(204, 1, 'Hotate no chikara', '', '', 290000, 240000, 0, 5, 'hotate-no-chikara.jpg', 0, 0, 'ホタテの力 野菜・くだもの洗い', 'Bột rửa rau củ Hotate', 0, '2019-05-12 00:13:09', '2019-05-12 01:41:04'),
(205, 1, 'Son Kailijumei', '', '', 550000, 470000, 0, 0, 'kailijumei-lip.jpg', 18, 0, 'ティーサイド　カイリジュメイ　フラワーティントリップN オイルイン 日本限定オリジナルパッケージ ブルー 　', 'Son Kailijumei', 0, '2019-05-12 00:16:38', '2019-05-18 10:47:05'),
(206, 1, 'Sankusuai Profile 15 sheets', '15 sheets', '', 0, 0, 0, 0, 'sankusuai-profile.jpg', 30, 0, 'サンクスアイ プロフィル 15枚', 'Sankusuai Profile 15', 0, '2019-05-12 00:19:58', '2019-05-18 10:46:37'),
(207, 1, 'Hada Labo Hakujun Lotion 170ml', '170 ml', '', 300000, 240000, 0, 0, 'hada-labo-hakujun-blue.jpg', 7, 59, '肌ラボ 白潤 薬用美白化粧水 高純度アルブチン×ビタミンC×和漢ハトムギエキス配合 170mL 【医薬部外品】', 'Hada Labo Nước hoa hồng Hakujun 170ml', 0, '2019-05-12 00:24:47', '2019-05-12 00:55:36'),
(208, 1, 'Hada Labo Gokujun Lotion 170ml', '170 ml', '', 300000, 240000, 0, 1, 'hada-labo-gokujun-green.jpg', 7, 59, '【医薬部外品】肌研 薬用 極潤 スキンコンディショナー 抗炎症成分2種×ヒアルロン酸×スクワラン×ハトムギエキス配合 170mL', 'Hada Labo Nước hoa hồng Gokujun 170ml', 0, '2019-05-12 00:26:36', '2019-05-12 00:55:36'),
(209, 1, 'Funwari Honey 90 pills', '90 pills', '', 590000, 510000, 0, 1, 'funwari-honey.jpg', 30, 0, 'ふんわりハニー 90粒', 'Nở ngực Funwari Honey 90', 0, '2019-05-12 00:34:06', '2019-05-18 10:46:00'),
(210, 1, 'Adidas Hat', '', '', 0, 0, 2689, 0, 'adidas-hat.jpg', 0, 1, '', 'Nón Adidas', 0, '2019-05-12 01:06:14', '2019-06-03 11:31:22'),
(211, 1, 'Shiseido Benefiance WrinkleResist 24', '', '', 1490000, 1400000, 0, 0, 'Shiseido-Benefiance-WrinkleResist-24.jpg', 28, 7, 'ベネフィアンス Wレジスト24 インテンシブ アイコントアクリーム 15ml', 'Kem Dưỡng chống nhăng Shiseido', 0, '2019-05-12 01:12:50', '2019-05-18 01:04:29'),
(212, 1, 'Soft Stone Double Color Control  Ex Strong', '', '', 0, 0, 0, 0, 'softstone-w-deonachure.jpg', 29, 61, '医薬部外品】デオナチュレ ソフトストーンW \"カラーコントロール\"  ワキ用 直ヌリ 制汗剤 スティック', 'Lăn nách Soft Stone Ex (xanh)', 0, '2019-05-12 01:20:10', '2019-05-18 01:49:23'),
(213, 1, 'PITTA MASK PINK 3 Sheets', '', '', 140000, 100000, 0, 1, 'pitta-mask-pink-3.jpg', 24, 60, 'ピッタマスク(PITTA MASK) PINK 3枚入', 'Khẩu trang Pitta hồng set 3', 0, '2019-05-12 01:53:59', '2019-05-18 00:54:16'),
(214, 1, 'Melano CC Mask 30 sheet', '30 sheets', 'bịch', 390000, 340000, 980, 16, 'melano-cc-mask-30.jpg', 24, 14, 'ロート製薬 メラノCC 集中対策マスク 大容量 ３０枚', 'Mặt nạ Melano 30 miếng', 0, '2019-05-18 23:16:37', '2019-06-02 01:15:54'),
(215, 1, 'Melano CC Mask premium 20 sheet', '20 sheets', 'bịch', 390000, 340000, 980, 1, 'melano-cc-mask-premium-30.jpg', 24, 14, 'ロート製薬 メラノＣＣ 集中対策マスクＭＫ しっとり ２０枚', 'Mặt nạ Melano premium 20 miếng', 0, '2019-05-18 23:55:00', '2019-06-02 01:16:09'),
(216, 1, 'Soft Stone for Feet 7g', '7g', '', 250000, 200000, 638, 3, 'soft-stone-for-feet.jpg', 29, 61, '', 'Lăn chân Soft Stone 7g', 0, '2019-05-19 02:18:31', '2019-05-19 03:24:49'),
(217, 1, '8x4 Rose + Verbena 150g', '', '', 0, 0, 0, 0, '8x4-rose-verbena.jpg', 29, 0, '8×4パウダースプレー ガーリーアロマ 150g 【ローズ&ヴァーベナの香り】 [医薬部外品]', 'Xịt nách 8x4 Hoa Hồng + Cỏ Roi Ngựa', 0, '2019-05-19 02:43:42', '2019-05-19 03:17:11'),
(218, 1, 'Meiji Gumi', '', '', 45000, 35000, 100, 60, NULL, 23, 36, '', 'Kẹo dẽo Meiji', 0, '2019-05-19 02:52:24', '2019-05-26 12:51:03'),
(219, 1, 'Kororo Gumi', '', '', 40000, 35000, 100, 9, NULL, 23, 38, '', 'Kẹo dẽo Kororo', 0, '2019-05-19 02:53:14', '2019-05-19 03:10:26'),
(220, 1, 'Shuuemura aitobarubu UV Compact FD (Refill) 574 ', '', '', 1000000, 900000, 4980, 0, 'shu_uemura_spf_18_pa++.jpg', 15, 16, 'シュウウエムラ ザ・ライトバルブUVコンパクトFD(レフィル)574', 'Phấn phủ Shu', 0, '2019-05-19 03:02:26', '2019-05-19 03:24:49'),
(221, 1, 'Maka SIXTEEN 200 pills', '', '', 0, 0, 0, 0, NULL, 0, 0, 'マカ皇帝倫SIXTEEN 200粒', 'Maka Sixteen 200', 0, '2019-05-19 03:06:27', '2019-05-19 03:10:26'),
(222, 1, 'Shu Sponsor', '', '', 112000, 0, 0, 0, 'shu_uemura_spf_18_pa++.jpg', 15, 16, '', 'Bông Shu', 0, '2019-05-19 03:20:43', '2019-05-19 03:24:49'),
(223, 1, 'Kẻ mắt', '', '', 230000, 0, 0, 0, NULL, 0, 0, '', 'Kẻ mắt', 0, '2019-05-19 03:24:16', '2019-05-19 03:24:49'),
(224, 1, 'PAIR ACNE Face Soap', '', '', 320000, 250000, 0, 0, 'PAIR-ACNE-Face-Soap.jpg', 25, 0, '', 'Sữa rửa mặt trị mụn PAIR ACNE', 0, '2019-05-19 03:26:48', '2019-05-27 12:28:36'),
(225, 1, 'E Okasan Cafe au Lait 18g x 12', '12 ', '', 0, 0, 0, 0, 'e-mother-cafe-au-lait.jpg', 31, 64, '森永 Eお母さん カフェオレ風味', 'Sữa bầu E Okasan Cafe au Lait 18gx12 ', 0, '2019-05-19 13:33:21', '2019-05-19 13:45:14'),
(226, 1, 'E Okasan Matcha 18g x 12', '12 ', '', 0, 0, 0, 0, 'e-mother-matcha.jpg', 31, 64, '森永 Eお母さん 抹茶風味', 'Sữa bầu E Okasan Matcha 18gx12 ', 0, '2019-05-19 13:37:13', '2019-05-19 13:45:14'),
(227, 1, 'E Okasan Milk tea 18g x 12', '12 ', '', 0, 0, 0, 0, 'e-mother-milk-tea.jpg', 31, 64, '森永 Eお母さん ミルクティ風味', 'Sữa bầu E Okasan Milk tea 18gx12 ', 0, '2019-05-19 13:38:43', '2019-05-19 13:45:14'),
(228, 1, 'Hatomugi W Cleansing Face Wash 130g', '130 g', '', 170000, 120000, 275, 0, 'hatomugi-face-soap.jpg', 21, 0, '熊野油脂 麗白\r\n薬用 麗白 ハトムギWクレンジングフォーム 130g', 'Rửa mặt tẩy trang Hatomugi 130g', 0, '2019-05-26 11:17:36', '2019-05-26 11:17:36'),
(229, 1, 'SK-II R.N.A.Power Radical New Age 2.5g', '2.5 g', '', 300000, 250000, 1000, 0, 'SK-ii-R.N.A-power-radical-new-age-2.5g.jpg', 7, 27, 'https://www.sk-ii.com.sg/product/moisturiser/rna-power-radical-new-age\r\nkem chống lão hoá', 'SK-II Mẫu thử kem chống lão hoá 2.5g', 0, '2019-05-26 11:25:39', '2019-05-26 19:18:10'),
(230, 1, 'Chikunain 224 caps', '224 viên', '', 1270000, 1200000, 4809, 0, 'chichinan-224.jpg', 10, 37, '【第2類医薬品】チクナインb 224錠\r\nthuoc tri viem xoang', 'thuốc trị viêm xoang 224 viên', 0, '2019-05-26 11:32:27', '2019-05-26 19:22:57'),
(231, 1, 'Mochida Awasekken Pink 150ml', '150 ml', '', 570000, 500000, 1891, 0, 'mochida-150ml.jpg', 25, 67, 'コラージュフルフル 泡石鹸 ピンク 150mL (医薬部外品)', 'Mochida nước rửa phụ khoa 150ml', 0, '2019-05-26 11:45:01', '2019-05-27 12:05:26'),
(232, 1, 'Wadodo GuGu Kitchen 7', '', '', 65000, 56000, 127, 0, 'wakodo-gugukitchen.jpg', 32, 35, '和光堂 グーグーキッチン チキンと野菜のリゾット ８０ｇ（７ヶ月頃から）\r\n和光堂 グーグーキッチン とり雑炊 ８０ｇ（７ヶ月頃から）\r\n和光堂 グーグーキッチン 鮭の海鮮中華がゆ ８０ｇ\r\n和光堂 グーグーキッチン かぼちゃのグラタン ８０ｇ\r\n和光堂 グーグーキッチン まぐろの炊き込みごはん ８０ｇ\r\n和光堂 グーグーキッチン ひらめと卵のおじや ８０ｇ（７ヶ月頃から）', 'Cháo dinh dưỡng Wakodo 7 tháng', 0, '2019-05-26 13:00:17', '2019-05-26 19:20:10'),
(233, 1, 'Shiseido Mineral Water Lotion 80ml', '80 ml', '', 280000, 220000, 610, 0, 'hadasui-blue.jpg', 33, 7, '肌に適度なうるおいを与えるミネラルウオーターローション\r\n\r\n●肌に必要なミネラル分を含む富士山麓の天然水が、適度なうるおいを与えるミネラルウオーターローションです。\r\n●100%天然水使用　\r\n●弱酸性・無香料・無着色・ノンアルコール　\r\n●ハーブエッセンス配合', 'Nước  hoa hồng Shiseido 80ml', 0, '2019-05-26 13:19:16', '2019-05-26 19:22:03'),
(234, 1, 'YoKoYoKo 80ml', '80 ml', '', 260000, 210000, 573, 0, 'yokoyoko-80ml.jpg', 10, 37, 'ニューアンメルツヨコヨコA 80ml', 'Thuốc bóp YokoYoko 80ml', 0, '2019-05-26 19:02:29', '2019-05-26 19:29:01'),
(235, 1, 'SK-II Facial Treatment Repair C 30ml', '30 ml', '', 3300000, 3150000, 0, 0, 'SK-II_Facial_Treatment_Repair_C_30ml.webp', 7, 27, 'フェイシャル\r\nトリートメント\r\nリペア\r\nC\r\n\r\n肌になじみのよいリッチな使い心地の美容液。肌のキメを整え、なめらかで、うるおいに満ちた肌へ導きます。', 'SK-II Serum phục hồi da mặt C', 0, '2019-05-26 19:14:50', '2019-05-27 11:06:20'),
(236, 1, 'Canmake Marshmallow Finish Powder', '', '', 350000, 290000, 0, 0, 'Marshmallow-Finish-PowderMain.jpg', 7, 65, 'A matte light ochre that will make your skin look brighter in an instant\r\nCreate the perfect sweet-looking face that\'s as soft and light ♡ as a marshmallow!\r\nAchieve a matte finish that conceals pores and hides any unevenness in your complexion ☆\r\nA face powder for finishing your foundation and touching up your make-up through the day. Handy pressed formulation that\'s easy to carry in your bag.\r\n\r\nCreate a sweet-looking face that\'s as soft and light ♡ as a marshmallow\r\nA delicate powder that combines the smoothness of silk and the softness of a marshmallow ♡\r\nAdditive-free mineral formulation that\'s kind to your skin and can be removed with ordinary facial wash\r\n● Kind to your skin - contains 71% mineral ingredients.\r\n● No need to use special cleansers when removing your make-up - ordinary facial wash is fine!\r\nFree from surfactants, tar-based pigments, alcohol and fragrance.\r\nFormulation that prevents make-up wearing off due to shininess, dullness or dryness\r\n● Contains shine-preventing powder. This absorbs sebum, preventing shininess, stickiness and make-up fade.\r\nContains 10 beautifying agents to prevent skin becoming dry and rough\r\nMoisturizing agents \r\n● Aloe vera leaf extract, rosemary extract, chamomile extract, lemon extract\r\nToning agents \r\n● Horse chestnut extract, perilla (shiso) leaf extract\r\nEmollient agents \r\n● Squalane, olive oil, jojoba oil, grape seed oil\r\nContains concealing powder that makes pores and unevenness in skin texture much less noticeable\r\n● The two different-sized types of spherical powder particles create a light-scattering effect, making it hard to notice areas of concern, such as pores and unevenness of skin texture.\r\nComes with a puff\r\n[MO]Matte Ochre\r\n[MB]Matte Beige Ochre\r\n[ML]Matte Light Ochre\r\n[MP]Matte Pink Ochre', 'Phấn Canmake', 0, '2019-05-26 19:27:33', '2019-05-27 11:22:18'),
(237, 1, 'Lush Fresh Bath & Shower', '', '', 0, 0, 0, 0, 'web_lucky_cat_bath_bomb_harajuku_2018.jpg', 0, 69, 'Lush Fresh Handmade Cosmetics\r\nhttps://jn.lush.com/products/bath-bombs', 'Viên tắm bồn Lush', 0, '2019-05-26 19:31:46', '2019-05-27 12:20:24'),
(238, 1, 'Cezanne Cheek & Highlights', '', '', 0, 0, 0, 0, 'item_002_2.jpg', 7, 66, 'https://www.cezanne.co.jp/lineup/cheek/index.html', 'Cezane Phấn má hồng', 0, '2019-05-26 19:34:23', '2019-05-27 12:25:50'),
(239, 1, 'Hada Labo Whitening Gel Cream Arbutin & Vitamin C 50g', '50 g', '', 450000, 380000, 1170, 0, 'hadalabo-gel-cream-arbuchin-vitamin-c-50g.jpg', 7, 59, 'Hada Labo PERFECT WHITE Arbutin Cream – Kem Hada Labo TRẮNG HOÀN HẢO (Hũ màu xanh) -450k-50g\r\n\r\nKem dưỡng trắng Hada Labo PERFECT WHITE dưỡng da trắng mịn, mượt mà với:\r\n\r\nArbutin tinh khiết ức chế sự hình thành và phân tán hắc tố melanin – nguyên nhân gây nám, tàn nhang & đốm nâu.\r\nVitamin C và B3 tăng cường khả năng chống ôxy hóa, dưỡng trắng các vùng da sậm màu, cho sắc da đều màu rạng rỡ.\r\nHA và nano HA cung cấp độ ẩm toàn diện cho làn da ẩm mượt, sáng mịn.\r\nMàng chống nắng bảo vệ da khỏi tác hại của tia UVA, UVB – nguyên nhân gây sạm da, đốm nâu, giúp dưỡng trắng da toàn diện.\r\n\r\n【医薬部外品】肌ラボ 白潤 薬用美白ジェル状クリーム 高純度アルブチン×ビタミンC配合 50g\r\n「肌研(ハダラボ)白潤シリーズ」はアルブチン(美白有効成分)と、ヒアルロン酸Na-2(うるおい成分)・ビタミンC誘導体(うるおい成分)を配合。\r\n美白効果により、メラニンの生成を抑え、しみ・そばかすを防ぎます。\r\nまた、うるおいを与えてキメを整えることで、透明感に満ちたお肌へと導きます。\r\n「白潤 薬用美白クリーム」はみずみずしくて伸びの良い、ジェル状クリーム。\r\nサラッとしているのにしっかりうるおいます。', 'Hada Labo Gel Cream Arbutin + Vitamin C 50g', 0, '2019-05-29 16:54:11', '2019-06-02 02:06:11'),
(240, 1, 'Hada Labo Hiaruron Cream 50g', '50 g', '', 450000, 430000, 0, 0, 'hadalabo-hiaruron-cream-50g.jpg', 7, 59, 'Hada Labo ADVANCED NOURISH Hyaluron Cream – Kem Hada Labo DƯỠNG TỐI ƯU (Hũ màu trắng) -450k-50g\r\n\r\nKhi da thường xuyên được cung cấp đầy đủ độ ẩm và dưỡng chất, làn da sẽ luôn giữ vẻ tươi sáng, săn chắc, mịn màng, ngăn ngừa quá trình lão hóa và nám da.\r\nVới dạng cô đặc Kem dưỡng ẩm tối ưu Hada Labo ADVANCED NOURISH giúp dưỡng ẩm chuyên sâu, cung cấp độ ẩm cao phù hợp ngay cả với phụ nữ trung niên, da khô hay thời tiết khô lạnh.\r\n\r\n「極潤 ヒアルロンクリーム」は、2つのヒアルロン酸*を配合した、うるおいにこだわった保湿クリーム。*うるおい成分:アセチルヒアルロン酸Na(スーパーヒアルロン酸)、ヒアルロン酸Na\r\nしっとりぷるぷるのジェルクリームが、濃密なうるおいで肌を包み込みます。\r\n健康な素肌と同じ弱酸性。\r\n肌へのやさしさに配慮した、低刺激性・無香料・無着色・鉱物油フリー・アルコールフリーです', 'Kem Hada Labo DƯỠNG TỐI ƯU', 0, '2019-05-29 17:11:13', '2019-05-29 17:11:13'),
(241, 1, 'Hada Labo Alpha Rifutoku Cream 50g', '50 g', '', 470000, 440000, 0, 0, 'hada-labo-alpha.jpg', 7, 59, 'Hada Labo PRO ANTI AGING COLLAGEN PLUS Cream – Kem dưỡng chuyên biệt Hada Labo PRO ANTI AGING (Hũ màu đỏ)-470k-50g\r\n\r\nKem dưỡng chuyên biệt Hada Labo PRO ANTI AGING có dạng cô đặc, thấm nhanh, không nhờn rít, dưỡng chuyên sâu giúp tái tạo da, làm mờ nếp nhăn, phục hồi vùng da kém săn chắc; Cải thiện thâm, nám; Dưỡng ẩm sâu, khắc phục tình trạng khô sạm da.\r\n\r\n肌ラボ 極潤α リフトクリーム\r\n\r\nエイジングケア*1に拘る極潤αシリーズ。*1年齢に応じた潤いケア\r\n肌にハリを与える低分子化エラスチン*2(潤い成分)と、肌の上で潤いネットを形成する3Dヒアルロン酸*3(潤い成分)を配合。*2加水分解エラスチン*3ヒアルロン酸クロスポリマーNａ\r\n肌の基礎を支える細胞レベル(角質細胞)に働きかけるメカニズムに着目。\r\n潤いを閉じ込め、肌*4深くからピンと弾むようなハリ肌へ。。*4角質層\r\n濃厚な感触のクリーム', 'Kem dưỡng chuyên biệt Hada Labo PRO ANTI AGING', 0, '2019-05-29 17:37:36', '2019-05-29 17:37:36'),
(242, 1, 'Hada Labo Premium Cream', '50 g', '', 470000, 440000, 0, 0, 'hada-labo-premium.jpg', 7, 59, '', 'Hada Labo Kem dưỡng Premium', 0, '2019-05-29 17:37:36', '2019-05-29 17:40:40'),
(243, 1, 'ILIFE V8s', '', '', 8600000, 8400000, 0, 0, 'ilife-v8s.jpg', 26, 57, '【ご注意：ILIFE製品はチイロボットのみが正規販売店ですのでご注意ください】計画式清掃システムを搭載したV8sロボット掃除機は吸い込み掃除機能、水拭き掃除機能を備えています。弓形走行ルートシステムにより、逃す所がなく届ける場所を全て掃除します。掃除開始する前に、V8sが清掃予定のエリアを計算していくつの小さなエリアに分け、走行する時の誤差を大幅減少します。\r\n更新された浮遊吸引口と車輪、地面に合わせてより効率的な掃除できます。ロールブラシのない吸引口は髪など物が絡まらなくスムーズに吸い取ります。構造上、吸引口のサイズを小さくなり、吸引力を引き上げました、ロールブラシのない所を補足しました。\r\n１週間の間、お好きな日のお好きな時間に本体の鍵によってロボット掃除機の清掃予約ができます。１週間、毎日違う時間の設定をすることも可能です。予約が簡単になります。\r\n７５０ｍｌの最大サイズの引き出し式ダストボックスは通常のロボット掃除機の２倍以上。掃除可能範囲も最大になりました。\r\nウォータータンクには良好な I-Droppingシステムを備え、水拭きの際は適量を給水し、給水過多などの問題発生を防止します。', 'ILIFE V8s ', 0, '2019-05-29 17:53:12', '2019-06-02 02:01:46'),
(244, 1, 'KOSE Suncut Perfect UV Essence 110g', '110 g', '', 420000, 350000, 1058, 0, 'kose-suncut-110g.jpg', 14, 18, 'KOSE サンカット パーフェクト UVエッセンス 無香料 110g', 'KOSE Kem chống nắng 110g', 0, '2019-06-02 00:49:58', '2019-06-02 02:15:00'),
(245, 1, 'Pelican Hip Care Soap 80g', '80 g', '', 220000, 150000, 530, 0, 'oshiri-sekken.jpg', 7, 49, 'ペリカン石鹸 恋するおしり ヒップケアソープ 80g\r\nOshiri', 'Pelican Xà phòng ngừa thăm mông 80g', 0, '2019-06-02 00:58:57', '2019-06-02 02:16:17'),
(246, 1, 'Kose Medicated Whitening Cream 40g', '', '', 1150000, 1050000, 4147, 0, 'medicated_sekkisei.jpg', 16, 18, 'コーセー 薬用 雪肌精 クリーム 40g', 'Kose Kem trắng da 40g', 0, '2019-06-02 01:09:50', '2019-06-02 02:21:38'),
(247, 1, 'Pigeon Birth Preparation Set (Mickey & Minnie)', '', '', 1100000, 1000000, 3769, 0, 'set_pigeon.jpg', 0, 3, 'ピジョン 出産準備セット（ミッキー＆ミニー）', 'Set Pigeon (Mickey & Minnie)', 0, '2019-06-02 01:14:41', '2019-06-02 02:25:42'),
(248, 1, 'Liquid Bandage Sakamu Care 10g', '', '', 250000, 200000, 0, 3, 'sakamukea.jpg', 10, 37, '【第3類医薬品】サカムケア 10g', 'Dung dịch bảo vệ vết thương 10g', 0, '2019-06-02 01:27:06', '2019-06-02 01:28:59'),
(249, 1, 'Canmake Powder Cheeks', '', '', 230000, 180000, 0, 0, 'PW.jpg', 7, 65, 'パウダーチークス\r\nUVカット効果\r\n\r\nしっとりさらさら♡オイルインベース処方チーク\r\n\r\n肌なじみが良く、保湿効果・密着力が高いオイルインベース処方。\r\nさっぱり保湿パウダー・ロングラスティング効果のあるパウダーを配合。しっとりさらさら質感を長時間キープ。\r\nマット・パールの２タイプ！自分好みに使い分けて♥\r\n\r\n◆マットタイプ◆\r\nふんわり可愛らしい仕上がりに。\r\n血色感メイクやナチュラルメイクにオススメ。\r\n◆パールタイプ◆\r\nパッと明るく華やかな仕上がり。\r\n自然なツヤ感とハリを演出。\r\nパーティメイクなど明るい印象にしたいときにオススメ。\r\n\r\n使い方を閉じる\r\n・ブラシに適量を取り、頬の高い位置にふんわりと入れます。\r\n・ハイライト・シェーディングと組み合わせて使うと、より立体的な顔立ちに見せることができます\r\n\r\n商品の色はブラウザやディスプレイ設定などにより多少現品と異なる場合がありますので、予めご了承ください。', 'Canmake Phấn má hồng', 0, '2019-06-02 01:37:57', '2019-06-02 01:37:57'),
(250, 1, 'Muji Sun Glasses UV 400 cut', '', '', 550000, 450000, 0, 3, '4550002909680_1260.jpg', 14, 46, 'ＵＶ４００カット　ミディアムスクエア型サングラス　黒', 'Muji Kính chống nắng 400 UV Cut', 0, '2019-06-02 01:51:30', '2019-06-02 02:02:44'),
(251, 1, 'GU Áo khoát chống nắng UV cut', '', '', 550000, 450000, 0, 1, NULL, 0, 71, '', 'GU Áo khoát chống nắng UV cut', 0, '2019-06-02 01:57:42', '2019-06-02 02:21:38'),
(252, 1, '口内炎パッチ大正Ａ', '10 sheet', '', 245000, 200000, 799, 0, '01951_Product.jpg', 0, 0, '口内炎パッチ大正Ａ', 'Miếng dán nhiệt miệng', 0, '2019-06-02 02:13:37', '2019-06-02 02:15:00'),
(253, 1, 'Aqua Áo khoát chống nắng UV Cut', '', '', 850000, 750000, 0, 0, NULL, 0, 0, '', 'Aqua Áo khoát chống nắng UV Cut', 0, '2019-06-02 02:19:13', '2019-06-02 02:21:38');

-- --------------------------------------------------------

--
-- テーブルの構造 `products_prices`
--

CREATE TABLE `products_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL DEFAULT '0',
  `wholesale_price` float UNSIGNED NOT NULL DEFAULT '0',
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `products_prices`
--

INSERT INTO `products_prices` (`id`, `product_id`, `price`, `wholesale_price`, `remarks`, `created`) VALUES
(1, 18, 400000, 350000, NULL, '2019-04-22 16:43:31'),
(2, 42, 1750000, 1680000, NULL, '2019-04-22 16:43:31'),
(3, 53, 750000, 650000, NULL, '2019-04-22 16:43:31'),
(4, 68, 1950000, 1850000, NULL, '2019-04-15 11:42:47'),
(5, 2, 650000, 550000, NULL, '2019-04-22 16:43:31'),
(6, 7, 650000, 550000, NULL, '2019-04-15 11:38:16'),
(7, 157, 650000, 550000, NULL, '2019-04-15 11:39:31'),
(8, 19, 650000, 550000, NULL, '2019-04-22 16:43:31'),
(9, 3, 650000, 550000, NULL, '2019-04-22 16:43:31'),
(10, 6, 650000, 550000, NULL, '2019-04-16 10:21:42'),
(11, 5, 650000, 550000, NULL, '2019-04-22 16:43:31'),
(12, 1, 650000, 550000, NULL, '2019-04-22 16:43:31'),
(13, 169, 470000, 420000, NULL, '2019-04-26 16:23:10'),
(14, 170, 5500000, 5000000, NULL, '2019-04-27 21:16:03'),
(15, 71, 250000, 220000, NULL, '2019-04-26 17:01:23'),
(16, 138, 0, 0, NULL, '2019-04-22 16:43:32'),
(17, 139, 0, 0, NULL, '2019-04-22 16:43:32'),
(18, 64, 750000, 680000, NULL, '2019-04-10 03:22:24'),
(19, 23, 750000, 680000, NULL, '2019-04-22 16:43:31'),
(20, 62, 750000, 680000, NULL, '2019-04-22 16:43:32'),
(21, 63, 750000, 680000, NULL, '2019-04-22 16:43:32'),
(22, 64, 570000, 500000, NULL, '2019-05-01 00:58:34'),
(23, 23, 570000, 500000, NULL, '2019-05-01 00:59:14'),
(24, 62, 570000, 500000, NULL, '2019-05-01 01:01:10'),
(25, 63, 570000, 500000, NULL, '2019-05-01 01:00:18'),
(26, 34, 600000, 550000, NULL, '2019-04-26 17:01:23'),
(27, 33, 600000, 550000, NULL, '2019-04-26 17:01:23'),
(28, 38, 570000, 520000, NULL, '2019-04-26 17:01:23'),
(29, 40, 520000, 480000, NULL, '2019-04-26 17:01:23'),
(30, 27, 500000, 400000, NULL, '2019-04-26 17:01:23'),
(31, 99, 1100000, 850000, NULL, '2019-04-10 20:34:42'),
(32, 86, 1100000, 0, NULL, '2019-04-10 20:34:26'),
(33, 100, 200000, 180000, NULL, '2019-05-01 01:19:57'),
(34, 120, 470000, 450000, NULL, '2019-04-22 16:43:32'),
(35, 69, 600000, 550000, NULL, '2019-04-12 14:42:14'),
(36, 102, 270000, 260000, NULL, '2019-04-10 12:24:43'),
(37, 159, 500000, 470000, NULL, '2019-04-22 16:43:32'),
(38, 116, 0, 0, NULL, '2019-04-22 16:43:32'),
(39, 164, 1450000, 1380000, NULL, '2019-04-23 11:42:53'),
(40, 164, 1330000, 930000, NULL, '2019-05-01 01:43:50'),
(41, 161, 370000, 320000, NULL, '2019-04-29 03:35:50'),
(42, 44, 330000, 300000, NULL, '2019-04-22 16:43:31'),
(43, 176, 350000, 300000, NULL, '2019-05-01 01:50:14'),
(44, 177, 150000, 120000, NULL, '2019-05-01 01:59:11'),
(45, 178, 250000, 200000, NULL, '2019-05-01 02:01:13'),
(46, 179, 555000, 0, NULL, '2019-05-01 02:05:31'),
(47, 31, 555000, 0, NULL, '2019-04-26 17:01:23'),
(48, 50, 260000, 210000, NULL, '2019-04-29 03:45:35'),
(49, 61, 300000, 260000, NULL, '2019-04-26 17:01:23'),
(50, 59, 310000, 270000, NULL, '2019-04-26 17:01:23'),
(51, 49, 240000, 200000, NULL, '2019-04-26 17:01:23'),
(52, 15, 190000, 150000, NULL, '2019-04-26 17:01:23'),
(53, 52, 260000, 220000, NULL, '2019-04-26 17:01:23'),
(54, 123, 0, 0, NULL, '2019-04-12 14:49:07'),
(55, 124, 0, 0, NULL, '2019-04-12 14:49:21'),
(56, 122, 0, 0, NULL, '2019-04-12 14:48:43'),
(57, 121, 190000, 140000, NULL, '2019-04-22 16:43:32'),
(58, 119, 470000, 450000, NULL, '2019-04-22 16:43:32'),
(59, 154, 350000, 300000, NULL, '2019-04-22 16:43:32'),
(60, 113, 820000, 800000, NULL, '2019-04-15 16:50:32'),
(61, 131, 50000, 45000, NULL, '2019-04-22 16:43:32'),
(62, 133, 50000, 45000, NULL, '2019-05-01 02:48:36'),
(63, 129, 50000, 45000, NULL, '2019-04-12 16:00:19'),
(64, 126, 50000, 45000, NULL, '2019-05-01 02:48:56'),
(65, 130, 50000, 45000, NULL, '2019-04-22 16:43:32'),
(66, 125, 50000, 45000, NULL, '2019-04-12 16:03:21'),
(67, 132, 50000, 45000, NULL, '2019-04-22 16:43:32'),
(68, 127, 50000, 45000, NULL, '2019-04-12 15:56:42'),
(69, 128, 50000, 45000, NULL, '2019-04-22 16:43:32'),
(70, 17, 1050000, 950000, NULL, '2019-04-29 03:23:31'),
(71, 53, 650000, 550000, NULL, '2019-04-26 17:01:23'),
(72, 21, 350000, 300000, NULL, '2019-04-26 17:01:23'),
(73, 20, 350000, 300000, NULL, '2019-04-29 10:52:44'),
(74, 22, 350000, 300000, NULL, '2019-04-26 17:01:23'),
(75, 89, 105000, 95000, NULL, '2019-04-08 11:31:48'),
(76, 36, 320000, 290000, NULL, '2019-04-26 17:01:23'),
(77, 35, 320000, 290000, NULL, '2019-04-26 17:01:23'),
(78, 118, 470000, 450000, NULL, '2019-04-22 16:43:32'),
(79, 117, 470000, 450000, NULL, '2019-04-26 10:55:16'),
(80, 37, 350000, 300000, NULL, '2019-04-26 17:01:23'),
(81, 152, 280000, 230000, NULL, '2019-04-27 16:32:18'),
(82, 92, 70000, 55000, NULL, '2019-04-08 11:31:48'),
(83, 91, 70000, 55000, NULL, '2019-04-08 11:31:48'),
(84, 32, 300000, 270000, NULL, '2019-04-26 17:01:23'),
(85, 172, 70000, 55000, NULL, '2019-04-29 00:53:40'),
(86, 173, 70000, 55000, NULL, '2019-04-29 00:55:34'),
(87, 171, 70000, 55000, NULL, '2019-04-29 00:50:46'),
(88, 174, 70000, 55000, NULL, '2019-04-29 00:59:33'),
(89, 175, 70000, 55000, NULL, '2019-04-29 01:01:45'),
(90, 158, 160000, 130000, NULL, '2019-04-22 16:43:32'),
(91, 111, 0, 0, NULL, '2019-04-11 01:03:15'),
(92, 112, 0, 0, NULL, '2019-04-11 01:04:23'),
(93, 71, 235000, 190000, NULL, '2019-04-29 00:04:08'),
(94, 110, 320000, 290000, NULL, '2019-04-29 03:49:18'),
(95, 109, 300000, 270000, NULL, '2019-04-29 03:31:51'),
(96, 109, 340000, 280000, NULL, '2019-05-01 16:18:02'),
(97, 151, 120000, 0, NULL, '2019-04-22 16:43:32'),
(98, 55, 550000, 0, NULL, '2019-03-30 23:23:39'),
(99, 54, 550000, 0, NULL, '2019-04-26 17:01:23'),
(100, 167, 650000, 600000, NULL, '2019-04-29 03:19:23'),
(101, 144, 200000, 0, NULL, '2019-04-14 03:08:34'),
(102, 48, 300000, 250000, NULL, '2019-04-29 10:53:50'),
(103, 160, 80000, 75000, NULL, '2019-04-22 16:43:32'),
(104, 155, 350000, 0, NULL, '2019-04-24 17:12:11'),
(105, 141, 0, 0, NULL, '2019-04-22 16:43:32'),
(106, 29, 350000, 300000, NULL, '2019-04-26 17:01:23'),
(107, 26, 1300000, 1150000, NULL, '2019-04-26 17:01:23'),
(108, 26, 1100000, 1000000, NULL, '2019-05-01 17:31:28'),
(109, 153, 0, 0, NULL, '2019-04-15 16:44:32'),
(110, 101, 450000, 400000, NULL, '2019-04-10 03:20:01'),
(111, 140, 0, 0, NULL, '2019-04-22 16:43:32'),
(112, 140, 210000, 150000, NULL, '2019-05-01 17:41:45'),
(113, 138, 200000, 160000, NULL, '2019-04-29 03:31:51'),
(114, 139, 200000, 160000, NULL, '2019-04-29 03:31:51'),
(115, 137, 2240000, 2200000, NULL, '2019-04-22 16:43:32'),
(116, 70, 330000, 300000, NULL, '2019-04-11 01:13:30'),
(117, 39, 1200000, 1150000, NULL, '2019-04-26 17:01:23'),
(118, 41, 350000, 300000, NULL, '2019-04-26 17:01:23'),
(119, 145, 300000, 0, NULL, '2019-04-15 16:50:03'),
(120, 146, 400000, 0, NULL, '2019-04-15 16:49:16'),
(121, 47, 850000, 750000, NULL, '2019-04-29 03:45:35'),
(122, 1, 500000, 450000, NULL, '2019-04-26 17:01:23'),
(123, 12, 1000000, 900000, NULL, '2019-04-18 10:33:53'),
(124, 9, 850000, 800000, NULL, '2019-04-26 17:01:23'),
(125, 142, 50000, 45000, NULL, '2019-04-22 16:43:32'),
(126, 136, 50000, 45000, NULL, '2019-04-22 16:43:32'),
(127, 143, 50000, 45000, NULL, '2019-04-22 16:43:32'),
(128, 134, 50000, 45000, NULL, '2019-04-22 16:43:32'),
(129, 135, 50000, 45000, NULL, '2019-04-16 17:43:14'),
(130, 170, 6100000, 5600000, NULL, '2019-04-29 03:32:55'),
(131, 180, 1225000, 1175000, NULL, '2019-05-03 02:27:45'),
(132, 166, 750000, 680000, NULL, '2019-05-02 23:46:52'),
(133, 187, 0, 0, NULL, '2019-05-05 19:20:04'),
(134, 196, 450000, 390000, NULL, '2019-05-11 23:09:40'),
(135, 203, 140000, 100000, NULL, '2019-05-12 00:09:31'),
(136, 184, 0, 0, NULL, '2019-05-05 19:04:22'),
(137, 190, 360000, 0, NULL, '2019-05-11 00:55:52'),
(138, 214, 340000, 280000, NULL, '2019-05-18 23:16:37'),
(139, 216, 0, 0, NULL, '2019-05-19 02:18:31'),
(140, 219, 45000, 35000, NULL, '2019-05-19 02:53:14'),
(141, 191, 0, 0, NULL, '2019-05-05 19:15:47'),
(142, 216, 210000, 200000, NULL, '2019-05-19 02:38:28'),
(143, 222, 1000000, 900000, NULL, '2019-05-19 03:20:43'),
(144, 222, 1000000, 900000, NULL, '2019-05-19 03:20:43'),
(145, 229, 2900000, 2750000, NULL, '2019-05-26 11:25:39'),
(146, 230, 520000, 450000, NULL, '2019-05-26 11:32:27'),
(147, 231, 670000, 610000, NULL, '2019-05-26 11:45:01'),
(148, 235, 300000, 250000, NULL, '2019-05-26 19:14:50'),
(149, 235, 300000, 250000, NULL, '2019-05-26 19:16:08'),
(150, 236, 350000, 300000, NULL, '2019-05-26 19:27:33'),
(151, 239, 400000, 350000, NULL, '2019-06-02 00:41:07'),
(152, 181, 0, 0, NULL, '2019-05-27 12:26:28'),
(153, 183, 0, 0, NULL, '2019-06-03 11:38:05');

-- --------------------------------------------------------

--
-- テーブルの構造 `products_quantities`
--

CREATE TABLE `products_quantities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `warehouse_id` tinyint(3) UNSIGNED NOT NULL,
  `quantity` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `products_quantities`
--

INSERT INTO `products_quantities` (`id`, `user_id`, `product_id`, `warehouse_id`, `quantity`) VALUES
(1, 1, 9, 1, 0),
(2, 1, 1, 1, 14),
(3, 1, 15, 1, 10),
(4, 1, 10, 1, 1),
(5, 1, 8, 1, 2),
(6, 1, 11, 1, 1),
(7, 1, 30, 1, 0),
(8, 1, 4, 1, 9),
(9, 1, 13, 1, 7),
(10, 1, 16, 1, 0),
(11, 1, 31, 1, 0),
(12, 1, 14, 1, 5),
(13, 1, 32, 1, 5),
(14, 1, 26, 1, 1),
(15, 1, 33, 1, 1),
(16, 1, 34, 1, 3),
(17, 1, 1, 2, 5),
(18, 1, 27, 1, 4),
(19, 1, 27, 2, 4),
(20, 1, 24, 1, 0),
(21, 1, 4, 2, 4),
(22, 1, 35, 1, 2),
(23, 1, 35, 2, 1),
(24, 1, 36, 2, 0),
(25, 1, 26, 2, 1),
(26, 1, 37, 1, 4),
(27, 1, 37, 2, 1),
(28, 1, 11, 2, 1),
(29, 1, 14, 2, 6),
(30, 1, 38, 1, 2),
(31, 1, 39, 1, 0),
(32, 1, 8, 2, 2),
(33, 1, 10, 2, 1),
(34, 1, 22, 1, 3),
(35, 1, 22, 2, 3),
(36, 1, 20, 2, 2),
(37, 1, 20, 1, 0),
(38, 1, 21, 2, 3),
(39, 1, 21, 1, 1),
(40, 1, 40, 1, 0),
(41, 1, 41, 1, 2),
(42, 1, 41, 2, 3),
(43, 1, 29, 1, 1),
(44, 1, 29, 2, 3),
(45, 1, 42, 1, 1),
(46, 1, 2, 1, 2),
(47, 1, 2, 2, 2),
(48, 1, 5, 1, 4),
(49, 1, 5, 2, 3),
(50, 1, 43, 1, 3),
(51, 1, 43, 2, 1),
(52, 1, 46, 1, 2),
(53, 1, 46, 2, 2),
(54, 1, 47, 1, 1),
(55, 1, 48, 1, 11),
(56, 1, 49, 1, 3),
(57, 1, 49, 2, 2),
(58, 1, 50, 1, 6),
(59, 1, 50, 2, 1),
(60, 1, 51, 1, 6),
(61, 1, 51, 2, 3),
(62, 1, 52, 1, 3),
(63, 1, 52, 2, 2),
(64, 1, 53, 1, 3),
(65, 1, 54, 1, 4),
(66, 1, 56, 1, 0),
(67, 1, 57, 1, 1),
(68, 1, 58, 1, 2),
(69, 1, 59, 1, 0),
(70, 1, 59, 2, 2),
(71, 1, 34, 2, 1),
(72, 1, 61, 1, 3),
(73, 1, 23, 1, 5),
(74, 1, 62, 1, 4),
(75, 1, 63, 1, 5),
(76, 1, 44, 1, 8),
(77, 1, 82, 1, 0),
(78, 1, 80, 1, 0),
(79, 1, 76, 1, 0),
(80, 1, 77, 1, 0),
(81, 1, 84, 1, 3),
(82, 1, 84, 2, 2),
(83, 1, 45, 1, 5),
(84, 1, 3, 1, 0),
(85, 1, 19, 1, 0),
(86, 1, 86, 1, 0),
(87, 1, 87, 1, 0),
(88, 1, 88, 1, 0),
(89, 1, 89, 1, 0),
(90, 1, 90, 1, 0),
(91, 1, 91, 1, 0),
(92, 1, 92, 1, 0),
(93, 1, 93, 1, 0),
(94, 1, 94, 1, 0),
(95, 1, 95, 1, 0),
(96, 1, 96, 1, 0),
(97, 1, 97, 1, 0),
(98, 1, 98, 2, 0),
(99, 1, 13, 2, 0),
(100, 1, 99, 1, 0),
(101, 1, 69, 1, 0),
(102, 1, 17, 1, 3),
(103, 1, 18, 1, 10),
(104, 1, 100, 1, 0),
(105, 1, 64, 1, 0),
(106, 1, 101, 1, 0),
(107, 1, 102, 1, 0),
(108, 1, 103, 1, 0),
(109, 1, 104, 1, 0),
(110, 1, 105, 2, 0),
(111, 1, 106, 1, 0),
(112, 1, 107, 1, 0),
(113, 1, 108, 1, 0),
(114, 1, 70, 1, 0),
(115, 1, 109, 1, 3),
(116, 1, 110, 1, 2),
(117, 1, 67, 1, 1),
(118, 1, 65, 1, 0),
(119, 1, 66, 1, 0),
(120, 1, 113, 1, 0),
(121, 1, 25, 1, 4),
(122, 1, 71, 1, 0),
(123, 1, 48, 2, 2),
(124, 1, 114, 1, 6),
(125, 1, 115, 1, 0),
(126, 1, 116, 1, 0),
(127, 1, 117, 1, 2),
(128, 1, 120, 1, 0),
(129, 1, 121, 1, 0),
(130, 1, 61, 2, 2),
(131, 1, 6, 2, 0),
(132, 1, 19, 2, 2),
(133, 1, 24, 2, 1),
(134, 1, 119, 1, 1),
(135, 1, 118, 1, 2),
(136, 1, 137, 1, 2),
(137, 1, 138, 1, 0),
(138, 1, 139, 1, 0),
(139, 1, 140, 1, 0),
(140, 1, 141, 1, 0),
(141, 1, 128, 1, 1),
(142, 1, 132, 1, 4),
(143, 1, 130, 1, 4),
(144, 1, 134, 1, 2),
(145, 1, 142, 1, 0),
(146, 1, 143, 1, 0),
(147, 1, 136, 1, 3),
(148, 1, 131, 1, 4),
(149, 1, 72, 1, 0),
(150, 1, 144, 1, 0),
(151, 1, 145, 1, 0),
(152, 1, 146, 1, 0),
(153, 1, 147, 1, 0),
(154, 1, 148, 1, 0),
(155, 1, 135, 1, 2),
(156, 1, 149, 1, 0),
(157, 1, 150, 1, 0),
(158, 1, 151, 1, 0),
(159, 1, 152, 1, 2),
(160, 1, 153, 1, 0),
(161, 1, 154, 1, 1),
(162, 1, 155, 1, 0),
(163, 1, 7, 1, 3),
(164, 1, 157, 1, 2),
(165, 1, 68, 1, 0),
(166, 1, 36, 1, 1),
(167, 1, 45, 2, 0),
(168, 1, 3, 2, 1),
(169, 1, 62, 2, 1),
(170, 1, 156, 1, 0),
(171, 1, 158, 1, 0),
(172, 1, 159, 1, 0),
(173, 1, 161, 1, 19),
(174, 1, 162, 1, 0),
(175, 1, 163, 1, 0),
(176, 1, 160, 1, 30),
(177, 1, 166, 1, 7),
(178, 1, 169, 1, 1),
(179, 1, 168, 1, 10),
(180, 1, 167, 1, 4),
(181, 1, 170, 1, 0),
(182, 1, 171, 1, 5),
(183, 1, 172, 1, 4),
(184, 1, 173, 1, 2),
(185, 1, 174, 1, 7),
(186, 1, 175, 1, 5),
(187, 1, 68, 2, 1),
(188, 1, 181, 1, 0),
(189, 1, 182, 1, 0),
(190, 1, 183, 1, 0),
(191, 1, 184, 1, 0),
(192, 1, 185, 1, 0),
(193, 1, 186, 1, 0),
(194, 1, 187, 1, 4),
(195, 1, 188, 1, 0),
(196, 1, 189, 1, 0),
(197, 1, 190, 1, 1),
(198, 1, 191, 1, 0),
(199, 1, 192, 1, 2),
(200, 1, 193, 1, 0),
(201, 1, 194, 1, 0),
(202, 1, 195, 1, 3),
(203, 1, 197, 1, 0),
(204, 1, 198, 1, 0),
(205, 1, 199, 1, 1),
(206, 1, 200, 1, 7),
(207, 1, 201, 1, 0),
(208, 1, 202, 1, 1),
(209, 1, 203, 1, 1),
(210, 1, 204, 1, 5),
(211, 1, 205, 1, 0),
(212, 1, 206, 1, 0),
(213, 1, 207, 1, 0),
(214, 1, 208, 1, 1),
(215, 1, 209, 1, 1),
(216, 1, 210, 1, 0),
(217, 1, 211, 1, 0),
(218, 1, 212, 1, 0),
(219, 1, 176, 1, 2),
(220, 1, 213, 1, 1),
(221, 1, 214, 1, 16),
(222, 1, 216, 1, 3),
(223, 1, 217, 1, 0),
(224, 1, 218, 1, 60),
(225, 1, 219, 1, 9),
(226, 1, 220, 1, 0),
(227, 1, 221, 1, 0),
(228, 1, 222, 1, 0),
(229, 1, 223, 1, 0),
(230, 1, 224, 1, 0),
(231, 1, 225, 1, 0),
(232, 1, 226, 1, 0),
(233, 1, 227, 1, 0),
(234, 1, 229, 1, 0),
(235, 1, 230, 1, 0),
(236, 1, 55, 1, 6),
(237, 1, 231, 1, 0),
(238, 1, 196, 1, 1),
(239, 1, 232, 1, 0),
(240, 1, 233, 1, 0),
(241, 1, 234, 1, 0),
(242, 1, 235, 1, 0),
(243, 1, 236, 1, 0),
(244, 1, 237, 1, 0),
(245, 1, 238, 1, 0),
(246, 1, 243, 1, 0),
(247, 1, 239, 1, 0),
(248, 1, 244, 1, 0),
(249, 1, 245, 1, 0),
(250, 1, 246, 1, 0),
(251, 1, 247, 1, 0),
(252, 1, 215, 1, 1),
(253, 1, 248, 1, 3),
(254, 1, 250, 1, 3),
(255, 1, 251, 1, 1),
(256, 1, 252, 1, 0),
(257, 1, 253, 1, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `product_ins`
--

CREATE TABLE `product_ins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` tinyint(3) UNSIGNED NOT NULL,
  `market_price` float UNSIGNED NOT NULL DEFAULT '0',
  `purchase_price` float UNSIGNED NOT NULL DEFAULT '0',
  `saleprice` float UNSIGNED NOT NULL DEFAULT '0',
  `quantity` smallint(6) NOT NULL DEFAULT '0',
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `product_ins`
--

INSERT INTO `product_ins` (`id`, `product_id`, `warehouse_id`, `market_price`, `purchase_price`, `saleprice`, `quantity`, `remarks`, `created`, `updated`) VALUES
(1, 9, 1, 3600, 3130, 763000, 2, 'amazon', '2019-02-26 11:26:57', '2019-02-26 11:26:57'),
(2, 1, 1, 1880, 1880, 650000, 10, 'Donki Shinjuku', '2019-02-26 11:28:59', '2019-02-26 11:28:59'),
(3, 15, 1, 340, 321, 160000, 2, '', '2019-02-26 00:00:00', '2019-02-26 11:32:08'),
(4, 15, 1, 340, 348, 90000, 10, '', '2019-02-27 11:37:32', '2019-02-27 11:37:32'),
(5, 10, 1, 4000, 3600, 1100000, 1, 'amazon', '2019-02-26 11:47:00', '2019-02-26 11:47:00'),
(6, 8, 1, 4000, 3778, 848000, 4, 'amazon', '2019-02-26 11:50:04', '2019-02-26 11:50:04'),
(7, 11, 1, 6800, 5378, 1500000, 5, 'amazon', '2019-02-26 11:56:27', '2019-02-26 11:56:27'),
(8, 30, 1, 400, 298, 140000, 10, '', '2019-02-26 12:23:14', '2019-02-26 12:23:14'),
(9, 4, 1, 645, 645, 200000, 4, '', '2019-02-26 12:26:42', '2019-02-26 12:26:42'),
(10, 13, 1, 6800, 6050, 1600000, 1, '', '2019-02-26 12:27:47', '2019-02-26 12:27:47'),
(11, 16, 1, 398, 398, 150000, 4, '', '2019-02-26 12:29:36', '2019-02-26 12:29:36'),
(12, 16, 1, 398, 327, 150000, 20, '', '2019-02-27 12:30:01', '2019-02-27 12:30:01'),
(13, 31, 1, 2580, 2580, 555000, 1, '', '2019-02-26 12:51:51', '2019-02-26 12:51:51'),
(14, 1, 1, 1880, 1880, 650000, 1, '', '2019-03-02 13:02:12', '2019-03-02 13:02:12'),
(15, 13, 1, 6800, 6050, 1450000, 1, '', '2019-03-02 13:05:09', '2019-03-02 13:05:09'),
(16, 14, 1, 2570, 2460, 750000, 5, '', '2019-03-02 13:10:09', '2019-03-02 13:10:09'),
(17, 32, 1, 906, 906, 220000, 1, 'donki shibuya', '2019-03-02 13:26:14', '2019-03-02 13:26:14'),
(18, 26, 1, 4800, 3888, 1100000, 2, 'rakuten', '2019-03-02 13:27:32', '2019-03-02 13:27:32'),
(19, 4, 1, 645, 645, 200000, 1, '', '2019-03-13 15:41:20', '2019-03-13 15:41:20'),
(20, 33, 1, 2138, 2138, 600000, 2, '', '2019-03-13 15:42:10', '2019-03-13 15:42:10'),
(21, 34, 1, 2138, 2138, 550000, 2, '', '2019-03-13 15:42:38', '2019-03-13 15:42:38'),
(22, 1, 1, 1880, 1356, 650000, 5, 'rakuten', '2019-03-13 15:47:25', '2019-03-13 15:47:25'),
(23, 1, 2, 1880, 1356, 650000, 5, 'rakuten', '2019-03-13 15:47:45', '2019-03-13 15:47:45'),
(24, 27, 1, 540, 540, 500000, 7, 'donki baba', '2019-03-13 15:57:41', '2019-03-13 15:57:41'),
(25, 27, 2, 540, 540, 500000, 4, 'donki baba', '2019-03-13 15:58:02', '2019-03-13 15:58:02'),
(26, 24, 1, 1049, 1049, 450000, 1, 'bic shinjuku', '2019-03-13 16:12:53', '2019-03-13 16:12:53'),
(27, 4, 1, 772, 590, 200000, 6, 'rakuten', '2019-03-13 16:45:32', '2019-03-13 16:45:32'),
(28, 4, 2, 772, 590, 200000, 5, 'rakuten', '2019-03-13 16:45:52', '2019-03-13 16:45:52'),
(29, 35, 1, 1296, 768, 320000, 2, 'amazon', '2019-03-13 17:01:21', '2019-03-13 17:01:21'),
(30, 35, 2, 1296, 768, 320000, 2, 'amazon', '2019-03-13 17:01:45', '2019-03-13 17:01:45'),
(31, 36, 2, 1296, 800, 320000, 2, 'amazon', '2019-03-13 17:08:25', '2019-03-13 17:08:25'),
(32, 26, 1, 4800, 2592, 1100000, 2, 'rakuten', '2019-03-13 17:17:27', '2019-03-13 17:17:27'),
(33, 26, 2, 4800, 2592, 1100000, 2, 'rakuten', '2019-03-13 17:17:49', '2019-03-13 17:17:49'),
(34, 37, 1, 1093, 1093, 350000, 1, 'bic shinjuku', '2019-03-13 17:44:09', '2019-03-13 17:44:09'),
(35, 37, 2, 1093, 1093, 350000, 1, 'bic shinjuku', '2019-03-13 17:44:49', '2019-03-13 17:44:49'),
(36, 37, 1, 1093, 969, 350000, 1, '', '2019-03-13 17:45:16', '2019-03-13 17:45:16'),
(37, 11, 1, 6800, 5378, 1500000, 2, 'amazon', '2019-03-13 17:57:44', '2019-03-13 17:57:44'),
(38, 11, 2, 6800, 5378, 1500000, 1, 'amazon', '2019-03-13 17:57:55', '2019-03-13 17:57:55'),
(39, 14, 1, 2570, 2441, 750000, 6, 'rakuten', '2019-03-13 18:10:27', '2019-03-13 18:10:27'),
(40, 14, 2, 2460, 2460, 750000, 5, 'sundrug', '2019-03-13 18:15:21', '2019-03-13 18:15:21'),
(41, 38, 1, 1990, 1814, 570000, 2, 'amazon', '2019-03-16 18:33:14', '2019-03-16 18:33:14'),
(42, 39, 1, 5076, 4980, 1150000, 1, 'amazon', '2019-03-16 18:45:02', '2019-03-16 18:45:02'),
(43, 8, 1, 4000, 3778, 848000, 3, 'rakuten', '2019-03-16 11:20:17', '2019-03-16 11:20:17'),
(44, 8, 2, 4000, 3778, 848000, 3, 'rakuten', '2019-03-16 11:20:45', '2019-03-16 11:20:45'),
(45, 10, 1, 4000, 3420, 1100000, 2, 'amazon', '2019-03-13 12:04:53', '2019-03-13 12:04:53'),
(46, 10, 2, 4000, 3420, 1100000, 1, 'amazon', '2019-03-13 12:05:07', '2019-03-13 12:05:07'),
(47, 4, 1, 772, 590, 200000, 3, 'rakuten', '2019-03-22 13:21:49', '2019-03-22 13:21:49'),
(48, 34, 1, 2138, 2138, 550000, 1, 'sundrug shinjuku', '2019-03-22 13:26:11', '2019-03-22 13:26:11'),
(49, 22, 1, 540, 540, 200000, 3, 'donki shinjuku', '2019-03-22 13:56:44', '2019-03-22 13:56:44'),
(50, 22, 2, 540, 540, 200000, 3, 'donki shinjuku', '2019-03-22 13:57:01', '2019-03-22 13:57:01'),
(51, 20, 2, 540, 540, 200000, 6, 'donki shinjuku', '2019-03-22 13:57:34', '2019-03-22 13:57:34'),
(52, 20, 1, 540, 540, 200000, 2, 'donki shinjuku', '2019-03-22 13:59:04', '2019-03-22 13:59:04'),
(53, 21, 2, 540, 540, 200000, 3, 'donki shinjuku', '2019-03-22 14:00:00', '2019-03-22 14:00:00'),
(54, 21, 1, 540, 540, 200000, 2, 'donki shinjuku', '2019-03-22 14:00:15', '2019-03-22 14:00:15'),
(55, 40, 1, 1640, 1640, 570000, 1, 'bic shinjuku', '2019-03-22 14:16:17', '2019-03-22 14:16:17'),
(56, 41, 1, 1332, 861, 350000, 2, 'shinjuku\nđối diện donki', '2019-03-22 14:43:51', '2019-03-22 14:43:51'),
(57, 41, 2, 1332, 861, 350000, 3, 'shinjuku\nđối diện donki', '2019-03-22 14:44:34', '2019-03-22 14:44:34'),
(58, 29, 1, 1058, 540, 350000, 2, 'donki shinjuku', '2019-03-22 14:51:17', '2019-03-22 14:51:17'),
(59, 29, 2, 1058, 540, 350000, 3, 'donki shinjuku', '2019-03-22 14:51:35', '2019-03-22 14:51:35'),
(60, 14, 1, 2460, 1968, 750000, 2, 'donki baba', '2019-03-22 15:14:52', '2019-03-22 15:14:52'),
(61, 14, 2, 2460, 1968, 750000, 3, 'donki baba', '2019-03-22 15:15:05', '2019-03-22 15:15:05'),
(62, 42, 1, 8710, 7500, 1900000, 3, 'bic shinjuku', '2019-03-22 15:29:42', '2019-03-22 15:29:42'),
(63, 38, 1, 2138, 2138, 570000, 1, 'bic shinjuku', '2019-03-27 01:01:10', '2019-03-27 01:01:10'),
(64, 2, 1, 2671, 1358, 650000, 5, 'sundrug shinjuku', '2019-03-27 03:21:20', '2019-03-27 03:21:20'),
(65, 2, 2, 2671, 1358, 650000, 5, 'sundrug shinjuku', '2019-03-27 03:21:36', '2019-03-27 03:21:36'),
(66, 5, 1, 2615, 1358, 650000, 5, 'sundrug shinjuku', '2019-03-27 03:22:28', '2019-03-27 03:22:28'),
(67, 5, 2, 2615, 1358, 650000, 5, 'sundrug shinjuku', '2019-03-27 03:22:44', '2019-03-27 03:22:44'),
(68, 43, 1, 3240, 2106, 700000, 4, 'sundrug giảm 35%', '2019-03-28 03:25:47', '2019-03-28 03:25:47'),
(69, 43, 2, 3240, 2106, 700000, 1, 'sundrug giảm 35%', '2019-03-28 03:26:17', '2019-03-28 03:26:17'),
(70, 46, 1, 3024, 1966, 650000, 3, 'sundrug giảm 35%', '2019-03-28 03:29:44', '2019-03-28 03:29:44'),
(71, 46, 2, 3024, 1966, 650000, 2, 'sundrug giảm 35%', '2019-03-28 03:30:09', '2019-03-28 03:30:09'),
(72, 47, 1, 3088, 2570, 800000, 1, 'bic shinjuku', '2019-03-28 04:04:02', '2019-03-28 04:04:02'),
(73, 48, 1, 1058, 753, 300000, 5, 'bic shinjuku', '2019-03-28 10:31:07', '2019-03-28 10:31:07'),
(74, 49, 1, 331, 321, 240000, 3, 'bic shinjuku', '2019-03-28 11:08:50', '2019-03-28 11:08:50'),
(75, 49, 2, 331, 321, 240000, 2, 'bic shinjuku', '2019-03-28 11:09:23', '2019-03-28 11:09:23'),
(76, 50, 1, 648, 537, 260000, 3, 'bic shinjuku', '2019-03-28 11:16:35', '2019-03-28 11:16:35'),
(77, 50, 2, 648, 573, 260000, 2, 'bic shinjuku', '2019-03-28 11:17:19', '2019-03-28 11:17:19'),
(78, 38, 1, 2138, 2138, 570000, 2, 'bic shinjuku', '2019-03-28 11:21:26', '2019-03-28 11:21:26'),
(79, 51, 1, 1345, 1004, 350000, 6, 'donki shinjuku kabukicho', '2019-03-28 13:00:42', '2019-03-28 13:00:42'),
(80, 51, 2, 1345, 1004, 350000, 4, 'donki shinjuku kabukicho', '2019-03-28 13:00:56', '2019-03-28 13:00:56'),
(81, 52, 1, 699, 606, 260000, 3, 'donki shinjuku kabukicho', '2019-03-28 13:13:37', '2019-03-28 13:13:37'),
(82, 52, 2, 699, 606, 260000, 2, 'donki shinjuku kabukicho', '2019-03-28 13:13:59', '2019-03-28 13:13:59'),
(83, 53, 1, 2678, 2138, 720000, 1, 'bic shinjuku', '2019-03-29 22:23:50', '2019-03-29 22:23:50'),
(84, 54, 1, 1420, 1382, 550000, 4, 'bic shinjuku', '2019-03-29 22:56:32', '2019-03-29 22:56:32'),
(85, 56, 1, 1058, 1058, 320000, 2, 'donki baba', '2019-03-29 00:34:43', '2019-03-29 00:34:43'),
(86, 57, 1, 1058, 1058, 320000, 2, 'donki baba', '2019-03-29 00:43:44', '2019-03-29 00:43:44'),
(87, 58, 1, 1058, 1058, 320000, 2, 'donki baba', '2019-03-29 00:43:56', '2019-03-29 00:43:56'),
(88, 59, 1, 907, 753, 310000, 3, 'bic shinjuku', '2019-03-29 01:01:39', '2019-03-29 01:01:39'),
(89, 59, 2, 907, 753, 310000, 2, 'bic shinjuku', '2019-03-29 01:02:00', '2019-03-29 01:02:00'),
(90, 34, 1, 2138, 2138, 600000, 4, 'donki kabukicho', '2019-03-29 01:36:12', '2019-03-29 01:36:12'),
(91, 34, 2, 2138, 2138, 600000, 2, 'donki kabukicho', '2019-03-29 01:36:35', '2019-03-29 01:36:35'),
(92, 61, 1, 864, 753, 300000, 1, 'donki shinjuku ĐN', '2019-03-29 01:59:14', '2019-03-29 01:59:14'),
(93, 61, 1, 864, 864, 300000, 4, 'donki kabukicho', '2019-04-04 02:00:22', '2019-04-04 02:00:22'),
(94, 23, 1, 2518, 1922, 800000, 5, 'donki shinjuku ĐN', '2019-04-04 02:14:04', '2019-04-04 02:14:04'),
(95, 62, 1, 2518, 1922, 800000, 5, 'donki shinjuku ĐN', '2019-04-04 02:23:48', '2019-04-04 02:23:48'),
(96, 63, 1, 2518, 1922, 800000, 5, 'donki shinjuku ĐN', '2019-04-04 02:28:22', '2019-04-04 02:28:22'),
(97, 44, 1, 1175, 1058, 300000, 2, 'donki shinjuku ĐN', '2019-04-04 02:45:45', '2019-04-04 02:45:45'),
(98, 82, 1, 23760, 16632, 3750000, 2, 'Matsumoto Kiyoshi\nIkebukuro', '2019-03-31 19:44:23', '2019-03-31 19:44:23'),
(99, 80, 1, 9180, 6426, 1650000, 1, 'Matsumoto Kiyoshi\nIkebukuro', '2019-03-31 19:46:16', '2019-03-31 19:46:16'),
(100, 76, 1, 12420, 12420, 2900000, 1, 'Matsumoto KiyoShi\nIkebukuro', '2019-03-31 19:52:23', '2019-03-31 19:52:23'),
(101, 77, 1, 18360, 17280, 4150000, 1, 'Donki Ikebukuro', '2019-03-31 19:53:58', '2019-03-31 19:53:58'),
(102, 84, 1, 820, 645, 320000, 4, 'donki ikebukuro', '2019-03-31 20:03:03', '2019-03-31 20:03:03'),
(103, 84, 2, 820, 645, 320000, 2, 'donki ikebukuro', '2019-03-31 20:04:08', '2019-03-31 20:04:08'),
(104, 43, 1, 3240, 1944, 700000, 3, 'matsumoto kiyoshi\nikebukuro', '2019-03-31 20:12:06', '2019-03-31 20:12:06'),
(105, 43, 2, 3240, 1944, 700000, 2, 'matsumoto kiyoshi\nikebukuro', '2019-03-31 20:12:38', '2019-03-31 20:12:38'),
(106, 46, 1, 3024, 1815, 650000, 3, 'matsumoto kiyoshi\nikebukuro', '2019-03-31 20:13:21', '2019-03-31 20:13:21'),
(107, 46, 2, 3024, 1815, 650000, 2, 'matsumoto kiyoshi\nikebukuro', '2019-03-31 20:13:38', '2019-03-31 20:13:38'),
(108, 45, 1, 1404, 1404, 450000, 3, 'yamada shinjuku', '2019-04-02 20:25:48', '2019-04-02 20:25:48'),
(109, 77, 1, 18360, 17064, 4150000, 1, 'donki kabukicho', '2019-04-04 20:30:21', '2019-04-04 20:30:21'),
(110, 3, 1, 1780, 1358, 650000, 2, '', '2019-02-26 22:14:28', '2019-02-26 22:14:28'),
(111, 19, 1, 1780, 1358, 650000, 1, '', '2019-02-26 22:16:57', '2019-02-26 22:16:57'),
(112, 86, 1, 0, 0, 1100000, 1, 'donki', '2019-02-26 23:50:54', '2019-02-26 23:50:54'),
(113, 87, 1, 0, 0, 140000, 6, 'donki kawagoe', '2019-02-26 01:01:25', '2019-02-26 01:01:25'),
(114, 88, 1, 753, 0, 135000, 4, 'donki kawgoe', '2019-02-26 01:16:03', '2019-02-26 01:16:03'),
(115, 89, 1, 429, 0, 105000, 4, 'donki kawgoe', '2019-02-26 01:21:51', '2019-02-26 01:21:51'),
(116, 90, 1, 429, 0, 105000, 3, 'donki kawagoe', '2019-02-26 01:26:10', '2019-02-26 01:26:10'),
(117, 91, 1, 645, 0, 70000, 10, 'donki kawagoe', '2019-02-26 01:33:48', '2019-02-26 01:33:48'),
(118, 92, 1, 321, 0, 70000, 6, 'donki kawagoe', '2019-02-26 01:37:13', '2019-02-26 01:37:13'),
(119, 93, 1, 1814, 0, 500000, 1, 'donki kawagoe', '2019-02-26 01:40:33', '2019-02-26 01:40:33'),
(120, 94, 1, 0, 0, 500000, 1, 'donki kawagoe', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(121, 87, 1, 0, 0, 140000, 6, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(122, 88, 1, 0, 0, 135000, 4, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(123, 89, 1, 0, 0, 105000, 4, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(124, 90, 1, 0, 0, 105000, 3, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(125, 91, 1, 0, 0, 70000, 10, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(126, 92, 1, 0, 0, 70000, 6, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(127, 93, 1, 0, 0, 500000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(128, 5, 1, 0, 0, 650000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(129, 94, 1, 0, 0, 500000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(130, 35, 1, 0, 0, 320000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(131, 94, 1, 0, 0, 500000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(132, 95, 1, 0, 0, 500000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(133, 30, 1, 0, 0, 140000, 10, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(134, 96, 1, 1645, 0, 650000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(135, 97, 1, 5891, 0, 1300000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(136, 98, 2, 0, 0, 1200000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(137, 13, 2, 6804, 0, 1600000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(138, 99, 1, 0, 0, 1100000, 1, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(139, 69, 1, 0, 0, 600000, 2, '', '2019-02-26 00:00:00', '2019-02-26 00:00:00'),
(140, 17, 1, 0, 0, 1050000, 1, '', '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(141, 18, 1, 1440, 1058, 400000, 2, 'donki shibuya', '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(142, 17, 1, 0, 0, 1050000, 2, '', '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(143, 19, 1, 0, 0, 650000, 1, '', '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(144, 100, 1, 0, 0, 200000, 2, '', '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(145, 64, 1, 0, 0, 750000, 1, '', '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(146, 69, 1, 0, 0, 600000, 1, '', '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(147, 101, 1, 0, 0, 450000, 1, '', '2019-03-02 00:00:00', '2019-03-02 00:00:00'),
(148, 102, 1, 0, 0, 270000, 2, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(149, 13, 1, 5573, 5573, 1600000, 1, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(150, 103, 1, 0, 0, 0, 2, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(151, 104, 1, 0, 0, 0, 2, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(152, 105, 2, 0, 0, 0, 1, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(153, 106, 1, 1393, 1393, 450000, 1, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(154, 107, 1, 0, 0, 0, 2, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(155, 108, 1, 0, 0, 80000, 3, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(156, 32, 1, 0, 0, 300000, 1, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(157, 70, 1, 0, 0, 330000, 1, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(158, 109, 1, 0, 0, 0, 1, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(159, 110, 1, 968, 645, 320000, 1, 'bic ikebukuro', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(160, 32, 1, 0, 0, 300000, 1, '', '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(161, 67, 1, 0, 0, 140000, 1, '', '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(162, 65, 1, 0, 0, 140000, 2, '', '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(163, 66, 1, 0, 0, 140000, 1, '', '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(164, 113, 1, 0, 0, 820000, 1, '', '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(165, 25, 1, 0, 0, 400000, 1, '', '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(166, 71, 1, 950, 714, 250000, 1, 'bic shinjuku', '2019-03-29 00:00:00', '2019-03-29 00:00:00'),
(167, 48, 1, 1058, 659, 300000, 6, 'amazon', '2019-04-11 11:40:38', '2019-04-11 11:40:38'),
(168, 48, 2, 1058, 659, 300000, 4, 'amazon', '2019-04-11 11:41:32', '2019-04-11 11:41:32'),
(169, 32, 1, 861, 792, 300000, 5, 'amazon', '2019-04-11 11:44:08', '2019-04-11 11:44:08'),
(170, 44, 1, 891, 860, 330000, 5, 'amazon', '2019-04-11 12:00:17', '2019-04-11 12:00:17'),
(171, 18, 1, 1584, 1096, 400000, 3, 'amazon', '2019-04-11 12:05:23', '2019-04-11 12:05:23'),
(172, 114, 1, 1463, 1215, 380000, 6, 'amazon', '2019-04-11 12:37:21', '2019-04-11 12:37:21'),
(173, 115, 1, 5160, 4549, 1225000, 1, 'amazon', '2019-04-11 12:51:14', '2019-04-11 12:51:14'),
(174, 116, 1, 2778, 2750, 0, 1, '', '2019-04-11 12:59:27', '2019-04-11 12:59:27'),
(175, 117, 1, 1598, 1598, 470000, 1, 'amazon', '2019-04-11 13:05:51', '2019-04-11 13:05:51'),
(176, 120, 1, 4400, 4400, 470000, 2, 'amazon', '2019-04-11 13:41:58', '2019-04-11 13:41:58'),
(177, 25, 1, 0, 0, 400000, 1, '', '2019-04-11 15:55:09', '2019-04-11 15:55:09'),
(178, 20, 2, 0, 0, 350000, 1, '', '2019-04-11 23:41:37', '2019-04-11 23:41:37'),
(179, 121, 1, 440, 440, 190000, 2, 'bic shinjuku', '2019-04-11 23:44:45', '2019-04-11 23:44:45'),
(180, 51, 2, 0, 0, 0, -1, '', '2019-04-11 23:50:27', '2019-04-11 23:50:27'),
(181, 6, 2, 0, 0, 650000, 1, '', '2019-04-12 01:01:49', '2019-04-12 01:01:49'),
(182, 19, 2, 0, 0, 650000, 1, '', '2019-04-12 01:02:02', '2019-04-12 01:02:02'),
(183, 13, 2, 5573, 5573, 1600000, 1, '', '2019-04-12 01:05:46', '2019-04-12 01:05:46'),
(184, 66, 1, 0, 0, 140000, 2, '', '2019-04-12 01:12:05', '2019-04-12 01:12:05'),
(185, 117, 1, 1598, 1598, 470000, 4, 'bic online', '2019-04-12 01:21:25', '2019-04-12 01:21:25'),
(186, 119, 1, 1598, 1598, 470000, 4, 'bic online', '2019-04-12 01:22:19', '2019-04-12 01:22:19'),
(187, 44, 1, 891, 847, 330000, 3, 'bic online', '2019-04-12 01:25:31', '2019-04-12 01:25:31'),
(188, 118, 1, 2138, 1216, 470000, 4, 'amazon', '2019-04-12 01:29:09', '2019-04-12 01:29:09'),
(189, 19, 2, 0, 0, 650000, 3, '', '2019-04-12 11:21:42', '2019-04-12 11:21:42'),
(190, 137, 1, 20000, 10000, 2240000, 2, 'matsumoto ikebukuro', '2019-04-12 16:53:50', '2019-04-12 16:53:50'),
(191, 138, 1, 718, 547, 0, 1, 'donki ikebukuro', '2019-04-13 22:43:18', '2019-04-13 22:43:18'),
(192, 139, 1, 718, 547, 0, 1, 'donki ikebukuro', '2019-04-13 22:43:57', '2019-04-13 22:43:57'),
(193, 140, 1, 615, 547, 0, 1, 'donki ikebukuro', '2019-04-13 22:44:19', '2019-04-13 22:44:19'),
(194, 47, 1, 2954, 2462, 850000, 1, 'bic ikebukuro', '2019-04-13 22:58:06', '2019-04-13 22:58:06'),
(195, 141, 1, 2045, 1382, 0, 1, 'bic ikebukuro', '2019-04-13 23:08:22', '2019-04-13 23:08:22'),
(196, 71, 1, 950, 645, 250000, 1, 'bic ikebukuro', '2019-04-13 23:11:30', '2019-04-13 23:11:30'),
(197, 53, 1, 2495, 1890, 750000, 1, 'bic ikebukuro', '2019-04-13 23:14:09', '2019-04-13 23:14:09'),
(198, 128, 1, 105, 105, 50000, 2, 'bic ikebukuro', '2019-04-13 23:22:40', '2019-04-13 23:22:40'),
(199, 132, 1, 105, 105, 50000, 2, 'bic ikebukuro', '2019-04-13 23:23:14', '2019-04-13 23:23:14'),
(200, 130, 1, 105, 105, 50000, 2, 'bic ikebukuro', '2019-04-13 23:23:36', '2019-04-13 23:23:36'),
(201, 134, 1, 95, 95, 50000, 1, 'bic ikebukuro', '2019-04-13 23:28:06', '2019-04-13 23:28:06'),
(202, 142, 1, 95, 95, 50000, 1, ' bic ikebukuro', '2019-04-13 23:32:10', '2019-04-13 23:32:10'),
(203, 143, 1, 95, 95, 50000, 1, 'bic ikebukuro', '2019-04-13 23:32:26', '2019-04-13 23:32:26'),
(204, 136, 1, 95, 95, 50000, 1, 'bic ikebukuro', '2019-04-13 23:32:41', '2019-04-13 23:32:41'),
(205, 128, 1, 95, 95, 50000, 1, 'iganeya', '2019-04-13 23:37:01', '2019-04-13 23:37:01'),
(206, 130, 1, 95, 95, 50000, 4, 'iganeya', '2019-04-13 23:37:37', '2019-04-13 23:37:37'),
(207, 131, 1, 95, 95, 50000, 5, 'iganeya', '2019-04-13 23:38:21', '2019-04-13 23:38:21'),
(208, 132, 1, 95, 95, 50000, 4, 'iganeya', '2019-04-13 23:38:39', '2019-04-13 23:38:39'),
(209, 72, 1, 13500, 13500, 3100000, 1, 'rakuten', '2019-04-14 00:05:40', '2019-04-14 00:05:40'),
(210, 144, 1, 0, 0, 200000, 1, 'shintokorozawa', '2019-04-14 00:09:44', '2019-04-14 00:09:44'),
(211, 145, 1, 0, 0, 300000, 1, 'shintokorozawa', '2019-04-14 00:13:18', '2019-04-14 00:13:18'),
(212, 146, 1, 0, 0, 400000, 1, 'shintokorozawa', '2019-04-14 00:15:05', '2019-04-14 00:15:05'),
(213, 145, 1, 0, 0, 300000, 1, '', '2019-04-14 00:15:38', '2019-04-14 00:15:38'),
(214, 147, 1, 0, 0, 630000, 1, 'shintokorozawa', '2019-04-14 00:17:14', '2019-04-14 00:17:14'),
(215, 145, 1, 0, 0, 300000, 2, '', '2019-04-14 00:18:55', '2019-04-14 00:18:55'),
(216, 148, 1, 0, 0, 150000, 1, '', '2019-04-14 00:20:45', '2019-04-14 00:20:45'),
(217, 148, 1, 0, 0, 150000, 1, '', '2019-04-14 00:20:45', '2019-04-14 00:20:45'),
(218, 39, 1, 0, 0, 1200000, 1, '', '2019-04-14 00:22:00', '2019-04-14 00:22:00'),
(219, 39, 1, 0, 0, 1200000, 1, '', '2019-04-14 00:47:11', '2019-04-14 00:47:11'),
(220, 135, 1, 0, 0, 50000, 3, '', '2019-04-14 00:49:34', '2019-04-14 00:49:34'),
(221, 149, 1, 0, 0, 550000, 1, '', '2019-04-14 00:51:42', '2019-04-14 00:51:42'),
(222, 150, 1, 0, 0, 410000, 1, '', '2019-04-14 01:40:52', '2019-04-14 01:40:52'),
(223, 151, 1, 499, 449, 120000, 1, '', '2019-04-14 01:40:56', '2019-04-14 01:40:56'),
(224, 152, 1, 0, 0, 280000, 1, '', '2019-04-14 01:42:26', '2019-04-14 01:42:26'),
(225, 152, 1, 0, 0, 280000, 1, '', '2019-04-14 01:47:57', '2019-04-14 01:47:57'),
(226, 153, 1, 0, 0, 0, 5, '', '2019-04-14 01:51:40', '2019-04-14 01:51:40'),
(227, 154, 1, 0, 0, 350000, 1, '', '2019-04-14 02:03:23', '2019-04-14 02:03:23'),
(228, 155, 1, 1460, 1335, 350000, 6, '', '2019-04-14 02:08:46', '2019-04-14 02:08:46'),
(229, 154, 1, 987, 987, 350000, 1, 'amazon', '2019-04-14 22:24:46', '2019-04-14 22:24:46'),
(230, 2, 1, 0, 0, 0, -2, '', '2019-04-15 11:18:21', '2019-04-15 11:18:21'),
(231, 7, 1, 0, 0, 650000, 3, '', '2019-04-15 11:19:22', '2019-04-15 11:19:22'),
(232, 5, 1, 0, 0, 0, -4, '', '2019-04-15 11:20:42', '2019-04-15 11:20:42'),
(233, 157, 1, 0, 0, 650000, 2, '', '2019-04-15 11:39:31', '2019-04-15 11:39:31'),
(234, 1, 1, 0, 0, 0, -5, '', '2019-04-15 11:39:51', '2019-04-15 11:39:51'),
(235, 57, 1, 0, 0, 0, -1, '', '2019-04-15 11:40:30', '2019-04-15 11:40:30'),
(236, 4, 1, 0, 0, 0, -2, '', '2019-04-15 11:40:54', '2019-04-15 11:40:54'),
(237, 14, 1, 0, 0, 0, -8, '', '2019-04-15 11:41:36', '2019-04-15 11:41:36'),
(238, 8, 1, 0, 0, 0, -3, '', '2019-04-15 11:41:54', '2019-04-15 11:41:54'),
(239, 11, 1, 0, 0, 0, -1, '', '2019-04-15 11:42:13', '2019-04-15 11:42:13'),
(240, 26, 1, 0, 0, 1300000, 1, '', '2019-04-15 11:42:35', '2019-04-15 11:42:35'),
(241, 68, 1, 0, 0, 1950000, 1, '', '2019-04-15 11:42:47', '2019-04-15 11:42:47'),
(242, 44, 1, 0, 0, 330000, 1, '', '2019-04-15 11:44:45', '2019-04-15 11:44:45'),
(243, 34, 1, 0, 0, 0, -1, '', '2019-04-15 11:45:07', '2019-04-15 11:45:07'),
(244, 41, 2, 0, 0, 0, -3, '', '2019-04-15 11:51:18', '2019-04-15 11:51:18'),
(245, 46, 1, 0, 0, 0, -3, '', '2019-04-15 11:54:11', '2019-04-15 11:54:11'),
(246, 46, 2, 0, 0, 0, -4, '', '2019-04-15 11:54:16', '2019-04-15 11:54:16'),
(247, 43, 1, 0, 0, 0, -3, '', '2019-04-15 11:54:28', '2019-04-15 11:54:28'),
(248, 43, 2, 0, 0, 0, -3, '', '2019-04-15 11:54:32', '2019-04-15 11:54:32'),
(249, 61, 1, 0, 0, 0, -1, '', '2019-04-15 11:55:24', '2019-04-15 11:55:24'),
(250, 59, 1, 0, 0, 0, -1, '', '2019-04-15 11:57:02', '2019-04-15 11:57:02'),
(251, 59, 2, 0, 0, 0, -2, '', '2019-04-15 11:57:12', '2019-04-15 11:57:12'),
(252, 41, 2, 0, 0, 350000, 3, '', '2019-04-15 11:58:34', '2019-04-15 11:58:34'),
(253, 21, 2, 0, 0, 0, -2, '', '2019-04-15 11:59:32', '2019-04-15 11:59:32'),
(254, 21, 1, 0, 0, 0, -1, '', '2019-04-15 11:59:36', '2019-04-15 11:59:36'),
(255, 20, 1, 0, 0, 0, -2, '', '2019-04-15 11:59:49', '2019-04-15 11:59:49'),
(256, 20, 2, 0, 0, 0, -2, '', '2019-04-15 11:59:56', '2019-04-15 11:59:56'),
(257, 29, 1, 0, 0, 0, -1, '', '2019-04-15 12:01:25', '2019-04-15 12:01:25'),
(258, 63, 1, 0, 0, 750000, 1, '', '2019-04-15 12:02:07', '2019-04-15 12:02:07'),
(259, 148, 1, 0, 0, 0, -1, '', '2019-04-15 12:06:45', '2019-04-15 12:06:45'),
(260, 14, 2, 0, 0, 750000, 4, '', '2019-04-16 11:13:36', '2019-04-16 11:13:36'),
(261, 45, 2, 0, 0, 450000, 1, '', '2019-04-16 11:14:46', '2019-04-16 11:14:46'),
(262, 20, 2, 0, 0, 350000, 2, '', '2019-04-16 11:33:54', '2019-04-16 11:33:54'),
(263, 21, 2, 0, 0, 350000, 2, '', '2019-04-16 11:34:28', '2019-04-16 11:34:28'),
(264, 51, 2, 0, 0, 350000, 3, '', '2019-04-16 11:36:08', '2019-04-16 11:36:08'),
(265, 61, 2, 0, 0, 300000, 1, '', '2019-04-16 11:37:32', '2019-04-16 11:37:32'),
(266, 19, 2, 0, 0, 0, -3, '', '2019-04-16 11:39:14', '2019-04-16 11:39:14'),
(267, 5, 2, 0, 0, 650000, 2, '', '2019-04-16 11:40:45', '2019-04-16 11:40:45'),
(268, 62, 2, 0, 0, 750000, 2, '', '2019-04-16 11:41:42', '2019-04-16 11:41:42'),
(269, 62, 2, 0, 0, 0, -1, '', '2019-04-16 11:41:57', '2019-04-16 11:41:57'),
(270, 34, 2, 0, 0, 600000, 1, '', '2019-04-16 11:46:13', '2019-04-16 11:46:13'),
(271, 19, 2, 0, 0, 650000, 1, '', '2019-04-16 11:54:05', '2019-04-16 11:54:05'),
(272, 43, 2, 0, 0, 700000, 1, '', '2019-04-16 11:55:38', '2019-04-16 11:55:38'),
(273, 46, 2, 0, 0, 650000, 2, '', '2019-04-16 11:55:47', '2019-04-16 11:55:47'),
(274, 110, 1, 1156, 731.4, 320000, 5, 'amazon', '2019-04-16 15:19:00', '2019-04-16 15:19:00'),
(275, 109, 1, 1058, 950, 300000, 3, 'amazon', '2019-04-16 15:19:41', '2019-04-16 15:19:41'),
(276, 134, 1, 0, 0, 40000, 3, '', '2019-04-16 17:24:49', '2019-04-16 17:24:49'),
(277, 135, 1, 0, 0, 40000, 3, '', '2019-04-16 17:24:59', '2019-04-16 17:24:59'),
(278, 136, 1, 0, 0, 40000, 3, '', '2019-04-16 17:25:08', '2019-04-16 17:25:08'),
(279, 156, 1, 0, 0, 50000, 1, '', '2019-04-16 17:34:58', '2019-04-16 17:34:58'),
(280, 158, 1, 734, 512, 160000, 1, 'amazon', '2019-04-17 15:52:25', '2019-04-17 15:52:25'),
(281, 17, 1, 3888, 2651, 1050000, 1, 'amazon', '2019-04-17 15:54:15', '2019-04-17 15:54:15'),
(282, 110, 1, 1156, 731.4, 320000, 5, 'amazon', '2019-04-17 15:59:22', '2019-04-17 15:59:22'),
(283, 159, 1, 2160, 1665, 500000, 1, 'amazon', '2019-04-17 16:08:51', '2019-04-17 16:08:51'),
(284, 161, 1, 1100, 840, 310000, 2, 'amazon', '2019-04-18 10:49:34', '2019-04-18 10:49:34'),
(285, 161, 1, 1100, 840, 310000, 2, 'amazon', '2019-04-18 11:09:27', '2019-04-18 11:09:27'),
(286, 47, 1, 2954, 2462, 850000, 2, 'bic ikebukuro', '2019-04-19 00:51:31', '2019-04-19 00:51:31'),
(287, 109, 1, 1058, 648, 300000, 5, 'yamada ikebukuro', '2019-04-19 00:53:50', '2019-04-19 00:53:50'),
(288, 109, 1, 1197, 950, 300000, 2, 'bic ikebukuro', '2019-04-19 01:02:28', '2019-04-19 01:02:28'),
(289, 13, 1, 5573, 5295, 1450000, 2, 'rakuten (coupon)', '2019-04-19 18:42:20', '2019-04-19 18:42:20'),
(290, 162, 1, 1190, 1071, 450000, 1, 'muji', '2019-04-19 22:55:39', '2019-04-19 22:55:39'),
(291, 13, 1, 6051, 6051, 1450000, 1, 'bic shinjuku', '2019-04-19 23:01:49', '2019-04-19 23:01:49'),
(292, 13, 1, 6051, 6051, 1450000, 1, 'bic ikebukuro', '2019-04-21 00:04:35', '2019-04-21 00:04:35'),
(293, 161, 1, 1020, 429, 370000, 6, 'donki ikebukuro', '2019-04-21 00:07:43', '2019-04-21 00:07:43'),
(294, 163, 1, 1620, 1620, 470000, 1, 'donki ikebukuro', '2019-04-21 00:37:44', '2019-04-21 00:37:44'),
(295, 160, 1, 211, 195, 80000, 11, 'amazon', '2019-04-21 00:44:35', '2019-04-21 00:44:35'),
(296, 114, 1, 1463, 1165, 380000, 9, 'rakuten set 9pks', '2019-04-25 10:20:30', '2019-04-25 10:20:30'),
(297, 17, 1, 3888, 2651, 1050000, 1, 'amazon', '2019-04-26 16:08:37', '2019-04-26 16:08:37'),
(298, 17, 1, 3888, 2327, 1050000, 3, 'amazon (set3)', '2019-04-26 16:10:01', '2019-04-26 16:10:01'),
(299, 47, 1, 3335, 1895, 850000, 2, 'amazon', '2019-04-26 16:16:42', '2019-04-26 16:16:42'),
(300, 166, 1, 2116, 2116, 850000, 2, 'amazon', '2019-04-26 16:18:31', '2019-04-26 16:18:31'),
(301, 38, 1, 2138, 1382, 570000, 2, 'amazon', '2019-04-26 16:20:37', '2019-04-26 16:20:37'),
(302, 169, 1, 4644, 4447, 1200000, 1, 'amazon #17', '2019-04-26 16:25:24', '2019-04-26 16:25:24'),
(303, 42, 1, 8105, 6800, 1600000, 2, 'amazon', '2019-04-26 16:27:36', '2019-04-26 16:27:36'),
(304, 53, 1, 2495, 1982, 650000, 3, 'amazon', '2019-04-26 16:32:05', '2019-04-26 16:32:05'),
(305, 168, 1, 1080, 1080, 400000, 4, 'amazon', '2019-04-26 16:55:45', '2019-04-26 16:55:45'),
(306, 167, 1, 3210, 2108, 650000, 3, 'amazon (set 3)', '2019-04-26 16:57:31', '2019-04-26 16:57:31'),
(307, 167, 1, 3210, 2108, 650000, 6, 'amazon (set 3)', '2019-04-27 16:06:42', '2019-04-27 16:06:42'),
(308, 170, 1, 19900, 14900, 5500000, 1, 'amazon', '2019-04-28 10:34:22', '2019-04-28 10:34:22'),
(309, 138, 1, 615, 535, 200000, 1, 'donki ikebukuro', '2019-04-29 00:25:58', '2019-04-29 00:25:58'),
(310, 139, 1, 615, 535, 200000, 1, 'donki ikebukuro', '2019-04-29 00:29:24', '2019-04-29 00:29:24'),
(311, 161, 1, 1020, 429, 370000, 3, 'donki ikebukuro', '2019-04-29 00:35:21', '2019-04-29 00:35:21'),
(312, 171, 1, 278, 203, 70000, 5, 'bic ikebukuro', '2019-04-29 00:50:46', '2019-04-29 00:50:46'),
(313, 172, 1, 278, 203, 70000, 4, 'bic ikebukuro', '2019-04-29 00:53:40', '2019-04-29 00:53:40'),
(314, 173, 1, 278, 203, 70000, 2, 'bic ikebukuro', '2019-04-29 00:55:34', '2019-04-29 00:55:34'),
(315, 174, 1, 278, 203, 70000, 7, 'bic ikebukuro', '2019-04-29 00:59:33', '2019-04-29 00:59:33'),
(316, 175, 1, 278, 203, 70000, 5, 'bic ikebukuro', '2019-04-29 01:01:45', '2019-04-29 01:01:45'),
(317, 18, 1, 1584, 1166, 330000, 1, 'bic ikebukuro', '2019-04-29 01:03:43', '2019-04-29 01:03:43'),
(318, 110, 1, 0, 0, 0, -1, 'Kim uống', '2019-04-29 01:58:47', '2019-04-29 01:58:47'),
(319, 149, 1, 3456, 3456, 550000, 1, 'ikebukuro CR330', '2019-04-29 03:20:39', '2019-04-29 03:20:39'),
(320, 68, 1, 19440, 7385, 1750000, 1, 'amazon', '2019-05-05 18:55:33', '2019-05-05 18:55:33'),
(321, 181, 1, 0, 0, 0, 1, '', '2019-05-05 18:57:36', '2019-05-05 18:57:36'),
(322, 182, 1, 0, 0, 0, 1, '', '2019-05-05 18:59:29', '2019-05-05 18:59:29'),
(323, 182, 1, 0, 0, 0, 1, '', '2019-05-05 19:00:15', '2019-05-05 19:00:15'),
(324, 181, 1, 0, 0, 0, 3, '#501 #306 #205', '2019-05-05 19:01:06', '2019-05-05 19:01:06'),
(325, 183, 1, 0, 0, 0, 2, 'amazon', '2019-05-05 19:02:27', '2019-05-05 19:02:27'),
(326, 184, 1, 0, 0, 0, 1, 'amazon', '2019-05-05 19:03:54', '2019-05-05 19:03:54'),
(327, 169, 1, 0, 0, 1200000, 1, '', '2019-05-05 19:04:33', '2019-05-05 19:04:33'),
(328, 185, 1, 0, 0, 0, 1, 'bic shinjuku', '2019-05-05 19:06:36', '2019-05-05 19:06:36'),
(329, 186, 1, 0, 0, 0, 1, '', '2019-05-05 19:07:26', '2019-05-05 19:07:26'),
(330, 187, 1, 1490, 1313, 450000, 2, 'amazon', '2019-05-05 19:08:24', '2019-05-05 19:08:24'),
(331, 188, 1, 0, 0, 50000, 1, '', '2019-05-05 19:09:53', '2019-05-05 19:09:53'),
(332, 189, 1, 0, 0, 20000, 15, '', '2019-05-05 19:09:58', '2019-05-05 19:09:58'),
(333, 190, 1, 0, 0, 360000, 2, 'sun drug', '2019-05-05 19:12:17', '2019-05-05 19:12:17'),
(334, 104, 1, 0, 0, 0, 2, '', '2019-05-05 19:13:18', '2019-05-05 19:13:18'),
(335, 152, 1, 0, 0, 280000, 3, '', '2019-05-05 19:14:20', '2019-05-05 19:14:20'),
(336, 191, 1, 0, 0, 0, 1, '', '2019-05-05 19:15:32', '2019-05-05 19:15:32'),
(337, 50, 1, 0, 0, 260000, 2, '', '2019-05-05 19:17:13', '2019-05-05 19:17:13'),
(338, 181, 1, 0, 0, 0, 1, '', '2019-05-05 19:20:40', '2019-05-05 19:20:40'),
(339, 181, 1, 0, 0, 0, 1, '', '2019-05-05 19:20:40', '2019-05-05 19:20:40'),
(340, 192, 1, 2916, 1737, 0, 2, 'amazon', '2019-05-05 19:23:16', '2019-05-05 19:23:16'),
(341, 193, 1, 108, 108, 0, 5, 'daiso', '2019-05-05 19:24:50', '2019-05-05 19:24:50'),
(342, 194, 1, 108, 108, 0, 10, 'daiso', '2019-05-05 19:25:47', '2019-05-05 19:25:47'),
(343, 195, 1, 0, 0, 0, 6, 'bic shinjuku', '2019-05-05 19:26:51', '2019-05-05 19:26:51'),
(344, 197, 1, 4018, 4018, 1100000, 5, 'amazon', '2019-05-11 23:22:52', '2019-05-11 23:22:52'),
(345, 187, 1, 1490, 1313, 450000, 2, 'amazon', '2019-05-11 23:24:32', '2019-05-11 23:24:32'),
(346, 187, 1, 0, 0, 0, -2, 'balance', '2019-05-11 23:26:30', '2019-05-11 23:26:30'),
(347, 198, 1, 1080, 1080, 370000, 1, 'amazon', '2019-05-11 23:37:38', '2019-05-11 23:37:38'),
(348, 199, 1, 1300, 1300, 550000, 10, 'amazon', '2019-05-11 23:45:11', '2019-05-11 23:45:11'),
(349, 200, 1, 522, 500, 250000, 3, 'amazon', '2019-05-11 23:52:28', '2019-05-11 23:52:28'),
(350, 155, 1, 1460, 1460, 380000, 6, 'amazon', '2019-05-12 00:00:00', '2019-05-12 00:00:00'),
(351, 115, 1, 5160, 4559, 1225000, 2, 'amazon', '2019-05-12 00:01:38', '2019-05-12 00:01:38'),
(352, 201, 1, 1231, 1049, 350000, 1, 'amazon', '2019-05-12 00:06:11', '2019-05-12 00:06:11'),
(353, 202, 1, 512, 439, 140000, 1, 'amazon', '2019-05-12 00:09:28', '2019-05-12 00:09:28'),
(354, 203, 1, 597, 453, 150000, 1, 'amazon', '2019-05-12 00:11:26', '2019-05-12 00:11:26'),
(355, 204, 1, 924, 600, 290000, 6, 'amazon', '2019-05-12 00:14:27', '2019-05-12 00:14:27'),
(356, 205, 1, 1944, 1944, 550000, 1, 'amazon', '2019-05-12 00:17:14', '2019-05-12 00:17:14'),
(357, 206, 1, 5531, 5531, 0, 2, 'amazon', '2019-05-12 00:20:36', '2019-05-12 00:20:36'),
(358, 207, 1, 704, 704, 300000, 2, 'amazon', '2019-05-12 00:25:20', '2019-05-12 00:25:20'),
(359, 208, 1, 729, 729, 300000, 2, 'amazon', '2019-05-12 00:29:56', '2019-05-12 00:29:56'),
(360, 48, 1, 1058, 659, 290000, 5, 'amazon', '2019-05-12 00:31:21', '2019-05-12 00:31:21'),
(361, 209, 1, 1944, 1944, 590000, 5, 'amazon', '2019-05-12 00:34:38', '2019-05-12 00:34:38'),
(362, 170, 1, 19900, 14900, 6300000, 1, 'amazon', '2019-05-12 00:50:11', '2019-05-12 00:50:11'),
(363, 104, 1, 0, 0, 0, 2, '', '2019-05-12 01:04:16', '2019-05-12 01:04:16'),
(364, 210, 1, 0, 0, 0, 2, 'adidas page', '2019-05-12 01:07:33', '2019-05-12 01:07:33'),
(365, 190, 1, 997, 997, 390000, 2, 'sundrug', '2019-05-12 01:10:20', '2019-05-12 01:10:20'),
(366, 211, 1, 5399, 5199, 1490000, 1, 'belcosme', '2019-05-12 01:14:53', '2019-05-12 01:14:53'),
(367, 195, 1, 327, 327, 0, 11, 'bic shinjuku', '2019-05-12 01:16:37', '2019-05-12 01:16:37'),
(368, 212, 1, 904, 969, 0, 1, 'bic shinjuku', '2019-05-12 01:20:35', '2019-05-12 01:20:35'),
(369, 149, 1, 0, 0, 550000, 1, '', '2019-05-12 01:22:27', '2019-05-12 01:22:27'),
(370, 176, 1, 0, 0, 460000, 3, '', '2019-05-12 01:24:48', '2019-05-12 01:24:48'),
(371, 115, 1, 4549, 4549, 1225000, 2, 'amazon', '2019-05-12 01:27:13', '2019-05-12 01:27:13'),
(372, 115, 1, 0, 0, 0, -2, '', '2019-05-12 01:28:52', '2019-05-12 01:28:52'),
(373, 18, 1, 998, 998, 330000, 10, 'rakuten', '2019-05-12 01:48:18', '2019-05-12 01:48:18'),
(374, 213, 1, 499, 616, 140000, 1, 'amazon', '2019-05-18 00:54:16', '2019-05-18 00:54:16'),
(375, 39, 1, 3780, 3765, 1000000, 1, 'amazon #554', '2019-05-18 22:52:50', '2019-05-18 22:52:50'),
(376, 160, 1, 211, 195, 80000, 24, 'amazon', '2019-05-18 22:56:16', '2019-05-18 22:56:16'),
(377, 50, 1, 594, 533, 260000, 6, 'amazon', '2019-05-18 23:03:35', '2019-05-18 23:03:35'),
(378, 168, 1, 1080, 1080, 400000, 3, 'amazon', '2019-05-18 23:05:30', '2019-05-18 23:05:30'),
(379, 166, 1, 2116, 2116, 750000, 3, 'amazon', '2019-05-18 23:07:07', '2019-05-18 23:07:07'),
(380, 15, 1, 501, 442, 230000, 10, 'amazon', '2019-05-18 23:09:34', '2019-05-18 23:09:34'),
(381, 25, 1, 1080, 1080, 400000, 4, 'amazon', '2019-05-18 23:11:14', '2019-05-18 23:11:14'),
(382, 200, 1, 522, 500, 250000, 6, 'amazon', '2019-05-18 23:12:19', '2019-05-18 23:12:19'),
(383, 214, 1, 980, 980, 390000, 11, 'matsumotokiyoshi ikebukuro', '2019-05-18 23:54:40', '2019-05-18 23:54:40'),
(384, 161, 1, 540, 398, 310000, 15, 'donki ikebukuro', '2019-05-19 02:15:38', '2019-05-19 02:15:38'),
(385, 1, 1, 1880, 1213, 500000, 10, 'qoo10', '2019-05-19 02:17:42', '2019-05-19 02:17:42'),
(386, 216, 1, 698, 638, 210000, 5, 'amazon', '2019-05-19 02:26:02', '2019-05-19 02:26:02'),
(387, 37, 1, 988, 930, 340000, 3, 'amazon', '2019-05-19 02:37:27', '2019-05-19 02:37:27'),
(388, 217, 1, 0, 0, 0, 1, '', '2019-05-19 02:47:14', '2019-05-19 02:47:14'),
(389, 191, 1, 108, 108, 45000, 10, 'matumotokiyoshi ike', '2019-05-19 02:58:03', '2019-05-19 02:58:03'),
(390, 218, 1, 98, 98, 45000, 35, 'matsumotokiyoshi ike', '2019-05-19 03:00:06', '2019-05-19 03:00:06'),
(391, 219, 1, 98, 98, 40000, 12, 'matsumotokiyoshi ike', '2019-05-19 03:00:53', '2019-05-19 03:00:53'),
(392, 220, 1, 5076, 3645, 1000000, 1, 'amazon #574', '2019-05-19 03:05:20', '2019-05-19 03:05:20'),
(393, 221, 1, 3308, 3308, 0, 1, 'amazon', '2019-05-19 03:06:56', '2019-05-19 03:06:56'),
(394, 222, 1, 540, 540, 112000, 1, 'shuuemura ike', '2019-05-19 03:23:06', '2019-05-19 03:23:06'),
(395, 223, 1, 0, 0, 230000, 1, 'donki', '2019-05-19 03:24:34', '2019-05-19 03:24:34'),
(396, 224, 1, 0, 0, 320000, 1, '', '2019-05-19 03:27:22', '2019-05-19 03:27:22'),
(397, 225, 1, 925, 925, 0, 3, 'omni7', '2019-05-19 13:42:59', '2019-05-19 13:42:59'),
(398, 226, 1, 925, 925, 0, 3, 'omni7', '2019-05-19 13:43:15', '2019-05-19 13:43:15'),
(399, 227, 1, 925, 925, 0, 4, 'omni7', '2019-05-19 13:43:34', '2019-05-19 13:43:34'),
(400, 166, 1, 2116, 2116, 750000, 2, 'amazon', '2019-05-26 11:20:57', '2019-05-26 11:20:57'),
(401, 229, 1, 1000, 1000, 300000, 1, 'amazon', '2019-05-26 11:31:38', '2019-05-26 11:31:38'),
(402, 230, 1, 4809, 4809, 1270000, 2, 'amazon', '2019-05-26 11:39:54', '2019-05-26 11:39:54'),
(403, 55, 1, 870, 870, 390000, 6, 'amazon', '2019-05-26 11:43:07', '2019-05-26 11:43:07'),
(404, 231, 1, 1944, 1891, 570000, 1, 'amazon', '2019-05-26 12:31:33', '2019-05-26 12:31:33'),
(405, 187, 1, 1148, 1192, 450000, 5, 'amazon', '2019-05-26 12:38:17', '2019-05-26 12:38:17'),
(406, 196, 1, 2186, 2186, 670000, 1, 'amazon', '2019-05-26 12:42:01', '2019-05-26 12:42:01'),
(407, 149, 1, 2650, 2650, 550000, 1, 'amazon #PK355', '2019-05-26 12:43:00', '2019-05-26 12:43:00'),
(408, 149, 1, 2552, 2552, 550000, 1, 'amazon #rd144', '2019-05-26 12:43:40', '2019-05-26 12:43:40'),
(409, 168, 1, 1080, 1080, 400000, 5, 'amazon', '2019-05-26 12:44:38', '2019-05-26 12:44:38'),
(410, 45, 1, 1404, 1404, 450000, 5, 'amazon', '2019-05-26 12:45:18', '2019-05-26 12:45:18'),
(411, 197, 1, 4017, 4017, 1100000, 5, 'amazon', '2019-05-26 12:46:58', '2019-05-26 12:46:58'),
(412, 197, 1, 4017, 4860, 1100000, 1, 'biccamera ikebukuro', '2019-05-26 12:48:39', '2019-05-26 12:48:39'),
(413, 218, 1, 95, 95, 45000, 30, 'biccamera ikebukuro', '2019-05-26 12:51:02', '2019-05-26 12:51:02'),
(414, 232, 1, 127, 127, 65000, 6, 'bic odakyu', '2019-05-26 13:08:44', '2019-05-26 13:08:44'),
(415, 233, 1, 702, 518, 280000, 1, 'bic odakyu', '2019-05-26 13:19:51', '2019-05-26 13:19:51'),
(416, 234, 1, 654, 537, 260000, 3, 'bic odakyu', '2019-05-26 19:03:51', '2019-05-26 19:03:51'),
(417, 34, 1, 1980, 1980, 590000, 2, 'donki shinjuku', '2019-05-26 19:07:35', '2019-05-26 19:07:35'),
(418, 33, 1, 1980, 1980, 590000, 2, 'donki shinjuku', '2019-05-26 19:07:48', '2019-05-26 19:07:48'),
(419, 13, 1, 6104, 6104, 1450000, 2, 'bic shinjuku', '2019-05-26 19:10:19', '2019-05-26 19:10:19'),
(420, 82, 1, 0, 0, 3750000, 1, '', '2019-05-26 19:13:38', '2019-05-26 19:13:38'),
(421, 235, 1, 0, 0, 300000, 1, '', '2019-05-26 19:17:47', '2019-05-26 19:17:47'),
(422, 236, 1, 0, 0, 350000, 1, '', '2019-05-26 19:27:55', '2019-05-26 19:27:55'),
(423, 237, 1, 0, 0, 0, 4, 'Lush', '2019-05-26 19:32:29', '2019-05-26 19:32:29'),
(424, 238, 1, 0, 0, 0, 1, '', '2019-05-26 19:34:43', '2019-05-26 19:34:43'),
(425, 149, 1, 0, 0, 550000, 2, '', '2019-05-26 19:38:16', '2019-05-26 19:38:16'),
(426, 153, 1, 0, 0, 55000, 3, '', '2019-05-26 19:39:06', '2019-05-26 19:39:06'),
(427, 195, 1, 0, 0, 0, 6, '', '2019-05-26 19:39:59', '2019-05-26 19:39:59'),
(428, 243, 1, 29900, 23900, 8600000, 1, 'amazon', '2019-06-02 00:35:01', '2019-06-02 00:35:01'),
(429, 239, 1, 1170, 1170, 400000, 1, 'amazon', '2019-06-02 00:41:07', '2019-06-02 00:41:07'),
(430, 244, 1, 1058, 790, 420000, 1, 'amazon', '2019-06-02 00:51:24', '2019-06-02 00:51:24'),
(431, 245, 1, 529, 529, 220000, 1, 'amazon', '2019-06-02 00:59:59', '2019-06-02 00:59:59'),
(432, 246, 1, 4146, 4146, 1150000, 1, 'amazon', '2019-06-02 01:10:36', '2019-06-02 01:10:36'),
(433, 166, 1, 2116, 2116, 750000, 3, 'amazon', '2019-06-02 01:11:33', '2019-06-02 01:11:33'),
(434, 247, 1, 3769, 3769, 1100000, 1, 'amazon', '2019-06-02 01:15:13', '2019-06-02 01:15:13'),
(435, 214, 1, 980, 980, 390000, 10, 'matsumoto kiyoshi', '2019-06-02 01:15:54', '2019-06-02 01:15:54'),
(436, 215, 1, 980, 980, 390000, 1, 'matsumoto kiyoshi', '2019-06-02 01:16:09', '2019-06-02 01:16:09'),
(437, 248, 1, 743, 591, 250000, 3, 'yamada shinjuku', '2019-06-02 01:28:07', '2019-06-02 01:28:07'),
(438, 13, 1, 5573, 5599, 1450000, 3, 'rakuten', '2019-06-02 01:32:14', '2019-06-02 01:32:14'),
(439, 210, 1, 2698, 2698, 0, 2, 'adidas', '2019-06-02 01:47:46', '2019-06-02 01:47:46'),
(440, 250, 1, 1490, 1490, 550000, 4, 'Muji', '2019-06-02 01:52:56', '2019-06-02 01:52:56'),
(441, 251, 1, 1609, 1609, 550000, 2, 'GU shintokorozawa', '2019-06-02 01:59:14', '2019-06-02 01:59:14'),
(442, 252, 1, 799, 799, 245000, 1, 'yamada shinjuku', '2019-06-02 02:14:31', '2019-06-02 02:14:31'),
(443, 253, 1, 3218, 3218, 850000, 1, '', '2019-06-02 02:20:01', '2019-06-02 02:20:01'),
(444, 247, 1, 3769, 3769, 1100000, 1, 'amazon', '2019-06-02 02:24:28', '2019-06-02 02:24:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `roles`
--

INSERT INTO `roles` (`id`, `name`, `display`, `active`, `created`, `updated`) VALUES
(1, 'root', 'System Administrator', 1, '2018-12-30 00:00:00', '2018-12-30 00:00:00'),
(2, 'anonymous', 'Anonymous', 1, '2018-12-30 00:00:00', '2018-12-30 00:00:00'),
(3, 'domainowner', 'Domain Owner', 1, '2018-12-30 00:00:00', '0000-00-00 00:00:00'),
(4, 'manager', 'Manager', 1, '2018-12-30 00:00:00', '2018-12-30 00:00:00'),
(5, 'serviceuser', 'Service User', 1, '2018-12-30 00:00:00', '2018-12-30 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Loggin Session ID',
  `data` text COLLATE utf8mb4_unicode_ci COMMENT 'Loggin Session Data',
  `created` int(10) UNSIGNED NOT NULL,
  `updated` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `sessions`
--

INSERT INTO `sessions` (`session_id`, `data`, `created`, `updated`) VALUES
('l7uf3mg2qetphebou3ptjr8vs3', 'navigated|i:1559524998;General\\Core\\Manager\\Controllers\\IndexController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\MainController|a:1:{s:10:\"parameters\";N;}', 1559524998, 1559525000),
('s777ksllspkjpr3cuk7feptu36', 'navigated|i:1559529591;General\\Core\\Manager\\Controllers\\IndexController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\MainController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\SessionsController|a:1:{s:10:\"parameters\";N;}auth|a:7:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:5:\"Khang\";s:5:\"login\";s:5:\"admin\";s:7:\"role_id\";s:1:\"4\";s:4:\"role\";s:7:\"manager\";s:12:\"role_display\";s:7:\"Manager\";s:11:\"role_demote\";i:1;}General\\Core\\Manager\\Controllers\\TransportsController|a:1:{s:10:\"parameters\";a:3:{s:10:\"conditions\";s:57:\"[General\\Core\\Manager\\Models\\Transport].user_id=:user_id:\";s:4:\"bind\";a:1:{s:7:\"user_id\";s:1:\"1\";}s:5:\"order\";s:47:\"[General\\Core\\Manager\\Models\\Transport].id DESC\";}}General\\Core\\Manager\\Controllers\\InvoicesController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\ClientsController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\OutGoingController|a:1:{s:10:\"parameters\";a:3:{s:10:\"conditions\";s:56:\"[General\\Core\\Manager\\Models\\OutGoing].user_id=:user_id:\";s:4:\"bind\";a:1:{s:7:\"user_id\";s:1:\"1\";}s:5:\"order\";s:53:\"[General\\Core\\Manager\\Models\\OutGoing].exec_date DESC\";}}General\\Core\\Manager\\Controllers\\ProductsController|a:1:{s:10:\"parameters\";a:1:{s:5:\"order\";s:44:\"[General\\Core\\Manager\\Models\\Product].id ASC\";}}$PHALCON/CSRF$|s:16:\"ZdvykTPD4InHHqAu\";General\\Core\\Manager\\Controllers\\InventoryController|a:1:{s:10:\"parameters\";a:1:{s:5:\"order\";s:44:\"[General\\Core\\Manager\\Models\\Product].id ASC\";}}', 1559524999, 1559529594);

-- --------------------------------------------------------

--
-- テーブルの構造 `transports`
--

CREATE TABLE `transports` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `total` float UNSIGNED DEFAULT '0',
  `total_others` float UNSIGNED DEFAULT '0',
  `flight_date` datetime DEFAULT '0000-00-00 00:00:00',
  `flight_end` datetime DEFAULT NULL,
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_id` int(10) UNSIGNED DEFAULT '0',
  `receive_id` int(10) UNSIGNED DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `transports`
--

INSERT INTO `transports` (`id`, `name`, `user_id`, `client_id`, `total`, `total_others`, `flight_date`, `flight_end`, `remarks`, `send_id`, `receive_id`, `status`, `disabled`, `created`, `updated`) VALUES
(1, '330857144133', 1, 6, 45090000, 0, '0000-00-00 00:00:00', NULL, 'Dot1-20190226', 0, 0, 6, 0, '2019-04-09 18:47:28', '2019-04-16 16:51:32'),
(2, '330857657395', 1, 6, 13250000, 0, '0000-00-00 00:00:00', NULL, 'Dot2-20190302', 0, 0, 6, 0, '2019-04-10 03:34:39', '2019-04-20 00:49:03'),
(3, '330858751532-330858536610', 1, 36, 8190000, 408000, '0000-00-00 00:00:00', NULL, 'Dot3&4-20190319', 0, 0, 6, 0, '2019-04-10 17:25:22', '2019-04-16 16:49:27'),
(4, '330859467676', 1, 36, 10660000, 408000, '0000-00-00 00:00:00', NULL, 'Dot5-20190322', 0, 0, 6, 0, '2019-04-11 01:26:03', '2019-04-20 01:02:42'),
(5, '330860214204', 1, 36, 8350000, 732000, '0000-00-00 00:00:00', NULL, 'Dot6-20190329', 0, 0, 6, 0, '2019-04-11 10:58:00', '2019-05-01 23:26:33'),
(6, '330860913596', 1, 36, 25395000, 2906000, '2019-04-14 00:00:00', NULL, 'Dot7-20190406', 0, 0, 6, 0, '2019-04-14 00:55:36', '2019-05-01 23:30:41'),
(7, '330861520986', 1, 36, 16124000, 3092000, '2019-04-18 00:00:00', NULL, 'Dot8-20190406', 53, 10, 6, 0, '2019-04-14 02:24:09', '2019-05-01 23:32:09'),
(8, '3308-6217-4683', 1, 63, 13330000, 3107000, '2019-04-25 00:00:00', NULL, 'Dot 9 - 2019-04-21', 53, 10, 6, 0, '2019-04-20 01:27:22', '2019-05-08 15:14:17'),
(9, '745-8776-8474', 1, 36, 19190000, 715000, '2019-05-02 00:00:00', NULL, 'Dot 10', 53, 10, 6, 0, '2019-05-02 00:19:23', '2019-05-19 15:47:47'),
(10, '3308-6395-4046', 1, 36, 13637000, 333000, '2019-05-07 00:00:00', NULL, 'Dot 11', 53, 10, 6, 0, '2019-05-06 23:17:48', '2019-05-19 23:55:38'),
(11, '3308-6480-2590', 1, 63, 32310000, 0, '2019-05-17 00:00:00', '2019-05-21 00:00:00', 'Đợt 12', 53, 10, 6, 0, '2019-05-13 11:34:58', '2019-05-29 18:02:56'),
(12, '3308-6541-7761', 1, 36, 13052000, 473000, '2019-05-21 00:00:00', '2019-05-27 00:00:00', 'Dot 13', 53, 10, 6, 0, '2019-05-20 00:00:41', '2019-05-29 18:04:46'),
(13, '3308-6607-4453', 1, 63, 18010000, 5136000, '2019-05-31 00:00:00', '2019-06-01 00:00:00', 'Dot 14', 53, 10, 2, 0, '2019-05-28 17:40:01', '2019-06-02 13:32:46'),
(14, '3308-6667-4681', 1, 63, 19605000, 385000, '2019-06-07 00:00:00', '2019-06-08 00:00:00', 'Dot 15', 53, 10, 2, 0, '2019-06-02 02:30:07', '2019-06-03 10:42:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `transport_invoices`
--

CREATE TABLE `transport_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `transport_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `transport_invoices`
--

INSERT INTO `transport_invoices` (`id`, `transport_id`, `invoice_id`, `created`, `updated`) VALUES
(12, 3, 26, '2019-04-16 16:49:27', '2019-04-16 16:49:27'),
(13, 3, 27, '2019-04-16 16:49:27', '2019-04-16 16:49:27'),
(14, 3, 28, '2019-04-16 16:49:27', '2019-04-16 16:49:27'),
(15, 3, 29, '2019-04-16 16:49:27', '2019-04-16 16:49:27'),
(16, 3, 30, '2019-04-16 16:49:27', '2019-04-16 16:49:27'),
(17, 3, 31, '2019-04-16 16:49:27', '2019-04-16 16:49:27'),
(18, 3, 32, '2019-04-16 16:49:27', '2019-04-16 16:49:27'),
(19, 3, 33, '2019-04-16 16:49:27', '2019-04-16 16:49:27'),
(20, 3, 34, '2019-04-16 16:49:27', '2019-04-16 16:49:27'),
(21, 1, 1, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(22, 1, 2, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(23, 1, 3, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(24, 1, 4, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(25, 1, 5, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(26, 1, 6, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(27, 1, 7, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(28, 1, 8, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(29, 1, 9, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(30, 1, 10, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(31, 1, 11, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(32, 1, 12, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(33, 1, 13, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(34, 1, 14, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(35, 1, 15, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(36, 1, 16, '2019-04-16 16:51:32', '2019-04-16 16:51:32'),
(37, 2, 17, '2019-04-20 00:49:03', '2019-04-20 00:49:03'),
(38, 2, 18, '2019-04-20 00:49:03', '2019-04-20 00:49:03'),
(39, 2, 19, '2019-04-20 00:49:03', '2019-04-20 00:49:03'),
(40, 2, 20, '2019-04-20 00:49:03', '2019-04-20 00:49:03'),
(41, 2, 21, '2019-04-20 00:49:03', '2019-04-20 00:49:03'),
(42, 2, 22, '2019-04-20 00:49:03', '2019-04-20 00:49:03'),
(43, 2, 23, '2019-04-20 00:49:03', '2019-04-20 00:49:03'),
(44, 2, 24, '2019-04-20 00:49:03', '2019-04-20 00:49:03'),
(45, 2, 25, '2019-04-20 00:49:03', '2019-04-20 00:49:03'),
(46, 4, 35, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(47, 4, 36, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(48, 4, 37, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(49, 4, 38, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(50, 4, 39, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(51, 4, 40, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(52, 4, 41, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(53, 4, 42, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(54, 4, 43, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(55, 4, 44, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(56, 4, 45, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(57, 4, 46, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(58, 4, 47, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(59, 4, 48, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(60, 4, 49, '2019-04-20 01:02:42', '2019-04-20 01:02:42'),
(204, 5, 50, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(205, 5, 51, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(206, 5, 52, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(207, 5, 53, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(208, 5, 54, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(209, 5, 55, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(210, 5, 56, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(211, 5, 57, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(212, 5, 58, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(213, 5, 59, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(214, 5, 60, '2019-05-01 23:26:33', '2019-05-01 23:26:33'),
(215, 6, 61, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(216, 6, 62, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(217, 6, 63, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(218, 6, 64, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(219, 6, 65, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(220, 6, 66, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(221, 6, 67, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(222, 6, 68, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(223, 6, 69, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(224, 6, 70, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(225, 6, 71, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(226, 6, 72, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(227, 6, 84, '2019-05-01 23:30:41', '2019-05-01 23:30:41'),
(228, 7, 73, '2019-05-01 23:32:09', '2019-05-01 23:32:09'),
(229, 7, 74, '2019-05-01 23:32:09', '2019-05-01 23:32:09'),
(230, 7, 75, '2019-05-01 23:32:09', '2019-05-01 23:32:09'),
(231, 7, 76, '2019-05-01 23:32:09', '2019-05-01 23:32:09'),
(232, 7, 77, '2019-05-01 23:32:09', '2019-05-01 23:32:09'),
(233, 7, 78, '2019-05-01 23:32:09', '2019-05-01 23:32:09'),
(234, 7, 79, '2019-05-01 23:32:09', '2019-05-01 23:32:09'),
(235, 7, 80, '2019-05-01 23:32:09', '2019-05-01 23:32:09'),
(236, 7, 81, '2019-05-01 23:32:09', '2019-05-01 23:32:09'),
(275, 8, 86, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(276, 8, 87, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(277, 8, 88, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(278, 8, 89, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(279, 8, 90, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(280, 8, 91, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(281, 8, 92, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(282, 8, 93, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(283, 8, 94, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(284, 8, 95, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(285, 8, 96, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(286, 8, 97, '2019-05-08 15:14:17', '2019-05-08 15:14:17'),
(417, 9, 100, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(418, 9, 101, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(419, 9, 102, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(420, 9, 103, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(421, 9, 104, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(422, 9, 105, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(423, 9, 106, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(424, 9, 107, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(425, 9, 108, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(426, 9, 109, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(427, 9, 110, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(428, 9, 111, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(429, 9, 112, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(430, 9, 113, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(431, 9, 114, '2019-05-19 15:47:47', '2019-05-19 15:47:47'),
(432, 10, 115, '2019-05-19 23:55:38', '2019-05-19 23:55:38'),
(433, 10, 116, '2019-05-19 23:55:38', '2019-05-19 23:55:38'),
(434, 10, 117, '2019-05-19 23:55:38', '2019-05-19 23:55:38'),
(435, 10, 118, '2019-05-19 23:55:38', '2019-05-19 23:55:38'),
(436, 10, 119, '2019-05-19 23:55:39', '2019-05-19 23:55:39'),
(437, 10, 120, '2019-05-19 23:55:39', '2019-05-19 23:55:39'),
(438, 10, 121, '2019-05-19 23:55:39', '2019-05-19 23:55:39'),
(439, 10, 122, '2019-05-19 23:55:39', '2019-05-19 23:55:39'),
(440, 10, 123, '2019-05-19 23:55:39', '2019-05-19 23:55:39'),
(441, 10, 124, '2019-05-19 23:55:39', '2019-05-19 23:55:39'),
(442, 10, 125, '2019-05-19 23:55:39', '2019-05-19 23:55:39'),
(498, 11, 126, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(499, 11, 127, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(500, 11, 128, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(501, 11, 129, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(502, 11, 130, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(503, 11, 131, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(504, 11, 132, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(505, 11, 133, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(506, 11, 134, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(507, 11, 135, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(508, 11, 136, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(509, 11, 137, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(510, 11, 138, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(511, 11, 139, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(512, 11, 140, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(513, 11, 141, '2019-05-29 18:02:56', '2019-05-29 18:02:56'),
(525, 12, 142, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(526, 12, 143, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(527, 12, 144, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(528, 12, 145, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(529, 12, 146, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(530, 12, 147, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(531, 12, 148, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(532, 12, 149, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(533, 12, 150, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(534, 12, 151, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(535, 12, 152, '2019-05-29 18:04:46', '2019-05-29 18:04:46'),
(545, 13, 153, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(546, 13, 154, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(547, 13, 155, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(548, 13, 156, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(549, 13, 157, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(550, 13, 158, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(551, 13, 159, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(552, 13, 160, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(553, 13, 161, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(554, 13, 162, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(555, 13, 163, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(556, 13, 164, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(557, 13, 165, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(558, 13, 166, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(559, 13, 167, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(560, 13, 168, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(561, 13, 169, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(562, 14, 170, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(563, 14, 171, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(564, 14, 172, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(565, 14, 173, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(566, 14, 174, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(567, 14, 175, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(568, 14, 176, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(569, 14, 177, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(570, 14, 178, '2019-06-03 10:42:00', '2019-06-03 10:42:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `transport_products`
--

CREATE TABLE `transport_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `transport_id` int(10) UNSIGNED NOT NULL,
  `warehouse_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `amount` float UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `transport_products`
--

INSERT INTO `transport_products` (`id`, `transport_id`, `warehouse_id`, `product_id`, `amount`, `created`, `updated`) VALUES
(37, 13, 1, 218, 27, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(38, 13, 1, 219, 15, '2019-06-02 13:32:46', '2019-06-02 13:32:46'),
(39, 13, 1, 195, 3, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(40, 13, 1, 196, 1, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(41, 13, 1, 228, 3, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(42, 13, 1, 168, 3, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(43, 13, 1, 187, 2, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(44, 13, 1, 45, 3, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(45, 13, 1, 25, 2, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(46, 13, 1, 50, 6, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(47, 13, 1, 55, 4, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(48, 13, 1, 200, 3, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(49, 13, 1, 161, 3, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(50, 13, 1, 1, 6, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(51, 13, 2, 25, 2, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(52, 13, 2, 200, 3, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(53, 13, 2, 161, 4, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(54, 13, 2, 13, 2, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(55, 13, 2, 45, 2, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(56, 13, 2, 228, 2, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(57, 13, 2, 187, 2, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(58, 13, 2, 33, 1, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(59, 13, 2, 34, 2, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(60, 13, 2, 168, 2, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(61, 13, 2, 218, 20, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(62, 13, 2, 219, 15, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(63, 13, 2, 1, 4, '2019-06-02 13:32:47', '2019-06-02 13:32:47'),
(64, 14, 1, 214, 7, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(65, 14, 1, 215, 1, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(66, 14, 1, 166, 1, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(67, 14, 1, 248, 3, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(68, 14, 2, 250, 2, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(69, 14, 2, 13, 3, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(70, 14, 2, 214, 3, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(71, 14, 2, 166, 2, '2019-06-03 10:42:00', '2019-06-03 10:42:00'),
(72, 14, 1, 249, 2, '2019-06-03 10:42:00', '2019-06-03 10:42:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `types`
--

CREATE TABLE `types` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `types`
--

INSERT INTO `types` (`id`, `name`, `remarks`, `created`, `updated`) VALUES
(1, 'Phí Vận Chuyển', 'chi phí vận chuyển hàng hóa', '2019-05-25 10:33:35', '2019-05-25 10:33:35'),
(2, 'Phí Vật Tư', 'chi phí mua vật tư, văn phòng phẩm', '2019-05-25 10:36:35', '2019-05-25 10:36:35'),
(3, 'Thu Tiền Khách', '', '2019-05-25 10:36:59', '2019-05-25 10:36:59');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `login`, `passwd`, `email`, `disabled`, `created`, `updated`) VALUES
(1, 3, 'Khang', 'admin', 'admin', 'leduongkhang@gmail.com', 0, '2018-12-30 00:00:00', '2018-12-30 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `warehouses`
--

CREATE TABLE `warehouses` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `warehouses`
--

INSERT INTO `warehouses` (`id`, `user_id`, `name`, `remarks`, `created`, `updated`) VALUES
(1, 1, 'Sài Gòn', 'kho Sài Gòn', '2019-03-15 00:00:00', '2019-03-15 00:00:00'),
(2, 1, 'Lagi', 'kho Lagi', '2019-03-15 00:00:00', '2019-03-15 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commons`
--
ALTER TABLE `commons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_key_val` (`cid`,`name`,`value`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices_details`
--
ALTER TABLE `invoices_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_costs`
--
ALTER TABLE `other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outgoing`
--
ALTER TABLE `outgoing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perm_role` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_prices`
--
ALTER TABLE `products_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_quantities`
--
ALTER TABLE `products_quantities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ins`
--
ALTER TABLE `product_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_invoices`
--
ALTER TABLE `transport_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_products`
--
ALTER TABLE `transport_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `commons`
--
ALTER TABLE `commons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `invoices_details`
--
ALTER TABLE `invoices_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `other_costs`
--
ALTER TABLE `other_costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `outgoing`
--
ALTER TABLE `outgoing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `products_prices`
--
ALTER TABLE `products_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `products_quantities`
--
ALTER TABLE `products_quantities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `product_ins`
--
ALTER TABLE `product_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transport_invoices`
--
ALTER TABLE `transport_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

--
-- AUTO_INCREMENT for table `transport_products`
--
ALTER TABLE `transport_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
