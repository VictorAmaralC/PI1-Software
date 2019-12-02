-- ----------------<< Chamada Eletronica >>--------------------
--
--                    SCRIPT DE CRIACAO (DDL)
--
-- Data Criacao ...........: 12/11/2019
-- Autor(es) ..............: Iago Theóphilo de Lima
-- Banco de Dados .........: MySQL
-- Banco de Dados(nome) ...: biochamada
--
-- PROJETO => 01 Base de Dados
--         => 10 Tabelas
-- -------------------------------------------------------------
-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 02/12/2019 às 13:05
-- Versão do servidor: 5.7.28-0ubuntu0.19.04.2
-- Versão do PHP: 7.2.24-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biochamada`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ALUNO`
--

CREATE TABLE `ALUNO` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `tokenA` varchar(50) NOT NULL,
  `foto` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `ALUNO`
--

INSERT INTO `ALUNO` (`matricula`, `nome`, `tokenA`, `foto`) VALUES
(2019543210, 'Iago Lima', '101', NULL),
(2019543211, 'Maria silva', '102', NULL),
(2019543212, 'Maria Joao', '103', NULL),
(2019543213, 'Guilherme Pererira', '104', NULL),
(2019543214, 'Beatriz de Alagoas', '105', NULL),
(2019543216, 'Gabriel Barbosa', '107', NULL),
(2019543217, 'Marta da Silva', '108', NULL),
(2019543218, 'Neymar da Vila', '109', NULL),
(2019543219, 'Clara Rosa', '110', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `assina`
--

CREATE TABLE `assina` (
  `matricula` int(11) DEFAULT NULL,
  `idChamada` int(11) DEFAULT NULL,
  `presenca` enum('P','F') DEFAULT NULL,
  `dh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `assina`
--

INSERT INTO `assina` (`matricula`, `idChamada`, `presenca`, `dh`) VALUES
(2019543210, 91, 'P', '01/01/2019 00:58'),
(2019543212, 91, 'P', '01/01/2019 00:58'),
(2019543213, 91, 'P', '01/01/2019 00:58'),
(2019543214, 91, 'P', '01/01/2019 00:58'),
(2019543216, 91, 'P', '01/01/2019 00:58'),
(2019543217, 91, 'F', '01/01/2019 00:58'),
(2019543218, 91, 'F', '02/01/2019 00:58'),
(2019543219, 91, 'F', '02/01/2019 00:58'),
(2019543210, 92, 'P', '02/01/2019 00:58'),
(2019543212, 92, 'P', '02/01/2019 00:58'),
(2019543214, 92, 'P', '02/01/2019 00:58'),
(2019543216, 92, 'P', '02/01/2019 00:58'),
(2019543217, 92, 'P', '02/01/2019 00:58'),
(2019543218, 92, 'P', '02/01/2019 00:58'),
(2019543219, 92, 'P', '02/01/2019 00:58'),
(2019543213, 92, 'F', '02/01/2019 00:58'),
(2019543210, 94, 'P', '02/01/2019 00:58'),
(2019543211, 94, 'P', '02/01/2019 00:58'),
(2019543213, 94, 'P', '02/01/2019 00:58'),
(2019543219, 94, 'P', '02/01/2019 00:58'),
(2019543217, 94, 'F', '02/01/2019 00:58'),
(2019543216, 94, 'F', '02/01/2019 00:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `CHAMADA`
--

CREATE TABLE `CHAMADA` (
  `idChamada` int(11) NOT NULL,
  `dhInicio` varchar(50) DEFAULT NULL,
  `dhFim` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `turmaNome` varchar(50) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `CHAMADA`
--

INSERT INTO `CHAMADA` (`idChamada`, `dhInicio`, `dhFim`, `email`, `turmaNome`, `codigo`) VALUES
(91, '01/01/2019 00:58', '01/01/2019 00:58', 'joenio@gmail.com', 'A', 2),
(92, '02/01/2019 00:58', '02/01/2019 00:58', 'joenio@gmail.com', 'A', 2),
(93, '02/01/2019 00:58', '02/01/2019 00:58', 'ed.pereira@gmail.com', 'A', 3),
(94, '02/01/2019 00:58', '02/01/2019 00:58', 'ed.pereira@gmail.com', 'A', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `DISCIPLINA`
--

CREATE TABLE `DISCIPLINA` (
  `nomeDisciplina` varchar(50) DEFAULT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `DISCIPLINA`
--

INSERT INTO `DISCIPLINA` (`nomeDisciplina`, `codigo`) VALUES
('Projeto Integrador 1', 1),
('MDS', 2),
('Banco de Dados', 3),
('Calculo1', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `esta`
--

CREATE TABLE `esta` (
  `turmaNome` varchar(50) DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `esta`
--

INSERT INTO `esta` (`turmaNome`, `local`, `codigo`) VALUES
('A', 'S1', 1),
('A', 'S2', 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `falta_chamada`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `falta_chamada` (
`cont` bigint(21)
,`dh` varchar(50)
,`chamada` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `frequencia_alunos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `frequencia_alunos` (
`nome` varchar(50)
,`nomeDisciplina` varchar(50)
,`turmaNome` varchar(50)
,`dh` varchar(50)
,`presenca` enum('P','F')
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `matriculado`
--

CREATE TABLE `matriculado` (
  `matricula` int(11) DEFAULT NULL,
  `turmaNome` varchar(50) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `matriculado`
--

INSERT INTO `matriculado` (`matricula`, `turmaNome`, `codigo`) VALUES
(2019543210, 'A', 2),
(2019543212, 'A', 2),
(2019543213, 'A', 2),
(2019543214, 'A', 2),
(2019543216, 'A', 2),
(2019543217, 'A', 2),
(2019543218, 'A', 2),
(2019543219, 'A', 2),
(2019543210, 'A', 1),
(2019543210, 'A', 3),
(2019543211, 'A', 3),
(2019543213, 'A', 3),
(2019543219, 'A', 3),
(2019543217, 'A', 3),
(2019543216, 'A', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ministra`
--

CREATE TABLE `ministra` (
  `email` varchar(50) DEFAULT NULL,
  `turmaNome` varchar(50) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `ministra`
--

INSERT INTO `ministra` (`email`, `turmaNome`, `codigo`) VALUES
('joenio@gmail.com', 'A', 2),
('ed.pereira@gmail.com', 'A', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `PROFESSOR`
--

CREATE TABLE `PROFESSOR` (
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `tokenP` varchar(50) NOT NULL,
  `foto` longblob,
  `matricula` int(11) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `PROFESSOR`
--

INSERT INTO `PROFESSOR` (`nome`, `email`, `tokenP`, `foto`, `matricula`, `senha`) VALUES
('Edivan Pereira', 'ed.pereira@gmail.com', '30', '', 2019101012, '123'),
('Joenio da Silva', 'joenio@gmail.com', '10', '', 2019101010, '123'),
('Maria da Silva Coelho', 'mariacoelho@gmail.com', '20', '', 2019101011, '123'),
('Vanilsa da Rocha Pinto Machado', 'vani.machada@gmail.com', '40', '', 2019101013, '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `SALA`
--

CREATE TABLE `SALA` (
  `local` varchar(50) NOT NULL,
  `capacidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `SALA`
--

INSERT INTO `SALA` (`local`, `capacidade`) VALUES
('S1', 100),
('S2', 100),
('S3', 50),
('S4', 60),
('S5', 50);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TURMAS`
--

CREATE TABLE `TURMAS` (
  `turmaNome` varchar(50) NOT NULL,
  `dia` varchar(50) DEFAULT NULL,
  `horario` varchar(50) DEFAULT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `TURMAS`
--

INSERT INTO `TURMAS` (`turmaNome`, `dia`, `horario`, `codigo`) VALUES
('A', 'segunda-terça', '10h-12h', 1),
('A', 'segunda-quarta', '10h-12H', 2),
('A', 'Segunda-feira', '08:00 - 10:00', 3),
('A', 'Segunda-feira', '14:00 - 16:00', 4),
('B', 'Segunda-feira', '12:00 - 14:00', 4);

-- --------------------------------------------------------

--
-- Estrutura para view `falta_chamada`
--
DROP TABLE IF EXISTS `falta_chamada`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`%` SQL SECURITY DEFINER VIEW `falta_chamada`  AS  select count(`a`.`presenca`) AS `cont`,`c`.`dhInicio` AS `dh`,`c`.`idChamada` AS `chamada` from (`assina` `a` join `CHAMADA` `c` on((`a`.`idChamada` = `c`.`idChamada`))) where (`a`.`presenca` = 'F') group by `c`.`idChamada` ;

-- --------------------------------------------------------

--
-- Estrutura para view `frequencia_alunos`
--
DROP TABLE IF EXISTS `frequencia_alunos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`%` SQL SECURITY DEFINER VIEW `frequencia_alunos`  AS  select `a`.`nome` AS `nome`,`d`.`nomeDisciplina` AS `nomeDisciplina`,`t`.`turmaNome` AS `turmaNome`,`ass`.`dh` AS `dh`,`ass`.`presenca` AS `presenca` from (((((`ALUNO` `a` join `matriculado` `m`) join `assina` `ass`) join `TURMAS` `t`) join `CHAMADA` `ch`) join `DISCIPLINA` `d`) where ((`a`.`matricula` = `ass`.`matricula`) and (`ass`.`matricula` = `m`.`matricula`) and (`a`.`matricula` = `m`.`matricula`) and (`m`.`turmaNome` = `t`.`turmaNome`) and (`m`.`codigo` = `t`.`codigo`) and (`t`.`codigo` = `d`.`codigo`) and (`d`.`codigo` = `t`.`codigo`) and (`t`.`turmaNome` = `ch`.`turmaNome`) and (`t`.`codigo` = `ch`.`codigo`) and (`ch`.`idChamada` = `ass`.`idChamada`)) ;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ALUNO`
--
ALTER TABLE `ALUNO`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `PROFESSOR_UN` (`tokenA`,`matricula`);

--
-- Índices de tabela `assina`
--
ALTER TABLE `assina`
  ADD UNIQUE KEY `assina_UN` (`idChamada`,`matricula`),
  ADD KEY `FK_assina_1` (`matricula`);

--
-- Índices de tabela `CHAMADA`
--
ALTER TABLE `CHAMADA`
  ADD PRIMARY KEY (`idChamada`),
  ADD KEY `FK_CHAMADA_2` (`email`),
  ADD KEY `FK_CHAMADA_3` (`turmaNome`,`codigo`);

--
-- Índices de tabela `DISCIPLINA`
--
ALTER TABLE `DISCIPLINA`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `esta`
--
ALTER TABLE `esta`
  ADD KEY `FK_esta_1` (`turmaNome`,`codigo`),
  ADD KEY `FK_esta_2` (`local`);

--
-- Índices de tabela `matriculado`
--
ALTER TABLE `matriculado`
  ADD KEY `FK_matriculado_1` (`matricula`),
  ADD KEY `FK_matriculado_2` (`turmaNome`,`codigo`);

--
-- Índices de tabela `ministra`
--
ALTER TABLE `ministra`
  ADD KEY `FK_ministra_1` (`email`),
  ADD KEY `FK_ministra_2` (`turmaNome`,`codigo`);

--
-- Índices de tabela `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `PROFESSOR_UN` (`tokenP`,`matricula`);

--
-- Índices de tabela `SALA`
--
ALTER TABLE `SALA`
  ADD PRIMARY KEY (`local`);

--
-- Índices de tabela `TURMAS`
--
ALTER TABLE `TURMAS`
  ADD PRIMARY KEY (`turmaNome`,`codigo`),
  ADD KEY `FK_TURMAS_2` (`codigo`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `CHAMADA`
--
ALTER TABLE `CHAMADA`
  MODIFY `idChamada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `assina`
--
ALTER TABLE `assina`
  ADD CONSTRAINT `FK_assina_1` FOREIGN KEY (`matricula`) REFERENCES `ALUNO` (`matricula`),
  ADD CONSTRAINT `FK_assina_2` FOREIGN KEY (`idChamada`) REFERENCES `CHAMADA` (`idChamada`);

--
-- Restrições para tabelas `CHAMADA`
--
ALTER TABLE `CHAMADA`
  ADD CONSTRAINT `FK_CHAMADA_2` FOREIGN KEY (`email`) REFERENCES `PROFESSOR` (`email`),
  ADD CONSTRAINT `FK_CHAMADA_3` FOREIGN KEY (`turmaNome`,`codigo`) REFERENCES `TURMAS` (`turmaNome`, `codigo`);

--
-- Restrições para tabelas `esta`
--
ALTER TABLE `esta`
  ADD CONSTRAINT `FK_esta_1` FOREIGN KEY (`turmaNome`,`codigo`) REFERENCES `TURMAS` (`turmaNome`, `codigo`),
  ADD CONSTRAINT `FK_esta_2` FOREIGN KEY (`local`) REFERENCES `SALA` (`local`);

--
-- Restrições para tabelas `matriculado`
--
ALTER TABLE `matriculado`
  ADD CONSTRAINT `FK_matriculado_1` FOREIGN KEY (`matricula`) REFERENCES `ALUNO` (`matricula`),
  ADD CONSTRAINT `FK_matriculado_2` FOREIGN KEY (`turmaNome`,`codigo`) REFERENCES `TURMAS` (`turmaNome`, `codigo`);

--
-- Restrições para tabelas `ministra`
--
ALTER TABLE `ministra`
  ADD CONSTRAINT `FK_ministra_1` FOREIGN KEY (`email`) REFERENCES `PROFESSOR` (`email`),
  ADD CONSTRAINT `FK_ministra_2` FOREIGN KEY (`turmaNome`,`codigo`) REFERENCES `TURMAS` (`turmaNome`, `codigo`) ON DELETE SET NULL;

--
-- Restrições para tabelas `TURMAS`
--
ALTER TABLE `TURMAS`
  ADD CONSTRAINT `FK_TURMAS_2` FOREIGN KEY (`codigo`) REFERENCES `DISCIPLINA` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
create VIEW frequencia_alunos as SELECT a.nome,d.nomeDisciplina,t.turmaNome,ass.dh,ass.presenca FROM ALUNO a, matriculado m, assina ass, TURMAS t,CHAMADA ch, DISCIPLINA d where a.matricula = ass.matricula and ass.matricula=m.matricula and a.matricula=m.matricula and m.turmaNome=t.turmaNome and m.codigo=t.codigo and t.codigo=d.codigo and d.codigo=t.codigo and t.turmaNome=ch.turmaNome and t.codigo=ch.codigo and ch.idChamada=ass.idChamada; 
CREATE USER 'admin'@'%' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION;
 
