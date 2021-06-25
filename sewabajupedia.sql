-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 10:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewabajupedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `AgentID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AgentNama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AgentEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AgentPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AgentPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AgentSaldo` int(11) NOT NULL,
  `AgentPicturePath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AgentAlamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AgentRating` double(2,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`AgentID`, `AgentNama`, `AgentEmail`, `AgentPassword`, `AgentPhone`, `AgentSaldo`, `AgentPicturePath`, `AgentAlamat`, `AgentRating`, `created_at`, `updated_at`) VALUES
('USER-0205', 'Jonathan', 'jonathan@gmail.com', '$2y$10$sIWkA5OHqOzYDjfAr2IA1OEw57SPcNHA.F2B2H88Vxyb9p65BWcr6', '', 1000000, 'profile-images/blank-profile-picture-973460_1280.png', '', 0.0, '2021-06-21 00:28:51', '2021-06-21 00:28:51'),
('USER-1399', 'Kevin N', 'kevin@gmail.com', '$2y$10$5P0RpbI4g1/dKKwUh4znx.yXgSD.f0sXme2UlKpcKiOF7zchLPeie', '08234223', 70017, 'profile-images/blank-profile-picture-973460_1280.png', 'jl kejaksaan', 0.0, '2021-06-21 00:27:59', '2021-06-21 00:27:59'),
('USER-3419', 'William', 'william@gmail.com', '$2y$10$GEHY7dEe5Ha9cgaTmXhdLOUnNMz2AWgI4FCG0iVOBmczGkf1As2aO', '0823423423', 8455, 'profile-images/Ran7ftIivwM6x7SprtkwctzpPxAquNFCLypSSw4I.jpg', 'asasd', 0.0, '2021-06-21 06:58:58', '2021-06-21 06:58:58'),
('USER-4457', 'yohanes', 'a@g.com', '$2y$10$0DcKMOLZVr1umVJ8KM5BQOlIoBRON4qdqHCsx/44ZG3nIn1xrvas.', '', 1045000, 'profile-images/blank-profile-picture-973460_1280.png', '', 0.0, '2021-06-21 19:50:06', '2021-06-21 19:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerNama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerSaldo` int(11) NOT NULL,
  `CustomerPicturePath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerAlamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `CustomerNama`, `CustomerEmail`, `CustomerPassword`, `CustomerPhone`, `CustomerSaldo`, `CustomerPicturePath`, `CustomerAlamat`, `created_at`, `updated_at`) VALUES
('USER-0205', 'Jonathan', 'jonathan@gmail.com', '$2y$10$sIWkA5OHqOzYDjfAr2IA1OEw57SPcNHA.F2B2H88Vxyb9p65BWcr6', '', 1000000, 'profile-images/blank-profile-picture-973460_1280.png', '', '2021-06-21 00:28:51', '2021-06-21 00:28:51'),
('USER-1399', 'Kevin N', 'kevin@gmail.com', '$2y$10$5P0RpbI4g1/dKKwUh4znx.yXgSD.f0sXme2UlKpcKiOF7zchLPeie', '08234223', 70017, 'profile-images/blank-profile-picture-973460_1280.png', 'jl kejaksaan', '2021-06-21 00:27:59', '2021-06-21 00:27:59'),
('USER-3419', 'William', 'william@gmail.com', '$2y$10$GEHY7dEe5Ha9cgaTmXhdLOUnNMz2AWgI4FCG0iVOBmczGkf1As2aO', '0823423423', 8455, 'profile-images/Ran7ftIivwM6x7SprtkwctzpPxAquNFCLypSSw4I.jpg', 'asasd', '2021-06-21 06:58:58', '2021-06-21 06:58:58'),
('USER-4457', 'yohanes', 'a@g.com', '$2y$10$0DcKMOLZVr1umVJ8KM5BQOlIoBRON4qdqHCsx/44ZG3nIn1xrvas.', '', 1045000, 'profile-images/blank-profile-picture-973460_1280.png', '', '2021-06-21 19:50:06', '2021-06-21 19:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryservices`
--

CREATE TABLE `deliveryservices` (
  `DeliveryServiceID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeliveryServiceName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeliveryServicePrice` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveryservices`
--

INSERT INTO `deliveryservices` (`DeliveryServiceID`, `DeliveryServiceName`, `DeliveryServicePrice`, `created_at`, `updated_at`) VALUES
('DS1', 'Go-Jek', 5000, NULL, NULL);

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `KategoriID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KategoriNama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KategoriPicturePath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`KategoriID`, `KategoriNama`, `KategoriPicturePath`, `created_at`, `updated_at`) VALUES
('K1', 'Pesta', 'storage/kategori/party_dress.jpg', NULL, NULL),
('K2', 'Formal', 'storage/kategori/formal.jpg', NULL, NULL),
('K3', 'Adat', 'storage/kategori/adat.jpg', NULL, NULL),
('K4', 'Batik', 'storage/kategori/batik.jpg', NULL, NULL),
('K5', 'Cosplay', 'storage/kategori/cosplay.jpg', NULL, NULL),
('K6', 'Gaun', 'storage/kategori/dress.jpg', NULL, NULL),
('K7', 'Jas', 'storage/kategori/jas.jpg', NULL, NULL),
('K8', 'Baby', 'storage/kategori/baby.jpg', NULL, NULL),
('K9', 'Other/Lainnya', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laundryservices`
--

CREATE TABLE `laundryservices` (
  `LaundryServiceID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LaundryServiceName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LaundryServicePrice` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laundryservices`
--

INSERT INTO `laundryservices` (`LaundryServiceID`, `LaundryServiceName`, `LaundryServicePrice`, `created_at`, `updated_at`) VALUES
('LS1', 'Aqualis', 50000, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_11_041355_create_customers_table', 1),
(5, '2021_05_11_042039_create_sizes_table', 1),
(6, '2021_05_11_042341_create_agents_table', 1),
(7, '2021_05_11_042527_create_kategoris_table', 1),
(8, '2021_05_11_042712_create_pakaians_table', 1),
(9, '2021_05_22_044016_create_deliveryservices_table', 1),
(10, '2021_05_22_044202_create_laundryservices_table', 1),
(11, '2021_05_22_044236_create_transactionstatus_table', 1),
(12, '2021_05_22_150939_create_paymentmethods_table', 1),
(13, '2021_05_22_152031_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pakaians`
--

CREATE TABLE `pakaians` (
  `PakaianID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AgentID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KategoriID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SizeID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PakaianNama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PakaianHarga` int(11) NOT NULL,
  `PakaianGambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PakaianDeskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StockQty` int(11) NOT NULL,
  `PakaianRating` double(2,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pakaians`
--

INSERT INTO `pakaians` (`PakaianID`, `AgentID`, `KategoriID`, `SizeID`, `PakaianNama`, `PakaianHarga`, `PakaianGambar`, `PakaianDeskripsi`, `StockQty`, `PakaianRating`, `created_at`, `updated_at`) VALUES
('CLOT0126', 'USER-0205', 'K7', 'S5', 'Jass', 70000, 'cloth-images/i1N7pvklf9J4ZhM9afjJgCyCbukKXL4fPLLA0wzQ.jpg', 'Jas untuk acara bisnis ceritanya', -4, 0.0, NULL, NULL),
('CLOT3099', 'USER-0205', 'K1', 'S4', 'Pesta', 50000, 'cloth-images/XN9VSgskKpOw8OAp4t2FBx3NNrV5pP6E4IsQ0hLF.jpg', 'Baju buat pesta harian', 5, 0.0, NULL, NULL),
('CLOT6332', 'USER-4457', 'K7', 'S6', 'pakaian1', 20000, 'cloth-images/sBwCxuW4BusSkLiYxU7QYLMF07FlplWppoeecqmk.jpg', 'tehgfhg', 7, 0.0, NULL, NULL),
('CLOT6927', 'USER-0205', 'K8', 'S1', 'Baju Anak', 20000, 'cloth-images/iZgBM1hH44WkFDKAnr0vVyphHG3I74zLVhumMa8G.jpg', 'Baju untuk anak', 1, 0.0, NULL, NULL);

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
-- Table structure for table `paymentmethods`
--

CREATE TABLE `paymentmethods` (
  `PaymentMethodID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PaymentMethodName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentmethods`
--

INSERT INTO `paymentmethods` (`PaymentMethodID`, `PaymentMethodName`, `created_at`, `updated_at`) VALUES
('PM1', 'COD', NULL, NULL),
('PM2', 'E-wallet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `SizeID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeskripsiSize` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`SizeID`, `DeskripsiSize`, `created_at`, `updated_at`) VALUES
('S1', 'XXS', NULL, NULL),
('S2', 'XS', NULL, NULL),
('S3', 'S', NULL, NULL),
('S4', 'M', NULL, NULL),
('S5', 'L', NULL, NULL),
('S6', 'XL', NULL, NULL),
('S7', 'XXL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CustomerID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PakaianID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeliveryServiceID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LaundryServiceID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TransactionStatusID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PaymentMethodID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Penalty` int(11) NOT NULL,
  `MulaiSewa` date NOT NULL,
  `SelesaiSewa` date NOT NULL,
  `TransactionDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `CustomerID`, `PakaianID`, `DeliveryServiceID`, `LaundryServiceID`, `TransactionStatusID`, `PaymentMethodID`, `Penalty`, `MulaiSewa`, `SelesaiSewa`, `TransactionDate`, `created_at`, `updated_at`) VALUES
('TRANS-0617', 'USER-1399', 'CLOT6332', 'DS1', 'LS1', 'TS3', 'PM2', 0, '2021-06-25', '2021-06-30', '2021-06-24', NULL, NULL),
('TRANS-2989', 'USER-1399', 'CLOT6927', 'DS1', 'LS1', 'TS3', 'PM2', 0, '2021-06-02', '2021-06-18', '2021-06-22', NULL, NULL),
('TRANS-4566', 'USER-3419', 'CLOT0126', 'DS1', 'LS1', 'TS3', 'PM1', 0, '2021-06-03', '2021-06-30', '2021-06-21', NULL, NULL),
('TRANS-6520', 'USER-1399', 'CLOT6332', 'DS1', 'LS1', 'TS3', 'PM2', 0, '2021-06-24', '2021-06-30', '2021-06-22', NULL, NULL),
('TRANS-7014', 'USER-1399', 'CLOT0126', 'DS1', 'LS1', 'TS3', 'PM1', 0, '2021-06-21', '2021-06-22', '2021-06-21', NULL, NULL),
('TRANS-8346', 'USER-4457', 'CLOT6927', 'DS1', 'LS1', 'TS3', 'PM2', 0, '2021-06-24', '2021-06-30', '2021-06-22', NULL, NULL),
('TRANS-8800', 'USER-1399', 'CLOT0126', 'DS1', 'LS1', 'TS3', 'PM2', 0, '2021-06-21', '2021-06-22', '2021-06-21', NULL, NULL),
('TRANS-9927', 'USER-3419', 'CLOT0126', 'DS1', 'LS1', 'TS3', 'PM2', 0, '2021-06-23', '2021-06-30', '2021-06-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactionstatus`
--

CREATE TABLE `transactionstatus` (
  `TransactionStatusID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TransactionStatusDesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactionstatus`
--

INSERT INTO `transactionstatus` (`TransactionStatusID`, `TransactionStatusDesc`, `created_at`, `updated_at`) VALUES
('TS1', 'Sedang Menyewa', NULL, NULL),
('TS2', 'Selesai Menyewa', NULL, NULL),
('TS3', 'Pesanan Diproses', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`AgentID`),
  ADD UNIQUE KEY `agents_agentemail_unique` (`AgentEmail`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `customers_customeremail_unique` (`CustomerEmail`);

--
-- Indexes for table `deliveryservices`
--
ALTER TABLE `deliveryservices`
  ADD PRIMARY KEY (`DeliveryServiceID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indexes for table `laundryservices`
--
ALTER TABLE `laundryservices`
  ADD PRIMARY KEY (`LaundryServiceID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakaians`
--
ALTER TABLE `pakaians`
  ADD PRIMARY KEY (`PakaianID`),
  ADD KEY `pakaians_agentid_foreign` (`AgentID`),
  ADD KEY `pakaians_kategoriid_foreign` (`KategoriID`),
  ADD KEY `pakaians_sizeid_foreign` (`SizeID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentmethods`
--
ALTER TABLE `paymentmethods`
  ADD PRIMARY KEY (`PaymentMethodID`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`SizeID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `transactions_customerid_foreign` (`CustomerID`),
  ADD KEY `transactions_pakaianid_foreign` (`PakaianID`),
  ADD KEY `transactions_deliveryserviceid_foreign` (`DeliveryServiceID`),
  ADD KEY `transactions_laundryserviceid_foreign` (`LaundryServiceID`),
  ADD KEY `transactions_transactionstatusid_foreign` (`TransactionStatusID`),
  ADD KEY `transactions_paymentmethodid_foreign` (`PaymentMethodID`);

--
-- Indexes for table `transactionstatus`
--
ALTER TABLE `transactionstatus`
  ADD PRIMARY KEY (`TransactionStatusID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pakaians`
--
ALTER TABLE `pakaians`
  ADD CONSTRAINT `pakaians_agentid_foreign` FOREIGN KEY (`AgentID`) REFERENCES `agents` (`AgentID`),
  ADD CONSTRAINT `pakaians_kategoriid_foreign` FOREIGN KEY (`KategoriID`) REFERENCES `kategoris` (`KategoriID`),
  ADD CONSTRAINT `pakaians_sizeid_foreign` FOREIGN KEY (`SizeID`) REFERENCES `sizes` (`SizeID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customerid_foreign` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`),
  ADD CONSTRAINT `transactions_deliveryserviceid_foreign` FOREIGN KEY (`DeliveryServiceID`) REFERENCES `deliveryservices` (`DeliveryServiceID`),
  ADD CONSTRAINT `transactions_laundryserviceid_foreign` FOREIGN KEY (`LaundryServiceID`) REFERENCES `laundryservices` (`LaundryServiceID`),
  ADD CONSTRAINT `transactions_pakaianid_foreign` FOREIGN KEY (`PakaianID`) REFERENCES `pakaians` (`PakaianID`),
  ADD CONSTRAINT `transactions_paymentmethodid_foreign` FOREIGN KEY (`PaymentMethodID`) REFERENCES `paymentmethods` (`PaymentMethodID`),
  ADD CONSTRAINT `transactions_transactionstatusid_foreign` FOREIGN KEY (`TransactionStatusID`) REFERENCES `transactionstatus` (`TransactionStatusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
