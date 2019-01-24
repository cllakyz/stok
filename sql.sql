-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                5.6.37 - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Win32
-- HeidiSQL Sürüm:               10.0.0.5460
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
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- stok.category: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `status`, `create_date`, `update_date`) VALUES
	(5, 'Yemek-İçme', 1, '2019-01-20 23:44:57', NULL),
	(6, 'Spor Malzemeleri', 1, '2019-01-20 23:45:13', NULL);
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
	(15, 'Celal', 'Akyüz', 'celal7174@gmail.com', '05057510467', 'RestApp', 'Beylikdüzü', '', '42814738816', 1, '2019-01-20 23:48:01', NULL),
	(16, 'Zeki', 'Kuş', 'zekiikus@gmail.com', '05055453215', 'Python', 'Esenyurt', '', '11223344556', 1, '2019-01-20 23:48:56', NULL),
	(17, 'Burak', 'Karagöz', 'burak_deliormanli@hotmail.com', '05324785841', 'Ankara Enerji', 'Ankara', '', '12345677891', 1, '2019-01-20 23:49:42', NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `modifiers` text,
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `FK_urunler_kategoriler` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- stok.product: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `category_id`, `name`, `modifiers`, `status`, `create_date`, `update_date`) VALUES
	(7, 6, 'Dumbel', '[{"name":"Kilogram","value":"50"}]', 1, '2019-01-20 23:46:07', NULL),
	(8, 5, 'Fasulye', '[{"name":"T\\u00fcr\\u00fc","value":"Kuru Fasulye"}]', 1, '2019-01-20 23:46:44', NULL),
	(9, 5, 'Balık', '[{"name":"T\\u00fcr\\u00fc","value":"Palamut"}]', 1, '2019-01-24 00:04:11', NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.safe
CREATE TABLE IF NOT EXISTS `safe` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- stok.safe: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `safe` DISABLE KEYS */;
INSERT INTO `safe` (`id`, `name`, `status`, `create_date`, `update_date`) VALUES
	(1, 'Y Kasası', 1, '2019-01-24 00:21:46', '2019-01-24 21:47:33'),
	(2, 'Test silme', 2, '2019-01-24 21:42:16', '2019-01-24 21:42:35'),
	(3, 'X Kasası', 1, '2019-01-24 21:47:18', NULL);
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
  CONSTRAINT `FK_stock_safe` FOREIGN KEY (`safe_id`) REFERENCES `safe` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_stok_musteriler` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_stok_urunler` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- stok.stock: ~6 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`id`, `product_id`, `customer_id`, `safe_id`, `action_type`, `quantity`, `price`, `status`, `create_date`, `update_date`) VALUES
	(1, 7, 17, NULL, 0, 100, 10.00, 1, '2019-01-20 23:50:54', NULL),
	(2, 7, 15, NULL, 1, 100, 15.00, 1, '2019-01-20 23:52:19', NULL),
	(3, 8, 16, NULL, 0, 1000, 2.00, 1, '2019-01-20 23:53:16', NULL),
	(4, 8, 17, NULL, 1, 500, 3.00, 1, '2019-01-20 23:54:05', NULL),
	(5, 8, 15, NULL, 1, 500, 4.00, 1, '2019-01-20 23:55:14', '2019-01-20 23:55:36'),
	(6, 9, 15, NULL, 0, 100, 10.00, 1, '2019-01-24 00:04:29', NULL);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- stok.user: ~1 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `password`, `status`, `create_date`, `update_date`) VALUES
	(1, 'Celal Akyüz', 'celal7174@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', '2018-12-22 23:34:37', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
