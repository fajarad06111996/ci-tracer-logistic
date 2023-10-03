-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Apr 2020 pada 09.46
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tracer_logistic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengiriman`
--

CREATE TABLE IF NOT EXISTS `data_pengiriman` (
`id_pengiriman` int(10) NOT NULL,
  `pickup_info` varchar(200) DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `shipper_code` varchar(100) DEFAULT NULL,
  `shipper_id` int(10) DEFAULT NULL,
  `shipper_name` varchar(200) DEFAULT NULL,
  `awb_no` varchar(50) DEFAULT NULL,
  `no_so` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `consignee_id` int(10) DEFAULT NULL,
  `consignee_code` varchar(100) DEFAULT NULL,
  `consignee` varchar(200) DEFAULT NULL,
  `address` text,
  `id_asal` int(10) DEFAULT NULL,
  `kode_asal` varchar(50) DEFAULT NULL,
  `master_asal` varchar(100) DEFAULT NULL,
  `id_tujuan` int(10) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `kode_tujuan` varchar(50) DEFAULT NULL,
  `id_costumer` int(11) DEFAULT NULL,
  `costumer_code` varchar(100) DEFAULT NULL,
  `costumer_name` varchar(100) DEFAULT NULL,
  `id_hpp` int(10) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `satuan_weight` varchar(50) DEFAULT NULL,
  `colly` varchar(100) DEFAULT NULL,
  `satuan_colly` varchar(50) DEFAULT NULL,
  `volume` varchar(50) DEFAULT NULL,
  `satuan_volume` varchar(50) DEFAULT NULL,
  `volume_panjang` varchar(30) DEFAULT NULL,
  `volume_lebar` varchar(30) DEFAULT NULL,
  `volume_tinggi` varchar(30) DEFAULT NULL,
  `moda` varchar(200) DEFAULT NULL,
  `harga` varchar(15) DEFAULT NULL,
  `harga_baseon` varchar(100) DEFAULT NULL,
  `tat` varchar(15) DEFAULT NULL,
  `eta` date DEFAULT NULL,
  `recaived_by` varchar(100) DEFAULT NULL,
  `ata` date DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `status_muat` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_tarif` int(3) DEFAULT NULL,
  `jenis_layanan` varchar(50) DEFAULT NULL,
  `pembayaran` int(3) DEFAULT NULL,
  `status_pengiriman` int(3) DEFAULT NULL,
  `status_manifest` int(3) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `status_invoice` int(11) DEFAULT NULL,
  `vendor_id` int(10) DEFAULT NULL,
  `vendor_code` varchar(100) DEFAULT NULL,
  `vendor_name` varchar(200) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `data_pengiriman`
--

