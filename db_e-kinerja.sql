-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Okt 2024 pada 11.24
-- Versi server: 8.0.30
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e-kinerja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id` int NOT NULL,
  `nip_pegawai` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `catatan`
--

INSERT INTO `catatan` (`id`, `nip_pegawai`, `text`) VALUES
(1, '5454545', 'Ini adlah cattan\r\n'),
(2, '12210792', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode`, `nama_jabatan`, `job`) VALUES
(1, 'BDH', 'Bendahara', ''),
(2, 'KPL', 'Kepala', '                             m, m m m m '),
(3, 'ABC', 'Abcd', 'ncjzjdnjdn                             '),
(4, '123456', 'Coba', 'ciba'),
(5, 'BKD', 'aasasas', ''),
(6, 'ABC', 'Abcd', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id_ket` int NOT NULL,
  `max` int NOT NULL,
  `min` int NOT NULL,
  `keterangan` text NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`id_ket`, `max`, `min`, `keterangan`, `kode_kriteria`) VALUES
(3, 100, 90, 'Sangan menguasai pengetahuan jabatana', 'K001'),
(4, 85, 75, 'Menguasai pengethuan jabatan dengan baik sekali', 'K001'),
(5, 100, 90, 'Kualitas Kerja sangat terpuji', 'K002'),
(6, 85, 75, 'Kualitas kerja baik sekali', 'K002'),
(7, 70, 60, 'Secara konsisten kualitas kerja baik', 'K001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kode` varchar(10) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kode`, `nama_kriteria`) VALUES
('K001', 'Pengetahuan Jabatan'),
('K002', 'Kualitas Kerja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int NOT NULL,
  `nip` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kode_jabatan` varchar(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `kode_jabatan`, `email`, `no_tlp`, `alamat`, `img`) VALUES
(10, '12210792', 'jaja royana', 'Laki-laki', 'subang', '2024-10-18', 'KPL', 'muhammadjajaroyana3@gmail.com', '081389931321', '-, -', ''),
(12, '5454545', 'jaja royana', 'Laki-laki', 'subang', '2024-10-08', 'BDH', 'muhammadjajaroyana3@gmail.com', '081389931321', '-, -', 'user-default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int NOT NULL,
  `nip_pegawai` varchar(16) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `nip_pegawai`, `kode_kriteria`, `nilai`) VALUES
(25, '5454545', 'K001', 90),
(26, '5454545', 'K002', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `no_tlp`, `nip`, `email`, `password`, `role`) VALUES
(14, 'MUHAMMAD JAJA ROYANA', '081389931321', '5454545', 'muhammadjajaroyana3@gmail.com', '$2y$10$CZ//TF44qHFToNaPnften.BeI59SuMvOraWLLE7RAY1/NOLRSKx9m', NULL),
(15, 'Nama coba', '081389931321', '5454545', 'muhammadjajaroyana3@gmail.com', '$2y$10$Ds8.FWSV.updRnmiTj9uSey1Ef8dcU8OQdiHDldtVRxkIysBMZIy.', 'pegawai'),
(16, 'jaja', '12365478956', '545215151', 'jaja@gmail.com', '$2y$10$B9ouu/5l.r9iZlrWbwUj2OmV/T1936s7JMOdyAX4HWo7knDBqURw2', 'admi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_ket`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_ket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD CONSTRAINT `keterangan_ibfk_1` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
