create database sistema_escolar2a2;
use sistema_escolar2a2;

-- Matricula / Nome / Sexo / Email / Endereço Completo / Telefone / Senha
create table alunos(
matricula int unsigned auto_increment not null primary key,
nome varchar (80) not null,
sexo varchar (15) not null,
email varchar (100) not null,
endereco varchar (150) not null,
telefone char (15) not null,
senha varchar (150) not null
);

drop table alunos;

select * from alunos;
insert into alunos values('21801444', 'uTrash','Masculino','bielgabibiel@cotemig.com.br', 'Rua Outono, 72', '98226-9992','123456');
insert into alunos values('21800499', 'Pretao','Indefido','pretao@cotemig.com.br', 'Rua Helio Lazzarotti, 234', '981202939','123456');

create table professor(
numero int unsigned auto_increment not null primary key,
nome varchar (80) not null,
sexo varchar (15) not null,
email varchar (100) not null,
endereco varchar (150) not null,
materia varchar (150) not null,
telefone char (15) not null,
senha varchar (150) not null
);

drop table professor;

select * from professor;
insert into professor values(null, 'Gabriel','Masculino','bielgabibiel@cotemig.com.br', 'Rua Outono, 72', 'Matemática', '98226-9992','123456');

create table funcionario(
numero int unsigned auto_increment not null primary key,
nome varchar (80) not null,
sexo varchar (15) not null,
email varchar (100) not null,
endereco varchar (150) not null,
setor varchar (150) not null,
telefone char (15) not null,
senha varchar (150) not null
);

drop table funcionario;

select * from funcionario;
insert into funcionario values(null, 'Gabriel','Masculino','bielgabibiel@cotemig.com.br', 'Rua Outono, 72', 'Professor', '98226-9992','123456');

create table disciplina(
numero int unsigned auto_increment not null primary key,
nome varchar (80) not null,
conteudo varchar (150) not null,
turma varchar (100) not null,
curso varchar (150) not null
);

drop table disciplina;

select * from disciplina;
insert into disciplina values(null, 'Matemática','Matriz','2A2', 'Informática');

create table Curso(
codigo int unsigned auto_increment not null primary key,
nome varchar (80) not null,
serie varchar (150) not null
);

drop table Curso;

select * from Curso;
insert into Curso values(null, 'Matemática', '1ª Série');

