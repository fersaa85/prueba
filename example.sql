# Host: localhost  (Version: 5.6.21)
# Date: 2017-03-30 02:07:38
# Generator: MySQL-Front 5.3  (Build 4.113)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "user_info"
#

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `bitrhday` date DEFAULT '0000-00-00',
  `annual_income` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "user_info"
#

INSERT INTO `user_info` VALUES (1,1,'1985-09-24',100),(2,2,'2015-03-30',10000),(3,5,'2015-03-30',10000),(4,6,'2015-03-30',10000),(5,10,'2015-03-30',10000),(6,14,'1985-09-24',100);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_name_parent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name_mother` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Fernando','fersaavedra85@hotmail.com','$2y$10$WpGFI32xND3FOMH1n2Izc.DB1kl1h4tHRYW3nyraQEp/g.uI1CXCq',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(10,'ajax','','',NULL,'2017-03-30 07:51:27','2017-03-30 07:51:27','',''),(14,'prueba','58dcbaaaab444@hotmail.com','',NULL,'2017-03-30 07:58:34','2017-03-30 07:58:34','','');
