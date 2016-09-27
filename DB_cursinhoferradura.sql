-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 27/09/2016 às 16:58
-- Versão do servidor: 5.5.52-0+deb8u1
-- Versão do PHP: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `DB_cursinhoferradura`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Aprovacoes`
--

CREATE TABLE IF NOT EXISTS `Aprovacoes` (
`IdAprovacao` int(11) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Descricao` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Aprovacoes`
--

INSERT INTO `Aprovacoes` (`IdAprovacao`, `Nome`, `Descricao`) VALUES
(10, 'Joãozinho', 'Engenharia Civil - UNESP, Engenharia Mecânica - UFSCar'),
(11, 'Alana', 'Relações Públicas - UNESP');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Area`
--

CREATE TABLE IF NOT EXISTS `Area` (
  `IdArea` int(11) NOT NULL,
  `NomeArea` varchar(50) DEFAULT NULL,
  `NumeroQuestoes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Simulado`
--

CREATE TABLE IF NOT EXISTS `Simulado` (
  `IdSimulado` int(11) NOT NULL,
  `NomeSimulado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `SimuladoArea`
--

CREATE TABLE IF NOT EXISTS `SimuladoArea` (
  `IdArea` int(11) DEFAULT NULL,
  `IdSimulado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `CPF` varchar(30) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Senha` varchar(30) DEFAULT NULL,
  `Funcao` varchar(30) DEFAULT NULL,
  `Descricao` varchar(30) DEFAULT NULL,
  `nomeImg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Usuario`
--

INSERT INTO `Usuario` (`CPF`, `Nome`, `Senha`, `Funcao`, `Descricao`, `nomeImg`) VALUES
('toninho@toninho.com.br', 'Toninho', '1234', 'COLABORADOR', 'Professor de Matemática', '654a56322b0eafce610b60f420b82402.jpg'),
('vbraguimcanto@gmail.com', 'Victor ', '1234', '', 'Professor de Biologia', '9d39a9e87fc464b38776f19275a09a31.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `UsuarioAreaSimulado`
--

CREATE TABLE IF NOT EXISTS `UsuarioAreaSimulado` (
  `IdArea` int(11) DEFAULT NULL,
  `CPF` varchar(30) DEFAULT NULL,
  `QtdeAcertos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `UsuarioXSimulado`
--

CREATE TABLE IF NOT EXISTS `UsuarioXSimulado` (
  `IdSimulado` int(11) DEFAULT NULL,
  `CPF` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Aprovacoes`
--
ALTER TABLE `Aprovacoes`
 ADD PRIMARY KEY (`IdAprovacao`);

--
-- Índices de tabela `Area`
--
ALTER TABLE `Area`
 ADD PRIMARY KEY (`IdArea`);

--
-- Índices de tabela `Simulado`
--
ALTER TABLE `Simulado`
 ADD PRIMARY KEY (`IdSimulado`);

--
-- Índices de tabela `SimuladoArea`
--
ALTER TABLE `SimuladoArea`
 ADD KEY `IdArea` (`IdArea`), ADD KEY `IdSimulado` (`IdSimulado`);

--
-- Índices de tabela `Usuario`
--
ALTER TABLE `Usuario`
 ADD PRIMARY KEY (`CPF`);

--
-- Índices de tabela `UsuarioAreaSimulado`
--
ALTER TABLE `UsuarioAreaSimulado`
 ADD KEY `IdArea` (`IdArea`), ADD KEY `CPF` (`CPF`);

--
-- Índices de tabela `UsuarioXSimulado`
--
ALTER TABLE `UsuarioXSimulado`
 ADD KEY `IdSimulado` (`IdSimulado`), ADD KEY `CPF` (`CPF`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Aprovacoes`
--
ALTER TABLE `Aprovacoes`
MODIFY `IdAprovacao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `SimuladoArea`
--
ALTER TABLE `SimuladoArea`
ADD CONSTRAINT `SimuladoArea_ibfk_1` FOREIGN KEY (`IdArea`) REFERENCES `Area` (`IdArea`),
ADD CONSTRAINT `SimuladoArea_ibfk_2` FOREIGN KEY (`IdSimulado`) REFERENCES `Simulado` (`IdSimulado`);

--
-- Restrições para tabelas `UsuarioAreaSimulado`
--
ALTER TABLE `UsuarioAreaSimulado`
ADD CONSTRAINT `UsuarioAreaSimulado_ibfk_1` FOREIGN KEY (`IdArea`) REFERENCES `Area` (`IdArea`),
ADD CONSTRAINT `UsuarioAreaSimulado_ibfk_2` FOREIGN KEY (`CPF`) REFERENCES `Usuario` (`CPF`);

--
-- Restrições para tabelas `UsuarioXSimulado`
--
ALTER TABLE `UsuarioXSimulado`
ADD CONSTRAINT `UsuarioXSimulado_ibfk_1` FOREIGN KEY (`IdSimulado`) REFERENCES `Simulado` (`IdSimulado`),
ADD CONSTRAINT `UsuarioXSimulado_ibfk_2` FOREIGN KEY (`CPF`) REFERENCES `Usuario` (`CPF`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
