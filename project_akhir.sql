-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 03:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `ID_Anggota` int(11) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `NIM` char(5) NOT NULL,
  `Jurusan` varchar(20) NOT NULL,
  `Angkatan` int(4) NOT NULL,
  `Alamat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`ID_Anggota`, `Nama`, `NIM`, `Jurusan`, `Angkatan`, `Alamat`) VALUES
(1, 'Ryan', '11111', 'Teknik Informatika', 2018, 'Jl. Raya Jatikerto'),
(2, 'Lamkhil', '11112', 'Teknik Komputer', 2019, 'Jl. Raya Madiun'),
(3, 'Alif', '11113', 'Sistem Informasi', 2016, 'Jl. Raya Polean');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID_Buku` int(11) NOT NULL,
  `Judul` varchar(20) NOT NULL,
  `Kode_Buku` char(5) NOT NULL,
  `Penulis` varchar(20) NOT NULL,
  `Penerbit` varchar(20) NOT NULL,
  `Tahun_Terbit` int(4) NOT NULL,
  `ID_Rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID_Buku`, `Judul`, `Kode_Buku`, `Penulis`, `Penerbit`, `Tahun_Terbit`, `ID_Rak`) VALUES
(1, 'English Grammar', '00001', 'Marsudi, S.Pd., M.M', 'KAWAHmedia', 2007, 3),
(2, '10 Kuliah Agama Isla', '00002', 'Dr. Adian Husaini ', 'Prou Media', 2003, 2),
(3, 'Komputasi Numerik', '00003', 'Suarga, Drs.,M.Sc.,M', 'Andi Publisher', 2017, 1),
(4, 'Jaringan Virtual', '00004', 'Akrom Musajid', 'Jasakom ', 2015, 4),
(5, 'Jaringan MESH', '00005', 'Onno W Purbo dan STK', 'Andi Publisher', 2013, 4),
(6, 'Bahasa Inggris Mudah', '00007', 'Sukma Kawindra', 'Diandra Primamitra ', 2014, 3),
(7, 'Top Tips & Trik : Op', '00008', 'Wahana Komputer', 'Andi Publisher ', 2012, 4),
(8, 'Liberalisasi Islam d', '00009', 'Dr. Adian Husaini', 'Gema Insani', 2016, 2),
(9, 'Everyday English Con', '00010', 'ACHMAD FANANI', 'NUSA CREATIVA ', 2015, 3),
(10, ' Algoritma Genetika ', '00011', 'Zainudin Zukhri', 'Andi Publisher ', 2014, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_Pegawai` int(11) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `NIP` char(5) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Alamat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`ID_Pegawai`, `Nama`, `NIP`, `Password`, `Alamat`) VALUES
(1, 'Pegawai1', '00001', 'PegawaiSatu', 'Jl. Raya Genengan'),
(2, 'Pegawai2', '00002', 'PegawaiDua', 'Jl. Bendungan Sutami');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID_Pinjam` int(11) NOT NULL,
  `Tgl_Pinjam` date NOT NULL,
  `Tgl_Hrs_Kembali` date NOT NULL,
  `ID_Anggota` int(11) NOT NULL,
  `ID_Pegawai` int(11) NOT NULL,
  `ID_Buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `ID_Kembali` int(11) NOT NULL,
  `Tgl_Kembali` date NOT NULL,
  `Tgl_JatuhTempo` date NOT NULL,
  `Denda` int(11) NOT NULL,
  `ID_Pinjam` int(11) NOT NULL,
  `ID_Pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rak_buku`
--

CREATE TABLE `rak_buku` (
  `ID_Rak` int(11) NOT NULL,
  `Nama_Rak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak_buku`
--

INSERT INTO `rak_buku` (`ID_Rak`, `Nama_Rak`) VALUES
(1, 'Matematika Komputasi'),
(2, 'Agama'),
(3, 'Bahasa Inggris'),
(4, 'Jaringan Komputer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID_Anggota`),
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_Buku`),
  ADD UNIQUE KEY `Kode_Buku` (`Kode_Buku`),
  ADD KEY `Buku_RakBuku` (`ID_Rak`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_Pegawai`),
  ADD UNIQUE KEY `NIP` (`NIP`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID_Pinjam`),
  ADD KEY `Pinjam_Buku` (`ID_Buku`),
  ADD KEY `Pinjam_Anggota` (`ID_Anggota`),
  ADD KEY `Pinjam_Pegawai` (`ID_Pegawai`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`ID_Kembali`),
  ADD KEY `Kembali_Pinjam` (`ID_Pinjam`),
  ADD KEY `Kembali_Pegawai` (`ID_Pegawai`);

--
-- Indexes for table `rak_buku`
--
ALTER TABLE `rak_buku`
  ADD PRIMARY KEY (`ID_Rak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `ID_Anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID_Buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `ID_Pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `ID_Pinjam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `ID_Kembali` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rak_buku`
--
ALTER TABLE `rak_buku`
  MODIFY `ID_Rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `Buku_RakBuku` FOREIGN KEY (`ID_Rak`) REFERENCES `rak_buku` (`ID_Rak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `Pinjam_Anggota` FOREIGN KEY (`ID_Anggota`) REFERENCES `anggota` (`ID_Anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pinjam_Buku` FOREIGN KEY (`ID_Buku`) REFERENCES `buku` (`ID_Buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pinjam_Pegawai` FOREIGN KEY (`ID_Pegawai`) REFERENCES `pegawai` (`ID_Pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `Kembali_Pegawai` FOREIGN KEY (`ID_Pegawai`) REFERENCES `pegawai` (`ID_Pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Kembali_Pinjam` FOREIGN KEY (`ID_Pinjam`) REFERENCES `peminjaman` (`ID_Pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
