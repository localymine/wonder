-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 4 月 08 日 02:07
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
-- Database: `need_for_speed`
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
(2, 'Chivas Regal Mizunara', 'Blended Scotch Whisky', '2019-01-03 00:00:00', '2019-01-03 00:00:00');

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
(2, 'Scotch whiskey', 'water and malted barley', '2019-01-03 00:00:00', '2019-01-03 00:00:00');

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
(2, 1, 1, 'Quý VTA', 'Tống Thị Kim', 'Quý', '163/15/9 Tô Hiến Thành P.13, Q.10 TP.HCM', '', '0902398633', 'chuyên bán hàng Quảng Châu, mỹ phẩm', 1, 0, '2019-01-03 00:53:14', '2019-01-09 16:49:13');

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

--
-- テーブルのデータのダンプ `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `client_id`, `remarks`, `total_price`, `status`, `disabled`, `created`, `updated`) VALUES
(14, 1, 2, '', 275000, 0, 0, '2019-03-29 19:02:02', '2019-03-29 19:02:02'),
(15, 1, 1, '', 670000, 0, 0, '2019-03-29 19:04:30', '2019-03-29 19:04:30'),
(16, 1, 1, '', 10000, 0, 0, '2019-03-29 19:06:21', '2019-03-29 19:06:21'),
(17, 1, 1, '', 10000, 1, 0, '2019-03-29 19:07:09', '2019-03-29 19:07:09'),
(18, 1, 2, '', 10000, 0, 0, '2019-03-29 19:08:04', '2019-03-29 19:08:04'),
(19, 1, 1, '', 5000, 0, 0, '2019-03-29 19:09:32', '2019-03-29 19:09:32'),
(20, 1, 2, '', 10000, 0, 0, '2019-03-31 22:11:42', '2019-03-31 22:11:42'),
(21, 1, 2, 'aaa', 385000, 0, 0, '2019-03-31 23:48:05', '2019-04-04 10:48:08');

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
(13, 2, 14, 4, 0, 15000, 5, NULL, '2019-03-29 19:02:02', '2019-03-29 19:02:02'),
(14, 2, 14, 10, 0, 25000, 1, NULL, '2019-03-29 19:02:02', '2019-03-29 19:02:02'),
(15, 2, 14, 4, 0, 35000, 5, NULL, '2019-03-29 19:02:02', '2019-03-29 19:02:02'),
(16, 1, 15, 4, 0, 35000, 5, NULL, '2019-03-29 19:04:30', '2019-03-29 19:04:30'),
(17, 1, 15, 10, 0, 55000, 9, NULL, '2019-03-29 19:04:30', '2019-03-29 19:04:30'),
(18, 1, 16, 4, 0, 5000, 1, NULL, '2019-03-29 19:06:21', '2019-03-29 19:06:21'),
(19, 1, 16, 10, 0, 5000, 1, NULL, '2019-03-29 19:06:21', '2019-03-29 19:06:21'),
(20, 2, 20, 4, 0, 5000, 1, NULL, '2019-03-31 22:11:42', '2019-03-31 22:11:42'),
(21, 2, 20, 10, 0, 5000, 1, NULL, '2019-03-31 22:11:42', '2019-03-31 22:11:42'),
(27, 2, 21, 4, 1, 95000, 3, NULL, '2019-04-03 14:23:08', '2019-04-04 10:48:08'),
(28, 2, 21, 10, 1, 25000, 4, NULL, '2019-04-03 14:23:09', '2019-04-04 10:48:08');

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
(30, 17, 'nhà -> xxx', 90000, 'yamato', 0, '2019-04-04 17:35:30', '2019-04-04 18:10:55');

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
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `size`, `unit`, `price`, `wholesale_price`, `quantity`, `image`, `category_id`, `brand_id`, `remarks`, `disabled`, `created`, `updated`) VALUES
(1, 1, 'Prophere', '39', 'cái', 200000, 20, 40, 'fa-hot.png', 1, 1, 'AAA', 1, '2019-02-18 12:05:56', '2019-03-19 17:26:11'),
(2, 1, 'Prophere', NULL, NULL, 0, 0, 35, 'fa-hot.png', 1, 1, 'AAA', 1, '2019-02-18 12:07:06', '2019-03-14 15:29:34'),
(3, 1, 'Prophere 2', NULL, NULL, 0, 0, 20, 'fa-hot.png', 1, 1, 'AAA', 1, '2019-02-18 12:25:39', '2019-03-14 16:40:30'),
(4, 1, 'banh bao', NULL, NULL, 15000, 150, 31, NULL, 1, 1, '', 0, '2019-02-18 14:23:58', '2019-04-03 14:23:09'),
(5, 1, 'Example', NULL, NULL, 0, 0, 1, NULL, 0, 0, '', 0, '2019-02-18 14:25:10', '2019-02-24 03:16:47'),
(6, 1, 'Example', NULL, NULL, 0, 0, 1, NULL, 0, 0, '', 0, '2019-02-24 03:20:39', '2019-02-24 03:20:39'),
(7, 1, 'Example', NULL, NULL, 0, 0, 1, NULL, 0, 0, '', 0, '2019-02-24 03:20:57', '2019-02-24 03:20:57'),
(8, 1, 'Example', '', '', 0, 0, 1, NULL, 0, 0, '', 0, '2019-02-24 03:23:59', '2019-02-24 03:25:08'),
(9, 1, 'Example', '', '', 0, 0, 1, NULL, 0, 0, '', 0, '2019-02-24 03:25:18', '2019-02-24 03:25:18'),
(10, 1, 'banh bao chieu chieu ra dung ngo sau trong ve que me', NULL, NULL, 5000, 50, 43, NULL, 1, 1, '', 0, '2019-03-14 16:43:01', '2019-04-04 10:48:08'),
(11, 1, 'Example 111', '', 'cái', 500, 0, 6, NULL, 1, 2, 'bleble ble', 0, '2019-03-14 17:44:10', '2019-03-14 17:58:35'),
(12, 1, 'VEX', '', '', 500, 0, 0, NULL, 1, 1, 'ok', 0, '2019-03-15 15:14:54', '2019-03-19 18:31:54');

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
(4, 1, 4, 1, 21),
(5, 1, 4, 2, 10),
(6, 1, 10, 1, 43);

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
(48, 1, 1, 300, 300, 200000, 17, 'donki shinjuku', '2019-03-10 01:56:24', '2019-03-16 01:56:24'),
(49, 1, 1, 100, 300, 300000, 3, 'biccamera shinjuku', '2019-03-11 01:57:09', '2019-03-16 01:57:09'),
(50, 1, 2, 350, 400, 250000, 5, 'donki shibuya', '2019-03-13 01:57:35', '2019-03-16 01:57:35'),
(51, 1, 1, 0, 0, 0, -5, '', '2019-03-16 02:01:24', '2019-03-16 02:01:24'),
(52, 1, 1, 450, 250, 200000, 20, 'donki tokorozawa', '2019-03-19 23:59:59', '2019-03-19 17:26:11'),
(53, 12, 1, 200, 150, 500000, 5, 'donki', '2019-03-19 18:31:53', '2019-03-19 18:31:53');

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
('mf5ovf77tvh6fcgahb5t6e72a2', 'General\\Core\\Manager\\Controllers\\InvoicesController|a:1:{s:10:\"parameters\";N;}navigated|i:1554343953;General\\Core\\Manager\\Controllers\\MainController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\SessionsController|a:1:{s:10:\"parameters\";N;}auth|a:7:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:5:\"Khang\";s:5:\"login\";s:5:\"admin\";s:7:\"role_id\";s:1:\"4\";s:4:\"role\";s:7:\"manager\";s:12:\"role_display\";s:7:\"Manager\";s:11:\"role_demote\";i:1;}$PHALCON/CSRF$|s:16:\"jgx5LMx7TmSZsM48\";', 1554340377, 1554343954),
('1nsaqleuqvqm5rl1ckg9cd4ju3', '_flashMessages|a:1:{s:6:\"notice\";a:1:{i:0;s:87:\"セッションの有効期限が切れたか、サイン・インしていません。\";}}General\\Core\\Manager\\Controllers\\InvoicesController|a:1:{s:10:\"parameters\";N;}', 1554348042, NULL),
('8im5e96ljt8ijvm0am6m7peqr6', 'General\\Core\\Manager\\Controllers\\InvoicesController|a:1:{s:10:\"parameters\";N;}navigated|i:1554359938;General\\Core\\Manager\\Controllers\\MainController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\SessionsController|a:1:{s:10:\"parameters\";N;}auth|a:7:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:5:\"Khang\";s:5:\"login\";s:5:\"admin\";s:7:\"role_id\";s:1:\"4\";s:4:\"role\";s:7:\"manager\";s:12:\"role_display\";s:7:\"Manager\";s:11:\"role_demote\";i:1;}$PHALCON/CSRF$|s:15:\"XjvdPvoKvXDhTqf\";General\\Core\\Manager\\Controllers\\InventoryController|a:1:{s:10:\"parameters\";a:1:{s:5:\"order\";s:44:\"[General\\Core\\Manager\\Models\\Product].id ASC\";}}General\\Core\\Manager\\Controllers\\ProductsController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\TransportsController|a:1:{s:10:\"parameters\";N;}', 1554348042, 1554359938),
('cf36i4crn0n2hgba4aevliifq3', 'General\\Core\\Manager\\Controllers\\TransportsController|a:1:{s:10:\"parameters\";N;}navigated|i:1554370406;General\\Core\\Manager\\Controllers\\MainController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\SessionsController|a:1:{s:10:\"parameters\";N;}auth|a:7:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:5:\"Khang\";s:5:\"login\";s:5:\"admin\";s:7:\"role_id\";s:1:\"4\";s:4:\"role\";s:7:\"manager\";s:12:\"role_display\";s:7:\"Manager\";s:11:\"role_demote\";i:1;}$PHALCON/CSRF$|s:16:\"FDprzmU6L2FXpAAf\";General\\Core\\Manager\\Controllers\\InvoicesController|a:1:{s:10:\"parameters\";N;}General\\Core\\Manager\\Controllers\\ClientsController|a:1:{s:10:\"parameters\";a:4:{s:5:\"joins\";a:1:{i:0;a:4:{i:0;s:35:\"General\\Core\\Manager\\Models\\Country\";i:1;s:61:\"[General\\Core\\Manager\\Models\\Client].country_id=[Country].id \";i:2;s:7:\"Country\";i:3;s:4:\"LEFT\";}}s:10:\"conditions\";s:54:\"[General\\Core\\Manager\\Models\\Client].user_id=:user_id:\";s:4:\"bind\";a:1:{s:7:\"user_id\";s:1:\"1\";}s:5:\"order\";s:43:\"[General\\Core\\Manager\\Models\\Client].id ASC\";}}', 1554364037, 1554370407);

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
  `remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `transports`
