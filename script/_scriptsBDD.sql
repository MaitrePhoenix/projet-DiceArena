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
    login varchar(25) not null,
    pass varchar(25) not null
);

-- INSERTION DES DONNEES (pour les test en dev tant que la partie creation ne fonctionne pas)
insert into joueur  (login, pass,id) 
   values ('mael',  'ZeBoss',1),
          ('max',   'li3-mil',2);

insert into partie (code, joueur1, joueur2)
    values ('1', 1, 2),
           ('2', 1, null );

