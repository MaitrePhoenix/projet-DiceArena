-- CREATION DES TABLES

drop table if exists partie;
drop table if exists joueur;

create table partie(
    code  varchar(50) primary key,
    plateauj1 varchar(50),
    plateauj2 varchar(50),
    tourJoueur int,
    lastDice int,
    joueur1 int not null references joueur(id),
    joueur2 int references joueur(id)
);

create table joueur(
    id int primary key,
    pseudo varchar(25) not null,
    mdp varchar(25) not null
);