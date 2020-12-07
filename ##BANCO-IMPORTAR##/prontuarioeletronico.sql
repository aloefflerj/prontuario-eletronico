-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Dez-2020 às 23:45
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prontuarioeletronico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `anoNasc` varchar(11) NOT NULL,
  `idEvolucao` int(11) NOT NULL,
  `idAnamnese` int(11) NOT NULL,
  `idMedicamentos` int(11) NOT NULL,
  `idProfissional` int(11) NOT NULL,
  `idSinaisVitais` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `telefone`, `endereco`, `anoNasc`, `idEvolucao`, `idAnamnese`, `idMedicamentos`, `idProfissional`, `idSinaisVitais`, `created_at`, `updated_at`) VALUES
(1, 'Paciente 1', '98765432101', '(51) 777777', 'Rua tal n sei o q', '2000', 1, 1, 1, 1, 1, '2020-12-07 05:18:05', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `anoNasc` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `cpf`, `telefone`, `endereco`, `anoNasc`, `created_at`, `updated_at`) VALUES
(1, 'Dráuzio', 1231231234, 321321321, 'av tal', 1990, '2020-12-05 20:59:20', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissionais`
--

CREATE TABLE `profissionais` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `anoNasc` varchar(11) NOT NULL,
  `especializacao` varchar(50) NOT NULL,
  `senha` char(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profissionais`
--

INSERT INTO `profissionais` (`id`, `nome`, `cpf`, `telefone`, `endereco`, `anoNasc`, `especializacao`, `senha`, `created_at`, `updated_at`) VALUES
(8, 'Matcha', '11111111111', '99999999999', 'Av Assis Brasil, 123456', '2018', 'Ortopedista', '$2y$10$4ZMiPhf8Mv0ROYi1vtZiee5k7TubhfJ8j2d..igelQP', '2020-12-07 07:45:45', '2020-12-07 07:45:45'),
(10, 'Áuzio', '8888888888', '(51) 99999-', 'Av Sertório', '1810', 'Oncologista', '$2y$10$WfDwIfrT5RmZVFisvPOvNORnO9GVlQnHqZw.j5le4fy', '2020-12-07 08:33:34', '2020-12-07 08:33:34'),
(12, 'Anderson', '12345678910', '(51) 99999-', 'av tal de tal, 666', '1994', 'Oncologista', '$2y$10$nDS923T4VCybjuaLcK1PpOd4fLcDO3S3PQenmajKg7tYAUjIJGOWS', '2020-12-07 08:50:58', '2020-12-07 08:50:58'),
(13, 'Susan', '98765432110', '(51) 99999-', 'Av Sertório', '1994', 'Dermatologista', '$2y$10$kFsGLczNYvPdprkKwiyWi.bwOBbqj4pMg2qVZYWR325GVewdCfrXO', '2020-12-07 09:36:02', '2020-12-07 09:36:02'),
(15, 'Frankeinstein', '123', '123', 'asd', '32131', 'Psicólogo', '$2y$10$0f1FhMPEPNiu8bXrSWMzI.RJSS1f7VgkcvtoDf3eAiEPUyG4KJaNu', '2020-12-07 09:41:37', '2020-12-07 09:41:37');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
