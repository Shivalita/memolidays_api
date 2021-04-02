-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 22 mars 2021 à 09:05
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memolidays_api`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `user_id`, `name`, `pin_id`) VALUES
(1, 13, 'Voyage', 1),
(2, 13, 'Sorties', 2),
(3, 13, 'Animaux', 3),
(4, 15, 'Nature', 4);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201112111716', '2020-11-12 11:17:26', 63),
('DoctrineMigrations\\Version20201112112331', '2020-11-12 11:23:41', 226),
('DoctrineMigrations\\Version20201112112934', '2020-11-12 11:29:41', 382),
('DoctrineMigrations\\Version20201112123934', '2020-11-12 12:39:44', 424),
('DoctrineMigrations\\Version20201112124421', '2020-11-12 12:44:26', 131),
('DoctrineMigrations\\Version20201112133627', '2020-11-12 13:36:32', 112),
('DoctrineMigrations\\Version20201113094548', '2020-11-13 09:45:56', 998),
('DoctrineMigrations\\Version20201113094710', '2020-11-13 09:47:15', 110),
('DoctrineMigrations\\Version20201113144417', '2020-11-13 14:44:50', 1010),
('DoctrineMigrations\\Version20201113160632', '2020-11-13 16:06:47', 140),
('DoctrineMigrations\\Version20201116091901', '2020-11-16 09:19:18', 182),
('DoctrineMigrations\\Version20201120110651', '2020-11-20 11:07:02', 1323);

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `souvenir_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `file`
--

INSERT INTO `file` (`id`, `souvenir_id`, `path`, `type`, `token`) VALUES
(1, 1, 'https://drive.google.com/file/d/1i4f0w7bmel11yGc9R2tkpQaSldZ_n91J', 'jpg', 'none'),
(2, 1, 'https://drive.google.com/file/d/1NTWTMBJmt97kkl-jUMSWEu5bVX4b13By', 'jpg', 'none'),
(3, 1, 'https://drive.google.com/file/d/1ZlMyqhTNxJWNpXWqKfujyMtkGs-sIqRi', 'jpg', 'none'),
(4, 1, 'https://drive.google.com/file/d/1D7oyapp9cfj1SmJJrrIibRFbhfCNzIeF', 'jpg', 'none'),
(5, 1, 'https://drive.google.com/file/d/1NWm0v0UKyorTmSVbbwD4V80EEwi26I52', 'jpg', 'none'),
(14, 4, 'https://drive.google.com/file/d/1P5qZZyaXeNRix7Kp9He1BeYGg4sViWQu', 'jpg', 'none'),
(15, 4, 'https://drive.google.com/file/d/1AgCuIliBrhcFspjP7AHgd8H1Yb8lD-rC', 'jpg', 'none'),
(19, 4, 'https://drive.google.com/file/d/1wAZI2nuWjQC2S8dSGN8QPGXKgs7olJGP', 'jpg', 'none'),
(21, 5, 'https://drive.google.com/file/d/15KNqiClv-AZdWP5DtD9s_ep7ZKXvtcRa', 'jpg', 'none'),
(23, 5, 'https://drive.google.com/file/d/15L3l3Ib3m2wHfi23hoqsPQaK62Z3VZPt', 'jpg', 'none'),
(24, 5, 'https://drive.google.com/file/d/15K2kQAhEMRVzVxoF0_BJNFRjkCLrOPsz', 'jpg', 'none'),
(25, 5, 'https://drive.google.com/file/d/15C2lQOiMHePJ6yOSSxGr6HRm8cmIkruQ', 'jpg', 'none'),
(26, 6, 'https://drive.google.com/file/d/1WmFn9PjzfYune5z8c77beKJfPKXiU0bL', 'jpg', 'none'),
(27, 6, 'https://drive.google.com/file/d/1av2WlYrDDbcUYcePmIoollLsUYf-gS8X', 'jpg', 'none'),
(38, 17, 'https://drive.google.com/file/d/139w1JE7Kz7KhaBig72QcDiPrFodHuH2S', 'jpg', 'none'),
(39, 17, 'https://drive.google.com/file/d/1BkXJmqDPev83nk129zcj-oIOqX67whuF', 'jpg', 'none'),
(40, 17, 'https://drive.google.com/file/d/1jnUtNVp6n1elF32P9KOA26H3Jau_qWFO', 'jpg', 'none'),
(41, 17, 'https://drive.google.com/file/d/1ddPv8RsxhvyWhKsnnC6C6T7-205QJhfG', 'jpg', 'none');

-- --------------------------------------------------------

