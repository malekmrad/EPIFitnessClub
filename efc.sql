-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 mai 2023 à 22:57
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `efc`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Code_postal` varchar(50) NOT NULL,
  `Pays` varchar(50) NOT NULL,
  `type_de_carte` varchar(50) NOT NULL,
  `numc` varchar(50) NOT NULL,
  `cs` varchar(50) NOT NULL,
  `nomp` varchar(50) NOT NULL,
  `prixtt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_produit`, `fName`, `lName`, `Adresse`, `Code_postal`, `Pays`, `type_de_carte`, `numc`, `cs`, `nomp`, `prixtt`) VALUES
(2, 0, 'malek', 'mrad', 'gdgdgdf', '5080', '', 'on', '5554897963', '', 'Malek Mrad', '368'),
(3, 0, 'Mootaz', 'Braham', 'Sousse, Sahloul 4', '5000', '', 'on', '597821463', '', 'Mootaz Braham', '1390'),
(4, 0, 'Nabil ', 'Belkahla', 'Khzema', '5000', '', 'on', '73349972015', '', 'Nabil Belkahla', '885'),
(5, 0, 'Omar', 'Jomaa', 'Wra Darna', '5861', '', 'on', '367775613', '', 'Omar Jomaa', '990'),
(6, 0, 'Nader', 'Bedoui', 'Monastir', '5080', '', 'on', '5289866475', '', 'Nader Bedoui', '681'),
(7, 0, 'habla', 'habla', 'sahloul', '546', '', 'on', '5643213165', '', 'noursen', '820'),
(8, 0, 'Edgard', 'Charly', 'Sahlou 4', '5000', '', 'on', '654649861649', '', 'Charly Edgard', '795'),
(9, 0, 'medamine', 'mzoughi', 'saheline', '5012', '', 'on', '45643531', '', 'Mzoughi', '707'),
(43, 0, 'med', 'hedi', 'Tunis', '4000', '', 'on', '633479', '', 'Med hedi', '1450'),
(44, 0, 'mahdi', 'maaref', 'Zaremdine', '4621', '', 'on', '8632466', '', 'Mahdi Maaref', '75'),
(45, 0, 'Lobna', 'Boussema', 'Tbolba', '5080', '', 'on', '5625621565', '', 'Lobna Boussema', '3822'),
(46, 0, 'Nada', 'Haha', 'mestir', '4621', '', 'on', '65486465156', '', 'Nada Haha', '1315');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` int(50) NOT NULL,
  `interet` varchar(100) NOT NULL,
  `ref` varchar(150) NOT NULL,
  `qst` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `tel`, `interet`, `ref`, `qst`) VALUES
(1, 'Mrad', 'wv', 'klrfs@glmaqds.com', 5564654, 'Group Fitness', 'ad', 'h'),
(2, 'malek', 'sdv', 'mal@gmai.com', 2147483647, 'Group Fitness', 'google', 'mm');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id_fourn` int(11) NOT NULL,
  `nom_fourn` varchar(100) NOT NULL,
  `addresse` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fourn`, `nom_fourn`, `addresse`, `email`, `phone`) VALUES
(1, 'srd', 'rue bekalta 5080', 'razi@srd.tn', '92066208'),
(2, 'braham world trade', 'teboulba 5080', 'braham@worldtrade.tn', '95757516'),
(3, 'DIGITIN', 'Rue omran monastir 5000', 'digitin@digitin.net', '58575757'),
(4, 'EPI', 'Sahloul', 'epi@episousse.tn', '73546182');

-- --------------------------------------------------------

--
-- Structure de la table `mvmnt_stock`
--

