-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Nov-2019 às 16:42
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `photogram`
--
CREATE DATABASE IF NOT EXISTS `photogram` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `photogram`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE IF NOT EXISTS `cadastro` (
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `sexo` enum('masculino','feminino','outro') NOT NULL,
  `voto` enum('sim','nao') NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`,`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_usuario`, `nome`, `sobrenome`, `data_nascimento`, `email`, `senha`, `usuario`, `sexo`, `voto`) VALUES
(1, 'João Pedro', 'Romão', '2002-08-24', 'ojpzinho@gmail.com', 'euamoasabrina', 'Iorkman', 'masculino', 'nao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE IF NOT EXISTS `imagem` (
  `nome` varchar(200) NOT NULL,
  `tipo` enum('paisagem','memes','pessoas','animais','comida','decoracao','outro') NOT NULL,
  `data` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`nome`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`nome`, `tipo`, `data`, `id_usuario`) VALUES
('capturar.png', '', '0000-00-00', 1),
('eisto.png', '', '0000-00-00', 1),
('euzinha.jpg', '', '0000-00-00', 1),
('loader.gif', '', '0000-00-00', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cadastro` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
