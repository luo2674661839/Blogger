-- MySQL dump 10.13  Distrib 5.7.21, for macos10.13 (x86_64)
--
-- Host: localhost    Database: name
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `art`
--

DROP TABLE IF EXISTS `art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `art` (
  `art_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` smallint(5) unsigned DEFAULT '0',
  `user_id` int(10) unsigned DEFAULT '0',
  `nick` varchar(45) DEFAULT '',
  `title` varchar(45) DEFAULT '',
  `content` text,
  `pubtime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastup` int(10) unsigned DEFAULT '0',
  `comm` smallint(5) unsigned NOT NULL DEFAULT '0',
  `arttag` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='文章表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (22,1,0,'','测试','测试',1523778668,0,1,'php'),(21,1,0,'','4','4',1523038422,0,1,'4'),(20,1,0,'','3','3',1523038412,0,0,'3'),(19,1,0,'','2','2',1523038404,0,0,'2'),(17,5,0,'','暴雨','西安下雨',1523033331,0,4,'旅游，天气'),(16,16,0,'','小胖子','喜欢吃美食',1522995322,1524287231,4,'美食家,爱好者');
/*!40000 ALTER TABLE `art` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat`
--

DROP TABLE IF EXISTS `cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` char(30) NOT NULL DEFAULT '',
  `num` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat`
--

LOCK TABLES `cat` WRITE;
/*!40000 ALTER TABLE `cat` DISABLE KEYS */;
INSERT INTO `cat` VALUES (1,'人生123',5),(5,'天气',1),(6,'开心',0),(7,'技术',0),(16,'陈倩',0),(11,'微信开发',0);
/*!40000 ALTER TABLE `cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `art_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `nick` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `content` varchar(1000) NOT NULL DEFAULT '',
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `pubtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (2,4,0,'陈倩','chenqian@163.com','陈倩123456',0,1522745877),(3,4,0,'罗达','18062292404@163.com','楼上的是蠢猪....',0,1522746513),(10,6,0,'路飞','lufei@163.com','1234556666路飞',0,1522747603),(12,16,0,'罗达','18062292404@163.com','所以胖。',0,1522995359),(13,16,0,'张三','zhangsan@163.com','哈哈',0,1522995391),(14,17,0,'阴天','yintian@qq.com','快下雨...',0,1523034845),(15,17,0,'晴天','qingtian@163.com','不存在的！！',0,1523035774),(16,17,0,'雾天','wutian@qq.com','看不见雨点...',2130706433,1523036352),(17,16,0,'李四','lisi@qq.com','减肥',0,1523263334),(18,16,0,'王五','wangwu@163.com','我喜欢',2130706433,1523263394),(19,17,0,'code','code@163.com','123',0,1523778631),(21,21,0,'ee','2131@163.com','123414',0,1534558688);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `art_id` int(10) unsigned NOT NULL DEFAULT '0',
  `tag` char(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tag_id`),
  KEY `at` (`art_id`,`tag`),
  KEY `ta` (`tag`,`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (22,21,'4'),(23,22,'php'),(20,19,'2'),(21,20,'3'),(24,16,'美食家'),(25,16,'爱好者'),(18,17,'旅游，天气');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT '',
  `nick` char(20) NOT NULL DEFAULT '',
  `email` char(30) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `lastlogin` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-27 11:26:57