CREATE TABLE `mvmnt_stock` (
  `id_mvmnt` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `date_mvmnt` date NOT NULL,
  `type_mvmnt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mvmnt_stock`
--

INSERT INTO `mvmnt_stock` (`id_mvmnt`, `id_produit`, `qte`, `date_mvmnt`, `type_mvmnt`) VALUES
(15, 11, 7, '2023-05-15', ''),
(16, 13, 4, '2023-05-15', ''),
(17, 11, 7, '2023-05-15', ''),
(18, 13, 2, '2023-05-15', ''),
(19, 7, 3, '2023-05-15', ''),
(20, 17, 5, '2023-05-15', ''),
(21, 9, 1, '2023-05-15', ''),
(22, 20, 3, '2023-05-15', ''),
(23, 13, 6, '2023-05-15', ''),
(24, 19, 5, '2023-05-15', ''),
(25, 8, 4, '2023-05-15', ''),
(26, 9, 6, '2023-05-15', ''),
(27, 7, 6, '2023-05-15', ''),
(28, 10, 5, '2023-05-15', '');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_pai` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `Adresse` varchar(400) NOT NULL,
  `Code_postal` varchar(50) NOT NULL,
  `Pays` varchar(40) NOT NULL,
  `type_de_carte` varchar(50) NOT NULL,
  `numc` varchar(20) NOT NULL,
  `nomp` varchar(50) NOT NULL,
  `prixtt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `wasef` varchar(2000) NOT NULL,
  `prix_uni` double NOT NULL,
  `qte` int(50) NOT NULL,
  `taswira` varchar(700) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `wasef`, `prix_uni`, `qte`, `taswira`, `code`) VALUES
(7, 'Sac sport 20l - essential bleu', '20 litres. Format Cabine d avion. Dimensions (sac déplié) = 40 x 23 x 20 cm.\r\n2 compartiments.1 poche principale, 1 poche latérale.\r\nSac repliable dans sa poche latérale | Sac plié = 23 x 20 x 10 cm.\r\nComposant résistant au poids et à l abrasion. Testé en laboratoire', 25, 4, 'sacbleu.jpg', '3MqDz'),
(8, 'Short fitness homme coton droit avec poche clés - 100 gris court', 'Extensibilité naturelle du tissu grâce à son mode de tricotage.\r\nFibres coton majoritaire, qui garantissent souplesse et confort.', 30, 365, 'shortgris.jpg', 'Erf9A'),
(9, 'Veste running coupe vent femme - wind corail', 'Tissu qui vous protège du vent.\r\nSe range dans sa poche et se transporte facilement grâce à son élastique.\r\nZip central et aération dos pour une meilleure circulation de l air.\r\n1 poche zippée à droite pour transporter vos petits objets en toute sécurité.', 75, 87, 'vesterun.jpg', 'TcSn6r'),
(10, 'Chaussures running & athlétisme enfant kiprun grip grises et noires oranges fluo', 'Les nombreux crampons multidirectionnels lui offrent une très bonne accroche.\r\nLa partie supérieure conçue comme un chausson assure un grand confort.\r\nLa semelle ne laisse pas de trace sur le sol des gymnases.\r\nSon tissu supérieur laisse glisser les gouttes d eau plutôt que de les absorber.', 119, 57, 'chausrun.jpg', 'TvAwV'),
(11, 'Ecouteurs running sans fil onear 500 bluetooth blancs', 'Télécommande et micro pour basculer entre la musique et les appels téléphoniques.\r\nAutonomie de 4h en écoute.\r\nCompatible tout smartphone (IOS >6.1 et ANDROID > 4.1).\r\nLes écouteurs sont résistants à la pluie et à la transpiration.', 103, 17, 'kit.jpg', 'YdMNf56'),
(13, 'Gold Standard Whey', 'Source de protéines..\r\nAvec des enzymes digestives.\r\nFournit des BCAAs.\r\nDisponible en différentes saveurs.', 240, 86, 'gantsboxr.jpg', 'RBxy92'),
(14, 'Gold Standard Whey', 'Source de protéines..\r\nAvec des enzymes digestives.\r\nFournit des BCAAs.\r\nDisponible en différentes saveurs.', 240, 86, 'goldwhey.jpg', 'EZvk54'),
(15, 'Gants de boxe 300 blancs , gants d entraînement débutant homme ou femme', 'Mousse moulée pour un amorti optimal. Rembourrage poignet double face.\r\nTissu mesh aéré sur la paume et l intérieur de poignet.\r\nLa fermeture scratch en polyuréthane garantit un bon maintien de votre poignet.\r\nRevêtement extérieur synthétique ( PU ) 0,7 mm, résistant', 65, 48, 'gantsboxb.jpg', 'RcvHFs82'),
(16, 'Chaussures de running homme kalenji run 100 gris', 'Chaussure très légère: 180g en 43.\r\nLa chaussure est dotée d un premier niveau de confort pour débuter le running.', 79, 25, 'chaussures-de-running-homme-kalenji-run-100-gris.webp', 'Rd2Awx'),
(17, 'Chaussure de football adulte terrains secs clr fg bordeaux et orange', 'Améliore ta vitesse grâce à une semelle Pebax Powered®: ultra légère et réactive\r\nUne chaussure légère grâce à ses matériaux fins, légers, techniques et souples !', 290, 51, 'chaussure-de-football-adulte-terrains-secs-clr-fg-bordeaux-et-orange.webp', 'ZwVBg'),
(18, 'Casquette trucker beige enfant mh100', 'Système de réglage qui permet d ajuster la taille du 52 au 56cm de tour de tête.\r\nNe pèse que 66 grammes', 39, 87, 'casquette-trucker-enfant-mh100.webp', 'ZnPlM'),
(19, 'PACK MUSCLE SEC', 'Augmentation du volume musculaire sans prise de graisse et sans fluctuation de poids, dans le but d obtenir un physique musclé et un bon détaché musculaire.', 399, 27, 'pack4-e1676206829889.webp', 'ZVnPm'),
(20, 'THE SHADOW – 270G', 'The Shadow – 270G est un supplément pré-entraînement produit par JNX SPORTS, une entreprise spécialisée dans les compléments alimentaires pour les sportifs. Ce produit est conçu pour aider les athlètes à atteindre leurs objectifs d’entraînement en augmentant leur endurance, leur énergie et leur concentration.', 129, 18, 'the_shadow_fruit_punch_1_550x.webp', 'RthBd');

