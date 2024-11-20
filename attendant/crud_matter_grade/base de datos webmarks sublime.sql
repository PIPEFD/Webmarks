create database webmarks;
use webmarks;
create table document_type(cod_document varchar(3)primary key not null,desc_document varchar(45)not null);
create table role(cod_role varchar(5)primary key not null,desc_role varchar(45)not null);
create table kindship(id_kindship varchar(5)primary key not null,desc_kindship varchar(45)not null);
create table grade(desc_grade int primary key not null, state_grade int not null);
create table security_question(num_question int primary key not null,question varchar(45)not null);

create table user(id_user varchar(15)not null,first_name varchar(20)not null,second_name varchar(20)null,first_last_name varchar(20)not null,second_last_name varchar(20)null,address varchar(45)not null,phone int(15)not null,e_mail varchar(45)not null,document_type_cod_document_user varchar(3)not null,security_question_num_question int not null);
create table matter(name_matter int primary key not null,state_matter int not null,teacher_user_id_user varchar(15) not null,teacher_user_document_type_cod_document varchar(3)not null);
create table assistance(cod_assistance int primary key not null,date_assistance datetime not null,student_user_id_user varchar(15) not null,student_user_document_type_cod_document varchar(3)not null,matter_has_grade_matter_name_matter int not null,matter_has_grade_grade_desc_grade int not null);

create table user_has_role(user_id_user_role varchar(15)not null,user_document_type_cod_document_user_has_role varchar(3)not null,role_cod_role varchar(5)not null);
create table attendant(kindship_id_kindship varchar(5)not null,user_id_user_attendant varchar (15) not null,user_document_type_cod_document varchar(3) not null);
create table teacher(user_id_user_teacher varchar(15)not null,user_document_type_cod_document_teacher varchar(3)not null);
create table matter_has_grade(matter_name_matter int not null, grade_desc_grade int not null);
create table student(user_id_user_student varchar(15)not null,user_document_type_cod_document_student varchar(3)not null,attendant_user_id_user varchar(15) not null,attendant_user_document_type_cod_document varchar(3) not null ,grade_desc_grade_student int not null);

alter table user add primary key (id_user,document_type_cod_document_user);
alter table user add constraint user_document_type foreign key (document_type_cod_document_user)references document_type(cod_document)on update cascade on delete cascade;
alter table user add constraint user_security_question foreign key(security_question_num_question)references security_question(num_question)on update cascade on delete cascade;

alter table teacher add primary key(user_id_user_teacher,user_document_type_cod_document_teacher);
alter table teacher add constraint teacher_user foreign key(user_id_user_teacher,user_document_type_cod_document_teacher)references user(id_user,document_type_cod_document_user)on update cascade on delete cascade;


alter table matter add constraint matter_teacher foreign key(teacher_user_id_user,teacher_user_document_type_cod_document)references teacher(user_id_user_teacher,user_document_type_cod_document_teacher)on update cascade on delete cascade;

alter table matter_has_grade add primary key (matter_name_matter,grade_desc_grade);
alter table matter_has_grade add constraint matter_has_grade_matter foreign key(matter_name_matter)references matter(name_matter)on update cascade on delete cascade;
alter table matter_has_grade add constraint matter_has_grade_grade foreign key(grade_desc_grade)references grade(desc_grade)on update cascade on delete cascade;

alter table attendant add primary key (user_id_user_attendant,user_document_type_cod_document);
alter table attendant add constraint attendant_user foreign key(user_id_user_attendant,user_document_type_cod_document)references user(id_user,document_type_cod_document_user)on update cascade on delete cascade;
alter table attendant add constraint attendant_kindship foreign key(kindship_id_kindship)references kindship(id_kindship)on update cascade on delete cascade;

alter table student add primary key(user_id_user_student,user_document_type_cod_document_student);
alter table student add constraint student_user foreign key(user_id_user_student,user_document_type_cod_document_student)references user(id_user,document_type_cod_document_user)on update cascade on delete cascade;
alter table student add constraint student_attendant foreign key(attendant_user_id_user,attendant_user_document_type_cod_document)references attendant(user_id_user_attendant,user_document_type_cod_document)on update cascade on delete cascade;
alter table student add constraint student_grade foreign key(grade_desc_grade_student)references grade(desc_grade)on update cascade on delete cascade;

alter table assistance add constraint assistance_student foreign key(student_user_id_user,student_user_document_type_cod_document)references student(user_id_user_student,user_document_type_cod_document_student)on update cascade on delete cascade;
alter table assistance add constraint assistance_matter_has_grade foreign key(matter_has_grade_matter_name_matter,matter_has_grade_grade_desc_grade)references matter_has_grade(matter_name_matter,grade_desc_grade)on update cascade on delete cascade;

alter table user_has_role add primary key(user_id_user_role,user_document_type_cod_document_user_has_role,role_cod_role);
alter table user_has_role add constraint user_has_role_user foreign key(user_id_user_role,user_document_type_cod_document_user_has_role)references user(id_user,document_type_cod_document_user)on update cascade on delete cascade;
alter table user_has_role add constraint user_has_role_role foreign key(role_cod_role)references role(cod_role)on update cascade on delete cascade;
