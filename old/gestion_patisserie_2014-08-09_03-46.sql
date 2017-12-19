-- SQL Dump
--
-- Generation: Sat, 09 Aug 2014 03:46:27 +0200
-- MySQL version: 5.6.17
-- PHP version: 5.5.12
 
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
 
--
-- Database: `gestion_patisserie`
--

--
-- Table structure: `achats`
--

CREATE TABLE `achats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_achat` date NOT NULL,
  `id_fournisseurs` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fournisseurs` (`id_fournisseurs`),
  CONSTRAINT `achats_ibfk_1` FOREIGN KEY (`id_fournisseurs`) REFERENCES `fournisseurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ;

--
-- Table data: `achats`
--
INSERT INTO `achats` (`id`, `date_achat`, `id_fournisseurs`) VALUES 
('23', '2014-07-24', '5'),
('24', '2014-07-24', '6'),
('25', '2014-07-24', '4'),
('26', '2014-08-04', '5');

--
-- Table structure: `authentifications`
--

CREATE TABLE `authentifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ;

--
-- Table data: `authentifications`
--
INSERT INTO `authentifications` (`id`, `login`, `password`) VALUES 
('1', 'simo', 'chakib');

--
-- Table structure: `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `immatriculation` text NOT NULL,
  `compagnon` text NOT NULL,
  `secteure` text NOT NULL,
  `tel` text NOT NULL,
  `type_client` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ;

--
-- Table data: `clients`
--
INSERT INTO `clients` (`id`, `nom`, `immatriculation`, `compagnon`, `secteure`, `tel`, `type_client`) VALUES 
('3', 'Al hassan abou baker ', '13594 B7', '', 'Marrakech', '00212668561448', '1'),
('4', 'ABD  el ali', '13594 B6', '', 'Marrakech', '00212626466912', '1'),
('7', 'Samir ben Ayaad', 'A1524510', '', 'Marrakech', '00212623466912', '2'),
('8', 'Imail elfarissy', '29036 A 56', '', 'Marrakech', '00212633486294', '2');

--
-- Table structure: `echanges`
--

CREATE TABLE `echanges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_clients` int(11) NOT NULL,
  `date_echange` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ligne_ventes` (`id_clients`),
  CONSTRAINT `echanges_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ;

--
-- Table data: `echanges`
--
INSERT INTO `echanges` (`id`, `id_clients`, `date_echange`) VALUES 
('1', '4', '2014-08-13');

--
-- Table structure: `facture_global`
--

