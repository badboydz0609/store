-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for store
CREATE DATABASE IF NOT EXISTS `store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `store`;

-- Dumping structure for table store.buys
CREATE TABLE IF NOT EXISTS `buys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `buy_client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_quantity` int NOT NULL,
  `buy_price` decimal(10,2) NOT NULL,
  `method_pay` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.buys: ~3 rows (approximately)
INSERT INTO `buys` (`id`, `buy_client_id`, `buy_quantity`, `buy_price`, `method_pay`, `created_at`, `updated_at`) VALUES
	(1, '2', 30, 162500.00, 1, NULL, NULL),
	(2, '2', 10, 50000.00, 2, NULL, NULL),
	(7, '2', 12, 10900.00, 1, '2023-04-03 15:23:23', '2023-04-03 15:23:23');

-- Dumping structure for table store.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `id_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.carts: ~1 rows (approximately)
INSERT INTO `carts` (`id`, `user_id`, `total_price`, `id_item`, `quantity_item`, `created_at`, `updated_at`) VALUES
	(3, '1', 5000.00, '2', '1', '2023-03-30 15:36:19', '2023-03-30 15:36:19');

-- Dumping structure for table store.catagories
CREATE TABLE IF NOT EXISTS `catagories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nubmer_item` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.catagories: ~4 rows (approximately)
INSERT INTO `catagories` (`id`, `category_name`, `category_image`, `nubmer_item`, `created_at`, `updated_at`) VALUES
	(1, 'أجهزة إلكترونية', 'images.png', 12, NULL, NULL),
	(2, 'مستلزمات أخرى', '1680194842_png-clipart-financial-accounting-computer-icons-bookkeeping-accountant-others-miscellaneous-text-thumbnail.png', 3, NULL, '2023-03-30 15:47:22'),
	(3, 'ملابس رياضية', '1680194749_pngtree-clothes-hoodie-sweater-sportswear-png-image_4294781-removebg-preview.png', 10, NULL, '2023-03-30 15:45:49'),
	(4, 'أقمصة للرجال', '1680194810_pngtree-yellow-men-s-shirt-image_1419634-removebg-preview.png', 7, NULL, '2023-03-30 15:46:50');

-- Dumping structure for table store.copons
CREATE TABLE IF NOT EXISTS `copons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `copon_value` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.copons: ~0 rows (approximately)

-- Dumping structure for table store.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table store.favorites
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `favorite_user_id` int NOT NULL,
  `favorite_item_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.favorites: ~2 rows (approximately)
INSERT INTO `favorites` (`id`, `favorite_user_id`, `favorite_item_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, '2023-03-30 15:36:45', '2023-03-30 15:36:45'),
	(2, 2, 3, '2023-03-30 17:29:11', '2023-03-30 17:29:11');

-- Dumping structure for table store.infopays
CREATE TABLE IF NOT EXISTS `infopays` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `info_user_id` int DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.infopays: ~1 rows (approximately)
INSERT INTO `infopays` (`id`, `info_user_id`, `full_name`, `full_address`, `full_zip`, `created_at`, `updated_at`) VALUES
	(1, 2, '000', '00000000', '00000000', '2023-04-02 16:40:58', '2023-04-02 16:40:58');

-- Dumping structure for table store.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.migrations: ~15 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2023_03_09_183129_create_sessions_table', 1),
	(7, '2023_03_10_150844_create_catagories_table', 1),
	(8, '2023_03_21_083904_create_products_table', 1),
	(9, '2023_03_21_093223_create_favorites_table', 1),
	(10, '2023_03_21_093234_create_carts_table', 1),
	(11, '2023_03_21_093256_create_copons_table', 1),
	(12, '2023_03_21_093309_create_buys_table', 1),
	(13, '2023_03_21_093342_create_products_buys_table', 1),
	(14, '2023_03_26_163251_create_payments_table', 1),
	(15, '2023_04_02_173514_create_infopays_table', 2);

