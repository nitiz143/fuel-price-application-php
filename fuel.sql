/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - fuelprice
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fuelprice` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `fuelprice`;

/*Table structure for table `005_fuelprices_admin` */

DROP TABLE IF EXISTS `005_fuelprices_admin`;

CREATE TABLE `005_fuelprices_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `005_fuelprices_admin` */

insert  into `005_fuelprices_admin`(`id`,`username`,`password`) values 
(1,'Admin','e3afed0047b08059d0fada10f400c1e5');

/*Table structure for table `005_fuelprices_feedback` */

DROP TABLE IF EXISTS `005_fuelprices_feedback`;

CREATE TABLE `005_fuelprices_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `station_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `user_rating` int(11) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_feedback` */

insert  into `005_fuelprices_feedback`(`id`,`station_id`,`user_id`,`title`,`comment`,`user_rating`,`attachment`,`created_date`,`status`) values 
(1,0,0,'Tdsfs','fsfsd sfsdf ',2,'./uploads/Issue on mobile design gap between plans.jpg','2024-06-26 03:02:39',1),
(2,0,0,'Testsdd','Edgdg f  hgfhgfh fhfhfghfghfg',5,'./uploads/T-Shirt Clothing Printer Logo _ BrandCrowd Logo Maker _ BrandCrowd (1).png','2024-06-26 03:16:24',1),
(3,0,0,'ggdf','fdg gdfgdfg dfgdfg',3,'./uploads/html-css-collage-concept-with-person 1.png','2024-06-26 03:18:02',0),
(7,0,0,'asdf','adsf',1,'./uploads/feedback/4.jpg','2024-08-11 01:25:28',1);

/*Table structure for table `005_fuelprices_feedback_status` */

DROP TABLE IF EXISTS `005_fuelprices_feedback_status`;

CREATE TABLE `005_fuelprices_feedback_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_feedback_status` */

insert  into `005_fuelprices_feedback_status`(`id`,`title`,`status`) values 
(1,'Open',1),
(2,'Closed',1),
(3,'Resolved',1),
(4,'Delete',1);

/*Table structure for table `005_fuelprices_helpdesk` */

DROP TABLE IF EXISTS `005_fuelprices_helpdesk`;

CREATE TABLE `005_fuelprices_helpdesk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `entered_by` int(11) NOT NULL,
  `approval_comment` text NOT NULL,
  `approval_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_helpdesk` */

insert  into `005_fuelprices_helpdesk`(`id`,`user_id`,`station_id`,`title`,`comment`,`entered_by`,`approval_comment`,`approval_by`,`status`,`attachment`,`created_date`) values 
(1,0,0,'testest','fds sdgfdhgf hgfhgf h',0,'',0,0,'./uploads/help_desk/Mask group (3).png','2024-06-26 03:26:02'),
(4,0,0,'df','df',0,'',0,1,'./uploads/help_desk/5.jpg','2024-08-11 01:25:38');

/*Table structure for table `005_fuelprices_prices` */

DROP TABLE IF EXISTS `005_fuelprices_prices`;

