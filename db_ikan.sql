-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2023 pada 07.42
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
-- Database: `db_ikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikan`
--

CREATE TABLE `ikan` (
  `id_ikan` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `id_pelabuhan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ikan`
--

INSERT INTO `ikan` (`id_ikan`, `nama`, `deskripsi`, `harga`, `ukuran`, `id_pelabuhan`) VALUES
(1, 'Ikan Tuna', 'Ikan dengan daging merah dan lezat.', 50000.00, 'Besar', 1),
(2, 'Ikan Kakap', 'Ikan dengan daging putih dan lembut.', 40000.00, 'Sedang', 2),
(3, 'Ikan Gurame', 'Ikan air tawar yang populer.', 60000.00, 'Besar', 3),
(4, 'Ikan Bandeng', 'Ikan khas Indonesia yang lezat.', 35000.00, 'Sedang', 4),
(5, 'Ikan Cakalang', 'Ikan dengan daging berlemak dan gurih.', 45000.00, 'Besar', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelabuhan`
--

CREATE TABLE `pelabuhan` (
  `id_pelabuhan` int(11) NOT NULL,
  `nama_pelabuhan` varchar(255) DEFAULT NULL,
  `lintang` decimal(9,6) DEFAULT NULL,
  `bujur` decimal(9,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelabuhan`
--

INSERT INTO `pelabuhan` (`id_pelabuhan`, `nama_pelabuhan`, `lintang`, `bujur`) VALUES
(1, 'Pelabuhan Tanjung Priok', -6.107500, 106.883100),
(2, 'Pelabuhan Merak', -6.100500, 106.547500),
(3, 'Pelabuhan Tanjung Emas', -6.974200, 110.427800),
(4, 'Pelabuhan Belawan', 3.764900, 98.692300),
(5, 'Pelabuhan Makassar', -5.150000, 119.416700);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `email`, `password`, `alamat`) VALUES
(1, 'JohnDoe', 'johndoe@example.com', 'password123', 'Jl. Sudirman No. 123, Jakarta'),
(2, 'JaneSmith', 'janesmith@example.com', 'password456', 'Jl. Thamrin No. 456, Jakarta'),
(3, 'AhmadRizal', 'ahmadrizal@example.com', 'password789', 'Jl. Diponegoro No. 789, Surabaya'),
(4, 'SitiAminah', 'sitiaminah@example.com', 'password321', 'Jl. Gajah Mada No. 321, Bandung'),
(5, 'BudiSantoso', 'budisantoso@example.com', 'password654', 'Jl. Kebon Jeruk No. 654, Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_ikan` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `tanggal_pesanan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pengguna`, `id_ikan`, `jumlah`, `total_harga`, `tanggal_pesanan`) VALUES
(1, 1, 2, 2, 80000.00, '2023-05-10'),
(2, 2, 3, 1, 60000.00, '2023-05-09'),
(3, 3, 1, 3, 150000.00, '2023-05-08'),
(4, 4, 5, 2, 90000.00, '2023-05-07'),
(5, 5, 4, 1, 35000.00, '2023-05-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_ikan` int(11) DEFAULT NULL,
  `penilaian` int(11) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal_ulasan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_pengguna`, `id_ikan`, `penilaian`, `komentar`, `tanggal_ulasan`) VALUES
(1, 1, 2, 4, 'Ikan Kakapnya sangat segar dan rasanya enak. Puas dengan pelayanan!', '2023-05-10'),
(2, 3, 1, 5, 'Ikan Tunanya segar dan ukurannya besar sesuai yang diharapkan. Harganya juga terjangkau.', '2023-05-09'),
(3, 2, 3, 3, 'Ikan Guramenya cukup bagus, tapi sedikit kecewa dengan ukurannya yang lebih kecil dari yang diharapkan.', '2023-05-08'),
(4, 5, 4, 4, 'Ikan Bandengnya enak dan bumbunya pas. Puas dengan pembeliannya.', '2023-05-07'),
(5, 4, 5, 5, 'Ikan Cakalangnya sungguh lezat dan segar. Layak dicoba!', '2023-05-06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id_ikan`),
  ADD KEY `id_pelabuhan` (`id_pelabuhan`);

--
-- Indeks untuk tabel `pelabuhan`
--
ALTER TABLE `pelabuhan`
  ADD PRIMARY KEY (`id_pelabuhan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_ikan` (`id_ikan`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_ikan` (`id_ikan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ikan`
--
ALTER TABLE `ikan`
  ADD CONSTRAINT `ikan_ibfk_1` FOREIGN KEY (`id_pelabuhan`) REFERENCES `pelabuhan` (`id_pelabuhan`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_ikan`) REFERENCES `ikan` (`id_ikan`);

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_ikan`) REFERENCES `ikan` (`id_ikan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
