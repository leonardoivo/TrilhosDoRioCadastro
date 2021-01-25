-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 24/01/2021 às 20h42min
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
-- Estrutura da tabela `doador`
--

CREATE TABLE IF NOT EXISTS `doador` (
  `id_doador` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cpfcnpj` varchar(20) DEFAULT NULL,
  `tipopessoa` int DEFAULT NULL,
  `idTipoPagamento` int DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `RG` int DEFAULT NULL,
  `orgaoExp` varchar(10) DEFAULT NULL,
  `data_exp` date DEFAULT NULL,
  PRIMARY KEY (`id_doador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
