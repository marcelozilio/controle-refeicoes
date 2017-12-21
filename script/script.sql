create database refeicoes;

use refeicoes;

create table instituicao(
	id int auto_increment,
	nome varchar(60) not null,
	endereco varchar(100) not null,
	email varchar(50) not null,
	telefone varchar(11) not null,
	primary key (id)
);

create table pessoa(
	id int auto_increment,
	idInstituicao int not null,
	nome varchar(60) not null,
	email varchar(50),
	celular varchar(11),
	primary key (id),
	foreign key (idInstituicao) references instituicao (id)
);

create table refeicao(
	id int auto_increment,	
	idInstituicao int not null,
	descricao varchar(100) not null,
	dataCadastro datetime not null,
	dataRefeicao datetime not null,
	imagem longtext not null,
	primary key (id),
	foreign key (idInstituicao) references instituicao(id)
);

create table foto(
	id int auto_increment,
	idRefeicao int not null,
	foto varchar(500) not null,
	nome varchar(60),
	primary key (id)
);