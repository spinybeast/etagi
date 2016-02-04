-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: etagi
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `exclusives`
--

DROP TABLE IF EXISTS `exclusives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exclusives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lot_number` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exclusives`
--

LOCK TABLES `exclusives` WRITE;
/*!40000 ALTER TABLE `exclusives` DISABLE KEYS */;
INSERT INTO `exclusives` VALUES (1,'Двушка в центре Старожопинска!','<p>Офис Центральный/3 ЗЖМ,</p>\r\n\r\n<p>Краснодарская-2/Аллея роз,</p>\r\n\r\n<p>2-комнатную квартиру, 7/10 панельного дома, 56/34/9 квадратных метров, отличное состояние, комнаты несмежные. Квартира теплая, ухоженная, окна и коммуникации заменены. Остаётся встроенная мебель, две сплит-системы. В доме ТСЖ, тихий зеленый двор, паркинг, детские площадки, рядом стадион. Удобная транспортная развязка позволяет без пересадок добраться практически в ЛЮБОЙ район города &ndash; Центр, Ленина, Нагибина, РИИЖТ, ЖДР, ЦГБ, Нахичевань, Сельмаш, Комсомольскую площадь, Военвед, СЖМ, Александровку. Подходят различные формы расчета, в том числе материнский капитал, ВОЕННАЯ ИПОТЕКА! Документы полностью оформлены. Собственник готов к аргументированному торгу после осмотра квартиры.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>В<strong>сегда - по</strong>лное сопровождение сделки вплоть до получения права собственности на квартиру! Агент 124 При звонке в агентство, пожалуйста, сообщите номер лота &ndash; 01077-0т</p>\r\n','Мария','8(934)434-22-22','ук356',100000),(2,'Трешка!','<p>I had downloaded a basic yii2 application.And then pushed into git.But then in other pc I installed all the dependencies using a composer. But I dont have bower folder now so getting error:</p>\r\n\r\n<p>The file or directory to be published does not exist: C:\\xampp\\htdocs\\jumpbyte-site\\vendor\\bower/jquery/dist&#39;</p>\r\n','Мария','2324930492','ав4',NULL),(3,'Тестовая однушка','<p><strong>шщзшщз</strong></p>\r\n','Мария','223423','пва',NULL);
/*!40000 ALTER TABLE `exclusives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exclusives_properties`
--

DROP TABLE IF EXISTS `exclusives_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exclusives_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exclusive_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exclusives_properties`
--

LOCK TABLES `exclusives_properties` WRITE;
/*!40000 ALTER TABLE `exclusives_properties` DISABLE KEYS */;
INSERT INTO `exclusives_properties` VALUES (5,2,10,'5'),(8,3,10,'10'),(9,3,11,'10'),(10,1,10,'5'),(11,1,11,'9'),(12,1,12,'Совместный');
/*!40000 ALTER TABLE `exclusives_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (12,'Санузел'),(10,'Этаж'),(11,'Этажей');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staticpages`
--

DROP TABLE IF EXISTS `staticpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staticpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `pagekey` varchar(200) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staticpages`
--

LOCK TABLES `staticpages` WRITE;
/*!40000 ALTER TABLE `staticpages` DISABLE KEYS */;
INSERT INTO `staticpages` VALUES (11,'&lt;p style=&quot;direction: ltr;&quot;&gt;&lt;b&gt;&lt;i&gt;&lt;font size=&quot;6&quot; color=&quot;#cc66cc&quot;&gt;Предалагем&lt;sup&gt;пра&lt;/sup&gt;&lt;/font&gt;&lt;/i&gt;&lt;/b&gt;&lt;/p&gt;&lt;b&gt;&lt;i&gt;&lt;/i&gt;&lt;/b&gt;&lt;p class=&quot;sceditor-nlf&quot;&gt;&lt;img src=&quot;http://cs540104.vk.me/c540106/v540106252/41e5a/6sFTb2imFHc.jpg&quot;&gt;&lt;span id=&quot;sceditor-end-marker&quot; class=&quot;sceditor-selection sceditor-ignore&quot; style=&quot;line-height: 0; display: none;&quot;&gt; &lt;/span&gt;&lt;span id=&quot;sceditor-start-marker&quot; class=&quot;sceditor-selection sceditor-ignore&quot; style=&quot;line-height: 0; display: none;&quot;&gt; &lt;/span&gt;&lt;br&gt;&lt;/p&gt;','exclusive','Эксклюзивные предложения',1),(12,'&lt;p&gt;услуги&lt;/p&gt;','services','Услуги',1),(13,'&lt;ul&gt;&lt;li&gt;вапвпыврцыркегрк&lt;/li&gt;&lt;li&gt;негенген&lt;/li&gt;&lt;li&gt;грошлролор&lt;/li&gt;&lt;/ul&gt;','career','Карьера',1);
/*!40000 ALTER TABLE `staticpages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-04 17:34:24
