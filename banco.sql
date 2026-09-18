CREATE DATABASE IF NOT EXISTS amisadora DEFAULT CHARACTER SET utf8mb4;
USE amisadora;

CREATE TABLE IF NOT EXISTS usuarios (
    Id       INT AUTO_INCREMENT PRIMARY KEY,
    Nome     VARCHAR(100),
    CPF      VARCHAR(20),
    Endereco VARCHAR(120),
    Bairro   VARCHAR(60),
    Cidade   VARCHAR(60),
    Estado   VARCHAR(2),
    CEP      VARCHAR(15),
    Login    VARCHAR(50),
    Senha    VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS produtos (
    Id     INT AUTO_INCREMENT PRIMARY KEY,
    Nome   VARCHAR(120),
    Preco  DECIMAL(10,2),
    Imagem VARCHAR(120)
);

CREATE TABLE IF NOT EXISTS contatos (
    Id        INT AUTO_INCREMENT PRIMARY KEY,
    Nome      VARCHAR(100),
    Email     VARCHAR(120),
    Mensagem  TEXT
);

CREATE TABLE IF NOT EXISTS vendas (
    Id        INT AUTO_INCREMENT PRIMARY KEY,
    Usuario   VARCHAR(50),
    Total     DECIMAL(10,2),
    Pagamento VARCHAR(20),
    DataHora  DATETIME
);

CREATE TABLE IF NOT EXISTS itens_venda (
    Id      INT AUTO_INCREMENT PRIMARY KEY,
    Usuario VARCHAR(50),
    Produto VARCHAR(120),
    Preco   DECIMAL(10,2)
);

CREATE TABLE IF NOT EXISTS carrinho (
    Id      INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50),
    produto VARCHAR(120),
    preco   DECIMAL(10,2)
);

INSERT INTO produtos (Nome, Preco, Imagem) VALUES
('Blazer Elegante', 249.90, 'blazer.png'),
('Blusa Sofisticada', 129.90, 'blusa sofisticada.png'),
('Calça Alfaiataria', 189.90, 'calca alfaiataria.png'),
('Camisa Branca Clássica', 99.90, 'camisa branca class.png'),
('Casaco Premium', 349.90, 'casaco premium.png'),
('Conjunto Moderno', 219.90, 'conjunto moderno.png'),
('Saia Midi', 139.90, 'saia mid.png'),
('Vestido Mini', 159.90, 'vestidomini.png');
