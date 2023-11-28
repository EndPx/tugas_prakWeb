-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2023 pada 18.13
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
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `bio` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artists`
--

INSERT INTO `artists` (`id`, `name`, `bio`, `user_id`, `image`) VALUES
(1, 'NDX AKA', 'Kami Adalah', 1, 'ndx aka.jpg'),
(2, 'Via Vallen', '', 1, 'viavallen.jpg'),
(3, 'Denny Caknan', '', 1, 'dennycaknan.jpg'),
(4, 'Tompi', '', 1, 'tompi.jpg'),
(5, 'Andien', '', 1, 'andien.jpg'),
(6, 'RAN', '', 1, 'RAN.jpg'),
(7, 'Tulus', '', 1, 'tulus.jpg'),
(8, 'Mahalini', '', 1, 'mahalini.jpg'),
(9, 'Rossa', '', 1, 'rossa.jpeg'),
(10, 'Tiara Andini', '', 1, 'tiara.jpg'),
(11, 'Coklat', '', 1, 'coklat.jpg'),
(12, 'Kotak', '', 1, 'kotak.jpg'),
(13, 'Superman Is Dead', '', 1, 'SID.jpg'),
(14, 'Jamrud', '', 1, 'jamrud.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `category`, `disabled`) VALUES
(1, 'dangdut', 0),
(2, 'jazz', 0),
(3, 'pop', 0),
(4, 'rock', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `file` varchar(1024) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `songs`
--

INSERT INTO `songs` (`id`, `title`, `user_id`, `artist_id`, `image`, `file`, `category_id`, `date`, `views`) VALUES
(1, 'Nemen', 1, 1, 'ndx aka.jpg', 'dangdut 1 nemen ndx aka.mp3', 1, '2022-06-24 12:52:59', 14),
(2, 'Sayang', 1, 2, 'viavallen.jpg', 'dangdut 2 sayang via vallen.mp3', 1, '2022-06-24 12:59:04', 2),
(3, 'Bojo Galak', 1, 2, 'viavallen.jpg', 'dangdut 3 bojo galak via vallen.mp3', 1, '2022-06-24 13:23:49', 13),
(4, 'Kartonyono Medot Janji', 1, 3, 'dennycaknan.jpg', 'dangdut 4 kartonyono medot janji denny caknan.mp3', 1, '2022-06-25 09:04:08', 0),
(5, 'Menghujam Jantungku', 1, 4, 'tompi.jpg', 'jazz 1 menghujam jantungku -tompi.mp3', 2, '2022-06-25 09:06:27', 0),
(6, 'Pulang', 1, 5, 'andien.jpg', 'jazz 2 pulang-andien.mp3', 2, '2022-06-25 10:24:01', 0),
(7, 'Pandangan Pertama', 1, 6, 'RAN.jpg', 'jazz 3 pandangan pertama-RAN.mp3', 2, '2022-06-25 10:24:43', 0),
(8, 'Sepatu', 1, 7, 'tulus.jpg', 'jazz 4 sepatu-tulus.mp3', 2, '2022-06-25 10:25:42', 0),
(9, 'Buru-buru', 1, 8, 'mahalini.jpg', 'pop1 buru-buru-mahalini.mp3', 3, '2022-06-25 10:26:16', 0),
(10, 'Lupakan Cinta', 1, 9, 'rossa.jpeg', 'pop2 lupakan cinta-rossa.mp3', 3, '2023-11-25 11:50:11', 0),
(11, 'Sial', 1, 8, 'mahalini.jpg', 'pop3 sial-mahalini.mp3', 3, '2023-11-25 11:53:25', 1),
(12, 'Tega', 1, 10, 'tiara.jpg', 'pop4 tega-tiara andini.mp3', 3, '2023-11-25 11:53:25', 2),
(13, 'Bendera', 1, 11, 'coklat.jpg', 'rock1 bendera-coklat.mp3', 4, '2023-11-25 11:56:10', 1),
(14, 'Beraksi', 1, 12, 'kotak.jpg', 'rock2 beraksi-kotak.mp3', 4, '2023-11-25 11:56:10', 1),
(15, 'Sunset Di Tanah Anarki', 1, 13, 'SID.jpg', 'rock3 sunsetDiTanahAnarki-SupermanIsDead.mp3', 4, '2023-11-25 11:58:08', 1),
(16, 'Pelangi Dimatamu', 1, 14, 'jamrud.jpg', 'rock4 PelangiDimatamu-Jamrud.mp3', 4, '2023-11-25 11:58:08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `date`) VALUES
(1, 'admin', 'email@email.com', 'password', 'admin', '2022-06-24 09:48:57'),
(3, 'John', 'john@email.com', '123', 'user', '2022-06-24 10:44:19'),
(4, 'Albary', 'albary@email.com', '12345678', 'admin', '0000-00-00 00:00:00'),
(5, 'kanang', 'kanang@gmail.com', '12345678', 'admin', '0000-00-00 00:00:00'),
(6, 'user', 'user@email.com', 'pass', 'user', '2023-11-28 18:10:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `category` (`category`);

--
-- Indeks untuk tabel `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `views` (`views`),
  ADD KEY `date` (`date`),
  ADD KEY `title` (`title`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
