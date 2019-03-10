-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2017 at 05:11 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bismaope_kkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pengusul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proposal` int(3) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas_pkm`
--

CREATE TABLE `tbl_berkas_pkm` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_berkas_pkm`
--

INSERT INTO `tbl_berkas_pkm` (`id`, `nama_file`, `kategori`, `keterangan`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Ketentuan PKM', '0', 'KETENTUAN\r\n\r\n1.	Kelompok PKM terdiri dari 3 sampai 5 orang (khusus PKM-P dan PKM-KC 3 orang per kelompok).\r\n2.	Satu orang bisa mengajukan lebih dari satu proposal PKM dengan ketentuan hanya diperbolehkan menjadi ketua di satu kelompok saja.\r\n3.	Anggota kelompok bisa berbeda prodi dan berbeda angkatan sesuai dengan topik bahasan.\r\n4.	Silahkan cari Dosen Pembimbing yang sesuai dengan topik bahasan.\r\n5.	Dosen Pembimbing wajib memiliki NIDN, jadi mohon ditanyakan dahulu sebelumnya.\r\n6.	Dosen Pembimbing hanya bisa membimbing maksimal 10 kelompok pengaju Proposal PKM.\r\n7.	Kami menyediakan Lembar bimbingan bersama dosen untuk mempererat kerja sama dan bimbingan bersama dosen, silahkan download di kkm.uajy.ac.id pada menu Berkas lalu pilih Lembar Asistensi.\r\n8.	Pendaftaran PKM klik menu “Daftar” pada halaman ketentuan ini.\r\n9.	Isikan nama depan, nama belakang, npm, dan password untuk masuk ke account KKM.\r\n10.	Lalu lengkapi data diri ketua, data anggota, dosen pembimbing, dan berkas PKM.\r\n11.	Jika sudah melengkapi data diri akan kami daftarkan ke Dikti agar bisa mendapatkan Id dan pasword yang akan dikirim melalui e-mail ketua atau melalui kkm.bismaoperation.id.\r\n12.	Panduan pembuatan PKM bisa didownload di kkm.uajy.ac.id pada menu Berkas lalu pilih Pedoman PKM dan Download Pedoman PKM 2016 (Pedoman PKM 2017 dapat didownload awal bulan Oktober 2017)\r\n13.	Batas Pendaftaran Hingga 6 November 2017, Saran pendaftaran agar tidak mendekati tanggal tersebut dikarenakan untuk mengurus administrasi membutuhkan waktu dan terkadang server pendaftaran PKM mengalami gangguan\r\n14.	Login dan upload proposal bisa melalui simbelmawa.ristekdikti.go.id (Panduan upload proposal PKM juga bisa didownload pada poin 10)\r\n15.	Info sementara Batas Upload PKM 5 Bidang tanggal 1 November hingga 30 November\r\n16.	Info tambahan : Upload PKM 5 Bidang dipastikan akan mendapat Poin Spama 5 SA dan Jika lolos akan didanai maksimal 12,5 juta\r\n\r\nCatatan Penting :\r\n1.	Lembar Pengesahan yang sudah ditandatangani Ketua Kelompok, Dosen Pembimbing, dan Wakil Dekan 3 silahkan dikumpul di KACM tanggal 23 Oktober - 6 November dan diambil pada tanggal 13 November di KACM.\r\n2.	Informasi dan pertanyaan lain berkaitan dengan proposal PKM silahkan hubungi OA LINE : @hrw0000k IG : kkmuajy\r\n\r\n\r\nSalam Kreatif,', NULL, '2017-09-25 14:42:08', '2017-10-13 09:46:29'),
(2, 'Pedoman PKM 2017 - 2018', '4', NULL, 'uploads/Berkas PKM/Pedoman PKM 2017 - 2018 _ Pedoman PKM.pdf', '2017-09-29 09:41:36', '2017-09-29 09:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bidang_pkm`
--

