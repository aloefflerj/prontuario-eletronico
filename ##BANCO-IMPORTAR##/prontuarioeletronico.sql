-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Dez-2020 às 20:41
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

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
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` char(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `email`, `senha`, `created_at`, `updated_at`) VALUES
(2, 'and@email.com', '$2y$10$DwLIHWSrhU0H9rpys/IOBOBVUVMpUSdte5F/IRCj44bj92WegZVM.', '2020-12-10 22:34:04', '2020-12-10 22:34:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anamnese`
--

CREATE TABLE `anamnese` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `qp` varchar(200) NOT NULL,
  `hda` varchar(200) NOT NULL,
  `antecedentesPessoais` varchar(200) NOT NULL,
  `antecedentesFamiliares` varchar(200) NOT NULL,
  `habitos` varchar(200) NOT NULL,
  `revisaoSistemas` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anamnese`
--

INSERT INTO `anamnese` (`id`, `idPaciente`, `qp`, `hda`, `antecedentesPessoais`, `antecedentesFamiliares`, `habitos`, `revisaoSistemas`, `created_at`, `updated_at`) VALUES
(1, 3, 'Enxaqueca constante.', 'Já teve sarampo.', 'Crescimento atrasado; parto normal...', 'Doença hereditária na família.', 'Fumar, jogar bola.', 'Cansaço na cabeça do dia a dia.', '2020-12-10 15:43:19', '2020-12-10 15:43:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evolucao`
--

CREATE TABLE `evolucao` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `situacao` varchar(200) NOT NULL,
  `observacoes` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `evolucao`
--

INSERT INTO `evolucao` (`id`, `idPaciente`, `situacao`, `observacoes`, `created_at`, `updated_at`) VALUES
(1, 3, 'O paciente foi atendido tal tal tal...', 'Paciente alérgico à xxxxx', '2020-12-09 21:42:02', '2020-12-09 21:42:02'),
(2, 3, 'Paciente em sitação mortal', 'Já era padrinho...', '2020-12-10 01:38:22', '2020-12-10 01:38:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `via` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `idPaciente`, `nome`, `periodo`, `horario`, `via`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dipirona Líquida', '2 dias', '19h', 'oral', '2020-12-08 00:21:04', '2020-12-08 00:23:39'),
(2, 3, 'Cloroquina', '900 dias', 'De três em três horas', 'Anal', '2020-12-08 00:42:16', '2020-12-08 00:42:16'),
(3, 4, 'Simeticona', '5 dias', '6h', 'oral', '2020-12-08 00:43:03', '2020-12-08 00:43:03');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `telefone`, `endereco`, `anoNasc`, `idEvolucao`, `idAnamnese`, `idMedicamentos`, `idProfissional`, `idSinaisVitais`, `created_at`, `updated_at`) VALUES
(1, 'Paciente 1', '98765432101', '(51) 777777', 'Rua tal n sei o q', '2000', 1, 1, 1, 1, 1, '2020-12-07 05:18:05', '2020-12-08 00:21:50'),
(2, 'Paciente Fulano', '987654321', '12321654897', 'Av sei lá', '1820', 1, 1, 1, 12, 3, '2020-12-07 22:56:44', '2020-12-08 00:21:50'),
(3, 'Paciente de tal', '321321321', '32132132132', 'Av sei lá o q e tal', '3211', 1, 1, 1, 15, 3, '2020-12-07 23:22:05', '0000-00-00 00:00:00'),
(4, 'Paciente joao albertp', '32158469684', '5456513', 'asdasd', '1990', 1, 1, 1, 15, 3, '2020-12-07 23:25:08', '2020-12-07 23:25:08');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profissionais`
--

INSERT INTO `profissionais` (`id`, `nome`, `cpf`, `telefone`, `endereco`, `anoNasc`, `especializacao`, `senha`, `created_at`, `updated_at`) VALUES
(8, 'Matcha', '11111111111', '99999999999', 'Av Assis Brasil, 123456', '2018', 'Ortopedista', '$2y$10$4ZMiPhf8Mv0ROYi1vtZiee5k7TubhfJ8j2d..igelQP', '2020-12-07 07:45:45', '2020-12-07 07:45:45'),
(10, 'Frank', '8888888888', '(51) 99999-', 'Av Sertório', '1810', 'Oncologista', '$2y$10$WfDwIfrT5RmZVFisvPOvNORnO9GVlQnHqZw.j5le4fy', '2020-12-07 08:33:34', '2020-12-07 08:33:34'),
(12, 'Anderson', '12345678910', '(51) 99999-', 'av tal de tal, 666', '1994', 'Oncologista', '$2y$10$nDS923T4VCybjuaLcK1PpOd4fLcDO3S3PQenmajKg7tYAUjIJGOWS', '2020-12-07 08:50:58', '2020-12-07 08:50:58'),
(13, 'Susan', '98765432110', '(51) 99999-', 'Av Sertório', '1994', 'Dermatologista', '$2y$10$kFsGLczNYvPdprkKwiyWi.bwOBbqj4pMg2qVZYWR325GVewdCfrXO', '2020-12-07 09:36:02', '2020-12-07 09:36:02'),
(15, 'Áuzio', '123', '123', 'asd', '32131', 'Psicólogo', '$2y$10$0f1FhMPEPNiu8bXrSWMzI.RJSS1f7VgkcvtoDf3eAiEPUyG4KJaNu', '2020-12-07 09:41:37', '2020-12-07 09:41:37'),
(16, 'Zé', '000', '12346574', 'Rua Sepulveda', '1945', 'Geriatra', '$2y$10$6nYR2SnOhkIkEKkOifCxpOzkpRcy..H69dNuaaQ0jO9wUy48IB/2S', '2020-12-10 23:39:50', '2020-12-10 23:39:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sinaisvitais`
--

CREATE TABLE `sinaisvitais` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `pressao` varchar(20) NOT NULL,
  `batimentos` varchar(20) NOT NULL,
  `saturacaoOxigenio` varchar(100) NOT NULL,
  `nivelDioxidoCarbono` varchar(100) NOT NULL,
  `temperatura` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sinaisvitais`
--

INSERT INTO `sinaisvitais` (`id`, `idPaciente`, `pressao`, `batimentos`, `saturacaoOxigenio`, `nivelDioxidoCarbono`, `temperatura`, `created_at`, `updated_at`) VALUES
(1, 3, '12/8', '60', 'seilá', 'seilá', 36, '2020-12-10 14:58:05', '2020-12-10 14:58:05'),
(2, 3, '13/9', '100', 'Não sei', 'Não sei', 39, '2020-12-10 14:58:05', '2020-12-10 14:58:05');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `anamnese`
--
ALTER TABLE `anamnese`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `evolucao`
--
ALTER TABLE `evolucao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sinaisvitais`
--
ALTER TABLE `sinaisvitais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `anamnese`
--
ALTER TABLE `anamnese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `evolucao`
--
ALTER TABLE `evolucao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `sinaisvitais`
--
ALTER TABLE `sinaisvitais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
