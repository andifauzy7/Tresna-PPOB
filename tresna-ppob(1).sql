-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2020 pada 09.28
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tresna-ppob`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarpenjualan`
--

CREATE TABLE `daftarpenjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya_transaksi` int(11) NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `keterangan` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftarpenjualan`
--

INSERT INTO `daftarpenjualan` (`id_penjualan`, `id_kategori`, `tanggal`, `biaya_transaksi`, `biaya_admin`, `keterangan`) VALUES
(2, 94, '2020-06-06', 330000, 2500, 'Bayar First Media menggunakan BRIVA'),
(3, 111, '2020-06-05', 200000, 5000, 'Pembelian Pakan Ikan 2KG di Tokopedia'),
(4, 111, '2020-06-06', 279100, 0, 'Router Tenda'),
(5, 111, '2020-06-07', 145400, 2500, 'Transaksi Tokopedia Kalk dan Mineral Ikan via BRIVA'),
(8, 70, '2020-06-05', 20000, 0, 'Pulsa Three'),
(13, 66, '2020-06-08', 800000, 3000, 'Transfer Sesama'),
(14, 72, '2020-06-09', 100000, 3000, 'Beli Token PLN'),
(15, 67, '2020-06-09', 1000000, 15000, 'Transfer Bank ke BNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `layanan` varchar(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `layanan`, `nama_kategori`) VALUES
(66, 'BRILINK', 'TRANSFER SESAMA BRI'),
(67, 'BRILINK', 'TRANSFER BANK LAIN'),
(68, 'BRILINK', 'TARIK TUNAI'),
(69, 'BRILINK', 'SETOR SIMPANAN'),
(70, 'BRILINK', 'PULSA / PAKET DATA'),
(71, 'BRILINK', 'BPJS KESEHATAN'),
(72, 'BRILINK', 'PLN'),
(73, 'BRILINK', 'PDAM AIR'),
(74, 'BRILINK', 'BRIVA'),
(75, 'BRILINK', 'TOP UP BRIZZI'),
(76, 'BRILINK', 'TOP UP GOPAY'),
(77, 'BRILINK', 'TELEPON PASCABAYAR'),
(78, 'BRILINK', 'CICILAN'),
(79, 'BRILINK', 'SETOR PINJAMAN'),
(80, 'BRILINK', 'TIKET KERETA API'),
(81, 'BRILINK', 'TIKET PESAWAT'),
(82, 'BRILINK', 'AMKKM'),
(83, 'BRILINK', 'TARIK TUNAI TBANK'),
(84, 'BRILINK', 'SETOR TUNAI TBANK'),
(85, 'BRILINK', 'BAZNAS'),
(86, 'TOKOPEDIA', 'GROSIR'),
(87, 'TOKOPEDIA', 'PULSA / PAKET DATA'),
(88, 'TOKOPEDIA', 'PLN'),
(89, 'TOKOPEDIA', 'ANGSURAN KREDIT'),
(90, 'TOKOPEDIA', 'TELKOM'),
(91, 'TOKOPEDIA', 'PDAM'),
(92, 'TOKOPEDIA', 'BPJS'),
(93, 'TOKOPEDIA', 'VOUCHER GAME'),
(94, 'TOKOPEDIA', 'TV KABEL / INTERNET'),
(95, 'TOKOPEDIA', 'DONASI'),
(96, 'TOKOPEDIA', 'TIKET PESAWAT'),
(97, 'TOKOPEDIA', 'TOP UP UANG ELEKTRONIK'),
(98, 'TOKOPEDIA', 'VOUCHER STREAMING'),
(99, 'TOKOPEDIA', 'BAYAR KARTU KREDIT'),
(100, 'TOKOPEDIA', 'TIKET EVENT'),
(101, 'TOKOPEDIA', 'TOP UP OVO / DANA'),
(102, 'TOKOPEDIA', 'DONASI ONLINE'),
(103, 'TOKOPEDIA', 'TIKET KERETA API'),
(104, 'TOKOPEDIA', 'PAJAK PBB'),
(105, 'TOKOPEDIA', 'ZAKAT'),
(106, 'TOKOPEDIA', 'ASURANSI'),
(107, 'TOKOPEDIA', 'MTIX'),
(108, 'TOKOPEDIA', 'E-SAMSAT'),
(109, 'TOKOPEDIA', 'PENERIMAAN NEGARA'),
(110, 'TOKOPEDIA', 'BIAYA PENDIDIKAN'),
(111, 'TOKOPEDIA', 'PEMBELIAN PRODUK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftarpenjualan`
--
ALTER TABLE `daftarpenjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftarpenjualan`
--
ALTER TABLE `daftarpenjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftarpenjualan`
--
ALTER TABLE `daftarpenjualan`
  ADD CONSTRAINT `daftarpenjualan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
