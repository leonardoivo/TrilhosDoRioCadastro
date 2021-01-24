-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 24/01/2021 às 15h01min
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
-- Estrutura da tabela `agenciabancaria`
--

CREATE TABLE IF NOT EXISTS `agenciabancaria` (
  `idAgencia` int NOT NULL AUTO_INCREMENT,
  `nomeagencia` varchar(30) DEFAULT NULL,
  `numeroagencia` int DEFAULT NULL,
  `idbanco` int DEFAULT NULL,
  PRIMARY KEY (`idAgencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `agenciabancaria`
--

INSERT INTO `agenciabancaria` (`idAgencia`, `nomeagencia`, `numeroagencia`, `idbanco`) VALUES
(1, '3323', 3323, 7),
(2, '323', 323, 1),
(3, '3233', 3233, 1),
(4, '44344', 44344, 1),
(5, '44344', 44344, 1),
(6, '33233', 33233, 1),
(7, '33323', 33323, 1),
(8, '32333', 32333, 2),
(9, '33', 33, 78),
(10, '1', 1, 5),
(11, '4454', 4454, 7),
(12, '100130', 100130, 65),
(13, '212245', 212245, 1),
(14, '3122', 3122, 50),
(15, '8418', 8418, 66),
(16, '2802', 2802, 50),
(17, '10002', 10002, 1),
(18, '33233332', 33233332, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `idbanco` int NOT NULL AUTO_INCREMENT,
  `nomebanco` varchar(40) DEFAULT NULL,
  `codigobancario` int DEFAULT NULL,
  PRIMARY KEY (`idbanco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Extraindo dados da tabela `banco`
--

INSERT INTO `banco` (`idbanco`, `nomebanco`, `codigobancario`) VALUES
(1, 'Banco do Brasil', 1),
(2, 'Banco da Amazônia', 3),
(3, 'Banco do Nordeste', 4),
(4, 'Banestes', 21),
(5, 'Banco Alfa', 25),
(6, 'Besc', 27),
(7, 'Banerj', 29),
(8, 'Banco Beg', 31),
(9, 'Banco Santander Banespa', 33),
(10, 'Banco Bem', 36),
(11, 'Banpará', 37),
(12, 'Banestado', 38),
(13, 'BEP', 39),
(14, 'Banco Cargill', 40),
(15, 'Banrisul', 41),
(16, 'BVA', 44),
(17, 'Banco Opportunity', 45),
(18, 'Banese', 47),
(19, 'Hipercard', 62),
(20, 'Ibibank', 63),
(21, 'Lemon Bank', 65),
(22, 'Banco Morgan Stanley Dean Witter', 66),
(23, 'BPN Brasil', 69),
(24, 'Banco de Brasília – BRB', 70),
(25, 'Banco Rural', 72),
(26, 'Banco Popular', 73),
(27, 'Banco J. Safra', 74),
(28, 'Banco CR2', 75),
(29, 'Banco KDB', 76),
(30, 'Banco BMF', 96),
(31, 'Caixa Econômica Federal', 104),
(32, 'Banco BBM', 107),
(33, 'Banco Único', 116),
(34, 'Nossa Caixa', 151),
(35, 'Banco Finasa', 175),
(36, 'Banco Itaú BBA', 184),
(37, 'American Express Bank', 204),
(38, 'Banco Pactual', 208),
(39, 'Banco Matone', 212),
(40, 'Banco Arbi', 213),
(41, 'Banco Dibens', 214),
(42, 'Banco Joh Deere', 217),
(43, 'Banco Bonsucesso', 218),
(44, 'Banco Calyon Brasil', 222),
(45, 'Banco Fibra', 224),
(46, 'Banco Brascan', 225),
(47, 'Banco Cruzeiro', 229),
(48, 'Unicard', 230),
(49, 'Banco GE Capital', 233),
(50, 'Bradesco', 237),
(51, 'Banco Clássico', 241),
(52, 'Banco Stock Máxima', 243),
(53, 'Banco ABC Brasil', 246),
(54, 'Banco Boavista Interatlântico', 248),
(55, 'Investcred Unibanco', 249),
(56, 'Banco Schahin', 250),
(57, 'Fininvest', 252),
(58, 'Paraná Banco', 254),
(59, 'Banco Cacique', 263),
(60, 'Banco Fator', 265),
(61, 'Banco Cédula', 266),
(62, 'Banco de la Nación Argentina', 300),
(63, 'Banco BMG', 318),
(64, 'Banco Industrial e Comercial', 320),
(65, 'ABN Amro Real', 356),
(66, 'Itau', 341),
(67, 'Sudameris', 347),
(68, 'Banco Santander', 351),
(69, 'Banco Santander Brasil', 353),
(70, 'Banco Societe Generale Brasil', 366),
(71, 'Banco WestLB', 370),
(72, 'JP Morgan', 376),
(73, 'Banco Mercantil do Brasil', 389),
(74, 'Banco Mercantil de Crédito', 394),
(75, 'HSBC', 399),
(76, 'Unibanco', 409),
(77, 'Banco Capital', 412),
(78, 'Banco Safra', 422),
(79, 'Banco Rural', 453),
(80, 'Banco Tokyo Mitsubishi UFJ', 456),
(81, 'Banco Sumitomo Mitsui Brasileiro', 464),
(82, 'Citibank', 477),
(83, 'Itaubank (antigo Bank Boston)', 479),
(84, 'Deutsche Bank', 487),
(85, 'Banco Morgan Guaranty', 488),
(86, 'Banco NMB Postbank', 492),
(87, 'Banco la República Oriental del Uruguay', 494),
(88, 'Banco La Provincia de Buenos Aires', 495),
(89, 'Banco Credit Suisse', 505),
(90, 'Banco Luso Brasileiro', 600),
(91, 'Banco Industrial', 604),
(92, 'Banco VR', 610),
(93, 'Banco Paulista', 611),
(94, 'Banco Guanabara', 612),
(95, 'Banco Pecunia', 613),
(96, 'Banco Panamericano', 623),
(97, 'Banco Ficsa', 626),
(98, 'Banco Intercap', 630),
(99, 'Banco Rendimento', 633),
(100, 'Banco Triângulo', 634),
(101, 'Banco Sofisa', 637),
(102, 'Banco Prosper', 638),
(103, 'Banco Pine', 643),
(104, 'Itaú Holding Financeira', 652),
(105, 'Banco Indusval', 653),
(106, 'Banco A.J. Renner', 654),
(107, 'Banco Votorantim', 655),
(108, 'Banco Daycoval', 707),
(109, 'Banif', 719),
(110, 'Banco Credibel', 721),
(111, 'Banco Gerdau', 734),
(112, 'Banco Pottencial', 735),
(113, 'Banco Morada', 738),
(114, 'Banco Galvão de Negócios', 739),
(115, 'Banco Barclays', 740),
(116, 'BRP', 741),
(117, 'Banco Semear', 743),
(118, 'Banco Citibank', 745),
(119, 'Banco Modal', 746),
(120, 'Banco Rabobank International', 747),
(121, 'Banco Cooperativo Sicredi', 748),
(122, 'Banco Simples', 749),
(123, 'Dresdner Bank', 751),
(124, 'BNP Paribas', 752),
(125, 'Banco Comercial Uruguai', 753),
(126, 'Banco Merrill Lynch', 755),
(127, 'Banco Cooperativo do Brasil', 756),
(128, 'KEB', 757);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastroAssociado`
--

CREATE TABLE IF NOT EXISTS `cadastroAssociado` (
  `id_associado` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(200) DEFAULT NULL,
  `data_De_nascimento` date DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefone` varchar(40) DEFAULT NULL,
  `id_origem` int DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `Bairro` varchar(200) DEFAULT NULL,
  `Cidade` varchar(200) DEFAULT NULL,
  `Estado` varchar(2) DEFAULT NULL,
  `data_De_cadastro` date DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `data_De_desligamento` date DEFAULT NULL,
  `forma_de_doacao` varchar(60) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `complemento` int DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `interesses` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `naturalidade` varchar(60) DEFAULT NULL,
  `idTipoPagamento` int DEFAULT NULL,
  `nomeMae` varchar(60) DEFAULT NULL,
  `nomePai` varchar(60) DEFAULT NULL,
  `sexo` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_associado`),
  KEY `fk_OrigemAssociado` (`id_origem`),
  KEY `idTipoPagamento` (`idTipoPagamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Extraindo dados da tabela `cadastroAssociado`
--

INSERT INTO `cadastroAssociado` (`id_associado`, `nome`, `sobrenome`, `data_De_nascimento`, `email`, `telefone`, `id_origem`, `endereco`, `cep`, `Bairro`, `Cidade`, `Estado`, `data_De_cadastro`, `pais`, `data_De_desligamento`, `forma_de_doacao`, `numero`, `complemento`, `cpf`, `interesses`, `naturalidade`, `idTipoPagamento`, `nomeMae`, `nomePai`, `sexo`) VALUES
(3, 'carlos', 'dsd', '2019-03-20', '233', NULL, NULL, 'dd', '3232', 'wqqw', '323', '33', NULL, 'bras', NULL, NULL, 23, 123, '3443434', ',Historia,ExpedicÃµes', 'ww', 1, NULL, NULL, NULL),
(4, 'carlos', 'dsd', '2019-03-20', '233', NULL, NULL, 'dd', '3232', 'wqqw', '323', '33', NULL, 'bras', NULL, NULL, 23, 123, '4555', ',Historia,ExpedicÃµes', 'ww', 1, NULL, NULL, NULL),
(6, 'fabio', 'Ricardo', '2019-03-19', 'teste@teste', '333', 1, 'Avenida Nossa Senhora de Copacabana', '22031000', 'Copacabana', 'Rio de Janeiro', 'RJ', '2020-12-26', 'Brasil', '2020-12-26', '0', 33, 333, '434444', 'TESTE', 'RJ', 1, NULL, NULL, NULL),
(7, 'fabio', '', '2019-03-19', '', NULL, NULL, 'Avenida Nossa Senhora de Copacabana', '22031000', 'Copacabana', 'Rio de Janeiro', 'RJ', NULL, '', NULL, NULL, 33, 333, '555555666', ',ExpedicÃµes', '', 1, NULL, NULL, NULL),
(14, 'novo', 'teste', '2020-12-07', 'teste@teste', '5455454545455', 1, 'Rua Aritiba', '21765070', 'Realengo', 'Rio de Janeiro', 'RJ', '2020-12-06', 'Brasil', '2020-12-06', '0', 964, 1, '345345345', 'TESTE', 'RJ', 1, NULL, NULL, NULL),
(15, 'Mais um', 'teste', '2020-12-07', 'teste@teste', '545545334545455', 1, 'Rua Figueiredo Magalhães', '22031011', 'Copacabana', 'Rio de Janeiro', 'RJ', '2020-12-06', 'Brasil', '2020-12-06', '0', 964, 1, '24534534533', 'TESTE', 'RJ', 1, NULL, NULL, NULL),
(23, 'ELTON ', 'SUBTIL BORGES', '1993-10-30', 'teste@teste', '21222222', 1, 'RUA VALDEMAR MARCANTONIO', '95200-000', 'Vitoria', 'Vacaria', 'RS', '2020-12-12', 'Brasil', '2020-12-12', '0', 316, 0, '03249765007', 'TESTE', 'RS', 1, NULL, NULL, NULL),
(24, 'MARILIA ', 'PLUCINSKI CARDOSO DANTAS', '1977-09-04', 'teste@teste', '21222222', 1, 'Avenida da Azenha', '90160003', 'Azenha', 'Porto Alegre', 'RS', '2020-12-12', 'Brasil', '2020-12-12', '0', 316, 101, '03249765007', 'TESTE', 'RS', 3, NULL, NULL, 'F'),
(25, 'NATALIA CAROLINA', ' BEAL MIROVSKI', '1995-04-25', 'nat@teste.com', '5132332332', NULL, 'Rua Marcelo Gama', '90540040', 'São João', 'Porto Alegre', 'RS', '2021-01-15', 'Brasil', '2021-01-15', '0', 924, 0, '01886950016', 'Ferromodelismo,Historia,Propostas e sugestões de projetos ferroviários e de mobilidade', '512232323333', 1, 'tste1', 'teste2', 'F'),
(31, 'MAXIMIANO', 'SALDANHA', '1930-07-02', 'maximiliano@teste', NULL, 1, 'Avenida Doutor Eurípedes Brasil Milano', '97542280', 'Centro', 'Alegrete', 'RS', '2020-12-19', 'Brasil', '2020-12-19', '0', 1308, 0, '10375627049', 'TESTE', 'RS', 1, NULL, NULL, NULL),
(33, 'JOSILIANE ', 'MEIRELES SONNEMANN', '1994-02-01', 'josilane@teste', '513323323', 1, 'R. Antônio José Centeno', '96180000', 'CENTRO', 'CentenoCamaquã', 'RS', '2020-12-19', 'Brasil', '2020-12-19', '0', 373, 0, '02943142026', 'TESTE', 'RS', 1, NULL, NULL, NULL),
(42, 'Leonardo Ivo', 'Neves da Silva', '1981-08-14', 'leonardo.ivo22@gmail.com', '', 1, 'Rua Ministro Alfredo Valadão', '22031050', 'Copacabana', 'Rio de Janeiro', 'RJ', '2020-12-24', 'Brasil', '2020-12-24', '0', 35, 812, '05248801745', 'TESTE', 'RJ', 2, NULL, NULL, 'M'),
(55, 'LUIZ CARLOS ', 'FLAUSINA FILHO', '1960-11-13', 'leonardo.ivo22@gmail.com', '', 1, 'AV PADRE CLARET', '93280000', 'Centro', 'Esteio', 'RS', '2020-12-24', 'Brasil', '2020-12-24', '0', 6414, 0, '41546768068', 'TESTE', 'RS', 1, NULL, NULL, NULL),
(60, 'SANTA', 'SANTOS DA MAIA', '1957-11-04', 'santa@santa', '513232333', 1, 'VL VAZ', '99370000', 'INTERIOR', 'Fontoura Xavier', 'RS', '2021-01-02', 'Brasil', '2021-01-02', '0', 0, 0, '91563011034', 'TESTE', 'RS', 1, NULL, NULL, NULL),
(61, 'Ana Rosa ', 'Veira Oliveira', '1968-08-27', 'leonardo.ivo22@gmail.com', '21988609895', 1, 'Rua Ministro Alfredo Valadão', '22031050', 'Copacabana', 'Rio de Janeiro', 'RJ', '2021-01-03', 'Brasil', '2021-01-03', '0', 35, 812, '00405750714', 'TESTE', 'RJ', 1, 'Marcia Lustosa', 'Sergio Oliveira', NULL),
(62, 'Jose', 'Das Couves', '2018-12-31', 'leonardo.ivo22@gmail.com', '214343434434', 1, 'Rua Aritiba', '21765070', 'Realengo', 'Rio de Janeiro', 'RJ', '2021-01-03', 'Brasil', '2021-01-03', '0', 977, 0, '78132745981', 'TESTE', 'RJ', 1, 'Maria', 'Joao', NULL),
(63, 'Machado', 'De Assis ', '2020-08-04', 'leonardo.ivo22@gmail.com', '213233233', 1, 'Rua das Laranjeiras', '23823040', 'Jardim Mar', 'Itaguaí', 'RJ', '2021-01-03', 'RJ', '2021-01-03', '0', 345, 304, '42549217640', 'TESTE', 'RJ', 1, 'Ana Assis', 'Jorge Assis', NULL),
(65, 'ana', 'rosa', '2021-01-04', 'leonardo.ivo22@gmail.com', '2143432434', 1, 'Rua Ministro Alfredo Valadão', '22031050', 'Copacabana', 'Rio de Janeiro', 'RJ', '2021-01-03', 'Brasil', '2021-01-03', '0', 35, 812, '00405750714', 'on,on,on', 'rj', 1, 'marcia', 'sergio', NULL),
(66, 'JOVENTINO', 'PEREIRA LIMA', '1941-05-03', 'leonardo.ivo22@gmail.com', '1933233999', 1, 'Rua Irineu Scamparini', '13606351', 'Jardim José Ometto II', 'Araras', 'SP', '2021-01-03', 'Brasil', '2021-01-03', '0', 154, 0, '27245713634', 'Pesquisa,Historia,Expedicoes', 'SP', 1, 'MARIA RODRIGUES DE MORAIS', 'Não informado', NULL),
(67, 'LUISA AMANDA ', 'LIMA DO NASCIMENTO LUNA', '1994-01-18', 'leonardo.ivo22@gmail.com', '119234434344', 1, 'Rua Nelson Freire da Rosa', '02855120', 'Jardim Carombé', 'São Paulo', 'SP', '2021-01-10', 'BRASIL', '2021-01-10', '0', 8, 105, '43581324806', 'Caminhadas e Expedições de pesquisa e reconhecimento ferroviário,Troca de informações e dados ferroviários,Leitura de livros e publicações históricas e/ou ferroviárias,Ferromodelismo,Historia,Produção de material audiovisual com temática histórico-ferroviária,Propostas e sugestões de projetos ferroviários e de mobilidade,Propostas e sugestões de preservação e restauração histórico-ferroviária,Outro', 'SP', 1, 'MARILENE LIMA DO NASCIMENTO', 'JORGE SILVA LUNA', NULL),
(68, 'PETTERSON ', 'GRAVINO MONTEIRO', '1998-04-27', 'leonardo.ivo22@gmail.com', '31322232334', 1, 'Rua São Lourenço', '36061230', 'São Benedito', 'Juiz de Fora', 'MG', '2021-01-11', 'Brasil', '2021-01-11', '0', 36, 5, '13689520622', 'Leitura de livros e publicações históricas e/ou ferroviárias,Ferromodelismo,Historia,Produção de material audiovisual com temática histórico-ferroviária,Propostas e sugestões de preservação e restauração histórico-ferroviária,Outro', 'MG', 5, 'DEBORA GRAVINO DE OLIVEIRA', 'Ricardo Oliveira Monteiro', NULL),
(69, 'Ricardo', 'Caetano', '2021-01-15', 'leonardo.ivo22@gmail.com', '2123232332', 3, 'Rua Dona Olímpia', '21765020', 'Realengo', 'Rio de Janeiro', 'RJ', '2021-01-15', 'BRasil', '2021-01-15', '0', 35, 0, '55391932025', 'Caminhadas e Expedições de pesquisa e reconhecimento ferroviário,Leitura de livros e publicações históricas e/ou ferroviárias,Ferromodelismo,Produção de material audiovisual com temática histórico-ferroviária,Outro', 'RJ', 2, 'Paula Caetano', 'Jose Caetano', NULL),
(70, 'Fernanda Caetano', 'Caetano', '2021-01-15', 'leonardo.ivo22@gmail.com', '2123232332', 3, 'Rua Dona Olímpia', '21765020', 'Realengo', 'Rio de Janeiro', 'RJ', '2021-01-15', 'BRasil', '2021-01-15', '0', 35, 0, '14291882009', 'Caminhadas e Expedições de pesquisa e reconhecimento ferroviário,Leitura de livros e publicações históricas e/ou ferroviárias,Ferromodelismo,Produção de material audiovisual com temática histórico-ferroviária,Outro', 'RJ', 2, 'Paula Caetano', 'Jose Caetano', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `CartaoCredito`
--

CREATE TABLE IF NOT EXISTS `CartaoCredito` (
  `idCartao` int NOT NULL AUTO_INCREMENT,
  `bandeira` varchar(30) DEFAULT NULL,
  `numeroCartao` varchar(40) DEFAULT NULL,
  `Titular` varchar(60) DEFAULT NULL,
  `dataDeValidade` varchar(20) DEFAULT NULL,
  `codigo` int DEFAULT NULL,
  `id_associado` int NOT NULL,
  PRIMARY KEY (`idCartao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `CartaoCredito`
--

INSERT INTO `CartaoCredito` (`idCartao`, `bandeira`, `numeroCartao`, `Titular`, `dataDeValidade`, `codigo`, `id_associado`) VALUES
(7, 'elo', '323233', 'teste', '2222', 22, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE IF NOT EXISTS `conta` (
  `idconta` int NOT NULL AUTO_INCREMENT,
  `tipoconta` int DEFAULT NULL,
  `idagencia` int DEFAULT NULL,
  `numeroconta` int DEFAULT NULL,
  `digitoconta` int DEFAULT NULL,
  `id_associado` int DEFAULT NULL,
  PRIMARY KEY (`idconta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`idconta`, `tipoconta`, `idagencia`, `numeroconta`, `digitoconta`, `id_associado`) VALUES
(1, 1, 13, NULL, 1, 0),
(2, 1, 14, NULL, 4, 0),
(3, 1, 15, NULL, 5, 0),
(4, 2, 16, NULL, 9, 0),
(5, 1, 17, NULL, 1, 0),
(6, 2, 18, 11111, 34, 42);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Interesses`
--

CREATE TABLE IF NOT EXISTS `Interesses` (
  `id_interesse` int NOT NULL AUTO_INCREMENT,
  `interesse` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_interesse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `OrigemAssociado`
--

CREATE TABLE IF NOT EXISTS `OrigemAssociado` (
  `id_origem` int NOT NULL AUTO_INCREMENT,
  `Origem` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_origem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `OrigemAssociado`
--

INSERT INTO `OrigemAssociado` (`id_origem`, `Origem`) VALUES
(1, 'Internet'),
(2, 'Radio'),
(3, 'Redes Sociais'),
(5, 'TV'),
(7, 'Jornais e Revistas'),
(9, 'Indicação'),
(10, 'Instituição de ensino'),
(11, 'Orgão Público'),
(12, 'Iniciativa Privada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(30) DEFAULT NULL,
  `tipo_acesso` int DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome_perfil`, `tipo_acesso`) VALUES
(1, 'administrador', 1),
(2, 'Visualizador', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pix`
--

CREATE TABLE IF NOT EXISTS `Pix` (
  `idpix` int NOT NULL AUTO_INCREMENT,
  `ChaveRem` varchar(50) DEFAULT NULL,
  `ChaveDest` varchar(50) DEFAULT NULL,
  `id_associado` int DEFAULT NULL,
  `valorpago` double DEFAULT NULL,
  `idbanco` int DEFAULT NULL,
  `idTransacao` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idpix`),
  KEY `id_associado` (`id_associado`),
  KEY `idbanco` (`idbanco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TipoPagamento`
--

CREATE TABLE IF NOT EXISTS `TipoPagamento` (
  `idTipoPagamento` int NOT NULL AUTO_INCREMENT,
  `nomeTipoPag` varchar(30) DEFAULT NULL,
  `descricao` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idTipoPagamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `TipoPagamento`
--

INSERT INTO `TipoPagamento` (`idTipoPagamento`, `nomeTipoPag`, `descricao`) VALUES
(1, 'Não Doador', NULL),
(2, 'Débito', NULL),
(3, 'Cartão', NULL),
(4, 'Boleto', NULL),
(5, 'Pix', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(12) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `id_perfil` int DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `situacao` int DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarioPerfil` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cpf`, `nome`, `id_perfil`, `email`, `login`, `senha`, `celular`, `situacao`, `sobrenome`) VALUES
(1, '12345', 'root', 1, 'teste@teste', 'teste', '123456', '21232332332', 1, 'admin'),
(6, '45678', 'admin', 1, 'teste@teste', 'admin', 'teste123', '21233444444', 1, 'root'),
(7, '97342728020', 'NovoRoot', 2, 'leonardo.ivo22@gmail.com', 'admin', '123456', '21982374919', 1, 'raiz'),
(8, '97342728020', 'NovoRoot2', 1, 'leonardo.ivo22@gmail.com', 'novoadmin', 'tdr123', '21982374919', 1, 'admin'),
(9, '05248801745', 'leonardoivo', 1, 'leonardo.ivo22@gmail.com', 'leoivo', '784512', '21988344344', 0, 'silva'),
(12, '08261344754', 'EDUARDO ', 1, 'leonardo.ivo22@gmail.com', 'dadoaftr', '123456', '23424324', 0, 'PEREIRA MOREIRA');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `cadastroAssociado`
--
ALTER TABLE `cadastroAssociado`
  ADD CONSTRAINT `cadastroAssociado_ibfk_1` FOREIGN KEY (`idTipoPagamento`) REFERENCES `TipoPagamento` (`idTipoPagamento`),
  ADD CONSTRAINT `cadastroAssociado_ibfk_2` FOREIGN KEY (`idTipoPagamento`) REFERENCES `TipoPagamento` (`idTipoPagamento`),
  ADD CONSTRAINT `fk_OrigemAssociado` FOREIGN KEY (`id_origem`) REFERENCES `OrigemAssociado` (`id_origem`);

--
-- Restrições para a tabela `Pix`
--
ALTER TABLE `Pix`
  ADD CONSTRAINT `Pix_ibfk_1` FOREIGN KEY (`id_associado`) REFERENCES `cadastroAssociado` (`id_associado`),
  ADD CONSTRAINT `Pix_ibfk_2` FOREIGN KEY (`id_associado`) REFERENCES `cadastroAssociado` (`id_associado`),
  ADD CONSTRAINT `Pix_ibfk_3` FOREIGN KEY (`idbanco`) REFERENCES `banco` (`idbanco`),
  ADD CONSTRAINT `Pix_ibfk_4` FOREIGN KEY (`idbanco`) REFERENCES `banco` (`idbanco`),
  ADD CONSTRAINT `Pix_ibfk_5` FOREIGN KEY (`idbanco`) REFERENCES `banco` (`idbanco`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
