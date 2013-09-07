-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2013 at 08:39 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `butikdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` char(4) NOT NULL,
  `nm_barang` varchar(200) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `diskon` int(3) NOT NULL,
  `stok` int(3) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kd_kategori` char(3) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nm_barang`, `harga_beli`, `harga_jual`, `diskon`, `stok`, `keterangan`, `kd_kategori`) VALUES
('B001', 'Bluespurple batik with bolero dress', 10000, 120000, 10, 8, 'Elegan', 'K01'),
('B018', 'Krancang Kebaya Purple', 140000, 185000, 10, 10, 'baru', 'K04'),
('B002', 'Greenpink batik dress with bolero', 2000, 120000, 10, 8, 'Elegan', 'K01'),
('B003', 'Chifon Browngrey batik blouse', 80000, 125000, 10, 10, 'keren', 'K01'),
('B004', 'Brown print Batik dress', 85000, 135000, 10, 19, 'Elegan', 'K01'),
('B005', 'Green Dewi batik dress', 80000, 125000, 10, 10, 'baru', 'K01'),
('B006', 'Shine fuchsia batwing blouse', 85000, 85000, 10, 10, 'baru', 'K01'),
('B007', 'Purple leaves batik dress', 70000, 98000, 10, 10, 'baru', 'K01'),
('B008', 'Batwing white top', 75000, 110000, 10, 10, 'baru', 'K02'),
('B009', 'Black candy sifon', 80000, 120000, 10, 10, 'baru', 'K02'),
('B010', 'Tops Lace flower Red', 75000, 99000, 10, 5, 'baru', 'K02'),
('B011', 'Tops Lace flower Black', 75000, 99000, 10, 10, 'baru', 'K02'),
('B012', 'Tops Lace flower Grey', 75000, 99000, 10, 8, 'baru', 'K02'),
('B013', 'Knit Tunic Grey', 90000, 140000, 10, 9, 'baru', 'K02'),
('B014', 'Fuchsia flowR minidress', 95000, 130000, 10, 15, 'baru', 'K03'),
('B015', 'Blackline jeans minidress', 90000, 120000, 10, 10, 'baru', 'K03'),
('B016', 'Black midi Zipper with belt', 90000, 120000, 10, 10, 'baru', 'K03'),
('B017', 'Orange Polka ribbon minidress', 75000, 108000, 10, 10, 'baru', 'K03'),
('B019', 'Krancang Kebaya Green', 140000, 185000, 10, 10, 'baru', 'K04'),
('B020', 'Krancang Kebaya Bronze', 135000, 185000, 10, 10, 'baru', 'K04'),
('B021', 'Krancang FlowR Line Purple', 135000, 185000, 10, 10, 'baru', 'K04'),
('B022', 'Gamis + Jilbab BlackPurple', 135000, 185000, 10, 0, 'baru', 'K06'),
('B023', 'Gamis + Jilbab BlackRed', 135000, 185000, 10, 0, 'baru', 'K06'),
('B024', 'Gamis + Jilbab BlackBlue', 135000, 185000, 10, 0, 'baru', 'K06');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_setting`
--

CREATE TABLE IF NOT EXISTS `dlmbg_setting` (
  `id_setting` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dlmbg_setting`
--

INSERT INTO `dlmbg_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Sportindo'),
(2, 'site_quotes', 'Quotes Situs', 'Centra Pakaian Cowok dan Cewek'),
(3, 'site_footer', 'Teks Footer', 'Gede Lumbung - 2013 <br>Aplikasi Percetakan | DLMBG'),
(4, 'key_login', 'Hash Key MD5', 'AppButik'),
(5, 'site_theme', 'Theme Folder', 'flat-dot'),
(6, 'site_limit_small', 'Limit Data Small', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '10'),
(8, 'site_minimal_barang', 'Minimal Barang', '5');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kategori` char(3) NOT NULL,
  `nm_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`) VALUES
