-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: 04 Mei 2019 pada 06.03
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noserp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamatpelanggans`
--

CREATE TABLE `alamatpelanggans` (
  `KodePelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Provinsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Negara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Faks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoIndeks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alatbayarkasirs`
--

CREATE TABLE `alatbayarkasirs` (
  `KodeAlatBayarKasir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UntukPembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `PPN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NominalPPN` double NOT NULL,
  `Bayar` double NOT NULL,
  `Kembali` double NOT NULL,
  `Ongkir` double NOT NULL,
  `KodeJenisBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `banks`
--

CREATE TABLE `banks` (
  `NomorRekening` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaBank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nomor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `drivers`
--

CREATE TABLE `drivers` (
  `KodeDriver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaDriver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kontak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Handphone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `eventlogs`
--

CREATE TABLE `eventlogs` (
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam` time NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutangs`
--

CREATE TABLE `hutangs` (
  `KodeHutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `KodeSupplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLPB` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Term` double NOT NULL,
  `Koreksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kembali` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InvoiceSupplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalInvoiceSupplier` date NOT NULL,
  `hutangcol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoicehutangdetails`
--

CREATE TABLE `invoicehutangdetails` (
  `KodeHutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLPB` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Subtotal` double NOT NULL,
  `KodeInvoiceHutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoicehutangs`
--

CREATE TABLE `invoicehutangs` (
  `KodeInvoiceHutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `KodeSupplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Term` double NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoicepiutangdetails`
--

CREATE TABLE `invoicepiutangdetails` (
  `KodePiutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSuratJalan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Subtotal` double NOT NULL,
  `KodeInvoicePiutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoicepiutangs`
--

CREATE TABLE `invoicepiutangs` (
  `KodeInvoicePiutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `KodePelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Term` double NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invopnames`
--

CREATE TABLE `invopnames` (
  `Tanggal` datetime NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtyOPN` double NOT NULL,
  `qtyIN` double NOT NULL,
  `qtyOUT` double NOT NULL,
  `qtyInHand` double NOT NULL,
  `qtyOpname` double NOT NULL,
  `qtyBlc` double NOT NULL,
  `HargaRata` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `itemkonversis`
--

CREATE TABLE `itemkonversis` (
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Konversi` double NOT NULL,
  `HargaBeli` double NOT NULL,
  `HargaJual` double NOT NULL,
  `HargaGrosir` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeKategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbayars`
--

CREATE TABLE `jenisbayars` (
  `KodeJenisBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasbanks`
--

CREATE TABLE `kasbanks` (
  `KodeKasBank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalCheque` date NOT NULL,
  `KodeBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TipeBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoLink` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BayarDari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Untuk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `KodeKategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItemAwal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarmasukbarangs`
--

CREATE TABLE `keluarmasukbarangs` (
  `Tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisTransaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeTransaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HargaRata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idx` bigint(20) NOT NULL,
  `indexmov` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasiitems`
--

CREATE TABLE `lokasiitems` (
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` double NOT NULL,
  `Konversi` double NOT NULL,
  `HargaRata` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasis`
--

CREATE TABLE `lokasis` (
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `matauangs`
--

CREATE TABLE `matauangs` (
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nilai` double NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_29_124807_create_alamatpelanggans_table', 1),
(4, '2019_05_02_013118_create_alatbayarkasirs_table', 1),
(5, '2019_05_02_013142_create_banks_table', 1),
(6, '2019_05_02_013153_create_drivers_table', 1),
(7, '2019_05_02_013206_create_eventlogs_table', 1),
(8, '2019_05_02_013218_create_hutangs_table', 1),
(9, '2019_05_02_013231_create_invoicehutangs_table', 1),
(10, '2019_05_02_013245_create_invoicepiutangs_table', 1),
(11, '2019_05_02_013257_create_invoicehutangdetails_table', 1),
(12, '2019_05_02_013306_create_invoicepiutangdetails_table', 1),
(13, '2019_05_02_013322_create_invopnames_table', 1),
(14, '2019_05_02_013334_create_items_table', 1),
(15, '2019_05_02_013348_create_itemkonversis_table', 1),
(16, '2019_05_02_013400_create_jenisbayars_table', 1),
(17, '2019_05_02_013430_create_kasbanks_table', 1),
(18, '2019_05_02_013523_create_kategoris_table', 1),
(19, '2019_05_02_013536_create_keluarmasukbarangs_table', 1),
(20, '2019_05_02_064528_create_lokasis_table', 1),
(21, '2019_05_02_064555_create_lokasiitems_table', 1),
(22, '2019_05_02_064609_create_matauangs_table', 1),
(23, '2019_05_02_064638_create_pelanggans_table', 1),
(24, '2019_05_02_064710_create_pelunasanhutangs_table', 1),
(25, '2019_05_02_064722_create_pelunasanpiutangs_table', 1),
(26, '2019_05_02_064747_create_pembelianlangsungs_table', 1),
(27, '2019_05_02_064805_create_pemesananpembelians_table', 1),
(28, '2019_05_02_064811_create_pembelianlangsungdetails_table', 2),
(29, '2019_05_02_064819_create_pemesananpenjualans_table', 2),
(30, '2019_05_02_064843_create_penjualanlangsungs_table', 2),
(31, '2019_05_02_064855_create_penjualanlangsungreturns_table', 2),
(32, '2019_05_02_064901_create_penjualanlangsungdetails_table', 2),
(33, '2019_05_02_064907_create_penjualanlangsungreturndetails_table', 2),
(34, '2019_05_02_064927_create_pindahgudangs_table', 2),
(35, '2019_05_02_064941_create_piutangs_table', 2),
(36, '2019_05_02_064949_create_pindahgudangdetails_table', 2),
(37, '2019_05_02_064955_create_sales_table', 2),
(38, '2019_05_02_065005_create_satuans_table', 2),
(39, '2019_05_02_065016_create_stokkeluars_table', 2),
(40, '2019_05_02_065025_create_stokmasuks_table', 2),
(41, '2019_05_02_065030_create_stokkeluardetails_table', 2),
(42, '2019_05_02_065038_create_stokmasukdetails_table', 2),
(43, '2019_05_02_065055_create_suppliers_table', 2),
(44, '2019_05_02_065107_create_suratjalans_table', 2),
(45, '2019_05_02_065131_create_penggunas_table', 2),
(46, '2019_05_02_065141_create_suratjalandetails_table', 2),
(47, '2019_05_02_065154_create_suratjalanreturns_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `KodePelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaPelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kontak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Handphone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LimitPiutang` double NOT NULL,
  `Diskon` double NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelunasanhutangs`
--

CREATE TABLE `pelunasanhutangs` (
  `KodePelunasanHutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeHutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeInvoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TipeBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSupplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeKasBank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelunasanpiutangs`
--

CREATE TABLE `pelunasanpiutangs` (
  `KodePelunasanPiutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodePiutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeInvoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TipeBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSupplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeKasBank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelianlangsungdetails`
--

CREATE TABLE `pembelianlangsungdetails` (
  `KodePembelianLangsung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` double NOT NULL,
  `Harga` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoUrut` int(11) NOT NULL,
  `Subtotal` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelianlangsungs`
--

CREATE TABLE `pembelianlangsungs` (
  `KodePembelianLangsung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `PPN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NilaiPPN` double NOT NULL,
  `Printed` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `Subtotal` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesananpembelians`
--

CREATE TABLE `pemesananpembelians` (
  `KodePO` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `PPN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NilaiPPN` double NOT NULL,
  `Printed` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `Subtotal` double NOT NULL,
  `KodeSupplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Expired` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesananpenjualans`
--

CREATE TABLE `pemesananpenjualans` (
  `KodeSO` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `PPN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NilaiPPN` double NOT NULL,
  `Printed` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `Subtotal` double NOT NULL,
  `KodePelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Expired` double NOT NULL,
  `KodeSales` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `POPelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunas`
--

CREATE TABLE `penggunas` (
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalDaftar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Aktif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualanlangsungdetails`
--

CREATE TABLE `penjualanlangsungdetails` (
  `KodePenjualanLangsung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` double NOT NULL,
  `Harga` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoUrut` int(11) NOT NULL,
  `Subtotal` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualanlangsungreturndetails`
--

CREATE TABLE `penjualanlangsungreturndetails` (
  `KodePenjualanLangsungReturn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` double NOT NULL,
  `Harga` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoUrut` int(11) NOT NULL,
  `Subtotal` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualanlangsungreturns`
--

CREATE TABLE `penjualanlangsungreturns` (
  `KodePenjualanLangsungReturn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `KodePenjualanLangsung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `PPN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NilaiPPN` double NOT NULL,
  `Printed` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `Subtotal` double NOT NULL,
  `KodePelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoIndeks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualanlangsungs`
--

CREATE TABLE `penjualanlangsungs` (
  `KodePenjualanLangsung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `PPN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NilaiPPN` double NOT NULL,
  `Printed` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `Subtotal` double NOT NULL,
  `KodePelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoIndeks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindahgudangdetails`
--

CREATE TABLE `pindahgudangdetails` (
  `KodePindah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoUrut` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindahgudangs`
--

CREATE TABLE `pindahgudangs` (
  `KodePindah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DariLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutangs`
--

CREATE TABLE `piutangs` (
  `KodePiutang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `KodePelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSuratJalan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Term` double NOT NULL,
  `Koreksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kembali` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `KodeSales` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaSales` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kontak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Handphone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuans`
--

CREATE TABLE `satuans` (
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokkeluardetails`
--

CREATE TABLE `stokkeluardetails` (
  `KodeStokKeluar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoUrut` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokkeluars`
--

CREATE TABLE `stokkeluars` (
  `KodeStokKeluar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TotalItem` double NOT NULL,
  `Printed` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokmasukdetails`
--

CREATE TABLE `stokmasukdetails` (
  `KodeStokMasuk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoUrut` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokmasuks`
--

CREATE TABLE `stokmasuks` (
  `KodeStokMasuk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TotalItem` double NOT NULL,
  `Printed` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `KodeSupplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaSupplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kontak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Handphone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Provinsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Negara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratjalandetails`
--

CREATE TABLE `suratjalandetails` (
  `KodeSuratJalan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeItem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeSatuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` double NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoUrut` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratjalanreturns`
--

CREATE TABLE `suratjalanreturns` (
  `KodeSuratJalan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `PPN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NilaiPPN` double NOT NULL,
  `Printed` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `Subtotal` double NOT NULL,
  `KodeSuratJalanReturn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratjalans`
--

CREATE TABLE `suratjalans` (
  `KodeSuratJalan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` datetime NOT NULL,
  `KodeLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeMataUang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `PPN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NilaiPPN` double NOT NULL,
  `Printed` double NOT NULL,
  `Diskon` double NOT NULL,
  `NilaiDiskon` double NOT NULL,
  `Subtotal` double NOT NULL,
  `KodePelanggan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoIndeks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamatpelanggans`
--
ALTER TABLE `alamatpelanggans`
  ADD KEY `KodePelanggan` (`KodePelanggan`);

--
-- Indexes for table `alatbayarkasirs`
--
ALTER TABLE `alatbayarkasirs`
  ADD PRIMARY KEY (`KodeAlatBayarKasir`),
  ADD KEY `KodeJenisBayar` (`KodeJenisBayar`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`NomorRekening`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`KodeDriver`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `eventlogs`
--
ALTER TABLE `eventlogs`
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `hutangs`
--
ALTER TABLE `hutangs`
  ADD PRIMARY KEY (`KodeHutang`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodeSupplier` (`KodeSupplier`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `invoicehutangdetails`
--
ALTER TABLE `invoicehutangdetails`
  ADD KEY `KodeHutang` (`KodeHutang`),
  ADD KEY `KodeInvoiceHutang` (`KodeInvoiceHutang`);

--
-- Indexes for table `invoicehutangs`
--
ALTER TABLE `invoicehutangs`
  ADD PRIMARY KEY (`KodeInvoiceHutang`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodeSupplier` (`KodeSupplier`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `invoicepiutangdetails`
--
ALTER TABLE `invoicepiutangdetails`
  ADD KEY `KodePiutang` (`KodePiutang`),
  ADD KEY `KodeSuratJalan` (`KodeSuratJalan`);

--
-- Indexes for table `invoicepiutangs`
--
ALTER TABLE `invoicepiutangs`
  ADD PRIMARY KEY (`KodeInvoicePiutang`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodePelanggan` (`KodePelanggan`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `invopnames`
--
ALTER TABLE `invopnames`
  ADD KEY `KodeItem` (`KodeItem`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeSatuan` (`KodeSatuan`);

--
-- Indexes for table `itemkonversis`
--
ALTER TABLE `itemkonversis`
  ADD KEY `KodeItem` (`KodeItem`),
  ADD KEY `KodeSatuan` (`KodeSatuan`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`KodeItem`),
  ADD KEY `KodeKategori` (`KodeKategori`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `jenisbayars`
--
ALTER TABLE `jenisbayars`
  ADD PRIMARY KEY (`KodeJenisBayar`);

--
-- Indexes for table `kasbanks`
--
ALTER TABLE `kasbanks`
  ADD PRIMARY KEY (`KodeKasBank`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`KodeKategori`),
  ADD KEY `KodeUser` (`KodeUser`),
  ADD KEY `KodeItemAwal` (`KodeItemAwal`);

--
-- Indexes for table `keluarmasukbarangs`
--
ALTER TABLE `keluarmasukbarangs`
  ADD PRIMARY KEY (`KodeTransaksi`),
  ADD KEY `KodeItem` (`KodeItem`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `lokasiitems`
--
ALTER TABLE `lokasiitems`
  ADD KEY `KodeLokasi` (`KodeLokasi`);

--
-- Indexes for table `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`KodeLokasi`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `matauangs`
--
ALTER TABLE `matauangs`
  ADD PRIMARY KEY (`KodeMataUang`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`KodePelanggan`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `pelunasanhutangs`
--
ALTER TABLE `pelunasanhutangs`
  ADD PRIMARY KEY (`KodePelunasanHutang`),
  ADD KEY `KodeHutang` (`KodeHutang`),
  ADD KEY `KodeInvoice` (`KodeInvoice`),
  ADD KEY `KodeKasBank` (`KodeKasBank`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodeSupplier` (`KodeSupplier`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `pelunasanpiutangs`
--
ALTER TABLE `pelunasanpiutangs`
  ADD PRIMARY KEY (`KodePelunasanPiutang`),
  ADD KEY `KodeInvoice` (`KodeInvoice`),
  ADD KEY `KodeKasBank` (`KodeKasBank`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodePiutang` (`KodePiutang`),
  ADD KEY `KodeSupplier` (`KodeSupplier`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `pembelianlangsungdetails`
--
ALTER TABLE `pembelianlangsungdetails`
  ADD KEY `KodePembelianLangsung` (`KodePembelianLangsung`),
  ADD KEY `KodeItem` (`KodeItem`),
  ADD KEY `KodeSatuan` (`KodeSatuan`);

--
-- Indexes for table `pembelianlangsungs`
--
ALTER TABLE `pembelianlangsungs`
  ADD PRIMARY KEY (`KodePembelianLangsung`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `pemesananpembelians`
--
ALTER TABLE `pemesananpembelians`
  ADD PRIMARY KEY (`KodePO`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodeSupplier` (`KodeSupplier`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `pemesananpenjualans`
--
ALTER TABLE `pemesananpenjualans`
  ADD PRIMARY KEY (`KodeSO`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodePelanggan` (`KodePelanggan`),
  ADD KEY `KodeSales` (`KodeSales`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`KodeUser`);

--
-- Indexes for table `penjualanlangsungdetails`
--
ALTER TABLE `penjualanlangsungdetails`
  ADD KEY `KodePenjualanLangsung` (`KodePenjualanLangsung`),
  ADD KEY `KodeSatuan` (`KodeSatuan`),
  ADD KEY `KodeItem` (`KodeItem`);

--
-- Indexes for table `penjualanlangsungreturndetails`
--
ALTER TABLE `penjualanlangsungreturndetails`
  ADD KEY `KodePenjualanLangsungReturn` (`KodePenjualanLangsungReturn`),
  ADD KEY `KodeItem` (`KodeItem`),
  ADD KEY `KodeSatuan` (`KodeSatuan`);

--
-- Indexes for table `penjualanlangsungreturns`
--
ALTER TABLE `penjualanlangsungreturns`
  ADD PRIMARY KEY (`KodePenjualanLangsungReturn`),
  ADD KEY `KodePenjualanLangsung` (`KodePenjualanLangsung`),
  ADD KEY `KodePelanggan` (`KodePelanggan`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `penjualanlangsungs`
--
ALTER TABLE `penjualanlangsungs`
  ADD PRIMARY KEY (`KodePenjualanLangsung`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodePelanggan` (`KodePelanggan`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `pindahgudangdetails`
--
ALTER TABLE `pindahgudangdetails`
  ADD KEY `KodeItem` (`KodeItem`),
  ADD KEY `KodePindah` (`KodePindah`),
  ADD KEY `KodeSatuan` (`KodeSatuan`);

--
-- Indexes for table `pindahgudangs`
--
ALTER TABLE `pindahgudangs`
  ADD PRIMARY KEY (`KodePindah`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `piutangs`
--
ALTER TABLE `piutangs`
  ADD PRIMARY KEY (`KodePiutang`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodePelanggan` (`KodePelanggan`),
  ADD KEY `KodeSuratJalan` (`KodeSuratJalan`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`KodeSales`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`KodeSatuan`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `stokkeluardetails`
--
ALTER TABLE `stokkeluardetails`
  ADD KEY `KodeItem` (`KodeItem`),
  ADD KEY `KodeSatuan` (`KodeSatuan`),
  ADD KEY `KodeStokKeluar` (`KodeStokKeluar`);

--
-- Indexes for table `stokkeluars`
--
ALTER TABLE `stokkeluars`
  ADD PRIMARY KEY (`KodeStokKeluar`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `stokmasukdetails`
--
ALTER TABLE `stokmasukdetails`
  ADD KEY `KodeItem` (`KodeItem`),
  ADD KEY `KodeSatuan` (`KodeSatuan`),
  ADD KEY `KodeStokMasuk` (`KodeStokMasuk`);

--
-- Indexes for table `stokmasuks`
--
ALTER TABLE `stokmasuks`
  ADD PRIMARY KEY (`KodeStokMasuk`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`KodeSupplier`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `suratjalandetails`
--
ALTER TABLE `suratjalandetails`
  ADD KEY `KodeItem` (`KodeItem`),
  ADD KEY `KodeSatuan` (`KodeSatuan`),
  ADD KEY `KodeSuratJalan` (`KodeSuratJalan`);

--
-- Indexes for table `suratjalanreturns`
--
ALTER TABLE `suratjalanreturns`
  ADD PRIMARY KEY (`KodeSuratJalanReturn`),
  ADD KEY `KodeSuratJalan` (`KodeSuratJalan`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `suratjalans`
--
ALTER TABLE `suratjalans`
  ADD PRIMARY KEY (`KodeSuratJalan`),
  ADD KEY `KodeLokasi` (`KodeLokasi`),
  ADD KEY `KodeMataUang` (`KodeMataUang`),
  ADD KEY `KodePelanggan` (`KodePelanggan`),
  ADD KEY `KodeUser` (`KodeUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamatpelanggans`
--
ALTER TABLE `alamatpelanggans`
  ADD CONSTRAINT `alamatpelanggans_ibfk_1` FOREIGN KEY (`KodePelanggan`) REFERENCES `pelanggans` (`KodePelanggan`);

--
-- Ketidakleluasaan untuk tabel `alatbayarkasirs`
--
ALTER TABLE `alatbayarkasirs`
  ADD CONSTRAINT `alatbayarkasirs_ibfk_1` FOREIGN KEY (`KodeJenisBayar`) REFERENCES `jenisbayars` (`KodeJenisBayar`);

--
-- Ketidakleluasaan untuk tabel `banks`
--
ALTER TABLE `banks`
  ADD CONSTRAINT `banks_ibfk_1` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `drivers_ibfk_2` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `eventlogs`
--
ALTER TABLE `eventlogs`
  ADD CONSTRAINT `eventlogs_ibfk_1` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `hutangs`
--
ALTER TABLE `hutangs`
  ADD CONSTRAINT `hutangs_ibfk_1` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `hutangs_ibfk_2` FOREIGN KEY (`KodeSupplier`) REFERENCES `suppliers` (`KodeSupplier`),
  ADD CONSTRAINT `hutangs_ibfk_3` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `invoicehutangdetails`
--
ALTER TABLE `invoicehutangdetails`
  ADD CONSTRAINT `invoicehutangdetails_ibfk_1` FOREIGN KEY (`KodeHutang`) REFERENCES `hutangs` (`KodeHutang`),
  ADD CONSTRAINT `invoicehutangdetails_ibfk_2` FOREIGN KEY (`KodeInvoiceHutang`) REFERENCES `invoicehutangs` (`KodeInvoiceHutang`);

--
-- Ketidakleluasaan untuk tabel `invoicehutangs`
--
ALTER TABLE `invoicehutangs`
  ADD CONSTRAINT `invoicehutangs_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `invoicehutangs_ibfk_2` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `invoicehutangs_ibfk_3` FOREIGN KEY (`KodeSupplier`) REFERENCES `suppliers` (`KodeSupplier`),
  ADD CONSTRAINT `invoicehutangs_ibfk_4` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `invoicepiutangdetails`
--
ALTER TABLE `invoicepiutangdetails`
  ADD CONSTRAINT `invoicepiutangdetails_ibfk_1` FOREIGN KEY (`KodePiutang`) REFERENCES `piutangs` (`KodePiutang`),
  ADD CONSTRAINT `invoicepiutangdetails_ibfk_2` FOREIGN KEY (`KodeSuratJalan`) REFERENCES `suratjalans` (`KodeSuratJalan`);

--
-- Ketidakleluasaan untuk tabel `invoicepiutangs`
--
ALTER TABLE `invoicepiutangs`
  ADD CONSTRAINT `invoicepiutangs_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `invoicepiutangs_ibfk_2` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `invoicepiutangs_ibfk_3` FOREIGN KEY (`KodePelanggan`) REFERENCES `pelanggans` (`KodePelanggan`),
  ADD CONSTRAINT `invoicepiutangs_ibfk_4` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `invopnames`
--
ALTER TABLE `invopnames`
  ADD CONSTRAINT `invopnames_ibfk_1` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`),
  ADD CONSTRAINT `invopnames_ibfk_2` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `invopnames_ibfk_3` FOREIGN KEY (`KodeSatuan`) REFERENCES `satuans` (`KodeSatuan`);

--
-- Ketidakleluasaan untuk tabel `itemkonversis`
--
ALTER TABLE `itemkonversis`
  ADD CONSTRAINT `itemkonversis_ibfk_1` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`),
  ADD CONSTRAINT `itemkonversis_ibfk_2` FOREIGN KEY (`KodeSatuan`) REFERENCES `satuans` (`KodeSatuan`);

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`KodeKategori`) REFERENCES `kategoris` (`KodeKategori`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `kasbanks`
--
ALTER TABLE `kasbanks`
  ADD CONSTRAINT `kasbanks_ibfk_1` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD CONSTRAINT `kategoris_ibfk_1` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`),
  ADD CONSTRAINT `kategoris_ibfk_2` FOREIGN KEY (`KodeItemAwal`) REFERENCES `items` (`KodeItem`);

--
-- Ketidakleluasaan untuk tabel `keluarmasukbarangs`
--
ALTER TABLE `keluarmasukbarangs`
  ADD CONSTRAINT `keluarmasukbarangs_ibfk_1` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`),
  ADD CONSTRAINT `keluarmasukbarangs_ibfk_2` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `keluarmasukbarangs_ibfk_3` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `lokasiitems`
--
ALTER TABLE `lokasiitems`
  ADD CONSTRAINT `lokasiitems_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`);

--
-- Ketidakleluasaan untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  ADD CONSTRAINT `lokasis_ibfk_1` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `matauangs`
--
ALTER TABLE `matauangs`
  ADD CONSTRAINT `matauangs_ibfk_1` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD CONSTRAINT `pelanggans_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `pelanggans_ibfk_2` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `pelunasanhutangs`
--
ALTER TABLE `pelunasanhutangs`
  ADD CONSTRAINT `pelunasanhutangs_ibfk_1` FOREIGN KEY (`KodeHutang`) REFERENCES `hutangs` (`KodeHutang`),
  ADD CONSTRAINT `pelunasanhutangs_ibfk_2` FOREIGN KEY (`KodeInvoice`) REFERENCES `invoicehutangs` (`KodeInvoiceHutang`),
  ADD CONSTRAINT `pelunasanhutangs_ibfk_3` FOREIGN KEY (`KodeKasBank`) REFERENCES `kasbanks` (`KodeKasBank`),
  ADD CONSTRAINT `pelunasanhutangs_ibfk_4` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `pelunasanhutangs_ibfk_5` FOREIGN KEY (`KodeSupplier`) REFERENCES `suppliers` (`KodeSupplier`),
  ADD CONSTRAINT `pelunasanhutangs_ibfk_6` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `pelunasanpiutangs`
--
ALTER TABLE `pelunasanpiutangs`
  ADD CONSTRAINT `pelunasanpiutangs_ibfk_1` FOREIGN KEY (`KodeInvoice`) REFERENCES `invoicepiutangs` (`KodeInvoicePiutang`),
  ADD CONSTRAINT `pelunasanpiutangs_ibfk_2` FOREIGN KEY (`KodeKasBank`) REFERENCES `kasbanks` (`KodeKasBank`),
  ADD CONSTRAINT `pelunasanpiutangs_ibfk_3` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `pelunasanpiutangs_ibfk_4` FOREIGN KEY (`KodePiutang`) REFERENCES `piutangs` (`KodePiutang`),
  ADD CONSTRAINT `pelunasanpiutangs_ibfk_5` FOREIGN KEY (`KodeSupplier`) REFERENCES `suppliers` (`KodeSupplier`),
  ADD CONSTRAINT `pelunasanpiutangs_ibfk_6` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `pembelianlangsungdetails`
--
ALTER TABLE `pembelianlangsungdetails`
  ADD CONSTRAINT `pembelianlangsungdetails_ibfk_1` FOREIGN KEY (`KodePembelianLangsung`) REFERENCES `pembelianlangsungs` (`KodePembelianLangsung`),
  ADD CONSTRAINT `pembelianlangsungdetails_ibfk_2` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`),
  ADD CONSTRAINT `pembelianlangsungdetails_ibfk_3` FOREIGN KEY (`KodeSatuan`) REFERENCES `satuans` (`KodeSatuan`);

--
-- Ketidakleluasaan untuk tabel `pembelianlangsungs`
--
ALTER TABLE `pembelianlangsungs`
  ADD CONSTRAINT `pembelianlangsungs_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `pembelianlangsungs_ibfk_2` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `pembelianlangsungs_ibfk_3` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `pemesananpembelians`
--
ALTER TABLE `pemesananpembelians`
  ADD CONSTRAINT `pemesananpembelians_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `pemesananpembelians_ibfk_2` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `pemesananpembelians_ibfk_3` FOREIGN KEY (`KodeSupplier`) REFERENCES `suppliers` (`KodeSupplier`),
  ADD CONSTRAINT `pemesananpembelians_ibfk_4` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `pemesananpenjualans`
--
ALTER TABLE `pemesananpenjualans`
  ADD CONSTRAINT `pemesananpenjualans_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `pemesananpenjualans_ibfk_2` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `pemesananpenjualans_ibfk_3` FOREIGN KEY (`KodePelanggan`) REFERENCES `pelanggans` (`KodePelanggan`),
  ADD CONSTRAINT `pemesananpenjualans_ibfk_4` FOREIGN KEY (`KodeSales`) REFERENCES `sales` (`KodeSales`),
  ADD CONSTRAINT `pemesananpenjualans_ibfk_5` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `penjualanlangsungdetails`
--
ALTER TABLE `penjualanlangsungdetails`
  ADD CONSTRAINT `penjualanlangsungdetails_ibfk_1` FOREIGN KEY (`KodePenjualanLangsung`) REFERENCES `penjualanlangsungs` (`KodePenjualanLangsung`),
  ADD CONSTRAINT `penjualanlangsungdetails_ibfk_2` FOREIGN KEY (`KodeSatuan`) REFERENCES `satuans` (`KodeSatuan`),
  ADD CONSTRAINT `penjualanlangsungdetails_ibfk_3` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`);

--
-- Ketidakleluasaan untuk tabel `penjualanlangsungreturndetails`
--
ALTER TABLE `penjualanlangsungreturndetails`
  ADD CONSTRAINT `penjualanlangsungreturndetails_ibfk_1` FOREIGN KEY (`KodePenjualanLangsungReturn`) REFERENCES `penjualanlangsungreturns` (`KodePenjualanLangsungReturn`),
  ADD CONSTRAINT `penjualanlangsungreturndetails_ibfk_2` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`),
  ADD CONSTRAINT `penjualanlangsungreturndetails_ibfk_3` FOREIGN KEY (`KodeSatuan`) REFERENCES `satuans` (`KodeSatuan`);

--
-- Ketidakleluasaan untuk tabel `penjualanlangsungreturns`
--
ALTER TABLE `penjualanlangsungreturns`
  ADD CONSTRAINT `penjualanlangsungreturns_ibfk_1` FOREIGN KEY (`KodePenjualanLangsung`) REFERENCES `penjualanlangsungs` (`KodePenjualanLangsung`),
  ADD CONSTRAINT `penjualanlangsungreturns_ibfk_2` FOREIGN KEY (`KodePelanggan`) REFERENCES `pelanggans` (`KodePelanggan`),
  ADD CONSTRAINT `penjualanlangsungreturns_ibfk_3` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `penjualanlangsungs`
--
ALTER TABLE `penjualanlangsungs`
  ADD CONSTRAINT `penjualanlangsungs_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `penjualanlangsungs_ibfk_2` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `penjualanlangsungs_ibfk_3` FOREIGN KEY (`KodePelanggan`) REFERENCES `pelanggans` (`KodePelanggan`),
  ADD CONSTRAINT `penjualanlangsungs_ibfk_4` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `pindahgudangdetails`
--
ALTER TABLE `pindahgudangdetails`
  ADD CONSTRAINT `pindahgudangdetails_ibfk_1` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`),
  ADD CONSTRAINT `pindahgudangdetails_ibfk_2` FOREIGN KEY (`KodePindah`) REFERENCES `pindahgudangs` (`KodePindah`),
  ADD CONSTRAINT `pindahgudangdetails_ibfk_3` FOREIGN KEY (`KodeSatuan`) REFERENCES `satuans` (`KodeSatuan`);

--
-- Ketidakleluasaan untuk tabel `pindahgudangs`
--
ALTER TABLE `pindahgudangs`
  ADD CONSTRAINT `pindahgudangs_ibfk_1` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `piutangs`
--
ALTER TABLE `piutangs`
  ADD CONSTRAINT `piutangs_ibfk_1` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `piutangs_ibfk_2` FOREIGN KEY (`KodePelanggan`) REFERENCES `pelanggans` (`KodePelanggan`),
  ADD CONSTRAINT `piutangs_ibfk_3` FOREIGN KEY (`KodeSuratJalan`) REFERENCES `suratjalans` (`KodeSuratJalan`),
  ADD CONSTRAINT `piutangs_ibfk_4` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `satuans`
--
ALTER TABLE `satuans`
  ADD CONSTRAINT `satuans_ibfk_1` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `stokkeluardetails`
--
ALTER TABLE `stokkeluardetails`
  ADD CONSTRAINT `stokkeluardetails_ibfk_1` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`),
  ADD CONSTRAINT `stokkeluardetails_ibfk_2` FOREIGN KEY (`KodeSatuan`) REFERENCES `satuans` (`KodeSatuan`),
  ADD CONSTRAINT `stokkeluardetails_ibfk_3` FOREIGN KEY (`KodeStokKeluar`) REFERENCES `stokkeluars` (`KodeStokKeluar`);

--
-- Ketidakleluasaan untuk tabel `stokkeluars`
--
ALTER TABLE `stokkeluars`
  ADD CONSTRAINT `stokkeluars_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `stokkeluars_ibfk_2` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `stokmasukdetails`
--
ALTER TABLE `stokmasukdetails`
  ADD CONSTRAINT `stokmasukdetails_ibfk_1` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`),
  ADD CONSTRAINT `stokmasukdetails_ibfk_2` FOREIGN KEY (`KodeSatuan`) REFERENCES `satuans` (`KodeSatuan`),
  ADD CONSTRAINT `stokmasukdetails_ibfk_3` FOREIGN KEY (`KodeStokMasuk`) REFERENCES `stokmasuks` (`KodeStokMasuk`);

--
-- Ketidakleluasaan untuk tabel `stokmasuks`
--
ALTER TABLE `stokmasuks`
  ADD CONSTRAINT `stokmasuks_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `stokmasuks_ibfk_2` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `suppliers_ibfk_2` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `suratjalandetails`
--
ALTER TABLE `suratjalandetails`
  ADD CONSTRAINT `suratjalandetails_ibfk_1` FOREIGN KEY (`KodeItem`) REFERENCES `items` (`KodeItem`),
  ADD CONSTRAINT `suratjalandetails_ibfk_2` FOREIGN KEY (`KodeSatuan`) REFERENCES `satuans` (`KodeSatuan`),
  ADD CONSTRAINT `suratjalandetails_ibfk_3` FOREIGN KEY (`KodeSuratJalan`) REFERENCES `suratjalans` (`KodeSuratJalan`);

--
-- Ketidakleluasaan untuk tabel `suratjalanreturns`
--
ALTER TABLE `suratjalanreturns`
  ADD CONSTRAINT `suratjalanreturns_ibfk_1` FOREIGN KEY (`KodeSuratJalan`) REFERENCES `suratjalans` (`KodeSuratJalan`),
  ADD CONSTRAINT `suratjalanreturns_ibfk_2` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);

--
-- Ketidakleluasaan untuk tabel `suratjalans`
--
ALTER TABLE `suratjalans`
  ADD CONSTRAINT `suratjalans_ibfk_1` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasis` (`KodeLokasi`),
  ADD CONSTRAINT `suratjalans_ibfk_2` FOREIGN KEY (`KodeMataUang`) REFERENCES `matauangs` (`KodeMataUang`),
  ADD CONSTRAINT `suratjalans_ibfk_3` FOREIGN KEY (`KodePelanggan`) REFERENCES `pelanggans` (`KodePelanggan`),
  ADD CONSTRAINT `suratjalans_ibfk_4` FOREIGN KEY (`KodeUser`) REFERENCES `penggunas` (`KodeUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
