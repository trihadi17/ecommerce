-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ecommerce.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `products_id` int NOT NULL,
  `users_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.carts: ~0 rows (approximately)
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- Dumping structure for table ecommerce.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Bahan Pokok', NULL, '2024-03-20 00:42:05', NULL),
	(2, 'Elektronik', NULL, '2024-03-20 00:42:05', NULL),
	(3, 'Sepatu', NULL, '2024-03-20 00:42:05', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table ecommerce.failed_jobs
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

-- Dumping data for table ecommerce.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table ecommerce.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_03_18_103009_create_carts_table', 1),
	(6, '2024_03_18_103059_create_categories_table', 1),
	(7, '2024_03_18_103426_create_products_table', 1),
	(8, '2024_03_18_103732_create_product_galleries_table', 1),
	(9, '2024_03_18_103832_create_transactions_table', 1),
	(10, '2024_03_18_104004_create_transaction_details_table', 1),
	(11, '2024_03_18_104128_create_transaction_histories_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ecommerce.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table ecommerce.personal_access_tokens
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

-- Dumping data for table ecommerce.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table ecommerce.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` int NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.products: ~3 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `description`, `categories_id`, `price`, `quantity`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Kecap Bango', 'Kecap asli yang ada bangonya', 1, 3000, 1000, NULL, '2024-03-20 00:42:05', NULL),
	(2, 'Lifebuoy', 'Sabun anti kuman', 1, 5000, 1000, NULL, '2024-03-20 00:42:05', NULL),
	(3, 'Teh Tarik', 'Teh tarik dari Vrindavan', 1, 10000, 500, NULL, '2024-03-20 00:42:05', NULL),
	(4, 'Hp Samsung', 'Hp dengan spek terbaik', 2, 5000000, 50, NULL, '2024-03-20 00:42:05', NULL),
	(5, 'Laptop Asus', 'Laptop mendunia', 2, 10000000, 50, NULL, '2024-03-20 00:42:05', NULL),
	(6, 'Adidas', 'Ini adalah septau Adidas Terbaru', 3, 120000, 100, NULL, '2024-03-20 00:42:05', NULL),
	(7, 'Puma', 'Ini adalah sepatu Nike Tercanggih', 3, 100000, 100, NULL, '2024-03-20 00:42:05', NULL),
	(8, 'Nike', 'Ini adalah septau Adidas Terbaik Sepanjang Masa', 3, 150000, 100, NULL, '2024-03-20 00:42:05', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table ecommerce.product_galleries
CREATE TABLE IF NOT EXISTS `product_galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `photos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.product_galleries: ~15 rows (approximately)
/*!40000 ALTER TABLE `product_galleries` DISABLE KEYS */;
INSERT INTO `product_galleries` (`id`, `photos`, `products_id`, `created_at`, `updated_at`) VALUES
	(1, 'kecapbango1.png', 1, '2024-03-20 00:42:05', NULL),
	(2, 'kecapbango2.png', 1, '2024-03-20 00:42:05', NULL),
	(3, 'lifebuoy1.png', 2, '2024-03-20 00:42:05', NULL),
	(4, 'lifebuoy2.png', 2, '2024-03-20 00:42:05', NULL),
	(5, 'tehtarik.png', 3, '2024-03-20 00:42:05', NULL),
	(6, 'samsung1.png', 4, '2024-03-20 00:42:05', NULL),
	(7, 'samsung2.png', 4, '2024-03-20 00:42:05', NULL),
	(8, 'laptop1.png', 5, '2024-03-20 00:42:05', NULL),
	(9, 'laptop2.png', 5, '2024-03-20 00:42:05', NULL),
	(10, 'adidas1.png', 6, '2024-03-20 00:42:05', NULL),
	(11, 'adidas2.png', 6, '2024-03-20 00:42:05', NULL),
	(12, 'puma1.png', 7, '2024-03-20 00:42:05', NULL),
	(13, 'puma2.png', 7, '2024-03-20 00:42:05', NULL),
	(14, 'nike1.png', 8, '2024-03-20 00:42:05', NULL),
	(15, 'nike2.png', 8, '2024-03-20 00:42:05', NULL);
/*!40000 ALTER TABLE `product_galleries` ENABLE KEYS */;

-- Dumping structure for table ecommerce.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int NOT NULL,
  `shipping_price` int NOT NULL,
  `total_price` int NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `va_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biller_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_time` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.transactions: ~0 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `users_id`, `shipping_price`, `total_price`, `transaction_status`, `bank`, `va_number`, `bill_key`, `biller_code`, `expire_time`, `deleted_at`, `created_at`, `updated_at`) VALUES
	('18cb1d95-a21a-4a73-b628-72ece2beb6d1', 1, 0, 3000, 'EXPIRED', 'permata', '8240088858563854', NULL, NULL, '2024-03-20 11:15:00', NULL, '2024-03-20 11:11:30', '2024-03-20 11:13:33'),
	('cd27f32f-9a48-4758-bf97-7f8c0b775caa', 1, 0, 256000, 'PAID', 'bca', '82406011792', NULL, NULL, '2024-03-20 11:11:25', NULL, '2024-03-20 11:07:55', '2024-03-20 11:08:37'),
	('f2cb575c-d372-42e7-b9cd-d8b9830d0b68', 1, 0, 10000000, 'CANCEL', 'mandiri', NULL, '707584527832', '70012', '2024-03-20 11:13:27', NULL, '2024-03-20 11:09:57', '2024-03-20 11:10:41');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table ecommerce.transaction_details
