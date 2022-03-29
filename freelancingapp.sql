/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - freelancingapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`freelancingapp` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `freelancingapp`;

/*Table structure for table `freelancingapps` */

DROP TABLE IF EXISTS `freelancingapps`;

CREATE TABLE `freelancingapps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(2048) COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `freelancingapps` */

insert  into `freelancingapps`(`id`,`description`,`created`) values 
(1,'firstchanged','2022-05-28 16:00:00'),
(2,'test2','2022-03-16 11:14:22'),
(4,'test007','2022-03-14 12:00:00'),
(42,'tin007','2022-03-14 12:00:00'),
(43,'tin008','2022-03-14 12:00:00'),
(44,'updatecheck','2022-03-22 09:00:00'),
(45,'tin009','2022-04-11 14:00:00'),
(47,'lastcheck','2022-05-05 12:00:00'),
(48,'lastcheck','2022-05-05 12:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