-- Dumping structure for table store.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table store.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `payment_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cardholder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.payments: ~1 rows (approximately)
INSERT INTO `payments` (`id`, `payment_user_id`, `cardholder_name`, `card_number`, `expiry_month`, `expiry_year`, `cvv`, `billing_address`, `billing_zip`, `created_at`, `updated_at`) VALUES
	(1, '2', 'khalfaoui elhareth', '1020304050', '12', '2025', '256', 'algeris,eloued,zgoum', '39000', '2023-04-01 16:24:29', '2023-04-01 16:24:29');

-- Dumping structure for table store.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table store.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int NOT NULL DEFAULT '0',
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `product_rating` int NOT NULL DEFAULT '1',
  `product_discount` int NOT NULL DEFAULT '0',
  `categ_id` int NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int NOT NULL DEFAULT '1',
  `product_action` int NOT NULL DEFAULT '0',
  `product_custo` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.products: ~32 rows (approximately)
INSERT INTO `products` (`id`, `product_name`, `product_quantity`, `product_price`, `product_image`, `product_rating`, `product_discount`, `categ_id`, `product_description`, `product_status`, `product_action`, `product_custo`, `created_at`, `updated_at`) VALUES
	(1, 'جهاز قياس الضغط ونبضات القلب', 20, 2600.00, '11.jpg', 3, 0, 1, '', 1, 1, 4, NULL, NULL),
	(2, 'جهاز تفريغ الهواء لحفظ الاطعمة', 21, 5000.00, '12.jpeg', 4, 10, 1, '\r\nجهاز لتفريغ الهواء\r\n\r\nحفظ الطعام لفترة طويلة في الثلاجه\r\n\r\nسهلة الاستخدام\r\n\r\nحفظ\r\n\r\nالفواكه\r\n\r\nالخضار\r\n\r\nاللحوم\r\n\r\nالدجاج\r\n', 1, 1, 3, NULL, NULL),
	(3, 'جهاز تدليك الركبة والمفاصل', 378, 6300.00, '13.jpg', 5, 15, 1, '10', 1, 1, 3, NULL, '2023-04-03 15:52:01'),
	(4, 'مضخة صابون شاومي', 45, 3300.00, '14.jpg', 4, 20, 1, '', 1, 0, 3, NULL, NULL),
	(5, 'كفر سماعة اير بودز 1-2 ضد الصدمات', 20, 6100.00, '10.jpeg', 2, 0, 1, 'مناسبة لسماعة اير بودز 1-2\r\n\r\n', 1, 1, 4, NULL, '2023-04-03 15:45:34'),
	(6, 'فواحة وملطف جو للسيارة', 0, 2500.00, '15.jpg', 4, 5, 1, '', 0, 1, 3, NULL, NULL),
	(7, 'مبخرة الكترونية متنقلة', 300, 3000.00, '16.jpg', 2, 0, 1, '', 1, 1, 4, NULL, '2023-04-03 15:45:34'),
	(8, 'كاميرا مراقبة شاومي خارجية', 78, 20300.00, '17.jpg', 3, 0, 1, '', 1, 1, 4, NULL, '2023-03-30 15:56:10'),
	(9, 'ماكينة صنع القهوة 3 في 1', 425, 12000.00, '18.jpeg', 5, 12, 1, '', 1, 1, 3, NULL, NULL),
	(10, 'منصة شحن لاسلكي 3 في 1', 0, 3000.00, '19.jpg', 4, 0, 1, '', 0, 0, 4, NULL, NULL),
	(11, 'اكياس حفظ الاطعمة لجهاز تفريغ الهواء', 86, 320.00, '20.jpeg', 4, 0, 2, '', 1, 1, 4, NULL, NULL),
	(12, 'سماعة ايربادز لاسلكية من Baseus', 786, 8200.00, '21.jpg', 5, 50, 1, '', 1, 1, 4, NULL, NULL),
	(13, 'تيشيرت-باريس سان جيرمان 23-24', 78, 4000.00, '22.jpg', 4, 0, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 1, 1, 3, NULL, NULL),
	(14, 'تيشيرت-ريال مدريد2023', 0, 3800.00, '23.jpg', 3, 10, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 0, 1, 3, NULL, NULL),
	(15, 'تيشيرت +شورت مانشستر يونايتد 2023', 45, 4100.00, '24.jpg', 5, 0, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 1, 1, 4, NULL, NULL),
	(16, 'تيشيرت-بايرن ميونيخ 2023', 56, 4000.00, '25.jpg', 4, 0, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 1, 1, 4, NULL, NULL),
	(17, 'تيشيرت-البرتغال', 45, 4850.00, '26.jpg', 3, 5, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 1, 1, 3, NULL, NULL),
	(18, 'تيشيرت+شورت مانشستر سيتي', 65, 4650.00, '27.jpg', 5, 0, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 1, 1, 4, NULL, NULL),
	(19, 'تيشيرت-ريال مدريد2023', 542, 3800.00, '28.jpg', 2, 0, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 1, 1, 4, NULL, NULL),
	(20, 'تيشيرت+شورت-باريس الثاني', 45, 3000.00, '29.jpg', 3, 20, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 1, 1, 3, NULL, NULL),
	(21, 'بلوفر شتوي مبطن', 0, 2000.00, '30.jpg', 4, 0, 4, '', 0, 1, 3, NULL, '2023-03-30 15:56:22'),
	(22, 'بنطلون أبيض', 42, 2200.00, '31.jpg', 5, 8, 4, '', 1, 1, 4, NULL, NULL),
	(23, 'بلوفر مع بنطلون', 4545, 2500.00, '32.jpg', 2, 0, 4, '', 1, 1, 4, NULL, NULL),
	(24, 'طقم بلوفر مع بنطلون', 424, 2900.00, '33.jpg', 2, 10, 4, '', 1, 1, 4, NULL, NULL),
	(25, 'قميص رجالي', 42, 2000.00, '2.jpg', 5, 0, 4, '', 1, 1, 4, NULL, NULL),
	(26, 'قميص حسب الطلب', 45, 1500.00, '3.jpg', 1, 11, 4, '', 1, 1, 4, NULL, NULL),
	(27, 'قميص بدون رسوم ظهر', 445, 1200.00, '4.jpg', 3, 0, 4, '', 1, 1, 4, NULL, NULL),
	(28, 'تيشيرت+شورت الأرجنتين 2023', 452, 4500.00, '5.jpg', 3, 4, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 1, 1, 4, NULL, NULL),
	(29, 'تيشيرت-كورينثيانز 23-24', 4, 4200.00, '6.jpg', 5, 0, 3, 'يعتبر منتج القميص الرياضي واحدًا من أكثر المنتجات شيوعًا واستخدامًا في صالات الألعاب الرياضية والنوادي الرياضية وأيضًا بين الأفراد الراغبين في القيام بالتمارين الرياضية. يتميز هذا القميص بخاماته العالية الجودة والتي تسمح بتهوية الجسم وامتصاص العرق، كما أنه', 1, 1, 4, NULL, NULL),
	(30, '1 كوب ستاربكس الاسود', 786, 30.00, '7.jpg', 2, 15, 2, '', 1, 1, 4, NULL, NULL),
	(31, 'لاصق قوي من الجهتين', 68, 4500.00, '8.jpg', 2, 0, 2, '', 1, 1, 3, NULL, NULL),
	(32, 'سماعة بلوتوث', 67, 9900.00, '9.jpg', 4, 0, 1, '', 1, 1, 3, NULL, NULL);

-- Dumping structure for table store.products_buys
CREATE TABLE IF NOT EXISTS `products_buys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ptoducts_buy_ptoduct_id` int NOT NULL,
  `ptoducts_buy_product_quantity` int NOT NULL,
  `ptoducts_buy_product_totalprice` int NOT NULL,
  `ptoducts_buy_buy_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.products_buys: ~7 rows (approximately)