INSERT INTO `data_pengiriman` (`id_pengiriman`, `pickup_info`, `pickup_date`, `shipper_code`, `shipper_id`, `shipper_name`, `awb_no`, `no_so`, `description`, `consignee_id`, `consignee_code`, `consignee`, `address`, `id_asal`, `kode_asal`, `master_asal`, `id_tujuan`, `tujuan`, `kode_tujuan`, `id_costumer`, `costumer_code`, `costumer_name`, `id_hpp`, `weight`, `satuan_weight`, `colly`, `satuan_colly`, `volume`, `satuan_volume`, `volume_panjang`, `volume_lebar`, `volume_tinggi`, `moda`, `harga`, `harga_baseon`, `tat`, `eta`, `recaived_by`, `ata`, `remarks`, `status_muat`, `tanggal`, `jenis_tarif`, `jenis_layanan`, `pembayaran`, `status_pengiriman`, `status_manifest`, `status`, `status_invoice`, `vendor_id`, `vendor_code`, `vendor_name`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, '123tes', NULL, 'MLI', 1, 'MERASETI LOGISTIK INDONESIA', '0989dslfaj', 'SO123', 'percobaan baru', 2, 'BEIJING', 'BEIJING DAZHENG PLASTIC INDONESIA, PT', NULL, 1, 'JKT', 'JAKARTA', 6, 'PALEMBANG', 'PLB', 3, 'UM', 'UMUM', NULL, '123', 'KGS', '321', 'BAGS', '4', 'CBM', '2', '2', '1', 'Darat', '2460000', '20000', '2', '2020-01-11', NULL, NULL, '', 'BERAT', '2020-01-09', 1, 'REGULER', 1, 6, 0, 1, 1, 5, 'QLF', 'QUALIFA', 'ADMIN', '2020-01-09 21:39:45', 'ADMIN', '2020-01-09 23:41:56'),
(2, '123dsfasf', NULL, 'MLI', 1, 'MERASETI LOGISTIK INDONESIA', 'dsfsdfa', 'SO1234', 'wiskas kucing', 2, 'BEIJING', 'BEIJING DAZHENG PLASTIC INDONESIA, PT', NULL, 1, 'JKT', 'JAKARTA', 2, 'BATAM', 'BTH', 3, 'UM', 'UMUM', NULL, '1', 'KGS', '2', 'DRUM', '6', 'CBM', '2', '1', '3', 'Darat', '0', '0', '4', '2020-01-11', NULL, NULL, '', 'VOLUME', '2020-01-09', 0, 'REGULER', 0, 6, 1, 1, 1, 5, 'QLF', 'QUALIFA', 'ADMIN', '2020-01-09 21:41:54', 'ADMIN', '2020-01-09 23:44:03'),
(3, '23123dfasdf', NULL, 'MLI', 1, 'MERASETI LOGISTIK INDONESIA', 'awb123', 'SO002', 'eeqrq24', 2, 'BEIJING', 'BEIJING DAZHENG PLASTIC INDONESIA, PT', NULL, 2, 'LMP', 'LAMPUNG', 7, 'JAMBI', 'JMB', 3, 'UM', 'UMUM', NULL, '4', 'KGS', '5', 'DRUM', '2', 'CBM', '2', '1', '1', 'Udara', '0', '0', '3', '2020-01-11', NULL, NULL, '', 'QTY', '2020-01-09', 0, 'REGULER', 0, 6, 0, 1, 1, 5, 'QLF', 'QUALIFA', 'ADMIN', '2020-01-09 21:43:48', 'ADMIN', '2020-01-09 23:42:35'),
(5, '123tesx', NULL, 'MLI', 1, 'MERASETI LOGISTIK INDONESIA', 'dsfsdfax', 'SO1234X', 'percobaan baru', 2, 'BEIJING', 'BEIJING DAZHENG PLASTIC INDONESIA, PT', NULL, 1, 'JKT', 'JAKARTA', 2, 'BATAM', 'BTH', 3, 'UM', 'UMUM', NULL, '2', 'KGS', '1', 'GRAMS', '6', 'CBM', '2', '3', '1', 'Darat', '210000', '35000', '4', '2020-01-11', NULL, NULL, '', 'VOLUME', '2020-01-09', 1, 'REGULER', 1, 6, 1, 1, 1, 5, 'QLF', 'QUALIFA', 'ADMIN', '2020-01-09 21:47:57', 'ADMIN', '2020-01-09 23:41:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_agen`
--

CREATE TABLE IF NOT EXISTS `master_agen` (
`id_agen` int(11) NOT NULL,
  `agen_code` varchar(100) DEFAULT NULL,
  `agen_name` varchar(100) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `state_code` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `attention` varchar(100) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `master_agen`
--

INSERT INTO `master_agen` (`id_agen`, `agen_code`, `agen_name`, `address`, `city`, `postal_code`, `state_code`, `province`, `country_code`, `country_name`, `attention`, `email_id`, `telephone`, `fax`, `npwp`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'GLC001', 'GLC TANJUNG PRIOK', 'JL. AGUNG NIAGA V BLOK G6/28, SUNTER, TANJUNG PRIOK', 'JAKARTA UTARA', '09898', '', 'DKI JAKARTA', 'idn', 'indonesia', '', '', '', '', '', 1, 'ADMIN', '2020-01-07 18:44:10', NULL, NULL),
(2, 'GLC002', 'GLC JAKARTA BARAT', 'JL PERMAI KUDUS ', 'JAKARTA BARAT', '4242', '4323', 'DKI JAKARTA', 'ind', 'indonesia', '', '', '', '', '', 1, 'ADMIN', '2020-01-07 19:03:16', 'ADMIN', '2020-01-07 23:01:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_asal`
--

CREATE TABLE IF NOT EXISTS `master_asal` (
`id_asal` int(11) NOT NULL,
  `kode_asal` varchar(50) DEFAULT NULL,
  `master_asal` varchar(100) DEFAULT NULL,
  `status_asal` int(3) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `master_asal`
--

INSERT INTO `master_asal` (`id_asal`, `kode_asal`, `master_asal`, `status_asal`) VALUES
(1, 'JKT', 'JAKARTA', 1),
(2, 'LMP', 'LAMPUNG', 1),
(3, 'BTN', 'BANTEN', 1),
(4, 'BKL', 'BENGKULU', 1),
(5, 'PLB', 'PALEMBANG', 1),
(6, 'JMB', 'JAMBI', 1),
(7, 'BTM', 'BATAM', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_consignee`
--

CREATE TABLE IF NOT EXISTS `master_consignee` (
`consignee_id` int(10) NOT NULL,
  `consignee_code` varchar(20) NOT NULL,
  `consignee_name` varchar(150) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `state_code` varchar(20) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `country_code` varchar(20) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `attention` varchar(200) DEFAULT NULL,
  `email_id` varchar(150) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(20) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `master_consignee`
--

INSERT INTO `master_consignee` (`consignee_id`, `consignee_code`, `consignee_name`, `address`, `city`, `postal_code`, `state_code`, `province`, `country_code`, `country_name`, `attention`, `email_id`, `telephone`, `fax`, `npwp`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'ADI', 'REZEKI ADIGRAHA PT', 'JL. JABABEKA III NO.C-19, PASIRGOMBONG, KEC. CIKARANG UTARA, 17530', 'BEKASI', '', '', 'JAWA BARAT', '', '', '', '', '', '', '', 1, 'ADMIN', '2019-12-26 01:49:29', NULL, NULL),
(2, 'BEIJING', 'BEIJING DAZHENG PLASTIC INDONESIA, PT', 'NGAGLIK RT.005 RW.002 KEL BUTUH KEC MOJOSONGO', 'BOYOLALI', '', '', 'JAWA TENGAH', '', '', '', '', '', '', '', 1, 'ADMIN', '2019-12-26 01:50:06', NULL, NULL),
(3, 'CMP', 'CITPA MAKMUR PERKASA, PT', 'JL.VETERAN NO.691 RT.001 RW.006 PASIRMUNCANG, PURWOKERTO BARAT', 'BANYUMAS', '', '', 'JAWA TENGAH', '', '', '', '', '', '', '', 1, 'ADMIN', '2019-12-26 01:50:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_costumer`
--

CREATE TABLE IF NOT EXISTS `master_costumer` (
`costumer_id` int(11) NOT NULL,
  `costumer_code` varchar(100) DEFAULT NULL,
  `costumer_name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `master_costumer`
--

INSERT INTO `master_costumer` (`costumer_id`, `costumer_code`, `costumer_name`, `address`, `city`, `postal_code`, `province`, `email_id`, `telephone`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'GI', 'GARUDA INDONESIA', 'TANGGERANG SELATAN', 'TANGGERANG', '123', 'TANGGERANG', 'tes@gmail.com', '08978989', 1, 'ADMIN', '2019-12-05 00:28:53', 'ADMIN', '2019-12-05 00:37:53'),
(2, 'PLN', 'PERSERO TBK', 'JAKARTA UTARA', 'JAKARTA UTARA', '', 'DKI JAKARTA', '', '', 1, 'ADMIN', '2019-12-05 00:40:18', NULL, NULL),
(3, 'UM', 'UMUM', '-', '-', '-', '-', '', '', 1, 'ADMIN', '2020-01-09 22:18:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_hpp`
--

CREATE TABLE IF NOT EXISTS `master_hpp` (
`id_hpp` int(10) NOT NULL,
  `id_asal` int(10) DEFAULT NULL,
  `kode_asal` varchar(50) DEFAULT NULL,
  `master_asal` varchar(100) DEFAULT NULL,
  `id_tujuan` int(10) NOT NULL,
  `base_on` varchar(100) DEFAULT NULL,
  `harga_satuan` varchar(50) DEFAULT NULL,
  `kode_tujuan` varchar(50) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `costumer_id` int(11) DEFAULT NULL,
  `costumer_code` varchar(100) DEFAULT NULL,
  `costumer_name` varchar(100) DEFAULT NULL,
  `layanan` varchar(100) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `master_hpp`
--

INSERT INTO `master_hpp` (`id_hpp`, `id_asal`, `kode_asal`, `master_asal`, `id_tujuan`, `base_on`, `harga_satuan`, `kode_tujuan`, `tujuan`, `costumer_id`, `costumer_code`, `costumer_name`, `layanan`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 'JKT', 'JAKARTA', 6, 'BERAT', '20000', 'PLB', 'PALEMBANG', 3, 'UM', 'UMUM', 'REGULER', 1, NULL, NULL, 'ADMIN', '2020-01-09 22:44:33'),
(4, 2, 'LMP', 'LAMPUNG', 7, 'QTY', '30000', 'JMB', 'JAMBI', 3, 'UM', 'UMUM', 'REGULER', 1, NULL, NULL, 'ADMIN', '2020-01-09 22:45:00'),
(7, 1, 'JKT', 'JAKARTA', 2, 'VOLUME', '35000', 'BTH', 'BATAM', 3, 'UM', 'UMUM', 'REGULER', 1, NULL, NULL, 'ADMIN', '2020-01-09 22:44:50'),
(8, 2, 'LMP', 'LAMPUNG', 1, 'BERAT', '15000', 'JKT', 'JAKARTA', 3, 'UM', 'UMUM', 'REGULER', 1, 'ADMIN', '2020-01-09 22:33:52', 'ADMIN', '2020-01-09 22:51:14'),
(9, 3, 'BTN', 'BANTEN', 1, 'BERAT', '10000', 'JKT', 'JAKARTA', 3, 'UM', 'UMUM', 'REGULER', 1, 'ADMIN', '2020-01-09 22:38:03', 'ADMIN', '2020-01-09 22:44:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_shipper`
--

CREATE TABLE IF NOT EXISTS `master_shipper` (
`shipper_id` int(10) NOT NULL,
  `shipper_code` varchar(50) NOT NULL,
  `shipper_name` varchar(150) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `state_code` varchar(20) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `country_code` varchar(100) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `attention` varchar(100) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `telephone` varchar(13) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `master_shipper`
--

INSERT INTO `master_shipper` (`shipper_id`, `shipper_code`, `shipper_name`, `address`, `city`, `postal_code`, `state_code`, `province`, `country_code`, `country_name`, `attention`, `email_id`, `telephone`, `fax`, `npwp`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'MLI', 'MERASETI LOGISTIK INDONESIA', 'SUNTER PERMAI JAKARTA UTARA', 'JAKARTA UTARA', '', '', 'DKI JAKARTA', '', '', '', '', '', '', '', 1, 'ADMIN', '2019-12-26 01:47:50', NULL, NULL),
(2, 'ALJ', 'AMANAH LANGGENG JAYA, PT', 'SUNTER GARDEN NO 28, TJ PRIOK, JAKARTA UTARA', 'JAKARTA UTARA', '', '', 'DKI JAKARTA', '', '', '', '', '', '', '', 1, 'ADMIN', '2019-12-26 01:52:00', NULL, NULL),
(3, 'BPJ', 'BUANA PERKASA JAYA, PT', 'SUNTER PERMAI', 'JAKARTA UTARA', '', '', 'DKI JAKARTA', '', '', '', '', '', '', '', 1, 'ADMIN', '2019-12-26 01:52:41', NULL, NULL),
(4, 'MTI', 'MERASETI TRANSPORTASI INDONESIA, PT', 'SUNTER GARDER D8 GEDUNG GREGOREO TANJUNG PRIOK', 'JAKARTA UTARA', '', '', 'DKI JAKARTA', '', '', '', '', '', '', '', 1, 'ADMIN', '2019-12-26 02:21:54', NULL, NULL),
(5, 'MPA', 'MULYA PERKASA AGUNG, PT', 'BOJONEGARA SERANG', 'SERANG', '', '', 'BANTEN', '', '', '', '', '', '', '', 1, 'ADMIN', '2019-12-26 02:23:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_tarif`
--

CREATE TABLE IF NOT EXISTS `master_tarif` (
`id_tarif` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `vendor_code` varchar(100) DEFAULT NULL,
  `vendor_name` varchar(100) DEFAULT NULL,
  `id_asal` int(11) DEFAULT NULL,
  `kode_asal` varchar(100) DEFAULT NULL,
  `master_asal` varchar(100) DEFAULT NULL,
  `id_tujuan` int(11) DEFAULT NULL,
  `kode_tujuan` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `baseon_tarif` varchar(100) DEFAULT NULL,
  `harga_tarif` varchar(100) DEFAULT NULL,
  `status_tarif` int(3) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `master_tarif`
--

INSERT INTO `master_tarif` (`id_tarif`, `vendor_id`, `vendor_code`, `vendor_name`, `id_asal`, `kode_asal`, `master_asal`, `id_tujuan`, `kode_tujuan`, `tujuan`, `baseon_tarif`, `harga_tarif`, `status_tarif`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 5, 'QLF', 'QUALIFA', 2, 'LMP', 'LAMPUNG', 6, 'PLB', 'PALEMBANG', 'BERAT', '20000', 1, 'ADMIN', '2019-12-24 09:56:46', 'ADMIN', '2019-12-24 14:44:50'),
(2, 5, 'QLF', 'QUALIFA', 1, 'JKT', 'JAKARTA', 1, 'LMP', 'LAMPUNG', 'BERAT', '30000', 1, 'ADMIN', '2019-12-24 14:42:52', NULL, NULL),
(3, 5, 'QLF', 'QUALIFA', 1, 'JKT', 'JAKARTA', 6, 'PLB', 'PALEMBANG', 'BERAT', '50000', 1, 'ADMIN', '2019-12-24 14:43:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_tujuan`
--

CREATE TABLE IF NOT EXISTS `master_tujuan` (
`id_tujuan` int(10) NOT NULL,
  `kode_tujuan` varchar(25) NOT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `master_tujuan`
--

INSERT INTO `master_tujuan` (`id_tujuan`, `kode_tujuan`, `tujuan`, `status`) VALUES
(1, 'JKT', 'JAKARTA', 1),
(2, 'BTH', 'BATAM', 1),
(3, 'PKU', 'PEKANBARU', 1),
(4, 'NAD', 'NANGGRO ACEH DARUSALLAM', 1),
(5, 'BKL', 'BENGKULU', 1),
(6, 'PLB', 'PALEMBANG', 1),
(7, 'JMB', 'JAMBI', 1),
(8, 'RIU', 'RIAU', 1),
(9, 'LMP', 'LAMPUNG', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_vendor`
--

CREATE TABLE IF NOT EXISTS `master_vendor` (
`vendor_id` int(10) NOT NULL,
  `vendor_code` varchar(50) NOT NULL,
  `vendor_name` varchar(150) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `state_code` varchar(20) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `country_code` varchar(100) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `attention` varchar(100) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `telephone` varchar(13) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `master_vendor`
--

INSERT INTO `master_vendor` (`vendor_id`, `vendor_code`, `vendor_name`, `address`, `city`, `postal_code`, `state_code`, `province`, `country_code`, `country_name`, `attention`, `email_id`, `telephone`, `fax`, `npwp`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(5, 'QLF', 'QUALIFA', 'JAKARTA UTARA', 'JAKARTA UTARA', '', '', 'DKI JAKARTA', 'IDN', 'indonesia', '', '', '', '', '', 1, 'ADMIN', '2019-10-17 01:53:40', 'ADMIN', '2019-10-17 02:02:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_delevery`
--

CREATE TABLE IF NOT EXISTS `tbl_delevery` (
`id_delevery` int(11) NOT NULL,
  `id_pengiriman` int(11) DEFAULT NULL,
  `kode_delevery` varchar(50) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `pengemudi` varchar(100) DEFAULT NULL,
  `status_delevery` int(3) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_invoice`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_invoice` (
`id_detail_invoice` int(11) NOT NULL,
  `kode_invoice` varchar(100) DEFAULT NULL,
  `dpp` varchar(200) DEFAULT NULL,
  `ppn` varchar(100) DEFAULT NULL,
  `ppn_qty` varchar(200) DEFAULT NULL,
  `subtotal` varchar(200) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tbl_detail_invoice`
--

INSERT INTO `tbl_detail_invoice` (`id_detail_invoice`, `kode_invoice`, `dpp`, `ppn`, `ppn_qty`, `subtotal`, `created_by`, `created_on`) VALUES
(2, '0', '127', '246000', '10', '1', 'ADMIN', '2020-01-12 16:33:04'),
(3, '0', '127', '246000', '10', '1', 'ADMIN', '2020-01-12 16:35:25'),
(4, '0', '2460000', '246000', '10', '2460000', 'ADMIN', '2020-01-12 16:37:09'),
(5, 'JTE-82-01-2020', '220000', '19800', '9', '210000', 'ADMIN', '2020-01-13 02:24:15'),
(6, 'JTE-82-01-2020', '220000', '19800', '9', '210000', 'ADMIN', '2020-01-13 02:25:04'),
(7, 'JTE-82-01-2020', '220000', '19800', '9', '210000', 'ADMIN', '2020-01-13 02:26:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokumen`
--

CREATE TABLE IF NOT EXISTS `tbl_dokumen` (
`id_dokumen` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `gambar_suratjalan` varchar(300) DEFAULT NULL,
  `gambar_bap` varchar(300) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoice`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice` (
`id_invoice` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `kode_invoice` varchar(30) DEFAULT NULL,
  `costumer_id` int(11) DEFAULT NULL,
  `costumer_code` varchar(100) DEFAULT NULL,
  `costumer_name` varchar(100) DEFAULT NULL,
  `dpp` varchar(100) DEFAULT NULL,
  `ppn` varchar(100) DEFAULT NULL,
  `ppn_qty` varchar(100) DEFAULT NULL,
  `subtotal` varchar(100) DEFAULT NULL,
  `invoice_status` int(3) DEFAULT NULL,
  `tanggal_invoice` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id_invoice`, `id_pengiriman`, `kode_invoice`, `costumer_id`, `costumer_code`, `costumer_name`, `dpp`, `ppn`, `ppn_qty`, `subtotal`, `invoice_status`, `tanggal_invoice`, `created_by`, `created_on`) VALUES
(1, 1, 'JTE-578-01-2020', 2, 'PLN', 'PERSERO TBK', NULL, NULL, NULL, NULL, 1, '2020-01-12', 'ADMIN', '2020-01-12 15:17:15'),
(2, 3, 'JTE-578-01-2020', 2, 'PLN', 'PERSERO TBK', NULL, NULL, NULL, NULL, 1, '2020-01-12', 'ADMIN', '2020-01-12 15:17:15'),
(3, 2, 'JTE-82-01-2020', 1, 'GI', 'GARUDA INDONESIA', '220000', '19800', '9', '210000', 1, '2020-01-13', 'ADMIN', '2020-01-13 02:23:31'),
(4, 5, 'JTE-82-01-2020', 1, 'GI', 'GARUDA INDONESIA', '220000', '19800', '9', '210000', 1, '2020-01-13', 'ADMIN', '2020-01-13 02:23:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_document`
--

CREATE TABLE IF NOT EXISTS `tbl_log_document` (
`id_log_document` int(10) NOT NULL,
  `id_pengiriman` int(10) DEFAULT NULL,
  `no_document` varchar(100) DEFAULT NULL,
  `jenis_document` varchar(100) DEFAULT NULL,
  `tanggal_document` date DEFAULT NULL,
  `status_log_document` int(3) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_pengiriman`
--

CREATE TABLE IF NOT EXISTS `tbl_log_pengiriman` (
`id_log_pengiriman` int(10) NOT NULL,
  `id_pengiriman` int(10) DEFAULT NULL,
  `awb_no` varchar(100) DEFAULT NULL,
  `pickup_info` varchar(100) DEFAULT NULL,
  `time_activity` datetime DEFAULT NULL,
  `jenis_kegiatan` varchar(100) DEFAULT NULL,
  `remarks_activity` varchar(200) DEFAULT NULL,
  `no_kendaraan` varchar(15) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_tujuan`
--

CREATE TABLE IF NOT EXISTS `tbl_log_tujuan` (
`id_log_tujuan` int(11) NOT NULL,
  `id_pengiriman` int(11) DEFAULT NULL,
  `kode_asal` varchar(50) DEFAULT NULL,
  `nama_asal` varchar(100) DEFAULT NULL,
  `pic_pengiriman` varchar(100) DEFAULT NULL,
  `tanggal_log_asal` datetime DEFAULT NULL,
  `status_log_asal` int(5) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tbl_log_tujuan`
--

INSERT INTO `tbl_log_tujuan` (`id_log_tujuan`, `id_pengiriman`, `kode_asal`, `nama_asal`, `pic_pengiriman`, `tanggal_log_asal`, `status_log_asal`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 'JKT', 'JAKARTA', 'DIAN SASTRO', '2020-01-11 22:09:10', 2, 'ADMIN', '2020-01-11 22:09:10', NULL, NULL),
(2, 1, 'BTN', 'BANTEN', 'VINO G BASTIAN', '2020-01-11 22:09:28', 3, 'ADMIN', '2020-01-11 22:09:28', NULL, NULL),
(3, 1, 'LMP', 'LAMPUNG', 'JOKO DRIYONO', '2020-01-11 22:09:57', 4, 'ADMIN', '2020-01-11 22:09:57', NULL, NULL),
(4, 1, 'LMP', 'LAMPUNG', 'VINO G BASTIAN', '2020-01-11 22:10:15', 6, 'ADMIN', '2020-01-11 22:10:15', NULL, NULL),
(5, 3, 'JMB', 'JAMBI', 'VINO G BASTIAN', '2020-01-11 22:18:24', 6, 'ADMIN', '2020-01-11 22:18:24', NULL, NULL),
(6, 2, 'BTM', 'BATAM', 'AZIS GAGAP', '2020-01-13 02:19:06', 6, 'ADMIN', '2020-01-13 02:19:06', NULL, NULL),
(7, 5, 'BTM', 'BATAM', 'VINO G BASTIAN', '2020-01-13 02:19:40', 6, 'ADMIN', '2020-01-13 02:19:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_manifest`
--

CREATE TABLE IF NOT EXISTS `tbl_manifest` (
`id_manifest` int(11) NOT NULL,
  `id_pengiriman` int(11) DEFAULT NULL,
  `kode_manifest` varchar(100) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `pengemudi` varchar(100) DEFAULT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `status_manifest` int(3) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_manifest`
--

INSERT INTO `tbl_manifest` (`id_manifest`, `id_pengiriman`, `kode_manifest`, `nopol`, `pengemudi`, `asal`, `tujuan`, `status_manifest`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 2, 'JTE-251-02-2020', 'BE 1234 ID', 'DASF', 'JAKARTA', 'BATAM', 1, 'ADMIN', '2020-02-22 11:16:54', NULL, NULL),
(2, 5, 'JTE-251-02-2020', 'BE 1234 ID', 'DASF', 'JAKARTA', 'BATAM', 1, 'ADMIN', '2020-02-22 11:16:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tes`
--

CREATE TABLE IF NOT EXISTS `tbl_tes` (
`id_tes` int(10) NOT NULL,
  `id` int(10) DEFAULT NULL,
  `tes1` int(5) DEFAULT NULL,
  `tes2` varchar(5) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_tes`
--

INSERT INTO `tbl_tes` (`id_tes`, `id`, `tes1`, `tes2`) VALUES
(1, 1, 0, '30'),
(2, 1, 0, '30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id_user` int(10) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto_user` varchar(200) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `sebagai` int(5) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_user`, `telepon`, `email`, `foto_user`, `status`, `sebagai`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'admin', '123', 'ADMIN', '086776671', 'admn@gmail.com1', NULL, 1, 1, 'admin', NULL, 'ADMIN1', '2019-11-18 02:41:50'),
(2, 'wixi', '123', 'WIXI PRAYOGA', '085769915795', 'wixicoin95@gmail.com', 'UserwixiWIXI_PRAYOGA1569776438.jpg', 1, 1, 'Admin', '2019-09-30 00:00:38', NULL, NULL),
(3, 'vendor', '123', 'VENDOR', '0898789', '', '', 0, 2, 'WIXI PRAYOGA', '2019-09-30 00:06:28', NULL, NULL),
(4, 'costumer', '123', 'COSTUMER', '9879988', 'costumer@gmail.com', '', 1, 3, 'WIXI PRAYOGA', '2019-09-30 00:09:50', NULL, NULL),
(5, 'vendor1', '123', 'VENDOR1', '089877', 'vendor@gmail.com', '', 1, 2, 'WIXI PRAYOGA', '2019-10-08 23:38:43', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pengiriman`
--
ALTER TABLE `data_pengiriman`
 ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `master_agen`
--
ALTER TABLE `master_agen`
 ADD PRIMARY KEY (`id_agen`);

--
-- Indexes for table `master_asal`
--
ALTER TABLE `master_asal`
 ADD PRIMARY KEY (`id_asal`);

--
-- Indexes for table `master_consignee`
--
ALTER TABLE `master_consignee`
 ADD PRIMARY KEY (`consignee_id`);

--
-- Indexes for table `master_costumer`
--
ALTER TABLE `master_costumer`
 ADD PRIMARY KEY (`costumer_id`);

--
-- Indexes for table `master_hpp`
--
ALTER TABLE `master_hpp`
 ADD PRIMARY KEY (`id_hpp`);

--
-- Indexes for table `master_shipper`
--
ALTER TABLE `master_shipper`
 ADD PRIMARY KEY (`shipper_id`);

--
-- Indexes for table `master_tarif`
--
ALTER TABLE `master_tarif`
 ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `master_tujuan`
--
ALTER TABLE `master_tujuan`
 ADD PRIMARY KEY (`id_tujuan`);

--
-- Indexes for table `master_vendor`
--
ALTER TABLE `master_vendor`
 ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `tbl_delevery`
--
ALTER TABLE `tbl_delevery`
 ADD PRIMARY KEY (`id_delevery`);

--
-- Indexes for table `tbl_detail_invoice`
--
ALTER TABLE `tbl_detail_invoice`
 ADD PRIMARY KEY (`id_detail_invoice`);

--
-- Indexes for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
 ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
 ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tbl_log_document`
--
ALTER TABLE `tbl_log_document`
 ADD PRIMARY KEY (`id_log_document`);

--
-- Indexes for table `tbl_log_pengiriman`
--
ALTER TABLE `tbl_log_pengiriman`
 ADD PRIMARY KEY (`id_log_pengiriman`);

--
-- Indexes for table `tbl_log_tujuan`
--
ALTER TABLE `tbl_log_tujuan`
 ADD PRIMARY KEY (`id_log_tujuan`);

--
-- Indexes for table `tbl_manifest`
--
ALTER TABLE `tbl_manifest`
 ADD PRIMARY KEY (`id_manifest`);

--
-- Indexes for table `tbl_tes`
--
ALTER TABLE `tbl_tes`
 ADD PRIMARY KEY (`id_tes`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pengiriman`
--
ALTER TABLE `data_pengiriman`
MODIFY `id_pengiriman` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_agen`
--
ALTER TABLE `master_agen`
MODIFY `id_agen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_asal`
--
ALTER TABLE `master_asal`
MODIFY `id_asal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master_consignee`
--
ALTER TABLE `master_consignee`
MODIFY `consignee_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_costumer`
--
ALTER TABLE `master_costumer`
MODIFY `costumer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_hpp`
--
ALTER TABLE `master_hpp`
MODIFY `id_hpp` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_shipper`
--
ALTER TABLE `master_shipper`
MODIFY `shipper_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_tarif`
--
ALTER TABLE `master_tarif`
MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_tujuan`
--
ALTER TABLE `master_tujuan`
MODIFY `id_tujuan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_vendor`
--
ALTER TABLE `master_vendor`
MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_delevery`
--
ALTER TABLE `tbl_delevery`
MODIFY `id_delevery` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_detail_invoice`
--
ALTER TABLE `tbl_detail_invoice`
MODIFY `id_detail_invoice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_log_document`
--
ALTER TABLE `tbl_log_document`
MODIFY `id_log_document` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_log_pengiriman`
--
ALTER TABLE `tbl_log_pengiriman`
MODIFY `id_log_pengiriman` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_log_tujuan`
--
ALTER TABLE `tbl_log_tujuan`
MODIFY `id_log_tujuan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_manifest`
--
ALTER TABLE `tbl_manifest`
MODIFY `id_manifest` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_tes`
--
ALTER TABLE `tbl_tes`
MODIFY `id_tes` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
