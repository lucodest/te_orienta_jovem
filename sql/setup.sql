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

create table simulado(
id int unsigned auto_increment not null,
cod_prof_fk int unsigned not null,
nome varchar(50) not null,
descricao varchar(250) not null,
foreign key(cod_prof_fk) references professor(cod_professor),
primary key(id)
);

create table quest_sim(
id int unsigned auto_increment not null,
sim_id int unsigned not null,
pergunta varchar(250) not null,
opt1 varchar(150),
opt2 varchar(150),
opt3 varchar(150),
opt4 varchar(150),
opt5 varchar(150),
primary key(id),
foreign key(sim_id) references simulado(id)
);