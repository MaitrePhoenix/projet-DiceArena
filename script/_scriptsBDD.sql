-- CREATION DES TABLES

drop table if exists partie;
drop table if exists joueur;

create table partie(
    code  varchar(50) primary key,
    plateau varchar(10000) not null
);

create table joueur(
    id varchar(50) primary key,
    pseudo varchar(25) not null,
    score int default(0),
    partie varchar(50) references partie(code)
);