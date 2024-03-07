-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema dblocadora
--

CREATE DATABASE IF NOT EXISTS dblocadora;
USE dblocadora;

--
-- Definition of table `tbbanner`
--

DROP TABLE IF EXISTS `tbbanner`;
CREATE TABLE `tbbanner` (
  `idbanner` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) NOT NULL,
  `registro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idbanner`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbbanner`
--

/*!40000 ALTER TABLE `tbbanner` DISABLE KEYS */;
INSERT INTO `tbbanner` (`idbanner`,`foto`,`registro`,`alteraçao`,`status`) VALUES 
 (1,'nfs.jpg','2024-03-03 16:14:51','2024-03-03 16:14:51','A'),
 (2,'up.jpg','2024-03-03 16:14:51','2024-03-03 16:14:51','A'),
 (3,'zombie.jpg','2024-03-03 16:14:51','2024-03-03 16:14:51','A');
/*!40000 ALTER TABLE `tbbanner` ENABLE KEYS */;


--
-- Definition of table `tbfilme`
--

DROP TABLE IF EXISTS `tbfilme`;
CREATE TABLE `tbfilme` (
  `idfilme` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idgenero` int(10) unsigned NOT NULL,
  `nome` varchar(255) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `lançamento` int(10) unsigned NOT NULL,
  `duraçao` int(10) unsigned NOT NULL,
  `registro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idfilme`),
  KEY `FK_tbfilme_tbgenero` (`idgenero`),
  CONSTRAINT `FK_tbfilme_tbgenero` FOREIGN KEY (`idgenero`) REFERENCES `tbgenero` (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbfilme`
--

/*!40000 ALTER TABLE `tbfilme` DISABLE KEYS */;
INSERT INTO `tbfilme` (`idfilme`,`idgenero`,`nome`,`foto`,`lançamento`,`duraçao`,`registro`,`alteraçao`,`status`) VALUES 
 (1,1,'Kingsman: Serviço Secreto','kingsman.jpg',2015,129,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (2,1,'Need for Speed','nfs.jpg',2014,132,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (3,1,'V de Vingança','v.jpg',2005,132,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (4,1,'Duro de Matar','durasso.jpg',1988,132,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (5,2,'Sexta-Feira 13','json.jpg',1980,95,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (6,2,'A Hora do Pesadelo','grugues.jpg',1984,91,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (7,2,'O Massacre da Serra Elétrica','chainsaw.jpg',1974,83,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (8,2,'O Iluminado','iluminado.jpg',1980,82,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (9,3,'Simplesmente Acontece','acontece.jpg',2014,105,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (10,3,'Titanic','titanic.jpg',1997,195,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (11,3,'Dirty Dancing: Ritmo Quente','dirtyracing.jpg',1987,100,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (12,3,'Olhos de Gato','catEyes.jpg',2020,104,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (13,4,'As Branquelas','branquelas.jpg',2004,109,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (14,4,'Zumbilândia','zombie.jpg',2009,88,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (15,4,'Se Beber, não case!','beber.jpg',2009,100,'2024-03-03 14:52:01','2024-03-03 14:57:59','A'),
 (16,4,'Superbad - É Hoje!','superbad.jpg',2007,113,'2024-03-03 14:52:01','2024-03-03 14:57:59','A');
/*!40000 ALTER TABLE `tbfilme` ENABLE KEYS */;


--
-- Definition of table `tbgenero`
--

DROP TABLE IF EXISTS `tbgenero`;
CREATE TABLE `tbgenero` (
  `idgenero` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genero` varchar(10) NOT NULL,
  `registro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbgenero`
--

/*!40000 ALTER TABLE `tbgenero` DISABLE KEYS */;
INSERT INTO `tbgenero` (`idgenero`,`genero`,`registro`,`alteraçao`,`status`) VALUES 
 (1,'Ação','2024-03-03 14:24:37','2024-03-03 14:24:37','A'),
 (2,'Terror','2024-03-03 14:24:37','2024-03-03 14:24:37','A'),
 (3,'Romance','2024-03-03 14:24:37','2024-03-03 14:24:37','A'),
 (4,'Comédia ','2024-03-03 14:24:37','2024-03-03 14:24:37','A');
/*!40000 ALTER TABLE `tbgenero` ENABLE KEYS */;


--
-- Definition of table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE `tbusuario` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` enum('Adm','Usario','Cliente') NOT NULL DEFAULT 'Cliente',
  `nascimento` date NOT NULL,
  `cpf` int(10) unsigned NOT NULL,
  `registro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbusuario`
--

/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` (`idusuario`,`nome`,`email`,`senha`,`nivel`,`nascimento`,`cpf`,`registro`,`alteraçao`,`status`) VALUES 
 (1,'Miguel Salmen','mii@gmail.com','$2y$12$J6E/QG1HyWka9y4ND8uwn.V1aSYBprbysAA9fc6lvQg5Ql2cUEL5y','Cliente','2005-11-20',4294967295,'2024-03-06 10:33:09','2024-03-06 10:33:09','A'),
 (2,'carlinho','carlos@gmail.com','$2y$12$22AGlXuEwwKqFuNCMMAdDeP5ME0WyBT2O2rZ5FbvoMVP81o7rlfQS','Cliente','2005-11-20',4294967295,'2024-03-06 10:42:22','2024-03-06 10:42:22','A');
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
