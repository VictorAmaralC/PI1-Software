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
CREATE DATABASE biochamada;
use biochamada;

CREATE TABLE PROFESSOR (
    nome varchar(50),
    email varchar(50) PRIMARY KEY,
    tokenP varchar(50) NOT NULL,
    foto LONGBLOB,
    matricula int NOT NULL,
    senha varchar(50) NOT NULL,
 CONSTRAINT PROFESSOR_UN UNIQUE (tokenP,matricula)
);

CREATE TABLE ALUNO (
    matricula int PRIMARY KEY,
    nome varchar(50),
    tokenA varchar(50) NOT NULL,
    foto LONGBLOB,
    CONSTRAINT PROFESSOR_UN UNIQUE (tokenA,matricula)
);

CREATE TABLE TURMAS (
    turmaNome varchar(50),
    dia varchar(50),
    horario varchar(50),
    codigo int,
    PRIMARY KEY (turmaNome, codigo)
);

CREATE TABLE DISCIPLINA (
    nomeDisciplina varchar(50),
    codigo int PRIMARY KEY
);

CREATE TABLE SALA (
    local varchar(50) PRIMARY KEY,
    capacidade int
);

CREATE TABLE CHAMADA (
    idChamada int AUTO_INCREMENT ,
    dhInicio varchar(50),
    dhFim varchar(50),
    email varchar(50),
    turmaNome varchar(50),
    codigo int,
    CONSTRAINT CHAMADA_PK PRIMARY KEY(idChamada)
)AUTO_INCREMENT = 1;

CREATE TABLE esta (
    turmaNome varchar(50),
    local varchar(50),
    codigo int
);

CREATE TABLE ministra (
    email varchar(50),
    turmaNome varchar(50),
    codigo int
);

CREATE TABLE assina (
    matricula int,
    idChamada int,
    presenca enum('P','F'),
    dh varchar(50),
    CONSTRAINT assina_UN UNIQUE (idChamada,matricula)

);

CREATE TABLE matriculado (
    matricula int,
    turmaNome varchar(50),
    codigo int,
    CONSTRAINT matriculado_UN UNIQUE (matricula,turmaNome,codigo)

);
 
