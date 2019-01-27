-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                5.6.37 - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Win32
-- HeidiSQL Sürüm:               10.1.0.5464
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
	(17, 'Burak', 'Karagöz', 'burak_deliormanli@hotmail.com', '05324785841', 'Ankara Enerji', 'Ankara', '', '12345677891', 1, '2019-01-20 23:49:42', '2019-01-27 18:50:28');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- stok.invoice: ~1 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `customer_id`, `no`, `type`, `total`, `description`, `status`, `create_date`, `update_date`) VALUES
	(1, 16, 'aa111', 0, 1025.44, 'aa', 1, NULL, '2019-01-27 21:49:00'),
	(2, 15, 'aa11', 1, 1250.45, 'test', 1, '2019-01-27 21:40:27', '2019-01-27 21:49:03');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- stok.stock: ~9 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`id`, `product_id`, `customer_id`, `safe_id`, `action_type`, `quantity`, `price`, `status`, `create_date`, `update_date`) VALUES
	(1, 1, 15, 1, 0, 100, 5.00, 1, '2019-01-27 20:12:48', NULL),
	(2, 2, 16, 2, 0, 150, 15.00, 1, '2019-01-27 20:13:17', NULL),
	(3, 3, 17, 1, 0, 100, 50.00, 1, '2019-01-27 20:13:36', NULL),
	(4, 4, 17, 2, 0, 75, 75.00, 1, '2019-01-27 20:13:54', NULL),
	(5, 2, 15, 1, 1, 85, 25.00, 1, '2019-01-27 20:14:52', '2019-01-27 20:16:10'),
	(6, 1, 16, 2, 1, 95, 11.00, 1, '2019-01-27 20:16:57', '2019-01-27 20:17:11'),
	(7, 3, 16, 2, 1, 95, 150.00, 1, '2019-01-27 20:18:18', NULL),
	(8, 4, 15, 2, 1, 70, 100.00, 1, '2019-01-27 20:18:48', NULL),
	(9, 2, 17, 1, 1, 60, 20.00, 1, '2019-01-27 20:19:45', NULL);
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
