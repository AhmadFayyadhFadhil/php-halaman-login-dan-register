-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2024 pada 02.23
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carwash_clean`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `jenis_layanan` varchar(255) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `jenis_layanan`, `gambar`, `deskripsi`, `website`, `harga`) VALUES
(8, 'Cuci interiororooo', 'carwassss.jpg', 'Berikut ini adalah paragraf yang menjelaskan tentang cuci interior kendaraan:\r\n\r\nMembersihkan interior kendaraan secara rutin merupakan hal yang penting untuk menjaga kebersihan dan kenyamanan saat berkendara. Proses cuci interior biasanya meliputi p', 'https://otoklix.com/blog/cuci-interior-mobil-2/', '300K'),
(12, 'CUCI EXTERIOR', 'interior.jpeg', 'Exterior detailing mobil adalah proses perawatan yang bertujuan untuk meningkatkan penampilan dan melindungi bagian luar mobil dari kerusakan. Proses ini melibatkan pembersihan, restorasi, dan perlindungan terhadap berbagai komponen eksterior mobil.', 'https://bengkelpag.com/exterior-detailing/', '500k'),
(13, 'SERVIVE', 'service.jpeg', 'Service adalah setiap kegiatan yang diperuntukkan dan ditujukan untuk member kepuasan melalui pelayanan yang diberikan seseorang secara memuaskan.', 'https://repository.uin-suska.ac.id/6398/4/BAB%20III.pdf', '999k'),
(14, 'Scotlate body', 'scotlet.jpg', 'Skotlet body atau disebut juga dengan scotlite merupakan salah satu hiasan pada motor berbentuk stiker atau vinyl wrap. Hal ini dilakukan guna untuk memperindah dan mengubah tampilan kendaraan seseorang', 'https://oto.detik.com/motor/d-6828093/skotlet-motor-pengertian-cara-pasang-kelebihan-dan-kekurangannya', '200k'),
(15, 'SATRIA', 'Screenshot 2024-04-24 085340.png', 'MUUUUUACH', 'https://www.youtube.com/watch?v=U_HWGViqnNE', '10000k');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `jenis_mobil` varchar(255) DEFAULT NULL,
  `plat_mobil` varchar(255) DEFAULT NULL,
  `userid` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `jenis_mobil`, `plat_mobil`, `userid`) VALUES
(68, 'Sedan', 'CCCTTT', NULL),
(71, 'Bus', 'D 4 N', NULL),
(76, 'pick up', 'KKKKKKKKK', NULL),
(77, 'pick up', 'GGGGGGGGGGGGGGG', NULL),
(78, 'Truk', 'FGHJK', NULL),
(79, 'Bus', 'SSSSSSS', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `total_transaksi` varchar(255) NOT NULL,
  `userid` int(100) NOT NULL,
  `id_mobil` int(100) NOT NULL,
  `id_layanan` int(100) NOT NULL,
  `plat_mobil` varchar(20) NOT NULL,
  `jenis_mobil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `jenis_transaksi`, `total_transaksi`, `userid`, `id_mobil`, `id_layanan`, `plat_mobil`, `jenis_mobil`) VALUES
(65, '2024-06-04', 'cash', '', 49, 68, 13, 'HJHJHJH', ''),
(66, '2024-06-04', 'cash', '', 49, 68, 14, 'jgjgjgk', ''),
(67, '2024-06-04', 'cash', '', 2, 71, 13, 'Q 1 S 4 R', ''),
(68, '2024-06-04', 'cash', '', 2, 68, 14, '4 K U C 4 C 4', ''),
(69, '2024-06-04', 'cash', '', 58, 68, 14, '0987', ''),
(70, '2024-06-05', 'debit', '', 2, 68, 8, 'C 4563 G 24', ''),
(71, '2024-06-05', 'cash', '', 2, 68, 8, 'B 8974 24', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `nama`, `username`, `password`, `level`) VALUES
(2, 'ahamad fayyadh fayyadh fadhil2', 'fayyadh', 'user', 'user'),
(49, 'FAYYADHHHHH', 'payad', 'admin', 'admin'),
(50, 'reyy', 'mornovvvv', 'Voidtrans', 'user'),
(57, 'juno', 'rey', '1234', 'user'),
(58, 'qaysar', 'qaysar', '123', 'user'),
(59, 'ike', 'ike', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `mobil` (`userid`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `userid` (`userid`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
