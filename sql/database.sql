CREATE DATABASE IF NOT EXISTS ProjetoBD1;
CREATE TABLE IF NOT EXISTS categorias  (
	id_categoria INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    	nome VARCHAR(150) UNIQUE 
);
CREATE TABLE IF NOT EXISTS redatores (
	nome varchar(100) NOT NULL,
	matricula INT(11) NOT NULL PRIMARY KEY,
	senha VARCHAR(8) NOT NULL,
    active CHAR(1) DEFAULT 1
);
CREATE TABLE IF NOT EXISTS noticias (
id_noticia INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
   	 titulo VARCHAR(255) NOT NULL UNIQUE,
    	imagem CHAR(5),
 	body TEXT,
 	data DATETIME,
    	id_categoria INT(11) NOT NULL,
    	id_redator INT(11) NOT NULL,
    	CONSTRAINT FK_Categoria FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria),
    	CONSTRAINT FK_Redator FOREIGN KEY (id_redator) REFERENCES redatores(matricula)
);

