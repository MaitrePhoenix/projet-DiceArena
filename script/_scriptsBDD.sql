-- CREATION DES TABLES

drop table if exists partie;
drop table if exists joueur;

create table partie(
    code  INT primary key AUTO_INCREMENT,
    plateauJ1 varchar(50),
    plateauJ2 varchar(50),
    tourJoueur int,
    currentDice int,
    joueur1 int not null references joueur(id),
    joueur2 int references joueur(id)
);

create table joueur(
    id INT PRIMARY KEY AUTO_INCREMENT,
    pseudo varchar(25) not null,
    mdp varchar(150) not null
);

-- INSERTION DES DONNEES (pour les test en dev tant que la partie creation ne fonctionne pas)
insert into joueur (pseudo, mdp,id) 
   values ('mael',  '$2y$10$IkC2R01e3vXxAcKrR82Q8e0E4N1YH.hC9/Z5azjiGXLm32JRfWe/O',1),
          ('max',   '$2y$10$6l/wqt3rANsHT6chPewrNeNNr4t6cdNEgRfe06jhII2dn2o7NEixG',2);

insert into partie (code, joueur1, joueur2)
    values ('1', 1, 2),
           ('2', 1, null );

