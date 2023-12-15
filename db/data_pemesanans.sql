-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2023 pada 16.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemesanans`
--

CREATE TABLE `data_pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `no_transaksi` bigint(20) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `tanggal_teransaksi` datetime NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tenggat_pembayaran` enum('1','2','7','14','30') NOT NULL,
  `id_pengirim` bigint(20) UNSIGNED DEFAULT NULL,
  `alamat` longtext NOT NULL,
  `status` enum('dikemas','dikirim','selesai','pending','batal','dibatalkan','nonacc') NOT NULL,
  `status_pembayaran` enum('belum','sudah','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_pemesanans`
--

INSERT INTO `data_pemesanans` (`id`, `id_user`, `no_transaksi`, `nama_pemesan`, `id_barang`, `tanggal_teransaksi`, `jumlah_beli`, `total_harga`, `tenggat_pembayaran`, `id_pengirim`, `alamat`, `status`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(14, 6, 95005, 'RANI ROSADA', 3, '2023-12-01 20:55:44', 2, '500000', '7', 1, 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', 'dikemas', 'belum', '2023-12-01 13:55:44', '2023-12-01 13:56:12'),
(15, 6, 73455, 'Pak Rahman', 1, '2023-12-01 20:57:34', 20, '2000000', '30', NULL, 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', 'dibatalkan', 'belum', '2023-12-01 13:57:34', '2023-12-01 13:58:29'),
(16, 6, 98282, 'Pak Rahman', 2, '2023-12-01 20:58:59', 4, '80000', '30', NULL, 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', 'pending', 'belum', '2023-12-01 13:58:59', '2023-12-01 13:59:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pemesanans`
--
ALTER TABLE `data_pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_pemesanans_id_user_foreign` (`id_user`),
  ADD KEY `data_pemesanans_id_barang_foreign` (`id_barang`),
  ADD KEY `data_pemesanans_id_pengirim_foreign` (`id_pengirim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pemesanans`
--
ALTER TABLE `data_pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pemesanans`
--
ALTER TABLE `data_pemesanans`
  ADD CONSTRAINT `data_pemesanans_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `data_barangs` (`id`),
  ADD CONSTRAINT `data_pemesanans_id_pengirim_foreign` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirims` (`id`),
  ADD CONSTRAINT `data_pemesanans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
