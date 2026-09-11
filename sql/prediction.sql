-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Aug 29, 2026 at 02:16 PM
-- Server version: 8.0.46
-- PHP Version: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinodtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `code`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka Branch', 'DHK', 'Gulshan, Dhaka', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(2, 'Chattogram Branch', 'CTG', 'Agrabad, Chattogram', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(3, 'Khulna Branch', 'KHL', 'Khulna', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('production_cache_test', 's:19:\"redis_cache_working\";', 1787767904);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rahim Uddin', 'rahim@example.com', '01710000001', 'Dhaka', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(2, 'Abdus Salam', 'salam@example.com', '01710078324', 'Dhaka', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(3, 'Fazle Rabbi', 'rabbi@example.com', '01789395930', 'Dhaka', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(4, 'Kolim Uddin', 'kolim@example.com', '01710000002', 'Chattogram', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(5, 'Jubayer Islam', 'jubayer@example.com', '01718625437', 'Chattogram', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(6, 'Jamal Hossain', 'jamal@example.com', '01710000003', 'Khulna', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(7, 'Sakib Ahmed', 'sakib@example.com', '01710000004', 'Rajshahi', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(8, 'Nusrat Jahan', 'nusrat@example.com', '01710000005', 'Sylhet', 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `customer_assignments`
--

CREATE TABLE `customer_assignments` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `assigned_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_assignments`
--

