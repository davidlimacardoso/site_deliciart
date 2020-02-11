/*
Autor: David de Lima Cardoso;
Banco: DeliciArt
Descrição: Banco do site DeliciArt
*/

DROP DATABASE IF EXISTS db_deliciart;
CREATE DATABASE db_deliciart;

USE db_deliciart;

CREATE TABLE tb_clientes (
idCliente INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(200) NOT NULL,
email VARCHAR(200) UNIQUE,
senha VARCHAR(50) NOT NULL,
estado BOOL NOT NULL,
dataCad DATETIME NOT NULL,
dataDes DATETIME,
dataMod DATETIME,
infAdicionais BOOL NOT NULL,
notificacao BOOL NOT NULL,
fkIdFavorito INT
);

CREATE TABLE tb_conf_site (
idConfSite INT PRIMARY KEY,
nomeSite VARCHAR(30) NOT NULL,
logo VARCHAR(50) NOT NULL,
slogan VARCHAR(100),
abstrato VARCHAR(30),
emailSite VARCHAR(200),
nomeResponsavel VARCHAR(200),
telefone VARCHAR(12),
celular VARCHAR(13),
cnpj VARCHAR(14) NOT NULL,
estado VARCHAR(2),
cidade VARCHAR(50),
bairro VARCHAR(50),
rua VARCHAR(80),
numero VARCHAR(5),
cep VARCHAR(8),
complemento VARCHAR(30),
dataModificacao DATETIME NOT NULL,
fkIdUsuario INT
);

CREATE TABLE tb_inf_clientes (
idInfCliente INT AUTO_INCREMENT PRIMARY KEY,
celular VARCHAR(13) NOT NULL,
telefone VARCHAR(12),
cpfCnpj VARCHAR(14) UNIQUE NOT NULL,
estado VARCHAR(2) NOT NULL,
cidade VARCHAR(50) NOT NULL,
bairro VARCHAR(50) NOT NULL,
rua VARCHAR(80) NOT NULL,
numero VARCHAR(5) NOT NULL,
complemento VARCHAR(30),
cep VARCHAR(8) NOT NULL,
fkIdcliente INT,
FOREIGN KEY(fkIdcliente) REFERENCES tb_clientes (idCliente)
);

CREATE TABLE tb_un_medida (
idUnMedida INT AUTO_INCREMENT PRIMARY KEY,
nomeUn VARCHAR(10),
abrevitura VARCHAR(5),
estado BOOL
);

CREATE TABLE tb_cat_produto (
idCategoria INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50),
estado BOOL
);

CREATE TABLE tb_tipo_produto (
idTipoProduto INT AUTO_INCREMENT PRIMARY KEY,
nomeTipoProduto VARCHAR(30)
);

CREATE TABLE tb_produto (
idProduto INT AUTO_INCREMENT PRIMARY KEY,
image VARCHAR(300),
nome VARCHAR(100),
descricao VARCHAR(300),
preco DOUBLE(8,2),
fkCatProduto INT,
fkTipoProduto INT,
fkIdUsuario INT,
fkIdUnMedida INT,
dataCad DATETIME,
dataMod DATETIME,
dataDes DATETIME,
estado BOOL,
quantidade INT,
numFavoritos INT,
FOREIGN KEY(fkCatProduto) REFERENCES tb_cat_produto (idCategoria),
FOREIGN KEY(fkTipoProduto) REFERENCES tb_tipo_produto (idTipoProduto),
FOREIGN KEY(fkIdUnMedida) REFERENCES tb_un_medida (idUnMedida)
);

CREATE TABLE tb_fav_cliente (
idFavorito INT AUTO_INCREMENT PRIMARY KEY,
fkIdProduto INT,
FOREIGN KEY(fkIdProduto) REFERENCES tb_produto (idProduto)
);

