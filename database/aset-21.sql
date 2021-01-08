/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - aset
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

/*Table structure for table `data_aset` */

DROP TABLE IF EXISTS `data_aset`;

CREATE TABLE `data_aset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_dokumen` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_sertifikat` int(11) DEFAULT NULL,
  `nama_lokasi` varchar(100) DEFAULT NULL,
  `nama_desa` text,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `satuan_area` enum('1','2') DEFAULT NULL,
  `luas_areal` varchar(50) DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `file` text,
  `ext_file` text,
  `path_file` text,
  `file_peta_bidang` text,
  `ext_file_peta` text,
  `path_file_peta` text,
  `tgl_notifikasi` date DEFAULT NULL,
  `is_reviewed` enum('1','2') DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `data_aset` */

insert  into `data_aset`(`id`,`id_dokumen`,`nama`,`no_sertifikat`,`nama_lokasi`,`nama_desa`,`kecamatan`,`kabupaten`,`satuan_area`,`luas_areal`,`tanggal_awal`,`tanggal_akhir`,`file`,`ext_file`,`path_file`,`file_peta_bidang`,`ext_file_peta`,`path_file_peta`,`tgl_notifikasi`,`is_reviewed`,`created_at`,`updated_at`,`deleted_at`) values 
(1,1,'WARNASARI',21,'AFD WARNASARI','TAMBAKSARI','WANAREJA','CILACAP','2','1506498','2011-11-21','2036-11-21','21 Wawanareja.pdf','pdf','attachment/fRjUjTTgNV1ANUC0AgvoOxqrVC6TT6HGo4BfFZUf.pdf',NULL,NULL,NULL,'2034-11-21',NULL,'2019-09-03 07:08:23','2019-09-03 07:08:23',NULL),
(2,1,'WARNASARI',22,'AFD WARNASARI','TAMBAKSARI','WANAREJA','CILACAP','2','441070','2011-11-21','2036-11-21','HGU Warnasari [ALL]-halaman-8-13.pdf','pdf','attachment/BIl9tT8wLbBPDzRq1l4XRWOQLJ4LMdDNEMowRqyK.pdf',NULL,NULL,NULL,'2034-11-21',NULL,'2019-09-03 07:11:46','2019-09-03 07:11:46',NULL),
(3,1,'WARNASARI',23,'AFD WARNASARI','TAMBAKSARI','WANAREJA','CILACAP','2','168981','2011-11-21','2036-11-21','HGU Warnasari [ALL]-halaman-14-19.pdf','pdf','attachment/JzA1ZXu3qexS6sa2U08xcmsoTpHR29KMaXUFID1z.pdf',NULL,NULL,NULL,'2034-11-21',NULL,'2019-09-03 07:27:17','2019-09-03 07:27:17',NULL),
(4,2,'KALIGUA',3,'KALIGUA','TARABAN','PAGUYANGAN','BREBES','2','500','1988-10-05','2008-10-05','HGB Pekarangan Keb. Kaligua-dikompresi.pdf','pdf','attachment/IwmlEHDqYkhJ7MXDtKp39wFx1bZS12f4QheLQuBO.pdf',NULL,NULL,NULL,'2006-10-05',NULL,'2019-09-03 07:39:02','2019-09-03 07:39:02',NULL),
(5,1,'WARNASARI',24,'AFD WARNASARI','PANULISAN TIMUR, CIWALEN, MADUSARI, MADURA','DAYEUHLUHUR, WANAREJA','CILACAP','2','8170944','2011-11-21','2036-11-21','HGU Warnasari [ALL]-halaman-20-25.pdf','pdf','attachment/QjLVA471r2uo4AegtY0QJA0u088vRByeBitu9QN6.pdf',NULL,NULL,NULL,'2034-11-21',NULL,'2019-09-04 18:52:31','2019-09-04 18:52:31',NULL),
(6,1,'WARNASARI',25,'AFD WARNASARI','PANULISAN TIMUR','DAYEUHLUHUR','CILACAP','2','847728','2011-11-21','2036-11-21','HGU Warnasari [ALL]-halaman-26-31.pdf','pdf','attachment/kUOu9TAmb10qBDKcx7Q6dAnNjdMZ53ehAYHH610F.pdf',NULL,NULL,NULL,'2034-11-21',NULL,'2019-09-04 19:24:28','2019-09-04 19:24:28',NULL),
(7,1,'WARNASARI',26,'AFD WARNASARI','PANULISAN TIMUR,MADURA','DAYEUHLUHUR, WANAREJA','CILACAP','2','5159265','2011-11-21','2036-11-21','HGU Warnasari [ALL]-halaman-32-37.pdf','pdf','attachment/YANlLH2WJvaC2awpixNteLWgmYL0FPsOI251WNde.pdf',NULL,NULL,NULL,'2034-11-21',NULL,'2019-09-05 03:24:22','2019-09-05 03:24:22',NULL),
(8,1,'WARNASARI',27,'AFD WARNASARI','PANULISAN TIMUR','DAYEUHLUHUR','CILACAP','2','8115','2011-11-21','2036-11-21','HGU Warnasari [ALL]-halaman-38-43.pdf','pdf','attachment/5PJk4IDoMO2Imc8UCmgQyzcII0Gld7vuWJbJskmy.pdf',NULL,NULL,NULL,'2034-11-21',NULL,'2019-09-06 17:40:38','2019-09-06 17:40:38',NULL),
(9,1,'WARNASARI',1,'AFD MONCOLIMO','PANULISAN','DAYEUHLUHUR','CILACAP','2','1345223','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-44-49.pdf','pdf','attachment/9YEgFf3ZX89vorxrEzTjC9rmPnbpBkCYgZoyEFQW.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 17:47:37','2019-09-06 17:47:37',NULL),
(10,1,'WARNASARI',2,'AFD MONCOLIMO','MATENGGENG','DAYEUHLUHUR','CILACAP','2','1810386','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-50-55.pdf','pdf','attachment/idbJim30NGECyT4jtTrlSKyNyObmb1qK3qn292zJ.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 17:59:28','2019-09-06 17:59:28',NULL),
(11,1,'WARNASARI',3,'AFD MONCOLIMO','PANULISAN TIMUR','DAYEUHLUHUR','CILACAP','2','1607369','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-56-61.pdf','pdf','attachment/OndCxjmIeqavOhqSoJZKWJdiOEXRoAw3uXeJlISj.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 18:07:08','2019-09-06 18:07:08',NULL),
(12,1,'WARNASARI',4,'AFD MONCOLIMO','PANULISAN TIMUR','DAYEUHLUHUR','CILACAP','2','1413661','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-62-67.pdf','pdf','attachment/W36aNiP3YXXCHNLjeiQ9U0TEIW12L56N0yE5IfgR.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 18:08:58','2019-09-06 18:08:58',NULL),
(13,1,'WARNASARI',5,'AFD MONCOLIMO','PANULISAN TIMUR','DAYEUHLUHUR','CILACAP','2','5165','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-68-73.pdf','pdf','attachment/N8lvSEVa9nL19ejU1wrgNNejVcw0m2YydLFIJSJC.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 18:31:30','2019-09-06 18:31:30',NULL),
(14,1,'WARNASARI',6,'AFD MONCOLIMO','BOLANG','DAYEUHLUHUR','CILACAP','2','1647736','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-74-79.pdf','pdf','attachment/m4a49ifk3HmVmiAGGO8Gq3tUbFQUemN3HHSixdEw.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 11:48:24','2019-09-06 18:32:58',NULL),
(15,1,'WARNASARI',7,'AFD MONCOLIMO','BOLANG','DAYEUHLUHUR','CILACAP','2','405094','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-80-85.pdf','pdf','attachment/28QWabzTeVIp7oSqxJpKYiSw9L9QstcFIKSICcrN.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 11:48:35','2019-09-06 18:34:29',NULL),
(16,1,'WARNASARI',8,'AFD MONCOLIMO','BOLANG','DAYEUHLUHUR','CILACAP','2','309806','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-86-91.pdf','pdf','attachment/Bnc0PsVdU2cJhEWGKE5W3VkKfnGVQsMOpJ3K5WaZ.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 18:36:25','2019-09-06 18:36:25',NULL),
(17,1,'WARNASARI',9,'AFD MONCOLIMO','BOLANG','DAYEUHLUHUR','CILACAP','2','9753','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-92-97.pdf','pdf','attachment/JcludDEbGImkdgvcUii7gpqsYSxM9W08KYKBaZwc.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 18:41:17','2019-09-06 18:41:17',NULL),
(18,1,'WARNASARI',10,'AFD MONCOLIMO','BOLANG','DAYEUHLUHUR','CILACAP','2','1305','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-98-103.pdf','pdf','attachment/h6GZ8ByhuVquZCz3db6cvsRtxsEuxXW5TV9DZbeC.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 18:43:57','2019-09-06 18:43:57',NULL),
(19,1,'WARNASARI',11,'AFD MONCOLIMO','BOLANG','DAYEUHLUHUR','CILACAP','2','47104','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-104-108.pdf','pdf','attachment/9avEpvFlzBT41F81snkGbvSRaYgMVaz0N8RmFUBJ.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 18:45:32','2019-09-06 18:45:32',NULL),
(20,1,'WARNASARI',12,'AFD MONCOLIMO','BOLANG','DAYEUHLUHUR','CILACAP','2','329526','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-109-114.pdf','pdf','attachment/g7VCEhfh0c1O2Xv6Tq6ggbiqBG2XlGk7kcSemLMb.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 18:47:12','2019-09-06 18:47:12',NULL),
(21,1,'WARNASARI',13,'AFD MONCOLIMO','BOLANG','DAYEUHLUHUR','CILACAP','2','161359','2009-02-12','2034-02-12','HGU Warnasari [ALL]-halaman-115-120.pdf','pdf','attachment/l1Py2QCIPkxThGzSF1UWCn2tzxRbXpmdOH7YORFI.pdf',NULL,NULL,NULL,'2032-02-12',NULL,'2019-09-06 18:49:46','2019-09-06 18:49:46',NULL),
(22,2,'RUMAH DINAS SEMBOJA',295,'JL.SEMBOJA NO.4','LEMPONGSARI','GAJAHMUNGKUR','SEMARANG','2','1591','2011-01-25','2031-01-16','1. Jl. Semboja No. 4.pdf','pdf','attachment/dw5mv06YGlcCbc47JSPqV7zmyFYAIJAPU1AIzZuC.pdf',NULL,NULL,NULL,'2029-01-16','1','2019-11-11 15:20:08','2019-11-11 23:13:54',NULL),
(23,2,'BUKIT KARET 3',150,'JL. BUKIT KARET NO.3','NGRESEP','BANYUMANIK','SEMARANG','2','864','2006-05-16','2036-05-16','2. Bukit Karet No. 3.pdf','pdf','attachment/YlbYKr53AaJxIbqelLLwKfKR9uZ1xDrMXJk5wKWv.pdf',NULL,NULL,NULL,'2034-05-16','1','2019-11-12 00:37:28','2019-11-12 00:37:28',NULL),
(24,2,'BUKIT KARET 5',151,'JL.BUKIT KARET NO.5','NGESREP','BANYUMANIK','SEMARANG','2','864','2006-05-16','2036-05-16','3. Bukit Karet No. 5.pdf','pdf','attachment/EAy1xeNq47RMSJwnkrGcyMDZDPuIeeS2aoK56Qr4.pdf',NULL,NULL,NULL,'2034-05-16','1','2019-11-12 00:39:47','2019-11-12 00:39:47',NULL),
(25,2,'BUKIT KARET 7',149,'JL.BUKIT KARET NO.7','NGESREP','BANYUMANIK','SEMARANG','2','864','2006-05-16','2036-05-16','4. Bukit Karet No. 7.pdf','pdf','attachment/D7wmyw6T9o60cSc4BzhhrknJWn9cjoQiMCAipeuP.pdf',NULL,NULL,NULL,'2034-05-16','1','2019-11-12 00:43:03','2019-11-12 00:43:03',NULL),
(26,2,'BUKIT KOPI 7',154,'JL BUKIT KOPI NO.7','NGESREP','BANYUMANIK','SEMARANG','2','792','2006-05-16','2036-05-16','5. Bukit Kopi No. 7.pdf','pdf','attachment/mIwoHjHVIkpA0x41DzRs7i9FgKBF3g9Mm9tM6lfo.pdf',NULL,NULL,NULL,'2034-05-16','1','2019-11-12 00:45:12','2019-11-12 00:45:12',NULL),
(27,2,'BUKIT KOPI 9',148,'JL BUKIT KOPI NO.9','NGESREP','BUNYUMANIK','SEMARANG','2','742','2006-05-16','2036-05-16','6. Bukit Kopi No. 9.pdf','pdf','attachment/voVpXAyBnYufFjMbp5Cdt8fFiDIG4SBcuDlLcbg9.pdf',NULL,NULL,NULL,'2034-05-16','1','2019-11-12 00:52:01','2019-11-12 00:52:01',NULL),
(28,2,'TAMAN MENARA AIR',152,'SEMARANG','NGESREP','BANYUMANIK','SEMARANG','2','738','2006-05-16','2036-06-16','7. Taman Menara Air.pdf','pdf','attachment/D3PR8R2Bca96r01sCVrqZ7YYspusLFtL7gzLHAd3.pdf',NULL,NULL,NULL,'2034-06-16','1','2019-11-12 00:55:02','2019-11-12 00:55:02',NULL),
(29,2,'BUKIT MANGGA 9',153,'SEMARANG','NGESREP','BANYUMANIK','SEMARANG','2','465','2006-05-16','2036-05-16','8. Bukit Mangga No. 9.pdf','pdf','attachment/D3oRDkmRu6iUoc9dqPJvpLbOEqhjKbbXTbdBjen5.pdf',NULL,NULL,NULL,'2034-05-16','1','2019-11-12 00:57:38','2019-11-12 00:57:38',NULL),
(30,2,'GARUDA 10',79,'JL GARUDA NO 10','TANJUNGMAS','SEMARANG UTARA','SEMARANG','2','463','2000-01-08','2030-01-08','9. Jl. Garuda No. 10.pdf','pdf','attachment/4ZlnAzZB6mz6F4w2ybdcFX7BOpUsxPMQDMDrSh0M.pdf',NULL,NULL,NULL,'2028-01-08','1','2019-11-12 01:02:56','2019-11-12 01:02:56',NULL),
(31,2,'EMPU TANTULAR',158,'JL EMPU TANTULAR NO. 33','TANJUNGMAS','SEMARANG UTARA','SEMARANG','2','1692','2016-02-12','2036-02-12','10. Jl. Empu Tantular No. 33.pdf','pdf','attachment/LfRv34HevY3OWqOP0w51GMEhEQul2drj9Od28UYJ.pdf',NULL,NULL,NULL,'2034-02-12','1','2019-11-12 01:09:52','2019-11-12 01:09:52',NULL),
(32,2,'KANTOR DIREKSI',118,'JL MUGAS DALAM (ATAS)','MUGASSARI','SEMARANG SELATAN','SEMARANG','2','8008','2001-02-19','2036-11-11','11. Kantor Direksi Mugas.pdf','pdf','attachment/oaAGYpwv6wkWh0kNTe4VPvC6EYcDY2VXtgAn8WbY.pdf',NULL,NULL,NULL,'2034-11-11','1','2019-11-12 01:13:46','2019-11-12 01:13:46',NULL),
(33,2,'BANGUNAN SUMBER AIR NGOBO',1,'NGOBO','WIRINGIN PUTIH','KLEPU','SEMARANG','2','2490','1990-08-30','2020-08-30','12. Bangunan Sumber Air Ngobo.pdf','pdf','attachment/RJoZq27wYvhESs4vXezPxBOMhlMmdICeksYIJsn3.pdf',NULL,NULL,NULL,'2018-08-30','1','2019-11-12 01:19:36','2019-11-12 01:19:36',NULL),
(34,2,'IKR KUDUS',16,'KUDUS','PRAMBATAN KIDUL','KALIWUNGU','KUDUS','2','34240','1997-09-18','2027-09-18','13. IKR Kudus.pdf','pdf','attachment/TTnCYgQU9GS5wb0Bm2FdHMTsp6JhCxV3Bcz4maY8.pdf',NULL,NULL,NULL,'2025-09-18','1','2019-11-12 01:24:23','2019-11-12 01:24:23',NULL),
(35,2,'KANTOR LO DANAU LIMBOTO',2576,'JL. DANAU LIMBOTO C1 NO.40','BENDUNGAN HILIR','TANAH ABANG','ADM. JAKARTA PUSAT','2','166','2011-03-07','2031-03-07','16. Kantor LO Danau Limboto.pdf','pdf','attachment/oPa1OWX5S01AMHvalTFRiht5MTH5DScHTN9BUSGM.pdf',NULL,NULL,NULL,'2029-03-07','1','2019-11-12 01:31:53','2019-11-12 01:31:53',NULL),
(36,2,'KANTOR LO APRT BOULEVARD',1103,'JAKARTA','KAMPUNG BALI','TANAH ABANG','ADM. JAKARTA PUSAT','2','72,56','2011-07-22','2031-07-22','17. Kantor LO Apartement the Boulevard.pdf','pdf','attachment/xLPc63kZDAx837mln2DHe9L22NG7OhuQmHN0mZjP.pdf',NULL,NULL,NULL,'2029-07-22','1','2019-11-12 01:34:21','2019-11-12 01:34:21',NULL),
(37,2,'GEDUNG DAN GUDANG JOLOTIGO',4,'AFD DORO','DORO','DORO','PEKALONGAN','2','12045','2004-08-09','2034-08-09','14. Gedung Kantor dan Gudang Jolotigo-dikompresi.pdf','pdf','attachment/k6y7VSFdzmKXQ9xjyNpCoYczIAsAtVOepAQ8W1XC.pdf',NULL,NULL,NULL,'2032-08-09','1','2019-11-12 01:40:46','2019-11-12 01:40:46',NULL);

/*Table structure for table `jenis_dokumen` */

DROP TABLE IF EXISTS `jenis_dokumen`;

CREATE TABLE `jenis_dokumen` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_dokumen` */

