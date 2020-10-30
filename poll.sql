-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: sql211.byetcluster.com
-- Erstellungszeit: 15. Januar 2010 um 09:22
-- Server Version: 5.1.41
-- PHP-Version: 5.2.6-1+lenny3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `useri_4563550_umfrage`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `itemcount` int(11) NOT NULL,
  `pollname` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten f�r Tabelle `data`
--

INSERT INTO `data` (`id`, `question`, `itemcount`, `pollname`) VALUES
(1, 'Wie findest du die Seite?', 6, 'note');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollname` varchar(16) NOT NULL,
  `itemname` varchar(64) NOT NULL,
  `itemnr` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten f�r Tabelle `items`
--

INSERT INTO `items` (`id`, `pollname`, `itemname`, `itemnr`) VALUES
(1, 'note', 'sehr gut', 1),
(2, 'note', 'gut', 2),
(3, 'note', 'befriedigend', 3),
(4, 'note', 'ausreichend', 4),
(5, 'note', 'mangelhaft', 5),
(6, 'note', 'ungen�gend', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) NOT NULL,
  `time` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `selection` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Daten f�r Tabelle `user`
--

INSERT INTO `user` (`id`, `ip`, `time`, `name`, `selection`) VALUES
(14, '1.2.3.4', 1263547080, 'note', 2),
(13, '5.6.7.8', 1263200197, 'note', 5),
(12, '9.10.11.12', 1263130309, 'note', 3),
(11, '13.14.15.16', 1263124566, 'note', 1);
