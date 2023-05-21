-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2023 pada 09.02
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikan_api`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikans`
--

CREATE TABLE `ikans` (
  `id_ikan` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `nama_ikan` varchar(100) NOT NULL,
  `jenis_ikan` varchar(100) NOT NULL,
  `tgl_tiba` date NOT NULL,
  `harga` bigint(20) NOT NULL,
  `id_pelabuhan` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ikans`
--

INSERT INTO `ikans` (`id_ikan`, `image`, `nama_ikan`, `jenis_ikan`, `tgl_tiba`, `harga`, `id_pelabuhan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'http://localhost:8000/storage/ikans/OdYxLWrpNxqQEi2QVji6ahOquoW2KTngWwXMOqsA.jpg', 'Ikan Salmon', 'Budidaya', '2023-05-05', 200, 1, 'Ikan salmon adalah', '2023-05-19 23:27:45', '2023-05-19 23:27:45'),
(3, 'http://localhost:8000/storage/ikans/OKdNsSRVyy8b3FVIUYnPKeBpWEqT8mgDwLsMShQg.jpg', 'Ikan Dencis', 'Tangkapan', '2023-05-06', 14500, 1, 'Ikan dencis segar langsung ditangkap pada dini hari.', '2023-05-19 23:31:32', '2023-05-20 17:18:06'),
(4, 'http://localhost:8000/storage/ikans/v2JjM1zvmXUIx8dVGWL0VEjaoULzlTIb1Bs6UrAS.jpg', 'Ikan Bawal', 'Tangkapan', '2023-05-06', 40000, 2, 'Ikan bawal hasil tangkapan hari ini masih fresh. Ukurang sedang cocok untuk konsumsi langsung.', '2023-05-20 17:35:47', '2023-05-20 17:35:47'),
(5, 'http://localhost:8000/storage/ikans/LO3TNLmIesGXDWEPo5nh8wFMnfVkp740vmZCIrZM.jpg', 'Ikan Tongkol', 'Tangkapan', '2023-05-06', 25000, 2, 'Ikan tongkol hasil tangkapan hari ini masih fresh. Ukuran sedang cocok untuk konsumsi langsung.', '2023-05-20 17:38:39', '2023-05-20 17:38:39'),
(6, 'http://localhost:8000/storage/ikans/TwNXC7KyEVPJZAkrOLR8QSpNYOB4PO9uM64yJ53T.jpg', 'Ikan Tuna', 'Tangkapan', '2023-05-06', 70000, 2, 'Ikan tuna hasil ukuran sedang dan besar cocok untuk konsumsi langsung.', '2023-05-20 21:32:04', '2023-05-20 21:32:04'),
(7, 'http://localhost:8000/storage/ikans/Pp0UZT8l0vcavvkaarLVLML2gwMhjcaYlLWRajUD.jpg', 'Ikan Tuna', 'Tangkapan', '2023-05-06', 70000, 3, 'Ikan tuna segar, ukuran sedang dan hasil tangkapan hari ini.', '2023-05-20 21:33:24', '2023-05-20 21:33:24'),
(8, 'http://localhost:8000/storage/ikans/Deo9wOkgopDhjkCNisVuXLrStoPA3vvRfyxc8WTj.jpg', 'Ikan Patin', 'Tangkapan', '2023-05-06', 30000, 2, 'Ikan patin segar, ukuran kecil dan sedang dan hasil tangkapan hari ini.', '2023-05-20 21:34:21', '2023-05-20 21:34:21'),
(9, 'http://localhost:8000/storage/ikans/iVzn99V2ncbtweTdaexpA32wQDkYBmuc4dDPWiyN.jpg', 'Ikan Patin', 'Tangkapan', '2023-05-06', 35000, 3, 'Ikan patin segar, ukuran besar dan sedang hasil tangkapan hari ini.', '2023-05-20 21:34:52', '2023-05-20 21:34:52'),
(10, 'http://localhost:8000/storage/ikans/Mpi9AQzPqSzM2vHUMayKY0rxNe2i72qM9VUAXiNR.jpg', 'Ikan Cakalang', 'Tangkapan', '2023-05-06', 45000, 4, 'Ikan cakalang segar, ukuran besar dan sedang hasil tangkapan hari ini.', '2023-05-20 21:36:45', '2023-05-20 21:36:45'),
(11, 'http://localhost:8000/storage/ikans/dJ8pqmDwQkkLKyRzigkPqAG0kvvHqYrDQAOzlYln.jpg', 'Ikan Cakalang', 'Budidaya', '2023-05-06', 36000, 5, 'Ikan cakalang segar, ukuran besar dan sedang hasil budidaya pelabuhan.', '2023-05-20 21:37:28', '2023-05-20 21:37:28'),
(12, 'http://localhost:8000/storage/ikans/msbA24jiHVsGtYd9V2YczA1F9uGIWsYURfVH7ir2.jpg', 'Ikan Cakalang', 'Budidaya', '2023-05-06', 70000, 4, 'Ikan kerapu segar, ukuran besar, kecil dan sedang hasil budidaya pelabuhan.', '2023-05-20 21:38:13', '2023-05-20 21:38:13'),
(13, 'http://localhost:8000/storage/ikans/JMR4YK0tR6HxlOWcHEG9lDBa65HJ167YtflyNAwB.jpg', 'Ikan Kerapu', 'Tangkapan', '2023-05-06', 74000, 5, 'Ikan kerapu segar, ukuran besar, kecil dan sedang hasil tangkapan hari ini.', '2023-05-20 21:39:11', '2023-05-20 21:39:11'),
(14, 'http://localhost:8000/storage/ikans/jGkZOau9RYuBcAiZ8bHvtCTVH1Z9wX56sqQYjoEm.jpg', 'Ikan Kembung', 'Tangkapan', '2023-05-06', 80000, 6, 'Ikan kembung segar, ukuran besar, kecil dan sedang hasil tangkapan hari ini.', '2023-05-20 21:40:04', '2023-05-20 21:40:04'),
(15, 'http://localhost:8000/storage/ikans/CY9o4Kha055cizsE6T2T7wr2YOjTzGaMa3Vcknn4.jpg', 'Ikan Jaket', 'Tangkapan', '2023-05-06', 75000, 6, 'Ikan jaket segar, ukuran besar, kecil dan sedang hasil tangkapan hari ini.', '2023-05-20 21:41:43', '2023-05-20 21:41:43'),
(16, 'http://localhost:8000/storage/ikans/QKrHCsQDE8LbGhKkwMXx7VJcPRIhGUxqvWnepBqa.jpg', 'Ikan Dencis', 'Tangkapan', '2023-05-06', 25000, 6, 'Ikan dencis segar, ukuran kecil dan sedang hasil tangkapan hari ini.', '2023-05-20 21:42:28', '2023-05-20 21:42:28'),
(17, 'http://localhost:8000/storage/ikans/8C8f7MIRuA8UCTH4ge0SfShbYqYNmRom3olbaSY7.jpg', 'Ikan Layur', 'Tangkapan', '2023-05-06', 25000, 6, 'Ikan layur segar, ukuran kecil dan sedang hasil tangkapan hari ini.', '2023-05-20 21:43:52', '2023-05-20 21:43:52'),
(18, 'http://localhost:8000/storage/ikans/84xuwsuxb5s9BExddKq2aJAM2vYpnDYyRYMelATY.jpg', 'Ikan Kuwe', 'Tangkapan', '2023-05-06', 60000, 7, 'Ikan kuwe segar, ukuran besar dan sedang hasil tangkapan hari ini.', '2023-05-20 21:44:35', '2023-05-20 21:44:35'),
(19, 'http://localhost:8000/storage/ikans/TBNorUDbprokLBLrPkgfndYHmovbp7Yy5lFaDmxc.jpg', 'Ikan Perang', 'Tangkapan', '2023-05-06', 50000, 7, 'Ikan perang segar, ukuran besar dan sedang hasil tangkapan hari ini.', '2023-05-20 21:45:31', '2023-05-20 21:45:31'),
(20, 'http://localhost:8000/storage/ikans/gpvXxf6ULb2hGeTjzdNynCETAklGEPfIkK5xN6DD.jpg', 'Ikan Kakap Hitam', 'Budidaya', '2023-05-06', 70000, 8, 'Ikan kakap segar, ukuran kecil,  besar dan sedang hasil budidaya pelabuhan.', '2023-05-20 21:46:53', '2023-05-20 21:46:53'),
(21, 'http://localhost:8000/storage/ikans/XFSqxndKTlMGvhXdvtfamCn9uHowvhCrhuBhagsu.jpg', 'Ikan Bawal Hitam', 'Budidaya', '2023-05-06', 43000, 8, 'Ikan bawal hitam segar, ukuran kecil,  besar dan sedang hasil budidaya pelabuhan.', '2023-05-20 21:47:34', '2023-05-20 21:47:34'),
(22, 'http://localhost:8000/storage/ikans/RPAgqYZSpNnEUMvAF3bh5c1yEbivQv1rptU7JetB.jpg', 'Ikan Kerapu Lodi', 'Budidaya', '2023-05-06', 123000, 9, 'Ikan kerapu lodi segar, ukuran kecil,  besar dan sedang hasil budidaya pelabuhan.', '2023-05-20 21:48:37', '2023-05-20 21:48:37'),
(23, 'http://localhost:8000/storage/ikans/RIwX955sZtR6O6eog7BcJK4PXsyIaNUIztBQJqEG.jpg', 'Ikan Kakap Merah', 'Budidaya', '2023-05-06', 63000, 9, 'Ikan kakap merah segar, ukuran kecil,  besar dan sedang hasil budidaya pelabuhan.', '2023-05-20 21:49:11', '2023-05-20 21:49:11'),
(24, 'http://localhost:8000/storage/ikans/UcWHis1QLCfpgKcelLOiPNrbPPNjaXeNwmkXTN0S.jpg', 'Ikan Ayam-Ayam', 'Tangkapan', '2023-05-06', 22000, 10, 'Ikan ayam-ayam segar, ukuran kecil,  besar dan sedang hasil tangkapan nelayan pelabuhan.', '2023-05-20 21:50:11', '2023-05-20 21:50:11'),
(25, 'http://localhost:8000/storage/ikans/kKClAiI8m7E1TZd9PfMoHlckcB7axqFEQDS26BTF.jpg', 'Ikan Lemuru', 'Tangkapan', '2023-05-06', 22000, 10, 'Ikan Lemuru segar, ukuran kecil,  besar dan sedang hasil tangkapan nelayan pelabuhan.', '2023-05-20 21:51:25', '2023-05-20 21:51:25'),
(26, 'http://localhost:8000/storage/ikans/KXJNuyUPOdsaxCBom738M0tc02pD4SDdS3fWh3AA.jpg', 'Ikan Selar', 'Tangkapan', '2023-05-06', 22000, 11, 'Ikan selar segar, ukuran kecil,  besar dan sedang hasil tangkapan nelayan pelabuhan.', '2023-05-20 21:51:59', '2023-05-20 21:51:59'),
(27, 'http://localhost:8000/storage/ikans/xl4uSa9QBZdzUINvv40kq2p3tJsKd6k5pejxUVHy.jpg', 'Ikan Teri', 'Tangkapan', '2023-05-06', 30000, 11, 'Ikan teri segar, ukuran kecil,  besar dan sedang hasil nelayan pelabuhan.', '2023-05-20 21:53:00', '2023-05-20 21:53:00'),
(28, 'http://localhost:8000/storage/ikans/pZ0n4Amz2NdIVVT2xs4jRkwizDFHXvKQmiFvo1xk.jpg', 'Ikan Layang', 'Tangkapan', '2023-05-06', 30000, 12, 'Ikan layang segar, ukuran kecil,  besar dan sedang hasil tangkapan nelayan pelabuhan hari ini.', '2023-05-20 21:53:36', '2023-05-20 21:53:36'),
(29, 'http://localhost:8000/storage/ikans/UycsQUh5MAQRUuWwtwf4xXtn3x1UOC0RJFRdKPcL.jpg', 'Ikan Tenggiri', 'Tangkapan', '2023-05-06', 55000, 12, 'Ikan tenggiri segar, ukuran kecil,  besar dan sedang hasil tangkapan nelayan pelabuhan hari ini.', '2023-05-20 21:54:18', '2023-05-20 21:54:18'),
(30, 'http://localhost:8000/storage/ikans/TjC4TUX8O3CAiPzAAJNI105O8VkfHUldioLO2bmd.jpg', 'Ikan Kembung', 'Tangkapan', '2023-05-06', 50000, 13, 'Ikan kembung segar, ukuran kecil,  besar dan sedang hasil tangkapan nelayan pelabuhan hari ini.', '2023-05-20 21:54:53', '2023-05-20 21:54:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_17_063356_create_ikans_table', 1),
(6, '2023_05_17_072906_create_jenis_ikans_table', 1),
(7, '2023_05_17_073556_create_pelabuhans_table', 1),
(8, '2023_05_19_124758_create_ikans_table', 2),
(9, '2023_05_19_130850_create_pelabuhans_table', 2),
(10, '2023_05_19_161119_create_ikans_table', 3),
(11, '2023_05_20_053654_create_transaksis_table', 4),
(12, '2023_05_20_054359_create_pemasoks_table', 5),
(13, '2023_05_20_061002_create_pelabuhans_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelabuhans`
--

CREATE TABLE `pelabuhans` (
  `id_pelabuhan` bigint(20) UNSIGNED NOT NULL,
  `pelabuhan` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelabuhans`
--

INSERT INTO `pelabuhans` (`id_pelabuhan`, `pelabuhan`, `lokasi`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Tanjung Priok', 'Jakarta', 'Tanjung Priok adalah pelabuhan terbesar di Jakarta', '2023-05-19 23:27:25', '2023-05-19 23:27:25'),
(2, 'Sibolga', 'Kecamatan Sibolga Selatan, Kota Sibolga.', 'Sibolga adalah pelabuhan multipurpose yang berada di Kota Sibolga.', '2023-05-20 17:31:03', '2023-05-20 23:05:01'),
(3, 'Tanjung Pandan', 'Jl. Pelabuhan No. 1, Pulau Belitung', 'Pelabuhan Tanjung Pandan adalah pelabuhan multipurpose yang berada di Pulau Belitung yang dikenal dengan Pelabuhan Laskar Pelangi.', '2023-05-20 17:45:58', '2023-05-20 17:45:58'),
(4, 'Tambak Rejo', 'Desa Tambak Rejo, Kec. Wonotirto, Kab. Blitar', 'Pelabuhan Tambakrejo adalah pelabuhan multipurpose yang berada di Blitar.', '2023-05-20 20:54:15', '2023-05-20 20:54:15'),
(5, 'Tegalsari', 'Desa Tegalsari, Kecamatan Tegal Barat, Kota Tegal', 'Pelabuhan Tegalsari adalah pelabuhan yang berdiri di atas tanah Pemerintah Kota Tegal sedangkan pengelolaannya oleh Pemerintah Provinsi Jawa Tengah.', '2023-05-20 20:57:02', '2023-05-20 20:57:02'),
(6, 'Labuhan Lombok', 'Desa Seruni Mumbul, Kecamatan Pringgabaya, Kabupaten Lombok Timur.', 'Di Pelabuhan Perikanan Labuan Lombok ini terdapat kurang lebih 20 sampai dengan 25 kapal yang melakukan aktifitas tambat labuh kapal. Jenis ikan yang didaratkan di Pelabuhan Perikanan Labuan Lombok ini biasanya terdiri dari ikan tuna, ikan cakalang, dan ikan marlin dengan rata-rata produksi 5000kg setiap harinya.', '2023-05-20 21:13:41', '2023-05-20 21:13:41'),
(7, 'Teluk Awang', 'Desa Mertak, Kecamatan Pujut, Lombok Tengah.', 'Pelabuhan Perikanan Teluk Awang adalah sentra pelabuhan bagian Timur.', '2023-05-20 21:18:25', '2023-05-20 21:18:25'),
(8, 'Kota Agung', 'Jl. Samudra No. 1, Baros, Kota Agung, Lampung.', 'Pelabuhan Perikanan Kota Agung ditetapkan sebagai pelabuhan pengumpul oleh Kementerian Perhubungan RI.', '2023-05-20 21:22:40', '2023-05-20 21:22:40'),
(9, 'Mayangan', 'Jl. Tanjung Tembaga  Kec. Mayangan, Kota Probolinggo, Jawa Timur.', 'Pelabuhan Perikanan Pantai Mayangan merupakan pusat kegiatan perekonomian bidang perikanan juga menjadi tempat wisata yang menarik.', '2023-05-20 21:25:24', '2023-05-20 21:25:24'),
(10, 'Paranggi', 'Paranggi, Ampibabo, Kabupaten Parigi Moutung, Sulawesi Tengah.', 'Pelabuhan Perikanan Peranggi adalah salah satu Pangkalan Pendaratan Ikan yang dimiliki oleh Dinas Kelautan dan Perikanan Propinsi Sulawesi Tengah dibawah naungan UPT Pelabuhan Perikanan setelah PPI Donggala, PPI Pagimana dan PPP Ogotua.', '2023-05-20 21:29:24', '2023-05-20 21:29:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasoks`
--

CREATE TABLE `pemasoks` (
  `id_pemasok` bigint(20) UNSIGNED NOT NULL,
  `nama_pemasok` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kontak` varchar(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemasoks`
--

INSERT INTO `pemasoks` (`id_pemasok`, `nama_pemasok`, `alamat`, `kontak`, `created_at`, `updated_at`) VALUES
(1, 'nanda', 'Jl. Sudirman no. 2 Jakarta', '08116408111', '2023-05-20 00:17:15', '2023-05-20 00:17:15'),
(2, 'rizki', 'Jl. Karya', '081164081112', '2023-05-20 22:08:20', '2023-05-20 22:08:20'),
(3, 'amelia', 'Jl. Jamin Ginting', '08116408222', '2023-05-20 22:08:49', '2023-05-20 22:08:49'),
(4, 'Indah Amalia', 'Jl. Merdeka', '081121347654', '2023-05-20 22:09:12', '2023-05-20 22:09:12'),
(5, 'Wahyu', 'Jl. Perintis Kemerdekaan', '082121347654', '2023-05-20 22:09:36', '2023-05-20 22:09:36'),
(6, 'Zhafran', 'Jl. Pengangsaan Timur', '08212134678', '2023-05-20 22:09:59', '2023-05-20 22:09:59'),
(7, 'Sony', 'Jl. Tuamang', '08212118374', '2023-05-20 22:10:16', '2023-05-20 22:10:16'),
(8, 'Alvinsyah', 'Jl. Karya Bakti', '08521211837', '2023-05-20 22:10:36', '2023-05-20 22:10:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyApp', '1c5109b39e3a497d9f1fcbcc49ea2ed5fd7b3a7f0766664a90e56e20219e62fa', '[\"*\"]', NULL, NULL, '2023-05-17 02:43:24', '2023-05-17 02:43:24'),
(3, 'App\\Models\\User', 2, 'MyApp', 'fc1b45b552dcf04fe10baf2e14b486866b5920e1f4563c0433a95606c308f9d9', '[\"*\"]', NULL, NULL, '2023-05-17 02:50:12', '2023-05-17 02:50:12'),
(4, 'App\\Models\\User', 2, 'MyApp', '33a519c622f8a73f4effd45b101b24f5be1e64077a26f6771d791c035144881d', '[\"*\"]', NULL, NULL, '2023-05-18 07:45:13', '2023-05-18 07:45:13'),
(5, 'App\\Models\\User', 2, 'MyApp', 'e5116ec39b80985e032d712295e5ccf23a55c1c126ac0796b7983612cd3e9da8', '[\"*\"]', '2023-05-20 22:04:36', NULL, '2023-05-20 16:45:56', '2023-05-20 22:04:36'),
(6, 'App\\Models\\User', 3, 'MyApp', '9749f285b59b401c520aee8a2c24d23bc23252d8832cf05d35a7f09bab7e5a19', '[\"*\"]', NULL, NULL, '2023-05-20 22:20:23', '2023-05-20 22:20:23'),
(7, 'App\\Models\\User', 4, 'MyApp', '39ccb27720495a6a887b9a71fc8e49119d9741613986b8e2123dfd7dcf1a1681', '[\"*\"]', NULL, NULL, '2023-05-20 22:20:53', '2023-05-20 22:20:53'),
(8, 'App\\Models\\User', 5, 'MyApp', '49e80ca2f0f627b257b388a4770a3b7712a755e23200fbd39265883e4f5933c9', '[\"*\"]', NULL, NULL, '2023-05-20 22:21:15', '2023-05-20 22:21:15'),
(10, 'App\\Models\\User', 2, 'MyApp', 'f0e17b94e92a37b90c8e8102be668684cf183441fb8e079dc574483ab0d8048e', '[\"*\"]', '2023-05-20 23:10:09', NULL, '2023-05-20 22:23:26', '2023-05-20 23:10:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_ikan` bigint(20) NOT NULL,
  `id_pemasok` bigint(20) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id_transaksi`, `id_ikan`, `id_pemasok`, `jumlah`, `tgl_transaksi`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '35 kg', '2023-05-06', '2023-05-20 00:20:32', '2023-05-20 22:50:30'),
(3, 3, 2, '100 kg', '2023-05-06', '2023-05-20 22:12:06', '2023-05-20 22:12:06'),
(4, 4, 3, '35 kg', '2023-05-06', '2023-05-20 22:12:26', '2023-05-20 22:12:26'),
(5, 5, 3, '65 kg', '2023-05-06', '2023-05-20 22:12:39', '2023-05-20 22:12:39'),
(6, 6, 4, '54 kg', '2023-05-06', '2023-05-20 22:12:58', '2023-05-20 22:12:58'),
(7, 7, 4, '79 kg', '2023-05-06', '2023-05-20 22:13:09', '2023-05-20 22:13:09'),
(8, 8, 5, '63 kg', '2023-05-06', '2023-05-20 22:13:22', '2023-05-20 22:13:22'),
(9, 9, 6, '66 kg', '2023-05-06', '2023-05-20 22:13:38', '2023-05-20 22:13:38'),
(10, 10, 6, '89 kg', '2023-05-06', '2023-05-20 22:13:53', '2023-05-20 22:13:53'),
(11, 11, 7, '90 kg', '2023-05-06', '2023-05-20 22:14:09', '2023-05-20 22:14:09'),
(12, 12, 7, '78 kg', '2023-05-06', '2023-05-20 22:14:24', '2023-05-20 22:14:24'),
(13, 13, 8, '60 kg', '2023-05-06', '2023-05-20 22:14:43', '2023-05-20 22:14:43'),
(14, 14, 1, '78 kg', '2023-05-06', '2023-05-20 22:14:59', '2023-05-20 22:14:59'),
(15, 15, 2, '90 kg', '2023-05-06', '2023-05-20 22:15:15', '2023-05-20 22:15:15'),
(16, 16, 3, '85 kg', '2023-05-06', '2023-05-20 22:15:28', '2023-05-20 22:15:28'),
(17, 17, 4, '75 kg', '2023-05-06', '2023-05-20 22:15:45', '2023-05-20 22:15:45'),
(18, 18, 5, '85 kg', '2023-05-06', '2023-05-20 22:16:04', '2023-05-20 22:16:04'),
(19, 19, 6, '65 kg', '2023-05-06', '2023-05-20 22:16:23', '2023-05-20 22:16:23'),
(20, 20, 7, '80 kg', '2023-05-06', '2023-05-20 22:16:39', '2023-05-20 22:16:39'),
(21, 21, 8, '80 kg', '2023-05-06', '2023-05-20 22:16:47', '2023-05-20 22:16:47'),
(22, 22, 8, '70 kg', '2023-05-06', '2023-05-20 22:17:01', '2023-05-20 22:17:01'),
(23, 23, 8, '50 kg', '2023-05-06', '2023-05-20 22:17:15', '2023-05-20 22:17:15'),
(24, 24, 7, '40 kg', '2023-05-06', '2023-05-20 22:17:29', '2023-05-20 22:17:29'),
(25, 25, 6, '60 kg', '2023-05-06', '2023-05-20 22:17:43', '2023-05-20 22:17:43'),
(26, 26, 5, '80 kg', '2023-05-06', '2023-05-20 22:17:56', '2023-05-20 22:17:56'),
(27, 27, 4, '70 kg', '2023-05-06', '2023-05-20 22:18:12', '2023-05-20 22:18:12'),
(28, 28, 3, '90 kg', '2023-05-06', '2023-05-20 22:18:31', '2023-05-20 22:18:31'),
(29, 29, 2, '50 kg', '2023-05-06', '2023-05-20 22:18:47', '2023-05-20 22:18:47'),
(30, 30, 1, '70 kg', '2023-05-06', '2023-05-20 22:19:02', '2023-05-20 22:19:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `api_token` varchar(80) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nanda', 'nanda123@gmail.com', NULL, '$2y$10$YmdWnBvqf/AkofJOgqSUIOjqsklGecKXl2d8E4A5cSX9Ffmv09zGu', 'WeOUgHDldBY7pKaQoVNo70o7aJsdeo7uCjk7vHoKYMI82r0zBIq1MnCL5OeM', NULL, '2023-05-17 02:43:22', '2023-05-17 02:43:22'),
(2, 'nanda', 'nanda@gmail.com', NULL, '$2y$10$b.POqGhmywfKfaDoJg9GjeFN/yJ6vseXZ1GN6N25QuvWZ5vsS8a0u', 'Y54cM9DBjjk5SavFUHdr2yru1vZIX2xbxHxBq3c5vNz2zgJI6Tx70KBUy1Kw', NULL, '2023-05-17 02:50:12', '2023-05-17 02:50:12'),
(3, 'indah', 'indahamalia@gmail.com', NULL, '$2y$10$vrG7U.WIMYBMiGuKEQsrBedvZbngEY4TseevVN8ULbKWlA7b3eiFO', '3xfHJzFQwSd9q44Xvlq6m4uwLCC3iutiDRKmHLLpWqDvd5r2s560UOeq2aZe', NULL, '2023-05-20 22:20:22', '2023-05-20 22:20:22'),
(4, 'zhafran', 'zhafranalvinsyah@gmail.com', NULL, '$2y$10$KE6QAz7UAOSyqhWXTVvKt.G1RINA.EQzjANEsl8Q2n9JCurhfZJQG', 'ogYz4fCabxkGW78pIhM5D1YDoVdNUoZMK15EACQ0r0VshrgUPXiP2hBGJuAB', NULL, '2023-05-20 22:20:53', '2023-05-20 22:20:53'),
(5, 'wahyu', 'wahyusony@gmail.com', NULL, '$2y$10$xdZnl0hLdoy/D3XDZ77S.eedq.qlET0ZLDT5CDMkYCxryNPHFRMCS', 'piCa1Iw983uKgpYr9ulTTRuqkgdsGKfC7uHbLuzI24MEmFqLWRKftfAEball', NULL, '2023-05-20 22:21:15', '2023-05-20 22:21:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `ikans`
--
ALTER TABLE `ikans`
  ADD PRIMARY KEY (`id_ikan`),
  ADD KEY `id_pelabuhan` (`id_pelabuhan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pelabuhans`
--
ALTER TABLE `pelabuhans`
  ADD PRIMARY KEY (`id_pelabuhan`);

--
-- Indeks untuk tabel `pemasoks`
--
ALTER TABLE `pemasoks`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_ikan` (`id_ikan`),
  ADD KEY `id_pemasok` (`id_pemasok`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ikans`
--
ALTER TABLE `ikans`
  MODIFY `id_ikan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelabuhans`
--
ALTER TABLE `pelabuhans`
  MODIFY `id_pelabuhan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pemasoks`
--
ALTER TABLE `pemasoks`
  MODIFY `id_pemasok` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
