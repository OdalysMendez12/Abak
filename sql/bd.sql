CREATE DATABASE abak;
USE abak;

CREATE TABLE estados(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEy,
nombre VARCHAR(50)
);

CREATE TABLE pais(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(40)
);

CREATE TABLE municipio(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(59) NOT NULL,
fk_estado INT UNSIGNED,
FOREIGN KEY (fk_estado) REFERENCES estados(id) 
);

CREATE TABLE ciudades(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
fk_estado INT UNSIGNED,
fk_pais INT UNSIGNED,
fk_municipio INT UNSIGNED,
FOREIGN KEY (fk_estado) REFERENCES estados(id),
FOREIGN KEY (fk_pais) REFERENCES pais(id),
FOREIGN KEY (fk_municipio) REFERENCES municipio(id)
);

CREATE TABLE estado_equipo(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
estado_equipo VARCHAR(40) NOT NULL
);

CREATE TABLE so(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre_so VARCHAR(50) NOT NULL
);

CREATE TABLE catalogo_equipo(
clave_equipo VARCHAR(20),
nombre VARCHAR(50) NOT NULL,
PRIMARY KEY (clave_equipo)
);

CREATE TABLE marca(
id_marca INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre 	VARCHAR(30)
);

CREATE TABLE paqueteria(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(60) NOT NULL,
codigo VARCHAR (10) NOT NULL
);

CREATE TABLE componentes (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre_componente VARCHAR(30),
modelo VARCHAR(20) NOT NULL,
serie VARCHAR(20) NOT NULL,
descripcion VARCHAR(200) NOT NULL
);

CREATE TABLE estatus_ticket(
id_estatus INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
estatus VARCHAR(25)
);

CREATE TABLE departamento(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
fecha_alta TIME DEFAULT CURRENT_TIMESTAMP,
fecha_baja TIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE roles(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
rol VARCHAR(50) NOT NULL
);

CREATE TABLE puesto(
id_puesto INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre_puesto VARCHAR(50) NOT NULL
);

CREATE TABLE empresa(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
correo VARCHAR(100) NOT NULL,
fk_municipio  INT UNSIGNED,
fk_pais INT UNSIGNED,
fk_estado INT UNSIGNED,
fk_ciudad INT UNSIGNED,
direccion VARCHAR (200) NOT NULL,
RFC VARCHAR(50) NOT NULL,
fecha_alta TIME DEFAULT CURRENT_TIMESTAMP,
fecha_baja TIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (fk_estado) REFERENCES estados(id),
FOREIGN KEY (fk_pais) REFERENCES pais(id),
FOREIGN KEY (fk_municipio) REFERENCES municipio(id),
FOREIGN KEY (fk_ciudad) REFERENCES ciudades(id)
);

CREATE TABLE sucursal(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100),
fk_estado INT UNSIGNED,
fk_municipio  INT UNSIGNED,
fk_ciudad INT UNSIGNED,
fk_empresa INT UNSIGNED,
direccion VARCHAR(200),
telefono VARCHAR(12),
fk_responsable VARCHAR(10),
fecha_alta TIME DEFAULT CURRENT_TIMESTAMP,
fecha_baja TIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (fk_estado) REFERENCES estados(id),
FOREIGN KEY (fk_ciudad) REFERENCES ciudades(id),
FOREIGN KEY (fk_municipio) REFERENCES municipio(id),
FOREIGN KEY (fk_empresa) REFERENCES empresa(id)
);

CREATE TABLE usuario(
clave_usuario VARCHAR(10) PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
Apaterno VARCHAR(100) NOT NULL,
Amaterno VARCHAR(100) NOT NULL,
telefono VARCHAR(12) NOT NULL,
correo VARCHAR(100) NOT NULL,
contrasena VARCHAR(15) NOT NULL,
fk_departamento INT UNSIGNED,
fk_rol INT UNSIGNED,
fk_puesto INT UNSIGNED,
sexo VARCHAR(10) NOT NULL,
fk_sucursal INT UNSIGNED,
fecha_alta TIME DEFAULT CURRENT_TIMESTAMP,
fecha_baja TIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (fk_departamento) REFERENCES departamento(id),
FOREIGN KEY (fk_rol) REFERENCES roles(id),
FOREIGN KEY (fk_puesto) REFERENCES puesto(id_puesto),
FOREIGN KEY (fk_sucursal) REFERENCES sucursal(id)
);

