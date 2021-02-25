-- Yes I know that this contains personal info, but my school publishes it anyway.

-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: benjamindavies_maquo
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB


--
-- Current Database: `benjamindavies_maquo`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `benjamindavies_maquo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `benjamindavies_maquo`;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(60) NOT NULL,
  `answer` varchar(20) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quiz_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,123456,'One','1',1),(2,123456,'Three','3',3),(3,123456,'Two','2',2),(4,123466,'1+3=','4',1),(5,123466,'2+5=','7',2),(6,123466,'3+6=','9',3),(7,123467,'what is my name','Joshua',1),(8,123467,'how old am i','12',2),(9,123467,'who is my brother','ben the anoying',3),(13,123469,'spell house','house',1),(14,123469,'spell shop','shop',2),(15,123469,'spell dad','dad',3),(16,123469,'spell mum','mum',4),(18,123471,'Who is the folder','Josh',1),(19,123471,'Why does he fold','Because',2),(20,123471,'Because','He Folds',3),(21,123471,'Final','Flash',4),(22,123471,'How Old Is MMC','74 Years',5),(23,123471,'No?','Yes?',6),(24,123471,'2nd To Last Question','no',7),(26,123471,'Kekw','peposimp',9),(27,123471,'Your Mum','Its A Cow',10),(29,123471,'Pedo','Trump',12),(30,123471,'We Are','Legion',13),(31,123471,'\"Cant Xbox Me In\"','Game On',14),(32,123471,'57th Unit In My Box','Teq Beerus',15),(33,123471,'Simp For Davepeta','Yes',16),(34,123471,'the ezest cod 4 task','Get 10 Headshots',17),(35,123471,'\"Super Sonic Man...\"','Out Of You',18),(36,123472,'who folds','josh',1),(37,123472,'how many times','',2),(38,123472,'has josh folded','10000000000000000000',3),(39,123472,'whos trump','pedo',4),(40,123472,'almost done','oh',5),(41,123472,'you win cod match','gg',6),(42,123472,'first slote dokkan','cell',7),(43,123472,'how may dokkan units','alot',8),(44,123472,'answer','question',9),(45,123473,'1','2',1),(46,123472,'no,yes,no,no','yes,no,yes,yes',10),(47,123473,'3','4',2),(48,123473,'5','6',3),(49,123473,'7','8',4),(50,123473,'9','10',5),(51,123472,'is this question 10','no',11),(52,123472,'when is josh racist','always',12),(53,123472,'fatsest run3','3,30',13),(54,123472,'last question ?','no',14),(55,123472,'best dokkan unit','goku black',15),(56,123474,'this is not a game ?','yes',1),(57,123474,'fastest run2 in mins','2 mins',2),(79,123474,'quazz 2 ?','yes',3),(80,123474,'2nd unit dokkan','gohan and goteen',4),(81,123474,'worst defencive unit','yamcha',5),(82,123474,'imposable qiz1 anser','four',6),(83,123474,'is this question 10','no',7),(84,123474,'shortest dbz charter','green bug',8),(85,123474,'A','Q',9),(86,123474,'is this question 10','yes',10),(87,123474,'7 hearts','your gay',11),(88,123474,'qwertyuiopasdfghjklz','xcvbnm',12),(89,123474,'my height in cm','174',13),(90,123474,'peach or coconuts','peach',14),(91,123474,'last question','never',15),(102,123471,'who is dating harley','jen lawrence',19),(103,123471,'how much wood could a wood chuck chuck?','35 cubic feet',20),(104,123471,'what year was covid born in','2019',21),(105,123471,'who faked his death','kim possable',22),(106,123471,'avg power bill nz','$1,982',23),(107,123471,'sam did this','7',24),(108,123471,'top box office movie','endgame',25),(109,123471,'best sony movie','spider-verse',26),(110,123471,'best dreamworks movie','megamind',27),(111,123471,'best disney movie','lion king',28),(113,123471,'best pixar movie','up',30),(114,123471,'best netflix movie','none',31),(115,123471,'top rate anime','full metal alc',32),(116,123471,'top rated game','zelda oot',33),(117,123471,'best ps5 game annoce','RaC rift apart',34),(118,123471,'highest rated song','like a rolling stone',35),(122,123471,'what car was used in back to the future','delorean',36),(123,123471,'is this question 38?','no',37),(124,123471,'is this question 43?','no',38),(125,123471,'worst website','buzzfeed',39),(126,123471,'is this question 38?','no',40),(127,123471,'the highest valued athlete of all time','Gaius Appuleius Dioc',41),(128,123471,'The date this question was writen','monday 25 june 2020',42),(129,123471,'best mythical creature','dragon',43),(130,123471,'what age were knights','dark age',44),(131,123471,'lv 3 wizard','fireball',45),(132,123471,'warlock?','eldric blast',46),(133,123471,'who dies in the first','blue bitch',47),(134,123471,'8','infinity',48),(135,123471,'is this question 50?','no',49),(136,123471,'2nd to last question','no',50),(137,123471,'live action anime movies','are great',51),(139,123471,'welcome to life','fuck you',52),(140,123471,'best weapon in mcd','fighters bindings',53),(141,123471,'best dbd surv perk','balence landing',54),(142,123471,'best dbd killer perk','ruin',55),(143,123471,'worst grease god (ethicly)','zeus',56),(144,123471,'worst norse god (ethicly)','thor',57),(145,123471,'where is back from whens you came','the ocean',58),(146,123471,'who is the legendary super sayian','bardock',59),(147,123471,'is this question 60','yes',60),(148,123479,'how many dawarfs','7',1),(149,123479,'is there a girl^','No',2),(150,123479,'Is ryan fast','SUPER slow....',3),(151,123479,'Simon likes who starting with c','Charlotte',4),(152,123479,'Nirai Likes who starting with c','Charlotte',5),(153,123479,'Harley Likes who starting with c','Charlotte',6),(154,123479,'Sam likes who starting with c','Chhahahahah nope',7),(155,123479,'How mnay colours in rainbow','7',8),(156,123479,'what 2 colours are first','Red and orange',9),(157,123479,'What is past space','space',10),(158,123479,'is space spacy','Maybe',11),(173,123480,'is this the first question','yes',1),(174,123480,'is this question 2','yes',2),(175,123480,'strongest mha charter','yuga aoyama',3),(176,123480,'coolest mha charter','dabi',4),(177,123480,'question 7 ?','no',5),(178,123480,'whos stronger naruto or susake','naruto',6),(179,123480,'strongest naruto charter','kaguya',7),(180,123480,'strongest demon slyer charter','demon slayers gay',8),(181,123480,'whos gay','people and or josh',9),(182,123480,'who folds','josh',10),(183,123480,'three times in a row ?','josh',11),(184,123480,'four times in a row ?','no',12),(185,123480,'shift 2','@',13),(186,123480,'print screen + scroll lock =','pause break',14),(187,123480,'slides','dream',15),(188,123480,'question 16 ?','yes',16),(189,123480,'question 16 ?','no',17),(190,123480,'question 17 ?','no',18),(191,123480,'tokyo ghoul ( manga > anime) yes or no','yes',19),(192,123480,'manga > anime yes or no','yes',20),(193,123480,'strongest one peice charters','who cares',21),(194,123480,'first person to die in juuni taisen','no reload girl',22),(195,123480,'coolest anime charter','its personal oppion',23),(196,123480,'pass','pass',24),(197,123480,'football','soccer',25),(198,123480,'answer','question',26),(199,123480,'mnbvcxzlkjhgfdsa','poiuytrewq',27),(200,123480,'question 35?','no',28),(201,123480,'no wifi =','data',29),(202,123480,'who has bad background','ryan',30),(203,123480,'thickest person in this room','mr burch',31),(204,123480,'smartest person in this room','josh',32),(205,123480,'computer science','careers',33),(206,123480,'2nd to last question ?','yes',34),(207,123480,'last question ?','yes',35),(208,123481,'Beware of?','Josh',1),(209,123481,'Who Folds?','Josh',2),(210,123482,'What is the superior circle constant?','Tau',1),(211,123481,'Who is annoying?','Josh',3),(212,123481,'Whats a rare type of Discrimintation','Joshism',4),(213,123481,'Who trys to fold in Among Us?','Josh',5),(214,123481,'Who is Scary?','Not Josh',6),(229,123470,'','',1),(230,123484,'top unit in attack slot','gohan',1),(231,123484,'how old is ryan','16',2),(232,123484,'is ryan','yes',3),(233,123484,'is ryans hair brown or black','gray',4),(234,123484,'has ryan completed impossable quizz','no',5),(235,123484,'does ryan take computer sience','yes',6),(236,123484,'ryans favourite anime','tokyo ghoul',7),(237,123484,'does ryan take englsih','no he takes dokkan',8),(238,123484,'what school does ryan go to','dont care',9),(239,123484,'is ryan left or right handed','idk',10),(240,123484,'does ryan have a crush on josh yes','no',11),(241,123484,'how tall is ryan','180',12),(242,123484,'what name is ryans name','ryan',13),(243,123484,'is ryan good at video games','very',14),(244,123484,'what colour eyes does ryan have ?','blue',15),(245,123484,'how big is ryan','7 inch',16),(246,123484,'ryans feet size','12',17),(247,123484,'is ryan ten out of ten good friend','yes he 10/10 great',18),(248,123485,'how many min did i hold the last gen','27 min',1),(249,123485,'how is josh surpose to walk','like that',2),(250,123485,'HOW FAST WAS YOUR SPEEDRUN','1MIN',3),(251,123485,'what side is the prostate doc on','maf',4),(252,123485,'taylor is secrectly gay','no it not sectret',5),(253,123485,'is josh','yes',6),(254,123485,'boggy','blue,orange,green,gr',7),(255,123485,'random speed =','new random',8),(256,123485,'the next dokkanfest excluscive','kefla',9),(257,123486,'','',1),(258,123485,'what does pew like','watching people suff',10),(259,123485,'is josh a tratior','yes',11),(260,123485,'josh likes','vore',12),(261,123485,'what happens to goku in new dbs chapter','falcon punch',13),(262,123485,'josh has how many errors','32',14),(263,123485,'what is the josh claim as civilian','detective',15),(265,123487,'how old is nik','16',1),(266,123487,'what house colour was nik in in atk','green',2),(267,123487,'top unit','cooler',3),(268,123487,'niks favourate youtuber','belle',4);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `author_id` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123489 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizzes`
