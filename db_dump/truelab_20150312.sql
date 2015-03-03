/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.17 : Database - truelab
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`truelab` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `truelab`;

/*Table structure for table `categ_main` */

DROP TABLE IF EXISTS `categ_main`;

CREATE TABLE `categ_main` (
  `main_test_id` int(2) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`main_test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='main category database';

/*Data for the table `categ_main` */

insert  into `categ_main`(`main_test_id`,`category`) values (1,'HEMATOLOGY'),(2,'TUMOR MARKERS'),(3,'CLINICAL MICROSCOPY'),(4,'CLINICAL CHEMISTRY'),(5,'IMMUNO/SERO'),(6,'ULTRASOUND'),(7,'OTHERS');

/*Table structure for table `cust_list` */

DROP TABLE IF EXISTS `cust_list`;

CREATE TABLE `cust_list` (
  `service_id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `cust_list` */

insert  into `cust_list`(`service_id`,`firstname`,`lastname`,`age`,`sex`,`bday`) values (1,'jeffrey','bancoro',31,'M','1983-05-08'),(2,'lhea','bancoro',30,'F','1984-11-04'),(3,'hazel','bustillo',20,'F','1994-02-20'),(4,'hazel','bustillo',20,'F','1994-02-20'),(5,'hazel','bustillo',20,'F','1994-02-20'),(6,'hazel','bustillo',20,'F','1994-02-20'),(7,'hazel','bustillo',20,'F','1994-02-20'),(8,'hazel','bustillo',20,'F','1994-02-20'),(9,'hazel','bustillo',20,'F','1994-02-20'),(10,'hazel','bustillo',20,'F','1994-02-20'),(11,'hazel','bustillo',20,'F','1994-02-20'),(12,'hazel','bustillo',20,'F','1994-02-20'),(13,'hazel','bustillo',20,'F','1994-02-20'),(14,'hazel','bustillo',20,'F','1994-02-20'),(15,'hazel','bustillo',20,'F','1994-02-20'),(16,'','',0,'','0000-00-00'),(17,'','',0,'','0000-00-00'),(18,'','',0,'','0000-00-00'),(19,'','',0,'','0000-00-00'),(20,'','',0,'','0000-00-00'),(21,'','',0,'','0000-00-00'),(22,'','',0,'','0000-00-00'),(23,'','',0,'','0000-00-00'),(24,'iya','bancoro',30,'F','1984-02-02'),(25,'','',0,'','0000-00-00'),(26,'tessie','bancoro',65,'1','1944-06-21'),(27,'kad','asdasd',31,'1','1983-12-12'),(28,'Reymar','Guerrero',0,'Male','0000-00-00'),(29,'Reymar','Guerrero',0,'Male','0000-00-00'),(30,'Reymar','Guerrero',0,'Male','0000-00-00'),(31,'Reymar','Guerrero',0,'Male','0000-00-00'),(32,'Reymar','Guerrero',0,'Male','0000-00-00'),(33,'Reymar','Guerrero',0,'Male','0000-00-00'),(34,'','',0,'Male','0000-00-00'),(35,'Reymar','Gwapo',0,'Male','0000-00-00'),(36,'','',0,'Male','0000-00-00'),(37,'Reymar','Mar',0,'Male','0000-00-00'),(38,'','',0,'Male','0000-00-00'),(39,'','',0,'Male','0000-00-00'),(40,'tTES','TEST',0,'Male','0000-00-00'),(41,'tTES','TESTasdf',0,'Male','0000-00-00'),(42,'Reymar','Gerre',0,'M','2015-02-17'),(43,'Guerrero','Reymar',0,'M','2015-02-10'),(44,'A','Mar',0,'M','2015-02-18'),(45,'Guerrero 123','Reymar',0,'M','2015-02-18'),(46,'Guerrero','Ra',0,'M','2015-02-18'),(47,'Guerrero','Akeisha',0,'F','2012-01-27'),(48,'Ro','Ra',0,'F','1991-05-02'),(49,'ROR','RAR',0,'M','1991-05-02');

/*Table structure for table `customer_service` */

DROP TABLE IF EXISTS `customer_service`;

CREATE TABLE `customer_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_id` int(11) DEFAULT NULL,
  `has_discount` tinyint(1) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `trans_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `customer_service` */

insert  into `customer_service`(`id`,`subcat_id`,`has_discount`,`amount`,`trans_id`) values (1,20,0,NULL,NULL),(2,1,1,NULL,NULL),(3,10,0,NULL,NULL),(4,12,0,NULL,1),(5,11,0,NULL,2),(6,12,0,NULL,3),(7,3,0,NULL,4),(8,21,0,NULL,5),(9,21,0,NULL,6),(10,21,0,NULL,7),(11,11,1,NULL,8),(12,19,0,NULL,8),(13,4,1,NULL,9),(14,6,1,NULL,9),(15,19,1,NULL,10),(16,4,0,NULL,10),(17,10,1,NULL,11),(18,20,0,NULL,11);

/*Table structure for table `customer_transaction` */

DROP TABLE IF EXISTS `customer_transaction`;

CREATE TABLE `customer_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) DEFAULT NULL,
  `transdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `customer_transaction` */

insert  into `customer_transaction`(`id`,`receipt_no`,`transdate`,`created_by`,`cust_id`) values (1,'TLCD-120150306071251','2015-03-05 23:12:51',NULL,43),(2,'TLCD-220150306071646','2015-03-05 23:16:46',NULL,44),(3,'TLCD-320150306072209','2015-03-05 23:22:09',NULL,45),(4,'TLCD-420150306072541','2015-03-05 23:25:41',NULL,46),(5,'TLCD-520150306073637','2015-03-05 23:36:37',NULL,1),(6,'TLCD-620150306073707','2015-03-05 23:37:07',NULL,3),(7,'TLCD-720150306073730','2015-03-05 23:37:30',NULL,35),(8,'TLCD-820150307185730','2015-03-07 10:57:30',NULL,45),(9,'TLCD-920150308211209','2015-03-08 13:12:09',NULL,47),(10,'TLCD-1020150308213120','2015-03-08 13:31:20',NULL,48),(11,'TLCD-1120150308213224','2015-03-08 13:32:24',NULL,49);

/*Table structure for table `service_metadata` */

DROP TABLE IF EXISTS `service_metadata`;

CREATE TABLE `service_metadata` (
  `id` int(11) NOT NULL DEFAULT '0',
  `service_id` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `service_metadata` */

/*Table structure for table `subcat` */

DROP TABLE IF EXISTS `subcat`;

CREATE TABLE `subcat` (
  `sub_test_id` int(6) NOT NULL AUTO_INCREMENT,
  `main_test_id` int(6) NOT NULL,
  `subcateg` varchar(50) NOT NULL,
  `reg_price` int(6) NOT NULL,
  `disc_price` int(6) NOT NULL,
  `template_code` varchar(10) DEFAULT NULL,
  `tech_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sub_test_id`),
  KEY `main_test_id` (`main_test_id`),
  CONSTRAINT `main_cons` FOREIGN KEY (`main_test_id`) REFERENCES `categ_main` (`main_test_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

