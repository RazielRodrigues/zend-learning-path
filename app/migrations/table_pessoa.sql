CREATE DATABASE IF NOT EXISTS zend;

use zend;

CREATE TABLE pessoa (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    sobrenome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    status boolean NOT NULL
)

INSERT INTO pessoa (id, nome, sobrenome, email, status) 
VALUES (DEFAULT, 'Joao', 'Silva', 'joao@mail.com', true);

INSERT INTO pessoa (id, nome, sobrenome, email, status) 
VALUES (DEFAULT, 'Maria', 'Silva', 'maria@mail.com', false);