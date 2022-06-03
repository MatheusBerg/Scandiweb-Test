-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2022 às 17:24
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `itemslist`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `book`
--

CREATE TABLE `book` (
  `sku` varchar(100) NOT NULL,
  `weight` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
INSERT INTO `book` (`sku`, `weight`) VALUES
('testandobook', '100.00');
--
-- Estrutura da tabela `dvd`
--

CREATE TABLE `dvd` (
  `sku` varchar(100) NOT NULL,
  `size` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dvd`
--

INSERT INTO `dvd` (`sku`, `size`) VALUES
('testandodvd', '100.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `furniture`
--

CREATE TABLE `furniture` (
  `sku` varchar(100) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `furniture`
--

INSERT INTO `furniture` (`sku`, `height`, `width`, `length`) VALUES
('testandofurniture', 100, 100, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `sku` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `type` enum('Dvd','Furniture','Book') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`sku`, `name`, `price`, `type`) VALUES
('testandobook', 'testandobook', '100.00', 'Dvd'),
('testandodvd', 'testandodvd', '100.00', 'Dvd'),
('testandofurniture', 'testandofurniture', '100.00', 'Furniture');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`sku`);

--
-- Índices para tabela `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`sku`);

--
-- Índices para tabela `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`sku`);

--
-- Índices para tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sku`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`sku`) REFERENCES `product` (`sku`);

--
-- Limitadores para a tabela `dvd`
--
ALTER TABLE `dvd`
  ADD CONSTRAINT `dvd_ibfk_1` FOREIGN KEY (`sku`) REFERENCES `product` (`sku`);

--
-- Limitadores para a tabela `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `furniture_ibfk_1` FOREIGN KEY (`sku`) REFERENCES `product` (`sku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
