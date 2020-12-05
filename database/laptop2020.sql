-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2020 lúc 02:58 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laptop2020`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin123', '$2y$10$xOQtSJ3PIh0szvY7hD9v/OugCroJlJ1UKh/ZTcbgi4sjvPKmFziCm', '1', '2020-12-03 10:45:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_slug`, `cate_status`, `created_at`, `updated_at`) VALUES
(1, 'Dell', 'Dell', 'active', '2020-12-03 10:45:28', NULL),
(2, 'Asus', 'Assus', 'active', '2020-12-03 10:45:28', NULL),
(3, 'Acer', 'Acer', 'active', '2020-12-03 10:45:28', NULL),
(4, 'HP', 'HP', 'active', '2020-12-03 10:45:28', NULL),
(5, 'Samsung', 'Samsung', 'active', '2020-12-03 10:45:28', NULL),
(6, 'Macbook', 'Macbook', 'active', '2020-12-03 10:45:28', NULL),
(7, 'Lenovo', 'Lenovo', 'active', '2020-12-03 10:45:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `configs`
--

INSERT INTO `configs` (`id`, `config_name`, `created_at`, `updated_at`) VALUES
(1, 'RAM', '2020-12-03 10:45:28', NULL),
(2, 'CPU', '2020-12-03 10:45:28', NULL),
(3, 'VGA', '2020-12-03 10:45:28', NULL),
(4, 'Màn Hình', '2020-12-03 10:45:28', NULL),
(5, 'Ổ cứng', '2020-12-03 10:45:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config_details`
--

CREATE TABLE `config_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_detail_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config_details`
--

INSERT INTO `config_details` (`id`, `config_detail_name`, `config_id`, `created_at`, `updated_at`) VALUES
(1, '2GB', '1', '2020-12-03 10:45:28', NULL),
(2, '4GB', '1', '2020-12-03 10:45:28', NULL),
(3, '6GB', '1', '2020-12-03 10:45:28', NULL),
(4, '8GB', '1', '2020-12-03 10:45:28', NULL),
(5, '16GB', '1', '2020-12-03 10:45:28', NULL),
(6, 'i3', '2', '2020-12-03 10:45:28', NULL),
(7, 'i5', '2', '2020-12-03 10:45:28', NULL),
(8, 'i7', '2', '2020-12-03 10:45:28', NULL),
(9, 'i9', '2', '2020-12-03 10:45:28', NULL),
(10, 'Onboard', '3', '2020-12-03 10:45:28', NULL),
(11, 'Card Rời', '3', '2020-12-03 10:45:28', NULL),
(12, '12 inch', '4', '2020-12-03 10:45:28', NULL),
(13, '14 inch', '4', '2020-12-03 10:45:28', NULL),
(14, '15.6 inch', '4', '2020-12-03 10:45:28', NULL),
(15, '17 inch', '4', '2020-12-03 10:45:28', NULL),
(16, 'HDD', '5', '2020-12-03 10:45:28', NULL),
(17, 'SSD', '5', '2020-12-03 10:45:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_20_032850_create_admins_table', 1),
(4, '2020_11_20_033003_create_categories_table', 1),
(5, '2020_11_20_033025_create_user_infos_table', 1),
(6, '2020_11_20_033037_create_products_table', 1),
(7, '2020_11_20_033056_create_product_configs_table', 1),
(8, '2020_11_20_033117_create_order_details_table', 1),
(9, '2020_11_20_033127_create_orders_table', 1),
(10, '2020_11_20_033143_create_config_details_table', 1),
(11, '2020_11_20_033153_create_configs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_info_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `user_id`, `total_price`, `user_info_id`, `order_note`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 'k9ITH66ggg', '1', '24000000', '1', 'Trung Hiếu Buyed', 'done', '2020-12-03 11:38:32', '2020-12-03 11:40:01'),
(2, 'Zl9U3hAKkt', '1', '29000000', '2', 'Trung Hiếu Buyed 2', 'new', '2020-12-03 11:39:24', '2020-12-03 11:39:24'),
(3, 'ByXtAgkEKU', '2', '42000000', '3', 'Hai Buyed', 'new', '2020-12-03 11:42:31', '2020-12-03 11:42:31'),
(4, 'WPlZkN5gId', '2', '32000000', '3', 'Hải Buyed 2', 'new', '2020-12-03 11:42:54', '2020-12-03 11:42:54'),
(5, '1ZPx9xbZjW', '2', '38000000', '3', 'Hai Buyed 3', 'done', '2020-12-03 11:43:40', '2020-12-03 11:44:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `name`, `price`, `qty`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Samsung RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng SSD 1T', '12000000', '1', '1', '2020-12-03 11:38:33', NULL),
(2, 'Laptop Dell RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng SSD 256', '12000000', '1', '1', '2020-12-03 11:38:33', NULL),
(3, 'Laptop Asus RAM 4GB CPU i3 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '13000000', '1', '2', '2020-12-03 11:39:25', NULL),
(4, 'Laptop Dell RAM 8GB CPU i7 VGA Card Rời Monitor 14 inch Ổ cứng SSD', '16000000', '1', '2', '2020-12-03 11:39:25', NULL),
(5, 'Laptop Acer RAM 16GB CPU i7 VGA Onboard Monitor 17 inch Ổ cứng SSD', '14000000', '1', '3', '2020-12-03 11:42:31', NULL),
(6, 'Laptop HP RAM 8GB CPU i7 VGA Card Rời Monitor 17 inch Ổ cứng SSD', '16000000', '1', '3', '2020-12-03 11:42:31', NULL),
(7, 'Laptop Dell RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng SSD 256', '12000000', '1', '3', '2020-12-03 11:42:31', NULL),
(8, 'Laptop Acer RAM 16GB CPU i7 VGA Onboard Monitor 15.6 inch Ổ cứng HDD', '16000000', '1', '4', '2020-12-03 11:42:54', NULL),
(9, 'Laptop Dell RAM 8GB CPU i7 VGA Card Rời Monitor 14 inch Ổ cứng SSD', '16000000', '1', '4', '2020-12-03 11:42:54', NULL),
(10, 'Laptop Dell RAM 8GB CPU i7 VGA Card Rời Monitor 14 inch Ổ cứng HDD', '14000000', '1', '5', '2020-12-03 11:43:40', NULL),
(11, 'Laptop Samsung RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng SSD 1T', '12000000', '1', '5', '2020-12-03 11:43:40', NULL),
(12, 'Laptop Dell RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng SSD 256', '12000000', '1', '5', '2020-12-03 11:43:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_code`, `cate_id`, `pro_slug`, `pro_price`, `pro_image`, `pro_qty`, `pro_des`, `pro_status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Lenovo RAM 16GB CPU i5 VGA Onboard Monitor 14 inch Ổ cứng HDD', '153-191-583', '7', 'Laptop-Lenovo-RAM-16GB-CPU-i5-VGA-Onboard-Monitor-14-inch-O-cung-HDD', '15000000', 'laptop.jpg', '16', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 10:56:36'),
(2, 'Laptop Acer RAM 4GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng HDD', '231-479-871', '3', 'Laptop-Acer-RAM-4GB-CPU-i5-VGA-Onboard-Monitor-15.6-inch-O-cung-HDD', '16000000', 'laptop.jpg', '18', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 10:47:35'),
(3, 'Laptop HP RAM 4GB CPU i3 VGA Card Rời Monitor 14 inch Ổ cứng HDD', '768-106-367', '4', 'Laptop-HP-RAM-4GB-CPU-i3-VGA-Card-Roi-Monitor-14-inch-O-cung-HDD', '12000000', 'laptop.jpg', '2', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 11:32:42'),
(4, 'Laptop HP RAM 4GB CPU i7 VGA Card Rời Monitor 15.6 inch Ổ cứng SSD', '001-008-975', '4', 'Laptop-HP-RAM-4GB-CPU-i7-VGA-Card-Roi-Monitor-15.6-inch-O-cung-SSD', '17000000', 'laptop.jpg', '7', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 11:32:51'),
(5, 'Laptop Dell RAM 4GB CPU i7 VGA Onboard Monitor 17 inch Ổ cứng HDD', '118-395-814', '1', 'Laptop-Dell-RAM-4GB-CPU-i7-VGA-Onboard-Monitor-17-inch-O-cung-HDD', '16000000', 'laptop.jpg', '15', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 11:33:54'),
(6, 'Laptop HP RAM 4GB CPU i5 VGA Card Rời Monitor 15.6 inch Ổ cứng SSD', '112-551-312', '4', 'Laptop-HP-RAM-4GB-CPU-i5-VGA-Card-Roi-Monitor-15.6-inch-O-cung-SSD', '11000000', 'laptop.jpg', '4', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 11:32:57'),
(7, 'Laptop Dell RAM 8GB CPU i3 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '093-509-976', '1', 'Laptop-Dell-RAM-8GB-CPU-i3-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD', '19000000', 'laptop.jpg', '10', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 11:34:02'),
(8, 'Laptop Lenovo RAM 8GB CPU i5 VGA Onboard Monitor 17 inch Ổ cứng SSD', '294-662-258', '7', 'Laptop-Lenovo-RAM-8GB-CPU-i5-VGA-Onboard-Monitor-17-inch-O-cung-SSD', '12000000', 'laptop.jpg', '6', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 10:56:41'),
(9, 'Laptop Macbook RAM 8GB CPU i7 VGA Onboard Monitor 14 inch Ổ cứng HDD', '851-480-804', '6', 'Laptop-Macbook-RAM-8GB-CPU-i7-VGA-Onboard-Monitor-14-inch-O-cung-HDD', '14000000', 'fqQmfBVhUj.jpg', '4', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 10:48:41'),
(10, 'Laptop Macbook RAM 16GB CPU i5 VGA Card Rời Monitor 15.6 inch Ổ cứng SSD', '606-494-722', '6', 'Laptop-Macbook-RAM-16GB-CPU-i5-VGA-Card-Roi-Monitor-15.6-inch-O-cung-SSD', '13000000', 'DUsZFlbPZN.jpg', '12', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 10:48:49'),
(11, 'Laptop Lenovo RAM 4GB CPU i5 VGA Card Rời Monitor 14 inch Ổ cứng SSD', '029-237-503', '7', 'Laptop-Lenovo-RAM-4GB-CPU-i5-VGA-Card-Roi-Monitor-14-inch-O-cung-SSD', '19000000', 'laptop.jpg', '18', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 10:56:46'),
(12, 'Laptop Dell  RAM 16GB CPU i3 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '126-841-640', '1', 'Laptop-Dell--RAM-16GB-CPU-i3-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD', '17000000', 'laptop.jpg', '4', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 11:34:15'),
(13, 'Laptop Acer RAM 16GB CPU i5 VGA Onboard Monitor 14 inch Ổ cứng SSD', '928-408-827', '3', 'Laptop-Acer-RAM-16GB-CPU-i5-VGA-Onboard-Monitor-14-inch-O-cung-SSD', '12000000', 'laptop.jpg', '13', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 10:47:30'),
(14, 'Laptop Dell RAM 16GB CPU i3 VGA Card Rời Monitor 15.6 inch Ổ cứng SSD', '136-025-527', '1', 'Laptop-Dell-RAM-16GB-CPU-i3-VGA-Card-Roi-Monitor-15.6-inch-O-cung-SSD', '18000000', 'laptop.jpg', '7', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 11:34:08'),
(15, 'Laptop Samsung RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng HDD', '254-624-382', '5', 'Laptop-Samsung-RAM-16GB-CPU-i5-VGA-Onboard-Monitor-15.6-inch-O-cung-HDD', '13000000', 'RMeQgS0ev8.jpg', '4', 'Noi dung mo ta', 'active', '2020-12-03 10:45:28', '2020-12-03 10:49:47'),
(16, 'Laptop Acer RAM 16GB CPU i7 VGA Onboard Monitor 17 inch Ổ cứng SSD', '145-246-048', '3', 'Laptop-Acer-RAM-16GB-CPU-i7-VGA-Onboard-Monitor-17-inch-O-cung-SSD', '14000000', 'oe0dsfqfKs.jpg', '13', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:46:44'),
(17, 'Laptop Lenovo RAM 16GB CPU i3 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '276-445-307', '7', 'Laptop-Lenovo-RAM-16GB-CPU-i3-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD', '19000000', '8pinwqbr9G.jpg', '10', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:55:59'),
(18, 'Laptop Acer RAM 16GB CPU i7 VGA Onboard Monitor 15.6 inch Ổ cứng HDD', '531-108-858', '3', 'Laptop-Acer-RAM-16GB-CPU-i7-VGA-Onboard-Monitor-15.6-inch-O-cung-HDD', '16000000', 'MkYanXw66a.jpg', '15', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:46:54'),
(19, 'Laptop HP RAM 8GB CPU i7 VGA Card Rời Monitor 17 inch Ổ cứng SSD', '838-542-006', '4', 'Laptop-HP-RAM-8GB-CPU-i7-VGA-Card-Roi-Monitor-17-inch-O-cung-SSD', '16000000', 'Ss5DNQAsye.jpg', '3', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:51:24'),
(20, 'Laptop Acer RAM 8GB CPU i5 VGA Card Rời Monitor 17 inch Ổ cứng HDD', '946-784-988', '3', 'Laptop-Acer-RAM-8GB-CPU-i5-VGA-Card-Roi-Monitor-17-inch-O-cung-HDD', '19000000', 'kNb254iS4h.jpg', '2', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:47:02'),
(21, 'Laptop Macbook RAM 4GB CPU i3 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '074-692-580', '6', 'Laptop-Macbook-RAM-4GB-CPU-i3-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD', '19000000', '0EVAajFJNw.jpg', '15', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:47:59'),
(22, 'Laptop Macbook RAM 8GB CPU i3 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '822-184-510', '6', 'Laptop-Macbook-RAM-8GB-CPU-i3-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD', '12000000', '4Ww1dVWrx8.jpg', '11', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:48:20'),
(23, 'Laptop Dell RAM 4GB CPU i5 VGA Card Rời Monitor 14 inch Ổ cứng SSD', '168-851-734', '1', 'Laptop-Dell-RAM-4GB-CPU-i5-VGA-Card-Roi-Monitor-14-inch-O-cung-SSD', '19000000', 'abcGohrTns.jpg', '13', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:54:31'),
(24, 'Laptop HP RAM 16GB CPU i7 VGA Card Rời Monitor 15.6 inch Ổ cứng SSD', '099-577-904', '4', 'Laptop-HP-RAM-16GB-CPU-i7-VGA-Card-Roi-Monitor-15.6-inch-O-cung-SSD', '18000000', 'qc8qTQb6EP.jpg', '3', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:51:31'),
(25, 'Laptop Asus RAM 4GB CPU i7 VGA Card Rời Monitor 14 inch Ổ cứng HDD', '959-400-362', '2', 'Laptop-Asus-RAM-4GB-CPU-i7-VGA-Card-Roi-Monitor-14-inch-O-cung-HDD', '14000000', 'uvgbwGE55j.jpg', '2', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:52:42'),
(26, 'Laptop Lenovo RAM 16GB CPU i3 VGA Card Rời Monitor 14 inch Ổ cứng SSD', '410-094-771', '7', 'Laptop-Lenovo-RAM-16GB-CPU-i3-VGA-Card-Roi-Monitor-14-inch-O-cung-SSD', '11000000', 'IZlhN5AyCR.jpg', '11', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:56:10'),
(27, 'Laptop HP RAM 8GB CPU i7 VGA Card Rời Monitor 17 inch Ổ cứng SSD 256', '737-688-538', '4', 'Laptop-HP-RAM-8GB-CPU-i7-VGA-Card-Roi-Monitor-17-inch-O-cung-SSD-256', '11000000', 'AKW3DP3Rzo.jpg', '14', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:51:50'),
(28, 'Laptop Macbook RAM 8GB CPU i3 VGA Onboard Monitor 17 inch Ổ cứng HDD', '591-854-294', '6', 'Laptop-Macbook-RAM-8GB-CPU-i3-VGA-Onboard-Monitor-17-inch-O-cung-HDD', '16000000', 'vaj9L8WlWO.jpg', '2', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:48:33'),
(29, 'Laptop HP RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '596-702-854', '4', 'Laptop-HP-RAM-16GB-CPU-i5-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD', '11000000', 'lUcW3Wg08u.jpg', '20', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:52:06'),
(30, 'Laptop HP RAM 8GB CPU i3 VGA Onboard Monitor 17 inch Ổ cứng HDD', '292-366-643', '4', 'Laptop-HP-RAM-8GB-CPU-i3-VGA-Onboard-Monitor-17-inch-O-cung-HDD', '13000000', 'mII05VZyOk.jpg', '8', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:52:15'),
(31, 'Laptop HP RAM 4GB CPU i5 VGA Onboard Monitor 14 inch Ổ cứng HDD', '547-264-417', '4', 'Laptop-HP-RAM-4GB-CPU-i5-VGA-Onboard-Monitor-14-inch-O-cung-HDD', '13000000', 'laptop.jpg', '5', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 11:32:14'),
(32, 'Laptop Dell RAM 4GB CPU i5 VGA Onboard Monitor 17 inch Ổ cứng SSD', '231-784-720', '1', 'Laptop-Dell-RAM-4GB-CPU-i5-VGA-Onboard-Monitor-17-inch-O-cung-SSD', '11000000', '59Ma9O6hUt.jpg', '3', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:54:42'),
(33, 'Laptop Asus RAM 8GB CPU i7 VGA Onboard Monitor 17 inch Ổ cứng HDD', '189-961-296', '2', 'Laptop-Asus-RAM-8GB-CPU-i7-VGA-Onboard-Monitor-17-inch-O-cung-HDD', '12000000', '8nPoiCobmC.jpg', '8', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:52:51'),
(34, 'Laptop HP RAM 8GB CPU i5 VGA Card Rời Monitor 17 inch Ổ cứng HDD', '255-619-505', '4', 'Laptop-HP-RAM-8GB-CPU-i5-VGA-Card-Roi-Monitor-17-inch-O-cung-HDD', '14000000', 'laptop.jpg', '13', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 11:32:21'),
(35, 'Laptop Lenovo RAM 4GB CPU i3 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '546-910-773', '7', 'Laptop-Lenovo-RAM-4GB-CPU-i3-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD', '16000000', 'p80OJs4M98.jpg', '12', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:56:21'),
(36, 'Laptop Asus RAM 4GB CPU i3 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '276-043-624', '2', 'Laptop-Asus-RAM-4GB-CPU-i3-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD', '13000000', '8GoGopMGFd.jpg', '5', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:53:01'),
(37, 'Laptop HP RAM 16GB CPU i7 VGA Onboard Monitor 14 inch Ổ cứng SSD', '747-463-960', '4', 'Laptop-HP-RAM-16GB-CPU-i7-VGA-Onboard-Monitor-14-inch-O-cung-SSD', '11000000', 'laptop.jpg', '3', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 11:32:28'),
(38, 'Laptop HP RAM 16GB CPU i7 VGA Card Rời Monitor 14 inch Ổ cứng SSD', '346-916-388', '4', 'Laptop-HP-RAM-16GB-CPU-i7-VGA-Card-Roi-Monitor-14-inch-O-cung-SSD', '11000000', 'laptop.jpg', '20', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 11:32:36'),
(39, 'Laptop Acer RAM 16GB CPU i7 VGA Onboard Monitor 15.6 inch Ổ cứng SSD', '238-758-040', '3', 'Laptop-Acer-RAM-16GB-CPU-i7-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD', '19000000', 'Kefr5TSYzd.jpg', '15', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:47:13'),
(40, 'Laptop Lenovo RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng HDD', '740-865-651', '7', 'Laptop-Lenovo-RAM-16GB-CPU-i5-VGA-Onboard-Monitor-15.6-inch-O-cung-HDD', '19000000', 'rBOgk6xmmz.jpg', '1', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:56:29'),
(41, 'Laptop Samsung RAM 16GB CPU i3 VGA Card Rời Monitor 17 inch Ổ cứng SSD', '649-969-460', '5', 'Laptop-Samsung-RAM-16GB-CPU-i3-VGA-Card-Roi-Monitor-17-inch-O-cung-SSD', '17000000', 'pLw6ZiVWvy.jpg', '14', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:49:38'),
(42, 'Laptop Acer RAM 8GB CPU i3 VGA Onboard Monitor 17 inch Ổ cứng HDD', '033-597-860', '3', 'Laptop-Acer-RAM-8GB-CPU-i3-VGA-Onboard-Monitor-17-inch-O-cung-HDD', '12000000', 'laptop.jpg', '11', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:47:19'),
(43, 'Laptop Acer RAM 4GB CPU i3 VGA Onboard Monitor 14 inch Ổ cứng SSD', '497-767-568', '3', 'Laptop-Acer-RAM-4GB-CPU-i3-VGA-Onboard-Monitor-14-inch-O-cung-SSD', '13000000', 'laptop.jpg', '18', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 10:47:26'),
(44, 'Laptop Dell  RAM 16GB CPU i7 VGA Onboard Monitor 14 inch Ổ cứng SSD', '406-491-346', '1', 'Laptop-Dell--RAM-16GB-CPU-i7-VGA-Onboard-Monitor-14-inch-O-cung-SSD', '12000000', 'laptop.jpg', '13', 'Noi dung mo ta', 'active', '2020-12-03 10:45:29', '2020-12-03 11:33:45'),
(45, 'Laptop Dell RAM 8GB CPU i7 VGA Card Rời Monitor 14 inch Ổ cứng HDD', '696-287-340', '1', 'Laptop-Dell-RAM-8GB-CPU-i7-VGA-Card-Roi-Monitor-14-inch-O-cung-HDD', '14000000', 'L7uEaEqw6f.jpg', '4', 'Noi dung mo ta', 'active', '2020-12-03 10:45:30', '2020-12-03 10:53:27'),
(46, 'Laptop Dell RAM 8GB CPU i7 VGA Card Rời Monitor 14 inch Ổ cứng SSD', '777-265-209', '1', 'Laptop-Dell-RAM-8GB-CPU-i7-VGA-Card-Roi-Monitor-14-inch-O-cung-SSD', '16000000', 'CXo3i59cLI.jpg', '14', 'Noi dung mo ta', 'active', '2020-12-03 10:45:30', '2020-12-03 10:54:22'),
(47, 'Laptop Lenovo RAM 16GB CPU i3 VGA Onboard Monitor 14 inch Ổ cứng HDD', '549-196-794', '7', 'Laptop-Lenovo-RAM-16GB-CPU-i3-VGA-Onboard-Monitor-14-inch-O-cung-HDD', '19000000', 'RDzXaE0wRN.jpg', '5', 'Noi dung mo ta', 'active', '2020-12-03 10:45:30', '2020-12-03 10:55:52'),
(48, 'Laptop Samsung RAM 16GB CPU i7 VGA Onboard Monitor 15.6 inch Ổ cứng HDD', '306-339-169', '5', 'Laptop-Samsung-RAM-16GB-CPU-i7-VGA-Onboard-Monitor-15.6-inch-O-cung-HDD', '16000000', 'mxeWnum3mq.jpg', '4', 'Noi dung mo ta', 'active', '2020-12-03 10:45:30', '2020-12-03 10:49:09'),
(49, 'Laptop Samsung RAM 4GB CPU i3 VGA Card Rời Monitor 14 inch Ổ cứng SSD', '020-432-354', '5', 'Laptop-Samsung-RAM-4GB-CPU-i3-VGA-Card-Roi-Monitor-14-inch-O-cung-SSD', '16000000', '001ONuwYsW.jpg', '20', 'Noi dung mo ta', 'active', '2020-12-03 10:45:30', '2020-12-03 10:49:18'),
(50, 'Laptop Acer RAM 8GB CPU i3 VGA Onboard Monitor 14 inch Ổ cứng HDD', '273-789-848', '3', 'Laptop-Acer-RAM-8GB-CPU-i3-VGA-Onboard-Monitor-14-inch-O-cung-HDD', '19000000', 'MaOOgb0AGM.jpg', '13', 'Noi dung mo ta', 'active', '2020-12-03 10:45:30', '2020-12-03 10:46:36'),
(51, 'Laptop Samsung RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng SSD 1T', '2NwhqT', '5', 'Laptop-Samsung-RAM-16GB-CPU-i5-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD-1T', '12000000', 'nrP8iD99Et.jpg', '12', 'mo ta', 'active', '2020-12-03 10:50:27', '2020-12-03 10:50:27'),
(52, 'Laptop Dell RAM 16GB CPU i5 VGA Onboard Monitor 15.6 inch Ổ cứng SSD 256', 'eUzIWJ', '1', 'Laptop-Dell-RAM-16GB-CPU-i5-VGA-Onboard-Monitor-15.6-inch-O-cung-SSD-256', '12000000', 'z5X9cpjl50.jpg', '12', 'ad', 'active', '2020-12-03 10:50:51', '2020-12-03 10:53:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_configs`
--

CREATE TABLE `product_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_details_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_configs`
--

INSERT INTO `product_configs` (`id`, `pro_id`, `config_details_id`, `created_at`, `updated_at`) VALUES
(246, '50', '1', NULL, NULL),
(247, '50', '6', NULL, NULL),
(248, '50', '10', NULL, NULL),
(249, '50', '12', NULL, NULL),
(250, '50', '16', NULL, NULL),
(251, '16', '5', NULL, NULL),
(252, '16', '6', NULL, NULL),
(253, '16', '10', NULL, NULL),
(254, '16', '12', NULL, NULL),
(255, '16', '16', NULL, NULL),
(256, '18', '4', NULL, NULL),
(257, '18', '6', NULL, NULL),
(258, '18', '11', NULL, NULL),
(259, '18', '15', NULL, NULL),
(260, '18', '16', NULL, NULL),
(261, '20', '1', NULL, NULL),
(262, '20', '6', NULL, NULL),
(263, '20', '11', NULL, NULL),
(264, '20', '14', NULL, NULL),
(265, '20', '16', NULL, NULL),
(266, '39', '1', NULL, NULL),
(267, '39', '8', NULL, NULL),
(268, '39', '10', NULL, NULL),
(269, '39', '12', NULL, NULL),
(270, '39', '17', NULL, NULL),
(271, '42', '1', NULL, NULL),
(272, '42', '7', NULL, NULL),
(273, '42', '10', NULL, NULL),
(274, '42', '14', NULL, NULL),
(275, '42', '16', NULL, NULL),
(276, '43', '1', NULL, NULL),
(277, '43', '7', NULL, NULL),
(278, '43', '10', NULL, NULL),
(279, '43', '15', NULL, NULL),
(280, '43', '17', NULL, NULL),
(281, '13', '5', NULL, NULL),
(282, '13', '9', NULL, NULL),
(283, '13', '10', NULL, NULL),
(284, '13', '14', NULL, NULL),
(285, '13', '16', NULL, NULL),
(286, '2', '5', NULL, NULL),
(287, '2', '8', NULL, NULL),
(288, '2', '10', NULL, NULL),
(289, '2', '12', NULL, NULL),
(290, '2', '17', NULL, NULL),
(291, '21', '3', NULL, NULL),
(292, '21', '8', NULL, NULL),
(293, '21', '10', NULL, NULL),
(294, '21', '14', NULL, NULL),
(295, '21', '16', NULL, NULL),
(296, '22', '5', NULL, NULL),
(297, '22', '6', NULL, NULL),
(298, '22', '10', NULL, NULL),
(299, '22', '15', NULL, NULL),
(300, '22', '16', NULL, NULL),
(301, '28', '4', NULL, NULL),
(302, '28', '7', NULL, NULL),
(303, '28', '10', NULL, NULL),
(304, '28', '14', NULL, NULL),
(305, '28', '16', NULL, NULL),
(306, '9', '5', NULL, NULL),
(307, '9', '6', NULL, NULL),
(308, '9', '10', NULL, NULL),
(309, '9', '12', NULL, NULL),
(310, '9', '16', NULL, NULL),
(311, '10', '5', NULL, NULL),
(312, '10', '6', NULL, NULL),
(313, '10', '10', NULL, NULL),
(314, '10', '14', NULL, NULL),
(315, '10', '16', NULL, NULL),
(316, '48', '5', NULL, NULL),
(317, '48', '6', NULL, NULL),
(318, '48', '11', NULL, NULL),
(319, '48', '15', NULL, NULL),
(320, '48', '16', NULL, NULL),
(321, '49', '1', NULL, NULL),
(322, '49', '9', NULL, NULL),
(323, '49', '10', NULL, NULL),
(324, '49', '13', NULL, NULL),
(325, '49', '16', NULL, NULL),
(331, '41', '3', NULL, NULL),
(332, '41', '6', NULL, NULL),
(333, '41', '10', NULL, NULL),
(334, '41', '14', NULL, NULL),
(335, '41', '16', NULL, NULL),
(336, '15', '5', NULL, NULL),
(337, '15', '6', NULL, NULL),
(338, '15', '11', NULL, NULL),
(339, '15', '14', NULL, NULL),
(340, '15', '16', NULL, NULL),
(341, '51', '4', NULL, NULL),
(342, '51', '6', NULL, NULL),
(343, '51', '10', NULL, NULL),
(344, '51', '12', NULL, NULL),
(345, '51', '16', NULL, NULL),
(351, '19', '3', NULL, NULL),
(352, '19', '6', NULL, NULL),
(353, '19', '10', NULL, NULL),
(354, '19', '15', NULL, NULL),
(355, '19', '17', NULL, NULL),
(356, '24', '4', NULL, NULL),
(357, '24', '8', NULL, NULL),
(358, '24', '10', NULL, NULL),
(359, '24', '14', NULL, NULL),
(360, '24', '16', NULL, NULL),
(361, '27', '1', NULL, NULL),
(362, '27', '8', NULL, NULL),
(363, '27', '11', NULL, NULL),
(364, '27', '15', NULL, NULL),
(365, '27', '16', NULL, NULL),
(366, '29', '3', NULL, NULL),
(367, '29', '6', NULL, NULL),
(368, '29', '10', NULL, NULL),
(369, '29', '15', NULL, NULL),
(370, '29', '17', NULL, NULL),
(371, '30', '5', NULL, NULL),
(372, '30', '6', NULL, NULL),
(373, '30', '10', NULL, NULL),
(374, '30', '14', NULL, NULL),
(375, '30', '17', NULL, NULL),
(376, '25', '3', NULL, NULL),
(377, '25', '6', NULL, NULL),
(378, '25', '10', NULL, NULL),
(379, '25', '14', NULL, NULL),
(380, '25', '17', NULL, NULL),
(381, '33', '1', NULL, NULL),
(382, '33', '9', NULL, NULL),
(383, '33', '10', NULL, NULL),
(384, '33', '15', NULL, NULL),
(385, '33', '17', NULL, NULL),
(386, '36', '3', NULL, NULL),
(387, '36', '8', NULL, NULL),
(388, '36', '10', NULL, NULL),
(389, '36', '12', NULL, NULL),
(390, '36', '16', NULL, NULL),
(391, '45', '1', NULL, NULL),
(392, '45', '6', NULL, NULL),
(393, '45', '10', NULL, NULL),
(394, '45', '14', NULL, NULL),
(395, '45', '16', NULL, NULL),
(396, '52', '5', NULL, NULL),
(397, '52', '6', NULL, NULL),
(398, '52', '10', NULL, NULL),
(399, '52', '12', NULL, NULL),
(400, '52', '16', NULL, NULL),
(401, '46', '4', NULL, NULL),
(402, '46', '9', NULL, NULL),
(403, '46', '10', NULL, NULL),
(404, '46', '12', NULL, NULL),
(405, '46', '17', NULL, NULL),
(406, '23', '1', NULL, NULL),
(407, '23', '7', NULL, NULL),
(408, '23', '10', NULL, NULL),
(409, '23', '13', NULL, NULL),
(410, '23', '17', NULL, NULL),
(411, '32', '5', NULL, NULL),
(412, '32', '6', NULL, NULL),
(413, '32', '10', NULL, NULL),
(414, '32', '14', NULL, NULL),
(415, '32', '17', NULL, NULL),
(416, '47', '3', NULL, NULL),
(417, '47', '9', NULL, NULL),
(418, '47', '10', NULL, NULL),
(419, '47', '15', NULL, NULL),
(420, '47', '16', NULL, NULL),
(421, '17', '1', NULL, NULL),
(422, '17', '6', NULL, NULL),
(423, '17', '11', NULL, NULL),
(424, '17', '13', NULL, NULL),
(425, '17', '16', NULL, NULL),
(426, '26', '1', NULL, NULL),
(427, '26', '7', NULL, NULL),
(428, '26', '10', NULL, NULL),
(429, '26', '13', NULL, NULL),
(430, '26', '16', NULL, NULL),
(431, '35', '5', NULL, NULL),
(432, '35', '9', NULL, NULL),
(433, '35', '10', NULL, NULL),
(434, '35', '13', NULL, NULL),
(435, '35', '16', NULL, NULL),
(436, '40', '2', NULL, NULL),
(437, '40', '6', NULL, NULL),
(438, '40', '10', NULL, NULL),
(439, '40', '15', NULL, NULL),
(440, '40', '17', NULL, NULL),
(441, '1', '5', NULL, NULL),
(442, '1', '6', NULL, NULL),
(443, '1', '11', NULL, NULL),
(444, '1', '12', NULL, NULL),
(445, '1', '16', NULL, NULL),
(446, '8', '1', NULL, NULL),
(447, '8', '8', NULL, NULL),
(448, '8', '11', NULL, NULL),
(449, '8', '15', NULL, NULL),
(450, '8', '16', NULL, NULL),
(451, '11', '2', NULL, NULL),
(452, '11', '6', NULL, NULL),
(453, '11', '10', NULL, NULL),
(454, '11', '15', NULL, NULL),
(455, '11', '17', NULL, NULL),
(456, '31', '4', NULL, NULL),
(457, '31', '6', NULL, NULL),
(458, '31', '10', NULL, NULL),
(459, '31', '12', NULL, NULL),
(460, '31', '16', NULL, NULL),
(461, '34', '4', NULL, NULL),
(462, '34', '9', NULL, NULL),
(463, '34', '11', NULL, NULL),
(464, '34', '15', NULL, NULL),
(465, '34', '16', NULL, NULL),
(466, '37', '5', NULL, NULL),
(467, '37', '7', NULL, NULL),
(468, '37', '11', NULL, NULL),
(469, '37', '12', NULL, NULL),
(470, '37', '17', NULL, NULL),
(471, '38', '1', NULL, NULL),
(472, '38', '9', NULL, NULL),
(473, '38', '10', NULL, NULL),
(474, '38', '15', NULL, NULL),
(475, '38', '16', NULL, NULL),
(476, '3', '3', NULL, NULL),
(477, '3', '8', NULL, NULL),
(478, '3', '10', NULL, NULL),
(479, '3', '12', NULL, NULL),
(480, '3', '16', NULL, NULL),
(481, '4', '3', NULL, NULL),
(482, '4', '6', NULL, NULL),
(483, '4', '11', NULL, NULL),
(484, '4', '12', NULL, NULL),
(485, '4', '16', NULL, NULL),
(486, '6', '4', NULL, NULL),
(487, '6', '6', NULL, NULL),
(488, '6', '10', NULL, NULL),
(489, '6', '12', NULL, NULL),
(490, '6', '16', NULL, NULL),
(491, '44', '1', NULL, NULL),
(492, '44', '9', NULL, NULL),
(493, '44', '10', NULL, NULL),
(494, '44', '14', NULL, NULL),
(495, '44', '16', NULL, NULL),
(496, '5', '5', NULL, NULL),
(497, '5', '9', NULL, NULL),
(498, '5', '10', NULL, NULL),
(499, '5', '12', NULL, NULL),
(500, '5', '17', NULL, NULL),
(501, '7', '1', NULL, NULL),
(502, '7', '6', NULL, NULL),
(503, '7', '11', NULL, NULL),
(504, '7', '14', NULL, NULL),
(505, '7', '16', NULL, NULL),
(506, '14', '4', NULL, NULL),
(507, '14', '6', NULL, NULL),
(508, '14', '10', NULL, NULL),
(509, '14', '14', NULL, NULL),
(510, '14', '16', NULL, NULL),
(511, '12', '4', NULL, NULL),
(512, '12', '8', NULL, NULL),
(513, '12', '10', NULL, NULL),
(514, '12', '14', NULL, NULL),
(515, '12', '16', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Đỗ Bùi Trung Hiếu', 'trunghieu@gmail.com', NULL, '$2y$10$eKXvuSbf2sjjZio1C51gpurM0OCtaCQEiNLymxqlQH7VvSquCdrAG', 'active', 'AJywdoeREfxR5nAb9AwgwSEnzD6aW4LNb4nYPPN9mQQ3L6GvRjhItTLmnXRx', '2020-12-03 11:37:51', '2020-12-03 11:37:51'),
(2, 'Trần Văn Ngọc Hải', 'hai@gmail.com', NULL, '$2y$10$YD3WILWZ95ckOXIwO3kHw.rFdulWLN76dlqYkzs0onwJwORdtcHK.', 'active', NULL, '2020-12-03 11:42:07', '2020-12-03 11:42:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, '1', '255 Nguyễn Thái Bình, Tân Bình, Hồ Chí Minh', '0921234567', '2020-12-03 11:37:52', '2020-12-03 11:37:52'),
(2, '1', '17A Cộng Hòa, phường 13, quận Tân Bình', '0981234567', '2020-12-03 11:39:10', '2020-12-03 11:39:10'),
(3, '2', '17A Cộng Hòa, phường 13, quận Tân Bình', '0921234567', '2020-12-03 11:42:07', '2020-12-03 11:42:07'),
(4, '2', '255 Trần Văn Dư phường 13, quận Tân Bình', '0951234567', '2020-12-03 11:45:48', '2020-12-03 11:45:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `config_details`
--
ALTER TABLE `config_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_configs`
--
ALTER TABLE `product_configs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `config_details`
--
ALTER TABLE `config_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `product_configs`
--
ALTER TABLE `product_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
