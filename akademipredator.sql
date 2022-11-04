-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for akademipredator
CREATE DATABASE IF NOT EXISTS `akademipredator` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `akademipredator`;

-- Dumping structure for table akademipredator.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table akademipredator.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` int DEFAULT NULL,
  `alamat` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosen_wali` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `irs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sks` int DEFAULT NULL,
  `sksk` int DEFAULT NULL,
  `khs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pkl` enum('Belum','Sedang','Selesai') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_skripsi` enum('Belum','Sedang','Selesai') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_skripsi` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link_khs` varchar(2500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_pkl` varchar(2550) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Disetujui','Belum Disetujui') COLLATE utf8mb4_unicode_ci DEFAULT 'Belum Disetujui',
  `status_mhs` enum('Aktif','Mangkir','Cuti','Lulus','DO') COLLATE utf8mb4_unicode_ci DEFAULT 'Aktif',
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.mahasiswa: ~34 rows (approximately)
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `angkatan`, `alamat`, `dosen_wali`, `semester`, `jenis_kelamin`, `irs`, `sks`, `sksk`, `khs`, `status_pkl`, `status_skripsi`, `link_skripsi`, `tanggal_sidang`, `created_at`, `updated_at`, `link_khs`, `link_pkl`, `status`, `status_mhs`, `no_hp`) VALUES
	(4, '2406012000', 'Khidir Karawita', 20, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, 'https://drive.google.com/file/d/1RTq6aOdw45n2hb6GOml8h1aMxtAyb3hN/view?usp=sharing', 'Selesai', 'Selesai', 'https://drive.google.com/file/d/1RTq6aOdw45n2hb6GOml8h1aMxtAyb3hN/view?usp=sharing', NULL, NULL, '2022-10-26 14:17:07', 'https://drive.google.com/file/d/1RTq6aOdw45n2hb6GOml8h1aMxtAyb3hN/view?usp=sharing', 'https://drive.google.com/file/d/1RTq6aOdw45n2hb6GOml8h1aMxtAyb3hN/view?usp=sharing', 'Disetujui', 'Aktif', NULL),
	(5, '24060120140122', 'Muhammad Sumbul', 20, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Sedang', 'Sedang', NULL, NULL, NULL, '2022-10-22 08:19:10', NULL, NULL, 'Disetujui', 'Mangkir', NULL),
	(10, '2452856723', 'Happy Salma', 21, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Wanita', NULL, NULL, NULL, NULL, 'Sedang', 'Belum', NULL, NULL, '2022-10-12 10:38:58', '2022-10-16 02:07:18', NULL, NULL, 'Disetujui', 'Aktif', NULL),
	(11, '2431562468', 'Joko Tingkir', 22, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Selesai', 'Belum', NULL, NULL, '2022-10-12 11:01:37', '2022-10-12 16:02:56', NULL, NULL, 'Disetujui', 'Lulus', NULL),
	(12, '2454154268', 'Ismail Usman Kanabawi', 22, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Selesai', 'Belum', NULL, NULL, '2022-10-12 15:48:27', '2022-10-12 15:53:17', NULL, NULL, 'Disetujui', 'Cuti', NULL),
	(13, '24414331543254', 'beta', 22, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Wanita', NULL, NULL, NULL, NULL, 'Belum', 'Selesai', NULL, NULL, '2022-10-17 20:56:03', '2022-10-25 21:23:07', NULL, NULL, 'Disetujui', 'Lulus', NULL),
	(14, '240601201401267', 'Alpha', 21, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Selesai', 'Selesai', NULL, NULL, '2022-10-20 09:36:30', '2022-10-20 09:36:30', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(15, '2406012014265', 'Callo Ahmad Subajeri', 21, 'Bukit Undip coi', 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', 4, 'Pria', '2406012014265-irs.png', 23, NULL, '2406012014265-khs.png', 'Sedang', 'Sedang', '2406012014265-skripsi.png', NULL, '2022-10-20 09:39:36', '2022-10-26 17:58:59', NULL, '2406012014265-pkl.png', 'Disetujui', 'DO', '081252078990'),
	(17, '2407643236', 'ucup', 21, NULL, NULL, NULL, 'Pria', NULL, NULL, NULL, '-khs.png', 'Belum', 'Belum', NULL, NULL, '2022-10-24 21:46:31', '2022-10-24 21:47:26', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(18, '240612121212', 'Muhammad Ikhsan Kalangkabut', 20, 'jepihori', NULL, 8, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-24 22:25:58', '2022-10-25 17:43:32', NULL, NULL, 'Belum Disetujui', 'Aktif', '12981692'),
	(19, '24060120140126', 'Rias Gremory', 20, '0xaC4ada9843a56c6DC1952444d24FEa566CFF7B01', NULL, 5, 'Wanita', '24060120140126-irs.png', 22, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-25 06:20:08', '2022-10-26 14:55:06', NULL, NULL, 'Belum Disetujui', 'Aktif', '+6281252078990'),
	(20, '2406012011056', 'Subki', 21, NULL, NULL, NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-25 06:30:40', '2022-10-25 06:30:40', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(21, '2407601726', 'Auuuu', 20, NULL, NULL, NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-25 18:43:49', '2022-10-25 18:43:49', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(22, '2407076561', 'Amanaa', 20, 'Jalan Sana Sini', 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-25 18:46:49', '2022-10-25 18:48:46', NULL, NULL, 'Belum Disetujui', 'Aktif', '08112233344'),
	(23, '76219863913', 'Gopal', 20, 'Perum Mutiara Citra Asri Blok P1 no 40, Boro, Tanggulangin Sidoarjo', 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 01:15:30', '2022-11-02 12:51:45', NULL, NULL, 'Disetujui', 'Aktif', '+6281252078990'),
	(24, '76212363913', 'Adrian', 21, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:32', '2022-10-26 17:43:32', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(25, '12341231232', 'Fajar', 21, 'Bukit Undip', 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:32', '2022-10-26 17:48:50', NULL, NULL, 'Belum Disetujui', 'Aktif', '081252078888'),
	(26, '42341231232', 'Halim', 20, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:32', '2022-10-26 17:43:32', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(27, '72341231001', 'Reza', 20, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:33', '2022-10-26 17:43:33', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(28, '72341231002', 'Fairuz', 20, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:33', '2022-10-26 17:43:33', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(29, '72341231003', 'Hikmal', 21, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:33', '2022-10-26 17:43:33', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(30, '72341231004', 'Ana', 21, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Wanita', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:33', '2022-10-26 17:43:33', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(31, '72341231005', 'Faqih', 20, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:33', '2022-10-26 17:43:33', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(32, '72341231006', 'Indra', 19, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:33', '2022-10-26 17:43:33', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(33, '72341231007', 'Hadi', 19, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:33', '2022-10-26 17:43:33', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(34, '72341231008', 'Yusuf', 19, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:33', '2022-10-26 17:43:33', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(35, '72341231009', 'Mubarak', 21, NULL, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:33', '2022-10-26 17:43:33', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(36, '72341231010', 'Sumbul', 20, NULL, 'Guruh Aryotejo, S.Kom, M.Sc', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:34', '2022-10-26 17:43:34', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(37, '72341231011', 'Siti', 21, NULL, 'Priyo Sidik Sasongko, S.Si, M.Kom', NULL, 'Wanita', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:34', '2022-10-26 17:43:34', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(38, '72341231012', 'Safira', 21, NULL, 'Priyo Sidik Sasongko, S.Si, M.Kom', NULL, 'Wanita', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:34', '2022-10-26 17:43:34', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(39, '72341231013', 'Hikmah', 21, NULL, 'Guruh Aryotejo, S.Kom, M.Sc', NULL, 'Wanita', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:34', '2022-10-26 17:43:34', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(40, '72341231014', 'Aulia', 19, NULL, 'Prajanto Wahyu Adi, M.Kom', NULL, 'Wanita', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:34', '2022-10-26 17:43:34', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(41, '72341231015', 'Olive', 19, NULL, 'Prajanto Wahyu Adi, M.Kom', NULL, 'Wanita', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:34', '2022-10-26 17:43:34', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(42, '72341231016', 'Ghina', 20, NULL, 'Prajanto Wahyu Adi, M.Kom', NULL, 'Wanita', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-10-26 17:43:34', '2022-10-26 17:43:34', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(43, '2406012012121', 'Wildan', 20, NULL, 'ANU', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-11-02 12:54:52', '2022-11-02 12:54:52', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL),
	(44, '2407198287', 'zaza', 20, NULL, 'anu', NULL, 'Pria', NULL, NULL, NULL, NULL, 'Belum', 'Belum', NULL, NULL, '2022-11-02 12:56:20', '2022-11-02 12:56:20', NULL, NULL, 'Belum Disetujui', 'Aktif', NULL);

-- Dumping structure for table akademipredator.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_10_05_192044_mahasiswa__table', 2),
	(6, '2022_10_21_071230_create_permission_tables', 3);

-- Dumping structure for table akademipredator.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table akademipredator.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.model_has_roles: ~0 rows (approximately)

-- Dumping structure for table akademipredator.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.password_resets: ~0 rows (approximately)

-- Dumping structure for table akademipredator.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.permissions: ~3 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'doswal', 'web', '2022-10-24 09:43:57', '2022-10-24 09:43:57'),
	(2, 'operator', 'web', '2022-10-24 21:36:04', '2022-10-24 21:36:04'),
	(3, 'departemen', 'web', '2022-10-25 06:52:33', '2022-10-25 06:52:33');

-- Dumping structure for table akademipredator.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.permission_role: ~0 rows (approximately)

-- Dumping structure for table akademipredator.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table akademipredator.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'doswal', 'web', '2022-10-24 09:43:44', '2022-10-24 09:43:44'),
	(2, 'operator', 'web', '2022-10-24 21:36:11', '2022-10-24 21:36:11'),
	(3, 'departemen', 'web', '2022-10-25 06:52:27', '2022-10-25 06:52:27');

-- Dumping structure for table akademipredator.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nipnim` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `nipnim` (`nipnim`)
) ENGINE=InnoDB AUTO_INCREMENT=19887309 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table akademipredator.users: ~17 rows (approximately)
INSERT INTO `users` (`id`, `name`, `nipnim`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(19887272, 'Muhammad Sumbul', NULL, 'sumbul@uiui.com', NULL, 'sumbul123', NULL, NULL, NULL, NULL),
	(19887273, 'Muhammad Husain Assalafi', NULL, 'hushus@uiui.com', NULL, '$2y$10$1tygP8cgvxBWY/vTDuKEs.rVoutbLmq3V6QnZAGzE/fSBgKNDMfUa', NULL, NULL, '2022-10-05 11:45:08', '2022-10-05 11:45:08'),
	(19887274, 'Acumalaka', NULL, 'acumalaka@lt3.com', NULL, '$2y$10$MAOIV2aIX44IqYRYNH7.w.YfUu1M403zJ742AvXP8FTO0BMyuujaO', 'doswal', 'EuSXbZgjXiLHMPiKIawUSti6N8tUNHyVM66I7Uhaj09F5id7pLNzEP71FQVP', '2022-10-05 17:42:40', '2022-10-05 17:42:40'),
	(19887275, 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp)., Ph.D.', NULL, 'Teacher@Teacher.com', NULL, '$2y$10$N7g/Ll2qsqLeTlKCupnizOmqt9aB4iG3eJXvQ3ALS79tWDGzloUhq', 'doswal', NULL, '2022-10-17 20:09:36', '2022-10-17 20:09:36'),
	(19887276, 'Teacher', NULL, 'teachers@teacher.com', NULL, '$2y$10$uMuus35Ut.ILVsBYZI5TD.dugtMoKKKKALg7sbudiDszGnO.FEFb6', 'doswal', NULL, '2022-10-19 06:58:22', '2022-10-19 06:58:22'),
	(19887277, 'Callo Ahmad Subajeri', '2406012014265', 'calloahmad@student.akdung.ac.id', NULL, '$2y$10$43oOfZu7mcmGywF7vZlbTOVgdzdaUa.zgrNJTi7kVJASdPevF1gFi', 'mahasiswa', 'aDfUR219VYppY7cC0GReMeTUl1DNdhndZUcMnHRCyq4nWqgPVX7ctazJYXRl', '2022-10-20 09:39:36', '2022-10-26 14:26:26'),
	(19887279, 'Operator', '353252345455', 'operator@operator.com', NULL, '$2y$10$.7Zrd336UmhIGX24OrOBXOZTGPtS3V6xtMNbrF0wtbFvKAjXPjTXG', 'operator', NULL, '2022-10-22 09:20:01', '2022-10-22 09:20:01'),
	(19887280, 'ucup', NULL, '2407643236@student.akdung.ac.id', NULL, '$2y$10$hoehgPnLQVKCunqSuu1feediyFf7iQ3/yaDuLwHcoKOcqRdu5oxT.', 'mahasiswa', NULL, '2022-10-24 21:46:31', '2022-10-24 21:46:31'),
	(19887281, 'Muhammad Ikhsan Kalangkabut', NULL, '240612121212@student.akdung.ac.id', NULL, '$2y$10$oKc9eFpkMypqxoYhmydayedpwZ1wpNg882QjArK2PDRkRorcmQhZC', 'mahasiswa', NULL, '2022-10-24 22:25:58', '2022-10-24 22:25:58'),
	(19887282, 'Rias Gremory', '24060120140126', 'Rias_Gremory@student.akdung.ac.id', NULL, '$2y$10$7XSx//M2T3wYtcbie5Fze.O4UqkvNYO.Wqnn9Bzny/IYhz/ffrqpq', 'mahasiswa', NULL, '2022-10-25 06:20:08', '2022-10-26 14:59:25'),
	(19887283, 'Subki', NULL, '2406012011056@student.akdung.ac.id', NULL, '$2y$10$83ccmytgrw4cvukBonJ/4eNhchI57OKaS3F.eLPFZ0lPaBMVbK416', 'mahasiswa', NULL, '2022-10-25 06:30:40', '2022-10-25 06:30:40'),
	(19887284, 'Departemen', NULL, 'departemen@departemen.com', NULL, '$2y$10$bhrAUuyo5m2HecaSoLUTzOZzo42y5pmZGJZ4KXj14QsboAZfx9XfK', 'departemen', NULL, '2022-10-25 12:42:38', '2022-10-25 12:42:38'),
	(19887285, 'Auuuu', NULL, '2407601726@student.akdung.ac.id', NULL, '$2y$10$TF/h39N7dOne4Z/oCUr/c.sdjmaSIQF6uIkKRG/E6d97JYa1CEn0C', 'mahasiswa', NULL, '2022-10-25 18:43:49', '2022-10-25 18:43:49'),
	(19887286, 'Amanaa', '2407076561', 'amanaa@student.akdung.ac.id', NULL, '$2y$10$4BcP1T0At9vZApfUiwRkm.1JA5n0fm2inumLryMxh7D7jF5Roo1v2', 'mahasiswa', NULL, '2022-10-25 18:46:49', '2022-10-25 18:48:46'),
	(19887287, 'Gopal', '76219863913', 'gopal123@student.akdung.ac.id', NULL, '$2y$10$D1R1qF1zQ9chRFB67AsEEekiTmjmdPJM7vATp6BLBPtoAH2cldmeS', 'mahasiswa', NULL, '2022-10-26 01:15:30', '2022-11-02 12:52:10'),
	(19887307, 'Wildan', NULL, '2406012012121@student.akdung.ac.id', NULL, '$2y$10$5EU0RmtoGV3dn.qb5y/IDOHPegg2YCT6yEVLCvG4Qe4G7CFUwpTbO', 'mahasiswa', NULL, '2022-11-02 12:54:52', '2022-11-02 12:54:52'),
	(19887308, 'zaza', NULL, '2407198287@student.akdung.ac.id', NULL, '$2y$10$jcYcONNaYqdvuZEaZ.SNnOGRpZb3v38CtGfdIo7mX8XrT..m4fBSq', 'mahasiswa', NULL, '2022-11-02 12:56:20', '2022-11-02 12:56:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
