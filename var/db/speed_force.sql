-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 4 月 01 日 03:17
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
(3, 'Pigeon', 'nội địa jp', '2019-02-19 00:00:00', '2019-02-19 00:00:00'),
(4, 'Kowa', 'nội địa jp', '2019-02-19 00:00:00', '2019-02-19 00:00:00'),
(5, 'Aneron', 'エスエス製薬株式会社', '2019-02-19 00:00:00', '2019-02-19 00:00:00'),
(6, 'Transino', 'nội địa jp', '2019-02-22 00:00:00', '2019-02-22 00:00:00'),
(7, 'Shiseido', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(8, 'Asahi', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(9, 'DHC', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(10, 'Attonon', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(11, 'iSDG', NULL, '2019-03-20 00:00:00', '2019-03-20 00:00:00'),
(12, 'Botanical', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(13, 'Santen', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(14, 'Rohto', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(15, 'Labo', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(16, 'Shu Uemura', NULL, '2019-03-22 00:00:00', '2019-03-22 00:00:00'),
(17, 'Zeria', NULL, '2019-03-25 00:00:00', '2019-03-25 00:00:00'),
(18, 'Kose', NULL, '2019-03-26 00:00:00', '2019-03-26 00:00:00'),
(19, 'Morishita Jintan', '森下仁丹', '2019-03-26 00:00:00', '2019-03-26 00:00:00'),
(20, 'Orihiro', NULL, '2019-03-30 00:00:00', '2019-03-30 00:00:00'),
(21, 'Inochi no haha', NULL, '2019-03-30 00:00:00', '2019-03-30 00:00:00'),
(22, 'GRAPHICO', 'グラフィコ', '2019-03-30 00:00:00', '2019-03-30 00:00:00');

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
(17, 'Food', NULL, '2019-03-31 00:00:00', '2019-03-31 00:00:00');

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
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `country_id`, `name`, `firstname`, `lastname`, `address`, `email`, `phone`, `remarks`, `disabled`, `created`, `updated`) VALUES
(1, 1, 1, 'Thái Mập', 'Phạm Phong', 'Thái', '56/15 Tô Hiệu P.Tân Thới Hòa Q.Tân Phú', NULL, '0835138178', NULL, 0, '2019-01-01 00:00:00', '2019-01-01 00:00:00'),
(2, 1, 1, 'Quý VTA', 'Tống Thị Kim', 'Quý', '163/15/9 Tô Hiến Thành P.13, Q.10 TP.HCM', '', '0902398633', 'chuyên bán hàng Quảng Châu, mỹ phẩm', 0, '2019-01-03 00:53:14', '2019-01-09 16:49:13'),
(3, 1, 1, 'Lan Aris', 'Lan', 'Nguyễn Thị', '', '', '0933906061', '0071005548715 - vcb chi nhánh HCM\r\nnguyễn thị lan', 0, '2019-02-18 17:35:19', '2019-02-19 15:23:19'),
(4, 1, 1, 'Hy Aris', 'Hy', 'Nguyễn Đức', '', '', '01223891366', 'Vietcombank 0441000636934', 0, '2019-02-18 17:36:07', '2019-02-19 11:26:42'),
(5, 1, 1, 'Hậu VTA', 'Hậu', 'Phan Hữu', '148/12/7/21 Tôn Đản, Phường 8, Quận 4', '', '0935457566', '', 0, '2019-02-22 11:33:06', '2019-02-24 11:11:46'),
(6, 1, 1, 'Nam Cargo', 'Nam', 'Trần Văn', '', 'netnam82@gmail.com', '+81 - 036912.9337', 'Vietcombank chi nhánh Thành Công\r\n0451000229321\r\n\r\n+84 93 457 42 39', 0, '2019-03-01 18:14:00', '2019-03-06 13:02:46'),
(7, 1, 2, 'Nguyễn Tiến ', 'Dũng', '', '830-0033 福岡県久留米市天神町82-3天神ウエノビル405号', '', '08064337979', '830-0033\r\n福岡県久留米市天神町82-3天神ウエノビル405号', 0, '2019-03-12 10:29:08', '2019-03-12 10:29:08');

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
(2, 'Nhat Ban', 'jp');

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
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0:new;1:wait to deliver;2:received;3:deliver out of country;4:end trip and wait to deliver to client;5:delivering to client;6:end trip',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'type of good',
  `brand_id` smallint(5) UNSIGNED DEFAULT NULL COMMENT 'branchname of goods',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `size`, `unit`, `price`, `wholesale_price`, `quantity`, `image`, `category_id`, `brand_id`, `remarks`, `disabled`, `created`, `updated`) VALUES
(1, 1, 'The Collagen Kobikatsu Collagen Powder V', '126g', '', 650000, 0, 21, 'shiseido-collagen-powder.jpg', 7, 7, '', 0, '2019-03-20 12:18:22', '2019-03-22 15:47:46'),
(2, 1, 'Slim Up Slim Berry Yogurt (Strawberry)', '300g', '', 650000, 0, 10, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Mixberry.jpg', 9, 8, 'dâu', 0, '2019-03-20 13:03:13', '2019-03-27 03:21:36'),
(3, 1, 'Slim Up Slim Mango', '300g', '', 650000, 0, 0, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Mango.jpg', 9, 8, '', 0, '2019-03-20 13:06:09', '2019-03-20 13:06:10'),
(4, 1, 'Say xe Aneron 9 Viên', '9 viên', '', 200000, 0, 19, 'aneron_9.jpg', 10, 5, 'Thuốc chống say xe', 0, '2019-03-20 13:09:54', '2019-03-25 13:21:49'),
(5, 1, 'Slim Up Slim Mix Berry Latte', '315g', '', 650000, 0, 10, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Mix_Berry_Latte.jpg', 9, 8, 'mix nhiều loại trái berry', 0, '2019-03-20 14:02:57', '2019-03-27 03:22:44'),
(6, 1, 'Slim Up Slim Matcha Latte', '315g', '', 650000, 0, 0, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Matcha_Latte.jpg', 9, 8, 'Trà xanh', 0, '2019-03-20 14:09:32', '2019-03-20 14:09:32'),
(7, 1, 'Slim Up Slim Cafe Latte 360g', '360g', '', 650000, 0, 0, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Cafe_Latte.jpg', 9, 8, '', 0, '2019-03-20 14:11:01', '2019-03-20 14:11:02'),
(8, 1, 'Transino Whitening Repair Cream 35g', '35g', 'hộp', 848000, 0, 10, 'transino_whitening_repair_cream.jpg', 7, 6, 'Kem đêm\r\nトランシーノ薬用ホワイトニングリペアクリーム　（夜用美白クリーム）', 0, '2019-03-20 14:55:04', '2019-03-25 11:20:46'),
(9, 1, 'Transino Whitening Day Protector SPF35 PA+++ 40ml', '40ml', 'chai', 763000, 0, 2, 'transino_whitening_day_protector_SPF35_PA+++.jpg', 7, 6, 'chống nắng Transino\r\nトランシーノ薬用ホワイトニングデイプロテクター（日中用乳液）（40ml）［日焼け止め］', 0, '2019-03-20 14:56:21', '2019-03-22 11:26:57'),
(10, 1, 'Transino Whitening Clear Lotion 175ml', '175ml', 'hộp', 1100000, 0, 4, 'transino_whitening_clear_lotion.jpg', 7, 6, 'nước hoa hồng\r\nトランシーノ薬用ホワイトニングクリアローション　（美白化粧水）　175ml', 0, '2019-03-20 15:07:03', '2019-03-25 12:05:08'),
(11, 1, 'Transino Whitening Esscence EX 30g', '30g', 'tuýp', 1500000, 0, 8, 'transino_whitening_essence_ex.jpg', 7, 6, 'Serum\r\nトランシーノ薬用 ホワイトニングエッセンス ＥＸ 30g', 0, '2019-03-20 15:12:15', '2019-03-22 17:57:55'),
(12, 1, 'Transino Whitening Clear Milk 120ml', '120ml', 'tuýp', 1000000, 0, 0, 'transino_whitening_clear_milk.jpg', 7, 6, 'Sữa dưỡng\r\nトランシーノ薬用ホワイトニングクリアミルク　120ml', 0, '2019-03-20 15:19:49', '2019-03-20 16:06:16'),
(13, 1, 'Transino ii 240', '240viên', 'hộp', 1600000, 0, 2, 'transino_ii_240.jpg', 10, 6, 'thuốc trị nám, tàn nhang\r\nトランシーノII　240錠\r\nトランシーノ 錠剤 しみ そばかす', 0, '2019-03-20 15:53:27', '2019-03-22 13:05:09'),
(14, 1, 'Transino WhiteC Clear 120 tablets', '120 viên', 'hộp', 750000, 0, 21, 'transino_whiteC_clear.jpg', 10, 6, 'thuốc trắng da, trị nám\r\nトランシーノ　ホワイトCクリア　120錠 ', 0, '2019-03-20 16:00:17', '2019-03-25 15:15:05'),
(15, 1, 'DHC Vitamin C 60 Days (120 Tablets)', '120 viên', 'bịch', 160000, 0, 12, 'dhc_vitamin_C_60days.jpg', 10, 9, 'DHC ビタミンC ハードカプセル 60日(120粒)', 0, '2019-03-20 16:36:23', '2019-03-22 11:37:32'),
(16, 1, 'DHC Hatomugi 20 Days (20 Tablets)', '20 viên', 'bịch', 150000, 0, 24, 'dhc_hatomugi_20days.jpg', 10, 9, 'trắng da\r\nＤＨＣ はとむぎエキス ２０日分 ２０粒入', 0, '2019-03-20 16:50:58', '2019-03-22 12:30:01'),
(17, 1, 'Inclear 1.7g×10', '10', 'cây', 1000000, 0, 0, 'inclear_vaginal_cleaner_10.jpg', 10, 0, 'Inclear - Vaginal Cleaner\r\n', 0, '2019-03-20 16:58:46', '2019-03-20 17:04:58'),
(18, 1, 'Attonon EX Gel 15g', '15 g', 'tuýp', 400000, 0, 0, 'attonon_ex_gel_15g.jpg', 11, 10, 'Gel liền xẹo\r\nアットノンEX ジェル 15g ', 0, '2019-03-20 17:12:07', '2019-03-20 17:16:31'),
(19, 1, 'Slim Up Slim Kiwi 300g', '300 g', 'bịch', 650000, 0, 0, 'ASAHI_Slim_Up_Slim_Meal_Replacement_Kiwi.jpg', 9, 8, 'スリムアップスリム　ベジフルチャージスムージー　300g ', 0, '2019-03-20 17:22:41', '2019-03-20 17:24:10'),
(20, 1, 'iSDG Diet Beauty 121 (pink) 30 days (60 tablets)', '60 viên', 'bịch', 200000, 0, 8, 'iSDG_diet_beauty_121_pink.jpg', 9, 11, 'giảm cân', 0, '2019-03-20 17:37:06', '2019-03-25 13:59:04'),
(21, 1, 'iSDG Diet 121 (blue) 30 days (60 tablets)', '60 viên', 'bịch', 200000, 0, 5, 'iSDG_diet_beauty_121_blue.jpg', 9, 11, 'giảm cân', 0, '2019-03-20 17:52:35', '2019-03-25 14:00:15'),
(22, 1, 'iSDG Diet Hot 121 (red) 30 days (60 tablets)', '60 viên', 'bịch', 200000, 0, 6, 'iSDG_diet_beauty_121_red.jpg', 9, 11, 'giảm cân', 0, '2019-03-20 17:57:26', '2019-03-25 13:57:01'),
(23, 1, '232 Diet Enzyme Premium (120 tablets) (green)', '120 viên', 'bịch', 800000, 0, 5, 'iSDG_diet_green_232.jpg', 9, 11, 'giảm cân\r\n232ダイエット酵素プレミアム（120粒）\r\n🍀🍀🍀🍀🍀Công dụng của viên uống giảm cân thực vật lên men Enzyme Diet Premium nhật bản\r\nViên uống giảm cân thực vật lên men enzyme diet premium nhật bản được chiết xuất từ hơn 232 loại rau củ quả tự nhiên lên men giúp đốt cháy mỡ thừa tốt nhất, giúp bạn trở lại dáng thon gọn. \r\n👉Với Enzyme diet Premium không những giúp bạn giảm cân hiệu quả mà còn làm cho bạn khỏe, trẻ đẹp ra với công dụng như sau:\r\n\r\n-👉Viên uống giảm cân Enzyme Diet Premium Nhật Bản hỗ trợ đào thải mỡ, đốt cháy mỡ thừa trong cơ thể giúp giảm cân\r\n\r\n- 👉Enzyme Diet Premium Nhật Bản bổ sung chất xúc tác để phân giải hết năng lượng trong cơ thể để tránh tích tụ mỡ.\r\n\r\n- 👉Viên giảm cân Enzyme Diet Premium thanh lọc cơ thể, tăng sức đề kháng phòng ngừa bệnh\r\n\r\n- 👉Enzyme rất cần thiết cho các hoạt động trao đổi chất trong tế bào khi tuổi càng cao thì Enzyme càng giảm vì vậy hoạt động trao đổi chất cũng giảm theo nên đó cũng là nguyên nhân bạn ăn ít hơn lúc còn trẻ mà tại sao ngày càng mập ra, vì thế cần bổ sung enzyme từ bên ngoài.\r\n\r\n🍀🍀🍀Viên uống giảm cân Enzyme Diet Premium còn được bổ sung thêm men Koubo và Koji tự nhiên từ ngũ cốc giúp phân giải đường để tạo năng lượng cho cơ thể hoạt động khỏe mạnh.\r\n🥰🥰Ngày 2 lần mỗi lần 2 viên viên uống giảm cân thực vật lên men Enzyme Diet Premium Nhật Bản vào buổi sáng hoặc tối, uống trước bữa ăn 30 phút.', 0, '2019-03-20 18:03:16', '2019-03-31 02:21:20'),
(24, 1, 'WHITE CONC Watery Cream II 90g', '90 g', 'chai', 450000, 0, 1, 'white_conc_body_gel.jpg', 7, 0, '薬用ホワイトコンク　ウォータリークリームII　90g', 0, '2019-03-20 18:11:27', '2019-03-22 16:12:53'),
(25, 1, 'WHITE CONC Body Sampoo CII 360ml', '360 ml', 'chai', 0, 0, 0, 'white_conc_body_sampoo.jpg', 7, 0, '薬用ホワイトコンク　ボディシャンプーCII　360ml', 0, '2019-03-20 18:18:17', '2019-03-20 18:28:24'),
(26, 1, 'Pueraria Mirifica 99EX (66 tablets)', '66 viên', 'hộp', 1100000, 0, 6, 'pueraria_mirifica_99_ex.jpg', 10, 0, 'プエラリア99EX（66粒）', 0, '2019-03-20 18:31:07', '2019-03-22 17:17:49'),
(27, 1, 'Botanical Oil Hair Treatment 100ml', '100 ml', 'chai', 500000, 0, 11, 'botanical_hair_oil.jpg', 7, 12, 'dưỡng tóc botanical\r\nArgan Serum Vitamin Not washed type 100ml.', 0, '2019-03-22 10:48:08', '2019-03-22 15:58:02'),
(28, 1, 'Botanical Honey Oil Hair Treatment 100ml', '100 ml', 'chai', 0, 0, 0, 'botanical_honey_hair_oil.jpg', 7, 12, 'dưỡng tóc botanical\r\nArgan Serum Vitamin Not washed type 100ml.', 0, '2019-03-22 10:51:47', '2019-03-22 10:52:27'),
(29, 1, 'Plant Liquid Capsule 350 (60 capsules)', '350 viên', 'bịch', 350000, 0, 5, 'plant_liquid_capsule_350.jpg', 8, 0, '', 0, '2019-03-22 11:05:08', '2019-03-25 14:51:35'),
(30, 1, 'SANTEN FX Neo Eye Drop 12ml', '12 ml', 'chai', 140000, 0, 10, 'santen_fx_neo_black_12ml.jpg', 13, 13, '', 0, '2019-03-22 12:19:04', '2019-03-22 12:23:14'),
(31, 1, 'DHC Hyaluronic Acid 60 Days (120 Tablets)', '120 viên', 'bịch', 555000, 0, 1, 'dhc_axit_hiaruron_60days.jpg', 10, 9, 'viên cấp nước\r\nDHC ヒアルロン酸 60日分 120粒', 0, '2019-03-22 12:40:30', '2019-03-22 12:51:51'),
(32, 1, 'Mentholatum Medical Lip 8.5g', '8.5 g', 'tuýp', 220000, 0, 1, 'mentholatum_medicare_lip.jpg', 11, 14, 'Trị lở miệng Rohto\r\nロート製薬 メンソレータム メディカルリップnc (8.5g) 口唇炎・口角炎治療薬', 0, '2019-03-22 13:18:54', '2019-03-22 13:26:14'),
(33, 1, 'Anessa Whitening UV Geln SPF 50+ PA++++ 90g', '90 g', 'tuýp', 600000, 0, 2, 'anessa_white.png', 14, 7, 'シミを防ぐ薬用美白*UVジェル\r\nホワイトニングUV ジェルn （医薬部外品）\r\n〈日焼け止め用ジェル〉90g', 0, '2019-03-22 15:36:17', '2019-03-22 15:42:10'),
(34, 1, 'Anessa Perfect Skin Gel SPF 50+ PA++++ 90g', '90 g', 'tuýp', 600000, 0, 9, 'anessa_gold.png', 14, 7, 'スキンケアする強力UVジェル\r\nパーフェクトUV スキンケアジェル\r\n〈日焼け止め用ジェル〉90g\r\nChống nắng toàn diện với Anessa Whitening UV Sunscreen Gel\r\n🍀🍀🍀🍀🍀Gel chống nắng dưỡng trắng Anessa Whitening UV Sunscreen Gel 90g:\r\nlà giải pháp chống nắng toàn diện, hiệu quả. Với công nghệ Aqua Booster chống nước kết hợp cùng hoạt chất làm mờ vết thâm nám, giúp bảo vệ làn da khỏi tác hại của ánh nắng mặt trời, đồng thời cung cấp thành phần dưỡng da cho bạn làn da trắng sáng rạng rỡ.\r\n\r\n🍀🍀🍀Công dụng của gel chống nắng dưỡng trắng Anessa Whitening UV Sunscreen:\r\n- ❄️Chỉ số chống nắng cao, bảo vệ làn da bạn dưới tác hại của ánh nắng mặt trời. \r\n- ❄️Chứa thành phần dưỡng trắng và dưỡng ẩm da, ức chế sự phát triển của hắc tố melanin, trả lại làn da trắng sáng, đều màu.\r\n- ❄️Chống lão hóa da và dưỡng ẩm chuyên sâu cho làn da mềm mịn, mượt mà.\r\n- ❄️Dạng gel sữa thấm nhanh vào da, không gây bết dính, bí bách tạo cảm giác thoải mái, thông thoáng cho da, hạn chế gây mụn.\r\n\r\n🍀🍀🍀Hướng dẫn sử dụng gel chống nắng dưỡng trắng Anessa Whitening UV Sunscreen:\r\n- 🥑Thoa kem trước khi ra nắng 15-20 phút để kem có thời gian phát huy hiệu quả và giúp những dưỡng chất thấm sâu vào da.\r\n- 🍓Bước 1: Thực hiện các bước chăm sóc da cơ bản, sử dụng kem chống nắng sau khi dưỡng ẩm. \r\n- 🍓Bước 2: Làm sạch tay, lắc đều và sử dụng:\r\n+ 🥝Đối với vùng mặt: Cho một lượng vừa đủ (khoảng bằng hạt ngọc trai) thoa đều lên mặt và cổ theo hướng từ trong ra ngoài, vỗ nhẹ để kem thấm vào da tốt hơn.\r\n+ 🥝Đối với cơ thể: Cho sản phẩm lên da theo đường dọc cơ thể, nên sử dụng một lượng nhiều sản phẩm và thoa bằng lòng bàn tay với động tác xoay tròn.\r\n- 🍓Bước 3: Thoa lại sau 2-3 giờ tiếp xúc với nắng để được bảo vệ tối ưu nhất.\r\n\r\n* Kem chống nắng Anessa màu vàng: Khả năng chống thấm nước vượt trội, thích hợp cho người chơi thể thao, đi biển.', 0, '2019-03-22 15:36:27', '2019-03-31 01:40:06'),
(35, 1, 'Labo BB Essence Cream SPF50 PA++++ 03 33g', '33 g', 'tuýt', 320000, 0, 4, 'labo_essence_cream_03.jpg', 12, 15, 'モイストラボBB エッセンスクリーム ナチュラルオークル(SPF50 PA++++) 33g', 0, '2019-03-22 16:55:31', '2019-03-22 17:01:45'),
(36, 1, 'Labo BB Essence Cream SPF50 PA++++ 01 33g', '33 g', 'tuýt', 320000, 0, 2, 'labo_essence_cream_01.jpg', 12, 15, 'モイストラボBBエッセンスクリームナチュラルベージュ', 0, '2019-03-22 17:04:08', '2019-03-22 17:08:25'),
(37, 1, 'Merano CC 20ml', '20 ml', 'tuýp', 350000, 0, 3, 'merano_cc.jpg', 0, 14, 'メラノCC 薬用しみ集中美容液20ml', 0, '2019-03-22 17:25:59', '2019-03-22 17:45:16'),
(38, 1, 'AQUALABEL Special Gel Cream Oil In 90g', '90 g', '', 570000, 0, 5, 'aqualabel_special_gel_cream_oil_in_gold_90g.jpg', 12, 7, 'アクアレーベル スペシャルジェルクリーム (オイルイン) エイジングケアタイプオールインワン 90g', 0, '2019-03-22 18:30:11', '2019-03-30 11:21:26'),
(39, 1, 'Shu Uemura Smoothfit Mineral Foundation', '', '', 1200000, 1150000, 1, 'shu_uemura_spf_18_pa++.jpg', 15, 16, 'シュウウエムラ スムースフィット ミネラル ファンデーション\r\nhttps://www.shuuemura.jp/?p_id=MFD009', 0, '2019-03-22 18:43:02', '2019-03-31 00:32:18'),
(40, 1, 'AQUALABEL White Up Cream 50g (Blue)', '50 g', '', 570000, 0, 1, 'shiseido_aqua_blue.jpg', 12, 7, 'アクアレーベル ホワイトアップ クリーム 保湿・美白クリーム (3) とてもしっとり 50g ', 0, '2019-03-25 14:09:25', '2019-03-25 14:16:18'),
(41, 1, 'Skin Aqua Tone Up UV Essence SPF 50+ PA++++ 80g', '80 g', 'tuýp', 350000, 0, 5, 'skin_aqua_uv.jpg', 14, 14, 'SKIN AQUA（スキンアクア） トーンアップUVエッセンス （80g）', 0, '2019-03-25 14:31:22', '2019-03-25 14:44:35'),
(42, 1, 'Chondroitin ZS Tablets 270 (tablets)', '270 viên', 'hủ', 1900000, 0, 3, 'chonroitin_zs_270.jpg', 10, 17, 'コンドロチンZS錠（270錠）', 0, '2019-03-25 15:23:13', '2019-03-25 15:29:42'),
(43, 1, 'Sekkisei White UV Milk Kit', '', 'bộ', 700000, 0, 5, 'kose_white_uv_milk.jpg', 14, 18, '雪肌精 (せっきせい) ホワイトUVミルクキット（日焼止め乳液・化粧水付） ［日焼け止め］', 0, '2019-03-26 18:30:12', '2019-03-30 03:26:17'),
(44, 1, 'Dental Medicare Cream 5g', '5 g', 'tuýp', 300000, 0, 2, 'medicare_dental.jpg', 16, 19, '【第2類医薬品】 メディケアデンタルクリーム（5g）', 0, '2019-03-26 18:38:56', '2019-03-31 02:45:46'),
(45, 1, 'WHITE CONC Body Gommage C', '', 'chai', 450000, 0, 1, 'white_conc_body_gommage.jpg', 7, 0, '薬用ホワイトコンク ボディゴマージュCII\r\ntẩy tế bào chết', 0, '2019-03-26 18:49:06', '2019-03-30 03:34:53'),
(46, 1, 'Sekkisei White UV Gel Kit', '', 'bộ', 650000, 0, 5, 'kose_white_uv_gel.jpg', 14, 18, '雪肌精 (せっきせい) ホワイトUVジェルキット（日焼止め乳液・化粧水付） ［日焼け止め］', 0, '2019-03-30 01:34:32', '2019-03-30 03:30:09'),
(47, 1, 'Spirulina 100% Kaiyoushinsosui Spirulina Blend 2200 tablets', '2200 viên', 'hủ', 800000, 0, 1, 'supirurina_2200.jpg', 8, 0, 'スピルリナ100% 海洋深層水スピルリナブレンド 2200粒\r\nTảo xoắn', 0, '2019-03-30 03:44:15', '2019-03-30 04:04:02'),
(48, 1, 'Night Diet Tea (2g x 20 follicles)', '20 gói', 'bịch', 300000, 0, 5, 'night_diet_tea.jpg', 9, 20, 'Trà giảm cân', 0, '2019-03-30 10:28:20', '2019-03-30 10:31:07'),
(49, 1, 'DHC Vitamin B Mix 60 days (120 tablets)', '120 viên', 'bịch', 240000, 0, 5, 'dhc_vitamin_B_60days.jpg', 10, 9, 'DHC（ディーエイチシー） ビタミンBミックス 60日分（120粒）〔栄養補助食品〕', 0, '2019-03-30 10:32:09', '2019-03-30 11:09:23'),
(50, 1, 'DHC Multi Vitamin 60 days (120 tablets)', '120 viên', 'bịch', 260000, 0, 5, 'dhc_multi_vitamin_60days.jpg', 10, 9, 'DHC（ディーエイチシー） マルチビタミン 60日分（60粒）〔栄養補助食品〕', 0, '2019-03-30 11:11:12', '2019-03-30 11:17:19'),
(51, 1, 'DHC Fragrant Bulgarian Rose 20 days (40 tablets)', '40 viên', 'bịch', 350000, 0, 10, 'dhc_burugaria_rose_20days.jpg', 10, 9, 'DHC（ディーエイチシー） 香るブルガリアンローズ 20日分（40粒）〔栄養補助食品〕\r\n🌹🌹🌹🌹🌹Viên uống dầu hoa hồng thơm cơ thể DHC:20 ngày\r\n🌹Viên uống dầu hoa hồng thơm cơ thể DHC kết hợp thành phần Citronellol (có trong tinh dầu xả) và Geraniol (có trong tinh dầu hoa hồng) là một chất chống oxy hóa tự nhiên và hương thơm của nó khi vào cơ thể, sẽ được bài tiết qua lỗ chân lông, tạo mùi ngọt tự nhiên có thể kéo dài hàng giờ.\r\n\r\n🌹Trong dầu hoa hồng là chất chống oxy hóa mạnh, nó có đến 850 thành phần có thể tạo ra mùi hương cho cơ thể, bạn sẽ cảm nhận được cơ thể sẽ thay đổi sau 2-3 giờ uống.\r\n🌹Có thể nói, cơ thể có mùi tuy không gây hại nhưng nó vô tình làm chúng ta mất đi cảm giác tự tin trong giao tiếp, mọi người sẽ vô tình cảm thấy khó chịu và muốn đứng xa mình 1 chút. \r\n🌹🌹Liều dùng:\r\nUống mỗi ngày 2 viên sau bữa ăn để duy trì và tránh được sự tiết mùi không đáng có.', 0, '2019-03-30 12:47:15', '2019-03-31 01:47:47'),
(52, 1, 'DHC Vitamin E 60 days (60 tablets)', '60 viên', 'bịch', 260000, 0, 5, 'dhc_vitamin_E_60days.jpg', 10, 9, 'DHC（ディーエイチシー） ビタミンE 60日分（60粒）〔栄養補助食品〕', 0, '2019-03-30 13:09:25', '2019-03-30 13:13:59'),
(53, 1, 'Inochi no haha 420 pills', '420 viên', 'hủ', 720000, 0, 1, 'inochinohana_420.jpg', 10, 21, '【第2類医薬品】 女性保健薬命の母A（420錠）', 0, '2019-03-30 22:22:30', '2019-03-30 22:23:50'),
(54, 1, 'Nakatta Kotoni Red 120 pills', '120 viên', 'bịch', 550000, 0, 4, 'nakatta_kotoni_red.jpg', 9, 22, 'なかったコトに　９９粒\r\n🍏🍏🍏Enzyme giảm cân ban ngày từ đậu trắng tây: màu đỏ\r\n👉Enzym giảm cân ban ngày của Nhật có tác dụng ngăn chặn lại quá trình hấp thu các chất béo, đốt cháy thành mỡ thừa, carlories ở những người thừa cân và béo bụng sẽ được đào thải theo đường bài tiết một cách tự nhiên và từ từ, enzym có trong viên béo giúp hệ tiêu hóa được hoạt động tốt hơn.\r\n\r\n👉Khi sử dụng enzym giảm cân ban ngày bạn yên tâm là cơ thể khỏe mạnh, hoạt bát, nhanh nhẹn hơn, không phải lo với những bài tập thể dục mạnh, không phải ăn kiêng, không lo viên uống khó uống. Mà ngược lại viên uống giúp bạn giữ lại đc vóng dáng thon gọn mà không phải thực hiện chế độ ăn khắc nghiệt.\r\n\r\n🐥🐥🐥Enzym giảm cân ban ngày có những công dụng gì?\r\n😱Enzym giảm cân bằng thảo dược được lên men hơn 1000 ngày đang là trào lưu được người tiêu dùng nhật tin tưởng truy tìm ở tất cả các kệ siêu thị, store…với công dụng tuyệt vời nhất mà y học Nhật đã chỉ ra mọi vấn đề sức khỏe, sắc đẹp giảm cân đều bắt nguồn từ hệ tiêu hóa.\r\n😱Chính vì thế muốn giảm cân hiệu quả và an toàn bạn phải dùng enzym lên men để giúp hệ tiêu hóa đặc biệt là hệ vi khuẩn đường ruột được khỏe mạnh, giúp kích thích sản xuất năng lượng, tăng cường trao đổi chất, không tích tụ mỡ thừa để có thể giảm cân nhanh.\r\n😱Hỗ trợ đốt cháy calo và carbohydrate\r\n😱Thanh lọc cơ thể, giúp tăng sức đề kháng cho cơ thể phòng ngừa bệnh.\r\n😱Giảm phù nề hiệu quả.\r\n👌👌Với thành phần đậu thận trắng, bột lá sen, bột trà xanh được lên men giúp ngăn ngừa các chất béo có trong thức ăn, đốt cháy mỡ một cách tự nhiên, hiệu quả an toàn, đem đến cho bạn thân hình vóc dáng cân bằng.\r\nCách sử dụng enzyme giảm cân ban ngày như sau:120 viên 40 ngày\r\n• Ngày uống 3 viên vào buổi sáng\r\n• Nên dùng viên uống trước bữa ăn 30 phút\r\n• Nên sử dụng viên uống với nhiều nước ấm', 0, '2019-03-30 22:30:57', '2019-03-30 22:56:32'),
(55, 1, 'Nakatta Kotoni Night Diet Supplement 30 pills', '30 viên', 'bịch', 550000, 0, 4, 'nakatta_kotoni_night.jpg', 9, 22, 'なかったコトに!夜用ダイエットサプリ 30粒\r\n🍏🍏🍏Enzyme giảm cân ban đêm:màu xanh\r\n👉Dù biết rằng nạp quá nhiều calories sau những bữa nướng, lẩu vào buổi tối, nó làm thân hình bạn càng thêm phì nhiêu, nhưng cũng không thể bỏ qua những bữa tiệc, những buổi liên hoan tụ tập công ty, bạn bè được.\r\n\r\n👉Vậy sau những bữa ăn quá thừa calor đó bạn làm thế nào để vẫn duy trì vóng dáng cân đối đó, những đồ ăn luôn hấp dẫn nhưng nó lại quá nhiều đạm và chất béo, những chất béo đó khi vào cơ thể nó sẽ tích tụ, lâu ngày thì càng khó giảm, bạn có thể chọn giải pháp đi tập thể dục, tập gym, hay giảm ăn nhưng không đảm bảo sức khỏe cho công việc hàng ngày.\r\n👉Nên những người cơ thể hấp thụ tốt, mà lại lười vận động…. các nhà nghiên cứu của Graphico của Nhật đã nghiên cứu và đưa ra thị trường Enzym dâu tây trắng giúp thanh lọc cơ thể, giảm cân, phá hủy các khối mỡ thừa, Enzym dâu tây trắng giúp thúc đẩy quá trình tiêu hóa mạnh, đào thải các chất mỡ thừa ra khỏi cơ thể, nhờ enzym dâu tây trắng mà bạn hãy quên đi những chế độ ăn khắc nghiệt và những bài tập thể dục nặng, mang lại cho bạn vóc dáng cân bằng và sức khỏe.\r\n👌👌Thành phần trong Enzyme giảm cân ban đêm của Nhật\r\n+ Dâu tây trắng, tinh bột, nghệ tươi, bột lô hội Nam Phi, râu ngô, ngũ cốc, gừng đen, xả chanh, macca hữu cơ, súp lơ, cây trúc quỳ, cỏ râu mèo, gelatin, silicon dioxide, bột hến, arginine….\r\nCách sử dụng enzyme giảm cân ban đêm như sau:30 viên 15 ngày\r\n* Ngày sử dụng 2 viên trước khi đi ngủ\r\n* Nên uống với nước ấm để đạt hiệu quả tốt nhất', 0, '2019-03-30 23:20:19', '2019-03-30 23:23:39'),
(56, 1, 'Honey Butter Almond 250 g', '250 g', 'bịch', 350000, 320000, 2, 'honey_butter_almond.jpg', 17, 0, 'ハニーバターアーモンド 250g', 0, '2019-03-31 00:14:15', '2019-03-31 01:06:36'),
(57, 1, 'Caramel Almond & Pretzel 210 g', '210 g', 'bịch', 350000, 320000, 2, 'caramel_almond_pretzel.jpg', 17, 0, 'アーモンド　キャラメルアーモンド ＆ プレッツェル　ハニーバターアーモンド系列　\r\nCARAMEL ALMOND&PRETZEL/ Besmiが販売/ゆうパケット便', 0, '2019-03-31 00:38:17', '2019-03-31 01:06:49'),
(58, 1, 'Honey Butter MixNut 220 g', '220 g', 'bịch', 350000, 320000, 2, 'honey_butter_mixnut.jpg', 17, 0, 'ハニーバターミックスナッツ/220g\r\nHONEY BUTTER MIXNUT', 0, '2019-03-31 00:41:41', '2019-03-31 01:07:04'),
(59, 1, 'DHC Soy Isoflavones Absorption Type 20 days (40 tablets)', '40 viên', 'bịch', 310000, 0, 5, 'dhc_soy_isoflavones_absorption_type.jpg', 10, 9, 'DHC（ディーエイチシー） 20日大豆イソフラボン吸収型（40粒）〔栄養補助食品〕\r\n🍀🍀🍀🍀🍀Viên uống mầm đậu nành DHC:20 ngày 40 viên\r\n👉Tinh chất mầm đậu nành DHC bổ sung hoạt chất insoflavone được chiết xuất từ đậu nành, được xem là một trong những thành phần rất quan trọng làm giảm hoạt động của estrogen nội sinh ở phụ nữ, giảm nguy cơ ung thư tử cung và ung thư vú.\r\n👉Ở nam giới Hormone Androgen, Testosterol quyết định vẻ nam tính, cơ bắp săn chắc, thì sự mềm mại ở nữ giới đó chính là Estrogen. Tuy nhiên sau tuổi 30 khả năng cơ thể tự sản sinh Estrogen suy giảm dần, cơ thể bắt đầu có những dấu hiệu của quá trình lão hóa. Da xuất hiện nếp nhăn, giảm độ đàn hồi, chức năng sinh lý suy giảm, da tóc khô, khô âm đạo khiến nhiều chị em mất tự tin. Không những thế hiện nay nhiều phụ nữ trẻ thiếu hụt hormone estrogen cũng gây vấn đề suy giảm khả năng sinh lý, ngực nhỏ, da nhiều mụn trứng cá…\r\nTinh chất mầm đậu nành DHC có thể được xem là viên thần dược cho sức khoẻ và sắc đẹp của phụ nữ, bởi vì trong viên thuốc có chứa hoạt chất insoflavone được chiết xuất từ đậu nành, được xem là một trong những thành phần rất quan trọng làm giảm hoạt động của estrogen nội sinh ở phụ nữ, giảm nguy cơ ung thư tử cung và ung thư vú .\r\n\r\n🍀🍀🍀Công dụng viên uống mầm đậu nành DHC:\r\nTăng dịch tiết âm đạo,điều hòa kinh nguyệt, chống suy thoái chức năng buồng trứng, làm chậm quá trình lão hóa, giảm nám, giúp da bóng mịn và hồng hào.\r\nCải thiện nhiều triệu chứng tiền mãn kinh như: mất ngủ, đau đầu, giảm trí nhớ, loãng xương, người mệt mỏi, đau xương khớp, ra mồ hôi trộm.\r\n🍀🍀🍀Hướng dẫn sử dụng:Thiên về vóc dáng', 0, '2019-03-31 00:49:46', '2019-03-31 01:03:44'),
(60, 1, 'DHC Soy Isoflavones 20 days (40 tablets)', '40 viên', 'bịch', 310000, 0, 5, 'dhc_soy_isoflavones.jpg', 10, 9, '大豆イソフラボン　20日分（40粒）', 0, '2019-03-31 01:03:07', '2019-03-31 01:06:13'),
(61, 1, 'DHC Placenta 20 days (60 tablets)', '60 viên', 'bịch', 300000, 0, 5, 'dhc_placenta.jpg', 10, 9, 'DHC（ディーエイチシー） プラセンタ 20日分（60粒）〔栄養補助食品〕\r\n🐑🐑🐑🐑🐑Viên uống DHC nhau thai cừu 3600mg: 60 viên dùng trong 20 ngày\r\nViên uống DHC chứa thành phần Nhau thai cừu 3600mg,ngoài ra sản phẩm còn bổ sung các thành phần Vitamin B2 cùng Axit Amin, Carbohydrate, Enzyme, thành phần dầu Olive, thành phần sáp ong và các khoáng chất cần thiết giúp nuôi dưỡng và bổ sung sâu từ các tế bào bên trong cơ thể, từ đó giúp cơ thể luôn khỏe mạnh, giúp phục hồi nét thanh xuân và đánh bật dấu hiệu của tuổi tác.\r\n🐑🐑🐑Những công dụng:\r\n👉🐑Nhật Bản là tinh chất nuôi dưỡng vẻ đẹp của chị em phụ nữ từ sâu bên trong, đặt biệt là với phụ nữ độ tuổi mãn kinh giúp làn da trở nên mịn màng, những đốm nâu được làm mờ và ngăn cản các tác nhân hình thành nếp nhăn, tàng nhang hiệu quả.\r\n👉🐑Không những thế, sản phẩm viên vitamin DHC Nhật Bản này còn tốt cho sinh lý nữ, giúp phòng chống các bệnh về sinh dục hiệu quả.', 0, '2019-03-31 01:49:44', '2019-03-31 02:00:22'),
(62, 1, '232 Nighttime Diet Enzyme Premium (120 tablets) (blue)', '120 viên', 'bịch', 800000, 0, 5, 'iSDG_diet_night_232.jpg', 9, 11, 'giảm cân\r\n232種の酵素シリーズ　夜間Diet酵素プレミアム (120粒) ', 0, '2019-03-31 02:16:51', '2019-03-31 02:23:48'),
(63, 1, '232 Refreshing Enzyme Premium (120 tablets) (white)', '120 viên', 'bịch', 800000, 0, 5, 'iSDG_refreshing_232.jpg', 9, 11, 'giảm cân\r\n232爽快酵素プレミアム（120粒）', 0, '2019-03-31 02:24:40', '2019-03-31 02:29:14'),
(64, 1, '232 Beauty Enzyme (120 tablets) (pink)', '120 viên', 'bịch', 800000, 0, 5, 'iSDG_beauty_232.jpg', 9, 11, 'giảm cân\r\n232種の酵素シリーズ　美妃酵素（ビューティーこうそ）＋真珠＆ツバメの巣　(120粒) ［美容］', 0, '2019-03-31 02:30:24', '2019-03-31 02:34:18');

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
(1, 1, 9, 1, 2),
(2, 1, 1, 1, 16),
(3, 1, 15, 1, 12),
(4, 1, 10, 1, 3),
(5, 1, 8, 1, 7),
(6, 1, 11, 1, 7),
(7, 1, 30, 1, 10),
(8, 1, 4, 1, 14),
(9, 1, 13, 1, 2),
(10, 1, 16, 1, 24),
(11, 1, 31, 1, 1),
(12, 1, 14, 1, 13),
(13, 1, 32, 1, 1),
(14, 1, 26, 1, 4),
(15, 1, 33, 1, 2),
(16, 1, 34, 1, 7),
(17, 1, 1, 2, 5),
(18, 1, 27, 1, 7),
(19, 1, 27, 2, 4),
(20, 1, 24, 1, 1),
(21, 1, 4, 2, 5),
(22, 1, 35, 1, 2),
(23, 1, 35, 2, 2),
(24, 1, 36, 2, 2),
(25, 1, 26, 2, 2),
(26, 1, 37, 1, 2),
(27, 1, 37, 2, 1),
(28, 1, 11, 2, 1),
(29, 1, 14, 2, 8),
(30, 1, 38, 1, 5),
(31, 1, 39, 1, 1),
(32, 1, 8, 2, 3),
(33, 1, 10, 2, 1),
(34, 1, 22, 1, 3),
(35, 1, 22, 2, 3),
(36, 1, 20, 2, 6),
(37, 1, 20, 1, 2),
(38, 1, 21, 2, 3),
(39, 1, 21, 1, 2),
(40, 1, 40, 1, 1),
(41, 1, 41, 1, 2),
(42, 1, 41, 2, 3),
(43, 1, 29, 1, 2),
(44, 1, 29, 2, 3),
(45, 1, 42, 1, 3),
(46, 1, 2, 1, 5),
(47, 1, 2, 2, 5),
(48, 1, 5, 1, 5),
(49, 1, 5, 2, 5),
(50, 1, 43, 1, 4),
(51, 1, 43, 2, 1),
(52, 1, 46, 1, 3),
(53, 1, 46, 2, 2),
(54, 1, 47, 1, 1),
(55, 1, 48, 1, 5),
(56, 1, 49, 1, 3),
(57, 1, 49, 2, 2),
(58, 1, 50, 1, 3),
(59, 1, 50, 2, 2),
(60, 1, 51, 1, 6),
(61, 1, 51, 2, 4),
(62, 1, 52, 1, 3),
(63, 1, 52, 2, 2),
(64, 1, 53, 1, 1),
(65, 1, 54, 1, 4),
(66, 1, 56, 1, 2),
(67, 1, 57, 1, 2),
(68, 1, 58, 1, 2),
(69, 1, 59, 1, 3),
(70, 1, 59, 2, 2),
(71, 1, 34, 2, 2),
(72, 1, 61, 1, 5),
(73, 1, 23, 1, 5),
(74, 1, 62, 1, 5),
(75, 1, 63, 1, 5),
(76, 1, 44, 1, 2);

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
(93, 61, 1, 864, 864, 300000, 4, 'donki kabukicho', '2019-03-31 02:00:22', '2019-03-31 02:00:22'),
(94, 23, 1, 2518, 1922, 800000, 5, 'donki shinjuku ĐN', '2019-03-31 02:14:04', '2019-03-31 02:14:04'),
(95, 62, 1, 2518, 1922, 800000, 5, 'donki shinjuku ĐN', '2019-03-31 02:23:48', '2019-03-31 02:23:48'),
(96, 63, 1, 2518, 1922, 800000, 5, 'donki shinjuku ĐN', '2019-03-31 02:28:22', '2019-03-31 02:28:22'),
(97, 44, 1, 1175, 1058, 300000, 2, 'donki shinjuku ĐN', '2019-03-31 02:45:45', '2019-03-31 02:45:45');

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
('37r7urtgcus465kgdr3u0uu8h3', 'General\\Core\\Manager\\Controllers\\InvoicesController|a:1:{s:10:\"parameters\";N;}navigated|i:1554055313;General\\Core\\Manager\\Controllers\\IndexController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\MainController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\SessionsController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\ProductsController|a:1:{s:10:\"parameters\";a:1:{s:5:\"order\";s:44:\"[General\\Core\\Manager\\Models\\Product].id ASC\";}}$PHALCON/CSRF$|s:15:\"waHB7LW3rG4YlFE\";auth|a:7:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:5:\"Khang\";s:5:\"login\";s:5:\"admin\";s:7:\"role_id\";s:1:\"4\";s:4:\"role\";s:7:\"manager\";s:12:\"role_display\";s:7:\"Manager\";s:11:\"role_demote\";i:1;}', 1554051295, 1554055313);

-- --------------------------------------------------------

--
-- テーブルの構造 `transports`
--

CREATE TABLE `transports` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profit` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'percent (0~100%)',
  `total` bigint(20) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'total invoice non profit',
  `increment` bigint(20) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'total invoice with profit',
  `rate` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'exchange rate',
  `total_rate` bigint(20) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'total invoice with rate',
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `other_costs`
--
ALTER TABLE `other_costs`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commons`
--
ALTER TABLE `commons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices_details`
--
ALTER TABLE `invoices_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_costs`
--
ALTER TABLE `other_costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `products_quantities`
--
ALTER TABLE `products_quantities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product_ins`
--
ALTER TABLE `product_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_invoices`
--
ALTER TABLE `transport_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
