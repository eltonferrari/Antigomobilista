-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Nov-2018 às 19:57
-- Versão do servidor: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antigomobilistabd`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `idcomments` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authorized` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcomments`),
  KEY `comments_iduser_foreign` (`iduser`),
  KEY `comments_idpost_foreign` (`idpost`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `idevent` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `date` datetime DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci,
  `locale` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `authorized` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idevent`),
  KEY `events_iduser_foreign` (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `messages`
--
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `idmessage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idsender` int(11) NOT NULL,
  `idreceptor` int(11) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmessage`),
  KEY `messages_idsender_foreign` (`idsender`),
  KEY `messages_idreceptor_foreign` (`idreceptor`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `idpost` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `type` text COLLATE utf8_unicode_ci,
  `brand` text COLLATE utf8_unicode_ci,
  `age` int(4) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `sell` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpost`),
  KEY `posts_iduser_foreign` (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `idrating` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `level` int(5) NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `firstpoint` int(11) NOT NULL,
  `lastpoint` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `creator` int(10) NOT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `alterer` int(10) NOT NULL,
  PRIMARY KEY (`idrating`),
  UNIQUE KEY `level` (`level`),
  UNIQUE KEY `level_2` (`level`),
  KEY `creator` (`creator`),
  KEY `alterer` (`alterer`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL DEFAULT '5',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vazio.png',
  `type` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
