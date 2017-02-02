-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2017 pada 23.00
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `pemin_alat`
--
CREATE DATABASE IF NOT EXISTS `pemin_alat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pemin_alat`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_brg` int(11) NOT NULL AUTO_INCREMENT,
  `nama_brg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_brg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stok_brg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_brg`, `nama_brg`, `jenis_brg`, `stok_brg`, `foto`) VALUES
(2, 'ds', 'ds', 'sd', '24-01-2017-3.PNG'),
(13, 'vb', 'bv', '3', '23-01-2017-11.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE IF NOT EXISTS `peminjam` (
  `id_peminjam` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_peminjam`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `username`, `password`, `nama`, `status`, `kelas`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', ''),
(4, 'saya', '123', 'fiki', 'guru', ''),
(22, 'admin', 'admin', 'admin', 'admin', ''),
(23, 'guru', 'guru', 'guru', 'guru', ''),
(26, 'res', 'res', 'rest', 'siswa', 'XII RPL 2'),
(27, 'aji', 'aji', 'aji s', 'aji', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_brg` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `tgl_pinjam` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_peminjaman`),
  KEY `id_brg` (`id_brg`,`id_peminjam`),
  KEY `id_peminjam` (`id_peminjam`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_brg`, `id_peminjam`, `tgl_pinjam`) VALUES
(1, 4, 4, '2017-02-02'),
(2, 2, 4, '2017-01-21'),
(3, 2, 23, '2017-01-11'),
(4, 2, 4, '2017-01-13'),
(6, 4, 23, '2017-01-17'),
(7, 13, 26, '2017-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE IF NOT EXISTS `pengembalian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_brg` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_brg` (`id_brg`,`id_peminjam`),
  KEY `id_peminjaman` (`id_peminjaman`),
  KEY `id_peminjam` (`id_peminjam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_brg`, `id_peminjam`, `id_peminjaman`, `tgl_pinjam`, `tgl_kembali`) VALUES
(1, 11, 11, 1, '2017-01-10', '2017-01-13');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjam` (`id_peminjam`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
