-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Dez-2020 às 22:02
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
(3, 'adm@email.com', '$2y$10$UarE2F3sBBPswH4dSSEzcufeoeeWsqBZCOQ7OvuxPbB2efc4/qroq', '2020-12-15 00:19:53', '2020-12-15 00:19:53');

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
(1, 3, 'Enxaqueca constante.', 'Já teve sarampo.', 'Crescimento atrasado; parto normal...', 'Doença hereditária na família.', 'Fumar, jogar bola.', 'Cansaço na cabeça do dia a dia.', '2020-12-10 15:43:19', '2020-12-10 15:43:19'),
(8, 12, 'Prurido', 'Alergia', 'Alergia a Camarão', 'Enfarte do miocárido da mãe', 'Saudáveis', 'Sem alterações', '2020-12-14 03:15:19', '2020-12-14 01:45:44'),
(9, 12, 'Dor na região Lombar', 'Dor, hematúria', 'Pneumonia, levou um tiro', 'Cancer', 'Chera cocaína', 'Visão turva', '2020-12-14 05:59:39', '2020-12-14 05:59:39'),
(10, 14, 'Dor de cabeça', 'Sem histórico', 'Bronquite', 'Cancer', 'Bebe', 'Audição levemente afetada', '2020-12-14 07:36:03', '2020-12-14 07:36:03'),
(11, 15, 'Dor de cabeça', 'Dor, hematúria', 'Bronquite', 'Cancer', 'Fuma', 'Audição Precária', '2020-12-15 00:43:40', '2020-12-15 00:43:40'),
(12, 16, 'Dor na região Lombar', 'Dor, hematúria', 'Alergia a Camarão', 'Enfarte do miocárido da mãe', 'Bebe', 'Visão turva', '2020-12-15 00:51:32', '2020-12-15 00:51:32'),
(13, 16, 'Dor na região Lombar', 'Dor, hematúria', 'Alergia a Camarão', 'Enfarte do miocárido da mãe', 'Bebe', 'Visão turva', '2020-12-15 00:53:14', '2020-12-15 00:53:14'),
(14, 18, 'Acidente ', 'Já quebrou o mesmo braço antes', 'Sem', 'Diabetes', 'Beber, fumar', 'Sem alterações', '2020-12-15 00:56:26', '2020-12-15 00:56:26'),
(15, 18, 'Dor no braço', 'Quebrou o braço recentemente', 'Quebrou o braço', 'Diabetes', 'Beber, fumar', 'Visão turva', '2020-12-15 01:00:52', '2020-12-15 01:00:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idProfissional` int(11) NOT NULL,
  `queixa` varchar(200) NOT NULL,
  `dataConsulta` datetime NOT NULL,
  `finalizada` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id`, `idPaciente`, `idProfissional`, `queixa`, `dataConsulta`, `finalizada`, `created_at`, `updated_at`) VALUES
(17, 15, 21, 'Dor de Cabeça', '2020-12-14 20:39:00', 's', '2020-12-15 00:36:58', '2020-12-15 00:43:40'),
(18, 16, 24, 'Alucinação', '2020-12-14 22:42:00', 's', '2020-12-15 00:37:14', '2020-12-15 00:53:14'),
(19, 16, 21, 'Dor na Região Lombar', '2020-12-14 19:39:00', 'n', '2020-12-15 00:37:37', '2020-12-15 00:37:37'),
(20, 17, 21, 'Dor na Cabeça', '2020-12-14 21:42:00', 'n', '2020-12-15 00:38:08', '2020-12-15 00:38:08'),
(21, 20, 21, 'Acidente', '2020-12-14 19:42:00', 'n', '2020-12-15 00:40:48', '2020-12-15 00:40:48'),
(22, 19, 22, 'Dor', '2020-12-15 20:43:00', 'n', '2020-12-15 00:41:01', '2020-12-15 00:41:01'),
(23, 18, 21, 'Acidente', '2020-12-15 19:42:00', 's', '2020-12-15 00:41:20', '2020-12-15 01:00:52'),
(24, 15, 21, 'Dor de Cabeça', '2020-12-14 19:46:00', 'n', '2020-12-15 00:44:10', '2020-12-15 00:44:10'),
(25, 18, 21, 'Dor no braço', '2020-12-14 20:02:00', 'n', '2020-12-15 00:58:13', '2020-12-15 00:58:13');

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
(2, 3, 'De mal a pior', 'Não demonstrou melhoras', '2020-12-10 02:17:24', '2020-12-10 02:17:24'),
(3, 4, 'Estável', '8 dias', '2020-12-14 01:56:33', '2020-12-14 01:56:33'),
(4, 4, 'Estável', '8 dias', '2020-12-14 02:00:21', '2020-12-14 02:00:21'),
(5, 4, 'Estável', '8 dias', '2020-12-14 02:02:06', '2020-12-14 02:02:06'),
(6, 3, 'Estável', '8 dias', '2020-12-14 02:06:41', '2020-12-14 02:06:41'),
(7, 3, 'Estável', '8 dias', '2020-12-14 02:07:15', '2020-12-14 02:07:15'),
(8, 12, 'Estável', 'Prurido', '2020-12-14 03:15:19', '2020-12-14 01:46:07'),
(9, 12, 'Estável', 'Caso haja obstrução, operar', '2020-12-14 05:59:38', '2020-12-14 05:59:38'),
(10, 14, 'Estável', 'Melhorou significamente', '2020-12-14 07:36:03', '2020-12-14 07:36:03'),
(11, 15, 'Estável', 'Voltar em 5 dias', '2020-12-15 00:43:40', '2020-12-15 00:43:40'),
(12, 16, 'Estável', 'Caso haja obstrução, operar', '2020-12-15 00:51:31', '2020-12-15 00:51:31'),
(13, 16, 'Estável', 'Caso haja obstrução, operar', '2020-12-15 00:53:13', '2020-12-15 00:53:13'),
(14, 18, 'Estável', 'Não fazer força', '2020-12-15 00:56:26', '2020-12-15 00:56:26'),
(15, 18, 'Estável', 'Caso haja infecção, operar', '2020-12-15 01:00:52', '2020-12-15 01:00:52');

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `idPaciente`, `nome`, `periodo`, `horario`, `via`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dipirona Líquida', '2 dias', '19h', 'oral', '2020-12-08 00:21:04', '2020-12-08 00:23:39'),
(2, 3, 'Cloroquina', '900 dias', 'De três em três horas', 'Anal', '2020-12-08 00:42:16', '2020-12-08 00:42:16'),
(3, 4, 'Simeticona', '5 dias', '6h', 'oral', '2020-12-08 00:43:03', '2020-12-08 00:43:03'),
(4, 3, 'Furosemida', '3 dias', '1 vez ao dia', 'oral', '2020-12-10 02:51:25', '2020-12-10 02:51:25'),
(11, 12, 'Prednizolona e Fenergan', '3 dias', '1 vez ao dia', 'Oral', '2020-12-14 03:15:19', '2020-12-14 03:15:19'),
(12, 12, 'Meloxican, Agemoxi, Tramadol', '3 dias, 5 dias, 5dias', 'SID (1 vez ao dia)', 'Oral', '2020-12-14 05:59:38', '2020-12-14 05:59:38'),
(13, 14, 'Dipirona', '8 dias', '5 vezes', 'Oral', '2020-12-14 07:36:03', '2020-12-14 07:36:03'),
(14, 15, 'Dipirona', '3 dias', '5 vezes', 'Oral', '2020-12-15 00:43:40', '2020-12-15 00:43:40'),
(15, 16, 'Fenergan', '8 dias', 'SID (1 vez ao dia)', 'Oral', '2020-12-15 00:51:31', '2020-12-15 00:51:31'),
(16, 16, 'Meloxican, Agemoxi, Tramadol', '3 dias, 5 dias, 5dias', 'SID (1 vez ao dia)', 'Oral', '2020-12-15 00:53:13', '2020-12-15 00:53:13'),
(17, 18, 'Antibiótico', '20 dias', '2 vezes ao dia', 'Oral', '2020-12-15 00:56:26', '2020-12-15 00:56:26'),
(18, 18, 'Antibiótico', '10 dias', '1 vez ao dia', 'Oral', '2020-12-15 01:00:52', '2020-12-15 01:00:52');

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
  `idEvolucao` int(11) DEFAULT NULL,
  `idAnamnese` int(11) DEFAULT NULL,
  `idMedicamentos` int(11) DEFAULT NULL,
  `idProfissional` int(11) DEFAULT NULL,
  `idSinaisVitais` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `telefone`, `endereco`, `anoNasc`, `idEvolucao`, `idAnamnese`, `idMedicamentos`, `idProfissional`, `idSinaisVitais`, `created_at`, `updated_at`) VALUES
(15, 'Joao', '1', '(51)99999-9', 'Av Mauá', '1998', NULL, NULL, NULL, NULL, NULL, '2020-12-15 00:34:00', '2020-12-15 00:34:00'),
(16, 'Márcia', '2', '(51) 99999-', 'Av Independência', '1956', NULL, NULL, NULL, NULL, NULL, '2020-12-15 00:34:32', '2020-12-15 00:34:32'),
(17, 'Diógenes', '3', '(51)99888-8', 'Av Voluntários', '1975', NULL, NULL, NULL, NULL, NULL, '2020-12-15 00:34:59', '2020-12-15 00:34:59'),
(18, 'Alfredo', '4', '(51) 99999-', 'Av. Sepúlveda, 45', '1987', NULL, NULL, NULL, NULL, NULL, '2020-12-15 00:38:50', '2020-12-15 00:38:50'),
(19, 'Maria', '5', '(51) 99999-', 'Av Assis Brasil, 54', '1950', NULL, NULL, NULL, NULL, NULL, '2020-12-15 00:39:19', '2020-12-15 00:39:19'),
(20, 'Gioavana', '6', '(51)3030-30', 'Rua Polar, 80', '1968', NULL, NULL, NULL, NULL, NULL, '2020-12-15 00:40:11', '2020-12-15 00:40:11');

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
(21, 'Dráuzio', '1', '(51)1111-11', 'Av. Ceará, 50', '1942', 'Oncologista', '$2y$10$3w6kntU08SMaRAveDC9yWOBkCeEs.Nulcy7hsrEGp494qMzSKlHJm', '2020-12-15 00:27:09', '2020-12-15 00:27:09'),
(22, 'Susan', '2', '(51)2222-22', 'Av Assis Brasil, 123456', '1994', 'Dermatologista', '$2y$10$5zk2/AjV/9kOyC4SNMjqg.sLSekeEd0wcYJ/xnlmD2fd8pQVGeC8K', '2020-12-15 00:29:18', '2020-12-15 00:29:18'),
(23, 'Anderson', '3', '(51)3333-33', 'Rua 7, 55', '1994', 'Ortopedista', '$2y$10$CG/letIA9X59nmiyXsKfeO6a7krZL62l9j9Lqn0C6SYCrFuN7Pzw6', '2020-12-15 00:30:32', '2020-12-15 00:30:32'),
(24, 'Matcha', '4', '(51) 4444-4', 'Rua Paes Leme, 462', '1985', 'Pisquiatra', '$2y$10$i9yDePC.FlrvtPYaayw4aOULb94WWxWWAhcLD1ux1q1JrYogus23S', '2020-12-15 00:31:39', '2020-12-15 00:31:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sinaisvitais`
--

CREATE TABLE `sinaisvitais` (
  `id` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `pressao` varchar(20) NOT NULL,
  `batimentos` varchar(20) NOT NULL,
  `saturacaoOxigenio` varchar(50) NOT NULL,
  `nivelDioxidoCarbono` varchar(20) NOT NULL,
  `temperatura` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sinaisvitais`
--

INSERT INTO `sinaisvitais` (`id`, `idPaciente`, `pressao`, `batimentos`, `saturacaoOxigenio`, `nivelDioxidoCarbono`, `temperatura`, `created_at`, `updated_at`) VALUES
(1, 3, '12/8', '60', 'sei lá como se mede isso', 'seilá', 36, '2020-12-10 02:36:43', '2020-12-10 02:36:43'),
(2, 3, '14/9', '100', '321321', '654', 37, '2020-12-10 02:38:06', '2020-12-10 02:38:06'),
(8, 12, '13/9', '60', '5', '2', 36, '2020-12-14 03:15:19', '2020-12-14 01:47:09'),
(9, 12, '18/12', '110', '654', '6546', 37, '2020-12-14 05:59:39', '2020-12-14 05:59:39'),
(10, 14, '12/8', '70', '32131', '321321', 36, '2020-12-14 07:36:03', '2020-12-14 07:36:03'),
(11, 15, '12/8', '70', '654', '6546', 36, '2020-12-15 00:43:40', '2020-12-15 00:43:40'),
(12, 16, '13/9', '110', '654', '321', 36, '2020-12-15 00:51:31', '2020-12-15 00:51:31'),
(13, 16, '13/9', '110', '321', '321', 36, '2020-12-15 00:53:13', '2020-12-15 00:53:13'),
(14, 18, '12/8', '60', '522', '456', 36, '2020-12-15 00:56:26', '2020-12-15 00:56:26'),
(15, 18, '12/8', '110', '654', '321', 36, '2020-12-15 01:00:52', '2020-12-15 01:00:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` char(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `senha`, `created_at`, `updated_at`) VALUES
(4, 'user@email.com', '$2y$10$FtiD//0MQQ4ndrIHI/YCLOpJzPZGY0VgoCQhsVx8OHkniD3NRUlja', '2020-12-15 00:22:24', '2020-12-15 00:22:24');

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
-- Índices para tabela `consultas`
--
ALTER TABLE `consultas`
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
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `anamnese`
--
ALTER TABLE `anamnese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `evolucao`
--
ALTER TABLE `evolucao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `sinaisvitais`
--
ALTER TABLE `sinaisvitais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
