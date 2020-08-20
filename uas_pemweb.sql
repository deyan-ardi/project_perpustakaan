-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Agu 2020 pada 15.52
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pemweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_buku` varchar(300) NOT NULL,
  `nama_pengarang` varchar(300) NOT NULL,
  `nama_penerbit` varchar(200) NOT NULL,
  `ketebalan` varchar(10) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `edisi_buku` varchar(10) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `id_kategori`, `judul_buku`, `nama_pengarang`, `nama_penerbit`, `ketebalan`, `tahun_terbit`, `edisi_buku`, `jumlah_buku`, `created_at`, `updated_at`, `created_by`) VALUES
(9, 20, 'Laskar Pelangi', 'Deyan', 'Gramedia', '50', '2018-12-02', '1', 2, '2020-06-30 05:08:15', '2020-06-30 05:08:37', 'Riyan Ardi'),
(11, 20, 'Mencari Jodoh', 'Kadek', 'Gramedia', '20', '2020-06-25', '2', 1, '2020-06-30 05:10:02', '2020-06-30 07:14:16', 'Riyan Ardi'),
(12, 20, 'Mencari Hati', 'Ngurah Armada', 'Gramedia', '30', '2020-06-16', '1', 1, '2020-06-30 05:10:23', '2020-06-30 06:06:19', 'Riyan Ardi'),
(13, 22, 'Dongeng Si Kancil', 'Kancil', 'Gramedia', '20', '2020-06-12', '2', 2, '2020-06-30 05:59:30', '2020-06-30 06:02:07', 'Kadek Ngurah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`, `created_by`) VALUES
(20, 'Komik', 'Komik adalah Buku yang menarik untuk dibaca', '2020-06-30 05:06:01', '2020-06-30 05:06:26', 'Riyan Ardi'),
(22, 'Dongeng', 'Dongeng adalah buku yang menarik', '2020-06-30 05:57:42', '2020-06-30 05:58:04', 'Kadek Ngurah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat`, `no_telp`, `tgl_lahir`, `created_at`, `updated_at`) VALUES
(28, 'Kadek Dion Arya', 'Surabaya', '081234567890', '2006-04-07', '2020-06-30 04:45:45', '2020-06-30 04:45:45'),
(30, 'Ngurah Adnyana', 'Lovina', '081915656865', '2020-06-01', '2020-06-30 05:10:47', '2020-06-30 05:10:47'),
(32, 'Alit Trimantara', 'Banyuasri', '081234567890', '2020-06-09', '2020-06-30 05:54:26', '2020-06-30 05:54:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('riyan.clsg@gmail.com', '$2y$10$n0F7UG2uBLEM0ChUW834j.uhybvCz7TXN/On8850k/4KROkkFFrMa', '2020-06-29 07:09:45'),
('riyan.clsg11@gmail.com', '$2y$10$x7i5jSfQ7btt5EMqOr4UbeOkX8ZqHUPLhFpz/oQbMPVdcLEdoB3Tm', '2020-06-30 17:03:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `lama` varchar(10) DEFAULT NULL,
  `denda` varchar(100) DEFAULT NULL,
  `administrasi` varchar(100) DEFAULT NULL,
  `total_biaya` varchar(100) DEFAULT NULL,
  `keadaan` varchar(100) NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_member`, `id_buku`, `id`, `created_at`, `updated_at`, `lama`, `denda`, `administrasi`, `total_biaya`, `keadaan`, `updated_by`) VALUES
(31, 32, 13, 16, '2020-06-30 06:01:20', '2020-06-30 06:02:07', '0', '0', '5000', '5000', 'Sudah Dikembalikan', 'Kadek Ngurah'),
(33, 30, 12, 16, '2020-06-30 06:05:23', '2020-06-30 06:06:19', '30', '25000', '5000', '30000', 'Sudah Dikembalikan', 'Kadek Ngurah'),
(34, 30, 11, 15, '2020-06-30 07:14:16', '2020-06-30 07:14:16', NULL, NULL, NULL, NULL, 'Belum Dikembalikan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'Riyan Ardi', 'riyan.clsg11@gmail.com', NULL, '$2y$10$lJrDlopzAuXeRYOHTu2gbuk/CmVXhg/tH1rUCB8HybkHHUvQoupNq', 'CO33neKmRWAQBFvgOdqcnXttxiM0w36Grl2hpNu0350esCbgFpRwn32h3n3Y', '2020-06-29 20:12:05', '2020-06-29 20:17:19'),
(16, 'Kadek Ngurah', 'riyan.clsg13@gmail.com', NULL, '$2y$10$UTQwU5Qr7Hf2qzQMceweLeRpItjd.oRT43.R5YwCaHNWE/EUeO7QW', 'xZDJ7JEKncAxt0ykpMeeWrzttkR7VsNVMcQeZLgBah4YK6eMpea0P9Y45f04', '2020-06-29 21:48:53', '2020-06-29 21:52:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_buku_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_member` (`id_member`),
  ADD KEY `fk_users` (`id`),
  ADD KEY `fk_buku` (`id_buku`);

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
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
