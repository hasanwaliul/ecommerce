-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 08:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` bigint(20) UNSIGNED NOT NULL,
  `banner_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_subtitle_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_subtitle_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_title_en`, `banner_title_bn`, `banner_subtitle_en`, `banner_subtitle_bn`, `banner_slug_en`, `banner_slug_bn`, `banner_img`, `banner_status`, `created_at`, `updated_at`) VALUES
(1, 'New Offers', 'নতুন অফার', '25% Discount On Babies Products', 'শিশুদের পণ্যের উপর 25% ছাড়', 'new-offers', 'নতুন-অফার', 'uploads/banner/1746921288471847.jpeg', 1, '2022-10-17 03:29:12', '2022-11-04 04:01:58'),
(2, NULL, NULL, NULL, NULL, '', '', 'uploads/banner/1746921260285620.jpg', 1, '2022-10-17 03:38:08', '2022-11-04 04:01:55'),
(7, '11 11 Big Sale', '১১ ১১ এর বড় বেচাকেনা', 'Novembers 11 11 Big Sale', 'নভেম্বর মাসের ১১ ১১ এর বড় বেচাকেনা', '11-11-big-sale', '১১-১১-এর-বড়-বেচাকেনা', 'uploads/banner/1748537471484742.jpg', 1, '2022-11-04 04:04:57', '2022-11-04 04:14:37'),
(8, 'New Year Dhamaka', 'নতুন বছরের ধামাকা', 'Huge discounts on New Year\'s shopping!', 'নতুন বছরের কেনাকাটায় বিশাল মূল্য ছাড়!', 'new-year-dhamaka', 'নতুন-বছরের-ধামাকা', 'uploads/banner/1748537293261914.jpg', 1, '2022-11-04 04:08:42', '2022-11-04 04:11:48'),
(9, 'Countdown Sale', 'কাউন্টডাউন বিক্রয়', '30% Discount on purchases above 50,000 Takas', '৫০০০০ হাজার  টাকার উপরে কেনাকাটায় পাচ্ছেন ৩০% ডিসকাউন্ট', 'countdown-sale', 'কাউন্টডাউন-বিক্রয়', 'uploads/banner/1748537886705170.jpg', 1, '2022-11-04 04:21:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `category_id`, `subcategory_id`, `brand_name_en`, `brand_name_bn`, `brand_slug_en`, `brand_slug_bn`, `brand_image`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Asus', 'আছুস', 'asus', 'আছুস', 'uploads/brands/1745839118388102.jpg', 1, '2022-10-05 07:56:13', '2022-10-05 09:25:27'),
(2, 1, 1, 'Dell', 'ডেল', 'dell', 'ডেল', 'uploads/brands/1745839086271765.jpg', 1, '2022-10-05 07:56:41', '2022-10-05 09:24:57'),
(3, 1, 3, 'Canon', 'ক্যানন', 'canon', 'ক্যানন', 'uploads/brands/1745833586219682.jfif', 1, '2022-10-05 07:57:31', NULL),
(4, 1, 4, 'Samsung', 'স্যামসাং', 'samsung', 'স্যামসাং', 'uploads/brands/1745833646708395.jpg', 1, '2022-10-05 07:58:29', NULL),
(5, 2, 6, 'Three piece', 'থ্রী পিছ', 'three-piece', 'থ্রী-পিছ', 'uploads/brands/1745833773312693.jfif', 1, '2022-10-05 07:59:32', '2022-10-05 08:00:30'),
(6, 2, 5, 'Panjabi', 'পাঞ্জাবী', 'panjabi', 'পাঞ্জাবী', 'uploads/brands/1745833712772592.jfif', 1, '2022-10-05 07:59:32', NULL),
(7, 8, 17, 'Political Parties in India', 'ভারতের রাজনৈতিক দল', 'political-parties-in-india', 'ভারতের-রাজনৈতিক-দল', 'uploads/brands/1745837158701366.jfif', 1, '2022-10-05 08:54:18', NULL),
(8, 8, 17, 'A Brief History of Time', 'সময়ের সংক্ষিপ্ত ইতিহাস', 'a-brief-history-of-time', 'সময়ের-সংক্ষিপ্ত-ইতিহাস', 'uploads/brands/1745837650661762.jfif', 1, '2022-10-05 09:02:08', NULL),
(9, 8, 17, 'India a History', 'ভারত একটি ইতিহাস', 'india-a-history', 'ভারত-একটি-ইতিহাস', 'uploads/brands/1745837719249126.jfif', 1, '2022-10-05 09:03:13', NULL),
(10, 8, 17, 'World History', 'বিশ্ব ইতিহাস', 'world-history', 'বিশ্ব-ইতিহাস', 'uploads/brands/1745837784058033.jfif', 1, '2022-10-05 09:04:15', NULL),
(11, 8, 21, 'How to give Zakat', 'যাকাত কিভাবে দিবেন', 'how-to-give-zakat', 'যাকাত-কিভাবে-দিবেন', 'uploads/brands/1745837899519829.jfif', 1, '2022-10-05 09:06:05', NULL),
(12, 8, 21, 'banking & financing', 'ব্যাংকিং ও অর্থায়ন', 'islamic-banking-and-financing-systems', 'ইসলামী-ব্যাংকিং-ও-অর্থায়ন-পদ্ধতি', 'uploads/brands/1745837950951507.jfif', 1, '2022-10-05 09:06:54', NULL),
(13, 8, 21, 'Life\'s best asset', 'জীবনের শ্রেষ্ঠ সম্পদ', 'life\'s-best-asset', 'জীবনের-শ্রেষ্ঠ-সম্পদ', 'uploads/brands/1745838096005096.jfif', 1, '2022-10-05 09:09:12', NULL),
(14, 8, 21, 'The cry of Spain', 'স্পেনের কান্না', 'the-cry-of-spain', 'স্পেনের-কান্না', 'uploads/brands/1745838129507304.jfif', 1, '2022-10-05 09:09:44', NULL),
(15, 8, 22, 'Nausea', 'বমি বমি ভাব', 'nausea', 'বমি-বমি-ভাব', 'uploads/brands/1745838248779711.jfif', 1, '2022-10-05 09:11:38', NULL),
(16, 8, 22, 'Runaway', 'পলায়ন', 'runaway', 'পলায়ন', 'uploads/brands/1745838290594724.jfif', 1, '2022-10-05 09:12:18', NULL),
(17, 8, 22, 'Youth', 'যৌবন', 'youth', 'যৌবন', 'uploads/brands/1745838332201161.jfif', 1, '2022-10-05 09:12:58', NULL),
(18, 8, 22, 'Blindness', 'অন্ধত্ব', 'blindness', 'অন্ধত্ব', 'uploads/brands/1745838367019608.jfif', 1, '2022-10-05 09:13:31', NULL),
(19, 8, 18, 'Politics', 'রাষ্ট্রনীতি', 'politics', 'রাষ্ট্রনীতি', 'uploads/brands/1745838449029626.jfif', 1, '2022-10-05 09:14:49', NULL),
(20, 8, 18, 'The Politics', 'রাজনীতি', 'the-politics', 'রাজনীতি', 'uploads/brands/1745838484654510.jfif', 1, '2022-10-05 09:15:23', NULL),
(21, 8, 18, 'The Politics Book', 'রাজনীতি বই', 'the-politics-book', 'রাজনীতি-বই', 'uploads/brands/1745838533148121.jfif', 1, '2022-10-05 09:16:09', NULL),
(22, 8, 18, 'Gender,politics and Islam', 'লিঙ্গ, রাজনীতি এবং ইসলাম', 'gender,politics-and-islam', 'লিঙ্গ,-রাজনীতি-এবং-ইসলাম', 'uploads/brands/1745838562448274.jfif', 1, '2022-10-05 09:16:37', NULL),
(23, 1, 3, 'Nikon', 'নিকন', 'nikon', 'নিকন', 'uploads/brands/1745838702669654.jfif', 1, '2022-10-05 09:18:51', NULL),
(24, 1, 3, 'Sony', 'সনি', 'sony', 'সনি', 'uploads/brands/1745838734430691.jfif', 1, '2022-10-05 09:19:21', NULL),
(25, 1, 3, 'Panasonic', 'প্যানাসনিক', 'panasonic', 'প্যানাসনিক', 'uploads/brands/1745838773772898.jfif', 1, '2022-10-05 09:19:59', NULL),
(26, 1, 2, 'Lenovo', 'লেনোভো', 'lenovo', 'লেনোভো', 'uploads/brands/1745838851736899.webp', 1, '2022-10-05 09:21:13', NULL),
(27, 1, 2, 'Dell XPS', 'ডেল এক্সপিএস', 'dell-xps', 'ডেল-এক্সপিএস', 'uploads/brands/1745838882343823.jpg', 1, '2022-10-05 09:21:42', NULL),
(28, 1, 2, 'HP Omen', 'এইচপি ওমেন', 'hp-omen', 'এইচপি-ওমেন', 'uploads/brands/1745838919969736.jpg', 1, '2022-10-05 09:22:18', NULL),
(29, 1, 2, 'Apple Mac', 'অ্যাপল ম্যাক', 'apple-mac', 'অ্যাপল-ম্যাক', 'uploads/brands/1745838979013009.jpg', 1, '2022-10-05 09:23:00', '2022-10-05 09:23:14'),
(30, 1, 1, 'Lenovo', 'লেনোভো', 'lenovo', 'লেনোভো', 'uploads/brands/1745839033248406.jpg', 1, '2022-10-05 09:24:06', NULL),
(31, 1, 1, 'Acer', 'এসার', 'acer', 'এসার', 'uploads/brands/1745839069358555.jpg', 1, '2022-10-05 09:24:41', NULL),
(32, 1, 4, 'Google', 'গুগল', 'google', 'গুগল', 'uploads/brands/1745839185156854.jpg', 1, '2022-10-05 09:26:31', NULL),
(33, 1, 4, 'Xiaomi', 'শাওমি', 'xiaomi', 'শাওমি', 'uploads/brands/1745839228893762.jpg', 1, '2022-10-05 09:27:13', NULL),
(34, 1, 4, 'Oppo', 'অপো', 'oppo', 'অপো', 'uploads/brands/1745839258308322.jpg', 1, '2022-10-05 09:27:41', NULL),
(35, 2, 5, 'Nike', 'নাইকি', 'nike', 'নাইকি', 'uploads/brands/1745839541211560.jfif', 1, '2022-10-05 09:32:11', NULL),
(36, 2, 5, 'Gucci', 'গুচি', 'gucci', 'গুচি', 'uploads/brands/1745839582252512.jfif', 1, '2022-10-05 09:32:50', NULL),
(37, 2, 6, 'BURBERRY', 'বারবেরি', 'burberry', 'বারবেরি', 'uploads/brands/1745839627273444.jfif', 1, '2022-10-05 09:33:33', NULL),
(38, 2, 6, 'CHANEL', 'চ্যানেল', 'chanel', 'চ্যানেল', 'uploads/brands/1745839660534922.jfif', 1, '2022-10-05 09:34:04', NULL),
(39, 2, 23, 'H&M.', 'এইচ এম', 'h&m.', 'এইচ-এম', 'uploads/brands/1745839715789187.jfif', 1, '2022-10-05 09:34:57', NULL),
(40, 2, 23, 'LILLIPUT', 'লিলিপুট', 'lilliput', 'লিলিপুট', 'uploads/brands/1745839744651770.jfif', 1, '2022-10-05 09:35:25', NULL),
(41, 2, 23, 'ZARA KIDS', 'জারা কিডস', 'zara-kids', 'জারা-কিডস', 'uploads/brands/1745839802190471.jfif', 1, '2022-10-05 09:36:19', NULL),
(42, 2, 24, 'Zara', 'জারা', 'zara', 'জারা', 'uploads/brands/1745839836426683.jfif', 1, '2022-10-05 09:36:52', NULL),
(43, 2, 24, 'Mini Boden', 'মিনি বোডেন', 'mini-boden', 'মিনি-বোডেন', 'uploads/brands/1745839872134615.jfif', 1, '2022-10-05 09:37:26', NULL),
(44, 2, 24, 'Levi\'s', 'লেভি', 'levi\'s', 'লেভি', 'uploads/brands/1745839930496668.jfif', 1, '2022-10-05 09:38:22', NULL),
(45, 7, 25, 'King Size Bed', 'বিশাল বিছানা', 'king-size-bed', 'বিশাল-বিছানা', 'uploads/brands/1745840311035758.jpg', 1, '2022-10-05 09:44:25', NULL),
(47, 7, 25, 'Queen Size Bed', 'কুইন সাইজ বেড', 'queen-size-bed', 'কুইন-সাইজ-বেড', 'uploads/brands/1745840350543051.jpg', 1, '2022-10-05 09:45:03', NULL),
(48, 7, 25, 'Folding Bed', 'ফোল্ডিং বেড', 'folding-bed', 'ফোল্ডিং-বেড', 'uploads/brands/1745840409285731.jpg', 1, '2022-10-05 09:45:59', NULL),
(49, 7, 16, 'Rocking Chair', 'দোলান - চেয়ার', 'rocking-chair', 'দোলান---চেয়ার', 'uploads/brands/1745840544105355.jpg', 1, '2022-10-05 09:48:07', NULL),
(50, 7, 16, 'Easy Chair', 'আরামকেদারা', 'easy-chair', 'আরামকেদারা', 'uploads/brands/1745840581704975.jpg', 1, '2022-10-05 09:48:43', NULL),
(51, 7, 16, 'Accent Chair', 'অ্যাকসেন্ট চেয়ার', 'accent-chair', 'অ্যাকসেন্ট-চেয়ার', 'uploads/brands/1745840612941134.jpg', 1, '2022-10-05 09:49:13', NULL),
(52, 7, 26, 'Solid Wooden Door', 'কঠিন কাঠের দরজা', 'solid-wooden-door', 'কঠিন-কাঠের-দরজা', 'uploads/brands/1745840882575091.png', 1, '2022-10-05 09:53:30', NULL),
(53, 7, 26, 'Knock-Down Door Frame', 'নক ডাউন ডোর ফ্রেম', 'knock-down-door-frame', 'নক-ডাউন-ডোর-ফ্রেম', 'uploads/brands/1745840953468524.png', 1, '2022-10-05 09:54:37', NULL),
(54, 7, 26, 'Plain Veneered Flush Door', 'প্লেইন ভেনির্ড ফ্লাশ ডোর', 'plain-veneered-flush-door', 'প্লেইন-ভেনির্ড-ফ্লাশ-ডোর', 'uploads/brands/1745841002459577.png', 1, '2022-10-05 09:55:24', NULL),
(55, 7, 15, 'Center Table with Glass Top', 'গ্লাস টপ সহ সেন্টার টেবিল', 'center-table-with-glass-top', 'গ্লাস-টপ-সহ-সেন্টার-টেবিল', 'uploads/brands/1745853744006668.jfif', 1, '2022-10-05 13:17:56', NULL),
(56, 7, 15, 'Table with Wooden Top', 'শীর্ষ সহ কেন্দ্র টেবিল', 'center-table-with-wooden-top', 'কাঠের-শীর্ষ-সহ-কেন্দ্র-টেবিল', 'uploads/brands/1745853786497290.jfif', 1, '2022-10-05 13:18:36', NULL),
(57, 3, 28, 'Diapers', 'ডায়াপার', 'diapers', 'ডায়াপার', 'uploads/brands/1745854096605984.jfif', 1, '2022-10-05 13:23:32', NULL),
(58, 3, 28, 'Baby Food', 'শিশু খাদ্য', 'baby-food', 'শিশু-খাদ্য', 'uploads/brands/1745854144931998.jpg', 1, '2022-10-05 13:24:18', NULL),
(59, 3, 28, 'Baby Skincare', 'শিশুর ত্বকের যত্ন', 'baby-skincare', 'শিশুর-ত্বকের-যত্ন', 'uploads/brands/1745854251855333.jfif', 1, '2022-10-05 13:26:00', NULL),
(60, 3, 27, 'Tea', 'চা', 'tea', 'চা', 'uploads/brands/1745854372315299.jfif', 1, '2022-10-05 13:27:55', NULL),
(61, 3, 27, 'Soft Drinks', 'কোমল পানীয়', 'soft-drinks', 'কোমল-পানীয়', 'uploads/brands/1745854433770130.jfif', 1, '2022-10-05 13:28:53', NULL),
(62, 3, 27, 'Coffee', 'কফি', 'coffee', 'কফি', 'uploads/brands/1745854518627079.jfif', 1, '2022-10-05 13:30:14', NULL),
(63, 3, 7, 'Fruits & Vegetables', 'ফল ও সবজি', 'fruits-&-vegetables', 'ফল-ও-সবজি', 'uploads/brands/1745854571771038.jpg', 1, '2022-10-05 13:31:05', NULL),
(64, 3, 7, 'Breakfast', 'সকালের নাস্তা', 'breakfast', 'সকালের-নাস্তা', 'uploads/brands/1745854608005016.jfif', 1, '2022-10-05 13:31:39', NULL),
(65, 3, 7, 'Meat & Fish', 'মাংস মাছ', 'meat-&-fish', 'মাংস-মাছ', 'uploads/brands/1745854654849383.jpg', 1, '2022-10-05 13:32:24', NULL),
(66, 3, 8, 'Toothpastes', 'দাঁতের মার্জন', 'toothpastes', 'দাঁতের-মার্জন', 'uploads/brands/1745854735123296.jfif', 1, '2022-10-05 13:33:41', NULL),
(67, 3, 8, 'Toothbrushes', 'টুথব্রাশ', 'toothbrushes', 'টুথব্রাশ', 'uploads/brands/1745854843519784.jfif', 1, '2022-10-05 13:35:24', NULL),
(68, 6, 13, 'Cartier', 'কারটিয়ার', 'cartier', 'কারটিয়ার', 'uploads/brands/1745854941652113.jfif', 1, '2022-10-05 13:36:58', NULL),
(69, 6, 13, 'Harry Winston', 'হ্যারি উইনস্টন', 'harry-winston', 'হ্যারি-উইনস্টন', 'uploads/brands/1745854974966047.jfif', 1, '2022-10-05 13:37:29', NULL),
(70, 6, 13, 'Chopard', 'চোপার্ড', 'chopard', 'চোপার্ড', 'uploads/brands/1745855007880045.jfif', 1, '2022-10-05 13:38:01', NULL),
(71, 6, 14, 'Harry Winston', 'হ্যারি উইনস্টন', 'harry-winston', 'হ্যারি-উইনস্টন', 'uploads/brands/1745855059275133.jfif', 1, '2022-10-05 13:38:50', NULL),
(72, 6, 14, 'Cartier', 'কারটিয়ার', 'cartier', 'কারটিয়ার', 'uploads/brands/1745855093871699.jfif', 1, '2022-10-05 13:39:23', NULL),
(73, 6, 14, 'Tiffany and Co', 'টিফানি এবং কো', 'tiffany-and-co', 'টিফানি-এবং-কো', 'uploads/brands/1745855269695480.jfif', 1, '2022-10-05 13:42:10', NULL),
(74, 4, 29, 'Square', 'স্কয়ার', 'square', 'স্কয়ার', 'uploads/brands/1745855414745032.jfif', 1, '2022-10-05 13:44:29', NULL),
(75, 4, 29, 'Incepta', 'ইন্সেপ্টা', 'incepta', 'ইন্সেপ্টা', 'uploads/brands/1745855467792376.jfif', 1, '2022-10-05 13:45:19', NULL),
(76, 4, 29, 'Beximco', 'বেক্সিমকো', 'beximco', 'বেক্সিমকো', 'uploads/brands/1745855500792428.jfif', 1, '2022-10-05 13:45:51', NULL),
(77, 4, 10, 'Beximco', 'বেক্সিমকো', 'beximco', 'বেক্সিমকো', 'uploads/brands/1745855533702674.jfif', 1, '2022-10-05 13:46:22', NULL),
(78, 4, 10, 'Incepta', 'ইন্সেপ্টা', 'incepta', 'ইন্সেপ্টা', 'uploads/brands/1745855575866264.jfif', 1, '2022-10-05 13:47:02', NULL),
(79, 4, 10, 'Square', 'স্কয়ার', 'square', 'স্কয়ার', 'uploads/brands/1745855653873846.jfif', 1, '2022-10-05 13:48:17', NULL),
(80, 4, 9, 'Square', 'স্কয়ার', 'square', 'স্কয়ার', 'uploads/brands/1745855724550237.jfif', 1, '2022-10-05 13:49:24', NULL),
(81, 4, 9, 'Incepta', 'ইন্সেপ্টা', 'incepta', 'ইন্সেপ্টা', 'uploads/brands/1745855767300694.jfif', 1, '2022-10-05 13:50:05', NULL),
(82, 4, 9, 'Beximco', 'বেক্সিমকো', 'beximco', 'বেক্সিমকো', 'uploads/brands/1745855795505105.jfif', 1, '2022-10-05 13:50:32', NULL),
(83, 4, 30, 'Beximco', 'বেক্সিমকো', 'beximco', 'বেক্সিমকো', 'uploads/brands/1745855848299379.jfif', 1, '2022-10-05 13:51:22', NULL),
(84, 4, 30, 'Incepta', 'ইন্সেপ্টা', 'incepta', 'ইন্সেপ্টা', 'uploads/brands/1745855875114056.jfif', 1, '2022-10-05 13:51:48', NULL),
(85, 4, 30, 'Square', 'স্কয়ার', 'square', 'স্কয়ার', 'uploads/brands/1745855906699609.jfif', 1, '2022-10-05 13:52:18', NULL),
(86, 9, 19, 'Nike', 'নাইকি', 'nike', 'নাইকি', 'uploads/brands/1745856342276473.jfif', 1, '2022-10-05 13:59:13', NULL),
(87, 9, 19, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', 'uploads/brands/1745856371815045.jfif', 1, '2022-10-05 13:59:41', NULL),
(88, 9, 19, 'Puma', 'পুমা', 'puma', 'পুমা', 'uploads/brands/1745856398486453.jfif', 1, '2022-10-05 14:00:07', NULL),
(89, 9, 20, 'Puma', 'পুমা', 'puma', 'পুমা', 'uploads/brands/1745856423447241.jfif', 1, '2022-10-05 14:00:31', NULL),
(90, 9, 20, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', 'uploads/brands/1745856451257526.jfif', 1, '2022-10-05 14:00:57', NULL),
(91, 9, 20, 'Nike', 'নাইকি', 'nike', 'নাইকি', 'uploads/brands/1745856480035215.jfif', 1, '2022-10-05 14:01:25', NULL),
(92, 9, 31, 'Nike', 'নাইকি', 'nike', 'নাইকি', 'uploads/brands/1745856512826740.jfif', 1, '2022-10-05 14:01:56', NULL),
(93, 9, 31, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', 'uploads/brands/1745856537459379.jfif', 1, '2022-10-05 14:02:19', NULL),
(94, 9, 31, 'Puma', 'পুমা', 'puma', 'পুমা', 'uploads/brands/1745856570564283.jfif', 1, '2022-10-05 14:02:51', NULL),
(95, 9, 32, 'Puma', 'পুমা', 'puma', 'পুমা', 'uploads/brands/1745856604196786.jfif', 1, '2022-10-05 14:03:23', NULL),
(96, 9, 32, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', 'uploads/brands/1745856628233996.jfif', 1, '2022-10-05 14:03:46', NULL),
(97, 9, 32, 'Nike', 'নাইকি', 'nike', 'নাইকি', 'uploads/brands/1745856655218416.jfif', 1, '2022-10-05 14:04:12', NULL),
(98, 5, 34, 'Yonex Astrox', 'ইউনিক্স আস্ট্রক্স', 'yonex-astrox', 'ইউনিক্স-আস্ট্রক্স', 'uploads/brands/1745856776280830.jfif', 1, '2022-10-05 14:06:07', NULL),
(99, 5, 34, 'Babolat Satellite', 'বাবোলাট স্যাটেলাইট', 'babolat-satellite', 'বাবোলাট-স্যাটেলাইট', 'uploads/brands/1745856911586490.jfif', 1, '2022-10-05 14:06:08', '2022-10-05 14:08:16'),
(100, 5, 34, 'Yonex Arcsaver', 'ইউনিক্স আরক্সাবার', 'yonex-arcsaver', 'ইউনিক্স-আরক্সাবার', 'uploads/brands/1745856864221102.jfif', 1, '2022-10-05 14:07:31', NULL),
(101, 5, 33, 'Babolat', 'বাবোলাত', 'babolat', 'বাবোলাত', 'uploads/brands/1745857012243493.png', 1, '2022-10-05 14:09:52', NULL),
(102, 5, 33, 'Racquet Brand', 'র‍্যাকেট ব্র্যান্ড', 'racquet-brand', 'র‍্যাকেট-ব্র্যান্ড', 'uploads/brands/1745857119952056.jfif', 1, '2022-10-05 14:11:35', NULL),
(103, 5, 33, 'Wilson', 'উইলসন', 'wilson', 'উইলসন', 'uploads/brands/1745857172714917.jfif', 1, '2022-10-05 14:12:25', NULL),
(104, 5, 11, 'Kookaburra', 'কুকাবুরা', 'kookaburra', 'কুকাবুরা', 'uploads/brands/1745857237912331.jfif', 1, '2022-10-05 14:13:27', NULL),
(105, 5, 11, 'Spartan Sports', 'স্পার্টান স্পোর্টস', 'spartan-sports', 'স্পার্টান-স্পোর্টস', 'uploads/brands/1745857269206300.jfif', 1, '2022-10-05 14:13:57', NULL),
(106, 5, 11, 'Puma', 'পুমা', 'puma', 'পুমা', 'uploads/brands/1745857296728876.jfif', 1, '2022-10-05 14:14:24', NULL),
(107, 5, 12, 'Kering', 'কেরিং', 'kering', 'কেরিং', 'uploads/brands/1745857384290314.jfif', 1, '2022-10-05 14:15:47', NULL),
(108, 5, 12, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', 'uploads/brands/1745857415765504.png', 1, '2022-10-05 14:16:17', NULL),
(109, 5, 12, 'Burberry', 'বারবেরি', 'burberry', 'বারবেরি', 'uploads/brands/1745857446515964.jfif', 1, '2022-10-05 14:16:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name_en`, `category_name_bn`, `category_slug_en`, `category_slug_bn`, `category_image`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'ইলেক্ট্রোনিক্স', 'electronics', 'ইলেক্ট্রোনিক্স', 'uploads/categories/1745830805125701.jfif', 1, '2022-10-05 07:13:20', NULL),
(2, 'Fashion', 'ফ্যাশন', 'fashion', 'ফ্যাশন', 'uploads/categories/1745831523643620.jfif', 1, '2022-10-05 07:24:44', NULL),
(3, 'Grocery', 'মুদিখানা', 'grocery', 'মুদিখানা', 'uploads/categories/1745831688054007.jpg', 1, '2022-10-05 07:27:21', NULL),
(4, 'Medicine', 'ওষুধ', 'medicine', 'ওষুধ', 'uploads/categories/1745831779444483.jfif', 1, '2022-10-05 07:28:48', NULL),
(5, 'Sports', 'খেলাধুলা', 'sports', 'খেলাধুলা', 'uploads/categories/1745831860281529.jfif', 1, '2022-10-05 07:30:05', NULL),
(6, 'Jewellery', 'মণিরত্ন', 'jewellery', 'মণিরত্ন', 'uploads/categories/1745831940631081.jfif', 1, '2022-10-05 07:31:22', NULL),
(7, 'Furniture', 'আসবাবপত্র', 'furniture', 'আসবাবপত্র', 'uploads/categories/1745832129551351.jfif', 1, '2022-10-05 07:34:22', NULL),
(8, 'Book', 'বই', 'book', 'বই', 'uploads/categories/1745832214820603.jfif', 1, '2022-10-05 07:35:44', NULL),
(9, 'Shoe', 'জুতা', 'shoe', 'জুতা', 'uploads/categories/1745832702307211.jfif', 1, '2022-10-05 07:43:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `coupon_status`, `created_at`, `updated_at`) VALUES
(1, 'Bigsale', 20, '2023-03-20', 1, '2022-11-03 18:00:08', '2023-02-18 04:10:36'),
(2, 'Slickdeals', 25, '2022-11-15', 1, '2022-11-06 04:08:10', NULL);

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_09_07_030216_create_roles_table', 1),
(16, '2022_09_24_000635_create_brands_table', 1),
(18, '2022_09_25_201604_create_subcategories_table', 1),
(19, '2022_10_05_101512_create_subsub_categories_table', 1),
(20, '2022_09_25_150620_create_categories_table', 2),
(22, '2022_10_08_190127_create_multi_imgs_table', 4),
(23, '2022_10_14_103810_create_sliders_table', 5),
(25, '2022_10_14_201322_create_banners_table', 6),
(26, '2022_10_08_184542_create_products_table', 7),
(27, '2018_12_23_120000_create_shoppingcart_table', 8),
(29, '2022_10_28_002617_create_wishlists_table', 9),
(31, '2022_11_03_205040_create_coupons_table', 10),
(32, '2022_11_04_163146_create_shipping_divisions_table', 11),
(33, '2022_11_04_163250_create_shipping_districts_table', 11),
(34, '2022_11_04_163315_create_shipping_states_table', 11),
(35, '2022_11_13_153114_create_shipping_infos_table', 12),
(36, '2022_11_16_173542_create_order_infos_table', 13),
(37, '2022_11_16_174822_create_order_items_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `multiImg_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`multiImg_id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/products/multi-image/1746944122277471.jpg', '2022-10-17 14:09:01', NULL),
(2, 1, 'uploads/products/multi-image/1746944122493836.jpg', '2022-10-17 14:09:02', NULL),
(3, 1, 'uploads/products/multi-image/1746944122719277.jpg', '2022-10-17 14:09:02', NULL),
(4, 1, 'uploads/products/multi-image/1746944123088084.jpg', '2022-10-17 14:09:02', NULL),
(5, 1, 'uploads/products/multi-image/1746944123294872.jpg', '2022-10-17 14:09:02', NULL),
(6, 1, 'uploads/products/multi-image/1746944123484199.jpg', '2022-10-17 14:09:02', NULL),
(7, 2, 'uploads/products/multi-image/1746944761526438.jpg', '2022-10-17 14:19:11', NULL),
(8, 2, 'uploads/products/multi-image/1746944761739988.jpg', '2022-10-17 14:19:11', NULL),
(9, 2, 'uploads/products/multi-image/1746944761898381.jpg', '2022-10-17 14:19:11', NULL),
(10, 2, 'uploads/products/multi-image/1746944762084724.jpg', '2022-10-17 14:19:11', NULL),
(11, 2, 'uploads/products/multi-image/1746944762248397.jpg', '2022-10-17 14:19:12', NULL),
(12, 2, 'uploads/products/multi-image/1746944762463375.jpg', '2022-10-17 14:19:12', NULL),
(13, 2, 'uploads/products/multi-image/1746944762688692.jpg', '2022-10-17 14:19:12', NULL),
(14, 3, 'uploads/products/multi-image/1746945094985564.jpg', '2022-10-17 14:24:29', NULL),
(15, 3, 'uploads/products/multi-image/1746945095237618.jpg', '2022-10-17 14:24:29', NULL),
(16, 3, 'uploads/products/multi-image/1746945095418431.jpg', '2022-10-17 14:24:29', NULL),
(17, 3, 'uploads/products/multi-image/1746945095585448.jpg', '2022-10-17 14:24:30', NULL),
(18, 3, 'uploads/products/multi-image/1746945095900380.jpg', '2022-10-17 14:24:30', NULL),
(19, 3, 'uploads/products/multi-image/1746945096458996.jpg', '2022-10-17 14:24:30', NULL),
(20, 4, 'uploads/products/multi-image/1746945583553324.webp', '2022-10-17 14:32:15', NULL),
(21, 4, 'uploads/products/multi-image/1746945584070112.jpg', '2022-10-17 14:32:15', NULL),
(22, 4, 'uploads/products/multi-image/1746945584228035.jpg', '2022-10-17 14:32:16', NULL),
(23, 5, 'uploads/products/multi-image/1746945951949715.jfif', '2022-10-17 14:38:06', NULL),
(24, 5, 'uploads/products/multi-image/1746945952152798.jfif', '2022-10-17 14:38:06', NULL),
(26, 6, 'uploads/products/multi-image/1746946340811464.jpg', '2022-10-17 14:44:17', NULL),
(27, 6, 'uploads/products/multi-image/1746946341024603.jpg', '2022-10-17 14:44:17', NULL),
(28, 6, 'uploads/products/multi-image/1746946341190632.jpg', '2022-10-17 14:44:17', NULL),
(29, 7, 'uploads/products/multi-image/1746946657552180.jfif', '2022-10-17 14:49:19', NULL),
(30, 7, 'uploads/products/multi-image/1746946657730553.jfif', '2022-10-17 14:49:19', NULL),
(31, 7, 'uploads/products/multi-image/1746946657902217.jfif', '2022-10-17 14:49:19', NULL),
(32, 7, 'uploads/products/multi-image/1746946658183854.jfif', '2022-10-17 14:49:20', NULL),
(33, 8, 'uploads/products/multi-image/1746997341574115.jpg', '2022-10-17 14:57:11', '2022-10-18 04:14:55'),
(34, 9, 'uploads/products/multi-image/1747182825201892.jpeg', '2022-10-20 05:23:06', NULL),
(35, 10, 'uploads/products/multi-image/1747183690126587.jpeg', '2022-10-20 05:36:51', NULL),
(36, 11, 'uploads/products/multi-image/1747185180518547.webp', '2022-10-20 06:00:33', NULL),
(37, 11, 'uploads/products/multi-image/1747185181000151.webp', '2022-10-20 06:00:33', NULL),
(38, 12, 'uploads/products/multi-image/1747186035267873.jpg', '2022-10-20 06:11:14', '2022-10-20 06:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_infos`
--

CREATE TABLE `order_infos` (
  `order_info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `order_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_postCode` int(11) NOT NULL,
  `order_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_amount` double(8,2) NOT NULL,
  `order_number` int(11) NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `orderItm_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderItm_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderItm_qty` int(11) NOT NULL,
  `orderItm_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `subsubcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `brand_id`, `product_name_en`, `product_name_bn`, `product_slug_en`, `product_slug_bn`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_bn`, `product_size_en`, `product_size_bn`, `product_color_en`, `product_color_bn`, `actual_price`, `discount_price`, `short_descp_en`, `short_descp_bn`, `long_descp_en`, `long_descp_bn`, `product_thumbnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'ASUS ROG STRIX', 'আসুস রগ স্ট্রিক্স', 'asus-rog-strix', 'আসুস-রগ-স্ট্রিক্স', 'ELGAC001', '100', 'Electronics', 'ইলেক্ট্রনিক্স', NULL, NULL, 'Black', 'কালো', '170500', '140000', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\"><span style=\"background-color: rgb(255, 255, 0);\">ASUS ROG STRIX</span> G15 G513IM Ryzen 7 4800H RTX 3060 6GB Graphics 15.6\" WQHD Gaming Laptop</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">ASUS ROG STRIX G15 G513IM Ryzen 7 4800H RTX 3060 6GB গ্রাফিক্স 15.6\" WQHD গেমিং ল্যাপটপ</span>', '<span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">Asus ROG Strix G15 G513IM&nbsp;Gaming Laptop is powered by AMD Ryzen 7 4800H Processor (8M Cache, 2.9 GHz&nbsp;up to 4.2 GHz) with NVIDIA GeForce RTX 3060 6GB GDDR6&nbsp;</span><span style=\"text-align: justify;\"><font color=\"#01132d\" face=\"Trebuchet MS, sans-serif\"><span style=\"font-size: 15px;\">Graphics. This&nbsp;gaming laptop is designed with an aluminum-capped lid to its textured base and it can blend in every day with durability with athletic&nbsp;</span></font></span><span style=\"text-align: justify;\"><font color=\"#01132d\" face=\"Trebuchet MS, sans-serif\"><span style=\"font-size: 15px;\">style. The&nbsp;metal top resists knocks and bumps while also enabling slimmer bezels.</span></font></span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Asus ROG Strix G15 G513IM&nbsp;গেমিং ল্যাপটপ NVIDIA GeForce RTX 3060 6GB GDDR6 গ্রাফিক্স সহ AMD Ryzen 7 4800H প্রসেসর (8M ক্যাশে, 2.9 GHz পর্যন্ত 4.2 GHz) দ্বারা চালিত।</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">এই গেমিং ল্যাপটপটির টেক্সচারযুক্ত বেসে একটি অ্যালুমিনিয়াম-আবদ্ধ ঢাকনা দিয়ে ডিজাইন করা হয়েছে এবং এটি অ্যাথলেটিক স্টাইলের সাথে স্থায়িত্বের সাথে প্রতিদিন মিশে যেতে পারে।</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">মেটাল টপ নক এবং বাম্প প্রতিরোধ করে এবং পাতলা বেজেলকেও সক্ষম করে।</span>', 'uploads/products/thumbnail/1746944122066088.jfif', NULL, 1, 1, NULL, 1, '2022-10-17 14:09:01', '2022-10-17 14:25:11'),
(2, 1, 1, 2, 31, 'Acer Predator', 'এসার প্রেডেটর', 'acer-predator', 'এসার-প্রেডেটর', 'ELPAC001', '50', 'Electronics, Laptop', 'এসার', NULL, NULL, 'White', 'সাদা', '190000', '160000', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\"><span style=\"background-color: rgb(255, 255, 0);\">Acer Predator PH315-53</span> Intel Core i7 10th Gen RTX 2060 6GB Graphics 15.6\" 144Hz FHD Gaming Laptop</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Acer Predator PH315-53 Intel Core i7 10th Gen RTX 2060 6GB গ্রাফিক্স 15.6\" 144Hz FHD গেমিং ল্যাপটপ</span>', '<span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\">Play your favorite PC games in style with Acer Predator Helios 300 Gaming Laptop, complete with a textured metallic finish and a black/red color&nbsp;</span><font color=\"#01132d\" face=\"Trebuchet MS, sans-serif\"><span style=\"font-size: 15px;\">scheme. The&nbsp;keyboard also has a numeric keypad and red backlighting. Gear up for extended achievement sessions with Acer Predator Helios 300 Laptop.</span></font><span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\">&nbsp;The 15.6\" IPS display features a Full HD 1920 x 1080 screen resolution and a 16:9 aspect ratio.</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Acer Predator Helios 300 Gaming Laptop এর সাথে আপনার প্রিয় পিসি গেমগুলি স্টাইলে খেলুন, একটি টেক্সচার্ড মেটালিক ফিনিশ এবং একটি কালো/লাল রঙের স্কিম সহ সম্পূর্ণ করুন।</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">কীবোর্ডে একটি সংখ্যাসূচক কীপ্যাড এবং লাল ব্যাকলাইটিংও রয়েছে। Acer Predator Helios 300 ল্যাপটপের সাথে বর্ধিত অর্জনের সেশনের জন্য প্রস্তুত হন।</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">15.6\" আইপিএস ডিসপ্লেতে একটি ফুল HD 1920 x 1080 স্ক্রিন রেজোলিউশন এবং একটি 16:9 অনুপাত রয়েছে।</span>', 'uploads/products/thumbnail/1746944761307553.jfif', 1, NULL, 1, 1, 1, '2022-10-17 14:19:11', NULL),
(3, 1, 1, 3, 2, 'Dell XPS', 'ডেল এক্সপিএস', 'dell-xps', 'ডেল-এক্সপিএস', 'ELPDE001', '100', 'Electronics', 'ইলেক্ট্রনিক্স', NULL, NULL, 'Black', 'কালো', '180000', '150000', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\"><span style=\"background-color: rgb(255, 255, 0);\">Dell XPS</span> 13 9310 Core i5 11th Gen&nbsp;512GB SSD&nbsp;13.4\" Full HD Laptop</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Dell XPS 13 9310 Core i5 11th Gen 512GB SSD 13.4\" ফুল এইচডি ল্যাপটপ</span>', '<span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">The latest Dell XPS 13 9310 is easily the best 13-inch Ultrabook on the market right now. a jaw-dropping design, outstanding display, improved keyboard, and notably superior performance, there is nothing wrong with it.&nbsp;</span><span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">Indeed, the new 11th Gen Intel chips make it substantially better than before.</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">সর্বশেষ ডেল এক্সপিএস 13 9310 সহজেই এই মুহূর্তে বাজারে থাকা সেরা 13-ইঞ্চি আল্ট্রাবুক। একটি চোয়াল-ড্রপিং ডিজাইন, অসামান্য ডিসপ্লে, উন্নত কীবোর্ড, এবং উল্লেখযোগ্যভাবে উচ্চতর কর্মক্ষমতা, এতে কোনো ভুল নেই।</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">প্রকৃতপক্ষে, নতুন 11 তম জেনারেল ইন্টেল চিপগুলি এটিকে আগের তুলনায় যথেষ্ট ভাল করে তোলে।</span>', 'uploads/products/thumbnail/1746945094777909.jfif', 1, 1, 1, NULL, 1, '2022-10-17 14:24:29', NULL),
(4, 1, 2, 5, 27, 'Star PC 12th Gen', 'স্টার পিসি ১২তম জেন', 'star-pc-12th-gen', 'স্টার-পিসি-১২তম-জেন', 'EDSDE001', '100', 'Star pc,Dell', 'ইলেক্ট্রনিক্স', NULL, NULL, 'Blue', 'নীল', '182500', '155000', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\"><span style=\"background-color: rgb(255, 255, 0);\">Intel 12th Gen</span> Core i9-12900K Alder Lake Processor</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Intel 12th Gen Core i9-12900K Alder Lake প্রসেসর</span>', '<span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">The new Star PC 12th Gen Desktop PC comes with Intel 12th Gen Core i9-12900K Alder Lake Processor, Asus TUF GAMING B660-PLUS WIFI D4 12th Gen ATX Motherboard, EKWB EK-AIO Elite Aurum 360 D-RGB CPU Cooler, TEAM NIGHT HAWK UD 8GB 4000MHz RGB DDR4 Desktop RAM, Seagate Internal 1TB SATA Barracuda HDD, Antec HCG 850 EC Gold High Current Gamer Gold Series 850W Power supply, Samsung 980 Pro 1TB PCIe 4.0 M.2 NVMe SSD and&nbsp;</span><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; text-align: justify; font-size: 12px;\">Lian Li O11DX O11 Dynamic ATX Mid Tower Gaming Case (Black).</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">নতুন Star PC 12th Gen Desktop PC তে Intel 12th Gen Core i9-12900K Alder Lake Processor, Asus TUF GAMING B660-PLUS WIFI D4 12th Gen ATX মাদারবোর্ড,</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">EKWB EK-AIO Elite Aurum 360 D-RGB CPU কুলার, TEAM NIGHT HAWK UD 8GB 4000MHz RGB DDR4 ডেস্কটপ RAM, Seagate ইন্টারনাল 1TB SATA Barracuda HDD, Antec HCG 850 EC গোল্ড হাই কারেন্ট গেম&nbsp;</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">গোল্ড সিরিজ 850W পাওয়ার সাপ্লাই, Samsung 980 Pro 1TB PCIe 4.0 M.2 NVMe SSD এবং Lian Li O11DX O11 ডাইনামিক ATX মিড টাওয়ার গেমিং কেস (কালো)।</span>', 'uploads/products/thumbnail/1746945583353349.jpg', NULL, 1, NULL, 1, 1, '2022-10-17 14:32:15', NULL),
(5, 1, 3, 9, 3, 'Panasonic HC', 'প্যানাসনিক এইচসি', 'panasonic-hc', 'প্যানাসনিক-এইচসি', 'ECDCA001', '100', 'DSLR', 'ইলেক্ট্রনিক্স', NULL, NULL, 'Black', 'কালো', '52000', '45000', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Panasonic HC-V785GW-K Camcorder</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Panasonic HC-V785GW-K ক্যামকর্ডার</span>', '<span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">Panasonic HC-V785GW-K Camcorder comes with 3.6V (Battery) / 5.0V (AC Adaptor), Max. 6.7W (Recording) / Max. 7.7W (Charging) with 1/2.3-inch BSI MOS Sensor.&nbsp;</span><span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px; text-align: justify;\">&nbsp;It is featured with Total Pixels: 12.76 megapixels; Effective : 6.03 megapixels [16:9] (Level Shot Function OFF or Normal), Panasonic Lens; Filter Diameter : 49 mm, Auto Slow Shutter ON</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Panasonic HC-V785GW-K ক্যামকর্ডার 3.6V (ব্যাটারি) / 5.0V (AC অ্যাডাপ্টর), সর্বোচ্চ সহ আসে। 6.7W (রেকর্ডিং) / সর্বোচ্চ। 7.7W (চার্জিং) 1/2.3-ইঞ্চি BSI MOS সেন্সর সহ।&nbsp;</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">এটি মোট পিক্সেল সহ বৈশিষ্ট্যযুক্ত: 12.76 মেগাপিক্সেল; কার্যকরী: 6.03 মেগাপিক্সেল [16:9] (লেভেল শট ফাংশন অফ বা নরমাল), প্যানাসনিক লেন্স; ফিল্টার ব্যাস: 49 মিমি, অটো স্লো শাটার চালু</span>', 'uploads/products/thumbnail/1746945951760774.jfif', 1, NULL, 1, NULL, 1, '2022-10-17 14:38:06', NULL),
(6, 1, 4, 13, 33, 'Xiaomi Note 10 Pro', 'শাওমি নোট ১০ প্রো', 'xiaomi-note-10-pro', 'শাওমি-নোট-১০-প্রো', 'EPXio001', '50', 'Xiaomi', 'ইলেক্ট্রনিক্স', NULL, NULL, 'Black', 'কালো', '35000', '34000', '<span style=\"color: rgb(44, 47, 52); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Arial, sans-serif; font-size: 15px;\">Xiaomi Redmi Note 10 Pro comes with 6.67 inches Full HD+ AMOLED or Super AMOLED screen.</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Xiaomi Redmi Note 10 Pro 6.67 ইঞ্চি ফুল HD+ AMOLED বা সুপার AMOLED স্ক্রিনের সাথে আসে।</span>', '<span style=\"color: rgb(44, 47, 52); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Arial, sans-serif; font-size: 15px;\">It has a center punch-hole design on the front. The display is protected by 5th generation Gorilla Glasses.&nbsp;</span><span style=\"color: rgb(44, 47, 52); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Arial, sans-serif; font-size: 15px;\">The back camera is of quad 64+8+5+2 or 108+8+5+2 Megapixel with PDAF, ultrawide, depth sensor, dedicated macro camera etc. and 4k Ultra HD video recording.&nbsp;</span><span style=\"color: rgb(44, 47, 52); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Arial, sans-serif; font-size: 15px;\">The front camera is of 16 MP. Redmi Note 10 Pro comes with 5020 mAh big battery with a 33W Fast Charging solution.&nbsp;</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">এটির সামনের দিকে একটি সেন্টার পাঞ্চ-হোল ডিজাইন রয়েছে। ডিসপ্লেটি 5ম প্রজন্মের গরিলা গ্লাস দ্বারা সুরক্ষিত।</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">পিছনের ক্যামেরাটি কোয়াড 64+8+5+2 বা 108+8+5+2 মেগাপিক্সেলের PDAF, আল্ট্রাওয়াইড, ডেপথ সেন্সর, ডেডিকেটেড ম্যাক্রো ক্যামেরা ইত্যাদি এবং 4k আল্ট্রা এইচডি ভিডিও রেকর্ডিং।</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">সামনের ক্যামেরাটি 16 এমপির। Redmi Note 10 Pro একটি 33W ফাস্ট চার্জিং সলিউশন সহ 5020 mAh বড় ব্যাটারি সহ আসে।</span>', 'uploads/products/thumbnail/1746946340592190.jpg', NULL, 1, NULL, 1, 1, '2022-10-17 14:44:17', NULL),
(7, 1, 3, 10, 25, 'Panasonic AG', 'প্যানাসনিক এজি', 'panasonic-ag', 'প্যানাসনিক-এজি', 'ECVPA001', '50', 'Panasonic', 'প্যানাসনিক', NULL, NULL, 'Black', 'কালো', '170000', '150000', '<span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\">Panasonic AG-UX90ED 4K Professional Camcorder records UHD 4K at up to 30p, and FHD up to 60p in variable frame mode.</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Panasonic AG-UX90ED 4K প্রফেশনাল ক্যামকর্ডার 30p পর্যন্ত UHD 4K এবং পরিবর্তনশীল ফ্রেম মোডে 60p পর্যন্ত FHD রেকর্ড করে।</span>', '<span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\">&nbsp;The camera supports 59.94, which is analogous to NTSC, making the camera compatible with US broadcast standards.</span><span style=\"color: rgb(1, 19, 45); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\">&nbsp;It features an integrated 15x optical zoom lens and a 1\"-type sensor, and can record UHD 4K and Full HD in MOV and MP4. The camera is also capable of recording HD in the AVCHD format.</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">ক্যামেরাটি 59.94 সমর্থন করে, যা NTSC-এর অনুরূপ, যা ক্যামেরাটিকে মার্কিন সম্প্রচার মানগুলির সাথে সামঞ্জস্যপূর্ণ করে তোলে।&nbsp;</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">এটিতে একটি সমন্বিত 15x অপটিক্যাল জুম লেন্স এবং একটি 1\"-টাইপ সেন্সর রয়েছে এবং এটি MOV এবং MP4 তে UHD 4K এবং ফুল HD রেকর্ড করতে পারে৷ ক্যামেরাটি AVCHD ফর্ম্যাটে HD রেকর্ড করতেও সক্ষম৷</span>', 'uploads/products/thumbnail/1746946657356312.jfif', NULL, 1, 1, NULL, 1, '2022-10-17 14:49:19', NULL),
(8, 1, 4, 16, 32, 'Walton Primo NX6', 'ওয়াল্টন প্রিমো এনএক্স৬', 'walton-primo-nx6', 'ওয়াল্টন-প্রিমো-এনএক্স৬', 'EPWGO001', '20', 'Walton', 'ওয়াল্টন', NULL, NULL, 'White', 'সাদা', '25000', '18000', '<span style=\"color: rgb(44, 47, 52); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Arial, sans-serif; font-size: 15px;\">Walton Primo RX8 comes with 6.55 inches HD+ LTPS screen. It has a full-view left punch-hole design.&nbsp;</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Walton Primo RX8 6.55 ইঞ্চি HD+ LTPS স্ক্রিন সহ আসে। এটিতে একটি ফুল-ভিউ বাম পাঞ্চ-হোল ডিজাইন রয়েছে।</span>', '<span style=\"color: rgb(44, 47, 52); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Arial, sans-serif; font-size: 15px;\">&nbsp;The back camera is of quad 16+2+8+5 MP with PDAF, depth sensor, ultrawide, LED flash, f/2.0 aperture etc. features and Full HD video recording. The front camera is of 32 MP.</span><span style=\"color: rgb(44, 47, 52); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, &quot;Open Sans&quot;, Arial, sans-serif; font-size: 15px;\">&nbsp;Primo RX8 comes with 4000 mAh battery and 18W fast charging support. It has 4 GB RAM, 2.0 GHz octa-core CPU and PowerVR GE8320 GPU.</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">পিডিএএফ, ডেপথ সেন্সর, আল্ট্রাওয়াইড, এলইডি ফ্ল্যাশ, এফ/২.০ অ্যাপারচার ইত্যাদি বৈশিষ্ট্য এবং ফুল এইচডি ভিডিও রেকর্ডিং সহ ব্যাক ক্যামেরাটি কোয়াড 16+2+8+5 এমপি। সামনের ক্যামেরাটি 32 এমপির।</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Primo RX8 4000 mAh ব্যাটারি এবং 18W দ্রুত চার্জিং সমর্থন সহ আসে। এতে রয়েছে 4 GB RAM, 2.0 GHz octa-core CPU এবং PowerVR GE8320 GPU।</span>', 'uploads/products/thumbnail/1746947152651148.jpg', 1, NULL, 1, 1, 1, '2022-10-17 14:57:11', NULL),
(9, 2, 5, 19, 6, 'Cotton Kabli', 'সুতি কাবলি', 'cotton-kabli', 'সুতি-কাবলি', 'FMPPCK001', '50', 'Kabli', 'কাবলি', 'XXL,XL,ML,MXXL', 'এক্সএক্সএল,এক্সএল,এমএল,এমএক্সএক্সএল', 'Black,White,Blue,Gray', 'কালো,সাদা,নীল,ধূসর', '5500', '5200', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Cotton Kabli for Men</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">পুরুষদের জন্য সুতি কাবলি</span>', '<span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif;\">Product color may slightly vary due to photographic lighting sources or your monitor settings.&nbsp;</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 0.875rem;\">Measurement (in Inch): M, (Length 38\", Chest 40\"), L (Length 40\", Chest 41\"), XL (Length 42\", Chest 43\"), XXL (Length 44\", Chest 44\").C</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif;\">omfortable to wear.</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">ফটোগ্রাফিক আলোর উত্স বা আপনার মনিটরের সেটিংসের কারণে পণ্যের রঙ সামান্য পরিবর্তিত হতে পারে। পরিমাপ (ইঞ্চিতে): M, (দৈর্ঘ্য 38\", বুক 40\"), L (দৈর্ঘ্য 40\", বুক 41\"), XL (দৈর্ঘ্য 42\", বুক 43\"), XXL (দৈর্ঘ্য 44\", বুক 44\") .পরতে আরামদায়ক.</span>', 'uploads/products/thumbnail/1747182824597181.jfif', 1, 1, 1, 1, 1, '2022-10-20 05:23:06', NULL),
(10, 2, 5, 17, 35, 'Stripe Shirt', 'ডোরা শার্ট', 'stripe-shirt', 'ডোরা-শার্ট', 'FMNST001', '60', 'Nike,Stripe', 'নাইকি,ডোরাকাটা', 'XXL,XL,ML', 'এক্সএক্সএল,এক্সএল,এমএল', 'Black,Blue,Yellow', 'কালো,নীল,হলুদ', '800', '750', '<h1 itemprop=\"name\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none; padding: 0px; box-sizing: border-box; font-size: 25px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\">Stripe Polo Shirt for Men</h1>', '<div><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">পুরুষদের জন্য স্ট্রাইপ নাইকি শার্ট-আরএ</span><br></div>', '<span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif;\">Product color may slightly vary due to photographic lighting sources or your monitor&nbsp;</span><font color=\"#777777\" face=\"Open Sans, sans-serif\">settings Machine&nbsp;wash according to instructions on care label.&nbsp;</font><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 0.875rem;\">Measurement (In Inch):&nbsp;M (Chest 36\", Body Length 26\"), L (Chest 38\", Body Length 28\"), XL (Chest 40\", Body Length 29\").</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 0.875rem;\">Color: As same as picture.</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">ফটোগ্রাফিক লাইটিং সোর্স বা কেয়ার লেবেলের নির্দেশাবলী অনুযায়ী আপনার মনিটরের সেটিংস মেশিন ওয়াশের কারণে পণ্যের রঙের কিছুটা তারতম্য হতে পারে।</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">পরিমাপ (ইঞ্চিতে):&nbsp;M (বুক 36\", শরীরের দৈর্ঘ্য 26\"), L (বুক 38\", শরীরের দৈর্ঘ্য 28\"), XL (বুক 40\", শরীরের দৈর্ঘ্য 29\")। রঙ: ছবির মতোই।</span>', 'uploads/products/thumbnail/1747183689863099.jpeg', 1, 1, 1, 1, 1, '2022-10-20 05:36:51', NULL),
(11, 2, 6, 20, 5, 'Indian Cotton Dress', 'ভারতীয় সুতির পোশাক', 'indian-cotton-dress', 'ভারতীয়-সুতির-পোশাক', 'FWTPI001', '50', 'Three piece', 'থ্রি পিছ', 'XL,XXL', 'এক্সএল,এক্সএক্সএল', 'Black,Blue,Yellow', 'কালো,নীল,হলুদ', '2500', '2200', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">Digital Print Embroidery Unstitched Indian Cotton Dress</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">ডিজিটাল প্রিন্ট এমব্রয়ডারি আনস্টিচড&nbsp;</span><font color=\"#252525\" face=\"Roboto, arial, sans-serif\"><span style=\"font-size: 18px;\">ভারতীয় সুতির পোশাক</span></font>', '<span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif;\">Indian sequins e</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif;\">mbroidered.&nbsp;</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 0.875rem;\">Unstitched Dress Set.&nbsp;</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif;\">Fashionable and trend.&nbsp;</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, sans-serif;\">Product color may slightly vary due to photographic lighting sources or your monitor settings.</span>', '<span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">ভারতীয় সিকুইনস&nbsp;</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">এমব্রয়ডারি করা&nbsp;</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">সেলাইবিহীন ড্রেস সেট,&nbsp;</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">ফ্যাশনেবল এবং প্রবণতা.&nbsp;</span><span style=\"color: rgb(37, 37, 37); font-family: Roboto, arial, sans-serif; font-size: 18px;\">ফটোগ্রাফিক আলোর উত্স বা আপনার মনিটরের সেটিংসের কারণে পণ্যের রঙ সামান্য পরিবর্তিত হতে পারে।</span>', 'uploads/products/thumbnail/1747185180331433.jfif', 1, 1, 1, 1, 1, '2022-10-20 06:00:32', NULL),
(12, 3, 7, 33, 63, 'Big Diamond Potato', 'বড় ডায়মন্ড আলু', 'big-diamond-potato', 'বড়-ডায়মন্ড-আলু', 'GFA&V001', '0', 'Potato', 'আলু', 'Big,Medium', 'বড়,মাঝারী', NULL, NULL, '60', '55', '<h1 itemprop=\"name\" data-reactid=\".9in7p7ow3y.a.2.0.0.0.0.2.5.1.0:$p5594.0.6.0.1.0.1.0.0\" style=\"box-sizing: border-box; -webkit-tap-highlight-color: transparent; margin-right: 30px; margin-bottom: 10px; margin-left: 0px; padding: 0px; overflow-wrap: break-word; line-height: 30px;\"><font face=\"segoe ui, Helvetica, droid sans, Arial, lucida grande, tahoma, verdana, arial, sans-serif\"><span style=\"font-size: 30.8px;\">Boro Alu (Big Diamond Potato)&nbsp;</span></font><br></h1>', 'বড় আলু ( বড় ডায়মন্ড আলু&nbsp; )', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;segoe ui&quot;, Helvetica, &quot;droid sans&quot;, Arial, &quot;lucida grande&quot;, tahoma, verdana, arial, sans-serif;\">Potato is a very healthy food and popular vegetable all over the world. Potatoes are available year-round as they are harvested somewhere every month of the year. potato\'s have lots of variety. these Potatoes are comparatively bigger than regular Potatoes. potatoes contain a goodly amount of carbohydrate&nbsp;</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;segoe ui&quot;, Helvetica, &quot;droid sans&quot;, Arial, &quot;lucida grande&quot;, tahoma, verdana, arial, sans-serif;\">Potato is a very healthy food and popular vegetable all over the world. Potatoes are available year-round as they are harvested somewhere every month of the year. potato\'s have lots of variety. these Potatoes are comparatively bigger than regular Potatoes. potatoes contain a goodly amount of carbohydrate (starch and sugar) they are also a storehouse for many vitamins and minerals.&nbsp;</span>', 'আলু একটি অত্যন্ত স্বাস্থ্যকর খাবার এবং সারা বিশ্বে জনপ্রিয় সবজি। বছরের প্রতি মাসে কোথাও না কোথাও আলু তোলা হয় বলে সারা বছরই আলু পাওয়া যায়। আলুতে প্রচুর বৈচিত্র্য রয়েছে। এই আলু সাধারণ আলু থেকে তুলনামূলকভাবে বড়। আলুতে প্রচুর পরিমাণে কার্বোহাইড্রেট থাকে (স্টার্চ এবং চিনি) তারা অনেক ভিটামিন এবং খনিজগুলির ভাণ্ডারও বটে।', 'uploads/products/thumbnail/1747185852808325.webp', 1, 1, 1, 1, 1, '2022-10-20 06:11:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_districts`
--

CREATE TABLE `shipping_districts` (
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_districts`
--

INSERT INTO `shipping_districts` (`district_id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Habiganj', '2022-11-05 06:17:25', NULL),
(2, 1, 'Moulvibazar', '2022-11-05 06:17:36', NULL),
(3, 1, 'Sunamganj', '2022-11-05 06:17:49', NULL),
(4, 1, 'Sylhet', '2022-11-05 06:18:00', NULL),
(5, 3, 'Dinajpur', '2022-11-05 06:18:24', NULL),
(6, 3, 'Gaibandha', '2022-11-05 06:18:35', NULL),
(7, 3, 'Kurigram', '2022-11-05 06:18:47', NULL),
(8, 3, 'Lalmonirhat', '2022-11-05 06:18:58', NULL),
(9, 3, 'Nilphamari', '2022-11-05 06:19:08', NULL),
(10, 3, 'Panchagarh', '2022-11-05 06:19:19', NULL),
(11, 3, 'Rangpur', '2022-11-05 06:19:28', NULL),
(12, 3, 'Thakurgaon', '2022-11-05 06:19:38', NULL),
(13, 4, 'Bogura', '2022-11-05 06:20:11', NULL),
(14, 4, 'Joypurhat', '2022-11-05 06:20:20', NULL),
(15, 4, 'Naogaon', '2022-11-05 06:20:30', NULL),
(16, 4, 'Natore', '2022-11-05 06:20:38', NULL),
(17, 4, 'Chapai Nawabganj', '2022-11-05 06:20:49', NULL),
(18, 4, 'Pabna', '2022-11-05 06:20:59', NULL),
(19, 4, 'Rajshahi', '2022-11-05 06:21:07', NULL),
(20, 4, 'Sirajganj', '2022-11-05 06:21:16', NULL),
(21, 2, 'Sherpur', '2022-11-05 06:21:37', NULL),
(22, 2, 'Netrokona', '2022-11-05 06:21:45', NULL),
(23, 2, 'Mymensingh', '2022-11-05 06:21:54', NULL),
(24, 2, 'Jamalpur', '2022-11-05 06:22:03', NULL),
(25, 5, 'Satkhira', '2022-11-05 06:22:20', NULL),
(26, 5, 'Narail', '2022-11-05 06:22:28', NULL),
(27, 5, 'Meherpur', '2022-11-05 06:22:37', NULL),
(28, 5, 'Magura', '2022-11-05 06:22:45', NULL),
(29, 5, 'Kushtia', '2022-11-05 06:22:53', NULL),
(30, 5, 'Khulna', '2022-11-05 06:23:01', NULL),
(31, 5, 'Jhenaidah', '2022-11-05 06:23:09', NULL),
(32, 5, 'Jashore', '2022-11-05 06:23:19', NULL),
(33, 5, 'Chuadanga', '2022-11-05 06:23:29', NULL),
(34, 5, 'Bagerhat', '2022-11-05 06:23:37', NULL),
(35, 8, 'Tangail', '2022-11-05 06:23:50', NULL),
(36, 8, 'Shariatpur', '2022-11-05 06:23:58', NULL),
(37, 8, 'Rajbari', '2022-11-05 06:24:06', NULL),
(38, 8, 'Narsingdi', '2022-11-05 06:24:13', NULL),
(39, 8, 'Narayanganj', '2022-11-05 06:24:22', NULL),
(40, 8, 'Munshiganj', '2022-11-05 06:24:30', NULL),
(41, 8, 'Manikganj', '2022-11-05 06:24:38', NULL),
(42, 8, 'Madaripur', '2022-11-05 06:24:46', NULL),
(43, 8, 'Kishoreganj', '2022-11-05 06:24:56', NULL),
(44, 8, 'Gopalganj', '2022-11-05 06:25:03', NULL),
(45, 8, 'Gazipur', '2022-11-05 06:25:11', NULL),
(46, 8, 'Faridpur', '2022-11-05 06:25:18', NULL),
(47, 8, 'Dhaka', '2022-11-05 06:25:26', NULL),
(48, 6, 'Rangamati', '2022-11-05 06:25:39', NULL),
(49, 6, 'Noakhali', '2022-11-05 06:25:47', NULL),
(50, 6, 'Lakshmipur', '2022-11-05 06:25:55', NULL),
(51, 6, 'Khagrachhari', '2022-11-05 06:26:03', NULL),
(52, 6, 'Feni', '2022-11-05 06:26:11', NULL),
(53, 6, 'Cox\'s Bazar', '2022-11-05 06:26:18', NULL),
(54, 6, 'Cumilla', '2022-11-05 06:26:25', NULL),
(55, 6, 'Chattogram', '2022-11-05 06:26:33', NULL),
(56, 6, 'Chandpur', '2022-11-05 06:26:41', NULL),
(57, 6, 'Brahmanbaria', '2022-11-05 06:26:51', NULL),
(58, 6, 'Bandarban', '2022-11-05 06:27:00', NULL),
(59, 7, 'Pirojpur', '2022-11-05 06:27:11', NULL),
(60, 7, 'Patuakhali', '2022-11-05 06:27:19', NULL),
(61, 7, 'Jhalokati', '2022-11-05 06:27:27', NULL),
(62, 7, 'Bhola', '2022-11-05 06:27:35', NULL),
(63, 7, 'Barishal', '2022-11-05 06:27:44', NULL),
(64, 7, 'Barguna', '2022-11-05 06:27:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_divisions`
--

CREATE TABLE `shipping_divisions` (
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_divisions`
--

INSERT INTO `shipping_divisions` (`division_id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'Sylhet', '2022-11-05 04:01:07', NULL),
(2, 'Mymensingh', '2022-11-05 04:01:22', NULL),
(3, 'Rangpur', '2022-11-05 04:01:27', NULL),
(4, 'Rajshahi', '2022-11-05 04:01:33', NULL),
(5, 'Khulna', '2022-11-05 04:01:38', NULL),
(6, 'Chattogram', '2022-11-05 04:01:43', NULL),
(7, 'Barishal', '2022-11-05 04:01:50', NULL),
(8, 'Dhaka', '2022-11-05 04:01:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_infos`
--

CREATE TABLE `shipping_infos` (
  `shippin_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` int(11) NOT NULL,
  `shipping_post_code` int(11) NOT NULL,
  `shipping_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_states`
--

CREATE TABLE `shipping_states` (
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_states`
--

INSERT INTO `shipping_states` (`state_id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 8, 47, 'Dhamrai Upazila', '2022-11-07 16:51:19', NULL),
(2, 8, 47, 'Dohar Upazila', '2022-11-07 16:52:37', NULL),
(3, 8, 47, 'Keraniganj Upazila', '2022-11-07 16:52:54', NULL),
(4, 8, 47, 'Nawabganj Upazila', '2022-11-07 16:53:07', NULL),
(5, 8, 47, 'Savar Upazila', '2022-11-07 16:53:19', NULL),
(6, 8, 45, 'Gazipur Sadar Upazila', '2022-11-07 16:53:35', NULL),
(7, 8, 45, 'Kaliakair Upazila', '2022-11-07 16:53:49', NULL),
(8, 8, 47, 'Kaliganj Upazila', '2022-11-07 16:53:59', NULL),
(9, 8, 47, 'Kapasia Upazila', '2022-11-07 16:54:09', NULL),
(10, 8, 45, 'Sreepur Upazila', '2022-11-07 16:54:23', NULL),
(11, 8, 44, 'Gopalganj Sadar Upazila', '2022-11-07 16:54:41', NULL),
(12, 8, 44, 'Kashiani Upazila', '2022-11-07 16:54:56', NULL),
(13, 8, 44, 'Kotalipara Upazila', '2022-11-07 16:55:10', NULL),
(14, 8, 44, 'Muksudpur Upazila', '2022-11-07 16:55:21', NULL),
(15, 8, 44, 'Tungipara Upazila', '2022-11-07 16:55:32', NULL),
(16, 8, 43, 'Austagram Upazila', '2022-11-07 16:55:44', NULL),
(17, 8, 43, 'Bajitpur Upazila', '2022-11-07 16:55:54', NULL),
(18, 8, 43, 'Bhairab Upazila', '2022-11-07 16:56:09', NULL),
(19, 8, 43, 'Hossainpur Upazila', '2022-11-07 16:56:21', NULL),
(20, 8, 43, 'Itna Upazila', '2022-11-07 16:56:34', NULL),
(21, 8, 43, 'Karimganj Upazila', '2022-11-07 16:56:44', NULL),
(22, 8, 43, 'Katiadi Upazila', '2022-11-07 16:56:59', NULL),
(23, 8, 43, 'Kishoreganj Sadar Upazila', '2022-11-07 16:57:10', NULL),
(24, 8, 43, 'Kuliarchar Upazila', '2022-11-07 16:57:23', NULL),
(25, 8, 43, 'Mithamain Upazila', '2022-11-07 16:57:33', NULL),
(26, 8, 43, 'Nikli Upazila', '2022-11-07 16:57:43', NULL),
(27, 8, 43, 'Pakundia Upazila', '2022-11-07 16:57:53', NULL),
(28, 8, 43, 'Tarail Upazila', '2022-11-07 16:58:07', NULL),
(29, 8, 42, 'Rajoir Upazila', '2022-11-07 16:58:30', NULL),
(30, 8, 42, 'Madaripur Sadar Upazila', '2022-11-07 16:58:42', NULL),
(31, 8, 42, 'Kalkini Upazila', '2022-11-07 16:58:52', NULL),
(32, 8, 42, 'Shibchar Upazila', '2022-11-07 16:59:02', NULL),
(33, 8, 42, 'Dasar Upazila', '2022-11-07 16:59:12', NULL),
(34, 8, 41, 'Daulatpur Upazila', '2022-11-07 16:59:29', NULL),
(35, 8, 41, 'Ghior Upazila', '2022-11-07 16:59:38', NULL),
(36, 8, 41, 'Harirampur Upazila', '2022-11-07 16:59:52', NULL),
(37, 8, 41, 'Manikgonj Sadar Upazila', '2022-11-07 17:00:10', NULL),
(38, 8, 41, 'Saturia Upazila', '2022-11-07 17:00:21', NULL),
(39, 8, 41, 'Shivalaya Upazila', '2022-11-07 17:00:31', NULL),
(40, 8, 41, 'Singair Upazila', '2022-11-07 17:00:44', NULL),
(41, 8, 40, 'Gazaria Upazila', '2022-11-07 17:01:12', NULL),
(42, 8, 40, 'Lohajang Upazila', '2022-11-07 17:01:22', NULL),
(43, 8, 40, 'Munshiganj Sadar Upazila', '2022-11-07 17:01:32', NULL),
(44, 8, 40, 'Sirajdikhan Upazila', '2022-11-07 17:01:43', NULL),
(45, 8, 40, 'Sreenagar Upazila', '2022-11-07 17:01:52', NULL),
(46, 8, 40, 'Tongibari Upazila', '2022-11-07 17:02:02', NULL),
(47, 8, 39, 'Araihazar Upazila', '2022-11-07 17:02:13', NULL),
(48, 8, 39, 'Bandar Upazila', '2022-11-07 17:02:23', NULL),
(49, 8, 39, 'Narayanganj Sadar Upazila', '2022-11-07 17:02:35', NULL),
(50, 8, 39, 'Rupganj Upazila', '2022-11-07 17:02:45', NULL),
(51, 8, 39, 'Sonargaon Upazila', '2022-11-07 17:02:55', NULL),
(52, 8, 37, 'Baliakandi Upazila', '2022-11-07 17:03:18', NULL),
(53, 8, 37, 'Goalandaghat Upazila', '2022-11-07 17:03:28', NULL),
(54, 8, 37, 'Pangsha Upazila', '2022-11-07 17:03:36', NULL),
(55, 8, 37, 'Rajbari Sadar Upazila', '2022-11-07 17:03:45', NULL),
(56, 8, 37, 'Kalukhali Upazila', '2022-11-07 17:03:58', NULL),
(57, 8, 36, 'Bhedarganj Upazila', '2022-11-07 17:04:14', NULL),
(58, 8, 36, 'Damudya Upazila', '2022-11-07 17:04:28', NULL),
(59, 8, 36, 'Gosairhat Upazila', '2022-11-07 17:04:38', NULL),
(60, 8, 36, 'Naria Upazila', '2022-11-07 17:05:01', NULL),
(61, 8, 36, 'Shariatpur Sadar Upazila', '2022-11-07 17:05:11', NULL),
(62, 8, 36, 'Zajira Upazila', '2022-11-07 17:05:23', NULL),
(63, 8, 36, 'Shakhipur Upazila', '2022-11-07 17:05:33', NULL),
(64, 8, 46, 'Alfadanga Upazila', '2022-11-07 17:05:55', NULL),
(65, 8, 46, 'Bhanga Upazila', '2022-11-07 17:06:05', NULL),
(66, 8, 46, 'Boalmari Upazila', '2022-11-07 17:06:15', NULL),
(67, 8, 46, 'Charbhadrasan Upazila', '2022-11-07 17:06:30', NULL),
(68, 8, 46, 'Faridpur Sadar Upazila', '2022-11-07 17:06:40', NULL),
(69, 8, 46, 'Madhukhali Upazila', '2022-11-07 17:06:50', NULL),
(70, 8, 46, 'Nagarkanda Upazila', '2022-11-07 17:07:01', NULL),
(71, 8, 46, 'Sadarpur Upazila', '2022-11-07 17:07:10', NULL),
(72, 8, 46, 'Saltha Upazila', '2022-11-07 17:07:20', NULL),
(73, 8, 35, 'Gopalpur Upazila', '2022-11-07 17:07:31', NULL),
(74, 8, 35, 'Basail Upazila', '2022-11-07 17:07:40', NULL),
(75, 8, 35, 'Bhuapur Upazila', '2022-11-07 17:07:50', NULL),
(76, 8, 35, 'Delduar Upazila', '2022-11-07 17:08:00', NULL),
(77, 8, 35, 'Ghatail Upazila', '2022-11-07 17:08:08', NULL),
(78, 8, 35, 'Kalihati Upazila', '2022-11-07 17:08:19', NULL),
(79, 8, 35, 'Madhupur Upazila', '2022-11-07 17:08:28', NULL),
(80, 8, 35, 'Mirzapur Upazila', '2022-11-07 17:08:37', NULL),
(81, 8, 35, 'Nagarpur Upazila', '2022-11-07 17:08:45', NULL),
(82, 8, 35, 'Sakhipur Upazila', '2022-11-07 17:08:54', NULL),
(83, 8, 35, 'Dhanbari Upazila', '2022-11-07 17:09:02', NULL),
(84, 8, 35, 'Tangail Sadar Upazila', '2022-11-07 17:09:10', NULL),
(85, 8, 38, 'Narsingdi Sadar Upazila', '2022-11-07 17:09:20', '2022-11-07 17:10:00'),
(86, 8, 38, 'Belabo Upazila', '2022-11-07 17:09:38', NULL),
(87, 8, 38, 'Monohardi Upazila', '2022-11-07 17:10:18', NULL),
(88, 8, 38, 'Palash Upazila', '2022-11-07 17:10:28', NULL),
(89, 8, 38, 'Raipura Upazila', '2022-11-07 17:10:36', NULL),
(90, 8, 38, 'Shibpur Upazila', '2022-11-07 17:10:51', NULL),
(91, 7, 64, 'Amtali Upazila', '2022-11-07 17:11:58', NULL),
(92, 7, 64, 'Bamna Upazila', '2022-11-07 17:12:10', NULL),
(93, 7, 64, 'Barguna Sadar Upazila', '2022-11-07 17:12:22', NULL),
(94, 7, 64, 'Betagi Upazila', '2022-11-07 17:12:33', NULL),
(95, 7, 64, 'Patharghata Upazila', '2022-11-07 17:12:52', NULL),
(96, 7, 64, 'Taltali Upazila', '2022-11-07 17:13:04', NULL),
(97, 7, 63, 'Agailjhara Upazila', '2022-11-07 17:13:24', NULL),
(98, 7, 63, 'Babuganj Upazila', '2022-11-07 17:13:39', NULL),
(99, 7, 63, 'Bakerganj Upazila', '2022-11-07 17:13:57', NULL),
(100, 7, 63, 'Banaripara Upazila', '2022-11-07 17:14:14', NULL),
(101, 7, 63, 'Gaurnadi Upazila', '2022-11-07 17:14:26', NULL),
(102, 7, 63, 'Hizla Upazila', '2022-11-07 17:14:46', NULL),
(103, 7, 63, 'Barishal Sadar Upazila', '2022-11-07 17:14:58', NULL),
(104, 7, 63, 'Mehendiganj Upazila', '2022-11-07 17:15:08', NULL),
(105, 7, 63, 'Muladi Upazila', '2022-11-07 17:15:19', NULL),
(106, 7, 63, 'Wazirpur Upazila', '2022-11-07 17:15:28', NULL),
(107, 7, 62, 'Bhola Sadar Upazila', '2022-11-07 17:15:39', NULL),
(108, 7, 62, 'Burhanuddin Upazila', '2022-11-07 17:15:50', NULL),
(109, 7, 62, 'Char Fasson Upazila', '2022-11-07 17:15:59', NULL),
(110, 7, 62, 'Daulatkhan Upazila', '2022-11-07 17:16:09', NULL),
(111, 7, 62, 'Lalmohan Upazila', '2022-11-07 17:16:18', NULL),
(112, 7, 62, 'Manpura Upazila', '2022-11-07 17:16:26', NULL),
(113, 7, 62, 'Tazumuddin Upazila', '2022-11-07 17:16:35', NULL),
(114, 7, 61, 'Jhalokati Sadar Upazila', '2022-11-07 17:16:48', NULL),
(115, 7, 61, 'Kathalia Upazila', '2022-11-07 17:16:58', NULL),
(116, 7, 61, 'Nalchity Upazila', '2022-11-07 17:17:07', NULL),
(117, 7, 61, 'Rajapur Upazila', '2022-11-07 17:17:20', NULL),
(118, 7, 60, 'Bauphal Upazila', '2022-11-07 17:17:32', NULL),
(119, 7, 60, 'Dashmina Upazila', '2022-11-07 17:17:42', NULL),
(120, 7, 60, 'Galachipa Upazila', '2022-11-07 17:17:51', NULL),
(121, 7, 60, 'Kalapara Upazila', '2022-11-07 17:18:00', NULL),
(122, 7, 60, 'Mirzaganj Upazila', '2022-11-07 17:18:10', NULL),
(123, 7, 60, 'Patuakhali Sadar Upazila', '2022-11-07 17:18:19', NULL),
(124, 7, 60, 'Rangabali Upazila', '2022-11-07 17:18:30', NULL),
(125, 7, 60, 'Dumki Upazila', '2022-11-07 17:18:42', NULL),
(126, 7, 59, 'Bhandaria Upazila', '2022-11-07 17:19:01', NULL),
(127, 7, 59, 'Kawkhali Upazila', '2022-11-07 17:19:11', NULL),
(128, 7, 59, 'Mathbaria Upazila', '2022-11-07 17:19:21', NULL),
(129, 7, 59, 'Nazirpur Upazila', '2022-11-07 17:19:30', NULL),
(130, 7, 59, 'Pirojpur Sadar Upazila', '2022-11-07 17:19:40', NULL),
(131, 7, 59, 'Nesarabad (Swarupkati) Upazila', '2022-11-07 17:19:52', NULL),
(132, 7, 59, 'Indurkani Upazila', '2022-11-07 17:20:01', NULL),
(133, 6, 58, 'Ali Kadam Upazila', '2022-11-14 14:53:48', NULL),
(134, 6, 58, 'Bandarban Sadar Upazila', '2022-11-14 14:54:21', NULL),
(135, 6, 58, 'Lama Upazila', '2022-11-14 14:54:33', NULL),
(136, 6, 58, 'Naikhongchhari Upazila', '2022-11-14 14:55:16', NULL),
(137, 6, 58, 'Rowangchhari Upazila', '2022-11-14 14:55:36', NULL),
(138, 6, 58, 'Ruma Upazila', '2022-11-14 14:56:09', NULL),
(139, 6, 58, 'Thanchi Upazila', '2022-11-14 14:56:24', NULL),
(140, 6, 57, 'Akhaura Upazila', '2022-11-14 14:56:38', NULL),
(141, 6, 57, 'Bancharampur Upazila', '2022-11-14 14:56:55', NULL),
(142, 6, 57, 'Brahmanbaria Sadar Upazila', '2022-11-14 14:57:05', NULL),
(143, 6, 57, 'Kasba Upazila', '2022-11-14 14:57:18', NULL),
(144, 6, 57, 'Nabinagar Upazila', '2022-11-14 14:57:30', NULL),
(145, 6, 57, 'Nasirnagar Upazila', '2022-11-14 14:57:39', NULL),
(146, 6, 57, 'Sarail Upazila', '2022-11-14 14:58:29', NULL),
(147, 6, 57, 'Ashuganj Upazila', '2022-11-14 14:58:41', NULL),
(148, 6, 57, 'Bijoynagar Upazila', '2022-11-14 14:58:55', NULL),
(149, 6, 56, 'Chandpur Sadar Upazila', '2022-11-14 14:59:15', NULL),
(150, 6, 56, 'Faridganj Upazila', '2022-11-14 14:59:27', NULL),
(151, 6, 56, 'Haimchar Upazila', '2022-11-14 15:00:01', NULL),
(152, 6, 56, 'Haziganj Upazila', '2022-11-14 15:00:10', NULL),
(153, 6, 56, 'Kachua Upazila', '2022-11-14 15:00:20', NULL),
(154, 6, 56, 'Matlab Dakshin Upazila', '2022-11-14 15:00:34', NULL),
(155, 6, 56, 'Matlab Uttar Upazila', '2022-11-14 15:00:52', NULL),
(156, 6, 56, 'Shahrasti Upazila', '2022-11-14 15:01:10', NULL),
(157, 6, 55, 'Anwara Upazila', '2022-11-14 15:01:22', NULL),
(158, 6, 55, 'Banshkhali Upazila', '2022-11-14 15:01:35', NULL),
(159, 6, 55, 'Boalkhali Upazila', '2022-11-14 15:01:46', NULL),
(160, 6, 55, 'Chandanaish Upazila', '2022-11-14 15:01:58', NULL),
(161, 6, 55, 'Fatikchhari Upazila', '2022-11-14 15:02:08', NULL),
(162, 6, 55, 'Hathazari Upazila', '2022-11-14 15:02:18', NULL),
(163, 6, 55, 'Karnaphuli Upazila', '2022-11-14 15:02:30', NULL),
(164, 6, 55, 'Lohagara Upazila', '2022-11-14 15:02:43', NULL),
(165, 6, 55, 'Mirsharai Upazila', '2022-11-14 15:02:54', NULL),
(166, 6, 55, 'Patiya Upazila', '2022-11-14 15:03:03', NULL),
(167, 6, 55, 'Rangunia Upazila', '2022-11-14 15:03:20', NULL),
(168, 6, 55, 'Raozan Upazila', '2022-11-14 15:03:30', NULL),
(169, 6, 55, 'Sandwip Upazila', '2022-11-14 15:03:41', NULL),
(170, 6, 55, 'Satkania Upazila', '2022-11-14 15:03:50', NULL),
(171, 6, 55, 'Sitakunda Upazila', '2022-11-14 15:04:10', NULL),
(172, 6, 54, 'Barura Upazila', '2022-11-14 15:04:22', NULL),
(173, 6, 54, 'Brahmanpara Upazila', '2022-11-14 15:04:35', NULL),
(174, 6, 54, 'Burichang Upazila', '2022-11-14 15:04:53', NULL),
(175, 6, 54, 'Chandina Upazila', '2022-11-14 15:05:06', NULL),
(176, 6, 54, 'Chauddagram Upazila', '2022-11-14 15:05:18', NULL),
(177, 6, 54, 'Daudkandi Upazila', '2022-11-14 15:05:34', NULL),
(178, 6, 54, 'Debidwar Upazila', '2022-11-14 15:05:46', NULL),
(179, 6, 54, 'Homna Upazila', '2022-11-14 15:05:56', NULL),
(180, 6, 54, 'Laksam Upazila', '2022-11-14 15:06:09', NULL),
(181, 6, 54, 'Lalmai Upazila', '2022-11-14 15:06:19', NULL),
(182, 6, 54, 'Muradnagar Upazila', '2022-11-14 15:06:28', NULL),
(183, 6, 54, 'Nangalkot Upazila', '2022-11-14 15:06:38', NULL),
(184, 6, 54, 'Cumilla Adarsha Sadar Upazila', '2022-11-14 15:06:56', NULL),
(185, 6, 54, 'Meghna Upazila', '2022-11-14 15:07:08', NULL),
(186, 6, 54, 'Titas Upazila', '2022-11-14 15:07:19', NULL),
(187, 6, 54, 'Monohargonj Upazila', '2022-11-14 15:07:29', NULL),
(188, 6, 54, 'Cumilla Sadar Dakshin Upazila', '2022-11-14 15:07:39', NULL),
(189, 6, 53, 'Chakaria Upazila', '2022-11-14 15:07:53', NULL),
(190, 6, 53, 'Cox\'s Bazar Sadar Upazila', '2022-11-14 15:08:04', NULL),
(191, 6, 53, 'Kutubdia Upazila', '2022-11-14 15:08:16', NULL),
(192, 6, 53, 'Maheshkhali Upazila', '2022-11-14 15:08:29', NULL),
(193, 6, 53, 'Ramu Upazila', '2022-11-14 15:08:40', NULL),
(194, 6, 53, 'Teknaf Upazila', '2022-11-14 15:08:49', NULL),
(195, 6, 53, 'Ukhia Upazila', '2022-11-14 15:09:02', NULL),
(196, 6, 53, 'Pekua Upazila', '2022-11-14 15:09:13', NULL),
(197, 6, 53, 'Eidgaon Upazila', '2022-11-14 15:09:21', NULL),
(198, 6, 52, 'Chhagalnaiya Upazila', '2022-11-14 15:09:33', NULL),
(199, 6, 52, 'Daganbhuiyan Upazila', '2022-11-14 15:09:43', NULL),
(200, 6, 52, 'Feni Sadar Upazila', '2022-11-14 15:10:02', NULL),
(201, 6, 52, 'Parshuram Upazila', '2022-11-14 15:10:18', NULL),
(202, 6, 52, 'Sonagazi Upazila', '2022-11-14 15:10:33', NULL),
(203, 6, 52, 'Fulgazi Upazila', '2022-11-14 15:10:49', NULL),
(204, 6, 51, 'Dighinala Upazila', '2022-11-14 15:11:02', NULL),
(205, 6, 51, 'Khagrachhari Upazila', '2022-11-14 15:11:16', NULL),
(206, 6, 51, 'Lakshmichhari Upazila', '2022-11-14 15:11:35', NULL),
(207, 6, 51, 'Mahalchhari Upazila', '2022-11-14 15:11:53', NULL),
(208, 6, 51, 'Manikchhari Upazila', '2022-11-14 15:26:06', NULL),
(209, 6, 51, 'Matiranga Upazila', '2022-11-14 15:26:22', NULL),
(210, 6, 51, 'Panchhari Upazila', '2022-11-14 15:26:32', NULL),
(211, 6, 51, 'Ramgarh Upazila', '2022-11-14 15:26:42', NULL),
(212, 6, 50, 'Lakshmipur Sadar Upazila', '2022-11-14 15:26:57', NULL),
(213, 6, 50, 'Raipur Upazila', '2022-11-14 15:27:09', NULL),
(214, 6, 50, 'Ramganj Upazila', '2022-11-14 15:27:20', NULL),
(215, 6, 50, 'Ramgati Upazila', '2022-11-14 15:27:32', NULL),
(216, 6, 50, 'Kamalnagar Upazila', '2022-11-14 15:27:53', NULL),
(217, 6, 49, 'Begumganj Upazila', '2022-11-14 15:28:03', NULL),
(218, 6, 49, 'Noakhali Sadar Upazila', '2022-11-14 15:28:15', NULL),
(219, 6, 49, 'Chatkhil Upazila', '2022-11-14 15:28:25', NULL),
(220, 6, 49, 'Companiganj Upazila', '2022-11-14 15:28:35', NULL),
(221, 6, 49, 'Hatiya Upazila', '2022-11-14 15:28:46', NULL),
(222, 6, 49, 'Senbagh Upazila', '2022-11-14 15:29:00', NULL),
(223, 6, 49, 'Sonaimuri Upazila', '2022-11-14 15:29:31', NULL),
(224, 6, 49, 'Subarnachar Upazila', '2022-11-14 15:29:50', NULL),
(225, 6, 49, 'Kabirhat Upazila', '2022-11-14 15:30:01', NULL),
(226, 6, 48, 'Bagaichhari Upazila', '2022-11-14 15:30:12', NULL),
(227, 6, 48, 'Barkal Upazila', '2022-11-14 15:30:23', NULL),
(228, 6, 48, 'Kawkhali (Betbunia) Upazila', '2022-11-14 15:30:34', NULL),
(229, 6, 48, 'Belaichhari Upazila', '2022-11-14 15:30:43', NULL),
(230, 6, 48, 'Kaptai Upazila', '2022-11-14 15:30:52', NULL),
(231, 6, 48, 'Juraichhari Upazila', '2022-11-14 15:31:02', NULL),
(232, 6, 48, 'Langadu Upazila', '2022-11-14 15:31:12', NULL),
(233, 6, 48, 'Naniyachar Upazila', '2022-11-14 15:31:25', NULL),
(234, 6, 48, 'Rajasthali Upazila', '2022-11-14 15:31:36', NULL),
(235, 6, 48, 'Rangamati Sadar Upazila', '2022-11-14 15:31:49', NULL),
(236, 5, 34, 'Bagerhat Sadar Upazila', '2022-11-14 15:32:33', NULL),
(237, 5, 34, 'Chitalmari Upazila', '2022-11-14 15:32:44', NULL),
(238, 5, 34, 'Fakirhat Upazila', '2022-11-14 15:32:57', NULL),
(239, 5, 34, 'Kachua Upazila', '2022-11-14 15:33:09', NULL),
(240, 5, 34, 'Mollahat Upazila', '2022-11-14 15:33:22', NULL),
(241, 5, 34, 'Mongla Upazila', '2022-11-14 15:33:32', NULL),
(242, 5, 34, 'Morrelganj Upazila', '2022-11-14 15:33:47', NULL),
(243, 5, 34, 'Rampal Upazila', '2022-11-14 15:33:59', NULL),
(244, 5, 34, 'Sarankhola Upazila', '2022-11-14 15:34:09', NULL),
(245, 5, 33, 'Alamdanga Upazila', '2022-11-14 15:34:22', NULL),
(246, 5, 33, 'Chuadanga Sadar Upazila', '2022-11-14 15:34:35', NULL),
(247, 5, 33, 'Damurhuda Upazila', '2022-11-14 15:34:47', NULL),
(248, 5, 33, 'Jibannagar Upazila', '2022-11-14 15:34:59', NULL),
(249, 5, 32, 'Abhaynagar Upazila', '2022-11-14 15:35:18', NULL),
(250, 5, 32, 'Bagherpara Upazila', '2022-11-14 15:35:29', NULL),
(251, 5, 32, 'Chaugachha Upazila', '2022-11-14 15:35:43', NULL),
(252, 5, 32, 'Jhikargachha Upazila', '2022-11-14 15:35:57', NULL),
(253, 5, 32, 'Keshabpur Upazila', '2022-11-14 15:36:10', NULL),
(254, 5, 32, 'Jashore Sadar Upazila', '2022-11-14 15:36:29', NULL),
(255, 5, 32, 'Manirampur Upazila', '2022-11-14 15:36:41', NULL),
(256, 5, 32, 'Sharsha Upazila', '2022-11-14 15:36:53', NULL),
(257, 5, 31, 'Harinakunda Upazila', '2022-11-14 15:37:06', NULL),
(258, 5, 31, 'Jhenaidah Sadar Upazila', '2022-11-14 15:37:18', NULL),
(259, 5, 31, 'Kaliganj Upazila', '2022-11-14 15:37:29', NULL),
(260, 5, 31, 'Kotchandpur Upazila', '2022-11-14 15:37:41', NULL),
(261, 5, 31, 'Maheshpur Upazila', '2022-11-14 15:37:57', NULL),
(262, 5, 31, 'Shailkupa Upazila', '2022-11-14 15:38:12', NULL),
(263, 5, 30, 'Batiaghata Upazila', '2022-11-14 15:38:29', NULL),
(264, 5, 30, 'Dacope Upazila', '2022-11-14 15:38:40', NULL),
(265, 5, 30, 'Dumuria Upazila', '2022-11-14 15:38:53', NULL),
(266, 5, 30, 'Dighalia Upazila', '2022-11-14 15:39:02', NULL),
(267, 5, 30, 'Koyra Upazila', '2022-11-14 15:39:14', NULL),
(268, 5, 30, 'Paikgachha Upazila', '2022-11-14 15:39:25', NULL),
(269, 5, 30, 'Phultala Upazila', '2022-11-14 15:39:43', NULL),
(270, 5, 30, 'Phultala Upazila', '2022-11-14 15:39:59', NULL),
(271, 5, 30, 'Terokhada Upazila', '2022-11-14 15:40:11', NULL),
(272, 5, 29, 'Bheramara Upazila', '2022-11-14 15:52:08', NULL),
(273, 5, 29, 'Daulatpur Upazila', '2022-11-14 15:52:19', NULL),
(274, 5, 29, 'Khoksa Upazila', '2022-11-14 15:52:34', NULL),
(275, 5, 29, 'Kumarkhali Upazila', '2022-11-14 15:52:46', NULL),
(276, 5, 29, 'Kushtia Sadar Upazila', '2022-11-14 15:53:16', NULL),
(277, 5, 29, 'Mirpur Upazila', '2022-11-14 15:53:32', NULL),
(278, 5, 28, 'Magura Sadar Upazila', '2022-11-14 15:53:51', NULL),
(279, 5, 28, 'Mohammadpur Upazila', '2022-11-14 15:54:02', NULL),
(280, 5, 28, 'Shalikha Upazila', '2022-11-14 15:54:15', NULL),
(281, 5, 28, 'Sreepur Upazila', '2022-11-14 15:54:28', NULL),
(282, 5, 27, 'Gangni Upazila', '2022-11-14 15:54:42', NULL),
(283, 5, 27, 'Meherpur Sadar Upazila', '2022-11-14 15:54:52', NULL),
(284, 5, 27, 'Mujibnagar Upazila', '2022-11-14 15:55:03', NULL),
(285, 5, 26, 'Kalia Upazila', '2022-11-14 15:55:14', NULL),
(286, 5, 26, 'Lohagara Upazila', '2022-11-14 15:55:25', NULL),
(287, 5, 26, 'Narail Sadar Upazila', '2022-11-14 16:02:32', NULL),
(288, 5, 26, 'Naragati Thana', '2022-11-14 16:02:42', NULL),
(289, 5, 25, 'Assasuni Upazila', '2022-11-14 16:02:56', NULL),
(290, 5, 25, 'Debhata Upazila', '2022-11-14 16:03:08', NULL),
(291, 5, 25, 'Kalaroa Upazila', '2022-11-14 16:03:19', NULL),
(292, 5, 25, 'Kaliganj Upazila', '2022-11-14 16:03:29', NULL),
(293, 5, 25, 'Satkhira Sadar Upazila', '2022-11-14 16:03:39', NULL),
(294, 5, 25, 'Shyamnagar Upazila', '2022-11-14 16:03:49', NULL),
(295, 5, 25, 'Tala Upazila', '2022-11-14 16:04:00', NULL),
(296, 4, 14, 'Akkelpur Upazila', '2022-11-14 16:04:29', NULL),
(297, 4, 14, 'Joypurhat Sadar Upazila', '2022-11-14 16:04:42', NULL),
(298, 4, 14, 'Kalai Upazila', '2022-11-14 16:04:52', NULL),
(299, 4, 14, 'Khetlal Upazila', '2022-11-14 16:05:02', NULL),
(300, 4, 14, 'Panchbibi Upazila', '2022-11-14 16:05:14', NULL),
(301, 4, 13, 'Adamdighi Upazila', '2022-11-14 16:05:41', NULL),
(302, 4, 13, 'Bogura Sadar Upazila', '2022-11-14 16:05:51', NULL),
(303, 4, 13, 'Dhunat Upazila', '2022-11-14 16:06:00', NULL),
(304, 4, 13, 'Dhupchanchia Upazila', '2022-11-14 16:06:09', NULL),
(305, 4, 13, 'Gabtali Upazila', '2022-11-14 16:06:19', NULL),
(306, 4, 13, 'Kahaloo Upazila', '2022-11-14 16:06:31', NULL),
(307, 4, 13, 'Nandigram Upazila', '2022-11-14 16:06:49', NULL),
(308, 4, 13, 'Sariakandi Upazila', '2022-11-14 16:07:01', NULL),
(309, 4, 13, 'Shajahanpur Upazila', '2022-11-14 16:07:09', NULL),
(310, 4, 13, 'Sherpur Upazila', '2022-11-14 16:07:20', NULL),
(311, 4, 13, 'Shibganj Upazila', '2022-11-14 16:07:30', NULL),
(312, 4, 13, 'Sonatola Upazila', '2022-11-14 16:07:42', NULL),
(313, 4, 15, 'Atrai Upazila', '2022-11-14 16:07:54', NULL),
(314, 4, 15, 'Badalgachhi Upazila', '2022-11-14 16:08:07', NULL),
(315, 4, 15, 'Manda Upazila', '2022-11-14 16:08:22', NULL),
(316, 4, 15, 'Dhamoirhat Upazila', '2022-11-14 16:08:34', NULL),
(317, 4, 15, 'Mohadevpur Upazila', '2022-11-14 16:08:46', NULL),
(318, 4, 15, 'Naogaon Sadar Upazila', '2022-11-14 16:08:57', NULL),
(319, 4, 15, 'Niamatpur Upazila', '2022-11-14 16:09:07', NULL),
(320, 4, 15, 'Patnitala Upazila', '2022-11-14 16:09:19', NULL),
(321, 4, 15, 'Porsha Upazila', '2022-11-14 16:09:28', NULL),
(322, 4, 15, 'Raninagar Upazila', '2022-11-14 16:09:38', NULL),
(323, 4, 15, 'Sapahar Upazila', '2022-11-14 16:09:48', NULL),
(324, 4, 16, 'Bagatipara Upazila', '2022-11-14 16:10:02', NULL),
(325, 4, 16, 'Baraigram Upazila', '2022-11-14 16:10:13', NULL),
(326, 4, 16, 'Gurudaspur Upazila', '2022-11-14 16:10:28', NULL),
(327, 4, 16, 'Lalpur Upazila', '2022-11-14 16:10:41', NULL),
(328, 4, 16, 'Natore Sadar Upazila', '2022-11-14 16:10:53', NULL),
(329, 4, 16, 'Singra Upazila', '2022-11-14 16:11:07', NULL),
(330, 4, 16, 'Naldanga Upazila', '2022-11-14 16:11:20', NULL),
(331, 4, 17, 'Bholahat Upazila', '2022-11-14 16:12:26', NULL),
(332, 4, 17, 'Gomastapur Upazila', '2022-11-14 16:12:36', NULL),
(333, 4, 17, 'Nachole Upazila', '2022-11-14 16:12:47', NULL),
(334, 4, 17, 'Nawabganj Sadar Upazila', '2022-11-14 16:13:01', NULL),
(335, 4, 17, 'Shibganj Upazila', '2022-11-14 16:13:14', NULL),
(336, 4, 18, 'Atgharia Upazila', '2022-11-14 16:13:27', NULL),
(337, 4, 18, 'Bera Upazila', '2022-11-14 16:13:36', NULL),
(338, 4, 18, 'Bhangura Upazila', '2022-11-14 16:13:48', NULL),
(339, 4, 18, 'Chatmohar Upazila', '2022-11-14 16:13:59', NULL),
(340, 4, 18, 'Faridpur Upazila', '2022-11-14 16:14:14', NULL),
(341, 4, 18, 'Ishwardi Upazila', '2022-11-14 16:14:27', NULL),
(342, 4, 18, 'Pabna Sadar Upazila', '2022-11-14 16:14:40', NULL),
(343, 4, 18, 'Santhia Upazila', '2022-11-14 16:14:50', NULL),
(344, 4, 18, 'Sujanagar Upazila', '2022-11-14 16:14:59', NULL),
(345, 4, 20, 'Belkuchi Upazila', '2022-11-14 16:15:11', NULL),
(346, 4, 20, 'Chauhali Upazila', '2022-11-14 16:15:22', NULL),
(347, 4, 20, 'Kamarkhanda Upazila', '2022-11-14 16:15:34', NULL),
(348, 4, 20, 'Kazipur Upazila', '2022-11-14 16:15:55', NULL),
(349, 4, 20, 'Raiganj Upazila', '2022-11-14 16:16:08', NULL),
(350, 4, 20, 'Shahjadpur Upazila', '2022-11-14 16:16:19', NULL),
(351, 4, 20, 'Sirajganj Sadar Upazila', '2022-11-14 16:16:30', NULL),
(352, 4, 20, 'Tarash Upazila', '2022-11-14 16:16:43', NULL),
(353, 4, 20, 'Ullahpara Upazila', '2022-11-14 16:16:53', NULL),
(354, 4, 19, 'Bagha Upazila', '2022-11-14 16:17:03', NULL),
(355, 4, 19, 'Bagmara Upazila', '2022-11-14 16:17:12', NULL),
(356, 4, 19, 'Charghat Upazila', '2022-11-14 16:17:22', NULL),
(357, 4, 19, 'Durgapur Upazila', '2022-11-14 16:17:31', NULL),
(358, 4, 19, 'Godagari Upazila', '2022-11-14 16:17:41', NULL),
(359, 4, 19, 'Mohanpur Upazila', '2022-11-14 16:17:56', NULL),
(360, 4, 19, 'Paba Upazila', '2022-11-14 16:18:07', NULL),
(361, 4, 19, 'Puthia Upazila', '2022-11-14 16:18:16', NULL),
(362, 4, 19, 'Tanore Upazila', '2022-11-14 16:18:27', NULL),
(363, 3, 5, 'Birampur Upazila', '2022-11-14 17:43:17', NULL),
(364, 3, 5, 'Birganj Upazila', '2022-11-14 17:43:32', NULL),
(365, 3, 5, 'Biral Upazila', '2022-11-14 17:43:42', NULL),
(366, 3, 5, 'Bochaganj Upazila', '2022-11-14 17:43:52', NULL),
(367, 3, 5, 'Chirirbandar Upazila', '2022-11-14 17:44:01', NULL),
(368, 3, 5, 'Phulbari Upazila', '2022-11-14 17:44:11', NULL),
(369, 3, 5, 'Ghoraghat Upazila', '2022-11-14 17:44:21', NULL),
(370, 3, 5, 'Hakimpur Upazila', '2022-11-14 17:44:31', NULL),
(371, 3, 5, 'Kaharole Upazila', '2022-11-14 17:44:40', NULL),
(372, 3, 5, 'Khansama Upazila', '2022-11-14 17:44:49', NULL),
(373, 3, 5, 'Dinajpur Sadar Upazila', '2022-11-14 17:44:58', NULL),
(374, 3, 5, 'Nawabganj Upazila', '2022-11-14 17:45:07', NULL),
(375, 3, 5, 'Parbatipur Upazila', '2022-11-14 17:45:26', NULL),
(376, 3, 6, 'Phulchhari Upazila', '2022-11-14 17:45:55', NULL),
(377, 3, 6, 'Gaibandha Sadar Upazila', '2022-11-14 17:46:13', NULL),
(378, 3, 6, 'Gobindaganj Upazila', '2022-11-14 17:46:28', NULL),
(379, 3, 6, 'Palashbari Upazila', '2022-11-14 17:46:39', NULL),
(380, 3, 6, 'Sadullapur Upazila', '2022-11-14 17:46:48', NULL),
(381, 3, 6, 'Sughatta Upazila', '2022-11-14 17:47:01', NULL),
(382, 3, 6, 'Sundarganj Upazila', '2022-11-14 17:47:40', NULL),
(383, 3, 7, 'Bhurungamari Upazila', '2022-11-14 17:47:50', NULL),
(384, 3, 7, 'Char Rajibpur Upazila', '2022-11-14 17:48:09', NULL),
(385, 3, 7, 'Chilmari Upazila', '2022-11-14 17:48:28', NULL),
(386, 3, 7, 'Phulbari Upazila', '2022-11-14 17:48:44', NULL),
(387, 3, 7, 'Kurigram Sadar Upazila', '2022-11-14 17:49:02', NULL),
(388, 3, 7, 'Nageshwari Upazila', '2022-11-14 17:49:15', NULL),
(389, 3, 7, 'Rajarhat Upazila', '2022-11-14 17:49:26', NULL),
(390, 3, 7, 'Raomari Upazila', '2022-11-14 17:49:38', NULL),
(391, 3, 7, 'Ulipur Upazila', '2022-11-14 17:49:47', NULL),
(392, 3, 8, 'Aditmari Upazila', '2022-11-14 17:49:56', NULL),
(393, 3, 8, 'Hatibandha Upazila', '2022-11-14 17:50:05', NULL),
(394, 3, 8, 'Kaliganj Upazila', '2022-11-14 17:50:16', NULL),
(395, 3, 8, 'Lalmonirhat Sadar Upazila', '2022-11-14 17:50:33', NULL),
(396, 3, 8, 'Patgram Upazila', '2022-11-14 17:50:44', NULL),
(397, 3, 9, 'Dimla Upazila', '2022-11-14 17:50:57', NULL),
(398, 3, 9, 'Domar Upazila', '2022-11-14 17:51:15', NULL),
(399, 3, 9, 'Jaldhaka Upazila', '2022-11-14 17:51:25', NULL),
(400, 3, 9, 'Kishoreganj Upazila', '2022-11-14 17:51:37', NULL),
(401, 3, 9, 'Nilphamari Sadar Upazila', '2022-11-14 17:51:47', NULL),
(402, 3, 9, 'Saidpur Upazila', '2022-11-14 17:51:59', NULL),
(403, 3, 10, 'Atwari Upazila', '2022-11-14 17:52:10', NULL),
(404, 3, 10, 'Boda Upazila', '2022-11-14 17:52:21', NULL),
(405, 3, 10, 'Debiganj Upazila', '2022-11-14 17:52:35', NULL),
(406, 3, 10, 'Panchagarh Sadar Upazila', '2022-11-14 17:52:47', NULL),
(407, 3, 10, 'Tetulia Upazila', '2022-11-14 17:52:57', NULL),
(408, 3, 11, 'Badarganj Upazila', '2022-11-14 17:53:11', NULL),
(409, 3, 11, 'Gangachhara Upazila', '2022-11-14 17:53:23', NULL),
(410, 3, 11, 'Kaunia Upazila', '2022-11-14 17:53:34', NULL),
(411, 3, 11, 'Rangpur Sadar Upazila', '2022-11-14 17:53:46', NULL),
(412, 3, 11, 'Mithapukur Upazila', '2022-11-14 17:53:55', NULL),
(413, 3, 11, 'Pirgachha Upazila', '2022-11-14 17:54:05', NULL),
(414, 3, 11, 'Pirganj Upazila', '2022-11-14 17:54:15', NULL),
(415, 3, 11, 'Taraganj Upazila', '2022-11-14 17:54:26', NULL),
(416, 3, 12, 'Baliadangi Upazila', '2022-11-14 17:54:38', NULL),
(417, 3, 12, 'Haripur Upazila', '2022-11-14 17:54:48', NULL),
(418, 3, 12, 'Pirganj Upazila', '2022-11-14 17:55:03', NULL),
(419, 3, 12, 'Ranisankail Upazila', '2022-11-14 17:55:12', NULL),
(420, 3, 12, 'Thakurgaon Sadar Upazila', '2022-11-14 17:55:23', NULL),
(421, 2, 22, 'Atpara Upazila', '2022-11-14 17:55:51', NULL),
(422, 2, 22, 'Barhatta Upazila', '2022-11-14 17:56:02', NULL),
(423, 2, 22, 'Durgapur Upazila', '2022-11-14 17:56:13', NULL),
(424, 2, 22, 'Khaliajuri Upazila', '2022-11-14 17:56:26', NULL),
(425, 2, 22, 'Kalmakanda Upazila', '2022-11-14 17:56:36', NULL),
(426, 2, 22, 'Kendua Upazila', '2022-11-14 17:56:47', NULL),
(427, 2, 22, 'Madan Upazila', '2022-11-14 17:56:59', NULL),
(428, 2, 22, 'Mohanganj Upazila', '2022-11-14 17:57:11', NULL),
(429, 2, 22, 'Netrokona Sadar Upazila', '2022-11-14 17:57:21', NULL),
(430, 2, 22, 'Purbadhala Upazila', '2022-11-14 17:57:32', NULL),
(431, 2, 21, 'Jhenaigati Upazila', '2022-11-14 17:57:45', NULL),
(432, 2, 21, 'Nakla Upazila', '2022-11-14 17:57:58', NULL),
(433, 2, 21, 'Nalitabari Upazila', '2022-11-14 17:58:07', NULL),
(434, 2, 21, 'Sherpur Sadar Upazila', '2022-11-14 17:58:16', NULL),
(435, 2, 21, 'Sreebardi Upazila', '2022-11-14 17:58:26', NULL),
(436, 2, 24, 'Baksiganj Upazila', '2022-11-14 17:58:39', NULL),
(437, 2, 24, 'Dewanganj Upazila', '2022-11-14 17:58:49', NULL),
(438, 2, 24, 'Islampur Upazila', '2022-11-14 17:58:59', NULL),
(439, 2, 24, 'Jamalpur Sadar Upazila', '2022-11-14 17:59:09', NULL),
(440, 2, 24, 'Madarganj Upazila', '2022-11-14 17:59:22', NULL),
(441, 2, 24, 'Melandaha Upazila', '2022-11-14 17:59:57', NULL),
(442, 2, 24, 'Sarishabari Upazila', '2022-11-14 18:00:10', NULL),
(443, 2, 23, 'Trishal Upazila', '2022-11-14 18:00:39', NULL),
(444, 2, 23, 'Dhobaura Upazila', '2022-11-14 18:00:52', NULL),
(445, 2, 23, 'Fulbaria Upazila', '2022-11-14 18:01:03', NULL),
(446, 2, 23, 'Gafargaon Upazila', '2022-11-14 18:01:13', NULL),
(447, 2, 23, 'Gauripur Upazila', '2022-11-14 18:01:25', NULL),
(448, 2, 23, 'Haluaghat Upazila', '2022-11-14 18:01:38', NULL),
(449, 2, 23, 'Ishwarganj Upazila', '2022-11-14 18:01:51', NULL),
(450, 2, 23, 'Mymensingh Sadar Upazila', '2022-11-14 18:02:02', NULL),
(451, 2, 23, 'Muktagachha Upazila', '2022-11-14 18:02:23', NULL),
(452, 2, 23, 'Nandail Upazila', '2022-11-14 18:02:34', NULL),
(453, 2, 23, 'Phulpur Upazila', '2022-11-14 18:02:43', NULL),
(454, 2, 23, 'Bhaluka Upazila', '2022-11-14 18:02:55', NULL),
(455, 2, 23, 'Tara Khanda Upazila', '2022-11-14 18:03:08', NULL),
(456, 1, 1, 'Ajmiriganj Upazila', '2022-11-14 18:04:30', NULL),
(457, 1, 1, 'Bahubal Upazila', '2022-11-14 18:04:41', NULL),
(458, 1, 1, 'Baniyachong Upazila', '2022-11-14 18:04:56', NULL),
(459, 1, 1, 'Chunarughat Upazila', '2022-11-14 18:05:07', NULL),
(460, 1, 1, 'Habiganj Sadar Upazila', '2022-11-14 18:05:18', NULL),
(461, 1, 1, 'Lakhai Upazila', '2022-11-14 18:05:30', NULL),
(462, 1, 1, 'Madhabpur Upazila', '2022-11-14 18:05:41', NULL),
(463, 1, 1, 'Nabiganj Upazila', '2022-11-14 18:05:53', NULL),
(464, 1, 1, 'Shayestaganj Upazila', '2022-11-14 18:06:07', NULL),
(465, 1, 2, 'Barlekha Upazila', '2022-11-14 18:06:20', NULL),
(466, 1, 2, 'Juri Upazila', '2022-11-14 18:06:30', NULL),
(467, 1, 2, 'Kamalganj Upazila', '2022-11-14 18:06:40', NULL),
(468, 1, 2, 'Kulaura Upazila', '2022-11-14 18:07:09', NULL),
(469, 1, 2, 'Moulvibazar Sadar Upazila', '2022-11-14 18:07:27', NULL),
(470, 1, 2, 'Rajnagar Upazila', '2022-11-14 18:07:38', NULL),
(471, 1, 2, 'Sreemangal Upazila', '2022-11-14 18:07:54', NULL),
(472, 1, 3, 'Bishwamvarpur Upazila', '2022-11-14 18:08:17', NULL),
(473, 1, 3, 'Chhatak Upazila', '2022-11-14 18:08:32', NULL),
(474, 1, 3, 'Shantiganj Upazila', '2022-11-14 18:08:45', NULL),
(475, 1, 3, 'Derai Upazila', '2022-11-14 18:09:03', NULL),
(476, 1, 3, 'Dharamapasha Upazila', '2022-11-14 18:09:17', NULL),
(477, 1, 3, 'Dowarabazar Upazila', '2022-11-14 18:09:29', NULL),
(478, 1, 3, 'Jagannathpur Upazila', '2022-11-14 18:09:41', NULL),
(479, 1, 3, 'Jamalganj Upazila', '2022-11-14 18:09:54', NULL),
(480, 1, 3, 'Sullah Upazila', '2022-11-14 18:10:08', NULL),
(481, 1, 3, 'Sunamganj Sadar Upazila', '2022-11-14 18:10:23', NULL),
(482, 1, 3, 'Tahirpur Upazila', '2022-11-14 18:10:37', NULL),
(483, 1, 3, 'Modhyanagar Upazila', '2022-11-14 18:11:14', NULL),
(484, 1, 4, 'Balaganj Upazila', '2022-11-14 18:11:25', NULL),
(485, 1, 4, 'Beanibazar Upazila', '2022-11-14 18:11:35', NULL),
(486, 1, 4, 'Bishwanath Upazila', '2022-11-14 18:11:46', NULL),
(487, 1, 4, 'Companigonj Upazila', '2022-11-14 18:11:59', NULL),
(488, 1, 4, 'Dakshin Surma Upazila', '2022-11-14 18:12:10', NULL),
(489, 1, 4, 'Fenchuganj Upazila', '2022-11-14 18:12:20', NULL),
(490, 1, 4, 'Golapganj Upazila', '2022-11-14 18:12:31', NULL),
(491, 1, 4, 'Gowainghat Upazila', '2022-11-14 18:12:40', NULL),
(492, 1, 4, 'Jaintiapur Upazila', '2022-11-14 18:12:54', NULL),
(493, 1, 4, 'Kanaighat Upazila', '2022-11-14 18:13:06', NULL),
(494, 1, 4, 'Osmani Nagar Upazila', '2022-11-14 18:13:17', NULL),
(495, 1, 4, 'Sylhet Sadar Upazila', '2022-11-14 18:13:29', NULL),
(496, 1, 4, 'Zakiganj Upazila', '2022-11-14 18:13:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `category_id`, `subcategory_name_en`, `subcategory_name_bn`, `subcategory_slug_en`, `subcategory_slug_bn`, `subcategory_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laptop', 'ল্যাপটপ', 'laptop', 'ল্যাপটপ', 1, '2022-10-05 07:40:44', NULL),
(2, 1, 'Desktop', 'ডেস্কটপ', 'desktop', 'ডেস্কটপ', 1, '2022-10-05 07:41:11', NULL),
(3, 1, 'Camera', 'ক্যামেরা', 'camera', 'ক্যামেরা', 1, '2022-10-05 07:41:29', NULL),
(4, 1, 'Phone', 'ফোন', 'phone', 'ফোন', 1, '2022-10-05 07:41:52', NULL),
(5, 2, 'Men', 'পুরুষ', 'men', 'পুরুষ', 1, '2022-10-05 07:42:16', NULL),
(6, 2, 'Women', 'মহিলা', 'women', 'মহিলা', 1, '2022-10-05 07:42:37', NULL),
(7, 3, 'Food', 'খাদ্যদ্রব্য', 'food', 'খাদ্যদ্রব্য', 1, '2022-10-05 07:45:38', NULL),
(8, 3, 'Oral Care', 'মুখের যত্ন', 'oral-care', 'মুখের-যত্ন', 1, '2022-10-05 07:46:56', NULL),
(9, 4, 'Diabetes', 'ডায়াবেটিস', 'diabetes', 'ডায়াবেটিস', 1, '2022-10-05 07:48:19', NULL),
(10, 4, 'Eye & Ear', 'চোখ ও কান', 'eye-&-ear', 'চোখ-ও-কান', 1, '2022-10-05 07:48:43', NULL),
(11, 5, 'Bat', 'ব্যাট', 'bat', 'ব্যাট', 1, '2022-10-05 07:49:23', NULL),
(12, 5, 'Football', 'ফুটবল', 'football', 'ফুটবল', 1, '2022-10-05 07:49:47', NULL),
(13, 6, 'Gold', 'স্বর্ণ', 'gold', 'স্বর্ণ', 1, '2022-10-05 07:50:26', NULL),
(14, 6, 'Diamond', 'ডায়মন্ড', 'diamond', 'ডায়মন্ড', 1, '2022-10-05 07:51:19', NULL),
(15, 7, 'Tables', 'টেবিল', 'tables', 'টেবিল', 1, '2022-10-05 07:53:05', NULL),
(16, 7, 'Chairs', 'চেয়ার', 'chairs', 'চেয়ার', 1, '2022-10-05 07:53:31', NULL),
(17, 8, 'History', 'ইতিহাস', 'history', 'ইতিহাস', 1, '2022-10-05 07:54:18', NULL),
(18, 8, 'Politics', 'রাজনীতি', 'politics', 'রাজনীতি', 1, '2022-10-05 07:54:41', NULL),
(19, 9, 'Men', 'পুরুষ', 'men', 'পুরুষ', 1, '2022-10-05 07:55:14', NULL),
(20, 9, 'Women', 'মহিলা', 'women', 'মহিলা', 1, '2022-10-05 07:55:33', NULL),
(21, 8, 'Islamic', 'ইসলামিক', 'islamic', 'ইসলামিক', 1, '2022-10-05 08:35:03', NULL),
(22, 8, 'Nobel', 'উপন্যাস', 'nobel', 'উপন্যাস', 1, '2022-10-05 08:36:01', NULL),
(23, 2, 'Boys', 'ছেলে', 'boys', 'ছেলে', 1, '2022-10-05 08:36:38', NULL),
(24, 2, 'Girls', 'মেয়ে', 'girls', 'মেয়ে', 1, '2022-10-05 08:36:57', NULL),
(25, 7, 'Bed', 'বিছানা', 'bed', 'বিছানা', 1, '2022-10-05 08:38:18', NULL),
(26, 7, 'Door', 'দরজা', 'door', 'দরজা', 1, '2022-10-05 08:38:29', NULL),
(27, 3, 'Beverages', 'পানীয়', 'beverages', 'পানীয়', 1, '2022-10-05 08:44:00', NULL),
(28, 3, 'Baby Care', 'শিশুর যত্ন', 'baby-care', 'শিশুর-যত্ন', 1, '2022-10-05 08:44:31', NULL),
(29, 4, 'Cough & Flu', 'সর্দি এবং কাশি', 'cough-&-flu', 'সর্দি-এবং-কাশি', 1, '2022-10-05 08:46:06', NULL),
(30, 4, 'Fever & Pain', 'জ্বর ও ব্যথা', 'fever-&-pain', 'জ্বর-ও-ব্যথা', 1, '2022-10-05 08:46:42', NULL),
(31, 9, 'Boys', 'ছেলে', 'boys', 'ছেলে', 1, '2022-10-05 08:47:43', NULL),
(32, 9, 'Girls', 'মেয়ে', 'girls', 'মেয়ে', 1, '2022-10-05 08:47:54', NULL),
(33, 5, 'Tennis', 'টেনিস্ খেলা', 'tennis', 'টেনিস্-খেলা', 1, '2022-10-05 08:50:28', NULL),
(34, 5, 'Badminton', 'ব্যাডমিন্টন', 'badminton', 'ব্যাডমিন্টন', 1, '2022-10-05 08:50:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subsub_categories`
--

CREATE TABLE `subsub_categories` (
  `subsubcategory_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsub_categories`
--

INSERT INTO `subsub_categories` (`subsubcategory_id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_bn`, `subsubcategory_slug_en`, `subsubcategory_slug_bn`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Gaming Laptop', 'গেমিং ল্যাপটপ', 'gaming-laptop', 'গেমিং-ল্যাপটপ', '2022-10-09 08:23:11', NULL),
(2, 1, 1, 'Premium Laptop', 'প্রিমিয়াম ল্যাপটপ', 'premium-laptop', 'প্রিমিয়াম-ল্যাপটপ', '2022-10-09 08:24:35', NULL),
(3, 1, 1, 'Premium Ultrabook', 'প্রিমিয়াম আলট্রাবুক', 'premium-ultrabook', 'প্রিমিয়াম-আলট্রাবুক', '2022-10-09 08:25:42', NULL),
(4, 1, 1, 'Laptop Accessories', 'ল্যাপটপ আনুষাঙ্গিক', 'laptop-accessories', 'ল্যাপটপ-আনুষাঙ্গিক', '2022-10-09 08:26:25', NULL),
(5, 1, 2, 'Star PC', 'স্টার পিসি', 'star-pc', 'স্টার-পিসি', '2022-10-09 08:26:58', NULL),
(6, 1, 2, 'Gaming PC', 'গেমিং পিসি', 'gaming-pc', 'গেমিং-পিসি', '2022-10-09 08:27:40', NULL),
(7, 1, 2, 'Brand PC', 'ব্র্যান্ড পিসি', 'brand-pc', 'ব্র্যান্ড-পিসি', '2022-10-09 08:28:12', NULL),
(8, 1, 2, 'Apple iMac', 'অ্যাপল আইম্যাক', 'apple-imac', 'অ্যাপল-আইম্যাক', '2022-10-09 08:28:45', NULL),
(9, 1, 3, 'DSLR', 'ডিএসএলআর', 'dslr', 'ডিএসএলআর', '2022-10-09 08:30:19', NULL),
(10, 1, 3, 'Video Camera', 'ভিডিও ক্যামেরা', 'video-camera', 'ভিডিও-ক্যামেরা', '2022-10-09 08:30:59', NULL),
(11, 1, 3, 'Camera Tripod', 'ক্যামেরা ট্রাইপড', 'camera-tripod', 'ক্যামেরা-ট্রাইপড', '2022-10-09 08:31:36', NULL),
(12, 1, 3, 'Camera Accessories', 'ক্যামেরা আনুষাঙ্গিক', 'camera-accessories', 'ক্যামেরা-আনুষাঙ্গিক', '2022-10-09 08:32:11', NULL),
(13, 1, 4, 'Xiaomi', 'শাওমি', 'xiaomi', 'শাওমি', '2022-10-09 08:35:57', NULL),
(14, 1, 4, 'Realme', 'রিয়েল মি', 'realme', 'রিয়েল-মি', '2022-10-09 08:36:38', NULL),
(15, 1, 4, 'Vivo', 'ভিভো', 'vivo', 'ভিভো', '2022-10-09 08:37:17', NULL),
(16, 1, 4, 'Walton', 'ওয়ালটন', 'walton', 'ওয়ালটন', '2022-10-09 08:37:47', NULL),
(17, 2, 5, 'Nike', 'নাইকি', 'nike', 'নাইকি', '2022-10-17 15:14:11', NULL),
(18, 2, 5, 'Gucci', 'গুচি', 'gucci', 'গুচি', '2022-10-17 15:14:48', NULL),
(19, 2, 5, 'Panjabi', 'পাঞ্জাবী', 'panjabi', 'পাঞ্জাবী', '2022-10-17 15:15:35', NULL),
(20, 2, 6, 'Three piece', 'থ্রী পিছ', 'three-piece', 'থ্রী-পিছ', '2022-10-17 15:16:07', NULL),
(21, 2, 6, 'BURBERRY', 'বারবেরি', 'burberry', 'বারবেরি', '2022-10-17 15:16:36', NULL),
(22, 2, 6, 'CHANEL', 'চ্যানেল', 'chanel', 'চ্যানেল', '2022-10-17 15:16:57', NULL),
(23, 2, 23, 'H&M', 'এইচ এম', 'h&m', 'এইচ-এম', '2022-10-17 15:17:29', NULL),
(24, 2, 23, 'LILLIPUT', 'লিলিপুট', 'lilliput', 'লিলিপুট', '2022-10-17 15:17:56', NULL),
(25, 2, 23, 'ZARA KIDS', 'জারা কিডস', 'zara-kids', 'জারা-কিডস', '2022-10-17 15:18:12', NULL),
(26, 2, 24, 'Zara', 'জারা', 'zara', 'জারা', '2022-10-17 15:18:31', NULL),
(27, 2, 24, 'Mini Boden', 'মিনি বোডেন', 'mini-boden', 'মিনি-বোডেন', '2022-10-17 15:18:59', NULL),
(28, 2, 24, 'Levi\'s', 'লেভি', 'levi\'s', 'লেভি', '2022-10-17 15:19:22', NULL),
(29, 3, 8, 'Toothbrushes', 'টুথব্রাশ', 'toothbrushes', 'টুথব্রাশ', '2022-10-17 15:20:09', NULL),
(30, 3, 8, 'Toothpastes', 'দাঁতের মার্জন', 'toothpastes', 'দাঁতের-মার্জন', '2022-10-17 15:20:29', NULL),
(31, 3, 7, 'Meat & Fish', 'মাংস মাছ', 'meat-&-fish', 'মাংস-মাছ', '2022-10-17 15:20:47', NULL),
(32, 3, 7, 'Breakfast', 'সকালের নাস্তা', 'breakfast', 'সকালের-নাস্তা', '2022-10-17 15:21:03', NULL),
(33, 3, 7, 'Fruits & Vegetables', 'ফল ও সবজি', 'fruits-&-vegetables', 'ফল-ও-সবজি', '2022-10-17 15:21:22', NULL),
(34, 3, 27, 'Coffee', 'কফি', 'coffee', 'কফি', '2022-10-17 15:21:41', NULL),
(35, 3, 27, 'Soft Drinks', 'কোমল পানীয়', 'soft-drinks', 'কোমল-পানীয়', '2022-10-17 15:22:01', NULL),
(36, 3, 27, 'Tea', 'চা', 'tea', 'চা', '2022-10-17 15:22:19', NULL),
(37, 3, 28, 'Baby Skincare', 'শিশুর ত্বকের যত্ন', 'baby-skincare', 'শিশুর-ত্বকের-যত্ন', '2022-10-17 15:22:38', NULL),
(38, 3, 28, 'Baby Food', 'শিশু খাদ্য', 'baby-food', 'শিশু-খাদ্য', '2022-10-17 15:22:57', NULL),
(39, 3, 28, 'Diapers', 'ডায়াপার', 'diapers', 'ডায়াপার', '2022-10-17 15:23:17', NULL),
(40, 4, 30, 'Square', 'স্কয়ার', 'square', 'স্কয়ার', '2022-10-17 15:24:04', NULL),
(41, 4, 30, 'Incepta', 'ইন্সেপ্টা', 'incepta', 'ইন্সেপ্টা', '2022-10-17 15:24:22', NULL),
(42, 4, 30, 'Beximco', 'বেক্সিমকো', 'beximco', 'বেক্সিমকো', '2022-10-17 15:24:40', NULL),
(43, 4, 9, 'Beximco', 'বেক্সিমকো', 'beximco', 'বেক্সিমকো', '2022-10-17 15:25:01', NULL),
(44, 4, 9, 'Incepta', 'ইন্সেপ্টা', 'incepta', 'ইন্সেপ্টা', '2022-10-17 15:25:16', NULL),
(45, 4, 9, 'Square', 'স্কয়ার', 'square', 'স্কয়ার', '2022-10-17 15:25:33', NULL),
(46, 4, 10, 'Square', 'স্কয়ার', 'square', 'স্কয়ার', '2022-10-17 15:25:49', NULL),
(47, 4, 10, 'Incepta', 'ইন্সেপ্টা', 'incepta', 'ইন্সেপ্টা', '2022-10-17 15:26:06', NULL),
(48, 4, 10, 'Beximco', 'বেক্সিমকো', 'beximco', 'বেক্সিমকো', '2022-10-17 15:26:23', NULL),
(49, 4, 29, 'Beximco', 'বেক্সিমকো', 'beximco', 'বেক্সিমকো', '2022-10-17 15:26:40', NULL),
(50, 4, 29, 'Incepta', 'ইন্সেপ্টা', 'incepta', 'ইন্সেপ্টা', '2022-10-17 15:26:57', NULL),
(51, 4, 29, 'Square', 'স্কয়ার', 'square', 'স্কয়ার', '2022-10-17 15:27:13', NULL),
(52, 5, 12, 'Burberry', 'বারবেরি', 'burberry', 'বারবেরি', '2022-10-17 15:27:56', NULL),
(53, 5, 12, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', '2022-10-17 15:28:17', NULL),
(54, 5, 12, 'Kering', 'কেরিং', 'kering', 'কেরিং', '2022-10-17 15:28:32', NULL),
(55, 5, 11, 'Puma', 'পুমা', 'puma', 'পুমা', '2022-10-17 15:28:53', NULL),
(56, 5, 11, 'Spartan Sports', 'স্পার্টান স্পোর্টস', 'spartan-sports', 'স্পার্টান-স্পোর্টস', '2022-10-17 15:29:28', NULL),
(57, 5, 11, 'Kookaburra', 'কুকাবুরা', 'kookaburra', 'কুকাবুরা', '2022-10-17 15:29:48', NULL),
(58, 5, 33, 'Wilson', 'উইলসন', 'wilson', 'উইলসন', '2022-10-17 15:30:13', NULL),
(59, 5, 33, 'Racquet Brand', 'র‍্যাকেট ব্র্যান্ড', 'racquet-brand', 'র‍্যাকেট-ব্র্যান্ড', '2022-10-17 15:30:35', NULL),
(60, 5, 33, 'Babolat', 'বাবোলাত', 'babolat', 'বাবোলাত', '2022-10-17 15:30:52', NULL),
(61, 5, 34, 'Yonex Arcsaver', 'ইউনিক্স আরক্সাবার', 'yonex-arcsaver', 'ইউনিক্স-আরক্সাবার', '2022-10-17 15:31:10', NULL),
(62, 5, 34, 'Babolat Satellite', 'বাবোলাট স্যাটেলাইট', 'babolat-satellite', 'বাবোলাট-স্যাটেলাইট', '2022-10-17 15:31:27', NULL),
(63, 5, 34, 'Yonex Astrox', 'ইউনিক্স আস্ট্রক্স', 'yonex-astrox', 'ইউনিক্স-আস্ট্রক্স', '2022-10-17 15:31:47', NULL),
(64, 6, 14, 'Tiffany and Co', 'টিফানি এবং কো', 'tiffany-and-co', 'টিফানি-এবং-কো', '2022-10-17 15:32:28', NULL),
(65, 6, 14, 'Cartier', 'কারটিয়ার', 'cartier', 'কারটিয়ার', '2022-10-17 15:32:46', NULL),
(66, 6, 14, 'Harry Winston', 'হ্যারি উইনস্টন', 'harry-winston', 'হ্যারি-উইনস্টন', '2022-10-17 15:33:03', NULL),
(67, 6, 13, 'Chopard', 'চোপার্ড', 'chopard', 'চোপার্ড', '2022-10-17 15:33:21', NULL),
(68, 6, 13, 'Harry Winston', 'হ্যারি উইনস্টন', 'harry-winston', 'হ্যারি-উইনস্টন', '2022-10-17 15:33:39', NULL),
(69, 6, 13, 'Cartier', 'কারটিয়ার', 'cartier', 'কারটিয়ার', '2022-10-17 15:33:56', NULL),
(70, 7, 15, 'Table with Wooden Top', 'শীর্ষ সহ কেন্দ্র টেবিল', 'table-with-wooden-top', 'শীর্ষ-সহ-কেন্দ্র-টেবিল', '2022-10-17 15:34:37', NULL),
(71, 7, 15, 'Center Table with Glass Top', 'গ্লাস টপ সহ সেন্টার টেবিল', 'center-table-with-glass-top', 'গ্লাস-টপ-সহ-সেন্টার-টেবিল', '2022-10-17 15:34:55', NULL),
(72, 7, 26, 'Plain Veneered Flush Door', 'প্লেইন ভেনির্ড ফ্লাশ ডোর', 'plain-veneered-flush-door', 'প্লেইন-ভেনির্ড-ফ্লাশ-ডোর', '2022-10-17 15:35:12', NULL),
(73, 7, 26, 'Knock-Down Door Frame', 'নক ডাউন ডোর ফ্রেম', 'knock-down-door-frame', 'নক-ডাউন-ডোর-ফ্রেম', '2022-10-17 15:35:35', NULL),
(74, 7, 26, 'Solid Wooden Door', 'কঠিন কাঠের দরজা', 'solid-wooden-door', 'কঠিন-কাঠের-দরজা', '2022-10-17 15:35:55', NULL),
(75, 7, 16, 'Accent Chair', 'অ্যাকসেন্ট চেয়ার', 'accent-chair', 'অ্যাকসেন্ট-চেয়ার', '2022-10-17 15:36:29', NULL),
(76, 7, 16, 'Easy Chair', 'আরামকেদারা', 'easy-chair', 'আরামকেদারা', '2022-10-17 15:36:46', NULL),
(77, 7, 16, 'Rocking Chair', 'দোলান - চেয়ার', 'rocking-chair', 'দোলান---চেয়ার', '2022-10-17 15:37:02', NULL),
(78, 7, 25, 'Folding Bed', 'ফোল্ডিং বেড', 'folding-bed', 'ফোল্ডিং-বেড', '2022-10-17 15:37:26', NULL),
(79, 7, 25, 'Queen Size Bed', 'কুইন সাইজ বেড', 'queen-size-bed', 'কুইন-সাইজ-বেড', '2022-10-17 15:37:38', NULL),
(80, 7, 25, 'King Size Bed', 'বিশাল বিছানা', 'king-size-bed', 'বিশাল-বিছানা', '2022-10-17 15:38:23', NULL),
(81, 8, 18, 'Gender,politics and Islam', 'লিঙ্গ, রাজনীতি এবং ইসলাম', 'gender,politics-and-islam', 'লিঙ্গ,-রাজনীতি-এবং-ইসলাম', '2022-10-17 15:39:16', NULL),
(82, 8, 18, 'The Politics Book', 'রাজনীতি বই', 'the-politics-book', 'রাজনীতি-বই', '2022-10-17 15:39:37', NULL),
(83, 8, 18, 'The Politics', 'রাজনীতি', 'the-politics', 'রাজনীতি', '2022-10-17 15:39:55', NULL),
(84, 8, 18, 'Politics', 'রাষ্ট্রনীতি', 'politics', 'রাষ্ট্রনীতি', '2022-10-17 15:40:15', NULL),
(85, 8, 22, 'Blindness', 'অন্ধত্ব', 'blindness', 'অন্ধত্ব', '2022-10-17 15:40:35', NULL),
(86, 8, 22, 'Youth', 'যৌবন', 'youth', 'যৌবন', '2022-10-17 15:40:58', NULL),
(87, 8, 22, 'Runaway', 'পলায়ন', 'runaway', 'পলায়ন', '2022-10-17 15:41:16', NULL),
(88, 8, 22, 'Nausea', 'বমি বমি ভাব', 'nausea', 'বমি-বমি-ভাব', '2022-10-17 15:41:34', NULL),
(89, 8, 21, 'The cry of Spain', 'স্পেনের কান্না', 'the-cry-of-spain', 'স্পেনের-কান্না', '2022-10-17 15:42:14', NULL),
(90, 8, 21, 'Life\'s best asset', 'জীবনের শ্রেষ্ঠ সম্পদ', 'life\'s-best-asset', 'জীবনের-শ্রেষ্ঠ-সম্পদ', '2022-10-17 15:42:32', NULL),
(91, 8, 21, 'banking & financing', 'ব্যাংকিং ও অর্থায়ন', 'banking-&-financing', 'ব্যাংকিং-ও-অর্থায়ন', '2022-10-17 15:42:51', NULL),
(92, 8, 21, 'How to give Zakat', 'যাকাত কিভাবে দিবেন', 'how-to-give-zakat', 'যাকাত-কিভাবে-দিবেন', '2022-10-17 15:43:12', NULL),
(93, 8, 17, 'World History', 'বিশ্ব ইতিহাস', 'world-history', 'বিশ্ব-ইতিহাস', '2022-10-17 15:43:33', NULL),
(94, 8, 17, 'India a History', 'ভারত একটি ইতিহাস', 'india-a-history', 'ভারত-একটি-ইতিহাস', '2022-10-17 15:43:51', NULL),
(95, 8, 17, 'A Brief History of Time', 'সময়ের সংক্ষিপ্ত ইতিহাস', 'a-brief-history-of-time', 'সময়ের-সংক্ষিপ্ত-ইতিহাস', '2022-10-17 15:44:07', NULL),
(96, 8, 17, 'Political Parties in India', 'ভারতের রাজনৈতিক দল', 'political-parties-in-india', 'ভারতের-রাজনৈতিক-দল', '2022-10-17 15:44:24', NULL),
(97, 9, 32, 'Nike', 'নাইকি', 'nike', 'নাইকি', '2022-10-17 15:45:47', NULL),
(98, 9, 32, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', '2022-10-17 15:45:59', NULL),
(99, 9, 32, 'Puma', 'পুমা', 'puma', 'পুমা', '2022-10-17 15:46:16', NULL),
(100, 9, 31, 'Puma', 'পুমা', 'puma', 'পুমা', '2022-10-17 15:46:31', NULL),
(101, 9, 31, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', '2022-10-17 15:46:43', NULL),
(102, 9, 31, 'Nike', 'নাইকি', 'nike', 'নাইকি', '2022-10-17 15:47:00', NULL),
(103, 9, 20, 'Nike', 'নাইকি', 'nike', 'নাইকি', '2022-10-17 15:47:20', NULL),
(104, 9, 20, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', '2022-10-17 15:47:38', NULL),
(105, 9, 20, 'Puma', 'পুমা', 'puma', 'পুমা', '2022-10-17 15:47:53', NULL),
(106, 9, 19, 'Puma', 'পুমা', 'puma', 'পুমা', '2022-10-17 15:48:08', NULL),
(107, 9, 19, 'Adidas', 'এডিডাস', 'adidas', 'এডিডাস', '2022-10-17 15:48:25', NULL),
(108, 9, 19, 'Nike', 'নাইকি', 'nike', 'নাইকি', '2022-10-17 15:49:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `phone`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Waliul Hasan', 1, 'waliul@gmail.com', '01521584922', 'frontend/media/avater.jpg', NULL, '$2y$10$YKhUvGd/qDQWBeo1KJOa1O23ScIZi6eEKvc1MoKtI4O/NeivkRX0G', NULL, '2022-10-08 06:07:04', '2022-10-08 06:07:04'),
(2, 'Hasan Waliul', 2, 'hasan@gmail.com', '01521584922', 'frontend/media/avater.jpg', NULL, '$2y$10$1fqzPcHIjWiwKMz7GMTym.wwmyPA5tDpCB/OhpY3N0OGgU6Vbna6W', NULL, '2022-10-08 06:07:44', '2022-11-14 09:21:17'),
(3, 'Md Hasan', 2, 'mdhasan@gmail.com', '0158792146', 'frontend/media/1751113036265430.jpeg', NULL, '$2y$10$hUtGmjKwQFBLBQMxSiIazu/EnHo6O./QGWM0yq9sYdezuLi1VOaAy', NULL, '2022-12-02 14:31:39', '2022-12-02 14:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`wishlist_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(18, 2, 12, '2022-11-12 04:01:19', NULL),
(19, 2, 11, '2022-11-12 04:01:21', NULL),
(20, 2, 10, '2022-11-12 04:01:23', NULL),
(21, 2, 9, '2022-11-12 04:01:25', NULL),
(22, 1, 11, '2023-07-12 18:06:12', NULL),
(23, 1, 10, '2023-07-12 18:06:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`multiImg_id`);

--
-- Indexes for table `order_infos`
--
ALTER TABLE `order_infos`
  ADD PRIMARY KEY (`order_info_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_districts`
--
ALTER TABLE `shipping_districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `shipping_divisions`
--
ALTER TABLE `shipping_divisions`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  ADD PRIMARY KEY (`shippin_id`);

--
-- Indexes for table `shipping_states`
--
ALTER TABLE `shipping_states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `subsub_categories`
--
ALTER TABLE `subsub_categories`
  ADD PRIMARY KEY (`subsubcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `multiImg_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_infos`
--
ALTER TABLE `order_infos`
  MODIFY `order_info_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_districts`
--
ALTER TABLE `shipping_districts`
  MODIFY `district_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `shipping_divisions`
--
ALTER TABLE `shipping_divisions`
  MODIFY `division_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  MODIFY `shippin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_states`
--
ALTER TABLE `shipping_states`
  MODIFY `state_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategory_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `subsub_categories`
--
ALTER TABLE `subsub_categories`
  MODIFY `subsubcategory_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order_infos` (`order_info_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
