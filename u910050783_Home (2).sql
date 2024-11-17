-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Nov-2024 às 10:48
-- Versão do servidor: 10.11.9-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u910050783_Home`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `celular`
--

CREATE TABLE `celular` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `modelo` varchar(200) NOT NULL DEFAULT '',
  `contato` varchar(25) NOT NULL DEFAULT '',
  `numero1` varchar(500) NOT NULL DEFAULT '',
  `marca` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `celular`
--

INSERT INTO `celular` (`id`, `nome`, `email`, `modelo`, `contato`, `numero1`, `marca`) VALUES
(0, 'Gleison Costa', 'gleison.cost01@gmail.com', 'GALAXY A10 S', '13996989366', 'Problema Na Entrada Usb', ''),
(0, 'Gleison Costa', 'gleison.cost01@gmail.com', 'GALAXY A10 S', '13996989366', 'Inicia , Mas Não inicia a tela', 'LG'),
(0, 'teste', 'gleison.cost01@gmail.com', 'Dell Latitude 3420', '13996989366', 'Problema Na Memoria Ram', 'HP'),
(0, 'teste', 'gleison.cost01@gmail.com', 'GALAXY A6S', '13996989366', 'Aparelho com tela quebrada', 'IPHONE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `computador`
--

CREATE TABLE `computador` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `numero1` varchar(2000) DEFAULT NULL,
  `ultimoAcesso` datetime DEFAULT NULL,
  `contato` varchar(200) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `computador`
--

INSERT INTO `computador` (`idusuario`, `nome`, `email`, `numero1`, `ultimoAcesso`, `contato`, `total`) VALUES
(0, 'Gleison', 'gleison.cost01@gmail.com', 'Problema No HD', NULL, '13996989366', ''),
(0, 'Gleison', 'cont@hotmail.com', 'Travamento De Bios (Com Senha)', NULL, '13996989366', ''),
(0, 'teste', 'gleison.cost01@gmail.com', 'Problema No HD', NULL, '13996989366', ''),
(0, 'teste', 'gleison.cost01@gmail.com', 'Problema Com o Cooler', NULL, '13996989366', ''),
(0, 'teste', 'gleison.cost01@gmail.com', 'Problema Na Memoria Ram', NULL, '13996989366', ''),
(0, 'teste', 'gleison.cost01@gmail.com', 'Inicia , Mas Não inicia a tela', NULL, '13996989366', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notebook`
--

CREATE TABLE `notebook` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `modelo` varchar(200) NOT NULL DEFAULT '',
  `contato` varchar(25) NOT NULL DEFAULT '',
  `numero1` varchar(500) NOT NULL DEFAULT '',
  `marca` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `notebook`
--

INSERT INTO `notebook` (`id`, `nome`, `email`, `modelo`, `contato`, `numero1`, `marca`) VALUES
(0, 'teste', 'gleison.cost01@gmail.com', 'Lenovo IdeaPad 3 82MFS00100', '13996989366', 'Problema Na Carcassa', 'Lenovo'),
(0, 'teste', 'gleison.cost01@gmail.com', 'Dell Latitude 3420', '13996989366', 'Problema Na Carcassa', 'LG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` enum('ac','al','am','ap','ba','ce','df','es','go','ma','mg','ms','mt','pa','pb','pe','pi','pr','rj','rn','ro','rr','rs','sc','se','sp','to') DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `ultimoAcesso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`idusuario`, `nome`, `sobrenome`, `cidade`, `estado`, `cep`, `telefone`, `email`, `senha`, `ultimoAcesso`) VALUES
(0, 'professor', NULL, NULL, NULL, NULL, NULL, 'acesso@email.com.br', '190498900812', NULL),
(0, 'teste', NULL, NULL, NULL, NULL, NULL, 'contato@teste.com', '190498900812', NULL),
(0, 'professor', 'numero 7', 'juquia- sp', 'sp', 11800000, '13996351828', 'teste@contato.com.br', '190498900812', NULL),
(0, 'professor 27', 'teste', 'juquia- sp', 'sp', 11800000, '13996351828', 'professor@acesso.com.br', '111296', NULL),
(0, 'Gleison', 'Gleison', 'juquia- sp', 'sp', 11800000, '13996351828', 'cont@hotmail.com', 'uOvGXNRVmz!LvE9', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tablet`
--

CREATE TABLE `tablet` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `contato` varchar(25) NOT NULL DEFAULT '',
  `numero1` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tablet`
--

INSERT INTO `tablet` (`id`, `nome`, `email`, `contato`, `numero1`) VALUES
(0, 'Gleison Costa', 'gleison.cost01@gmail.com', '13996989366', 'Problema Na Carcassa'),
(0, 'Ricardo', 'criador64@gmail.com', '13**1003156', 'Problema No HD'),
(0, 'teste', 'gleison.cost01@gmail.com', '13996989366', 'Problema No Windows/ Mac / linux');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` enum('ac','al','am','ap','ba','ce','df','es','go','ma','mg','ms','mt','pa','pb','pe','pi','pr','rj','rn','ro','rr','rs','sc','se','sp','to') DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `ultimoAcesso` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `num_result` varchar(2000) NOT NULL,
  `permissao` varchar(7) NOT NULL,
  `mes` varchar(200) NOT NULL,
  `curso` varchar(2000) NOT NULL,
  `word` varchar(200) NOT NULL,
  `excel` varchar(200) NOT NULL,
  `access` varchar(200) NOT NULL,
  `PowerPoint` varchar(200) NOT NULL,
  `outlook` varchar(200) NOT NULL,
  `LinguaPortuguesa` varchar(200) NOT NULL,
  `RaciocinioLogico` varchar(200) NOT NULL,
  `etica` varchar(200) NOT NULL,
  `DireitoConstitucional` varchar(200) NOT NULL,
  `DireitoAdministrativo` varchar(200) NOT NULL,
  `nivel` varchar(2000) NOT NULL,
  `nome_professor` varchar(200) NOT NULL,
  `email_professor` varchar(200) NOT NULL,
  `numero1` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `sobrenome`, `cidade`, `estado`, `cep`, `telefone`, `email`, `senha`, `ultimoAcesso`, `created`, `modified`, `num_result`, `permissao`, `mes`, `curso`, `word`, `excel`, `access`, `PowerPoint`, `outlook`, `LinguaPortuguesa`, `RaciocinioLogico`, `etica`, `DireitoConstitucional`, `DireitoAdministrativo`, `nivel`, `nome_professor`, `email_professor`, `numero1`) VALUES
(1, 'Gleison', 'Costa', 'juquia- sp', 'sp', 11800000, '13996351828', 'gleison.cost01@gmail.com', '6234c73b972a25a6e3f60f11143e3d752bcaabec', NULL, '2024-04-04 22:12:51', NULL, '', '1', 'Dezembro', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Jhonatan', 'Albuquerque', 'Juquiá', 'sp', 1180000, '13996984600', 'albuquerque.jhonatan4223210@gmail.com', '4354daa5900d2c4f71b93cfd56199a295d040955', NULL, '2024-04-14 13:27:00', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Ricardo', 'Martins', 'itanhaem', 'sp', 11740000, '13991003156', 'criador64@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, '2024-10-02 01:16:16', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
