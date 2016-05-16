-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Client :  arnaudchwycnam.mysql.db
-- Généré le :  Ven 15 Janvier 2016 à 09:54
-- Version du serveur :  5.5.46-0+deb7u1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `arnaudchwycnam`
--
CREATE DATABASE IF NOT EXISTS `arnaudchwycnam` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `arnaudchwycnam`;

-- --------------------------------------------------------

--
-- Structure de la table `cadeau`
--

CREATE TABLE IF NOT EXISTS `cadeau` (
  `cadeauid` int(11) NOT NULL COMMENT 'Primary Key From cadeau',
  `libellecadeau` text NOT NULL,
  `descriptifcadeau` text,
  `listeid` int(11) NOT NULL COMMENT 'Foreign Key from liste'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inviter`
--

CREATE TABLE IF NOT EXISTS `inviter` (
  `uid_invitant` int(11) NOT NULL COMMENT 'Foreign Key From utilisateur',
  `uid_invite` int(11) NOT NULL COMMENT 'Foreign Key From utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE IF NOT EXISTS `liste` (
  `listeid` int(11) NOT NULL COMMENT 'Primary Key From liste',
  `libelleliste` text NOT NULL,
  `descriptifliste` text,
  `uid` int(11) NOT NULL COMMENT 'Foreign Key From utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE IF NOT EXISTS `reserver` (
  `cadeauid` int(11) NOT NULL COMMENT 'Foreign Key From cadeau',
  `uid` int(11) NOT NULL COMMENT 'Foreign Key From utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `uid` int(11) NOT NULL COMMENT 'Primary Key From utilisateur',
  `genre` tinyint(4) NOT NULL,
  `username` text NOT NULL,
  `userfirstname` text NOT NULL,
  `login` varchar(24) NOT NULL,
  `usermail` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cadeau`
--
ALTER TABLE `cadeau`
  ADD PRIMARY KEY (`cadeauid`),
  ADD KEY `listeid` (`listeid`);

--
-- Index pour la table `inviter`
--
ALTER TABLE `inviter`
  ADD KEY `uid_invitant` (`uid_invitant`),
  ADD KEY `uid_invite` (`uid_invite`);

--
-- Index pour la table `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`listeid`),
  ADD KEY `uid` (`uid`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD KEY `cadeauid` (`cadeauid`),
  ADD KEY `uid` (`uid`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cadeau`
--
ALTER TABLE `cadeau`
  MODIFY `cadeauid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key From cadeau';
--
-- AUTO_INCREMENT pour la table `liste`
--
ALTER TABLE `liste`
  MODIFY `listeid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key From liste';
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key From utilisateur';
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cadeau`
--
ALTER TABLE `cadeau`
  ADD CONSTRAINT `cadeau_ibfk_1` FOREIGN KEY (`listeid`) REFERENCES `liste` (`listeid`);

--
-- Contraintes pour la table `inviter`
--
ALTER TABLE `inviter`
  ADD CONSTRAINT `inviter_ibfk_2` FOREIGN KEY (`uid_invite`) REFERENCES `utilisateur` (`uid`),
  ADD CONSTRAINT `inviter_ibfk_1` FOREIGN KEY (`uid_invitant`) REFERENCES `utilisateur` (`uid`);

--
-- Contraintes pour la table `liste`
--
ALTER TABLE `liste`
  ADD CONSTRAINT `liste_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `utilisateur` (`uid`);

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `utilisateur` (`uid`),
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`cadeauid`) REFERENCES `cadeau` (`cadeauid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
