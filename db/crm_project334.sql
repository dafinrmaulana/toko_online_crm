-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2023 pada 20.14
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
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `company` varchar(225) NOT NULL,
  `alamat` text DEFAULT NULL,
  `role` enum('admin','user','pimpinan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nama`, `email`, `password`, `no_hp`, `company`, `alamat`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$lDg5RMzSUGguTMnUEZvWI.VCCdRjOWel2Ndnh.TgaMv.qIFYSSfgS', '081234567890', '', NULL, 'admin', '2023-12-03 15:42:50', '2023-12-03 15:42:50'),
(2, 'Dewi', 'user@user.com', '$2y$10$OMBSUH5Or4aCwCQjd9eNN.WtVAxrao9whfSVVX6em808MHasqW3YK', '081234567890', 'PT.ISTANA ABADI', 'HHJHJJHHJHHJJHJ', 'user', '2023-12-03 15:42:50', '2023-12-08 14:59:26'),
(3, 'Pimpinan', 'pimpinan@pimpinan.com', '$2y$10$RyxfUsx4a/xFDGcAIOnazOFlbFVlRPPd1HzC4u897Jkl.RaVNGUBy', '081234567890', '', NULL, 'pimpinan', '2023-12-03 15:42:51', '2023-12-03 15:42:51'),
(5, 'Hamid Hanijall', 'hamid12@gmail.com', '$2y$10$3wLDTyx5fC8QTSBE.E6u1.tMtPqZPHo7M8711DYP.NORSP0o6.JMO', '089636900775', 'PT. Teknik Mandiri Perkasa', 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', 'user', '2023-12-07 18:18:18', '2023-12-08 14:13:09'),
(7, 'ilham habibi', 'ilham@gmail.com', '$2y$10$OvXScJh6wqVprYIkUegXhub0qo3qX0w6Olz6moqKU9OJ6yOSZIUWO', '085624532405', 'PT.Isnaini Sungguhan', 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', 'user', '2023-12-08 14:39:39', '2023-12-08 14:49:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chats`
--

INSERT INTO `chats` (`id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 'Test chat', '2023-12-03 15:42:51', '2023-12-03 15:42:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_replies`
--

CREATE TABLE `chat_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chat_replies`
--

INSERT INTO `chat_replies` (`id`, `chat_id`, `admin_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Test Chat', '2023-12-03 15:42:51', '2023-12-03 15:42:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barangs`
--

CREATE TABLE `data_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `gambar` longtext NOT NULL,
  `harga` varchar(255) NOT NULL,
  `kategori` enum('cctv','pc','hardware','ups','notebook','cable') NOT NULL,
  `kondisi` enum('baru','bekas') NOT NULL,
  `berat` varchar(255) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_barangs`
--

INSERT INTO `data_barangs` (`id`, `nama_barang`, `gambar`, `harga`, `kategori`, `kondisi`, `berat`, `rating`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'notebook lenovo', 'WhatsApp Image 2023-11-28 at 00.42.43 (1).jpeg', '100000', 'notebook', 'baru', '3', NULL, 'sdakdladalda', '2023-12-03 15:46:39', '2023-12-03 15:46:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_chats`
--

CREATE TABLE `data_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `isi_chat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemesanans`
--

CREATE TABLE `data_pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `no_transaksi` bigint(20) DEFAULT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `tanggal_teransaksi` datetime NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tenggat_pembayaran` enum('1','2','7','14','30') DEFAULT NULL,
  `id_pengirim` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('keranjang','pending','dikemas','dikirim','selesai','batal','dibatalkan','nonacc') NOT NULL,
  `status_pembayaran` enum('belum','sudah','','') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_pemesanans`
--

INSERT INTO `data_pemesanans` (`id`, `id_user`, `no_transaksi`, `nama_pemesan`, `id_barang`, `tanggal_teransaksi`, `jumlah_beli`, `total_harga`, `tenggat_pembayaran`, `id_pengirim`, `status`, `status_pembayaran`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 2, 35869, 'User', 1, '2023-12-04 00:25:26', 2, '200000', '7', NULL, 'dikemas', 'belum', 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', '2023-12-03 17:25:26', '2023-12-07 16:08:14'),
(2, 2, 35869, 'User', 1, '2023-12-04 00:55:06', 3, '300000', '7', NULL, 'dibatalkan', 'belum', 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', '2023-12-03 17:55:06', '2023-12-07 16:37:13'),
(3, 2, 35869, 'User', 1, '2023-12-06 23:25:03', 3, '300000', '7', NULL, 'pending', 'belum', 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', '2023-12-06 16:25:03', '2023-12-06 19:16:59'),
(4, 2, 92961, 'User', 1, '2023-12-07 02:24:31', 1, '100000', '2', NULL, 'pending', 'belum', 'Singaparna, Tasikmalaya', '2023-12-06 19:24:31', '2023-12-06 19:50:39'),
(5, 2, 92961, 'User', 1, '2023-12-07 02:50:08', 1, '100000', '2', NULL, 'pending', 'belum', 'Singaparna, Tasikmalaya', '2023-12-06 19:50:08', '2023-12-06 19:50:39'),
(6, 2, 67857, 'User', 1, '2023-12-07 23:24:45', 0, '0', '2', NULL, 'dibatalkan', NULL, 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', '2023-12-07 16:24:45', '2023-12-07 16:37:06'),
(7, 2, 67857, 'User', 1, '2023-12-07 23:36:08', 0, '0', '2', NULL, 'dibatalkan', NULL, 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', '2023-12-07 16:36:08', '2023-12-07 16:37:08'),
(8, 2, 14212, 'User', 1, '2023-12-07 23:38:02', -1, '-100000', '1', NULL, 'pending', NULL, 'Singaparna, Tasikmalaya', '2023-12-07 16:38:02', '2023-12-07 16:38:26'),
(9, 2, 70660, 'User', 1, '2023-12-08 00:40:13', 2, '200000', '7', NULL, 'batal', 'belum', 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', '2023-12-07 17:40:13', '2023-12-07 17:42:34'),
(10, 5, 43700, 'Hamid Hanijall', 1, '2023-12-08 02:12:10', 1, '100000', '7', NULL, 'pending', 'belum', 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', '2023-12-07 19:12:10', '2023-12-07 19:21:14'),
(11, 5, 43700, 'Hamid Hanijall', 1, '2023-12-08 02:15:03', 3, '300000', '7', NULL, 'pending', 'belum', 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', '2023-12-07 19:15:03', '2023-12-07 19:21:14'),
(12, 7, 44770, 'ilham habibi', 1, '2023-12-08 21:40:14', 1, '100000', '14', NULL, 'pending', 'belum', 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', '2023-12-08 14:40:14', '2023-12-08 14:40:28'),
(13, 2, 79896, 'Dewi', 1, '2023-12-08 22:44:07', 1, '100000', '1', NULL, 'pending', 'belum', 'HHJHJJHHJHHJJHJ', '2023-12-08 15:44:07', '2023-12-08 15:44:22'),
(14, 5, NULL, 'Hamid Hanijall', 1, '2023-12-09 02:01:09', 5, '500000', NULL, NULL, 'keranjang', NULL, NULL, '2023-12-08 19:01:09', '2023-12-08 19:01:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `id_pemesanan` bigint(20) UNSIGNED NOT NULL,
  `id_pengirim` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_02_18_141238_create_admins_table', 1),
(3, '2023_02_19_144459_create_data_barangs_table', 1),
(4, '2023_02_19_144913_create_pengirims_table', 1),
(5, '2023_02_19_145112_create_data_pemesanans_table', 1),
(6, '2023_02_19_145140_create_laporans_table', 1),
(7, '2023_02_19_145210_create_data_chats_table', 1),
(8, '2023_05_18_151326_create_chats_table', 1),
(9, '2023_05_18_151411_create_chat_replies_table', 1),
(10, '2023_12_01_220607_create_keranjangs_table', 1),
(11, '2023_12_03_213058_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `keranjang_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tenggat` enum('1','2','7','14','30') NOT NULL,
  `pengirim_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alamat` text NOT NULL,
  `status` enum('pending','dikemas','dikirim','selesai','batal','dibatalkan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengirims`
--

CREATE TABLE `pengirims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `ongkir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengirims`
--

INSERT INTO `pengirims` (`id`, `nama_pengirim`, `ongkir`, `created_at`, `updated_at`) VALUES
(1, 'Kurir NPS', '0', '2023-12-07 19:20:37', '2023-12-07 19:20:37');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `chat_replies`
--
ALTER TABLE `chat_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_replies_chat_id_foreign` (`chat_id`),
  ADD KEY `chat_replies_admin_id_foreign` (`admin_id`);

--
-- Indeks untuk tabel `data_barangs`
--
ALTER TABLE `data_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_chats`
--
ALTER TABLE `data_chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_chats_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `data_pemesanans`
--
ALTER TABLE `data_pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_pemesanans_id_user_foreign` (`id_user`),
  ADD KEY `data_pemesanans_id_barang_foreign` (`id_barang`),
  ADD KEY `data_pemesanans_id_pengirim_foreign` (`id_pengirim`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_user_id_foreign` (`user_id`),
  ADD KEY `keranjangs_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporans_id_user_foreign` (`id_user`),
  ADD KEY `laporans_id_barang_foreign` (`id_barang`),
  ADD KEY `laporans_id_pemesanan_foreign` (`id_pemesanan`),
  ADD KEY `laporans_id_pengirim_foreign` (`id_pengirim`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_keranjang_id_foreign` (`keranjang_id`),
  ADD KEY `orders_pengirim_id_foreign` (`pengirim_id`);

--
-- Indeks untuk tabel `pengirims`
--
ALTER TABLE `pengirims`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `chat_replies`
--
ALTER TABLE `chat_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_barangs`
--
ALTER TABLE `data_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_chats`
--
ALTER TABLE `data_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pemesanans`
--
ALTER TABLE `data_pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengirims`
--
ALTER TABLE `pengirims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chat_replies`
--
ALTER TABLE `chat_replies`
  ADD CONSTRAINT `chat_replies_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_replies_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_chats`
--
ALTER TABLE `data_chats`
  ADD CONSTRAINT `data_chats_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `admins` (`id`);

--
-- Ketidakleluasaan untuk tabel `data_pemesanans`
--
ALTER TABLE `data_pemesanans`
  ADD CONSTRAINT `data_pemesanans_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `data_barangs` (`id`),
  ADD CONSTRAINT `data_pemesanans_id_pengirim_foreign` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirims` (`id`),
  ADD CONSTRAINT `data_pemesanans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `admins` (`id`);

--
-- Ketidakleluasaan untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `data_barangs` (`id`),
  ADD CONSTRAINT `keranjangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Ketidakleluasaan untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD CONSTRAINT `laporans_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `data_barangs` (`id`),
  ADD CONSTRAINT `laporans_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `data_pemesanans` (`id`),
  ADD CONSTRAINT `laporans_id_pengirim_foreign` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirims` (`id`),
  ADD CONSTRAINT `laporans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `admins` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_keranjang_id_foreign` FOREIGN KEY (`keranjang_id`) REFERENCES `keranjangs` (`id`),
  ADD CONSTRAINT `orders_pengirim_id_foreign` FOREIGN KEY (`pengirim_id`) REFERENCES `pengirims` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
