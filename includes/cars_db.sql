/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.38-MariaDB : Database - cars_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cars_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `cars_db`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `adminID` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'administrator',
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`adminID`,`username`,`password`,`firstname`,`lastname`,`role`) values 
(1,'petar','12345','Petar','Simić','administrator');

/*Table structure for table `brand` */

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `brandID` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`brandID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `brand` */

insert  into `brand`(`brandID`,`name`) values 
(1,'Alfa Romeo'),
(2,'Audi'),
(3,'Bentley'),
(4,'BMW'),
(5,'Citroen'),
(6,'Fiat'),
(7,'Ford'),
(8,'Mercedes'),
(9,'Nissan'),
(10,'Peugeot'),
(11,'Renault'),
(12,'Toyota'),
(13,'Volkswagen');

/*Table structure for table `car` */

DROP TABLE IF EXISTS `car`;

CREATE TABLE `car` (
  `carID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `brandID` int(3) NOT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(6,2) NOT NULL,
  `addingDate` date NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'published',
  `views` int(10) NOT NULL,
  `owner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`carID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `car` */

insert  into `car`(`carID`,`name`,`description`,`brandID`,`address`,`image`,`price`,`addingDate`,`status`,`views`,`owner`,`phoneNumber`,`email`) values 
(1,'Audi A4 1.9 TDI (2005)','Emisiona klasa motora: Euro 3<br>\r\nPogon: Prednji<br>\r\nMenjac: Manuelni 5 brzina<br>\r\nBroj vrata: 4/5 vrata<br>\r\nBroj sedista: 5 sedista<br>\r\nStrana volana: Levi volan<br>\r\nKlima: Automatska klima<br>\r\nZemlja uvoza: Austrija<br>\r\n',2,'Tosin bunar 153','AudiA4.jpg',4890.00,'2019-07-04','published',0,'Pera','123123','pera@gmail.com'),
(2,'Audi A8 3.0 TDI (2008)','Emisiona klasa motora: Euro 3<br>\r\nPogon: 4x4<br>\r\nMenjac: Automatski<br>\r\nBroj vrata: 4/5 vrata<br>\r\nBroj sedista: 5 sedista<br>\r\nStrana volana: Levi volan<br>\r\nMaterijal enterijera Prirodna koza<br>\r\nPoreklo vozila: Domace tablice<br>',2,'Vojvode Stepe 12','AudiA8.jpg',9050.00,'2019-07-04','published',0,'Zika','321312','zika@yahoo.com'),
(3,'BMW 316 2.0 D (2016)','Emisiona klasa motora: Euro 6<br>\r\nPogon: Prednji<br>\r\nMenjac: Automatski<br>\r\nBroj vrata: 4/5 vrata<br>\r\nBroj sedista: 5 sedista<br>\r\nStrana volana: Levi volan<br>\r\nPoreklo vozila: Na ime kupca<br>\r\nOstecenje: Nije ostecen<br>\r\n',4,'Ivanke Muakovic 23','BMW316.jpg',9900.00,'2019-07-04','published',0,'Miki','666666','miki@samsvojgazda.com'),
(4,'Audi A3 1.8i (2001)','Emisiona klasa motora: Euro 4<br>\r\nPogon: Prednji<br>\r\nMenjac: Manuelni 5 brzina<br>\r\nBroj vrata: 2/3 vrata<br>\r\nBroj sedista: 5 sedista<br>\r\nStrana volana: Levi volan<br>\r\nRegistrovan do: Nije registrovan<br>\r\nPoreklo vozila: Na ime kupca<br>',2,'Jove Ilica 163','AudiA3.jpg',1699.00,'2019-07-04','published',0,'Laza','222222','laza@lazino.com'),
(5,'BMW X3 2.0 D (2007)','Emisiona klasa motora: Euro 4<br>\r\nPogon: 4x4<br>\r\nMenjac: Manuelni 6 brzina<br>\r\nBroj vrata: 4/5 vrata<br>\r\nBroj sedista: 5 sedista<br>\r\nStrana volana: Levi volan<br>\r\nRegistrovan do: Nije registrovan<br>\r\nZemlja uvoza: Italija<br>',4,'Omladinskih brigada 110','BMWX3.jpg',7000.00,'2019-07-01','published',1,'Zoki','321123','zoki@znalac.com'),
(6,'Fiat Grande Punto (2009)','Emisiona klasa motora: Euro 4<br>\r\nPogon: Prednji<br>\r\nMenjac: Manuelni 6 brzina<br>\r\nBroj vrata: 4/5 vrata<br>\r\nBroj sedista: 5 sedista<br>\r\nStrana volana: Levi volan<br>\r\nZemlja uvoza: Nemacka<br>',6,'Vojvode Stepe 3','Fiat.jpg',3350.00,'2019-05-14','published',4,'Ana','333333','ana@gmail.com'),
(7,'Ford Fiesta 1.3 (2003)','Emisiona klasa motora: Euro 3<br>\r\nPogon: Prednji<br>\r\nMenjac: Manuelni 5 brzina<br>\r\nBroj vrata: 4/5 vrata<br>\r\nBroj sedista: 5 sedista<br>\r\nStrana volana: Levi volan<br>\r\nBoja: Siva<br>',7,'Stepe Stepanovica 9','Ford.jpg',2000.00,'2019-04-16','published',34,'Jovo','123222','jovo@biznis.com'),
(8,'Volkswagen Golf 2 (1989)','Emisiona klasa motora: Euro 2<br>\r\nPogon: Prednji<br>\r\nMenjac: Manuelni 4 brzine<br>\r\nBroj vrata: 2/3 vrata<br>\r\nBroj sedista: 5 sedista<br>\r\nStrana volana: Levi volan<br>\r\nKlima: Otvori prozor<br>\r\nBoja: Bela<br>',13,'Narodnih heroja 13','Golf2.jpg',600.00,'2019-07-04','published',100,'Rale','123333','rale@laf.com');

/*Table structure for table `subscriber` */

DROP TABLE IF EXISTS `subscriber`;

CREATE TABLE `subscriber` (
  `subscriberID` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'subscriber',
  PRIMARY KEY (`subscriberID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `subscriber` */

insert  into `subscriber`(`subscriberID`,`firstname`,`lastname`,`username`,`password`,`email`,`phoneNumber`,`role`) values 
(1,'test','test','test','$2y$10$3.bcNZOo5Ek.ZQXolNTSkuLF.Sm9vensoR6S01','test1@gmail.com','123123123','subscriber'),
(2,'test1','test1','test1','$2y$10$zF3FBBH3yAFeifxy7cl1rOC7E0a6sQCs2OkjXD','test1@gmail.com','123123123','subscriber'),
(3,'t','t','t','$2y$10$e0MhqnMukSoFpMqXmQcUoORCSBcL.fcw1guZX9','test1@gmail.com','123','subscriber');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
