-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 09:09 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `nama_bank` varchar(200) NOT NULL,
  `atas_nama` varchar(200) NOT NULL,
  `no_rekening` bigint(50) NOT NULL,
  `saldo_awal` bigint(50) NOT NULL,
  `total_kredit` bigint(50) NOT NULL,
  `total_debet` bigint(50) NOT NULL,
  `saldo_akhir` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `tanggal`, `nama_bank`, `atas_nama`, `no_rekening`, `saldo_awal`, `total_kredit`, `total_debet`, `saldo_akhir`) VALUES
(3, '19 September, 2019', 'Mandiri', 'Ikhsan Abdillah', 501001641300, 100000, 0, 0, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `kirim_uang`
--

CREATE TABLE `kirim_uang` (
  `id_kirim` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tgl_kirim` text NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `total` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pajak`
--

CREATE TABLE `pajak` (
  `id_pajak` int(11) NOT NULL,
  `nama_pajak` varchar(50) NOT NULL,
  `persentase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pajak`
--

INSERT INTO `pajak` (`id_pajak`, `nama_pajak`, `persentase`) VALUES
(1, 'PPN', 1),
(2, 'PPH', 0.15),
(3, 'PPN + PPH', 1.15);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `perusahaan` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_handphone` bigint(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `perusahaan`, `alamat`, `email`, `no_handphone`) VALUES
(7, 'Ikhsan Abdillah', 'PT Professional Technology', 'Jl Apa Aja Boleh ', 'ikhsan@gmail.com', 6282147483621);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nomor` varchar(200) NOT NULL,
  `tgl_transaksi` text NOT NULL,
  `jatuh_tempo` text NOT NULL,
  `tagihan_dibayarkan` bigint(50) NOT NULL,
  `total` bigint(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `nomor`, `tgl_transaksi`, `jatuh_tempo`, `tagihan_dibayarkan`, `total`, `status`) VALUES
(2, 4, '10000', '21 September, 2019', '28 September, 2019', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `id_pajak` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `id_produk`, `deskripsi`, `kuantitas`, `id_pajak`) VALUES
(1, 1, 0, 'Ini laptop', 2, 3),
(2, 1, 0, 'a', 1, 1),
(3, 2, 1, 'asasas', 1, 1),
(4, 2, 3, 'xbanxba', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pembelian_view`
-- (See below for the actual view)
--
CREATE TABLE `pembelian_view` (
`id_pembelian` int(11)
,`nama_supplier` varchar(200)
,`nomor` varchar(200)
,`tgl_transaksi` text
,`jatuh_tempo` text
,`tagihan_dibayarkan` bigint(50)
,`total` bigint(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nomor` varchar(200) NOT NULL,
  `tgl_transaksi` text NOT NULL,
  `jatuh_tempo` text NOT NULL,
  `tagihan_dibayarkan` bigint(50) NOT NULL,
  `total` bigint(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `nomor`, `tgl_transaksi`, `jatuh_tempo`, `tagihan_dibayarkan`, `total`, `status`) VALUES
(6, 7, '0000000001', '1 September, 2019', '7 September, 2019', 0, 0, 0),
(7, 7, '0000000001', '1 September, 2019', '7 September, 2019', 0, 0, 0),
(8, 7, '0000000002', '1 September, 2019', '7 September, 2019', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `id_pajak` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_produk`, `deskripsi`, `kuantitas`, `id_pajak`) VALUES
(2, 7, 1, 'Pembelian Laptop untuk karyawan baru', 10, 1),
(3, 8, 1, 'Tambahan laptop yang sebelumnya', 1, 1),
(4, 8, 3, 'Tambahan laptop yang sebelumnya', 5, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `penjualan_view`
-- (See below for the actual view)
--
CREATE TABLE `penjualan_view` (
`id_penjualan` int(11)
,`nama_pelanggan` varchar(200)
,`nomor` varchar(200)
,`tgl_transaksi` text
,`jatuh_tempo` text
,`tagihan_dibayarkan` bigint(50)
,`total` bigint(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `hrg_beli_satuan` bigint(50) NOT NULL,
  `hrg_jual_satuan` bigint(50) NOT NULL,
  `stok` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `name`, `kode`, `kategori`, `deskripsi`, `hrg_beli_satuan`, `hrg_jual_satuan`, `stok`) VALUES
(1, 'Macbook Pro 15 Inch Space Grey', 'MP-15-001', 'Laptop', 'Macbook Pro 15 Inch 256GB 3.7Ghz, Space Grey with ATI Radeon Graphics.', 10000000, 90000000, 10),
(3, 'ASUS ROG STRIX GL503GE-EN023T [i7-8750/8GB/1TB/Nvidia 1050Ti 4GB/W10]', 'ARSG-i7-8750', 'Laptop', 'prosesor Intel® Core™ generasi ke-8 terbaru dan grafis NVIDIA® GeForce® GTX 10-Series, ROG Strix GL503 memiliki semua alat yang diperlukan untuk meningkatkan level permainan Anda. Laptop gaming esports ini memiliki sistem Anti-Dust Cooling (ADC) terdepan untuk mengatasi tuntutan maraton gaming yang melelahkan, sementara pencahayaan Aura Sync memungkinkan Anda menyesuaikan warna dari seluruh pengaturan game Anda. Jadi bersiaplah untuk pertempuran!', 1000000, 15000000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `perusahaan` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_handphone` bigint(20) NOT NULL,
  `saldo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `perusahaan`, `alamat`, `email`, `no_handphone`, `saldo`) VALUES
(1, 'Nursetyo Adi Nugroho', 'PT Professional Technology', 'Bumi Mutiara Blok JJ.8/17 RT005 RW034, Bojong Kulur, Gunung Putri', 'nrsty29@gmail.com', 6282147483647, 0),
(4, 'Ikhsan Abdillah', 'PT Professional Technology', 'Jl Apa Aja Boleh ', 'ikhsan@gmail.com', 62892147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `terima_uang`
--

CREATE TABLE `terima_uang` (
  `id_terima` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_terima` text NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `total` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$GkvYcVT6G9X6VTKLOURD5OLhVviuotmZMA7kL2EI891wk9y3D3dw2', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1569043576, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Structure for view `pembelian_view`
--
DROP TABLE IF EXISTS `pembelian_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pembelian_view`  AS  select `pembelian`.`id_pembelian` AS `id_pembelian`,`supplier`.`nama` AS `nama_supplier`,`pembelian`.`nomor` AS `nomor`,`pembelian`.`tgl_transaksi` AS `tgl_transaksi`,`pembelian`.`jatuh_tempo` AS `jatuh_tempo`,`pembelian`.`tagihan_dibayarkan` AS `tagihan_dibayarkan`,`totals`.`hrg_jual_satuan` AS `total` from ((`pembelian` left join (select `produk`.`hrg_jual_satuan` AS `hrg_jual_satuan`,`pembelian_detail`.`id_pembelian` AS `id_pembelian` from (`pembelian_detail` left join `produk` on(`pembelian_detail`.`id_produk` = `produk`.`id_produk`)) order by `pembelian_detail`.`id_pembelian`) `totals` on(`totals`.`id_pembelian` = `pembelian`.`id_pembelian`)) join `supplier` on(`supplier`.`id_supplier` = `pembelian`.`id_supplier`)) order by `pembelian`.`id_pembelian` ;

-- --------------------------------------------------------

--
-- Structure for view `penjualan_view`
--
DROP TABLE IF EXISTS `penjualan_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penjualan_view`  AS  select `penjualan`.`id_penjualan` AS `id_penjualan`,`pelanggan`.`nama` AS `nama_pelanggan`,`penjualan`.`nomor` AS `nomor`,`penjualan`.`tgl_transaksi` AS `tgl_transaksi`,`penjualan`.`jatuh_tempo` AS `jatuh_tempo`,`penjualan`.`tagihan_dibayarkan` AS `tagihan_dibayarkan`,`totals`.`hrg_jual_satuan` AS `total` from ((`penjualan` left join (select `produk`.`hrg_jual_satuan` AS `hrg_jual_satuan`,`penjualan_detail`.`id_penjualan` AS `id_penjualan` from (`penjualan_detail` left join `produk` on(`penjualan_detail`.`id_produk` = `produk`.`id_produk`)) order by `penjualan_detail`.`id_penjualan`) `totals` on(`totals`.`id_penjualan` = `penjualan`.`id_penjualan`)) join `pelanggan` on(`pelanggan`.`id_pelanggan` = `penjualan`.`id_pelanggan`)) order by `penjualan`.`id_penjualan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kirim_uang`
--
ALTER TABLE `kirim_uang`
  ADD PRIMARY KEY (`id_kirim`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id_pajak`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `terima_uang`
--
ALTER TABLE `terima_uang`
  ADD PRIMARY KEY (`id_terima`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kirim_uang`
--
ALTER TABLE `kirim_uang`
  MODIFY `id_kirim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terima_uang`
--
ALTER TABLE `terima_uang`
  MODIFY `id_terima` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
