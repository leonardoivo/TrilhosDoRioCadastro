-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 15/12/2020 às 00h35min
-- Versão do Servidor: 8.0.22
-- Versão do PHP: 7.3.24-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `ConsultorioMedico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `id_consulta` int NOT NULL AUTO_INCREMENT,
  `dataConsulta` date DEFAULT NULL,
  `dadosConsulta` text,
  `id_paciente` int DEFAULT NULL,
  `id_medicamento` int DEFAULT NULL,
  PRIMARY KEY (`id_consulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doenca`
--

CREATE TABLE IF NOT EXISTS `doenca` (
  `id_doenca` int NOT NULL AUTO_INCREMENT,
  `nomeDoenca` varchar(60) DEFAULT NULL,
  `cid` varchar(10) DEFAULT NULL,
  `sintoma` text,
  `causa` text,
  `agentePatogenico` varchar(60) DEFAULT NULL,
  `tratamento` text,
  PRIMARY KEY (`id_doenca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

CREATE TABLE IF NOT EXISTS `medicamento` (
  `id_medicamento` int NOT NULL AUTO_INCREMENT,
  `nomeRemedio` varchar(60) DEFAULT NULL,
  `formula` varchar(80) DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `posologia` text,
  `id_cid` int DEFAULT NULL,
  PRIMARY KEY (`id_medicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Paciente`
--

CREATE TABLE IF NOT EXISTS `Paciente` (
  `id_paciente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(200) DEFAULT NULL,
  `data_De_nascimento` date DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefone` varchar(40) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `Bairro` varchar(200) DEFAULT NULL,
  `Cidade` varchar(200) DEFAULT NULL,
  `Estado` varchar(2) DEFAULT NULL,
  `data_De_cadastro` date DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `data_De_desligamento` date DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `complemento` int DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `naturalidade` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorioPaciente`
--

CREATE TABLE IF NOT EXISTS `relatorioPaciente` (
  `id_relatorio` int NOT NULL AUTO_INCREMENT,
  `nomeRelatorio` varchar(60) DEFAULT NULL,
  `tipoRelatorio` int DEFAULT NULL,
  `texto` text,
  `id_paciente` int DEFAULT NULL,
  PRIMARY KEY (`id_relatorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamento`
--

CREATE TABLE IF NOT EXISTS `tratamento` (
  `id_tratamento` int NOT NULL AUTO_INCREMENT,
  `nome_tratamento` varchar(60) DEFAULT NULL,
  `tipoTratamento` int DEFAULT NULL,
  `descricao` text,
  `id_paciente` int DEFAULT NULL,
  PRIMARY KEY (`id_tratamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `cpf` int DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
