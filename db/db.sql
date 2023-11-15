/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.9 : Database - tuition_center
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tuition_center` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tuition_center`;

/*Table structure for table `batch` */

DROP TABLE IF EXISTS `batch`;

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch` varchar(30) DEFAULT NULL,
  `amount` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `batch` */

insert  into `batch`(`batch_id`,`batch`,`amount`) values (2,'Kelly Graves','100');

/*Table structure for table `class_schedule` */

DROP TABLE IF EXISTS `class_schedule`;

CREATE TABLE `class_schedule` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `s_time` varchar(30) DEFAULT NULL,
  `e_time` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `class_schedule` */

insert  into `class_schedule`(`class_id`,`tutor_id`,`subject_id`,`date`,`s_time`,`e_time`,`status`) values (1,1,2,'2020-12-28','12:45 pm','01:45 pm','NA'),(2,1,2,'2020-12-28','01:46 pm','02:46 pm','NA'),(3,1,2,'2020-12-29','10:45 am','11:45 am','NA');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `user_type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`user_type`) values (1,'joze@mailinator.com','1234','parents'),(2,'admin','admin','admin'),(3,'wynexu@mailinator.com','1234','tutor'),(5,'kutavu@mailinator.com','12345','student');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` varchar(30) DEFAULT NULL,
  `date_time` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `message` */

insert  into `message`(`message_id`,`sender_id`,`receiver_id`,`message`,`date_time`) values (1,3,1,'vjd','2020-12-29'),(2,3,5,'srjhb','2020-12-29'),(3,5,3,'fg','2020-12-29'),(4,1,3,'sgs','2020-12-29');

/*Table structure for table `notes` */

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `notes` */

insert  into `notes`(`note_id`,`class_id`,`name`,`file_path`) values (3,1,'sa','uploads/5fe9fd718292d.jpg');

/*Table structure for table `parents` */

DROP TABLE IF EXISTS `parents`;

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `place` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `parents` */

insert  into `parents`(`parent_id`,`login_id`,`first_name`,`last_name`,`phone`,`email`,`place`) values (1,1,'Ezekiel','Gomez','+1 (936) 616-9908','joze@mailinator.com','Eiusmod sunt accusan');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `amount` varchar(30) DEFAULT NULL,
  `date_time` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `payment` */

insert  into `payment`(`payment_id`,`student_id`,`batch_id`,`amount`,`date_time`) values (1,2,2,'100','2020-12-28 15:18:01');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `standard_studying` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `student` */

insert  into `student`(`student_id`,`login_id`,`parent_id`,`batch_id`,`first_name`,`last_name`,`standard_studying`,`phone`,`email`) values (2,5,1,2,'Evangeline','Bernard','Quas eos recusandae','+1 (982) 826-2616','kutavu@mailinator.com');

/*Table structure for table `studentattendance` */

DROP TABLE IF EXISTS `studentattendance`;

CREATE TABLE `studentattendance` (
  `studentattendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_time` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`studentattendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `studentattendance` */

insert  into `studentattendance`(`studentattendance_id`,`class_id`,`student_id`,`date_time`,`status`) values (2,1,2,'2020-12-28','Absent');

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` varchar(30) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `subjects` */

insert  into `subjects`(`subject_id`,`batch_id`,`title`,`description`) values (2,'2','Veniam in non minim','Dolorum minima perfe');

/*Table structure for table `teacherattendance` */

DROP TABLE IF EXISTS `teacherattendance`;

CREATE TABLE `teacherattendance` (
  `teacherattendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `date_time` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`teacherattendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `teacherattendance` */

insert  into `teacherattendance`(`teacherattendance_id`,`teacher_id`,`date_time`,`status`) values (1,1,'2020-12-28','Present');

/*Table structure for table `tutors` */

DROP TABLE IF EXISTS `tutors`;

CREATE TABLE `tutors` (
  `tutor_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`tutor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tutors` */

insert  into `tutors`(`tutor_id`,`login_id`,`first_name`,`last_name`,`phone`,`email`) values (1,3,'Tatiana','Gomez','+1 (613) 947-9207','wycy@mailinator.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
