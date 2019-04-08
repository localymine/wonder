-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 4 月 06 日 21:21
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
-- テーブルの構造 `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: KH bthg; 1: KH si',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `country_id`, `name`, `firstname`, `lastname`, `address`, `email`, `phone`, `remarks`, `type`, `disabled`, `created`, `updated`) VALUES
(1, 1, 1, 'Thái Mập', 'Phạm Phong', 'Thái', '56/15 Tô Hiệu P.Tân Thới Hòa Q.Tân Phú', NULL, '0835138178', NULL, 0, 0, '2019-01-01 00:00:00', '2019-01-01 00:00:00'),
(2, 1, 1, 'Quý VTA', 'Tống Thị Kim', 'Quý', '163/15/9 Tô Hiến Thành P.13, Q.10 TP.HCM', '', '0902398633', 'chuyên bán hàng Quảng Châu, mỹ phẩm', 0, 0, '2019-01-03 00:53:14', '2019-01-09 16:49:13'),
(3, 1, 1, 'Lan Aris', 'Lan', 'Nguyễn Thị', '', '', '0933906061', '0071005548715 - vcb chi nhánh HCM\r\nnguyễn thị lan', 0, 0, '2019-02-18 17:35:19', '2019-02-19 15:23:19'),
(4, 1, 1, 'Hy Aris', 'Hy', 'Nguyễn Đức', '', '', '01223891366', 'Vietcombank 0441000636934', 0, 0, '2019-02-18 17:36:07', '2019-02-19 11:26:42'),
(5, 1, 1, 'Hậu VTA', 'Hậu', 'Phan Hữu', '148/12/7/21 Tôn Đản, Phường 8, Quận 4', '', '0935457566', '', 0, 0, '2019-02-22 11:33:06', '2019-02-24 11:11:46'),
(6, 1, 1, 'Nam Cargo', 'Nam', 'Trần Văn', '', 'netnam82@gmail.com', '+81 - 036912.9337', 'Vietcombank chi nhánh Thành Công\r\n0451000229321\r\n\r\n+84 93 457 42 39', 0, 0, '2019-03-01 18:14:00', '2019-03-06 13:02:46'),
(7, 1, 2, 'Nguyễn Tiến ', 'Dũng', '', '830-0033 福岡県久留米市天神町82-3天神ウエノビル405号', '', '08064337979', '830-0033\r\n福岡県久留米市天神町82-3天神ウエノビル405号', 0, 0, '2019-03-12 10:29:08', '2019-03-12 10:29:08'),
(8, 1, 1, 'Bé Cẩm (ốp lưng)', NULL, NULL, NULL, 'shopping@client.com', NULL, NULL, 0, 0, '2019-04-06 20:56:18', '2019-04-06 20:56:18'),
(9, 1, 1, 'Bé Trâm', '', '', '', '', '', '', 0, 0, '2019-04-06 21:03:14', '2019-04-06 21:03:14'),
(10, 1, 1, 'Như Như', '', '', '', '', '', '', 1, 0, '2019-04-06 21:03:31', '2019-04-06 21:03:31'),
(11, 1, 1, 'Mi Nhon', '', '', '', '', '', '', 0, 0, '2019-04-06 21:03:53', '2019-04-06 21:03:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
