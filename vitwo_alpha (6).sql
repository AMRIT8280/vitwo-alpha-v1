-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 06:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitwo_alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `erp_acc_credit`
--

CREATE TABLE `erp_acc_credit` (
  `credit_id` bigint(20) NOT NULL,
  `journal_id` int(11) DEFAULT NULL,
  `credit_gl_code` varchar(11) DEFAULT NULL,
  `credit_amount` float(10,2) DEFAULT NULL,
  `credit_remark` text DEFAULT NULL,
  `credit_created_at` datetime DEFAULT current_timestamp(),
  `credit_created_by` varchar(255) DEFAULT NULL,
  `credit_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `credit_updated_by` varchar(255) DEFAULT NULL,
  `credit_status` enum('active','inactive','deleted','draft') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_acc_credit`
--

INSERT INTO `erp_acc_credit` (`credit_id`, `journal_id`, `credit_gl_code`, `credit_amount`, `credit_remark`, `credit_created_at`, `credit_created_by`, `credit_updated_at`, `credit_updated_by`, `credit_status`) VALUES
(1, 1, '02-01', 99000.00, '', '2022-09-14 00:51:55', '6', '2022-09-14 00:51:55', '6', 'active'),
(4, 2, '02-01', 68740.00, '', '2022-09-14 01:28:30', '6', '2022-09-14 01:28:30', '6', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_acc_debit`
--

CREATE TABLE `erp_acc_debit` (
  `debit_id` bigint(20) NOT NULL,
  `journal_id` int(11) DEFAULT NULL,
  `debit_gl_code` varchar(11) DEFAULT NULL,
  `debit_amount` float(10,2) DEFAULT NULL,
  `debit_remark` text DEFAULT NULL,
  `debit_created_at` datetime DEFAULT current_timestamp(),
  `debit_created_by` varchar(255) DEFAULT NULL,
  `debit_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `debit_updated_by` varchar(255) DEFAULT NULL,
  `debit_status` enum('active','inactive','deleted','draft') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_acc_debit`
--

INSERT INTO `erp_acc_debit` (`debit_id`, `journal_id`, `debit_gl_code`, `debit_amount`, `debit_remark`, `debit_created_at`, `debit_created_by`, `debit_updated_at`, `debit_updated_by`, `debit_status`) VALUES
(1, 1, '01-01', 99000.00, '', '2022-09-14 00:51:55', '6', '2022-09-14 00:51:55', '6', 'active'),
(4, 2, '01-01', 68740.00, '', '2022-09-14 01:28:30', '6', '2022-09-14 01:28:30', '6', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_acc_journal`
--

CREATE TABLE `erp_acc_journal` (
  `id` bigint(20) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `invoice_no` varchar(10) DEFAULT NULL,
  `invoice_id` varchar(255) DEFAULT NULL,
  `jv_no` varchar(255) DEFAULT NULL,
  `sr_no` int(11) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `journalEntryReference` varchar(255) DEFAULT NULL,
  `trans_date` date DEFAULT NULL,
  `journal_created_at` datetime DEFAULT current_timestamp(),
  `journal_created_by` varchar(255) DEFAULT NULL,
  `journal_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `journal_updated_by` varchar(255) DEFAULT NULL,
  `journal_status` enum('active','inactive','deleted','draft') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_acc_journal`
--

INSERT INTO `erp_acc_journal` (`id`, `company_id`, `branch_id`, `invoice_no`, `invoice_id`, `jv_no`, `sr_no`, `remark`, `journalEntryReference`, `trans_date`, `journal_created_at`, `journal_created_by`, `journal_updated_at`, `journal_updated_by`, `journal_status`) VALUES
(1, 1, 3, '2689/03/20', '3', '1/2022-23', 1, 'AnaZeal Analyticals & Research Pvt Ltd - OCR Uploaded invoice', 'Payment/Expenses', '2022-09-13', '2022-09-14 00:51:55', '6', '2022-09-14 01:07:17', '6', 'active'),
(2, 1, 3, 'DHIOTI2100', '11', '2/2022-23', 2, 'all cargo - DHIOTI210022200 - OCR Uploaded invoice', 'Payment/Expenses', '2022-03-21', '2022-09-14 01:28:30', '6', '2022-09-14 01:28:30', '6', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_branches`
--

CREATE TABLE `erp_branches` (
  `branch_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_code` int(11) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_gstin` varchar(255) DEFAULT NULL,
  `con_business` varchar(255) DEFAULT NULL,
  `build_no` varchar(255) DEFAULT NULL,
  `flat_no` varchar(255) DEFAULT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `branch_is_primary` int(11) DEFAULT NULL,
  `branch_created_at` datetime DEFAULT current_timestamp(),
  `branch_created_by` int(11) DEFAULT NULL,
  `branch_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `branch_updated_by` int(11) DEFAULT NULL,
  `branch_profile` enum('verified','unverified') DEFAULT 'unverified',
  `branch_status` enum('active','inactive','deleted','draft') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_branches`
--

INSERT INTO `erp_branches` (`branch_id`, `company_id`, `branch_code`, `branch_name`, `branch_gstin`, `con_business`, `build_no`, `flat_no`, `street_name`, `pincode`, `location`, `city`, `district`, `state`, `branch_is_primary`, `branch_created_at`, `branch_created_by`, `branch_updated_at`, `branch_updated_by`, `branch_profile`, `branch_status`) VALUES
(1, 1, 41343675, 'Test Branch', '142534253q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-01 00:03:10', NULL, '2022-09-07 13:32:47', NULL, 'unverified', 'active'),
(2, 11, 11197470, 'INFY BRANCH 1', '27AAACI4798L2ZX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-06 16:50:04', NULL, '2022-09-06 16:50:04', NULL, 'unverified', 'active'),
(3, 1, 57840824, 'INFOSYS LIMITED', '27AAACI4798L2ZX', 'Public Limited Company', 'Plot No. 24/3', 'INFOSYS LIMITED - SEZ Unit 1', 'Hinjewadi, Phase II', 411057, 'Taluka Mulshi, Mann', '', 'Pune', 'Maharashtra', NULL, '2022-09-07 16:27:58', NULL, '2022-09-07 16:27:58', NULL, 'unverified', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_branch_bills`
--

CREATE TABLE `erp_branch_bills` (
  `bill_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `bill_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_ref_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billed_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `bill_to_gstin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` double(15,8) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_gstin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_sub_amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_total_discount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_total_cgst` decimal(20,2) NOT NULL DEFAULT 0.00,
  `bill_total_sgst` decimal(20,2) NOT NULL DEFAULT 0.00,
  `bill_total_igst` decimal(20,2) NOT NULL DEFAULT 0.00,
  `bill_total_gst` decimal(20,2) NOT NULL DEFAULT 0.00,
  `bill_total_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `bill_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `bill_created_by` int(11) NOT NULL,
  `bill_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bill_updated_by` int(11) NOT NULL,
  `bill_status` enum('draft','active','inactive','deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `erp_branch_bills`
--

INSERT INTO `erp_branch_bills` (`bill_id`, `company_id`, `branch_id`, `bill_number`, `bill_ref_number`, `order_number`, `billed_date`, `due_date`, `bill_to_gstin`, `currency_code`, `currency_rate`, `vendor_id`, `vendor_branch_id`, `vendor_gstin`, `vendor_vat`, `bill_notes`, `bill_sub_amount`, `bill_total_discount`, `bill_total_cgst`, `bill_total_sgst`, `bill_total_igst`, `bill_total_gst`, `bill_total_amount`, `bill_created_at`, `bill_created_by`, `bill_updated_at`, `bill_updated_by`, `bill_status`) VALUES
(1, 1, 1, 'SI-154', 'bill-ref-005', '', '2022-08-06 00:00:00', '0000-00-00 00:00:00', '19GVHJ8GVJAD9', 'INR', 0.00000000, 1, '', '18GVHJ8GVJAD6', '', 'Test note', '141500', '', '0.00', '0.00', '0.00', '0.00', '141500.00', '2022-09-07 16:15:30', 1, '2022-09-07 16:15:30', 1, 'active'),
(2, 1, 3, 'SI-154', '', '', '2022-08-06 00:00:00', '0000-00-00 00:00:00', '19GVHJ8GVJAD9', 'INR', 0.00000000, 1, '', '18GVHJ8GVJAD6', '', '', '141500', '', '0.00', '0.00', '0.00', '0.00', '141500.00', '2022-09-07 16:29:38', 6, '2022-09-07 16:29:38', 6, 'draft'),
(3, 1, 3, '2689/03/2021-22', '', '', '2022-03-28 00:00:00', '0000-00-00 00:00:00', '19GVHJ8GVJAD9', 'INR', 0.00000000, 1, '', '18GVHJ8GVJAD6', '', '', '99000', '', '0.00', '0.00', '0.00', '0.00', '99000.00', '2022-09-14 00:51:55', 6, '2022-09-14 00:51:55', 6, 'active'),
(11, 1, 3, 'DHIOTI210022200', '', '', '2022-03-21 00:00:00', '0000-00-00 00:00:00', '19GVHJ8GVJAD9', 'INR', 0.00000000, 1, '', '18GVHJ8GVJAD6', '', '', '68740', '', '0.00', '0.00', '0.00', '0.00', '68740.00', '2022-09-14 01:28:30', 6, '2022-09-14 01:28:30', 6, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_branch_bills_items`
--

CREATE TABLE `erp_branch_bills_items` (
  `bill_item_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `bill_item_desc` varchar(255) NOT NULL,
  `bill_item_qty` varchar(50) NOT NULL,
  `bill_item_price` varchar(50) NOT NULL,
  `bill_item_gst` varchar(50) NOT NULL,
  `bill_item_vat` varchar(50) NOT NULL,
  `bill_item_discount_rate` decimal(10,2) NOT NULL,
  `bill_item_total_price` varchar(50) NOT NULL,
  `bill_item_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `bill_item_created_by` int(11) NOT NULL,
  `bill_item_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bill_item_updated_by` int(11) NOT NULL,
  `bill_item_status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_branch_bills_items`
--

INSERT INTO `erp_branch_bills_items` (`bill_item_id`, `bill_id`, `item_id`, `bill_item_desc`, `bill_item_qty`, `bill_item_price`, `bill_item_gst`, `bill_item_vat`, `bill_item_discount_rate`, `bill_item_total_price`, `bill_item_created_at`, `bill_item_created_by`, `bill_item_updated_at`, `bill_item_updated_by`, `bill_item_status`) VALUES
(1, 1, 378923, '@ 28/- PER SQM FOR 5000 SQM', '5000', '28', '', '', '0.00', '165200', '2022-09-07 16:15:30', 1, '2022-09-07 16:15:30', 1, 'active'),
(2, 1, 327303, 'Loading & Unloading Charges (Trucks)', '1', '1500', '', '', '0.00', '1770', '2022-09-07 16:15:30', 1, '2022-09-07 16:15:30', 1, 'active'),
(3, 2, 739758, '@ 28/- PER SQM FOR 5000 SQM', '5000', '28', '', '', '0.00', '165200', '2022-09-07 16:29:38', 6, '2022-09-07 16:29:38', 6, 'active'),
(4, 2, 134181, 'Loading & Unloading Charges (Trucks)', '1', '1500', '', '', '0.00', '1770', '2022-09-07 16:29:38', 6, '2022-09-07 16:29:38', 6, 'active'),
(5, 3, 935976, 'Analysis ChargesETHOXYSULFURON 10% + TRIAFAMONE20% W/W WG (Council Active)Batch No- PV00001019,PV00001018, PV00001017,PV00001016, PV00001015A.R.No- RD220322-18 to 22Inspector Code:020121167120212022 I to020121167520212022 |Date of Sampling- 21/03/2022B/E ', '5', '19800', '', '', '0.00', '99000', '2022-09-14 00:51:55', 6, '2022-09-14 00:51:55', 6, 'active'),
(6, 4, 596435, 'DSTN. LINER CHARGESCHAKIAT SHIPPING', '', '39540', '', '', '0.00', '39540', '2022-09-14 01:18:07', 6, '2022-09-14 01:18:07', 6, 'active'),
(7, 4, 483149, 'DSTN. LINER CHARGESRCL FEEDER', '', '29200', '', '', '0.00', '29200', '2022-09-14 01:18:07', 6, '2022-09-14 01:18:07', 6, 'active'),
(8, 10, 277360, 'DSTN. LINER CHARGESCHAKIAT SHIPPING', '', '39540', '', '', '0.00', '39540', '2022-09-14 01:26:29', 6, '2022-09-14 01:26:29', 6, 'active'),
(9, 10, 838671, 'DSTN. LINER CHARGESRCL FEEDER', '', '29200', '', '', '0.00', '29200', '2022-09-14 01:26:29', 6, '2022-09-14 01:26:29', 6, 'active'),
(10, 11, 688014, 'DSTN. LINER CHARGESCHAKIAT SHIPPING', '', '39540', '', '', '0.00', '39540', '2022-09-14 01:28:30', 6, '2022-09-14 01:28:30', 6, 'active'),
(11, 11, 736164, 'DSTN. LINER CHARGESRCL FEEDER', '', '29200', '', '', '0.00', '29200', '2022-09-14 01:28:30', 6, '2022-09-14 01:28:30', 6, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_branch_otherslocation`
--

CREATE TABLE `erp_branch_otherslocation` (
  `othersLocation_id` int(11) NOT NULL,
  `othersLocation_code` varchar(50) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `othersLocation_primary_flag` int(11) NOT NULL DEFAULT 0,
  `othersLocation_name` varchar(255) DEFAULT NULL,
  `othersLocation_building_no` varchar(255) DEFAULT NULL,
  `othersLocation_flat_no` varchar(255) DEFAULT NULL,
  `othersLocation_street_name` varchar(255) DEFAULT NULL,
  `othersLocation_pin_code` varchar(50) DEFAULT NULL,
  `othersLocation_location` varchar(255) DEFAULT NULL,
  `othersLocation_city` varchar(50) DEFAULT NULL,
  `othersLocation_district` varchar(50) DEFAULT NULL,
  `othersLocation_state` varchar(50) DEFAULT NULL,
  `othersLocation_status` varchar(50) DEFAULT NULL,
  `othersLocation_created_at` datetime DEFAULT current_timestamp(),
  `othersLocation_created_by` int(11) DEFAULT NULL,
  `othersLocation_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `othersLocation_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_branch_otherslocation`
--

INSERT INTO `erp_branch_otherslocation` (`othersLocation_id`, `othersLocation_code`, `company_id`, `branch_id`, `othersLocation_primary_flag`, `othersLocation_name`, `othersLocation_building_no`, `othersLocation_flat_no`, `othersLocation_street_name`, `othersLocation_pin_code`, `othersLocation_location`, `othersLocation_city`, `othersLocation_district`, `othersLocation_state`, `othersLocation_status`, `othersLocation_created_at`, `othersLocation_created_by`, `othersLocation_updated_at`, `othersLocation_updated_by`) VALUES
(1, '29087146', 1, 3, 0, 'Location 1', 'test', 'bv', 'vgghvg', '89787789', 'gvg', '', 'bhjghhjbhj', 'bhjhbhbhjbh', 'active', '2022-09-19 17:01:52', NULL, '2022-09-19 17:01:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `erp_companies`
--

CREATE TABLE `erp_companies` (
  `company_id` int(11) NOT NULL,
  `company_code` varchar(10) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_gstin` varchar(255) DEFAULT NULL,
  `company_cin` varchar(255) DEFAULT NULL,
  `company_llpin` varchar(255) DEFAULT NULL,
  `company_tan` varchar(255) DEFAULT NULL,
  `company_const_of_business` varchar(255) DEFAULT NULL,
  `company_gstin_status` varchar(255) DEFAULT NULL,
  `company_currency` varchar(255) DEFAULT NULL,
  `company_language` varchar(255) DEFAULT NULL,
  `company_logo_url` varchar(255) DEFAULT NULL,
  `company_created_at` datetime DEFAULT current_timestamp(),
  `company_created_by` int(11) DEFAULT NULL,
  `company_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `company_updated_by` int(11) DEFAULT NULL,
  `company_profile` enum('verified','unverified') DEFAULT 'unverified',
  `company_status` enum('active','inactive','deleted','draft') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_companies`
--

INSERT INTO `erp_companies` (`company_id`, `company_code`, `company_name`, `company_gstin`, `company_cin`, `company_llpin`, `company_tan`, `company_const_of_business`, `company_gstin_status`, `company_currency`, `company_language`, `company_logo_url`, `company_created_at`, `company_created_by`, `company_updated_at`, `company_updated_by`, `company_profile`, `company_status`) VALUES
(1, '11117262', 'Test Company', '8744875427845', '457854547845', '45784587', '4547845', '7854', '8457845', '1', '2', 'jbgcfghfg', NULL, NULL, '2022-09-01 10:34:11', NULL, 'unverified', 'draft'),
(11, '79263652', 'Encoders Technology', '8744875427845', '457854547845', '45784587', '4547845', '7854', 'Active', '1', '1', 'jbgcfghfg', '2022-09-06 16:40:37', NULL, '2022-09-06 16:40:37', NULL, 'unverified', 'active'),
(12, '33325959', 'ITC Testing', '8744875427845', '457854547845', '45784587', '4547845', '7854', '8457845', '1', '1', 'jbgcfghfg', '2022-09-07 17:48:17', NULL, '2022-09-07 17:48:17', NULL, 'unverified', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_company_functionalities`
--

CREATE TABLE `erp_company_functionalities` (
  `functionalities_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `functionalities_name` varchar(255) DEFAULT NULL,
  `functionalities_desc` text DEFAULT NULL,
  `functionalities_created_at` datetime DEFAULT current_timestamp(),
  `functionalities_created_by` int(11) DEFAULT NULL,
  `functionalities_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `functionalities_updated_by` int(11) DEFAULT NULL,
  `functionalities_status` enum('active','inactive','deleted','draft') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_company_functionalities`
--

INSERT INTO `erp_company_functionalities` (`functionalities_id`, `company_id`, `functionalities_name`, `functionalities_desc`, `functionalities_created_at`, `functionalities_created_by`, `functionalities_updated_at`, `functionalities_updated_by`, `functionalities_status`) VALUES
(1, 1, 'Test', 'testing desc', '2022-09-19 00:23:46', 1, '2022-09-19 00:23:46', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_credit_terms`
--

CREATE TABLE `erp_credit_terms` (
  `credit_terms_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `credit_terms_name` int(11) DEFAULT NULL,
  `credit_terms_desc` text DEFAULT NULL,
  `credit_terms_created_at` datetime DEFAULT current_timestamp(),
  `credit_terms_created_by` int(11) DEFAULT NULL,
  `credit_terms_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `credit_terms_updated_by` int(11) DEFAULT NULL,
  `credit_terms_status` enum('active','inactive','deleted','draft') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_credit_terms`
--

INSERT INTO `erp_credit_terms` (`credit_terms_id`, `company_id`, `credit_terms_name`, `credit_terms_desc`, `credit_terms_created_at`, `credit_terms_created_by`, `credit_terms_updated_at`, `credit_terms_updated_by`, `credit_terms_status`) VALUES
(1, 1, 15, '15 Days Duration', '2022-09-12 23:22:13', 1, '2022-09-12 00:00:00', 1, 'active'),
(2, 1, 30, '30 Days Duration', '2022-09-12 23:44:51', 1, '2022-09-12 23:44:51', 1, 'active'),
(3, 1, 45, '45 Days Duration', '2022-09-12 23:46:00', 1, '2022-09-12 23:51:57', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_currency_type`
--

CREATE TABLE `erp_currency_type` (
  `currency_id` int(11) NOT NULL,
  `currency_name` varchar(255) DEFAULT NULL,
  `currency_icon` varchar(255) DEFAULT NULL,
  `currency_created_at` datetime DEFAULT NULL,
  `currency_created_by` int(11) DEFAULT NULL,
  `currency_updated_at` datetime DEFAULT NULL,
  `currency_updated_by` int(11) DEFAULT NULL,
  `currency_status` enum('active','inactive','deleted','draft') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_currency_type`
--

INSERT INTO `erp_currency_type` (`currency_id`, `currency_name`, `currency_icon`, `currency_created_at`, `currency_created_by`, `currency_updated_at`, `currency_updated_by`, `currency_status`) VALUES
(1, 'INR', NULL, '2022-08-30 17:24:19', 1, '2022-08-30 17:26:39', 1, 'active'),
(2, 'USD', NULL, '2022-08-30 17:24:19', 1, '2022-08-30 17:26:39', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_customer`
--

CREATE TABLE `erp_customer` (
  `customer_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `customer_code` varchar(10) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_gstin` varchar(255) DEFAULT NULL,
  `customer_currency` varchar(255) DEFAULT NULL,
  `customer_language` varchar(255) DEFAULT NULL,
  `customer_created_at` datetime DEFAULT current_timestamp(),
  `customer_created_by` int(11) DEFAULT NULL,
  `customer_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_updated_by` int(11) DEFAULT NULL,
  `customer_profile` enum('verified','unverified') DEFAULT 'unverified',
  `customer_status` enum('active','inactive','deleted','draft') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_customer`
--

INSERT INTO `erp_customer` (`customer_id`, `company_id`, `branch_id`, `customer_code`, `customer_name`, `customer_gstin`, `customer_currency`, `customer_language`, `customer_created_at`, `customer_created_by`, `customer_updated_at`, `customer_updated_by`, `customer_profile`, `customer_status`) VALUES
(1, 1, 1, '18406919', 'Testing', 'GHGHH67674BHJV', '2', '1', '2022-09-06 13:08:29', NULL, '2022-09-06 13:08:29', NULL, 'unverified', 'draft'),
(2, 1, 3, '65110306', 'Testing', 'GHGHH67674BHJV', '1', '2', '2022-09-14 01:51:55', NULL, '2022-09-14 01:51:55', NULL, 'unverified', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_inventory_items`
--

CREATE TABLE `erp_inventory_items` (
  `itemId` int(11) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `itemName` varchar(225) NOT NULL,
  `itemDesc` text NOT NULL,
  `netWeight` varchar(52) NOT NULL,
  `grossWeight` varchar(42) NOT NULL,
  `volume` varchar(42) NOT NULL,
  `height` varchar(42) NOT NULL,
  `width` varchar(42) NOT NULL,
  `length` varchar(42) NOT NULL,
  `goodsType` varchar(42) NOT NULL,
  `goodsGroup` varchar(255) NOT NULL,
  `purchaseGroup` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `availabilityCheck` varchar(255) NOT NULL,
  `baseUnitMeasure` varchar(255) NOT NULL,
  `issueUnitMeasure` varchar(255) NOT NULL,
  `storageBin` varchar(255) NOT NULL,
  `pickingArea` varchar(255) NOT NULL,
  `tempControl` varchar(50) NOT NULL,
  `storageControl` varchar(50) NOT NULL,
  `maxStoragePeriod` varchar(50) NOT NULL,
  `maxStoragePeriodTimeUnit` varchar(233) NOT NULL,
  `minRemainSelfLife` varchar(233) NOT NULL,
  `minRemainSelfLifeTimeUnit` varchar(233) NOT NULL,
  `purchasingValueKey` varchar(233) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `status` enum('active','inactive','deleted','draft') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_inventory_items`
--

INSERT INTO `erp_inventory_items` (`itemId`, `itemCode`, `itemName`, `itemDesc`, `netWeight`, `grossWeight`, `volume`, `height`, `width`, `length`, `goodsType`, `goodsGroup`, `purchaseGroup`, `branch`, `availabilityCheck`, `baseUnitMeasure`, `issueUnitMeasure`, `storageBin`, `pickingArea`, `tempControl`, `storageControl`, `maxStoragePeriod`, `maxStoragePeriodTimeUnit`, `minRemainSelfLife`, `minRemainSelfLifeTimeUnit`, `purchasingValueKey`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `status`) VALUES
(5, 'jgiuk54586', 'hjgyu', 'hjmgjmbgj\r\njhguyjkjkjjjbhjvfyukhj\r\nhvyujhbjk', '560', '56', '25', '22', '22', '22', 'B', 'A', '', '', 'Daily', '', 'hjgyu', 'jhy8i7u', 'kjbhiukhj', 'bkukj', 'kjhiu', 'kjbhiu', 'kjbhi', 'hjiukj', '', '', '2022-08-21 14:17:59', 0, '2022-08-21 14:17:59', 0, 'active'),
(6, 'jgiuk54586', 'hjgyu', 'hjmgjmbgj\r\njhguyjkjkjjjbhjvfyukhj\r\nhvyujhbjk', '560', '56', '25', '22', '22', '22', 'B', 'A', '', '', 'Daily', '', 'hjgyu', 'jhy8i7u', 'kjbhiukhj', 'bkukj', 'kjhiu', 'kjbhiu', 'kjbhi', 'hjiukj', '', '', '2022-08-21 14:20:11', 0, '2022-08-21 14:20:11', 0, 'active'),
(7, 'jhgt7uy', 'jkjhiu', 'kjhuhkj', 'kjhiukj', 'kjhiu', 'h', 'kjjhkj', 'kjhii', 'ghvgh', 'A', 'B', '', '', 'Weekly', 'drtdf', 'ffdxx', 'ghfdt', 'dtr', 'fxfrf', 'gfcf', 'rtdtr', 'gtfty', 'gtfty', '', '', '2022-08-21 14:21:08', 0, '2022-08-29 11:06:45', 0, 'inactive'),
(11, 'JKGY5045', 'Chair', 'lorem', '20', '10', '20', '50', '50', '10', 'A', 'B', '', '', 'Daily', '20', '55', 'jhgyu', 'jhiu', 'jhiuk', 'jk', 'kj', 'kj', 'jmh', '', '', '2022-08-22 20:15:53', 0, '2022-08-22 20:15:53', 0, 'active'),
(16, 'jgiuk54586', 'hjgyu', 'hjmgjmbgj\r\njhguyjkjkjjjbhjvfyukhj\r\nhvyujhbjk', '560', '56', '25', '22', '22', '22', 'B', 'A', '', '', 'Daily', '', 'hjgyu', 'jhy8i7u', 'kjbhiukhj', 'bkukj', 'kjhiu', 'kjbhiu', 'kjbhi', 'hjiukj', '', '', '2022-08-21 14:17:59', 0, '2022-08-21 14:17:59', 0, 'active'),
(17, 'jgiuk54586', 'hjgyu', 'hjmgjmbgj\r\njhguyjkjkjjjbhjvfyukhj\r\nhvyujhbjk', '560', '56', '25', '22', '22', '22', 'B', 'A', '', '', 'Daily', '', 'hjgyu', 'jhy8i7u', 'kjbhiukhj', 'bkukj', 'kjhiu', 'kjbhiu', 'kjbhi', 'hjiukj', '', '', '2022-08-21 14:20:11', 0, '2022-08-21 14:20:11', 0, 'active'),
(18, 'jhgt7uy', 'jkjhiu', 'kjhuhkj', 'kjhiukj', 'kjhiu', 'h', 'kjjhkj', 'kjhii', 'ghvgh', 'A', 'B', '', '', 'Weekly', 'drtdf', 'ffdxx', 'ghfdt', 'dtr', 'fxfrf', 'gfcf', 'rtdtr', 'gtfty', 'gtfty', '', '', '2022-08-21 14:21:08', 0, '2022-08-21 14:21:08', 0, 'active'),
(19, 'JKGY5045', 'Chair', 'lorem', '20', '10', '20', '50', '50', '10', 'A', 'B', '', '', 'Daily', '20', '55', 'jhgyu', 'jhiu', 'jhiuk', 'jk', 'kj', 'kj', 'jmh', '', '', '2022-08-22 20:15:53', 0, '2022-08-22 20:15:53', 0, 'active'),
(20, 'JKGY5045', 'Chair', 'lorem', '20', '10', '20', '50', '50', '10', 'A', 'B', '', '', 'Daily', '20', '55', 'jhgyu', 'jhiu', 'jhiuk', 'jk', 'kj', 'kj', 'jmh', '', '', '2022-08-22 20:15:53', 0, '2022-08-22 20:15:53', 0, 'active'),
(21, 'jgiuk54586', 'hjgyu', 'hjmgjmbgj\r\njhguyjkjkjjjbhjvfyukhj\r\nhvyujhbjk', '560', '56', '25', '22', '22', '22', 'B', 'A', '', '', 'Daily', '', 'hjgyu', 'jhy8i7u', 'kjbhiukhj', 'bkukj', 'kjhiu', 'kjbhiu', 'kjbhi', 'hjiukj', '', '', '2022-08-21 14:17:59', 0, '2022-08-21 14:17:59', 0, 'active'),
(22, 'jgiuk54586', 'hjgyu', 'hjmgjmbgj\r\njhguyjkjkjjjbhjvfyukhj\r\nhvyujhbjk', '560', '56', '25', '22', '22', '22', 'B', 'A', '', '', 'Daily', '', 'hjgyu', 'jhy8i7u', 'kjbhiukhj', 'bkukj', 'kjhiu', 'kjbhiu', 'kjbhi', 'hjiukj', '', '', '2022-08-21 14:20:11', 0, '2022-08-21 14:20:11', 0, 'active'),
(23, 'jhgt7uy', 'jkjhiu', 'kjhuhkj', 'kjhiukj', 'kjhiu', 'h', 'kjjhkj', 'kjhii', 'ghvgh', 'A', 'B', '', '', 'Weekly', 'drtdf', 'ffdxx', 'ghfdt', 'dtr', 'fxfrf', 'gfcf', 'rtdtr', 'gtfty', 'gtfty', '', '', '2022-08-21 14:21:08', 0, '2022-08-21 14:21:08', 0, 'active'),
(24, 'JKGY5045', 'Chair', 'lorem', '20', '10', '20', '50', '50', '10', 'A', 'B', '', '', 'Daily', '20', '55', 'jhgyu', 'jhiu', 'jhiuk', 'jk', 'kj', 'kj', 'jmh', '', '', '2022-08-22 20:15:53', 0, '2022-08-22 20:15:53', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_inventory_mstr_good_groups`
--

CREATE TABLE `erp_inventory_mstr_good_groups` (
  `goodGroupId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `goodGroupName` varchar(255) NOT NULL,
  `goodGroupDesc` varchar(255) NOT NULL,
  `goodGroupCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `goodGroupCreatedBy` int(11) NOT NULL,
  `goodGroupUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `goodGroupUpdatedBy` int(11) NOT NULL,
  `goodGroupStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_inventory_mstr_good_groups`
--

INSERT INTO `erp_inventory_mstr_good_groups` (`goodGroupId`, `companyId`, `goodGroupName`, `goodGroupDesc`, `goodGroupCreatedAt`, `goodGroupCreatedBy`, `goodGroupUpdatedAt`, `goodGroupUpdatedBy`, `goodGroupStatus`) VALUES
(1, 12, 'test', 'testing', '2022-09-12 20:01:38', 1, '2022-09-12 20:01:38', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_inventory_mstr_good_types`
--

CREATE TABLE `erp_inventory_mstr_good_types` (
  `goodTypeId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `goodTypeName` varchar(255) NOT NULL,
  `goodTypeDesc` varchar(255) NOT NULL,
  `goodTypeCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `goodTypeCreatedBy` int(11) NOT NULL,
  `goodTypeUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `goodTypeUpdatedBy` int(11) NOT NULL,
  `goodTypeStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_inventory_mstr_good_types`
--

INSERT INTO `erp_inventory_mstr_good_types` (`goodTypeId`, `companyId`, `goodTypeName`, `goodTypeDesc`, `goodTypeCreatedAt`, `goodTypeCreatedBy`, `goodTypeUpdatedAt`, `goodTypeUpdatedBy`, `goodTypeStatus`) VALUES
(1, 2, 'abc', 'demo desc', '2022-08-22 20:31:43', 1, '2022-08-22 20:31:43', 1, 'active'),
(2, 2, 'xaz', 'demo desc', '2022-08-22 20:31:43', 1, '2022-08-22 20:32:00', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_inventory_mstr_time_units`
--

CREATE TABLE `erp_inventory_mstr_time_units` (
  `timeUnitId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `timeUnitName` varchar(255) NOT NULL,
  `timeUnitDesc` varchar(255) NOT NULL,
  `timeUnitCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `timeUnitCreatedBy` int(11) NOT NULL,
  `timeUnitUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `timeUnitUpdatedBy` int(11) NOT NULL,
  `timeUnitStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `erp_inventory_mstr_uom`
--

CREATE TABLE `erp_inventory_mstr_uom` (
  `uomId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `uomName` varchar(255) NOT NULL,
  `uomDesc` varchar(255) NOT NULL,
  `uomCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `uomCreatedBy` int(11) NOT NULL,
  `uomUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uomUpdatedBy` int(11) NOT NULL,
  `uomStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `erp_inventory_purchesing_values`
--

CREATE TABLE `erp_inventory_purchesing_values` (
  `purchValueId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `purchValueKey` varchar(255) NOT NULL,
  `purchValue1stReminder` int(11) NOT NULL,
  `purchValue2ndReminder` int(11) NOT NULL,
  `purchValue3rdReminder` int(11) NOT NULL,
  `purchValueUnderdelTolerance` decimal(10,2) NOT NULL,
  `purchValueOverdelivTolerance` decimal(10,2) NOT NULL,
  `purchValueMinDelQtyInPercentage` decimal(10,2) NOT NULL,
  `purchValueCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `purchValueCreatedBy` int(11) NOT NULL,
  `purchValueUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purchValueUpdatedBy` int(11) NOT NULL,
  `purchValueStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `erp_language`
--

CREATE TABLE `erp_language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(255) DEFAULT NULL,
  `language_icon` varchar(255) DEFAULT NULL,
  `language_created_at` datetime DEFAULT NULL,
  `language_created_by` int(11) DEFAULT NULL,
  `language_updated_at` datetime DEFAULT NULL,
  `language_updated_by` int(11) DEFAULT NULL,
  `language_status` enum('active','inactive','deleted','draft') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_language`
--

INSERT INTO `erp_language` (`language_id`, `language_name`, `language_icon`, `language_created_at`, `language_created_by`, `language_updated_at`, `language_updated_by`, `language_status`) VALUES
(1, 'English', NULL, '2022-08-30 17:24:19', 1, '2022-08-30 17:26:39', 1, 'active'),
(2, 'Hindi', NULL, '2022-08-30 17:24:19', 1, '2022-08-30 17:26:39', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `erp_vendor_bank_details`
--

CREATE TABLE `erp_vendor_bank_details` (
  `vendor_bank_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `opening_balance` varchar(255) DEFAULT NULL,
  `currency` varchar(100) NOT NULL,
  `credit_period` varchar(255) NOT NULL,
  `vendor_bank_name` varchar(50) NOT NULL,
  `vendor_bank_account_no` varchar(50) NOT NULL,
  `vendor_bank_ifsc` varchar(50) NOT NULL,
  `vendor_bank_branch` varchar(255) NOT NULL,
  `vendor_bank_address` varchar(255) NOT NULL,
  `vendor_bank_cancelled_cheque` varchar(255) NOT NULL,
  `vendor_bank_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `vendor_bank_created_by` int(11) NOT NULL,
  `vendor_bank_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_bank_updated_by` int(11) NOT NULL,
  `vendor_bank_active_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_vendor_bank_details`
--

INSERT INTO `erp_vendor_bank_details` (`vendor_bank_id`, `vendor_id`, `opening_balance`, `currency`, `credit_period`, `vendor_bank_name`, `vendor_bank_account_no`, `vendor_bank_ifsc`, `vendor_bank_branch`, `vendor_bank_address`, `vendor_bank_cancelled_cheque`, `vendor_bank_created_at`, `vendor_bank_created_by`, `vendor_bank_updated_at`, `vendor_bank_updated_by`, `vendor_bank_active_flag`) VALUES
(3, 2, '', '1', '', '', '', '', '', '', '', '2022-09-19 12:24:20', 0, '2022-09-19 12:24:20', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `erp_vendor_bussiness_places`
--

CREATE TABLE `erp_vendor_bussiness_places` (
  `vendor_business_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_business_primary_flag` int(11) NOT NULL DEFAULT 0,
  `vendor_business_gstin` varchar(50) NOT NULL,
  `vendor_business_legal_name` varchar(255) NOT NULL,
  `vendor_business_trade_name` varchar(255) NOT NULL,
  `vendor_business_constitution` varchar(255) NOT NULL,
  `vendor_business_building_no` varchar(255) NOT NULL,
  `vendor_business_flat_no` varchar(255) NOT NULL,
  `vendor_business_street_name` varchar(255) NOT NULL,
  `vendor_business_pin_code` varchar(50) NOT NULL,
  `vendor_business_location` varchar(255) NOT NULL,
  `vendor_business_city` varchar(50) NOT NULL,
  `vendor_business_district` varchar(50) NOT NULL,
  `vendor_business_state` varchar(50) NOT NULL,
  `vendor_business_status` varchar(50) NOT NULL,
  `vendor_business_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `vendor_business_created_by` int(11) NOT NULL,
  `vendor_business_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_business_updated_by` int(11) NOT NULL,
  `vendor_business_active_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `erp_vendor_details`
--

CREATE TABLE `erp_vendor_details` (
  `vendor_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_branch_id` int(11) NOT NULL,
  `vendor_code` varchar(50) NOT NULL,
  `vendor_pan` varchar(50) NOT NULL,
  `vendor_gstin` varchar(50) NOT NULL,
  `trade_name` varchar(255) DEFAULT NULL,
  `constitution_of_business` varchar(255) DEFAULT NULL,
  `vendor_opening_balance` float(10,2) NOT NULL,
  `vendor_currency` varchar(50) NOT NULL,
  `vendor_visible_to_all` varchar(20) NOT NULL DEFAULT 'Yes',
  `vendor_website` text DEFAULT NULL,
  `vendor_credit_period` varchar(50) NOT NULL,
  `vendor_picture` varchar(255) NOT NULL,
  `vendor_authorised_person_name` varchar(50) NOT NULL,
  `vendor_authorised_person_email` varchar(50) NOT NULL,
  `vendor_authorised_alt_email` varchar(50) NOT NULL,
  `vendor_authorised_person_phone` varchar(50) NOT NULL,
  `vendor_authorised_alt_phone` varchar(20) NOT NULL,
  `vendor_authorised_person_designation` varchar(50) NOT NULL,
  `vendor_profile` enum('verified','unverified') DEFAULT 'unverified',
  `vendor_status` enum('active','inactive','guest','deleted','draft') DEFAULT 'draft',
  `vendor_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `vendor_created_by` int(11) NOT NULL,
  `vendor_updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vendor_updated_by` int(11) NOT NULL,
  `vendor_active_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `erp_vendor_details`
--

INSERT INTO `erp_vendor_details` (`vendor_id`, `company_id`, `company_branch_id`, `vendor_code`, `vendor_pan`, `vendor_gstin`, `trade_name`, `constitution_of_business`, `vendor_opening_balance`, `vendor_currency`, `vendor_visible_to_all`, `vendor_website`, `vendor_credit_period`, `vendor_picture`, `vendor_authorised_person_name`, `vendor_authorised_person_email`, `vendor_authorised_alt_email`, `vendor_authorised_person_phone`, `vendor_authorised_alt_phone`, `vendor_authorised_person_designation`, `vendor_profile`, `vendor_status`, `vendor_created_at`, `vendor_created_by`, `vendor_updated_at`, `vendor_updated_by`, `vendor_active_flag`) VALUES
(2, 1, 1, '58948519', 'AAACR4849R', '07AAACR4849R1ZN', 'Tata Consultancy Services Ltd', 'Public Limited Company', 0.00, '', 'Yes', NULL, '', '', 'hello person', 'hjgmnhgyju@sd.esghf', 'gfyatsdh@sd.asdhgf', '2406845120', '1500851225', 'jhtuy', 'unverified', 'active', '2022-09-19 12:24:20', 0, '2022-09-19 12:24:20', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_details`
--

CREATE TABLE `tbl_admin_details` (
  `fldAdminKey` int(11) NOT NULL,
  `fldAdminName` varchar(255) NOT NULL,
  `fldAdminEmail` varchar(255) NOT NULL,
  `fldAdminPhone` varchar(20) DEFAULT NULL,
  `fldAdminPassword` varchar(255) NOT NULL,
  `fldAdminRole` int(11) NOT NULL,
  `fldAdminAvatar` varchar(255) DEFAULT NULL,
  `fldAdminCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldAdminUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldAdminStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `fldAdminNotes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_details`
--

INSERT INTO `tbl_admin_details` (`fldAdminKey`, `fldAdminName`, `fldAdminEmail`, `fldAdminPhone`, `fldAdminPassword`, `fldAdminRole`, `fldAdminAvatar`, `fldAdminCreatedAt`, `fldAdminUpdatedAt`, `fldAdminStatus`, `fldAdminNotes`) VALUES
(1, 'Super User', 'admin@vitwo.in', '9988776655', '12345678', 1, NULL, '2022-07-30 23:45:03', '2022-08-07 22:17:19', 'active', NULL),
(2, 'Test role user', 'testroleadmin@start-project.com', '9876543212', '12345678', 2, '', '2022-08-01 11:47:59', '2022-08-30 18:35:34', 'inactive', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_menu`
--

CREATE TABLE `tbl_admin_menu` (
  `fldMenuKey` int(11) NOT NULL,
  `fldParentMenuKey` int(11) NOT NULL DEFAULT 0,
  `fldMenuLabel` varchar(250) NOT NULL,
  `fldMenuIcon` varchar(255) NOT NULL,
  `fldMenuFile` varchar(250) DEFAULT NULL,
  `fldMenuOrderBy` int(11) NOT NULL,
  `fldCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldMenuStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_menu`
--

INSERT INTO `tbl_admin_menu` (`fldMenuKey`, `fldParentMenuKey`, `fldMenuLabel`, `fldMenuIcon`, `fldMenuFile`, `fldMenuOrderBy`, `fldCreatedAt`, `fldUpdatedAt`, `fldMenuStatus`) VALUES
(1, 0, 'Company', '<i class=\"far fa-circle nav-icon\"></i> ', 'manage-company.php', 1, '2022-08-30 13:25:01', '2022-08-30 13:25:01', 'active'),
(2, 1, 'Manage Company', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-company.php', 1, '2022-08-30 13:25:52', '2022-08-30 13:34:29', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_roles`
--

CREATE TABLE `tbl_admin_roles` (
  `fldRoleKey` int(11) NOT NULL,
  `fldRoleName` varchar(255) NOT NULL,
  `fldRoleAccesses` varchar(255) NOT NULL,
  `fldRoleDescription` text NOT NULL,
  `fldRoleCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldRoleUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldRoleStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_roles`
--

INSERT INTO `tbl_admin_roles` (`fldRoleKey`, `fldRoleName`, `fldRoleAccesses`, `fldRoleDescription`, `fldRoleCreatedAt`, `fldRoleUpdatedAt`, `fldRoleStatus`) VALUES
(1, 'Supper Admin', '0', 'Have all the webmaster accesses', '2022-07-30 23:43:05', '2022-08-28 21:41:45', 'active'),
(2, 'Test role', '2', 'test role access', '2022-08-01 11:47:23', '2022-08-30 18:34:51', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_settings`
--

CREATE TABLE `tbl_admin_settings` (
  `fldSettingKey` int(11) NOT NULL,
  `fldSettingName` varchar(255) NOT NULL,
  `fldSettingValue` varchar(255) NOT NULL,
  `fldCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldStatus` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_settings`
--

INSERT INTO `tbl_admin_settings` (`fldSettingKey`, `fldSettingName`, `fldSettingValue`, `fldCreatedAt`, `fldUpdatedAt`, `fldStatus`) VALUES
(1, 'title', 'Vitwo', '2021-11-25 18:22:23', '2022-08-07 11:18:16', 'active'),
(2, 'phone', '9876543210', '2021-11-25 18:22:33', '2022-07-16 21:23:31', 'active'),
(3, 'email', 'support@vitwo.in', '2021-11-25 18:22:53', '2022-08-07 11:18:16', 'active'),
(4, 'address', 'kolkata-700074, India', '2021-11-25 18:23:30', '2022-08-30 13:13:38', 'active'),
(5, 'logo', '166274402264313.png', '2021-11-25 18:45:30', '2022-09-09 22:50:22', 'active'),
(6, 'favicon', '165985132599981.ico', '2021-12-02 13:39:08', '2022-08-07 11:18:45', 'active'),
(7, 'timeZone', 'Asia/Kolkata', '2021-12-02 14:19:05', '2022-07-16 22:57:12', 'active'),
(8, 'footer', 'Copyright © 2022 vitwo.in, All rights reserved.', '2021-12-02 14:19:05', '2022-08-07 11:18:16', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_tablesettings`
--

CREATE TABLE `tbl_admin_tablesettings` (
  `id` int(11) NOT NULL,
  `pageTableName` varchar(255) NOT NULL,
  `settingsCheckbox` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `status` enum('active','inactive','deleted','draft') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_tablesettings`
--

INSERT INTO `tbl_admin_tablesettings` (`id`, `pageTableName`, `settingsCheckbox`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `status`) VALUES
(6, 'ERP_COMPANIES', 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:2:\"11\";}', '2022-09-06 17:25:27', 0, '2022-09-07 17:49:39', 0, 'active'),
(8, 'ERP_COMPANIES', 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:2:\"10\";}', '2022-09-09 11:33:01', 1, '2022-09-09 23:04:25', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch_admin_details`
--

CREATE TABLE `tbl_branch_admin_details` (
  `fldAdminKey` int(11) NOT NULL,
  `fldAdminCompanyId` int(11) DEFAULT NULL,
  `fldAdminBranchId` int(11) DEFAULT NULL,
  `fldAdminBranchLocationId` int(11) DEFAULT NULL,
  `fldAdminName` varchar(255) NOT NULL,
  `fldAdminEmail` varchar(255) NOT NULL,
  `fldAdminPhone` varchar(20) DEFAULT NULL,
  `fldAdminPassword` varchar(255) NOT NULL,
  `fldAdminRole` int(11) NOT NULL,
  `fldAdminAvatar` varchar(255) DEFAULT NULL,
  `fldAdminCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldAdminUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldAdminStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `fldAdminNotes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch_admin_details`
--

INSERT INTO `tbl_branch_admin_details` (`fldAdminKey`, `fldAdminCompanyId`, `fldAdminBranchId`, `fldAdminBranchLocationId`, `fldAdminName`, `fldAdminEmail`, `fldAdminPhone`, `fldAdminPassword`, `fldAdminRole`, `fldAdminAvatar`, `fldAdminCreatedAt`, `fldAdminUpdatedAt`, `fldAdminStatus`, `fldAdminNotes`) VALUES
(1, 1, 1, NULL, 'Super User', 'admin@vitwo.in', '9988776655', '12345678', 1, NULL, '2022-07-30 23:45:03', '2022-08-30 18:47:36', 'active', NULL),
(2, 1, 1, NULL, 'Test role user', 'testroleadmin@start-project.com', '9876543212', '12345678', 2, '', '2022-08-01 11:47:59', '2022-08-30 18:47:43', 'active', NULL),
(3, 1, 1, NULL, 'Ramendranath Guria', 'guria@gmail.com', '7777777777', '9380', 1, NULL, '2022-09-01 00:03:10', '2022-09-01 00:03:10', 'active', NULL),
(4, 2, 1, NULL, 'Ramendranath Guria', 'guria@gmail.com', '7777777777', '9380', 1, NULL, '2022-09-01 00:03:10', '2022-09-01 00:03:10', 'active', NULL),
(5, 11, 2, NULL, 'ROMEN', 'infi@gmail.com', '1111111111', '3180', 1, NULL, '2022-09-06 16:50:04', '2022-09-06 16:50:04', 'active', NULL),
(6, 1, 3, NULL, 'Ramendranath Guria', 'guriabusiness3@gmail.com', '2222222222', '9688', 1, NULL, '2022-09-07 16:27:58', '2022-09-07 16:27:58', 'active', NULL),
(7, 1, 3, 1, 'nb bh', 'test@gmail.com', '1234567890', '1280', 4, NULL, '2022-09-19 17:01:52', '2022-09-19 17:01:52', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch_admin_menu`
--

CREATE TABLE `tbl_branch_admin_menu` (
  `fldMenuKey` int(11) NOT NULL,
  `fldParentMenuKey` int(11) NOT NULL DEFAULT 0,
  `fldMenuLabel` varchar(250) NOT NULL,
  `fldMenuIcon` varchar(255) NOT NULL,
  `fldMenuFile` varchar(250) DEFAULT NULL,
  `fldMenuOrderBy` int(11) NOT NULL,
  `fldCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldMenuStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch_admin_menu`
--

INSERT INTO `tbl_branch_admin_menu` (`fldMenuKey`, `fldParentMenuKey`, `fldMenuLabel`, `fldMenuIcon`, `fldMenuFile`, `fldMenuOrderBy`, `fldCreatedAt`, `fldUpdatedAt`, `fldMenuStatus`) VALUES
(1, 0, 'Manage Users', '<i class=\"nav-icon fas fa-edit\"></i>', '', 100, '2022-07-30 23:52:06', '2022-08-01 11:46:27', 'active'),
(25, 0, 'Accounts', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', '', 5, '2022-09-14 00:57:35', '2022-09-14 00:57:35', 'active'),
(3, 0, 'Manage Content', '<i class=\"nav-icon fas fa-edit\"></i>', '', 1, '2022-07-30 23:53:46', '2022-08-07 12:01:52', 'inactive'),
(4, 3, 'Common Content', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-common-content.php', 0, '2022-07-30 23:54:33', '2022-08-22 20:51:49', 'active'),
(5, 0, 'Manage Contact Us', '<i class=\"nav-icon fas fa-edit\"></i>', '', 2, '2022-07-30 23:55:21', '2022-08-07 12:02:23', 'inactive'),
(6, 5, 'Manage Contact Us', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-contact-us.php', 0, '2022-07-30 23:55:56', '2022-08-22 20:51:49', 'active'),
(7, 0, 'Sales', '<i class=\"nav-icon fas fa-edit\"></i>', '', 1, '2022-08-07 11:46:12', '2022-08-07 11:46:12', 'active'),
(8, 7, 'Sales Orders', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-sales-orders.php', 1, '2022-08-07 11:47:29', '2022-08-22 20:51:49', 'active'),
(9, 7, 'Invoices', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-invoices.php', 2, '2022-08-07 11:48:04', '2022-08-22 20:51:49', 'active'),
(10, 7, 'Revenues', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-revenues.php', 3, '2022-08-07 11:48:54', '2022-08-22 20:51:49', 'active'),
(11, 7, 'Credit Notes', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-credit-notes.php', 4, '2022-08-07 11:49:54', '2022-08-22 20:51:49', 'active'),
(12, 7, 'Customers', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-customers.php', 6, '2022-08-07 11:51:13', '2022-08-22 20:51:49', 'active'),
(13, 0, 'Purchases', '<i class=\"nav-icon fas fa-edit\"></i>', '', 2, '2022-08-07 11:51:38', '2022-08-07 11:52:01', 'active'),
(14, 13, 'Purchases Orders', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-purchases-orders.php', 1, '2022-08-07 11:53:46', '2022-08-22 20:51:49', 'active'),
(15, 13, 'Bills', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-bills.php', 2, '2022-08-07 11:54:13', '2022-08-22 20:51:49', 'active'),
(16, 13, 'Payments', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-payments.php', 3, '2022-08-07 11:55:10', '2022-08-22 20:51:49', 'active'),
(17, 13, 'Debit Notes', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-debit-notes.php', 4, '2022-08-07 11:56:07', '2022-08-22 20:51:49', 'active'),
(18, 13, 'Vendors', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-vendors.php', 5, '2022-08-07 11:56:36', '2022-08-22 20:51:49', 'active'),
(19, 13, 'GRN', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-grn.php', 6, '2022-08-07 11:57:01', '2022-08-22 20:51:49', 'active'),
(20, 0, 'Reports', '<i class=\"nav-icon fas fa-edit\"></i>', '', 3, '2022-08-07 11:57:40', '2022-08-07 11:57:40', 'active'),
(26, 25, 'Manage Journal', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-journal.php', 1, '2022-09-14 00:58:10', '2022-09-14 00:58:10', 'active'),
(23, 0, 'Items', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', '', 0, '2022-08-22 17:53:41', '2022-08-22 20:51:49', 'active'),
(24, 23, 'Goods', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'goods.php', 0, '2022-08-22 17:54:08', '2022-08-22 20:49:38', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch_admin_roles`
--

CREATE TABLE `tbl_branch_admin_roles` (
  `fldRoleKey` int(11) NOT NULL,
  `fldRoleCompanyId` int(11) DEFAULT NULL,
  `fldAdminBranchId` int(11) DEFAULT NULL,
  `fldRoleName` varchar(255) NOT NULL,
  `fldRoleAccesses` varchar(255) NOT NULL,
  `fldRoleDescription` text NOT NULL,
  `fldRoleCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldRoleUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldRoleStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch_admin_roles`
--

INSERT INTO `tbl_branch_admin_roles` (`fldRoleKey`, `fldRoleCompanyId`, `fldAdminBranchId`, `fldRoleName`, `fldRoleAccesses`, `fldRoleDescription`, `fldRoleCreatedAt`, `fldRoleUpdatedAt`, `fldRoleStatus`) VALUES
(1, 1, 1, 'Supper Admin', '0', 'Have all the webmaster accesses', '2022-07-30 23:43:05', '2022-09-06 00:56:26', 'active'),
(2, 1, 1, 'Test role', '4,2', 'test role access', '2022-08-01 11:47:23', '2022-09-06 00:56:30', 'active'),
(3, 11, 2, 'Purchases', '24,4', 'testing', '2022-09-06 16:56:14', '2022-09-06 16:56:14', 'active'),
(4, 1, 3, 'Branch Admin', '24,15,18', 'Testing', '2022-09-19 14:05:43', '2022-09-19 14:05:43', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch_admin_tablesettings`
--

CREATE TABLE `tbl_branch_admin_tablesettings` (
  `id` int(11) NOT NULL,
  `pageTableName` varchar(255) NOT NULL,
  `settingsCheckbox` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `status` enum('active','inactive','deleted','draft') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch_admin_tablesettings`
--

INSERT INTO `tbl_branch_admin_tablesettings` (`id`, `pageTableName`, `settingsCheckbox`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `status`) VALUES
(12, 'ERP_VENDOR_DETAILS', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-09 23:20:17', 0, '2022-09-09 23:20:17', 0, 'active'),
(13, 'ERP_PURCHASE_BILLS', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-10 15:10:45', 0, '2022-09-10 15:10:45', 0, 'active'),
(14, 'ERP_ACC_JOURNAL', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-14 01:49:28', 0, '2022-09-14 01:49:28', 0, 'active'),
(15, 'ERP_CUSTOMER', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-14 01:51:25', 0, '2022-09-14 01:51:25', 0, 'active'),
(16, 'ERP_ACC_JOURNAL', 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";}', '2022-09-14 02:10:36', 6, '2022-09-14 02:10:36', 6, 'active'),
(17, 'ERP_BRANCH_OTHERSLOCATION', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-19 14:04:39', 0, '2022-09-19 14:04:39', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_admin_details`
--

CREATE TABLE `tbl_company_admin_details` (
  `fldAdminKey` int(11) NOT NULL,
  `fldAdminCompanyId` int(11) DEFAULT NULL,
  `fldAdminName` varchar(255) NOT NULL,
  `fldAdminEmail` varchar(255) NOT NULL,
  `fldAdminPhone` varchar(20) DEFAULT NULL,
  `fldAdminPassword` varchar(255) NOT NULL,
  `fldAdminRole` int(11) NOT NULL,
  `fldAdminAvatar` varchar(255) DEFAULT NULL,
  `fldAdminCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldAdminUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldAdminStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `fldAdminNotes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company_admin_details`
--

INSERT INTO `tbl_company_admin_details` (`fldAdminKey`, `fldAdminCompanyId`, `fldAdminName`, `fldAdminEmail`, `fldAdminPhone`, `fldAdminPassword`, `fldAdminRole`, `fldAdminAvatar`, `fldAdminCreatedAt`, `fldAdminUpdatedAt`, `fldAdminStatus`, `fldAdminNotes`) VALUES
(1, 1, 'Super User', 'admin@vitwo.in', '9988776655', '12345678', 1, NULL, '2022-07-30 23:45:03', '2022-08-31 00:11:37', 'active', NULL),
(2, 1, 'Test role user', 'testroleadmin@start-project.com', '9876543212', '12345678', 2, '', '2022-08-01 11:47:59', '2022-08-31 00:11:40', 'active', NULL),
(10, 9, 'Ramendranath Guria', 'guriabusiness@gmail.com', '8888888888', '8778', 1, NULL, '2022-08-31 17:18:54', '2022-09-01 10:31:34', 'deleted', NULL),
(11, 10, 'Ramendranath Guria', 'guriabusiness2@gmail.com', '7777777777', '6119', 1, NULL, '2022-08-31 17:45:01', '2022-08-31 17:45:01', 'active', NULL),
(12, 11, 'Testing User', 'encoder@gmail.com', '1234567890', '3692', 1, NULL, '2022-09-06 16:40:37', '2022-09-06 16:40:37', 'active', NULL),
(13, 12, 'Ramendranath Guria', 'itc@gmail.com', '1234567890', '3464', 1, NULL, '2022-09-07 17:48:17', '2022-09-07 17:48:17', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_admin_menu`
--

CREATE TABLE `tbl_company_admin_menu` (
  `fldMenuKey` int(11) NOT NULL,
  `fldParentMenuKey` int(11) NOT NULL DEFAULT 0,
  `fldMenuLabel` varchar(250) NOT NULL,
  `fldMenuIcon` varchar(255) NOT NULL,
  `fldMenuFile` varchar(250) DEFAULT NULL,
  `fldMenuOrderBy` int(11) NOT NULL,
  `fldCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldMenuStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company_admin_menu`
--

INSERT INTO `tbl_company_admin_menu` (`fldMenuKey`, `fldParentMenuKey`, `fldMenuLabel`, `fldMenuIcon`, `fldMenuFile`, `fldMenuOrderBy`, `fldCreatedAt`, `fldUpdatedAt`, `fldMenuStatus`) VALUES
(1, 0, 'Branch', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-branch.php', 2, '2022-08-30 13:55:56', '2022-08-30 13:55:56', 'active'),
(2, 1, 'Manage Branch', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-branches.php', 1, '2022-08-30 13:58:03', '2022-08-30 13:58:03', 'active'),
(19, 1, 'Manage Functionalities', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-functionalities.php', 3, '2022-09-19 00:22:05', '2022-09-19 00:22:05', 'active'),
(4, 0, 'SD', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', '', 4, '2022-09-07 18:47:22', '2022-09-12 23:59:09', 'inactive'),
(5, 0, 'MM', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', '', 6, '2022-09-07 18:47:39', '2022-09-12 23:59:16', 'inactive'),
(6, 0, 'FI', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', '', 7, '2022-09-07 18:47:55', '2022-09-12 23:59:21', 'inactive'),
(7, 0, 'PP', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', '', 8, '2022-09-07 18:48:54', '2022-09-12 23:59:30', 'inactive'),
(8, 4, 'SO', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-so.php', 1, '2022-09-07 18:49:31', '2022-09-07 18:49:31', 'active'),
(9, 4, 'Customer', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-customer.php', 2, '2022-09-07 18:49:54', '2022-09-07 18:49:54', 'active'),
(10, 5, 'PO', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-po.php', 1, '2022-09-07 18:50:28', '2022-09-07 18:50:28', 'active'),
(11, 5, 'GRN', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-grn.php', 2, '2022-09-07 18:50:58', '2022-09-07 18:50:58', 'active'),
(12, 5, 'Vendor', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-vendor.php', 3, '2022-09-07 18:51:27', '2022-09-07 18:51:33', 'active'),
(13, 5, 'Material', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-material.php', 5, '2022-09-07 18:52:06', '2022-09-07 18:52:06', 'active'),
(14, 6, 'Processing', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-processing.php', 7, '2022-09-07 18:52:57', '2022-09-07 18:52:57', 'active'),
(15, 6, 'Payment', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-payment.php', 7, '2022-09-07 18:53:51', '2022-09-07 18:53:51', 'active'),
(16, 7, 'Product Dec', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-pro-dec.php', 8, '2022-09-07 18:54:41', '2022-09-07 18:54:41', 'active'),
(17, 7, 'MRP', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-mrp.php', 9, '2022-09-07 18:55:10', '2022-09-07 18:55:10', 'active'),
(18, 1, 'Manage Credit Terms', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-credit-terms.php', 2, '2022-09-12 23:49:01', '2022-09-12 23:49:01', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_admin_roles`
--

CREATE TABLE `tbl_company_admin_roles` (
  `fldRoleKey` int(11) NOT NULL,
  `fldRoleCompanyId` int(11) DEFAULT NULL,
  `fldRoleName` varchar(255) NOT NULL,
  `fldRoleAccesses` varchar(255) NOT NULL,
  `fldRoleDescription` text NOT NULL,
  `fldRoleCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldRoleUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldRoleStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company_admin_roles`
--

INSERT INTO `tbl_company_admin_roles` (`fldRoleKey`, `fldRoleCompanyId`, `fldRoleName`, `fldRoleAccesses`, `fldRoleDescription`, `fldRoleCreatedAt`, `fldRoleUpdatedAt`, `fldRoleStatus`) VALUES
(1, 1, 'Supper Admin', '0', 'Have all the webmaster accesses', '2022-07-30 23:43:05', '2022-08-30 21:50:54', 'active'),
(2, 1, 'Test role', '4,2', 'test role access', '2022-08-01 11:47:23', '2022-08-30 21:51:03', 'active'),
(3, 12, 'Role-1', '2,3', 'Role one', '2022-09-07 18:38:43', '2022-09-07 18:38:43', 'active'),
(4, 12, 'Role-2', '2', 'Role two', '2022-09-07 18:39:12', '2022-09-07 18:39:12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_admin_tablesettings`
--

CREATE TABLE `tbl_company_admin_tablesettings` (
  `id` int(11) NOT NULL,
  `pageTableName` varchar(255) NOT NULL,
  `settingsCheckbox` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `status` enum('active','inactive','deleted','draft') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company_admin_tablesettings`
--

INSERT INTO `tbl_company_admin_tablesettings` (`id`, `pageTableName`, `settingsCheckbox`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `status`) VALUES
(4, 'ERP_BRANCHES', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-09 12:43:37', 0, '2022-09-09 12:43:37', 0, 'active'),
(5, 'ERP_CREDIT_TERMS', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-12 22:30:28', 0, '2022-09-12 22:30:28', 0, 'active'),
(6, 'ERP_CREDIT_TERMS', 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";}', '2022-09-12 22:53:32', 1, '2022-09-12 22:53:32', 1, 'active'),
(7, 'ERP_COMPANY_FUNCTIONALITIES', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-19 00:22:13', 0, '2022-09-19 00:22:13', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_admin_details`
--

CREATE TABLE `tbl_customer_admin_details` (
  `fldAdminKey` int(11) NOT NULL,
  `fldAdminCompanyId` int(11) DEFAULT NULL,
  `fldAdminBranchId` int(11) DEFAULT NULL,
  `fldAdminCustomerId` int(11) DEFAULT NULL,
  `fldAdminName` varchar(255) NOT NULL,
  `fldAdminEmail` varchar(255) NOT NULL,
  `fldAdminPhone` varchar(20) DEFAULT NULL,
  `fldAdminPassword` varchar(255) NOT NULL,
  `fldAdminRole` int(11) NOT NULL,
  `fldAdminAvatar` varchar(255) DEFAULT NULL,
  `fldAdminCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldAdminUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldAdminStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `fldAdminNotes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer_admin_details`
--

INSERT INTO `tbl_customer_admin_details` (`fldAdminKey`, `fldAdminCompanyId`, `fldAdminBranchId`, `fldAdminCustomerId`, `fldAdminName`, `fldAdminEmail`, `fldAdminPhone`, `fldAdminPassword`, `fldAdminRole`, `fldAdminAvatar`, `fldAdminCreatedAt`, `fldAdminUpdatedAt`, `fldAdminStatus`, `fldAdminNotes`) VALUES
(1, 1, 1, 1, 'Ramendranath Guria', 'guriacompany@gmail.com', '1111111111', '5817', 1, NULL, '2022-09-06 13:08:29', '2022-09-06 13:08:29', 'active', NULL),
(2, 1, 3, 2, 'Ramendranath Guria', 'guriasdsa@gmail.com', '8888888888', '2440', 1, NULL, '2022-09-14 01:51:55', '2022-09-14 01:51:55', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_admin_menu`
--

CREATE TABLE `tbl_customer_admin_menu` (
  `fldMenuKey` int(11) NOT NULL,
  `fldParentMenuKey` int(11) NOT NULL DEFAULT 0,
  `fldMenuLabel` varchar(250) NOT NULL,
  `fldMenuIcon` varchar(255) NOT NULL,
  `fldMenuFile` varchar(250) DEFAULT NULL,
  `fldMenuOrderBy` int(11) NOT NULL,
  `fldCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldMenuStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_admin_menu`
--

INSERT INTO `tbl_customer_admin_menu` (`fldMenuKey`, `fldParentMenuKey`, `fldMenuLabel`, `fldMenuIcon`, `fldMenuFile`, `fldMenuOrderBy`, `fldCreatedAt`, `fldUpdatedAt`, `fldMenuStatus`) VALUES
(7, 0, 'Sales', '<i class=\"nav-icon fas fa-edit\"></i>', '', 1, '2022-08-07 11:46:12', '2022-08-07 11:46:12', 'active'),
(8, 7, 'Sales Orders', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-sales-orders.php', 1, '2022-08-07 11:47:29', '2022-08-22 20:51:49', 'active'),
(9, 7, 'Invoices', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-invoices.php', 2, '2022-08-07 11:48:04', '2022-08-22 20:51:49', 'active'),
(10, 7, 'Revenues', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-revenues.php', 3, '2022-08-07 11:48:54', '2022-08-22 20:51:49', 'active'),
(11, 7, 'Credit Notes', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-credit-notes.php', 4, '2022-08-07 11:49:54', '2022-08-22 20:51:49', 'active'),
(12, 7, 'Customers', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-customers.php', 6, '2022-08-07 11:51:13', '2022-08-22 20:51:49', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_admin_roles`
--

CREATE TABLE `tbl_customer_admin_roles` (
  `fldRoleKey` int(11) NOT NULL,
  `fldRoleCompanyId` int(11) DEFAULT NULL,
  `fldRoleName` varchar(255) NOT NULL,
  `fldRoleAccesses` varchar(255) NOT NULL,
  `fldRoleDescription` text NOT NULL,
  `fldRoleCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldRoleUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldRoleStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer_admin_roles`
--

INSERT INTO `tbl_customer_admin_roles` (`fldRoleKey`, `fldRoleCompanyId`, `fldRoleName`, `fldRoleAccesses`, `fldRoleDescription`, `fldRoleCreatedAt`, `fldRoleUpdatedAt`, `fldRoleStatus`) VALUES
(1, 1, 'Supper Admin', '0', 'Have all the webmaster accesses', '2022-07-30 23:43:05', '2022-08-30 21:51:35', 'active'),
(2, 1, 'Test role', '4,2', 'test role access', '2022-08-01 11:47:23', '2022-08-30 21:51:43', 'active'),
(3, 1, 'New Role', '22', 'Testing', '2022-08-31 00:53:03', '2022-08-31 00:53:03', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_admin_tablesettings`
--

CREATE TABLE `tbl_customer_admin_tablesettings` (
  `id` int(11) NOT NULL,
  `pageTableName` varchar(255) NOT NULL,
  `settingsCheckbox` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `status` enum('active','inactive','deleted','draft') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer_admin_tablesettings`
--

INSERT INTO `tbl_customer_admin_tablesettings` (`id`, `pageTableName`, `settingsCheckbox`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `status`) VALUES
(3, 'ERP_CUSTOMER', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-06 12:42:16', 1, '2022-09-06 12:42:16', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor_admin_details`
--

CREATE TABLE `tbl_vendor_admin_details` (
  `fldAdminKey` int(11) NOT NULL,
  `fldAdminCompanyId` int(11) DEFAULT NULL,
  `fldAdminBranchId` int(11) DEFAULT NULL,
  `fldAdminVendorId` int(11) DEFAULT NULL,
  `fldAdminName` varchar(255) NOT NULL,
  `fldAdminEmail` varchar(255) NOT NULL,
  `fldAdminPhone` varchar(20) DEFAULT NULL,
  `fldAdminPassword` varchar(255) NOT NULL,
  `fldAdminRole` int(11) NOT NULL,
  `fldAdminAvatar` varchar(255) DEFAULT NULL,
  `fldAdminCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldAdminUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldAdminStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `fldAdminNotes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor_admin_details`
--

INSERT INTO `tbl_vendor_admin_details` (`fldAdminKey`, `fldAdminCompanyId`, `fldAdminBranchId`, `fldAdminVendorId`, `fldAdminName`, `fldAdminEmail`, `fldAdminPhone`, `fldAdminPassword`, `fldAdminRole`, `fldAdminAvatar`, `fldAdminCreatedAt`, `fldAdminUpdatedAt`, `fldAdminStatus`, `fldAdminNotes`) VALUES
(1, 1, 1, 1, 'Super User', 'admin@vitwo.in', '9988776655', '12345678', 1, NULL, '2022-07-30 23:45:03', '2022-09-06 00:36:42', 'active', NULL),
(2, 1, 1, 1, 'Test role user', 'testroleadmin@start-project.com', '9876543212', '12345678', 2, '', '2022-08-01 11:47:59', '2022-09-06 00:36:47', 'active', NULL),
(4, 1, 1, 2, 'Ramendranath Guria', 'guriavendor@gmail.com', '0000000000', '178775', 1, NULL, '2022-09-06 00:32:49', '2022-09-06 00:36:56', 'active', NULL),
(5, 1, 1, 3, 'Ramendranath Guria', 'guriabusiness@gmail.com', '8888888888', '916749', 1, NULL, '2022-09-10 16:50:34', '2022-09-10 16:50:34', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor_admin_menu`
--

CREATE TABLE `tbl_vendor_admin_menu` (
  `fldMenuKey` int(11) NOT NULL,
  `fldParentMenuKey` int(11) NOT NULL DEFAULT 0,
  `fldMenuLabel` varchar(250) NOT NULL,
  `fldMenuIcon` varchar(255) NOT NULL,
  `fldMenuFile` varchar(250) DEFAULT NULL,
  `fldMenuOrderBy` int(11) NOT NULL,
  `fldCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldMenuStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vendor_admin_menu`
--

INSERT INTO `tbl_vendor_admin_menu` (`fldMenuKey`, `fldParentMenuKey`, `fldMenuLabel`, `fldMenuIcon`, `fldMenuFile`, `fldMenuOrderBy`, `fldCreatedAt`, `fldUpdatedAt`, `fldMenuStatus`) VALUES
(7, 0, 'Sales', '<i class=\"nav-icon fas fa-edit\"></i>', '', 1, '2022-08-07 11:46:12', '2022-08-07 11:46:12', 'active'),
(8, 7, 'Sales Orders', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-sales-orders.php', 1, '2022-08-07 11:47:29', '2022-08-22 20:51:49', 'active'),
(9, 7, 'Invoices', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-invoices.php', 2, '2022-08-07 11:48:04', '2022-08-22 20:51:49', 'active'),
(10, 7, 'Revenues', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-revenues.php', 3, '2022-08-07 11:48:54', '2022-08-22 20:51:49', 'active'),
(11, 7, 'Credit Notes', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-credit-notes.php', 4, '2022-08-07 11:49:54', '2022-08-22 20:51:49', 'active'),
(12, 7, 'Customers', '<img width=\"20\" src=\"../public/storage/icons/google-sheets.png\" alt=\"icons\">', 'manage-customers.php', 6, '2022-08-07 11:51:13', '2022-08-22 20:51:49', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor_admin_roles`
--

CREATE TABLE `tbl_vendor_admin_roles` (
  `fldRoleKey` int(11) NOT NULL,
  `fldRoleCompanyId` int(11) DEFAULT NULL,
  `fldRoleName` varchar(255) NOT NULL,
  `fldRoleAccesses` varchar(255) NOT NULL,
  `fldRoleDescription` text NOT NULL,
  `fldRoleCreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `fldRoleUpdatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fldRoleStatus` enum('active','inactive','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor_admin_roles`
--

INSERT INTO `tbl_vendor_admin_roles` (`fldRoleKey`, `fldRoleCompanyId`, `fldRoleName`, `fldRoleAccesses`, `fldRoleDescription`, `fldRoleCreatedAt`, `fldRoleUpdatedAt`, `fldRoleStatus`) VALUES
(1, 1, 'Supper Admin', '0', 'Have all the webmaster accesses', '2022-07-30 23:43:05', '2022-08-30 21:51:35', 'active'),
(2, 1, 'Test role', '4,2', 'test role access', '2022-08-01 11:47:23', '2022-08-30 21:51:43', 'active'),
(3, 1, 'New Role', '22', 'Testing', '2022-08-31 00:53:03', '2022-08-31 00:53:03', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor_admin_tablesettings`
--

CREATE TABLE `tbl_vendor_admin_tablesettings` (
  `id` int(11) NOT NULL,
  `pageTableName` varchar(255) NOT NULL,
  `settingsCheckbox` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `createdBy` int(11) DEFAULT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` int(11) DEFAULT NULL,
  `status` enum('active','inactive','deleted','draft') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor_admin_tablesettings`
--

INSERT INTO `tbl_vendor_admin_tablesettings` (`id`, `pageTableName`, `settingsCheckbox`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`, `status`) VALUES
(3, 'ERP_CUSTOMER', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2022-09-06 12:42:16', 1, '2022-09-06 12:42:16', 1, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `erp_acc_credit`
--
ALTER TABLE `erp_acc_credit`
  ADD PRIMARY KEY (`credit_id`);

--
-- Indexes for table `erp_acc_debit`
--
ALTER TABLE `erp_acc_debit`
  ADD PRIMARY KEY (`debit_id`);

--
-- Indexes for table `erp_acc_journal`
--
ALTER TABLE `erp_acc_journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `erp_branches`
--
ALTER TABLE `erp_branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `erp_branch_bills`
--
ALTER TABLE `erp_branch_bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD UNIQUE KEY `7gn_bills_company_id_bill_number_deleted_at_unique` (`company_id`,`bill_number`,`bill_updated_by`),
  ADD KEY `7gn_bills_company_id_index` (`company_id`);

--
-- Indexes for table `erp_branch_bills_items`
--
ALTER TABLE `erp_branch_bills_items`
  ADD PRIMARY KEY (`bill_item_id`);

--
-- Indexes for table `erp_branch_otherslocation`
--
ALTER TABLE `erp_branch_otherslocation`
  ADD PRIMARY KEY (`othersLocation_id`);

--
-- Indexes for table `erp_companies`
--
ALTER TABLE `erp_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `erp_company_functionalities`
--
ALTER TABLE `erp_company_functionalities`
  ADD PRIMARY KEY (`functionalities_id`);

--
-- Indexes for table `erp_credit_terms`
--
ALTER TABLE `erp_credit_terms`
  ADD PRIMARY KEY (`credit_terms_id`);

--
-- Indexes for table `erp_currency_type`
--
ALTER TABLE `erp_currency_type`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `erp_customer`
--
ALTER TABLE `erp_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `erp_inventory_items`
--
ALTER TABLE `erp_inventory_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `erp_inventory_mstr_good_groups`
--
ALTER TABLE `erp_inventory_mstr_good_groups`
  ADD PRIMARY KEY (`goodGroupId`);

--
-- Indexes for table `erp_inventory_mstr_good_types`
--
ALTER TABLE `erp_inventory_mstr_good_types`
  ADD PRIMARY KEY (`goodTypeId`);

--
-- Indexes for table `erp_inventory_mstr_time_units`
--
ALTER TABLE `erp_inventory_mstr_time_units`
  ADD PRIMARY KEY (`timeUnitId`);

--
-- Indexes for table `erp_inventory_mstr_uom`
--
ALTER TABLE `erp_inventory_mstr_uom`
  ADD PRIMARY KEY (`uomId`);

--
-- Indexes for table `erp_language`
--
ALTER TABLE `erp_language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `erp_vendor_bank_details`
--
ALTER TABLE `erp_vendor_bank_details`
  ADD PRIMARY KEY (`vendor_bank_id`);

--
-- Indexes for table `erp_vendor_bussiness_places`
--
ALTER TABLE `erp_vendor_bussiness_places`
  ADD PRIMARY KEY (`vendor_business_id`);

--
-- Indexes for table `erp_vendor_details`
--
ALTER TABLE `erp_vendor_details`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `tbl_admin_details`
--
ALTER TABLE `tbl_admin_details`
  ADD PRIMARY KEY (`fldAdminKey`);

--
-- Indexes for table `tbl_admin_menu`
--
ALTER TABLE `tbl_admin_menu`
  ADD PRIMARY KEY (`fldMenuKey`);

--
-- Indexes for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  ADD PRIMARY KEY (`fldRoleKey`);

--
-- Indexes for table `tbl_admin_settings`
--
ALTER TABLE `tbl_admin_settings`
  ADD PRIMARY KEY (`fldSettingKey`);

--
-- Indexes for table `tbl_admin_tablesettings`
--
ALTER TABLE `tbl_admin_tablesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_branch_admin_details`
--
ALTER TABLE `tbl_branch_admin_details`
  ADD PRIMARY KEY (`fldAdminKey`);

--
-- Indexes for table `tbl_branch_admin_menu`
--
ALTER TABLE `tbl_branch_admin_menu`
  ADD PRIMARY KEY (`fldMenuKey`);

--
-- Indexes for table `tbl_branch_admin_roles`
--
ALTER TABLE `tbl_branch_admin_roles`
  ADD PRIMARY KEY (`fldRoleKey`);

--
-- Indexes for table `tbl_branch_admin_tablesettings`
--
ALTER TABLE `tbl_branch_admin_tablesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_admin_details`
--
ALTER TABLE `tbl_company_admin_details`
  ADD PRIMARY KEY (`fldAdminKey`);

--
-- Indexes for table `tbl_company_admin_menu`
--
ALTER TABLE `tbl_company_admin_menu`
  ADD PRIMARY KEY (`fldMenuKey`);

--
-- Indexes for table `tbl_company_admin_roles`
--
ALTER TABLE `tbl_company_admin_roles`
  ADD PRIMARY KEY (`fldRoleKey`);

--
-- Indexes for table `tbl_company_admin_tablesettings`
--
ALTER TABLE `tbl_company_admin_tablesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_admin_details`
--
ALTER TABLE `tbl_customer_admin_details`
  ADD PRIMARY KEY (`fldAdminKey`);

--
-- Indexes for table `tbl_customer_admin_menu`
--
ALTER TABLE `tbl_customer_admin_menu`
  ADD PRIMARY KEY (`fldMenuKey`);

--
-- Indexes for table `tbl_customer_admin_roles`
--
ALTER TABLE `tbl_customer_admin_roles`
  ADD PRIMARY KEY (`fldRoleKey`);

--
-- Indexes for table `tbl_customer_admin_tablesettings`
--
ALTER TABLE `tbl_customer_admin_tablesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vendor_admin_details`
--
ALTER TABLE `tbl_vendor_admin_details`
  ADD PRIMARY KEY (`fldAdminKey`);

--
-- Indexes for table `tbl_vendor_admin_menu`
--
ALTER TABLE `tbl_vendor_admin_menu`
  ADD PRIMARY KEY (`fldMenuKey`);

--
-- Indexes for table `tbl_vendor_admin_roles`
--
ALTER TABLE `tbl_vendor_admin_roles`
  ADD PRIMARY KEY (`fldRoleKey`);

--
-- Indexes for table `tbl_vendor_admin_tablesettings`
--
ALTER TABLE `tbl_vendor_admin_tablesettings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `erp_acc_credit`
--
ALTER TABLE `erp_acc_credit`
  MODIFY `credit_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `erp_acc_debit`
--
ALTER TABLE `erp_acc_debit`
  MODIFY `debit_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `erp_acc_journal`
--
ALTER TABLE `erp_acc_journal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `erp_branches`
--
ALTER TABLE `erp_branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `erp_branch_bills`
--
ALTER TABLE `erp_branch_bills`
  MODIFY `bill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `erp_branch_bills_items`
--
ALTER TABLE `erp_branch_bills_items`
  MODIFY `bill_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `erp_branch_otherslocation`
--
ALTER TABLE `erp_branch_otherslocation`
  MODIFY `othersLocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `erp_companies`
--
ALTER TABLE `erp_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `erp_company_functionalities`
--
ALTER TABLE `erp_company_functionalities`
  MODIFY `functionalities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `erp_credit_terms`
--
ALTER TABLE `erp_credit_terms`
  MODIFY `credit_terms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `erp_currency_type`
--
ALTER TABLE `erp_currency_type`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `erp_customer`
--
ALTER TABLE `erp_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `erp_inventory_items`
--
ALTER TABLE `erp_inventory_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `erp_inventory_mstr_good_groups`
--
ALTER TABLE `erp_inventory_mstr_good_groups`
  MODIFY `goodGroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `erp_inventory_mstr_good_types`
--
ALTER TABLE `erp_inventory_mstr_good_types`
  MODIFY `goodTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `erp_inventory_mstr_time_units`
--
ALTER TABLE `erp_inventory_mstr_time_units`
  MODIFY `timeUnitId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `erp_inventory_mstr_uom`
--
ALTER TABLE `erp_inventory_mstr_uom`
  MODIFY `uomId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `erp_language`
--
ALTER TABLE `erp_language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `erp_vendor_bank_details`
--
ALTER TABLE `erp_vendor_bank_details`
  MODIFY `vendor_bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `erp_vendor_bussiness_places`
--
ALTER TABLE `erp_vendor_bussiness_places`
  MODIFY `vendor_business_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `erp_vendor_details`
--
ALTER TABLE `erp_vendor_details`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin_details`
--
ALTER TABLE `tbl_admin_details`
  MODIFY `fldAdminKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin_menu`
--
ALTER TABLE `tbl_admin_menu`
  MODIFY `fldMenuKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  MODIFY `fldRoleKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin_settings`
--
ALTER TABLE `tbl_admin_settings`
  MODIFY `fldSettingKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin_tablesettings`
--
ALTER TABLE `tbl_admin_tablesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_branch_admin_details`
--
ALTER TABLE `tbl_branch_admin_details`
  MODIFY `fldAdminKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_branch_admin_menu`
--
ALTER TABLE `tbl_branch_admin_menu`
  MODIFY `fldMenuKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_branch_admin_roles`
--
ALTER TABLE `tbl_branch_admin_roles`
  MODIFY `fldRoleKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_branch_admin_tablesettings`
--
ALTER TABLE `tbl_branch_admin_tablesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_company_admin_details`
--
ALTER TABLE `tbl_company_admin_details`
  MODIFY `fldAdminKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_company_admin_menu`
--
ALTER TABLE `tbl_company_admin_menu`
  MODIFY `fldMenuKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_company_admin_roles`
--
ALTER TABLE `tbl_company_admin_roles`
  MODIFY `fldRoleKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_company_admin_tablesettings`
--
ALTER TABLE `tbl_company_admin_tablesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_customer_admin_details`
--
ALTER TABLE `tbl_customer_admin_details`
  MODIFY `fldAdminKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer_admin_menu`
--
ALTER TABLE `tbl_customer_admin_menu`
  MODIFY `fldMenuKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_customer_admin_roles`
--
ALTER TABLE `tbl_customer_admin_roles`
  MODIFY `fldRoleKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer_admin_tablesettings`
--
ALTER TABLE `tbl_customer_admin_tablesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vendor_admin_details`
--
ALTER TABLE `tbl_vendor_admin_details`
  MODIFY `fldAdminKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_vendor_admin_menu`
--
ALTER TABLE `tbl_vendor_admin_menu`
  MODIFY `fldMenuKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_vendor_admin_roles`
--
ALTER TABLE `tbl_vendor_admin_roles`
  MODIFY `fldRoleKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vendor_admin_tablesettings`
--
ALTER TABLE `tbl_vendor_admin_tablesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
