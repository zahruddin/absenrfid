-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Okt 2021 pada 10.55
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nokartu` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_istirahat` time NOT NULL,
  `jam_kembali` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `perangkat_masuk` varchar(255) NOT NULL,
  `perangkat_istirahat` varchar(255) NOT NULL,
  `perangkat_kembali` varchar(255) NOT NULL,
  `perangkat_pulang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `nokartu`, `tanggal`, `jam_masuk`, `jam_istirahat`, `jam_kembali`, `jam_pulang`, `perangkat_masuk`, `perangkat_istirahat`, `perangkat_kembali`, `perangkat_pulang`) VALUES
(20, '1061150180', '2021-09-29', '20:35:43', '00:00:00', '00:00:00', '20:37:10', 'A1', '', '', 'kelas 12'),
(21, '4612598238106128', '2021-09-29', '20:37:25', '00:00:00', '00:00:00', '21:46:31', 'kelas 12', '', '', 'kelas 12'),
(22, '4612598238106128', '2021-10-01', '20:18:19', '00:00:00', '00:00:00', '20:41:31', 'kelas 12', '', '', 'kelas 12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkat`
--

CREATE TABLE `perangkat` (
  `id` int(11) NOT NULL,
  `perangkat` varchar(255) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perangkat`
--

INSERT INTO `perangkat` (`id`, `perangkat`, `tgl_daftar`, `token`, `status`, `mode`) VALUES
(4, 'kelas 12', '2021-09-26', 'A001', '1', 4),
(10, 'A2', '2021-09-28', '4YyoHDQ435', '0', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nokartu` varchar(255) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nokartu`, `nisn`, `nama`, `kelas`, `jenis_kelamin`, `alamat`) VALUES
(10, '4612598238106128', 26218752, 'zahruddin fanani', '12', 'laki-laki', 'DFDFD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmprfid`
--

CREATE TABLE `tmprfid` (
  `nokartu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perangkat`
--
ALTER TABLE `perangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tmprfid`
--
ALTER TABLE `tmprfid`
  ADD PRIMARY KEY (`nokartu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