CREATE TABLE `005_fuelprices_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateofprice` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phonenumber` text DEFAULT NULL,
  `before6amprice` text DEFAULT NULL,
  `after6amprice` text DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `005_fuelprices_prices` */

insert  into `005_fuelprices_prices`(`id`,`dateofprice`,`name`,`address`,`phonenumber`,`before6amprice`,`after6amprice`,`latitude`,`longitude`,`user_id`,`status`) values 
(1,'2024-04-03','sdasdasd','12345 40 Street Southeast, Calgary, AB, Canada','46365235435542','444444','565','','',1,1),
(2,'2024-04-03','adsdada','Sydney NSW, Australia','5133681666','6','6','-33.8688197','151.2092955',1,1),
(3,'2024-04-03','Gentle Dental Hervey Bay','Shop 2/13 Medical Pl, Urraween QLD 4655, Australia','2342432','376','342','-25.3004051','152.8262822',1,1),
(5,'2024-04-03','Easts Rugby Union','31 Halifax St, Norman Park QLD 4170, Australia','65456242','99999123','134','-27.4841989','153.0605456',1,1),
(6,'2024-04-03','Red Galanga Asian Cuisine','3/112 Bennetts Rd, Norman Park QLD 4170, Australia','35456','4534','334','-27.4865484','153.0632642',1,1),
(7,'2024-04-03','Bamiyan Restaurant','3/82 Bennetts Rd, Camp Hill QLD 4151, Australia','3423423','123','234','-27.4881306','153.0637861',1,1),
(8,'2024-04-03','HealthSave Norman Park Chemist','154 Bennetts Rd, Norman Park QLD 4170, Australia','3453434','3434','99999232','-27.4845188','153.0633056',1,1),
(9,'2024-04-03','Mortgage Choice Norman Park- Mark Waugh','69 Mcilwraith Ave, Norman Park QLD 4170, Australia','234234234234','123','445','-27.484762','153.0674254',1,1),
(10,'2024-04-03','Mortgage Choice Norman Park- Mark Waugh','69 Mcilwraith Ave, Norman Park QLD 4170, Australia','234234234234','125','445','-27.484762','153.0674254',1,1),
(11,'2024-06-27','Husdyr tilladt','sdfasfs','33535354','54','65','0','0',0,1);

/*Table structure for table `005_fuelprices_rating` */

DROP TABLE IF EXISTS `005_fuelprices_rating`;

CREATE TABLE `005_fuelprices_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_rating` */

insert  into `005_fuelprices_rating`(`id`,`title`,`status`) values 
(1,'Poor',1),
(2,'Fair',1),
(3,'Good',1),
(4,'Great',1),
(5,'Excellent',1);

/*Table structure for table `005_fuelprices_stations` */

DROP TABLE IF EXISTS `005_fuelprices_stations`;

CREATE TABLE `005_fuelprices_stations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `station_name` varchar(255) DEFAULT NULL,
  `station_manager` int(11) NOT NULL,
  `station_phone` varchar(15) DEFAULT NULL,
  `street_address` varchar(255) NOT NULL,
  `street_address_2` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `comments` text DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_stations` */

insert  into `005_fuelprices_stations`(`id`,`station_name`,`station_manager`,`station_phone`,`street_address`,`street_address_2`,`city`,`state`,`zipcode`,`country`,`opening_time`,`closing_time`,`comments`,`latitude`,`longitude`,`created_by`,`attachment`,`status`) values 
(1,'Test Station',3,'9876543210','tfsfsf','fdsf dfds','etfdsf','Anambra','3434','Nigeria','07:59:00','23:50:00','dsfdsfdsfs',NULL,NULL,1,'./uploads/station/Ai (1).png',1),
(2,'fsdfds fds',2,'fasd fdsa','fsdaf ','fdsf dfds','etfdsf','Kaduna','3434','Nigeria','23:10:00','00:33:00','',NULL,NULL,1,'',1),
(3,'Test Station',6,'9876543210','dfgdf','','etfdsf','Jigawa','34324','Nigeria','03:07:00','00:05:00','',NULL,NULL,1,'',1),
(4,'Test Station',7,'9876543210','tfsfsf','','etfdsf','Enugu','3434','Nigeria','13:35:00','00:34:00','',NULL,NULL,1,'',1),
(7,'df',9,'df','df','df','df','Enugu','df','Nigeria','01:26:00','01:31:00','df',NULL,NULL,1,'./uploads/station/4.jpg',1);

/*Table structure for table `005_fuelprices_user_price` */

DROP TABLE IF EXISTS `005_fuelprices_user_price`;

CREATE TABLE `005_fuelprices_user_price` (
  `serial_number` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `entry_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entry_time` datetime NOT NULL DEFAULT current_timestamp(),
  `purchase_date` date NOT NULL,
  `purchase_time` time NOT NULL,
  `litres` decimal(10,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `station_id` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(255) DEFAULT NULL,
  `status` tinyint(11) DEFAULT 1,
  PRIMARY KEY (`serial_number`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_user_price` */

