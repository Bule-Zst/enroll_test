-- MySQL dump 10.13  Distrib 5.7.15, for Win64 (x86_64)
--
-- Host: localhost    Database: enroll_test
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) NOT NULL,
  `is_active` tinyint(3) NOT NULL,
  `dateline` int(10) NOT NULL,
  `start_time` int(10) NOT NULL,
  `end_time` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `login_require` tinyint(3) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `del` tinyint(1) NOT NULL DEFAULT '0',
  `submitnum` int(10) unsigned NOT NULL DEFAULT '1',
  `see_able` tinyint(1) DEFAULT NULL,
  `vote_rule` varchar(15) DEFAULT NULL,
  `register_allow_times` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (217,1,1,1490179438,1488297600,1490544000,'???',0,'',1,'test',1,1,1,'none',0),(218,1,1,1490193158,1488297600,1488124800,'11111',1,'',1,'test',1,1,1,'uid',0),(219,1,1,1490269986,1488297600,1490889600,'12333',0,'',1,'wjbsyc',1,2,1,'none',0),(220,2,1,1490270904,1488297600,1490889600,'11111',0,'',1,'wjbsyc',0,4,NULL,NULL,0),(221,1,1,1490275192,1488297600,1490889600,'123',1,'',1,'wjbsyc',1,1,1,'uid',0),(222,1,1,1490283701,1488297600,1490889600,'234',1,'',1,'admin',1,2,1,'uid',0),(223,2,1,1490287374,1488297600,1490889600,'3213123',1,'',1,'admin',0,3,NULL,NULL,0),(224,1,1,1490329217,1488297600,1490889600,'21421',1,'',1,'admin',0,2,0,'uid',0),(225,1,1,1490330568,1488297600,1490889600,'投票',1,'',1,'admin',0,2,1,'none',0);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_each_action`
--

DROP TABLE IF EXISTS `project_each_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_each_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(8) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `dateline` int(10) NOT NULL,
  `action` text NOT NULL,
  `action_day` int(8) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_each_action`
--

LOCK TABLES `project_each_action` WRITE;
/*!40000 ALTER TABLE `project_each_action` DISABLE KEYS */;
INSERT INTO `project_each_action` VALUES (35,220,'0.0.0.0',1,1490270941,'[\"11111\"]',20170323,'wjbsyc'),(36,219,'0.0.0.0',1,1490273680,'[\"123\"]',20170323,'wjbsyc'),(37,220,'0.0.0.0',1,1490283009,'[\"11111\"]',20170323,'atest'),(38,223,'0.0.0.0',1,1490289318,'[\"2414241\"]',20170324,'atest'),(39,224,'0.0.0.0',1,1490290332,'[\"11111\"]',20170324,'atest'),(40,222,'0.0.0.0',1,1490292596,'[\"243\"]',20170324,'atest'),(41,220,'0.0.0.0',1,1490293126,'[\"11111\"]',20170324,'atest'),(42,223,'0.0.0.0',1,1490293207,'[\"2414241\"]',20170324,'1234554321'),(43,225,'0.0.0.0',1,1490330581,'[\"1\"]',20170324,'atest');
/*!40000 ALTER TABLE `project_each_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_fields`
--

DROP TABLE IF EXISTS `project_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_fields` (
  `pid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `options` text NOT NULL,
  `options_count` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_fields`
--

LOCK TABLES `project_fields` WRITE;
/*!40000 ALTER TABLE `project_fields` DISABLE KEYS */;
INSERT INTO `project_fields` VALUES (217,'[{\"type\":\"radio\",\"title\":\"666\",\"range\":\"1\",\"options\":[\"666\"],\"results\":[0]}]',1),(218,'[{\"type\":\"radio\",\"title\":\"111\",\"range\":\"1\",\"options\":[\"111\"],\"results\":[0]}]',1),(219,'[{\"type\":\"radio\",\"title\":\"123\",\"range\":\"1\",\"options\":[\"123\"],\"results\":[1]}]',1),(220,'[{\"type\":\"radio\",\"title\":\"11111\",\"range\":\"1\",\"options\":[\"11111\"],\"results\":[3]}]',1),(221,'[{\"type\":\"radio\",\"title\":\"44\",\"range\":\"1\",\"options\":[\"55\"],\"results\":[0]}]',1),(222,'[{\"type\":\"radio\",\"title\":\"234\",\"range\":\"1\",\"options\":[\"243\"],\"results\":[1]}]',1),(223,'[{\"type\":\"radio\",\"title\":\"2113124\",\"range\":\"1\",\"options\":[\"2414241\"],\"results\":[2]}]',1),(224,'[{\"type\":\"radio\",\"title\":\"1111\",\"range\":\"1\",\"options\":[\"11111\"],\"results\":[0]}]',1),(225,'[{\"type\":\"radio\",\"title\":\"\\uff1f\",\"range\":\"1\",\"options\":[\"1\",\"2\",\"3\"],\"results\":[1,0,0]}]',1);
/*!40000 ALTER TABLE `project_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `power` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (1,'aaa','bbb','123','123@qq.com',NULL),(2,'aaaa','aaaaaa','13813849166','138138456@qq.com',NULL),(3,'bbbb','aaaaaaa','13813849166','123456789@qq.com',NULL),(4,'aaaaa','aaaaaaa','13813849166','123456789@qq.com',NULL),(5,'aaaaaa','123451','13812345678','aaa@qq.com',NULL),(6,'wjbsyc','wjbs19950104','13311111111','1111@111.com',NULL),(7,'1111','123456789','13333333333','133@33.com',NULL),(8,'homura','101672c79b019d1e5db3208fba00b2','13333333333','111@111.com',NULL),(9,'akemi','101672c79b019d1e5db3208fba00b2a8','13333333333','111@111.com',NULL),(10,'atest','4b7d967a9b5b1f416d00c74cad290b69d50d7ccc1a8ab6f956163fbb53cab005','13333333333','122@11.cc',NULL),(11,'admin','601a114f68775427229317d2930c3d4477496ed52ec039830a7f7dd52cfe4d42','13333333333','111@111.cc','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),(12,'laravel','029de6fb08d212a8bbea01b5dfe6b764531e80d83d12b5211b0e2c74bc20066d','13888888888','111@111.com',NULL),(13,'fuckyou','b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860','13333333333','111@111.cc',NULL),(14,'assssss','b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860','13333333333','111@111.cc',NULL),(15,'acccccc','b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860','13333333333','111@111.cc',NULL),(16,'aqqqqqqq','9162849a927a398cd3cd8f6c392c31ba4f177eb5c5ee751ef7ebe148ce3d294b','13333333333','11@11.cc',NULL),(17,'12311','1350b748120f2b06d8867d267dfa77b29f741aed9c8351f9591754ad6c44440c','13333333333','11@11.cc',NULL),(18,'axxxxx','d8ca858bbc656bc2110d7996508cc89226483b3ea8de816f557f827f4b526f50','13333333333','11@11.cc',NULL),(19,'addsadad','e8099d5e7e4763651b17932d9b82bb609039b2dbc450bb28e4e4b271844b122f','13333333333','11@11.cc',NULL),(20,'whatthefuck','b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860','13333333333','11@11.cc',NULL),(21,'whatth','b9e1414249b7b98dd5190606f9b49b86c59bc215d3722646521f7d6ed6e50860','13333333333','11@11.cc',NULL),(22,'1234554321','e8099d5e7e4763651b17932d9b82bb609039b2dbc450bb28e4e4b271844b122f','13333333333','11@11.cc',NULL);
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-24 13:06:46
