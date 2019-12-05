-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05-Dez-2019 às 14:55
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

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

CREATE TABLE `cadastro` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `sexo` enum('masculino','feminino','outro') NOT NULL,
  `voto` enum('sim','nao') NOT NULL,
  `foto_perfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_usuario`, `nome`, `sobrenome`, `data_nascimento`, `email`, `senha`, `usuario`, `sexo`, `voto`, `foto_perfil`) VALUES
(13, 'lka', 'po', '2019-12-20', 'k@l', '123', 'mkdsa', 'masculino', 'nao', 'mk-2019.12.05-14.04.02.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `nome_imagem` varchar(200) NOT NULL,
  `tipo` enum('paisagem','meme','pessoa','animal','comida','decoracao','outro') NOT NULL,
  `data` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`nome_imagem`, `tipo`, `data`, `id_usuario`) VALUES
('adventuretime.jpg', 'outro', '2020-01-10', 13),
('cachoeira.jpg', 'paisagem', '2019-12-16', 13),
('flores.jpg', 'paisagem', '2019-12-02', 13),
('halloween.jpg', 'decoracao', '2019-10-30', 13),
('halloween2.jpg', 'decoracao', '2019-11-02', 13),
('hamburger.jpg', 'comida', '2019-12-17', 13),
('joao-2019.12.02-19.11.40.jpg', 'animal', '2019-11-01', 13),
('joao-2019.12.02-19.36.46.jpg', 'animal', '2019-12-25', 13),
('joao-2019.12.04-23.38.47.jpg', 'meme', '2019-12-02', 13),
('mkdsa-2019.12.05-14.06.28.jpg', 'pessoa', '2019-12-05', 13),
('natal.jpg', 'decoracao', '2019-12-23', 13),
('natal2.jpg', 'decoracao', '2019-11-12', 13),
('noitche.jpg', 'paisagem', '2019-12-08', 13),
('paisagem.jpg', 'paisagem', '2019-12-03', 13),
('pastel.jpg', 'comida', '2019-12-24', 13),
('pizza.jpg', 'comida', '2019-12-30', 13),
('ramen.jpg', 'comida', '2019-12-17', 13),
('regularshow.jpg', 'outro', '2019-12-09', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `foto_perfil` (`foto_perfil`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`nome_imagem`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
