-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 04:53 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleetman`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvers`
--

CREATE TABLE `approvers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dept` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carmasters`
--

CREATE TABLE `carmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opStatusCode` int(11) DEFAULT NULL,
  `assDriver` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `regDate` date DEFAULT NULL,
  `insuranceDue` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `fleet_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `location`, `gmName`, `gmEmail`, `lat`, `long`, `address`, `status`, `fleet_id`, `created_at`, `updated_at`) VALUES
(1, 'NPRNL', 'AGBARA', 'Singgih Widodo', 'singgih.widodo@natural-prime.com', '3.4257899', '53.2556668', 'NO 1 OPIC INDUSTRIAL ESTATE, OPIC ESTATE, OGUN STATE, NIGERIA', 1, NULL, '2019-07-22 13:52:39', '2019-07-23 07:26:05'),
(2, 'ESRNL', 'AGBARA', 'Yohannes Budi', 'yohannes.budi@esrnl.com', '3.65898774854', '4.6898461554', 'NO 1 OPIC INDUSTRIAL ESTATE, OPIC ESTATE, OGUN STATE, NIGERIAS', 1, NULL, '2019-07-22 14:00:38', '2019-07-23 07:25:59'),
(3, 'PFNL', 'AGBARA', 'Mehdi Rodiant', 'mehdi.rodianto@primerafood-nigeria.co', NULL, NULL, NULL, 1, NULL, '2019-08-06 07:17:56', '2019-08-06 07:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hodName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hodEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deptSize` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comp_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `hodName`, `hodEmail`, `deptSize`, `status`, `comp_id`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'Herry Wijayanto', 'herrry.wijayanto@natrural-prime.com', '6', '1', 1, '2019-07-25 14:36:40', '2019-07-26 07:31:41'),
(2, 'IT', 'Yonatan Christian', 'yonatan.refa@esrnl.com', '5', '1', 2, '2019-07-25 14:47:54', '2019-08-06 07:35:57'),
(3, 'MARKETING', 'Mrs Abimbola', NULL, '6', '1', 3, '2019-08-06 07:29:56', '2019-08-06 07:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `drvName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drvStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drvRank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drvRating` int(11) DEFAULT NULL,
  `drvExcessMilage` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faultStat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cap_uom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_uom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `fleet_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

CREATE TABLE `fleet` (
  `id` int(10) UNSIGNED NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fleetClass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chasis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engineNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PIC` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fleetStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statusCar` tinyint(1) DEFAULT NULL,
  `dept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fleet`
--

INSERT INTO `fleet` (`id`, `model`, `type`, `regDate`, `regNo`, `make`, `fleetClass`, `cost`, `vin`, `chasis`, `engineNo`, `PIC`, `picEmail`, `fleetStatus`, `status`, `created_at`, `updated_at`, `statusCar`, `dept`, `company`, `company_id`) VALUES
(2, 'Rio', 'Saloon', '2016-12', 'EK8348GGE', 'Kia', NULL, 'NGN 6500000', NULL, '2019', NULL, 'Taofik', NULL, NULL, 1, '2019-07-29 13:26:19', '2019-08-05 10:21:34', NULL, '2', NULL, 2),
(3, 'Cerato', 'Saloon', '2017-04', 'JHUIGYGE338JBN', 'Kia', NULL, 'NGN 3500000', 'JFGHS89738JHJGH', '2003', NULL, 'Jane Ulenu', NULL, NULL, 1, '2019-07-29 13:27:38', '2019-07-29 13:27:38', NULL, '1', NULL, 1),
(4, 'Hilux', 'Bus', '2019-08-07', 'KJBJBDHBD', 'Toyota', NULL, 'NGN 8600000', NULL, '2010', NULL, NULL, NULL, NULL, 1, '2019-08-06 08:15:12', '2019-08-06 08:15:12', NULL, '3', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `fuelrecord`
--

CREATE TABLE `fuelrecord` (
  `id` int(10) UNSIGNED NOT NULL,
  `fillingStation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meterReading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pumpedLitres` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fillType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricePerLitre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastMilage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuelEconomy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuelType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recSource` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `fleet_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meterReading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendorName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendorPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partsChanged` text COLLATE utf8mb4_unicode_ci,
  `paymentType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payRef` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `fleet_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_10_144254_create_approvers_table', 1),
(4, '2018_10_15_143525_create_jobs_table', 1),
(5, '2018_10_29_111140_create_failed_jobs_table', 1),
(6, '2019_05_13_142055_create_drivers_table', 1),
(7, '2019_05_13_142202_create_carmasters_table', 1),
(9, '2019_05_13_142653_req', 1),
(10, '2019_07_17_110344_add_company_to_users_table', 2),
(11, '2019_07_17_114126_create_fleet_table', 3),
(12, '2019_07_17_123721_create_extra_table', 3),
(13, '2019_07_17_123747_create_company_table', 3),
(14, '2019_07_17_130150_create_renewalMaster_table', 4),
(15, '2019_07_17_130231_create_renewal_table', 4),
(16, '2019_07_18_080947_create_fuelRecord_table', 5),
(17, '2019_07_18_081212_create_maintenance_table', 5),
(18, '2019_07_18_095310_add_to_fleet_table', 6),
(19, '2019_07_24_081228_create_departments_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `renewal`
--

CREATE TABLE `renewal` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastSub` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nextSub` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notFreq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paidBy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notSent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  `renewalCost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `fleet_id` int(10) UNSIGNED DEFAULT NULL,
  `renewal_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renewal`
--

INSERT INTO `renewal` (`id`, `lastSub`, `nextSub`, `notType`, `notDate`, `notFreq`, `paymentDate`, `paidBy`, `notSent`, `status`, `renewalCost`, `fleet_id`, `renewal_id`, `created_at`, `updated_at`) VALUES
(1, '2019-08-01', '2019-08-16', NULL, '72', NULL, NULL, 'Timothy Ezemba', '0', 1, '22500', 2, 1, '2019-08-01 13:54:11', '2019-08-01 14:45:02'),
(2, '2019-08-01', '2019-08-07', NULL, '24', NULL, NULL, 'Agbaje Lola', '10', 1, '1800', 3, 2, '2019-08-01 13:55:39', '2019-08-01 14:36:49'),
(3, '2019-08-01', '2019-08-01', NULL, '4', NULL, NULL, 'Timothy Ezemba', '5', 1, '22500', 2, 1, '2019-08-01 14:25:04', '2019-08-01 14:36:35'),
(4, '2019-08-01', '2022-08-01', NULL, '8736', NULL, NULL, NULL, '10', 1, NULL, 2, 1, '2019-08-02 14:02:26', '2019-08-02 14:02:26'),
(5, '2019-08-05', '2020-08-15', NULL, '96', NULL, NULL, NULL, '0', 1, NULL, 2, 5, '2019-08-02 14:08:21', '2019-08-02 14:08:21'),
(6, '2019-08-05', '2019-08-09', NULL, '1', NULL, NULL, NULL, '9', 1, NULL, 2, 6, '2019-08-02 14:09:25', '2019-08-02 14:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `renewalmaster`
--

CREATE TABLE `renewalmaster` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuerAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactNum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_uom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `fleet_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renewalmaster`
--

INSERT INTO `renewalmaster` (`id`, `name`, `desc`, `issuer`, `issuerAddress`, `contactName`, `contactNum`, `frequency`, `validity`, `valid_uom`, `status`, `fleet_id`, `created_at`, `updated_at`) VALUES
(1, 'Drivers License', NULL, NULL, NULL, NULL, NULL, 'Yearly', '3', 'Years', 1, NULL, '2019-08-01 10:21:00', '2019-08-01 10:21:00'),
(2, 'Agbara Estate GatePass', NULL, NULL, NULL, NULL, NULL, NULL, '5', 'Days', 1, NULL, '2019-08-01 10:26:41', '2019-08-01 10:26:41'),
(3, 'Parkview Pass', NULL, NULL, NULL, NULL, NULL, 'Weekly', '2', 'Weeks', 1, NULL, '2019-08-01 10:27:08', '2019-08-01 10:27:08'),
(4, 'Banana Security Pass', 'rghrhbethbr', 'bbtbt', 'trtrnbtrnhtr', 'rththt', 'rththt', NULL, '5', 'Months', 1, NULL, '2019-08-01 10:27:36', '2019-08-02 15:14:04'),
(5, 'Magbon Security Clearance', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Year', 1, NULL, '2019-08-01 10:28:15', '2019-08-01 10:28:15'),
(6, 'Mary Food Clearance', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Day', 1, NULL, '2019-08-01 10:28:37', '2019-08-01 10:28:37'),
(7, 'HACKNEY PERMIT', NULL, 'FEDERAL GOVERNMENT', 'f4f3ffefefef', 'cdcwececec', 'cdcwececec', NULL, '3', 'Months', 0, NULL, '2019-08-06 08:41:20', '2019-08-06 08:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `req`
--

CREATE TABLE `req` (
  `id` int(10) UNSIGNED NOT NULL,
  `reqName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reqComp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reqDate` date NOT NULL,
  `reqTime` time NOT NULL,
  `reqDept` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reqDest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reqPass` int(11) DEFAULT NULL,
  `passLoad` tinyint(1) DEFAULT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reqStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reqCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reqEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hodAppr` datetime DEFAULT NULL,
  `hodViewReq` datetime DEFAULT NULL,
  `hodName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gaViewReq` datetime DEFAULT NULL,
  `gaAppReq` datetime DEFAULT NULL,
  `gaName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hodRemark` text COLLATE utf8mb4_unicode_ci,
  `gaRemark` text COLLATE utf8mb4_unicode_ci,
  `retRemark` text COLLATE utf8mb4_unicode_ci,
  `retTime` datetime DEFAULT NULL,
  `retStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `retAck` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drvRemark` text COLLATE utf8mb4_unicode_ci,
  `hod_id` int(10) UNSIGNED DEFAULT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `roleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` int(11) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `roleName`, `access`, `admin`, `status`, `company_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Taofik Adebowale', 'taofik.alli-balogun@natural-prime.com', '$2y$10$c3gKCtby0nC0RAAWV2wQt./lj80XBLPhaPuar0bjWwlf5Y.tN9yAu', 3, NULL, NULL, 1, 1, NULL, 'H7q2eTW8Wu148I1DxBK6WxjAAvdEk9NjDQQ0trrOnRN0X2jYoU08nUTxnznm', '2019-07-18 08:37:13', '2019-07-18 08:37:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvers`
--
ALTER TABLE `approvers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carmasters`
--
ALTER TABLE `carmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_fleet_id_foreign` (`fleet_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_comp_id_index` (`comp_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extra_fleet_id_foreign` (`fleet_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fleet`
--
ALTER TABLE `fleet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fleet_company_id_foreign` (`company_id`);

--
-- Indexes for table `fuelrecord`
--
ALTER TABLE `fuelrecord`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuelrecord_fleet_id_foreign` (`fleet_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenance_fleet_id_foreign` (`fleet_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `renewal`
--
ALTER TABLE `renewal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `renewal_fleet_id_foreign` (`fleet_id`),
  ADD KEY `renewal_renewal_id_foreign` (`renewal_id`);

--
-- Indexes for table `renewalmaster`
--
ALTER TABLE `renewalmaster`
  ADD PRIMARY KEY (`id`),
  ADD KEY `renewalmaster_fleet_id_foreign` (`fleet_id`);

--
-- Indexes for table `req`
--
ALTER TABLE `req`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_hod_id_index` (`hod_id`),
  ADD KEY `req_driver_id_index` (`driver_id`),
  ADD KEY `req_car_id_index` (`car_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_company_id_foreign` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvers`
--
ALTER TABLE `approvers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carmasters`
--
ALTER TABLE `carmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `extra`
--
ALTER TABLE `extra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fleet`
--
ALTER TABLE `fleet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fuelrecord`
--
ALTER TABLE `fuelrecord`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `renewal`
--
ALTER TABLE `renewal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `renewalmaster`
--
ALTER TABLE `renewalmaster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `req`
--
ALTER TABLE `req`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_fleet_id_foreign` FOREIGN KEY (`fleet_id`) REFERENCES `fleet` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_comp_id_foreign` FOREIGN KEY (`comp_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `extra`
--
ALTER TABLE `extra`
  ADD CONSTRAINT `extra_fleet_id_foreign` FOREIGN KEY (`fleet_id`) REFERENCES `fleet` (`id`);

--
-- Constraints for table `fleet`
--
ALTER TABLE `fleet`
  ADD CONSTRAINT `fleet_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `fuelrecord`
--
ALTER TABLE `fuelrecord`
  ADD CONSTRAINT `fuelrecord_fleet_id_foreign` FOREIGN KEY (`fleet_id`) REFERENCES `fleet` (`id`);

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_fleet_id_foreign` FOREIGN KEY (`fleet_id`) REFERENCES `fleet` (`id`);

--
-- Constraints for table `renewal`
--
ALTER TABLE `renewal`
  ADD CONSTRAINT `renewal_fleet_id_foreign` FOREIGN KEY (`fleet_id`) REFERENCES `fleet` (`id`),
  ADD CONSTRAINT `renewal_renewal_id_foreign` FOREIGN KEY (`renewal_id`) REFERENCES `renewalmaster` (`id`);

--
-- Constraints for table `renewalmaster`
--
ALTER TABLE `renewalmaster`
  ADD CONSTRAINT `renewalmaster_fleet_id_foreign` FOREIGN KEY (`fleet_id`) REFERENCES `fleet` (`id`);

--
-- Constraints for table `req`
--
ALTER TABLE `req`
  ADD CONSTRAINT `req_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `carmasters` (`id`),
  ADD CONSTRAINT `req_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `req_hod_id_foreign` FOREIGN KEY (`hod_id`) REFERENCES `approvers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
