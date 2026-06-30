-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2026 at 06:34 AM
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
-- Database: `metrohealth_db_march_26`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text NOT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `excerpt`, `content`, `author`, `category`, `image`, `published`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Metro Health Hospital Celebrates Legacy of the Late Asantehemaa Through Touching Tribute by Dr. Akosua Akyaa Adutwumwaa', 'metro-health-hospital-celebrates-legacy-of-the-late-asantehemaa-through-touching-tribute-by-dr-akosua-akyaa-adutwumwaa', 'Dr. Akosua Akyaa Adutwumwaa, known in private life as Dr Mrs Phyllis Tawiah, emotionally recounted her final visit, during which Nana Konadu Yiadom III insisted they dine together, a simple yet deeply meaningful gesture.', 'Dr. Nana Akosua Akyaa Adutwumwaa, the personal physician to the late Asantehemaa Nana Konadu Yiadom III, has paid a heartfelt tribute, describing the queen mother as a woman of immense strength, wisdom, and compassion, whose presence left an enduring impact on all who encountered her.\r\n\r\nDr. Nana Akosua Akyaa Adutwumwaa, the personal physician to the late Asantehemaa Nana Konadu Yiadom III, has paid a heartfelt tribute, describing the queen mother as a woman of immense strength, wisdom, and compassion, whose presence left an enduring impact on all who encountered her.\r\n\r\nIn her glowing eulogy, Dr. Akosua Akyaa Adutwumwaa, who also serves as the Queenmother of Aninkroma in the Ashanti Region, recounted her deep personal bond with the Asantehemaa, describing her not just as a patient but as a true matriarch and a radiant soul.\r\n\r\n“She accepted me as her own, with a mother’s heart and a queen’s dignity,” she said, recalling the sacred warmth and trust shared between them.\r\n\r\nDespite her advanced age, the doctor noted that the late Queen Mother’s mental sharpness remained intact.\r\n\r\n“Her thoughts were sharp, her words deliberate, and her wisdom profound. She engaged with grace and insight, often offering reflections that lingered long after the conversation ended,” she recalled.\r\n\r\n\r\nDr. Akosua Akyaa Adutwumwaa, known in private life as Dr Mrs Phyllis Tawiah, emotionally recounted her final visit, during which Nana Konadu Yiadom III insisted they dine together, a simple yet deeply meaningful gesture.\r\n\r\n“Little did I know it would be our final meeting. That warm excitement was her quiet way of saying goodbye,” she said, her voice heavy with emotion.\r\n\r\nRemembering the Queen Mother’s legacy, she concluded, “Nana leaves behind a legacy of resilience, intellect, and unconditional love. Her memory will continue to guide us, reminding us to live with purpose, to honour others with respect, and to cherish the bonds that make us family.”\r\n\r\nSource: Ghana/otecfmghana.com/Francis Appiah', 'Admin', 'Personal Doctor', 'blog/A1EKZ2cA6V2DmA2xjJz9ni8iHLcprNVwk5VRIMtG.jpg', 1, '2025-09-02 14:00:00', '2026-03-11 08:55:55', '2026-03-11 09:06:32'),
(2, 'Metro Health Hospital Opens First Specialist And Research Centre For The Aged', 'metro-health-hospital-opens-first-specialist-and-research-centre-for-the-aged', 'Ghana will for the first time have the benefit of full research on its elderly population with the establishment of the first Specialist Geriatric Healthcare facility at the Metro Health Hospital in Kumasi. Aside from care for the elderly, the hospital will serve as a base for gathering data on the peculiar health conditions and needs of persons above 60 years.', 'Ghana will for the first time have the benefit of full research on its elderly population with the establishment of the first Specialist Geriatric Healthcare facility at the Metro Health Hospital in Kumasi.\r\n\r\nAside from care for the elderly, the hospital will serve as a base for gathering data on the peculiar health conditions and needs of persons above 60 years. This data, shared with the Ghana Health Service and the Ghana College of Physicians and Surgeons, will guide national policy for the aged.\r\n\r\nOpening the facility, Specialist Geriatrician and Chief Executive of Metro Health Hospital, Dr. Phyllis Tawia, emphasized the urgency of recognizing the aged as a critical population needing specialized care.\r\n\r\nShe noted, “Ghana has some policies that exempt or reduce the amount the aged pay to renew their health insurance policies. But more needs to be done in improving access because some cannot even walk around with their canes and walking sticks as there are no proper pavements in many areas.”\r\n\r\nShe added, “With time, when we have data on our aged people, we can share information with our leaders to help design better policies for them.”\r\n\r\nDr. Rita Larsen Reindorf, Deputy Director of Health in charge of Clinical Care with the Ghana Health Service, told Ultimate News that Ghana has long relied on foreign data to address ageing issues. Partnering with Metro Health Hospital, she said, will help uncover the country’s own ageing patterns to guide local decisions.\r\n\r\nShe stated, “There are peculiarities with the ageing process and all the information we have available is coming from elsewhere where they have studied their aged population. We can’t just import what is being done outside, and this is why I’m happy for such a center that will research ageing in the Ghanaian context.”\r\n\r\nGlobally, the population of persons above 60 years stood at 600 million a decade ago and is projected to reach 2.6 billion by 2050.\r\nIn Ghana, with a life expectancy of 63 years, it is estimated that 12% of the population will be aged 60 or above by 2050 — the highest rate in Sub-Saharan Africa.', 'Admin', 'Research Centre', 'blog/zYvSdgHBz3BGQJEgQoMsQt4XI2LA9JNAJ1DD1MS9.jpg', 1, '2025-11-01 12:01:00', '2026-03-11 09:45:32', '2026-03-11 09:45:32'),
(3, 'Metro Health Hospital’s Endoscopy Team Prevents Tragedy After Needle Removed from Stomach', 'metro-health-hospitals-endoscopy-team-prevents-tragedy-after-needle-removed-from-stomach', 'A timely intervention in the early hours of the New Year, by medical personnel at the Metro Health Services in Kumasi was what saved the life of an 18-year-old student who had swallowed a 6.2 centimetre sewing needle. Source: Modern Ghana', 'Metro Health Hospital’s Endoscopy Team Prevents Tragedy After Needle Removed from Stomach\r\n\r\nA timely intervention in the early hours of the New Year, by medical personnel at the Metro Health Services in Kumasi was what saved the life of an 18-year-old student who had swallowed a 6.2 centimetre sewing needle. Source: Modern Ghana\r\nThe student told the medical staff at Metro Health Services that he hiccoughed and accidentally swallowed a needle he had put in his mouth while looking for a thread to do needle work. He was listed in stable condition aside from the abdominal pain he was experiencing. Modern Ghana\r\nHe was initially admitted at Komfo Anokye Teaching Hospital (KATH), where an abdominal X-ray showed that the needle had gotten stuck in the upper portion of the stomach area. The student was referred to Metro Health Services for endoscopic removal of the needle because the endoscopy machine at KATH was not operational. Modern Ghana\r\nAccording to Dr Phyllis Tawiah, who performed the procedure, interventions by gastrointestinal endoscopy are normally indicated for swallowed objects that are sharp, elongated, or where it is less likely to go beyond the stomach or cause serious injury in the attempt to move forward. The endoscopy machine allows you to pass a scope through the mouth for the upper organs, or through the anus to directly visualize lesions in the oesophagus, stomach, small and large intestines. Modern Ghana\r\nThe sewing needle, which was observed during endoscopy to be piercing the wall of the upper part of the student’s stomach with a third of it showing, was safely removed with the endoscope in a procedure that lasted about 25 minutes. Modern Ghana\r\nDr Tawiah stated that the student had a rare form of ingestion because the needle moved down the throat to the stomach without causing any injuries to the oesophagus. Modern Ghana\r\nThe student remained stable and was sent back to Komfo Anokye. Dr. Tawiah is the Medical Director at Metro Health Services at Abrepo Junction, Kumasi, where she oversees endoscopy procedures, extensive testing for the heart and lung such as ECG, Cardiac Stress Testing, Holter Monitor, Echocardiography and Lung Function Test. The facility also provides occupational health screening services (pre-school and pre-employment medical examination) as well as full women’s health services including Pap smear and Mammogram for cervical and breast cancer.', 'Admin', 'Endoscopy', 'blog/f9qMoDOTUiqYvX5Z0odaNv7rRy2fdH9ETiJx33SU.png', 1, '2024-01-02 13:02:00', '2026-03-11 09:52:09', '2026-03-11 09:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `customer_category` enum('walk-in','home-service') NOT NULL,
  `service_location` enum('within-reading','outside-reading') DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `service_cost` decimal(10,2) DEFAULT NULL,
  `estimated_price` decimal(8,2) DEFAULT NULL,
  `deposit_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `payment_status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `stripe_payment_intent_id` varchar(255) DEFAULT NULL,
  `stripe_session_id` varchar(255) DEFAULT NULL,
  `hair_type` varchar(255) DEFAULT NULL,
  `preferred_date` date NOT NULL,
  `preferred_time` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('new','read','replied','resolved') NOT NULL DEFAULT 'new',
  `admin_notes` text DEFAULT NULL,
  `replied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_submissions`
--

INSERT INTO `contact_submissions` (`id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `admin_notes`, `replied_at`, `created_at`, `updated_at`) VALUES
(1, 'nana yaw', 'jouewk@gmail.com', '024234345', 'nre', 'sdfdsdfsf', 'read', NULL, NULL, '2026-02-01 22:52:44', '2026-02-01 22:52:56'),
(2, 'Test User', 'test@example.com', '07724500349', 'Email Test from Contact Form', 'This is a test message to verify that contact form email notifications are working correctly. If you receive this email, the contact form is successfully sending notifications!', 'new', NULL, NULL, '2026-03-01 01:51:51', '2026-03-01 01:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `thumbnail_path` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_gallery`
--

CREATE TABLE `media_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('photo','video') NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2024_01_01_000000_create_users_table', 1),
(2, '2024_01_01_000001_create_blog_posts_table', 1),
(3, '2024_01_01_000002_create_contact_submissions_table', 1),
(4, '2024_01_01_000003_create_media_gallery_table', 1),
(5, '2024_01_01_000004_create_ministries_table', 1),
(6, '2024_01_01_000005_create_sermons_table', 1),
(7, '2025_06_06_183239_create_galleries_table', 1),
(8, '2025_06_06_183241_create_gallery_images_table', 1),
(9, '2025_07_05_014630_create_videos_table', 1),
(10, '2025_11_18_061205_add_category_to_galleries_table', 1),
(11, '2025_12_06_000001_create_activity_logs_table', 1),
(12, '2025_12_06_000002_add_permissions_to_users_table', 1),
(13, '2025_12_17_000001_create_services_table', 1),
(14, '2025_12_17_000002_create_products_table', 1),
(15, '2025_12_17_000003_create_clients_table', 1),
(16, '2025_12_17_000004_create_projects_table', 1),
(17, '2025_12_17_000005_create_testimonials_table', 1),
(18, '2025_12_17_000006_create_company_settings_table', 1),
(20, '2026_01_29_211952_create_bookings_table', 2),
(21, '2026_01_29_213937_add_slug_to_services_table', 3),
(22, '2026_01_30_044409_create_orders_table', 3),
(23, '2026_01_30_044416_create_order_items_table', 3),
(24, '2026_01_30_044427_create_reviews_table', 3),
(25, '2026_01_30_045515_add_hair_type_to_bookings_table', 3),
(26, '2026_02_01_000001_add_shop_fields_to_products_table', 4),
(27, '2026_02_01_000002_add_service_cost_to_bookings_table', 4),
(28, '2026_02_01_000003_add_pricing_to_services_table', 5),
(29, '2026_02_01_000004_add_estimated_price_to_bookings_table', 5),
(30, '2026_02_01_000005_simplify_service_pricing', 6),
(31, '2026_02_27_045223_add_deposit_fields_to_bookings_table', 7),
(32, '2026_02_27_051923_add_address_fields_to_bookings_table', 8),
(33, '2026_03_11_085901_add_category_to_blog_posts_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` enum('inter-generational','generational') NOT NULL DEFAULT 'inter-generational',
  `ministry_category` varchar(255) DEFAULT NULL,
  `age_range` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `leader` varchar(255) DEFAULT NULL,
  `leader_phone` varchar(255) DEFAULT NULL,
  `leader_picture` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `meeting_schedule` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `payment_status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-box',
  `link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `image`, `category`, `stock`, `icon`, `link`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'Mango Mojito Resistant Formula Locking Gel - Yellow - 177ml', 'mango-mojito-resistant-formula-locking-gel-yellow-177ml', 'Premium loc retwist cream for maintaining healthy, well-defined locs. Provides strong hold without buildup.', 24.99, 'images/products/1769987061-mango-mojito-resistant-formula-locking-gel-yellow-177ml.jpg', 'Loc & Styling Products', 50, 'fas fa-spray-can', NULL, 1, 1, '2026-02-01 19:51:46', '2026-02-01 23:04:21'),
(7, 'Eco Olive Oil Styling Gel - 473ml', 'eco-olive-oil-styling-gel-473ml', 'Gentle, sulfate-free shampoo that cleanses without stripping natural oils. Ideal for textured hair.', 16.99, 'images/products/1769987123-eco-olive-oil-styling-gel-473ml.jpg', 'Oils & Scalp Treatments', 40, 'fas fa-pump-soap', NULL, 4, 1, '2026-02-01 19:51:46', '2026-02-01 23:05:23'),
(8, 'Hair Growth Oil - 100ml ( Nnuro Hair Food )', 'hair-growth-oil-100ml-nnuro-hair-food', 'Intensive deep conditioning treatment for damaged or dry hair. Restores moisture and shine.', 22.99, 'images/products/1769987295-hair-growth-oil-100ml-nnuro-hair-food.jpg', 'Oils & Scalp Treatments', 35, 'fas fa-spa', NULL, 5, 1, '2026-02-01 19:51:46', '2026-02-01 23:08:15'),
(9, 'TOUPHY Rechargeable Hair Clipper/Hair Trimmer/Shaving Machine - Black', 'touphy-rechargeable-hair-clipperhair-trimmershaving-machine-black', 'Refreshing braid spray to keep braids moisturized and smelling fresh. Reduces itching and flaking.', 14.99, 'images/products/1769987341-touphy-rechargeable-hair-clipperhair-trimmershaving-machine-black.jpg', 'Tools & Accessories', 55, 'fas fa-spray-can', NULL, 6, 1, '2026-02-01 19:51:46', '2026-02-01 23:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `customer_name`, `customer_email`, `rating`, `review`, `service_id`, `is_approved`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'John Darko', 'jouewk@gmail.com', 4, 'Very professional haircut with great attention to detail. The stylist listened carefully to what I wanted and delivered exactly that. Clean, precise work and a great overall experience. Highly recommend.', NULL, 1, 0, '2026-02-01 23:30:44', '2026-02-01 23:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `sermons`
--

CREATE TABLE `sermons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `preacher` varchar(255) NOT NULL,
  `scripture_reference` varchar(255) DEFAULT NULL,
  `sermon_date` date NOT NULL,
  `description` text DEFAULT NULL,
  `audio_url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `transcript` longtext DEFAULT NULL,
  `series` varchar(255) DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price_min` decimal(8,2) DEFAULT NULL,
  `price_max` decimal(8,2) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-laptop-code',
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_position` varchar(255) NOT NULL,
  `client_organization` varchar(255) NOT NULL,
  `client_image` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
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
  `profile_picture` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor','viewer') NOT NULL DEFAULT 'viewer',
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `profile_picture`, `email_verified_at`, `password`, `role`, `permissions`, `is_active`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@ashlocs.co.uk', NULL, NULL, NULL, '$2y$12$X6y0k.3Ushcshfaofw7S7usK/Sgr1eKAQ0K/qEO2FqHupT6/FU1Wy', 'admin', NULL, 1, NULL, NULL, NULL, '2026-01-30 05:25:11', '2026-01-30 05:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `video_type` varchar(255) NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `video_file` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `publish_date` date DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_created_at_index` (`user_id`,`created_at`),
  ADD KEY `activity_logs_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `activity_logs_action_index` (`action`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`),
  ADD KEY `blog_posts_slug_index` (`slug`),
  ADD KEY `blog_posts_published_index` (`published`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_settings_key_unique` (`key`);

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_submissions_status_index` (`status`),
  ADD KEY `contact_submissions_created_at_index` (`created_at`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_created_by_foreign` (`created_by`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `media_gallery`
--
ALTER TABLE `media_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_gallery_type_index` (`type`),
  ADD KEY `media_gallery_category_index` (`category`),
  ADD KEY `media_gallery_featured_index` (`featured`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministries`
--
ALTER TABLE `ministries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ministries_slug_unique` (`slug`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_service_id_foreign` (`service_id`);

--
-- Indexes for table `sermons`
--
ALTER TABLE `sermons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sermons_slug_unique` (`slug`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_email_index` (`email`),
  ADD KEY `users_role_index` (`role`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_gallery`
--
ALTER TABLE `media_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ministries`
--
ALTER TABLE `ministries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sermons`
--
ALTER TABLE `sermons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
