create database te_orienta_joven;
use te_orienta_joven;

create table Usuario(
id int unsigned auto_increment not null,
username varchar(50) unique not null,
pass varchar(40) not null,
telefone char(11) not null,
email varchar(100) not null,
primary key(id)
);

select * from Usuario;