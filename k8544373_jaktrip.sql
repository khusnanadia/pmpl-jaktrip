-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2015 at 08:45 AM
-- Server version: 5.5.45-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k8544373_jaktrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `lower_nom` int(11) NOT NULL,
  `upper_nom` int(11) NOT NULL,
  `input_num` int(11) NOT NULL,
  PRIMARY KEY (`lower_nom`,`upper_nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`lower_nom`, `upper_nom`, `input_num`) VALUES
(0, 10000, 0),
(10000, 20000, 2),
(20000, 30000, 0),
(30000, 40000, 0),
(40000, 50000, 1),
(50000, 60000, 0),
(60000, 70000, 0),
(70000, 80000, 0),
(80000, 90000, 0),
(90000, 100000, 3),
(100000, 110000, 0),
(110000, 120000, 1),
(120000, 130000, 0),
(130000, 140000, 0),
(140000, 150000, 1),
(150000, 160000, 0),
(170000, 180000, 0),
(180000, 190000, 0),
(190000, 200000, 1),
(200000, 210000, 0),
(210000, 220000, 0),
(220000, 230000, 0),
(230000, 240000, 0),
(240000, 250000, 2),
(250000, 260000, 0),
(260000, 270000, 0),
(270000, 280000, 0),
(280000, 290000, 0),
(290000, 300000, 0),
(300000, 310000, 0),
(310000, 320000, 0),
(320000, 330000, 0),
(330000, 340000, 0),
(340000, 350000, 0),
(350000, 360000, 0),
(360000, 370000, 0),
(370000, 380000, 0),
(380000, 390000, 0),
(390000, 400000, 0),
(400000, 410000, 0),
(410000, 420000, 0),
(420000, 430000, 0),
(430000, 440000, 0),
(440000, 450000, 0),
(450000, 460000, 0),
(460000, 470000, 0),
(470000, 480000, 0),
(480000, 490000, 0),
(490000, 500000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`) VALUES
('Aquarium'),
('City Park'),
('Cultural Heritage'),
('Education'),
('Holy Place'),
('Indoor Play'),
('Monument'),
('Museum'),
('Outdoor Play'),
('Theatre'),
('Theme Park'),
('View'),
('Water Park'),
('Zoo');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `id_collect` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `is_wishlist` tinyint(1) NOT NULL,
  `is_visited` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_collect`),
  KEY `place_name` (`place_name`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id_collect`, `username`, `place_name`, `is_wishlist`, `is_visited`) VALUES
(1, 'syifakha', 'Dunia Fantasi', 0, 0),
(2, 'syifakha', 'Bundaran HI', 1, 0),
(3, 'syifakha', 'Kidspace', 0, 1),
(4, '1077143442299652', 'Bundaran HI', 0, 1),
(5, '1077143442299652', 'Dunia Fantasi', 0, 1),
(6, 'mohammadsyahidw', 'Bundaran HI', 1, 1),
(7, 'mohammadsyahidw', 'Dunia Fantasi', 0, 0),
(8, 'mohammadsyahidw', 'Museum Minyak dan Gas Bumi', 0, 0),
(9, 'fakhirahdg', 'Bundaran HI', 0, 0),
(10, 'fakhirahdg', 'Kidspace', 0, 0),
(11, 'ahmadibrahim', 'Bundaran HI', 0, 1),
(12, '0', 'haha', 0, 0),
(13, '0', 'haha', 0, 0),
(14, '0', 'Planetarium', 1, 0),
(15, '0', 'Snowbay', 0, 0),
(16, '0', 'Snowbay', 1, 0),
(17, '0', 'Snowbay', 1, 0),
(18, 'dinda', 'Dunia Fantasi', 1, 0),
(19, 'dinda', 'Kebun Binatang Ragunan', 0, 1),
(20, 'dinda', 'Museum Bayt Al-quran', 0, 1),
(21, '0', 'Kidspace', 0, 1),
(22, '1055999721076876', 'Dunia Fantasi', 0, 0),
(23, '1055999721076876', 'Bundaran HI', 0, 0),
(24, '1055999721076876', 'Kidspace', 0, 0),
(25, '0', 'Planetarium', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `name`, `email`, `subject`, `message`) VALUES
(1, 'amalia', 'amalia@gmail.com', 'bagus', 'JAKtrip inovasi baru (y)'),
(2, 'wildan', 'wildan@c.com', 'dd', 'bagus (y)');

-- --------------------------------------------------------

--
-- Table structure for table `halte`
--