CREATE TABLE IF NOT EXISTS `transaction_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transactions_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_id` int NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.transaction_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `transaction_details` DISABLE KEYS */;
INSERT INTO `transaction_details` (`id`, `transactions_id`, `products_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 'cd27f32f-9a48-4758-bf97-7f8c0b775caa', 1, 3000, 2, NULL, NULL),
	(2, 'cd27f32f-9a48-4758-bf97-7f8c0b775caa', 6, 120000, 2, NULL, NULL),
	(3, 'cd27f32f-9a48-4758-bf97-7f8c0b775caa', 3, 10000, 1, NULL, NULL),
	(4, 'f2cb575c-d372-42e7-b9cd-d8b9830d0b68', 5, 10000000, 1, NULL, NULL),
	(5, '18cb1d95-a21a-4a73-b628-72ece2beb6d1', 1, 3000, 1, NULL, NULL);
/*!40000 ALTER TABLE `transaction_details` ENABLE KEYS */;

-- Dumping structure for table ecommerce.transaction_histories
CREATE TABLE IF NOT EXISTS `transaction_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transactions_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.transaction_histories: ~0 rows (approximately)
/*!40000 ALTER TABLE `transaction_histories` DISABLE KEYS */;
INSERT INTO `transaction_histories` (`id`, `transactions_id`, `status`, `payload`, `created_at`, `updated_at`) VALUES
	(1, 'cd27f32f-9a48-4758-bf97-7f8c0b775caa', 'pending', '{"va_numbers":[{"va_number":"82406011792","bank":"bca"}],"transaction_time":"2024-03-20 11:10:25","transaction_status":"pending","transaction_id":"ecb79e2b-cf59-4e9e-b84d-480f4c77e6ce","status_message":"midtrans payment notification","status_code":"201","signature_key":"1e12eae6300b259737027a1ae783edb9eb6d4ec0c1966e7f14d79c113ffd533e122cc5e1b3cec8bab19b35d9de82c3b3d8d19d2d94aefdc02a5d22d435971298","payment_type":"bank_transfer","payment_amounts":[],"order_id":"cd27f32f-9a48-4758-bf97-7f8c0b775caa","merchant_id":"G706682406","gross_amount":"256000.00","fraud_status":"accept","expiry_time":"2024-03-20 11:11:25","currency":"IDR"}', '2024-03-20 11:07:58', '2024-03-20 11:07:58'),
	(2, 'cd27f32f-9a48-4758-bf97-7f8c0b775caa', 'settlement', '{"va_numbers":[{"va_number":"82406011792","bank":"bca"}],"transaction_time":"2024-03-20 11:10:25","transaction_status":"settlement","transaction_id":"ecb79e2b-cf59-4e9e-b84d-480f4c77e6ce","status_message":"midtrans payment notification","status_code":"200","signature_key":"886257d13bc854760fdf804ec632d7ed30094649ed9cfc7ab9dbea53bfc283a5a3b1cd4dc0a943cefa96bbbdd2927bf8eb9f9506fe3cf30a601668f0dd716d08","settlement_time":"2024-03-20 11:11:04","payment_type":"bank_transfer","payment_amounts":[],"order_id":"cd27f32f-9a48-4758-bf97-7f8c0b775caa","merchant_id":"G706682406","gross_amount":"256000.00","fraud_status":"accept","expiry_time":"2024-03-20 11:11:25","currency":"IDR"}', '2024-03-20 11:08:37', '2024-03-20 11:08:37'),
	(3, 'f2cb575c-d372-42e7-b9cd-d8b9830d0b68', 'pending', '{"transaction_time":"2024-03-20 11:12:27","transaction_status":"pending","transaction_id":"98478d64-4df9-4513-ad48-8ce173120fbd","status_message":"midtrans payment notification","status_code":"201","signature_key":"25fa407c8b43d7724b7241c0c4fe8f8a5cbcf6ff72bc9c457a2d68992e66be1997c6936269452806376b2eeb6d665792d740b22b68ede996e3ce46be69059b3d","payment_type":"echannel","order_id":"f2cb575c-d372-42e7-b9cd-d8b9830d0b68","merchant_id":"G706682406","gross_amount":"10000000.00","fraud_status":"accept","expiry_time":"2024-03-20 11:13:27","currency":"IDR","biller_code":"70012","bill_key":"707584527832"}', '2024-03-20 11:10:00', '2024-03-20 11:10:00'),
	(4, 'f2cb575c-d372-42e7-b9cd-d8b9830d0b68', 'cancel', '{"transaction_time":"2024-03-20 11:12:27","transaction_status":"cancel","transaction_id":"98478d64-4df9-4513-ad48-8ce173120fbd","status_message":"midtrans payment notification","status_code":"202","signature_key":"a1ebab8dfb29a3e54348b5b60743b6a995e6280bb2e22b9381a1eb04b7f23a54d7da9b8224c5b69f60f6a4ab4bf7c0c7f234736ca0c4709a8cb4e1b77921d988","payment_type":"echannel","order_id":"f2cb575c-d372-42e7-b9cd-d8b9830d0b68","merchant_id":"G706682406","gross_amount":"10000000.00","fraud_status":"accept","expiry_time":"2024-03-20 11:13:27","currency":"IDR","biller_code":"70012","bill_key":"707584527832"}', '2024-03-20 11:10:41', '2024-03-20 11:10:41'),
	(5, '18cb1d95-a21a-4a73-b628-72ece2beb6d1', 'pending', '{"transaction_time":"2024-03-20 11:14:00","transaction_status":"pending","transaction_id":"24f6d4d8-314f-4d23-ba3d-01a0824469d4","status_message":"midtrans payment notification","status_code":"201","signature_key":"79d881878998e832b28bdcc9e3369150239ea48942953d0429b9334ec84b8d4fdc8e67495fb2b9a4073fffa32a9e89b4b056aec3683ea0307819335139e50742","permata_va_number":"8240088858563854","payment_type":"bank_transfer","order_id":"18cb1d95-a21a-4a73-b628-72ece2beb6d1","merchant_id":"G706682406","gross_amount":"3000.00","fraud_status":"accept","expiry_time":"2024-03-20 11:15:00","currency":"IDR"}', '2024-03-20 11:11:33', '2024-03-20 11:11:33'),
	(6, '18cb1d95-a21a-4a73-b628-72ece2beb6d1', 'expire', '{"transaction_time":"2024-03-20 11:14:00","transaction_status":"expire","transaction_id":"24f6d4d8-314f-4d23-ba3d-01a0824469d4","status_message":"midtrans payment notification","status_code":"202","signature_key":"1d53908c4a3f210481e83a10c1dfec8d9c2c7e632dafd13338ccd97c2c3024350116a53f7918c267462a615d9dbe664076df5dd9c56463aab8297b1524c2661d","permata_va_number":"8240088858563854","payment_type":"bank_transfer","order_id":"18cb1d95-a21a-4a73-b628-72ece2beb6d1","merchant_id":"G706682406","gross_amount":"3000.00","fraud_status":"accept","expiry_time":"2024-03-20 11:15:00","currency":"IDR"}', '2024-03-20 11:13:33', '2024-03-20 11:13:33');
/*!40000 ALTER TABLE `transaction_histories` ENABLE KEYS */;

-- Dumping structure for table ecommerce.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinces` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regencies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `address`, `provinces`, `regencies`, `zip_code`, `country`, `phone_number`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Trihadi', 'Putra', 'trihadi17@gmail.com', NULL, '$2y$12$IOC6z0og4HxQiw5.umy5kOLDQ0gJs8WjUjH2SSVAuuof7xtslM/zq', 'Jl. Serayu Gg. Serayu II', 'Riau', 'Pekanbaru', '28292', 'Indonesia', '0895603075970', NULL, NULL, NULL, NULL),
	(2, 'Indro', 'Kustiawan', 'indrokustiawan@gmail.com', NULL, '$2y$12$31y8ZpOqtuZs6falv1sbYeSDGQNUo3Gnviw2mvaZjdDlcd9CtHfZC', 'Jl. Delima', 'Riau', 'Pekanbaru', '28392', 'Indonesia', '081234550987', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
