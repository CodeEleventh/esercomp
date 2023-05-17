-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 04:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esercomp`
--

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `berkas` varchar(128) NOT NULL,
  `status_ajuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `user_id`, `jenis`, `berkas`, `status_ajuan`) VALUES
(1, 1, '', '786-Untitled.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `email` varchar(16) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` int(11) NOT NULL,
  `jenis` varchar(16) NOT NULL,
  `berkas` varchar(128) NOT NULL,
  `status_ajuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `hp`, `semester`, `ipk`, `jenis`, `berkas`, `status_ajuan`) VALUES
(1, 'test', 'test@gmail.com', '0822427194', 3, 3, '', '', 'Sudah diterima'),
(5, 'dassd', 'guest@richard.id', '082299334564', 1, 3, 'Akademik', '374-unnamed.jpg', 'belum di verifikasi'),
(6, 'nama saya', 'test@gmail.com', '0822427194', 4, 4, 'Akademik', '867-unnamed.jpg', 'belum di verifikasi'),
(7, 'test', 'admin@richard.id', '0822993345640808', 3, 3, 'Akademik', '997-unnamed.jpg', 'belum di verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `email` varchar(16) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `hp`, `semester`, `ipk`) VALUES
(1, '', '', '', 0, 0),
(2, 'tewt', 'shadowghostling@', '082299334564', 0, 0),
(3, 'tewt', 'shadowghostling@', '082299334564', 1, 0),
(4, 'tutu', 'shadonghostling@', '042764391', 4, 0),
(5, '', '', '', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
