-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                5.6.37 - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Win32
-- HeidiSQL Sürüm:               10.1.0.5473
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- tablo yapısı dökülüyor stok.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sef` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- stok.category: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `sef`, `status`, `create_date`, `update_date`) VALUES
	(1, 'Yeme-İçme', 'yeme-icme', 1, '2019-01-27 20:09:53', NULL),
	(2, 'Spor Malzemeleri', 'spor-malzemeleri', 1, '2019-01-27 20:09:53', NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` text,
  `note` text,
  `tc_no` varchar(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- stok.customer: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `name`, `surname`, `email`, `phone`, `company`, `address`, `note`, `tc_no`, `status`, `create_date`, `update_date`) VALUES
	(15, 'Celal', 'Akyüz', 'celal7174@gmail.com', '05057510467', 'RestApp', 'Beylikdüzü', '', '42814738816', 1, '2019-01-20 23:48:01', '2019-01-27 18:50:31'),
	(16, 'Zeki', 'Kuş', 'zekiikus@gmail.com', '05055453215', 'Python', 'Esenyurt', '', '11223344556', 1, '2019-01-20 23:48:56', NULL),
	(17, 'Burak', 'Karagöz', 'burak_deliormanli@hotmail.com', '05324785841', 'Ankara Enerji', 'Ankara', '', '12345677891', 0, '2019-01-20 23:49:42', '2019-01-27 22:56:34');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL COMMENT '0:gelir, 1:gider',
  `total` decimal(10,2) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) DEFAULT '1' COMMENT '0:pasif, 1:aktif, 2:silinmiş',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_invoice_customer` (`customer_id`),
  CONSTRAINT `FK_invoice_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- stok.invoice: ~1 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `customer_id`, `no`, `type`, `total`, `description`, `status`, `create_date`, `update_date`) VALUES
	(8, 15, 'a5000', 1, 5000.00, 'Balık için ödendi', 1, '2019-01-27 22:59:27', NULL);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `order_code` int(11) DEFAULT NULL,
  `products` text,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orders_customer` (`customer_id`),
  KEY `FK_orders_user` (`user_id`),
  CONSTRAINT `FK_orders_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_orders_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- stok.orders: ~1 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `order_code`, `products`, `total_price`, `order_date`, `status`, `create_date`, `update_date`) VALUES
	(5, 15, 2, 167825144, '[{"id":"1","unit":"100","price":"10"},{"id":"2","unit":"150","price":"7.5"},{"id":"3","unit":"10","price":"15"}]', 2275.00, '2019-02-18', 1, '2019-02-04 23:17:19', '2019-02-04 23:51:43');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sef` varchar(255) DEFAULT NULL,
  `modifiers` text,
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `FK_urunler_kategoriler` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- stok.product: ~4 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `category_id`, `name`, `sef`, `modifiers`, `status`, `create_date`, `update_date`) VALUES
	(1, 1, 'Fasulye', 'fasulye', '[{"name":"T\\u00fcr\\u00fc","value":"Kuru Fasulye"}]', 1, '2019-01-20 23:46:00', NULL),
	(2, 1, 'Balık', 'balik', '[{"name":"T\\u00fcr\\u00fc","value":"Palamut"}]', 1, '2019-01-24 00:04:00', NULL),
	(3, 2, 'Dumbel', 'dumbel', '[{"name":"Kilogram","value":"50"}]', 1, '2019-01-20 23:46:00', NULL),
	(4, 2, 'Halter', 'halter', '[{"name":"Kilogram","value":"50"}]', 1, '2019-01-26 13:18:00', NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.safe
CREATE TABLE IF NOT EXISTS `safe` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sef` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- stok.safe: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `safe` DISABLE KEYS */;
INSERT INTO `safe` (`id`, `name`, `sef`, `status`, `create_date`, `update_date`) VALUES
	(1, 'Kasa 1', 'kasa-1', 1, '2019-01-27 20:11:57', NULL),
	(2, 'Kasa 2', 'kasa-2', 1, '2019-01-27 20:12:21', NULL);
/*!40000 ALTER TABLE `safe` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `safe_id` int(11) unsigned DEFAULT NULL,
  `action_type` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`),
  KEY `FK_stock_safe` (`safe_id`),
  CONSTRAINT `FK_stock_safe` FOREIGN KEY (`safe_id`) REFERENCES `safe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_stok_musteriler` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_stok_urunler` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- stok.stock: ~1 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`id`, `product_id`, `customer_id`, `safe_id`, `action_type`, `quantity`, `price`, `status`, `create_date`, `update_date`) VALUES
	(10, 2, 15, 1, 0, 1000, 7.50, 1, '2019-01-27 22:57:44', NULL);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permission` text,
  `status` tinyint(1) DEFAULT '1',
  `token` varchar(255) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- stok.user: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `password`, `permission`, `status`, `token`, `create_date`, `update_date`) VALUES
	(1, 'Celal Akyüz', 'celal7174@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '["category","customer","invoice","product","report","safe","stock","user"]', 1, NULL, '2018-12-22 23:34:37', '2019-02-02 13:41:54'),
	(2, 'Test Test', 'test@test.com', '3acd0be86de7dcccdbf91b20f94a68cea535922d', NULL, 1, '215491088165c558650ca5b0', '2019-01-29 23:40:28', '2019-02-02 14:57:26');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
