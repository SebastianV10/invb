CREATE TABLE tipo_equipo(
codigo INT NOT NULL AUTO_INCREMENT,
nombre VARCHAR(20),
PRIMARY KEY(codigo)
)engine=innodb;

CREATE TABLE marca(
 codigo INT NOT NULL AUTO_INCREMENT,
 nombre VARCHAR(20),
 PRIMARY KEY(codigo)	
)engine=innodb;

CREATE TABLE edificio(
 codigo INT NOT NULL AUTO_INCREMENT,
 nombre VARCHAR(20),
 PRIMARY KEY(codigo)
)engine=innodb;

CREATE TABLE salon(
codigo INT NOT NULL AUTO_INCREMENT,
numero VARCHAR(10),
codigo_edif INT,
PRIMARY KEY(codigo), 
FOREIGN KEY(codigo_edif) REFERENCES edificio(codigo)
)engine=innodb;

CREATE TABLE usuario(
cedula VARCHAR,
nombres VARCHAR(50),
apellidos VARCHAR(50),
contrasena VARCHAR,
estado INT(1),
PRIMARY KEY(cedula) 
)engine=innodb;



CREATE TABLE equipo(
codigo INT NOT NULL AUTO_INCREMENT,
codigo_marca INT,
serie VARCHAR(20),
codigo_salon INT,
tipo_equipo INT,
descripcion VARCHAR(100),
estado INT(1),
cedula_user_reg VARCHAR,
fecha_registro DATE,
PRIMARY KEY(codigo),
FOREIGN KEY(codigo_marca) REFERENCES marca(codigo),
FOREIGN KEY(codigo_salon) REFERENCES salon(codigo),
FOREIGN KEY(cedula_user_reg) REFERENCES usuario(cedula),
FOREIGN KEY(tipo_equipo) REFERENCES tipo_equipo(codigo)
)engine=innodb;