-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20.05.2015 klo 21:06
-- Palvelimen versio: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loppuharjoitus`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `asiakas`
--

CREATE TABLE IF NOT EXISTS `asiakas` (
`asiakas_id` int(10) NOT NULL,
  `kayttajatunnus` varchar(50) NOT NULL,
  `etunimi` varchar(50) NOT NULL,
  `sukunimi` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `luokka` varchar(20) NOT NULL,
  `pw` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `asiakas`
--

INSERT INTO `asiakas` (`asiakas_id`, `kayttajatunnus`, `etunimi`, `sukunimi`, `email`, `luokka`, `pw`) VALUES
(10, 'Testikäyttäjä', 'Matti', 'Meikäläinen', 'matti.meikäläinen@outlook.com', 'user', 'testi123'),
(11, 'Admin1', 'Anssi', 'Admin', 'anssi.admin@outlook.com', 'admin', 'admin1');

-- --------------------------------------------------------

--
-- Rakenne taululle `tilaukset`
--

CREATE TABLE IF NOT EXISTS `tilaukset` (
`tilaus_id` int(100) NOT NULL,
  `asiakas_id` int(10) NOT NULL,
  `tuote_id` int(11) NOT NULL,
  `tilausaika` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Vedos taulusta `tilaukset`
--

INSERT INTO `tilaukset` (`tilaus_id`, `asiakas_id`, `tuote_id`, `tilausaika`) VALUES
(27, 10, 29, '2015-05-20 19:03:30'),
(28, 10, 51, '2015-05-20 19:03:30'),
(29, 10, 56, '2015-05-20 19:03:30'),
(33, 11, 49, '2015-05-20 19:04:14'),
(34, 11, 31, '2015-05-20 19:04:14'),
(35, 11, 55, '2015-05-20 19:04:14'),
(36, 11, 62, '2015-05-20 19:04:14');

-- --------------------------------------------------------

--
-- Rakenne taululle `tuotteet`
--

CREATE TABLE IF NOT EXISTS `tuotteet` (
`tuote_id` int(10) NOT NULL,
  `nimi` varchar(255) CHARACTER SET latin1 NOT NULL,
  `varastosaldo` int(10) NOT NULL,
  `kategoria` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kuva_src` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'images/imageNotFound.jpg',
  `valmistaja` varchar(255) CHARACTER SET latin1 NOT NULL,
  `hinta` varchar(100) CHARACTER SET latin1 NOT NULL,
  `kuvaus` varchar(500) CHARACTER SET latin1 NOT NULL,
  `lyhyt_kuvaus` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Vedos taulusta `tuotteet`
--

