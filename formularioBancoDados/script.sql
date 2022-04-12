CREATE DATABASE tads;

USE tads;

CREATE TABLE recados (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50),
  email VARCHAR(50),
  cidade VARCHAR(50),
  recado VARCHAR(200)
);

INSERT INTO
  recados(nome, email, cidade, recado)
VALUES
  ('$nome', '$email', '$cidade', '$recado');