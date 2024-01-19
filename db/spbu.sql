/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - spbu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `sales_report` */

DROP TABLE IF EXISTS `sales_report`;

CREATE TABLE `sales_report` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_tank_report` bigint(20) DEFAULT NULL,
  `jam_awal` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `kapasitas` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `id_tank_report` (`id_tank_report`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `sales_report_ibfk_1` FOREIGN KEY (`id_tank_report`) REFERENCES `tank_report` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sales_report_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `supply` */

DROP TABLE IF EXISTS `supply`;

CREATE TABLE `supply` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `tank` */

DROP TABLE IF EXISTS `tank`;

CREATE TABLE `tank` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `number` int(2) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `capacity` bigint(20) DEFAULT NULL,
  `diameter` float DEFAULT NULL,
  `id_type` bigint(20) DEFAULT NULL,
  `id_grade` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type` (`id_type`),
  KEY `id_grade` (`id_grade`),
  CONSTRAINT `tank_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `tank_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tank_ibfk_2` FOREIGN KEY (`id_grade`) REFERENCES `tank_grade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `tank_delivery` */

DROP TABLE IF EXISTS `tank_delivery`;

CREATE TABLE `tank_delivery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `do_volume` bigint(20) DEFAULT NULL,
  `id_tank` bigint(20) DEFAULT NULL,
  `id_don` varchar(20) DEFAULT NULL,
  `driver` varchar(255) DEFAULT NULL,
  `vehicle_number` varchar(255) DEFAULT NULL,
  `id_supplier` bigint(20) DEFAULT NULL,
  `id_supply` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_supplier` (`id_supplier`),
  KEY `id_tank` (`id_tank`),
  KEY `id_supply` (`id_supply`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `tank_delivery_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tank_delivery_ibfk_2` FOREIGN KEY (`id_tank`) REFERENCES `tank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tank_delivery_ibfk_3` FOREIGN KEY (`id_supply`) REFERENCES `supply` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tank_delivery_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `tank_grade` */

DROP TABLE IF EXISTS `tank_grade`;

CREATE TABLE `tank_grade` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `tank_report` */

DROP TABLE IF EXISTS `tank_report`;

CREATE TABLE `tank_report` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_tank` bigint(20) DEFAULT NULL,
  `kapasitas_awal` bigint(20) DEFAULT NULL,
  `kapasitas_stok` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tank` (`id_tank`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `tank_report_ibfk_1` FOREIGN KEY (`id_tank`) REFERENCES `tank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tank_report_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `tank_type` */

DROP TABLE IF EXISTS `tank_type`;

CREATE TABLE `tank_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `roles` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