INSERT INTO `products_buys` (`id`, `ptoducts_buy_ptoduct_id`, `ptoducts_buy_product_quantity`, `ptoducts_buy_product_totalprice`, `ptoducts_buy_buy_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 10, 50000, 1, NULL, NULL),
	(2, 7, 10, 30000, 1, NULL, NULL),
	(3, 4, 25, 82500, 1, NULL, NULL),
	(4, 2, 10, 50000, 2, NULL, NULL),
	(11, 4, 10, 3300, 7, '2023-04-03 15:23:23', '2023-04-03 15:23:23'),
	(12, 2, 1, 5000, 7, '2023-04-03 15:23:23', '2023-04-03 15:23:23'),
	(13, 1, 1, 2600, 7, '2023-04-03 15:23:23', '2023-04-03 15:23:23');

-- Dumping structure for table store.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('hujvwbsAUMQU77PW5JrgW2OQYfKsxUAXMzmItjFh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlVwUlc0YXZ0aVNpVnp4TEhyMnJTVm01OVlHWllnelFGR3VoNGNkNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9zdG9yZS50ZXN0L3JlZ2lzdGVyIjt9fQ==', 1680544216),
	('SOD1ha9ZtdDxHWXhqKAhDOOwZ1k83Ykp0TicoGBE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2U2WVRyZ1N6M0tOc3FEd3NkTVVwakJpS2p2cnNpVnRhMGY3N0JvcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9zdG9yZS50ZXN0L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1680623907);

-- Dumping structure for table store.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT 'user.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table store.users: ~11 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `role`, `action`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', 'admin', '1', '123', NULL, '$2y$10$S7yLvpwOmAqp5vUVnpYTSeKQkCRUSnn3uof56D0eqxgOLPCH.IZci', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-03-29 15:40:52', '2023-03-29 15:40:52'),
	(2, 'demo', 'demo@demo.com', 'client', '1', '123', NULL, '$2y$10$DYthrgYMIaTY15wkiCk.8O.2N3CtYf/BJRrJ9/hHYIvg4UBiiSwuS', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-03-29 15:42:55', '2023-03-29 15:42:55'),
	(3, 'customer', 'customer@customer.com', 'customer', '1', '123', NULL, '$2y$10$u/uPYhSzppjMNpzYF8J8MuN/DxBRWcTfCW61.iPxM7et.HLVym8fe', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-03-29 15:43:28', '2023-03-29 15:43:28'),
	(4, 'customer2', 'customer2@customer2.com', 'customer', '1', '123', NULL, '$2y$10$ijzkSHbME8JTUY3Dn9723eEWiZ8quLW2.ViU01WN45yvxKpLVijbO', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-03-29 15:44:32', '2023-03-29 15:44:32'),
	(5, 'demo2', 'demo2@demo2.com', 'client', '1', '123', NULL, '$2y$10$HsXhzDhbAfgzR8aLpaB8DujG9JqmQyZ3HHS1RVg1VVVaaMobrqUHe', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-03-29 15:45:12', '2023-03-29 15:45:12'),
	(6, 'admin2', 'admin2@admin2.com', 'admin', '1', '123', NULL, '$2y$10$0qnjXuFZFbUw0YWd08NeuOvUjcucYbPEowMpdYWin3qVmxncszq6y', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-03-29 15:45:34', '2023-04-03 16:42:53'),
	(7, 'admin3', 'admin3@admin3.com', 'admin', '1', '123', NULL, '$2y$10$qiV.5zCiD4.RqugheSMPoO45S026wmIUCho2rPYa3FE88Rr1dfX8a', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-03-29 15:45:54', '2023-03-29 15:45:54'),
	(8, 'demo3', 'demo3@demo3.com', 'client', '1', '123', NULL, '$2y$10$FV8I2WHF8nU.4I.EjZlEpevifKyvAR0PZIEIESWA5Ya1kMJnpHz96', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-03-29 15:46:32', '2023-03-29 15:46:32'),
	(9, 'demo4', 'demo4@demo4.com', 'client', '1', '123', NULL, '$2y$10$TihDq6FiUoftUonU0TKpy.MF5CNTVBJSfnKyTCl2Cj.Iq5V0W/uLS', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-03-29 15:46:51', '2023-03-29 15:46:51'),
	(13, 'demo9', 'demo9@demo9.com', 'customer', '1', '123', NULL, '$2y$10$MEaFKs7ZabB25z2x1m2STuUnJIRPmgYTk6Qhf5aSDjY2ExeH9jiQe', NULL, NULL, NULL, NULL, NULL, '1680202617_1.jpg', '2023-03-30 17:56:57', '2023-03-30 17:56:57'),
	(17, 'admin10', 'xegoba3226@jthoven.com', 'client', '1', '000000000', NULL, '$2y$10$SdI1NYtIBkcCLxffjDHS4O38GRLfuLC4vcLPTIHUcMPkk1CoFsNu.', NULL, NULL, NULL, NULL, NULL, 'user.png', '2023-04-03 16:28:13', '2023-04-03 16:28:13');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
