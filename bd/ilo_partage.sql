-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 11 juin 2020 à 14:52
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ilo_partage`
--

-- --------------------------------------------------------

--
-- Structure de la table `association_genres`
--

DROP TABLE IF EXISTS `association_genres`;
CREATE TABLE IF NOT EXISTS `association_genres` (
  `id_genre` int(10) NOT NULL,
  `id_publication` int(10) NOT NULL,
  KEY `id_genre` (`id_genre`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `association_genres`
--

INSERT INTO `association_genres` (`id_genre`, `id_publication`) VALUES
(24, 3),
(9, 3),
(13, 6),
(11, 6),
(5, 6),
(1, 1),
(23, 2),
(2, 2),
(1, 2),
(2, 8),
(16, 8),
(1, 8),
(13, 11),
(2, 11),
(12, 11),
(23, 7),
(1, 7),
(11, 10),
(13, 12),
(11, 12),
(5, 12),
(23, 12),
(23, 15),
(3, 15),
(15, 15),
(11, 18);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_comment` int(10) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(500) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_publication` int(10) NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_comment`),
  KEY `id_user` (`id_user`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_comment`, `contenu`, `id_user`, `id_publication`, `date_comment`) VALUES
(27, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 8, '2020-06-09 13:46:53'),
(32, 'zfrvcthyukuzhgbregfzs', 21, 1, '2020-06-11 09:50:44'),
(33, 'sdqfcrthbyujkjui', 21, 12, '2020-06-11 10:09:40'),
(34, 'gfjhnh,j,qfdvdfqv', 21, 12, '2020-06-11 10:09:45'),
(35, 'zarfrthyuk,iolpom', 1, 1, '2020-06-11 13:50:14'),
(36, 'qsrvgfgnhnuki;lioplknreb', 1, 1, '2020-06-11 13:50:19'),
(37, 'dfgvythuiliolkyvzervrevreger', 2, 2, '2020-06-11 15:49:13'),
(38, 'egrtyhjyukiolknfvcefc', 2, 7, '2020-06-11 16:17:26');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publication` int(10) NOT NULL,
  `realisateur` varchar(50) NOT NULL,
  `affiche` varchar(50) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `duree` varchar(10) NOT NULL,
  `date_sortie` varchar(20) NOT NULL,
  `acteurs` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `id_publication`, `realisateur`, `affiche`, `nationalite`, `duree`, `date_sortie`, `acteurs`) VALUES
(1, 3, ' Jon S. Baird', 'Ordure3.jpg', 'britannique', '1h 37min', '23 septembre 2014', 'James McAvoy, Jamie Bell, Eddie Marsan');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `designation` varchar(20) NOT NULL,
  `filtre` enum('all','livre','film','music','jeu') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `designation`, `filtre`) VALUES
