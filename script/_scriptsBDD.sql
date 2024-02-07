-- CREATION DES TABLES

drop table if exists partie;
drop table if exists joueur;

create table partie(
    code  INT primary key AUTO_INCREMENT,
    plateauj1 varchar(50),
    plateauj2 varchar(50),
    tourJoueur int,
    lastDice int,
    joueur1 int not null references joueur(id),
    joueur2 int references joueur(id)
);

create table joueur(
    id INT PRIMARY KEY AUTO_INCREMENT,
    pseudo varchar(25) not null,
    mdp varchar(25) not null
);