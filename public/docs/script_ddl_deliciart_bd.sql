-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE tb_usuarios (
idUsuario INT AUTO_INCREMENT PRIMARY KEY,
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
)

CREATE TABLE tb_msg_usuario (
idMsgUsuario INT AUTO_INCREMENT PRIMARY KEY,
assunto VARCHAR(20) NOT NULL,
mensagem VARCHAR(500) NOT NULL,
fkIdRspAdmin INT,
dataEnvio DATETIME NOT_NULL,
situacao BOOL NOT NULL
)

CREATE TABLE tb_rsp_admin (
idRespAdmin INT AUTO_INCREMENT PRIMARY KEY,
fkIdMsgUsuario INT NOT NULL,
resposta VARCHAR(200) NOT NULL,
fkIdAdmin INT,
dataRsp DATETIME,
FOREIGN KEY(fkIdMsgUsuario) REFERENCES tb_msg_usuario (idMsgUsuario)
)

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
fkIdAdmin INT
)

CREATE TABLE tb_inf_usuarios (
idInfUsuario INT AUTO_INCREMENT PRIMARY KEY,
celular VARCHAR(13) NOT NULL,
telefone VARCHAR(12),
cpfCnpj VARCHAR(14) UNIQUE, NOT NULL,
estado VARCHAR(2) NOT NULL,
cidade VARCHAR(50) NOT NULL,
bairro VARCHAR(50) NOT NULL,
rua VARCHAR(80) NOT NULL,
numero VARCHAR(5) NOT NULL,
complemento VARCHAR(30),
cep VARCHAR(8) NOT NULL,
fkIdUsuario INT,
FOREIGN KEY(fkIdUsuario) REFERENCES tb_usuarios (idUsuario)
)

CREATE TABLE tb_un_medida (
idUnMedida INT AUTO_INCREMENT PRIMARY KEY,
nomeUn VARCHAR(10),
abrevitura VARCHAR(5),
estado BOOL
)

CREATE TABLE tb_tipo_produto (
idTipoProduto INT AUTO_INCREMENT PRIMARY KEY,
nomeTipoProduto VARCHAR(30)
)

CREATE TABLE tb_admin (
idAdmin INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50) NOT NULL,
usuario VARCHAR(30) NOT NULL,
senha VARCHAR(256) NOT NULL,
situacao BOOL(2) NOT NULL,
emailAdmin VARCHAR(200) NOT NULL,
dataCad DATETIME NOT NULL,
dataMod DATETIME,
dataDes DATETIME
)

CREATE TABLE tb_produto (
idProduto INT AUTO_INCREMENT PRIMARY KEY,
image VARCHAR(300),
nome VARCHAR(100),
descricao VARCHAR(300),
preco DOUBLE(8,2),
fkCatProduto INT,
fkTipoProduto INT,
fkIdAdmin INT,
fkIdUnMedida INT,
dataCad DATETIME,
dataMod DATETIME,
dataDes DATETIME,
estado BOOL,
quantidade INT,
FOREIGN KEY(fkTipoProduto) REFERENCES tb_tipo_produto (idTipoProduto),
FOREIGN KEY(fkIdAdmin) REFERENCES tb_admin (idAdmin),
FOREIGN KEY(fkIdUnMedida) REFERENCES tb_un_medida (idUnMedida)
)

CREATE TABLE tb_cat_produto (
idCategoria INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50),
estado BOOL
)

CREATE TABLE tb_fav_usuario (
idFavorito INT AUTO_INCREMENT PRIMARY KEY,
fkIdProduto INT,
FOREIGN KEY(fkIdProduto) REFERENCES tb_produto (idProduto)
)

CREATE TABLE tb_galeria (
idGaleria INT AUTO_INCREMENT PRIMARY KEY,
fkIdAdmin INT,
urlImage VARCHAR(300),
titulo VARCHAR(30),
descricao VARCHAR(300),
dataUp DATETIME,
estado BOOL,
FOREIGN KEY(fkIdAdmin) REFERENCES tb_admin (idAdmin)
)

ALTER TABLE tb_usuarios ADD FOREIGN KEY(fkIdFavorito) REFERENCES tb_fav_usuario (idFavorito)
ALTER TABLE tb_msg_usuario ADD FOREIGN KEY(fkIdRspAdmin) REFERENCES tb_rsp_admin (idRespAdmin)
ALTER TABLE tb_rsp_admin ADD FOREIGN KEY(fkIdAdmin) REFERENCES tb_admin (idAdmin)
ALTER TABLE tb_conf_site ADD FOREIGN KEY(fkIdAdmin) REFERENCES tb_admin (idAdmin)
ALTER TABLE tb_produto ADD FOREIGN KEY(fkCatProduto) REFERENCES tb_cat_produto (idCategoria)
