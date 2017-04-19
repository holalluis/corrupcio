-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (armv7l)
--
-- Host: localhost    Database: Corrupcio
-- ------------------------------------------------------
-- Server version	5.5.54-0+deb8u1

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
-- Table structure for table `casos`
--

DROP TABLE IF EXISTS `casos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `casos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `espoli` float NOT NULL,
  `any` text NOT NULL,
  `estat` text NOT NULL,
  `modificacio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casos`
--

LOCK TABLES `casos` WRITE;
/*!40000 ALTER TABLE `casos` DISABLE KEYS */;
INSERT INTO `casos` VALUES (15,'Cas Palau',24000000,'2002','Judici en procÃ©s (abril 2017)','2017-04-18 22:52:33','El cas Millet, tambÃ© conegut com el cas Palau o el saqueig del Palau de la MÃºsica, Ã©s essencialment un desfalc realitzat per FÃ¨lix Millet i Tusell, president del patronat de l\'AssociaciÃ³ OrfeÃ³ CatalÃ -Palau de la MÃºsica (que Ã©s una fundaciÃ³ erigida pel mateix FÃ¨lix Millet l\'any 1990), amb la implicaciÃ³ d\'alguns dels seus colÂ·laboradors (Jordi Montull tambÃ© ha estat imputat per la fiscalia), que incloÃ¯a el finanÃ§ament irregular de ConvergÃ¨ncia DemocrÃ tica de Catalunya. El desfalc va ser realitzat durant aproximadament tota la primera dÃ¨cada del segle XXI i en alguns casos ha passat tant de temps que el delicte ja ha prescrit.'),(16,'Cas PretÃ²ria',45000000,'2000-2005','','2017-04-19 12:21:39','El cas PretÃ²ria Ã©s el nom en clau donat pel jutge Baltasar GarzÃ³n a les actuacions judicials del 27 d\'octubre de 2009 per uns suposats delictes de suborn, corrupciÃ³ urbanÃ­stica i blanqueig de diners que fins al moment han originat la detenciÃ³ de 9 persones.');
/*!40000 ALTER TABLE `casos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_relacions_persona_cas` AFTER DELETE ON `casos`
 FOR EACH ROW BEGIN
		DELETE FROM relacions_persona_cas WHERE cas_id = OLD.id;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `condemnes`
--

DROP TABLE IF EXISTS `condemnes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condemnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relacio_persona_cas_id` int(11) NOT NULL,
  `anys_de_preso` int(11) NOT NULL,
  `delictes` text NOT NULL,
  `any` int(11) NOT NULL,
  `modificacio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condemnes`
--

LOCK TABLES `condemnes` WRITE;
/*!40000 ALTER TABLE `condemnes` DISABLE KEYS */;
INSERT INTO `condemnes` VALUES (2,26,1,'gvbhghcfgh',2017,'2017-04-12 12:36:17');
/*!40000 ALTER TABLE `condemnes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empreses`
--

DROP TABLE IF EXISTS `empreses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empreses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `modificacio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empreses`
--

LOCK TABLES `empreses` WRITE;
/*!40000 ALTER TABLE `empreses` DISABLE KEYS */;
INSERT INTO `empreses` VALUES (5,'Palau de la mÃºsica','2017-04-18 22:50:42','El Palau de la MÃºsica Catalana Ã©s un auditori de mÃºsica situat al barri de Sant Pere (Sant Pere, Santa Caterina i la Ribera) de Barcelona.'),(6,'New Letter','2017-04-14 15:31:13',''),(7,'Mail Rent','2017-04-14 15:33:18',''),(8,'Ferrovial','2017-04-14 15:50:49',''),(9,'Publiciutat','2017-04-14 16:04:55',''),(10,'Niesma CorporaciÃ³','2017-04-18 23:26:39',''),(11,'Gramepark','2017-04-18 23:26:29',''),(12,'City Actividades Inmobiliarias','2017-04-18 23:26:13',''),(13,'Proinosa','2017-04-18 23:29:29',''),(14,'Stefany Art Gallery','2017-04-18 23:30:23',''),(15,'Limasa','2017-04-19 00:03:04','');
/*!40000 ALTER TABLE `empreses` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_relacions_persona_empresa` AFTER DELETE ON `empreses`
 FOR EACH ROW BEGIN
		DELETE FROM relacions_persona_empresa WHERE empresa_id = OLD.id;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `partits`
--

DROP TABLE IF EXISTS `partits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `nom_llarg` text NOT NULL,
  `modificacio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partits`
--

LOCK TABLES `partits` WRITE;
/*!40000 ALTER TABLE `partits` DISABLE KEYS */;
INSERT INTO `partits` VALUES (7,'CiU','ConvergÃ¨ncia i UniÃ³','2017-04-18 22:19:18','ConvergÃ¨ncia i UniÃ³ (CiU) va ser una federaciÃ³ de dos partits polÃ­tics catalanistes, formada per ConvergÃ¨ncia DemocrÃ tica de Catalunya (CDC) i UniÃ³ DemocrÃ tica de Catalunya (UDC). Es va dissoldre el 18 de juny de 2015'),(8,'PP','Partido Popular','2017-04-14 13:07:29',''),(9,'PSC','Partit dels Socialistes de Catalunya','2017-04-18 22:33:42','El Partit dels Socialistes de Catalunya (PSC), Ã©s un partit polÃ­tic espanyol d\'Ã mbit catalÃ , d\'ideologia socialdemÃ²crata, catalanista i amb doble identitat nacional a favor del federalisme.Creat el 16 de juliol de 1978 i representat a Catalunya. En l\'Ã mbit espanyol estÃ  federat amb el PSOE.');
/*!40000 ALTER TABLE `partits` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_relacions_persona_partit` AFTER DELETE ON `partits`
 FOR EACH ROW BEGIN
		DELETE FROM relacions_persona_partit WHERE partit_id = OLD.id;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `persones`
--

DROP TABLE IF EXISTS `persones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `naixement` date NOT NULL,
  `modificacio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persones`
--

LOCK TABLES `persones` WRITE;
/*!40000 ALTER TABLE `persones` DISABLE KEYS */;
INSERT INTO `persones` VALUES (12,'FÃ¨lix Millet','1935-12-08','2017-03-25 21:04:08'),(13,'Jordi Montull','1956-03-17','2017-03-26 17:22:12'),(14,'Gemma Montull','0000-00-00','2017-04-11 15:42:52'),(15,'Rosa Garicano','0000-00-00','2017-04-11 15:43:12'),(16,'Raimon BergÃ³s','0000-00-00','2017-04-12 21:17:55'),(17,'Santiago Llopart','0000-00-00','2017-04-11 19:31:35'),(18,'Edmundo Quintana','0000-00-00','2017-04-11 19:31:43'),(19,'Daniel OsÃ car','0000-00-00','2017-04-11 19:31:52'),(20,'Pedro Buenaventura','0000-00-00','2017-04-11 19:32:00'),(21,'Juan Elizaga','0000-00-00','2017-04-11 19:32:08'),(22,'Miguel GimÃ©nez-Salinas','0000-00-00','2017-04-14 15:20:42'),(23,'Juan Antonio MenchÃ©n','0000-00-00','2017-04-14 10:41:28'),(24,'Juan Manuel Parra','0000-00-00','2017-04-14 10:41:54'),(25,'Pedro Luis RodrÃ­guez','0000-00-00','2017-04-14 10:43:15'),(26,'Vicente MuÃ±oz','0000-00-00','2017-04-14 10:43:22'),(27,'Ramon Marc MartÃ­','0000-00-00','2017-04-14 10:43:46'),(28,'Luis AndrÃ©s GarcÃ­a (Luigi)','1954-05-10','2017-04-18 22:23:49'),(29,'Bartomeu MuÃ±oz','1957-06-15','2017-04-18 21:50:00'),(30,'LluÃ­s Prenafeta','1939-03-17','2017-04-18 21:59:46'),(31,'MaciÃ  Alavedra','1934-03-26','2017-04-18 22:15:04'),(32,'Manuel Dobarco','0000-00-00','2017-04-18 23:14:03'),(33,'Josep Singla','0001-01-01','2017-04-18 23:38:52'),(34,'Maria LluÃ¯sa Mas','0000-00-00','2017-04-19 00:15:41'),(35,'Doris Malfeito','0000-00-00','2017-04-18 23:45:48'),(36,'Manuel Valera','0000-00-00','2017-04-18 23:55:27'),(37,'Manuel Carrillo','0000-00-00','2017-04-19 00:02:18'),(38,'Philip Mc Mahan','0000-00-00','2017-04-19 00:09:24'),(39,'GlÃ²ria Torres','0000-00-00','2017-04-19 00:19:42');
/*!40000 ALTER TABLE `persones` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_relacions_persona` AFTER DELETE ON `persones`
 FOR EACH ROW BEGIN
	DELETE FROM relacions_persona_cas     WHERE persona_id = OLD.id;
	DELETE FROM relacions_persona_partit  WHERE persona_id = OLD.id;
	DELETE FROM relacions_persona_empresa WHERE persona_id = OLD.id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `relacions_persona_cas`
--

DROP TABLE IF EXISTS `relacions_persona_cas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relacions_persona_cas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `cas_id` int(11) NOT NULL,
  `descripcio` text NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relacions_persona_cas`
--

LOCK TABLES `relacions_persona_cas` WRITE;
/*!40000 ALTER TABLE `relacions_persona_cas` DISABLE KEYS */;
INSERT INTO `relacions_persona_cas` VALUES (26,12,15,'MalversaciÃ³ de diners pÃºblics (3,3M), falsedat documental, apropiaciÃ³ indeguda i trÃ fic d\'influÃ¨ncies, administraciÃ³ deslleial, blanqueig de capitals',1),(27,13,15,'MalversaciÃ³ de diners pÃºblics, falsedat documental, apropiaciÃ³ indeguda, trÃ fic d\'influÃ¨ncies, administraciÃ³ deslleial, blanqueig de capitals i frau a Hisenda',2),(28,19,15,'Dirigir el cobrament de comissions de Ferrovial a CDC a travÃ©s del Palau. \nTrÃ fic d\'nfluÃ¨ncies, blanqueig de capitals i falsedat documental',5),(29,14,15,'CooperaciÃ³ en el presumpte pagament de comissions de Ferrovial a CDC a travÃ©s del Palau. MalversaciÃ³ de diners pÃºblics, falsedat documental, apropiaciÃ³ indeguda, trÃ fic d\'influÃ¨ncies, administraciÃ³ deslleial, blanqueig de capitals i frau a Hisenda',3),(30,15,15,'MalversaciÃ³ de fons pÃºblics, apropiaciÃ³ indeguda, blanqueig de capitals i falsedat documental, en qualitat de cÃ²mplice',4),(31,21,15,'Comissions ilÂ·legals (Ferrovial). \nTrÃ fic d\'influÃ¨ncies en qualitat d\'inductor i administraciÃ³ deslleial',7),(32,20,15,'Comissions ilÂ·legals (Ferrovial). \nTrÃ fic d\'influÃ¨ncies en qualitat d\'inductor i administraciÃ³ deslleial',6),(33,18,15,'Subcontractat per Raimon BergÃ³s per gestionar trÃ mits amb Hisenda. \nFalsedat documental i frau a Hisenda, en qualitat de cÃ²mplice',15),(34,17,15,'Falsedat documental',16),(35,16,15,'Falsedat documental',14),(36,22,15,'Falsedat documental',8),(37,23,15,'Responsable de Mail Rent, falsedat documental',12),(38,24,15,'Falsedat documental',9),(39,25,15,'Falsedat documental',10),(41,26,15,'New Letter, acusat de falsedat en document mercantil',11),(43,28,16,'TrÃ fic d\'influÃ¨ncies i blanqueig de capitals',1),(44,27,15,'',13),(45,29,16,'Acusat de suborn',3),(46,30,16,'TrÃ fic d\'influÃ¨ncies i blanqueig de capitals',2),(47,31,16,'TrÃ fic d\'influÃ¨ncies i blanqueig de capitals',4),(48,32,16,'TrÃ fic d\'influÃ¨ncies',5),(49,33,16,'TrÃ fic d\'influÃ¨ncies',6),(50,35,16,'Blanqueig de capitals (Esposa d\'Alavedra)',12),(51,34,16,'Blanqueig de capitals (Esposa de Prenafeta)',9),(52,36,16,'TrÃ fic d\'influÃ¨ncies',7),(53,37,16,'Acusat de suborn',8),(54,38,16,'Blanqueig de capitals (Administrador de les societats d\'Alavedra)',10),(55,39,16,'Blanqueig de capitals (Amiga d\'Alavedra)',11);
/*!40000 ALTER TABLE `relacions_persona_cas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_condemna` AFTER DELETE ON `relacions_persona_cas`
 FOR EACH ROW BEGIN
		DELETE FROM condemnes WHERE relacio_persona_cas_id = OLD.id;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `relacions_persona_empresa`
--

DROP TABLE IF EXISTS `relacions_persona_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relacions_persona_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `descripcio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relacions_persona_empresa`
--

LOCK TABLES `relacions_persona_empresa` WRITE;
/*!40000 ALTER TABLE `relacions_persona_empresa` DISABLE KEYS */;
INSERT INTO `relacions_persona_empresa` VALUES (13,12,5,'President de la FundaciÃ³ OrfeÃ³ CatalÃ  - Palau de la MÃºsica entre els anys 1990 i 2009'),(14,13,5,'MÃ  dreta de FÃ¨lix Millet'),(16,14,5,'Exdirectora financera del Palau de la MÃºsica'),(17,18,5,'Assessor fiscal del Palau de la MÃºsica'),(19,24,5,'Directiu d\'Hispart'),(20,17,5,'Assessor jurÃ­dic del Palau de la MÃºsica'),(21,16,5,'Assessor jurÃ­dic del Palau de la MÃºsica'),(22,15,5,'Exdirectora general de la instituciÃ³'),(25,22,5,''),(27,26,6,''),(28,23,7,'Responsable de l\'empresa Mail Rent'),(29,20,8,'Exdirector territorial a Catalunya'),(30,21,8,'Exdirector de relacions institucionals de Ferrovial'),(31,25,5,''),(32,27,9,''),(33,28,10,'Propietari'),(34,32,11,'President'),(35,28,12,'Propietari'),(36,28,14,'Propietari'),(37,33,13,'President'),(38,36,10,'Administrador'),(39,37,15,'Propietari');
/*!40000 ALTER TABLE `relacions_persona_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relacions_persona_partit`
--

DROP TABLE IF EXISTS `relacions_persona_partit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relacions_persona_partit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `partit_id` int(11) NOT NULL,
  `descripcio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relacions_persona_partit`
--

LOCK TABLES `relacions_persona_partit` WRITE;
/*!40000 ALTER TABLE `relacions_persona_partit` DISABLE KEYS */;
INSERT INTO `relacions_persona_partit` VALUES (11,19,7,'Extresorer de CDC'),(12,28,9,'Diputat al Parlament de Catalunya (1980-1992)'),(13,29,9,'Alcalde de Santa Coloma de Gramenet (2002-2009)'),(14,30,7,'Secretari de la PresidÃ¨ncia de la Generalitat de Catalunya (1980-1990)'),(15,31,7,'Conseller de la Generalitat de Catalunya en els departaments de GovernaciÃ³ (1982-1986), d\'IndÃºstria i Energia (1987-1989), i d\'Economia i Finances (1989-1997)'),(16,32,9,'Regidor d\'Urbanisme i Espai PÃºblic de l\'Ajuntament de Santa Coloma de Gramenet (1995-2009)');
/*!40000 ALTER TABLE `relacions_persona_partit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19 13:52:28
