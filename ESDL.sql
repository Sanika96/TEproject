-- MySQL dump 10.13  Distrib 5.6.25, for osx10.8 (x86_64)
--
-- Host: localhost    Database: ESDL
-- ------------------------------------------------------
-- Server version	5.6.25

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
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_login` (
  `email_admin` varchar(20) DEFAULT NULL,
  `pass_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_login`
--

LOCK TABLES `admin_login` WRITE;
/*!40000 ALTER TABLE `admin_login` DISABLE KEYS */;
INSERT INTO `admin_login` VALUES ('akshaysatras','beta'),('karanshah','alpha'),('rajeevrajpurohit','gamma'),('saroshaga','omega');
/*!40000 ALTER TABLE `admin_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `uid` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `bday` int(2) DEFAULT NULL,
  `bmonth` varchar(10) DEFAULT NULL,
  `byear` int(2) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `mob` bigint(15) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `marital` varchar(8) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL,
  `pin` int(6) DEFAULT NULL,
  `nationality` varchar(7) DEFAULT NULL,
  `bgrp` varchar(3) DEFAULT NULL,
  `phy` varchar(4) DEFAULT NULL,
  `insure` varchar(30) DEFAULT NULL,
  `licence` varchar(30) DEFAULT NULL,
  `vnum` varchar(15) DEFAULT NULL,
  `qualification` varchar(60) DEFAULT NULL,
  `occu` varchar(20) DEFAULT NULL,
  `income` int(10) DEFAULT NULL,
  `bkname` varchar(50) DEFAULT NULL,
  `accNo` bigint(20) DEFAULT NULL,
  `crime` varchar(4) DEFAULT NULL,
  `cdetails` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (0001,'Ravina','Sangha',1,'June',1995,'raveenasangha42@gmail.com','topper2',8983315013,'Female','Single','Pune','Pune','Maharashtra',411006,'Indian','B+','No','56253','123222','MH12HE5331','Graduation/Equivalent certified Graduation','Service',56444,'Punjab National Bank',2311445672,'No','-'),(0002,'Zubair','Shaikh',14,'August',1995,'zsescape@gmail.com','topper3',123456,'Male','Single','Pune','Pune','Maharashtra',411001,'Indian','A+','No','8725','-','-','Post-Graduation/Equivalent certified Post-Graduation','Business',40000,'HDFC',1232144,'No','-'),(0003,'Rahul','Limgude',24,'August',1992,'limguderahul@gmail.com','unknown1',7654536259,'Male','Single','Pune','Pune','Maharashtra',411001,'Indian','B-','No','32133','-','-','HSC/Equivalent certified 12th','None',123123,'Union Bank',421233,'No','-'),(0004,'Priya','Thomas',9,'May',1996,'priyathomas@gmail.com','unknown2',9420202606,'Female','Single','Pune','Pune','Maharashtra',411001,'Indian','A+','No','45322','2144411233','MH12HE5344','SSC/Equivalent certified 10th','None',2000,'Bank of Baroda',12314555,'No','-'),(0005,'Rajesh','Ranshur',31,'May',1995,'ranshurrajesh@gmail.com','unknown3',6376487653,'Male','Single','Pune','Pune','Maharashtra',411001,'Indian','O+','No','09772','-','-','Post-Graduation/Equivalent certified Post-Graduation','Other',400981,'Bank of Baroda',76812635,'No','-'),(0006,'Vaibhav','Rahinj',-1,'-1',-1,'rnhinjvaibhav@yahoo.com','unknown4',8007733664,'Male','Single','Pune','Pune','Maharashtra',411001,'Indian','B+','No','928364','1234412','MH12KC1178','Graduation/Equivalent certified Graduation','None',122231,'Bank of Maharashtra',1234444221,'No','-'),(0007,'Shraddha','Shinde',16,'December',1992,'shindeshradhha@gmail.com','unknown5',7882765300,'Female','Single','Pune','Pune','Maharashtra',411001,'Indian','AB-','No','33122','-','-','Graduation/Equivalent certified Graduation','Business',500222,'Bank of Baroda',877338219,'No','-'),(0008,'Farheen','Sayed',1,'April',1995,'sayedfarheen@yahoo.com','unknown6',9812765333,'Female','Single','Pune','Pune','Maharashtra',411001,'Indian','B+','No','41233','-','-','Post-Graduation/Equivalent certified Post-Graduation','None',2000,'Axis Bank',12233312,'No','-'),(0009,'Shreya','Khandelwal',10,'August',1995,'shreya95@gmail.com','unknown7',9637724914,'Female','Single','Pune','Pune','Maharashtra',411001,'Indian','B+','No','121333444','765127612','MH12FS8910','HSC/Equivalent certified 12th','None',2000,'ICICI',12441211,'No','-'),(0010,'Meghana','Rao',16,'April',1995,'meghanaraohv@yahoo.co.in','unknown8',8055995770,'Female','Single','Pune','Pune','Maharashtra',411014,'Indian','O+','No','331233','7125372653','MH12FS2221','Graduation/Equivalent certified Graduation','None',420000,'Axis Bank',1234412313,'No','-'),(0011,'Pratik','Kadam',7,'December',1991,'kadamrox@gmail.com','criminal1',8009144449,'Male','Married','Naala Sopara','Mumbai','Maharashtra',400098,'Indian','B-','No','-','-','-','Other','Other',100000,'Saraswat Bank',776644362,'Yes','Car Robbery, Theft, Bank Robber'),(0012,'Rajiv','Rajpurohit',5,'January',1994,'arvindrajpurohit@rediffmail.com','topper4',9008723121,'Male','Single','Pune','Pune','Maharashtra',411001,'Indian','O+','No','112231','-','-','HSC/Equivalent certified 12th','Service',1123,'Union Bank',12313112,'No','-'),(0013,'Hitesh','Rathi',4,'February',1996,'h.rathi96@gmail.com','hrathi',8806916971,'Male','Single','abcd near pune','Pune','Maharashtra',411061,'Indian','O+','No','67893','612539','5070','SSC/Equivalent certified 10th','Service',100000,'HDFC',52302,'Yes','murder of akansh n sarosh aga'),(0014,'Kartik','Tiwari',7,'July',1994,'tiwarikartik@yahoo.com','hello1',833331772,'Male','Single','Pune','Pune','Maharashtra',411007,'Indian','AB+','No','-','-','-','HSC/Equivalent certified 12th','None',150000,'ICICI',12314333,'Yes','Robbery');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-28 19:12:02
