-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 07:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2_sajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(50) NOT NULL,
  `slika` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `slika`, `alt`, `opis`) VALUES
(1, 'app/assets/images/about/autor/autor.jpg', 'Autor', 'My name is Damnjan Askovic. I am 20 years old and I live in Obrenovac. I\'m studying at Visoka ICT skola in Belgrade. I completed computer science at the Gymnasium in Obrenovac. I would like to become a software developer.');

-- --------------------------------------------------------

--
-- Table structure for table `evidencija`
--

CREATE TABLE `evidencija` (
  `id` int(11) NOT NULL,
  `akcija` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `datum_vreme` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_korisnik` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evidencija`
--

INSERT INTO `evidencija` (`id`, `akcija`, `datum_vreme`, `id_korisnik`) VALUES
(2, 'INSERT_KOMENTAR', '2020-02-17 14:22:35', 2),
(3, 'INSERT_KOMENTAR', '2020-02-17 14:45:53', 2),
(4, 'DELETE_USER', '2020-02-17 14:46:04', 2),
(5, 'UPDATE_PRODUCT', '2020-02-17 14:49:35', 2),
(6, 'DELETE_PROIZVOD', '2020-02-17 14:51:18', 2),
(7, 'INSERT_PRODUCT', '2020-02-17 14:53:04', 2),
(8, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:10:23', 2),
(9, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:10:34', 2),
(10, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:11:31', 2),
(11, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:11:50', 2),
(12, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:12:07', 2),
(13, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:13:09', 2),
(14, 'INSERT_PRODUCT', '2020-02-17 15:13:48', 2),
(15, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:15:40', 2),
(16, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:16:59', 2),
(17, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:19:12', 2),
(18, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:19:26', 2),
(19, 'INSERT_PRODUCT', '2020-02-17 15:19:40', 2),
(20, 'DELETE_PROIZVOD', '2020-02-17 15:20:57', 2),
(21, 'DELETE_PROIZVOD', '2020-02-17 15:20:58', 2),
(22, 'DELETE_PROIZVOD', '2020-02-17 15:20:58', 2),
(23, 'INSERT_PRODUCT', '2020-02-17 15:22:11', 2),
(24, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:22:48', 2),
(25, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 15:23:15', 2),
(26, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:09:31', 2),
(27, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:09:54', 2),
(28, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:10:22', 2),
(29, 'INSERT_PRODUCT', '2020-02-17 16:12:23', 2),
(30, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:12:43', 2),
(31, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:26:38', 2),
(32, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:28:19', 2),
(33, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:28:46', 2),
(34, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:28:53', 2),
(35, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:29:29', 2),
(36, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:29:52', 2),
(37, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:33:45', 2),
(38, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:40:11', 2),
(39, 'UPDATE_PRODUCT_WITHOUT_IMAGE', '2020-02-17 16:40:13', 2),
(40, 'UPDATE_PRODUCT_WITH_IMAGE', '2020-02-17 16:40:52', 2),
(41, 'DELETE_PROIZVOD', '2020-02-17 17:03:46', 2),
(42, 'DELETE_PROIZVOD', '2020-02-17 17:03:47', 2),
(44, 'DELETE_KOMENTAR', '2020-02-17 17:49:03', 2),
(45, 'INSERT_PRODUCT', '2020-02-17 17:49:50', 2),
(46, 'UPDATE_PRODUCT_WITH_IMAGE', '2020-02-17 17:50:15', 2),
(47, 'UPDATE_PRODUCT_WITH_IMAGE', '2020-02-17 17:51:17', 2),
(48, 'DELETE_PROIZVOD', '2020-02-17 17:52:07', 2),
(50, 'DELETE_USER', '2020-02-17 17:55:12', 2),
(52, 'DELETE_USER', '2020-02-17 17:56:15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `follow_ikonice`
--

CREATE TABLE `follow_ikonice` (
  `id` int(11) NOT NULL,
  `klasa` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `follow_ikonice`
--

INSERT INTO `follow_ikonice` (`id`, `klasa`) VALUES
(1, 'fa fa-facebook f1'),
(2, 'fa fa-twitter f2'),
(3, 'fa fa-google-plus f3');

-- --------------------------------------------------------

--
-- Table structure for table `informacija`
--

CREATE TABLE `informacija` (
  `id` int(11) NOT NULL,
  `naziv` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `informacija`
--

INSERT INTO `informacija` (`id`, `naziv`, `putanja`) VALUES
(1, 'Documentacion', 'app/dokumentacija.pdf'),
(2, 'Sitemap', 'app/sitemap.xml'),
(3, 'Git Repository', 'https://github.com/Damnjan998/foodRestaurant');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `poruka` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_korisnik` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `naslov`, `poruka`, `id_korisnik`) VALUES
(1, 'Naslov', 'Hello world', 2),
(2, 'Servis', 'Veoma zadovoljan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(255) NOT NULL,
  `ime` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum_registracije` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aktivan` int(1) NOT NULL,
  `id_uloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `email`, `lozinka`, `datum_registracije`, `aktivan`, `id_uloga`) VALUES
(1, 'Mike', 'Flanagan', 'user123@gmail.com', 'df5e8c760f430ff37c1384098bd7e806', '2020-02-10 21:34:14', 0, 1),
(2, 'Morgan', 'Friman', 'admin123@gmail.com', 'df5e8c760f430ff37c1384098bd7e806', '2020-02-09 20:15:14', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kuvar`
--

CREATE TABLE `kuvar` (
  `id` int(11) NOT NULL,
  `ime` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kuvar`
--

INSERT INTO `kuvar` (`id`, `ime`, `prezime`, `slika`, `alt`) VALUES
(1, 'Mack', 'Joe', 'images/about/kuvar/t1.png', 'Kuvar'),
(2, 'Cruz', 'Deo', 'images/about/kuvar/t2.png', 'Kuvar'),
(3, 'Rochy', 'Jae', 'images/about/kuvar/t3.png', 'Kuvar'),
(4, 'Rojo', 'Poy', 'images/about/kuvar/t4.png', 'Kuvar');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `naziv` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `istaknut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `naziv`, `istaknut`, `opis`, `slika`, `alt`) VALUES
(1, 'French Burger', '1', 'Super Tasty', 'app/assets/images/burger/frenchBurger.jpg', 'Burger'),
(2, 'Veg Muffin', '1', 'Perfect Muffin for your day', 'app/assets/images/burger/vegMuffin.jpg', 'Muffin'),
(3, 'Brioche', '1', 'Excellent', 'app/assets/images/burger/brioche.jpg', 'Burger'),
(4, 'Cheese Burger', '0', '', 'app/assets/images/burger/cheeseBurger.jpg', 'Burger'),
(5, 'Chiken Burger', '0', '', 'app/assets/images/burger/chickenBurger.jpg', 'Burger'),
(6, 'Veg Burger', '0', '', 'app/assets/images/burger/vegBurger.jpg', 'Burger');

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` int(50) NOT NULL,
  `naziv` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`id`, `naziv`, `href`) VALUES
(1, 'HOME', 'home'),
(2, 'ABOUT US', 'about'),
(3, 'MENU', 'menu'),
(4, 'REVIEWS', 'reviews'),
(5, 'CONTACT', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(50) NOT NULL,
  `naziv` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'Korisnik'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evidencija`
--
ALTER TABLE `evidencija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evidencija_ibfk_1` (`id_korisnik`);

--
-- Indexes for table `follow_ikonice`
--
ALTER TABLE `follow_ikonice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informacija`
--
ALTER TABLE `informacija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_ibfk_1` (`id_korisnik`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD KEY `id` (`id`),
  ADD KEY `id_uloga` (`id_uloga`);

--
-- Indexes for table `kuvar`
--
ALTER TABLE `kuvar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evidencija`
--
ALTER TABLE `evidencija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `follow_ikonice`
--
ALTER TABLE `follow_ikonice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `informacija`
--
ALTER TABLE `informacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kuvar`
--
ALTER TABLE `kuvar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evidencija`
--
ALTER TABLE `evidencija`
  ADD CONSTRAINT `evidencija_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
