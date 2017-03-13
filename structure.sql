-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.1.16-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица lemon_tsn.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `citizen` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `link_fb` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foreign_passport` set('yes','no') DEFAULT NULL,
  `shengen_visa` set('yes','no') DEFAULT NULL,
  `visa_own` set('yes','no') DEFAULT NULL,
  `lodging_with_pay` set('yes','no') DEFAULT NULL,
  `lodging_without_pay` set('yes','no') DEFAULT NULL,
  `years_sup_football` tinyint(4) DEFAULT NULL,
  `fb_support` text,
  `fb_in_your_life` text,
  `sup_in_foreign_country` set('yes','no') DEFAULT NULL,
  `matches` text,
  `birthday` date DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activate` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы lemon_tsn.users: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `surname`, `second_name`, `citizen`, `city`, `region`, `link_fb`, `phone`, `email`, `password`, `foreign_passport`, `shengen_visa`, `visa_own`, `lodging_with_pay`, `lodging_without_pay`, `years_sup_football`, `fb_support`, `fb_in_your_life`, `sup_in_foreign_country`, `matches`, `birthday`, `create_date`, `edit_date`, `activate`) VALUES
	(1, 'admin', '', '', '', '', '', '', '', '', '22f772c70831cb57d640e31c8388be50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-02-17 18:10:18', '2017-02-17 18:12:48', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