CREATE TABLE equipo(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fk_clave_equipo VARCHAR(20),
fk_marca INT UNSIGNED,
modelo VARCHAR(30) NOT NULL,
serie VARCHAR(30) NOT NULL,
fk_componentes INT UNSIGNED,
fk_estado_equipo INT UNSIGNED,
fk_SO INT UNSIGNED,
fk_paqueteria INT UNSIGNED,
MacAddress VARCHAR(50) NOT NULL,
factura BLOB,
fecha_alta TIME DEFAULT CURRENT_TIMESTAMP,
fecha_baja TIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (fk_clave_equipo) REFERENCES catalogo_equipo(clave_equipo),
FOREIGN KEY (fk_marca) REFERENCES marca(id_marca),
FOREIGN KEY (fk_componentes) REFERENCES componentes(id),
FOREIGN KEY (fk_estado_equipo) REFERENCES estado_equipo(id),
FOREIGN KEY (fk_SO) REFERENCES so(id),
FOREIGN KEY (fk_paqueteria) REFERENCES paqueteria(id)
);

CREATE TABLE tickets(
clave_ticket VARCHAR (20) PRIMARY KEY,
fk_clave_equipo VARCHAR(20),
asunto VARCHAR(70) NOT NULL,
fk_departamento INT UNSIGNED,
descripcion VARCHAR(500),
fk_clave_usuario VARCHAR(10),
fk_estatus INT UNSIGNED,
fecha_reporte TIME DEFAULT CURRENT_TIMESTAMP,
fk_clave_empleado VARCHAR(10),
fk_sucursal INT UNSIGNED,
documento BLOB,
solucion VARCHAR(500) ,
FOREIGN KEY (fk_clave_equipo) REFERENCES catalogo_equipo(clave_equipo),
FOREIGN KEY (fk_departamento) REFERENCES departamento(id),
FOREIGN KEY (fk_clave_usuario) REFERENCES usuario(clave_usuario),
FOREIGN KEY (fk_estatus) REFERENCES estatus_ticket(id_estatus),
FOREIGN KEY (fk_clave_empleado) REFERENCES usuario(clave_usuario),
FOREIGN KEY (fk_sucursal) REFERENCES sucursal(id)
);

CREATE TABLE detalle_tickets(
id_detalle INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fk_clave_ticket VARCHAR(20),
fk_clave_equipo VARCHAR(20),
fk_clave_usuario VARCHAR(10),
fk_clave_empleado VARCHAR(10),
fecha_inicio TIME DEFAULT CURRENT_TIMESTAMP,
fecha_fin TIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (fk_clave_equipo) REFERENCES catalogo_equipo(clave_equipo),
FOREIGN KEY (fk_clave_ticket) REFERENCES tickets(clave_ticket),
FOREIGN KEY (fk_clave_usuario) REFERENCES usuario(clave_usuario),
FOREIGN KEY (fk_clave_empleado) REFERENCES usuario(clave_usuario)
);

CREATE TABLE expediente(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fk_clave_ticket VARCHAR(20),
fk_clave_equipo VARCHAR (20),
fk_clave_usuario VARCHAR(10),
fk_clave_empleado VARCHAR(10),
tipo_mantenimiento VARCHAR(30),
dec_mantenimiento VARCHAR(100),
fecha_inicio TIME DEFAULT CURRENT_TIMESTAMP,
fecha_fin TIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (fk_clave_equipo) REFERENCES catalogo_equipo(clave_equipo),
FOREIGN KEY (fk_clave_ticket) REFERENCES tickets(clave_ticket),
FOREIGN KEY (fk_clave_usuario) REFERENCES usuario(clave_usuario),
FOREIGN KEY (fk_clave_empleado) REFERENCES usuario(clave_usuario)
);

CREATE TABLE asignaciones (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fk_clave_usuario VARCHAR(10),
fk_clave_equipo VARCHAR(20),
fecha_asignacion TIME DEFAULT CURRENT_TIMESTAMP,
fecha_devuelta TIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (fk_clave_equipo) REFERENCES catalogo_equipo(clave_equipo),
FOREIGN KEY (fk_clave_usuario) REFERENCES usuario(clave_usuario)
);

CREATE TABLE infraestructura(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fk_clave_equipo VARCHAR(20),
fk_clave_ticket VARCHAR(20),
fk_usuario1 VARCHAR(10),
contrasena1 VARCHAR(15),
nota1 VARCHAR(100),
fk_usuario2 VARCHAR(10),
contrasena2 VARCHAR(15),
nota2 VARCHAR(100),
fk_usuario3 VARCHAR(10),
contrasena3 VARCHAR(15),
nota3 VARCHAR(100),
IP1 VARCHAR(20),
IP2 VARCHAR(20),
FOREIGN KEY (fk_clave_equipo) REFERENCES catalogo_equipo(clave_equipo),
FOREIGN KEY (fk_clave_ticket) REFERENCES tickets(clave_ticket),
FOREIGN KEY (fk_usuario1) REFERENCES usuario(clave_usuario),
FOREIGN KEY (fk_usuario2) REFERENCES usuario(clave_usuario),
FOREIGN KEY (fk_usuario3) REFERENCES usuario(clave_usuario)
);