CREATE TABLE IF NOT EXISTS `halte` (
  `halte_name` varchar(50) NOT NULL,
  `halte_code` varchar(10) NOT NULL,
  PRIMARY KEY (`halte_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halte`
--

INSERT INTO `halte` (`halte_name`, `halte_code`) VALUES
('Blok M', 'K1.01'),
('Masjid Agung', 'K1.02'),
('Bundaran Senayan', 'K1.03'),
('Gelora Bung Karno', 'K1.04'),
('Polda Metro Jaya', 'K1.05'),
('Bendungan Hilir', 'K1.06'),
('Karet', 'K1.07'),
('Setiabudi', 'K1.08'),
('Dukuh Atas 1', 'K1.09'),
('Tosari', 'K1.10'),
('Bundaran HI', 'K1.11'),
('Sarinah', 'K1.12'),
('Bank Indonesia', 'K1.13'),
('Monas', 'K1.14'),
('Sawah Besar', 'K1.16'),
('Mangga Besar', 'K1.17'),
('Olimo', 'K1.18'),
('Glodok', 'K1.19'),
('Kota', 'K1.20'),
('Tanjung Priok', 'K10.01'),
('Enggano', 'K10.02'),
('Permai Koja', 'K10.03'),
('Walikota Jakarta Utara', 'K10.04'),
('Plumpang Pertamina', 'K10.05'),
('Sunter Kelapa Gading', 'K10.06'),
('Yos Sudarso Kodamar', 'K10.07'),
('Cempaka Mas 2', 'K10.08'),
('Cempaka Putih', 'K10.09'),
('Pulomas Bypass', 'K10.10'),
('Kayu Putih Rawasari', 'K10.11'),
('Peuda Pramuka', 'K10.12'),
('Utan Kayu Rawamangun', 'K10.13'),
('Ahmad Yani Bea Cukai', 'K10.14'),
('Flyover Jatinegara', 'K10.15'),
('Pedati Prumpung', 'K10.16'),
('Cipinang Kebon Nanas', 'K10.17'),
('Penas Kalimalang', 'K10.18'),
('Cawang Sutoyo', 'K10.19'),
('Cawang UKI', 'K10.20'),
('BKN', 'K10.21'),
('PGC', 'K10.22'),
('Walikota Jakarta Timur', 'K11.01'),
('Penggilingan', 'K11.02'),
('Perumnas Klender', 'K11.03'),
('Flyover Radin Inten', 'K11.04'),
('Buaran', 'K11.05'),
('Kampung Sumur', 'K11.06'),
('Flyover Klender', 'K11.07'),
('Stasiun Klender', 'K11.08'),
('Cipinang', 'K11.09'),
('Imigrasi Jakarta Timur', 'K11.10'),
('Pasar Enjo', 'K11.11'),
('Stasiun Jatinegara 2', 'K11.13'),
('Jatinegara Rs. Premier', 'K11.14'),
('Pluit', 'K12.01'),
('Pluit Auto Plaza Landmark (Arah Tanjung Priok)', 'K12.02'),
('Pakin (Arah Tanjung Priok)', 'K12.03'),
('Gedong Panjang (Arah Tanjung Priok)', 'K12.04'),
('Kali Besar Barat (Arah Pluit)', 'K12.06'),
('Bandengan Pekojan (Arah Pluit)', 'K12.07'),
('Penjaringan', 'K12.08'),
('Museum Fatahillah (Arah Tanjung Priok)', 'K12.09'),
('Kota', 'K12.10'),
('Mangga Dua Mall', 'K12.11'),
('Gunung Sahari Mangga Dua', 'K12.12'),
('Jembatan Merah', 'K12.13'),
('Kemayoran Landas Pacu Timur', 'K12.14'),
('Danau Agung', 'K12.15'),
('Sunter SMP 140', 'K12.16'),
('Sunter Karya', 'K12.17'),
('Sunter Boulevard Barat', 'K12.18'),
('Sunter Kelapa Gading', 'K12.19'),
('Plumpang Pertamina', 'K12.20'),
('Walikota Jakarta Utara', 'K12.21'),
('Permai Koja', 'K12.22'),
('Enggano', 'K12.23'),
('Tanjung Priok', 'K12.24'),
('Kota Harapan Indah', 'K2.01'),
('Ujung Menteng', 'K2.02'),
('Bekasi Pulo Gadung', 'K2.03'),
('Cakung Cilincing', 'K2.04'),
('Pasar Cakung', 'K2.05'),
('Tipar Cakung', 'K2.06'),
('Cakung United Tractors', 'K2.07'),
('Kawasan Industri Pulo Gadung', 'K2.08'),
('Pulo Gadung', 'K2.09'),
('Bermis', 'K2.10'),
('Pulomas', 'K2.11'),
('ASMI', 'K2.12'),
('Pedongkelan', 'K2.13'),
('Cempaka Putih', 'K2.14'),
('RS Islam', 'K2.15'),
('Cempaka Tengah', 'K2.16'),
('Pasar Cempaka Putih', 'K2.17'),
('Rawa Selatan', 'K2.18'),
('Galur', 'K2.19'),
('Senen', 'K2.20'),
('Atrium (Satu arah)', 'K2.21'),
('RSPAD (Satu arah)', 'K2.22'),
('DEPLU (Satu arah)', 'K2.23'),
('Gambir 1 (Satu arah)', 'K2.24'),
('Istiqlal (satu arah)', 'K2.25'),
('Juanda', 'K2.26'),
('Pecenongan', 'K2.27'),
('Harmoni Sentral', 'K2.28'),
('Monumen Nasional (Satu arah)', 'K2.29'),
('Balai Kota (Satu arah)', 'K2.30'),
('Gambir 2 (Satu arah)', 'K2.31'),
('Kwitang (Satu arah)', 'K2.32'),
('Kalideres', 'K3.01'),
('Pesakih', 'K3.02'),
('Sumur Bor', 'K3.03'),
('Rawa Buaya', 'K3.04'),
('Jembatan Baru', 'K3.05'),
('Dispenda', 'K3.06'),
('Jembatan Gantung', 'K3.07'),
('Taman Kota', 'K3.08'),
('Indosiar', 'K3.09'),
('Jelambar', 'K3.10'),
('Grogol 1', 'K3.11'),
('RS Sumber Waras', 'K3.12'),
('Harmoni Sentral', 'K3.13'),
('Pecenongan', 'K3.14'),
('Juanda', 'K3.15'),
('Pasar Baru', 'K3.16'),
('Pulo Gadung', 'K4.01'),
('Pasar Pulo Gadung', 'K4.02'),
('TU Gas', 'K4.03'),
('Layur', 'K4.04'),
('Pemuda Rawamangun', 'K4.05'),
('Velodrome', 'K4.06'),
('Sunan Giri', 'K4.07'),
('UNJ', 'K4.08'),
('Pramuka BPKP', 'K4.09'),
('Pramuka LIA', 'K4.10'),
('Utan Kayu', 'K4.11'),
('Pasar Genjing', 'K4.12'),
('Matraman 2', 'K4.13'),
('Manggarai', 'K4.14'),
('Pasar Rumput', 'K4.15'),
('Halimun', 'K4.16'),
('Dukuh Atas 2', 'K4.17'),
('Ancol', 'K5.01'),
('Pademangan', 'K5.02'),
('Mangga Dua Square', 'K5.03'),
('Jembatan Merah', 'K5.04'),
('Pasar Baru Timur', 'K5.05'),
('Budi Utomo', 'K5.06'),
('Senen Sentral', 'K5.07'),
('Pal Putih', 'K5.08'),
('Kramat Sentiong NU', 'K5.09'),
('Salemba UI', 'K5.10'),
('Salemba Carolus', 'K5.11'),
('Matraman 1', 'K5.12'),
('Tegalan', 'K5.13'),
('Slamet Riyadi', 'K5.14'),
('Kebon Pala', 'K5.15'),
('Pasar Jatinegara', 'K5.16'),
('Jatinegara Rs. Premier', 'K5.17'),
('Kampung Melayu', 'K5.18'),
('Ragunan', 'K6.01'),
('Departemen Pertanian', 'K6.02'),
('SMK 57', 'K6.03'),
('Jatipadang', 'K6.04'),
('Pejaten', 'K6.05'),
('Buncit Indah', 'K6.06'),
('Warung Jati', 'K6.07'),
('Imigrasi', 'K6.08'),
('Duren Tiga', 'K6.09'),
('Mampang Prapatan', 'K6.10'),
('Kuningan Timur', 'K6.11'),
('Patra Kuningan', 'K6.12'),
('Departemen Kesehatan', 'K6.13'),
('GOR Sumantri', 'K6.14'),
('Karet Kuningan', 'K6.15'),
('Kuningan Madya', 'K6.16'),
('Setiabudi Utara AINI', 'K6.17'),
('Latuharhari', 'K6.18'),
('Halimun', 'K6.19'),
('Dukuh Atas 2', 'K6.20'),
('Kampung Rambutan', 'K7.01'),
('Tanah Merdeka (Arah Kampung Melayu)', 'K7.02'),
('Flyover Raya Bogor', 'K7.03'),
('RS Harapan Bunda', 'K7.04'),
('Pasar Induk', 'K7.05'),
('Pasar Kramat Jati', 'K7.06'),
('Cililitan PGC 1', 'K7.07'),
('BKN', 'K7.08'),
('Cawang UKI', 'K7.09'),
('Cawang BNN', 'K7.10'),
('Cawang Otista', 'K7.11'),
('Gelanggang Remaja', 'K7.12'),
('Bidara Cina', 'K7.13'),
('Kampung Melayu', 'K7.14'),
('Lebak Bulus', 'K8.01'),
('Pondok Pinang (Arah Harmoni)', 'K8.02'),
('Pondok Indah 1', 'K8.03'),
('Pondok Indah 2', 'K8.04'),
('Tanah Kusir Kodim', 'K8.05'),
('Kebayoran Lama Bungur', 'K8.06'),
('Pasar Kebayoran Lama', 'K8.07'),
('Simprug', 'K8.08'),
('Permata Hijau', 'K8.09'),
('RS Medika Permata Hijau', 'K8.10'),
('Pos Pengumben', 'K8.11'),
('Kelapa Dua Sasak', 'K8.12'),
('Kebon Jeruk', 'K8.13'),
('Duri Kepa', 'K8.14'),
('Kedoya Assiddiqiyah', 'K8.15'),
('Kedoya Green Garden', 'K8.16'),
('Grogol', 'K8.17'),
('Harmoni Sentral', 'K8.22'),
('Pluit', 'K9.01'),
('Penjaringan', 'K9.02'),
('Jembatan Tiga', 'K9.03'),
('Jembatan Dua', 'K9.04'),
('Jembatan Besi', 'K9.05'),
('Stasiun Grogol/Latumenten', 'K9.06'),
('Grogol 2 12 Mei Reformasi', 'K9.07'),
('S Parman Podomoro City', 'K9.08'),
('RS Harapan Kita', 'K9.09'),
('Slipi Kemanggisan', 'K9.10'),
('Slipi Petamburan', 'K9.11'),
('Senayan JCC', 'K9.12'),
('Semanggi', 'K9.13'),
('Gatot Subroto LIPI', 'K9.14'),
('Gatot Subroto Jamsostek', 'K9.15'),
('Kuningan Barat', 'K9.16'),
('Tegal Parang', 'K9.17'),
('Pancoran Barat', 'K9.18'),
('Pancoran Tugu', 'K9.19'),
('Tebet BKPM', 'K9.20'),
('Cikoko Stasiun Cawang', 'K9.21'),
('Cawang Ciliwung', 'K9.22'),
('Cawang BNN', 'K9.23'),
('Cawang UKI', 'K9.24'),
('Taman Mini Garuda', 'K9.25'),
('Pinang Piranti', 'K9.26');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `join_date` datetime NOT NULL,
  `last_active` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `name` text NOT NULL,
  `pic` text,
  `bio` text,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `email`, `is_admin`, `join_date`, `last_active`, `password`, `is_active`, `name`, `pic`, `bio`) VALUES
('10204170996257096', 'https://www.facebook.com/10204170996257096', 0, '2015-05-15 05:19:30', '2015-05-14 22:19:30', 'd0d280b16e1e8acc5b36249b55b2fdd6', 1, 'Khusna Nadia', 'https://graph.facebook.com/10204170996257096/picture?type=large', NULL),
('1077143442299652', 'https://www.facebook.com/1077143442299652', 0, '2015-05-09 16:19:15', '2015-05-09 09:19:15', '20f9f4a2a0105448cde22d8e1df10f4d', 1, 'Mohammad Syahid Wildan', 'https://graph.facebook.com/1077143442299652/picture?type=large', NULL),
('ahmadibrahim', 'amad.ibra@gmail.com', 1, '2015-03-20 00:00:00', '2015-03-19 17:00:00', 'e6f6a4d829062ff759747aebcba17866', 1, '', 'http://jaktrip.net/JAKtrip/assets/img/avadefault.png', NULL),
('fakhirahdg', 'fakhirahdg@gmail.com', 1, '2015-03-20 00:00:00', '2015-03-19 17:00:00', 'b80c992abf50083355ac472b3836bce3', 1, '', 'http://jaktrip.net/JAKtrip/assets/img/avadefault.png', NULL),
('khusnanadia', 'khusnanadia@gmail.com', 1, '2015-03-20 00:00:00', '2015-05-14 22:09:06', 'ad54517952aff34e703aca51acebbf20', 1, 'Khusna Nadia', 'http://jaktrip.net/JAKtrip/assets/img/avadefault.png', ''),
('mohammadsyahidw', 'mohammad.syahid.wildan@gmail.com', 1, '2015-03-20 00:00:00', '2015-05-19 23:46:26', '97f534340627837e72278a4fd095dcc4', 1, 'Mohammad Syahid Wildan', 'http://jaktrip.net/JAKtrip/assets/img/avadefault.png', ''),
('syifakha', 'syifakha@gmail.com', 1, '2015-03-20 00:00:00', '2015-05-14 22:02:10', 'c083adfbaec3132d28d170ea900749f0', 1, 'Syifa Khairunnisa', 'avadefault.png', 'A happy deadliner.');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id_pic` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(50) NOT NULL,
  `pic` text NOT NULL,
  `pic_info` text,
  `is_publish` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pic`,`place_name`),
  KEY `place_name` (`place_name`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id_pic`, `place_name`, `pic`, `pic_info`, `is_publish`, `username`) VALUES
(21, 'Bundaran HI', './assets/img/place/1/Bundaran_HI-1.jpg', 'https://c1.staticflickr.com/9/8326/8116503286_714262fa43_b.jpg', 1, 'khusnanadia'),
(22, 'Bundaran HI', './assets/img/place/1/Bundaran_HI-2.jpg', 'http://fc06.deviantart.net/images3/i/2004/125/1/4/Bundaran_HI.jpg', 1, 'khusnanadia'),
(23, 'Bundaran HI', './assets/img/place/1/Bundaran_HI-3.jpg', 'http://3.bp.blogspot.com/-bLLeWEmpdoA/UbsTECZh_UI/AAAAAAAAAM0/37HuqEwMnDo/s1600/20130519_IMG_4155.jpg', 1, 'khusnanadia'),
(24, 'Bundaran HI', './assets/img/place/1/Bundaran_HI-4.jpg', 'http://fc07.deviantart.net/fs70/f/2011/152/8/4/bundaran_hi_by_adiyusyfa-d3htqve.jpg', 1, 'khusnanadia'),
(25, 'Bundaran HI', './assets/img/place/1/Bundaran_HI-5.jpg', 'http://cdn5.agoda.net/hotelimages/234/234464/234464_121222035654451_STD.jpg', 1, 'khusnanadia'),
(26, 'Bundaran HI', './assets/img/place/1/Bundaran_HI-6.jpg', 'http://arkasala.net/wp-content/uploads/2012/12/ZBundaranHI1.jpg', 1, 'khusnanadia'),
(27, 'Bundaran HI', './assets/img/place/1/Bundaran_HI-7.jpg', 'http://static.panoramio.com/photos/large/13953562.jpg', 1, 'khusnanadia'),
(28, 'Bundaran HI', './assets/img/place/1/Bundaran_HI-8.jpg', 'https://aws-dist.brta.in/2012-11/2a6a137a9a23af8e723d5f72c5ba93e5.jpg', 1, 'khusnanadia'),
(29, 'Dunia Fantasi', './assets/img/place/2/Dufan-1.jpg', 'http://asacinta.blogdetik.com/files/2014/04/a4d8ca45c251bfbf4992731b15f62fda_a.jpg', 1, 'khusnanadia'),
(30, 'Dunia Fantasi', './assets/img/place/2/Dufan-2.jpg', 'http://exoticaindonesia.com/data/2015/01/dunia-fantasi-a.jpg', 1, 'khusnanadia'),
(31, 'Dunia Fantasi', './assets/img/place/2/Dufan-3.jpg', 'http://www.ancol.com/sites/default/files/styles/1400x710/public/arung-jeram-slider-2.jpg?itok=A7NbC0Wr', 1, 'khusnanadia'),
(32, 'Dunia Fantasi', './assets/img/place/2/Dufan-4.jpg', 'https://tawvic.files.wordpress.com/2012/11/102_8101.jpg', 1, 'khusnanadia'),
(33, 'Dunia Fantasi', './assets/img/place/2/Dufan-5.jpg', 'http://exoticaindonesia.com/data/2015/01/dunia-fantasi-c.jpg', 1, 'khusnanadia'),
(34, 'Dunia Fantasi', './assets/img/place/2/Dufan-7.jpg', 'http://7summitstravel.com/wp-content/oqey_gallery/galleries/galeri-dufan/galimg/dufan6.jpg', 1, 'khusnanadia'),
(35, 'Dunia Fantasi', './assets/img/place/2/Dufan-8.jpg', 'http://www.kawankumagz.com/articleFoto/Dunia_Fantasi_Membuka_Wahana_Baru.jpg', 1, 'khusnanadia'),
(36, 'Kidspace', './assets/img/place/4/Kidspace-1.jpg', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xap1/t31.0-8/c0.386.851.315/p851x315/10683573_1523946237849260_2809334343582788623_o.jpg', 1, 'khusnanadia'),
(37, 'Kidspace', './assets/img/place/4/Kidspace-2.jpg', 'http://www.liburananak.com/images/media/KIDSPACE/KIDSPACE4.jpg', 1, 'khusnanadia'),
(38, 'Kidspace', './assets/img/place/4/Kidspace-3.jpg', 'https://novanyardhitablog.files.wordpress.com/2013/03/wpid-kebayoran-lama-20121208-007521.jpg', 1, 'khusnanadia'),
(39, 'Kidspace', './assets/img/place/4/Kidspace-4.jpg', 'http://www.weekendnotes.com/im/008/00/the-silly-seahorse-indoor-play-centre1.jpg', 1, 'khusnanadia'),
(40, 'Kidspace', './assets/img/place/4/Kidspace-5.jpg', 'http://www.liburananak.com/images/holiday_spots/image_5089390b85840_Kidspace12.jpg', 1, 'khusnanadia'),
(41, 'Kidspace', './assets/img/place/4/Kidspace-6.jpg', 'http://www.liburananak.com/images/media/KIDSPACE/KIDSPACE5.jpg', 1, 'khusnanadia'),
(42, 'Kidspace', './assets/img/place/4/Kidspace-7.jpg', 'https://s-media-cache-ak0.pinimg.com/736x/ff/7b/4b/ff7b4bfe4eb47e50320b9f9ef3511df2.jpg', 1, 'khusnanadia'),
(43, 'Kidspace', './assets/img/place/4/Kidspace-8.jpg', 'http://proto.areamagz.com/alpha/backend/media/data/entry_images/2013/01/15/p1030030_full.jpg', 1, 'khusnanadia'),
(44, 'Kota Tua', './assets/img/place/5/Kotatua-1.jpg', 'http://www.initempatwisata.com/mediafiles/2014/09/Wisata-Kota-Tua-Jakarta.jpg', 1, 'khusnanadia'),
(45, 'Kota Tua', './assets/img/place/5/Kotatua-3.jpg', 'http://surgatraveller.com/wp-content/uploads/2015/02/wisata-kota-tua-jakarta-2.jpg', 1, 'khusnanadia'),
(46, 'Kota Tua', './assets/img/place/5/Kotatua-4.jpg', 'http://yogyakarta.panduanwisata.id/files/2012/06/tua.jpg', 1, 'khusnanadia'),
(47, 'Kota Tua', './assets/img/place/5/Kotatua-5.jpg', 'http://assets.kompasiana.com/statics/files/1400304447334613544.jpg', 1, 'khusnanadia'),
(48, 'Kota Tua', './assets/img/place/5/Kotatua-6.jpg', 'http://fc06.deviantart.net/fs38/i/2008/356/a/a/Jakarta__kota_tua_at_nite_by_kleefs.jpg', 1, 'khusnanadia'),
(49, 'Kota Tua', './assets/img/place/5/Kotatua-8.jpg', 'http://content.rajakamar.com/wp-content/uploads/2013/11/Museum-Wayang-Kota-Tua-Old-Town-Jakarta.jpg', 1, 'khusnanadia'),
(50, 'Museum Bahari', './assets/img/place/6/MuseumBahari-1.jpg', 'http://www.hoetravel.com/wp-content/uploads/2015/01/Museum-Bahari-Maritime-Jakarta.jpg', 1, 'khusnanadia'),
(51, 'Museum Bahari', './assets/img/place/6/MuseumBahari-2.jpg', 'http://porosmaritim.com/wp-content/uploads/2014/08/bahari1.jpg', 1, 'khusnanadia'),
(52, 'Museum Bahari', './assets/img/place/6/MuseumBahari-3.jpg', 'http://jakarta.panduanwisata.id/files/2012/11/211.jpg', 1, 'khusnanadia'),
(53, 'Museum Bahari', './assets/img/place/6/MuseumBahari-4.jpg', 'http://www.indonesia.travel/public/media/images/upload/poi/Pamer_Museum_Bahari.jpg', 1, 'khusnanadia'),
(54, 'Museum Bahari', './assets/img/place/6/MuseumBahari-5.jpg', 'https://ardova.files.wordpress.com/2011/02/100_0138.jpg', 1, 'khusnanadia'),
(55, 'Museum Bahari', './assets/img/place/6/MuseumBahari-6.jpg', 'https://pelangiituaku.files.wordpress.com/2012/10/dsc_0020.jpg', 1, 'khusnanadia'),
(56, 'Museum Bahari', './assets/img/place/6/MuseumBahari-7.jpg', 'http://bimg.antaranews.com/jogja/2012/11/ori/01_Museum_bahari.jpg', 1, 'khusnanadia'),
(57, 'Museum Bahari', './assets/img/place/6/MuseumBahari-8.jpg', 'http://travelblog.ticktab.com/wp-content/uploads/2012/08/museum-bahari-koleksi-e1346233312445.jpg', 1, 'khusnanadia'),
(60, 'Museum Bayt Al-quran', './assets/img/place/7/BaytAlQuran-1.jpg', 'http://id.worldmapz.com/photo/70167_en.htm', 1, 'khusnanadia'),
(61, 'Museum Bayt Al-quran', './assets/img/place/7/BaytAlQuran-2.jpg', 'http://www.tamanmini.com/museum/bayt-al-quran-dan-museum-istiqlal', 1, 'khusnanadia'),
(62, 'Museum Bayt Al-quran', './assets/img/place/7/BaytAlQuran-3.jpg', 'https://sahalart.wordpress.com/2013/12/31/indonesia-akan-menjadi-pusat-peradaban-mushaf-dunia/bayt-al-quran-museum-istiqlal/', 1, 'khusnanadia'),
(63, 'Museum Bayt Al-quran', './assets/img/place/7/BaytAlQuran-4.jpg', 'https://hakiemsyukrie.wordpress.com/mushaf-al-quran-terbesar/', 1, 'khusnanadia'),
(64, 'Museum Bayt Al-quran', './assets/img/place/7/BaytAlQuran-5.jpg', 'http://hariansib.co/view/Mimbar-Agama-Islam/57719/Bayt-Alquran-dan-Museum-Istiqlal-Genap-18-Tahun.html#.VVW2kdKsUUs', 1, 'khusnanadia'),
(66, 'Museum Fatahillah', './assets/img/place/8/MuseumFatahillah-1.JPG', 'http://indonesiaadventure.com/java_images', 1, 'khusnanadia'),
(67, 'Museum Indonesia', './assets/img/place/9/MuseumIndonesia-1.jpg', 'http://id.wikipedia.org/wiki/Museum_Indonesia', 1, 'khusnanadia'),
(68, 'Museum Indonesia', './assets/img/place/9/MuseumIndonesia-2.jpg', 'http://www.panoramio.com/photo/3416246', 1, 'khusnanadia'),
(69, 'Museum Indonesia', './assets/img/place/9/MuseumIndonesia-3.jpg', 'https://princemanoharun.wordpress.com/2013/01/18/tamasya-museum-di-taman-mini-indonesia-indah-bag-iii/', 1, 'khusnanadia'),
(70, 'Museum Indonesia', './assets/img/place/9/MuseumIndonesia-4.jpg', 'https://princemanoharun.wordpress.com/2013/01/18/tamasya-museum-di-taman-mini-indonesia-indah-bag-iii/', 1, 'khusnanadia'),
(71, 'Museum Indonesia', './assets/img/place/9/MuseumIndonesia-5.jpg', 'https://princemanoharun.wordpress.com/2013/01/18/tamasya-museum-di-taman-mini-indonesia-indah-bag-iii/', 1, 'khusnanadia'),
(72, 'Museum Indonesia', './assets/img/place/9/MuseumIndonesia-6.jpg', 'https://princemanoharun.wordpress.com/2013/01/18/tamasya-museum-di-taman-mini-indonesia-indah-bag-iii/', 1, 'khusnanadia'),
(73, 'Museum Keprajuritan', './assets/img/place/10/MuseumKeprajuritan-1.jpg', 'http://hayuratna.blogspot.com/2012/07/picnic-tmii.html', 1, 'khusnanadia'),
(74, 'Museum Keprajuritan', './assets/img/place/10/MuseumKeprajuritan-2.jpg', 'http://www.tamanmini.com/museum/museum-keprajuritan-indonesia', 1, 'khusnanadia'),
(75, 'Museum Keprajuritan', './assets/img/place/10/MuseumKeprajuritan-4.jpg', 'http://www.streetdirectory.co.id/businessfinder/indonesia/jakarta/company_detail.php?companyid=41672&branchid=47820#leaf', 1, 'khusnanadia'),
(76, 'Museum Keprajuritan', './assets/img/place/10/MuseumKeprajuritan-5.jpg', 'http://www.streetdirectory.co.id/businessfinder/indonesia/jakarta/company_detail.php?companyid=41672&branchid=47820#leaf', 1, 'khusnanadia'),
(77, 'Museum Keprajuritan', './assets/img/place/10/MuseumKeprajuritan-7.jpg', 'http://indonesiavirtual.blogspot.com/2013/06/menyaksikan-kedigdayaan-militer.html', 1, 'khusnanadia'),
(78, 'Museum Komodo', './assets/img/place/11/MuseumKomodo-1.jpg', 'http://museumkomodo.com/', 1, 'khusnanadia'),
(79, 'Museum Komodo', './assets/img/place/11/MuseumKomodo-2.jpg', 'http://www.tamanmini.com/museum/museum-fauna-indonesia-komodo-taman-reptil', 1, 'khusnanadia'),
(80, 'Museum Komodo', './assets/img/place/11/MuseumKomodo-3.jpg', 'http://jakarta.panduanwisata.id/jakarta-timur/museum-komodo-mempelajari-fauna-indonesia/', 1, 'khusnanadia'),
(81, 'Museum Komodo', './assets/img/place/11/MuseumKomodo-4.jpg', 'http://article.wn.com/view/2000/09/30/Dr_Ir_Djarot_Binatang_Itu_Jenis_Kadal_Bukan_Ular/', 1, 'khusnanadia'),
(82, 'Museum Listrik dan Energi Baru', './assets/img/place/12/MuseumListrikdanEnergiBaru-1.jpg', 'https://putriprima13.wordpress.com/2014/03/31/berkunjung-ke-museum-3/', 1, 'khusnanadia'),
(83, 'Museum Listrik dan Energi Baru', './assets/img/place/12/MuseumListrikdanEnergiBaru-2.jpg', 'http://www.tamanmini.com/museum/museum-listrik-dan-energi-baru', 1, 'khusnanadia'),
(84, 'Museum Listrik dan Energi Baru', './assets/img/place/12/MuseumListrikdanEnergiBaru-3.jpg', 'http://jakarta.panduanwisata.id/jakarta-timur/belajar-sain-dan-teknologi-di-museum-listrik-dan-energi-baru/', 1, 'khusnanadia'),
(85, 'Museum Listrik dan Energi Baru', './assets/img/place/12/MuseumListrikdanEnergiBaru-4.jpg', 'http://jakarta.panduanwisata.id/jakarta-timur/belajar-sain-dan-teknologi-di-museum-listrik-dan-energi-baru/', 1, 'khusnanadia'),
(86, 'Museum Listrik dan Energi Baru', './assets/img/place/12/MuseumListrikdanEnergiBaru-5.jpg', 'http://www.anatoemon.com/2011/06/museum-listrik.html', 1, 'khusnanadia'),
(87, 'Museum Listrik dan Energi Baru', './assets/img/place/12/MuseumListrikdanEnergiBaru-6.jpg', 'http://kekunaan.blogspot.com/2012/07/museum-listrik-dan-energi-baru.html', 1, 'khusnanadia'),
(88, 'Museum Listrik dan Energi Baru', './assets/img/place/12/MuseumListrikdanEnergiBaru-7.jpg', 'https://gjismyp.wordpress.com/museums/electricity-new-energy-museum-museum-listrik-energi-baru/', 1, 'khusnanadia'),
(89, 'Museum Minyak dan Gas Bumi', './assets/img/place/13/MuseumMinyakDanGasBumi-1.jpg', 'http://1hal.com/listing/museum-minyak-dan-gas-bumi/', 1, 'khusnanadia'),
(90, 'Museum Minyak dan Gas Bumi', './assets/img/place/13/MuseumMinyakDanGasBumi-2.jpg', 'https://www.flickr.com/photos/harun_harahap/sets/72157630967353394', 1, 'khusnanadia'),
(91, 'Museum Minyak dan Gas Bumi', './assets/img/place/13/MuseumMinyakDanGasBumi-3.jpg', 'https://www.flickr.com/photos/harun_harahap/sets/72157630967353394', 1, 'khusnanadia'),
(92, 'Museum Nasional', './assets/img/place/14/MuseumNasional-1.jpg', 'http://keepo.me/groovy-travellers-channel/yuk-berkunjung-menapak-jejak-sejarah-di-museum-nasional', 1, 'khusnanadia'),
(93, 'Museum Nasional', './assets/img/place/14/MuseumNasional-2.jpg', 'http://www.panoramio.com/photo/17872093', 1, 'khusnanadia'),
(94, 'Museum Nasional', './assets/img/place/14/MuseumNasional-3.jpg', 'http://indonesianskeptics.blogspot.com/2013/10/presiden-sby-dan-ibu-ani-gedung-arca-di.html', 1, 'khusnanadia'),
(95, 'Museum Olahraga', './assets/img/place/15/MuseumOlahraga-1.jpg', 'http://kemenpora.go.id/index/preview/album/1101', 1, 'khusnanadia'),
(96, 'Museum Olahraga', './assets/img/place/15/MuseumOlahraga-2.jpg', 'http://kemenpora.go.id/index/preview/album/2478', 1, 'khusnanadia'),
(97, 'Museum Perangko', './assets/img/place/16/MuseumPerangko-1.jpg', 'http://jakarta.panduanwisata.id/jakarta-timur/museum-prangko-menelusuri-sejarah-prangko/', 1, 'khusnanadia'),
(98, 'Museum Perangko', './assets/img/place/16/MuseumPerangko-2.jpg', 'http://aningasalnulis.com/2013/02/06/nostalgia-di-museum-prangko-indonesia/', 1, 'khusnanadia'),
(99, 'Museum Perangko', './assets/img/place/16/MuseumPerangko-3.jpg', 'http://www.indonesiakaya.com/kanal/foto_detail/melihat-sejarah-perangko-indonesia-di-museum-perangko', 1, 'khusnanadia'),
(100, 'Museum Purna Bhakti Pertiwi', './assets/img/place/17/MuseumPurnaBhaktiPertiwi-1.jpg', 'http://nrmnews.com/2012/07/09/museum-purna-bhakti-pertiwi-apresiasi-bagi-pak-harto-dan-wahana-edukasi-di-seputar-tmii/', 1, 'khusnanadia'),
(101, 'Museum Purna Bhakti Pertiwi', './assets/img/place/17/MuseumPurnaBhaktiPertiwi-2.jpg', 'https://alatpenterjemahjakarta.wordpress.com/2014/09/', 1, 'khusnanadia'),
(102, 'Museum Purna Bhakti Pertiwi', './assets/img/place/17/MuseumPurnaBhaktiPertiwi-3.jpg', 'https://novanyardhitablog.wordpress.com/2013/03/24/ensiklopedi-dewi-by-museum-ceria/', 1, 'khusnanadia'),
(103, 'Museum Pusaka', './assets/img/place/18/MuseumPusaka-1.jpg', 'https://www.flickr.com/photos/harun_harahap/sets/72157630967353394', 1, 'khusnanadia'),
(104, 'Museum Pusaka', './assets/img/place/18/MuseumPusaka-2.jpg', 'https://www.flickr.com/photos/harun_harahap/sets/72157630967353394', 1, 'khusnanadia'),
(105, 'Museum Pusaka', './assets/img/place/18/MuseumPusaka-3.jpg', 'https://www.flickr.com/photos/harun_harahap/sets/72157630967353394', 1, 'khusnanadia'),
(106, 'Istana Anak-anak Indonesia', './assets/img/place/34/Istana_Anak-anak_Indonesia-1.jpg', 'https://castlesintheworld.wordpress.com/category/castelli/castelli-dellasia/castelli-dellindonesia/', 1, 'khusnanadia'),
(107, 'Kereta Gantung TMII', './assets/img/place/38/Kereta_Gantung_TMII-1.jpg', 'https://sweetstrawberry.wordpress.com/2008/11/09/sepuluh-hari-di-jakarta/', 1, 'khusnanadia'),
(108, 'Kereta Gantung TMII', './assets/img/place/38/Kereta_Gantung_TMII-2.jpg', 'http://www.tamanmini.com/sarana-keliling/kereta-gantung', 1, 'khusnanadia'),
(109, 'Museum Serangga', './assets/img/place/33/Museum_Serangga-1.jpg', 'http://ndayyy.blogspot.com/2011/02/tmii.html', 1, 'khusnanadia'),
(110, 'Museum Serangga', './assets/img/place/33/Museum_Serangga-2.jpg', 'http://www.tamanmini.com/museum/museum-serangga', 1, 'khusnanadia'),
(111, 'Museum Wayang', './assets/img/place/25/Museum_Wayang-1.jpg', 'http://worldtourismindonesia.blogspot.com/2013/06/museum-wayang-jakarta.html#.VVWkiPmqqko', 1, 'khusnanadia'),
(112, 'Museum Wayang', './assets/img/place/25/Museum_Wayang-2.jpg', 'http://www.museumwayang.com/', 1, 'khusnanadia'),
(113, 'Planetarium', './assets/img/place/26/Planetarium-1.jpg', 'http://interpretersystemjakarta.blogspot.com/2013_12_01_archive.html', 1, 'khusnanadia'),
(114, 'Planetarium', './assets/img/place/26/Planetarium-2.jpg', 'http://blog.kagum-hotel.com/', 1, 'khusnanadia'),
(115, 'Pusat Peragaan IPTEK', './assets/img/place/27/Pusat_Peragaan_IPTEK-1.jpg', 'http://ppiptek-tmii.blogspot.com/p/blog-page_4.html', 1, 'khusnanadia'),
(116, 'Pusat Peragaan IPTEK', './assets/img/place/27/Pusat_Peragaan_IPTEK-2.jpg', 'http://www.tamanmini.com/wahana-rekreasi/pusat-peragaan-iptek', 1, 'khusnanadia'),
(117, 'Seaworld Indonesia', './assets/img/place/28/Seaworld_Indonesia-1.jpg', 'http://i.ytimg.com/vi/Z1HDIgvdQK8/maxresdefault.jpg', 1, 'khusnanadia'),
(118, 'Seaworld Indonesia', './assets/img/place/28/Seaworld_Indonesia-2.jpg', 'http://panel.mustangcorps.com/admin/fl/upload/files/sea_world.jpg', 1, 'khusnanadia'),
(119, 'Snowbay', './assets/img/place/29/Snowbay-1.jpg', 'http://www.snowbay.co.id/', 1, 'khusnanadia'),
(120, 'Snowbay', './assets/img/place/29/Snowbay-2.jpg', 'http://www.snowbay.co.id/', 1, 'khusnanadia'),
(149, 'Museum Tekstil', './assets/img/place/21/Museum-tekstil-1.jpg', 'Uploaded by mohammadsyahidw', 1, 'mohammadsyahidw'),
(150, 'Museum Telekomunikasi', './assets/img/place/22/museum-telekomunikasi-1.jpg', 'Uploaded by mohammadsyahidw', 1, 'mohammadsyahidw'),
(152, 'Museum Transportasi', './assets/img/place/24/Museum-transportasi-1.jpg', 'Uploaded by mohammadsyahidw', 1, 'mohammadsyahidw');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `id_promo` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `title` varchar(160) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_promo`),
  KEY `place_name` (`place_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `start_date`, `end_date`, `place_name`, `photo`, `title`, `description`) VALUES
(17, '2015-05-15', '2015-05-31', 'Dunia Fantasi', './assets/img/promo/PromoDufan-1.jpg', 'Khusus Bikers Jabodetabek', 'Weekdays: 95000\r\nWeekend: 135000'),
(18, '2015-05-15', '2015-06-05', 'Snowbay', './assets/img/promo/PromoSnowbay-11.jpg', 'Diskon 40% dengan BNI', 'Berlaku untuk semua jenis Kartu Kredit BNI (termasuk iB Hasanah Card dan CoBrand & Affinity), Kartu Debit BNI, serta Kartu TapCash BNI kecuali Kartu Debit BNI Syariah & Corporate Card.Setiap kartu maksimal dapat membeli tiket masuk sebanyak 4 buah.Syarat & ketentuan berlaku.');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id_rate` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `rate` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `review` text NOT NULL,
  `is_nudity` int(11) NOT NULL DEFAULT '0',
  `is_spam` int(11) NOT NULL DEFAULT '0',
  `is_falsestatement` int(11) NOT NULL DEFAULT '0',
  `is_unrelatedcontent` int(11) NOT NULL DEFAULT '0',
  `is_profanity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rate`,`username`),
  KEY `username` (`username`),
  KEY `place_name` (`place_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rate`, `username`, `place_name`, `rate`, `title`, `review`, `is_nudity`, `is_spam`, `is_falsestatement`, `is_unrelatedcontent`, `is_profanity`) VALUES
