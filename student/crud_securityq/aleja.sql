create database aleja;
use aleja;
create table document_type(cod_document varchar(3)primary key not null, desc_documento varchar(45) not null);
create table security_question(num_question int primary key not null, question varchar(45) not null);
create table user(id_user varchar(15) not null,first_name varchar(20) not null, second_name varchar(20) null, first_las_name varchar(20) not null, second_last_name varchar(20) null, address varchar(45) not null, phone int(15) not null,email varchar(45)not null,document_type_cod_document varchar(3) not null, security_question_num_question int not null);
alter table user add primary key(id_user,document_type_cod_document);
alter table user add constraint user_document_type foreign key(document_type_cod_document)references document_type(cod_document);
alter table user add constraint user_security_question foreign key(security_question_num_question)references security_question(num_question);
insert into document_type values("cc","cedula de ciudadania"),("ce","cedula de extrangeria"),("ti","tarjeta de identidad");
