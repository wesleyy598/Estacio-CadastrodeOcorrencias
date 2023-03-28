-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2021 às 01:39
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ocorrencia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campus`
--

CREATE TABLE `campus` (
  `idcampus` int(11) NOT NULL,
  `campus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `campus`
--

INSERT INTO `campus` (`idcampus`, `campus`) VALUES
(1, 'Gilberto Gil'),
(2, 'Fratelli Vita');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias`
--

CREATE TABLE `ocorrencias` (
  `idocorrencia` int(11) NOT NULL,
  `idsetoretapa` int(11) NOT NULL,
  `idsetorredirecionamento` int(11) NOT NULL,
  `idcampus` int(11) NOT NULL,
  `matricula` varchar(25) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `idtipocorrencia` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `observacao` text NOT NULL,
  `arquivo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `idsetor` int(11) NOT NULL,
  `setor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`idsetor`, `setor`) VALUES
(1, 'APOIO DOCENTE'),
(3, 'COORDENADOR DE CURSO'),
(4, 'FOCAL – AAC'),
(5, 'GERÊNCIA ACADEMICA'),
(6, 'GERENCIA ADMINISTRATIVA'),
(7, 'GERENCIA COMERCIAL'),
(8, 'POLO EAD'),
(9, 'RETENSÃO DE ALUNOS – GPA'),
(10, 'SALA DE MATRÍCULA'),
(11, 'SECRETARIA - COLAÇÃO DE GRAU'),
(12, 'SECRETARIA - FIES'),
(13, 'SECRETARIA - FINANCEIRO'),
(14, 'SECRETARIA - PROUNI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`idstatus`, `status`) VALUES
(1, 'Nova'),
(2, 'Em análise'),
(3, 'Pendente'),
(4, 'Resolvida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoocorrencia`
--

CREATE TABLE `tipoocorrencia` (
  `idtipocorrencia` int(11) NOT NULL,
  `tipocorrencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipoocorrencia`
--

INSERT INTO `tipoocorrencia` (`idtipocorrencia`, `tipocorrencia`) VALUES
(1, 'Teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`idcampus`);

--
-- Índices para tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  ADD PRIMARY KEY (`idocorrencia`);

--
-- Índices para tabela `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`idsetor`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Índices para tabela `tipoocorrencia`
--
ALTER TABLE `tipoocorrencia`
  ADD PRIMARY KEY (`idtipocorrencia`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `campus`
--
ALTER TABLE `campus`
  MODIFY `idcampus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  MODIFY `idocorrencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `setores`
--
ALTER TABLE `setores`
  MODIFY `idsetor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipoocorrencia`
--
ALTER TABLE `tipoocorrencia`
  MODIFY `idtipocorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