(1, 'Science-fiction', 'livre'),
(2, 'Fantastique', 'livre'),
(3, 'Fantasy', 'livre'),
(4, 'Fiction', 'livre'),
(5, 'Biographie', 'livre'),
(6, 'Documentaire', 'all'),
(7, 'Imaginaire', 'livre'),
(9, 'Policier', 'livre'),
(10, 'Thriller', 'all'),
(11, 'Aventure', 'livre'),
(12, 'Réaliste', 'livre'),
(13, 'Autobiographie', 'livre'),
(14, 'Historique', 'livre'),
(15, 'Horreur', 'livre'),
(16, 'Jeunesse', 'livre'),
(17, 'Drame', 'all'),
(18, 'Comédie', 'all'),
(19, 'Animation', 'all'),
(20, 'Western', 'all'),
(21, 'Romance', 'livre'),
(22, 'Action', 'all'),
(23, 'Divers', 'livre'),
(24, 'Comédie Dramatique', 'all');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_publication` int(10) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `editeur` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `couverture` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `id_publication`, `auteur`, `editeur`, `type`, `couverture`) VALUES
(1, 1, 'St&amp;eacute;phane Beauverger', 'La Volte', 'Roman', 'dechronologue.jpg'),
(2, 2, 'Ken LIU', 'Le B&amp;eacute;lial\'', 'Nouvelles', 'menagerie_papier.jpg'),
(3, 7, 'Vincent Message', 'Seuil', 'Roman', 'Vincent Message_7.jpg'),
(4, 8, 'Un Auteur', 'Seuil', 'Roman Graphique', 'Un Auteur_8.png'),
(6, 10, 'etgterhrth', 'teghrtzhrt', 'Roman', 'etgterhrth_10.jpg'),
(7, 11, 'No Name', 'Didouda', 'Roman', 'No Name_11.png'),
(8, 12, 'Nom Auteur', 'Editeur', 'Roman', 'Nom Auteur_12.jpg'),
(9, 15, 'Nom Auteur', 'Editeur', 'Bande Dessinée', 'Nom Auteur_15.jpg'),
(12, 18, 'arfrthgtyj', 'zvgrtyhty', 'Roman', 'arfrthgtyj_18.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id_publication` int(10) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `recompense` varchar(400) DEFAULT NULL,
  `resume` varchar(1500) NOT NULL,
  `a_propos` varchar(1000) DEFAULT NULL,
  `avis` varchar(1500) NOT NULL,
  `avis_detail` varchar(3000) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `img_bg` varchar(100) NOT NULL,
  `police` varchar(30) NOT NULL,
  `id_user` int(10) NOT NULL,
  `date_publication` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_publication`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id_publication`, `titre`, `recompense`, `resume`, `a_propos`, `avis`, `avis_detail`, `lien`, `img_bg`, `police`, `id_user`, `date_publication`) VALUES
