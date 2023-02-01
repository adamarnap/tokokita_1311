-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 03:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokokita`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `tanggal_berita` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isi` mediumtext NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `tanggal_berita`, `isi`, `gambar`) VALUES
(1, 'Panen sayuran dimasa pandemi', '2021-07-14 13:22:51', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1_(2).JPG'),
(2, 'Kredit Usaha Rakyat (KUR) membantu petani mendapatkan modal ', '2021-07-14 13:26:29', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'jagung.JPG'),
(3, 'menjaga produktivitas di masa pandemi', '2021-07-14 13:25:11', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sayur.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `tanggal_tempo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_toko` text NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tanggal_produk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi` mediumtext NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_toko`, `kategori`, `nama_produk`, `jumlah`, `berat`, `harga`, `kota`, `tanggal_produk`, `deskripsi`, `gambar`) VALUES
(1, 'DICKY GARDEN', 'sayur', 'Jagung', '14', 11, 1900, 'Jakarta ', '2021-07-14 13:31:26', 'Jagung adalah salah satu tanaman pangan penghasil karbohidrat yang terpenting di dunia, selain gandum dan padi.', 'jagung.JPG'),
(2, 'ELDA GARDEN', 'buah', 'tomat', '12', 15, 290000, 'Jogjakarta ', '2021-07-14 13:31:26', 'Tomat adalah tumbuhan dari keluarga Solanaceae, tumbuhan asli Amerika Tengah dan Selatan', 'sayur.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `id_retur` int(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `tanggal_retur` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_beli` datetime NOT NULL,
  `alasan` mediumtext NOT NULL,
  `bukti` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`id_retur`, `nama_barang`, `tanggal_retur`, `tanggal_beli`, `alasan`, `bukti`) VALUES
(1, 'Ikan tuna', '2021-07-09 08:06:50', '2021-07-09 15:06:50', 'Ikanya basi uy', 'PT5.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `id_member` int(11) NOT NULL DEFAULT 1,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `id_member`, `tanggal`, `jumlah`) VALUES
(1, 1, '2021-07-09 08:09:29', 100000),
(2, 1, '2021-07-09 08:09:35', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(2) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `userName`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_kirim`
--

CREATE TABLE `tbl_biaya_kirim` (
  `idBiayaKirim` int(5) NOT NULL,
  `idKurir` int(3) NOT NULL,
  `idKotaAsal` int(4) NOT NULL,
  `idKotaTujuan` int(5) NOT NULL,
  `biaya` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biaya_kirim`
--

INSERT INTO `tbl_biaya_kirim` (`idBiayaKirim`, `idKurir`, `idKotaAsal`, `idKotaTujuan`, `biaya`) VALUES
(7, 2, 3, 1, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `idDetailOrder` int(10) NOT NULL,
  `idOrder` int(5) NOT NULL,
  `idProduk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idkat` int(5) NOT NULL,
  `namakat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idkat`, `namakat`) VALUES
(1, 'sayur'),
(2, 'buah'),
(3, 'kacang-kacangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `idKonfirmasi` int(5) NOT NULL,
  `idOrder` int(5) NOT NULL,
  `buktiTransfer` varchar(100) NOT NULL,
  `validasi` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `idKota` int(4) NOT NULL,
  `namaKota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`idKota`, `namaKota`) VALUES
(1, 'Slawi'),
(2, 'Sawah'),
(3, 'Jogja '),
(4, 'Slawi'),
(5, 'Ambon'),
(6, 'Dolakpur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `idKurir` int(2) NOT NULL,
  `namaKurir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kurir`
--

INSERT INTO `tbl_kurir` (`idKurir`, `namaKurir`) VALUES
(1, 'Test'),
(2, 'tarjo'),
(3, 'DODOT ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `idKonsumen` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `namaKonsumen` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `idKota` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlpn` int(20) NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`idKonsumen`, `username`, `password`, `namaKonsumen`, `alamat`, `idKota`, `email`, `tlpn`, `statusAktif`) VALUES
(1, 'dicky', 'dicky', 'dicky', 'gerokgak, buleleng, bali', 12, 'dicky@gmail.com', 123123123, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `idOrder` int(5) NOT NULL,
  `idKonsumen` int(5) NOT NULL,
  `tglOrder` date NOT NULL,
  `statusOrder` enum('Belum Bayar','Dikemas','Dikirim','Diterima','Selesai','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`idOrder`, `idKonsumen`, `tglOrder`, `statusOrder`) VALUES
(1, 1, '2021-07-09', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `idProduk` int(5) NOT NULL,
  `idKat` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `namaProduk` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` int(5) NOT NULL,
  `deskripsiProduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo`
--

CREATE TABLE `tbl_saldo` (
  `idSaldo` int(5) NOT NULL,
  `idToko` int(5) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toko`
--

CREATE TABLE `tbl_toko` (
  `idToko` int(5) NOT NULL,
  `idKonsumen` int(5) NOT NULL,
  `namaToko` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD PRIMARY KEY (`idBiayaKirim`),
  ADD KEY `idKotaAsal` (`idKotaAsal`),
  ADD KEY `idKotaTujuan` (`idKotaTujuan`),
  ADD KEY `idKurir` (`idKurir`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`idDetailOrder`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `harga` (`harga`),
  ADD KEY `idProduk` (`idProduk`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idkat`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`idKonfirmasi`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`idKota`);

--
-- Indexes for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`idKurir`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`idKonsumen`),
  ADD KEY `idKota` (`idKota`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idKonsumen` (`idKonsumen`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `idToko` (`idToko`),
  ADD KEY `idKat` (`idKat`) USING BTREE;

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD PRIMARY KEY (`idSaldo`),
  ADD KEY `idToko` (`idToko`);

--
-- Indexes for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD PRIMARY KEY (`idToko`),
  ADD KEY `idKonsumen` (`idKonsumen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `id_retur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  MODIFY `idBiayaKirim` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `idDetailOrder` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `idkat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  MODIFY `idKonfirmasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `idKota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  MODIFY `idKurir` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `idKonsumen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `idOrder` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `idProduk` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  MODIFY `idToko` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_1` FOREIGN KEY (`idKurir`) REFERENCES `tbl_kurir` (`idKurir`),
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_2` FOREIGN KEY (`idKotaAsal`) REFERENCES `tbl_kota` (`idKota`),
  ADD CONSTRAINT `tbl_biaya_kirim_ibfk_3` FOREIGN KEY (`idKotaTujuan`) REFERENCES `tbl_kota` (`idKota`);

--
-- Constraints for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `tbl_detail_order_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `tbl_produk` (`idProduk`),
  ADD CONSTRAINT `tbl_detail_order_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`),
  ADD CONSTRAINT `tbl_detail_order_ibfk_3` FOREIGN KEY (`harga`) REFERENCES `tbl_kota` (`idKota`);

--
-- Constraints for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD CONSTRAINT `tbl_konfirmasi_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `tbl_order` (`idOrder`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`);

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`idKat`) REFERENCES `tbl_kategori` (`idkat`),
  ADD CONSTRAINT `tbl_produk_ibfk_2` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`);

--
-- Constraints for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD CONSTRAINT `tbl_saldo_ibfk_1` FOREIGN KEY (`idToko`) REFERENCES `tbl_toko` (`idToko`);

--
-- Constraints for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD CONSTRAINT `tbl_toko_ibfk_1` FOREIGN KEY (`idKonsumen`) REFERENCES `tbl_member` (`idKonsumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
