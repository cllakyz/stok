-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                5.6.37 - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Win32
-- HeidiSQL Sürüm:               9.5.0.5459
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- stok.category: ~4 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `status`, `create_date`, `update_date`) VALUES
	(1, 'Yemek', 1, '2018-12-23 13:10:49', '2019-01-06 22:26:45'),
	(2, 'İçecek', 1, '2019-01-06 22:06:24', '2019-01-06 22:55:13'),
	(3, 'sasasasasa', 2, '2019-01-06 22:52:17', '2019-01-20 14:17:15'),
	(4, 'test', 2, '2019-01-06 22:54:27', '2019-01-20 14:17:14');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- stok.customer: ~14 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `name`, `surname`, `email`, `phone`, `company`, `address`, `note`, `tc_no`, `status`, `create_date`, `update_date`) VALUES
	(1, 'Celal', 'Akyüz', 'celal7174@gmail.com', '05057510467', 'test', 'Büyükşehir mah. Atatürk bul. Güzelkent sitesi A/2 blok daire 53', 'test', '42814738814', 1, '2019-01-01 21:46:15', '2019-01-13 21:57:04'),
	(2, 'celal', 'Akyğz', 'celal.akyuz@creapeak.com', '02128726065', 'cee', 'istanbul', 'test', '21121122', 1, '2019-01-01 22:05:49', '2019-01-13 22:37:02'),
	(3, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 2, '2019-01-13 22:19:29', '2019-01-13 22:35:07'),
	(4, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 2, '2019-01-13 22:20:18', '2019-01-13 22:34:51'),
	(5, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 2, '2019-01-13 22:20:20', '2019-01-13 22:34:52'),
	(6, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 2, '2019-01-13 22:20:20', '2019-01-13 22:34:54'),
	(7, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 2, '2019-01-13 22:20:20', '2019-01-13 22:35:01'),
	(8, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 2, '2019-01-13 22:20:21', '2019-01-13 22:35:02'),
	(9, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 2, '2019-01-13 22:20:21', '2019-01-13 22:35:03'),
	(10, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 2, '2019-01-13 22:20:33', '2019-01-13 22:35:05'),
	(11, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 2, '2019-01-13 22:21:28', '2019-01-13 22:34:48'),
	(12, 's', 's', 's', 's', 's', 's', '', 's', 2, '2019-01-13 22:21:46', '2019-01-13 22:34:49'),
	(13, 'asas', 'sdsd', 'asas@ss.com', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsdsd', 2, '2019-01-13 22:23:40', '2019-01-13 22:34:25'),
	(14, 'asas', 'sdsd', 'asas@ss.com1', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsdsdASASA', 2, '2019-01-13 22:24:15', '2019-01-13 22:34:16');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- stok.product: ~5 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `category_id`, `name`, `modifiers`, `status`, `create_date`, `update_date`) VALUES
	(2, 1, 'Patates kızartması', '[{"name":"T\\u00fcr\\u00fc","value":"K\\u0131zartma"},{"name":"Malzeme","value":"Patates"},{"name":"Pi\\u015firme seviyesi","value":"\\u00c7ok"},{"name":"Birim","value":"Kilogram"}]', 1, '2018-12-26 23:08:34', '2019-01-20 14:18:51'),
	(3, 1, 'test2', '[{"name":"gfgfg","value":"fgfg"},{"name":"fgfgf1111","value":"fgfgfg"}]', 2, '2019-01-07 22:44:39', '2019-01-20 14:17:06'),
	(4, 2, 'test', '[{"name":"rrr","value":"rrr"}]', 2, '2019-01-07 22:48:16', '2019-01-20 14:17:04'),
	(5, 2, 'Test silme', '[{"name":"asasas","value":"asasasas"}]', 2, '2019-01-07 22:58:24', '2019-01-20 14:17:01'),
	(6, 2, 'Cola', '[{"name":"Birim","value":"Litre"}]', 1, '2019-01-20 14:18:00', NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- tablo yapısı dökülüyor stok.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `action_type` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `FK_stok_musteriler` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_stok_urunler` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- stok.stock: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` (`id`, `product_id`, `customer_id`, `action_type`, `quantity`, `price`, `status`, `create_date`, `update_date`) VALUES
	(3, 2, 1, 1, 1000, 5.00, 1, '2019-01-20 14:18:20', NULL),
	(4, 6, 2, 0, 1000, 2.00, 1, '2019-01-20 14:20:12', NULL);
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
