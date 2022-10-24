create database cadastro_professores;
use cadastro_professores;

create table professor(
cod_professor int unsigned auto_increment primary key not null,
nome varchar(80) not null,
cpf char(11) not null,
formacao varchar(100) not null,
email varchar(100) not null,
telefone char(10) not null,
senha char(25) not null,
valor double(9,2) not null,
foto varchar(150)
);

select * from professor;

drop table professor;