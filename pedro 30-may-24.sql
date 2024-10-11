-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 05:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pedro`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `work_orders_id` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `address`, `work_orders_id`, `attendance`, `duration`, `created_at`, `updated_at`) VALUES
(1, 21, 'W339+CRQ, Block 13 A Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan', '1', 'checkIn', '', '2024-02-19 09:55:45', '2024-02-19 09:55:45'),
(2, 21, 'W339+CRQ, Block 13 A Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan', '1', 'checkOut', '00:00:18', '2024-02-19 09:56:03', '2024-02-19 09:56:03'),
(3, 21, 'W339+CRQ, Block 13 A Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan', '3', 'checkIn', '', '2024-02-19 10:58:39', '2024-02-19 10:58:39'),
(4, 21, 'W339+CRQ, Block 13 A Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan', '3', 'checkOut', '00:00:13', '2024-02-19 10:58:52', '2024-02-19 10:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estimate_request_id` bigint(20) UNSIGNED NOT NULL,
  `bid` int(11) DEFAULT NULL,
  `selected` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `user_id`, `estimate_request_id`, `bid`, `selected`, `created_at`, `updated_at`) VALUES
(1, 21, 4, 21, 1, '2024-03-28 05:28:22', '2024-04-04 02:19:48'),
(2, 23, 4, NULL, 0, '2024-03-28 05:28:22', '2024-04-04 02:19:48'),
(3, 24, 4, NULL, NULL, '2024-04-04 02:22:23', '2024-04-04 02:22:23'),
(4, 21, 1, NULL, NULL, '2024-05-13 13:20:18', '2024-05-13 13:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_items`
--

CREATE TABLE `checklist_items` (
  `id` int(11) NOT NULL,
  `inspection_checklist_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist_items`
--

INSERT INTO `checklist_items` (`id`, `inspection_checklist_id`, `description`, `created_at`, `updated_at`) VALUES
(39, 11, 'Pull trash, change liner, clean & wipe receptacle', '2023-10-19 11:11:45', '2023-10-19 11:11:45'),
(40, 11, 'Pull trash, change liner, clean & wipe receptacle', '2023-10-19 11:11:45', '2023-10-19 11:11:45'),
(41, 11, 'Pull trash, change liner, clean & wipe receptacle', '2023-10-19 11:11:45', '2023-10-19 11:11:45'),
(42, 11, 'Pull trash, change liner, clean & wipe receptacle', '2023-10-19 11:11:45', '2023-10-19 11:11:45'),
(43, 12, 'Adipisci ut quo lore', '2023-10-19 11:11:59', '2023-10-19 11:11:59'),
(44, 12, 'Qui cumque ipsa par', '2023-10-19 11:11:59', '2023-10-19 11:11:59'),
(45, 12, 'Qui cumque ipsa par', '2023-10-19 11:11:59', '2023-10-19 11:11:59'),
(46, 12, 'Qui cumque ipsa par', '2023-10-19 11:11:59', '2023-10-19 11:11:59'),
(47, 13, 'Rem nemo dolore in n', '2023-11-06 05:41:30', '2023-11-06 05:41:30'),
(48, 13, 'Molestias non evenie', '2023-11-06 05:41:30', '2023-11-06 05:41:30'),
(49, 13, 'Deserunt et et quos', '2023-11-06 05:41:30', '2023-11-06 05:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `check_lists`
--

CREATE TABLE `check_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_documents`
--

CREATE TABLE `company_documents` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_documents`
--

INSERT INTO `company_documents` (`id`, `vendor_id`, `filename`, `created_at`, `updated_at`) VALUES
(15, 21, 'company_documents/peding-task_(1) (1).docxOjwk6.docx', '2023-10-06 11:25:21', '2023-10-06 11:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE `company_profiles` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `areas_of_work` text DEFAULT NULL,
  `services_performed` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_profiles`
--

INSERT INTO `company_profiles` (`id`, `vendor_id`, `areas_of_work`, `services_performed`, `created_at`, `updated_at`) VALUES
(1, 21, 'Consequatur maiores', 'hesahaq@mailinator.com', '2023-10-05 15:34:06', '2023-10-05 15:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sortname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `service_agreement` varchar(255) DEFAULT NULL,
  `acnum` varchar(255) DEFAULT NULL,
  `activeCustomer` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `estimate_template` varchar(255) DEFAULT NULL,
  `job_template` varchar(255) DEFAULT NULL,
  `invoice_template` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `customer_tag` varchar(255) DEFAULT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `assigned_contract` varchar(255) DEFAULT NULL,
  `taxable` varchar(255) DEFAULT NULL,
  `tax_item` varchar(255) DEFAULT NULL,
  `bussiness_id` varchar(255) DEFAULT NULL,
  `assigned_rep` varchar(255) DEFAULT NULL,
  `commission_sign` varchar(255) DEFAULT NULL,
  `commission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `user_id`, `customer_name`, `service_agreement`, `acnum`, `activeCustomer`, `contact`, `estimate_template`, `job_template`, `invoice_template`, `notes`, `customer_tag`, `referral`, `amount`, `assigned_contract`, `taxable`, `tax_item`, `bussiness_id`, `assigned_rep`, `commission_sign`, `commission`, `created_at`, `updated_at`) VALUES
(14, '19', 'user', 'no', 'Est impedit in cupi', 'no', 'booking', '1', '1', '1', 'Fuga Velit perspic', 'Libero et in exercit', '1', 'Id dolorem quasi ar', '2', 'yes', '2', '175', '\"1\"', '\"1\"', '\"Fuga Do nihil sapie\"', '2023-09-18 05:24:49', '2023-09-18 05:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE `estimates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `signature` longtext DEFAULT NULL,
  `signature_time` timestamp NULL DEFAULT NULL,
  `client_status` varchar(255) DEFAULT 'pending',
  `location_name` varchar(255) DEFAULT NULL,
  `location_gated_property` varchar(255) DEFAULT NULL,
  `location_address` varchar(255) DEFAULT NULL,
  `location_unit` varchar(255) DEFAULT NULL,
  `location_city` varchar(255) DEFAULT NULL,
  `location_state` varchar(255) DEFAULT NULL,
  `location_zipcode` varchar(255) DEFAULT NULL,
  `job_cat_id` varchar(255) DEFAULT NULL,
  `job_sub_cat_id` varchar(11) DEFAULT NULL,
  `job_sub_description` text DEFAULT NULL,
  `job_description` varchar(255) DEFAULT NULL,
  `mark_description` varchar(255) DEFAULT NULL,
  `po_no` varchar(255) DEFAULT NULL,
  `job_source` varchar(255) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `customer_homeowner` varchar(255) DEFAULT NULL,
  `customer_unit_cordination` varchar(255) DEFAULT NULL,
  `current_status` varchar(255) DEFAULT NULL,
  `requested_on` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `multe_job` varchar(255) DEFAULT NULL,
  `arrival_start` varchar(255) DEFAULT NULL,
  `arrival_end` varchar(255) DEFAULT NULL,
  `time_duration` varchar(255) DEFAULT NULL,
  `start_duration` varchar(255) DEFAULT NULL,
  `end_duration` varchar(255) DEFAULT NULL,
  `referral_source` varchar(255) DEFAULT NULL,
  `opportunity_rating` varchar(255) DEFAULT NULL,
  `opportunity_owner` varchar(255) DEFAULT NULL,
  `assigned_tech` varchar(255) DEFAULT NULL,
  `notify_tech_assign` varchar(255) DEFAULT NULL,
  `notes_for_tech` varchar(255) DEFAULT NULL,
  `completion_notes` varchar(255) DEFAULT NULL,
  `scheduled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estimates`
--

INSERT INTO `estimates` (`id`, `customer_id`, `job_id`, `signature`, `signature_time`, `client_status`, `location_name`, `location_gated_property`, `location_address`, `location_unit`, `location_city`, `location_state`, `location_zipcode`, `job_cat_id`, `job_sub_cat_id`, `job_sub_description`, `job_description`, `mark_description`, `po_no`, `job_source`, `agent`, `first_name`, `last_name`, `email`, `customer_homeowner`, `customer_unit_cordination`, `current_status`, `requested_on`, `image`, `document`, `start_date`, `end_date`, `multe_job`, `arrival_start`, `arrival_end`, `time_duration`, `start_duration`, `end_duration`, `referral_source`, `opportunity_rating`, `opportunity_owner`, `assigned_tech`, `notify_tech_assign`, `notes_for_tech`, `completion_notes`, `scheduled_at`, `created_at`, `updated_at`) VALUES
(4, '19', 5, 'data:image/png;base64,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', '2024-05-15 12:51:13', 'pending', 'Madonna Key', 'on', '+1 (764) 135-4564', '+1 (649) 293-8407', 'Culpa do qui quis a', 'Eum eaque ut dicta n', '64407', '1', NULL, 'Voluptate id totam', 'Cillum id reiciendis', NULL, '+1 (365) 562-5111', '1', '17', 'Lilah', 'Rivera', '[\"+1 (735) 759-9097\"]', 'Quidem nobis et quod', 'Est laudantium mol', '4', '2014-12-10', 'http://127.0.0.1:8000/uploads/image/5836840316c2b425b89e0ea0e2244dccimg.jfif', 'http://127.0.0.1:8000/uploads/document/5313006a6dc65052f370c15e91e76fdddoc.docx', '2018-01-12', '2008-04-25', NULL, 'Ad magni provident', 'Exercitationem ad do', NULL, '90', '60', '2', '4', 'Qui rem nemo distinc', 'Qui nulla reiciendis', NULL, 'Aute molestiae elige', 'Officia iusto assume', NULL, '2023-09-11 11:44:28', '2024-05-15 12:51:13'),
(5, '19', NULL, NULL, NULL, 'declined', 'Victoria Le', NULL, '+1 (304) 484-2747', '+1 (733) 887-7514', 'Quasi nisi debitis o', 'Vel tempor beatae au', '46493', '3', 'on', 'Voluptate id totam', 'Odit et archite\r\ncto v', NULL, '+1 (918) 293-2422', '1', '17', 'Lance', 'Watkins', NULL, NULL, NULL, NULL, '2018-04-22', 'http://127.0.0.1:8000/uploads/image/c40c48374e2fece42a65c6f538b4823cimg.jpg', NULL, '1988-07-15', '1994-07-15', NULL, 'Dolorum sapiente eni', 'Id voluptatem quia', NULL, '67', '62', '1', '4', 'Aut necessitatibus i', 'Aut in voluptas qui', 'on', 'Perferendis magni vo', 'Proident quibusdam', NULL, '2023-10-03 06:07:24', '2024-04-26 13:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `estimate_primary_contacts`
--

CREATE TABLE `estimate_primary_contacts` (
  `id` int(11) NOT NULL,
  `estimate_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `ext` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estimate_primary_contacts`
--

INSERT INTO `estimate_primary_contacts` (`id`, `estimate_id`, `phone`, `ext`, `email`, `created_at`, `updated_at`) VALUES
(1, '3', '+1 (465) 865-3572', '+1 (741) 794-9459', '+1 (547) 191-8158', '2023-09-11 11:35:19', '2023-09-11 11:35:19'),
(9, '4', '+1 (971) 218-8021', '+1 (373) 123-6814', '+1 (238) 861-5833', '2023-09-11 12:30:09', '2023-09-11 12:30:09'),
(10, '4', '+1 (453) 247-5287', '+1 (535) 437-1805', '+1 (428) 559-8359', '2023-09-11 12:30:09', '2023-09-11 12:30:09'),
(16, '6', '+1 (174) 491-3459', '+1 (618) 207-5513', '+1 (711) 876-8397', '2023-11-13 05:47:57', '2023-11-13 05:47:57'),
(19, '5', '+1 (897) 504-1143', '+1 (517) 783-4844', '+1 (148) 329-5623', '2023-11-14 06:05:15', '2023-11-14 06:05:15'),
(20, '7', '+1 (173) 164-2224', '+1 (894) 235-4073', '+1 (104) 228-4531', '2023-11-16 05:23:14', '2023-11-16 05:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `estimate_requests`
--

CREATE TABLE `estimate_requests` (
  `id` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estimate_requests`
--

INSERT INTO `estimate_requests` (`id`, `createdBy`, `first_name`, `last_name`, `phone_number`, `email`, `street_address`, `city`, `state`, `zip_code`, `details`, `picture`, `created_at`, `updated_at`) VALUES
(1, 19, 'Amery', 'Montoya', '+1 (455) 672-9625', 'rybyhiny@mailinator.com', 'Reprehenderit et su', 'Dolores dolor dolore', 'Irure dicta ut quis', '24047', 'Voluptas quo ea id c', 'supply_pic/WCw7QtzO0z8b06D.jpg', '2023-10-09 14:01:41', '2023-10-09 15:06:51'),
(4, 1, 'Quinn', 'Benson', '+1 (372) 671-3444', 'nonicetimi@mailinator.com', 'Ipsum consequuntur c', 'Nulla nostrud perspi', 'Qui amet esse dolor', '30276', 'Fugiat fuga Officia', NULL, '2023-11-16 11:33:42', '2023-11-16 11:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `job_id`, `rating`, `comment`, `file`, `created_at`, `updated_at`) VALUES
(9, 5, 3, 'Eos itaque reprehen', NULL, '2024-05-14 18:52:50', '2024-05-14 18:52:50'),
(10, 14, 8, 'dfgdfgdfgf', 'feedback/admin-post.pngiHIvN.png', '2024-05-15 18:42:25', '2024-05-15 18:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `job_id`, `filename`, `created_at`, `updated_at`) VALUES
(4, 5, 'http://127.0.0.1:8000/uploads/image/a99f6cd2ee0233d666cda85a342a13daimg.jpg', '2023-10-04 17:07:32', '2023-10-04 17:07:32'),
(5, 5, 'http://127.0.0.1:8000/storage/uploads/image/yCJDh0k6.jpg', '2023-10-04 17:11:04', '2023-10-04 17:11:04'),
(6, 5, 'http://127.0.0.1:8000/storage/uploads/image/fUVVceIPYrFT0B2.jpg', '2023-10-04 17:29:12', '2023-10-04 17:29:12'),
(7, 5, 'http://127.0.0.1:8000/storage/uploads/image/bZ5c1jGkc5xKayr.jpg', '2023-10-04 17:29:12', '2023-10-04 17:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inspections`
--

CREATE TABLE `inspections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inspection_categories`
--

CREATE TABLE `inspection_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inspection_categories`
--

INSERT INTO `inspection_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Arsenio Goff', '2023-09-13 06:14:06', '2023-09-13 06:14:06'),
(2, 'Student1357503', '2023-09-13 06:16:04', '2023-09-13 06:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_checklists`
--

CREATE TABLE `inspection_checklists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inspection_checklists`
--

INSERT INTO `inspection_checklists` (`id`, `name`, `createdBy`, `created_at`, `updated_at`) VALUES
(11, 'Shared Spaces', 21, '2023-10-19 11:11:45', '2023-10-19 16:14:35'),
(12, 'Arsenio Goff', 21, '2023-10-19 11:11:59', '2023-10-19 16:14:38'),
(13, 'Kasper Moss', 1, '2023-11-06 05:41:30', '2023-11-06 05:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_responses`
--

CREATE TABLE `inspection_responses` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  `checklist_item_id` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inspection_responses`
--

INSERT INTO `inspection_responses` (`id`, `location_id`, `checklist_id`, `checklist_item_id`, `rating`, `remarks`, `file_path`, `created_at`, `updated_at`) VALUES
(9, 5, 12, 43, 'red', 'Itaque commodi aut r', 'inspection/download.jpgGFHJj.jpg', '2023-10-19 16:20:15', '2023-11-20 13:02:02'),
(10, 5, 12, 44, 'red', 'Eiusmod fugiat irure', 'inspection/logo.pngquy7P.png', '2023-10-19 16:20:15', '2023-11-20 13:02:02'),
(11, 5, 12, 45, 'red', 'Vel repudiandae odio', NULL, '2023-10-19 16:20:15', '2023-11-20 13:02:02'),
(12, 5, 12, 46, 'yellow', 'Neque laborum magna', NULL, '2023-10-19 16:20:15', '2023-11-20 13:02:02'),
(13, 5, 11, 39, 'red', 'Ullamco veniam comm', NULL, '2023-10-19 16:20:15', '2023-11-20 13:02:02'),
(14, 5, 11, 40, 'red', 'Omnis laboriosam co', NULL, '2023-10-19 16:20:15', '2023-11-20 13:02:02'),
(15, 5, 11, 41, 'red', 'Voluptates voluptas', NULL, '2023-10-19 16:20:15', '2023-11-20 13:02:02'),
(16, 5, 11, 42, 'red', 'Voluptatem soluta ac', NULL, '2023-10-19 16:20:15', '2023-11-20 13:02:02'),
(17, 5, 15, 54, 'red', 'Consectetur hic accu', NULL, '2023-11-10 14:04:28', '2023-11-20 13:02:02'),
(18, 5, 15, 55, 'red', 'Dolore et nisi amet', NULL, '2023-11-10 14:04:29', '2023-11-20 13:02:02'),
(19, 5, 15, 56, 'yellow', 'Et deleniti atque au', NULL, '2023-11-10 14:04:29', '2023-11-20 13:02:02'),
(20, 5, 15, 57, 'green', 'Deserunt blanditiis', NULL, '2023-11-10 14:04:29', '2023-11-20 13:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(11) NOT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `paid_for` varchar(255) DEFAULT NULL,
  `paid` int(11) DEFAULT 0,
  `receive` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `unreceived` int(11) DEFAULT 0,
  `unit_cost` int(11) DEFAULT 0,
  `total` int(11) DEFAULT 0,
  `subtotal` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `tax_paid` varchar(255) DEFAULT NULL,
  `ship_cost` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `vendor`, `date`, `paid_for`, `paid`, `receive`, `product`, `quantity`, `unreceived`, `unit_cost`, `total`, `subtotal`, `discount`, `tax_paid`, `ship_cost`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, '23', '1987-06-12', 'Paypal', 10, 'Numquam suscipit vol', '2', 359, 156, 92, 74, NULL, NULL, NULL, NULL, NULL, '2023-09-08 06:26:53', '2023-12-04 10:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `createdBy` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `drive_time` varchar(255) DEFAULT NULL,
  `labor_time` varchar(255) DEFAULT NULL,
  `payments_and_deposits_input` varchar(255) DEFAULT NULL,
  `amount_description` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `no_bill_amount_description` varchar(255) DEFAULT NULL,
  `no_bill_amount` int(11) DEFAULT NULL,
  `note_to_cust` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `job_id`, `createdBy`, `status`, `drive_time`, `labor_time`, `payments_and_deposits_input`, `amount_description`, `amount`, `no_bill_amount_description`, `no_bill_amount`, `note_to_cust`, `created_at`, `updated_at`) VALUES
(7, 7, 1, 'paid', '53', '40', '35', 'Ea sapiente exercita', '85', NULL, NULL, 'Voluptas et tempore', '2023-09-08 08:41:55', '2023-10-05 06:40:56'),
(8, 6, 21, 'recurring', '89', '19', '7', 'Autem officia dolore', '28', NULL, NULL, 'Sunt in mollitia inc', '2023-09-15 07:28:49', '2023-11-14 11:14:07'),
(9, 7, 21, 'paid', '41', '64', '82', 'Tempor enim aut haru', '56', NULL, NULL, 'Maxime similique vol', '2023-09-15 07:29:16', '2023-10-05 08:57:23'),
(10, 5, 21, 'unpaid', '23123', NULL, NULL, NULL, NULL, 'Sint aut sint exerci', 62, 'Deserunt amet assum', '2023-11-03 10:43:32', '2023-11-03 11:06:31'),
(12, 5, 21, 'unpaid', '4', '85', '47', 'Optio nisi aspernat', '76', NULL, NULL, 'Adipisicing nesciunt', '2023-11-03 11:40:13', '2023-11-03 11:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `estimate_id` int(11) DEFAULT NULL,
  `mark_description` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `account_manager_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `location_gated_property` varchar(255) DEFAULT NULL,
  `location_address` varchar(255) DEFAULT NULL,
  `location_unit` varchar(255) DEFAULT NULL,
  `location_city` varchar(255) DEFAULT NULL,
  `location_state` varchar(255) DEFAULT NULL,
  `location_zipcode` varchar(255) DEFAULT NULL,
  `job_cat_id` varchar(255) DEFAULT NULL,
  `job_sub_cat_id` varchar(11) DEFAULT NULL,
  `job_sub_description` text DEFAULT NULL,
  `job_description` varchar(255) DEFAULT NULL,
  `po_no` varchar(255) DEFAULT NULL,
  `job_source` varchar(255) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `customer_homeowner` varchar(255) DEFAULT NULL,
  `customer_unit_cordination` varchar(255) DEFAULT NULL,
  `current_status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `start_duration` varchar(255) DEFAULT NULL,
  `end_duration` varchar(255) DEFAULT NULL,
  `job_priority` varchar(255) DEFAULT NULL,
  `scheduled_at` varchar(255) DEFAULT NULL,
  `assigned_tech` varchar(255) DEFAULT NULL,
  `notify_tech_assign` varchar(255) DEFAULT NULL,
  `notes_for_tech` varchar(255) DEFAULT NULL,
  `completion_notes` varchar(255) DEFAULT NULL,
  `billable` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `estimate_id`, `mark_description`, `customer_id`, `account_manager_id`, `user_id`, `location_name`, `location_gated_property`, `location_address`, `location_unit`, `location_city`, `location_state`, `location_zipcode`, `job_cat_id`, `job_sub_cat_id`, `job_sub_description`, `job_description`, `po_no`, `job_source`, `agent`, `first_name`, `last_name`, `customer_homeowner`, `customer_unit_cordination`, `current_status`, `image`, `document`, `start_date`, `end_date`, `start_time`, `end_time`, `start_duration`, `end_duration`, `job_priority`, `scheduled_at`, `assigned_tech`, `notify_tech_assign`, `notes_for_tech`, `completion_notes`, `billable`, `created_at`, `updated_at`) VALUES
(5, 'Job 5', 2, 'Ea velit id omnis n', '19', 8, 18, 'New York', 'on', '+1 (773) 962-1605', '+1 (269) 772-5127', 'Karachi', 'Eu ullamco deleniti', '11504', '3', NULL, 'sdsadjsakd', 'Ea nemo vel culpa ob', '322132132', '1', '17', 'Hyatt', 'Kramer', 'Duis hic at optio i', 'Culpa qui enim nisi', '9', 'http://127.0.0.1:8000/uploads/image/63c35c6b2bbe749d71addbc5d267001cimg.jpg', 'http://127.0.0.1:8000/uploads/document/41b3e190ca41be354d29b690b46ac23fdoc.docx', '2023-11-21 08:00:00', '2023-11-21 11:30:00', '21:27', '02:00', '48', '80', '1', NULL, 'Officiis voluptatem', NULL, 'Esse rerum laborum', 'Est quis dolore vol', NULL, '2023-09-11 10:01:48', '2023-12-29 09:41:21'),
(7, 'Job 7', NULL, NULL, '19', 9, 19, 'Rhona Hopkins', NULL, '+1 (186) 103-7221', '+1 (772) 679-9653', 'Sapiente labore nost', 'Ut ipsam delectus e', '77123', '3', 'on', 'Voluptate id totam', 'Asperiores atque aut', '+1 (323) 332-8652', '1', NULL, 'Ignatius', 'Beard', NULL, NULL, '9', 'http://127.0.0.1:8000/uploads/image/2b455b88ea01e55783c1264eaf60339dimg.jpg', 'http://127.0.0.1:8000/uploads/document/16e99981588c0d6728e9853fbee2f2e2doc.docx', NULL, NULL, '06:50', '02:12', '38', '37', '1', NULL, 'Modi illo voluptatem', 'on', 'Velit et laborum rer', 'Sequi eos architect', 'on', '2023-09-13 07:47:54', '2023-11-16 06:52:40'),
(14, 'Andrew Boone', NULL, NULL, '19', NULL, NULL, 'Karleigh Farmer', NULL, '+1 (518) 581-9543', '+1 (221) 128-8847', 'Aute modi incididunt', 'Ipsam earum nesciunt', '67504', '2', NULL, NULL, 'Magna quam ipsa sap', '+1 (931) 331-3939', '1', '17', 'Echo', 'Payne', NULL, NULL, '9', NULL, NULL, '1976-05-25T18:20', '1990-02-15T19:22', '08:06', '23:17', '99', '40', '1', NULL, 'Exercitation id non', 'on', 'Nihil omnis et accus', 'Sit veniam digniss', 'on', '2023-12-01 10:00:26', '2023-12-01 10:00:26'),
(15, 'Serina Garcia', NULL, NULL, '18', NULL, NULL, 'Sydney Tran', NULL, '+1 (588) 848-1781', '+1 (818) 469-9727', 'Deleniti rerum eveni', 'Accusamus sint dolor', '95731', '2', NULL, NULL, 'Officia id et aute e', '+1 (437) 651-3922', '1', '17', 'Angelica', 'Mcbride', NULL, NULL, '7', NULL, NULL, '1976-11-16T02:55', '2004-03-26T19:45', '16:02', '03:52', '7', '71', '1', NULL, 'Vero est adipisicing', NULL, 'Iste cillum est et', 'Sit aut in provident', NULL, '2023-12-01 10:14:57', '2023-12-01 10:14:57'),
(16, 'Kevyn Fitzgerald', NULL, NULL, '18', NULL, NULL, 'Sybill Marsh', NULL, '+1 (195) 724-6807', '+1 (463) 105-4336', 'Delectus debitis re', 'Labore voluptatem T', '61992', '3', 'on', 'Veniam sint duis n', 'Praesentium ipsum ma', '+1 (411) 874-2736', '1', '17', 'Kathleen', 'Mcintosh', NULL, NULL, '5', NULL, NULL, '1970-12-28T08:00', '1988-11-22T18:14', '08:06', '15:56', '1', '10', '1', NULL, 'Ipsa ad irure facil', 'on', 'Magnam doloremque in', 'Blanditiis proident', NULL, '2023-12-01 10:33:40', '2023-12-01 10:33:40'),
(19, NULL, 5, NULL, '19', NULL, NULL, 'Victoria Le', NULL, '+1 (304) 484-2747', '+1 (733) 887-7514', 'Quasi nisi debitis o', 'Vel tempor beatae au', '46493', '3', 'on', 'Voluptate id totam', 'Odit et archite\r\ncto v', '+1 (918) 293-2422', '1', '17', 'Lance', 'Watkins', NULL, NULL, '2', 'http://127.0.0.1:8000/uploads/image/c40c48374e2fece42a65c6f538b4823cimg.jpg', NULL, NULL, NULL, NULL, NULL, '67', '62', NULL, NULL, 'Aut in voluptas qui', 'on', 'Perferendis magni vo', 'Proident quibusdam', NULL, '2024-01-17 06:36:06', '2024-05-16 12:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE `job_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_orders_id` bigint(20) UNSIGNED NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`id`, `work_orders_id`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(4, 1, '67.0695424', '24.90368', '2024-02-16 07:55:09', '2024-02-19 08:14:27'),
(5, 3, '67.06931843554726', '24.90382353565307', '2024-02-19 10:27:10', '2024-02-19 10:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `job_primary_contacts`
--

CREATE TABLE `job_primary_contacts` (
  `id` int(11) NOT NULL,
  `job_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `ext` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_primary_contacts`
--

INSERT INTO `job_primary_contacts` (`id`, `job_id`, `phone`, `ext`, `email`, `created_at`, `updated_at`) VALUES
(10, '4', '+1 (563) 665-2375', '+1 (535) 933-4424', '+1 (363) 757-9857', '2023-09-11 08:33:32', '2023-09-11 08:33:32'),
(75, '6', '+1 (945) 672-2141', '+1 (552) 827-9334', '+1 (199) 588-4233', '2023-10-02 11:05:20', '2023-10-02 11:05:20'),
(97, '8', '+1 (971) 218-8021', '+1 (373) 123-6814', '+1 (238) 861-5833', '2023-11-10 09:46:26', '2023-11-10 09:46:26'),
(98, '8', '+1 (453) 247-5287', '+1 (535) 437-1805', '+1 (428) 559-8359', '2023-11-10 09:46:26', '2023-11-10 09:46:26'),
(99, '9', '+1 (971) 218-8021', '+1 (373) 123-6814', '+1 (238) 861-5833', '2023-11-13 05:57:08', '2023-11-13 05:57:08'),
(100, '9', '+1 (453) 247-5287', '+1 (535) 437-1805', '+1 (428) 559-8359', '2023-11-13 05:57:08', '2023-11-13 05:57:08'),
(102, '10', '+1 (897) 504-1143', '+1 (517) 783-4844', '+1 (148) 329-5623', '2023-11-13 05:57:49', '2023-11-13 05:57:49'),
(103, '11', '+1 (971) 218-8021', '+1 (373) 123-6814', '+1 (238) 861-5833', '2023-11-13 06:13:17', '2023-11-13 06:13:17'),
(104, '11', '+1 (453) 247-5287', '+1 (535) 437-1805', '+1 (428) 559-8359', '2023-11-13 06:13:17', '2023-11-13 06:13:17'),
(105, '12', '+1 (897) 504-1143', '+1 (517) 783-4844', '+1 (148) 329-5623', '2023-11-13 06:13:17', '2023-11-13 06:13:17'),
(106, '13', '+1 (897) 504-1143', '+1 (517) 783-4844', '+1 (148) 329-5623', '2023-11-13 06:23:05', '2023-11-13 06:23:05'),
(108, '7', '+1 (404) 563-8903', '+1 (293) 456-2922', '+1 (782) 635-2917', '2023-11-16 06:52:40', '2023-11-16 06:52:40'),
(117, '5', '+1 (569) 153-5493', '+1 (742) 447-2504', '+1 (469) 208-2755', '2023-11-20 11:56:56', '2023-11-20 11:56:56'),
(118, '5', '+1 (479) 222-6914', '+1 (218) 365-9352', '+1 (964) 697-4014', '2023-11-20 11:56:56', '2023-11-20 11:56:56'),
(119, '14', '+923472783689', '+1 (949) 894-8496', '+1 (248) 887-9783', '2023-12-01 10:00:26', '2023-12-01 10:00:26'),
(120, '15', '+923472783689', '+1 (717) 132-9542', '+1 (208) 558-8243', '2023-12-01 10:14:57', '2023-12-01 10:14:57'),
(121, '16', '+92 (347) 278-3689', '+1 (611) 977-5099', '+1 (365) 976-5894', '2023-12-01 10:33:40', '2023-12-01 10:33:40'),
(124, '17', '+1 (971) 218-8021', '+1 (373) 123-6814', '+1 (238) 861-5833', '2023-12-04 07:33:37', '2023-12-04 07:33:37'),
(125, '17', '+1 (453) 247-5287', '+1 (535) 437-1805', '+1 (428) 559-8359', '2023-12-04 07:33:38', '2023-12-04 07:33:38'),
(126, '18', '+1 (897) 504-1143', '+1 (517) 783-4844', '+1 (148) 329-5623', '2024-01-17 06:33:21', '2024-01-17 06:33:21'),
(129, '19', '+1 (897) 504-1143', '+1 (517) 783-4844', '+1 (148) 329-5623', '2024-05-16 12:25:49', '2024-05-16 12:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `job_priority_categories`
--

CREATE TABLE `job_priority_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_priority_categories`
--

INSERT INTO `job_priority_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Myra Tran', '2023-09-11 05:26:26', '2023-09-11 05:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `job_source_categories`
--

CREATE TABLE `job_source_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_source_categories`
--

INSERT INTO `job_source_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Alfreda Strong', '2023-09-11 05:27:39', '2023-09-11 05:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `job_sub_categories`
--

CREATE TABLE `job_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job_cat_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_sub_categories`
--

INSERT INTO `job_sub_categories` (`id`, `name`, `job_cat_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Helen Collins', 1, 'Voluptate id totam', '2023-09-11 05:09:27', '2023-09-11 05:23:03'),
(2, 'Some Ho', 2, 'sdsadjsakd', '2023-09-13 10:51:28', '2023-09-13 10:52:41'),
(3, 'Something', 3, 'lscldsfksl', '2023-09-13 10:51:48', '2023-09-13 10:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `job__categories`
--

CREATE TABLE `job__categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job_sub_cat_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job__categories`
--

INSERT INTO `job__categories` (`id`, `name`, `job_sub_cat_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Neville Lewis', 1, 'Ipsum commodo natus', '2023-09-11 05:12:48', '2023-09-11 05:12:48'),
(2, 'Everything', 2, 'kfdslfksldf', '2023-09-13 10:52:09', '2023-09-13 10:52:09'),
(3, 'Something Again', 3, 'sdxkcjdslc', '2023-09-13 10:52:26', '2023-09-13 10:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `checklist_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location_inspection_checklist`
--

CREATE TABLE `location_inspection_checklist` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `inspection_checklist_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_inspection_checklist`
--

INSERT INTO `location_inspection_checklist` (`id`, `job_id`, `inspection_checklist_id`, `created_at`, `updated_at`) VALUES
(15, 5, 12, '2023-10-19 16:14:48', '2023-10-19 16:14:48'),
(16, 5, 11, '2023-10-19 16:14:48', '2023-10-19 16:14:48'),
(18, 6, 12, '2023-11-17 15:36:34', '2023-11-17 15:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `manager_attendances`
--

CREATE TABLE `manager_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manager_attendances`
--

INSERT INTO `manager_attendances` (`id`, `user_id`, `address`, `attendance`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 'V27V+M8J, Jat Land Lines, Karachi, Karachi City, Sindh, Pakistan', 'checkIn', '', '2024-02-19 10:56:03', '2024-02-20 10:56:03'),
(2, 1, 'V27V+M8J, Jat Land Lines, Karachi, Karachi City, Sindh, Pakistan', 'checkOut', '00:00:07', '2024-02-19 10:56:10', '2024-02-20 10:56:10'),
(3, 22, 'V27V+M8J, Jat Land Lines, Karachi, Karachi City, Sindh, Pakistan', 'checkIn', '', '2024-02-19 10:56:23', '2024-02-20 10:56:23'),
(4, 22, 'V27V+M8J, Jat Land Lines, Karachi, Karachi City, Sindh, Pakistan', 'checkOut', '00:00:06', '2024-02-19 10:56:29', '2024-02-20 10:56:29'),
(5, 22, 'V27V+M8J, Jat Land Lines, Karachi, Karachi City, Sindh, Pakistan', 'checkIn', '', '2024-02-19 11:16:36', '2024-02-20 11:16:36'),
(6, 22, 'V27V+M8J, Jat Land Lines, Karachi, Karachi City, Sindh, Pakistan', 'checkOut', '00:00:05', '2024-02-19 11:16:41', '2024-02-20 11:16:41'),
(9, 22, 'V27V+M8J, Jat Land Lines, Karachi, Karachi City, Sindh, Pakistan', 'checkIn', '', '2024-02-20 12:02:11', '2024-02-20 12:02:11'),
(10, 22, 'V27V+M8J, Jat Land Lines, Karachi, Karachi City, Sindh, Pakistan', 'checkOut', '00:00:09', '2024-02-20 12:02:20', '2024-02-20 12:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_06_222923_create_transactions_table', 1),
(4, '2018_11_07_192923_create_transfers_table', 1),
(5, '2018_11_15_124230_create_wallets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2021_01_30_100000_create_inventories_table', 1),
(9, '2021_11_02_202021_update_wallets_uuid_table', 1),
(10, '2022_11_17_142500_create_permission_tables', 1),
(11, '2022_11_18_154332_create_users_verify_table', 1),
(12, '2022_11_29_123506_create_country_table', 1),
(13, '2022_11_29_123754_create_state_table', 1),
(14, '2022_11_29_123812_create_city_table', 1),
(15, '2022_12_08_114205_create_general_settings_table', 1),
(16, '2023_06_23_120608_create_posts_table', 1),
(17, '2023_07_05_131852_create_work_orders_table', 1),
(18, '2023_07_05_132022_create_technicians_table', 1),
(19, '2023_07_21_103254_create_jobs_table', 1),
(20, '2023_07_25_120816_create_job__categories_table', 1),
(21, '2023_07_25_121246_create_job_source_categories_table', 1),
(22, '2023_07_25_121321_create_job_priority_categories_table', 1),
(23, '2023_07_31_142159_create_estimates_table', 1),
(24, '2023_08_01_111844_create_job_sub_categories_table', 1),
(25, '2023_08_17_150010_create_products_table', 1),
(26, '2023_08_17_160900_create_purchase_orders_table', 1),
(27, '2023_08_28_152221_create_invoices_table', 1),
(28, '2023_09_04_153945_create_check_lists_table', 1),
(29, '2023_09_04_155540_create_inspections_table', 1),
(30, '2023_09_05_124133_create_customers_table', 1),
(31, '2023_09_05_150632_customer_details', 1),
(32, '2023_09_06_142004_create_stored_services_table', 1),
(33, '2023_09_06_180253_create_primary_contacts_table', 1),
(34, '2023_09_08_125423_create_productand_services_table', 1),
(35, '2023_09_11_110301_create_job_primary_contacts_table', 1),
(36, '2023_09_11_110825_create_estimate_primary_contacts_table', 1),
(37, '2023_09_13_105130_create_inspection_checklists_table', 1),
(38, '2023_09_13_105814_create_checklist_items_table', 1),
(39, '2023_09_13_113312_create_tasks_table', 1),
(40, '2023_09_20_111631_create_problem_reportings_table', 1),
(41, '2023_09_21_115943_create_inspection_responses_table', 1),
(42, '2023_09_21_125537_create_locations_table', 1),
(43, '2023_10_02_110839_create_mood_reports_table', 1),
(44, '2023_10_04_164500_create_files_table', 1),
(45, '2023_10_05_141310_create_company_profiles_table', 1),
(46, '2023_10_05_144823_create_company_documents_table', 1),
(47, '2023_10_09_105831_create_supply_requests_table', 1),
(48, '2023_10_09_130327_create_estimate_requests_table', 1),
(49, '2023_10_19_120842_create_feedback_table', 1),
(50, '2023_10_19_144253_create_notes_table', 1),
(51, '2023_10_23_143603_create_notifications_table', 1),
(52, '2024_02_16_113703_create_job_locations_table', 1),
(53, '2024_02_19_122338_create_attendances_table', 1),
(54, '2024_02_20_153306_create_manager_attendances_table', 1),
(55, '2024_03_28_062159_create_bids_table.php', 1),
(56, '2024_05_14_165655_create_questions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 15),
(4, 'App\\Models\\User', 16),
(4, 'App\\Models\\User', 20),
(5, 'App\\Models\\User', 17),
(6, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 9),
(6, 'App\\Models\\User', 22),
(7, 'App\\Models\\User', 21),
(7, 'App\\Models\\User', 23),
(7, 'App\\Models\\User', 24);

-- --------------------------------------------------------

--
-- Table structure for table `mood_reports`
--

CREATE TABLE `mood_reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mood` int(11) NOT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mood_reports`
--

INSERT INTO `mood_reports` (`id`, `user_id`, `mood`, `comments`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'asaa', '2023-10-02 07:04:11', '2023-10-02 07:04:11'),
(2, 1, 1, 'sadsad', '2023-10-02 07:05:28', '2023-10-02 07:05:28'),
(3, 1, 5, NULL, '2023-10-02 07:13:42', '2023-10-02 07:13:42'),
(4, 1, 3, NULL, '2023-10-02 07:14:58', '2023-10-02 07:14:58'),
(5, 1, 4, NULL, '2023-10-02 07:15:03', '2023-10-02 07:15:03'),
(6, 1, 4, 'meri billi mar gyi', '2023-10-02 07:32:59', '2023-10-02 07:32:59'),
(7, 1, 5, 'ala bala', '2023-10-02 07:50:21', '2023-10-02 07:50:21'),
(8, 1, 2, 'sadad', '2023-10-02 07:51:03', '2023-10-02 07:51:03'),
(9, 22, 1, 'sasdasd', '2023-10-24 06:46:39', '2023-10-24 06:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `job_id`, `notes`, `file`, `created_at`, `updated_at`) VALUES
(1, 5, 'Voluptatibus nostrum', 'inspection/new.jpgymHbX.jpg', '2023-10-19 15:08:42', '2023-11-20 13:02:02'),
(2, 6, 'Quae dignissimos omn', NULL, '2023-11-20 11:01:09', '2023-11-20 11:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) NOT NULL,
  `data` text NOT NULL,
  `read_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('02a65fb6-9eeb-4076-ae30-f0f8d24936b2', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"Created an Invoice\"}', NULL, '2023-11-03 16:40:13', '2023-11-03 16:40:13'),
('044d8931-86b9-4d3c-85cd-811a586824ed', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 23, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"Assigned a word order# 3\"}', NULL, '2023-12-01 10:40:42', '2023-12-01 10:40:42'),
('09911b52-129b-422c-8af6-785e7aeb471c', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 23, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"invited to bid on estimate request #4. Please review the details and submit your bid.\"}', NULL, '2024-03-28 10:28:22', '2024-03-28 10:28:22'),
('0adcf600-a3a3-4c7e-a591-d75b322a9b1f', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 8, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"has placed a bid on request number 1.\"}', NULL, '2024-03-28 11:26:45', '2024-03-28 11:26:45'),
('1225cf4b-ce3a-4685-9499-bb86089e61ca', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 22, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"has placed a bid on request number 1.\"}', NULL, '2024-03-28 11:35:25', '2024-03-28 11:35:25'),
('13da4b77-ac1e-40e2-a97d-66b0a38dcafc', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"declined the Work Order# 1\"}', NULL, '2023-11-20 15:08:06', '2023-11-20 15:08:06'),
('1cb1915c-0128-4998-bc5c-f07c67417c67', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 24, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"invited you to bid on estimate request #4. Please review the details and submit your bid.\"}', NULL, '2024-04-04 07:22:23', '2024-04-04 07:22:23'),
('1d42355f-f7ef-4fe9-851f-f1dde11e8eeb', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 18, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"creats your job\'s problem report# 6\"}', NULL, '2024-05-09 18:11:39', '2024-05-09 18:11:39'),
('2c8c6bb1-7c21-4ac2-a9d9-d788a3a2f2dc', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"updated an estimate request# 4\"}', '2023-12-04 13:01:29', '2023-12-04 13:01:12', '2023-12-04 13:01:29'),
('41dcd0fe-475c-4ef1-97bf-1d9ff15a0ec3', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":19,\"name\":\"user\",\"email\":\"user@gmail.com\",\"message\":\"submitted a feedback report# 9\"}', NULL, '2024-05-14 18:52:50', '2024-05-14 18:52:50'),
('4b145a6e-26b1-42a1-95de-8d53dd39bb28', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"submitted location of job# 5 Work-order# 1. \"}', NULL, '2024-02-19 13:14:29', '2024-02-19 13:14:29'),
('50811ad8-887f-466b-9e5f-e07be3a67116', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"is on-the-way jobsite alert for the job, location:New York.\"}', NULL, '2024-01-17 12:56:51', '2024-01-17 12:56:51'),
('55339871-3b73-45cf-9d10-17899de1764e', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"Assigned a word order# 7\"}', NULL, '2024-01-17 13:02:12', '2024-01-17 13:02:12'),
('5765f3bb-c6e6-46db-8896-c2237228faf6', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 19, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"updated your Job# 17\"}', '2023-12-05 11:25:15', '2023-12-04 12:33:38', '2023-12-05 11:25:15'),
('5a8cc2e4-dd33-4f5a-8a91-c1807c2332e7', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 19, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"updated your job\'s problem report# 4\"}', '2023-12-05 11:24:50', '2023-12-05 11:19:51', '2023-12-05 11:24:50'),
('5eeb1374-aaaa-479d-89dd-aed3a03f51b7', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}', '2023-10-24 10:10:51', '2023-10-23 15:27:52', '2023-10-24 10:10:51'),
('6379941f-fa96-4d66-8ece-b38f953e97c2', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 9, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"has placed a bid on request number 1.\"}', NULL, '2024-03-28 11:26:45', '2024-03-28 11:26:45'),
('643d4f18-7d8b-4dad-b4e7-12fa56b92bfc', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"invited to bid on estimate request #4. Please review the details and submit your bid.\"}', '2024-04-04 07:08:33', '2024-04-04 07:02:18', '2024-04-04 07:08:33'),
('680d94ca-d92a-4703-a0c0-aa5e73879548', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"invited to bid on estimate request #4. Please review the details and submit your bid.\"}', NULL, '2024-03-28 10:28:22', '2024-03-28 10:28:22'),
('6c1823f1-eeb0-49e9-97bd-c6f86dc902de', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 23, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"invited to bid on estimate request #4. Please review the details and submit your bid.\"}', NULL, '2024-03-28 06:52:38', '2024-03-28 06:52:38'),
('6e051b6e-c08d-49d0-add1-710f02cf94d6', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"has approved your bid on estimate request #4.\"}', NULL, '2024-04-04 07:19:48', '2024-04-04 07:19:48'),
('7227e1d3-99b9-420f-8099-9d71f53d2d75', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 19, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"updated your Job# 19\"}', NULL, '2024-05-16 17:25:49', '2024-05-16 17:25:49'),
('72a097b4-c7a3-4cdf-8bd7-d41d68a7abd2', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"has approved your bid on estimate request #4.\"}', NULL, '2024-04-04 07:10:28', '2024-04-04 07:10:28'),
('72c58811-2b4b-450c-9054-64d197f007bf', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"Updated response of Job:{5}\"}', NULL, '2023-11-20 13:08:45', '2023-11-20 13:08:45'),
('72cde8ac-b4fc-4a89-b0ef-a90978bf82e7', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":19,\"name\":\"user\",\"email\":\"user@gmail.com\",\"message\":\"submitted a feedback report# 10\"}', NULL, '2024-05-15 18:42:25', '2024-05-15 18:42:25'),
('769e2208-4185-4b5a-94c2-a11588bac7c6', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"has placed a bid on request number 1.\"}', NULL, '2024-03-28 11:26:45', '2024-03-28 11:26:45'),
('7a800cbb-c11f-4505-97b1-18ba8c0e0c7f', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 19, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"created your Job# 19\"}', NULL, '2024-01-17 11:36:06', '2024-01-17 11:36:06'),
('7a8e1ca1-903b-44e3-b050-33f6cdb5ce2f', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"accepted the Work Order# 1\"}', NULL, '2023-11-20 15:06:54', '2023-11-20 15:06:54'),
('83617025-64ed-4ac2-a3d6-b11777d8f029', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 19, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"updated your Job# 17\"}', '2023-12-05 11:25:12', '2023-12-04 12:33:38', '2023-12-05 11:25:12'),
('84699952-4dd8-4aba-97f1-d462ba6a9499', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"updated a mood report# 5\"}', NULL, '2023-12-05 10:45:45', '2023-12-05 10:45:45'),
('8c82dd14-4b3d-45ca-b7a6-ead228b7bc39', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":19,\"name\":\"user\",\"email\":\"user@gmail.com\",\"message\":\"submitted location of job# 5 Work-order# 1. \"}', '2024-02-16 12:57:42', '2024-02-16 12:55:10', '2024-02-16 12:57:42'),
('8db79556-f7c0-423c-9bae-62118b0ce55c', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 23, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"has approved your bid on estimate request #4.\"}', NULL, '2024-04-04 07:11:50', '2024-04-04 07:11:50'),
('92dea6d9-34fb-4a2c-9403-d12babffb1d7', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 19, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"created your Job# 17\"}', '2023-12-05 11:25:09', '2023-12-04 11:28:27', '2023-12-05 11:25:09'),
('977b31ef-6146-4403-83c6-54131196aa5c', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}', '2023-10-23 16:26:05', '2023-10-23 15:21:29', '2023-10-23 16:26:05'),
('98cd8673-ad85-4def-8ff5-564bf9423d72', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"has placed a bid on request number 1.\"}', NULL, '2024-03-28 11:35:25', '2024-03-28 11:35:25'),
('99890351-e552-4196-a0c6-1cecceeccaf5', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"Assigned a word order# 3\"}', '2023-12-01 14:34:31', '2023-12-01 10:40:48', '2023-12-01 14:34:31'),
('aa94148a-2e57-4a31-a858-3b85497dc56d', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"accepted the Work Order# 3\"}', '2023-12-04 10:56:48', '2023-12-01 10:41:34', '2023-12-04 10:56:48'),
('adacc44d-4278-4a88-b67c-33eb5b336056', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"submitted location of job# 6 Work-order# 3. \"}', NULL, '2024-02-19 15:27:10', '2024-02-19 15:27:10'),
('addde16a-d71b-46aa-ad96-a63d48a407f3', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 19, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"created your Job# 18\"}', NULL, '2024-01-17 11:33:22', '2024-01-17 11:33:22'),
('b849a9cf-7a02-4376-97ca-5a44b805d241', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"submitted location of job# 6 Work-order# 3. \"}', NULL, '2024-02-19 15:27:10', '2024-02-19 15:27:10'),
('c14f5a97-21b0-4a10-a3db-53643aca7ea2', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"submitted location of job# 5 Work-order# 1. \"}', NULL, '2024-02-19 13:14:29', '2024-02-19 13:14:29'),
('c8fd7f18-992a-46a8-bfbc-cf6f04a80943', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 9, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"has placed a bid on request number 1.\"}', NULL, '2024-03-28 11:35:25', '2024-03-28 11:35:25'),
('d0f98142-cb16-4334-8ddd-0090fc218e28', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":19,\"name\":\"user\",\"email\":\"user@gmail.com\",\"message\":\"Uploaded E-Signature\"}', NULL, '2023-10-24 11:13:21', '2023-10-24 11:13:21'),
('d680cce1-b3b8-4b59-a549-82739f42fecd', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":19,\"name\":\"user\",\"email\":\"user@gmail.com\",\"message\":\"Uploaded E-Signature\"}', NULL, '2024-05-15 17:51:13', '2024-05-15 17:51:13'),
('d7624870-4c45-4b4c-9fa7-fe25c2417d8e', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 19, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"updated your Job# 19\"}', NULL, '2024-05-16 17:22:05', '2024-05-16 17:22:05'),
('d8ab2e9e-e3bf-46ce-a02b-14bd831d09ee', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 22, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"has placed a bid on request number 1.\"}', NULL, '2024-03-28 11:26:45', '2024-03-28 11:26:45'),
('df96cdee-78de-4a8a-9230-8b54364634c3', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}', '2023-11-20 13:09:13', '2023-10-23 15:40:16', '2023-11-20 13:09:13'),
('e2d3211a-a579-4cbb-8677-60374e196f05', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"invited to bid on estimate request #4. Please review the details and submit your bid.\"}', '2024-03-28 08:21:02', '2024-03-28 06:52:38', '2024-03-28 08:21:02'),
('e9179f27-8b75-4cbf-a76f-5d693348fc13', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":19,\"name\":\"user\",\"email\":\"user@gmail.com\",\"message\":\"submitted location of job# 5 Work-order# 1. \"}', '2024-02-16 12:56:17', '2024-02-16 12:55:10', '2024-02-16 12:56:17'),
('f25e0ba9-6cf2-4a37-a077-484ec79966e2', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 8, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"has placed a bid on request number 1.\"}', NULL, '2024-03-28 11:35:25', '2024-03-28 11:35:25'),
('f2747d50-1fde-46df-a128-62128da9ad21', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"Assigned a word order# {$work->id}\"}', NULL, '2023-12-01 10:35:35', '2023-12-01 10:35:35'),
('f2d3e386-784e-4d06-a528-f921d6021871', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"updated your problem report# 4\"}', NULL, '2023-12-05 11:19:51', '2023-12-05 11:19:51'),
('f8cae979-a735-4bf2-9047-a3ba5d83fef9', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 21, '{\"user_id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"message\":\"invited you to bid on estimate request #1. Please review the details and submit your bid.\"}', NULL, '2024-05-13 18:20:19', '2024-05-13 18:20:19'),
('fde2dd0e-fc67-4179-99fb-ac7460f885ea', 'App\\Notifications\\UserNotification', 'App\\Models\\User', 1, '{\"user_id\":21,\"name\":\"Arsenio Goff\",\"email\":\"vendor@mailinator.com\",\"message\":\"Updated response of Job#5\"}', NULL, '2023-11-20 14:12:26', '2023-11-20 14:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(2, 'role-create', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(3, 'role-edit', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(4, 'role-delete', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(5, 'user-list', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(6, 'user-create', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(7, 'user-edit', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(8, 'user-delete', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(9, 'permission-list', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(10, 'permission-create', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(11, 'permission-edit', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(12, 'permission-delete', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(13, 'change-password', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(14, 'package-list', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(15, 'package-create', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(16, 'package-edit', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(17, 'package-delete', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(18, 'category-list', 'web', '2023-09-06 07:14:38', '2023-09-06 07:14:38'),
(19, 'category-create', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(20, 'category-edit', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(21, 'category-delete', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(22, 'subcategory-list', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(23, 'subcategory-create', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(24, 'subcategory-edit', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(25, 'subcategory-delete', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(26, 'product-list', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(27, 'product-create', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(28, 'product-edit', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(29, 'product-delete', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(30, 'pages-list', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(31, 'pages-create', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(32, 'pages-edit', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(33, 'pages-delete', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(34, 'general_setting', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', 'b5d859c53dcccab4edd21e2f0c3231d69712cf45edd4d991ef49ebd59ea0d4f5', '[\"*\"]', NULL, NULL, '2024-01-04 07:28:32', '2024-01-04 07:28:32'),
(2, 'App\\Models\\User', 1, 'authToken', 'cef142dbcae511ca2aa0b85fff0998d74438d701b7464cb0c4186736b299569e', '[\"*\"]', NULL, NULL, '2024-01-04 07:34:12', '2024-01-04 07:34:12'),
(3, 'App\\Models\\User', 1, 'authToken', 'fc6043eac942158a0c889c1b58bd5cc64cb643807480d6adf470e14e52e28324', '[\"*\"]', NULL, NULL, '2024-01-04 07:41:28', '2024-01-04 07:41:28'),
(4, 'App\\Models\\User', 1, 'authToken', '51ea8325bc5651b5bc1dcae29f92b0bee92516940ee1d5785ce08be6d4a52ce1', '[\"*\"]', NULL, NULL, '2024-01-04 07:48:32', '2024-01-04 07:48:32'),
(5, 'App\\Models\\User', 1, 'authToken', '40366ce09232cbe8a95bd99a4ffe05557002a64daaa6d9b534cc49789520fbe9', '[\"*\"]', NULL, NULL, '2024-01-04 07:49:49', '2024-01-04 07:49:49'),
(6, 'App\\Models\\User', 1, 'authToken', '6f6f1978caa6b94db9afeff89bd5d4657ccd8144e331a33a0c3e7f8f623f9dec', '[\"*\"]', NULL, NULL, '2024-01-04 07:52:17', '2024-01-04 07:52:17'),
(7, 'App\\Models\\User', 1, 'authToken', '9982be9fcde400d465cc1f37d487d9e256be16450fa931b1176111dbd42532a1', '[\"*\"]', NULL, NULL, '2024-01-04 08:00:28', '2024-01-04 08:00:28'),
(8, 'App\\Models\\User', 1, 'authToken', '54bcd1b39d80875bada2cb5ecf6ed5b3abe45c3cf652802c3ffcd076087a674a', '[\"*\"]', NULL, NULL, '2024-01-04 08:00:57', '2024-01-04 08:00:57'),
(9, 'App\\Models\\User', 1, 'authToken', '3f864d6883e1a915bef0e46b2e4a6c8c6ae7b1e63bcaeaede26b4f817cfb9483', '[\"*\"]', NULL, NULL, '2024-01-04 08:01:24', '2024-01-04 08:01:24'),
(10, 'App\\Models\\User', 1, 'authToken', 'e63e6195e3718698d2f07cc6d93f11ccb9c93660f11d9d1638b22708efbab354', '[\"*\"]', NULL, NULL, '2024-01-04 08:03:26', '2024-01-04 08:03:26'),
(11, 'App\\Models\\User', 1, 'authToken', 'd0318c9560d2a88ac9008f5a147abfbfaaed694394d3882326ffcdd26fd2d4cd', '[\"*\"]', NULL, NULL, '2024-01-04 08:04:35', '2024-01-04 08:04:35'),
(12, 'App\\Models\\User', 1, 'authToken', 'b325eef9456d6cca6b5f60692f66d05b547d3300efd8f14faaf5b71689e3d1e6', '[\"*\"]', NULL, NULL, '2024-01-04 08:05:28', '2024-01-04 08:05:28'),
(13, 'App\\Models\\User', 1, 'authToken', 'a8b32747e7c9dba1c3724181177d692c9933ac0c73a85b1e00f9f7765094c565', '[\"*\"]', NULL, NULL, '2024-01-04 08:06:05', '2024-01-04 08:06:05'),
(14, 'App\\Models\\User', 1, 'authToken', '35c57ff7f0f0171bc45a250f37702a6b57a1fc1d27a7f1267a4bb61198d189f9', '[\"*\"]', NULL, NULL, '2024-01-04 09:14:38', '2024-01-04 09:14:38'),
(15, 'App\\Models\\User', 1, 'authToken', 'c4894200ee2c27c7028f315386509e9ecd907051632d5de653cfee10bc769bc8', '[\"*\"]', NULL, NULL, '2024-01-04 09:27:40', '2024-01-04 09:27:40'),
(16, 'App\\Models\\User', 1, 'authToken', '59a0af71c332cac6fbd0133a1a48c3d5e7be0aaef0e0264f36cd6962b383f8c0', '{\"roles\":[\"Admin\"]}', '2024-01-04 11:01:29', NULL, '2024-01-04 09:33:59', '2024-01-04 11:01:29'),
(17, 'App\\Models\\User', 1, 'authToken', 'e66ff58a4f8b43eb5b9ecd54b75b5af8f8449dacbf162f3722a23a781d6b7af9', '[[\"Admin\"]]', NULL, NULL, '2024-01-04 10:04:49', '2024-01-04 10:04:49'),
(18, 'App\\Models\\User', 1, 'authToken', '34212d8dcaa8a863574497110479436af172135fcb56e3a23ad53c54bfacf33e', '[[\"Admin\"]]', NULL, NULL, '2024-01-04 10:57:53', '2024-01-04 10:57:53'),
(19, 'App\\Models\\User', 1, 'authToken', '2c3696c3e8f1dffea6b56832ac6f2601f60ee9ff4ba34f853b9c5a0efbd125ed', '[\"[\\\"Admin\\\"]\"]', NULL, NULL, '2024-01-04 10:58:59', '2024-01-04 10:58:59'),
(20, 'App\\Models\\User', 1, 'authToken', '099fb213c0076533524b996de868feba56620ca4431584de448a4f1da044f8dd', '[\"Admin\"]', '2024-01-04 11:02:03', NULL, '2024-01-04 11:00:51', '2024-01-04 11:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `primary_contacts`
--

CREATE TABLE `primary_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone_type` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `ext` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `email_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `primary_contacts`
--

INSERT INTO `primary_contacts` (`id`, `customer_id`, `fname`, `lname`, `phone_type`, `number`, `ext`, `department`, `job_title`, `email_type`, `email`, `created_at`, `updated_at`) VALUES
(1, 8, 'Quinn', 'Tyson', 'telephone', '+1 (488) 339-3165', '+1 (478) 347-5634', 'Aut sunt omnis volup', 'Lorem modi qui molli', 'company', 'bipeqazawa@mailinator.com', '2023-09-07 05:29:19', '2023-09-07 05:29:19'),
(2, 8, 'Blair', 'Maynard', 'telephone', '+1 (334) 125-9092', '+1 (361) 456-8932', 'Dolorem maiores qui', 'Eveniet consequuntu', 'personal', 'caciwaxu@mailinator.com', '2023-09-07 05:29:19', '2023-09-07 05:29:19'),
(3, 9, 'Scarlet', 'Nash', 'mobile', '+1 (668) 669-5015', '+1 (982) 167-6823', 'Doloribus corrupti', 'Tempore in quo aliq', 'personal', 'holikite@mailinator.com', '2023-09-07 05:35:22', '2023-09-07 05:35:22'),
(4, 10, 'Lionel', 'Leonard', 'telephone', '+1 (847) 205-3377', '+1 (518) 557-7307', 'Rem et laboriosam i', 'Ipsam ut consequatur', 'personal', 'nalyp@mailinator.com', '2023-09-07 05:35:55', '2023-09-07 05:35:55'),
(55, 4, 'Germaine', 'Carrillo', 'telephone', '+1 (729) 465-7669', '+1 (122) 383-8587', 'Qui placeat vero di', 'Voluptate fugit ear', 'personal', 'hixyt@mailinator.com', '2023-09-07 09:37:41', '2023-09-07 09:37:41'),
(56, 11, NULL, NULL, '', NULL, NULL, NULL, NULL, 'personal', NULL, '2023-09-07 09:38:39', '2023-09-07 09:38:39'),
(63, 12, 'Felicia', 'Fuentes', '', '+1 (305) 671-2236', '+1 (559) 147-2712', 'Eius aspernatur ab n', 'Dolor illum fuga E', 'personal', 'nytevyqe@mailinator.com', '2023-09-07 10:07:16', '2023-09-07 10:07:16'),
(65, 13, 'Jaime', 'Shields', '', '+1 (623) 379-6594', '+1 (913) 131-7892', 'In explicabo Vel nu', 'Ab anim est sint por', 'personal', 'wovugodon@mailinator.com', '2023-09-08 08:26:10', '2023-09-08 08:26:10'),
(68, 14, 'Hilary', 'Gates', 'telephone', '+1 (741) 399-7059', '+1 (859) 259-6417', 'Soluta quisquam qui', 'In ex est ut modi ex', 'company', 'jowy@mailinator.com', '2023-12-05 07:57:07', '2023-12-05 07:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `problem_reportings`
--

CREATE TABLE `problem_reportings` (
  `id` int(11) NOT NULL,
  `job` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `location_supervisor` varchar(255) DEFAULT NULL,
  `problem_details` text DEFAULT NULL,
  `problem_date` date DEFAULT NULL,
  `type_of_problem` varchar(255) DEFAULT NULL,
  `description_of_problem` text DEFAULT NULL,
  `investigator_of_problem` varchar(255) DEFAULT NULL,
  `result_of_investigation` text DEFAULT NULL,
  `suggestions` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problem_reportings`
--

INSERT INTO `problem_reportings` (`id`, `job`, `createdBy`, `location`, `location_supervisor`, `problem_details`, `problem_date`, `type_of_problem`, `description_of_problem`, `investigator_of_problem`, `result_of_investigation`, `suggestions`, `created_at`, `updated_at`) VALUES
(4, '7', '21', 'Sed voluptatibus mol', 'Deleniti repellendus', 'At aut iusto sint bl', '2000-07-08', 'medium', 'Qui ut quia reprehen', 'Alias aliquam volupt', 'Adipisicing aut adip', 'Esse accusantium ev', '2023-09-20 07:49:59', '2023-12-05 11:19:44'),
(5, '5', '21', 'Et excepteur saepe v', 'Deserunt debitis seq', 'Quam animi labore l', '2005-04-08', 'critical', 'Magni ab dolorum nes', 'Sit aut vero molest', 'Nesciunt quod esse', 'Laborum Qui blandit', '2023-10-20 05:53:03', '2023-10-20 06:17:57'),
(6, '16', '1', 'Deserunt consequatur', 'Ut fuga A id aliqui', NULL, '1979-09-27', 'low', 'In dolore quisquam d', 'Nobis consequatur P', 'Do nulla explicabo', 'Do quo temporibus ma', '2024-05-09 13:11:37', '2024-05-09 13:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `productand_services`
--

CREATE TABLE `productand_services` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `warehouse` varchar(255) DEFAULT NULL,
  `qty_hrs` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `margin_tax` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productand_services`
--

INSERT INTO `productand_services` (`id`, `invoice_id`, `description`, `warehouse`, `qty_hrs`, `rate`, `total`, `cost`, `margin_tax`, `created_at`, `updated_at`) VALUES
(6, 6, 'Eius est est tempor', 'Ut proident esse co', '633', '47', '29870.00', '33', '86', '2023-09-08 09:27:49', '2023-09-15 11:29:59'),
(14, 8, 'Nemo laudantium ut', 'Deleniti labore ut u', '368', '90', '33178.00', '25', '33', '2023-09-15 07:29:24', '2023-09-15 07:29:24'),
(22, 7, 'Cillum dolor aut sit', 'Quia qui officia con', '85', '100', '8606.00', '90', '16', '2023-10-05 06:40:56', '2023-10-05 06:40:56'),
(23, 9, 'Dolorem ea aut porro', 'Laboris iure vero cu', '445', '93', '41470.00', '74', '11', '2023-10-05 08:57:23', '2023-10-05 08:57:23'),
(24, 9, 'In eos impedit cul', 'Voluptas sit aliquam', '786', '39', '30694.00', '11', '29', '2023-10-05 08:57:23', '2023-10-05 08:57:23'),
(31, 10, 'Consequuntur est di', 'Sit ut eaque laborio', '974', '40', '39009.00', '27', '22', '2023-11-03 11:06:31', '2023-11-03 11:06:31'),
(33, 12, 'Nisi delectus elit', 'Et nostrum velit rec', '148', '53', '7998.00', '70', '84', '2023-11-03 11:40:13', '2023-11-03 11:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `order_ref` int(11) DEFAULT NULL,
  `order_progress` varchar(255) DEFAULT NULL,
  `payment_term` varchar(255) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `memo_id` varchar(255) DEFAULT NULL,
  `ship_option` varchar(255) DEFAULT NULL,
  `sent_date` date DEFAULT NULL,
  `receipt_status` varchar(255) DEFAULT NULL,
  `direct_shipping` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `apt` varchar(255) DEFAULT NULL,
  `tampa` varchar(255) DEFAULT NULL,
  `fl` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `jobs_id` varchar(255) DEFAULT NULL,
  `receipt` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `tax_paid` varchar(255) DEFAULT NULL,
  `ship_cost` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `supplier`, `order_ref`, `order_progress`, `payment_term`, `order_date`, `sender`, `memo_id`, `ship_option`, `sent_date`, `receipt_status`, `direct_shipping`, `location`, `street`, `apt`, `tampa`, `fl`, `num`, `item_name`, `qty`, `unit_price`, `total`, `jobs_id`, `receipt`, `description`, `subtotal`, `discount`, `tax_paid`, `ship_cost`, `grand_total`, `created_at`, `updated_at`) VALUES
(2, '2', 16, 'Close', 'Paypal', '1973-01-03', 'Self', '90', 'Adipisci omnis atque', '1970-07-14', 'Received', '07-Jan-2018', 'Marny Schroeder', 'Id dolorem eu atque', 'Corporis assumenda p', 'Ut cupidatat et ut u', 'Eiusmod ex architect', 'Exercitationem quam', 'farazsdas', '764', '77', '455', 'Rhona Rocha', 'Anne Holcomb', 'Eum incidunt ut tem', NULL, NULL, NULL, NULL, NULL, '2023-09-07 11:46:14', '2024-05-07 11:27:37'),
(3, '0', 88, 'Open', 'Stripe', '2001-10-16', 'Not Sent', '69', 'Aliquip similique su', '2013-03-03', 'Received', '07-Apr-1981', 'Iona Wynn', 'Earum adipisci fugia', 'Proident inventore', 'Labore vel possimus', 'Suscipit quaerat ill', 'Fuga Ex officia har', 'Mari Mccullough', '10', '65', '588', 'Alfreda Norris', 'Colleen Bass', 'Magna voluptatem obc', NULL, NULL, NULL, NULL, NULL, '2023-09-07 12:01:10', '2023-09-07 12:01:10'),
(4, '2', 58, 'Close', 'Paypal', '1997-03-11', 'Not Sent', '60', 'Iure voluptatem Vel', '2016-12-09', 'Not Received', '12-Dec-1997', 'Hanae Vega', 'Ut enim sit aliquam', 'Id optio laudantium', 'Aut aspernatur nisi', 'Non aliquip non nesc', 'Vel quia molestias a', 'Jenette Melendez', '125', '592', '789', 'Portia Burgess', 'Regina Weeks', 'Cillum soluta et max', NULL, NULL, NULL, NULL, NULL, '2023-09-07 12:02:00', '2023-09-07 12:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `created_at`, `updated_at`) VALUES
(1, 'HI', NULL, NULL),
(2, 'New', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `job_id`, `question_id`, `rating`, `created_at`, `updated_at`) VALUES
(4, 21, 5, 1, 2, '2024-05-14 13:52:50', '2024-05-14 13:52:50'),
(5, 21, 5, 2, 3, '2024-05-14 13:52:50', '2024-05-14 13:52:50'),
(6, 21, 14, 1, 6, '2024-05-15 13:42:25', '2024-05-15 13:42:25'),
(7, 21, 14, 2, 9, '2024-05-15 13:42:25', '2024-05-15 13:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(2, 'User', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(3, 'Shopper', 'web', '2023-09-06 07:14:39', '2023-09-06 07:14:39'),
(4, 'customer', 'web', '2023-09-06 07:18:24', '2023-09-06 07:18:24'),
(5, 'agent', 'web', '2023-09-11 05:30:33', '2023-09-11 05:30:33'),
(6, 'account manager', 'web', '2023-09-12 06:03:08', '2023-09-12 06:03:08'),
(7, 'vendor', 'web', '2023-09-20 05:55:23', '2023-09-20 05:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stored_services`
--

CREATE TABLE `stored_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `primary` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `contact_type` varchar(255) DEFAULT NULL,
  `active_service` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `aptNo` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supply_requests`
--

CREATE TABLE `supply_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `createdBy` int(11) NOT NULL,
  `order_progress` varchar(255) NOT NULL,
  `order_ref` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `po_num` varchar(255) NOT NULL,
  `manager_email` varchar(255) NOT NULL,
  `sent_date` date NOT NULL,
  `receipt_status` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `apt` varchar(255) NOT NULL,
  `tampa` varchar(255) NOT NULL,
  `fl` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `jobs_id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supply_requests`
--

INSERT INTO `supply_requests` (`id`, `createdBy`, `order_progress`, `order_ref`, `order_date`, `po_num`, `manager_email`, `sent_date`, `receipt_status`, `location`, `street`, `apt`, `tampa`, `fl`, `num`, `item_name`, `qty`, `jobs_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 21, 'Open', '24eb3ba7-4c8d-45d8-b6c0-c8b78d894da7', '2014-04-29', '100', 'dopyl@mailinator.com', '1985-04-13', 'Not Received', 'Erasmus Daugherty', 'Ratione enim tempore', 'Quis qui vero dolore', 'Qui ut beatae sunt', 'Perferendis ullam sa', 'Voluptatem commodo f', 'Judith Cohen', 816, 'Jelani Short', 'Amet sint reprehend', '2023-10-09 06:18:40', '2023-10-09 06:57:29'),
(3, 21, 'Close', '95d40003-2385-4190-803b-8eaabf88616f', '2007-02-04', '3', 'wuzajug@mailinator.com', '1999-02-03', 'Received', 'John Warren', 'Minima quis soluta d', 'Voluptatem qui volup', 'Commodo dolores dolo', 'Exercitation magna s', 'Fugiat voluptatum e', 'Alexandra Stein', 853, 'Chloe Figueroa', 'Vel ullamco molestia', '2023-10-09 07:12:17', '2023-10-09 07:12:17'),
(4, 19, 'Open', 'ab8d5d3d-1466-409b-b43f-7477c20675ed', '2014-09-23', '88', 'vybezojeli@mailinator.com', '1981-02-04', 'Not Received', 'Whitney Cannon', 'In ut aliquid provid', 'Id et accusamus quis', 'Aliquip alias repudi', 'Ex veniam nihil ut', 'Ea cupidatat anim cu', 'MacKensie Murray', 285, 'Leslie Chambers', 'Accusantium voluptat', '2023-10-09 07:32:35', '2023-10-09 07:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `due_date` datetime NOT NULL,
  `assignment` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `job_id`, `manager_id`, `user_id`, `due_date`, `assignment`, `description`, `created_at`, `updated_at`) VALUES
(2, 5, 8, 19, '2023-11-09 15:35:21', '', 'Qui libero dolore au', '2023-09-13 07:22:53', '2023-11-16 06:53:33'),
(3, 7, 9, 19, '2023-11-08 15:35:29', '', 'Fugiat tempore par', '2023-09-13 07:50:23', '2023-11-03 10:35:32'),
(4, 5, 8, 18, '1987-02-24 10:16:00', 'Voluptas sint conseq', 'Culpa atque irure q', '2023-11-03 05:43:01', '2023-11-03 05:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone_type` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `ext` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `email_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `contact_type` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `aptNo` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`id`, `fname`, `lname`, `phone_type`, `number`, `ext`, `department`, `job_title`, `email_type`, `email`, `billing_address`, `contact_type`, `active`, `address`, `aptNo`, `city`, `state`, `zip`, `created_at`, `updated_at`) VALUES
(1, 'Francesca', 'Foley', 'mobile', '+1 (855) 355-1159', '+1 (637) 731-1286', 'Ut eum aut deserunt', 'Sit mollitia in id d', 'company', 'sivukyby@mailinator.com', 'yes', 'contact 2', 'no', 'Laboris', 'Velit velit irure r', 'A incididunt blandit', 'Libero qui in eligen', '89171', '2023-11-03 07:00:03', '2023-11-03 07:06:34'),
(2, 'Judith Brown', 'Cooley', 'telephone', '+1 (661) 131-8797', '+1 (434) 481-9994', 'Assumenda autem hic', 'Ea Nam nisi consecte', 'personal', 'balipi@mailinator.com', 'no', 'contact 2', 'yes', 'Quis et amet conseq', 'Consequat Ut in duc', 'Id adipisci ipsam si', 'Dolorum velit sint', '70947', '2024-05-06 11:41:03', '2024-05-06 11:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payable_type` varchar(255) NOT NULL,
  `payable_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('deposit','withdraw') NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `uuid` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_type` varchar(255) NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_type` varchar(255) NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') DEFAULT NULL,
  `deposit_id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT 0,
  `fee` decimal(64,0) NOT NULL DEFAULT 0,
  `uuid` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_email_verified`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '2023-09-06 07:14:39', '$2y$10$W1nQaDo3vn9cn37AgQAVVeRKbfuFlmbZ14oVK08VTZ8Z0/IRRAbyy', NULL, '2023-09-06 07:14:39', '2023-09-06 07:14:39', 0),
(3, 'Freya Ashley', 'hemapo@mailinator.com', NULL, NULL, '$2y$10$lTpuO5LzTi/wsDV8yK0ANOqQwDe9kxrLar53mT1zOUyigFTVKI6DW', NULL, '2023-09-06 07:19:30', '2023-09-06 07:19:30', 0),
(4, 'Amela Curry', 'xevafaha@mailinator.com', NULL, NULL, '$2y$10$BI.BfEeaOJsjqId01N6HOOhtf4vylaMJd71/FPVSRlEimGBNKSCju', NULL, '2023-09-06 07:27:24', '2023-09-06 07:27:24', 0),
(5, 'faraz Dennis', 'hetilu@mailinator.com', NULL, NULL, '$2y$10$va4MiZrOdq5EGvZ6eoVQZuTGkzQNjYhJalwt2ts7e8NKi2Fzm5YFW', NULL, '2023-09-06 08:25:11', '2023-09-07 09:37:41', 0),
(6, 'Naida Chang', 'nubuf@mailinator.com', NULL, NULL, '$2y$10$SZ2mq35gFINg2u0vsM/41OZbFQgFHk2Havj1BZTURaWYB1MJvAqky', NULL, '2023-09-06 09:31:25', '2023-09-06 09:31:25', 0),
(8, 'Prescott Fitzgerald', 'saroc@mailinator.com', NULL, NULL, '$2y$10$2YXa5sM.WU2AL4Jb1gyjc.kvdeK.EO9d9rPgW/NGiFJybntdswkZq', NULL, '2023-09-07 05:29:18', '2023-09-12 06:28:11', 0),
(9, 'Unity Peters', 'somamum@mailinator.com', NULL, NULL, '$2y$10$RlWoeArvmprEoJYXOBT7Cu5PJawu23NV.NI66lbzmfW0GnMN5rYK.', NULL, '2023-09-07 05:35:22', '2023-09-12 06:21:33', 0),
(11, 'Hayley Blair', 'hunaned@mailinator.com', NULL, NULL, '$2y$10$QtEzaVh9sXjYpNGmB3./Kur7NIUMsEKsw6mesD6Yvfg3YKrGYv5Bq', NULL, '2023-09-07 05:38:42', '2023-09-07 05:38:42', 0),
(16, 'Maris Horn', 'jodazeb@mailinator.com', NULL, NULL, '$2y$10$nhNHNrX2xOoP9soE0sUWO.n8aYYjqsMdjVg.6Z3HoOm00pYaXvJ0q', NULL, '2023-09-07 09:57:13', '2023-09-07 10:05:57', 0),
(17, 'Blaine Richard', 'xykugefu@mailinator.com', NULL, NULL, '$2y$10$Dlv/mqfd/8hEyf6t2KK/D.hcCNGUUMOPd.MW7AgPHkGX5ZRjL/b4q', NULL, '2023-09-08 08:24:59', '2023-09-11 05:30:53', 0),
(18, 'Vincent Foreman', 'viqejunuqa@mailinator.com', NULL, NULL, '$2y$10$stzXSyIbHnfphyMhFAFEWuWWVYo88MrJncP1/TVA1ZWViDWmpfWPC', NULL, '2023-09-13 07:05:22', '2023-09-13 07:05:22', 0),
(19, 'user', 'user@gmail.com', '+923472783689', NULL, '$2y$10$CMii9oZ79nun5FRuIQxAlekxwaPh0rKFKTC.tmNj.kh5wNrTpSNHi', NULL, '2023-09-13 07:05:29', '2024-01-17 06:25:58', 0),
(20, 'Pandora Scott', 'moxypezuhy@mailinator.com', NULL, NULL, '$2y$10$G41b8DVvYXWfRm8/FbLdz.sgzFH1Z4rRX5VpNt2FSGfB5clmVV92.', NULL, '2023-09-18 05:24:49', '2023-09-18 05:24:49', 0),
(21, 'Arsenio Goff', 'vendor@mailinator.com', NULL, NULL, '$2y$10$T.xVzkajmtbt8c9AM8vJ1OqhL4WkxDrs9XxylURasQPFB6yPcWAF.', NULL, '2023-09-20 05:55:52', '2023-09-20 05:55:52', 0),
(22, 'Arsenio Goff', 'manager@gmail.com', NULL, NULL, '$2y$10$4Yn8fV3I0/rBbGPyyQ.rRORMyqpVYyL5x0NXkt96646XTgo5ksvAS', NULL, '2023-09-21 06:28:41', '2023-09-21 06:28:41', 0),
(23, 'Emery Fleming', 'kukynysyha@mailinator.com', NULL, NULL, '$2y$10$dzCQcu0nSkuFTCUjcrpyEuNix5tz4oJfuuLo4HzNCSCpHbwVylXhS', NULL, '2023-10-04 08:19:13', '2023-10-04 08:19:13', 0),
(24, 'Noelani Williams', 'pino@mailinator.com', NULL, NULL, '$2y$10$YwBL/wtKYFw9.29p0jHd1eZug1UN67.SbXbB19L4uMnVEWiEOYoXy', NULL, '2023-10-05 05:34:20', '2023-10-05 05:34:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

CREATE TABLE `users_verify` (
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_type` varchar(255) NOT NULL,
  `holder_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `uuid` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `balance` decimal(64,0) NOT NULL DEFAULT 0,
  `decimal_places` smallint(5) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_orders`
--

CREATE TABLE `work_orders` (
  `id` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `job_id` varchar(255) NOT NULL,
  `vendor_id` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `deadline` date NOT NULL,
  `payment_info` varchar(255) DEFAULT '---',
  `notes` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_orders`
--

INSERT INTO `work_orders` (`id`, `priority`, `job_id`, `vendor_id`, `status`, `deadline`, `payment_info`, `notes`, `created_at`, `updated_at`) VALUES
(1, 3, '5', '21', 'accepted', '2023-10-28', '---', 'sadsadsa', '2023-10-04 11:22:19', '2024-01-17 15:58:05'),
(3, 2, '6', '21', 'accepted', '1990-07-19', '---', NULL, '2023-10-04 11:37:24', '2024-01-17 15:58:15'),
(7, 1, '14', '21', 'pending', '2024-01-17', '---', NULL, '2024-01-17 13:02:12', '2024-01-17 15:58:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bids_user_id_foreign` (`user_id`);

--
-- Indexes for table `checklist_items`
--
ALTER TABLE `checklist_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_lists`
--
ALTER TABLE `check_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_documents`
--
ALTER TABLE `company_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimates`
--
ALTER TABLE `estimates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate_primary_contacts`
--
ALTER TABLE `estimate_primary_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate_requests`
--
ALTER TABLE `estimate_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_categories`
--
ALTER TABLE `inspection_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_checklists`
--
ALTER TABLE `inspection_checklists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_responses`
--
ALTER TABLE `inspection_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_primary_contacts`
--
ALTER TABLE `job_primary_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_priority_categories`
--
ALTER TABLE `job_priority_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_source_categories`
--
ALTER TABLE `job_source_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_sub_categories`
--
ALTER TABLE `job_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job__categories`
--
ALTER TABLE `job__categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_inspection_checklist`
--
ALTER TABLE `location_inspection_checklist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inspection_checklist_id` (`inspection_checklist_id`);

--
-- Indexes for table `manager_attendances`
--
ALTER TABLE `manager_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mood_reports`
--
ALTER TABLE `mood_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_contacts`
--
ALTER TABLE `primary_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem_reportings`
--
ALTER TABLE `problem_reportings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productand_services`
--
ALTER TABLE `productand_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stored_services`
--
ALTER TABLE `stored_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_requests`
--
ALTER TABLE `supply_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_uuid_unique` (`uuid`),
  ADD KEY `transactions_payable_type_payable_id_index` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_payable_id_ind` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_ind` (`payable_type`,`payable_id`,`type`),
  ADD KEY `payable_confirmed_ind` (`payable_type`,`payable_id`,`confirmed`),
  ADD KEY `payable_type_confirmed_ind` (`payable_type`,`payable_id`,`type`,`confirmed`),
  ADD KEY `transactions_type_index` (`type`),
  ADD KEY `transactions_wallet_id_foreign` (`wallet_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transfers_uuid_unique` (`uuid`),
  ADD KEY `transfers_from_type_from_id_index` (`from_type`,`from_id`),
  ADD KEY `transfers_to_type_to_id_index` (`to_type`,`to_id`),
  ADD KEY `transfers_deposit_id_foreign` (`deposit_id`),
  ADD KEY `transfers_withdraw_id_foreign` (`withdraw_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_holder_type_holder_id_slug_unique` (`holder_type`,`holder_id`,`slug`),
  ADD UNIQUE KEY `wallets_uuid_unique` (`uuid`),
  ADD KEY `wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  ADD KEY `wallets_slug_index` (`slug`);

--
-- Indexes for table `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checklist_items`
--
ALTER TABLE `checklist_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `check_lists`
--
ALTER TABLE `check_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_documents`
--
ALTER TABLE `company_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `company_profiles`
--
ALTER TABLE `company_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `estimates`
--
ALTER TABLE `estimates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `estimate_primary_contacts`
--
ALTER TABLE `estimate_primary_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `estimate_requests`
--
ALTER TABLE `estimate_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inspection_categories`
--
ALTER TABLE `inspection_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inspection_checklists`
--
ALTER TABLE `inspection_checklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inspection_responses`
--
ALTER TABLE `inspection_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `job_locations`
--
ALTER TABLE `job_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_primary_contacts`
--
ALTER TABLE `job_primary_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `job_priority_categories`
--
ALTER TABLE `job_priority_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_source_categories`
--
ALTER TABLE `job_source_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_sub_categories`
--
ALTER TABLE `job_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job__categories`
--
ALTER TABLE `job__categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_inspection_checklist`
--
ALTER TABLE `location_inspection_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `manager_attendances`
--
ALTER TABLE `manager_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `mood_reports`
--
ALTER TABLE `mood_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `primary_contacts`
--
ALTER TABLE `primary_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `problem_reportings`
--
ALTER TABLE `problem_reportings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productand_services`
--
ALTER TABLE `productand_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stored_services`
--
ALTER TABLE `stored_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supply_requests`
--
ALTER TABLE `supply_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checklist_items`
--
ALTER TABLE `checklist_items`
  ADD CONSTRAINT `checklist_items_ibfk_1` FOREIGN KEY (`inspection_checklist_id`) REFERENCES `inspection_checklists` (`id`);

--
-- Constraints for table `location_inspection_checklist`
--
ALTER TABLE `location_inspection_checklist`
  ADD CONSTRAINT `location_inspection_checklist_ibfk_1` FOREIGN KEY (`inspection_checklist_id`) REFERENCES `inspection_checklists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `manager_attendances`
--
ALTER TABLE `manager_attendances`
  ADD CONSTRAINT `manager_attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_deposit_id_foreign` FOREIGN KEY (`deposit_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_withdraw_id_foreign` FOREIGN KEY (`withdraw_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
