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
--         => 09 Tabelas
-- -------------------------------------------------------------
CREATE DATABASE biochamada 
default character set utf8
default collate utf8_general_ci;

use biochamada;

CREATE TABLE PROFESSOR (
    nome varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    tokenP varchar(50)NOT NULL,
    foto longblob,
    matricula varchar(50)NOT NULL,
CONSTRAINT PROFESSOR_PK  PRIMARY KEY (tokenP)
)ENGINE=InnoDB default CHARSET=utf8;

CREATE TABLE ALUNO (
    matricula varchar(50) NOT NULL,
    nome varchar(50)NOT NULL,
    tokenA varchar(50) NOT NULL,
    foto longblob,
CONSTRAINT ALUNO_PK  PRIMARY KEY (tokenA)
)ENGINE=InnoDB default CHARSET=utf8;

CREATE TABLE DISCIPLINA (
    nomeDisciplina varchar(100) NOT NULL,
    codigo int NOT NULL,
constraint DISCIPLINA_PK PRIMARY KEY (codigo)
)ENGINE=InnoDB default CHARSET=utf8;

CREATE TABLE TURMAS (
    turmaNome varchar(10) NOT NULL,
    diaHorario varchar(50) NOT NULL,
    codigo int NOT NULL,
constraint TURMAS_PK PRIMARY KEY (turmaNome, codigo),
CONSTRAINT TURMAS_FK FOREIGN KEY (codigo)
    REFERENCES DISCIPLINA (codigo)
)ENGINE=InnoDB default CHARSET=utf8;


CREATE TABLE SALA (
    local varchar(20) NOT NULL,
    capacidade int NOT NULL,
CONSTRAINT SALA_PK PRIMARY KEY(local)
)ENGINE=InnoDB default CHARSET=utf8;

CREATE TABLE CHAMADA (
    idChamada int NOT NULL AUTO_INCREMENT,
    dhInicio varchar(50) NOT NULL,
    dhFim varchar(50) NOT NULL,
    tokenP varchar(50) NOT NULL,
    turmaNome varchar(10) NOT NULL,
    codigo int NOT NULL,
CONSTRAINT CHAMADA_PK PRIMARY KEY(idChamada),
CONSTRAINT FK_CHAMADA_2 FOREIGN KEY (tokenP)
    REFERENCES PROFESSOR (tokenP),
CONSTRAINT FK_CHAMADA_3 FOREIGN KEY (turmaNome, codigo)
    REFERENCES TURMAS (turmaNome, codigo)
)ENGINE=InnoDB default CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE esta (
    turmaNome varchar(10) NOT NULL,
    local varchar(20) NOT NULL,
    codigo int NOT NULL,
CONSTRAINT FK_esta_1 FOREIGN KEY (turmaNome, codigo)
    REFERENCES TURMAS (turmaNome, codigo),
CONSTRAINT FK_esta_2 FOREIGN KEY (local)
    REFERENCES SALA (local)
)ENGINE=InnoDB default CHARSET=utf8;

CREATE TABLE ministra (
    tokenP varchar(50)NOT NULL,
    turmaNome varchar(10)NOT NULL,
    codigo int NOT NULL,
CONSTRAINT FK_ministra_1 FOREIGN KEY (tokenP)
    REFERENCES PROFESSOR (tokenP),
CONSTRAINT FK_ministra_2 FOREIGN KEY (turmaNome, codigo)
    REFERENCES TURMAS (turmaNome, codigo)

)ENGINE=InnoDB default CHARSET=utf8;

CREATE TABLE assina (
    tokenA varchar(50) NOT NULL,
    idChamada int NOT NULL,
    presenca bit NOT NULL,
    dh varchar(50) NOT NULL,
CONSTRAINT FK_assina_1 FOREIGN KEY (tokenA)
    REFERENCES ALUNO (tokenA),
CONSTRAINT FK_assina_2 FOREIGN KEY (idChamada)
    REFERENCES CHAMADA (idChamada)
)ENGINE=InnoDB default CHARSET=utf8;

CREATE USER 'admin'@'%' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION;
 