/*Data for the table `subcat` */

insert  into `subcat`(`sub_test_id`,`main_test_id`,`subcateg`,`reg_price`,`disc_price`,`template_code`,`tech_type`) values (1,1,'CBC WITH PLATELET',100,0,'HE',NULL),(3,1,'HEMOGLOBIN/HEMATOCRIT',30,0,'HE',NULL),(4,1,'BLOOD TYPING',100,0,'BT',NULL),(5,1,'ESR',120,0,'MX',NULL),(6,1,'RETICULOCYTE COUNT',70,0,'MX',NULL),(7,1,'PERIPHERAL SMEAR',300,0,NULL,NULL),(8,1,'APTT',0,0,'MX',NULL),(9,1,'PTPA',0,0,'MX',NULL),(10,2,'PSA',1300,1100,'MX',NULL),(11,2,'CEA',650,600,'MX',NULL),(12,2,'CA125',1300,1100,'MX',NULL),(13,2,'AFP',650,600,'MX',NULL),(14,2,'FT3',750,650,'MX',NULL),(16,2,'FT4',750,650,'MX',NULL),(17,2,'TT3',750,650,'MX',NULL),(18,2,'TT4',750,650,'MX',NULL),(19,3,'URINALYSIS',50,40,'UA',NULL),(20,3,'FECALYSIS',50,40,'SE',NULL),(21,3,'OCCULT BLOOD',150,0,'MX',NULL),(22,3,'PREGNANCY TEST',130,100,'PT',NULL),(23,3,'DRUGTEST',180,150,NULL,NULL),(24,4,'FBS/RBS',100,90,'CH',NULL),(25,4,'HBA1C',650,600,'CH',NULL),(26,4,'CREATININE',110,100,'CH',NULL),(27,4,'BUN',110,100,'CH',NULL),(28,4,'BUA',120,110,'CH',NULL),(29,4,'LIPID PROFILE',550,500,NULL,NULL),(30,4,'TOTAL CHOLESTEROL',110,100,'CH',NULL),(31,4,'TRIGLYCERIDES',320,290,'CH',NULL),(32,4,'HDL',210,190,'CH',NULL),(33,4,'LDL',485,435,'CH',NULL),(34,4,'LIVER PROFILE',680,615,'CH',NULL),(35,4,'SGOT',165,150,'CH',NULL),(36,4,'SGPT',165,150,'CH',NULL),(37,4,'ALK PHOS.',165,150,'CH',NULL),(38,4,'ALBUMIN',110,100,'CH',NULL),(39,4,'TPAG',320,300,'CH',NULL),(40,4,'T BILIRUBIN',140,125,'CH',NULL),(41,4,'D BILIRUBIN',140,125,'CH',NULL),(42,5,'HBSAG',150,130,'HB',NULL),(43,5,'VDRL/SYPHILLIS',250,200,'MX',NULL),(44,5,'HIV SCREENING',0,0,'MX',NULL),(45,6,'WHOLE ABD.',1000,0,'UTZ',NULL),(46,6,'UPPER ABD.',800,0,'UTZ',NULL),(47,6,'KUB/P',600,0,'UTZ',NULL),(48,6,'TVS PREG',500,0,'UTZ',NULL),(49,6,'TVS GYNE',750,0,'UTZ',NULL),(50,6,'TAS PREG',350,300,'UTZ',NULL),(51,6,'TAS BPS',500,0,'UTZ',NULL),(52,6,'HBT',600,0,'UTZ',NULL),(53,6,'TRS',750,0,'UTZ',NULL),(54,6,'THYROID',400,0,'UTZ',NULL),(55,6,'SINGLE ORGAN',400,0,'UTZ',NULL),(56,7,'XRAY',145,130,'RD',NULL),(57,7,'GRAM STAIN',100,0,'MX',NULL),(58,7,'AFB',100,0,'AFB',NULL),(59,7,'ECG',200,150,NULL,NULL);

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `test` */

insert  into `test`(`name`,`price`,`id`) values ('Array',0,1),('Array',0,2);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_type` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`access_type`,`username`,`password`) values (1,'superadmin','jrbancks','jeff1103'),(2,'admin','tsupi','abc'),(3,'superadmin','reymar.guerrero','0af8c3e1ee3f6f9082793ebc3c4a52db'),(4,'user','reymar.user','098f6bcd4621d373cade4e832627b4f6'),(5,'rad_tech','reymar.rad_tech','098f6bcd4621d373cade4e832627b4f6'),(6,'med_tech','reymar.med_tech','098f6bcd4621d373cade4e832627b4f6');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
