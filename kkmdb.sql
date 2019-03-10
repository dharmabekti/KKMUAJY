/*
SQLyog Professional v10.42 
MySQL - 5.5.5-10.1.21-MariaDB : Database - kkmuajydb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kkmuajydb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kkmuajydb`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2017_08_30_130752_create_roles_table',2),(3,'2017_08_31_190526_create_pkms_table',3),(4,'2017_09_23_030623_create_prodis_table',3),(5,'2017_09_23_030907_create_anggotas_table',3),(6,'2017_09_23_034222_create_bidang_p_k_ms_table',4),(8,'2017_09_24_033022_create_berkas_table',5),(9,'2017_09_24_035559_create_kategori_berkas_table',6),(10,'2017_09_24_172025_create_penguruses_table',7);

/*Table structure for table `tbl_anggota` */

DROP TABLE IF EXISTS `tbl_anggota`;

CREATE TABLE `tbl_anggota` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengusul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proposal` int(3) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_anggota` */

insert  into `tbl_anggota`(`id`,`id_pengusul`,`id_proposal`,`fullname`,`npm`,`prodi_id`,`status`,`created_at`,`updated_at`) values (5,'2',1,'Bekti Suratmanto','140707642','1','1','2017-09-23 16:16:00','2017-09-23 16:16:00'),(6,'2',1,'Mery Thomas Diky','140707669','1','1','2017-09-23 16:16:22','2017-09-23 16:16:22'),(7,'3',2,'Ima Paskah Christine Butar-Butar','150608511','1','1','2017-09-23 16:20:51','2017-09-23 16:20:51'),(8,'3',2,'Gracia A Glorizky','160801716','1','1','2017-09-23 16:21:03','2017-09-23 16:21:03'),(9,'3',2,'Heriyanto Susilo','160608700','3','1','2017-09-23 16:21:15','2017-09-23 16:21:15'),(10,'8',3,'Bekti Suratmanto','140707642','7','1','2017-09-25 19:19:12','2017-09-25 19:19:12');

/*Table structure for table `tbl_berkas_pkm` */

DROP TABLE IF EXISTS `tbl_berkas_pkm`;

CREATE TABLE `tbl_berkas_pkm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_berkas_pkm` */

insert  into `tbl_berkas_pkm`(`id`,`nama_file`,`kategori`,`keterangan`,`lokasi`,`created_at`,`updated_at`) values (5,'Ketentuan PKM','0','KETENTUAN\r\n\r\n1.	Kelompok PKM terdiri dari 3 sampai 5 orang (1 Ketua, lainnya Anggota).\r\n2.	1 orang bisa mengikuti lebih dari satu PKM, jadi bisa mengajukan proposal lebih dari satu dengan ketentuan hanya diperbolehkan menjadi ketua di satu kelompok saja.\r\n3.	Anggota kelompok bisa berbeda prodi dan berbeda angkatan sesuai dengan topik bahasan.\r\n4.	Silahkan cari Dosen Pembimbing yang sesuai dengan topik bahasan\r\n5.	Dosen Pembimbing wajib memiliki NIDN, jadi mohon ditanyakan dahulu sebelumnya.\r\n6.	Dosen Pembimbing hanya bisa membimbing maksimal 10 kelompok pengaju Proposal PKM.\r\n7.	Kami menyediakan Lembar bimbingan bersama dosen untuk mempererat kerja sama dan bimbingan bersama dosen, silahkan download di kkm.uajy.ac.id pada menu Berkas lalu pilih Lembar Asistensi.\r\n8.	Pendaftaran PKM klik menu “Daftar” pada halaman ketentuan ini.\r\n9.	Isikan nama depan, nama belakang, npm, dan password untuk masuk ke sistem.\r\n10.	Lalu lengkapi data diri ketua, data anggota, dosen pembimbing, dan berkas PKM.\r\n11.	Jika sudah melengkapi data diri akan kami daftarkan ke Dikti agar bisa mendapatkan Id dan pasword yang akan dikirim melalui e-mail ketua atau melalui kkm.bismaoperation.id.\r\n12.	Panduan pembuatan PKM bisa didownload di kkm.uajy.ac.id pada menu Berkas lalu pilih Pedoman PKM dan Download Pedoman PKM 2016 (Pedoman PKM 2017 dapat didownload awal bulan Oktober 2017)\r\n13.	Batas Pendaftaran Hingga 6 November 2017, Saran pendaftaran agar tidak mendekati tanggal tersebut dikarenakan untuk mengurus administrasi membutuhkan waktu dan terkadang server pendaftaran PKM mengalami gangguan\r\n14.	Login dan upload proposal bisa melalui simbelmawa.ristekdikti.go.id (Panduan upload proposal PKM juga bisa didownload pada poin 10)\r\n15.	Info sementara Batas Upload PKM 5 Bidang tanggal 1 November hingga 30 November\r\n16.	Info tambahan : Upload PKM 5 Bidang dipastikan akan mendapat Poin Spama 5 SA dan Jika lolos akan didanai maksimal 12,5 juta\r\n\r\nCatatan Penting :\r\n1.	Lembar Pengesahan yang sudah ditandatangani Ketua Kelompok, Dosen Pembimbing, dan Wakil Dekan 3 silahkan dikumpul di KACM tanggal 23 Oktober - 6 November dan diambil pada tanggal 13 November di KACM\r\n2.	Informasi dan pertanyaan lain berkaitan dengan proposal PKM silahkan hubungi OA LINE : @hrw0000k IG : kkmuajy',NULL,'2017-09-24 16:20:53','2017-09-24 16:37:53'),(8,'Sampul','1',NULL,'uploads/Berkas PKM/Sampul _ Kover.pdf','2017-09-24 16:41:53','2017-09-24 16:41:53');