CREATE TABLE `facture_global` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(11) NOT NULL,
  `versement` int(11) NOT NULL,
  `changes` int(11) NOT NULL,
  `gasoil` int(11) NOT NULL,
  `pieces` int(11) NOT NULL,
  `map` int(11) NOT NULL,
  `date_impression` date NOT NULL,
  `depart_km` int(11) NOT NULL,
  `arrivee_km` int(11) NOT NULL,
  `depart_date_heur` int(11) NOT NULL,
  `depart_date_min` int(11) NOT NULL,
  `arrivee_date_heur` int(11) NOT NULL,
  `arrivee_date_min` int(11) NOT NULL,
  `prix_gasoil` int(11) NOT NULL,
  `retour` int(11) NOT NULL,
  `percent1` int(11) NOT NULL,
  `percent2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

--
-- Table data: `facture_global`
--
INSERT INTO `facture_global` (`id`, `total`, `versement`, `changes`, `gasoil`, `pieces`, `map`, `date_impression`, `depart_km`, `arrivee_km`, `depart_date_heur`, `depart_date_min`, `arrivee_date_heur`, `arrivee_date_min`, `prix_gasoil`, `retour`, `percent1`, `percent2`) VALUES 
('1', '456500', '400', '3', '20000', '0', '389600', '2014-07-15', '100', '300', '10', '10', '15', '10', '100', '25250', '4', '0'),
('2', '353000', '5330', '38750', '20000', '1200', '175920', '0000-00-00', '0', '200', '10', '10', '15', '10', '100', '113000', '4', '7037'),
('3', '353000', '5330', '38750', '20000', '0', '175920', '0000-00-00', '0', '200', '10', '10', '15', '10', '100', '113000', '4', '5278'),
('4', '353000', '5330', '38750', '20000', '1400', '175920', '0000-00-00', '0', '200', '10', '10', '15', '10', '100', '113000', '4', '7037');

--
-- Table structure: `factures`
--

CREATE TABLE `factures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_facture` date NOT NULL,
  `id_ventes` int(11) NOT NULL,
  `numero_facture` int(11) NOT NULL,
  `chnages` int(11) NOT NULL,
  `totale` int(11) NOT NULL,
  `versement` int(11) NOT NULL,
  `reste` int(11) NOT NULL,
  `map` int(11) NOT NULL,
  `id_facture_global` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ventes` (`id_ventes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ;

--
-- Table data: `factures`
--
INSERT INTO `factures` (`id`, `date_facture`, `id_ventes`, `numero_facture`, `chnages`, `totale`, `versement`, `reste`, `map`, `id_facture_global`) VALUES 
('2', '2014-07-24', '1', '29', '34670', '240000', '5330', '0', '200000', '4'),
('3', '2014-07-25', '30', '30', '850', '431250', '400', '0', '430000', '0'),
('4', '2014-07-25', '31', '31', '1250', '1111200', '4108', '-5843', '1100000', '0'),
('5', '2014-08-09', '32', '32', '9000', '418000', '400000', '-400', '8600', '0');

--
-- Table structure: `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `adresse` text NOT NULL,
  `tel` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

--
-- Table data: `fournisseurs`
--
INSERT INTO `fournisseurs` (`id`, `nom`, `adresse`, `tel`) VALUES 
('4', 'frs1', 'adr1', 'tel1'),
('5', 'frs2', 'adr2', 'tel2'),
('6', 'frs3', 'adr3', 'tel3');

--
-- Table structure: `ligne_achats`
--

CREATE TABLE `ligne_achats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_achats` int(11) NOT NULL,
  `id_produits` int(11) NOT NULL,
  `qte_achat` int(11) NOT NULL,
  `prix_achat` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_achats` (`id_achats`),
  KEY `id_produits` (`id_produits`),
  CONSTRAINT `ligne_achats_ibfk_1` FOREIGN KEY (`id_achats`) REFERENCES `achats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ligne_achats_ibfk_2` FOREIGN KEY (`id_produits`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1 ;

--
-- Table data: `ligne_achats`
--
INSERT INTO `ligne_achats` (`id`, `id_achats`, `id_produits`, `qte_achat`, `prix_achat`) VALUES 
('156', '25', '23', '500', '3800'),
('157', '25', '24', '600', '1000'),
('158', '25', '25', '700', '3700'),
('159', '25', '26', '800', '3300'),
('160', '24', '12', '200', '4950'),
('161', '24', '13', '200', '4000'),
('162', '24', '14', '300', '3800'),
('163', '24', '15', '400', '4100'),
('164', '24', '16', '500', '2400'),
('165', '24', '17', '600', '2400'),
('166', '24', '18', '700', '2000'),
('167', '24', '20', '800', '3000'),
('168', '24', '21', '900', '2850'),
('169', '24', '22', '1000', '3000'),
('171', '26', '12', '10', '4950'),
('183', '23', '2', '100', '3500'),
('184', '23', '3', '200', '1100'),
('185', '23', '4', '300', '3800'),
('186', '23', '5', '400', '3250'),
('187', '23', '6', '500', '6200'),
('188', '23', '7', '600', '7000'),
('189', '23', '8', '700', '4800'),
('190', '23', '9', '800', '3500'),
('191', '23', '10', '900', '750'),
('192', '23', '11', '1000', '2400'),
('193', '23', '26', '40', '3300');

--
-- Table structure: `ligne_echange`
--

CREATE TABLE `ligne_echange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_echanges` int(11) NOT NULL,
  `id_produits` int(11) NOT NULL,
  `qte_echange` int(11) NOT NULL,
  `prix_echange` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_echanges` (`id_echanges`),
  KEY `id_echanges_2` (`id_echanges`),
  KEY `id_produits` (`id_produits`),
  CONSTRAINT `ligne_echange_ibfk_1` FOREIGN KEY (`id_echanges`) REFERENCES `echanges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ligne_echange_ibfk_2` FOREIGN KEY (`id_produits`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

--
-- Table data: `ligne_echange`
--
INSERT INTO `ligne_echange` (`id`, `id_echanges`, `id_produits`, `qte_echange`, `prix_echange`) VALUES 
('4', '1', '2', '120', '4500'),
('5', '1', '3', '100', '1050'),
('6', '1', '4', '140', '4800');

--
-- Table structure: `ligne_ventes`
--

CREATE TABLE `ligne_ventes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ventes` int(11) NOT NULL,
  `qte_vente` int(11) NOT NULL,
  `id_produits` int(11) NOT NULL,
  `prix_vente` double NOT NULL,
  `a_retour` int(11) NOT NULL,
  `nbr_retour` int(11) NOT NULL,
  `qte_change` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ventes` (`id_ventes`),
  KEY `id_produits` (`id_produits`),
  CONSTRAINT `ligne_ventes_ibfk_1` FOREIGN KEY (`id_ventes`) REFERENCES `ventes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ligne_ventes_ibfk_2` FOREIGN KEY (`id_produits`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1 ;

--
-- Table data: `ligne_ventes`
--
INSERT INTO `ligne_ventes` (`id`, `id_ventes`, `qte_vente`, `id_produits`, `prix_vente`, `a_retour`, `nbr_retour`, `qte_change`) VALUES 
('73', '1', '30', '2', '3800', '10', '10', '0'),
('74', '1', '0', '3', '1800', '40', '0', '10'),
('75', '1', '30', '4', '4300', '0', '0', '5'),
('76', '1', '0', '5', '3750', '0', '20', '2'),
('77', '30', '0', '2', '3800', '10', '0', '0'),
('78', '30', '20', '3', '1800', '0', '0', '0'),
('79', '30', '0', '4', '4300', '0', '5', '0'),
('80', '30', '2', '5', '3750', '100', '1', '10'),
('81', '31', '100', '7', '8000', '0', '0', '0'),
('82', '31', '0', '9', '3700', '30', '0', '0'),
('83', '31', '120', '11', '2860', '0', '50', '0'),
('84', '31', '0', '13', '4500', '0', '0', '15'),
('85', '32', '11', '2', '3800', '100', '1', '2');

--
-- Table structure: `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montant` double NOT NULL,
  `date_paiment` date NOT NULL,
  `id_clients` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_clients` (`id_clients`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ;

--
-- Table data: `paiements`
--
INSERT INTO `paiements` (`id`, `montant`, `date_paiment`, `id_clients`) VALUES 
('9', '5843', '2014-07-23', '3'),
('10', '5330', '2014-07-24', '4'),
('11', '400', '2014-07-25', '8'),
('12', '4108', '2014-07-25', '3'),
('13', '400000', '2014-08-09', '8');

--
-- Table structure: `parametres`
--

CREATE TABLE `parametres` (
  `impresssion_stock` date NOT NULL,
  `impression_stock_externe` date NOT NULL,
  `numero_facture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

--
-- Table data: `parametres`
--
INSERT INTO `parametres` (`impresssion_stock`, `impression_stock_externe`, `numero_facture`) VALUES 
('2014-07-01', '2014-07-24', '1');

--
-- Table structure: `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` text NOT NULL,
  `prix_vente` double NOT NULL,
  `qte_stock` int(11) NOT NULL,
  `prix_achat` double NOT NULL,
  `prix_echange` double NOT NULL,
  `pourcentage_echange` int(11) NOT NULL,
  `unite_carton` int(11) NOT NULL,
  `ancien_stock` int(11) NOT NULL,
  `date_impression` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ;

--
-- Table data: `produits`
--
INSERT INTO `produits` (`id`, `designation`, `prix_vente`, `qte_stock`, `prix_achat`, `prix_echange`, `pourcentage_echange`, `unite_carton`, `ancien_stock`, `date_impression`) VALUES 
('2', 'kawkaw choco', '3800', '190', '3500', '4500', '100', '0', '0', '2014-07-21'),
('3', 'castro', '1800', '340', '1100', '1050', '50', '0', '0', '2014-07-21'),
('4', 'blaugrana', '4300', '535', '3800', '4800', '100', '0', '0', '2014-07-21'),
('5', 'Z/25', '3750', '319', '3250', '2125', '50', '25', '0', '2014-07-21'),
('6', 'tomix88', '6600', '500', '6200', '7200', '100', '88', '0', '2014-07-21'),
('7', 'sandwitch', '8000', '500', '7000', '4000', '50', '0', '0', '2014-07-21'),
('8', 'Z/35', '5800', '700', '4800', '5800', '100', '35', '0', '2014-07-21'),
('9', 'Cigar/60', '3700', '770', '3500', '2250', '50', '60', '0', '2014-07-21'),
('10', 'MLF/22', '1520', '900', '750', '1750', '100', '22', '0', '2014-07-21'),
('11', 'Epsilon1/40', '2860', '930', '2400', '1700', '50', '40', '0', '2014-07-21'),
('12', 'Amiral/35', '4650', '210', '4950', '5950', '100', '35', '0', '2014-07-21'),
('13', 'Wester/30', '4500', '200', '4000', '2500', '50', '30', '0', '2014-07-21'),
('14', 'DS/27/Choco', '4320', '300', '3800', '4800', '100', '27', '0', '2014-07-21'),
('15', 'Wester/30 choco', '4800', '400', '4100', '2550', '50', '30', '0', '2014-07-21'),
('16', 'Wester/40', '3000', '500', '2400', '3400', '100', '40', '0', '2014-07-21'),
('17', 'Wester/40 choco', '3200', '600', '2400', '1700', '50', '40', '0', '2014-07-21'),
('18', 'Haloua/25', '2600', '700', '2000', '3000', '100', '25', '0', '2014-07-21'),
('20', 'Nogua/50', '3100', '800', '3000', '3100', '100', '50', '0', '2014-07-21'),
('21', 'Coc32/XXX', '3300', '900', '2850', '1925', '50', '32', '0', '2014-07-21'),
('22', '3assala/100', '3500', '1000', '3000', '3500', '100', '100', '0', '2014-07-21'),
('23', 'Chefkaw/60', '4200', '500', '3800', '2400', '50', '60', '0', '2014-07-21'),
('24', 'MZ/50', '1600', '600', '1000', '2000', '100', '50', '0', '2014-07-21'),
('25', 'BigMarechal/27', '4700', '700', '3700', '2350', '50', '27', '0', '2014-07-21'),
('26', 'BigMarchal/25', '3900', '840', '3300', '3900', '100', '25', '0', '2014-07-21');

--
-- Table structure: `ventes`
--

CREATE TABLE `ventes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_vente` text NOT NULL,
  `id_clients` int(11) NOT NULL,
  `depart_km` int(11) NOT NULL,
  `arrivee_km` int(11) NOT NULL,
  `depart_date_heur` int(11) NOT NULL,
  `depart_date_min` int(11) NOT NULL,
  `arrivee_date_heur` int(11) NOT NULL,
  `arrivee_date_min` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_clients` (`id_clients`),
  CONSTRAINT `ventes_ibfk_1` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ;

--
-- Table data: `ventes`
--
INSERT INTO `ventes` (`id`, `date_vente`, `id_clients`, `depart_km`, `arrivee_km`, `depart_date_heur`, `depart_date_min`, `arrivee_date_heur`, `arrivee_date_min`) VALUES 
('1', '2014-07-24', '3', '100', '200', '10', '10', '15', '10'),
('30', '2014-07-25', '4', '200', '300', '10', '10', '15', '10'),
('31', '2014-07-25', '7', '300', '400', '10', '10', '15', '10'),
('32', '2014-08-09', '8', '100', '200', '10', '10', '1', '1');