ALTER TABLE TURMAS ADD CONSTRAINT FK_TURMAS_2
    FOREIGN KEY (codigo)
    REFERENCES DISCIPLINA (codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE CHAMADA ADD CONSTRAINT FK_CHAMADA_2
    FOREIGN KEY (email)
    REFERENCES PROFESSOR (email)
    ON DELETE RESTRICT;
 
ALTER TABLE CHAMADA ADD CONSTRAINT FK_CHAMADA_3
    FOREIGN KEY (turmaNome, codigo)
    REFERENCES TURMAS (turmaNome, codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE esta ADD CONSTRAINT FK_esta_1
    FOREIGN KEY (turmaNome, codigo)
    REFERENCES TURMAS (turmaNome, codigo)
    ON DELETE RESTRICT;
 
ALTER TABLE esta ADD CONSTRAINT FK_esta_2
    FOREIGN KEY (local)
    REFERENCES SALA (local)
    ON DELETE RESTRICT;
 
ALTER TABLE ministra ADD CONSTRAINT FK_ministra_1
    FOREIGN KEY (email)
    REFERENCES PROFESSOR (email)
    ON DELETE RESTRICT;
 
ALTER TABLE ministra ADD CONSTRAINT FK_ministra_2
    FOREIGN KEY (turmaNome, codigo)
    REFERENCES TURMAS (turmaNome, codigo)
    ON DELETE SET NULL;
 
ALTER TABLE assina ADD CONSTRAINT FK_assina_1
    FOREIGN KEY (matricula)
    REFERENCES ALUNO (matricula)
    ON DELETE RESTRICT;
 
ALTER TABLE assina ADD CONSTRAINT FK_assina_2
    FOREIGN KEY (idChamada)
    REFERENCES CHAMADA (idChamada)
    ON DELETE RESTRICT;
 
ALTER TABLE matriculado ADD CONSTRAINT FK_matriculado_1
    FOREIGN KEY (matricula)
    REFERENCES ALUNO (matricula)
    ON DELETE RESTRICT;
 
ALTER TABLE matriculado ADD CONSTRAINT FK_matriculado_2
    FOREIGN KEY (turmaNome, codigo)
    REFERENCES TURMAS (turmaNome, codigo)
    ON DELETE RESTRICT;
INSERT INTO `SALA` (`local`, `capacidade`) VALUES ('S1', '100'), ('S2', '100'), ('S3', '50'), ('S4', '60'), ('S5', '50');
INSERT INTO `DISCIPLINA` (`nomeDisciplina`, `codigo`) VALUES ('Projeto Integrador 1', '1'), ('MDS', '2'), ('Banco de Dados', '3'), ('Calculo1', '4'), ('Calculo2', '5');
INSERT INTO `TURMAS` (`turmaNome`, `dia`, `horario`, `codigo`) VALUES ('A', 'segunda-quarta', '10h-12H', '2'), ('A', 'segunda-terça', '10h-12h', '1');
INSERT INTO `esta` (`turmaNome`, `local`, `codigo`) VALUES ('A', 'S1', '1'), ('A', 'S2', '1');
INSERT INTO `PROFESSOR` (`nome`, `email`, `tokenP`, `foto`, `matricula`, `senha`) VALUES ('Joenio da Silva', 'joenio@gmail.com', '10', '', '2019101010', '123'), ('Maria da Silva Coelho', 'mariacoelho@gmail.com', '20', '', '2019101011', '123'), ('Edivan Pereira', 'ed.pereira@gmail.com', '30', '', '2019101012', '123'), ('Vanilsa da Rocha Pinto Machado', 'vani.machada@gmail.com', '40', '', '2019101013', '123'), ('Mari Julia somente', 'maju@gmail.com', '50', '', '2019101014', '123');
INSERT INTO `ALUNO` (`matricula`, `nome`, `tokenA`, `foto`) VALUES ('2019543210', 'Iago Lima', '101', NULL), ('2019543211', 'Maria silva', '102', NULL), ('2019543212', 'Maria Joao', '103', NULL), ('2019543213', 'Guilherme Pererira', '104', NULL), ('2019543214', 'Beatriz de Alagoas', '105', NULL), ('2019543215', 'Jose Henrique', '106', NULL), ('2019543216', 'Gabriel Barbosa', '107', NULL), ('2019543217', 'Marta da Silva', '108', NULL), ('2019543218', 'Neymar da Vila', '109', NULL), ('2019543219', 'Clara Rosa', '110', NULL);
INSERT INTO `ministra` (`email`, `turmaNome`, `codigo`) VALUES ('ed.pereira@gmail.com', 'A', '1'), ('joenio@gmail.com', 'A', '2');
INSERT INTO `matriculado` (`matricula`, `turmaNome`, `codigo`) VALUES ('2019543210', 'A', '2'), ('2019543211', 'A', '1'), ('2019543212', 'A', '2'), ('2019543213', 'A', '2'), ('2019543214', 'A', '2'), ('2019543216', 'A', '2'), ('2019543217', 'A', '2'), ('2019543218', 'A', '2'), ('2019543219', 'A', '2'), ('2019543210', 'A', '1');
INSERT INTO `CHAMADA` (`idChamada`, `dhInicio`, `dhFim`, `email`, `turmaNome`, `codigo`) VALUES (72, '30/11/2019 00:58', '30/11/2019 00:58', 'joenio@gmail.com', 'A', 2),(73, '30/11/2019 00:58', '30/11/2019 00:58', 'joenio@gmail.com', 'A', 2);
INSERT INTO `assina` (`matricula`, `idChamada`, `presenca`, `dh`) VALUES(2019543210, 72, 'P', '30/11/2019 00:58'),
(2019543212, 72, 'P', '30/11/2019 00:58'),
(2019543213, 72, 'P', '30/11/2019 00:58'),
(2019543214, 72, 'P', '30/11/2019 00:58'),
(2019543216, 72, 'P', '30/11/2019 00:58'),
(2019543217, 72, 'P', '30/11/2019 00:58'),
(2019543218, 72, 'F', NULL),
(2019543219, 72, 'F', NULL),
(2019543210, 73, 'P', '30/11/2019 00:58'),
(2019543212, 73, 'P', '30/11/2019 00:58'),
(2019543213, 73, 'P', '30/11/2019 00:58'),
(2019543214, 73, 'P', '30/11/2019 00:58'),(2019543216, 73, 'F', NULL),(2019543217, 73, 'F', NULL),(2019543218, 73, 'F', NULL),(2019543219, 73, 'F', NULL);

CREATE USER 'admin'@'%' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION;
 