('K01', 'Women Batik'),
('K02', 'Women Blouse'),
('K03', 'Women Dress'),
('K04', 'Busana Muslim'),
('K05', 'Moslem Blues'),
('K06', 'Moslem Gamis');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `no_pembelian` char(7) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `kd_supplier` char(3) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`no_pembelian`),
  KEY `kd_supplier` (`kd_supplier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_pembelian`, `tgl_transaksi`, `catatan`, `kd_supplier`, `userid`) VALUES
('BL00001', '2012-09-01', 'lancar', 'S02', 'admin'),
('BL00002', '2012-09-01', 'stok baru', 'S02', 'admin'),
('BL00003', '2012-09-01', 'stok baru', 'S02', 'admin'),
('BL00004', '2012-09-01', 'stok baru', 'S01', 'admin'),
('BL00005', '2012-09-01', 'stok baru', 'S02', 'admin'),
('BL00006', '2013-08-04', 'B001', 'S01', 'admin'),
('BL00007', '2013-08-04', '', 'S01', 'admin'),
('BL00008', '2013-08-08', 'B001', 'S01', 'admin'),
('BL00009', '2013-08-16', '', 'S01', 'admin'),
('BL00010', '2013-08-30', 'B001', 'S01', 'admin'),
('BL00013', '2013-09-07', 'ngebon', 'S01', 'admin'),
('BL00012', '2013-08-20', 'dsdsds', 'S01', 'admin'),
('BL00011', '2013-08-18', 'dsdsds', 'S01', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_item`
--

CREATE TABLE IF NOT EXISTS `pembelian_item` (
  `no_pembelian` char(7) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  KEY `no_pembelian` (`no_pembelian`,`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_item`
--

INSERT INTO `pembelian_item` (`no_pembelian`, `kd_barang`, `harga_beli`, `jumlah`) VALUES
('BL00001', 'B004', 85000, 10),
('BL00001', 'B002', 80000, 10),
('BL00001', 'B001', 80000, 10),
('BL00001', 'B003', 80000, 10),
('BL00001', 'B005', 80000, 10),
('BL00002', 'B008', 75000, 10),
('BL00002', 'B007', 70000, 10),
('BL00002', 'B006', 85000, 10),
('BL00003', 'B012', 75000, 10),
('BL00003', 'B011', 75000, 10),
('BL00003', 'B010', 75000, 10),
('BL00003', 'B009', 80000, 10),
('BL00004', 'B021', 135000, 10),
('BL00004', 'B020', 135000, 10),
('BL00004', 'B019', 140000, 10),
('BL00004', 'B018', 140000, 10),
('BL00005', 'B013', 90000, 10),
('BL00005', 'B017', 75000, 10),
('BL00005', 'B016', 90000, 10),
('BL00005', 'B015', 90000, 10),
('BL00005', 'B014', 95000, 10),
('BL00006', 'B001', 10000, 1),
('BL00007', 'B001', 1000, 1),
('BL00007', 'B001', 10000, 3),
('BL00008', 'B001', 34444, 1),
('BL00009', 'B001', 10000, 1),
('BL00009', 'B001', 10000, 1),
('BL00010', 'B002', 2000, 1),
('BL00010', 'B001', 10000, 1),
('BL00011', 'B014', 10000, 5),
('BL00011', 'B004', 120000, 10),
('BL00012', 'B001', 10000, 10),
('BL00013', '', 0, 0),
('BL00013', '', 0, 0),
('BL00013', '', 0, 0),
('BL00013', 'B030', 0, 3),
('BL00013', 'sss', 0, 10),
('BL00013', '', 0, 0),
('BL00013', '', 0, 0),
('BL00013', '', 0, 0),
('BL00013', '', 0, 0),
('BL00013', '', 0, 0),
('BL00013', '', 0, 0),
('BL00013', '', 0, 0),
('BL00013', '', 0, 0),
('BL00013', 'sss', 0, 10),
('BL00013', 'dd', 0, 10),
('BL00013', 'B001', 0, 1),
('BL00013', 'B002', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `no_penjualan` char(7) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`no_penjualan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_penjualan`, `tgl_transaksi`, `pelanggan`, `catatan`, `userid`) VALUES
('JL00001', '2012-09-01', 'Umum', 'pelanggan', 'admin'),
('JL00002', '2012-09-01', 'Umum', 'langganan', 'admin'),
('JL00003', '2012-09-01', 'Umum', 'langganan', 'admin'),
('JL00004', '2012-09-02', 'Umum', 'pelanggan', 'admin'),
('JL00005', '2012-09-03', 'Septi Suhesti', 'Simpang Sribawono', 'admin'),
('JL00006', '2012-09-09', 'harmanto', 'jogja', 'admin'),
('JL00007', '2013-08-04', 'Umum', 'B001', 'admin'),
('JL00008', '2013-08-16', 'Umum', '', 'admin'),
('JL00009', '2013-08-16', 'Umum', 'B001', 'admin'),
('JL00010', '2013-08-19', 'dede', 'ngebon', 'admin'),
('JL00011', '2013-08-23', 'dede', 'dsdsds', 'dedek'),
('JL00012', '2013-09-04', 'Umum', 'B001', 'admin'),
('JL00013', '2013-09-08', 'dede', 'ngebon', 'admin'),
('JL00014', '2013-09-07', 'Umum', 'B001', 'admin'),
('JL00015', '2013-09-09', 'dede', 'ngebon', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_item`
--

CREATE TABLE IF NOT EXISTS `penjualan_item` (
  `no_penjualan` char(7) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  KEY `kd_barang` (`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_item`
--

INSERT INTO `penjualan_item` (`no_penjualan`, `kd_barang`, `harga_jual`, `jumlah`) VALUES
('JL00001', 'B004', 121500, 5),
('JL00001', 'B002', 108000, 1),
('JL00001', 'B001', 108000, 1),
('JL00002', 'B010', 89100, 1),
('JL00003', 'B013', 126000, 1),
('JL00004', 'B004', 121500, 1),
('JL00005', 'B012', 89100, 1),
('JL00005', 'B004', 121500, 1),
('JL00006', 'B001', 108000, 1),
('JL00007', 'B001', 108000, 1),
('JL00007', 'B002', 108000, 1),
('JL00008', 'B002', 108000, 1),
('JL00008', 'B002', 108000, 1),
('JL00009', 'B001', 108000, 1),
('JL00009', 'B001', 108000, 1),
('JL00010', 'B004', 121500, 3),
('JL00010', 'B001', 108000, 10),
('JL00011', 'B010', 89100, 3),
('JL00012', 'B001', 108000, 1),
('JL00013', 'B001', 108000, 3),
('JL00014', 'B001', 108000, 1),
('JL00015', 'B001', 108000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `kd_supplier` char(3) NOT NULL,
  `nm_supplier` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `telpon`, `email`) VALUES
('S01', 'Indah Taylor', 'Wayabung, TuBa, Lampung', '0819123123', 'gedesumawijaya@gmail.com'),
('S02', 'Jogja Fashion', 'Way Jepara, Lampung Timur', '0819123123', ''),
('S03', 'Bunafit Fashion', 'Bantul, Yogyakarta', '08191222231341', '');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pembelian`
--

CREATE TABLE IF NOT EXISTS `tmp_pembelian` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `kd_barang` char(4) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tmp_pembelian`
--


-- --------------------------------------------------------

--
-- Table structure for table `tmp_penjualan`
--

CREATE TABLE IF NOT EXISTS `tmp_penjualan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `kd_barang` char(4) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tmp_penjualan`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('kasir','admin','owner') NOT NULL DEFAULT 'kasir',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `userid`, `password`, `nama`, `level`) VALUES
(1, 'admin', '5acd43ac28106d8f538ec0ccf9fb63a7', 'Bunafit Nugroho', 'admin'),
(2, 'septi', 'b0d1a1e154390608c41cbb526739bf67', 'Septi Suhesti', 'owner'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'admin'),
(6, 'dedek', '8ad6bef568e95852ecea0cb6fce293fd', 'dedek', 'kasir');