insert  into `005_fuelprices_user_price`(`serial_number`,`latitude`,`longitude`,`entry_date`,`entry_time`,`purchase_date`,`purchase_time`,`litres`,`amount`,`phone_number`,`user_id`,`station_id`,`photo`,`status`) values 
(2,'0','0','2024-08-10','13:55:47','2024-08-15','13:59:00',2,2,'123123123123',0,2,'./uploads/price/9.jpg',1);

/*Table structure for table `005_fuelprices_user_role` */

DROP TABLE IF EXISTS `005_fuelprices_user_role`;

CREATE TABLE `005_fuelprices_user_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_user_role` */

insert  into `005_fuelprices_user_role`(`role_id`,`role`,`status`) values 
(1,'Admin1',1),
(2,'StationManager',1),
(3,'User1',1),
(4,'User2',1),
(5,'Admin2',1);

/*Table structure for table `005_fuelprices_user_title` */

DROP TABLE IF EXISTS `005_fuelprices_user_title`;

CREATE TABLE `005_fuelprices_user_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_user_title` */

insert  into `005_fuelprices_user_title`(`id`,`title`,`status`) values 
(1,'Mr',1),
(2,'Mrs',1),
(3,'Chief',1),
(4,'Pastor',1),
(5,'Imam',1),
(6,'Dr.',1);

/*Table structure for table `005_fuelprices_userprices` */

DROP TABLE IF EXISTS `005_fuelprices_userprices`;

CREATE TABLE `005_fuelprices_userprices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateofprice` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phonenumber` text DEFAULT NULL,
  `before6amprice` text DEFAULT NULL,
  `after6amprice` text DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `005_fuelprices_userprices` */

/*Table structure for table `005_fuelprices_users` */

DROP TABLE IF EXISTS `005_fuelprices_users`;

CREATE TABLE `005_fuelprices_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `street_address2` varchar(25) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitute` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_users` */

insert  into `005_fuelprices_users`(`user_id`,`role_id`,`title_id`,`first_name`,`middle_name`,`last_name`,`dob`,`street_address`,`street_address2`,`city`,`state`,`country`,`zip`,`phone1`,`phone2`,`make`,`model`,`year`,`email`,`password`,`photo`,`latitude`,`longitute`) values 
(5,5,4,'Test4',NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0000,'test@gmail.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL),
(6,2,1,'tdsfs','','fsdfds','2024-06-14','dfgdf','','etfdsf','Abia','Nigeria','3434','3243242','','','',0000,'support@mukeshprajapat.com','6024bb4b0cdaeeb3fffd6e7c920ca30e','','0','0'),
(7,2,1,'tdsfs','','fsdfds','2024-06-14','dfgdf','','etfdsf','Abia','Nigeria','3434','3243242','','','',0000,'support@mukeshprajapat.com','6024bb4b0cdaeeb3fffd6e7c920ca30e','','0','0'),
(8,2,0,'Mukesh',NULL,'Prajapat','0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0000,'test11@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL),
(9,2,0,'Oluwaseun',NULL,'Bakare','0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0000,'bimbo@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL),
(10,2,0,'king',NULL,'Bolt','0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0000,'moonrider.dev07@gmail.com','0192023a7bbd73250516f069df18b500',NULL,NULL,NULL);

/*Table structure for table `005_fuelprices_vehicle` */

DROP TABLE IF EXISTS `005_fuelprices_vehicle`;

CREATE TABLE `005_fuelprices_vehicle` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `street_address2` varchar(25) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitute` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `005_fuelprices_vehicle` */

insert  into `005_fuelprices_vehicle`(`id`,`user_id`,`title_id`,`first_name`,`middle_name`,`last_name`,`dob`,`street_address`,`street_address2`,`city`,`state`,`country`,`zip`,`phone1`,`phone2`,`make`,`model`,`year`,`email`,`password`,`photo`,`latitude`,`longitute`) values 
(0,8,1,'Mukesh','','Prajapat','0000-00-00','tfsfsf','','etfdsf','Abia','Nigeria','3434','','','','',2000,NULL,NULL,'','0','0'),
(0,10,2,'qwe','qwe','qwe','2024-08-15','qwe','qwe','qwe','Ekiti','Nigeria','625-2156','123123123123','123123123123','asdf','adf',2010,NULL,NULL,'./uploads/user/1.jpg','0','0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
