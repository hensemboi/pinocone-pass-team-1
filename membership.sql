-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 08:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `membership_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `FK_userID` int(11) NOT NULL,
  `addressNo` tinyint(4) NOT NULL,
  `customAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stater` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `PK_FK_staffID` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwordHash` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `PK_categoryCode` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No category',
  `decription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `email`, `reason`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Upton', 'Gentry', 'zivyxuj@mailinator.com', 'project', 'Est commodi assumen', '2022-04-24 04:17:12', '2022-04-24 04:17:12'),
(2, 'Kaden', 'Hampton', 'zenixexyxy@mailinator.com', 'business', 'Est ut quisquam hic Est ut quisquam hic Est ut quisquam hic Est ut quisquam hic', '2022-04-24 04:27:57', '2022-04-24 04:27:57'),
(3, 'Dakota', 'Powers', 'wyqasyf@mailinator.com', 'ticket', 'Id sint laboris omnId sint laboris omnId sint laboris omnId sint laboris omn', '2022-04-24 04:58:41', '2022-04-24 04:58:41'),
(4, 'SHAH', 'JAHAN', 'innocentxd786@gmail.com', 'ticket', 'hjghjv hjv hjghjv hjv hjghjv hjv hjghjv hjv hjghjv hjv hjghjv hjv', '2022-04-24 05:15:35', '2022-04-24 05:15:35'),
(5, 'SHAH', 'JAHAN', 'innocentxd786@gmail.com', 'ticket', 'kopkopkopkopkopkopkopkopkopkopkopkop', '2022-04-24 10:56:04', '2022-04-24 10:56:04'),
(6, 'Todd', 'Duffy', 'myvy@mailinator.com', 'project', 'Sit id sint ad labor', '2022-04-24 10:56:13', '2022-04-24 10:56:13'),
(7, 'Whoopi', 'Irwin', 'wuxujovedy@mailinator.com', 'project', 'In nulla saepe volupIn nulla saepe volupIn nulla saepe volupIn nulla saepe volup', '2022-04-24 12:23:46', '2022-04-24 12:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine_types`
--

