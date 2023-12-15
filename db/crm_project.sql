-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2023 pada 18.00
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
  `role` enum('admin','user','pimpinan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nama`, `email`, `password`, `no_hp`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$jjrUJclLWRB6O828CjP5d.nkO/7NkVwS4BwKYF8XoZKABfuYmKo1K', '081234567890', 'admin', '2023-11-27 15:05:58', '2023-11-27 15:05:58'),
(2, 'User', 'user@user.com', '$2y$10$tsizo7V36fIHMAcZ89XLteFh7ViNubRHAk9X5ZFVsLLItWrKJWNwe', '081234567890', 'user', '2023-11-27 15:05:58', '2023-11-27 15:05:58'),
(3, 'Pimpinan', 'pimpinan@pimpinan.com', '$2y$10$ftbLjBZZqtV.2j/4eOGOwuJBog.Vayz0eBd/MW7Elmb1OM.8ShCBC', '081234567890', 'pimpinan', '2023-11-27 15:05:58', '2023-11-27 15:05:58'),
(6, 'Rani Rosada', 'rani.rosada06@gmail.com', '$2y$10$149zrdLoWE6lBUpCPoos5.68URhk7MDVmKA3nJ9HbjefkjsaNyIC2', '081283399261', 'user', '2023-11-29 14:28:57', '2023-11-29 14:28:57');

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
(1, 1, 'hai', '2023-11-27 15:11:49', '2023-11-27 15:11:49'),
(2, 2, 'apakah barang ini ada min', '2023-11-27 15:12:12', '2023-11-27 15:12:12'),
(3, 2, 'Hallo admin', '2023-11-27 15:12:58', '2023-11-27 15:12:58'),
(4, 2, 'Malam PT Nps', '2023-11-27 17:54:06', '2023-11-27 17:54:06'),
(5, 1, 'Malam bu', '2023-11-27 17:54:20', '2023-11-27 17:54:20'),
(6, 1, 'ada yang bisa saya bantu bu', '2023-11-27 17:54:26', '2023-11-27 17:54:26');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barangs`
--

CREATE TABLE `data_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `gambar` longtext NOT NULL,
  `harga` varchar(255) NOT NULL,
  `kategori` enum('cctv','monitor','hardware','ups','cable','notebook','pc') NOT NULL,
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
(1, 'Cabel', 'bc08aa68-5a4c-4616-a2b0-f837e5c8a71c.jpg', '100000', 'cable', 'baru', '3', NULL, 'dsadad', '2023-11-27 15:36:38', '2023-11-27 15:36:38'),
(2, 'Cabel', 'bc08aa68-5a4c-4616-a2b0-f837e5c8a71c.jpg', '20000', 'cable', 'baru', '5', NULL, 'dasdada', '2023-11-27 15:43:41', '2023-11-27 15:46:38'),
(3, 'Battery 12V 5 AH', 'WhatsApp Image 2023-11-28 at 00.42.42.jpeg', '250000', 'ups', 'baru', '2', NULL, 'Ritar RT Series 5 Ah – 12v VRLA-AGM Battery\r\n- Long design life\r\n- Low self-discharge rate\r\n- Good high rate discharge performance\r\n- Wide operation temperature range\r\n- Application: small UPS, emergency light, security systems, toys, medical, etc.', '2023-11-27 17:44:47', '2023-11-27 17:56:04'),
(4, 'Battery 12V 7AH', 'WhatsApp Image 2023-11-28 at 00.42.43.jpeg', '285000', 'ups', 'baru', '2,5', NULL, 'Ritar RT Series 7 Ah – 12v VRLA-AGM Battery\r\n\r\nLong design life\r\nLow self-discharge rate\r\nGood high rate discharge performance\r\nWide operation temperature range\r\nApplication: small UPS, emergency light, security systems, toys, medical, etc.', '2023-11-27 17:57:15', '2023-11-27 17:57:15'),
(5, 'Battery 12V 9AH', 'WhatsApp Image 2023-11-28 at 00.42.43 (1).jpeg', '300000', 'ups', 'baru', '3', NULL, 'Ritar RT Series 9 Ah – 12v VRLA-AGM Battery\r\n\r\nLong design life\r\nLow self-discharge rate\r\nGood high rate discharge performance\r\nWide operation temperature range\r\nApplication: small UPS, emergency light, security systems, toys, medical, etc.', '2023-11-27 17:58:21', '2023-11-27 17:58:21'),
(6, 'notebook lenovo', 'Liebert-EXS-1-713x1024.png', '1000', 'notebook', 'bekas', '3', NULL, 'fsdfs', '2023-11-29 15:59:05', '2023-11-29 15:59:05');

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
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `no_transaksi` bigint(20) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `tanggal_teransaksi` datetime NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tenggat_pembayaran` enum('PBD','PAD','TOP_7_Days','TOP_14_Days','TOP_30_Days') NOT NULL,
  `id_pengirim` bigint(20) UNSIGNED DEFAULT NULL,
  `alamat` longtext NOT NULL,
  `status` enum('dikemas','dikirim','selesai','pending') NOT NULL,
  `status_pembayaran` enum('belum','sudah','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_pemesanans`
--

INSERT INTO `data_pemesanans` (`id`, `id_user`, `no_transaksi`, `nama_pemesan`, `id_barang`, `tanggal_teransaksi`, `jumlah_beli`, `total_harga`, `tenggat_pembayaran`, `id_pengirim`, `alamat`, `status`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 2, 18881, 'nurha', 2, '2023-11-27 23:20:04', 3, '60000', 'TOP_7_Days', 2, 'sjsjsjsjsj', 'selesai', 'sudah', '2023-11-27 16:20:04', '2023-11-29 16:47:14'),
(2, 6, 17091, 'dewi', 3, '2023-11-29 23:05:16', 2, '500000', 'PAD', 2, 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', 'selesai', 'sudah', '2023-11-29 16:05:16', '2023-11-29 16:50:27'),
(3, 6, 20599, 'wisye', 3, '2023-11-29 23:05:52', 3, '750000', 'TOP_7_Days', NULL, 'Jl. Hj Ridi no 117\r\nKel Ulujamsi kec Pesanggrahan', 'dikemas', 'belum', '2023-11-29 16:05:52', '2023-11-29 16:05:52');

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
(9, '2023_05_18_151411_create_chat_replies_table', 1);

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
(1, 'Kurir NPS', '0', '2023-11-27 15:14:04', '2023-11-27 15:14:04'),
(2, 'JNE', '10000', '2023-11-27 15:14:29', '2023-11-27 15:14:29');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `chat_replies`
--
ALTER TABLE `chat_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_barangs`
--
ALTER TABLE `data_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_chats`
--
ALTER TABLE `data_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pemesanans`
--
ALTER TABLE `data_pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengirims`
--
ALTER TABLE `pengirims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Ketidakleluasaan untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD CONSTRAINT `laporans_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `data_barangs` (`id`),
  ADD CONSTRAINT `laporans_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `data_pemesanans` (`id`),
  ADD CONSTRAINT `laporans_id_pengirim_foreign` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirims` (`id`),
  ADD CONSTRAINT `laporans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
