-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/05/2024 às 22:10
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quaseprotonpissa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `ID_pedido` int(11) NOT NULL,
  `total` double NOT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `nome_cliente` varchar(255) DEFAULT NULL,
  `taxa_de_entrega` double DEFAULT NULL,
  `tamanho_pizza` varchar(255) DEFAULT NULL,
  `sabor_pizza` varchar(255) DEFAULT NULL,
  `borda_pizza` varchar(255) DEFAULT NULL,
  `tamanho_batatinha` varchar(255) DEFAULT NULL,
  `sabor_batatinha` varchar(255) DEFAULT NULL,
  `tamanho_cerveja` varchar(255) DEFAULT NULL,
  `sabor_cerveja` varchar(255) DEFAULT NULL,
  `tamanho_refrigerante` varchar(255) DEFAULT NULL,
  `sabor_refrigerante` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`ID_pedido`, `total`, `rua`, `bairro`, `cidade`, `nome_cliente`, `taxa_de_entrega`, `tamanho_pizza`, `sabor_pizza`, `borda_pizza`, `tamanho_batatinha`, `sabor_batatinha`, `tamanho_cerveja`, `sabor_cerveja`, `tamanho_refrigerante`, `sabor_refrigerante`) VALUES
(1, 95, NULL, NULL, NULL, 'Arthur', 9, 'Magra', 'Java', 'CSS', 'Gorda', 'K9', 'Latão', 'Suco', 'Padrão', 'Dolly'),
(2, 95, 'Rua boa', 'Periferia', 'Xique-Xique', 'Arthur', 9, 'Magra', 'Java', 'CSS', 'Gorda', 'K9', 'Latão', 'Suco', 'Padrão', 'Dolly'),
(3, 107, 'Rua buceta', 'Periferia', 'Rolândia', 'Felipe Eduardo Monari', 9, 'Magra', 'HTML', 'Get e Set', 'Gorda', 'K9', 'Lata', 'Suco', 'Gigante', 'Dolly');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_pedido`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
