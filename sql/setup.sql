create database te_orienta_joven;
use te_orienta_joven;

create table usuario(
id int unsigned auto_increment not null,
username varchar(50) unique not null,
pass varchar(40) not null,
telefone varchar(17) not null,
email varchar(100) not null,
primary key(id)
);

create table professor(
cod_professor int unsigned auto_increment primary key not null,
nome varchar(80) not null,
cpf varchar(15) not null,
formac varchar(100) not null,
email varchar(100) not null,
tel varchar(17) not null,
pass varchar(25) not null,
valor double(9,2) not null,
foto varchar(150) null
);