INSERT INTO `tuotteet` (`tuote_id`, `nimi`, `varastosaldo`, `kategoria`, `kuva_src`, `valmistaja`, `hinta`, `kuvaus`, `lyhyt_kuvaus`) VALUES
(29, 'k242 24" Full HD LED-näyttö', 20, 'oheislaitteet', 'images/acer_k242.jpg', 'Acer', '179,90', 'Laadukas Full HD -resoluutiolla varustettu näyttö, jonka hinta ei päätä huimaa!', 'Laadukas Full HD -resoluutiolla varustettu näyttö, jonka hinta ei päätä huimaa!'),
(30, 'PIXMA MG3550 monitoimitulostin, valkoinen', 2, 'oheislaitteet', 'images/Canon PIXMA MG3550 monitoimitulostin, valkoinen.jpeg', 'Canon', '69,90', 'Laadukas ja kompakti Wi-Fi liitännällä varustettu monitoimilaite tulostukseen, kopiontiin ja skannaukseen.', 'Sony Xperia Z2 on sääsuojattu joten voit käyttää laitetta huoletta esim. rannalla tai vesisateessa.'),
(31, 'Porsche Design -kovalevyt', 9, 'oheislaitteet', 'images/LaCie Porsche Design.jpg', 'LaCie', '69,90', 'Tyylikkäät ja kompaktit Porsche Design -kovalevyt nopealla USB 3.0 -liitännällä.', 'Tyylikkäät ja kompaktit Porsche Design -kovalevyt nopealla USB 3.0 -liitännällä.'),
(49, 'MacBook Air', 4, 'tietokoneet', 'images/macbook.png', 'Apple', '1028.90', 'Uudessa Apple MacBook Airissa on viidennen sukupolven Intel Core -prosessorit, vaikuttavat grafiikat, koko päivän kestävä akku.', 'Uudessa Apple MacBook Airissa on viidennen sukupolven Intel Core -prosessorit, vaikuttavat grafiikat'),
(50, 'Aspire', 5, 'tietokoneet', 'images/acer_aspire.jpg', 'Acer', '349.90', 'Acer Aspire Switch 11. Kätevä laite, joka yhdistää kannettavan ja tabletin parhaat puolet. Neljä erilaista käyttötilaa ja 7,5 tunnin akkukesto.', 'Acer Aspire Switch 11. Kätevä laite, joka yhdistää kannettavan ja tabletin parhaat puolet.'),
(51, 'iMac', 2, 'tietokoneet', 'images/apple_imac.jpg', 'Apple', '1099.90', 'Upea laajakuvanäyttö, tehokkaat prosessorit, nopeat näytönohjaimet ja paljon muuta. Myös uskomattomalla Retina 5K näyttöll', 'Upea laajakuvanäyttö, tehokkaat prosessorit, nopeat näytönohjaimet ja paljon muuta.'),
(55, 'Spirit', 3, 'puhelimet', 'images/lg_spirit.jpg', 'LG', '189.90', 'Hieman kaareva muoto ja rear key erottavat puhelimen muista. Lisäksi Knock Code, LTE/4G yhteys ja 4.7 tuuman IPS-näyttö', 'Hieman kaareva muoto ja rear key erottavat puhelimen muista. Lisäksi Knock Code, LTE/4G yhteys ja 4.7 tuuman IPS-näyttö.'),
(56, 'iPhone 5c', 20, 'puhelimet', 'images/iPhone-5c.jpg', 'Apple', '349.90', 'Ulkoisesti värikäs - sisäisesti rautainen. Lukitsematon iPhone 5c upealla Retina-näytöllä.', 'Ulkoisesti värikäs - sisäisesti rautainen. Lukitsematon iPhone 5c upealla Retina-näytöllä.'),
(57, 'Xperia Z2', 9, 'puhelimet', 'images/xperia-z1.jpg', 'Sony', '389.90', 'Sony Xperia Z2 on sääsuojattu joten voit käyttää laitetta huoletta esim. rannalla tai vesisateessa.', 'Sony Xperia Z2 on sääsuojattu joten voit käyttää laitetta huoletta esim. rannalla tai vesisateessa.'),
(58, 'Siru ja Pin -kortinlukija', 2, 'oheislaitteet', 'images/izettle_pin.jpg', 'iZettle', '79.90', 'Helppokäyttöinen ja edullinen työkalu pienyrittäjille. Se toimii pienille ja kasvaville yrityksille maksujärjestelmänä, jolla voi vastaanottaa maksuja sekä hallinnoida kauppaa.', 'Helppokäyttöinen ja edullinen työkalu pienyrittäjille.'),
(59, 'Testituote1', 3, 'oheislaitteet', 'images/imageNotFound.jpg', 'Testicompany', '40', 'Testituote 1', 'Testituote 1'),
(60, 'Testituote2', 43, 'oheislaitteet', 'images/imageNotFound.jpg', 'Testicompany', '32', 'Testituote 2', 'Testituote 2'),
(62, '255 G3 kannettava tietokone', 7, 'tietokoneet', 'images/hp_255-g3.jpg', 'HP', '249.90', 'Erinomainen kannettava kodin kaikkiin perustarpeisiin.', 'Erinomainen kannettava kodin kaikkiin perustarpeisiin.'),
(63, 'E50', 2, 'tietokoneet', 'images/lenovo_e50.jpg', 'Lenovo', '249.90', 'Lenovo E50 on edullinen kotikäyttöön ja pienyrityksille tarkoitettu pöytätietokone, jolla päivittäinen tietojenkäsittely hoituu mallikkaasti.', 'Lenovo E50 on edullinen kotikäyttöön ja pienyrityksille tarkoitettu pöytätietokone, jolla päivittäinen tietojenkäsittely hoituu mallikkaasti.'),
(64, 'Testituote3', 3, 'tietokoneet', 'images/imageNotFound.jpg', 'Testicompany2', '23', 'Testituote 3', 'Testituote 3'),
(65, 'Testituote 4', 3, 'oheislaitteet', 'images/imageNotFound.jpg', 'Testicompany2', '30', 'Testituote 4', 'Testituote 4'),
(66, 'Lumia 530', 25, 'puhelimet', 'images/imageNotFound.jpg', 'Nokia', '69.90', 'Uuden aikakauden nopea Nokia Lumia 530-puhelin. Puhelin on varustettu uusimmalla Windows Phone 8.1 -käyttöjärjestelmällä, sekä tehokkaalla neliydinsuorittimella, jonka ansiosta Lumia 530 suoriutuu kaikkein vaativimmistakin sovelluksista.', 'Uuden aikakauden nopea Nokia Lumia 530-puhelin. Puhelin on varustettu uusimmalla Windows Phone 8.1 -käyttöjärjestelmällä.'),
(67, 'Testituote5', 3, 'oheislaitteet', 'images/imageNotFound.jpg', 'Testicompany', '2', 'Testituote 5', 'Testituote 5');

-- --------------------------------------------------------

--
-- Rakenne taululle `vahvistetut_tilaukset`
--

CREATE TABLE IF NOT EXISTS `vahvistetut_tilaukset` (
  `asiakas_id` int(10) NOT NULL,
  `tuote_id` int(10) NOT NULL,
  `vahvistus_aika` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`vahvistus_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Vedos taulusta `vahvistetut_tilaukset`
--

INSERT INTO `vahvistetut_tilaukset` (`asiakas_id`, `tuote_id`, `vahvistus_aika`, `vahvistus_id`) VALUES
(10, 57, '2015-05-20 19:05:15', 1),
(10, 50, '2015-05-20 19:05:15', 2),
(10, 58, '2015-05-20 19:05:15', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asiakas`
--
ALTER TABLE `asiakas`
 ADD PRIMARY KEY (`asiakas_id`);

--
-- Indexes for table `tilaukset`
--
ALTER TABLE `tilaukset`
 ADD PRIMARY KEY (`tilaus_id`);

--
-- Indexes for table `tuotteet`
--
ALTER TABLE `tuotteet`
 ADD PRIMARY KEY (`tuote_id`);

--
-- Indexes for table `vahvistetut_tilaukset`
--
ALTER TABLE `vahvistetut_tilaukset`
 ADD PRIMARY KEY (`vahvistus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asiakas`
--
ALTER TABLE `asiakas`
MODIFY `asiakas_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tilaukset`
--
ALTER TABLE `tilaukset`
MODIFY `tilaus_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tuotteet`
--
ALTER TABLE `tuotteet`
MODIFY `tuote_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `vahvistetut_tilaukset`
--
ALTER TABLE `vahvistetut_tilaukset`
MODIFY `vahvistus_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