CREATE TABLE tb_msg_cliente (
idMsgCliente INT AUTO_INCREMENT PRIMARY KEY,
assunto VARCHAR(20) NOT NULL,
mensagem VARCHAR(500) NOT NULL,
fkIdRspAdmin INT,
dataEnvio DATETIME NOT NULL,
situacao BOOL NOT NULL
);

CREATE TABLE tb_usuario (
idUsuario INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50) NOT NULL,
usuario VARCHAR(30) NOT NULL UNIQUE,
senha VARCHAR(256) NOT NULL,
situacao BOOL NOT NULL,
emailAdmin VARCHAR(200) NOT NULL UNIQUE,
dataCad DATETIME NOT NULL,
dataMod DATETIME,
dataDes DATETIME,
fkIdPerfil INT
);

CREATE TABLE tb_galeria (
idGaleria INT AUTO_INCREMENT PRIMARY KEY,
fkIdUsuario INT,
urlImage VARCHAR(300),
titulo VARCHAR(30),
descricao VARCHAR(300),
dataUp DATETIME,
estado BOOL,
FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuario (idUsuario)
);

CREATE TABLE tb_rsp_admin (
idRespAdmin INT AUTO_INCREMENT PRIMARY KEY,
fkIdMsgCliente INT NOT NULL,
resposta VARCHAR(200) NOT NULL,
fkIdUsuario INT,
dataRsp DATETIME,
FOREIGN KEY(fkIdMsgCliente) REFERENCES tb_msg_cliente (idMsgCliente),
FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuario (idUsuario)
);

CREATE TABLE tb_perfil (
idPerfil INT AUTO_INCREMENT PRIMARY KEY,
nomePerfil VARCHAR(15)
);

CREATE TABLE tb_site_sobre (
idSobre INT PRIMARY KEY,
fkIdUsuario INT,
sobreTit1 VARCHAR(60),
sobreTit1Cont VARCHAR(200),
sobreTit1Img VARCHAR(300),
sobreTit2 VARCHAR(60),
sobreTit2Cont VARCHAR(200),
sobreTit2Img VARCHAR(300),
FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuario (idUsuario)
);

ALTER TABLE tb_conf_site ADD FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuario (idUsuario);
ALTER TABLE tb_produto ADD FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuario (idUsuario);
ALTER TABLE tb_galeria ADD FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuario (idUsuario);
ALTER TABLE tb_rsp_admin ADD FOREIGN KEY(fkIdMsgCliente) REFERENCES tb_msg_cliente (idMsgCliente);
ALTER TABLE tb_rsp_admin ADD FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuario (idUsuario);
ALTER TABLE tb_usuario ADD FOREIGN KEY(fkIdPerfil) REFERENCES tb_perfil (idPerfil);
ALTER TABLE tb_clientes ADD FOREIGN KEY(fkIdFavorito) REFERENCES tb_fav_cliente (idFavorito);


/*
ALTER TABLE tb_clientes ADD FOREIGN KEY(fkIdFavorito) REFERENCES tb_fav_cliente (idFavorito);
ALTER TABLE tb_conf_site ADD FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuario (idUsuario);
ALTER TABLE tb_produto ADD FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuario (idUsuario);
ALTER TABLE tb_msg_cliente ADD FOREIGN KEY(fkIdRspAdmin) REFERENCES tb_rsp_admin (idRespAdmin);
ALTER TABLE tb_usuario ADD FOREIGN KEY(fkIdPerfil) REFERENCES tb_perfil (idPerfil);
*/

INSERT INTO tb_perfil values (1,'Administrador');
INSERT INTO tb_perfil values (2,'Operador');
INSERT INTO tb_perfil values (3,'Postagem');

INSERT INTO tb_usuario values (1,'ADMINISTRADOR','admin',md5('123'),1,'admin@admin.com',now(),now(),null,1);

select * from tb_usuario TU
	inner join tb_perfil TP
	on TU.fkIdPerfil = TG.idPerfil;
    
update tb_usuario set situacao = '1' where idUsuario = 3;
