-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2022 at 02:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apppos`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `keterangan` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nama`, `type`, `keterangan`) VALUES
(1, 'DOA IBU', 'Supplier', 'Barang dan aksesoris bekas                            '),
(2, 'Konsumen', 'Konsumen', 'Konsumen Umum                            '),
(3, 'DURA APPARELL', 'Konsumen', 'Toko baju dan apparel'),
(4, 'DNA Network', 'Supplier', 'Handphone dan aksesoris'),
(5, 'SINDY CELLULAR', 'Supplier', 'HP dan asesoris'),
(6, 'Gelenyu Graph', 'Konsumen', 'potograper                            ');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(160) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `beli` int(11) NOT NULL,
  `jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `kode`, `nama`, `cat_id`, `beli`, `jual`, `stok`, `is_active`, `date_modified`) VALUES
(1, 'MK01', 'INDOMIE GORENG HYPE ABIS AYAM GEPREK', 5, 2500, 3000, 147, 1, 1668161746),
(2, 'MI01', 'LUWAK WHITE COFFEE', 6, 5714, 2500, 70, 1, 1668100186),
(3, 'MI02', 'GOOD DAY CAPPUCINO', 6, 1500, 2500, 100, 1, 1667955618),
(4, 'RT01', 'SARI ROTI DORAYAKI', 4, 7000, 9000, 50, 1, 1667956363),
(5, 'RK01', 'SAMPOERNA MILD PACK MENTOL', 3, 16917, 25000, 30, 1, 1668008956),
(6, 'MI03', 'CHIMORY FRESH MILK ALMOND', 1, 7833, 10000, 45, 1, 1668007970),
(7, 'MN02', 'INDOMIE SOTO BANJAR LIMAU', 5, 2500, 3000, 490, 1, 1668270105),
(8, 'TL01', 'TELUR AYAM KAMPUNG', 2, 1500, 2000, 560, 1, 1668009611);

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `prefix` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`id`, `category`, `prefix`) VALUES
(1, 'MINUMAN', 'MN'),
(2, 'MAKANAN', 'MK'),
(3, 'ROKOK', 'RK'),
(4, 'ROTI', 'RT'),
(5, 'MIE INSTANT', 'MT'),
(6, 'KOPI SOBEK', 'KP');

-- --------------------------------------------------------

--
-- Table structure for table `product_trace`
--

CREATE TABLE `product_trace` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `contact_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchases` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_trace`
--

INSERT INTO `product_trace` (`id`, `waktu`, `contact_id`, `product_id`, `purchases`, `sales`, `price`, `cost`, `status`, `date_created`, `user_id`) VALUES
(4, '2022-11-09 07:52:00', 3, 2, 50, 0, 2000, 0, 1, 1667955196, 3),
(5, '2022-11-09 07:53:00', 1, 2, 200, 0, 1500, 0, 1, 1668007621, 3),
(6, '2022-11-09 08:00:00', 3, 3, 100, 0, 1500, 0, 1, 1667955618, 3),
(7, '2022-11-09 08:12:00', 3, 4, 50, 0, 7000, 0, 1, 1667956363, 3),
(8, '2022-11-09 21:51:00', 4, 6, 30, 0, 8000, 0, 1, 1668005521, 3),
(9, '2022-11-09 21:57:00', 4, 6, 15, 0, 7500, 0, 1, 1668007970, 4),
(10, '2022-11-09 22:45:00', 1, 5, 5, 0, 16500, 0, 1, 1668008737, 4),
(11, '2022-11-09 22:46:00', 4, 7, 500, 0, 2500, 0, 1, 1668008826, 4),
(12, '2022-11-09 22:47:00', 3, 1, 150, 0, 2500, 0, 1, 1668008856, 4),
(13, '2022-11-09 22:48:00', 1, 8, 60, 0, 1500, 0, 1, 1668008921, 4),
(14, '2022-11-09 22:48:00', 4, 5, 25, 0, 17000, 0, 1, 1668008956, 4),
(15, '2022-11-09 22:59:00', 1, 2, 20, 0, 1500, 0, 2, 1668100186, 2),
(16, '2022-11-09 22:59:00', 4, 8, 500, 0, 1500, 0, 1, 1668009611, 4),
(18, '2022-11-10 10:21:00', 2, 2, 0, 30, 3000, 1643, 1, 1668050514, 4),
(19, '2022-11-10 10:24:00', 2, 2, 0, 150, 3000, 1643, 1, 1668056260, 4),
(20, '2022-11-11 17:15:00', 2, 1, 0, 3, 4000, 2500, 1, 1668161746, 4),
(21, '2022-11-12 23:21:00', 1, 7, 0, 10, 3000, 2500, 1, 1668270105, 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `contact_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `waktu`, `contact_id`, `product_id`, `harga`, `jumlah`, `user_id`, `date_created`, `status`) VALUES
(4, '2022-11-08 22:16:00', 3, 2, 1500, 40, 3, 1667920604, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(15) NOT NULL,
  `slogan` varchar(30) DEFAULT NULL,
  `address` varchar(160) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `brand_name`, `slogan`, `address`, `phone`) VALUES
(1, 'DURA.CO', 'Simple Web Base POS', 'Baleendah, Bandung, Jawa Barat 40375', '085186080992');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Aktif'),
(2, 'Void');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(160) NOT NULL,
  `password` varchar(360) NOT NULL,
  `role` int(11) NOT NULL,
  `date_reg` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `role`, `date_reg`, `last_login`, `status`) VALUES
(1, 'administrator', 'Administrator', '$2y$10$0Iie8oy9jk2LlNEoteNJAeK6iUXTPzjcdNA3xRuSaDnSL3qhphfG.', 1, 1667318937, 1667560535, 1),
(2, 'narayan', 'Narayan Sangkar', '$2y$10$Eg3bYVGkPltcJTo3nAfRFuDdK6aylH1ac5VhAjI2AV9ayG5S6/R5a', 2, 1667319811, 1668428724, 1),
(3, 'fendnugraha', 'Fend Nugraha', '$2y$10$ZhlNcvJTLB/560vIpgLY.eurzxq6yIk0IUNMy7vO73ab4gVibyHO.', 1, 1667321206, 1668351619, 1),
(4, 'alipcepmek', 'Kamu Nanya', '$2y$10$f2mRiRa9SFoB2fFGtdyv7ewBvq2eZn8yYSBmykZz70muXKUI5K0xi', 3, 1668007794, 1668429212, 1),
(5, 'affaantuh', 'Eh Brother', '$2y$10$q763tufP3J0u2V5rFrvMuO0HiMh.CpQBC/hDxQmW5DH7R919ydapq', 3, 1668352368, 1668352386, 1),
(6, 'gurugembul', 'baraya', '$2y$10$ceA.qEb2nTVFF4OGfBcmhuUuydFgPl18CexnU281agjY9pM7vauQa', 1, 1668352511, 1668430819, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Kasir'),
(3, 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_trace`
--
ALTER TABLE `product_trace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_trace`
--
ALTER TABLE `product_trace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
