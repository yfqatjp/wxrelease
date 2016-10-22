/*
SQLyog Ultimate v9.62 
MySQL - 5.5.5-10.1.10-MariaDB : Database - school
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `alert` */

DROP TABLE IF EXISTS `alert`;

CREATE TABLE `alert` (
  `alertID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `noticeID` int(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `usertype` varchar(128) NOT NULL,
  PRIMARY KEY (`alertID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `alert` */

/*Table structure for table `attendance` */

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `attendanceID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`attendanceID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `attendance` */

insert  into `attendance`(`attendanceID`,`studentID`,`classesID`,`userID`,`usertype`,`monthyear`,`a1`,`a2`,`a3`,`a4`,`a5`,`a6`,`a7`,`a8`,`a9`,`a10`,`a11`,`a12`,`a13`,`a14`,`a15`,`a16`,`a17`,`a18`,`a19`,`a20`,`a21`,`a22`,`a23`,`a24`,`a25`,`a26`,`a27`,`a28`,`a29`,`a30`,`a31`) values (1,1,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(2,2,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(3,3,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(4,4,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(5,5,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(6,6,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(7,7,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(8,8,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(9,9,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(10,10,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(11,11,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(12,12,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(13,13,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(14,14,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(15,15,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(16,17,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(17,18,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(18,19,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(19,24,2,1,'Admin','05-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `automation_rec` */

DROP TABLE IF EXISTS `automation_rec`;

CREATE TABLE `automation_rec` (
  `automation_recID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  `nofmodule` int(11) NOT NULL,
  PRIMARY KEY (`automation_recID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `automation_rec` */

/*Table structure for table `automation_shudulu` */

DROP TABLE IF EXISTS `automation_shudulu`;

CREATE TABLE `automation_shudulu` (
  `automation_shuduluID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`automation_shuduluID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `automation_shudulu` */

insert  into `automation_shudulu`(`automation_shuduluID`,`date`,`day`,`month`,`year`) values (1,'2016-04-07','07','04',2016),(2,'2016-05-05','05','05',2016),(3,'2016-09-05','05','09',2016),(4,'2016-10-05','05','10',2016);

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `bookID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book` varchar(60) NOT NULL,
  `subject_code` tinytext NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `due_quantity` int(11) NOT NULL,
  `rack` tinytext NOT NULL,
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `book` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `categoryID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hostelID` int(11) NOT NULL,
  `class_type` varchar(60) NOT NULL,
  `hbalance` varchar(20) NOT NULL,
  `note` text,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `category` */

/*Table structure for table `classes` */

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `classesID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classes` varchar(60) NOT NULL,
  `classes_numeric` int(11) DEFAULT NULL,
  `teacherID` int(11) NOT NULL,
  `note` text,
  `amount` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `class_type` int(11) DEFAULT '0',
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`classesID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

/*Data for the table `classes` */

insert  into `classes`(`classesID`,`classes`,`classes_numeric`,`teacherID`,`note`,`amount`,`category`,`class_type`,`create_date`,`modify_date`,`create_userID`,`create_username`,`create_usertype`) values (1,'未报名学生',1,1,'未报名学生',40000,NULL,0,'2016-04-08 12:04:21','2016-05-08 01:27:40',1,'admin','Admin'),(16,'学部文科通年',NULL,0,'',500000,NULL,0,'2016-09-14 05:21:54','2016-09-28 05:06:22',1,'admin','Admin'),(20,'经营通年套餐',NULL,0,'',480000,NULL,0,'2016-09-22 09:08:50','2016-09-28 05:06:31',1,'admin','Admin'),(21,'经营安心套餐',NULL,0,'',560000,NULL,0,'2016-09-24 10:42:50','2016-09-28 05:07:11',14,'0','TeacherManager'),(22,'学部理科通年套餐',NULL,0,'',500000,NULL,0,'2016-09-24 10:45:36','2016-09-28 05:10:13',14,'0','TeacherManager'),(23,'经济通年套餐',NULL,0,'',480000,NULL,0,'2016-09-24 10:53:43','2016-09-28 10:38:07',14,'0','TeacherManager'),(24,'经济安心套餐',NULL,0,'',560000,NULL,0,'2016-09-24 10:55:27','2016-09-28 05:11:32',14,'0','TeacherManager'),(25,'学部文科通年定制套餐',NULL,0,'',700000,NULL,0,'2016-09-24 10:57:31','2016-09-28 05:10:54',14,'0','TeacherManager'),(26,'学部理科通年定制套餐',NULL,0,'',700000,NULL,0,'2016-09-24 11:02:29','2016-09-28 05:11:53',14,'0','TeacherManager'),(27,'大学院文学语言套餐（春季）',NULL,0,'',450000,NULL,0,'2016-09-24 11:10:33','2016-09-28 05:14:33',14,'0','TeacherManager'),(28,'大学院文学语言套餐（秋季）',NULL,0,'',450000,NULL,0,'2016-09-24 12:18:17','2016-09-28 05:14:59',14,'0','TeacherManager'),(29,'大学院政治社会语言套餐（春季）',NULL,0,'',450000,NULL,0,'2016-09-24 12:20:48','2016-09-28 05:15:59',14,'0','TeacherManager'),(30,'大学院政治社会语言套餐（秋季）',NULL,0,'',450000,NULL,0,'2016-09-24 12:21:39','2016-09-28 05:16:21',14,'0','TeacherManager'),(31,'大学院日本语教育语言套餐（春季）',NULL,0,'',450000,NULL,0,'2016-09-24 12:22:47','2016-09-28 05:16:50',14,'0','TeacherManager'),(32,'大学院日本语教育语言套餐（秋季）',NULL,0,'',450000,NULL,0,'2016-09-24 12:30:50','2016-09-28 05:17:13',14,'0','TeacherManager'),(33,'大学院新闻传播语言套餐（秋季）',NULL,0,'',450000,NULL,0,'2016-09-24 02:29:55','2016-09-28 05:19:17',14,'0','TeacherManager'),(34,'大学院新闻传播语言套餐（春季）',NULL,0,'',450000,NULL,0,'2016-09-24 02:31:52','2016-09-28 05:20:09',14,'0','TeacherManager'),(35,'大学院文学特色课套餐（春季）',NULL,0,'',550000,NULL,0,'2016-09-24 02:33:06','2016-09-24 02:33:06',14,'0','TeacherManager'),(36,'大学院文学特色课套餐（秋季）',NULL,0,'',550000,NULL,0,'2016-09-24 02:34:17','2016-09-24 02:34:17',14,'0','TeacherManager'),(37,'大学院政治社会特色课套餐（春季）',NULL,0,'',550000,NULL,0,'2016-09-24 02:35:46','2016-09-24 02:38:20',14,'0','TeacherManager'),(38,'大学院政治社会特色课套餐（秋季）',NULL,0,'',550000,NULL,0,'2016-09-24 02:39:46','2016-09-24 02:39:46',14,'0','TeacherManager'),(39,'大学院新闻传播特色课套餐（春季）',NULL,0,'',550000,NULL,0,'2016-09-24 02:46:15','2016-09-24 02:46:15',14,'0','TeacherManager'),(40,'大学院新闻传播特色课套餐（秋季）',NULL,0,'',550000,NULL,0,'2016-09-24 02:48:25','2016-09-24 02:48:25',14,'0','TeacherManager'),(41,'大学院日本语教育特色课套餐（春季）',NULL,0,'',550000,NULL,0,'2016-09-24 02:52:22','2016-09-24 02:54:44',14,'0','TeacherManager'),(42,'大学院特色课日本语教育特色课套餐（秋季）',NULL,0,'',550000,NULL,0,'2016-09-24 02:54:29','2016-09-24 02:54:29',14,'0','TeacherManager'),(43,'大学院文学通年套餐',NULL,0,'',700000,NULL,0,'2016-09-24 02:56:36','2016-09-28 08:24:19',14,'0','TeacherManager'),(44,'大学院政治社会通年套餐',NULL,0,'',700000,NULL,0,'2016-09-24 02:58:46','2016-09-28 08:24:03',14,'0','TeacherManager'),(45,'大学院日本语教育通年套餐',NULL,0,'',700000,NULL,0,'2016-09-24 03:00:53','2016-09-28 08:23:48',14,'0','TeacherManager'),(46,'大学院新闻传播通年套餐',NULL,0,'',700000,NULL,0,'2016-09-24 03:02:52','2016-09-28 08:23:31',14,'0','TeacherManager'),(47,'学部文科半年冲刺套餐',NULL,0,'',350000,NULL,0,'2016-09-24 03:19:42','2016-09-28 05:14:06',14,'0','TeacherManager'),(48,'学部理科半年冲刺套餐',NULL,0,'',350000,NULL,0,'2016-09-24 03:20:22','2016-09-28 05:13:44',14,'0','TeacherManager'),(49,'学部文科半年冲刺定制套餐',NULL,0,'',450000,NULL,0,'2016-09-24 03:22:23','2016-09-28 05:12:43',14,'0','TeacherManager'),(50,'学部理科半年定制冲刺套餐',NULL,0,'',450000,NULL,0,'2016-09-24 03:25:16','2016-09-28 05:12:25',14,'0','TeacherManager'),(51,'语言套餐',NULL,0,'',250000,NULL,0,'2016-09-24 04:34:08','2016-09-28 05:12:12',14,'0','TeacherManager');

/*Table structure for table `code` */

DROP TABLE IF EXISTS `code`;

CREATE TABLE `code` (
  `codeId` int(11) NOT NULL AUTO_INCREMENT,
  `codeName` varchar(270) DEFAULT NULL,
  `code` varchar(90) DEFAULT NULL,
  `codeValue` varchar(900) DEFAULT NULL,
  `loadFlag` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`codeId`),
  KEY `IX1` (`codeName`(255))
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

/*Data for the table `code` */

insert  into `code`(`codeId`,`codeName`,`code`,`codeValue`,`loadFlag`,`sort`) values (1,'studentCategory','1','学部文科',0,1),(2,'studentCategory','2','学部理科',0,2),(3,'studentCategory','3','大学与经营经济',0,3),(4,'studentCategory','4','大学院社会人文',0,4),(5,'studentPossibility','1','低',0,1),(6,'studentPossibility','2','中',0,2),(7,'studentPossibility','3','高',0,3),(8,'studentSource','1','自主咨询',0,1),(9,'studentSource','2','朋友介绍',0,2),(10,'studentSource','3','合作方推荐',0,3),(11,'studentSourcePartner','1','芥末网',0,1),(12,'studentSourcePartner','2','前程留学',0,1),(13,'tattendanceType','1','教学',0,1),(14,'tattendanceType','2','事务',0,2),(15,'studentCategory','5','艺术类',0,5),(16,'studentCategory','6','大学院理科',0,6),(17,'teacherType','Teacher','普通教师',0,1),(18,'paymentMethod','1','现金',0,1),(19,'paymentMethod','2','中国汇款',0,2),(20,'paymentMethod','3','日本汇款',0,3),(21,'paymentMethod','4','信用卡支付',0,4),(22,'paymentMethod','5','支付宝支付',0,5),(23,'paymentClass','1','减免学费',0,2),(24,'paymentClass','2','差额补充',0,3),(27,'wageType','3','固定 ＋ 时给',0,3),(28,'wageCalcStatus','1','未计算',0,1),(29,'wageCalcStatus','2','自动计算中',0,2),(30,'wageCalcStatus','3','自动计算完成',0,3),(31,'wageCalcStatus','4','没有任何出勤记录',0,4),(32,'wageCalcStatus','5','明细手动修改',0,5),(33,'wageCalcStatus','6','有未承认出勤',0,6),(34,'wageTypeDetail','1','事务',0,1),(35,'wageTypeDetail','2','教学',0,2),(36,'wageTypeDetail','3','VIP教学',0,3),(37,'wageTypeDetail','4','扣除',0,4),(38,'wageTypeDetail','99','基本给',0,99),(39,'teacherType','Salesman','销售',0,2),(40,'teacherType','Receptionist','事务',0,3),(41,'teacherType','TeacherManager','部门主管',0,4),(43,'setting','subjectGroup','课程群组',0,1),(44,'subjectGroup','1','测试1',1,NULL),(45,'subjectGroup','45','测试2',1,45),(46,'transportType','NO','没有交通费',0,1),(47,'transportType','CUSTOMIZE','自定义交通费',0,2),(48,'tattendanceType','3','VIP教学',0,3),(49,'wageTypeDetail','5','奖金',0,5),(50,'wageTypeDetail','999','交通费',0,999),(51,'subjectGroup','51','测试3',1,51),('52', 'paymentClass', '3', '普通缴费', '0', '1'),('53', 'setting', 'studentSource', '学员来源', '0', '2'),('54', 'setting', 'studentSourcePartner', '学生来源备注', '0', '3');

/*Table structure for table `course_details` */

DROP TABLE IF EXISTS `course_details`;

CREATE TABLE `course_details` (
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `subject_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`classesID`,`subjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `course_details` */

insert  into `course_details`(`classesID`,`subjectID`,`subject_name`) values (2,1,'语文'),(2,2,'郵送'),(2,3,'英语'),(3,1,'语文'),(3,2,'郵送'),(3,3,'英语'),(4,1,'语文'),(4,2,'郵送'),(5,1,'语文'),(5,2,'郵送'),(5,3,'英语'),(6,1,'语文'),(6,2,'郵送'),(7,5,'日语周一'),(7,6,'语文周一周三'),(8,5,'日语周一'),(8,6,'语文周一周三'),(9,5,'日语周一'),(10,5,'日语周一'),(10,6,'语文周一周三'),(10,7,'全面测试课程'),(11,5,'日语周一'),(11,6,'语文周一周三'),(11,7,'全面测试课程'),(12,5,'日语周一'),(13,5,'日语周一'),(13,6,'语文周一周三'),(14,5,'日语周一'),(14,6,'语文周一周三'),(14,7,'全面测试课程'),(15,8,'课程测试'),(16,9,'日语基础班 第一期'),(16,10,'日语基础班 第二期'),(16,11,'日语基础班 第三期'),(16,12,'英语教养班 第一期'),(16,13,'英语教养班 第二期'),(16,14,'英语教养班 第三期'),(16,18,'学部校内考课程'),(16,41,'日语留考对策班第一期'),(16,42,'日语留考对策班第二期'),(16,43,'学部文科基础班第一期'),(16,44,'学部文科基础班第二期'),(16,45,'学部文科基础班第三期'),(16,46,'学部文科留考对策班第一期'),(16,47,'学部文科留考对策班第二期'),(16,67,'英语托福班第一期'),(16,68,'英语托福班第二期'),(16,69,'日语N1冲刺班第一期'),(16,70,'日语N1冲刺班第二期'),(16,71,'通年词汇课程'),(17,22,'VIP 课程'),(18,22,'VIP 课程'),(19,15,'经营基础班'),(19,19,'日语进阶班 第一期'),(20,9,'日语基础班 第一期'),(20,10,'日语基础班 第二期'),(20,11,'日语基础班 第三期'),(20,12,'英语教养班 第一期'),(20,13,'英语教养班 第二期'),(20,14,'英语教养班 第三期'),(20,15,'经营基础班'),(20,19,'日语进阶班 第一期'),(20,20,'日语进阶班 第二期'),(20,21,'日语进阶班 第三期'),(20,23,'大学院经营春季专业课'),(20,24,'大学院经营秋季专业课'),(20,41,'日语留考对策班第一期'),(20,42,'日语留考对策班第二期'),(20,67,'英语托福班第一期'),(20,68,'英语托福班第二期'),(20,69,'日语N1冲刺班第一期'),(20,70,'日语N1冲刺班第二期'),(20,71,'通年词汇课程'),(21,9,'日语基础班 第一期'),(21,10,'日语基础班 第二期'),(21,11,'日语基础班 第三期'),(21,12,'英语教养班 第一期'),(21,13,'英语教养班 第二期'),(21,14,'英语教养班 第三期'),(21,15,'经营基础班'),(21,19,'日语进阶班 第一期'),(21,20,'日语进阶班 第二期'),(21,21,'日语进阶班 第三期'),(21,23,'大学院经营春季专业课'),(21,24,'大学院经营秋季专业课'),(21,41,'日语留考对策班第一期'),(21,42,'日语留考对策班第二期'),(21,67,'英语托福班第一期'),(21,68,'英语托福班第二期'),(21,69,'日语N1冲刺班第一期'),(21,70,'日语N1冲刺班第二期'),(21,71,'通年词汇课程'),(22,9,'日语基础班 第一期'),(22,10,'日语基础班 第二期'),(22,11,'日语基础班 第三期'),(22,12,'英语教养班 第一期'),(22,13,'英语教养班 第二期'),(22,14,'英语教养班 第三期'),(22,19,'日语进阶班 第一期'),(22,20,'日语进阶班 第二期'),(22,21,'日语进阶班 第三期'),(22,41,'日语留考对策班第一期'),(22,42,'日语留考对策班第二期'),(22,48,'学部理科基础班第一期'),(22,49,'学部理科基础班第二期'),(22,51,'学部理科留考对策班第一期'),(22,52,'学部理科留考对策班第二期'),(22,67,'英语托福班第一期'),(22,68,'英语托福班第二期'),(22,69,'日语N1冲刺班第一期'),(22,70,'日语N1冲刺班第二期'),(22,71,'通年词汇课程'),(23,9,'日语基础班 第一期'),(23,10,'日语基础班 第二期'),(23,11,'日语基础班 第三期'),(23,12,'英语教养班 第一期'),(23,13,'英语教养班 第二期'),(23,14,'英语教养班 第三期'),(23,19,'日语进阶班 第一期'),(23,20,'日语进阶班 第二期'),(23,21,'日语进阶班 第三期'),(23,27,'大学院经济春季专业课'),(23,28,'大学院经济秋季专业课'),(23,41,'日语留考对策班第一期'),(23,42,'日语留考对策班第二期'),(23,67,'英语托福班第一期'),(23,68,'英语托福班第二期'),(23,69,'日语N1冲刺班第一期'),(23,70,'日语N1冲刺班第二期'),(23,71,'通年词汇课程'),(24,9,'日语基础班 第一期'),(24,10,'日语基础班 第二期'),(24,11,'日语基础班 第三期'),(24,12,'英语教养班 第一期'),(24,13,'英语教养班 第二期'),(24,14,'英语教养班 第三期'),(24,19,'日语进阶班 第一期'),(24,20,'日语进阶班 第二期'),(24,21,'日语进阶班 第三期'),(24,27,'大学院经济春季专业课'),(24,28,'大学院经济秋季专业课'),(24,41,'日语留考对策班第一期'),(24,42,'日语留考对策班第二期'),(24,67,'英语托福班第一期'),(24,68,'英语托福班第二期'),(24,69,'日语N1冲刺班第一期'),(24,70,'日语N1冲刺班第二期'),(24,71,'通年词汇课程'),(25,9,'日语基础班 第一期'),(25,10,'日语基础班 第二期'),(25,11,'日语基础班 第三期'),(25,12,'英语教养班 第一期'),(25,13,'英语教养班 第二期'),(25,14,'英语教养班 第三期'),(25,18,'学部校内考课程'),(25,19,'日语进阶班 第一期'),(25,20,'日语进阶班 第二期'),(25,21,'日语进阶班 第三期'),(25,22,'学部VIP 课程'),(25,41,'日语留考对策班第一期'),(25,42,'日语留考对策班第二期'),(25,43,'学部文科基础班第一期'),(25,44,'学部文科基础班第二期'),(25,45,'学部文科基础班第三期'),(25,46,'学部文科留考对策班第一期'),(25,47,'学部文科留考对策班第二期'),(25,67,'英语托福班第一期'),(25,68,'英语托福班第二期'),(25,69,'日语N1冲刺班第一期'),(25,70,'日语N1冲刺班第二期'),(25,71,'通年词汇课程'),(26,9,'日语基础班 第一期'),(26,10,'日语基础班 第二期'),(26,11,'日语基础班 第三期'),(26,12,'英语教养班 第一期'),(26,13,'英语教养班 第二期'),(26,14,'英语教养班 第三期'),(26,19,'日语进阶班 第一期'),(26,20,'日语进阶班 第二期'),(26,21,'日语进阶班 第三期'),(26,22,'学部VIP 课程'),(26,41,'日语留考对策班第一期'),(26,42,'日语留考对策班第二期'),(26,45,'学部文科基础班第三期'),(26,48,'学部理科基础班第一期'),(26,49,'学部理科基础班第二期'),(26,51,'学部理科留考对策班第一期'),(26,52,'学部理科留考对策班第二期'),(26,67,'英语托福班第一期'),(26,68,'英语托福班第二期'),(26,69,'日语N1冲刺班第一期'),(26,70,'日语N1冲刺班第二期'),(26,71,'通年词汇课程'),(27,9,'日语基础班 第一期'),(27,12,'英语教养班 第一期'),(27,19,'日语进阶班 第一期'),(27,33,'大学院文学春季班'),(27,41,'日语留考对策班第一期'),(27,67,'英语托福班第一期'),(27,69,'日语N1冲刺班第一期'),(27,70,'日语N1冲刺班第二期'),(27,71,'通年词汇课程'),(28,10,'日语基础班 第二期'),(28,13,'英语教养班 第二期'),(28,20,'日语进阶班 第二期'),(28,34,'大学院文学秋季班'),(28,42,'日语留考对策班第二期'),(28,68,'英语托福班第二期'),(28,69,'日语N1冲刺班第一期'),(28,70,'日语N1冲刺班第二期'),(28,71,'通年词汇课程'),(29,9,'日语基础班 第一期'),(29,12,'英语教养班 第一期'),(29,19,'日语进阶班 第一期'),(29,37,'大学院政治社会春季班'),(29,41,'日语留考对策班第一期'),(29,67,'英语托福班第一期'),(29,69,'日语N1冲刺班第一期'),(29,70,'日语N1冲刺班第二期'),(29,71,'通年词汇课程'),(30,10,'日语基础班 第二期'),(30,13,'英语教养班 第二期'),(30,20,'日语进阶班 第二期'),(30,40,'大学院政治社会秋季班'),(30,41,'日语留考对策班第一期'),(30,68,'英语托福班第二期'),(30,69,'日语N1冲刺班第一期'),(30,70,'日语N1冲刺班第二期'),(30,71,'通年词汇课程'),(31,9,'日语基础班 第一期'),(31,12,'英语教养班 第一期'),(31,19,'日语进阶班 第一期'),(31,38,'大学院日本语教育春季班'),(31,41,'日语留考对策班第一期'),(31,67,'英语托福班第一期'),(31,69,'日语N1冲刺班第一期'),(31,70,'日语N1冲刺班第二期'),(31,71,'通年词汇课程'),(32,10,'日语基础班 第二期'),(32,13,'英语教养班 第二期'),(32,20,'日语进阶班 第二期'),(32,39,'大学院日本语教育秋季班'),(32,42,'日语留考对策班第二期'),(32,68,'英语托福班第二期'),(32,69,'日语N1冲刺班第一期'),(32,70,'日语N1冲刺班第二期'),(32,71,'通年词汇课程'),(33,10,'日语基础班 第二期'),(33,13,'英语教养班 第二期'),(33,20,'日语进阶班 第二期'),(33,36,'大学院新闻传播秋季班'),(33,44,'学部文科基础班第二期'),(33,68,'英语托福班第二期'),(33,69,'日语N1冲刺班第一期'),(33,70,'日语N1冲刺班第二期'),(33,71,'通年词汇课程'),(34,9,'日语基础班 第一期'),(34,12,'英语教养班 第一期'),(34,19,'日语进阶班 第一期'),(34,35,'大学院新闻传播春季班'),(34,41,'日语留考对策班第一期'),(34,67,'英语托福班第一期'),(34,69,'日语N1冲刺班第一期'),(34,70,'日语N1冲刺班第二期'),(34,71,'通年词汇课程'),(35,29,'大学院特色课学术口语'),(35,30,'大学院特色课学术小论文'),(35,31,'大学院特色课英译日'),(35,32,'大学院特色课特色讲义'),(35,33,'大学院文学春季班'),(36,29,'大学院特色课学术口语'),(36,30,'大学院特色课学术小论文'),(36,31,'大学院特色课英译日'),(36,32,'大学院特色课特色讲义'),(36,34,'大学院文学秋季班'),(37,29,'大学院特色课学术口语'),(37,30,'大学院特色课学术小论文'),(37,31,'大学院特色课英译日'),(37,32,'大学院特色课特色讲义'),(37,37,'大学院政治社会春季班'),(38,29,'大学院特色课学术口语'),(38,30,'大学院特色课学术小论文'),(38,31,'大学院特色课英译日'),(38,32,'大学院特色课特色讲义'),(38,40,'大学院政治社会秋季班'),(39,29,'大学院特色课学术口语'),(39,30,'大学院特色课学术小论文'),(39,31,'大学院特色课英译日'),(39,32,'大学院特色课特色讲义'),(39,35,'大学院新闻传播春季班'),(40,29,'大学院特色课学术口语'),(40,30,'大学院特色课学术小论文'),(40,31,'大学院特色课英译日'),(40,32,'大学院特色课特色讲义'),(40,36,'大学院新闻传播秋季班'),(41,29,'大学院特色课学术口语'),(41,30,'大学院特色课学术小论文'),(41,31,'大学院特色课英译日'),(41,32,'大学院特色课特色讲义'),(41,38,'大学院日本语教育春季班'),(42,29,'大学院特色课学术口语'),(42,30,'大学院特色课学术小论文'),(42,31,'大学院特色课英译日'),(42,32,'大学院特色课特色讲义'),(42,39,'大学院日本语教育秋季班'),(43,9,'日语基础班 第一期'),(43,10,'日语基础班 第二期'),(43,11,'日语基础班 第三期'),(43,12,'英语教养班 第一期'),(43,13,'英语教养班 第二期'),(43,14,'英语教养班 第三期'),(43,19,'日语进阶班 第一期'),(43,20,'日语进阶班 第二期'),(43,21,'日语进阶班 第三期'),(43,29,'大学院特色课学术口语'),(43,30,'大学院特色课学术小论文'),(43,31,'大学院特色课英译日'),(43,32,'大学院特色课特色讲义'),(43,33,'大学院文学春季班'),(43,34,'大学院文学秋季班'),(43,41,'日语留考对策班第一期'),(43,42,'日语留考对策班第二期'),(43,67,'英语托福班第一期'),(43,68,'英语托福班第二期'),(43,69,'日语N1冲刺班第一期'),(43,70,'日语N1冲刺班第二期'),(43,71,'通年词汇课程'),(44,9,'日语基础班 第一期'),(44,10,'日语基础班 第二期'),(44,11,'日语基础班 第三期'),(44,12,'英语教养班 第一期'),(44,13,'英语教养班 第二期'),(44,14,'英语教养班 第三期'),(44,19,'日语进阶班 第一期'),(44,20,'日语进阶班 第二期'),(44,21,'日语进阶班 第三期'),(44,37,'大学院政治社会春季班'),(44,40,'大学院政治社会秋季班'),(44,41,'日语留考对策班第一期'),(44,42,'日语留考对策班第二期'),(44,67,'英语托福班第一期'),(44,68,'英语托福班第二期'),(44,69,'日语N1冲刺班第一期'),(44,70,'日语N1冲刺班第二期'),(44,71,'通年词汇课程'),(45,9,'日语基础班 第一期'),(45,10,'日语基础班 第二期'),(45,11,'日语基础班 第三期'),(45,12,'英语教养班 第一期'),(45,13,'英语教养班 第二期'),(45,14,'英语教养班 第三期'),(45,19,'日语进阶班 第一期'),(45,20,'日语进阶班 第二期'),(45,21,'日语进阶班 第三期'),(45,38,'大学院日本语教育春季班'),(45,39,'大学院日本语教育秋季班'),(45,41,'日语留考对策班第一期'),(45,42,'日语留考对策班第二期'),(45,67,'英语托福班第一期'),(45,68,'英语托福班第二期'),(45,69,'日语N1冲刺班第一期'),(45,70,'日语N1冲刺班第二期'),(45,71,'通年词汇课程'),(46,9,'日语基础班 第一期'),(46,10,'日语基础班 第二期'),(46,11,'日语基础班 第三期'),(46,12,'英语教养班 第一期'),(46,13,'英语教养班 第二期'),(46,14,'英语教养班 第三期'),(46,19,'日语进阶班 第一期'),(46,20,'日语进阶班 第二期'),(46,21,'日语进阶班 第三期'),(46,35,'大学院新闻传播春季班'),(46,36,'大学院新闻传播秋季班'),(46,41,'日语留考对策班第一期'),(46,42,'日语留考对策班第二期'),(46,67,'英语托福班第一期'),(46,68,'英语托福班第二期'),(46,69,'日语N1冲刺班第一期'),(46,70,'日语N1冲刺班第二期'),(46,71,'通年词汇课程'),(47,9,'日语基础班 第一期'),(47,12,'英语教养班 第一期'),(47,18,'学部校内考课程'),(47,19,'日语进阶班 第一期'),(47,41,'日语留考对策班第一期'),(47,46,'学部文科留考对策班第一期'),(47,67,'英语托福班第一期'),(47,69,'日语N1冲刺班第一期'),(47,71,'通年词汇课程'),(48,9,'日语基础班 第一期'),(48,12,'英语教养班 第一期'),(48,18,'学部校内考课程'),(48,19,'日语进阶班 第一期'),(48,41,'日语留考对策班第一期'),(48,48,'学部理科基础班第一期'),(48,51,'学部理科留考对策班第一期'),(48,67,'英语托福班第一期'),(48,69,'日语N1冲刺班第一期'),(48,71,'通年词汇课程'),(49,9,'日语基础班 第一期'),(49,12,'英语教养班 第一期'),(49,18,'学部校内考课程'),(49,19,'日语进阶班 第一期'),(49,22,'学部VIP 课程'),(49,43,'学部文科基础班第一期'),(49,46,'学部文科留考对策班第一期'),(49,67,'英语托福班第一期'),(49,69,'日语N1冲刺班第一期'),(49,71,'通年词汇课程'),(50,9,'日语基础班 第一期'),(50,12,'英语教养班 第一期'),(50,18,'学部校内考课程'),(50,19,'日语进阶班 第一期'),(50,22,'学部VIP 课程'),(50,48,'学部理科基础班第一期'),(50,51,'学部理科留考对策班第一期'),(50,67,'英语托福班第一期'),(50,69,'日语N1冲刺班第一期'),(50,71,'通年词汇课程'),(51,9,'日语基础班 第一期'),(51,10,'日语基础班 第二期'),(51,11,'日语基础班 第三期'),(51,12,'英语教养班 第一期'),(51,13,'英语教养班 第二期'),(51,14,'英语教养班 第三期'),(51,19,'日语进阶班 第一期'),(51,20,'日语进阶班 第二期'),(51,21,'日语进阶班 第三期'),(51,41,'日语留考对策班第一期'),(51,42,'日语留考对策班第二期'),(51,67,'英语托福班第一期'),(51,68,'英语托福班第二期'),(51,69,'日语N1冲刺班第一期'),(51,70,'日语N1冲刺班第二期'),(51,71,'通年词汇课程');

/*Table structure for table `eattendance` */

DROP TABLE IF EXISTS `eattendance`;

CREATE TABLE `eattendance` (
  `eattendanceID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `examID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `date` date NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `s_name` varchar(60) DEFAULT NULL,
  `eattendance` varchar(20) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `eextra` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`eattendanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `eattendance` */

/*Table structure for table `evaluation` */

DROP TABLE IF EXISTS `evaluation`;

CREATE TABLE `evaluation` (
  `evaluationID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `student` varchar(128) DEFAULT NULL,
  `evaluation` text NOT NULL,
  `createusername` varchar(30) NOT NULL,
  `create_date` date NOT NULL,
  `modify_date` date NOT NULL,
  PRIMARY KEY (`evaluationID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

/*Data for the table `evaluation` */

insert  into `evaluation`(`evaluationID`,`studentID`,`student`,`evaluation`,`createusername`,`create_date`,`modify_date`) values (31,15,'','てsつぇ','管理员','2016-05-15','2016-05-15'),(32,14,'','hdfghdfgｈ','管理员','2016-05-15','2016-05-15'),(33,14,'','ふぁsdあ','管理员','2016-05-15','2016-05-15'),(34,8,'','がdsがsdfあ','管理员','2016-05-15','2016-05-15'),(35,13,'','噶敢发誓','管理员','2016-05-15','2016-05-15'),(36,18,'','评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价评价','管理员','2016-05-15','2016-05-15'),(37,25,'','发生大方法反反复复','管理员','2016-05-15','2016-05-15'),(39,10,'','てて','管理员','2016-05-15','2016-05-15'),(41,1,'','eeeeee','管理员','2016-05-21','2016-05-21'),(42,19,'','uuuu','管理员','2016-05-26','2016-05-26'),(43,26,'','灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌','管理员','2016-09-06','2016-09-06'),(44,25,'','嘎嘎嘎嘎嘎嘎灌灌灌灌灌和哈哈哈哈哈哈哈哈哈哈哈哈和哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈和','管理员','2016-09-06','2016-09-06'),(45,27,'','大大大滴滴答答','管理员','2016-09-07','2016-09-07'),(46,28,'','评价测试111111111111111111111111111111','管理员','2016-09-09','2016-09-09'),(47,28,'','评价测试222222222','管理员','2016-09-09','2016-09-09'),(48,30,'','福福福福福福福福福','管理员','2016-09-09','2016-09-09'),(49,30,'','福福福福福福福福福','管理员','2016-09-09','2016-09-09'),(50,32,'','第一次来咨询','管理员','2016-09-14','2016-09-14'),(51,33,'','dsdsdsdsdsd','管理员','2016-09-14','2016-09-14'),(52,33,'','第二次来咨询 报名意向不大','管理员','2016-09-14','2016-09-14'),(53,34,'','fff','管理员','2016-09-20','2016-09-20'),(54,35,'','事务测试fdfdsf','事务测试','2016-09-20','2016-09-20');

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `eventID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fdate` date NOT NULL,
  `ftime` time NOT NULL,
  `tdate` date NOT NULL,
  `ttime` time NOT NULL,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `event` */

insert  into `event`(`eventID`,`fdate`,`ftime`,`tdate`,`ttime`,`title`,`details`,`photo`,`create_date`) values (1,'2016-04-08','00:00:00','2016-04-09','00:00:00','测试测试','测试测试','holiday.png','2016-04-08 18:36:24');

/*Table structure for table `eventcounter` */

DROP TABLE IF EXISTS `eventcounter`;

CREATE TABLE `eventcounter` (
  `eventcounterID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eventID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventcounterID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `eventcounter` */

insert  into `eventcounter`(`eventcounterID`,`eventID`,`username`,`type`,`name`,`photo`,`status`,`create_date`) values (1,1,'admin','Admin','admin','defualt.png',1,'2016-04-10 19:58:14'),(2,1,'xuesheng','Student','学生测试','defualt.png',0,'2016-04-10 20:00:12');

/*Table structure for table `exam` */

DROP TABLE IF EXISTS `exam`;

CREATE TABLE `exam` (
  `examID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `exam` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `note` text,
  PRIMARY KEY (`examID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `exam` */

insert  into `exam`(`examID`,`exam`,`date`,`note`) values (1,'考试','2016-04-12','');

/*Table structure for table `examschedule` */

DROP TABLE IF EXISTS `examschedule`;

CREATE TABLE `examschedule` (
  `examscheduleID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `examID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `edate` date NOT NULL,
  `examfrom` varchar(10) NOT NULL,
  `examto` varchar(10) NOT NULL,
  `room` tinytext,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`examscheduleID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `examschedule` */

insert  into `examschedule`(`examscheduleID`,`examID`,`classesID`,`sectionID`,`subjectID`,`edate`,`examfrom`,`examto`,`room`,`year`) values (1,1,1,1,1,'2016-04-08','9:30 AM','9:30 AM','',2016);

/*Table structure for table `expense` */

DROP TABLE IF EXISTS `expense`;

CREATE TABLE `expense` (
  `expenseID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `create_date` date NOT NULL,
  `date` date NOT NULL,
  `expense` varchar(128) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `expenseyear` year(4) NOT NULL,
  `note` text,
  PRIMARY KEY (`expenseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `expense` */

/*Table structure for table `feetype` */

DROP TABLE IF EXISTS `feetype`;

CREATE TABLE `feetype` (
  `feetypeID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `feetype` varchar(60) NOT NULL,
  `note` text,
  PRIMARY KEY (`feetypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `feetype` */

insert  into `feetype`(`feetypeID`,`feetype`,`note`) values (1,'学费','学费');

/*Table structure for table `grade` */

DROP TABLE IF EXISTS `grade`;

CREATE TABLE `grade` (
  `gradeID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `grade` varchar(60) NOT NULL,
  `point` varchar(11) NOT NULL,
  `gradefrom` int(11) NOT NULL,
  `gradeupto` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`gradeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `grade` */

/*Table structure for table `hmember` */

DROP TABLE IF EXISTS `hmember`;

CREATE TABLE `hmember` (
  `hmemberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hostelID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `hbalance` varchar(20) DEFAULT NULL,
  `hjoindate` date NOT NULL,
  PRIMARY KEY (`hmemberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `hmember` */

/*Table structure for table `holiday` */

DROP TABLE IF EXISTS `holiday`;

CREATE TABLE `holiday` (
  `holidayID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fdate` date NOT NULL,
  `tdate` date NOT NULL,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`holidayID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `holiday` */

/*Table structure for table `hostel` */

DROP TABLE IF EXISTS `hostel`;

CREATE TABLE `hostel` (
  `hostelID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `htype` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text,
  PRIMARY KEY (`hostelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `hostel` */

/*Table structure for table `ini_config` */

DROP TABLE IF EXISTS `ini_config`;

CREATE TABLE `ini_config` (
  `configID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`configID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `ini_config` */

insert  into `ini_config`(`configID`,`type`,`config_key`,`value`) values (1,'paypal','paypal_api_username',''),(2,'paypal','paypal_api_password',''),(3,'paypal','paypal_api_signature',''),(4,'paypal','paypal_email',''),(5,'paypal','paypal_demo',''),(6,'stripe','stripe_private_key',''),(7,'stripe','stripe_public_key','');

/*Table structure for table `invoice` */

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `invoiceID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classesID` int(11) NOT NULL,
  `classes` varchar(128) NOT NULL,
  `studentID` int(11) NOT NULL,
  `student` varchar(128) NOT NULL,
  `roll` varchar(128) NOT NULL,
  `feetype` varchar(128) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `paidamount` varchar(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  `uname` varchar(60) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `paymenttype` varchar(128) DEFAULT NULL,
  `date` date NOT NULL,
  `paiddate` date DEFAULT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`invoiceID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

/*Data for the table `invoice` */

insert  into `invoice`(`invoiceID`,`classesID`,`classes`,`studentID`,`student`,`roll`,`feetype`,`amount`,`paidamount`,`userID`,`usertype`,`uname`,`status`,`paymenttype`,`date`,`paiddate`,`year`) values (29,15,'套餐测试',30,'姓名','0','学费','300000','80270',1,'Admin','管理员',1,'Cash','2016-09-09','2016-09-14',2016),(30,16,'学部文科通年',31,'姜玉佩','0','学费','500000','500000',1,'Admin','管理员',2,'Cash','2016-09-14','2016-09-14',2016),(31,17,'自定义套餐',32,'窦宏运','0','学费','160000','100000',1,'Admin','管理员',1,'Cash','2016-09-14','2016-09-14',2016),(32,18,'自定义套餐',33,'徐晨','0','学费','200000',NULL,NULL,NULL,NULL,0,NULL,'2016-09-16',NULL,2016),(33,19,'自定义套餐',35,'事务创建','0','学费','80000',NULL,NULL,NULL,NULL,0,NULL,'2016-09-20',NULL,2016),(34,16,'学部文科通年',36,'葛伟','0','学费','500000',NULL,NULL,NULL,NULL,0,NULL,'2016-09-22',NULL,2016),(35,20,'经营经济通年套餐',37,'李旭','0','学费','480000','250000',1,'Admin','管理员',1,'现金','2016-09-22','2016-09-22',2016),(36,23,'经济通年套餐',38,'王岚','0','学费','480000',NULL,NULL,NULL,NULL,0,NULL,'2016-09-28',NULL,2016),(37,28,'大学院文学语言套餐（秋季）',39,'林博翰','0','学费','450000','450000',1,'Admin','管理员',2,'现金','2016-09-28','2016-09-28',2016),(38,47,'学部文科半年冲刺套餐',40,'刘子涵','0','学费','350000','350000',1,'Admin','管理员',2,'现金','2016-09-28','2016-09-28',2016);

/*Table structure for table `issue` */

DROP TABLE IF EXISTS `issue`;

CREATE TABLE `issue` (
  `issueID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lID` varchar(128) NOT NULL,
  `bookID` int(11) NOT NULL,
  `book` varchar(60) NOT NULL,
  `author` varchar(100) NOT NULL,
  `serial_no` varchar(40) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `fine` varchar(11) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`issueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `issue` */

/*Table structure for table `leaveapp` */

DROP TABLE IF EXISTS `leaveapp`;

CREATE TABLE `leaveapp` (
  `leaveID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fdate` date NOT NULL,
  `tdate` date NOT NULL,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  `tousername` varchar(40) NOT NULL,
  `fromusername` varchar(40) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`leaveID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `leaveapp` */

/*Table structure for table `lmember` */

DROP TABLE IF EXISTS `lmember`;

CREATE TABLE `lmember` (
  `lmemberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lID` varchar(40) NOT NULL,
  `studentID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `lbalance` varchar(20) DEFAULT NULL,
  `ljoindate` date NOT NULL,
  PRIMARY KEY (`lmemberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lmember` */

/*Table structure for table `mailandsms` */

DROP TABLE IF EXISTS `mailandsms`;

CREATE TABLE `mailandsms` (
  `mailandsmsID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`mailandsmsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mailandsms` */

/*Table structure for table `mailandsmstemplate` */

DROP TABLE IF EXISTS `mailandsmstemplate`;

CREATE TABLE `mailandsmstemplate` (
  `mailandsmstemplateID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `user` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `template` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mailandsmstemplateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mailandsmstemplate` */

/*Table structure for table `mailandsmstemplatetag` */

DROP TABLE IF EXISTS `mailandsmstemplatetag`;

CREATE TABLE `mailandsmstemplatetag` (
  `mailandsmstemplatetagID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usersID` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `tagname` varchar(128) NOT NULL,
  `mailandsmstemplatetag_extra` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mailandsmstemplatetagID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

/*Data for the table `mailandsmstemplatetag` */

insert  into `mailandsmstemplatetag`(`mailandsmstemplatetagID`,`usersID`,`name`,`tagname`,`mailandsmstemplatetag_extra`,`create_date`) values (1,1,'student','[student_name]',NULL,'2015-07-01 20:44:10'),(2,1,'student','[student_class]',NULL,'2015-07-01 20:43:56'),(3,1,'student','[student_roll]',NULL,'2015-07-01 20:44:21'),(4,1,'student','[student_dob]',NULL,'2015-07-01 20:45:24'),(5,1,'student','[student_gender]',NULL,'2015-07-01 20:47:01'),(6,1,'student','[student_religion]',NULL,'2015-07-01 20:47:01'),(7,1,'student','[student_email]',NULL,'2015-07-01 20:47:40'),(8,1,'student','[student_phone]',NULL,'2015-07-01 20:47:40'),(9,1,'student','[student_section]',NULL,'2015-07-01 20:48:47'),(10,1,'student','[student_username]',NULL,'2015-07-01 20:48:47'),(11,2,'parents','[guardian_name]',NULL,'2015-07-07 12:09:16'),(12,2,'parents','[father\'s_name]',NULL,'2015-07-07 12:11:42'),(13,2,'parents','[mother\'s_name]',NULL,'2015-07-07 12:11:42'),(14,2,'parents','[father\'s_profession]',NULL,'2015-07-07 12:14:32'),(15,2,'parents','[mother\'s_profession]',NULL,'2015-07-07 12:14:32'),(16,2,'parents','[parents_email]',NULL,'2015-07-07 12:20:37'),(17,2,'parents','[parents_phone]',NULL,'2015-07-07 12:20:44'),(18,2,'parents','[parents_address]',NULL,'2015-07-07 12:20:53'),(19,2,'parents','[parents_username]',NULL,'2015-07-07 12:21:00'),(20,3,'teacher','[teacher_name]\r\n',NULL,'2015-07-07 12:41:13'),(21,3,'teacher','[teacher_designation]',NULL,'2015-07-07 12:41:13'),(22,3,'teacher','[teacher_dob]',NULL,'2015-07-07 12:41:13'),(23,3,'teacher','[teacher_gender]',NULL,'2015-07-07 12:41:13'),(24,3,'teacher','[teacher_religion]',NULL,'2015-07-07 12:41:13'),(25,3,'teacher','[teacher_email]',NULL,'2015-07-07 12:41:13'),(26,3,'teacher','[teacher_phone]\r\n',NULL,'2015-07-07 12:41:13'),(27,3,'teacher','[teacher_address]',NULL,'2015-07-07 12:41:13'),(28,3,'teacher','[teacher_jod]',NULL,'2015-07-07 14:25:07'),(29,3,'teacher','[teacher_username]',NULL,'2015-07-07 12:41:13'),(30,4,'librarian','[librarian_name]',NULL,'2015-07-07 13:05:44'),(31,4,'librarian','[librarian_dob]',NULL,'2015-07-07 13:05:48'),(32,4,'librarian','[librarian_gender]',NULL,'2015-07-07 13:05:52'),(33,4,'librarian','[librarian_religion]',NULL,'2015-07-07 13:05:55'),(34,4,'librarian','[librarian_email]',NULL,'2015-07-07 13:05:59'),(35,4,'librarian','[librarian_phone]',NULL,'2015-07-07 13:06:20'),(36,4,'librarian','[librarian_address]',NULL,'2015-07-07 13:06:27'),(37,4,'librarian','[librarian_jod]',NULL,'2015-07-07 14:25:17'),(38,4,'librarian','[librarian_username]',NULL,'2015-07-07 13:06:36'),(39,5,'accountant','[accountant_name]',NULL,'2015-07-07 13:06:59'),(40,5,'accountant','[accountant_dob]',NULL,'2015-07-07 13:07:02'),(41,5,'accountant','[accountant_gender]',NULL,'2015-07-07 13:07:04'),(42,5,'accountant','[accountant_religion]',NULL,'2015-07-07 13:07:07'),(43,5,'accountant','[accountant_email]',NULL,'2015-07-07 13:07:10'),(44,5,'accountant','[accountant_phone]',NULL,'2015-07-07 13:07:13'),(45,5,'accountant','[accountant_address]',NULL,'2015-07-07 13:07:15'),(46,5,'accountant','[accountant_jod]',NULL,'2015-07-07 14:25:24'),(47,5,'accountant','[accountant_username]',NULL,'2015-07-07 13:07:21'),(48,1,'student','[student_result_table]',NULL,'2015-09-09 06:24:29');

/*Table structure for table `mark` */

DROP TABLE IF EXISTS `mark`;

CREATE TABLE `mark` (
  `markID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `examID` int(11) NOT NULL,
  `exam` varchar(60) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`markID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `mark` */

insert  into `mark`(`markID`,`examID`,`exam`,`studentID`,`classesID`,`subjectID`,`subject`,`mark`,`year`) values (1,1,'考试',1,1,1,'语文',100,2016);

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `mediaID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `mcategoryID` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL,
  `file_name_display` varchar(255) NOT NULL,
  PRIMARY KEY (`mediaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `media` */

/*Table structure for table `media_category` */

DROP TABLE IF EXISTS `media_category`;

CREATE TABLE `media_category` (
  `mcategoryID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mcategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `media_category` */

/*Table structure for table `media_share` */

DROP TABLE IF EXISTS `media_share`;

CREATE TABLE `media_share` (
  `shareID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classesID` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  `file_or_folder` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`shareID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `media_share` */

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `messageID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `receiverType` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `attach` text,
  `attach_file_name` text,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `useremail` varchar(40) NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read_status` tinyint(1) NOT NULL,
  `from_status` int(11) NOT NULL,
  `to_status` int(11) NOT NULL,
  `fav_status` tinyint(1) NOT NULL,
  `fav_status_sent` tinyint(1) NOT NULL,
  `reply_status` int(11) NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `message` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

/*Table structure for table `notice` */

DROP TABLE IF EXISTS `notice`;

CREATE TABLE `notice` (
  `noticeID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `notice` text NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`noticeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `notice` */

/*Table structure for table `parent` */

DROP TABLE IF EXISTS `parent`;

CREATE TABLE `parent` (
  `parentID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `father_name` varchar(60) NOT NULL,
  `mother_name` varchar(60) NOT NULL,
  `father_profession` varchar(40) NOT NULL,
  `mother_profession` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `parentactive` int(11) NOT NULL,
  PRIMARY KEY (`parentID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `parent` */

insert  into `parent`(`parentID`,`name`,`father_name`,`mother_name`,`father_profession`,`mother_profession`,`email`,`phone`,`address`,`photo`,`username`,`password`,`usertype`,`create_date`,`modify_date`,`create_userID`,`create_username`,`create_usertype`,`parentactive`) values (1,'test','fuqin','muqin','fuqin','fuqin','fuqin@yahoo.co.jp','','','defualt.png','fuqian','58fc30d348457c796c2e893ca8840fb9b4878c1dd65b45f32385bcf3991411a4c0dbbf911116309432ba3b8142d56380aa2c8c09a210ae2e38eae3d609173650','Parent','2016-04-07 09:54:32','2016-04-07 09:54:32',1,'admin','Admin',1),(2,'Delwar Hossain','Delwar Hossain','Hazera Begum','Business','House wife','delwarhossainaha@gmail.com','1716225133','Dhaka','4989eac9bb0b8d748ee6118aa971813b5c8456b5a2534820bbd0102d869a381e62edbaab541c38796f7a7b632e02e728ec510057accaa5394d886b19a6e9587f.jpg','dhossain','d7e7661f70307f92cd3ab3b3456f2540f06cd7f2c6cf5738f604e4bfa52321586c145a521065e5925d027764019235d1e811c75b17d1ae11e87454b71c12c0df','Parent','2016-04-07 10:00:01','2016-04-07 10:00:59',1,'admin','Admin',1),(3,'Arun kumar','Arun Kumar','Misses halder','Business','House wife','arunkumar@gmail.com','1777154555','Pabna','5244391a0e85b3cdf9e3ccb0e06dea43a0c018497178ae45ef28cb6179ddd45364b37adc97b6328969de0ce993855aa2b53f8985605de3fb69b665cede8bc2f7.PNG','kumar','d7e7661f70307f92cd3ab3b3456f2540f06cd7f2c6cf5738f604e4bfa52321586c145a521065e5925d027764019235d1e811c75b17d1ae11e87454b71c12c0df','Parent','2016-04-07 10:00:01','2016-04-07 10:01:16',1,'admin','Admin',1);

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `paymentID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoiceID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `paymentamount` varchar(20) NOT NULL,
  `paymenttype` varchar(128) NOT NULL,
  `paymentdate` date NOT NULL,
  `paymentmonth` varchar(10) NOT NULL,
  `paymentyear` year(4) NOT NULL,
  `paymentnote` varchar(200) DEFAULT NULL,
  `principal` varchar(100) DEFAULT NULL,
  `paymentclass` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

/*Data for the table `payment` */

insert  into `payment`(`paymentID`,`invoiceID`,`studentID`,`paymentamount`,`paymenttype`,`paymentdate`,`paymentmonth`,`paymentyear`,`paymentnote`,`principal`,`paymentclass`) values (23,13,19,'5000','现金','2016-09-06','Sep',2016,'',NULL,NULL),(24,16,11,'5000','现金','2016-09-06','Sep',2016,'',NULL,NULL),(25,24,27,'3000','Cash','2016-09-09','Sep',2016,'','管理员',NULL),(26,24,27,'100','Cash','2016-09-09','Sep',2016,'','管理员',NULL),(27,24,27,'1900','Cash','2016-09-09','Sep',2016,'因为测试','管理员',NULL),(28,25,21,'1000','Reduce','2016-09-09','Sep',2016,'朋友介绍减免处理','管理员',NULL),(29,28,29,'3700','Cash','2016-09-09','Sep',2016,'备注备注备注','管理员',NULL),(30,28,29,'33','Reduce','2016-09-09','Sep',2016,'备注备注备注备注备注','管理员',NULL),(31,26,28,'500','Cash','2016-09-09','Sep',2016,'','管理员',NULL),(32,28,29,'3326','Cash','2016-09-09','Sep',2016,'44444','管理员',NULL),(33,29,30,'300','现金','2016-09-09','Sep',2016,'','管理员',NULL),(34,29,30,'29970','现金','2016-09-09','Sep',2016,'','管理员',NULL),(35,30,31,'250000','现金','2016-09-14','Sep',2016,'','管理员',NULL),(36,30,31,'250000','现金','2016-09-14','Sep',2016,'','管理员',NULL),(37,29,30,'50000','现金','2016-09-14','Sep',2016,'','管理员',NULL),(38,31,32,'100000','现金','2016-09-14','Sep',2016,'','管理员',NULL),(39,35,37,'250000','现金','2016-09-22','Sep',2016,'','管理员',''),(40,38,40,'350000','现金','2016-09-28','Sep',2016,'','管理员',''),(41,37,39,'100000','现金','2016-09-28','Sep',2016,'','管理员',''),(42,37,39,'20000','现金','2016-09-28','Sep',2016,'优惠','管理员','1'),(43,37,39,'200000','现金','2016-09-28','Sep',2016,'','管理员',''),(44,37,39,'130000','现金','2016-09-28','Sep',2016,'','管理员','');

/*Table structure for table `promotionsubject` */

DROP TABLE IF EXISTS `promotionsubject`;

CREATE TABLE `promotionsubject` (
  `promotionSubjectID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `subjectCode` tinytext NOT NULL,
  `subjectMark` int(11) DEFAULT NULL,
  PRIMARY KEY (`promotionSubjectID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `promotionsubject` */

insert  into `promotionsubject`(`promotionSubjectID`,`classesID`,`subjectID`,`subjectCode`,`subjectMark`) values (1,1,1,'0001',0);

/*Table structure for table `reply_msg` */

DROP TABLE IF EXISTS `reply_msg`;

CREATE TABLE `reply_msg` (
  `replyID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `messageID` int(11) NOT NULL,
  `reply_msg` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`replyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reply_msg` */

/*Table structure for table `reset` */

DROP TABLE IF EXISTS `reset`;

CREATE TABLE `reset` (
  `resetID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyID` varchar(128) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`resetID`),
  KEY `keyID` (`keyID`),
  KEY `keyID_2` (`keyID`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `reset` */

insert  into `reset`(`resetID`,`keyID`,`email`) values (17,'8fe10f9e2e8f04f9111f363cc64ae5c9dfd496fa038122519ca9b6988880bcef8f4543e03b8368651d436f03d037a1db47656de65033f5115b99235d413d2f32','huhaichen1993@gmail.com'),(18,'8f1c5980a441b1901ead080f2654fc1a548cb18354225fa1f6b96c6c4ebb7fa951cfba7319e2f0f577fa7750c775cd4d2e455704dbd01a327ff080bc01c16179','hanjin@transform-edu.com');

/*Table structure for table `routine` */

DROP TABLE IF EXISTS `routine`;

CREATE TABLE `routine` (
  `routineID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `date` varchar(60) NOT NULL,
  `day` varchar(60) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `room` tinytext,
  `color` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`routineID`)
) ENGINE=InnoDB AUTO_INCREMENT=621 DEFAULT CHARSET=utf8;

/*Data for the table `routine` */

insert  into `routine`(`routineID`,`classesID`,`sectionID`,`subjectID`,`date`,`day`,`start_time`,`end_time`,`room`,`color`) values (257,0,0,9,'2016-09-26','Mon','17:00','18:00','','#00ffff'),(258,0,0,9,'2016-09-29','Thu','17:00','18:00','','#00ffff'),(259,0,0,9,'2016-10-03','Mon','17:00','18:00','','#00ffff'),(260,0,0,9,'2016-10-06','Thu','17:00','18:00','','#00ffff'),(261,0,0,9,'2016-10-10','Mon','17:00','18:00','','#00ffff'),(262,0,0,9,'2016-10-13','Thu','17:00','18:00','','#00ffff'),(263,0,0,9,'2016-10-17','Mon','17:00','18:00','','#00ffff'),(264,0,0,9,'2016-10-20','Thu','17:00','18:00','','#00ffff'),(265,0,0,9,'2016-10-24','Mon','17:00','18:00','','#00ffff'),(266,0,0,9,'2016-10-27','Thu','17:00','18:00','','#00ffff'),(267,0,0,42,'2016-07-23','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(268,0,0,42,'2016-07-30','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(269,0,0,42,'2016-08-06','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(270,0,0,42,'2016-08-13','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(271,0,0,42,'2016-08-20','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(272,0,0,42,'2016-08-27','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(273,0,0,42,'2016-09-03','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(274,0,0,42,'2016-09-10','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(275,0,0,42,'2016-09-17','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(276,0,0,42,'2016-09-24','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(277,0,0,42,'2016-10-01','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(278,0,0,42,'2016-10-08','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(279,0,0,42,'2016-10-15','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(280,0,0,42,'2016-10-22','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(281,0,0,42,'2016-10-29','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(282,0,0,42,'2016-11-05','Sat','10:00','18:00','一班本部3A  二班本部3B','#ff5e58'),(313,0,0,70,'2016-10-08','Sat','18:00','21:00','3B','#a6ff21'),(314,0,0,70,'2016-10-10','Mon','18:00','21:00','3B','#a6ff21'),(315,0,0,70,'2016-10-15','Sat','18:00','21:00','3B','#a6ff21'),(316,0,0,70,'2016-10-17','Mon','18:00','21:00','3B','#a6ff21'),(317,0,0,70,'2016-10-22','Sat','18:00','21:00','3B','#a6ff21'),(318,0,0,70,'2016-10-24','Mon','18:00','21:00','3B','#a6ff21'),(319,0,0,70,'2016-10-29','Sat','18:00','21:00','3B','#a6ff21'),(320,0,0,70,'2016-10-31','Mon','18:00','21:00','3B','#a6ff21'),(321,0,0,70,'2016-11-05','Sat','18:00','21:00','3B','#a6ff21'),(322,0,0,70,'2016-11-07','Mon','18:00','21:00','3B','#a6ff21'),(323,0,0,70,'2016-11-12','Sat','18:00','21:00','3B','#a6ff21'),(324,0,0,70,'2016-11-14','Mon','18:00','21:00','3B','#a6ff21'),(325,0,0,70,'2016-11-19','Sat','18:00','21:00','3B','#a6ff21'),(326,0,0,70,'2016-11-21','Mon','18:00','21:00','3B','#a6ff21'),(327,0,0,70,'2016-11-26','Sat','18:00','21:00','3B','#a6ff21'),(328,0,0,70,'2016-11-28','Mon','18:00','21:00','3B','#a6ff21'),(329,0,0,70,'2016-12-03','Sat','18:00','21:00','3B','#a6ff21'),(330,0,0,71,'2016-09-28','Wed','18:00','21:00','','#a1ff1e'),(331,0,0,71,'2016-10-05','Wed','18:00','21:00','','#a1ff1e'),(332,0,0,71,'2016-10-12','Wed','18:00','21:00','','#a1ff1e'),(333,0,0,71,'2016-10-19','Wed','18:00','21:00','','#a1ff1e'),(334,0,0,71,'2016-10-26','Wed','18:00','21:00','','#a1ff1e'),(335,0,0,71,'2016-11-02','Wed','18:00','21:00','','#a1ff1e'),(336,0,0,71,'2016-11-09','Wed','18:00','21:00','','#a1ff1e'),(337,0,0,71,'2016-11-16','Wed','18:00','21:00','','#a1ff1e'),(338,0,0,71,'2016-11-23','Wed','18:00','21:00','','#a1ff1e'),(339,0,0,71,'2016-11-30','Wed','18:00','21:00','','#a1ff1e'),(340,0,0,71,'2016-12-07','Wed','18:00','21:00','','#a1ff1e'),(341,0,0,71,'2016-12-14','Wed','18:00','21:00','','#a1ff1e'),(342,0,0,71,'2016-12-21','Wed','18:00','21:00','','#a1ff1e'),(379,0,0,28,'2016-09-04','Sun','10:00','17:00','','#00ffff'),(380,0,0,28,'2016-09-11','Sun','10:00','17:00','','#00ffff'),(381,0,0,28,'2016-09-18','Sun','10:00','17:00','','#00ffff'),(382,0,0,28,'2016-09-25','Sun','10:00','17:00','','#00ffff'),(383,0,0,28,'2016-10-02','Sun','10:00','17:00','','#00ffff'),(384,0,0,28,'2016-10-09','Sun','10:00','17:00','','#00ffff'),(385,0,0,28,'2016-10-16','Sun','10:00','17:00','','#00ffff'),(386,0,0,28,'2016-10-23','Sun','10:00','17:00','','#00ffff'),(387,0,0,28,'2016-10-30','Sun','10:00','17:00','','#00ffff'),(388,0,0,28,'2016-11-06','Sun','10:00','17:00','','#00ffff'),(389,0,0,28,'2016-11-20','Sun','10:00','17:00','','#00ffff'),(390,0,0,28,'2016-11-27','Sun','10:00','17:00','','#00ffff'),(391,0,0,28,'2016-12-11','Sun','10:00','17:00','','#00ffff'),(392,0,0,28,'2016-12-18','Sun','10:00','17:00','','#00ffff'),(393,0,0,28,'2016-12-25','Sun','10:00','17:00','','#00ffff'),(394,0,0,28,'2017-01-08','Sun','10:00','17:00','','#00ffff'),(395,0,0,28,'2017-01-15','Sun','10:00','17:00','','#00ffff'),(396,0,0,28,'2017-01-22','Sun','10:00','17:00','','#00ffff'),(397,0,0,28,'2017-01-29','Sun','10:00','17:00','','#00ffff'),(425,0,0,36,'2016-08-28','Sun','13:15','18:30','3B','#ad55ff'),(426,0,0,36,'2016-09-04','Sun','13:15','18:30','3B','#ad55ff'),(427,0,0,36,'2016-09-11','Sun','13:15','18:30','3B','#ad55ff'),(428,0,0,36,'2016-09-18','Sun','13:15','18:30','3B','#ad55ff'),(429,0,0,36,'2016-09-25','Sun','13:15','18:30','3B','#ad55ff'),(430,0,0,36,'2016-10-02','Sun','13:15','18:30','3B','#ad55ff'),(431,0,0,36,'2016-10-09','Sun','13:15','18:30','3B','#ad55ff'),(432,0,0,36,'2016-10-16','Sun','13:15','18:30','3B','#ad55ff'),(433,0,0,36,'2016-10-23','Sun','13:15','18:30','3B','#ad55ff'),(434,0,0,36,'2016-10-30','Sun','13:15','18:30','3B','#ad55ff'),(435,0,0,36,'2016-11-06','Sun','13:15','18:30','3B','#ad55ff'),(436,0,0,36,'2016-11-20','Sun','13:15','18:30','3B','#ad55ff'),(437,0,0,36,'2016-11-27','Sun','13:15','18:30','3B','#ad55ff'),(438,0,0,36,'2016-12-11','Sun','13:15','18:30','3B','#ad55ff'),(439,0,0,36,'2016-12-18','Sun','13:15','18:30','3B','#ad55ff'),(440,0,0,36,'2017-01-08','Sun','13:15','18:30','3B','#ad55ff'),(441,0,0,36,'2017-01-15','Sun','13:15','18:30','3B','#ad55ff'),(442,0,0,36,'2017-01-22','Sun','13:15','18:30','3B','#ad55ff'),(443,0,0,36,'2017-01-29','Sun','13:15','18:30','3B','#ad55ff'),(444,0,0,36,'2017-02-05','Sun','13:15','18:30','3B','#ad55ff'),(445,0,0,36,'2017-02-12','Sun','13:15','18:30','3B','#ad55ff'),(446,0,0,36,'2017-02-19','Sun','13:15','18:30','3B','#ad55ff'),(447,0,0,36,'2017-02-26','Sun','13:15','18:30','3B','#ad55ff'),(448,0,0,36,'2017-03-05','Sun','13:15','18:30','3B','#ad55ff'),(449,0,0,36,'2017-03-12','Sun','13:15','18:30','3B','#ad55ff'),(450,0,0,36,'2017-03-19','Sun','13:15','18:30','3B','#ad55ff'),(451,0,0,36,'2017-03-26','Sun','13:15','18:30','3B','#ad55ff'),(452,0,0,40,'2016-10-02','Sun','10:00','16:00','B1-1','#4a26ff'),(453,0,0,40,'2016-10-09','Sun','10:00','16:00','B1-1','#4a26ff'),(454,0,0,40,'2016-10-16','Sun','10:00','16:00','B1-1','#4a26ff'),(455,0,0,40,'2016-10-23','Sun','10:00','16:00','B1-1','#4a26ff'),(456,0,0,40,'2016-10-30','Sun','10:00','16:00','B1-1','#4a26ff'),(457,0,0,40,'2016-11-06','Sun','10:00','16:00','B1-1','#4a26ff'),(458,0,0,40,'2016-11-20','Sun','10:00','16:00','B1-1','#4a26ff'),(459,0,0,40,'2016-11-27','Sun','10:00','16:00','B1-1','#4a26ff'),(460,0,0,40,'2016-12-11','Sun','10:00','16:00','B1-1','#4a26ff'),(461,0,0,40,'2016-12-18','Sun','10:00','16:00','B1-1','#4a26ff'),(462,0,0,40,'2017-01-08','Sun','10:00','16:00','B1-1','#4a26ff'),(463,0,0,40,'2017-01-15','Sun','10:00','16:00','B1-1','#4a26ff'),(464,0,0,40,'2017-01-22','Sun','10:00','16:00','B1-1','#4a26ff'),(465,0,0,40,'2017-01-29','Sun','10:00','16:00','B1-1','#4a26ff'),(466,0,0,40,'2017-02-05','Sun','10:00','16:00','B1-1','#4a26ff'),(467,0,0,40,'2017-02-12','Sun','10:00','16:00','B1-1','#4a26ff'),(468,0,0,40,'2017-02-19','Sun','10:00','16:00','B1-1','#4a26ff'),(469,0,0,40,'2017-02-26','Sun','10:00','16:00','B1-1','#4a26ff'),(470,0,0,40,'2017-03-05','Sun','10:00','16:00','B1-1','#4a26ff'),(471,0,0,40,'2017-03-12','Sun','10:00','16:00','B1-1','#4a26ff'),(472,0,0,40,'2017-03-19','Sun','10:00','16:00','B1-1','#4a26ff'),(473,0,0,40,'2017-03-26','Sun','10:00','16:00','B1-1','#4a26ff'),(474,0,0,40,'2017-04-02','Sun','10:00','16:00','B1-1','#4a26ff'),(475,0,0,40,'2017-04-09','Sun','10:00','16:00','B1-1','#4a26ff'),(476,0,0,40,'2017-04-16','Sun','10:00','16:00','B1-1','#4a26ff'),(477,0,0,40,'2017-04-23','Sun','10:00','16:00','B1-1','#4a26ff'),(478,0,0,40,'2017-04-30','Sun','10:00','16:00','B1-1','#4a26ff'),(479,0,0,34,'2016-08-28','Sun','10:00','16:00','3A','#9260ff'),(480,0,0,34,'2016-09-04','Sun','10:00','16:00','3A','#9260ff'),(481,0,0,34,'2016-09-11','Sun','10:00','16:00','3A','#9260ff'),(482,0,0,34,'2016-09-18','Sun','10:00','16:00','3A','#9260ff'),(483,0,0,34,'2016-09-25','Sun','10:00','16:00','3A','#9260ff'),(484,0,0,34,'2016-10-02','Sun','10:00','16:00','3A','#9260ff'),(485,0,0,34,'2016-10-09','Sun','10:00','16:00','3A','#9260ff'),(486,0,0,34,'2016-10-16','Sun','10:00','16:00','3A','#9260ff'),(487,0,0,34,'2016-10-23','Sun','10:00','16:00','3A','#9260ff'),(488,0,0,34,'2016-10-30','Sun','10:00','16:00','3A','#9260ff'),(489,0,0,34,'2016-11-06','Sun','10:00','16:00','3A','#9260ff'),(490,0,0,34,'2016-11-20','Sun','10:00','16:00','3A','#9260ff'),(491,0,0,34,'2016-11-27','Sun','10:00','16:00','3A','#9260ff'),(492,0,0,34,'2016-12-11','Sun','10:00','16:00','3A','#9260ff'),(493,0,0,34,'2016-12-18','Sun','10:00','16:00','3A','#9260ff'),(494,0,0,34,'2017-01-08','Sun','10:00','16:00','3A','#9260ff'),(495,0,0,34,'2017-01-15','Sun','10:00','16:00','3A','#9260ff'),(496,0,0,34,'2017-01-22','Sun','10:00','16:00','3A','#9260ff'),(497,0,0,34,'2017-01-29','Sun','10:00','16:00','3A','#9260ff'),(498,0,0,34,'2017-02-05','Sun','10:00','16:00','3A','#9260ff'),(499,0,0,34,'2017-02-12','Sun','10:00','16:00','3A','#9260ff'),(500,0,0,34,'2017-02-19','Sun','10:00','16:00','3A','#9260ff'),(501,0,0,34,'2017-02-26','Sun','10:00','16:00','3A','#9260ff'),(502,0,0,34,'2017-03-05','Sun','10:00','16:00','3A','#9260ff'),(503,0,0,34,'2017-03-12','Sun','10:00','16:00','3A','#9260ff'),(504,0,0,34,'2017-03-19','Sun','10:00','16:00','3A','#9260ff'),(505,0,0,34,'2017-03-26','Sun','10:00','16:00','3A','#9260ff'),(506,0,0,39,'2016-10-02','Sun','10:00','13:00','3A','#b11fff'),(507,0,0,39,'2016-10-09','Sun','10:00','13:00','','#b11fff'),(508,0,0,39,'2016-10-16','Sun','10:00','13:00','','#b11fff'),(509,0,0,39,'2016-10-23','Sun','10:00','13:00','','#b11fff'),(510,0,0,39,'2016-10-30','Sun','10:00','13:00','','#b11fff'),(511,0,0,39,'2016-11-06','Sun','10:00','13:00','','#b11fff'),(512,0,0,39,'2016-11-20','Sun','10:00','13:00','','#b11fff'),(513,0,0,39,'2016-11-27','Sun','10:00','13:00','','#b11fff'),(514,0,0,39,'2016-12-11','Sun','10:00','13:00','','#b11fff'),(515,0,0,39,'2016-12-18','Sun','10:00','13:00','','#b11fff'),(516,0,0,39,'2017-01-08','Sun','10:00','13:00','','#b11fff'),(517,0,0,39,'2017-01-15','Sun','10:00','13:00','','#b11fff'),(518,0,0,39,'2017-01-22','Sun','10:00','13:00','','#b11fff'),(519,0,0,39,'2017-01-29','Sun','10:00','13:00','','#b11fff'),(520,0,0,39,'2017-02-05','Sun','10:00','13:00','','#b11fff'),(521,0,0,39,'2017-02-12','Sun','10:00','13:00','','#b11fff'),(522,0,0,39,'2017-02-19','Sun','10:00','13:00','','#b11fff'),(523,0,0,39,'2017-02-26','Sun','10:00','13:00','','#b11fff'),(524,0,0,39,'2017-03-05','Sun','10:00','13:00','','#b11fff'),(525,0,0,39,'2017-03-12','Sun','10:00','13:00','','#b11fff'),(526,0,0,39,'2017-03-19','Sun','10:00','13:00','','#b11fff'),(527,0,0,39,'2017-03-26','Sun','10:00','13:00','','#b11fff'),(528,0,0,39,'2017-04-02','Sun','10:00','13:00','','#b11fff'),(529,0,0,39,'2017-04-09','Sun','10:00','13:00','','#b11fff'),(530,0,0,39,'2017-04-16','Sun','10:00','13:00','','#b11fff'),(531,0,0,39,'2017-04-23','Sun','10:00','13:00','','#b11fff'),(532,0,0,39,'2017-04-30','Sun','10:00','13:00','','#b11fff'),(553,0,0,24,'2016-08-28','Sun','10:00','18:00','早稻田言语','#ff49e7'),(554,0,0,24,'2016-09-04','Sun','10:00','18:00','早稻田言语','#ff49e7'),(555,0,0,24,'2016-09-11','Sun','10:00','18:00','早稻田言语','#ff49e7'),(556,0,0,24,'2016-09-18','Sun','10:00','18:00','早稻田言语','#ff49e7'),(557,0,0,24,'2016-09-25','Sun','10:00','18:00','早稻田言语','#ff49e7'),(558,0,0,24,'2016-10-02','Sun','10:00','18:00','早稻田言语','#ff49e7'),(559,0,0,24,'2016-10-09','Sun','10:00','18:00','早稻田言语','#ff49e7'),(560,0,0,24,'2016-10-16','Sun','10:00','18:00','早稻田言语','#ff49e7'),(561,0,0,24,'2016-10-23','Sun','10:00','18:00','早稻田言语','#ff49e7'),(562,0,0,24,'2016-10-30','Sun','10:00','18:00','早稻田言语','#ff49e7'),(563,0,0,24,'2016-11-06','Sun','10:00','18:00','早稻田言语','#ff49e7'),(564,0,0,24,'2016-11-20','Sun','10:00','18:00','早稻田言语','#ff49e7'),(565,0,0,24,'2016-11-27','Sun','10:00','18:00','早稻田言语','#ff49e7'),(566,0,0,24,'2016-12-11','Sun','10:00','18:00','早稻田言语','#ff49e7'),(567,0,0,24,'2016-12-18','Sun','10:00','18:00','早稻田言语','#ff49e7'),(568,0,0,24,'2016-12-25','Sun','10:00','18:00','早稻田言语','#ff49e7'),(569,0,0,24,'2017-01-01','Sun','10:00','18:00','早稻田言语','#ff49e7'),(570,0,0,24,'2017-01-08','Sun','10:00','18:00','早稻田言语','#ff49e7'),(571,0,0,47,'2016-07-31','Sun','10:00','19:30','早稻田言语','#00ffff'),(572,0,0,47,'2016-08-07','Sun','10:00','19:30','早稻田言语','#00ffff'),(573,0,0,47,'2016-08-14','Sun','10:00','19:30','早稻田言语','#00ffff'),(574,0,0,47,'2016-08-21','Sun','10:00','19:30','早稻田言语','#00ffff'),(575,0,0,47,'2016-08-28','Sun','10:00','19:30','早稻田言语','#00ffff'),(576,0,0,47,'2016-09-04','Sun','10:00','19:30','早稻田言语','#00ffff'),(577,0,0,47,'2016-09-11','Sun','10:00','19:30','早稻田言语','#00ffff'),(578,0,0,47,'2016-09-18','Sun','10:00','19:30','早稻田言语','#00ffff'),(579,0,0,47,'2016-09-25','Sun','10:00','19:30','早稻田言语','#00ffff'),(580,0,0,47,'2016-10-02','Sun','10:00','19:30','早稻田言语','#00ffff'),(581,0,0,47,'2016-10-09','Sun','10:00','19:30','早稻田言语','#00ffff'),(582,0,0,47,'2016-10-16','Sun','10:00','19:30','早稻田言语','#00ffff'),(583,0,0,47,'2016-10-23','Sun','10:00','19:30','早稻田言语','#00ffff'),(584,0,0,47,'2016-10-30','Sun','10:00','19:30','早稻田言语','#00ffff'),(585,0,0,47,'2016-11-06','Sun','10:00','19:30','早稻田言语','#00ffff'),(586,0,0,52,'2016-07-31','Sun','10:00','19:30','早稻田言语','#77cdff'),(587,0,0,52,'2016-08-07','Sun','10:00','19:30','早稻田言语','#77cdff'),(588,0,0,52,'2016-08-14','Sun','10:00','19:30','早稻田言语','#77cdff'),(589,0,0,52,'2016-08-21','Sun','10:00','19:30','早稻田言语','#77cdff'),(590,0,0,52,'2016-08-28','Sun','10:00','19:30','早稻田言语','#77cdff'),(591,0,0,52,'2016-09-04','Sun','10:00','19:30','早稻田言语','#77cdff'),(592,0,0,52,'2016-09-11','Sun','10:00','19:30','早稻田言语','#77cdff'),(593,0,0,52,'2016-09-18','Sun','10:00','19:30','早稻田言语','#77cdff'),(594,0,0,52,'2016-09-25','Sun','10:00','19:30','早稻田言语','#77cdff'),(595,0,0,52,'2016-10-02','Sun','10:00','19:30','早稻田言语','#77cdff'),(596,0,0,52,'2016-10-09','Sun','10:00','19:30','早稻田言语','#77cdff'),(597,0,0,52,'2016-10-16','Sun','10:00','19:30','早稻田言语','#77cdff'),(598,0,0,52,'2016-10-23','Sun','10:00','19:30','早稻田言语','#77cdff'),(599,0,0,52,'2016-10-30','Sun','10:00','19:30','早稻田言语','#77cdff'),(600,0,0,52,'2016-11-06','Sun','10:00','19:30','早稻田言语','#77cdff'),(601,0,0,13,'2016-09-20','Tue','18:00','21:00','','#00ffff'),(602,0,0,13,'2016-09-23','Fri','18:00','21:00','','#00ffff'),(603,0,0,13,'2016-09-27','Tue','18:00','21:00','','#00ffff'),(604,0,0,13,'2016-09-30','Fri','18:00','21:00','','#00ffff'),(605,0,0,13,'2016-10-04','Tue','18:00','21:00','','#00ffff'),(606,0,0,13,'2016-10-07','Fri','18:00','21:00','','#00ffff'),(607,0,0,13,'2016-10-11','Tue','18:00','21:00','','#00ffff'),(608,0,0,13,'2016-10-14','Fri','18:00','21:00','','#00ffff'),(609,0,0,13,'2016-10-18','Tue','18:00','21:00','','#00ffff'),(610,0,0,13,'2016-10-21','Fri','18:00','21:00','','#00ffff'),(611,0,0,13,'2016-10-25','Tue','18:00','21:00','','#00ffff'),(612,0,0,13,'2016-10-28','Fri','18:00','21:00','','#00ffff'),(613,0,0,13,'2016-11-01','Tue','18:00','21:00','','#00ffff'),(614,0,0,13,'2016-11-04','Fri','18:00','21:00','','#00ffff'),(615,0,0,13,'2016-11-08','Tue','18:00','21:00','','#00ffff'),(616,0,0,13,'2016-11-11','Fri','18:00','21:00','','#00ffff'),(617,0,0,13,'2016-11-15','Tue','18:00','21:00','','#00ffff'),(618,0,0,13,'2016-11-18','Fri','18:00','21:00','','#00ffff'),(619,0,0,13,'2016-11-22','Tue','18:00','21:00','','#00ffff'),(620,0,0,13,'2016-11-25','Fri','18:00','21:00','','#00ffff');

/*Table structure for table `school_sessions` */

DROP TABLE IF EXISTS `school_sessions`;

CREATE TABLE `school_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `school_sessions` */

insert  into `school_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values ('3dec39c1cb4e37e07e4aad175f78e434','0.0.0.0','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36',1475657549,'a:31:{s:9:\"user_data\";s:0:\"\";s:4:\"lang\";s:7:\"chinese\";s:12:\"paymentClass\";a:3:{s:0:\"\";s:9:\"请选择\";i:1;s:12:\"减免学费\";i:2;s:12:\"差额补充\";}s:13:\"paymentMethod\";a:6:{s:0:\"\";s:9:\"请选择\";i:1;s:6:\"现金\";i:2;s:12:\"中国汇款\";i:3;s:12:\"日本汇款\";i:4;s:15:\"信用卡支付\";i:5;s:15:\"支付宝支付\";}s:7:\"setting\";a:2:{s:0:\"\";s:9:\"请选择\";s:12:\"subjectGroup\";s:12:\"课程群组\";}s:15:\"studentCategory\";a:7:{s:0:\"\";s:9:\"请选择\";i:1;s:12:\"学部文科\";i:2;s:12:\"学部理科\";i:3;s:21:\"大学与经营经济\";i:4;s:21:\"大学院社会人文\";i:5;s:9:\"艺术类\";i:6;s:15:\"大学院理科\";}s:18:\"studentPossibility\";a:4:{s:0:\"\";s:9:\"请选择\";i:1;s:3:\"低\";i:2;s:3:\"中\";i:3;s:3:\"高\";}s:13:\"studentSource\";a:4:{s:0:\"\";s:9:\"请选择\";i:1;s:12:\"自主咨询\";i:2;s:12:\"朋友介绍\";i:3;s:15:\"合作方推荐\";}s:20:\"studentSourcePartner\";a:3:{s:0:\"\";s:9:\"请选择\";i:1;s:9:\"芥末网\";i:2;s:12:\"前程留学\";}s:15:\"tattendanceType\";a:4:{s:0:\"\";s:9:\"请选择\";i:1;s:6:\"教学\";i:2;s:6:\"事务\";i:3;s:9:\"VIP教学\";}s:11:\"teacherType\";a:5:{s:0:\"\";s:9:\"请选择\";s:7:\"Teacher\";s:12:\"普通教师\";s:8:\"Salesman\";s:6:\"销售\";s:12:\"Receptionist\";s:6:\"事务\";s:14:\"TeacherManager\";s:12:\"部门主管\";}s:13:\"transportType\";a:3:{s:0:\"\";s:9:\"请选择\";s:2:\"NO\";s:15:\"没有交通费\";s:9:\"CUSTOMIZE\";s:18:\"自定义交通费\";}s:14:\"wageCalcStatus\";a:7:{s:0:\"\";s:9:\"请选择\";i:1;s:9:\"未计算\";i:2;s:15:\"自动计算中\";i:3;s:18:\"自动计算完成\";i:4;s:24:\"没有任何出勤记录\";i:5;s:18:\"明细手动修改\";i:6;s:18:\"有未承认出勤\";}s:8:\"wageType\";a:2:{s:0:\"\";s:9:\"请选择\";i:3;s:17:\"固定 ＋ 时给\";}s:14:\"wageTypeDetail\";a:8:{s:0:\"\";s:9:\"请选择\";i:1;s:6:\"事务\";i:2;s:6:\"教学\";i:3;s:9:\"VIP教学\";i:4;s:6:\"扣除\";i:5;s:6:\"奖金\";i:99;s:9:\"基本给\";i:999;s:9:\"交通费\";}s:11:\"loginuserID\";s:1:\"1\";s:4:\"name\";s:9:\"管理员\";s:5:\"email\";s:17:\"admin@yahoo.co.jp\";s:8:\"usertype\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"photo\";s:11:\"defualt.png\";s:8:\"loggedin\";b:1;s:14:\"searchCategory\";b:0;s:12:\"searchSource\";b:0;s:17:\"searchSource_memo\";b:0;s:17:\"searchPossibility\";b:0;s:17:\"searchPaymentflag\";s:1:\"1\";s:18:\"searchstudentstate\";s:1:\"1\";s:11:\"querystring\";s:0:\"\";s:8:\"dateFrom\";s:10:\"2016-09-01\";s:6:\"dateTo\";s:10:\"2016-10-31\";}'),('783243f19da47eaccd662d121b0b265e','0.0.0.0','Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:38.0) Gecko/20100101 Firefox/38.0',1561580923,'a:8:{s:9:\"user_data\";s:0:\"\";s:4:\"name\";s:5:\"Dipok\";s:5:\"email\";s:16:\"info@inilabs.net\";s:8:\"usertype\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"photo\";s:8:\"site.png\";s:4:\"lang\";s:7:\"english\";s:8:\"loggedin\";b:1;}'),('9efe8f92a15201eb069f96e3d26b2021','0.0.0.0','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36',1475662574,'a:23:{s:9:\"user_data\";s:0:\"\";s:4:\"lang\";s:7:\"chinese\";s:12:\"paymentClass\";a:3:{s:0:\"\";s:9:\"请选择\";i:1;s:12:\"减免学费\";i:2;s:12:\"差额补充\";}s:13:\"paymentMethod\";a:6:{s:0:\"\";s:9:\"请选择\";i:1;s:6:\"现金\";i:2;s:12:\"中国汇款\";i:3;s:12:\"日本汇款\";i:4;s:15:\"信用卡支付\";i:5;s:15:\"支付宝支付\";}s:7:\"setting\";a:2:{s:0:\"\";s:9:\"请选择\";s:12:\"subjectGroup\";s:12:\"课程群组\";}s:15:\"studentCategory\";a:7:{s:0:\"\";s:9:\"请选择\";i:1;s:12:\"学部文科\";i:2;s:12:\"学部理科\";i:3;s:21:\"大学与经营经济\";i:4;s:21:\"大学院社会人文\";i:5;s:9:\"艺术类\";i:6;s:15:\"大学院理科\";}s:18:\"studentPossibility\";a:4:{s:0:\"\";s:9:\"请选择\";i:1;s:3:\"低\";i:2;s:3:\"中\";i:3;s:3:\"高\";}s:13:\"studentSource\";a:4:{s:0:\"\";s:9:\"请选择\";i:1;s:12:\"自主咨询\";i:2;s:12:\"朋友介绍\";i:3;s:15:\"合作方推荐\";}s:20:\"studentSourcePartner\";a:3:{s:0:\"\";s:9:\"请选择\";i:1;s:9:\"芥末网\";i:2;s:12:\"前程留学\";}s:15:\"tattendanceType\";a:4:{s:0:\"\";s:9:\"请选择\";i:1;s:6:\"教学\";i:2;s:6:\"事务\";i:3;s:9:\"VIP教学\";}s:11:\"teacherType\";a:5:{s:0:\"\";s:9:\"请选择\";s:7:\"Teacher\";s:12:\"普通教师\";s:8:\"Salesman\";s:6:\"销售\";s:12:\"Receptionist\";s:6:\"事务\";s:14:\"TeacherManager\";s:12:\"部门主管\";}s:13:\"transportType\";a:3:{s:0:\"\";s:9:\"请选择\";s:2:\"NO\";s:15:\"没有交通费\";s:9:\"CUSTOMIZE\";s:18:\"自定义交通费\";}s:14:\"wageCalcStatus\";a:7:{s:0:\"\";s:9:\"请选择\";i:1;s:9:\"未计算\";i:2;s:15:\"自动计算中\";i:3;s:18:\"自动计算完成\";i:4;s:24:\"没有任何出勤记录\";i:5;s:18:\"明细手动修改\";i:6;s:18:\"有未承认出勤\";}s:8:\"wageType\";a:2:{s:0:\"\";s:9:\"请选择\";i:3;s:17:\"固定 ＋ 时给\";}s:14:\"wageTypeDetail\";a:8:{s:0:\"\";s:9:\"请选择\";i:1;s:6:\"事务\";i:2;s:6:\"教学\";i:3;s:9:\"VIP教学\";i:4;s:6:\"扣除\";i:5;s:6:\"奖金\";i:99;s:9:\"基本给\";i:999;s:9:\"交通费\";}s:11:\"loginuserID\";s:1:\"1\";s:4:\"name\";s:9:\"管理员\";s:5:\"email\";s:17:\"admin@yahoo.co.jp\";s:8:\"usertype\";s:5:\"Admin\";s:8:\"username\";s:5:\"admin\";s:5:\"photo\";s:11:\"defualt.png\";s:8:\"loggedin\";b:1;s:17:\"flash:old:success\";s:6:\"成功\";}');

/*Table structure for table `section` */

DROP TABLE IF EXISTS `section`;

CREATE TABLE `section` (
  `sectionID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `section` varchar(60) NOT NULL,
  `category` varchar(128) NOT NULL,
  `classesID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `note` text,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`sectionID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `section` */

insert  into `section`(`sectionID`,`section`,`category`,`classesID`,`teacherID`,`note`,`create_date`,`modify_date`,`create_userID`,`create_username`,`create_usertype`) values (3,'分组A','分组A',2,1,'','2016-04-08 09:03:02','2016-04-08 09:03:02',1,'admin','Admin'),(4,'ｈｈ','ｆｆｆｆｆｆｆｆｆｆｆｆｆｆｆｆ',3,2,'','2016-05-26 08:34:42','2016-05-26 08:34:42',1,'admin','Admin');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `settingID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sname` text,
  `phone` tinytext,
  `address` text,
  `email` varchar(40) DEFAULT NULL,
  `automation` int(11) DEFAULT NULL,
  `currency_code` varchar(11) DEFAULT NULL,
  `currency_symbol` text,
  `language` varchar(50) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `fontorbackend` int(11) DEFAULT NULL,
  `footer` text,
  `photo` varchar(128) DEFAULT NULL,
  `purchase_code` varchar(255) DEFAULT NULL,
  `updateversion` text,
  `attendance` varchar(30) DEFAULT NULL,
  `smtp_host` varchar(50) NOT NULL,
  `smtp_user` varchar(50) NOT NULL,
  `smtp_pass` varchar(50) NOT NULL,
  `smtp_port` varchar(50) NOT NULL,
  PRIMARY KEY (`settingID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `setting` */

insert  into `setting`(`settingID`,`sname`,`phone`,`address`,`email`,`automation`,`currency_code`,`currency_symbol`,`language`,`theme`,`fontorbackend`,`footer`,`photo`,`purchase_code`,`updateversion`,`attendance`,`smtp_host`,`smtp_user`,`smtp_pass`,`smtp_port`) values (1,'学院','03-6457-3666','東京都','admin@gmail.com',5,'日元','￥','chinese','Basic',0,'yue','661525317.png','1001117b-c71c-43de-bb88-586839233a04','2.00','subject','smtp.lolipop.jpqqq','test@livetech.co.jpqq','22222','465');

/*Table structure for table `smssettings` */

DROP TABLE IF EXISTS `smssettings`;

CREATE TABLE `smssettings` (
  `smssettingsID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `types` varchar(255) DEFAULT NULL,
  `field_names` varchar(255) DEFAULT NULL,
  `field_values` varchar(255) DEFAULT NULL,
  `smssettings_extra` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`smssettingsID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `smssettings` */

insert  into `smssettings`(`smssettingsID`,`types`,`field_names`,`field_values`,`smssettings_extra`) values (1,'clickatell','clickatell_username','',NULL),(2,'clickatell','clickatell_password','',NULL),(3,'clickatell','clickatell_api_key','',NULL),(4,'twilio','twilio_accountSID','',NULL),(5,'twilio','twilio_authtoken','',NULL),(6,'twilio','twilio_fromnumber','',NULL),(7,'bulk','bulk_username','',NULL),(8,'bulk','bulk_password','',NULL);

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `studentID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `wechat` varchar(50) DEFAULT NULL,
  `address` text,
  `category` int(11) NOT NULL,
  `source` int(11) NOT NULL,
  `source_memo` varchar(100) DEFAULT NULL,
  `possibility` int(11) NOT NULL,
  `language_school` varchar(100) DEFAULT NULL,
  `classesID` int(11) DEFAULT NULL,
  `sectionID` int(11) DEFAULT NULL,
  `section` varchar(60) DEFAULT NULL,
  `roll` tinytext NOT NULL,
  `library` int(11) NOT NULL,
  `hostel` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `totalamount` varchar(128) DEFAULT NULL,
  `paidamount` varchar(128) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `parentID` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `evaluationCount` int(11) DEFAULT '0',
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `usertype` varchar(20) NOT NULL,
  `modify_date` datetime NOT NULL,
  `salesmanID` int(11) DEFAULT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `studentactive` int(11) NOT NULL,
  `subjectStart_date` date DEFAULT NULL,
  `subjectEnd_date` date DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `graduated_school` varchar(45) DEFAULT NULL,
  `latest_education` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `student` */

insert  into `student`(`studentID`,`name`,`dob`,`sex`,`religion`,`email`,`phone`,`wechat`,`address`,`category`,`source`,`source_memo`,`possibility`,`language_school`,`classesID`,`sectionID`,`section`,`roll`,`library`,`hostel`,`transport`,`create_date`,`totalamount`,`paidamount`,`photo`,`parentID`,`year`,`evaluationCount`,`username`,`password`,`usertype`,`modify_date`,`salesmanID`,`create_userID`,`create_username`,`create_usertype`,`studentactive`,`subjectStart_date`,`subjectEnd_date`,`input_date`,`graduated_school`,`latest_education`) values (31,'姜玉佩','1970-01-01','女','0','shfjdhjh@gmail.com','08038505267','','0',1,3,'2',3,'',16,0,'0','0',0,0,0,'2016-09-14 05:17:20','500000','500000','defualt.png',0,2014,0,'','397d43537a11e68c7f339edfe6a7d7b9aad49600bff6ec3f0e657ab399f9079405137f4711a755fd339a8dd55d5dea2a03eac462532c77d6825502e0e366a8e5','Student','2016-09-14 05:30:11',15,1,'admin','Admin',1,'2016-09-14','2017-09-14','2016-09-14','',''),(36,'葛伟','1970-01-01','男','0','gewei1990@gmail.com','080-5684-1678','','0',1,1,'网站',2,'',16,0,'0','0',0,0,0,'2016-09-22 09:01:35','500000','0','defualt.png',0,2014,0,'','397d43537a11e68c7f339edfe6a7d7b9aad49600bff6ec3f0e657ab399f9079405137f4711a755fd339a8dd55d5dea2a03eac462532c77d6825502e0e366a8e5','Student','2016-09-22 09:06:31',14,1,'admin','Admin',0,'2016-09-22','2017-09-22','2016-09-22','',''),(37,'李旭','1970-01-01','男','0','lixu@gmail.com','080-5965-4867','','0',3,1,'网站',3,'',20,0,'0','0',0,0,0,'2016-09-22 09:09:42','480000','250000','defualt.png',0,2014,0,'','397d43537a11e68c7f339edfe6a7d7b9aad49600bff6ec3f0e657ab399f9079405137f4711a755fd339a8dd55d5dea2a03eac462532c77d6825502e0e366a8e5','Student','2016-09-22 09:10:27',14,1,'admin','Admin',0,'2016-09-22','2017-09-22','2016-09-22','',''),(38,'王岚','1970-01-01','女','0','wanglan@qq.com','07043755592','','0',3,2,'胡海琛',3,'',23,0,'0','0',0,0,0,'2016-09-28 10:20:22','480000','0','defualt.png',0,2014,0,'','397d43537a11e68c7f339edfe6a7d7b9aad49600bff6ec3f0e657ab399f9079405137f4711a755fd339a8dd55d5dea2a03eac462532c77d6825502e0e366a8e5','Student','2016-09-28 11:24:54',14,14,'0','TeacherManager',0,'2016-08-01','2017-08-01','2016-09-28','',''),(39,'林博翰','1970-01-01','男','0','linbohan@qq.com','08079500920','','0',4,3,'1',3,'',28,0,'0','0',0,0,0,'2016-09-28 10:28:16','450000','450000','defualt.png',0,2014,0,'','397d43537a11e68c7f339edfe6a7d7b9aad49600bff6ec3f0e657ab399f9079405137f4711a755fd339a8dd55d5dea2a03eac462532c77d6825502e0e366a8e5','Student','2016-09-28 10:29:29',14,14,'0','TeacherManager',0,'2016-07-14','2017-02-28','2016-09-28','',''),(40,'刘子涵','1970-01-01','男','0','liuzihan@qq.com','07014671021','','0',1,2,'胡海琛',3,'',47,0,'0','0',0,0,0,'2016-09-28 10:32:13','350000','350000','defualt.png',0,2014,0,'','397d43537a11e68c7f339edfe6a7d7b9aad49600bff6ec3f0e657ab399f9079405137f4711a755fd339a8dd55d5dea2a03eac462532c77d6825502e0e366a8e5','Student','2016-09-28 10:44:34',14,14,'0','TeacherManager',0,'2016-09-13','2017-03-31','2016-09-28','',''),(41,'陈晓旭','1970-01-01','男','0','chenxiaoxu@qq.com','07038245666','','0',3,1,'自主咨询',3,'',1,0,'0','',0,0,0,'2016-09-28 10:50:20','0','0','defualt.png',0,2014,0,'','397d43537a11e68c7f339edfe6a7d7b9aad49600bff6ec3f0e657ab399f9079405137f4711a755fd339a8dd55d5dea2a03eac462532c77d6825502e0e366a8e5','Student','2016-09-28 10:50:20',14,1,'admin','Admin',0,NULL,NULL,'2016-09-28','','');

/*Table structure for table `student_custom_course` */

DROP TABLE IF EXISTS `student_custom_course`;

CREATE TABLE `school`.`student_custom_course` (
  `student_custom_courseID` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `studentID` INT(11) NOT NULL,
  `classesID` INT(11) NOT NULL,
  PRIMARY KEY (`student_custom_courseID`));

/*Table structure for table `sub_attendance` */

DROP TABLE IF EXISTS `sub_attendance`;

CREATE TABLE `sub_attendance` (
  `attendanceID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`attendanceID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `sub_attendance` */

insert  into `sub_attendance`(`attendanceID`,`studentID`,`classesID`,`subjectID`,`userID`,`usertype`,`monthyear`,`a1`,`a2`,`a3`,`a4`,`a5`,`a6`,`a7`,`a8`,`a9`,`a10`,`a11`,`a12`,`a13`,`a14`,`a15`,`a16`,`a17`,`a18`,`a19`,`a20`,`a21`,`a22`,`a23`,`a24`,`a25`,`a26`,`a27`,`a28`,`a29`,`a30`,`a31`) values (1,20,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,21,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,27,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,2,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,3,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,4,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,5,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,6,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,7,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,8,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,9,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,10,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,11,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,12,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,13,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,14,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,15,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,17,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,18,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,19,0,5,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,31,16,9,1,'Admin','10-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,30,15,8,5,'Teacher','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(23,31,16,9,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',NULL,NULL,NULL,NULL,NULL),(24,36,16,9,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',NULL,NULL,NULL,NULL,NULL),(25,37,20,9,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',NULL,NULL,NULL,NULL,NULL),(26,31,16,71,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,36,16,71,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,37,20,71,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,38,23,71,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL),(30,39,28,71,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL),(31,40,47,71,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL),(32,37,20,20,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,38,23,20,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL),(34,39,28,20,1,'Admin','09-2016',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'P',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `subject` */

DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `subjectID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subjectGroup` varchar(30) NOT NULL,
  `classesID` int(11) DEFAULT NULL,
  `subject` varchar(60) NOT NULL,
  `amount` int(11) NOT NULL,
  `subject_author` varchar(100) DEFAULT NULL,
  `subject_code` tinytext NOT NULL,
  `teacher_name` varchar(60) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

/*Data for the table `subject` */

insert  into `subject`(`subjectID`,`subjectGroup`,`classesID`,`subject`,`amount`,`subject_author`,`subject_code`,`teacher_name`,`create_date`,`modify_date`,`create_userID`,`create_username`,`create_usertype`) values (9,'45',NULL,'日语基础班 第一期',80000,'0','0',NULL,'2016-09-14 05:18:04','2016-10-05 06:31:56',1,'admin','Admin'),(10,'',NULL,'日语基础班 第二期',80000,'0','0',NULL,'2016-09-14 05:18:16','2016-09-14 05:18:16',1,'admin','Admin'),(11,'',NULL,'日语基础班 第三期',80000,'0','0',NULL,'2016-09-14 05:18:23','2016-09-14 05:18:23',1,'admin','Admin'),(12,'',NULL,'英语教养班 第一期',80000,'0','0',NULL,'2016-09-14 05:18:39','2016-09-14 05:18:46',1,'admin','Admin'),(13,'',NULL,'英语教养班 第二期',80000,'0','0',NULL,'2016-09-14 05:21:16','2016-09-14 05:21:16',1,'admin','Admin'),(14,'',NULL,'英语教养班 第三期',80000,'0','0',NULL,'2016-09-14 05:21:27','2016-09-14 05:21:27',1,'admin','Admin'),(15,'',NULL,'经营基础班',0,'0','0',NULL,'2016-09-14 06:03:36','2016-09-14 06:03:36',1,'admin','Admin'),(18,'',NULL,'学部校内考课程',80000,'0','0',NULL,'2016-09-14 06:04:39','2016-09-24 10:08:57',1,'admin','Admin'),(19,'',NULL,'日语进阶班 第一期',80000,'0','0',NULL,'2016-09-14 06:06:24','2016-09-14 06:06:24',1,'admin','Admin'),(20,'',NULL,'日语进阶班 第二期',80000,'0','0',NULL,'2016-09-14 06:06:31','2016-09-14 06:06:31',1,'admin','Admin'),(21,'',NULL,'日语进阶班 第三期',80000,'0','0',NULL,'2016-09-14 06:06:38','2016-09-14 06:06:38',1,'admin','Admin'),(22,'',NULL,'学部VIP 课程',8000,'0','0',NULL,'2016-09-14 06:22:01','2016-09-24 10:08:42',1,'admin','Admin'),(23,'',NULL,'大学院经营春季专业课',30000,'0','0',NULL,'2016-09-22 08:57:19','2016-09-22 08:57:19',1,'admin','Admin'),(24,'',NULL,'大学院经营秋季专业课',30000,'0','0',NULL,'2016-09-22 08:57:50','2016-09-22 08:57:50',1,'admin','Admin'),(27,'',NULL,'大学院经济春季专业课',300000,'0','0',NULL,'2016-09-22 08:59:57','2016-09-22 08:59:57',1,'admin','Admin'),(28,'',NULL,'大学院经济秋季专业课',30000,'0','0',NULL,'2016-09-22 09:00:13','2016-09-22 09:00:13',1,'admin','Admin'),(29,'',NULL,'大学院特色课学术口语',100000,'0','0',NULL,'2016-09-22 09:01:26','2016-09-22 09:01:26',1,'admin','Admin'),(30,'',NULL,'大学院特色课学术小论文',100000,'0','0',NULL,'2016-09-24 09:54:59','2016-09-24 09:54:59',14,'0','TeacherManager'),(31,'',NULL,'大学院特色课英译日',100000,'0','0',NULL,'2016-09-24 09:55:25','2016-09-24 09:55:25',14,'0','TeacherManager'),(32,'',NULL,'大学院特色课特色讲义',100000,'0','0',NULL,'2016-09-24 09:56:32','2016-09-24 09:56:32',14,'0','TeacherManager'),(33,'',NULL,'大学院文学春季班',300000,'0','0',NULL,'2016-09-24 09:57:50','2016-09-24 09:57:50',14,'0','TeacherManager'),(34,'',NULL,'大学院文学秋季班',300000,'0','0',NULL,'2016-09-24 09:58:40','2016-09-24 09:58:40',14,'0','TeacherManager'),(35,'',NULL,'大学院新闻传播春季班',300000,'0','0',NULL,'2016-09-24 09:59:17','2016-09-24 09:59:17',14,'0','TeacherManager'),(36,'',NULL,'大学院新闻传播秋季班',300000,'0','0',NULL,'2016-09-24 10:00:01','2016-09-24 10:00:01',14,'0','TeacherManager'),(37,'',NULL,'大学院政治社会春季班',300000,'0','0',NULL,'2016-09-24 10:01:28','2016-09-24 10:01:28',14,'0','TeacherManager'),(38,'',NULL,'大学院日本语教育春季班',300000,'0','0',NULL,'2016-09-24 10:02:04','2016-09-24 10:02:04',14,'0','TeacherManager'),(39,'',NULL,'大学院日本语教育秋季班',300000,'0','0',NULL,'2016-09-24 10:02:38','2016-09-24 10:02:50',14,'0','TeacherManager'),(40,'',NULL,'大学院政治社会秋季班',300000,'0','0',NULL,'2016-09-24 10:03:30','2016-09-24 10:03:30',14,'0','TeacherManager'),(41,'',NULL,'日语留考对策班第一期',100000,'0','0',NULL,'2016-09-24 10:04:01','2016-09-24 10:04:01',14,'0','TeacherManager'),(42,'',NULL,'日语留考对策班第二期',100000,'0','0',NULL,'2016-09-24 10:04:17','2016-09-24 10:04:32',14,'0','TeacherManager'),(43,'',NULL,'学部文科基础班第一期',70000,'0','0',NULL,'2016-09-24 10:05:06','2016-09-24 10:05:06',14,'0','TeacherManager'),(44,'',NULL,'学部文科基础班第二期',70000,'0','0',NULL,'2016-09-24 10:05:16','2016-09-24 10:05:16',14,'0','TeacherManager'),(45,'',NULL,'学部文科基础班第三期',70000,'0','0',NULL,'2016-09-24 10:05:25','2016-09-24 10:05:25',14,'0','TeacherManager'),(46,'',NULL,'学部文科留考对策班第一期',100000,'0','0',NULL,'2016-09-24 10:05:46','2016-09-24 10:05:46',14,'0','TeacherManager'),(47,'',NULL,'学部文科留考对策班第二期',100000,'0','0',NULL,'2016-09-24 10:06:14','2016-09-24 10:06:14',14,'0','TeacherManager'),(48,'',NULL,'学部理科基础班第一期',70000,'0','0',NULL,'2016-09-24 10:06:34','2016-09-24 10:06:34',14,'0','TeacherManager'),(49,'',NULL,'学部理科基础班第二期',70000,'0','0',NULL,'2016-09-24 10:06:57','2016-09-24 10:06:57',14,'0','TeacherManager'),(50,'',NULL,'学部理科基础班第三期',70000,'0','0',NULL,'2016-09-24 10:07:11','2016-09-24 10:07:11',14,'0','TeacherManager'),(51,'',NULL,'学部理科留考对策班第一期',100000,'0','0',NULL,'2016-09-24 10:07:37','2016-09-24 10:07:37',14,'0','TeacherManager'),(52,'',NULL,'学部理科留考对策班第二期',100000,'0','0',NULL,'2016-09-24 10:07:54','2016-09-24 10:07:54',14,'0','TeacherManager'),(53,'',NULL,'普通大学院VIP课程',10000,'0','0',NULL,'2016-09-24 10:09:37','2016-09-24 10:09:37',14,'0','TeacherManager'),(54,'',NULL,'尊贵大学院VIP课程',12000,'0','0',NULL,'2016-09-24 10:09:57','2016-09-24 10:09:57',14,'0','TeacherManager'),(55,'',NULL,'学部美术通年（一周3日コース）',650000,'0','0',NULL,'2016-09-24 10:10:48','2016-09-24 10:11:27',14,'0','TeacherManager'),(56,'',NULL,'学部美术通年（一周5日コース）',850000,'0','0',NULL,'2016-09-24 10:11:16','2016-09-24 10:11:16',14,'0','TeacherManager'),(57,'',NULL,'学部美术平日班１ヶ月',90000,'0','0',NULL,'2016-09-24 10:26:51','2016-09-24 10:26:51',14,'0','TeacherManager'),(58,'',NULL,'学部美术周末班１ヶ月',80000,'0','0',NULL,'2016-09-24 10:27:06','2016-09-24 10:27:06',14,'0','TeacherManager'),(59,'',NULL,'学部美术平日班3ヶ月',240000,'0','0',NULL,'2016-09-24 10:27:26','2016-09-24 10:27:26',14,'0','TeacherManager'),(60,'',NULL,'学部美术周末班3ヶ月',220000,'0','0',NULL,'2016-09-24 10:27:50','2016-09-24 10:27:50',14,'0','TeacherManager'),(61,'',NULL,'学部美术平日班6ヶ月',480000,'0','0',NULL,'2016-09-24 10:28:14','2016-09-24 10:28:14',14,'0','TeacherManager'),(62,'',NULL,'学部美术周末班6ヶ月',450000,'0','0',NULL,'2016-09-24 10:28:25','2016-09-24 10:28:25',14,'0','TeacherManager'),(63,'',NULL,'大学院美术３ヶ月',240000,'0','0',NULL,'2016-09-24 10:29:22','2016-09-24 10:29:22',14,'0','TeacherManager'),(64,'',NULL,'大学院美术6ヶ月',400000,'0','0',NULL,'2016-09-24 10:29:40','2016-09-24 10:29:40',14,'0','TeacherManager'),(65,'',NULL,'大学院美术通年',650000,'0','0',NULL,'2016-09-24 10:30:00','2016-09-24 10:30:00',14,'0','TeacherManager'),(66,'',NULL,'至尊大学院VIP',15000,'0','0',NULL,'2016-09-24 10:30:48','2016-09-24 10:30:48',14,'0','TeacherManager'),(67,'',NULL,'英语托福班第一期',70000,'0','0',NULL,'2016-09-24 10:41:31','2016-09-24 10:41:31',14,'0','TeacherManager'),(68,'',NULL,'英语托福班第二期',70000,'0','0',NULL,'2016-09-24 10:41:42','2016-09-24 10:41:42',14,'0','TeacherManager'),(69,'',NULL,'日语N1冲刺班第一期',70000,'0','0',NULL,'2016-09-27 08:25:27','2016-09-27 08:25:43',14,'0','TeacherManager'),(70,'',NULL,'日语N1冲刺班第二期',70000,'0','0',NULL,'2016-09-27 08:26:02','2016-09-27 08:26:02',14,'0','TeacherManager'),(71,'',NULL,'通年词汇课程',70000,'0','0',NULL,'2016-09-28 05:05:57','2016-09-28 05:05:57',14,'0','TeacherManager'),(72,'0',NULL,'测试',1222,'0','0',NULL,'2016-10-05 06:20:26','2016-10-05 06:20:26',1,'admin','Admin'),(73,'0',NULL,'测试11',333,'0','0',NULL,'2016-10-05 06:22:09','2016-10-05 06:22:09',1,'admin','Admin'),(74,'1',NULL,'３３３',111,'0','0',NULL,'2016-10-05 06:28:37','2016-10-05 06:28:37',1,'admin','Admin'),(75,'45',NULL,'ffff',111,'0','0',NULL,'2016-10-05 06:30:19','2016-10-05 06:30:19',1,'admin','Admin');

/*Table structure for table `subject_teacher_details` */

DROP TABLE IF EXISTS `subject_teacher_details`;

CREATE TABLE `subject_teacher_details` (
  `subjectID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`subjectID`,`teacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `subject_teacher_details` */

insert  into `subject_teacher_details`(`subjectID`,`teacherID`,`name`) values (1,1,'王老师'),(1,2,'岳老师ｄｄｄ'),(1,3,'岳老师2'),(4,2,'岳老师ｄｄｄ'),(5,3,'岳老师2'),(6,1,'王老师'),(7,4,'ces'),(8,5,'教师测试'),(9,35,'严笑笑');

/*Table structure for table `systemadmin` */

DROP TABLE IF EXISTS `systemadmin`;

CREATE TABLE `systemadmin` (
  `systemadminID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `systemadminactive` int(11) NOT NULL,
  `systemadminextra1` varchar(128) DEFAULT NULL,
  `systemadminextra2` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`systemadminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `systemadmin` */

insert  into `systemadmin`(`systemadminID`,`name`,`dob`,`sex`,`religion`,`email`,`phone`,`address`,`jod`,`photo`,`username`,`password`,`usertype`,`create_date`,`modify_date`,`create_userID`,`create_username`,`create_usertype`,`systemadminactive`,`systemadminextra1`,`systemadminextra2`) values (1,'管理员','2011-01-01','Male','Unknown','admin@yahoo.co.jp','09090909','','2016-04-07','defualt.png','admin','397d43537a11e68c7f339edfe6a7d7b9aad49600bff6ec3f0e657ab399f9079405137f4711a755fd339a8dd55d5dea2a03eac462532c77d6825502e0e366a8e5','Admin','2016-04-07 09:52:36','2016-04-07 09:52:36',0,'admin','Admin',1,'','');

/*Table structure for table `tattendance` */

DROP TABLE IF EXISTS `tattendance`;

CREATE TABLE `tattendance` (
  `tattendanceID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `teacherID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `work_time` varchar(10) NOT NULL DEFAULT '0',
  `tattendancetype` varchar(1) NOT NULL DEFAULT '0',
  `teacher_transport_ID` varchar(30) NOT NULL DEFAULT '0',
  `teacher_transport_amount` int(11) NOT NULL DEFAULT '0',
  `work_note` varchar(200) NOT NULL,
  `wage` int(11) NOT NULL DEFAULT '0',
  `classesID` int(11) DEFAULT NULL,
  `sectionID` int(11) DEFAULT NULL,
  `subjectID` int(11) DEFAULT NULL,
  `verifyflg` varchar(1) NOT NULL DEFAULT '0',
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`tattendanceID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tattendance` */

insert  into `tattendance`(`tattendanceID`,`teacherID`,`usertype`,`monthyear`,`date`,`start_time`,`end_time`,`work_time`,`tattendancetype`,`teacher_transport_ID`,`teacher_transport_amount`,`work_note`,`wage`,`classesID`,`sectionID`,`subjectID`,`verifyflg`,`a1`,`a2`,`a3`,`a4`,`a5`,`a6`,`a7`,`a8`,`a9`,`a10`,`a11`,`a12`,`a13`,`a14`,`a15`,`a16`,`a17`,`a18`,`a19`,`a20`,`a21`,`a22`,`a23`,`a24`,`a25`,`a26`,`a27`,`a28`,`a29`,`a30`,`a31`) values (1,3,'Teacher','05-2016','0000-00-00','','','0','0','0',0,'',0,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,5,'Teacher','09-20','2016-09-20','','','0','0','0',0,'',0,0,0,0,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,6,'Teacher','09-20','2016-09-20','','','0','2','0',0,'',0,0,0,0,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,11,'Teacher','2016-09','2016-09-28','18:00','21:00','0','1','0',0,'',0,16,0,10,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,7,'Teacher','2016-09','2016-09-28','22:00','23:00','0','1','0',0,'',0,16,0,9,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,11,'Teacher','2016-09','2016-09-28','21:15','23:15','0','2','0',0,'',0,0,0,0,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,11,'Teacher','2016-09','2016-09-28','23:45','23:45','0','0','0',0,'',0,0,0,0,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,11,'Teacher','2016-10','2016-10-03','16:00','18:00','0','1','0',0,'',0,0,0,0,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,11,'Teacher','2016-10','2016-10-03','17:15','20:15','0','1','0',0,'',0,0,0,0,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `teacher` */

DROP TABLE IF EXISTS `teacher`;

CREATE TABLE `teacher` (
  `teacherID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `designation` varchar(128) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `wage_type` int(11) NOT NULL,
  `fixed_remuneration` int(11) NOT NULL,
  `affairs_timing_remuneration` int(11) NOT NULL DEFAULT '0',
  `lecture_timing_remuneration` int(11) NOT NULL DEFAULT '0',
  `vip_timing_remuneration` int(11) NOT NULL DEFAULT '0',
  `teachertype` varchar(25) DEFAULT NULL,
  `bankname` varchar(200) DEFAULT NULL,
  `bankbranch` varchar(200) DEFAULT NULL,
  `bankaccount` varchar(200) DEFAULT NULL,
  `bankaccountname` varchar(200) DEFAULT NULL,
  `teacherschool` varchar(100) DEFAULT NULL,
  `teacherspecial` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `usertype` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `teacheractive` int(11) NOT NULL,
  PRIMARY KEY (`teacherID`),
  KEY `teachertype` (`teachertype`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

/*Data for the table `teacher` */

insert  into `teacher`(`teacherID`,`name`,`designation`,`dob`,`sex`,`religion`,`email`,`phone`,`address`,`jod`,`wage_type`,`fixed_remuneration`,`affairs_timing_remuneration`,`lecture_timing_remuneration`,`vip_timing_remuneration`,`teachertype`,`bankname`,`bankbranch`,`bankaccount`,`bankaccountname`,`teacherschool`,`teacherspecial`,`photo`,`username`,`password`,`usertype`,`create_date`,`modify_date`,`create_userID`,`create_username`,`create_usertype`,`teacheractive`) values (7,'name7','0','1970-01-01','男','0','test7@gmail.com','','','2014-11-01',3,200000,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-21 08:28:16','2016-09-28 05:49:04',1,'admin','Admin',1),(11,'name11','0','1970-01-01','男','0','test11@gmail.com','','','2016-09-27',3,0,1000,3000,0,'Teacher','','','','','','','defualt.png','0','79c18b9c362725b60cd8d0ca8b682f8adbe6ecd8b4c05d4b5292e30190041b92096c689e861cf5054f1b3a441fe9f50a91867eb358cae8c47baf26e42556a536','Teacher','2016-09-28 09:44:20','2016-09-28 09:44:20',1,'admin','Admin',1),(12,'name12','0','1990-10-24','男','0','test12@gmail.com','8038505267','','2014-11-01',3,20000,0,0,0,'Salesman','','','','','','','defualt.png','hanjin','79c18b9c362725b60cd8d0ca8b682f8adbe6ecd8b4c05d4b5292e30190041b92096c689e861cf5054f1b3a441fe9f50a91867eb358cae8c47baf26e42556a536','Salesman','2016-09-21 08:29:29','2016-09-21 08:33:48',1,'admin','Admin',1),(13,'name13','0','2010-02-01','男','0','test13@gmail.com','','','2016-09-27',3,20000,0,0,0,'Receptionist','','','','','','','defualt.png','hjiuy','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Receptionist','2016-09-21 09:11:29','2016-09-21 09:11:29',1,'admin','Admin',1),(14,'name14','0','1993-09-15','男','0','test14@gmail.com','08047898805','','2014-11-01',3,20000,0,0,0,'TeacherManager','','','','','','','defualt.png','0','082a3fc043eee2e687d08470e65f9f072ee3304d917d3c48dc1471ab3631cb43acf6a9410c865dd7d098b0e13294536471106ab44d7003d8bc238387df1676ce','TeacherManager','2016-09-22 12:42:05','2016-09-23 06:21:04',1,'admin','Admin',1),(19,'name19','0','1970-01-01','女','0','test19@gmail.com','','','2016-04-03',3,30000,0,0,0,'Salesman','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 07:07:40','2016-09-30 07:07:40',1,'admin','Admin',0),(22,'name22','0','1970-01-01','男','0','test22@gmail.com','','','2016-03-20',3,30000,0,0,0,'Salesman','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 07:17:21','2016-10-03 10:54:07',1,'admin','Admin',0),(23,'name23','0','1970-01-01','女','0','test23@gmail.com','','','2016-04-01',3,30000,0,0,0,'Salesman','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 08:01:22','2016-10-03 11:06:22',1,'admin','Admin',0),(24,'name24','0','1970-01-01','女','0','test24@gmail.com','','','2016-04-29',3,0,1000,0,0,'Receptionist','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 08:03:31','2016-10-03 10:54:37',1,'admin','Admin',0),(25,'name25','0','1970-01-01','女','0','test25@gmail.com','','','2016-05-21',3,0,1000,0,0,'Receptionist','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 09:36:18','2016-10-03 11:06:49',1,'admin','Admin',0),(26,'name26','0','1970-01-01','女','0','test26@gmail.com','','','2016-04-01',3,0,1000,0,0,'Receptionist','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 09:50:02','2016-10-03 10:54:16',1,'admin','Admin',0),(27,'name27','0','1970-01-01','女','0','test27@gmail.com','','','2015-08-01',3,0,1000,0,0,'Receptionist','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 09:53:02','2016-10-03 11:06:35',1,'admin','Admin',0),(28,'name28','0','1970-01-01','男','0','test28@gmail.com','','','2016-07-01',3,0,1000,0,0,'Receptionist','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 09:56:36','2016-10-03 11:07:06',1,'admin','Admin',0),(29,'name29','0','1970-01-01','男','0','test29@gmail.com','','','2016-09-01',3,0,0,0,0,'TeacherManager','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 09:59:10','2016-10-03 11:07:29',1,'admin','Admin',0),(30,'name30','0','1970-01-01','男','0','test30@gmail.com','','','2016-09-01',3,0,0,0,0,'TeacherManager','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 10:11:58','2016-10-03 10:53:56',1,'admin','Admin',0),(31,'name31','0','1970-01-01','男','0','test31@gmail.com','','','2016-04-20',3,150000,0,0,0,'TeacherManager','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 10:14:58','2016-10-03 10:54:47',1,'admin','Admin',0),(32,'name32','0','1970-01-01','女','0','test32@gmail.com','','','2015-10-01',3,150000,0,0,0,'TeacherManager','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-09-30 10:16:19','2016-10-03 11:07:42',1,'admin','Admin',0),(33,'name33','0','1970-01-01','男','0','test33@gmail.com','','','1990-01-01',3,0,0,0,0,'TeacherManager','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:09:31','2016-10-03 10:53:49',1,'admin','Admin',0),(34,'name34','0','1970-01-01','男','0','test34@gmail.com','','','2015-12-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:13:00','2016-10-03 10:13:00',1,'admin','Admin',0),(35,'name35','0','1970-01-01','女','0','test35@gmail.com','','','2014-11-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:23:14','2016-10-05 12:25:37',1,'admin','Admin',0),(36,'name36','0','1970-01-01','女','0','test36@gmail.com','','','2014-11-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:24:52','2016-10-03 10:24:52',1,'admin','Admin',0),(37,'name37','0','1970-01-01','男','0','test37@gmail.com','','','2015-01-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:26:01','2016-10-03 10:26:01',1,'admin','Admin',0),(38,'name38','0','1970-01-01','男','0','test38@gmail.com','','','2014-11-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:27:35','2016-10-03 10:27:35',1,'admin','Admin',0),(39,'name39','0','1970-01-01','女','0','test39@gmail.com','','','2015-01-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:28:34','2016-10-03 10:28:34',1,'admin','Admin',0),(40,'name40','0','1970-01-01','男','0','test40@gmail.com','','','2014-11-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:36:16','2016-10-03 10:36:16',1,'admin','Admin',0),(41,'name41','0','1970-01-01','男','0','test41@gmail.com','','','2014-11-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:37:14','2016-10-03 10:37:14',1,'admin','Admin',0),(42,'name42','0','1970-01-01','男','0','test42@gmail.com','','','2015-10-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:39:17','2016-10-03 10:39:17',1,'admin','Admin',0),(43,'name43','0','1970-01-01','男','0','test43@gmail.com','','','2015-10-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:40:19','2016-10-03 10:40:19',1,'admin','Admin',0),(44,'name44','0','1970-01-01','男','0','test44@gmail.com','','','2016-01-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:41:28','2016-10-03 10:41:28',1,'admin','Admin',0),(45,'name45','0','1970-01-01','男','0','test45@gmail.com','','','2016-04-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:43:17','2016-10-03 10:43:17',1,'admin','Admin',0),(46,'name46','0','1970-01-01','男','0','test46@gmail.com','','','2016-04-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:44:24','2016-10-03 10:44:24',1,'admin','Admin',0),(47,'name47','0','1970-01-01','女','0','test47@gmail.com','','','2016-03-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:45:28','2016-10-03 10:45:28',1,'admin','Admin',0),(48,'name48','0','1970-01-01','女','0','test48@gmail.com','','','2016-05-01',3,0,0,0,0,'TeacherManager','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:46:56','2016-10-03 10:46:56',1,'admin','Admin',0),(49,'name49','0','1970-01-01','女','0','test49@gmail.com','','','2016-04-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:49:11','2016-10-03 10:49:11',1,'admin','Admin',0),(50,'name50','0','1970-01-01','女','0','test50@gmail.com','','','2016-05-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:50:28','2016-10-03 10:50:28',1,'admin','Admin',0),(51,'name51','0','1970-01-01','女','0','test51@gmail.com','','','2016-04-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 10:51:09','2016-10-03 10:51:09',1,'admin','Admin',0),(52,'name52','0','1970-01-01','男','0','test52@gmail.com','','','2016-06-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 11:09:01','2016-10-03 11:09:01',1,'admin','Admin',0),(53,'name53','0','1970-01-01','男','0','test53@gmail.com','','','2016-08-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 11:10:19','2016-10-03 11:10:19',1,'admin','Admin',0),(54,'name54','0','1970-01-01','男','0','test54@gmail.com','','','2016-07-31',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 11:10:52','2016-10-03 11:10:52',1,'admin','Admin',0),(55,'name55','0','1970-01-01','女','0','test55@gmail.com','','','2016-08-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 11:11:41','2016-10-03 11:11:41',1,'admin','Admin',0),(56,'name56','0','1970-01-01','男','0','test56@gmail.com','','','2016-09-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-03 11:12:27','2016-10-03 11:12:27',1,'admin','Admin',0),(57,'name57','0','1970-01-01','男','0','test57@gmail.com','','','2015-10-01',3,0,0,0,0,'TeacherManager','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-04 08:47:23','2016-10-04 08:47:23',1,'admin','Admin',0),(58,'name58','0','1970-01-01','男','0','test58@gmail.com','','','2016-09-29',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-04 08:50:43','2016-10-04 08:50:43',1,'admin','Admin',0),(59,'name59','0','1970-01-01','男','0','test59@gmail.com','','','2016-07-01',3,0,0,0,0,'Receptionist','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-04 08:52:44','2016-10-04 08:52:44',1,'admin','Admin',0),(60,'name60','0','1970-01-01','女','0','test60@gmail.com','','','2016-08-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-04 08:54:05','2016-10-04 08:54:05',1,'admin','Admin',0),(61,'name61','0','1970-01-01','男','0','test61@gmail.com','','','2016-09-01',3,0,0,0,0,'TeacherManager','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-04 08:55:59','2016-10-04 08:55:59',1,'admin','Admin',0),(62,'name62','0','1970-01-01','女','0','test62@gmail.com','','','2016-08-01',3,0,0,0,0,'Teacher','','','','','','','defualt.png','0','d1f84adaaca8ad28f10990bdfa4fad316a58551091116ce8bb2294fe6e900f7a3ebfdd2ec140481b6bae7255e6cf75f361c5dab9f67d29a64c12d7b14e9bae10','Teacher','2016-10-04 08:59:57','2016-10-04 08:59:57',1,'admin','Admin',0);

/*Table structure for table `teacher_transport` */

DROP TABLE IF EXISTS `teacher_transport`;

CREATE TABLE `teacher_transport` (
  `teacher_transport_ID` int(11) NOT NULL AUTO_INCREMENT,
  `teacherID` int(11) NOT NULL,
  `transport_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `start_station` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `end_station` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fare` int(11) NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `createusername` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`teacher_transport_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `teacher_transport` */

/*Table structure for table `tmember` */

DROP TABLE IF EXISTS `tmember`;

CREATE TABLE `tmember` (
  `tmemberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `transportID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `tbalance` varchar(11) DEFAULT NULL,
  `tjoindate` date NOT NULL,
  PRIMARY KEY (`tmemberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tmember` */

/*Table structure for table `transport` */

DROP TABLE IF EXISTS `transport`;

CREATE TABLE `transport` (
  `transportID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `route` text NOT NULL,
  `vehicle` int(11) NOT NULL,
  `fare` varchar(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`transportID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transport` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `useractive` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

/*Table structure for table `visitorinfo` */

DROP TABLE IF EXISTS `visitorinfo`;

CREATE TABLE `visitorinfo` (
  `visitorID` bigint(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `email_id` varchar(128) DEFAULT NULL,
  `phone` text NOT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `company_name` varchar(128) DEFAULT NULL,
  `coming_from` varchar(128) DEFAULT NULL,
  `to_meet` varchar(128) DEFAULT NULL,
  `representing` varchar(128) DEFAULT NULL,
  `to_meet_personID` int(11) NOT NULL,
  `to_meet_person_usertype` varchar(40) NOT NULL,
  `check_in` timestamp NULL DEFAULT NULL,
  `check_out` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`visitorID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `visitorinfo` */

insert  into `visitorinfo`(`visitorID`,`name`,`email_id`,`phone`,`photo`,`company_name`,`coming_from`,`to_meet`,`representing`,`to_meet_personID`,`to_meet_person_usertype`,`check_in`,`check_out`,`status`) values (1,'','','','visitor270620621.jpeg','','','学生测试','vendor',1,'Student','2016-04-26 04:05:04',NULL,0);

/*Table structure for table `wage` */

DROP TABLE IF EXISTS `wage`;

CREATE TABLE `wage` (
  `wageID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teacherID` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `wage_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `yearMonth` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `transportTotal` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`wageID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `wage` */

insert  into `wage`(`wageID`,`teacherID`,`name`,`wage_type`,`yearMonth`,`total`,`transportTotal`,`status`) values (1,35,'严笑笑','3','2016-09',0,0,4),(2,38,'于暠','3','2016-09',0,0,4),(3,54,'刘书戬','3','2016-09',0,0,4),(4,56,'刘彬','3','2016-09',0,0,4),(5,58,'刘彬','3','2016-09',0,0,4),(6,33,'史昊','3','2016-09',0,0,4),(7,41,'吴江','3','2016-09',0,0,4),(8,30,'吴洪森','3','2016-09',0,0,4),(9,22,'周天杰','3','2016-09',30000,0,4),(10,46,'夏寒','3','2016-09',0,0,4),(11,26,'姜雨佩','3','2016-09',0,0,4),(12,24,'孙璇','3','2016-09',0,0,4),(13,31,'宋翰祥','3','2016-09',150000,0,4),(14,49,'嶋田彩乃','3','2016-09',0,0,4),(15,28,'张征宇','3','2016-09',0,0,4),(16,27,'张悦','3','2016-09',0,0,4),(17,48,'张晶','3','2016-09',0,0,4),(18,23,'徐晨','3','2016-09',30000,0,4),(19,37,'徐智铭','3','2016-09',0,0,4),(20,39,'易方圆','3','2016-09',0,0,4),(21,25,'易珏卉','3','2016-09',0,0,4),(22,61,'李凡','3','2016-09',0,0,4),(23,34,'李晨君','3','2016-09',0,0,4),(24,7,'李路成','3','2016-09',0,0,6),(25,60,'杨馥瑀','3','2016-09',0,0,4),(26,43,'林晨光','3','2016-09',0,0,4),(27,62,'柳杨','3','2016-09',0,0,4),(28,59,'柳笛','3','2016-09',0,0,4),(29,47,'梁颖琦','3','2016-09',0,0,4),(30,52,'汤迪威','3','2016-09',0,0,4),(31,55,'王 祎恬','3','2016-09',0,0,4),(32,36,'王思涵','3','2016-09',0,0,4),(33,44,'王琛','3','2016-09',0,0,4),(34,29,'窦宏运','3','2016-09',0,0,4),(35,14,'胡海琛','3','2016-09',20000,0,4),(36,53,'赵恒伟','3','2016-09',0,0,4),(37,32,'邱敬雯','3','2016-09',150000,0,4),(38,57,'邹圣杰','3','2016-09',0,0,4),(39,50,'邹珊珊','3','2016-09',0,0,4),(40,42,'邹进','3','2016-09',0,0,4),(41,51,'郭欣','3','2016-09',0,0,4),(42,19,'闫杨','3','2016-09',30000,0,4),(43,45,'陈思源','3','2016-09',0,0,4),(44,11,'韩进','3','2016-09',0,0,6),(45,12,'韩进','3','2016-09',20000,0,4),(46,13,'韩进2','3','2016-09',20000,0,4),(47,40,'高启欣','3','2016-09',0,0,4);

/*Table structure for table `wage_details` */

DROP TABLE IF EXISTS `wage_details`;

CREATE TABLE `wage_details` (
  `wageDetailsID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wageID` int(11) NOT NULL,
  `tattendanceID` int(11) DEFAULT NULL,
  `teacherID` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `yearMonth` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `typeOfWork` int(11) NOT NULL,
  `workingHours` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `wageType` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `operator` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`wageDetailsID`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `wage_details` */

insert  into `wage_details`(`wageDetailsID`,`wageID`,`tattendanceID`,`teacherID`,`name`,`yearMonth`,`typeOfWork`,`workingHours`,`wageType`,`amount`,`total`,`note`,`operator`) values (29,1,0,35,'严笑笑','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(30,2,0,38,'于暠','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(31,3,0,54,'刘书戬','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(32,4,0,56,'刘彬','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(33,5,0,58,'刘彬','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(34,6,0,33,'史昊','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(35,7,0,41,'吴江','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(36,8,0,30,'吴洪森','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(37,9,0,22,'周天杰','2016-09',99,'0',1,0,30000,'自动计算（基本给）','管理员'),(38,10,0,46,'夏寒','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(39,11,0,26,'姜雨佩','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(40,12,0,24,'孙璇','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(41,13,0,31,'宋翰祥','2016-09',99,'0',1,0,150000,'自动计算（基本给）','管理员'),(42,14,0,49,'嶋田彩乃','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(43,15,0,28,'张征宇','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(44,16,0,27,'张悦','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(45,17,0,48,'张晶','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(46,18,0,23,'徐晨','2016-09',99,'0',1,0,30000,'自动计算（基本给）','管理员'),(47,19,0,37,'徐智铭','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(48,20,0,39,'易方圆','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(49,21,0,25,'易珏卉','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(50,22,0,61,'李凡','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(51,23,0,34,'李晨君','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(52,24,0,7,'李路成','2016-09',99,'0',1,0,200000,'自动计算（基本给）','管理员'),(53,25,0,60,'杨馥瑀','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(54,26,0,43,'林晨光','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(55,27,0,62,'柳杨','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(56,28,0,59,'柳笛','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(57,29,0,47,'梁颖琦','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(58,30,0,52,'汤迪威','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(59,31,0,55,'王 祎恬','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(60,32,0,36,'王思涵','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(61,33,0,44,'王琛','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(62,34,0,29,'窦宏运','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(63,35,0,14,'胡海琛','2016-09',99,'0',1,0,20000,'自动计算（基本给）','管理员'),(64,36,0,53,'赵恒伟','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(65,37,0,32,'邱敬雯','2016-09',99,'0',1,0,150000,'自动计算（基本给）','管理员'),(66,38,0,57,'邹圣杰','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(67,39,0,50,'邹珊珊','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(68,40,0,42,'邹进','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(69,41,0,51,'郭欣','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(70,42,0,19,'闫杨','2016-09',99,'0',1,0,30000,'自动计算（基本给）','管理员'),(71,43,0,45,'陈思源','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(72,44,0,11,'韩进','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员'),(73,45,0,12,'韩进','2016-09',99,'0',1,0,20000,'自动计算（基本给）','管理员'),(74,46,0,13,'韩进2','2016-09',99,'0',1,0,20000,'自动计算（基本给）','管理员'),(75,47,0,40,'高启欣','2016-09',99,'0',1,0,0,'自动计算（基本给）','管理员');

/*Table structure for table `wage_status` */

DROP TABLE IF EXISTS `wage_status`;

CREATE TABLE `wage_status` (
  `wageStatusID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `yearMonth` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`wageStatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `wage_status` */

insert  into `wage_status`(`wageStatusID`,`yearMonth`,`status`) values (40,'2016-09',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
