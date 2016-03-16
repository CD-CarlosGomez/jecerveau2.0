create database bd_ejemplo

create table cliente(
cod_cli int auto_increment,
nombre varchar(30),
apellidos varchar(30),
telefono varchar(12),
primary key(cod_cli));