/*Table structure for table `tbl_bidang_pkm` */

DROP TABLE IF EXISTS `tbl_bidang_pkm`;

CREATE TABLE `tbl_bidang_pkm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bidang_pkm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_bidang_pkm` */

insert  into `tbl_bidang_pkm`(`id`,`bidang_pkm`,`singkatan`,`status`,`created_at`,`updated_at`) values (1,'PKM Penelitian','PKM-P',1,NULL,NULL),(2,'PKM Kewirausahaan','PKM-K',1,NULL,NULL),(3,'PKM Teknologi','PKM-T',1,NULL,NULL),(4,'PKM Karsa Cipta','PKM-KC',1,NULL,NULL),(5,'PKM Pengabdian Masyarakat','PKM-M',1,NULL,'2017-09-25 01:44:17'),(6,'PKM Artikel Ilmiah','PKM-AI',0,NULL,'2017-09-25 19:39:44'),(7,'PKM Gagasan Tertulis','PKM-GT',0,NULL,NULL);

/*Table structure for table `tbl_kategori_berkas` */

DROP TABLE IF EXISTS `tbl_kategori_berkas`;

CREATE TABLE `tbl_kategori_berkas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_kategori_berkas` */

insert  into `tbl_kategori_berkas`(`id`,`nama_kategori`,`created_at`,`updated_at`) values (1,'Kover',NULL,NULL),(2,'Lembar Pengesahan',NULL,NULL),(3,'Surat Pernyataan',NULL,NULL),(4,'Pedoman PKM',NULL,NULL),(6,'Susunan Organisasi Tim Kegiatan dan Pembagian Tugas','2017-09-25 20:03:21','2017-09-25 20:03:21');

/*Table structure for table `tbl_pengurus_kkm` */

DROP TABLE IF EXISTS `tbl_pengurus_kkm`;

CREATE TABLE `tbl_pengurus_kkm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npm` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi_id` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_id` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_line` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_pengurus_kkm` */

/*Table structure for table `tbl_pkm` */

DROP TABLE IF EXISTS `tbl_pkm`;

