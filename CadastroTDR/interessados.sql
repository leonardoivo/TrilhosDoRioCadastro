-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 24/01/2021 às 20h41min
-- Versão do Servidor: 8.0.23
-- Versão do PHP: 7.3.26-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `TrilhosDoRioCadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `interessados`
--

CREATE TABLE IF NOT EXISTS `interessados` (
  `id_interessado` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `interesses` text,
  `telefone` int DEFAULT NULL,
  PRIMARY KEY (`id_interessado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `interessados`
--

INSERT INTO `interessados` (`id_interessado`, `nome`, `sobrenome`, `email`, `interesses`, `telefone`) VALUES
(1, 'leonardo ivo', 'silva', 'leonardo.ivo22@gmail.com', 'Ferromodelismo,Propostas e sugestões de preservação e restauração histórico-ferroviária', 3232323),
(2, 'tste', 'silva', 'leonardo.ivo22@gmail.com', 'Ferromodelismo,Propostas e sugestões de preservação e restauração histórico-ferroviária', 3232323),
(3, 'tste3', 'silva', 'leonardo.ivo22@gmail.com', 'Ferromodelismo,Propostas e sugestões de preservação e restauração histórico-ferroviária', 3232323),
(4, 'tste5', 'silva3', 'leonardo.ivo22@gmail.com', 'Ferromodelismo,Propostas e sugestões de preservação e restauração histórico-ferroviária', 3232323),
(5, 'tste6', 'silva4', 'leonardo.ivo22@gmail.com', 'Ferromodelismo,Propostas e sugestões de preservação e restauração histórico-ferroviária', 3232323),
(6, 'tste7', 'silva5', 'leonardo.ivo22@gmail.com', 'Ferromodelismo,Propostas e sugestões de preservação e restauração histórico-ferroviária', 3232323),
(7, 'Leonardo', 'Silva', 'leonardo.iv22@gmail.com', 'Ferromodelismo,Historia', 233323);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
