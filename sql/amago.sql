-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Dez-2022 às 13:53
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `amago`
--
CREATE DATABASE IF NOT EXISTS `amago` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `amago`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nota` int(11) NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL,
  `id_pc` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_avaliacoes` (`id_usuario`),
  KEY `fk_pc_avaliacoes` (`id_pc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `nota`, `id_usuario`, `id_pc`) VALUES
(1, 4, 2, 1),
(2, 4, 2, 2),
(3, 1, 1, 2),
(4, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentariospc`
--

CREATE TABLE IF NOT EXISTS `comentariospc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `curtidas` int(11) NOT NULL DEFAULT '0',
  `data` varchar(10) NOT NULL,
  `hora` varchar(5) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pc` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_comentariosPc` (`id_usuario`),
  KEY `fk_pc_comentariosPc` (`id_pc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `comentariospc`
--

INSERT INTO `comentariospc` (`id`, `comentario`, `curtidas`, `data`, `hora`, `id_usuario`, `id_pc`) VALUES
(4, 'Portionpet 1', 1, '12/12/2022', '22:38', 2, 2),
(5, 'Ã‚mago Official 1', 1, '12/12/2022', '22:39', 2, 1),
(6, 'PortionPet 2', 0, '12/12/2022', '22:39', 2, 2),
(7, 'Ã‚mago Official 2', 2, '12/12/2022', '22:40', 2, 1),
(8, 'Tentando comentar mais alguma coisa', 1, '12/12/2022', '22:41', 1, 2),
(9, 'TÃ´ tÃ£o feliz!!!', 0, '12/12/2022', '22:42', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtidaspc`
--

CREATE TABLE IF NOT EXISTS `curtidaspc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curtidas` int(11) NOT NULL DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `id_comentarioPc` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_curtidasPc` (`id_usuario`),
  KEY `fk_comentarioPc_curtidasPc` (`id_comentarioPc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `curtidaspc`
--

INSERT INTO `curtidaspc` (`id`, `curtidas`, `id_usuario`, `id_comentarioPc`) VALUES
(3, 0, 2, 7),
(4, 0, 2, 5),
(5, 0, 2, 4),
(6, 0, 1, 8),
(7, 0, 1, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pc`
--

CREATE TABLE IF NOT EXISTS `pc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `tipoLixo` varchar(9) NOT NULL,
  `atuacao` varchar(35) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(4) NOT NULL,
  `latitude` decimal(15,12) DEFAULT NULL,
  `longitude` decimal(15,12) DEFAULT NULL,
  `quantidadeAvaliacoes` int(11) NOT NULL DEFAULT '0',
  `id_perfil` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_perfil_pc` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `pc`
--

INSERT INTO `pc` (`id`, `nome`, `email`, `senha`, `foto`, `tipoLixo`, `atuacao`, `cidade`, `bairro`, `rua`, `numero`, `latitude`, `longitude`, `quantidadeAvaliacoes`, `id_perfil`) VALUES
(1, 'Ã‚mago Official', 'ecoamagoofficial@gmail.com', '12345678', NULL, '34', 'ecoponto', 'Cajamar', 'Polvilho', 'IpiguÃ¡', 128, '-23.412308800000', '-46.836444000000', 2, 2),
(2, 'PortionPet', 'portionpetofficial@gmail.com', '12345678', NULL, '14', 'saude', 'SÃ£o Paulo', 'CapÃ£o Redondo', 'Maria Blanchard', 234, '-23.667576000000', '-46.770966800000', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoPerfil` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `tipoPerfil`) VALUES
(1, 'usuario'),
(2, 'pontos de coleta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `id_perfil` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_perfil` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `foto`, `id_perfil`) VALUES
(1, 'Camilla dos Santos Lemos', 'milla@gmail.com', '12345678', 'eae6080c87580ec867caeb0fca2a77b0.jpg', 1),
(2, 'Gustavo Silva Souza', 'gu@gmail.com', '12345678', '6feb971338ed13d526ffd5a82a746b95.jpg', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_pc_avaliacoes` FOREIGN KEY (`id_pc`) REFERENCES `pc` (`id`),
  ADD CONSTRAINT `fk_usuario_avaliacoes` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `comentariospc`
--
ALTER TABLE `comentariospc`
  ADD CONSTRAINT `fk_pc_comentariosPc` FOREIGN KEY (`id_pc`) REFERENCES `pc` (`id`),
  ADD CONSTRAINT `fk_usuario_comentariosPc` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `curtidaspc`
--
ALTER TABLE `curtidaspc`
  ADD CONSTRAINT `fk_comentarioPc_curtidasPc` FOREIGN KEY (`id_comentarioPc`) REFERENCES `comentariospc` (`id`),
  ADD CONSTRAINT `fk_usuario_curtidasPc` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `fk_perfil_pc` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