CREATE TABLE `tbl_pkm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengusul` int(11) NOT NULL,
  `judul_pkm` text COLLATE utf8mb4_unicode_ci,
  `bidang_pkm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_pengajuan` int(11) DEFAULT NULL,
  `tahun_pendanaan` int(11) DEFAULT NULL,
  `dosen_pembimbing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nidn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi_id` int(3) DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pkm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_pkm` */

insert  into `tbl_pkm`(`id`,`id_pengusul`,`judul_pkm`,`bidang_pkm`,`tahun_pengajuan`,`tahun_pendanaan`,`dosen_pembimbing`,`nidn`,`prodi_id`,`alamat`,`email`,`no_telp`,`file_pkm`,`status`,`created_at`,`updated_at`) values (1,2,'Peneran Tunggu Roket di Gunturan','3',2017,2018,'Yulius Harjoseputro, S.T., M.T','0510078901',1,'ex','ex','1','uploads/PKM/Pengajuan 2017 - Pendanaan 2018/PKM-T/PKM-T _ 160708949.pdf',0,'2017-09-23 15:49:42','2017-09-23 18:41:05'),(2,3,'Pembangunan Sistem Informasi Pemungutan Suara','4',2017,2018,'Yulius Harjoseputro, S.T., M.T','0510078901',2,'exc','ec','99','uploads/PKM/Pengajuan 2017 - Pendanaan 2018/PKM-T/PKM-T _ 160708949.pdf',0,'2017-09-23 16:20:19','2017-09-23 18:34:43'),(3,8,NULL,'1',2017,2018,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2017-09-24 23:34:14','2017-09-25 19:20:38'),(4,9,NULL,'1',2017,2018,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'2017-09-25 19:11:03','2017-09-25 19:11:03');

/*Table structure for table `tbl_prodi` */

DROP TABLE IF EXISTS `tbl_prodi`;

CREATE TABLE `tbl_prodi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prodi_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_prodi` */

insert  into `tbl_prodi`(`id`,`prodi_name`,`fakultas_name`,`singkatan`,`created_at`,`updated_at`) values (1,'Arsitektur','Teknik','Arsi',NULL,NULL),(2,'Teknik Sipil','Teknik','TS',NULL,NULL),(3,'Manajemen','Ekonomi','Man',NULL,NULL),(4,'Akuntansi','Ekonomi','Akun',NULL,NULL),(5,'Ilmu Hukum','Hukum','Hk',NULL,NULL),(6,'Teknik Industri','Teknologi Industri','TI',NULL,NULL),(7,'Teknik Informatika','Teknologi Industri','TF',NULL,NULL),(8,'Biologi','Teknobiologi','Bio',NULL,NULL),(9,'Ilmu Komunikasi','Ilmu Sosial dan Ilmu Politik','Ilkom',NULL,NULL),(10,'Sosiologi','Ilmu Sosial dan Ilmu Politik','Sos',NULL,NULL),(11,'Ekonomi Pembangunan','Ekonomi','EP',NULL,NULL),(12,'Manajemen Kelas Internasional','Ekonomi','MKI',NULL,NULL),(13,'Akuntansi Kelas Internasional','Ekonomi','AKI',NULL,NULL),(14,'Teknik Sipil Kelas Internasional','Teknik','TSI',NULL,NULL),(15,'Teknik Industri Kelas Internasional','Teknologi Industri','TIKI',NULL,NULL),(16,'Sistem Informasi','Teknologi Industri','SI',NULL,NULL);

/*Table structure for table `tbl_roles` */

DROP TABLE IF EXISTS `tbl_roles`;

CREATE TABLE `tbl_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_roles` */

insert  into `tbl_roles`(`id`,`role_id`,`role_name`,`created_at`,`updated_at`) values (1,'Adm','Administrator',NULL,NULL),(2,'Ket','Ketua',NULL,NULL),(3,'WK','Wakil Ketua',NULL,NULL),(4,'SK','Sekretaris',NULL,NULL),(5,'BD','Bendahara',NULL,NULL),(6,'Kom','Kominfo',NULL,NULL),(7,'PKM','PKM',NULL,NULL),(8,'SDM','Sumber Daya Manusia',NULL,NULL),(9,'PS','Peserta',NULL,NULL),(12,'Pnl','Tim Penalaran','2017-09-25 20:40:21','2017-09-25 20:40:21');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi_id` int(3) DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `username_dikti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_dikti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`gender`,`npm`,`prodi_id`,`born_date`,`role_id`,`email`,`username`,`password`,`address`,`contact_number`,`line_id`,`status`,`username_dikti`,`password_dikti`,`remember_token`,`created_at`,`updated_at`) values (1,'kkm','uajy','L','123456789',3,'2017-09-06','Adm','kkm.uajy@gmail.com','admin','$2y$10$wjArBW0CEdUe5FlpanC6aekW/e0a/GNUpwN2OdYqIoZmEd8pch22K','ex','083867375671','pur…',1,NULL,NULL,'brlH5iaNpZTOFsNUKO7jlkgn4LbJ07W2fs1hWruXZxaNEg3L9V6QgYiSRT7C','2017-09-22 17:08:11','2017-09-23 17:09:21'),(2,'Ryan','Bagus Susilo',NULL,'140707669',3,'2017-09-06','PS','ryan.29bs@gmail.com','ryan','$2y$10$/CyU5VCVxod6c3vbJihHzOtmWkzjwcXwCAWz01VGai5cIpONkc3JW','ex','083867375671','pur…',1,NULL,NULL,'szwQ1ovJs5f7U1CKrJTvAIzxn5LG0FawqrgFHVkTu7kL5WEA5hED685Op0xj','2017-09-23 15:49:07','2017-09-24 02:50:11'),(3,'Purwanto','Ali Sastra','L','160708949',3,'2017-09-06','PS','purwanto4li@outlook.com','ali','$2y$10$tHgpktQQBpC9D0xSGuJmVez.pFUwqgv83AU5L7eTik4wXQoj2T8xO','exxxxx','083867375671','pur…',1,NULL,NULL,'x0D6OhhC2EHZsugqYLcsuYwC28fjbNkuDJ9JoRIk15KoBrgMNE7vr7bn2vee','2017-09-23 16:19:38','2017-09-24 02:35:32'),(4,'Stevani','Suryaningtyas',NULL,'140321724',NULL,NULL,'PS',NULL,'140321724','$2y$10$EAZyyTSguWIROmEnjxEKXuRxHoEr.8zbxiNOOOWlUDmQxsXsG4Sbe',NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-24 17:22:25','2017-09-24 17:22:25'),(5,'Mery','Thomas Diky',NULL,'140707668',NULL,NULL,'PS',NULL,'140707668','$2y$10$LCFp.jBkpaPcTKBE.e3EOu4QGBkwOh4c74VYldghxXiHiKYQKrh32',NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-24 17:25:07','2017-09-24 17:25:07'),(6,'kkm','uajy',NULL,'123456789',NULL,NULL,'PS',NULL,'123456789','$2y$10$dgRIIMSGGv1o8dPNyN5LV.nWEpNhH9o8xIvDG6SGg1uFrfMtB/nRO',NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-24 18:38:20','2017-09-24 18:38:20'),(7,'Bekti','Suratmanto',NULL,'140707642',NULL,NULL,'PS',NULL,'140707642','$2y$10$fRBsWdky6bKYCYf.xhj0mOoOFdfTJ.Wwp/jXSG1awyzwie5qzQL2y',NULL,NULL,NULL,1,NULL,NULL,NULL,'2017-09-24 23:23:53','2017-09-24 23:23:53'),(8,'Gusli','Seventinus','L','150215789',1,'2017-09-07','PS','gusli@ymail.com','gusli','$2y$10$BnrofFLL5Yd1vgIbDKufYujZm3cIBuYcbXUi1i8.5dbEGS8wJolAa','ec','12345678910','gusli',1,NULL,NULL,'4tU46nxKgNf64k3I7bRctYkrjnP3ilL9GIEa0iFxfNJSyld2GSAJutCsnjEz','2017-09-24 23:34:13','2017-09-25 19:15:37'),(9,'Dharma','Bekti',NULL,'121212123',NULL,NULL,'PS',NULL,'121212123','$2y$10$..JimOuMRZ7x85BEhsuLheEJ5SX1u5u3WvAVbqkF5WMpQ.qm7sAoe',NULL,NULL,NULL,1,NULL,NULL,'WAOi33qyap1PiUNHHSbQSixaXVSWa0fbQgyyaL4FvffgctbO5aQbvzycZSKD','2017-09-25 19:11:03','2017-09-25 19:11:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