-- --------------------------------------------------------

--
-- Structure de la table `signup`
--

CREATE TABLE `signup` (
  `userID` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `psw` varchar(100) NOT NULL,
  `valid` int(1) NOT NULL,
  `exp_date` varchar(250) NOT NULL,
  `reset_link_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `signup`
--

INSERT INTO `signup` (`userID`, `prenom`, `nom`, `email`, `username`, `psw`, `valid`, `exp_date`, `reset_link_token`) VALUES
(1, 'Malek', 'Mrad', 'mrad.malek903@gmail.com', 'malekmrr', '123456789', 0, '', ''),
(2, 'Mrad', 'Malek', 'malekmrrad@gmail.com', 'MalekMrad', '123456789', 0, '', ''),
(3, 'Mrad', 'Malek', 'malekmrrad@gmail.com', 'malekmrad', '123456789', 0, '', ''),
(4, 'nabil', 'belkahla', 'nabil02@gmail.com', 'naboula', '789123456', 0, '', ''),
(5, 'hamma', 'mlo', 'mlo@gmail.com', 'mlo', '789456123', 0, '', ''),
(6, 'dev', 'dev', 'admin@efc.tn', 'admin', 'admin', 0, '', ''),
(7, 'Nader', 'Bedoui', 'naderbedoui99@gmail.com', 'bsal', '', 0, '2023-05-09 21:32:24', '7c4d07102f5465c5b0b2b5528aaa6bf26040'),
(8, 'Omar', 'djomaa', '0marJ0m44@gmail.com', 'omar', '123456789', 0, '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_produit` (`id_produit`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id_fourn`);

--
-- Index pour la table `mvmnt_stock`
--
ALTER TABLE `mvmnt_stock`
  ADD PRIMARY KEY (`id_mvmnt`),
  ADD KEY `fk_pr` (`id_produit`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_pai`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id_fourn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `mvmnt_stock`
--
ALTER TABLE `mvmnt_stock`
  MODIFY `id_mvmnt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_pai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `signup`
--
ALTER TABLE `signup`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mvmnt_stock`
--
ALTER TABLE `mvmnt_stock`
  ADD CONSTRAINT `fk_pr` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