(4, '1077143442299652', 'Museum Bayt Al-quran', 4, 'bagus', 'Bagus banget', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `suggest_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`suggest_id`,`username`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tourist_attraction`
--

CREATE TABLE IF NOT EXISTS `tourist_attraction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(50) NOT NULL,
  `weekday_price` int(10) NOT NULL,
  `weekend_price` int(10) NOT NULL,
  `longitude` float NOT NULL,
  `lattitude` float NOT NULL,
  `city` varchar(30) NOT NULL,
  `rate_avg` float NOT NULL,
  `description` text NOT NULL,
  `place_info` varchar(50) DEFAULT NULL,
  `halte_code` varchar(10) NOT NULL,
  `transport_info` varchar(100) NOT NULL,
  `transport_price` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `visitors` int(11) NOT NULL DEFAULT '0',
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link_web` text,
  `pic_thumbnail` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `place_name` (`place_name`),
  KEY `halte_code` (`halte_code`),
  KEY `place_info` (`place_info`),
  KEY `author` (`author`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tourist_attraction`
--

INSERT INTO `tourist_attraction` (`id`, `place_name`, `weekday_price`, `weekend_price`, `longitude`, `lattitude`, `city`, `rate_avg`, `description`, `place_info`, `halte_code`, `transport_info`, `transport_price`, `author`, `visitors`, `last_modified`, `link_web`, `pic_thumbnail`) VALUES
(1, 'Bundaran HI', 0, 0, -6.1946, 106.823, 'Jakarta Pusat', 0, 'Monumen Selamat Datang adalah sebuah monumen yang terletak di tengah Bundaran Hotel Indonesia, Jakarta, Indonesia. Monumen ini berupa patung sepasang manusia yang sedang menggenggam bunga dan melambaikan tangan. Patung tersebut menghadap ke utara yang berarti mereka menyambut orang-orang yang datang dari arah Monumen Nasional.', NULL, 'K1.11', 'Jalan 0,2 km', 0, 'khusnanadia', 3, '2015-05-15 06:20:11', 'http://id.wikipedia.org/wiki/Monumen_Selamat_Datang', './assets/img/place/1/Bundaran_HI-1.jpg'),
(2, 'Dunia Fantasi', 150000, 250000, -6.12383, 106.832, 'Jakarta Utara', 0, 'jam Operasi\r\nSenin-Jumat: 10.00-18.00WIB Sabtu/Minggu/Libur: 10.00-20.00WIB\r\n\r\nTiket Reguler\r\nWeekday Rp 190.000,-\r\nWeekend Rp. 270.000 \r\nAnnual Pass Rp. 280.000', 'Taman Impian Jaya Ancol', 'K5.01', 'jalan kaki', 0, 'khusnanadia', 1, '2015-05-15 06:23:45', 'http://www.ancol.com/destinasi/dunia-fantasi', './assets/img/place/2/Dufan-1.jpg'),
(3, 'Kebun Binatang Ragunan', 4000, 4000, -6.31245, 106.82, 'Jakarta Selatan', 0, 'Welcome to Ragunan Zoo, a 147 hectares park and home for 2.000 specimen and are covered more than 50.000 trees those become environment are cool and comfort. The lands are designed and are built and some are still developing on lead to a modern zoo as identity of Jakarta city.', NULL, 'K6.01', 'jalan 0,9 km', 0, 'khusnanadia', 1, '2015-05-15 09:15:38', 'http://ragunanzoo.jakarta.go.id/?page_id=65', './assets/img/place/3/Ragunan-1.jpg'),
(4, 'Kidspace', 75000, 100000, -6.25195, 106.779, 'Jakarta Selatan', 0, 'Kidspace adalah pusat kreativitas anak usia 6 bulan â€“ 12 tahun, tempat dimana anak berkesempatan untuk bereksplorasi, membangun pondasi dan kepercayaan diri.\r\n\r\nDi tempat ini, anak-anak bisa bermain dan belajar sambil mengasahkemampuan motorik, sosialisasi serta kreativitas. Program yang ditawarkan Kids Space sangat beragam dari mulai Kids Sport (Gym Class), Fun Science (Science Program), Kids Extra (Extra Curricular) dan Kids Club (Playgroup).', NULL, 'K8.04', 'Naik Kopaja AC S13 atau kendaraan umum D01 dari perempatan lampu merah PIM2', 7500, 'khusnanadia', 2, '2015-05-15 06:33:58', 'http://kidspacejakarta.com/', './assets/img/place/4/Kidspace-1.jpg'),
(5, 'Kota Tua', 0, 0, -6.1352, 106.813, 'Jakarta Barat', 0, 'Kota Tua Jakarta, juga dikenal dengan sebutan Batavia Lama (Oud Batavia), adalah sebuah wilayah kecil di Jakarta, Indonesia. Wilayah khusus ini memiliki luas 1,3 kilometer persegi melintasi Jakarta Utara dan Jakarta Barat (Pinangsia, Taman Sari dan Roa Malaka).', NULL, 'K12.09', 'Jalan 0,21 km', 0, 'khusnanadia', 0, '2015-05-15 06:50:42', 'http://id.wikipedia.org/wiki/Kota_Tua_Jakarta', './assets/img/place/5/Kotatua-1.jpg'),
(7, 'Museum Bayt Al-quran', 0, 0, -6.30255, 106.887, 'Jakarta Timur', 0, 'Bayt al Quran & Museum Istiqlal merupakan kesatuan dari dua lembaga yang berbeda namun dalam kesatuan konsep. Bayt al Quran, yang berarti rumah Al Quran, dengan materi pokok berupa peragaan yang berkaitan dengan Al Quran, sedangkan Museum Istiqlal menampilkan hasil-hasil kebudayaan Islam Indonesia.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 1, '2015-05-15 07:11:49', 'http://id.wikipedia.org/wiki/Bayt_Al_Qur''an_dan_Museum_Istiqlal', './assets/img/place/7/BaytAlQuran-1.jpg'),
(8, 'Museum Fatahillah', 2000, 2000, -6.13521, 106.813, 'Jakarta Barat', 0, 'Museum Fatahillah yang juga dikenal sebagai Museum Sejarah Jakarta atau Museum Batavia adalah sebuah museum yang terletak di Jalan Taman Fatahillah No. 2, Jakarta Barat dengan luas lebih dari 1.300 meter persegi.', 'Kota Tua', 'K12.09', 'jalan 0,15 km', 0, 'fakhirahdg', 0, '2015-05-15 07:22:14', 'http://id.wikipedia.org/wiki/Museum_Fatahillah', './assets/img/place/8/MuseumFatahillah-1.JPG'),
(9, 'Museum Indonesia', 15000, 15000, -6.30397, 106.901, 'Jakarta Timur', 0, 'Museum Indonesia, adalah museum antropologi dan etnologi yang terletak di Taman Mini Indonesia Indah (TMII), Jakarta, Indonesia. Museum ini berkonsentrasi pada seni dan budaya berbagai suku bangsa yang menghuni Nusantara dan membentuk negara kesatuan Republik Indonesia. Museum ini bergaya arsitektur Bali dan dihiasi beraneka ukiran dan patung Bali yang sangat halus dan indah. Museum ini menyimpan koleksi beraneka seni, kerajinan, pakaian tradisional dan kontemporer dari berbagai daerah di Indonesia.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 07:54:23', 'http://id.wikipedia.org/wiki/Museum_Indonesia', './assets/img/place/9/MuseumIndonesia-1.jpg'),
(10, 'Museum Keprajuritan', 2500, 2500, -6.30525, 106.897, 'Jakarta Timur', 0, 'Buka Selasa - Minggu pukul 09.00 - 16.0009.00 - 16.00 wib\r\n\r\n\r\nHarga tiket masuk Rp. 2.500/orang\r\n\r\n\r\nInfo lebih lanjuthubungi\r\n\r\n\r\nTelp. 021-8401080\r\n\r\n\r\nFaks. 021-8401080', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 07:47:49', 'http://www.tamanmini.com/museum/museum-keprajuritan-indonesia', './assets/img/place/10/MuseumKeprajuritan-1.jpg'),
(11, 'Museum Komodo', 15000, 15000, -6.30372, 106.902, 'Jakarta Timur', 0, 'Museum fauna Indonesia Komodo adalah museum yang bertemakan dunia satwa Indonesia dalam bentuk awetan. Bangunan museum sangat unik karena ruang pameran berbentuk Komodo, jenis reptile purba yang hidup di habitat aslinya Pulau Komodo, Nusa Tenggara Timur. Museum ini didirikan di atas lahan 10.120 m2 dengan luas bangunan 1.500 m2, dibangun mulai tanggal 1 Oktober 1975 sampai dengan 1 Juli 1976, dan diresmikan pada tanggal 20 April 1978 oleh prsiden Soeharto. Museum Komodo sangat cocok untuk pengunjung usia anak-anak dan pelajar guna melihat kekayaan fauna Indonesia yang disajikan dalam bentuk diorama yang menarik. Tak kurang dari 150 jenis binatang yang sudah diawetkan, diperagakan dalam ruang-ruang kaca di gendung berlantai dua tersebut. Pameran keanekaragaman fauna dari kepulauan Nusantara ini disajikan berdasarkan kelompok persebarannya, yakni dari daerah barat ke timur dan dari pantai ke pegunungan. Dari barat ke timur menunjukan persebaran hewan dari Sumatera sampai Papua, sedangkan dari pantai ke pegunungan menunjukan habitatanya, yakni tempat dimana satwa tersebut hidup.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 07:54:49', 'http://www.tamanmini.com/museum/museum-fauna-indonesia-komodo-taman-reptil', './assets/img/place/11/MuseumKomodo-1.jpg'),
(12, 'Museum Listrik dan Energi Baru', 10000, 10000, -6.29472, 106.882, 'Jakarta Timur', 0, 'Museum listrik dan energi baru (museum LEB) adalahsalah satu museum sanin yang menyajikan koleksi peragaan tentang energi dan listrik. Gagasan pembangunan museum LEB dicetuskan oleh menteri pertambangan dan energi, Ir. Ginanjar Kartasasmita bersamaan dengan peringatan 100 tahun keenagalisrikan di Indonesia dan diresmikan pada tanggal 20 April 1995 oleh Presiden Soeharto.\r\n', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 08:04:32', 'http://www.tamanmini.com/museum/museum-listrik-dan-energi-baru', './assets/img/place/12/MuseumListrikdanEnergiBaru-1.jpg'),
(13, 'Museum Minyak dan Gas Bumi', 2000, 2000, -6.30242, 106.895, 'Jakarta Timur', 0, 'Museum Minyak dan Gas Bumi adalah museum yang dibangun untuk menandai peringatan 100 tahun industri minyak dan gas bumi Indonesia. Gagasan pendiriannya lahir ketika pembukaan upacara Konvensi Tahunan Indonesia Petroleum Association ke-14 pada tanggal 8 Oktober 1985. pembangunan fisiknya dilakukan pada tahun 1987. Akhirnya, berkat usaha dan sumbangan masyarakat perminyakan Indonesia demi melestarikan dan mewariskan nilai-nilai juang kepada generasi penerus untuk meningkatkan ilmu dan teknologi, museum ini resmi dibuka pada tanggal 20 April 1989 oleh Presiden Soeharto.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 08:15:02', 'http://www.tamanmini.com/museum/museum-minyak-dan-gas-bumi', './assets/img/place/13/MuseumMinyakDanGasBumi-1.jpg'),
(14, 'Museum Nasional', 5000, 5000, -6.17639, 106.822, 'Jakarta Pusat', 0, 'Waktu Kunjungan & Tiket Masuk\r\nWaktu Kunjungan\r\n\r\nSenin dan hari besar nasional : Tutup\r\n\r\nSelasa - Jum''at : 08.00 - 16.00\r\n\r\nSabtu - Minggu : 08.00 - 17.00\r\n\r\nTiket Masuk\r\n\r\n1. Pengunjung Perorangan : \r\n\r\na. Dewasa : Rp 5.000,-  \r\nb. Anak-anak : Rp 2.000,-\r\n\r\n2. Pengunjung Rombongan (minimum 20 orang)\r\n\r\na. Dewasa : Rp 3.000,-  \r\nb. Anak-anak (TK s.d. SMA) Rp 1.000,-\r\n\r\n3. Pengunjung Asing Rp 10.000,- ', NULL, 'K2.29', 'jalan 0,5 km', 0, 'khusnanadia', 0, '2015-05-15 08:16:50', 'http://www.museumnasional.or.id/', './assets/img/place/14/MuseumNasional-1.jpg'),
(15, 'Museum Olahraga', 2000, 2000, -6.30309, 106.889, 'Jakarta Timur', 0, 'Museum olah raga diresmikan oleh Presiden Soeharto pada tanggal 20 April 1989, bertepatan dengan HUT TMII ke-14. Bangunan museum berbentuk bola, menghadap ke arah Teater Keong Emas, berdiri di atas tanah seluas 1,5 ha dengan luas bangunan 3.000 m2.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 08:18:39', 'http://www.tamanmini.com/museum/museum-olahraga', './assets/img/place/15/MuseumOlahraga-1.jpg'),
(16, 'Museum Perangko', 5000, 5000, -6.30372, 106.902, 'Jakarta Timur', 0, 'Alamat:\r\nMUSEUM PRANGKO INDONESIA\r\nTaman Mini Indonesia Indah\r\nJakarta 13560\r\nTelp. 021-707 321 44, 840 9286\r\nFax. 021-840 1310 \r\nJam Kunjungan:\r\nSelasa-Sabtu 08.00-16.00\r\nMinggu-Hari Libur Nasional 08.00-17.00\r\nSenin Libur\r\nTiket:\r\nTiket Taman Mini Indonesia Indah Rp 9.000,00\r\nTiket Museum Prangko Indonesia Rp 2.000,00\r\nTanggal 20 April, ultah TMII, biasanya masuk TMII gratis', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 08:20:02', 'http://www.museumindonesia.com/museum/24/1/Museum_Prangko_Indonesia_Jakarta_', './assets/img/place/16/MuseumPerangko-1.jpg'),
(18, 'Museum Pusaka', 10000, 10000, -6.3054, 106.896, 'Jakarta Timur', 0, 'Museum pusaka berada di jalur selatan antara Museum Keprajuritan Indonesia dan Museum Serangga, berupa bangunan khas karena di atas atapnya terdapat bentuk Keris yang menjulang. Luas bangunannya 1.535 m2. Pembangunannya dimulai pada tanggal 1 September 1992 dan diresmikan oleh Presiden Soeharto tanggal 20 April 1993. Pada awalnya, koleksi museum pusaka merupakan koleksi pribadi Mas Agung, kemudian dihibahkan oleh Dra. Hj. Sri Lestari Mas Agung kepada Hj. Siti Hartinah Soeharto selaku ketua Yayasan Kita. Setelah ditambah dengan pembelian, Museum Pusaka memiliki koleksi senjata tradisional paling lengkap, mewakili 26 provinsi di Indonesia. Museum pusaka dibangun dengan tujuan melestarikan, merawat, mengumpulkan, serta menginformasikan benda-benda budaya yang berupa senjata tradisional kepada generasi penerus agar merasa bangga terhadap bangsanya dan dapat dimanfaatkan bagi yang ingin melakukan studi penelitian mengenai senjata.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 08:24:17', 'http://www.tamanmini.com/museum/museum-pusaka', './assets/img/place/18/MuseumPusaka-1.jpg'),
(20, 'Museum Seni Rupa dan Keramik', 5000, 5000, -6.13422, 106.814, 'Jakarta Barat', 0, 'Alamat:\r\nMuseum Seni Rupa dan Keramik\r\n(Taman Fatahillah)\r\nJl.Pos Kota no.2\r\nJakarta Barat\r\nJam Kunjungan:\r\nSelasa-Minggu 09.00-15.00\r\nHari Senin dan hari besar tutup\r\nTiket:\r\nPerorangan\r\nDewasa Rp 2.000,00\r\nMahasiswa Rp 1.000,00\r\nAnak-anak/pelajar Rp 600,00\r\nRombongan (minimal 20 orang)\r\nDewasa Rp 1.500,00\r\nMahasiswa Rp 750,00\r\nAnak-anak Rp 500,00', 'Kota Tua', 'K12.09', 'Jalan 0,52 km', 0, 'khusnanadia', 0, '2015-05-16 18:25:24', 'http://www.museumindonesia.com/museum/37/1/Museum_Seni_Rupa_dan_Keramik_Jakarta', './assets/img/place/20/Museum-seni-rupa-2.jpg'),
(21, 'Museum Tekstil', 5000, 5000, -6.18768, 106.81, 'Jakarta Pusat', 0, 'Jakarta Textile Museum is a cultural educational institution, has a mission to conserve traditional textile. \r\n\r\nTextile has always been an important part of life in Indonesia as a component of dress and as a ritual and ceremonial objects. They constitute a very rich aspect of Indonesian culture and a testament of the degree of technological expertise and artistic skill attained by their maker. They also provide a window into local histories. \r\n\r\nIn it''s effort to increase public appreciation of Indonesia''s textile tradition and participation in the preservation of national heritage. Jakarta Textile Museum always make an effort inform and educate people trough exhibition, seminar, workshop, research and publication. ', NULL, 'K9.11', 'Naik Mikrolet M11 sepanjang 3,7 km', 4000, 'khusnanadia', 0, '2015-05-16 18:26:15', 'http://museumtekstiljakarta.com/', './assets/img/place/21/Museum-tekstil-1.jpg'),
(22, 'Museum Telekomunikasi', 2000, 2000, -6.30299, 106.889, 'Jakarta Timur', 0, 'Museum Telekomunikasi adalah salah satu museum sains yang dapat menjadi sumber informasi mengenai perkembangan pertelekomunikasian di Indonesia. Bangunan museum berbentuk kubah berwarna biru yang diddepannya terdapat Monumen Sumpah Palapa, Maha Patih Gajah Mada sedang berdiri tegak sambil mengacungkan sebilah keris. Adegan ini mengingatkan pada satelit komunikasi pertama Indonesia yang diberi nama Palapa, sesuai jiwa sumpah Palapa menyatukan Nusantara.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-16 18:26:43', 'http://www.tamanmini.com/museum/museum-telekomunikasi', './assets/img/place/22/museum-telekomunikasi-1.jpg'),
(25, 'Museum Wayang', 2000, 0, -6.13502, 106.813, 'Jakarta Barat', 0, 'Letak bangunan gedung Museum Wayang di Jl. Pintu Besar Utara No. 27. pada mulanya merupakan lokasi gereja tua yang didirikan VOC pada tahun 1640 dengan nama de oude Hollandsche sampai tahun 1732 yang berfungsi sebagai tempat untuk peribadatan penduduk sipil dan tentara bangsa Belanda yang tinggal di Batavia.', 'Kota Tua', 'K12.09', 'Jalan 0,3 km', 0, 'khusnanadia', 0, '2015-05-15 08:42:23', 'http://www.museumwayang.com/', './assets/img/place/25/Museum_Wayang-1.jpg'),
(26, 'Planetarium', 7000, 7000, -6.19006, 106.839, 'Jakarta Pusat', 0, 'Planetarium adalah gedung teater untuk memperagakan simulasi susunan bintang dan benda-benda langit. Atap gedung biasanya berbentuk kubah setengah lingkaran. Di planetarium, penonton bisa belajar mengenai pergerakan benda-benda langit di malam hari dari berbagai tempat di bumi dan sejarah alam semesta. Planetarium berbeda dari observatorium. Kubah planetarium tidak bisa dibuka untuk meneropong bintang.', NULL, 'K1.05', 'Naik Kopaja 68', 4000, 'khusnanadia', 1, '2015-05-15 09:05:42', 'http://id.wikipedia.org/wiki/Planetarium', './assets/img/place/26/Planetarium-1.jpg'),
(27, 'Pusat Peragaan IPTEK', 16500, 16500, -6.30217, 106.903, 'Jakarta Timur', 0, 'Tiket masuk PP-IPTEK adalah Rp 16.500,-/orang, dengan ketentuan sebagai berikut:\r\n\r\n     a. Apabila melakukan pembayaran pada saat konfirmasi/sebelum hari kunjungan:\r\n\r\n         Â· Harga rombongan dengan minimal 40 orang adalah Rp. 14.850,-/orang.\r\n         Â· Pelunasan dilakukan sebelum kunjungan H-3 (dan tidak dapat DP)\r\n         Â· Setiap kelipatan 100 orang, akan mendapatkan voucher gratis masuk PP-IPTEK untuk 10 orang (50% \r\n           digunakan saat kunjungan sisanya untuk kunjungan berikutnya).\r\n- See more at: http://ppiptek.ristek.go.id/ketentuan-kunjungan#sthash.FpqDWTuu.dpuf', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 08:45:25', 'http://ppiptek.ristek.go.id/', './assets/img/place/27/Pusat_Peragaan_IPTEK-1.jpg'),
(28, 'Seaworld Indonesia', 80000, 90000, -6.12577, 106.843, 'Jakarta Utara', 0, 'Seaworld Indonesia adalah sebuah miniatur pesona laut yang terdapat dalam kompleks wisata pertama di Telaga Golf dan kedua terpadu Ancol Jakarta Baycity.', 'Taman Impian Jaya Ancol', 'K5.01', 'Naik ?', 0, 'khusnanadia', 0, '2015-05-15 08:46:39', 'http://id.wikipedia.org/wiki/Seaworld_Indonesia', './assets/img/place/28/Seaworld_Indonesia-1.jpg'),
(29, 'Snowbay', 120000, 150000, -6.29968, 106.892, 'Jakarta Timur', 0, 'Waterpark yang imajinatif dengan suasana pegunungan bersalju artistik mencakup 70% sebagian besar kawasan, memberikan atraksi air terbaik dan pengalaman yang luar biasa, menggabungkan permainan air dan hiburan untuk memberikan pengalaman lebih menyenangkan dan berkesan bagi anda.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'syifakha', 0, '2015-05-15 08:47:57', 'http://www.snowbay.co.id/', './assets/img/place/29/Snowbay-1.jpg'),
(30, 'Taman Impian Jaya Ancol', 25000, 25000, -6.12504, 106.838, 'Jakarta Utara', 0, 'Taman Impian Jaya Ancol merupakan sebuah objek wisata di Jakarta Utara. Sebagai komunitas pembaharuan kehidupan masyarakat yang menjadi kebanggaan bangsa. Senantiasa menciptakan lingkungan sosial yang lebih baik melalui sajian hiburan berkualitas yang berunsur seni, budaya dan pengetahuan, dalam rangka mewujudkan komunitas ''Life Re-Creation'' yang menjadi kebanggaan bangsa.', 'Taman Impian Jaya Ancol', 'K5.01', 'Naik ...', 0, 'khusnanadia', 0, '2015-05-15 08:52:11', 'https://www.ancol.com/http://id.wikipedia.org/wiki/Taman_Impian_Jaya_Ancol', './assets/img/place/30/Taman_Impian_Jaya_Ancol-1.PNG'),
(31, 'Taman Mini Indonesia Indah', 10000, 0, -6.30291, 106.897, 'Jakarta Timur', 0, 'Pintu Masuk TMII	Perorangan Normal ( 3 tahun keatas)	Rp. 10.000,-\r\nSenin - Minggu	Mobil	Rp. 10.000,-\r\nJam Operasional 07.00 - 22.00 WIB	Bus/Truk	Rp. 30.000,-\r\nMotor	Rp. 6.000,-\r\nSepeda	Rp. 1.000,-', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'mohammadsyahidw', 0, '2015-05-15 08:58:04', 'http://www.tamanmini.com/', './assets/img/place/31/Taman_Mini_Indonesia_Indah-1.jpg'),
(33, 'Museum Serangga', 25000, 25000, -6.30569, 106.895, 'Jakarta Timur', 0, 'Museum serangga adalah salah satu wahana untuk memperkenalkan keanekaragaman dunia serangga sekaligus merangsang keinginan dan kepedulian masyarakat terhadap perannya di alam.\r\nDi tempat ini terdapat banyak koleksi serangga yang cukup unik, seperti Kumbang Badak terbesar nomor dua terbesar di dunia, belalang daun yang tubuhnya sama dengan daun, kumbang gitar, belalang ranting, dan juga Kupu-kupu tersimpan dalam kotak-kotak berbingkai. Museum Serangga juga dilengkapi dengan laboratorium yang digunakan sebagai sarana penangkaran dan terbukan bagi mahasiswa dan pelajar yang ingin belajar bagaimana mengoleksi, membuat awetan serangga, identifikasi serta memelihara serangga hidup dan mati. selain itu, museum juga menyediakan layanan untuk menambah pengetahuan mengenai berbagai hal yang berhubungan dengan serangga, misalnya bimbingan umum tentang serangga dan kehidupannya, pemutaran film tentang kehidupan serangga dan penjelasan di ruang audio-visual, bimbingan mengawetkan serangga dan penangkaran serangga (kupu, belalang ranting dan belalang daun), yang dilengkapi dengan perpustakaan.\r\nSelain koleksi serangga mati, museum ini juga mempunyai kleksi serangga hidup yang dapat dilihat langsung oleh pengunjung, antara lain : kumbang tanduk, kumbang air, lebah madu, belalang ranting, belalang daun, kumbang badak dan lain-lain.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 08:40:37', 'http://www.tamanmini.com/museum/museum-serangga', './assets/img/place/33/Museum_Serangga-1.jpg'),
(34, 'Istana Anak-anak Indonesia', 15000, 15000, -6.30311, 106.901, 'Jakarta Timur', 0, 'Jam Operasional 08.30 - 17.00 WIB\r\nPintu Masuk	Rp. 10.000,-\r\nKereta Api Kelinci	Rp. 10.000,-\r\nMandi Bola	Rp. 5.000,-\r\nKolam Renang	Rp. 15.000,-\r\nBumper Car	Rp. 15.000,-\r\nAir Plane	Rp. 10.000,-\r\nMonorail	Rp. 10.000,-\r\nKomedi Putar	Rp. 10.000,-\r\nRoda Tamasya	Rp. 10.000,-\r\nKiddy Boat	Rp. 10.000,-\r\nBaterry Car	Rp. 10.000,-\r\nPesawat Capung	Rp. 10.000,-\r\nFancy Animal	Rp. 10.000,-\r\nGiring Ombak	Rp. 10.000,-', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 08:37:14', 'http://www.tamanmini.com/page/tiket', './assets/img/place/34/Istana_Anak-anak_Indonesia-1.jpg'),
(36, 'Taman Bunga Keong Emas', 10000, 10000, -6.30404, 106.891, 'Jakarta Timur', 0, 'Taman Bunga Keong Emas (TBKE) adalah sarana rekreasi taman yang menampilkan pesona bunga dan tanaman hias yang indah, asri, dan nyaman sekaligus sebagai sumber ilmu pengetahuan dunia Flora Indonesia. Taman ini dibangun diatas lahan seluas 7 hektar yang terletak di belakang Teater Imax Keong Emas dan diresmikan oleh Prasiden Soeharto pada tanggal 20 April 1986.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 09:06:10', 'http://www.tamanmini.com/taman/taman-bunga-keong-mas', './assets/img/place/36/Taman_Bunga_Keong_Mas-1.jpg'),
(38, 'Kereta Gantung TMII', 40000, 40000, -6.30174, 106.89, 'Jakarta Timur', 0, 'Kereta gantung(skylift) adalah perintis kendaraan untuk objek wisata di indonesia. Kereta gantung ini memiliki tiga stasiun A, B, dan C dengan lintasan stasiun A-stasiun B dan stasiun C atau sebaliknya. Stasiun A berada di sebelah timur lapangan parkir selatan di kawasan desa seni dan kerajinan, stasiun B terletak di seberang anjungan papua dan dekat dengan taman burung, sedang stasiun C berada di sebelah utara lapangan parkir utara atau dekat snowbay waterpark.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 09:05:25', 'http://www.tamanmini.com/sarana-keliling/kereta-gantung', './assets/img/place/38/Kereta_Gantung_TMII-1.jpg'),
(39, 'Taman Burung', 20000, 20000, -6.30234, 106.896, 'Jakarta Timur', 0, 'Koleksi burung yang ada di Taman Burung merupakan yang terlengkap di Indonesia, terdiri atas 175 jenis dengan jumlah mencapai ribuan ekor, baik yang berasal dari Indonesia bagian Barat maupun Indonesia bagian timur. Taman Burung dilengkapi sarana karantina sebagai tempat memisahkan burung-burung yang sakit untuk mendapatkan perawatan.', 'Taman Mini Indonesia Indah', 'K9.25', 'Naik angkot T15A atau K40 sepanjang 2 km', 4000, 'khusnanadia', 0, '2015-05-15 09:08:35', 'http://www.tamanmini.com/taman/taman-burung', './assets/img/place/39/Taman_Burung-1.jpg'),
(42, 'Taman Menteng', 0, 0, -6.19617, 106.83, 'Jakarta Pusat', 0, 'Taman ini diresmikan  Pemprov DKI Jakarta pada 28 April 2007 lalu ini selain untuk menambah ruang terbuka hijau (RTH) di Jakarta, pembangunan taman yang berlokasi di jalan raya HOS Cokroaminoto, Menteng, Jakarta Pusat ini, juga ditujukan sebagai sarana publik yang bisa sedikit "menyegarkan" warga Jakarta.', NULL, 'K1.11', 'Naik Kopaja AC P20', 5000, 'khusnanadia', 0, '2015-05-15 08:56:40', 'http://lifestyle.okezone.com/read/2011/06/13/407/467623/taman-menteng-taman-kota-yang-lengkap', './assets/img/place/42/Taman_Menteng-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tour_category`
--

CREATE TABLE IF NOT EXISTS `tour_category` (
  `place_name` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`place_name`,`category_name`),
  KEY `tour_category_ibfk_2` (`category_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_category`
--

INSERT INTO `tour_category` (`place_name`, `category_name`) VALUES
('Bundaran HI', 'View'),
('Dunia Fantasi', 'Outdoor Play'),
('Dunia Fantasi', 'Theme Park'),
('haha', 'View'),
('Istana Anak-anak Indonesia', 'Indoor Play'),
('Istana Anak-anak Indonesia', 'Outdoor Play'),
('Istana Anak-anak Indonesia', 'Theme Park'),
('Kebun Binatang Ragunan', 'Zoo'),
('Kereta Gantung TMII', 'Outdoor Play'),
('Kereta Gantung TMII', 'View'),
('Kidspace', 'Indoor Play'),
('Kota Tua', 'Theme Park'),
('Kota Tua', 'View'),
('Museum Bahari', 'Museum'),
('Museum Bayt Al-quran', 'Museum'),
('Museum Fatahillah', 'Museum'),
('Museum Indonesia', 'Museum'),
('Museum Keprajuritan', 'Museum'),
('Museum Komodo', 'Museum'),
('Museum Listrik dan Energi Baru', 'Museum'),
('Museum Minyak dan Gas Bumi', 'Museum'),
('Museum Nasional', 'Museum'),
('Museum Olahraga', 'Museum'),
('Museum Perangko', 'Museum'),
('Museum Purna Bhakti Pertiwi', 'Museum'),
('Museum Pusaka', 'Museum'),
('Museum Satria Mandala', 'Museum'),
('Museum Seni Rupa dan Keramik', 'Museum'),
('Museum Serangga', 'Education'),
('Museum Tekstil', 'Museum'),
('Museum Telekomunikasi', 'Museum'),
('Museum Timor Timur', 'Museum'),
('Museum Transportasi', 'Museum'),
('Museum Wayang', 'Museum'),
('Pemancingan Ikan', 'Aquarium'),
('Planetarium', 'Education'),
('Planetarium', 'Theatre'),
('Planetarium', 'View'),
('Pusat Peragaan IPTEK', 'Education'),
('Seaworld Indonesia', 'Aquarium'),
('Seaworld Indonesia', 'Education'),
('Seaworld Indonesia', 'Zoo'),
('Snowbay', 'Water Park'),
('Taman Bunga Keong Emas', 'City Park'),
('Taman Bunga Keong Emas', 'View'),
('Taman Burung', 'City Park'),
('Taman Impian Jaya Ancol', 'Outdoor Play'),
('Taman Impian Jaya Ancol', 'Theme Park'),
('Taman Menteng', 'City Park'),
('Taman Menteng', 'Outdoor Play'),
('Taman Menteng', 'View'),
('Taman Mini Indonesia Indah', 'Theme Park'),
('Taman Situlembang', 'City Park'),
('Taman Situlembang', 'View'),
('Taman Suropati', 'City Park'),
('Taman Suropati', 'View'),
('Theater IMAX Keong Emas', 'Education'),
('Theater IMAX Keong Emas', 'Theatre');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
  `id_trip` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `detail_trip` text NOT NULL,
  `date_trip` date NOT NULL,
  PRIMARY KEY (`id_trip`,`username`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id_trip`, `username`, `detail_trip`, `date_trip`) VALUES
(8, '1077143442299652', '2YYY1xx2xxYYYKaretYYY3500xx153500xxYYYJalan 0,2 kmxx?xxYYYBundaran HIxxAncolxxYYYnullxxTaman Impian Jaya Ancolxx', '2015-05-11'),
(9, 'mohammadsyahidw', '3YYY1xx2xx13xxYYYMonasYYY3500xx153500xx9500xxYYYJalan 0,2 kmxxjalan kakixxNaik angkot T15A atau K40 sepanjang 2 kmxxYYYBundaran HIxxAncolxxTaman Mini GarudaxxYYYnullxxTaman Impian Jaya AncolxxTaman Mini Indonesia Indahxx', '2015-05-22'),
(10, 'fakhirahdg', '2YYY1xx4xxYYYPolda Metro JayaYYY3500xx86000xxYYYJalan 0,2 kmxxNaik Kopaja AC S13 atau kendaraan umum D01 dari perempatan lampu merah PIM2xxYYYBundaran HIxxPondok Indah 2xxYYYnullxxnullxx', '2015-06-24'),
(11, '1055999721076876', '3YYY2xx1xx4xxYYYBundaran HIYYY153500xx3500xx86000xxYYYjalan kakixxJalan 0,2 kmxxNaik Kopaja AC S13 atau kendaraan umum D01 dari perempatan lampu merah PIM2xxYYYAncolxxBundaran HIxxPondok Indah 2xxYYYTaman Impian Jaya Ancolxxnullxxnullxx', '2015-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`type_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_name`) VALUES
('Buy and Get'),
('Discount'),
('Free'),
('Free Souvenir');

-- --------------------------------------------------------

--
-- Table structure for table `type_promo`
--

CREATE TABLE IF NOT EXISTS `type_promo` (
  `type_name` varchar(30) NOT NULL,
  `id_promo` int(11) NOT NULL,
  PRIMARY KEY (`type_name`,`id_promo`),
  KEY `type_promo_ibfk_2` (`id_promo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_promo`
--

INSERT INTO `type_promo` (`type_name`, `id_promo`) VALUES
('Discount', 17),
('Discount', 18),
('Discount', 19);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
