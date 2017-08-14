-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2017 at 08:40 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pendaftaran_ukm`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `log_pendaftaran` (
  `pendaftaran_id` int(5) NOT NULL AUTO_INCREMENT,
  `mhs_npm` int(7) NOT NULL,
  `ukm_id` int(5) NOT NULL,
  `pendaftaran_status` enum('?','DITERIMA','TIDAK DITERIMA') NOT NULL DEFAULT '?',
  `pendaftaran_tahun` varchar(10) NOT NULL,
  PRIMARY KEY (`pendaftaran_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `log_pendaftaran`
--

INSERT INTO `log_pendaftaran` (`pendaftaran_id`, `mhs_npm`, `ukm_id`, `pendaftaran_status`, `pendaftaran_tahun`) VALUES
(20, 1144089, 1, 'DITERIMA', '2017'),
(21, 1144089, 2, 'TIDAK DITERIMA', '2017'),
(22, 1144089, 2, 'TIDAK DITERIMA', '2017'),
(23, 1144096, 4, 'DITERIMA', '2016'),
(24, 1212121, 1, '?', '2017'),
(25, 1212121, 1, 'DITERIMA', '2017'),
(26, 11111, 2, '', '2016'),
(27, 11111, 2, '?', '2016'),
(28, 11112, 2, '?', '2017'),
(29, 11112, 1, '?', '2017'),
(30, 11112, 1, 'DITERIMA', '2017'),
(31, 11111, 1, '?', '2016'),
(32, 11111, 1, 'DITERIMA', '2016'),
(33, 11111, 2, 'TIDAK DITERIMA', '2016'),
(34, 1144089, 1, '?', '2017'),
(35, 1144089, 1, 'DITERIMA', '2017'),
(36, 1144089, 2, '?', '2017'),
(37, 1144089, 2, 'TIDAK DITERIMA', '2017'),
(38, 1144089, 2, '?', '2017'),
(39, 1144089, 1, '?', '2017'),
(40, 1144084, 1, '?', '2017'),
(41, 1144089, 1, '?', '2017'),
(42, 1144089, 1, '?', '2017'),
(43, 1144089, 1, '?', '2017'),
(44, 1144089, 1, 'TIDAK DITERIMA', '2017'),
(45, 1144089, 1, 'DITERIMA', '2017'),
(46, 1144018, 2, 'DITERIMA', '2012'),
(47, 1144018, 2, 'DITERIMA', '2013'),
(48, 1144018, 2, 'DITERIMA', '2013'),
(49, 1144089, 1, 'TIDAK DITERIMA', '2017'),
(50, 1144089, 1, 'TIDAK DITERIMA', '2017'),
(51, 1144089, 1, 'TIDAK DITERIMA', '2017'),
(52, 1144084, 2, 'DITERIMA', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('6f5a014057160afa5321856f660767f2', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.76 Safari/537.36 OPR/43.0.2', 1486998819, 'a:3:{s:9:"user_data";s:0:"";s:14:"admin_username";s:5:"rizki";s:14:"admin_password";s:32:"3e089c076bf1ec3a8332280ee35c28d4";}'),
('77ad650294ed4f7888dd67b11496bd45', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.76 Safari/537.36 OPR/43.0.2', 1486961485, 'a:3:{s:9:"user_data";s:0:"";s:14:"admin_username";s:5:"rizki";s:14:"admin_password";s:32:"3e089c076bf1ec3a8332280ee35c28d4";}'),
('ea76471e8e77656f738e1e61d6ba9295', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.76 Safari/537.36 OPR/43.0.2', 1486987033, '');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE IF NOT EXISTS `t_admin` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_nama`) VALUES
(2, 'rizki', '3e089c076bf1ec3a8332280ee35c28d4', 'Rizki Fadillah'),
(3, 'agung', 'e59cd3ce33a68f536c19fedb82a7936f', 'Agung Permana');

-- --------------------------------------------------------

--
-- Table structure for table `t_deadline`
--

CREATE TABLE IF NOT EXISTS `t_deadline` (
  `deadline_id` int(5) NOT NULL AUTO_INCREMENT,
  `deadline_tgl` date NOT NULL,
  `ukm_id` int(11) NOT NULL,
  PRIMARY KEY (`deadline_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `t_deadline`
--

INSERT INTO `t_deadline` (`deadline_id`, `deadline_tgl`, `ukm_id`) VALUES
(1, '2017-07-21', 1),
(2, '2017-02-25', 2),
(3, '2017-01-01', 3),
(4, '2017-01-10', 4),
(5, '2017-02-24', 6),
(6, '2017-02-24', 7),
(7, '2017-03-11', 8);

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE IF NOT EXISTS `t_kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_nama` varchar(5) NOT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`kelas_id`, `kelas_nama`) VALUES
(1, '1A'),
(2, '2A'),
(3, '3A'),
(4, '1B'),
(5, '2B'),
(6, '3B'),
(7, '1C'),
(8, '2C'),
(9, '3C'),
(10, '1D'),
(11, '2D'),
(12, '3D');

-- --------------------------------------------------------

--
-- Table structure for table `t_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `t_mahasiswa` (
  `mhs_npm` varchar(7) NOT NULL,
  `mhs_password` varchar(100) NOT NULL,
  `mhs_nama` varchar(30) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `prodi_id` int(5) NOT NULL,
  `mhs_tahun_masuk` year(4) NOT NULL,
  `mhs_foto` varchar(100) NOT NULL,
  PRIMARY KEY (`mhs_npm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mahasiswa`
--

INSERT INTO `t_mahasiswa` (`mhs_npm`, `mhs_password`, `mhs_nama`, `kelas_id`, `prodi_id`, `mhs_tahun_masuk`, `mhs_foto`) VALUES
('1144003', 'fcea920f7412b5da7be0cf42b8c93759', 'Khalid Ahmad Khadafi', 3, 1, 2014, '1486193406-khalid-ahmad-khadafi.PNG'),
('1144005', 'fcea920f7412b5da7be0cf42b8c93759', 'Desi Febrianti', 3, 1, 2014, '1486193474-desi-febrianti.PNG'),
('1144018', 'fcea920f7412b5da7be0cf42b8c93759', 'Adinto Prasetyo', 3, 1, 2014, '1486193855-adinto-prasetyo.PNG'),
('1144035', 'fcea920f7412b5da7be0cf42b8c93759', 'Agung Permana', 3, 1, 2014, '1486192741-agung-permana.PNG'),
('1144044', 'fcea920f7412b5da7be0cf42b8c93759', 'Khaeratunnisa', 3, 1, 2014, '1486193555-khaeratunnisa.PNG'),
('1144084', 'fcea920f7412b5da7be0cf42b8c93759', 'Eva Nur Fauziyah', 1, 1, 2014, '1486191889-eva-nur-fauziyah.jpg'),
('1144089', '734ee88f1b19ffd8c598602480577988', 'Rizki Fadillah', 3, 1, 2014, '1486192187-rizki-fadillah.png'),
('1144091', 'fcea920f7412b5da7be0cf42b8c93759', 'Ali Abdul Wahid', 3, 1, 2014, '1486192250-ali-abdul-wahid.jpg'),
('1144121', 'fcea920f7412b5da7be0cf42b8c93759', 'Nurila Faradila Irfan', 3, 1, 2014, '1486193661-nurila-faradila-irfan.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `t_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `t_pendaftaran` (
  `pendaftaran_id` int(5) NOT NULL AUTO_INCREMENT,
  `mhs_npm` int(7) NOT NULL,
  `ukm_id` int(5) NOT NULL,
  `pendaftaran_status` enum('?','DITERIMA','TIDAK DITERIMA') NOT NULL DEFAULT '?',
  `pendaftaran_tahun` int(10) NOT NULL,
  `batas_akhir` int(10) NOT NULL,
  PRIMARY KEY (`pendaftaran_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `t_pendaftaran`
--

INSERT INTO `t_pendaftaran` (`pendaftaran_id`, `mhs_npm`, `ukm_id`, `pendaftaran_status`, `pendaftaran_tahun`, `batas_akhir`) VALUES
(39, 1144089, 1, '?', 2017, 0),
(40, 1144084, 1, '?', 2017, 0),
(41, 1144089, 1, 'DITERIMA', 2017, 0),
(42, 1144089, 1, '?', 2017, 0),
(43, 1144089, 1, 'TIDAK DITERIMA', 2017, 0),
(46, 1144018, 2, 'DITERIMA', 2013, 2017),
(65, 1144084, 2, 'DITERIMA', 2017, 0);

--
-- Triggers `t_pendaftaran`
--
DROP TRIGGER IF EXISTS `trigger2`;
DELIMITER //
CREATE TRIGGER `trigger2` AFTER UPDATE ON `t_pendaftaran`
 FOR EACH ROW BEGIN
	INSERT INTO log_pendaftaran (mhs_npm, ukm_id, pendaftaran_status, pendaftaran_tahun) VALUES (new.mhs_npm, new.ukm_id, new.pendaftaran_status, new.pendaftaran_tahun);
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_pengelola`
--

CREATE TABLE IF NOT EXISTS `t_pengelola` (
  `pengelola_id` int(5) NOT NULL AUTO_INCREMENT,
  `pengelola_username` varchar(20) NOT NULL,
  `pengelola_password` varchar(50) NOT NULL,
  `ukm_id` int(5) NOT NULL,
  PRIMARY KEY (`pengelola_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `t_pengelola`
--

INSERT INTO `t_pengelola` (`pengelola_id`, `pengelola_username`, `pengelola_password`, `ukm_id`) VALUES
(1, 'futsal', 'a7992e0646bb734829bea75a62590a49', 2),
(2, 'Basket', '0f6cdb621b452ac6fb994d88e674e49f', 1),
(3, 'Volly', 'c8de5240426db39de3ad3a860a16b5b4', 3),
(4, 'badminton', '019b0b27113bc3d190958a6b7cf2c177', 4),
(6, 'popeys', '9c1d2ef84eb59604c167eebea7c0f96f', 6),
(7, 'tennis', '1fbfb23351e3580651395ab721f5e935', 7),
(8, 'gempar', '6449d963c0fa637f8fd9c7a3029e9971', 8),
(9, 'panah', 'aa7251083e40af5c114ebb6e91ed3109', 9);

-- --------------------------------------------------------

--
-- Table structure for table `t_prodi`
--

CREATE TABLE IF NOT EXISTS `t_prodi` (
  `prodi_id` int(5) NOT NULL AUTO_INCREMENT,
  `prodi_nama` varchar(25) NOT NULL,
  `prodi_desk` text NOT NULL,
  PRIMARY KEY (`prodi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `t_prodi`
--

INSERT INTO `t_prodi` (`prodi_id`, `prodi_nama`, `prodi_desk`) VALUES
(1, 'D4 Teknik Informatika', 'D4 Teknik Informatika'),
(4, 'D3 Teknik Informatika', 'D3 Teknik Informatika'),
(5, 'D3 Logistik Bisnis', 'D3 Logistik Bisnis'),
(6, 'D4 Logistik Bisnis', 'D4 Logistik Bisnis'),
(12, 'D4 Manajemen Informatika', 'D4 Manajemen Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `t_ukm`
--

CREATE TABLE IF NOT EXISTS `t_ukm` (
  `ukm_id` int(5) NOT NULL AUTO_INCREMENT,
  `ukm_nama` varchar(30) NOT NULL,
  `ukm_desk` text NOT NULL,
  `ukm_logo` varchar(50) NOT NULL,
  PRIMARY KEY (`ukm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `t_ukm`
--

INSERT INTO `t_ukm` (`ukm_id`, `ukm_nama`, `ukm_desk`, `ukm_logo`) VALUES
(1, 'Basket', 'Basketdsdsd', ''),
(2, 'Futsal', 'Futsal', '-'),
(3, 'Volly', 'Volly', '-'),
(4, 'Badminton', 'Badminton', '-'),
(6, 'Popeys', 'Popeys', '-'),
(7, 'Tennis', 'Tennis Lapangan', ''),
(8, 'Gempar', 'Berpetualang Cantik Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik  Berpetualang Cantik Berpetualang Cantik Berpetualang Cantik Berpetualang Cantik Berpetualang Cantik Berpetualang Cantik ', ''),
(9, 'Panah', 'panah', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
