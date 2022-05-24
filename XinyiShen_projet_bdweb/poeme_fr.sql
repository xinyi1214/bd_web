-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 25, 2021 at 09:52 PM
-- Server version: 5.7.32
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poème chinois`
--

-- --------------------------------------------------------

--
-- Table structure for table `poeme_fr`
--

CREATE TABLE `poeme_fr` (
  `id_poeme` int(10) NOT NULL,
  `nom_fr` varchar(40) NOT NULL,
  `auteur_fr` varchar(40) NOT NULL,
  `poeme_fr` text NOT NULL,
  `terme_fr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poeme_fr`
--

INSERT INTO `poeme_fr` (`id_poeme`, `nom_fr`, `auteur_fr`, `poeme_fr`, `terme_fr`) VALUES
(1, 'Du haut du pavillon des Cigognes', 'Wang Zhihuan', 'Soliel blanc / longer montagne cesser\r\nFleuve Jaune / pénétrer mer couler\r\nVouloir épuiser / mille stades vue\r\nEncore monter / un degré étage', 'Paysage'),
(2, 'De haut de la terrasse de You-Zhou', 'Chen Zi-ang', 'Devant ne pas voir / homme ancien\r\nDerrière ne pas voir / homme à venir\r\nPenser ciel-terre / lointain-lointain\r\nSeul affligé / fondre en larmes', 'Histoire'),
(3, 'Aube de printemps ', 'Meng Haoran', 'Sommeil printanier / ignorer aube\r\nTout autour / ouïr chanter oiseaux \r\nNuit passée / vent-pluie bruissement \r\nFleurs tombées / qui sait combien...', 'Tristesse '),
(4, 'La Gloriette-aux-Bambous', 'Wang Wei', 'Seul assis / reclus bambous dedans\r\nPincer luth / encore longtemps siffler\r\nProfond bois / hommes ne pont savoir\r\nBrillante lune / venir avec éclairer', 'Paysage'),
(5, 'Le Talus-aux-Hibiscus', 'Wang Wei', 'Branches extrémité / magnolias fleurs\r\nMontagne milieu / dégager rouges corolles\r\nTorrent logis / calme nulle personne\r\nPêle-mêle / éclore de plus échoir ', 'Paysage'),
(6, 'Le Clos-aux-clefs', 'Wang Wei', 'Montagne vide / ne percevoir personne\r\nSeulement entendu / vois humaine résonner\r\nOmbre-retournée / pénétrer bois profond\r\nEncore éclairer / mousse verte dessus', 'Paysage'),
(7, 'Chanson de Liang-zhou', 'Wang Han', 'Raisins beau vin / nocturne-clarté coupe\r\nVouloir boire pi-pa / cheval dessus presser\r\nLvre étendu sable champ / ne riez point\r\nDepuis jadis guerre d\'expédition/ combien revenir', 'Guerre'),
(8, 'Chant de frontière', 'Lu Lun', 'Lune noire / oies sauvages voler haut\r\nChef barbare / nuit en cachette s\'enfuir\r\nPrêt à lancer / cavalerie légère poursuivre\r\nForte neige / recouvrir arcs et sabres', 'Guerre'),
(9, 'Depuis que vous êtres parti', 'Zhang Jiuling', 'Depuis seigneur / être parti hélas\r\nNe plus / ranger ouvrage délaissé \r\nPenser seigneur / pareil à pleine lune\r\nNuit nuit / diminuer pure clarté', 'Tristesse '),
(10, 'Chanson du lac Qiu-pu', 'Li Bai', 'Cheveux blancs / trois mille aunes\r\nCar tristesse / tout aussi longue\r\nNe pas savoir / miroir clair dedans\r\nQuel lieu / attraper givres d’automne ', 'Tristesse ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poeme_fr`
--
ALTER TABLE `poeme_fr`
  ADD PRIMARY KEY (`id_poeme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poeme_fr`
--
ALTER TABLE `poeme_fr`
  MODIFY `id_poeme` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
