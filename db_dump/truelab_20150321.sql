-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: truelab
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categ_main`
--

DROP TABLE IF EXISTS `categ_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categ_main` (
  `main_test_id` int(2) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`main_test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='main category database';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categ_main`
--

LOCK TABLES `categ_main` WRITE;
/*!40000 ALTER TABLE `categ_main` DISABLE KEYS */;
INSERT INTO `categ_main` VALUES (1,'HEMATOLOGY'),(2,'TUMOR MARKERS'),(3,'CLINICAL MICROSCOPY'),(4,'CLINICAL CHEMISTRY'),(5,'IMMUNO/SERO'),(6,'ULTRASOUND'),(7,'OTHERS');
/*!40000 ALTER TABLE `categ_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cust_list`
--

DROP TABLE IF EXISTS `cust_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cust_list` (
  `service_id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cust_list`
--

LOCK TABLES `cust_list` WRITE;
/*!40000 ALTER TABLE `cust_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `cust_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_service`
--

DROP TABLE IF EXISTS `customer_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_id` int(11) DEFAULT NULL,
  `has_discount` tinyint(1) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `trans_id` int(11) DEFAULT NULL,
  `disc_type` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_service`
--

LOCK TABLES `customer_service` WRITE;
/*!40000 ALTER TABLE `customer_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_transaction`
--

DROP TABLE IF EXISTS `customer_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) DEFAULT NULL,
  `transdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `physician` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_transaction`
--