--
-- Structure de la table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pin`
--

INSERT INTO `pin` (`id`, `icon`, `color`) VALUES
(1, 'flight', 'blue'),
(2, 'car', 'purple'),
(3, 'pets', 'amber'),
(4, 'nature', 'green');

-- --------------------------------------------------------

--
-- Structure de la table `souvenir`
--

CREATE TABLE `souvenir` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `souvenir`
--

INSERT INTO `souvenir` (`id`, `user_id`, `title`, `cover`, `event_date`, `email`, `phone`, `comment`, `address`, `latitude`, `longitude`, `place`, `created_at`) VALUES
(1, 13, 'Vacances aux Caraïbes', 'https://drive.google.com/file/d/12bsh-PrRyhhpPAGKO0zOLd-0tyfL27Sh', '2016-10-25', '', '', 'Vacances de rêve !', 'Place des Martyrs-de-la-Liberté 97159 Pointe-à-Pitre', 16.2333, -61.5167, 'Caraïbes', '2020-11-11 15:47:36'),
(4, 13, 'Disneyland', 'https://drive.google.com/file/d/1qdD_LshP-QXySlFuUO4Gsh5HqjsgGCzh', '2020-05-26', 'contact@disney.com', '08 25 30 02 22', 'Un rêve d\'enfance', 'Boulevard de Parc, 77700 Coupvray, France', 48.8719, 2.776623, 'Paris', '2020-11-13 10:43:44'),
(5, 13, 'Ruby', 'https://drive.google.com/file/d/15HwKrUkv2UkgNdHkQCfQeKSWHAMpkNjB', '2020-10-01', '', '', 'Minette', '52 rue Cuvier, 42300 Roanne, France', 46.0333, 4.0667, 'Roanne', '2020-11-13 16:31:03'),
(6, 15, 'Les Alpes', 'https://drive.google.com/file/d/1MlUfvtPaZMOOBvQJcCGfDKR6Uh9oIT67', '2019-06-04', '', '', '', 'L\'Église, 05160 Pontis, France', 44.5038, 6.35765, 'Pontis', '2020-11-12 21:27:55'),
(17, 13, 'Safari de Peaugres', 'https://drive.google.com/file/d/1cF1NuBgqAjLAXTolaEROT85W83P8t_9a', '2017-06-13', '', '04 75 33 00 32', 'Super safari !', 'D821, 07340 Peaugres', 45.26884, 4.71541, 'Peaugres', '2020-11-18 20:47:36');

-- --------------------------------------------------------

--
-- Structure de la table `souvenir_category`
--

CREATE TABLE `souvenir_category` (
  `souvenir_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `souvenir_category`
--

INSERT INTO `souvenir_category` (`souvenir_id`, `category_id`) VALUES
(1, 1),
(4, 2),
(5, 3),
(6, 4),
(17, 2),
(17, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_premium` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `google_id`, `name`, `email`, `avatar`, `is_premium`) VALUES
(13, 'DwS4lryme3afAqq5ogkmLQlangc2', 'Perle', 'shivalita@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GiMEpsnizHPBllnacd-uAARgjHWDIHQwnnb0FA=s96-c', 1),
(15, 'vwWuAMdbLVgR724Py9Okc3RIqww2', 'Havelock Veterini', 'h4velock.veterini@gmail.com', 'https://lh3.googleusercontent.com/-vbrGj-Q4go4/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucmtoD_tZDGdXd6qjg4LW2CUsqqymw/s96-c/photo.jpg', 0),
(23, 'wNMEJ6ipR2YAmlOBg5Z5AqKOG8c2', 'Memolidays Test', 'memolidays.test@gmail.com', 'https://lh6.googleusercontent.com/-8r9lP79e2bE/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucmmh_sLtyv4uldl5nINY45ImcjTkA/s96-c/photo.jpg', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19C16C3B254C` (`pin_id`),
  ADD KEY `IDX_64C19C1A76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8C9F3610DBC4A80F` (`souvenir_id`);

--
-- Index pour la table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `souvenir`
--
ALTER TABLE `souvenir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_53FBDDEEA76ED395` (`user_id`);

--
-- Index pour la table `souvenir_category`
--
ALTER TABLE `souvenir_category`
  ADD PRIMARY KEY (`souvenir_id`,`category_id`),
  ADD KEY `IDX_AB03716FDBC4A80F` (`souvenir_id`),
  ADD KEY `IDX_AB03716F12469DE2` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64976F5C865` (`google_id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `souvenir`
--
ALTER TABLE `souvenir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C16C3B254C` FOREIGN KEY (`pin_id`) REFERENCES `pin` (`id`),
  ADD CONSTRAINT `FK_64C19C1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `FK_8C9F3610DBC4A80F` FOREIGN KEY (`souvenir_id`) REFERENCES `souvenir` (`id`);

--
-- Contraintes pour la table `souvenir`
--
ALTER TABLE `souvenir`
  ADD CONSTRAINT `FK_53FBDDEEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `souvenir_category`
--
ALTER TABLE `souvenir_category`
  ADD CONSTRAINT `FK_AB03716F12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AB03716FDBC4A80F` FOREIGN KEY (`souvenir_id`) REFERENCES `souvenir` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
