-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: agenda_telefonica
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `telefones`
--

DROP TABLE IF EXISTS `telefones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefones` (
  `telefone_id` int(11) NOT NULL AUTO_INCREMENT,
  `flg_tipo` char(1) NOT NULL COMMENT '(R)esidencial ou (C)elular',
  `desc_telefone` varchar(15) NOT NULL,
  `contato_id` int(11) NOT NULL,
  PRIMARY KEY (`telefone_id`),
  KEY `telefones_ibfk_1` (`contato_id`),
  CONSTRAINT `telefones_ibfk_1` FOREIGN KEY (`contato_id`) REFERENCES `contatos` (`contato_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefones`
--

LOCK TABLES `telefones` WRITE;
/*!40000 ALTER TABLE `telefones` DISABLE KEYS */;
INSERT INTO `telefones` VALUES (1,'C','(15) 98766-6554',1),(2,'R','(12) 3456-6666',2),(3,'C','(12) 45555-5555',2),(4,'C','(15) 98123-3333',3),(5,'C','(15) 99756-5333',3),(6,'R','(13) 2222-2222',4),(7,'R','(15) 3547-3862',5),(8,'R','(15) 3357-1332',5),(9,'C','(15) 99755-0124',5);
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-30  1:35:27