CREATE TABLE `tbl_bidang_pkm` (
  `id` int(10) UNSIGNED NOT NULL,
  `bidang_pkm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_bidang_pkm`
--

INSERT INTO `tbl_bidang_pkm` (`id`, `bidang_pkm`, `singkatan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PKM Penelitian', 'PKM-P', 1, NULL, NULL),
(2, 'PKM Kewirausahaan', 'PKM-K', 1, NULL, NULL),
(3, 'PKM Teknologi', 'PKM-T', 1, NULL, NULL),
(4, 'PKM Karsa Cipta', 'PKM-KC', 1, NULL, NULL),
(5, 'PKM Pengabdian Masyarakat', 'PKM-M', 1, NULL, '2017-09-24 18:44:17'),
(6, 'PKM Artikel Ilmiah', 'PKM-AI', 0, NULL, '2017-09-25 12:39:44'),
(7, 'PKM Gagasan Tertulis', 'PKM-GT', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_berkas`
--

CREATE TABLE `tbl_kategori_berkas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_kategori_berkas`
--

INSERT INTO `tbl_kategori_berkas` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Kover', NULL, NULL),
(2, 'Lembar Pengesahan', NULL, NULL),
(3, 'Surat Pernyataan', NULL, NULL),
(4, 'Pedoman PKM', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengurus_kkm`
--

CREATE TABLE `tbl_pengurus_kkm` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pkm`
--

CREATE TABLE `tbl_pkm` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `file_review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pkm`
--

INSERT INTO `tbl_pkm` (`id`, `id_pengusul`, `judul_pkm`, `bidang_pkm`, `tahun_pengajuan`, `tahun_pendanaan`, `dosen_pembimbing`, `nidn`, `prodi_id`, `alamat`, `email`, `no_telp`, `file_pkm`, `file_review`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '1', 2017, 2018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-09-25 14:43:50', '2017-09-25 14:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodi_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id`, `prodi_name`, `fakultas_name`, `singkatan`, `created_at`, `updated_at`) VALUES
(1, 'Arsitektur', 'Teknik', 'Arsi', NULL, NULL),
(2, 'Teknik Sipil', 'Teknik', 'TS', NULL, NULL),
(3, 'Manajemen', 'Ekonomi', 'Man', NULL, NULL),
(4, 'Akuntansi', 'Ekonomi', 'Akun', NULL, NULL),
(5, 'Ilmu Hukum', 'Hukum', 'Hk', NULL, NULL),
(6, 'Teknik Industri', 'Teknologi Industri', 'TI', NULL, NULL),
(7, 'Teknik Informatika', 'Teknologi Industri', 'TF', NULL, NULL),
(8, 'Biologi', 'Teknobiologi', 'Bio', NULL, NULL),
(9, 'Ilmu Komunikasi', 'Ilmu Sosial dan Ilmu Politik', 'Ilkom', NULL, NULL),
(10, 'Sosiologi', 'Ilmu Sosial dan Ilmu Politik', 'Sos', NULL, NULL),
(11, 'Ekonomi Pembangunan', 'Ekonomi', 'EP', NULL, NULL),
(12, 'Manajemen Kelas Internasional', 'Ekonomi', 'MKI', NULL, NULL),
(13, 'Akuntansi Kelas Internasional', 'Ekonomi', 'AKI', NULL, NULL),
(14, 'Teknik Sipil Kelas Internasional', 'Teknik', 'TSI', NULL, NULL),
(15, 'Teknik Industri Kelas Internasional', 'Teknologi Industri', 'TIKI', NULL, NULL),
(16, 'Sistem Informasi', 'Teknologi Industri', 'SI', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Adm', 'Administrator', NULL, NULL),
(2, 'Ket', 'Ketua', NULL, NULL),
(3, 'WK', 'Wakil Ketua', NULL, NULL),
(4, 'SK', 'Sekretaris', NULL, NULL),
(5, 'BD', 'Bendahara', NULL, NULL),
(6, 'Kom', 'Divisi Kominfo', NULL, NULL),
(7, 'PKM', 'Divisi PKM', NULL, NULL),
(8, 'SDM', 'Divisi SDM', NULL, NULL),
(9, 'PS', 'Peserta', NULL, NULL),
(10, 'Pnl', 'Tim Penalaran', '2017-09-25 13:40:21', '2017-09-25 13:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `npm`, `prodi_id`, `born_date`, `role_id`, `email`, `username`, `password`, `address`, `contact_number`, `line_id`, `status`, `username_dikti`, `password_dikti`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kkm', 'uajy', NULL, '123456789', NULL, NULL, 'Adm', NULL, 'kkmuajy', '$2y$10$bvlHJFIBCfomeZ0mZKMdte84vsh3gitvdga.kAaCX.xmm9QNlJmb6', NULL, NULL, NULL, 1, NULL, NULL, '85YWSgsJvpz5HMvjUDg6HgOS0A9OKoJ0uOYV8454WVUbYfUVJGkkKg2L8pRX', '2017-09-25 14:36:01', '2017-09-25 14:36:01'),
(2, 'Bekti', 'Suratmanto', 'L', '140707642', 1, '1996-06-16', 'PKM', 'dharmabekti@gmail.com', 'dharmabekti', '$2y$10$/YhQMLgWbwNvh.eESmnpjuwn4dywmX9bOS1jbBiqKrEI9.C51dvz6', 'Jalan Janti 65 Banguntapan, Bantul, DIY', '085740126916', 'dharmabekti', 1, '051005140707642', '9965197701', 'kEEZ51xmU5FWHVRhnZbvEMUW544gOPhypDcVWB2gNvkPMMUGUxRhUcv2Afm6', '2017-09-25 14:43:50', '2017-10-13 09:50:22'),
(3, 'Westi', 'Thio Rina Eci', NULL, '160512473', 5, NULL, 'PKM', NULL, '160512473', '$2y$10$Ll7auOH3pLIkJA/Z3e1u9.0shSK2vqhHNYTCF7Vg0Nh2TFrXoJUYG', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2017-09-29 09:51:17', '2017-09-29 09:51:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_berkas_pkm`
--
ALTER TABLE `tbl_berkas_pkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bidang_pkm`
--
ALTER TABLE `tbl_bidang_pkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori_berkas`
--
ALTER TABLE `tbl_kategori_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengurus_kkm`
--
ALTER TABLE `tbl_pengurus_kkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pkm`
--
ALTER TABLE `tbl_pkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_berkas_pkm`
--
ALTER TABLE `tbl_berkas_pkm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_bidang_pkm`
--
ALTER TABLE `tbl_bidang_pkm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_kategori_berkas`
--
ALTER TABLE `tbl_kategori_berkas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_pengurus_kkm`
--
ALTER TABLE `tbl_pengurus_kkm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pkm`
--
ALTER TABLE `tbl_pkm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