--

INSERT INTO `transports` (`id`, `name`, `user_id`, `client_id`, `total`, `total_others`, `remarks`, `status`, `disabled`, `created`, `updated`) VALUES
(1, '', 1, 1, 0, 0, 'xxx', 0, 0, '2019-01-09 18:41:08', '2019-01-09 18:41:08'),
(3, '', 1, 1, 0, 0, 'yyy', 0, 0, '2019-01-10 18:16:47', '2019-01-10 18:16:47'),
(4, '', 1, 1, 17000, 0, 'zzz', 0, 0, '2019-01-10 18:33:44', '2019-01-10 18:33:44'),
(5, '', 1, 1, 17000, 0, 'aaa', 0, 0, '2019-01-11 10:40:19', '2019-01-11 10:40:19'),
(6, '', 1, 1, 17200, 0, 'bbb', 0, 0, '2019-01-11 10:45:47', '2019-01-11 10:45:47'),
(7, '', 1, 1, 1900, 0, 'ddd', 0, 0, '2019-01-11 12:29:30', '2019-01-11 12:29:30'),
(8, '', 1, 2, 0, 0, 'eee', 0, 0, '2019-01-15 10:45:55', '2019-01-15 10:45:55'),
(9, '', 1, 1, 0, 0, 'xxx', 0, 0, '2019-01-17 18:47:10', '2019-01-17 18:47:10'),
(10, '', 1, 1, 50000, 0, 'xxx', 0, 0, '2019-01-18 18:06:22', '2019-01-18 18:06:22'),
(11, '', 1, 1, 63100, 0, 'yyy', 0, 0, '2019-01-28 14:14:59', '2019-01-30 14:40:28'),
(12, '', 1, 1, 63100, 0, 'yyy', 1, 0, '2019-01-28 14:20:08', '2019-01-30 14:51:52'),
(13, '', 1, 1, 0, 0, 'yyy', 1, 0, '2019-01-28 14:22:24', '2019-03-15 16:39:26'),
(15, '', 1, 1, 0, 0, '', 0, 0, '2019-03-15 16:43:44', '2019-03-15 17:23:43'),
(16, '1234567890 - Dũng', 1, 2, 20000, 0, '', 0, 0, '2019-04-04 16:59:55', '2019-04-04 17:10:01'),
(17, '1234567890 - Dũng', 1, 2, 20000, 90000, 'yes', 0, 0, '2019-04-04 17:27:11', '2019-04-04 18:10:56');

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
(42, 17, 18, '2019-04-04 18:10:56', '2019-04-04 18:10:56'),
(43, 17, 20, '2019-04-04 18:10:56', '2019-04-04 18:10:56');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `invoices_details`
--
ALTER TABLE `invoices_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `other_costs`
--
ALTER TABLE `other_costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products_quantities`
--
ALTER TABLE `products_quantities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_ins`
--
ALTER TABLE `product_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transport_invoices`
--
ALTER TABLE `transport_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