INSERT INTO `customer_assignments` (`id`, `customer_id`, `employee_id`, `assigned_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2026-08-11', '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(2, 6, 1, '2026-08-06', '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(3, 8, 2, '2026-08-16', '2026-08-26 07:52:31', '2026-08-26 07:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kpi_score` int UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `name`, `email`, `phone`, `designation`, `kpi_score`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EMP-1001', 'Nayeem Hasan', 'nayeem@example.com', '01810000001', 'Sales Executive', 2, 1, '2026-08-26 07:52:30', '2026-08-27 12:25:57'),
(2, 'EMP-1002', 'Fahim Ahmed', 'fahim@example.com', '01783267291', 'Sales Executive', 0, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(3, 'EMP-1003', 'Tanvir Hossain', 'tanvir@example.com', '01892626734', 'Sales Executive', 0, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(4, 'EMP-1004', 'Sojib Hasan', 'sojib@example.com', '01856372786', 'Inventory Auditor', 0, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(5, 'EMP-1005', 'Md Sahid', 'sahid@example.com', '01783447654', 'Purchase Officer', 0, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `branch_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, '2026-08-26 07:52:30', '2026-08-27 12:23:06'),
(2, 1, 2, 28, '2026-08-26 07:52:30', '2026-08-26 07:52:31'),
(3, 1, 3, 24, '2026-08-26 07:52:30', '2026-08-27 12:31:53'),
(4, 1, 4, 10, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(5, 2, 1, 6, '2026-08-26 07:52:30', '2026-08-27 12:52:06'),
(6, 2, 5, 15, '2026-08-26 07:52:30', '2026-08-27 12:52:06'),
(7, 2, 6, 17, '2026-08-26 07:52:30', '2026-08-27 12:26:42'),
(8, 3, 2, 12, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(9, 3, 7, 13, '2026-08-26 07:52:30', '2026-08-27 12:25:57'),
(10, 3, 8, 20, '2026-08-26 07:52:30', '2026-08-26 07:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_18_192231_create_branches_table', 1),
(5, '2026_07_18_195602_create_products_table', 1),
(6, '2026_07_18_202441_create_inventories_table', 1),
(7, '2026_07_19_025637_create_customers_table', 1),
(8, '2026_07_19_034112_create_employees_table', 1),
(9, '2026_07_19_043901_create_sales_table', 1),
(10, '2026_07_19_043908_create_sale_items_table', 1),
(11, '2026_07_19_131929_create_customer_assignments_table', 1),
(12, '2026_07_19_163617_create_personal_access_tokens_table', 1),
(13, '2026_08_20_075622_create_user_locations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dell Inspiron 15', 'LAP-1001', 65000.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(2, 'Logitech Wireless Mouse', 'MOU-1002', 1200.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(3, 'Mechanical Keyboard', 'KEY-1003', 3500.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(4, '27 Inch Monitor', 'MON-1004', 22000.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(5, 'HP Laser Printer', 'PRI-1005', 18000.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(6, '1TB SSD', 'SSD-1006', 8500.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(7, '16GB DDR4 RAM', 'RAM-1007', 5200.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(8, 'WiFi Router', 'NET-1008', 3200.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(9, 'Web Camera', 'CAM-1009', 2700.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30'),
(10, 'UPS 650VA', 'UPS-1010', 4800.00, 1, '2026-08-26 07:52:30', '2026-08-26 07:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `sale_date` date NOT NULL,
  `grand_total` decimal(12,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_no`, `branch_id`, `customer_id`, `sale_date`, `grand_total`, `status`, `created_at`, `updated_at`) VALUES
(1, 'INV-20260701-00001', 1, 1, '2026-08-16', 67400.00, 1, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(2, 'INV-20260301-00002', 2, 2, '2026-04-18', 101000.00, 1, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(3, 'INV-20260710-00003', 1, 3, '2026-08-21', 5200.00, 1, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(4, 'INV-20260210-00004', 3, 4, '2026-03-09', 6400.00, 1, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(5, 'INV-20260715-00005', 2, 5, '2026-08-24', 18000.00, 1, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(6, 'INV-20260120-00006', 1, 6, '2026-02-27', 8500.00, 1, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(7, 'INV-20260827-00007', 1, 1, '2026-08-27', 65000.00, 1, '2026-08-27 12:23:06', '2026-08-27 12:23:06'),
(8, 'INV-20260827-00008', 2, 2, '2026-08-27', 18000.00, 1, '2026-08-27 12:24:50', '2026-08-27 12:24:50'),
(9, 'INV-20260827-00009', 3, 6, '2026-08-27', 5200.00, 1, '2026-08-27 12:25:57', '2026-08-27 12:25:57'),
(10, 'INV-20260827-00010', 2, 7, '2026-08-27', 8500.00, 1, '2026-08-27 12:26:42', '2026-08-27 12:26:42'),
(11, 'INV-20260827-00011', 1, 4, '2026-08-27', 3500.00, 1, '2026-08-27 12:31:53', '2026-08-27 12:31:53'),
(12, 'INV-20260827-00012', 2, 2, '2026-08-27', 83000.00, 1, '2026-08-27 12:52:06', '2026-08-27 12:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint UNSIGNED NOT NULL,
  `sale_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `unit_price` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `quantity`, `unit_price`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 65000.00, 65000.00, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(2, 1, 2, 2, 1200.00, 2400.00, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(3, 2, 1, 1, 65000.00, 65000.00, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(4, 2, 5, 2, 18000.00, 36000.00, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(5, 3, 7, 1, 5200.00, 5200.00, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(6, 4, 8, 2, 3200.00, 6400.00, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(7, 5, 5, 1, 18000.00, 18000.00, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(8, 6, 6, 1, 8500.00, 8500.00, '2026-08-26 07:52:31', '2026-08-26 07:52:31'),
(9, 7, 1, 1, 65000.00, 65000.00, '2026-08-27 12:23:06', '2026-08-27 12:23:06'),
(10, 8, 5, 1, 18000.00, 18000.00, '2026-08-27 12:24:50', '2026-08-27 12:24:50'),
(11, 9, 7, 1, 5200.00, 5200.00, '2026-08-27 12:25:57', '2026-08-27 12:25:57'),
(12, 10, 6, 1, 8500.00, 8500.00, '2026-08-27 12:26:42', '2026-08-27 12:26:42'),
(13, 11, 3, 1, 3500.00, 3500.00, '2026-08-27 12:31:53', '2026-08-27 12:31:53'),
(14, 12, 1, 1, 65000.00, 65000.00, '2026-08-27 12:52:06', '2026-08-27 12:52:06'),
(15, 12, 5, 1, 18000.00, 18000.00, '2026-08-27 12:52:06', '2026-08-27 12:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BocExkcSlKKWpVFrf7Bxt25QKu9GPa3mtJMUKuG2', 1, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaU8zVUdxVlpVbHp6UVZGb0Noa09mOXRUNTlDU09aejBEZ2dtbW5tMSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwODAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1787794582),
('J880PDC5cY5c3mhfIY13noHYVj7R4EBvyhGDSgbQ', 1, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM0NaaXZuRWF5WnVmclYyU3RwdVB1U2NPR0o4M0hoQVBXNUlIc0JzTyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwODAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1787898440),
('u56Hp2vBjm27XTfoKtXC1x3Qjfv7OlcG7CjlzZux', 1, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZXQ0TnF5UjZxV1BWdTlDMDNNV1MwUDh0a2IyWkNKaWlHRXplZkdRaiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwODAvc2FsZS9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1787852360),
('wpvdzT3fj5u1x0FbmRU3bHeLkQTV0KUcRoSTGYwt', 1, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV0tTb0ZoOHRSOTBrd2hWdHJSVUpWQnNJSmhCRFIwcFNnVks5ZzRrUCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwODAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1787805243),
('Y9CyxtahSkj8QAzageU4SnD2SU3gA0Ijuu6JAJ2Q', 1, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia2Y5QnV0VVlQeXE4RkdtYjJtcE5rYWdibE9SQ1lkaHVFMUZwb0NlSSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwODAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1787768825),
('YReEZk8HcAI0Zq2qlm6TV0Iwe6IMPzK72mFJvN3K', 1, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQkdVSzE5RFU4TVd1MTZmOGtNME5td2s5WTJTWlpLclNPTUYyak1GVCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwODAvc2FsZS9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1787835128),
('ZZXHY1aCld4szETBXxdZi2UvZ3voogzqGIUQUGoh', 1, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUk9FejZlRXVvcDZ4MXVzVXpMT1c1MzFZNHRBUVlWcTd2U1VEWEtuYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODA4MC9icmFuY2hlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1787733048);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$rAmLAGoUIywaAnq16u8ebuw0iXryOcUXO0L/m5OprxiQBbVVySkbO', NULL, '2026-08-26 07:52:30', '2026-08-26 07:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_code_unique` (`code`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `customer_assignments`
--
ALTER TABLE `customer_assignments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_assignments_customer_id_unique` (`customer_id`),
  ADD KEY `customer_assignments_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_id_unique` (`employee_id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventories_branch_id_product_id_unique` (`branch_id`,`product_id`),
  ADD KEY `inventories_product_id_foreign` (`product_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_invoice_no_unique` (`invoice_no`),
  ADD KEY `sales_branch_id_foreign` (`branch_id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_items_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_locations_user_id_foreign` (`user_id`),
  ADD KEY `user_locations_latitude_longitude_index` (`latitude`,`longitude`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_assignments`
--
ALTER TABLE `customer_assignments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_assignments`
--
ALTER TABLE `customer_assignments`
  ADD CONSTRAINT `customer_assignments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_assignments_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD CONSTRAINT `sale_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sale_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD CONSTRAINT `user_locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