(1, 'Le D&amp;eacute;chronologue', 'Le Prix europ&amp;eacute;en Utopiales 2009, le Grand Prix de l&amp;rsquo;Imaginaire 2010, le Nouveau Grand Prix de la Science-Fiction fran&amp;ccedil;aise (Prix du lundi) 2010, le Prix Bob Morane 2010, et le Prix Imaginales des Lyc&amp;eacute;ens 2012.', 'Au XVIIe si&amp;egrave;cle, sur la mer des Cara&amp;iuml;bes, le capitaine Henri Villon et son &amp;eacute;quipage de pirates luttent pour pr&amp;eacute;server leur libert&amp;eacute; dans un monde d&amp;eacute;chir&amp;eacute; par d&amp;rsquo;impitoyables perturbations temporelles. Leur arme : le D&amp;eacute;chronologue, un navire dont les canons tirent du temps.\r\nQu&amp;rsquo;esp&amp;eacute;rait Villon en quittant Port-Margot pour donner la chasse &amp;agrave; un galion espagnol ? Mettre la main, peut-&amp;ecirc;tre, sur une maravilla, une des merveilles secr&amp;egrave;tes, si rares, qui apparaissent quelquefois aux abords du Nouveau Monde. Assur&amp;eacute;ment pas croiser l&amp;rsquo;impensable : un L&amp;eacute;viathan de fer glissant dans l&amp;rsquo;orage, capable de cracher la foudre et d&amp;rsquo;abattre la mort !\r\nLorsque des personnages hauts en couleur, au verbe fleuri ou au rugueux parler des &amp;icirc;les, croisent objets et intrus venus du futur, un souffle picaresque et original confronte le r&amp;eacute;cit d&amp;rsquo;aventures maritimes &amp;agrave; la science-fiction. De quoi &amp;ecirc;tre pr&amp;eacute;cipit&amp;eacute; sur ces rivages lointains o&amp;ugrave; l&amp;rsquo;Histoire &amp;eacute;ventr&amp;eacute;e fait contin&amp;ucirc;ment naufrage, o&amp;ugrave; les marins affrontent tous les temps. Car avec eux, on sait : qu&amp;rsquo;importe de vaincre ou de sombrer, puisque l&amp;rsquo;important est de se battre !', 'N&amp;eacute; en Bretagne en 1969, St&amp;eacute;phane Beauverger vit aujourd&amp;rsquo;hui &amp;agrave; Paris. Journaliste de formation, il rencontre Pierre Christin, le talentueux sc&amp;eacute;nariste de Bilal et M&amp;eacute;zi&amp;egrave;res entre autres, qui  sera son professeur d&amp;rsquo;&amp;eacute;criture. Apr&amp;egrave;s avoir travaill&amp;eacute;  comme sc&amp;eacute;nariste professionnel pour l&amp;rsquo;industrie vid&amp;eacute;o, il se consacre d&amp;eacute;sormais &amp;agrave; l&amp;rsquo;&amp;eacute;criture de ses romans et de ses bandes-dessin&amp;eacute;es.\r\nLe D&amp;eacute;chronologue m&amp;ecirc;le genre et &amp;eacute;poque, galions et paradoxes temporels, parler des &amp;icirc;les et imaginaire de science-fiction. Avec ce nouveau r&amp;eacute;cit, Beauverger ose l\'aventure extraordinaire d\'une uchronie pirate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lavolte.net/livres/le-dechronologue/', 'Le D&amp;eacute;chronologue_1.jpg', 'AardvarkSk8', 1, '2020-05-21 13:16:26'),
(2, 'La M&amp;eacute;nagerie de Papier', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eztgrtyehyrhby', 'La M&amp;eacute;nagerie de Papier_1.jpeg', 'EightBitDragon', 1, '2020-05-23 11:57:31'),
(3, 'Un autre titre', '', 'R&amp;eacute;sum&amp;eacute; du livre&amp;eacute;&amp;quot;\'\'(yv-v &amp;egrave;_inbkl&amp;egrave;(-&amp;egrave;\'vy\'(tg\'z', '', 'R&amp;eacute;sum&amp;eacute; du livre&amp;eacute;&amp;quot;\'\'(yv-v &amp;egrave;_inbkl&amp;egrave;(-&amp;egrave;\'vy\'(tg\'z', '', 'eztgrtyehyrhby', '', 'BacktoSchool', 1, '2020-05-26 13:08:06'),
(6, 'Un autre titre', '', 'R&amp;eacute;sum&amp;eacute; du livre&amp;eacute;&amp;quot;\'\'(yv-v &amp;egrave;_inbkl&amp;egrave;(-&amp;egrave;\'vy\'(tg\'z', '', 'R&amp;eacute;sum&amp;eacute; du livre&amp;eacute;&amp;quot;\'\'(yv-v &amp;egrave;_inbkl&amp;egrave;(-&amp;egrave;\'vy\'(tg\'z', '', 'eztgrtyehyrhby', '', 'BacktoSchool', 1, '2020-06-05 11:46:32'),
(7, 'D&amp;eacute;faite des Ma&amp;icirc;tres et Possesseurs', 'Laur&amp;eacute;at 2016 du Prix Orange du Livre, Laur&amp;eacute;at du Prix Horizon 2018.', 'Iris n\'a pas de papiers. Hospitalis&amp;eacute;e apr&amp;egrave;s un accident de voiture, elle attend pour &amp;ecirc;tre op&amp;eacute;r&amp;eacute;e que son compagnon, Malo Claeys, trouve un moyen de r&amp;eacute;gulariser sa situation. Mais comment s\'y prendre alors que la relation qu\'ils entretiennent est interdite ?\r\nC\'est notre monde, &amp;agrave; quelques d&amp;eacute;tails pr&amp;egrave;s. Et celui-ci, notamment : nous n\'y sommes plus les ma&amp;icirc;tres et possesseurs de la nature. Il y a de nouveaux venus, qui nous ont priv&amp;eacute;s de notre domination sur le vivant et nous font conna&amp;icirc;tre un sort analogue &amp;agrave; celui que nous r&amp;eacute;servions jusque l&amp;agrave; aux animaux.\r\n\r\nAvec cette fable brillante, dans la lign&amp;eacute;e d\'un Swift ou d\'un Kafka, Vincent Message explore un des enfers invisibles de notre modernit&amp;eacute;.', 'Vincent Message est n&amp;eacute; en 1983. Son roman Les Veilleurs, paru au Seuil en 2009, a connu un large succ&amp;egrave;s critique et public.\r\nPlongeant dans un des enfers invisibles de notre modernit&amp;eacute;, retra&amp;ccedil;ant l&amp;rsquo;histoire d&amp;rsquo;un amour difficile, D&amp;eacute;faite des ma&amp;icirc;tres et possesseurs nous entra&amp;icirc;ne dans une fable puissante o&amp;ugrave; s&amp;rsquo;entrechoquent les devenirs possibles de notre monde.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'https://www.seuil.com/ouvrage/defaite-des-maitres-et-possesseurs-vincent-message/9782021300147', 'D&amp;eacute;faite des Ma&amp;icirc;tres et Possesseurs_1.jpg', 'ImSpiegelland', 1, '2020-06-05 12:12:55'),
(8, 'Le Livre qui f&amp;ucirc;t un Livre', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eztgrtyehyrhby', 'Le Livre qui est un Livre_1.jpg', 'UraniaCzech', 1, '2020-06-05 13:15:00'),
(9, 'J\'&amp;eacute;tais un Livre', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 'J\'&amp;eacute;tais un Livre_.jpg', 'AardvarkSk8', 1, '2020-06-05 13:27:41'),
(10, 'Un titre avec des &amp;agrave;c&amp;ccedil;&amp;eacute;nts', '', 'R&amp;eacute;sum&amp;eacute; du livre&amp;eacute;&amp;quot;\'\'(yv-v &amp;egrave;_inbkl&amp;egrave;(-&amp;egrave;\'vy\'(tg\'z', '', 'R&amp;eacute;sum&amp;eacute; du livre&amp;eacute;&amp;quot;\'\'(yv-v &amp;egrave;_inbkl&amp;egrave;(-&amp;egrave;\'vy\'(tg\'z', '', 'eztgrtyehyrhby', 'Un titre avec des &amp;agrave;c&amp;ccedil;&amp;eacute;nts_1.jpg', 'AardvarkSk8', 1, '2020-06-05 13:36:31'),
(11, 'Test poste un Livre', 'R&amp;eacute;compenses et nominations', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Un mot &amp;agrave; propos de l\'auteur et/ou du livre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'zthgrzyhytrjh', 'Test poste un Livre_13.jpg', 'Roundie', 13, '2020-06-06 17:17:53'),
(12, 'Titre chang&amp;eacute;', 'R&amp;eacute;compenses et nominations', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Un mot &amp;agrave; propos de l\'auteur et/ou du livre', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Votre avis plus en d&amp;eacute;tailgbyrethtyehn', 'fr.wikipedia.org/', 'Titre chang&amp;eacute;_.jpg', 'AardvarkSk8', 21, '2020-06-09 09:37:52'),
(15, 'Encore et toujours un titre', 'R&amp;eacute;compenses et nominations', 'R&amp;eacute;sum&amp;eacute; du     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Un mot &amp;agrave; propos de l\'auteur et/ou du     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'fr.wikipedia.org/', 'Encore et toujours un titre_21.jpg', 'OrganicTeabags', 21, '2020-06-11 12:44:48'),
(18, 'Fantomas', 'R&amp;eacute;compenses et nominations', '', 'Un mot &amp;agrave; propos de l\'auteur et/ou du livre', '', 'Votre avis plus en d&amp;eacute;tail', 'sfgbthynjtyju', 'Fantomas_27.jpg', 'Roundie', 1, '2020-06-11 14:57:17');

-- --------------------------------------------------------

--
-- Structure de la table `signal_commentaire`
--

DROP TABLE IF EXISTS `signal_commentaire`;
CREATE TABLE IF NOT EXISTS `signal_commentaire` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user_com` int(10) NOT NULL,
  `id_comment` int(10) NOT NULL,
  `id_from_user` int(10) NOT NULL,
  `motif` varchar(250) NOT NULL,
  `id_publication` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_comment` (`id_comment`),
  KEY `id_from_user` (`id_from_user`),
  KEY `id_user` (`id_user_com`),
  KEY `id_publication` (`id_publication`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `signal_commentaire`
--

INSERT INTO `signal_commentaire` (`id`, `id_user_com`, `id_comment`, `id_from_user`, `motif`, `id_publication`) VALUES
(4, 2, 37, 1, 'C\'est mal !', 2),
(5, 2, 38, 13, 'Houlala je suis choqué !', 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `sexe` enum('indéfini','femme','homme') DEFAULT 'indéfini',
  `avatar` varchar(50) DEFAULT 'default_avatar.jpg',
  `bio` varchar(200) DEFAULT NULL,
  `lien_site` varchar(50) DEFAULT NULL,
  `lien_fb` varchar(50) DEFAULT NULL,
  `lien_insta` varchar(50) DEFAULT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `statut` enum('utilisateur','membre','admin') NOT NULL DEFAULT 'utilisateur',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`,`mail`),
  UNIQUE KEY `pseudo_2` (`pseudo`,`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `mdp`, `sexe`, `avatar`, `bio`, `lien_site`, `lien_fb`, `lien_insta`, `date_inscription`, `statut`) VALUES
(1, 'user1', 'user1@mail.com', '$2y$10$fTvjZb6GikG6tI9oJ4oqreicvJ1IzoU10OWfYIGTPhki0fuZnrHy2', 'femme', 'avatar_1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut .', '', 'fr.wikipedia.org', 'fr.wikipedia.org', '2020-05-15 16:03:44', 'membre'),
(2, 'user2', 'user2@mail.com', '$2y$10$WoUpErS.XBwxy.Ja8Q75K.DrjtmQDmWp9dl1IdeECmA6ooc5QJpaa', 'femme', 'default_avatar.jpg', 'ind&amp;eacute;fini ind&amp;eacute;fini ind&amp;eacute;fini ind&amp;eacute;fini ind&amp;eacute;fini ind&amp;eacute;fini ind&amp;eacute;fini ind&amp;eacute;fini ind&amp;eacute;fini', 'fr.wikipedia.org', '', '', '2020-05-16 12:44:25', 'utilisateur'),
(13, 'test', 'test@mail.com', '$2y$10$D4ZUlTGLmOge/tNjpryD6.BJVOtUTDG2Er.X/u0nwZ2SMmqsnJcrS', 'homme', 'avatar_13.jpg', 'Quand j\'&amp;eacute;tais petit, je n\'&amp;eacute;tais pas grand...', '', '', '', '2020-05-29 09:44:12', 'membre'),
(21, 'admin', 'admin@mail.com', '$2y$10$3hheGgyY1PQuO0gYvhBDYe.wqi5rUCkl4VIwo4rhMhUUH6okAfs4e', 'indéfini', 'avatar_21.jpg', 'Quand j\'&amp;eacute;tais petit, je n\'&amp;eacute;tais pas grand...', '', '', '', '2020-05-29 16:09:03', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `association_genres`
--
ALTER TABLE `association_genres`
  ADD CONSTRAINT `association_genres_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `association_genres_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publications` (`id_publication`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publications` (`id_publication`);

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`id_publication`) REFERENCES `publications` (`id_publication`);

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_ibfk_1` FOREIGN KEY (`id_publication`) REFERENCES `publications` (`id_publication`);

--
-- Contraintes pour la table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `signal_commentaire`
--
ALTER TABLE `signal_commentaire`
  ADD CONSTRAINT `signal_commentaire_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `commentaires` (`id_comment`),
  ADD CONSTRAINT `signal_commentaire_ibfk_2` FOREIGN KEY (`id_from_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `signal_commentaire_ibfk_3` FOREIGN KEY (`id_user_com`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `signal_commentaire_ibfk_4` FOREIGN KEY (`id_publication`) REFERENCES `publications` (`id_publication`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
