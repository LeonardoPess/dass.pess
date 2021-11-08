-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Nov-2021 às 14:51
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dash.pess`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.general`
--

CREATE TABLE `tb_site.general` (
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slogan` text NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.general`
--

INSERT INTO `tb_site.general` (`title`, `description`, `slogan`, `author`) VALUES
('PessCode | Desenvolvimento Web Indaiatuba', 'Desenvolva seu site completo, reponsivo e exclusivo na PessCode e apareça para o mundo todo agora! Sites personalizado com os melhores preços e suporte.', '❝ Uma máquina consegue fazer o trabalho de 50 homens ordinários. Nenhuma máquina consegue fazer o trabalho de um homem extraordinário.❞', 'Elbert Hubbard');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.online`
--

CREATE TABLE `tb_site.online` (
  `id` int(11) NOT NULL,
  `last_time` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.online`
--

INSERT INTO `tb_site.online` (`id`, `last_time`, `token`) VALUES
(47, '2021-11-08 10:42:08', '61872006cfcdd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.visits`
--

CREATE TABLE `tb_site.visits` (
  `id` int(11) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.visits`
--

INSERT INTO `tb_site.visits` (`id`, `day`) VALUES
(1, '2021-11-05'),
(2, '2021-11-06'),
(3, '2021-11-06'),
(4, '2021-11-06'),
(5, '2021-11-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `name`, `image`) VALUES
(1, 'admin', 'admin', 0, 'Leonardo Pessoa', '6186ffa8ad47e.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_site.online`
--
ALTER TABLE `tb_site.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.visits`
--
ALTER TABLE `tb_site.visits`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_site.online`
--
ALTER TABLE `tb_site.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `tb_site.visits`
--
ALTER TABLE `tb_site.visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
