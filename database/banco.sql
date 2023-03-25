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

insert into imovel(uf, cidade, bairro, logradouro, numero, complemento, cep, aluguel, proprietario) values 
('MG', 'Belo Horizonte', 'Savassi', 'Rua Cláudio Manoel', '1162', 'Apto. 1102', '30140100', 400.00, 'João da Silva'),
('MG', 'Belo Horizonte', 'Rio Branco', 'Rua Augusto dos Anjos', '755', '', '31535000', 250.00, 'Maria Souza');

insert into inquilino(nome, cpf, telefone, data_nascimento, imovel) values 
('Ana das Graças', '13924862621', '31932938118', '2000-01-25', 1),
('Bruna Mendes', '52285504616', '3192621-3187', '1998-03-10', 1);