-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 27 nov. 2022 à 19:58
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestioncompetences`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_id` int DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_497DD6341E5D0459` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `test_id`, `nom`) VALUES
(1, NULL, 'categorie 1'),
(2, NULL, 'categorie 2');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221126160316', '2022-11-26 16:04:09', 394),
('DoctrineMigrations\\Version20221126191617', '2022-11-26 19:19:40', 229),
('DoctrineMigrations\\Version20221126220344', '2022-11-26 22:03:58', 109),
('DoctrineMigrations\\Version20221127142601', '2022-11-27 14:26:12', 143);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int DEFAULT NULL,
  `question` json DEFAULT NULL,
  `competences` json DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `titre`, `description`, `score`, `question`, `competences`, `photo`) VALUES
(1, 'Java', 'this is a java test', 18, '[{\"1\": \"question1\"}, {\"2\": \"question2\"}]', '[{\"1\": \"competence 1\"}, {\"2\": \"competence 2\"}]', 'https://i.imgur.com/jsZdNee.png'),
(2, 'PYTHON', 'this is a python test', 5, '[{\"1\": \"question 3\"}, {\"2\": \"question 4\"}]', '[{\"1\": \"competence 3\"}, {\"2\": \"competence 4\"}]', 'https://i.imgur.com/zez4zoj.jpg'),
(3, 'REACT JS', 'this is REACT JS test', 10, '[{\"1\": \"question1\"}, {\"2\": \"question2\"}]', '[{\"1\": \"competence 1\"}, {\"2\": \"competence 2\"}]', 'https://i.imgur.com/ASFd0Uz.png'),
(4, 'SPRING BOOT', 'this is SPRING BOOT test', 8, '[{\"1\": \"question1\"}, {\"2\": \"question2\"}]', '[{\"1\": \"competence1\"}, {\"2\": \"competence2\"}]', 'https://i.imgur.com/MW7xS0U.png'),
(5, 'Angular', 'this is Angular test', 6, '[{\"1\": \"question1\"}, {\"2\": \"question2\"}]', '[{\"1\": \"competence 1\"}, {\"2\": \"competence 2\"}]', 'https://i.imgur.com/H80Njn9.png'),
(6, 'Symfony', 'this is symfony test', 17, '[{\"1\": \"question1\"}, {\"2\": \"question2\"}]', '[{\"1\": \"competence 1\"}, {\"2\": \"competence 2\"}]', 'https://i.imgur.com/UBvhKIX.png'),
(7, 'PHP', 'this is php test', 14, '[{\"1\": \"question1\"}, {\"2\": \"question2\"}]', '[{\"1\": \"competence 1\"}, {\"2\": \"competence 2\"}]', 'https://i.imgur.com/y07Qtr3.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `nom`, `prenom`, `email`) VALUES
(7, 'admin1', '[\"ROLE_ADMIN\"]', '$2y$13$1CmL3ReDF9xnzq9fTxALHunYffPa82viqfamHNziYGRVgHupVARvO', 'hadhraoui', 'marwa', 'hadhraouimarwa21@gmail.com'),
(8, 'admin2', '[\"ROLE_ADMIN\"]', '$2y$13$GTfsNAuCLfjVrH/M1WZ3gec7QeV8PqrXQZMlbTnHWun0tZV6vksNG', '', '', ''),
(9, 'user0', '[]', '$2y$13$DTg1jsBRUBjiuaVfR1oIuOWy7AkMHB.ZJmRXoi9BzLmPxJ0YZWjra', '', '', ''),
(10, 'user1', '[]', '$2y$13$zGIYof064sTWE4qK1lf3Ie1r/OBZXx0mxpwZKNqN7xtpk33GGxGri', '', '', ''),
(11, 'user2', '[]', '$2y$13$iWThEN05gxX9XowG/n2M0.S2wCzSK3nje3rjLP/NDtrq7R5YzR/ki', '', '', ''),
(12, 'user3', '[]', '$2y$13$daRE74ALo8ftAiAbHR/ZEuuU0hcsOse3oR3z6ARYjODQJ21MkmD0y', '', '', ''),
(13, 'user4', '[]', '$2y$13$C1DoYb/UmNrkSzyEieVV6egZw82UDRLMxOy2ylvmAt90Bt0111SZO', '', '', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `FK_497DD6341E5D0459` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