CREATE TABLE `cuisine_types` (
  `PK_cuisineCode` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Default name',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `PK_divisionCode` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'John Doe',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `PK_FK_transactionID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `textFeedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menuRating` tinyint(4) DEFAULT NULL,
  `deliveryRating` tinyint(4) DEFAULT NULL,
  `serviceRating` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fronts`
--

CREATE TABLE `fronts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `means_of_deliveries`
--

CREATE TABLE `means_of_deliveries` (
  `PK_deliveryCode` smallint(6) NOT NULL,
  `deliveryName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `FK_userID` int(11) NOT NULL,
  `startDate` datetime NOT NULL,
  `expiryDate` datetime NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `PK_menuID` int(10) UNSIGNED NOT NULL,
  `menuName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Default menu',
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No description',
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `totalOrders` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `FK_categoryCode` int(10) UNSIGNED NOT NULL,
  `FK_cuisineCode` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_subcategories`
--

CREATE TABLE `menu_subcategories` (
  `PK_FK_subCategoryCode` int(10) UNSIGNED NOT NULL,
  `PK_FK_menuID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_04_07_092456_create_items_table', 1),
(6, '2022_04_15_012834_create_users_table', 1),
(7, '2022_04_15_012835_create_addresses_table', 1),
(8, '2022_04_15_012836_create_divisions_table', 1),
(9, '2022_04_15_012837_create_positions_table', 1),
(10, '2022_04_15_012838_create_staffs_table', 1),
(11, '2022_04_15_012839_create_admins_table', 1),
(12, '2022_04_15_012840_create_categories_table', 1),
(13, '2022_04_15_012841_create_cuisine_types_table', 1),
(14, '2022_04_15_012842_create_means_of_deliveries_table', 1),
(15, '2022_04_15_012843_create_payment_methods_table', 1),
(16, '2022_04_15_012844_create_voucher_types_table', 1),
(17, '2022_04_15_012845_create_vouchers_table', 1),
(18, '2022_04_15_012846_create_orders_table', 1),
(19, '2022_04_15_012847_create_feedbacks_table', 1),
(20, '2022_04_15_012848_create_memberships_table', 1),
(21, '2022_04_15_012849_create_menus_table', 1),
(22, '2022_04_15_012850_create_sub_categories_table', 1),
(23, '2022_04_15_012851_create_menu_subcategories_table', 1),
(24, '2022_04_15_012852_create_ordered_menus_table', 1),
(25, '2022_04_15_012853_create_pinopays_table', 1),
(26, '2022_04_15_012855_create_user_devices_table', 1),
(27, '2022_04_15_012856_create_user_payment_methods_table', 1),
(28, '2022_04_15_012857_create_user_vouchers_table', 1),
(29, '2022_04_24_075616_create_fronts_table', 2),
(30, '2022_04_24_090245_create_contacts_table', 2),
(35, '2022_04_10_091411_create_test_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_menus`
--

CREATE TABLE `ordered_menus` (
  `PK_FK_transactionID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PK_FK_menuID` int(10) UNSIGNED NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `extraNote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `PK_transactionID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FK_userID` int(11) DEFAULT NULL,
  `dateTime` datetime NOT NULL,
  `FK_paymentCode` tinyint(4) DEFAULT NULL,
  `extraNote` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalPrice` double(8,2) NOT NULL,
  `FK_voucherID` int(11) DEFAULT NULL,
  `FK_deliveryCode` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `PK_paymentCode` tinyint(4) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinopays`
--

CREATE TABLE `pinopays` (
  `FK_userID` int(11) NOT NULL,
  `balance` double(8,2) NOT NULL,
  `PIN` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `PK_positionCode` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FK_divisionCode` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `PK_staffID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passwordHash` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FK_positionCode` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `PK_subCategoryCode` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No category',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_users`
--

CREATE TABLE `test_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `expires_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_users`
--

INSERT INTO `test_users` (`id`, `name`, `username`, `email`, `email_verified_at`, `verification_token`, `password`, `package`, `expires_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gisela', NULL, 'gilizyf@mailinator.com', NULL, NULL, '$2y$10$jzf.U8ZUvjRojrgVQt13vumOop2dUV16zedfg53idY0KljTFBPIb2', '3', '05-24-2022', NULL, NULL, NULL),
(2, 'SHAH JAHAN', NULL, 'innocentxd786@gmail.com', NULL, NULL, '$2y$10$nQzSoTRMowDfhS0271QJ9uaAau.xscUFa4.2FmuP5bXvaihYD80l.', '3', '05-24-2022', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `PK_userID` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incentives` double(8,2) NOT NULL DEFAULT 0.00,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `PK_FK_userID` int(11) NOT NULL,
  `deviceNo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deviceOS` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deviceName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `webBrowser` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_methods`
--

CREATE TABLE `user_payment_methods` (
  `PK_FK_userID` int(11) NOT NULL,
  `PK_FK_paymentCode` tinyint(4) NOT NULL,
  `cardNo` int(11) NOT NULL,
  `balance` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_vouchers`
--

CREATE TABLE `user_vouchers` (
  `PK_FK_userID` int(11) NOT NULL,
  `PK_FK_voucherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `PK_voucherID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startDate` date NOT NULL,
  `expiryDate` date NOT NULL,
  `duration` time NOT NULL,
  `availability` tinyint(4) NOT NULL,
  `membership` tinyint(4) NOT NULL,
  `FK_voucherTypeCode` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_types`
--

CREATE TABLE `voucher_types` (
  `PK_voucherTypeCode` tinyint(4) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`FK_userID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`PK_FK_staffID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`PK_categoryCode`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisine_types`
--
ALTER TABLE `cuisine_types`
  ADD PRIMARY KEY (`PK_cuisineCode`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`PK_divisionCode`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`PK_FK_transactionID`);

--
-- Indexes for table `fronts`
--
ALTER TABLE `fronts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `means_of_deliveries`
--
ALTER TABLE `means_of_deliveries`
  ADD PRIMARY KEY (`PK_deliveryCode`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`FK_userID`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`PK_menuID`),
  ADD KEY `FK_categoryMenu` (`FK_categoryCode`),
  ADD KEY `FK_cuisineTypeMenu` (`FK_cuisineCode`);

--
-- Indexes for table `menu_subcategories`
--
ALTER TABLE `menu_subcategories`
  ADD PRIMARY KEY (`PK_FK_subCategoryCode`,`PK_FK_menuID`),
  ADD KEY `PK_FK_menuIDMenuSubcategories` (`PK_FK_menuID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_menus`
--
ALTER TABLE `ordered_menus`
  ADD PRIMARY KEY (`PK_FK_transactionID`,`PK_FK_menuID`),
  ADD KEY `PK_FK_menuIDOrderedMenu` (`PK_FK_menuID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`PK_transactionID`),
  ADD KEY `FK_orders_meansOfDelivery` (`FK_deliveryCode`),
  ADD KEY `FK_orders_paymentMethod` (`FK_paymentCode`),
  ADD KEY `FK_orders_users` (`FK_userID`),
  ADD KEY `FK_orders_vouchers` (`FK_voucherID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`PK_paymentCode`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinopays`
--
ALTER TABLE `pinopays`
  ADD PRIMARY KEY (`FK_userID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`PK_positionCode`),
  ADD KEY `FK_divisionCodePosition` (`FK_divisionCode`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`PK_staffID`),
  ADD KEY `FK_positionCodeStaff` (`FK_positionCode`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`PK_subCategoryCode`);

--
-- Indexes for table `test_users`
--
ALTER TABLE `test_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_users_id_unique` (`id`),
  ADD UNIQUE KEY `test_users_username_unique` (`username`),
  ADD UNIQUE KEY `test_users_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`PK_userID`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`PK_FK_userID`);

--
-- Indexes for table `user_payment_methods`
--
ALTER TABLE `user_payment_methods`
  ADD PRIMARY KEY (`PK_FK_paymentCode`,`PK_FK_userID`),
  ADD KEY `FK_userPaymentMethod_users` (`PK_FK_userID`);

--
-- Indexes for table `user_vouchers`
--
ALTER TABLE `user_vouchers`
  ADD PRIMARY KEY (`PK_FK_userID`,`PK_FK_voucherID`),
  ADD KEY `FK_userVouchers_vouchers` (`PK_FK_voucherID`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`PK_voucherID`),
  ADD KEY `FK_vouchers_voucherType` (`FK_voucherTypeCode`);

--
-- Indexes for table `voucher_types`
--
ALTER TABLE `voucher_types`
  ADD PRIMARY KEY (`PK_voucherTypeCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `PK_categoryCode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cuisine_types`
--
ALTER TABLE `cuisine_types`
  MODIFY `PK_cuisineCode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `PK_divisionCode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fronts`
--
ALTER TABLE `fronts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `PK_menuID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `PK_positionCode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `PK_staffID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `PK_subCategoryCode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_users`
--
ALTER TABLE `test_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `FK_address_users` FOREIGN KEY (`FK_userID`) REFERENCES `users` (`PK_userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `PK_FK_staffIDAdmin` FOREIGN KEY (`PK_FK_staffID`) REFERENCES `staffs` (`PK_staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `FK_feedbacks_orders` FOREIGN KEY (`PK_FK_transactionID`) REFERENCES `orders` (`PK_transactionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `FK_membership_users` FOREIGN KEY (`FK_userID`) REFERENCES `users` (`PK_userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `FK_categoryMenu` FOREIGN KEY (`FK_categoryCode`) REFERENCES `categories` (`PK_categoryCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cuisineTypeMenu` FOREIGN KEY (`FK_cuisineCode`) REFERENCES `cuisine_types` (`PK_cuisineCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_subcategories`
--
ALTER TABLE `menu_subcategories`
  ADD CONSTRAINT `PK_FK_menuIDMenuSubcategories` FOREIGN KEY (`PK_FK_menuID`) REFERENCES `menus` (`PK_menuID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PK_FK_subCategoryCodeMenuSubcategories` FOREIGN KEY (`PK_FK_subCategoryCode`) REFERENCES `sub_categories` (`PK_subCategoryCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordered_menus`
--
ALTER TABLE `ordered_menus`
  ADD CONSTRAINT `PK_FK_menuIDOrderedMenu` FOREIGN KEY (`PK_FK_menuID`) REFERENCES `menus` (`PK_menuID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PK_FK_transactionIDOrderedMenu` FOREIGN KEY (`PK_FK_transactionID`) REFERENCES `orders` (`PK_transactionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_meansOfDelivery` FOREIGN KEY (`FK_deliveryCode`) REFERENCES `means_of_deliveries` (`PK_deliveryCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orders_paymentMethod` FOREIGN KEY (`FK_paymentCode`) REFERENCES `payment_methods` (`PK_paymentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orders_users` FOREIGN KEY (`FK_userID`) REFERENCES `users` (`PK_userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orders_vouchers` FOREIGN KEY (`FK_voucherID`) REFERENCES `vouchers` (`PK_voucherID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinopays`
--
ALTER TABLE `pinopays`
  ADD CONSTRAINT `FK_pinopay_users` FOREIGN KEY (`FK_userID`) REFERENCES `users` (`PK_userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `FK_divisionCodePosition` FOREIGN KEY (`FK_divisionCode`) REFERENCES `divisions` (`PK_divisionCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `FK_positionCodeStaff` FOREIGN KEY (`FK_positionCode`) REFERENCES `positions` (`PK_positionCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD CONSTRAINT `FK_userDevices_users` FOREIGN KEY (`PK_FK_userID`) REFERENCES `users` (`PK_userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_payment_methods`
--
ALTER TABLE `user_payment_methods`
  ADD CONSTRAINT `FK_userPaymentMethod_paymentMethod` FOREIGN KEY (`PK_FK_paymentCode`) REFERENCES `payment_methods` (`PK_paymentCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_userPaymentMethod_users` FOREIGN KEY (`PK_FK_userID`) REFERENCES `users` (`PK_userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_vouchers`
--
ALTER TABLE `user_vouchers`
  ADD CONSTRAINT `FK_userVouchers_users` FOREIGN KEY (`PK_FK_userID`) REFERENCES `users` (`PK_userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_userVouchers_vouchers` FOREIGN KEY (`PK_FK_voucherID`) REFERENCES `vouchers` (`PK_voucherID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `FK_vouchers_voucherType` FOREIGN KEY (`FK_voucherTypeCode`) REFERENCES `voucher_types` (`PK_voucherTypeCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
