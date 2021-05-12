-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Maio-2021 às 02:07
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `salao_inteligente`
--
CREATE DATABASE IF NOT EXISTS `salao_inteligente` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `salao_inteligente`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendar_servicos`
--

CREATE TABLE `agendar_servicos` (
  `idagendar_servicos` int(11) NOT NULL,
  `data_solicitacao` date DEFAULT NULL,
  `data_servico` date DEFAULT NULL,
  `horas` varchar(6) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `servicos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendar_servicos`
--

INSERT INTO `agendar_servicos` (`idagendar_servicos`, `data_solicitacao`, `data_servico`, `horas`, `usuario`, `servicos`, `status`) VALUES
(1, '2021-05-11', '2021-05-12', '19:00', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_servicos`
--

CREATE TABLE `historico_servicos` (
  `idhistorico_servicos` int(11) NOT NULL,
  `idagendar_servicos` int(11) DEFAULT NULL,
  `data_solicitacao` date DEFAULT NULL,
  `data_servico` date DEFAULT NULL,
  `servicos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `historico_servicos`
--

INSERT INTO `historico_servicos` (`idhistorico_servicos`, `idagendar_servicos`, `data_solicitacao`, `data_servico`, `servicos`, `status`) VALUES
(1, 1, '2021-05-11', '2021-05-12', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `idservicos` int(11) NOT NULL,
  `nome_servico` varchar(45) DEFAULT NULL,
  `valor_servico` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`idservicos`, `nome_servico`, `valor_servico`) VALUES
(1, 'CORTE', '30.00'),
(2, 'BARBA', '20.00'),
(3, 'CORTE E BARBA', '49.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `login` varchar(45) NOT NULL,
  `data_cadastro` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome_usuario`, `senha`, `login`, `data_cadastro`, `email`, `cpf`, `telefone`) VALUES
(1, 'Glauber W. Z. de Souza', 'bc7316929fe1545bf0b98d114ee3ecb8', 'Glauberwzs', '2021-05-11', 'glauberwzs@hotmail.com', '97183229068', '03535518262'),
(2, 'Flavio Luiz Figueiredo', '81dc9bdb52d04dc20036dbd8313ed055', 'Flaviol', '2021-05-11', 'flaviol@gmail.com', '93279374065', '03535512548'),
(3, 'Eder Xavier', '81dc9bdb52d04dc20036dbd8313ed055', 'EderX', '2021-05-11', 'ederxavier@teste.com.br', '77082051077', '03537222584'),
(4, 'Julio César Freitas Leal', '81dc9bdb52d04dc20036dbd8313ed055', 'Julio', '2021-05-11', 'julio@teste.com.br', '85420933055', '03537223752');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendar_servicos`
--
ALTER TABLE `agendar_servicos`
  ADD PRIMARY KEY (`idagendar_servicos`),
  ADD KEY `usuario_idx` (`usuario`),
  ADD KEY `servicos_idx` (`servicos`);

--
-- Índices para tabela `historico_servicos`
--
ALTER TABLE `historico_servicos`
  ADD PRIMARY KEY (`idhistorico_servicos`),
  ADD KEY `agendar_serviso_idx` (`idagendar_servicos`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idservicos`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendar_servicos`
--
ALTER TABLE `agendar_servicos`
  MODIFY `idagendar_servicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `historico_servicos`
--
ALTER TABLE `historico_servicos`
  MODIFY `idhistorico_servicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idservicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendar_servicos`
--
ALTER TABLE `agendar_servicos`
  ADD CONSTRAINT `servicos` FOREIGN KEY (`servicos`) REFERENCES `servicos` (`idservicos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `historico_servicos`
--
ALTER TABLE `historico_servicos`
  ADD CONSTRAINT `agendar_servicos` FOREIGN KEY (`idagendar_servicos`) REFERENCES `agendar_servicos` (`idagendar_servicos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