insert  into `jenis_dokumen`(`id`,`nama`,`created_at`,`updated_at`) values 
(1,'HGU','2019-08-20 13:37:44','0000-00-00 00:00:00'),
(2,'HGB','2019-08-20 13:37:55','0000-00-00 00:00:00');

/*Table structure for table `tb_review` */

DROP TABLE IF EXISTS `tb_review`;

CREATE TABLE `tb_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aset` int(11) DEFAULT NULL,
  `file_eviden` text,
  `ext_file` text,
  `path_file` text,
  `ket` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_review` */

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_roles` */

insert  into `user_roles`(`id`,`role_name`,`created_at`,`updated_at`) values 
(1,'user','2019-08-20 13:01:51','0000-00-00 00:00:00'),
(2,'admin','2019-08-20 13:01:56','0000-00-00 00:00:00'),
(3,'super admin','2019-08-20 13:02:06','0000-00-00 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` enum('1','2') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`name`,`password`,`id_role`,`is_active`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'super_admin','super admin','$2y$10$6mkVT4hd7Ni9ONEcBSC0reeyoh03uCcSTOTZbw3ER6TnmcHBK4Yr2',3,'1',NULL,'2019-08-20 13:01:25','0000-00-00 00:00:00',NULL),
(5,'admin',NULL,'$2y$10$SyPSgOGKsop1EhOGQiPKZe3ZmfZ0YgXf/l/bjaMLSkdbpS4m2GkFW',1,'1',NULL,'2019-09-06 10:49:37','2019-09-06 17:49:37',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
