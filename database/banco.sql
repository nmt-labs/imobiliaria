create database imobiliaria;
use imobiliaria;
create table imovel(
  	id_imovel int primary key auto_increment,
    uf char(2) not null,
    cidade varchar(50) not null,
    bairro varchar(20) not null,
  	logradouro varchar(100) not null,
  	numero varchar(10) not null default "SN",
  	complemento varchar(50),
  	cep char(7) not null,
  	aluguel decimal(7,2) not null,
  	proprietario varchar(100) not null  
);
create table inquilino(
	  id_inquilino int primary key auto_increment,
    nome varchar(100) not null,
    cpf char(11) not null,
    telefone char(11) not null,
    data_nascimento date not null,
    imovel int,
    foreign key (imovel) references imovel(id_imovel) on delete set null on update cascade
);