LOCK TABLES `customer_transaction` WRITE;
/*!40000 ALTER TABLE `customer_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_metadata`
--

DROP TABLE IF EXISTS `service_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_metadata` (
  `id` int(11) NOT NULL DEFAULT '0',
  `service_id` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_metadata`
--

LOCK TABLES `service_metadata` WRITE;
/*!40000 ALTER TABLE `service_metadata` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcat`
--

DROP TABLE IF EXISTS `subcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcat` (
  `sub_test_id` int(6) NOT NULL AUTO_INCREMENT,
  `main_test_id` int(6) NOT NULL,
  `subcateg` varchar(50) NOT NULL,
  `reg_price` int(6) NOT NULL,
  `disc_price` int(6) NOT NULL,
  `template_code` varchar(10) DEFAULT NULL,
  `tech_type` varchar(20) DEFAULT NULL,
  `disc_price_2` int(6) DEFAULT NULL,
  PRIMARY KEY (`sub_test_id`),
  KEY `main_test_id` (`main_test_id`),
  CONSTRAINT `main_cons` FOREIGN KEY (`main_test_id`) REFERENCES `categ_main` (`main_test_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcat`
--

LOCK TABLES `subcat` WRITE;
/*!40000 ALTER TABLE `subcat` DISABLE KEYS */;
INSERT INTO `subcat` VALUES (1,1,'CBC WITH PLATELET',100,0,'HE',NULL,NULL),(3,1,'HEMOGLOBIN/HEMATOCRIT',30,0,'HE',NULL,NULL),(4,1,'BLOOD TYPING',100,0,'BT',NULL,NULL),(5,1,'ESR',120,0,'MX',NULL,NULL),(6,1,'RETICULOCYTE COUNT',70,0,'MX',NULL,NULL),(7,1,'PERIPHERAL SMEAR',300,0,'MX',NULL,NULL),(8,1,'APTT',0,0,'MX',NULL,NULL),(9,1,'PTPA',0,0,'MX',NULL,NULL),(10,2,'PSA',1300,1100,'MX',NULL,NULL),(11,2,'CEA',650,600,'MX',NULL,NULL),(12,2,'CA125',1300,1100,'MX',NULL,NULL),(13,2,'AFP',650,600,'MX',NULL,NULL),(14,2,'FT3',750,650,'MX',NULL,NULL),(16,2,'FT4',750,650,'MX',NULL,NULL),(17,2,'TT3',750,650,'MX',NULL,NULL),(18,2,'TT4',750,650,'MX',NULL,NULL),(19,3,'URINALYSIS',50,40,'UA',NULL,NULL),(20,3,'FECALYSIS',50,40,'SE',NULL,NULL),(21,3,'OCCULT BLOOD',150,0,'MX',NULL,NULL),(22,3,'PREGNANCY TEST',130,100,'PT',NULL,NULL),(23,3,'DRUGTEST',180,150,'MX',NULL,130),(24,4,'FBS/RBS',100,90,'CH',NULL,NULL),(25,4,'HBA1C',650,600,'CH',NULL,NULL),(26,4,'CREATININE',110,100,'CH',NULL,NULL),(27,4,'BUN',110,100,'CH',NULL,NULL),(28,4,'BUA',120,110,'CH',NULL,NULL),(29,4,'LIPID PROFILE',550,500,'CH',NULL,NULL),(30,4,'TOTAL CHOLESTEROL',110,100,'CH',NULL,NULL),(31,4,'TRIGLYCERIDES',320,290,'CH',NULL,NULL),(32,4,'HDL',210,190,'CH',NULL,NULL),(33,4,'LDL',485,435,'CH',NULL,NULL),(34,4,'LIVER PROFILE',680,615,'CH',NULL,NULL),(35,4,'SGOT',165,150,'CH',NULL,NULL),(36,4,'SGPT',165,150,'CH',NULL,NULL),(37,4,'ALK PHOS.',165,150,'CH',NULL,NULL),(38,4,'ALBUMIN',110,100,'CH',NULL,NULL),(39,4,'TPAG',320,300,'CH',NULL,NULL),(40,4,'T BILIRUBIN',140,125,'CH',NULL,NULL),(41,4,'D BILIRUBIN',140,125,'CH',NULL,NULL),(42,5,'HBSAG',150,130,'HB',NULL,NULL),(43,5,'VDRL/SYPHILLIS',250,200,'MX',NULL,NULL),(44,5,'HIV SCREENING',0,0,'MX',NULL,NULL),(45,6,'WHOLE ABD.',1000,0,'UTZ',NULL,NULL),(46,6,'UPPER ABD.',800,0,'UTZ',NULL,NULL),(47,6,'KUB/P',600,0,'UTZ',NULL,NULL),(48,6,'TVS PREG',500,0,'UTZ',NULL,NULL),(49,6,'TVS GYNE',750,0,'UTZ',NULL,NULL),(50,6,'TAS PREG',350,300,'UTZ',NULL,NULL),(51,6,'TAS BPS',500,0,'UTZ',NULL,NULL),(52,6,'HBT',600,0,'UTZ',NULL,NULL),(53,6,'TRS',750,0,'UTZ',NULL,NULL),(54,6,'THYROID',400,0,'UTZ',NULL,NULL),(55,6,'SINGLE ORGAN',400,0,'UTZ',NULL,NULL),(56,7,'XRAY',145,130,'RD',NULL,NULL),(57,7,'GRAM STAIN',100,0,'MX',NULL,NULL),(58,7,'AFB',100,0,'AFB',NULL,NULL),(59,7,'ECG',200,150,'MX',NULL,NULL);
/*!40000 ALTER TABLE `subcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES ('Array',0,1),('Array',0,2);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_type` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) DEFAULT NULL,
  `code` varchar(10) DEFAULT 'TEMP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'superadmin','jrbancks','jeff1103','TEMP'),(2,'admin','tsupi','abc','TEMP'),(3,'superadmin','reymar.guerrero','0af8c3e1ee3f6f9082793ebc3c4a52db','RG'),(4,'user','reymar.user','098f6bcd4621d373cade4e832627b4f6','RG'),(5,'rad_tech','reymar.rad_tech','098f6bcd4621d373cade4e832627b4f6','RG'),(6,'med_tech','reymar.med_tech','098f6bcd4621d373cade4e832627b4f6','RG');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-21 18:28:32
