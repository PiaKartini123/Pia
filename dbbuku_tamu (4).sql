-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 02:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbuku_`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE `tb_tamu` (
  `id` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `nope` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`id`, `tanggal`, `nama`, `alamat`, `tujuan`, `nope`) VALUES
(1, '2024-01-23', 'Andi Gunawan', 'kp.pamoyanan', 'Bertemu pak camat', 2147483647),
(2, '2024-01-24', 'pia kartini', 'kp.pamoyanan', 'membuat KK', 2147483647),
(3, '2024-01-28', 'Asep Irwan', 'gununghalu', 'membuat KTP', 2147483647),
(4, '2024-01-29', 'Risna Yulianti', 'Sukamanah', 'membuat KK', 2147483647),
(5, '2024-01-30', 'pia kartini', 'Sukamanah', 'membuat KK', 2147483647),
(6, '2024-01-31', 'pia kartini', 'kp.pamoyanan', 'membuat KK', 2147483647),
(7, '2024-02-05', 'Khansa Alfia Adelia', 'kp.pamoyanan', 'membuat KK', 2147483647),
(8, '2024-02-05', 'pia kartini', 'kp.pamoyanan', 'membuat KK', 2147483647),
(11, '2024-02-06', 'Keyla Humaira', 'Sukamanah', 'membuat KK', 2147483647),
(14, '2024-02-12', 'Asep Irwan', 'kp.pamoyanan', 'membuat KK', 2147483647),
(15, '2024-02-13', 'Keyla Humaira', 'gununghalu', 'membuat ', 2147483647),
(16, '2024-02-19', 'Asep Irwan', 'Sukamanah', 'membuat KTP', 2147483647),
(17, '2024-02-19', 'Keyla Humaira', 'gununghalu', 'membuat ', 2147483647),
(18, '2024-02-20', 'Ratna', 'Sukamanah', 'membuat ', 2147483647),
(20, '2024-02-21', 'pia kartini', 'kp.pamoyanan', 'membuat KK', 2147483647),
(21, '2024-03-04', 'Keyla Humaira', 'Sukaman', 'membuat KK', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(128) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password_hash`, `nama_pengguna`, `status`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'administrator', 'aktif'),
(2, 'piakartini', '827ccb0eea8a706c4c34a16891f84e7b', 'pia', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tamu`
--
ALTER TABLE `tb_tamu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
