-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 09:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odev_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `pass` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `pass`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) NOT NULL,
  `kategori_adi` varchar(60) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_adi`) VALUES
(1, 'Roman'),
(2, 'Edebiyat'),
(3, 'Astronomi'),
(4, 'Bilim'),
(5, 'Felsefi Romanlar'),
(6, 'Dil'),
(7, 'Bilim Kurgu');

-- --------------------------------------------------------

--
-- Table structure for table `kitaplar`
--

CREATE TABLE `kitaplar` (
  `kitap_id` int(11) NOT NULL,
  `barkod` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kitap_adi` varchar(60) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `yazar` varchar(60) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `sayfa` int(11) NOT NULL,
  `yili` int(11) NOT NULL,
  `dili` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kapak_foto` varchar(40) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kitap_turu` longtext COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `fiyat` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `kitaplar`
--

INSERT INTO `kitaplar` (`kitap_id`, `barkod`, `kitap_adi`, `yazar`, `sayfa`, `yili`, `dili`, `kapak_foto`, `kitap_turu`, `fiyat`) VALUES
(1, '9786254415173', 'Sen Yola Çık Yol Sana Görünür', 'Hakan Mengüç', 184, 2021, 'Türkçe', '0001953769001-1.jpg', 'Edebiyat', '18.00'),
(2, '9786053119722', 'Dışa Bakan Rüya Görür İçe Bakan Uyanır', 'Özlem Küskü', 128, 2020, 'Türkçe', '0001890378001-1.jpg', 'Felsefi Romanlar', '12.00'),
(3, '9789753638029', 'Kürk Mantolu Madonna', 'Sabahattin Ali', 176, 2021, 'Türkçe', '0001922390001-1.jpg', 'Edebiyat', '16.00'),
(4, '9789753422666', 'Çürümenin Kitabı', 'Emil Michel Cioran', 168, 2016, 'Türkçe', '0000000077396-1 (1).jpg', 'Felsefi Romanlar', '23.00'),
(5, '9786257993838', 'Anka\nın Kanatları', 'Çağrı Dörter', 211, 2020, 'Türkçe', '0001858328001-1.jpg', 'Felsefi Romanlar', '15.00'),
(6, '9786052980811', 'Körlük', 'Jose Saramago', 336, 2017, 'Türkçe', '0001704045001-1.jpg', 'Edebiyat', '30.00'),
(7, '9786258036107', 'Kalk Yerine Yat', 'Şermin Yaşar', 168, 2021, 'Türkçe', '0001949789001-1.jpg', 'Edebiyat', '25.00'),
(8, '9786254494383', 'Fink', 'Murat Menteş', 310, 2021, 'Türkçe', '0001948727001-1.jpg', 'Edebiyat', '18.00'),
(9, '9786053116882', 'Dijital Tapınak', 'Haluk Özdil', 264, 2019, 'Türkçe', '0001841761001-1.jpg', 'Bilim Kurgu', '16.00'),
(10, '9789944216005', 'İngilizce Dil Kartları', 'Jose Enrique Soto', 120, 2006, 'İngilizce', '0000000225758-1.jpg', 'Dil', '19.00'),
(11, '9786257442398', 'Kurtuluş Projesi', 'Andy Weir', 536, 2021, 'Türkçe', '0001935923001-1.jpg', 'Roman', '37.00'),
(12, '9786258431131', 'Ezbere Yaşayanlar - Vazgeçemediğimiz Alışkanlıklarımızın Kök', 'Emrah Safa Gürkan', 400, 2022, 'Türkçe', '0001956869001-1.jpg', 'Bilim', '34.00'),
(13, '9786257112376', 'Dura Mater', 'Serkan Karaismailoğlu', 560, 2021, 'Türkçe', '0001934377001-1.jpg', 'Bilim', '42.00'),
(16, '9786257112079', 'Arachnoid Mater', 'Serkan Karaismailoğlu', 488, 2020, 'Türkçe', '0001878105001-1.jpg', 'Bilim', '35.00'),
(17, '9786059367509', 'Pia Mater', 'Serkan Karaismailoğlu', 424, 2019, 'Türkçe', '0001816132001-1.jpg', 'Roman', '35.00'),
(18, '9786051715513', 'Kara Delikler', 'Stephen Hawking', 182, 2016, 'Türkçe', '0001718325001-1.jpg', 'Astronomi', '11.00'),
(19, '9789752107830', 'Kozmos', 'Carl Sagan', 120, 1980, 'Türkçe', '0000000059256-1.jpg', 'Astronomi', '33.00'),
(20, '9789752104037', 'Da Vinci Şifresi', 'Dan Brown', 495, 2003, 'Türkçe', '0000000142987-1.jpg', 'Roman', '38.00'),
(21, '9786059218955', 'Yeni Dünyanın Cesur İnsanı', 'Sinan Canan', 176, 2021, 'Türkçe', '0001949500001-1.jpg', 'Bilim', '30.00'),
(22, '9786051921396', 'Ergen Beyni', 'Frances E. Jensen , Amy Ellis Nutt', 376, 2017, 'Türkçe', '0001729457001-1.jpg', 'Bilim', '29.00');

