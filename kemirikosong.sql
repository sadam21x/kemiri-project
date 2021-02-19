-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 05:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemiri2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_gudang`
--

CREATE TABLE `admin_gudang` (
  `ID_ADMIN_GUDANG` int(11) NOT NULL,
  `KODE_KOTA` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_ADMIN_GUDANG` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALAMAT_ADMIN_GUDANG` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JENIS_KELAMIN_ADMIN_GUDANG` tinyint(4) NOT NULL,
  `NO_TELP_ADMIN_GUDANG` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL_ADMIN_GUDANG` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FOTO_PROFILE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS_ADMIN_GUDANG` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `KODE_BAHAN_BAKU` int(11) NOT NULL,
  `ID_JENIS_BAHAN_BAKU` int(11) NOT NULL,
  `NAMA_BAHAN_BAKU` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `STOK_BAHAN_BAKU` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `depo_air_minum`
--

CREATE TABLE `depo_air_minum` (
  `KODE_DEPO` int(11) NOT NULL,
  `KODE_KOTA` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_SALES_A` int(11) DEFAULT NULL,
  `ID_SALES_B` int(11) DEFAULT NULL,
  `ID_MANAJER_MARKETING` int(11) DEFAULT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `NAMA_CUSTOMER` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_DEPO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALAMAT_DEPO` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NO_TELP_DEPO` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL_DEPO` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengambilan`
--

CREATE TABLE `detail_pengambilan` (
  `ID_PENERIMAAN` int(11) NOT NULL,
  `KODE_PENGAMBILAN` int(11) NOT NULL,
  `JUMLAH_KG` double DEFAULT NULL,
  `JUMLAH_SAK_KARUNG` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `detail_pengambilan`
--
DELIMITER $$
CREATE TRIGGER `stok_penerimaan` AFTER INSERT ON `detail_pengambilan` FOR EACH ROW BEGIN
            UPDATE penerimaan_bahan_baku SET STOK_PENERIMAAN=STOK_PENERIMAAN-NEW.JUMLAH_KG
            WHERE ID_PENERIMAAN=NEW.ID_PENERIMAAN;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detil_penjualan`
--

CREATE TABLE `detil_penjualan` (
  `ID_PENJUALAN` int(11) NOT NULL,
  `KODE_PRODUCT` int(11) NOT NULL,
  `JUMLAH_SAK` int(11) NOT NULL,
  `JUMLAH_PCS` int(11) NOT NULL,
  `HARGA_BARANG` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `detil_penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualan_barang` AFTER INSERT ON `detil_penjualan` FOR EACH ROW BEGIN
            UPDATE product SET STOK_PRODUCT=STOK_PRODUCT-NEW.JUMLAH_PCS
            WHERE KODE_PRODUCT=NEW.KODE_PRODUCT;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_kinerja_salesa`
--

CREATE TABLE `evaluasi_kinerja_salesa` (
  `ID_EVALUASI_KINERJA_SALESA` int(11) NOT NULL,
  `ID_MANAJER_MARKETING` int(11) NOT NULL,
  `ID_SALES_A` int(11) NOT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `TGL_EVALUASI_KINERJA_SALESA` date NOT NULL,
  `EVALUASI_SALESA` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_kinerja_salesb`
--

CREATE TABLE `evaluasi_kinerja_salesb` (
  `ID_EVALUASI_KINERJA_SALESB` int(11) NOT NULL,
  `ID_SALES_B` int(11) NOT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `ID_MANAJER_MARKETING` int(11) NOT NULL,
  `TGL_EVALUASI_KINERJA_SALESB` date NOT NULL,
  `EVALUASI_SALESB` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_product`
--

CREATE TABLE `hasil_product` (
  `KODE_HASIL_PRODUCT` int(11) NOT NULL,
  `KODE_PRODUKSI` int(11) NOT NULL,
  `KODE_PRODUCT` int(11) NOT NULL,
  `HASIL_BAGUS_PCS` double DEFAULT NULL,
  `HASIL_RUSAK_PCS` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `hasil_product`
--
DELIMITER $$
CREATE TRIGGER `insert_hasil_produk` AFTER INSERT ON `hasil_product` FOR EACH ROW BEGIN
UPDATE product SET STOK_PRODUCT=STOK_PRODUCT+NEW.HASIL_BAGUS_PCS
WHERE KODE_PRODUCT=NEW.KODE_PRODUCT;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_hasil_produk` AFTER UPDATE ON `hasil_product` FOR EACH ROW BEGIN
UPDATE product SET STOK_PRODUCT=STOK_PRODUCT+NEW.HASIL_BAGUS_PCS
WHERE KODE_PRODUCT=NEW.KODE_PRODUCT;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `indonesia_cities`
--

CREATE TABLE `indonesia_cities` (
  `id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indonesia_districts`
--

CREATE TABLE `indonesia_districts` (
  `id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indonesia_provinces`
--

CREATE TABLE `indonesia_provinces` (
  `id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indonesia_villages`
--

CREATE TABLE `indonesia_villages` (
  `id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `KODE_JABATAN` int(11) NOT NULL,
  `NAMA_JABATAN` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bahan_baku`
--

CREATE TABLE `jenis_bahan_baku` (
  `ID_JENIS_BAHAN_BAKU` int(11) NOT NULL,
  `NAMA_JENIS_BAHAN_BAKU` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_product`
--

CREATE TABLE `jenis_product` (
  `KODE_JENIS_PRODUCT` int(11) NOT NULL,
  `NAMA_JENIS_PRODUCT` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_penjualan`
--

CREATE TABLE `konfirmasi_penjualan` (
  `ID_KONFIRMASI_PENJUALAN` int(11) NOT NULL,
  `KODE_DEPO` int(11) NOT NULL,
  `ID_SALES_B` int(11) DEFAULT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `TGL_KONFIRMASI_PENJUALAN` date NOT NULL,
  `STATUS_KONFIRMASI_PENJUALAN` tinyint(4) NOT NULL,
  `CATATAN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `KODE_KOTA` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KODE_PROVINSI` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_KOTA` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `ID_USER_LOG` int(11) NOT NULL,
  `ID_JABATAN_LOG` int(11) NOT NULL,
  `ID_PEGAWAI` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manajer_marketing`
--

CREATE TABLE `manajer_marketing` (
  `ID_MANAJER_MARKETING` int(11) NOT NULL,
  `KODE_KOTA` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_MANAJER_MARKETING` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALAMAT_MANAJER_MARKETING` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JENIS_KELAMIN_MANAJER_MARKETING` tinyint(4) NOT NULL,
  `NO_TELP_MANAJER_MARKETING` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL_MANAJER_MARKETING` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FOTO_PROFILE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS_MANAGER_MARKETING` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `KODE_MESIN` int(11) NOT NULL,
  `KODE_MOULDING` int(11) NOT NULL,
  `NAMA_MESIN` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metode_kirim`
--

CREATE TABLE `metode_kirim` (
  `ID_METODE_KIRIM` int(11) NOT NULL,
  `METODE_KIRIM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moulding`
--

CREATE TABLE `moulding` (
  `KODE_MOULDING` int(11) NOT NULL,
  `NAMA_MOULDING` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operator_mesin`
--

CREATE TABLE `operator_mesin` (
  `ID_OPERATOR_MESIN` int(11) NOT NULL,
  `KODE_KOTA` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_OPERATOR_MESIN` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALAMAT_OPERATOR_MESIN` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JENIS_KELAMIN_OPERATOR_MESIN` tinyint(4) NOT NULL,
  `NO_TELP_OPERATOR_MESIN` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL_OPERATOR_MESIN` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FOTO_PROFILE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS_OPERATOR_MESIN` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ID_OWNER` int(11) NOT NULL,
  `KODE_KOTA` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_OWNER` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALAMAT_OWNER` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JENIS_KELAMIN_OWNER` tinyint(4) NOT NULL,
  `NO_TELP_OWNER` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL_OWNER` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FOTO_PROFILE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS_OWNER` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_penerimaan_bahan_baku`
--

CREATE TABLE `pembayaran_penerimaan_bahan_baku` (
  `KODE_PEMBAYARAN` int(11) NOT NULL,
  `ID_PENERIMAAN` int(11) NOT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `TGL_PEMBAYARAN` date DEFAULT NULL,
  `BIAYA_TRANSAKSI` int(11) NOT NULL,
  `STATUS_PEMBAYARAN` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_penjualan`
--

CREATE TABLE `pembayaran_penjualan` (
  `KODE_PEMBAYARAN_PENJUALAN` int(11) NOT NULL,
  `ID_PENJUALAN` int(11) NOT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `TGL_PEMBAYARAN` date DEFAULT NULL,
  `STATUS_PEMBAYARAN` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_bahan_baku`
--

CREATE TABLE `penerimaan_bahan_baku` (
  `ID_PENERIMAAN` int(11) NOT NULL,
  `ID_SUPPLIER` int(11) NOT NULL,
  `KODE_BAHAN_BAKU` int(11) NOT NULL,
  `ID_ADMIN_GUDANG` int(11) NOT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `TGL_KEDATANGAN` date NOT NULL,
  `SATUAN` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TOTAL_BERAT` double NOT NULL,
  `JUMLAH_KARUNG_SAK` double NOT NULL,
  `ISI_KARUNG` double NOT NULL,
  `STOK_PENERIMAAN` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `penerimaan_bahan_baku`
--
DELIMITER $$
CREATE TRIGGER `penerimaan_produk` AFTER INSERT ON `penerimaan_bahan_baku` FOR EACH ROW BEGIN
                UPDATE bahan_baku SET STOK_BAHAN_BAKU=STOK_BAHAN_BAKU+NEW.TOTAL_BERAT
                WHERE KODE_BAHAN_BAKU=NEW.KODE_BAHAN_BAKU;
                END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok_rusak` AFTER UPDATE ON `penerimaan_bahan_baku` FOR EACH ROW BEGIN
                UPDATE bahan_baku SET STOK_BAHAN_BAKU=STOK_BAHAN_BAKU-OLD.STOK_PENERIMAAN+NEW.STOK_PENERIMAAN
                WHERE KODE_BAHAN_BAKU=NEW.KODE_BAHAN_BAKU;
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan_bahan_baku`
--

CREATE TABLE `pengambilan_bahan_baku` (
  `KODE_PENGAMBILAN_BAHAN_BAKU` int(11) NOT NULL,
  `ID_OPERATOR_MESIN` int(11) NOT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `KODE_MESIN` int(11) NOT NULL,
  `WAKTU_PENGAMBILAN` datetime NOT NULL,
  `HASIL_PRODUK` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `KODE_PENGIRIMAN` int(11) NOT NULL,
  `KODE_PEMBAYARAN_PENJUALAN` int(11) NOT NULL,
  `ID_ADMIN_GUDANG` int(11) NOT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `TGL_KIRIM_RIIL` date NOT NULL,
  `TIPE_KENDARAAN` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOPOL` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_PENJUALAN` int(11) NOT NULL,
  `KODE_DEPO` int(11) NOT NULL,
  `ID_MANAJER_MARKETING` int(11) DEFAULT NULL,
  `ID_SALES_B` int(11) DEFAULT NULL,
  `ID_OWNER` int(11) DEFAULT NULL,
  `ID_METODE_KIRIM` int(11) DEFAULT NULL,
  `TGL_PENJUALAN` datetime NOT NULL,
  `TGL_KIRIM` date NOT NULL,
  `ONGKOS_KIRIM` int(11) NOT NULL,
  `TOTAL_PENJUALAN` int(11) NOT NULL,
  `STATUS_PENJUALAN` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `KODE_PRODUCT` int(11) NOT NULL,
  `KODE_JENIS_PRODUCT` int(11) NOT NULL,
  `NAMA_PRODUCT` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HARGA_PRODUCT` double NOT NULL,
  `STOK_PRODUCT` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proses_produksi`
--

CREATE TABLE `proses_produksi` (
  `KODE_PRODUKSI` int(11) NOT NULL,
  `KODE_PENGAMBILAN_BAHAN_BAKU` int(11) NOT NULL,
  `TGL_PRODUKSI` datetime NOT NULL,
  `HASIL_BAGUS_KG` double DEFAULT NULL,
  `HASIL_RUSAK_KG` double DEFAULT NULL,
  `EVALUASI_PRODUCT` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EVALUASI_MESIN` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EVALUASI_BAHAN_BAKU` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`EVALUASI_BAHAN_BAKU`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `KODE_PROVINSI` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_PROVINSI` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_a`
--

CREATE TABLE `sales_a` (
  `ID_SALES_A` int(11) NOT NULL,
  `KODE_KOTA` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_SALES_A` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALAMAT_SALES_A` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JENIS_KELAMIN_SALES_A` tinyint(4) NOT NULL,
  `NO_TELP_SALES_A` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL_SALES_A` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FOTO_PROFILE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS_SALES_A` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_b`
--

CREATE TABLE `sales_b` (
  `ID_SALES_B` int(11) NOT NULL,
  `KODE_KOTA` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_SALES_B` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALAMAT_SALES_B` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JENIS_KELAMIN_SALES_B` tinyint(4) NOT NULL,
  `NO_TELP_SALES_B` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL_SALES_B` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FOTO_PROFILE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS_SALES_B` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID_SUPPLIER` int(11) NOT NULL,
  `KODE_KOTA` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAMA_SUPPLIER` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ALAMAT_SUPPLIER` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NO_TELP_SUPPLIER` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL_SUPPLIER` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `KODE_JABATAN` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FOTO_PROFILE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS_USER` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_gudang`
--
ALTER TABLE `admin_gudang`
  ADD PRIMARY KEY (`ID_ADMIN_GUDANG`),
  ADD KEY `FK_MEMILIKI52270` (`KODE_KOTA`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`KODE_BAHAN_BAKU`),
  ADD KEY `FK_TERDAPAT` (`ID_JENIS_BAHAN_BAKU`);

--
-- Indexes for table `depo_air_minum`
--
ALTER TABLE `depo_air_minum`
  ADD PRIMARY KEY (`KODE_DEPO`),
  ADD KEY `FK_MEMILIKIE0R9` (`KODE_KOTA`),
  ADD KEY `FK_MENCATAT` (`ID_SALES_A`),
  ADD KEY `FK_MENCATAT1234` (`ID_MANAJER_MARKETING`),
  ADD KEY `FK_MENCATAT1235` (`ID_SALES_B`),
  ADD KEY `FK_OWNER_DEPO` (`ID_OWNER`);

--
-- Indexes for table `detail_pengambilan`
--
ALTER TABLE `detail_pengambilan`
  ADD PRIMARY KEY (`ID_PENERIMAAN`,`KODE_PENGAMBILAN`),
  ADD KEY `FK_TERDAPAT633` (`KODE_PENGAMBILAN`);

--
-- Indexes for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD PRIMARY KEY (`ID_PENJUALAN`,`KODE_PRODUCT`),
  ADD KEY `FK_TERDAPAT12312311` (`KODE_PRODUCT`);

--
-- Indexes for table `evaluasi_kinerja_salesa`
--
ALTER TABLE `evaluasi_kinerja_salesa`
  ADD PRIMARY KEY (`ID_EVALUASI_KINERJA_SALESA`),
  ADD KEY `FK_MELAKUKAN5221` (`ID_MANAJER_MARKETING`),
  ADD KEY `FK_MEMILIKI5232` (`ID_SALES_A`),
  ADD KEY `FK_OWNER_EVAL_A` (`ID_OWNER`);

--
-- Indexes for table `evaluasi_kinerja_salesb`
--
ALTER TABLE `evaluasi_kinerja_salesb`
  ADD PRIMARY KEY (`ID_EVALUASI_KINERJA_SALESB`),
  ADD KEY `FK_MEMILIKI61397` (`ID_SALES_B`),
  ADD KEY `FK_MELAKUKAN5331` (`ID_MANAJER_MARKETING`),
  ADD KEY `FK_OWNER_EVAL_B` (`ID_OWNER`);

--
-- Indexes for table `hasil_product`
--
ALTER TABLE `hasil_product`
  ADD PRIMARY KEY (`KODE_HASIL_PRODUCT`),
  ADD KEY `FK_TERDAPAT999` (`KODE_PRODUKSI`),
  ADD KEY `FK_TERDAPAT93312` (`KODE_PRODUCT`);

--
-- Indexes for table `indonesia_cities`
--
ALTER TABLE `indonesia_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indonesia_cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `indonesia_districts`
--
ALTER TABLE `indonesia_districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indonesia_districts_city_id_foreign` (`city_id`);

--
-- Indexes for table `indonesia_provinces`
--
ALTER TABLE `indonesia_provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indonesia_villages`
--
ALTER TABLE `indonesia_villages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indonesia_villages_district_id_foreign` (`district_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`KODE_JABATAN`);

--
-- Indexes for table `jenis_bahan_baku`
--
ALTER TABLE `jenis_bahan_baku`
  ADD PRIMARY KEY (`ID_JENIS_BAHAN_BAKU`);

--
-- Indexes for table `jenis_product`
--
ALTER TABLE `jenis_product`
  ADD PRIMARY KEY (`KODE_JENIS_PRODUCT`);

--
-- Indexes for table `konfirmasi_penjualan`
--
ALTER TABLE `konfirmasi_penjualan`
  ADD PRIMARY KEY (`ID_KONFIRMASI_PENJUALAN`),
  ADD KEY `FK_TERDAPAT959123` (`KODE_DEPO`),
  ADD KEY `FK_TERDAPAT4411` (`ID_SALES_B`),
  ADD KEY `FK_OWNER_KONFIRMASI` (`ID_OWNER`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`KODE_KOTA`),
  ADD KEY `FK_MEMILIKI` (`KODE_PROVINSI`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID_USER_LOG`),
  ADD KEY `FK_USER` (`ID_USER_LOG`);

--
-- Indexes for table `manajer_marketing`
--
ALTER TABLE `manajer_marketing`
  ADD PRIMARY KEY (`ID_MANAJER_MARKETING`),
  ADD KEY `FK_MEMILIKI8398` (`KODE_KOTA`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`KODE_MESIN`),
  ADD KEY `FK_TERDAPAT123` (`KODE_MOULDING`);

--
-- Indexes for table `metode_kirim`
--
ALTER TABLE `metode_kirim`
  ADD PRIMARY KEY (`ID_METODE_KIRIM`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moulding`
--
ALTER TABLE `moulding`
  ADD PRIMARY KEY (`KODE_MOULDING`);

--
-- Indexes for table `operator_mesin`
--
ALTER TABLE `operator_mesin`
  ADD PRIMARY KEY (`ID_OPERATOR_MESIN`),
  ADD KEY `FK_MEMILIKI5345` (`KODE_KOTA`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ID_OWNER`),
  ADD KEY `FK_MEMILIKI123` (`KODE_KOTA`);

--
-- Indexes for table `pembayaran_penerimaan_bahan_baku`
--
ALTER TABLE `pembayaran_penerimaan_bahan_baku`
  ADD PRIMARY KEY (`KODE_PEMBAYARAN`),
  ADD KEY `FK_MEMILIKI99` (`ID_PENERIMAAN`),
  ADD KEY `FK_MELAKUKAN1123` (`ID_OWNER`);

--
-- Indexes for table `pembayaran_penjualan`
--
ALTER TABLE `pembayaran_penjualan`
  ADD PRIMARY KEY (`KODE_PEMBAYARAN_PENJUALAN`),
  ADD KEY `FK_TERDAPAT55123` (`ID_PENJUALAN`),
  ADD KEY `FK_MELAKUKAN1233` (`ID_OWNER`);

--
-- Indexes for table `penerimaan_bahan_baku`
--
ALTER TABLE `penerimaan_bahan_baku`
  ADD PRIMARY KEY (`ID_PENERIMAAN`),
  ADD KEY `FK_MENGIRIM` (`ID_SUPPLIER`),
  ADD KEY `FK_TERDAPAT5579` (`KODE_BAHAN_BAKU`),
  ADD KEY `FK_MENERIMA` (`ID_ADMIN_GUDANG`),
  ADD KEY `FK_OWNER_PENERIMAAN` (`ID_OWNER`);

--
-- Indexes for table `pengambilan_bahan_baku`
--
ALTER TABLE `pengambilan_bahan_baku`
  ADD PRIMARY KEY (`KODE_PENGAMBILAN_BAHAN_BAKU`),
  ADD KEY `FK_MELAKUKAN912931` (`ID_OPERATOR_MESIN`),
  ADD KEY `FK_TERDAPAT991` (`KODE_MESIN`),
  ADD KEY `FK_OWNER_PENGAMBILAN` (`ID_OWNER`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`KODE_PENGIRIMAN`),
  ADD KEY `FK_TERDAPAT51` (`KODE_PEMBAYARAN_PENJUALAN`),
  ADD KEY `FK_TERDAPAT123123` (`ID_ADMIN_GUDANG`),
  ADD KEY `FK_OWNER_PENGIRIMAN` (`ID_OWNER`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_PENJUALAN`),
  ADD KEY `FK_TERDAPAT959123` (`KODE_DEPO`),
  ADD KEY `FK_KONFIRMASI` (`ID_MANAJER_MARKETING`),
  ADD KEY `FK_MENGINPUTKAN` (`ID_SALES_B`),
  ADD KEY `FK_METODE_KIRIM3` (`ID_METODE_KIRIM`),
  ADD KEY `FK_OWNER_PENJUALAN` (`ID_OWNER`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`KODE_PRODUCT`),
  ADD KEY `FK_TERDAPAT3454` (`KODE_JENIS_PRODUCT`);

--
-- Indexes for table `proses_produksi`
--
ALTER TABLE `proses_produksi`
  ADD PRIMARY KEY (`KODE_PRODUKSI`),
  ADD KEY `FK_TERDAPAT99` (`KODE_PENGAMBILAN_BAHAN_BAKU`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`KODE_PROVINSI`);

--
-- Indexes for table `sales_a`
--
ALTER TABLE `sales_a`
  ADD PRIMARY KEY (`ID_SALES_A`),
  ADD KEY `FK_MEMILIKI3434` (`KODE_KOTA`);

--
-- Indexes for table `sales_b`
--
ALTER TABLE `sales_b`
  ADD PRIMARY KEY (`ID_SALES_B`),
  ADD KEY `FK_MEMILIKI343` (`KODE_KOTA`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_SUPPLIER`),
  ADD KEY `FK_MEMILIKI623` (`KODE_KOTA`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `FK_TERDAPAT545` (`KODE_JABATAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_gudang`
--
ALTER TABLE `admin_gudang`
  MODIFY `ID_ADMIN_GUDANG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `KODE_BAHAN_BAKU` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `depo_air_minum`
--
ALTER TABLE `depo_air_minum`
  MODIFY `KODE_DEPO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluasi_kinerja_salesa`
--
ALTER TABLE `evaluasi_kinerja_salesa`
  MODIFY `ID_EVALUASI_KINERJA_SALESA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluasi_kinerja_salesb`
--
ALTER TABLE `evaluasi_kinerja_salesb`
  MODIFY `ID_EVALUASI_KINERJA_SALESB` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_product`
--
ALTER TABLE `hasil_product`
  MODIFY `KODE_HASIL_PRODUCT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `KODE_JABATAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_bahan_baku`
--
ALTER TABLE `jenis_bahan_baku`
  MODIFY `ID_JENIS_BAHAN_BAKU` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_product`
--
ALTER TABLE `jenis_product`
  MODIFY `KODE_JENIS_PRODUCT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfirmasi_penjualan`
--
ALTER TABLE `konfirmasi_penjualan`
  MODIFY `ID_KONFIRMASI_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `ID_USER_LOG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manajer_marketing`
--
ALTER TABLE `manajer_marketing`
  MODIFY `ID_MANAJER_MARKETING` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `KODE_MESIN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metode_kirim`
--
ALTER TABLE `metode_kirim`
  MODIFY `ID_METODE_KIRIM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moulding`
--
ALTER TABLE `moulding`
  MODIFY `KODE_MOULDING` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator_mesin`
--
ALTER TABLE `operator_mesin`
  MODIFY `ID_OPERATOR_MESIN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `ID_OWNER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_penerimaan_bahan_baku`
--
ALTER TABLE `pembayaran_penerimaan_bahan_baku`
  MODIFY `KODE_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_penjualan`
--
ALTER TABLE `pembayaran_penjualan`
  MODIFY `KODE_PEMBAYARAN_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerimaan_bahan_baku`
--
ALTER TABLE `penerimaan_bahan_baku`
  MODIFY `ID_PENERIMAAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengambilan_bahan_baku`
--
ALTER TABLE `pengambilan_bahan_baku`
  MODIFY `KODE_PENGAMBILAN_BAHAN_BAKU` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `KODE_PENGIRIMAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `KODE_PRODUCT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses_produksi`
--
ALTER TABLE `proses_produksi`
  MODIFY `KODE_PRODUKSI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_a`
--
ALTER TABLE `sales_a`
  MODIFY `ID_SALES_A` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_b`
--
ALTER TABLE `sales_b`
  MODIFY `ID_SALES_B` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID_SUPPLIER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_gudang`
--
ALTER TABLE `admin_gudang`
  ADD CONSTRAINT `FK_MEMILIKI52270` FOREIGN KEY (`KODE_KOTA`) REFERENCES `indonesia_cities` (`id`);

--
-- Constraints for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `FK_TERDAPAT` FOREIGN KEY (`ID_JENIS_BAHAN_BAKU`) REFERENCES `jenis_bahan_baku` (`ID_JENIS_BAHAN_BAKU`);

--
-- Constraints for table `depo_air_minum`
--
ALTER TABLE `depo_air_minum`
  ADD CONSTRAINT `FK_MEMILIKIE0R9` FOREIGN KEY (`KODE_KOTA`) REFERENCES `indonesia_cities` (`id`),
  ADD CONSTRAINT `FK_MENCATAT` FOREIGN KEY (`ID_SALES_A`) REFERENCES `sales_a` (`ID_SALES_A`),
  ADD CONSTRAINT `FK_MENCATAT1234` FOREIGN KEY (`ID_MANAJER_MARKETING`) REFERENCES `manajer_marketing` (`ID_MANAJER_MARKETING`),
  ADD CONSTRAINT `FK_MENCATAT1235` FOREIGN KEY (`ID_SALES_B`) REFERENCES `sales_b` (`ID_SALES_B`),
  ADD CONSTRAINT `FK_OWNER_DEPO` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`);

--
-- Constraints for table `detail_pengambilan`
--
ALTER TABLE `detail_pengambilan`
  ADD CONSTRAINT `FK_TERDAPAT554` FOREIGN KEY (`ID_PENERIMAAN`) REFERENCES `penerimaan_bahan_baku` (`ID_PENERIMAAN`),
  ADD CONSTRAINT `FK_TERDAPAT633` FOREIGN KEY (`KODE_PENGAMBILAN`) REFERENCES `pengambilan_bahan_baku` (`KODE_PENGAMBILAN_BAHAN_BAKU`);

--
-- Constraints for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD CONSTRAINT `FK_TERDAPAT12312311` FOREIGN KEY (`KODE_PRODUCT`) REFERENCES `product` (`KODE_PRODUCT`),
  ADD CONSTRAINT `FK_TERDAPAT21344` FOREIGN KEY (`ID_PENJUALAN`) REFERENCES `penjualan` (`ID_PENJUALAN`);

--
-- Constraints for table `evaluasi_kinerja_salesa`
--
ALTER TABLE `evaluasi_kinerja_salesa`
  ADD CONSTRAINT `FK_MELAKUKAN5221` FOREIGN KEY (`ID_MANAJER_MARKETING`) REFERENCES `manajer_marketing` (`ID_MANAJER_MARKETING`),
  ADD CONSTRAINT `FK_MEMILIKI5232` FOREIGN KEY (`ID_SALES_A`) REFERENCES `sales_a` (`ID_SALES_A`),
  ADD CONSTRAINT `FK_OWNER_EVAL_A` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`);

--
-- Constraints for table `evaluasi_kinerja_salesb`
--
ALTER TABLE `evaluasi_kinerja_salesb`
  ADD CONSTRAINT `FK_MELAKUKAN5331` FOREIGN KEY (`ID_MANAJER_MARKETING`) REFERENCES `manajer_marketing` (`ID_MANAJER_MARKETING`),
  ADD CONSTRAINT `FK_MEMILIKI61397` FOREIGN KEY (`ID_SALES_B`) REFERENCES `sales_b` (`ID_SALES_B`),
  ADD CONSTRAINT `FK_OWNER_EVAL_B` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`);

--
-- Constraints for table `hasil_product`
--
ALTER TABLE `hasil_product`
  ADD CONSTRAINT `FK_TERDAPAT93312` FOREIGN KEY (`KODE_PRODUCT`) REFERENCES `product` (`KODE_PRODUCT`),
  ADD CONSTRAINT `FK_TERDAPAT999` FOREIGN KEY (`KODE_PRODUKSI`) REFERENCES `proses_produksi` (`KODE_PRODUKSI`);

--
-- Constraints for table `indonesia_cities`
--
ALTER TABLE `indonesia_cities`
  ADD CONSTRAINT `indonesia_cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `indonesia_provinces` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `indonesia_districts`
--
ALTER TABLE `indonesia_districts`
  ADD CONSTRAINT `indonesia_districts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `indonesia_cities` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `indonesia_villages`
--
ALTER TABLE `indonesia_villages`
  ADD CONSTRAINT `indonesia_villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `indonesia_districts` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi_penjualan`
--
ALTER TABLE `konfirmasi_penjualan`
  ADD CONSTRAINT `FK_OWNER_KONFIRMASI` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`),
  ADD CONSTRAINT `FK_TERDAPAT4411` FOREIGN KEY (`ID_SALES_B`) REFERENCES `sales_b` (`ID_SALES_B`),
  ADD CONSTRAINT `FK_TERDAPAT9591231` FOREIGN KEY (`KODE_DEPO`) REFERENCES `depo_air_minum` (`KODE_DEPO`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`KODE_PROVINSI`) REFERENCES `provinsi` (`KODE_PROVINSI`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`ID_USER_LOG`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `manajer_marketing`
--
ALTER TABLE `manajer_marketing`
  ADD CONSTRAINT `FK_MEMILIKI8398` FOREIGN KEY (`KODE_KOTA`) REFERENCES `indonesia_cities` (`id`);

--
-- Constraints for table `mesin`
--
ALTER TABLE `mesin`
  ADD CONSTRAINT `FK_TERDAPAT123` FOREIGN KEY (`KODE_MOULDING`) REFERENCES `moulding` (`KODE_MOULDING`);

--
-- Constraints for table `operator_mesin`
--
ALTER TABLE `operator_mesin`
  ADD CONSTRAINT `FK_MEMILIKI5345` FOREIGN KEY (`KODE_KOTA`) REFERENCES `indonesia_cities` (`id`);

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `FK_MEMILIKI123` FOREIGN KEY (`KODE_KOTA`) REFERENCES `indonesia_cities` (`id`);

--
-- Constraints for table `pembayaran_penerimaan_bahan_baku`
--
ALTER TABLE `pembayaran_penerimaan_bahan_baku`
  ADD CONSTRAINT `FK_MELAKUKAN1123` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`),
  ADD CONSTRAINT `FK_MEMILIKI99` FOREIGN KEY (`ID_PENERIMAAN`) REFERENCES `penerimaan_bahan_baku` (`ID_PENERIMAAN`);

--
-- Constraints for table `pembayaran_penjualan`
--
ALTER TABLE `pembayaran_penjualan`
  ADD CONSTRAINT `FK_MELAKUKAN1233` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`),
  ADD CONSTRAINT `FK_TERDAPAT55123` FOREIGN KEY (`ID_PENJUALAN`) REFERENCES `penjualan` (`ID_PENJUALAN`);

--
-- Constraints for table `penerimaan_bahan_baku`
--
ALTER TABLE `penerimaan_bahan_baku`
  ADD CONSTRAINT `FK_MENERIMA` FOREIGN KEY (`ID_ADMIN_GUDANG`) REFERENCES `admin_gudang` (`ID_ADMIN_GUDANG`),
  ADD CONSTRAINT `FK_MENGIRIM` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`),
  ADD CONSTRAINT `FK_OWNER_PENERIMAAN` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`),
  ADD CONSTRAINT `FK_TERDAPAT5579` FOREIGN KEY (`KODE_BAHAN_BAKU`) REFERENCES `bahan_baku` (`KODE_BAHAN_BAKU`);

--
-- Constraints for table `pengambilan_bahan_baku`
--
ALTER TABLE `pengambilan_bahan_baku`
  ADD CONSTRAINT `FK_MELAKUKAN912931` FOREIGN KEY (`ID_OPERATOR_MESIN`) REFERENCES `operator_mesin` (`ID_OPERATOR_MESIN`),
  ADD CONSTRAINT `FK_OWNER_PENGAMBILAN` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`),
  ADD CONSTRAINT `FK_TERDAPAT991` FOREIGN KEY (`KODE_MESIN`) REFERENCES `mesin` (`KODE_MESIN`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `FK_OWNER_PENGIRIMAN` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`),
  ADD CONSTRAINT `FK_TERDAPAT123123` FOREIGN KEY (`ID_ADMIN_GUDANG`) REFERENCES `admin_gudang` (`ID_ADMIN_GUDANG`),
  ADD CONSTRAINT `FK_TERDAPAT51` FOREIGN KEY (`KODE_PEMBAYARAN_PENJUALAN`) REFERENCES `pembayaran_penjualan` (`KODE_PEMBAYARAN_PENJUALAN`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_KONFIRMASI` FOREIGN KEY (`ID_MANAJER_MARKETING`) REFERENCES `manajer_marketing` (`ID_MANAJER_MARKETING`),
  ADD CONSTRAINT `FK_MENGINPUTKAN` FOREIGN KEY (`ID_SALES_B`) REFERENCES `sales_b` (`ID_SALES_B`),
  ADD CONSTRAINT `FK_METODE_KIRIM3` FOREIGN KEY (`ID_METODE_KIRIM`) REFERENCES `metode_kirim` (`ID_METODE_KIRIM`),
  ADD CONSTRAINT `FK_OWNER_PENJUALAN` FOREIGN KEY (`ID_OWNER`) REFERENCES `owner` (`ID_OWNER`),
  ADD CONSTRAINT `FK_TERDAPAT959123` FOREIGN KEY (`KODE_DEPO`) REFERENCES `depo_air_minum` (`KODE_DEPO`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_TERDAPAT3454` FOREIGN KEY (`KODE_JENIS_PRODUCT`) REFERENCES `jenis_product` (`KODE_JENIS_PRODUCT`);

--
-- Constraints for table `proses_produksi`
--
ALTER TABLE `proses_produksi`
  ADD CONSTRAINT `FK_TERDAPAT99` FOREIGN KEY (`KODE_PENGAMBILAN_BAHAN_BAKU`) REFERENCES `pengambilan_bahan_baku` (`KODE_PENGAMBILAN_BAHAN_BAKU`);

--
-- Constraints for table `sales_a`
--
ALTER TABLE `sales_a`
  ADD CONSTRAINT `FK_MEMILIKI3434` FOREIGN KEY (`KODE_KOTA`) REFERENCES `indonesia_cities` (`id`);

--
-- Constraints for table `sales_b`
--
ALTER TABLE `sales_b`
  ADD CONSTRAINT `FK_MEMILIKI343` FOREIGN KEY (`KODE_KOTA`) REFERENCES `indonesia_cities` (`id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `FK_MEMILIKI623` FOREIGN KEY (`KODE_KOTA`) REFERENCES `indonesia_cities` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_TERDAPAT545` FOREIGN KEY (`KODE_JABATAN`) REFERENCES `jabatan` (`KODE_JABATAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
