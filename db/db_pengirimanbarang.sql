-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 07:46 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengirimanbarang`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_pengiriman`
-- (See below for the actual view)
--
CREATE TABLE `data_pengiriman` (
`nama_barang` varchar(50)
,`no_resi` varchar(50)
,`berat` int(20)
,`panjang` int(20)
,`dari_kota` varchar(50)
,`ke_kota` varchar(50)
,`nama_user` varchar(50)
,`tarif` int(50)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `no_resi` varchar(50) NOT NULL,
  `kd_user` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `berat` int(20) NOT NULL,
  `panjang` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kd_region` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`no_resi`, `kd_user`, `nama_barang`, `gambar`, `berat`, `panjang`, `keterangan`, `created_date`, `kd_region`, `status`) VALUES
('NBR0001', 'KSR0003', 'HUA', 'gendang.jpg', 5, 10, '<p>AAA</p>', '2018-04-21 13:43:41', 'REG0002', 'Delivered'),
('NBR0002', 'KSR0006', 'buku paket', '17 - 1hjh.jpg', 2, 20, '<p style=\"text-align: center;\"><strong>mudah sobek</strong></p>', '2018-04-26 07:44:06', 'REG0002', 'Delivered'),
('NBR0005', 'KSR0008', 'laptop', '1.PNG', 1, 30, '<p>jadh</p>', '2018-05-08 06:11:18', 'REG0002', 'Delivered'),
('NBR0006', 'KSR0008', 'Keyboard', '486px-Sudirman.jpg', 4, 10, '<p>Barang Baru</p>', '2018-05-10 12:21:46', 'REG0002', 'Delivered'),
('NBR0007', 'KSR0008', 'Sepatu Niki', 'images2.png', 1, 10, '<p>Barang Baru Nike HyperDunk</p>', '2018-05-11 06:06:17', 'REG0002', 'Delivered'),
('NBR0008', 'KSR0005', 'Keyboard', 'phytagoras4.jpg', 2, 8, '<p>aa</p>', '2018-05-11 07:54:35', 'REG0002', 'Not Delivered'),
('NBR0009', 'KSR0008', 'Es', 'abul wafa muhammad al-buzjani.jpg', 3, 10, '<p>beku</p>', '2018-05-13 11:30:07', 'REG0002', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `kd_kecamatan` int(20) NOT NULL,
  `kd_region` varchar(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`kd_kecamatan`, `kd_region`, `kecamatan`) VALUES
(317101, 'REG0001', 'Gambir'),
(317102, 'REG0001', 'Sawah Besar'),
(317103, 'REG0001', 'Kemayoran'),
(317104, 'REG0001', 'Senen'),
(317105, 'REG0001', 'Cempaka Putih'),
(317106, 'REG0001', 'Menteng'),
(317107, 'REG0001', 'Tanah Abang'),
(317108, 'REG0001', 'Johar Baru'),
(317201, 'REG0001', 'Penjaringan'),
(317202, 'REG0001', 'Tanjung Priok'),
(317203, 'REG0001', 'Koja'),
(317204, 'REG0001', 'Cilincing'),
(317205, 'REG0001', 'Pademangan'),
(317206, 'REG0001', 'Kelapa Gading'),
(317301, 'REG0001', 'Cengkareng'),
(317302, 'REG0001', 'Grogol Petamburan'),
(317303, 'REG0001', 'Taman Sari'),
(317304, 'REG0001', 'Tambora'),
(317305, 'REG0001', 'Kebon Jeruk'),
(317306, 'REG0001', 'Kalideres'),
(317307, 'REG0001', 'Pal Merah'),
(317308, 'REG0001', 'Kembangan'),
(317401, 'REG0001', 'Tebet'),
(317402, 'REG0001', 'Setiabudi'),
(317403, 'REG0001', 'Mampang Prapatan'),
(317404, 'REG0001', 'Pasar Minggu'),
(317405, 'REG0001', 'Kebayoran Lama'),
(317406, 'REG0001', 'Cilandak'),
(317407, 'REG0001', 'Kebayoran Baru'),
(317408, 'REG0001', 'Pancoran'),
(317409, 'REG0001', 'Jagakarsa'),
(317410, 'REG0001', 'Pesanggrahan'),
(317501, 'REG0001', 'Matraman'),
(317502, 'REG0001', 'Pulogadung'),
(317503, 'REG0001', 'Jatinegara'),
(317504, 'REG0001', 'Kramatjati'),
(317505, 'REG0001', 'Pasar Rebo'),
(317506, 'REG0001', 'Cakung'),
(317507, 'REG0001', 'Duren Sawit'),
(317508, 'REG0001', 'Makasar'),
(317509, 'REG0001', 'Ciracas'),
(317510, 'REG0001', 'Cipayung'),
(320101, 'REG0002', 'Cibinong'),
(320102, 'REG0002', 'Gunung Putri'),
(320103, 'REG0002', 'Citeureup'),
(320104, 'REG0002', 'Sukaraja'),
(320105, 'REG0002', 'Babakan Madang'),
(320106, 'REG0002', 'Jonggol'),
(320107, 'REG0002', 'Cileungsi'),
(320108, 'REG0002', 'Cariu'),
(320109, 'REG0002', 'Sukamakmur'),
(320110, 'REG0002', 'Parung'),
(320111, 'REG0002', 'Gunung Sindur'),
(320112, 'REG0002', 'Kemang'),
(320113, 'REG0002', 'Bojong Gede'),
(320114, 'REG0002', 'Leuwiliang'),
(320115, 'REG0002', 'Ciampea'),
(320116, 'REG0002', 'Cibungbulang'),
(320117, 'REG0002', 'Pamijahan'),
(320118, 'REG0002', 'Rumpin'),
(320119, 'REG0002', 'Jasinga'),
(320120, 'REG0002', 'Parung Panjang'),
(320121, 'REG0002', 'Nanggung'),
(320122, 'REG0002', 'Cigudeg'),
(320123, 'REG0002', 'Tenjo'),
(320124, 'REG0002', 'Ciawi'),
(320125, 'REG0002', 'Cisarua'),
(320126, 'REG0002', 'Megamendung'),
(320127, 'REG0002', 'Caringin'),
(320128, 'REG0002', 'Cijeruk'),
(320129, 'REG0002', 'Ciomas'),
(320130, 'REG0002', 'Dramaga'),
(320131, 'REG0002', 'Tamansari'),
(320132, 'REG0002', 'Klapanunggal'),
(320133, 'REG0002', 'Ciseeng'),
(320134, 'REG0002', 'Ranca Bungur'),
(320135, 'REG0002', 'Sukajaya'),
(320136, 'REG0002', 'Tanjungsari'),
(320137, 'REG0002', 'Tajurhalang'),
(320138, 'REG0002', 'Cigombong'),
(320139, 'REG0002', 'Leuwisadeng'),
(320140, 'REG0002', 'Tenjolaya'),
(327501, 'REG0004', 'Bekasi Timur'),
(327502, 'REG0004', 'Bekasi Barat'),
(327503, 'REG0004', 'Bekasi Utara'),
(327504, 'REG0004', 'Bekasi Selatan'),
(327505, 'REG0004', 'Rawa Lumbu'),
(327506, 'REG0004', 'Medan Satria'),
(327507, 'REG0004', 'Bantar Gebang'),
(327508, 'REG0004', 'Pondok Gede'),
(327509, 'REG0004', 'Jatiasih'),
(327510, 'REG0004', 'Jati Sempurna'),
(327511, 'REG0004', 'Mustika Jaya'),
(327512, 'REG0004', 'Pondok Melati'),
(327601, 'REG0003', 'Pancoran Mas'),
(327602, 'REG0003', 'Cimanggis'),
(327603, 'REG0003', 'Sawangan'),
(327604, 'REG0003', 'Limo'),
(327605, 'REG0003', 'Sukmajaya'),
(327606, 'REG0003', 'Beji'),
(327607, 'REG0003', 'Cipayung'),
(327608, 'REG0003', 'Cilodong'),
(327609, 'REG0003', 'Cinere'),
(327610, 'REG0003', 'Tapos'),
(327611, 'REG0003', 'Bojongsari'),
(367101, 'REG0005', 'Tangerang'),
(367102, 'REG0005', 'Jatiuwung'),
(367103, 'REG0005', 'Batuceper'),
(367104, 'REG0005', 'Benda'),
(367105, 'REG0005', 'Cipondoh'),
(367106, 'REG0005', 'Ciledug'),
(367107, 'REG0005', 'Karawaci'),
(367108, 'REG0005', 'Periuk'),
(367109, 'REG0005', 'Cibodas'),
(367110, 'REG0005', 'Neglasari'),
(367111, 'REG0005', 'Pinang'),
(367112, 'REG0005', 'Karang Tengah'),
(367113, 'REG0005', 'Larangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelurahan`
--

CREATE TABLE `tbl_kelurahan` (
  `kd_kelurahan` varchar(20) NOT NULL,
  `kd_kecamatan` int(20) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kd_region` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelurahan`
--

INSERT INTO `tbl_kelurahan` (`kd_kelurahan`, `kd_kecamatan`, `kelurahan`, `kd_region`) VALUES
('3171011001', 317101, 'Gambir', 'REG0001'),
('3171011002', 317101, 'Cideng', 'REG0001'),
('3171011003', 317101, 'Petojo Utara', 'REG0001'),
('3171011004', 317101, 'Petojo Selatan', 'REG0001'),
('3171011005', 317101, 'Kebon Kelapa', 'REG0001'),
('3171011006', 317101, 'Duri Pulo', 'REG0001'),
('3171021001', 317102, 'Pasar Baru', 'REG0001'),
('3171021002', 317102, 'Karang Anyar', 'REG0001'),
('3171021003', 317102, 'Kartini', 'REG0001'),
('3171021004', 317102, 'Gunung Sahari Utara', 'REG0001'),
('3171021005', 317102, 'Mangga Dua Selatan', 'REG0001'),
('3171031001', 317103, 'Kemayoran', 'REG0001'),
('3171031002', 317103, 'Kebon Kosong', 'REG0001'),
('3171031003', 317103, 'Harapan Mulia', 'REG0001'),
('3171031004', 317103, 'Serdang', 'REG0001'),
('3171031005', 317103, 'Gunung Sahari Selatan', 'REG0001'),
('3171031006', 317103, 'Cempaka Baru', 'REG0001'),
('3171031007', 317103, 'Sumur Batu', 'REG0001'),
('3171031008', 317103, 'Utan Panjang', 'REG0001'),
('3171041001', 317104, 'Senen', 'REG0001'),
('3171041002', 317104, 'Kenari', 'REG0001'),
('3171041003', 317104, 'Paseban', 'REG0001'),
('3171041004', 317104, 'Kramat', 'REG0001'),
('3171041005', 317104, 'Kwitang', 'REG0001'),
('3171041006', 317104, 'Bungur', 'REG0001'),
('3171051001', 317105, 'Cempaka Putih Timur', 'REG0001'),
('3171051002', 317105, 'Cempaka Putih Barat', 'REG0001'),
('3171051003', 317105, 'Rawasari', 'REG0001'),
('3171061001', 317106, 'Menteng', 'REG0001'),
('3171061002', 317106, 'Pegangsaan', 'REG0001'),
('3171061003', 317106, 'Cikini', 'REG0001'),
('3171061004', 317106, 'Gondangdia', 'REG0001'),
('3171061005', 317106, 'Kebon Sirih', 'REG0001'),
('3171071001', 317107, 'Gelora', 'REG0001'),
('3171071002', 317107, 'Bendungan Hilir', 'REG0001'),
('3171071003', 317107, 'Karet Tengsin', 'REG0001'),
('3171071004', 317107, 'Petamburan', 'REG0001'),
('3171071005', 317107, 'Kebon Melati', 'REG0001'),
('3171071006', 317107, 'Kebon Kacang', 'REG0001'),
('3171071007', 317107, 'Kampung Bali', 'REG0001'),
('3171081001', 317108, 'Johar Baru', 'REG0001'),
('3171081002', 317108, 'Kampung Rawa', 'REG0001'),
('3171081003', 317108, 'Galur', 'REG0001'),
('3171081004', 317108, 'Tanah Tinggi', 'REG0001'),
('3172011001', 317201, 'Penjaringan', 'REG0001'),
('3172011002', 317201, 'Kamal Muara', 'REG0001'),
('3172011003', 317201, 'Kapuk Muara', 'REG0001'),
('3172011004', 317201, 'Pejagalan', 'REG0001'),
('3172011005', 317201, 'Pluit', 'REG0001'),
('3172021001', 317202, 'Tanjung Priok', 'REG0001'),
('3172021002', 317202, 'Sunter Jaya', 'REG0001'),
('3172021003', 317202, 'Papanggo', 'REG0001'),
('3172021004', 317202, 'Sungai Bambu', 'REG0001'),
('3172021005', 317202, 'Kebon Bawang', 'REG0001'),
('3172021006', 317202, 'Sunter Agung', 'REG0001'),
('3172021007', 317202, 'Warakas', 'REG0001'),
('3172031001', 317203, 'Koja', 'REG0001'),
('3172031002', 317203, 'Tugu Utara', 'REG0001'),
('3172031003', 317203, 'Lagoa', 'REG0001'),
('3172031004', 317203, 'Rawa Badak Utara', 'REG0001'),
('3172031005', 317203, 'Tugu Selatan', 'REG0001'),
('3172031006', 317203, 'Rawa Badak Selatan', 'REG0001'),
('3172041001', 317204, 'Cilincing', 'REG0001'),
('3172041002', 317204, 'Sukapura', 'REG0001'),
('3172041003', 317204, 'Marunda', 'REG0001'),
('3172041004', 317204, 'Kalibaru', 'REG0001'),
('3172041005', 317204, 'Semper Timur', 'REG0001'),
('3172041006', 317204, 'Rorotan', 'REG0001'),
('3172041007', 317204, 'Semper Barat', 'REG0001'),
('3172051001', 317205, 'Pademangan Timur', 'REG0001'),
('3172051002', 317205, 'Pademangan Barat', 'REG0001'),
('3172051003', 317205, 'Ancol', 'REG0001'),
('3172061001', 317206, 'Kelapa Gading Timur', 'REG0001'),
('3172061002', 317206, 'Pegangsaan Dua', 'REG0001'),
('3172061003', 317206, 'Kelapa Gading Barat', 'REG0001'),
('3173011001', 317301, 'Cengkareng Barat', 'REG0001'),
('3173011002', 317301, 'Duri Kosambi', 'REG0001'),
('3173011003', 317301, 'Rawa Buaya', 'REG0001'),
('3173011004', 317301, 'Kedaung Kali Angke', 'REG0001'),
('3173011005', 317301, 'Kapuk', 'REG0001'),
('3173011006', 317301, 'Cengkareng Timur', 'REG0001'),
('3173021001', 317302, 'Grogol', 'REG0001'),
('3173021002', 317302, 'Tanjung Duren Utara', 'REG0001'),
('3173021003', 317302, 'Tomang', 'REG0001'),
('3173021004', 317302, 'Jelambar', 'REG0001'),
('3173021005', 317302, 'Tanjung Duren Selatan', 'REG0001'),
('3173021006', 317302, 'Jelambar Baru', 'REG0001'),
('3173021007', 317302, 'Wijaya Kusuma', 'REG0001'),
('3173031001', 317303, 'Taman Sari', 'REG0001'),
('3173031002', 317303, 'Krukut', 'REG0001'),
('3173031003', 317303, 'Maphar', 'REG0001'),
('3173031004', 317303, 'Tangki', 'REG0001'),
('3173031005', 317303, 'Mangga Besar', 'REG0001'),
('3173031006', 317303, 'Keagungan', 'REG0001'),
('3173031007', 317303, 'Glodok', 'REG0001'),
('3173031008', 317303, 'Pinangsia', 'REG0001'),
('3173041001', 317304, 'Tambora', 'REG0001'),
('3173041002', 317304, 'Kali Anyar', 'REG0001'),
('3173041003', 317304, 'Duri Utara', 'REG0001'),
('3173041004', 317304, 'Tanah Sereal', 'REG0001'),
('3173041005', 317304, 'Krendang', 'REG0001'),
('3173041006', 317304, 'Jembatan Besi', 'REG0001'),
('3173041007', 317304, 'Angke', 'REG0001'),
('3173041008', 317304, 'Jembatan Lima', 'REG0001'),
('3173041009', 317304, 'Pekojan', 'REG0001'),
('3173041010', 317304, 'Roa Malaka', 'REG0001'),
('3173041011', 317304, 'Duri Selatan', 'REG0001'),
('3173051001', 317305, 'Kebon Jeruk', 'REG0001'),
('3173051002', 317305, 'Sukabumi Utara', 'REG0001'),
('3173051003', 317305, 'Sukabumi Selatan', 'REG0001'),
('3173051004', 317305, 'Kelapa Dua', 'REG0001'),
('3173051005', 317305, 'Duri Kepa', 'REG0001'),
('3173051006', 317305, 'Kedoya Utara', 'REG0001'),
('3173051007', 317305, 'Kedoya Selatan', 'REG0001'),
('3173061001', 317306, 'Kalideres', 'REG0001'),
('3173061002', 317306, 'Semanan', 'REG0001'),
('3173061003', 317306, 'Tegal Alur', 'REG0001'),
('3173061004', 317306, 'Kamal', 'REG0001'),
('3173061005', 317306, 'Pegadungan', 'REG0001'),
('3173071001', 317307, 'Palmerah', 'REG0001'),
('3173071002', 317307, 'Slipi', 'REG0001'),
('3173071003', 317307, 'Kota Bambu Utara', 'REG0001'),
('3173071004', 317307, 'Jatipulo', 'REG0001'),
('3173071005', 317307, 'Kemanggisan', 'REG0001'),
('3173071006', 317307, 'Kota Bambu Selatan', 'REG0001'),
('3173081001', 317308, 'Kembangan Utara', 'REG0001'),
('3173081002', 317308, 'Meruya Utara', 'REG0001'),
('3173081003', 317308, 'Meruya Selatan', 'REG0001'),
('3173081004', 317308, 'Srengseng', 'REG0001'),
('3173081005', 317308, 'Joglo', 'REG0001'),
('3173081006', 317308, 'Kembangan Selatan', 'REG0001'),
('3174011001', 317401, 'Tebet Timur', 'REG0001'),
('3174011002', 317401, 'Tebet Barat', 'REG0001'),
('3174011003', 317401, 'Menteng Dalam', 'REG0001'),
('3174011004', 317401, 'Kebon Baru', 'REG0001'),
('3174011005', 317401, 'Bukit Duri', 'REG0001'),
('3174011006', 317401, 'Manggarai Selatan', 'REG0001'),
('3174011007', 317401, 'Manggarai', 'REG0001'),
('3174021001', 317402, 'Setia Budi', 'REG0001'),
('3174021002', 317402, 'Karet Semanggi', 'REG0001'),
('3174021003', 317402, 'Karet Kuningan', 'REG0001'),
('3174021004', 317402, 'Karet', 'REG0001'),
('3174021005', 317402, 'Menteng Atas', 'REG0001'),
('3174021006', 317402, 'Pasar Manggis', 'REG0001'),
('3174021007', 317402, 'Guntur', 'REG0001'),
('3174021008', 317402, 'Kuningan Timur', 'REG0001'),
('3174031001', 317403, 'Mampang Prapatan', 'REG0001'),
('3174031002', 317403, 'Bangka', 'REG0001'),
('3174031003', 317403, 'Pela Mampang', 'REG0001'),
('3174031004', 317403, 'Tegal Parang', 'REG0001'),
('3174031005', 317403, 'Kuningan Barat', 'REG0001'),
('3174041001', 317404, 'Pasar Minggu', 'REG0001'),
('3174041002', 317404, 'Jati Padang', 'REG0001'),
('3174041003', 317404, 'Cilandak Timur', 'REG0001'),
('3174041004', 317404, 'Ragunan', 'REG0001'),
('3174041005', 317404, 'Pejaten Timur', 'REG0001'),
('3174041006', 317404, 'Pejaten Barat', 'REG0001'),
('3174041007', 317404, 'Kebagusan', 'REG0001'),
('3174051001', 317405, 'Kebayoran Lama Utara', 'REG0001'),
('3174051002', 317405, 'Pondok Pinang', 'REG0001'),
('3174051003', 317405, 'Cipulir', 'REG0001'),
('3174051004', 317405, 'Grogol Utara', 'REG0001'),
('3174051005', 317405, 'Grogol Selatan', 'REG0001'),
('3174051006', 317405, 'Kebayoran Lama Selatan', 'REG0001'),
('3174061001', 317406, 'Cilandak Barat', 'REG0001'),
('3174061002', 317406, 'Lebak Bulus', 'REG0001'),
('3174061003', 317406, 'Pondok Labu', 'REG0001'),
('3174061004', 317406, 'Gandaria Selatan', 'REG0001'),
('3174061005', 317406, 'Cipete Selatan', 'REG0001'),
('3174071001', 317407, 'Melawai', 'REG0001'),
('3174071002', 317407, 'Gunung', 'REG0001'),
('3174071003', 317407, 'Kramat Pela', 'REG0001'),
('3174071004', 317407, 'Selong', 'REG0001'),
('3174071005', 317407, 'Rawa Barat', 'REG0001'),
('3174071006', 317407, 'Senayan', 'REG0001'),
('3174071007', 317407, 'Pulo', 'REG0001'),
('3174071008', 317407, 'Petogogan', 'REG0001'),
('3174071009', 317407, 'Gandaria Utara', 'REG0001'),
('3174071010', 317407, 'Cipete Utara', 'REG0001'),
('3174081001', 317408, 'Pancoran', 'REG0001'),
('3174081002', 317408, 'Kalibata', 'REG0001'),
('3174081003', 317408, 'Rawajati', 'REG0001'),
('3174081004', 317408, 'Duren Tiga', 'REG0001'),
('3174081005', 317408, 'Pengadegan', 'REG0001'),
('3174081006', 317408, 'Cikoko', 'REG0001'),
('3174091001', 317409, 'Jagakarsa', 'REG0001'),
('3174091002', 317409, 'Srengseng Sawah', 'REG0001'),
('3174091003', 317409, 'Ciganjur', 'REG0001'),
('3174091004', 317409, 'Lenteng Agung', 'REG0001'),
('3174091005', 317409, 'Tanjung Barat', 'REG0001'),
('3174091006', 317409, 'Cipedak', 'REG0001'),
('3174101001', 317410, 'Pesanggrahan', 'REG0001'),
('3174101002', 317410, 'Bintaro', 'REG0001'),
('3174101003', 317410, 'Petukangan Utara', 'REG0001'),
('3174101004', 317410, 'Petukangan Selatan', 'REG0001'),
('3174101005', 317410, 'Ulujami', 'REG0001'),
('3175011001', 317501, 'Pisangan Baru', 'REG0001'),
('3175011002', 317501, 'Utan Kayu Utara', 'REG0001'),
('3175011003', 317501, 'Kayu Manis', 'REG0001'),
('3175011004', 317501, 'Palmeriam', 'REG0001'),
('3175011005', 317501, 'Kebon Manggis', 'REG0001'),
('3175011006', 317501, 'Utan Kayu Selatan', 'REG0001'),
('3175021001', 317502, 'Pulo Gadung', 'REG0001'),
('3175021002', 317502, 'Pisangan Timur', 'REG0001'),
('3175021003', 317502, 'Cipinang', 'REG0001'),
('3175021004', 317502, 'Jatinegara Kaum', 'REG0001'),
('3175021005', 317502, 'Rawamangun', 'REG0001'),
('3175021006', 317502, 'Kayu Putih', 'REG0001'),
('3175021007', 317502, 'Jati', 'REG0001'),
('3175031001', 317503, 'Kampung Melayu', 'REG0001'),
('3175031002', 317503, 'Bidara Cina', 'REG0001'),
('3175031003', 317503, 'Bali Mester', 'REG0001'),
('3175031004', 317503, 'Rawa Bunga', 'REG0001'),
('3175031005', 317503, 'Cipinang Cempedak', 'REG0001'),
('3175031006', 317503, 'Cipinang Muara', 'REG0001'),
('3175031007', 317503, 'Cipinang Besar Selatan', 'REG0001'),
('3175031008', 317503, 'Cipinang Besar Utara', 'REG0001'),
('3175041001', 317504, 'Kramatjati', 'REG0001'),
('3175041002', 317504, 'Tengah', 'REG0001'),
('3175041003', 317504, 'Dukuh', 'REG0001'),
('3175041004', 317504, 'Batu Ampar', 'REG0001'),
('3175041005', 317504, 'Balekambang', 'REG0001'),
('3175041006', 317504, 'Cililitan', 'REG0001'),
('3175041007', 317504, 'Cawang', 'REG0001'),
('3175051001', 317505, 'Gedong', 'REG0001'),
('3175051002', 317505, 'Baru', 'REG0001'),
('3175051003', 317505, 'Cijantung', 'REG0001'),
('3175051004', 317505, 'Kalisari', 'REG0001'),
('3175051005', 317505, 'Pekayon', 'REG0001'),
('3175061001', 317506, 'Jatinegara', 'REG0001'),
('3175061002', 317506, 'Rawa Terate', 'REG0001'),
('3175061003', 317506, 'Penggilingan', 'REG0001'),
('3175061004', 317506, 'Cakung Timur', 'REG0001'),
('3175061005', 317506, 'Pulo Gebang', 'REG0001'),
('3175061006', 317506, 'Ujung Menteng', 'REG0001'),
('3175061007', 317506, 'Cakung Barat', 'REG0001'),
('3175071001', 317507, 'Duren Sawit', 'REG0001'),
('3175071002', 317507, 'Pondok Bambu', 'REG0001'),
('3175071003', 317507, 'Klender', 'REG0001'),
('3175071004', 317507, 'Pondok Kelapa', 'REG0001'),
('3175071005', 317507, 'Malaka Sari', 'REG0001'),
('3175071006', 317507, 'Malaka Jaya', 'REG0001'),
('3175071007', 317507, 'Pondok Kopi', 'REG0001'),
('3175081001', 317508, 'Makasar', 'REG0001'),
('3175081002', 317508, 'Pinangranti', 'REG0001'),
('3175081003', 317508, 'Kebon Pala', 'REG0001'),
('3175081004', 317508, 'Halim Perdana Kusuma', 'REG0001'),
('3175081005', 317508, 'Cipinang Melayu', 'REG0001'),
('3175091001', 317509, 'Ciracas', 'REG0001'),
('3175091002', 317509, 'Cibubur', 'REG0001'),
('3175091003', 317509, 'Kelapa Dua Wetan', 'REG0001'),
('3175091004', 317509, 'Susukan', 'REG0001'),
('3175091005', 317509, 'Rambutan', 'REG0001'),
('3175101001', 317510, 'Cipayung', 'REG0001'),
('3175101002', 317510, 'Cilangkap', 'REG0001'),
('3175101003', 317510, 'Pondok Ranggon', 'REG0001'),
('3175101004', 317510, 'Munjul', 'REG0001'),
('3175101005', 317510, 'Setu', 'REG0001'),
('3175101006', 317510, 'Bambu Apus', 'REG0001'),
('3175101007', 317510, 'Lubang Buaya', 'REG0001'),
('3175101008', 317510, 'Ceger', 'REG0001'),
('3201011001', 320101, 'Pondok Rajeg', 'REG0002'),
('3201011002', 320101, 'Karadenan', 'REG0002'),
('3201011003', 320101, 'Harapanjaya', 'REG0002'),
('3201011004', 320101, 'Nanggewer', 'REG0002'),
('3201011005', 320101, 'Nanggewer Mekar', 'REG0002'),
('3201011006', 320101, 'Cibinong', 'REG0002'),
('3201011007', 320101, 'Pakansari', 'REG0002'),
('3201011008', 320101, 'Tengah', 'REG0002'),
('3201011009', 320101, 'Sukahati', 'REG0002'),
('3201011010', 320101, 'Ciriung', 'REG0002'),
('3201011011', 320101, 'Cirimekar', 'REG0002'),
('3201011012', 320101, 'Pabuaran', 'REG0002'),
('3201022001', 320102, 'Wanaherang', 'REG0002'),
('3201022002', 320102, 'Bojong Kulur', 'REG0002'),
('3201022003', 320102, 'Ciangsana', 'REG0002'),
('3201022004', 320102, 'Gunung Putri', 'REG0002'),
('3201022005', 320102, 'Bojong Nangka', 'REG0002'),
('3201022006', 320102, 'Tlajung Udik', 'REG0002'),
('3201022007', 320102, 'Cicadas', 'REG0002'),
('3201022008', 320102, 'Cikeas Udik', 'REG0002'),
('3201022009', 320102, 'Nagrak', 'REG0002'),
('3201022010', 320102, 'Karanggan', 'REG0002'),
('3201031006', 320103, 'Puspanegara', 'REG0002'),
('3201031007', 320103, 'Karang Asem Barat', 'REG0002'),
('3201032001', 320103, 'Puspasari', 'REG0002'),
('3201032002', 320103, 'Citeureup', 'REG0002'),
('3201032003', 320103, 'Leuwinutung', 'REG0002'),
('3201032004', 320103, 'Tajur', 'REG0002'),
('3201032005', 320103, 'Sanja', 'REG0002'),
('3201032008', 320103, 'Karang Asem Timur', 'REG0002'),
('3201032009', 320103, 'Tarikolot', 'REG0002'),
('3201032010', 320103, 'Gunungsari', 'REG0002'),
('3201032011', 320103, 'Tangkil', 'REG0002'),
('3201032012', 320103, 'Sukahati', 'REG0002'),
('3201032013', 320103, 'Hambalang', 'REG0002'),
('3201032014', 320103, 'Pasir Mukti', 'REG0002'),
('3201042001', 320104, 'Gununggeulis', 'REG0002'),
('3201042002', 320104, 'Cilebut Timur', 'REG0002'),
('3201042003', 320104, 'Cilebut Barat', 'REG0002'),
('3201042004', 320104, 'Cibanon', 'REG0002'),
('3201042005', 320104, 'Nagrak', 'REG0002'),
('3201042006', 320104, 'Sukatani', 'REG0002'),
('3201042007', 320104, 'Sukaraja', 'REG0002'),
('3201042008', 320104, 'Cikeas', 'REG0002'),
('3201042009', 320104, 'Pasir Jambu', 'REG0002'),
('3201042010', 320104, 'Cimandala', 'REG0002'),
('3201042011', 320104, 'Cijujung', 'REG0002'),
('3201042012', 320104, 'Cadasngampar', 'REG0002'),
('3201042013', 320104, 'Pasirlaya', 'REG0002'),
('3201052001', 320105, 'Cijayanti', 'REG0002'),
('3201052002', 320105, 'Sumurbatu', 'REG0002'),
('3201052003', 320105, 'Sentul', 'REG0002'),
('3201052004', 320105, 'Karang Tengah', 'REG0002'),
('3201052005', 320105, 'Cipambuan', 'REG0002'),
('3201052006', 320105, 'Kadumanggu', 'REG0002'),
('3201052007', 320105, 'Citaringgul', 'REG0002'),
('3201052008', 320105, 'Babakan Madang', 'REG0002'),
('3201052009', 320105, 'Bojong Koneng', 'REG0002'),
('3201062001', 320106, 'Sukamaju', 'REG0002'),
('3201062002', 320106, 'Sirnagalih', 'REG0002'),
('3201062003', 320106, 'Singa Jaya', 'REG0002'),
('3201062004', 320106, 'Sukasirna', 'REG0002'),
('3201062005', 320106, 'Sukanegara', 'REG0002'),
('3201062006', 320106, 'Sukamanah', 'REG0002'),
('3201062007', 320106, 'Weninggalih', 'REG0002'),
('3201062008', 320106, 'Cibodas', 'REG0002'),
('3201062009', 320106, 'Jonggol', 'REG0002'),
('3201062010', 320106, 'Bendungan', 'REG0002'),
('3201062011', 320106, 'Singasari', 'REG0002'),
('3201062012', 320106, 'Balekambang', 'REG0002'),
('3201062013', 320106, 'Sukajaya', 'REG0002'),
('3201062014', 320106, 'Sukagalih', 'REG0002'),
('3201072001', 320107, 'Pasirangin', 'REG0002'),
('3201072002', 320107, 'Mekarsari', 'REG0002'),
('3201072003', 320107, 'Mampir', 'REG0002'),
('3201072004', 320107, 'Dayeuh', 'REG0002'),
('3201072005', 320107, 'Gandoang', 'REG0002'),
('3201072006', 320107, 'Jatisari', 'REG0002'),
('3201072007', 320107, 'Cileungsi Kidul', 'REG0002'),
('3201072008', 320107, 'Cipeucang', 'REG0002'),
('3201072009', 320107, 'Situsari', 'REG0002'),
('3201072010', 320107, 'Cipenjo', 'REG0002'),
('3201072011', 320107, 'Limusnunggal', 'REG0002'),
('3201072012', 320107, 'Cileungsi', 'REG0002'),
('3201082001', 320108, 'Karyamekar', 'REG0002'),
('3201082002', 320108, 'Babakan Raden', 'REG0002'),
('3201082003', 320108, 'Cikutamahi', 'REG0002'),
('3201082004', 320108, 'Kutamekar', 'REG0002'),
('3201082005', 320108, 'Cariu', 'REG0002'),
('3201082006', 320108, 'Mekarwangi', 'REG0002'),
('3201082007', 320108, 'Bantarkuning', 'REG0002'),
('3201082008', 320108, 'Sukajadi', 'REG0002'),
('3201082009', 320108, 'Tegalpanjang', 'REG0002'),
('3201082010', 320108, 'Cibatutiga', 'REG0002'),
('3201092001', 320109, 'Wargajaya', 'REG0002'),
('3201092002', 320109, 'Pabuaran', 'REG0002'),
('3201092003', 320109, 'Sukadamai', 'REG0002'),
('3201092004', 320109, 'Sukawangi', 'REG0002'),
('3201092005', 320109, 'Cibadak', 'REG0002'),
('3201092006', 320109, 'Sukaresmi', 'REG0002'),
('3201092007', 320109, 'Sukamulya', 'REG0002'),
('3201092008', 320109, 'Sukaharja', 'REG0002'),
('3201092009', 320109, 'Sirnajaya', 'REG0002'),
('3201092010', 320109, 'Sukamakmur', 'REG0002'),
('3201102001', 320110, 'Parung', 'REG0002'),
('3201102002', 320110, 'Iwul', 'REG0002'),
('3201102003', 320110, 'Bojongsempu', 'REG0002'),
('3201102004', 320110, 'Waru', 'REG0002'),
('3201102005', 320110, 'Cogreg', 'REG0002'),
('3201102006', 320110, 'Pamegarsari', 'REG0002'),
('3201102007', 320110, 'Warujaya', 'REG0002'),
('3201102008', 320110, 'Bojongindah', 'REG0002'),
('3201102009', 320110, 'Jabonmekar', 'REG0002'),
('3201112001', 320111, 'Cidokom', 'REG0002'),
('3201112002', 320111, 'Padurenan', 'REG0002'),
('3201112003', 320111, 'Pengasinan', 'REG0002'),
('3201112004', 320111, 'Curug', 'REG0002'),
('3201112005', 320111, 'Gunungsindur', 'REG0002'),
('3201112006', 320111, 'Jampang', 'REG0002'),
('3201112007', 320111, 'Cibadung', 'REG0002'),
('3201112008', 320111, 'Cibinong', 'REG0002'),
('3201112009', 320111, 'Rawakalong', 'REG0002'),
('3201112010', 320111, 'Pabuaran', 'REG0002'),
('3201121006', 320112, 'Atang Senjaya', 'REG0002'),
('3201122001', 320112, 'Bojong', 'REG0002'),
('3201122002', 320112, 'Parakanjaya', 'REG0002'),
('3201122003', 320112, 'Kemang', 'REG0002'),
('3201122004', 320112, 'Pabuaran', 'REG0002'),
('3201122005', 320112, 'Semplak Barat', 'REG0002'),
('3201122007', 320112, 'Jampang', 'REG0002'),
('3201122008', 320112, 'Pondok Udik', 'REG0002'),
('3201122009', 320112, 'Tegal', 'REG0002'),
('3201132001', 320113, 'Bojongbaru', 'REG0002'),
('3201132002', 320113, 'Cimanggis', 'REG0002'),
('3201132003', 320113, 'Susukan', 'REG0002'),
('3201132004', 320113, 'Ragajaya', 'REG0002'),
('3201132005', 320113, 'Kedungwaringin', 'REG0002'),
('3201132006', 320113, 'Waringinjaya', 'REG0002'),
('3201132007', 320113, 'Pabuaran', 'REG0002'),
('3201132008', 320113, 'Rawapanjang', 'REG0002'),
('3201132009', 320113, 'Bojonggede', 'REG0002'),
('3201142001', 320114, 'Leuwiliang', 'REG0002'),
('3201142002', 320114, 'Purasari', 'REG0002'),
('3201142003', 320114, 'Karyasari', 'REG0002'),
('3201142004', 320114, 'Pabangbon', 'REG0002'),
('3201142005', 320114, 'Karacak', 'REG0002'),
('3201142006', 320114, 'Barengkok', 'REG0002'),
('3201142007', 320114, 'Leuwimekar', 'REG0002'),
('3201142008', 320114, 'Puraseda', 'REG0002'),
('3201142009', 320114, 'Cibeber I', 'REG0002'),
('3201142010', 320114, 'Cibeber II', 'REG0002'),
('3201142011', 320114, 'Karehkel', 'REG0002'),
('3201152001', 320115, 'Ciampea', 'REG0002'),
('3201152002', 320115, 'Cinangka', 'REG0002'),
('3201152003', 320115, 'Cihideungudik', 'REG0002'),
('3201152004', 320115, 'Bojongjengkol', 'REG0002'),
('3201152005', 320115, 'Tegalwaru', 'REG0002'),
('3201152006', 320115, 'Cibuntu', 'REG0002'),
('3201152007', 320115, 'Cicadas', 'REG0002'),
('3201152008', 320115, 'Cibadak', 'REG0002'),
('3201152009', 320115, 'Bojongrangkas', 'REG0002'),
('3201152010', 320115, 'Cihideunghilir', 'REG0002'),
('3201152011', 320115, 'Cibanteng', 'REG0002'),
('3201152012', 320115, 'Benteng', 'REG0002'),
('3201152013', 320115, 'Ciampea Udik', 'REG0002'),
('3201162001', 320116, 'Situ Udik', 'REG0002'),
('3201162002', 320116, 'Situ Ilir', 'REG0002'),
('3201162003', 320116, 'Cemplang', 'REG0002'),
('3201162004', 320116, 'Cibatok I', 'REG0002'),
('3201162005', 320116, 'Ciaruteun Udik', 'REG0002'),
('3201162006', 320116, 'Leuwi Kolot', 'REG0002'),
('3201162007', 320116, 'Cimanggu I', 'REG0002'),
('3201162008', 320116, 'Cimanggu II', 'REG0002'),
('3201162009', 320116, 'Dukuh', 'REG0002'),
('3201162010', 320116, 'Cijujung', 'REG0002'),
('3201162011', 320116, 'Ciaruteun Ilir', 'REG0002'),
('3201162012', 320116, 'Cibatok II', 'REG0002'),
('3201162013', 320116, 'Sukamaju', 'REG0002'),
('3201162014', 320116, 'Galuga', 'REG0002'),
('3201162015', 320116, 'Girimulya', 'REG0002'),
('3201172001', 320117, 'Purwabakti', 'REG0002'),
('3201172002', 320117, 'Cibunian', 'REG0002'),
('3201172003', 320117, 'Cibitungwetan', 'REG0002'),
('3201172004', 320117, 'Gunungmenyan', 'REG0002'),
('3201172005', 320117, 'Gunungbunder II', 'REG0002'),
('3201172006', 320117, 'Pasarean', 'REG0002'),
('3201172007', 320117, 'Cimayang', 'REG0002'),
('3201172008', 320117, 'Pamijahan', 'REG0002'),
('3201172009', 320117, 'Cibening', 'REG0002'),
('3201172010', 320117, 'Gunungbunder I', 'REG0002'),
('3201172011', 320117, 'Cibitung Kulon', 'REG0002'),
('3201172012', 320117, 'Gunung Picung', 'REG0002'),
('3201172013', 320117, 'Ciasihan', 'REG0002'),
('3201172014', 320117, 'Gunungsari', 'REG0002'),
('3201172015', 320117, 'Ciasmara', 'REG0002'),
('3201182001', 320118, 'Rumpin', 'REG0002'),
('3201182002', 320118, 'Leuwibatu', 'REG0002'),
('3201182003', 320118, 'Cidokom', 'REG0002'),
('3201182004', 320118, 'Gobang', 'REG0002'),
('3201182005', 320118, 'Cibodas', 'REG0002'),
('3201182006', 320118, 'Rabak', 'REG0002'),
('3201182007', 320118, 'Kampungsawah', 'REG0002'),
('3201182008', 320118, 'Cipinang', 'REG0002'),
('3201182009', 320118, 'Sukasari', 'REG0002'),
('3201182010', 320118, 'Tamansari', 'REG0002'),
('3201182011', 320118, 'Kertajaya', 'REG0002'),
('3201182012', 320118, 'Sukamulya', 'REG0002'),
('3201182013', 320118, 'Mekarsari', 'REG0002'),
('3201182014', 320118, 'Mekarjaya', 'REG0002'),
('3201192001', 320119, 'Curug', 'REG0002'),
('3201192002', 320119, 'Pangradin', 'REG0002'),
('3201192003', 320119, 'Kalongsawah', 'REG0002'),
('3201192004', 320119, 'Sipak', 'REG0002'),
('3201192005', 320119, 'Jasinga', 'REG0002'),
('3201192006', 320119, 'Koleang', 'REG0002'),
('3201192007', 320119, 'Cikopomayak', 'REG0002'),
('3201192008', 320119, 'Setu', 'REG0002'),
('3201192009', 320119, 'Barengkok', 'REG0002'),
('3201192010', 320119, 'Bagoang', 'REG0002'),
('3201192011', 320119, 'Pangaur', 'REG0002'),
('3201192012', 320119, 'Pamagersari', 'REG0002'),
('3201192013', 320119, 'Jugala Jaya', 'REG0002'),
('3201192014', 320119, 'Tegalwangi', 'REG0002'),
('3201192015', 320119, 'Neglasari', 'REG0002'),
('3201192016', 320119, 'Wirajaya', 'REG0002'),
('3201202001', 320120, 'Jagabaya', 'REG0002'),
('3201202002', 320120, 'Gorowong', 'REG0002'),
('3201202003', 320120, 'Dago', 'REG0002'),
('3201202004', 320120, 'Pingku', 'REG0002'),
('3201202005', 320120, 'Cikuda', 'REG0002'),
('3201202006', 320120, 'Parungpanjang', 'REG0002'),
('3201202007', 320120, 'Lumpang', 'REG0002'),
('3201202008', 320120, 'Cibunar', 'REG0002'),
('3201202009', 320120, 'Jagabita', 'REG0002'),
('3201202010', 320120, 'Gintungcilejet', 'REG0002'),
('3201202011', 320120, 'Kabasiran', 'REG0002'),
('3201212001', 320121, 'Malasari', 'REG0002'),
('3201212002', 320121, 'Curugbitung', 'REG0002'),
('3201212003', 320121, 'Cisarua', 'REG0002'),
('3201212004', 320121, 'Bantarkaret', 'REG0002'),
('3201212005', 320121, 'Hambaro', 'REG0002'),
('3201212006', 320121, 'Kalongliud', 'REG0002'),
('3201212007', 320121, 'Nanggung', 'REG0002'),
('3201212008', 320121, 'Parakanmuncang', 'REG0002'),
('3201212009', 320121, 'Pangkaljaya', 'REG0002'),
('3201212010', 320121, 'Sukaluyu', 'REG0002'),
('3201212011', 320121, 'Batu Tulis', 'REG0002'),
('3201222001', 320122, 'Sukamaju', 'REG0002'),
('3201222002', 320122, 'Cigudeg', 'REG0002'),
('3201222003', 320122, 'Bunar', 'REG0002'),
('3201222004', 320122, 'Banyuresmi', 'REG0002'),
('3201222005', 320122, 'Cintamanik', 'REG0002'),
('3201222006', 320122, 'Argapura', 'REG0002'),
('3201222007', 320122, 'Bangunjaya', 'REG0002'),
('3201222008', 320122, 'Rengasjajar', 'REG0002'),
('3201222009', 320122, 'Batujajar', 'REG0002'),
('3201222010', 320122, 'Wargajaya', 'REG0002'),
('3201222011', 320122, 'Sukaraksa', 'REG0002'),
('3201222012', 320122, 'Banyuwangi', 'REG0002'),
('3201222013', 320122, 'Banyuasih', 'REG0002'),
('3201222014', 320122, 'Mekarjaya', 'REG0002'),
('3201222015', 320122, 'Tegalega', 'REG0002'),
('3201232001', 320123, 'Tapos', 'REG0002'),
('3201232002', 320123, 'Ciomas', 'REG0002'),
('3201232003', 320123, 'Batok', 'REG0002'),
('3201232004', 320123, 'Babakan', 'REG0002'),
('3201232005', 320123, 'Tenjo', 'REG0002'),
('3201232006', 320123, 'Cilaku', 'REG0002'),
('3201232007', 320123, 'Singabraja', 'REG0002'),
('3201232008', 320123, 'Singabangsa', 'REG0002'),
('3201232009', 320123, 'Bojong', 'REG0002'),
('3201242001', 320124, 'Cileungsi', 'REG0002'),
('3201242002', 320124, 'Citapen', 'REG0002'),
('3201242003', 320124, 'Cibedug', 'REG0002'),
('3201242004', 320124, 'Jambuluwuk', 'REG0002'),
('3201242005', 320124, 'Bantarsari', 'REG0002'),
('3201242006', 320124, 'Telukpinang', 'REG0002'),
('3201242007', 320124, 'Banjar Waru', 'REG0002'),
('3201242008', 320124, 'Bendungan', 'REG0002'),
('3201242009', 320124, 'Pandan Sari', 'REG0002'),
('3201242010', 320124, 'Bojong Murni', 'REG0002'),
('3201242011', 320124, 'Banjar Wangi', 'REG0002'),
('3201242012', 320124, 'Ciawi', 'REG0002'),
('3201242013', 320124, 'Bitungsari', 'REG0002'),
('3201251010', 320125, 'Cisarua', 'REG0002'),
('3201252001', 320125, 'Batulayang', 'REG0002'),
('3201252002', 320125, 'Jogjogan', 'REG0002'),
('3201252003', 320125, 'Cibeureum', 'REG0002'),
('3201252004', 320125, 'Cilember', 'REG0002'),
('3201252005', 320125, 'Citeko', 'REG0002'),
('3201252006', 320125, 'Tugu Selatan', 'REG0002'),
('3201252007', 320125, 'Leuwimalang', 'REG0002'),
('3201252008', 320125, 'Kopo', 'REG0002'),
('3201252009', 320125, 'Tugu Utara', 'REG0002'),
('3201262001', 320126, 'Sukamaju', 'REG0002'),
('3201262002', 320126, 'Kuta', 'REG0002'),
('3201262003', 320126, 'Gadog', 'REG0002'),
('3201262004', 320126, 'Sukakarya', 'REG0002'),
('3201262005', 320126, 'Megamendung', 'REG0002'),
('3201262006', 320126, 'Cipayung Datar', 'REG0002'),
('3201262007', 320126, 'Sukamanah', 'REG0002'),
('3201262008', 320126, 'Sukagalih', 'REG0002'),
('3201262009', 320126, 'Cipayung Girang', 'REG0002'),
('3201262010', 320126, 'Sukamahi', 'REG0002'),
('3201262011', 320126, 'Sukaresmi', 'REG0002'),
('3201262012', 320126, 'Pasir Angin', 'REG0002'),
('3201272001', 320127, 'Pasir Muncang', 'REG0002'),
('3201272002', 320127, 'Cimande Hilir', 'REG0002'),
('3201272003', 320127, 'Ciderum', 'REG0002'),
('3201272004', 320127, 'Caringin', 'REG0002'),
('3201272005', 320127, 'Ciherang Pondok', 'REG0002'),
('3201272006', 320127, 'Cinagara', 'REG0002'),
('3201272007', 320127, 'Cimande', 'REG0002'),
('3201272008', 320127, 'Pancawati', 'REG0002'),
('3201272009', 320127, 'Muarajaya', 'REG0002'),
('3201272010', 320127, 'Basir Buncir', 'REG0002'),
('3201272011', 320127, 'Lemah Duhur', 'REG0002'),
('3201272012', 320127, 'Tangkil', 'REG0002'),
('3201282001', 320128, 'Cijeruk', 'REG0002'),
('3201282002', 320128, 'Cipelang', 'REG0002'),
('3201282003', 320128, 'Warung Menteng', 'REG0002'),
('3201282004', 320128, 'Tajur Halang', 'REG0002'),
('3201282005', 320128, 'Cipicung', 'REG0002'),
('3201282006', 320128, 'Cibalung', 'REG0002'),
('3201282007', 320128, 'Sukaharja', 'REG0002'),
('3201282008', 320128, 'Palasari', 'REG0002'),
('3201282009', 320128, 'Tanjungsari', 'REG0002'),
('3201291003', 320129, 'Padasuka', 'REG0002'),
('3201292001', 320129, 'Mekarjaya', 'REG0002'),
('3201292002', 320129, 'Sukaharja', 'REG0002'),
('3201292004', 320129, 'Parakan', 'REG0002'),
('3201292005', 320129, 'Ciomas', 'REG0002'),
('3201292006', 320129, 'Pagelaran', 'REG0002'),
('3201292007', 320129, 'Sukamakmur', 'REG0002'),
('3201292008', 320129, 'Ciapaus', 'REG0002'),
('3201292009', 320129, 'Kota Batu', 'REG0002'),
('3201292010', 320129, 'Laladon', 'REG0002'),
('3201292011', 320129, 'Ciomas Rahayu', 'REG0002'),
('3201302001', 320130, 'Sukadamai', 'REG0002'),
('3201302002', 320130, 'Ciherang', 'REG0002'),
('3201302003', 320130, 'Sinarsari', 'REG0002'),
('3201302004', 320130, 'Sukawening', 'REG0002'),
('3201302005', 320130, 'Petir', 'REG0002'),
('3201302006', 320130, 'Purwasari', 'REG0002'),
('3201302007', 320130, 'Cikarawang', 'REG0002'),
('3201302008', 320130, 'Babakan', 'REG0002'),
('3201302009', 320130, 'Dramaga', 'REG0002'),
('3201302010', 320130, 'Neglasari', 'REG0002'),
('3201312001', 320131, 'Sukamantri', 'REG0002'),
('3201312002', 320131, 'Sinargalih', 'REG0002'),
('3201312003', 320131, 'Pasireurih', 'REG0002'),
('3201312004', 320131, 'Tamansari', 'REG0002'),
('3201312005', 320131, 'Sukaluyu', 'REG0002'),
('3201312006', 320131, 'Sukaresmi', 'REG0002'),
('3201312007', 320131, 'Sukajaya', 'REG0002'),
('3201312008', 320131, 'Sukajadi', 'REG0002'),
('3201322001', 320132, 'Klapanunggal', 'REG0002'),
('3201322002', 320132, 'Bojong', 'REG0002'),
('3201322003', 320132, 'Nambo', 'REG0002'),
('3201322004', 320132, 'Lulut', 'REG0002'),
('3201322005', 320132, 'Cikahuripan', 'REG0002'),
('3201322006', 320132, 'Kembang Kuning', 'REG0002'),
('3201322007', 320132, 'Bantar Jati', 'REG0002'),
('3201322008', 320132, 'Leuwikaret', 'REG0002'),
('3201322009', 320132, 'Ligarmukti', 'REG0002'),
('3201332001', 320133, 'Putat Nutug', 'REG0002'),
('3201332002', 320133, 'Ciseeng', 'REG0002'),
('3201332003', 320133, 'Parigi Mekar', 'REG0002'),
('3201332004', 320133, 'Cibentang', 'REG0002'),
('3201332005', 320133, 'Cibeuteung Udik', 'REG0002'),
('3201332006', 320133, 'Karihkil', 'REG0002'),
('3201332007', 320133, 'Babakan', 'REG0002'),
('3201332008', 320133, 'Cihoe', 'REG0002'),
('3201332009', 320133, 'Cibeuteung Muara', 'REG0002'),
('3201332010', 320133, 'Kuripan', 'REG0002'),
('3201342001', 320134, 'Bantarjaya', 'REG0002'),
('3201342002', 320134, 'Bantarsari', 'REG0002'),
('3201342003', 320134, 'Pasirgaok', 'REG0002'),
('3201342004', 320134, 'Rancabungur', 'REG0002'),
('3201342005', 320134, 'Mekarsari', 'REG0002'),
('3201342006', 320134, 'Candali', 'REG0002'),
('3201342007', 320134, 'Cimulang', 'REG0002'),
('3201352001', 320135, 'Cisarua', 'REG0002'),
('3201352002', 320135, 'Kiarasari', 'REG0002'),
('3201352003', 320135, 'Sukajaya', 'REG0002'),
('3201352004', 320135, 'Cipayung', 'REG0002'),
('3201352005', 320135, 'Cileuksa', 'REG0002'),
('3201352006', 320135, 'Kiarapandak', 'REG0002'),
('3201352007', 320135, 'Harkat Jaya', 'REG0002'),
('3201352008', 320135, 'Sukamulih', 'REG0002'),
('3201352009', 320135, 'Pasirmadang', 'REG0002'),
('3201352010', 320135, 'Urug', 'REG0002'),
('3201352011', 320135, 'Jayaraharja', 'REG0002'),
('3201362001', 320136, 'Tanjungsari', 'REG0002'),
('3201362002', 320136, 'Selawangi', 'REG0002'),
('3201362003', 320136, 'Tanjungrasa', 'REG0002'),
('3201362004', 320136, 'Antajaya', 'REG0002'),
('3201362005', 320136, 'Pasir Tanjung', 'REG0002'),
('3201362006', 320136, 'Cibadak', 'REG0002'),
('3201362007', 320136, 'Sukarasa', 'REG0002'),
('3201362008', 320136, 'Sirnasari', 'REG0002'),
('3201362009', 320136, 'Buanajaya', 'REG0002'),
('3201362010', 320136, 'Sirnarasa', 'REG0002'),
('3201372001', 320137, 'Tajurhalang', 'REG0002'),
('3201372002', 320137, 'Citayam', 'REG0002'),
('3201372003', 320137, 'Sasak Panjang', 'REG0002'),
('3201372004', 320137, 'Nanggerang', 'REG0002'),
('3201372005', 320137, 'Sukmajaya', 'REG0002'),
('3201372006', 320137, 'Tonjong', 'REG0002'),
('3201372007', 320137, 'Kalisuren', 'REG0002'),
('3201382001', 320138, 'Cigombong', 'REG0002'),
('3201382002', 320138, 'Watesjaya', 'REG0002'),
('3201382003', 320138, 'Ciburuy', 'REG0002'),
('3201382004', 320138, 'Srogol', 'REG0002'),
('3201382005', 320138, 'Cisalada', 'REG0002'),
('3201382006', 320138, 'Tugujaya', 'REG0002'),
('3201382007', 320138, 'Pasirjaya', 'REG0002'),
('3201382008', 320138, 'Ciburayut', 'REG0002'),
('3201382009', 320138, 'Ciadeg', 'REG0002'),
('3201392001', 320139, 'Leuwisadeng', 'REG0002'),
('3201392002', 320139, 'Babakan Sadeng', 'REG0002'),
('3201392003', 320139, 'Sadeng Kolot', 'REG0002'),
('3201392004', 320139, 'Wangunjaya', 'REG0002'),
('3201392005', 320139, 'Kalong I', 'REG0002'),
('3201392006', 320139, 'Kalong II', 'REG0002'),
('3201392007', 320139, 'Sadeng', 'REG0002'),
('3201392008', 320139, 'Sibanteng', 'REG0002'),
('3201402001', 320140, 'Tapos I', 'REG0002'),
('3201402002', 320140, 'Tapos II', 'REG0002'),
('3201402003', 320140, 'Cibitung Tengah', 'REG0002'),
('3201402004', 320140, 'Situdaun', 'REG0002'),
('3201402005', 320140, 'Cinangneng', 'REG0002'),
('3201402006', 320140, 'Gunungmalang', 'REG0002'),
('3201402007', 320140, 'Gunung Mulya', 'REG0002'),
('3275011001', 327501, 'Bekasi Jaya', 'REG0004'),
('3275011002', 327501, 'Margahayu', 'REG0004'),
('3275011003', 327501, 'Duren Jaya', 'REG0004'),
('3275011004', 327501, 'Aren Jaya', 'REG0004'),
('3275021001', 327502, 'Bintara', '3'),
('3275021002', 327502, 'Kranji', '3'),
('3275021003', 327502, 'Kota Baru', '3'),
('3275021004', 327502, 'Bintara Jaya', '3'),
('3275021005', 327502, 'Jakasampurna', '3'),
('3275031001', 327503, 'Kaliabang Tengah', 'REG0004'),
('3275031002', 327503, 'Perwira', 'REG0004'),
('3275031003', 327503, 'Harapan Baru', 'REG0004'),
('3275031004', 327503, 'Teluk Pucung', 'REG0004'),
('3275031005', 327503, 'Margamulya', 'REG0004'),
('3275031006', 327503, 'Harapan Jaya', 'REG0004'),
('3275041001', 327504, 'Pekayon Jaya', 'REG0004'),
('3275041002', 327504, 'Margajaya', 'REG0004'),
('3275041003', 327504, 'Jaka Mulya', 'REG0004'),
('3275041004', 327504, 'Jakasetia', 'REG0004'),
('3275041005', 327504, 'Kayuringin Jaya', 'REG0004'),
('3275051001', 327505, 'Bojong Rawalumbu', 'REG0004'),
('3275051002', 327505, 'Pengasinan', 'REG0004'),
('3275051003', 327505, 'Sepanjang Jaya', 'REG0004'),
('3275051004', 327505, 'Bojong Menteng', 'REG0004'),
('3275061001', 327506, 'Medan Satria', 'REG0004'),
('3275061002', 327506, 'Harapan Mulya', 'REG0004'),
('3275061003', 327506, 'Pejuang', 'REG0004'),
('3275061004', 327506, 'Kalibaru', 'REG0004'),
('3275071003', 327507, 'Bantargebang', 'REG0004'),
('3275071004', 327507, 'Cikiwul', 'REG0004'),
('3275071007', 327507, 'Ciketing Udik', 'REG0004'),
('3275071008', 327507, 'Sumur Batu', 'REG0004'),
('3275081001', 327508, 'Jatiwaringin', 'REG0004'),
('3275081002', 327508, 'Jatibening', 'REG0004'),
('3275081003', 327508, 'Jatimakmur', 'REG0004'),
('3275081006', 327508, 'Jatibaru', 'REG0004'),
('3275081007', 327508, 'Jaticempaka', 'REG0004'),
('3275091001', 327509, 'Jatimekar', 'REG0004'),
('3275091002', 327509, 'Jatiasih', 'REG0004'),
('3275091003', 327509, 'Jatikramat', 'REG0004'),
('3275091004', 327509, 'Jatirasa', 'REG0004'),
('3275091005', 327509, 'Jatiluhur', 'REG0004'),
('3275091006', 327509, 'Jatisari', 'REG0004'),
('3275101001', 327510, 'Jatisampurna', 'REG0004'),
('3275101002', 327510, 'Jatikarya', 'REG0004'),
('3275101003', 327510, 'Jatiranggon', 'REG0004'),
('3275101004', 327510, 'Jatirangga', 'REG0004'),
('3275101005', 327510, 'Jatiraden', 'REG0004'),
('3275111001', 327511, 'Pedurenan', 'REG0004'),
('3275111002', 327511, 'Cimuning', 'REG0004'),
('3275111003', 327511, 'Mustikajaya', 'REG0004'),
('3275111004', 327511, 'Mustikasari', 'REG0004'),
('3275121001', 327512, 'Jatirahayu', 'REG0004'),
('3275121002', 327512, 'Jatiwarna', 'REG0004'),
('3275121003', 327512, 'Jatimelati', 'REG0004'),
('3275121004', 327512, 'Jatimurni', 'REG0004'),
('3276011006', 327601, 'Depok', 'REG0003'),
('3276011007', 327601, 'Depok Jaya', 'REG0003'),
('3276011008', 327601, 'Pancoran Mas', 'REG0003'),
('3276011009', 327601, 'Mampang', 'REG0003'),
('3276011010', 327601, 'Rangkapan Jaya Baru', 'REG0003'),
('3276011011', 327601, 'Rangkapan Jaya', 'REG0003'),
('3276021007', 327602, 'Harjamukti', 'REG0003'),
('3276021008', 327602, 'Curug', 'REG0003'),
('3276021009', 327602, 'Tugu', 'REG0003'),
('3276021010', 327602, 'Mekarsari', 'REG0003'),
('3276021011', 327602, 'Pasir Gunung Selatan', 'REG0003'),
('3276021012', 327602, 'Cisalak Pasar', 'REG0003'),
('3276031001', 327603, 'Pasir Putih', 'REG0003'),
('3276031002', 327603, 'Bedahan', 'REG0003'),
('3276031003', 327603, 'Pengasinan', 'REG0003'),
('3276031009', 327603, 'Cinangka', 'REG0003'),
('3276031010', 327603, 'Sawangan', 'REG0003'),
('3276031011', 327603, 'Sawangan Baru', 'REG0003'),
('3276031012', 327603, 'Kedaung', 'REG0003'),
('3276041001', 327604, 'Maruyung', 'REG0003'),
('3276041002', 327604, 'Grogol', 'REG0003'),
('3276041003', 327604, 'Krukut', 'REG0003'),
('3276041004', 327604, 'Limo', 'REG0003'),
('3276051001', 327605, 'Sukmajaya', 'REG0003'),
('3276051003', 327605, 'Abadi Jaya', 'REG0003'),
('3276051004', 327605, 'Mekar Jaya', 'REG0003'),
('3276051005', 327605, 'Baktijaya', 'REG0003'),
('3276051008', 327605, 'Cisalak', 'REG0003'),
('3276051010', 327605, 'Tirtajaya', 'REG0003'),
('3276061001', 327606, 'Beji', 'REG0003'),
('3276061002', 327606, 'Kukusan', 'REG0003'),
('3276061003', 327606, 'Tanah Baru', 'REG0003'),
('3276061004', 327606, 'Kemiri Muka', 'REG0003'),
('3276061005', 327606, 'Pondok Cina', 'REG0003'),
('3276061006', 327606, 'Beji Timur', 'REG0003'),
('3276071001', 327607, 'Cipayung', 'REG0003'),
('3276071002', 327607, 'Cipayung Jaya', 'REG0003'),
('3276071003', 327607, 'Ratu Jaya', 'REG0003'),
('3276071004', 327607, 'Bojong Pondok Terong', 'REG0003'),
('3276071005', 327607, 'Pondok Jaya', 'REG0003'),
('3276081001', 327608, 'Sukamaju', 'REG0003'),
('3276081002', 327608, 'Cilodong', 'REG0003'),
('3276081003', 327608, 'Kalibaru', 'REG0003'),
('3276081004', 327608, 'Kalimulya', 'REG0003'),
('3276081005', 327608, 'Jatimulya', 'REG0003'),
('3276091001', 327609, 'Cinere', 'REG0003'),
('3276091002', 327609, 'Gandul', 'REG0003'),
('3276091003', 327609, 'Pangkalan Jati', 'REG0003'),
('3276091004', 327609, 'Pangkalan Jati Baru', 'REG0003'),
('3276101001', 327610, 'Tapos', 'REG0003'),
('3276101002', 327610, 'Leuwinanggung', 'REG0003'),
('3276101003', 327610, 'Sukatani', 'REG0003'),
('3276101004', 327610, 'Sukamaju Baru', 'REG0003'),
('3276101005', 327610, 'Jatijajar', 'REG0003'),
('3276101006', 327610, 'Cilangkap', 'REG0003'),
('3276101007', 327610, 'Cimpaeun', 'REG0003'),
('3276111001', 327611, 'Bojongsari', 'REG0003'),
('3276111002', 327611, 'Bojongsari Baru', 'REG0003'),
('3276111003', 327611, 'Serua', 'REG0003'),
('3276111004', 327611, 'Pondok Petir', 'REG0003'),
('3276111005', 327611, 'Curug', 'REG0003'),
('3276111006', 327611, 'Duren Mekar', 'REG0003'),
('3276111007', 327611, 'Duren Seribu', 'REG0003'),
('3671011001', 367101, 'Sukarasa', 'REG0005'),
('3671011002', 367101, 'Sukaasih', 'REG0005'),
('3671011003', 367101, 'Tanah Tinggi', 'REG0005'),
('3671011004', 367101, 'Buaran Indah', 'REG0005'),
('3671011005', 367101, 'Cikokol', 'REG0005'),
('3671011006', 367101, 'Kelapa Indah', 'REG0005'),
('3671011007', 367101, 'Sukasari', 'REG0005'),
('3671011008', 367101, 'Babakan', 'REG0005'),
('3671021001', 367102, 'Keroncong', 'REG0005'),
('3671021002', 367102, 'Jatake', 'REG0005'),
('3671021003', 367102, 'Pasir Jaya', 'REG0005'),
('3671021004', 367102, 'Gandasari', 'REG0005'),
('3671021005', 367102, 'Manis Jaya', 'REG0005'),
('3671021006', 367102, 'Alam Jaya', 'REG0005'),
('3671031001', 367103, 'Batuceper', 'REG0005'),
('3671031002', 367103, 'Batujaya', 'REG0005'),
('3671031003', 367103, 'Poris Gaga', 'REG0005'),
('3671031004', 367103, 'Poris Gaga Baru', 'REG0005'),
('3671031005', 367103, 'Kebon Besar', 'REG0005'),
('3671031006', 367103, 'Batusari', 'REG0005'),
('3671031007', 367103, 'Poris Jaya', 'REG0005'),
('3671041001', 367104, 'Belendung', 'REG0005'),
('3671041002', 367104, 'Jurumudi', 'REG0005'),
('3671041003', 367104, 'Benda', 'REG0005'),
('3671041004', 367104, 'Pajang', 'REG0005'),
('3671041005', 367104, 'Jurumudi Baru', 'REG0005'),
('3671051001', 367105, 'Cipondoh', 'REG0005'),
('3671051002', 367105, 'Cipondoh Makmur', 'REG0005'),
('3671051003', 367105, 'Cipondoh Indah', 'REG0005'),
('3671051004', 367105, 'Gondrong', 'REG0005'),
('3671051005', 367105, 'Kenanga', 'REG0005'),
('3671051006', 367105, 'Petir', 'REG0005'),
('3671051007', 367105, 'Ketapang', 'REG0005'),
('3671051008', 367105, 'Poris Plawad', 'REG0005'),
('3671051009', 367105, 'Poris Plawad Utara', 'REG0005'),
('3671051010', 367105, 'Poris Plawad Indah', 'REG0005'),
('3671061001', 367106, 'Paninggilan', 'REG0005'),
('3671061002', 367106, 'Sudimara Barat', 'REG0005'),
('3671061003', 367106, 'Sudimara Timur', 'REG0005'),
('3671061004', 367106, 'Tajur', 'REG0005'),
('3671061005', 367106, 'Parung Serab', 'REG0005'),
('3671061006', 367106, 'Sudimara Jaya', 'REG0005'),
('3671061007', 367106, 'Sudimara Selatan', 'REG0005'),
('3671061008', 367106, 'Paninggilan Utara', 'REG0005'),
('3671071001', 367107, 'Karawaci', 'REG0005'),
('3671071002', 367107, 'Bojong Jaya', 'REG0005'),
('3671071003', 367107, 'Karawaci Baru', 'REG0005'),
('3671071004', 367107, 'Nusa Jaya', 'REG0005'),
('3671071005', 367107, 'Cimone', 'REG0005'),
('3671071006', 367107, 'Cimone Jaya', 'REG0005'),
('3671071007', 367107, 'Pabuaran', 'REG0005'),
('3671071008', 367107, 'Sumur Pacing', 'REG0005'),
('3671071009', 367107, 'Bugel', 'REG0005'),
('3671071010', 367107, 'Margasari', 'REG0005'),
('3671071011', 367107, 'Pabuaran Tumpeng', 'REG0005'),
('3671071012', 367107, 'Nambo Jaya', 'REG0005'),
('3671071013', 367107, 'Gerendeng', 'REG0005'),
('3671071014', 367107, 'Sukajadi', 'REG0005'),
('3671071015', 367107, 'Pasar Baru', 'REG0005'),
('3671071016', 367107, 'Koang Jaya', 'REG0005'),
('3671081001', 367108, 'Periuk', 'REG0005'),
('3671081002', 367108, 'Gembor', 'REG0005'),
('3671081003', 367108, 'Gebang Raya', 'REG0005'),
('3671081004', 367108, 'Sangiang Jaya', 'REG0005'),
('3671081005', 367108, 'Periuk Jaya', 'REG0005'),
('3671091001', 367109, 'Cibodas', 'REG0005'),
('3671091002', 367109, 'Cibodasari', 'REG0005'),
('3671091003', 367109, 'Cibodas Baru', 'REG0005'),
('3671091004', 367109, 'Panunggangan Barat', 'REG0005'),
('3671091005', 367109, 'Uwung Jaya', 'REG0005'),
('3671091006', 367109, 'Jatiuwung', 'REG0005'),
('3671101001', 367110, 'Neglasari', 'REG0005'),
('3671101002', 367110, 'Karang Sari', 'REG0005'),
('3671101003', 367110, 'Selapajang Jaya', 'REG0005'),
('3671101004', 367110, 'Kedaung Wetan', 'REG0005'),
('3671101005', 367110, 'Mekarsari', 'REG0005'),
('3671101006', 367110, 'Karang Anyar', 'REG0005'),
('3671101007', 367110, 'Kedaung Baru', 'REG0005'),
('3671111001', 367111, 'Pinang', 'REG0005'),
('3671111002', 367111, 'Sudimara Pinang', 'REG0005'),
('3671111003', 367111, 'Nerogtog', 'REG0005'),
('3671111004', 367111, 'Kunciran', 'REG0005'),
('3671111005', 367111, 'Kunciran Indah', 'REG0005'),
('3671111006', 367111, 'Kunciran Jaya', 'REG0005'),
('3671111007', 367111, 'Cipete', 'REG0005'),
('3671111008', 367111, 'Pakojan', 'REG0005'),
('3671111009', 367111, 'Panunggangan', 'REG0005'),
('3671111010', 367111, 'Panunggangan Utara', 'REG0005'),
('3671111011', 367111, 'Panunggangan Timur', 'REG0005'),
('3671121001', 367112, 'Karang Tengah', 'REG0005'),
('3671121002', 367112, 'Karang Mulya', 'REG0005'),
('3671121003', 367112, 'Pondok Bahar', 'REG0005'),
('3671121004', 367112, 'Pondok Pucung', 'REG0005'),
('3671121005', 367112, 'Karang Timur', 'REG0005'),
('3671121006', 367112, 'Padurenan', 'REG0005'),
('3671121007', 367112, 'Parung Jaya', 'REG0005'),
('3671131001', 367113, 'Larangan Utara', 'REG0005'),
('3671131002', 367113, 'Larangan Selatan', 'REG0005'),
('3671131003', 367113, 'Cipadu', 'REG0005'),
('3671131004', 367113, 'Kreo', 'REG0005'),
('3671131005', 367113, 'Larangan Indah', 'REG0005'),
('3671131006', 367113, 'Gaga', 'REG0005'),
('3671131007', 367113, 'Cipadu Jaya', 'REG0005'),
('3671131008', 367113, 'Kreo Selatan', 'REG0005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `kd_kurir` varchar(10) NOT NULL,
  `nama_kurir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kd_region` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('ACTIVE','NON-ACTIVE','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurir`
--

INSERT INTO `tbl_kurir` (`kd_kurir`, `nama_kurir`, `jenis_kelamin`, `no_telp`, `email`, `kd_region`, `username`, `password`, `alamat`, `status`) VALUES
('KDK0001', 'Rudi Ruhiyat', 'L', '08890128283', 'rudi@gmail.com', 'REG0002', 'rudiRuhiyat', 'cnVkaTEyMw==', 'Kp.Surya Kencana RT.08/10 Kec.Surken Kota Bogor', 'ACTIVE'),
('KDK0002', 'Eni Nuraeni', 'P', '089677771213', 'enicans@gmail.com', 'REG0003', 'eni123', 'ZW5pMTIz', 'kp.Depok Lama Kec.Depok Baru Kota Depok', 'ACTIVE'),
('KDK0003', 'Dinda Sulvianti', 'P', '089727172721', 'dinda@gmail.com', 'REG0001', 'dinda', 'ZGluZGExMjM=', 'kp.Lenteng Agung Rt.03/07 Kec.Lenteng Agung Jakarta Pusat', 'ACTIVE'),
('KDK0004', 'Alip Herman', 'L', '08892967263', 'alip@gmail.com', 'REG0004', 'alip', 'YWxpcDEyMw==', 'kp.jatiasih', 'ACTIVE'),
('KDK0005', 'Keith Ace Warden', 'L', '087879990287', 'KeithAce@gmail.com', 'REG0003', 'KeithAW', 'a2VpdGgxMjM=', 'Kp.Rungkun Rt.05/Rw.05 Ds.Kencana  Kec.Pasir Awi Kel.Pasir Awi Kota Depok kode pos 1677', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `kd_pegawai` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `kd_region` varchar(10) NOT NULL,
  `status` enum('ACTIVE','NON-ACTIVE','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`kd_pegawai`, `nama_pegawai`, `jenis_kelamin`, `alamat`, `email`, `no_telp`, `username`, `password`, `kd_region`, `status`) VALUES
('KDP0001', 'Edi Jhonson', 'L', '<p>Kp.Megamendung Rt.08/12 Kec.Megamendung Ds.Cisarua Kab.Bogor</p>', 'ediJ@gmail.com', '081384842789', 'EdiJhon', 'ZWRpMTIz', 'REG0002', 'ACTIVE'),
('KDP0002', 'Alexandra Ehiro', 'P', 'kp.lebak bulus Rt.05/10 kec.depok baru Kota Depok ', 'alexandra123@gmail.com', '081889333312', 'alexandra', 'YWxleGE=', 'REG0004', 'ACTIVE'),
('KDP0003', 'Khalid Fadillah', 'L', '<p>Kp.Cibubur Rt.05/Rw.05 Kec.Cirua Ds.Cirua Kota Jakarta Selatan</p>', 'khalidb@gmail.com', '081384862659', 'bangkhalid', 'a2hhbGlkYmFzbWFsYWg=', 'REG0001', 'ACTIVE'),
('KDP0004', 'Layla Wadnan', 'P', '<p>KP.Rungkun Awi Ds.Pasir Awi Kec.Pasir Awi Kota Bekasi</p>', 'Laylawn@gmail.com', '081749838383', 'LaylaW', 'bGF5bGEyMjE=', 'REG0004', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `kd_pengiriman` varchar(10) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `kd_user` varchar(10) NOT NULL,
  `dari_kota` varchar(50) NOT NULL,
  `ke_kota` varchar(50) NOT NULL,
  `tgl_delivered` date NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat_penerima` varchar(50) NOT NULL,
  `tarif` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kd_kurir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengiriman`
--

INSERT INTO `tbl_pengiriman` (`kd_pengiriman`, `no_resi`, `kd_user`, `dari_kota`, `ke_kota`, `tgl_delivered`, `nama_penerima`, `alamat_penerima`, `tarif`, `status`, `kd_kurir`) VALUES
('KPR0007', 'NBR0009', 'KSR0008', 'Bogor', 'Jakarta', '2018-05-14', 'Kikin Sodiqin', '<p>Kp.Paseban RT.05/RW.05 Kode Pos 16890</p>', 15000, 'Delivered', 'KDK0003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pre_pengiriman`
--

CREATE TABLE `tbl_pre_pengiriman` (
  `kd_pre_pengiriman` varchar(10) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `dari_kota` varchar(50) NOT NULL,
  `ke_kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `current_city` varchar(50) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `tarif` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kd_user` varchar(10) NOT NULL,
  `kd_kurir` varchar(10) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pre_pengiriman`
--

INSERT INTO `tbl_pre_pengiriman` (`kd_pre_pengiriman`, `no_resi`, `dari_kota`, `ke_kota`, `kecamatan`, `kelurahan`, `current_city`, `tgl_pengiriman`, `tarif`, `status`, `kd_user`, `kd_kurir`, `nama_penerima`, `alamat_penerima`) VALUES
('KPR0001', 'NBR0008', 'Bogor', 'Bogor', 'Caringin', 'Caringin', 'Bogor', '2018-05-13', 12000, 'Waiting To Take', 'KSR0005', 'KDK0001', 'Didin Sudrajat', '<p>kp.caringin RT.05/RW.05 Kode Pos 16730</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_region`
--

CREATE TABLE `tbl_region` (
  `kd_region` varchar(10) NOT NULL,
  `wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_region`
--

INSERT INTO `tbl_region` (`kd_region`, `wilayah`) VALUES
('REG0001', 'Jakarta'),
('REG0002', 'Bogor'),
('REG0003', 'Depok'),
('REG0004', 'Bekasi'),
('REG0005', 'Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat_pengiriman`
--

CREATE TABLE `tbl_riwayat_pengiriman` (
  `kd_pre_pengiriman` varchar(10) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `dari_kota` varchar(50) NOT NULL,
  `ke_kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `current_city` varchar(50) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `tarif` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kd_user` varchar(10) NOT NULL,
  `kd_kurir` varchar(10) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_route`
--

CREATE TABLE `tbl_route` (
  `kd_route` varchar(10) NOT NULL,
  `dari_kota` varchar(50) NOT NULL,
  `ke_kota` varchar(50) NOT NULL,
  `tarif` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_route`
--

INSERT INTO `tbl_route` (`kd_route`, `dari_kota`, `ke_kota`, `tarif`) VALUES
('ROT0001', 'Bogor', 'Jakarta', 10000),
('ROT0002', 'Jakarta', 'Bogor', 10000),
('ROT0003', 'Depok', 'Bogor', 7000),
('ROT0004', 'Bogor', 'Depok', 7000),
('ROT0005', 'Bekasi', 'Bogor', 8000),
('ROT0006', 'Bogor', 'Bekasi', 8000),
('ROT0007', 'Jakarta', 'Depok', 8000),
('ROT0008', 'Depok', 'Jakarta', 8000),
('ROT0009', 'Tangerang', 'Bogor', 12000),
('ROT0010', 'Bogor', 'Tangerang', 12000),
('ROT0011', 'Depok', 'Tangerang', 12000),
('ROT0012', 'Tangerang', 'Depok', 12000),
('ROT0013', 'Bogor', 'Bogor', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_user` varchar(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Admin','User','','') NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kd_user`, `nama_user`, `jenis_kelamin`, `alamat`, `email`, `no_telp`, `username`, `password`, `level`, `tgl_daftar`) VALUES
('KSR0001', 'Pramudya Saputra', 'L', 'kp.Curugdeng-deng rt.05', 'pramudyasaputra89@gmail.com', '081384862659', 'pramudyas', 'cHJhdmluMTMwMQ==', 'Admin', '2018-04-13 03:49:07'),
('KSR0002', 'Ghofaru Fali', 'L', '<p>kp.Desa Ciberem Rt.05/05</p>', 'ghofaru@gmail.com', '08132325278', 'ghofaru', 'Z2hvZmFydTEyMw==', 'Admin', '2018-04-12 17:00:00'),
('KSR0003', 'Udin Goevara', 'L', '<p>Kp.Cibandawa Rt.05/Rw.05 Kec.Cigombong Kel.Cigombong ds.Cigombong Kab.Bogor Kode Pos 16731</p>', 'udingv@gmail.com', '081384862659', 'udinGege', 'dWRpbg==', 'User', '2018-04-14 17:00:00'),
('KSR0005', 'Kiki Subagja', 'L', '<p>Kp.JambuLuwuk Rt.05/Rw.05 Ds.JambuLuwuk Kec.Cibedug KAB.Bogor</p>\r\n<p>&nbsp;</p>', 'Kikisis@gmail.com', '089877765511', 'Kikisudiki', 'a2lraXNraWRpa2E=', 'User', '2018-04-19 17:00:00'),
('KSR0006', 'Ahmad Subarjo', 'L', '<p>kp.ciburuy Rt.05/Rw.05 Kec.Megasari Ds.Megasari Kab.Megasari</p>', 'ahmad@gmail.com', '08138487672', 'ahmadku', 'YWhtYWQxMjM=', 'User', '2018-04-26 17:00:00'),
('KSR0007', 'tes', 'L', '<p>tes</p>', 'a@a.com', '00000', 'tes', 'dGVz', 'Admin', '2018-04-27 08:47:39'),
('KSR0008', 'spm', 'P', '<p>kp.cibeureum</p>', 'spm@gmail.com', '08987777678', 'spm', 'c3Bt', 'User', '2018-05-07 17:00:00');

-- --------------------------------------------------------

--
-- Structure for view `data_pengiriman`
--
DROP TABLE IF EXISTS `data_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_pengiriman`  AS  select `tbl_barang`.`nama_barang` AS `nama_barang`,`tbl_barang`.`no_resi` AS `no_resi`,`tbl_barang`.`berat` AS `berat`,`tbl_barang`.`panjang` AS `panjang`,`tbl_pengiriman`.`dari_kota` AS `dari_kota`,`tbl_pengiriman`.`ke_kota` AS `ke_kota`,`tbl_user`.`nama_user` AS `nama_user`,`tbl_pengiriman`.`tarif` AS `tarif`,`tbl_pengiriman`.`status` AS `status` from ((`tbl_barang` join `tbl_pengiriman` on((`tbl_barang`.`no_resi` = `tbl_pengiriman`.`no_resi`))) join `tbl_user` on((`tbl_pengiriman`.`kd_user` = `tbl_user`.`kd_user`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`no_resi`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`kd_kecamatan`);

--
-- Indexes for table `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
  ADD PRIMARY KEY (`kd_kelurahan`);

--
-- Indexes for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`kd_kurir`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`kd_pegawai`);

--
-- Indexes for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`kd_pengiriman`);

--
-- Indexes for table `tbl_pre_pengiriman`
--
ALTER TABLE `tbl_pre_pengiriman`
  ADD PRIMARY KEY (`kd_pre_pengiriman`);

--
-- Indexes for table `tbl_region`
--
ALTER TABLE `tbl_region`
  ADD PRIMARY KEY (`kd_region`);

--
-- Indexes for table `tbl_route`
--
ALTER TABLE `tbl_route`
  ADD PRIMARY KEY (`kd_route`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
