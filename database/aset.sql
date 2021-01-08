/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - aset
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aset` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `aset`;

/*Table structure for table `tb_review` */

DROP TABLE IF EXISTS `tb_review`;

CREATE TABLE `tb_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aset` int(11) DEFAULT NULL,
  `file_eviden` text,
  `ext_file` text,
  `path_file` text,
  `ket` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_review` */

insert  into `tb_review`(`id`,`id_aset`,`file_eviden`,`ext_file`,`path_file`,`ket`,`created_at`,`updated_at`,`deleted_at`) values 
(1,NULL,'MEMO KETERLAMBATAN.pdf','pdf','attachment_eviden/snW5jCgBbw8VY3YjXcv2gmxa1vVPxdJgzlpl6TSJ.pdf',NULL,'2019-10-17 05:32:04','2019-10-17 05:32:04',NULL),
(2,1,'Crystal Reports - temp_175a3601-33f7-4fc3-b84a-c57a6d2870cf.rpt.pdf','pdf','attachment_eviden/8PXUoMo3RbH4Zckld0yw6DmzKKMNf8XJoBO6HlNm.pdf',NULL,'2019-11-02 07:24:24','2019-11-02 07:24:24',NULL),
(3,1,'GENERIC25BW120181025122237.pdf','pdf','attachment_eviden/TD8Jsq1iEJ2Nfk8QxZ71CKVmDV30NwL4RSku9P3W.pdf','surat masuk ke BPN','2019-11-02 07:31:21','2019-11-02 07:31:21',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
