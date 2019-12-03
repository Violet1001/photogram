-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 30-Nov-2019 às 19:02
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photogram`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `sexo` enum('masculino','feminino','outro') NOT NULL,
  `voto` enum('sim','nao') NOT NULL,
  `foto_perfil` varchar(200) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`,`usuario`),
  UNIQUE KEY `foto_perfil` (`foto_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_usuario`, `nome`, `sobrenome`, `data_nascimento`, `email`, `senha`, `usuario`, `sexo`, `voto`, `foto_perfil`) VALUES
(1, 'João Pedro', 'Romão', '2002-08-24', 'joao@gmail.com', 'euamoasabrina', 'joao', 'masculino', 'nao', 'joao.jpg'),
(2, 'Sabrina', 'Marchezani', '2002-01-10', 'sabrina@gmail.com', 'euamoojoao', 'sabrina', 'feminino', 'nao', 'sabrina.jpg'),
(3, 'Lucas', 'Favini', '2002-04-26', 'lucas@gmail.com', 'euamoadora', 'lucas', 'outro', 'nao', 'lucas.jpg'),
(6, 'Flop', 'ado', '2019-11-01', 'katchaw@gmail.com', 'velocidade', 'flop', 'masculino', 'nao', 'flop-2019.11.30-18.09.14.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

DROP TABLE IF EXISTS `imagem`;
CREATE TABLE IF NOT EXISTS `imagem` (
  `nome_imagem` varchar(200) NOT NULL,
  `tipo` enum('paisagem','meme','pessoa','animal','comida','decoracao','outro') NOT NULL,
  `data` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`nome_imagem`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_usuario_2` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`nome_imagem`, `tipo`, `data`, `id_usuario`) VALUES
('capturar.png', 'meme', '2019-11-07', 1),
('DSCN0216_edited.jpg', 'paisagem', '2019-11-13', 2),
('DSCN0241_edited.jpg', 'pessoa', '2019-08-19', 1),
('DSCN0337_edited.jpg', 'pessoa', '2019-09-16', 1),
('DSCN0369_edited.jpg', 'pessoa', '2019-08-19', 1),
('DSCN0381_edited.jpg', 'meme', '2019-11-01', 1),
('eisto.png', 'outro', '2019-11-15', 1),
('euzinha.jpg', 'pessoa', '2019-10-14', 2),
('loader.gif', 'meme', '2019-09-24', 3);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cadastro` (`id_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
