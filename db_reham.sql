-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 09:44 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reham`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2fj9tfk1n3m9jvrjlbgpb9rlv5u3o706', '::1', 1680998460, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638303939383430363b69645f70656e6767756e617c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223031393230323361376262643733323530353136663036396466313862353030223b68616b5f616b7365737c733a353a2261646d696e223b),
('3iqm1kv2rmtr91cpirollg3kakddrrbs', '::1', 1680995152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638303939353135323b69645f70656e6767756e617c733a313a2231223b757365726e616d657c733a343a2275736572223b70617373776f72647c733a33323a226565313163626231393035326534306230376161633063613036306332336565223b68616b5f616b7365737c733a353a2261646d696e223b69645f70656c616e6767616e7c733a313a2237223b6e616d615f6c656e676b61707c733a343a2275736572223b6e6f5f746c707c733a31313a223039383031323339313233223b),
('8ci5sm51kntd3dlo8sjkc2v5ratndm1h', '::1', 1680995906, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638303939353930363b69645f70656e6767756e617c733a313a2232223b757365726e616d657c733a343a2275736572223b68616b5f616b7365737c733a373a226d616e61676572223b6c6f676765645f696e7c623a313b69645f70656c616e6767616e7c733a313a2237223b70617373776f72647c733a33323a226565313163626231393035326534306230376161633063613036306332336565223b6e616d615f6c656e676b61707c733a343a2275736572223b6e6f5f746c707c733a31313a223039383031323339313233223b),
('dc60e3f0rr10gageogftb72fntc1l6bu', '::1', 1680998406, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638303939383430363b),
('h12rmk7lu3mgtr9052p410nl897qt4i8', '::1', 1680996535, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638303939363533353b69645f70656c616e6767616e7c733a313a2237223b757365726e616d657c733a343a2275736572223b70617373776f72647c733a33323a226565313163626231393035326534306230376161633063613036306332336565223b6e616d615f6c656e676b61707c733a343a2275736572223b6e6f5f746c707c733a31313a223039383031323339313233223b68616b5f616b7365737c733a393a2270656c616e6767616e223b),
('jaiuksal3qec56jcjv3nue7v75pi7e59', '::1', 1680995550, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638303939353535303b69645f70656e6767756e617c733a313a2232223b757365726e616d657c733a343a2275736572223b68616b5f616b7365737c733a373a226d616e61676572223b6c6f676765645f696e7c623a313b69645f70656c616e6767616e7c733a313a2237223b70617373776f72647c733a33323a226565313163626231393035326534306230376161633063613036306332336565223b6e616d615f6c656e676b61707c733a343a2275736572223b6e6f5f746c707c733a31313a223039383031323339313233223b),
('uif7gnq65sovo4ajq4uaqbk975s2c008', '::1', 1680997451, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638303939373435313b69645f70656c616e6767616e7c733a313a2237223b757365726e616d657c733a343a2275736572223b70617373776f72647c733a33323a226565313163626231393035326534306230376161633063613036306332336565223b6e616d615f6c656e676b61707c733a343a2275736572223b6e6f5f746c707c733a31313a223039383031323339313233223b68616b5f616b7365737c733a393a2270656c616e6767616e223b);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `tanggal`, `jam`, `harga`, `created_at`) VALUES
(2, '0000-00-00', '00:00:09', '85000', '2023-03-28 20:27:40'),
(3, '0000-00-00', '00:00:12', '100000', '2023-03-28 20:27:41'),
(4, '0000-00-00', '00:00:15', '120000', '2023-03-28 20:27:41'),
(5, '0000-00-00', '00:00:17', '150000', '2023-03-28 20:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `t_bukti`
--

CREATE TABLE `t_bukti` (
  `id_bukti` varchar(10) NOT NULL,
  `id_sewa` varchar(10) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `bayar` varchar(10) NOT NULL,
  `tot_biaya` varchar(10) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` enum('DP','LUNAS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_bukti`
--

INSERT INTO `t_bukti` (`id_bukti`, `id_sewa`, `tgl_bayar`, `bayar`, `tot_biaya`, `bukti`, `status`) VALUES
('KM00001', 'RA300001', '2023-04-07 21:40:45', '50000', '85000', '1680896445.png', 'DP'),
('KM00002', 'RA200001', '2023-04-08 17:51:51', '50000', '85000', '1680969111.png', 'DP'),
('KM00003', 'RA100001', '2023-04-08 18:30:17', '85000', '85000', '1680971417right-arrow.png', 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jam` int(10) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_jam`
--

CREATE TABLE `t_jam` (
  `id_jam` int(10) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jam`
--

INSERT INTO `t_jam` (`id_jam`, `jam`, `harga`) VALUES
(1, '09.00 - 10.00\r\n', '85000'),
(2, '10.00 - 11.00\r\n', '85000'),
(3, '11.00 - 12.00', '85000'),
(4, '12.00 - 13.00', '100000'),
(5, '13.00 - 14.00', '100000'),
(6, '14.00 - 15.00', '100000'),
(7, '15.00 - 16.00', '120000'),
(8, '16.00 - 17.00', '120000'),
(9, '17.00 - 18.00', '150000'),
(10, '18.00 - 19.00', '150000'),
(11, '19.00 - 20.00', '150000'),
(12, '20.00 - 21.00', '150000'),
(13, '21.00 - 22.00', '150000'),
(14, '22.00 - 23.00', '150000'),
(15, '23.00 - 24.00', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `t_lapangan`
--

CREATE TABLE `t_lapangan` (
  `id_lapangan` varchar(1) NOT NULL,
  `nm_lapangan` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_lapangan`
--

INSERT INTO `t_lapangan` (`id_lapangan`, `nm_lapangan`, `foto`) VALUES
('A', 'Lapangan 1', '1680971605photo.png'),
('B', 'Lapangan 2', '1680058798.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `id_pelanggan` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` enum('pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `username`, `nama_lengkap`, `no_tlp`, `password`, `hak_akses`) VALUES
(7, 'user', 'user', '09801239123', 'ee11cbb19052e40b07aac0ca060c23ee', 'pelanggan'),
(8, 'usercoba', 'coba', '09801239123', 'ee11cbb19052e40b07aac0ca060c23ee', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengguna`
--

CREATE TABLE `t_pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` enum('admin','manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pengguna`
--

INSERT INTO `t_pengguna` (`id_pengguna`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'manager', '0795151defba7a4b5dfa89170de46277', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `t_sewa`
--

CREATE TABLE `t_sewa` (
  `id_sewa` varchar(10) NOT NULL,
  `id_pelanggan` int(8) NOT NULL,
  `id_lapangan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jam` int(10) NOT NULL,
  `status` enum('Belum Main','Sudah Main','Tidak Main') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sewa`
--

INSERT INTO `t_sewa` (`id_sewa`, `id_pelanggan`, `id_lapangan`, `tanggal`, `id_jam`, `status`) VALUES
('RA100001', 7, 'A', '2023-04-08', 1, 'Sudah Main'),
('RA200001', 7, 'A', '2023-04-08', 2, 'Belum Main'),
('RA300001', 7, 'A', '2023-04-08', 3, 'Sudah Main');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bukti`
--
ALTER TABLE `t_bukti`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jam`
--
ALTER TABLE `t_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `t_lapangan`
--
ALTER TABLE `t_lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `t_pengguna`
--
ALTER TABLE `t_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `t_sewa`
--
ALTER TABLE `t_sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jam`
--
ALTER TABLE `t_jam`
  MODIFY `id_jam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  MODIFY `id_pelanggan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_pengguna`
--
ALTER TABLE `t_pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
