-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 02 déc. 2018 à 12:53
-- Version du serveur :  5.7.21
-- Version de PHP :  7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tpblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'Moe', 'Un peu court ce billet !', '2018-11-03 18:45:43'),
(2, 1, 'Marge', 'Oui, ça commence pas très fort ce blog ...', '2018-11-03 18:46:31'),
(3, 1, 'Ned', 'Salit, Salat, Salut, chères voisinous !!!', '2018-11-03 18:47:51'),
(4, 2, 'Bart', 'What\'s the fuck !!!', '2018-11-03 19:38:16'),
(5, 2, 'Marge', 'Bart, surveille ton langage !', '2018-11-03 19:38:55'),
(6, 2, 'Ned', 'Ta maman a raison, jeune voisinou.\r\nLes enfants grossiers propagent la parole du diable.', '2018-11-03 19:40:15'),
(7, 3, 'Bart', 'Mais c\'est vraiment n\'importe quoi !!!', '2018-11-04 14:21:20'),
(8, 3, 'Marge', 'Voyons Bart, soit gentil avec les personnes pleines de bonne volonté.', '2018-11-04 14:22:31'),
(9, 3, 'Homer', 'Bart à raison Marge, c\'est du niveau de stupide Flanders.', '2018-11-04 14:23:05'),
(10, 4, 'Ned', 'Salit, Salat, Salut', '2018-11-26 13:03:39'),
(11, 4, 'Homer', 'It\'s work !!!', '2018-11-26 13:04:10'),
(12, 4, 'Jack', 'What\'s the fuck\r\n', '2018-11-28 11:07:02'),
(13, 1, 'Homer', 'Test 1 2 ...', '2018-11-28 17:04:21'),
(14, 4, 'Bob', 'Nouveau test', '2018-11-30 18:25:16'),
(15, 3, 'Moe', 'TEST 1 2 ', '2018-12-02 13:49:56');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog, qui parlera de ... PHP bien sûr !', '2018-11-03 18:38:14'),
(2, 'Le PHP à la conquête du monde !', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir : \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a de plus, précisé que le monde serait bientôt à sa botte.\r\nPas dur, ceci dit entre nous ...', '2018-11-03 19:37:06'),
(3, 'Mon 3ème billet !', 'Un 3ème billet qui ne traite de rien, sert juste de test.', '2018-11-04 14:20:13'),
(4, 'Un nouveau billet', 'Encore un nouveau billet qui sert à rien, si ce n\'est de test ...\r\nDésolé :(', '2018-11-18 13:46:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
