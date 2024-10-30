-- criando banco de dados
create database dbTCC;
 
-- acessando banco de dados;
use dbTCC;
 
-- criando as tabelas
create table tbAlunos(
codAluno int not null auto_increment,
rmAluno char(5) not null,
nomeAluno varchar (100) not null,
email varchar (100) not null,
senha varchar(10) not null,
modulo char (1) not null,
primary key(codAluno));
 

create table tbProdutos(
codProd int not null auto_increment,
nomeProd varchar(100) not null,
quant decimal(9,2) not null,
quantEstoque decimal(9,2) not null,
mult decimal (9,2) not null,
valorProd decimal(9,2) not null,
validade date not null,
dataEntrada date not null,
descricao varchar(100),
primary key(codProd));

create table tbPratos(
codPrato int not null auto_increment,
nomePrato varchar(100) not null,
precoPrato decimal (9,2),
pesoPrato decimal(9,2),
codProd int not null,
primary key(codPrato),
foreign key(codProd)references tbProdutos(codProd));

create table tbCardapio(
codCardapio int not null auto_increment,
semana date,
nomePrato varchar(100) not null,
nomeProduto varchar(100) not null,
precoPrato decimal(9,2),
codAluno int not null,
codProf int not null,
codPrato int not null,
primary key(codCardapio),
foreign key(codAluno) references tbAlunos(codAluno),
foreign key(codPrato) references tbPratos(codPrato));


INSERT INTO `tbAlunos` (`codAluno`,`rmAluno`, `nomeAluno`, `email`, `senha`, `modulo`)
VALUES (1, 23548, 'Maria Luísa Reis', 'marialuisarocha@gmail.com', 123456, 3);


