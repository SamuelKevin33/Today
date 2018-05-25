-- MySQL dump 10.13  Distrib 5.5.55, for Win64 (AMD64)
--
-- Host: localhost    Database: fruitstore
-- ------------------------------------------------------
-- Server version	5.5.55

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
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car` (
  `clientid` char(12) DEFAULT NULL,
  `fruitid` int(11) NOT NULL,
  `fruitnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES ('6000',1000,4),('18302198264',1007,2),('18302198264',1001,1),('18302198262',1000,1);
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_adresses`
--

DROP TABLE IF EXISTS `client_adresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_adresses` (
  `clientid` varchar(20) NOT NULL DEFAULT '',
  `clientfriend` varchar(40) NOT NULL,
  `friendphone` varchar(100) NOT NULL,
  `friendplace` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_adresses`
--

LOCK TABLES `client_adresses` WRITE;
/*!40000 ALTER TABLE `client_adresses` DISABLE KEYS */;
INSERT INTO `client_adresses` VALUES ('6000','妈妈','13809846666','新疆维吾尔自治区'),('18302198262','姗姗','13202020202','上海市浦东新区x606 距离市中心约15432米'),('18302198262','高高','18302983737','上海市浦东新区x606 距离市中心约15444米'),('18302198262','yaya','18602020202','广东省广州市越秀区中山六路109 距离市中心约6487米'),('18302198262','yaya','13471717173','北京市朝阳区霄云路50号 距离市中心约7378米');
/*!40000 ALTER TABLE `client_adresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_buylist`
--

DROP TABLE IF EXISTS `client_buylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_buylist` (
  `listid` varchar(100) NOT NULL DEFAULT '',
  `listtime` varchar(50) DEFAULT NULL,
  `listprice` decimal(15,2) DEFAULT NULL,
  `liststatus` varchar(40) NOT NULL,
  `listphone` varchar(100) NOT NULL,
  `listaddress` varchar(100) NOT NULL,
  `friendphone` varchar(40) DEFAULT NULL,
  `fruitid` int(11) DEFAULT NULL,
  PRIMARY KEY (`listid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_buylist`
--

LOCK TABLES `client_buylist` WRITE;
/*!40000 ALTER TABLE `client_buylist` DISABLE KEYS */;
INSERT INTO `client_buylist` VALUES ('133441','2018-5-16 15:17',256.00,'1','183353021','新疆',NULL,NULL),('13345941','2018-5-16 13:17',256.00,'2','183353021','新疆',NULL,NULL),('1341333990','2018-5-16 16:17',2556.00,'1','183353021','新疆',NULL,NULL),('134134550','2018-5-16 16:17',2556.00,'0','183353021','新疆',NULL,NULL),('13463441','2018-5-16 16:17',2556.00,'1','183353021','新疆',NULL,NULL),('1346763441','2018-5-16 16:17',2556.00,'0','183353021','新疆',NULL,NULL),('134678990','2018-5-16 16:17',2556.00,'0','183353021','新疆',NULL,NULL),('1346789941','2018-5-16 16:17',2556.00,'1','183353021','新疆',NULL,NULL),('1527255766553','',47.00,'1','18302198262','广东省广州市越秀区中山六路109 距离市中心约6487米',NULL,NULL),('1527255840257','2018年4月25日 21:44:0',47.00,'1','18302198262','上海市浦东新区x606 距离市中心约15444米',NULL,NULL),('1527255841500','2018年4月25日 21:44:1',47.00,'1','18302198262','上海市浦东新区x606 距离市中心约15444米',NULL,NULL),('1527256178413','2018年4月25日 21:49:38',47.00,'1','18302198262','上海市浦东新区x606 距离市中心约15444米',NULL,NULL),('1527256230438','2018年4月25日 21:50:30',17.00,'1','18302198262','上海市浦东新区x606 距离市中心约15444米','18302983737',NULL),('1527256854003','2018年4月25日 22:0:54',17.00,'1','18302198262','上海市浦东新区x606 距离市中心约15444米','18302983737',1002),('1527257203105','2018年4月25日 22:6:43',17.00,'1','18302198262','广东省广州市越秀区中山六路109 距离市中心约6487米','18602020202',1002),('1527257286597','2018年4月25日 22:8:6',30.00,'1','18302198262','上海市浦东新区x606 距离市中心约15444米','18302983737',1003),('1527257868160','2018年4月25日 22:17:48',17.00,'1','18302198262','上海市浦东新区x606 距离市中心约15444米','18302983737',1002),('1527258427611','2018年4月25日 22:27:7',30.00,'1','18302198262','广东省广州市越秀区中山六路109 距离市中心约6487米','18602020202',1003);
/*!40000 ALTER TABLE `client_buylist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_information`
--

DROP TABLE IF EXISTS `client_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_information` (
  `clientid` int(11) NOT NULL AUTO_INCREMENT,
  `clientname` varchar(40) NOT NULL,
  `clientphone` varchar(100) NOT NULL,
  `clientpwd` int(11) NOT NULL,
  `clientbirth` varchar(20) DEFAULT NULL,
  `clientplace` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`clientid`),
  UNIQUE KEY `thisindex` (`clientphone`)
) ENGINE=InnoDB AUTO_INCREMENT=6089 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_information`
--

LOCK TABLES `client_information` WRITE;
/*!40000 ALTER TABLE `client_information` DISABLE KEYS */;
INSERT INTO `client_information` VALUES (122,'王子奇','18302198263',111111,'2018-09-06','山西省'),(6000,'Summer33','18302198262',111111,'1995-09-12','新疆维吾尔自治区'),(6052,'左左','12328384957',111111,NULL,'内蒙古自治区'),(6076,'1111','18302198264',111111,NULL,NULL),(6080,'杨文昊','18302198269',111111,NULL,NULL),(6081,'韩宇','18302192828',111111,NULL,NULL),(6082,'胡浩亮','18302192826',111111,NULL,NULL),(6083,'钟晨','18302192811',111111,NULL,NULL),(6084,'叶正','18302192111',111111,NULL,NULL),(6085,'石头','18302192999',111111,NULL,NULL),(6086,'黄景行','18302192988',111111,NULL,NULL),(6087,'淡淡','18302192989',111111,NULL,NULL),(6088,'珊瑚','18402198374',111111,'4-15','湖北省');
/*!40000 ALTER TABLE `client_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_money`
--

DROP TABLE IF EXISTS `client_money`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_money` (
  `phone` varchar(20) NOT NULL,
  `money` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `nowmoney` int(11) DEFAULT NULL,
  PRIMARY KEY (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_money`
--

LOCK TABLES `client_money` WRITE;
/*!40000 ALTER TABLE `client_money` DISABLE KEYS */;
INSERT INTO `client_money` VALUES ('18302198262',100,0,'2018年4月25日 20:20:34',1000);
/*!40000 ALTER TABLE `client_money` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fankui`
--

DROP TABLE IF EXISTS `fankui`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fankui` (
  `clientid` int(11) NOT NULL,
  `clientphone` varchar(100) NOT NULL,
  `clientcontent` text NOT NULL,
  `fankuistatu` int(11) NOT NULL,
  `fankuiid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`fankuiid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fankui`
--

LOCK TABLES `fankui` WRITE;
/*!40000 ALTER TABLE `fankui` DISABLE KEYS */;
INSERT INTO `fankui` VALUES (6000,'18302198262','朋友一生一起走',0,1),(60012,'1830284','一卷书来,十年萍散,人间事,本匆匆,当时并辔,桃李媚春风,恰同学,少年知交,酒如情浓, 我们相逢在陌生时，我们分手在熟悉后。明天，我们要到生活的星图上找寻自己的新位置，让我们用自己闪烁的星光相互问讯、表情达意。',0,2),(60012,'1830284','一卷书来,十年萍散,人间事,本匆匆,当时并辔,桃李媚春风,恰同学,少年知交,酒如情浓, 我们相逢在陌生时，我们分手在熟悉后。明天，我们要到生活的星图上找寻自己的新位置，让我们用自己闪烁的星光相互问讯、表情达意。',0,4),(60012,'1830284','一卷书来,十年萍散,人间事,本匆匆,当时并辔,桃李媚春风,恰同学,少年知交,酒如情浓, 我们相逢在陌生时，我们分手在熟悉后。明天，我们要到生活的星图上找寻自己的新位置，让我们用自己闪烁的星光相互问讯、表情达意。',1,5),(6002,'1830284','一卷书来,十年萍散,人间事,本匆匆,当时并辔,桃李媚春风,恰同学,少年知交,酒如情浓, 我们相逢在陌生时，我们分手在熟悉后。明天，我们要到生活的星图上找寻自己的新位置，让我们用自己闪烁的星光相互问讯、表情达意。',0,6),(6002,'1830284','一卷书来,十年萍散,人间事,本匆匆,当时并辔,桃李媚春风,恰同学,少年知交,酒如情浓, 我们相逢在陌生时，我们分手在熟悉后。明天，我们要到生活的星图上找寻自己的新位置，让我们用自己闪烁的星光相互问讯、表情达意。',0,9),(60012,'1830284','一卷书来,十年萍散,人间事,本匆匆,当时并辔,桃李媚春风,恰同学,少年知交,酒如情浓, 我们相逢在陌生时，我们分手在熟悉后。明天，我们要到生活的星图上找寻自己的新位置，让我们用自己闪烁的星光相互问讯、表情达意。',1,10),(60012,'1830284','一卷书来,十年萍散,人间事,本匆匆,当时并辔,桃李媚春风,恰同学,少年知交,酒如情浓, 我们相逢在陌生时，我们分手在熟悉后。明天，我们要到生活的星图上找寻自己的新位置，让我们用自己闪烁的星光相互问讯、表情达意。',1,11),(60012,'1830284','一卷书来,十年萍散,人间事,本匆匆,当时并辔,桃李媚春风,恰同学,少年知交,酒如情浓, 我们相逢在陌生时，我们分手在熟悉后。明天，我们要到生活的星图上找寻自己的新位置，让我们用自己闪烁的星光相互问讯、表情达意。',1,12);
/*!40000 ALTER TABLE `fankui` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fruit`
--

DROP TABLE IF EXISTS `fruit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fruit` (
  `fruitid` int(11) NOT NULL AUTO_INCREMENT,
  `fruittype` varchar(40) NOT NULL,
  `fruitchina` int(11) NOT NULL,
  `fruitname` varchar(100) NOT NULL,
  `fruitweight` bigint(20) NOT NULL,
  `fruitprice` decimal(5,2) DEFAULT NULL,
  `fruitleft` int(11) NOT NULL,
  `fruitstatu` int(11) DEFAULT NULL,
  PRIMARY KEY (`fruitid`)
) ENGINE=InnoDB AUTO_INCREMENT=1037 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fruit`
--

LOCK TABLES `fruit` WRITE;
/*!40000 ALTER TABLE `fruit` DISABLE KEYS */;
INSERT INTO `fruit` VALUES (1000,'苹果',1,'山东大苹果',0,3.00,502,1),(1001,'蓝莓',1,'小巨人蓝莓',250,99.00,1200,1),(1002,'柠檬',1,'四川安岳柠檬',720,17.00,1520,1),(1003,'木瓜',1,'海南木瓜',1500,30.00,1500,1),(1004,'芒果',1,'海南小台农芒果',1000,30.00,180,2),(1005,'芒果',1,'海南金煌芒果',1000,45.00,120,3),(1006,'梨子',1,'优选库尔勒香梨',5000,80.00,89,2),(1007,'梨子',1,'秋月梨',1500,26.00,289,3),(1008,'番茄',1,'广西樱桃红番茄',300,10.00,1220,2),(1009,'番茄',1,'广西黄樱桃番茄',300,8.00,1000,3),(1010,'番茄',1,'山东大番茄',350,6.00,1203,3),(1011,'苹果',1,'洛川苹果（大）',1000,30.00,1453,2),(1018,'葡萄',1,'云南夏黑葡萄',1000,40.00,293,3),(1019,'葡萄',1,'新疆无核白葡萄',800,20.00,233,3),(1020,'百香果',1,'优选广西百香果',810,20.00,233,3),(1021,'柠檬',1,'无籽青柠檬',500,16.00,1233,2),(1022,'李子',2,'智利珠宝李',1000,50.00,243,2),(1023,'榴莲',2,'泰国玲珑榴莲',2500,148.00,23,1),(1026,'葡萄',2,'智利红提',1800,89.00,183,1),(1027,'火龙果',2,'越南红心火龙果',1100,29.00,1430,3),(1028,'香蕉',2,'进口香蕉',1000,17.00,233,2),(1029,'苹果',2,'华盛顿甜脆红地厘蛇果',800,19.00,183,1),(1030,'牛油果',2,'墨西哥牛油果',500,20.00,1123,2),(1031,'奇异果',2,'佳沛新西兰阳光金奇异果',800,49.00,383,3),(1032,'苹果',2,'新西兰小苹果',800,50.00,383,2),(1033,'火龙果',2,'越南白火龙果',800,19.00,183,1),(1034,'橙子',2,'澳洲甜橙',800,19.00,183,1),(1035,'草莓',1,'奶油草莓',900,25.00,1283,2),(1036,'樱桃',1,'山东樱桃',900,45.00,128,3);
/*!40000 ALTER TABLE `fruit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-25 22:54:26
