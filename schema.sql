-- Criação do banco
CREATE DATABASE smart_data;
USE smart_data;

-- Tabela de usuários
CREATE TABLE usuario (
    id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

-- Tabela de clientes
CREATE TABLE cliente (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    documento VARCHAR(20) NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(255),
    usuario_id INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_usuario FOREIGN KEY (usuario_id) REFERENCES usuario(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);