--

LOCK TABLES `quizzes` WRITE;
/*!40000 ALTER TABLE `quizzes` DISABLE KEYS */;
INSERT INTO `quizzes` VALUES (123456,'A Quiz','Test your mental skillabilities',1,0),(123466,'Easy Maths','level one maths addition',8,1),(123467,'Write','A quiz about me',9,1),(123469,'spelling','can you spell these words',8,1),(123470,'Untitled Quiz','Hello',3,1),(123471,'Pop Culture','Quiz Thing',12,1),(123472,'niks quazz','do it',13,1),(123473,'the counting Quiz','1234567890',12,1),(123474,'Untitled Quiz','do it 2',13,1),(123478,'','',14,0),(123479,'sams Quiz','',12,1),(123480,'quazz 3','do it 3',14,1),(123481,'HeilLordKaden','HeilThyLord',15,1),(123482,'TAU > PI','you know it',16,1),(123483,'','',17,0),(123484,'how well do you know','RYAN by nik',17,1),(123485,'kool kids klub quiz','rrr',18,1),(123486,'Actually good quiz','',19,1),(123487,'nik','asd',18,1),(123488,'','',18,0);
/*!40000 ALTER TABLE `quizzes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `google_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'benjamindavies@mmc.school.nz','benjamindavies','$2y$10$OPFus8x34gQkkL5VW4VddO4B4bgK/Cuf6GJIYRoczsVkuf.7xLALu',''),(3,'benjamindavies@mmc.school.nz','Bend1010','','110468390940842899672'),(7,'kadenadlington@mmc.school.nz','militaryk3','','106523774933674447439'),(8,'michelle3136@gmail.com','Michelle3136','$2y$10$uyN.m4vSNyIZxoQjyLAFBOUE3uWJ60spRgt82WUoF/cTVznAovqp6',''),(9,'joshuadav808@gmail.com','joshuad56','','110292857393269542860'),(10,'shanedavies56@gmail.com','Dad','','101423987189148540956'),(12,'ryanledingham@mmc.sc','Nagito','$2y$10$s8/39kCGwR9BaFpV1AmCnua9.RkK8YfOtriI8SrD/N2VGFr9rT.6K',''),(13,'nik@gmail.com','nikscarlettherbert','$2y$10$3ixk43BnbKS1yzGSrTh/6uhvWkhGGV2j9YPVvaxjeetIbE/WUqukC',''),(14,'nik@gmail.com','nikolaasjr','$2y$10$3ixk43BnbKS1yzGSrTh/6uhvWkhGGV2j9YPVvaxjeetIbE/WUqukC',''),(15,'kadenadlington@gmail.com','kadenadlington@gmail','$2y$10$Sk78XoGMd.LRgrHwZNlF.umKiZF9TWnv24Zjn52qGIb1bjkBx4Tuu',''),(16,'mattadlam3@gmail.com','matthewadlam','$2y$10$95rhdmzPva2h54NM1n0ZW.RKEuzHtsQNB0657f72RFtwNmHOQyzHG',''),(17,'nikolaas@gmail.com','nikolaas','$2y$10$4aQWM817A57Os./8cDYgO.p1COCxWlh/yh5KveIMFxEhWXgx/vbpW',''),(18,'ryanledingham@mmc.school.nz','ryanledingham','$2y$10$eQocfuSLNY7KoR1zzVdgbupkL5WRUy1zYVjtdCJ4jbvWazqEU8rym',''),(19,'joshcallander@mmc.school.nz','josh','$2y$10$WWrmwpYdXmwifJVUR2jAQukPf/idczKCUm6POKha7i9Powg3Vewuq','');
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

-- Dump completed on 2021-02-17 11:24:01
