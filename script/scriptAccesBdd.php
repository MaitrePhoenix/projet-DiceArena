<?php

$cnx=null;
try{
    //Ne pas taper le port de l'hote 127.0.0.0
    //git ignor
    $connexion = new PDO("mysql:host=localhost;dbname=DiceArena","dicearena","tropSimpl3");
}catch (PDOException $e){// $e est une exception PDO
    echo $e->getMessage();
}

function getJoueurById($id){
    global $connexion;
    $requete = $connexion->prepare("Select * from joueur where id = :id");
    $requete->bindParam(':id', $id);
    $requete->execute();
    $result = $requete->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getPartieByCode($code){
    global $connexion;
    $requete = $connexion->prepare("Select * from partie where code = :code");
    $requete->bindParam(':code', $code);
    $requete->execute();
    $result = $requete->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function createJoueur($pseudo, $mdp){
    global $connexion;
    $requete = $connexion->prepare("Insert into joueur (pseudo, mdp) values (:pseudo, :mdp)");
    $requete->bindParam(':pseudo', $pseudo);
    $requete->bindParam(':mdp', $mdp);
    $requete->execute();
}

function createPartie($plateauj1, $plateauj2, $tourJoueur, $joueur1){
    global $connexion;
    $requete = $connexion->prepare("Insert into partie (plateauj1, plateauj2, tourJoueur, joueur1) values (:plateauj1, :plateauj2, :tourJoueur, :joueur1)");
    $requete->bindParam(':plateauj1', $plateauj1);
    $requete->bindParam(':plateauj2', $plateauj2);
    $requete->bindParam(':tourJoueur', $tourJoueur);
    $requete->bindParam(':joueur1', $joueur1);
    $requete->execute();
}

function updatePartie($code, $plateauj1, $plateauj2, $tourJoueur, $lastDice, $joueur2){
    global $connexion;
    $requete = $connexion->prepare("Update partie set plateauj1 = :plateauj1, plateauj2 = :plateauj2, tourJoueur = :tourJoueur, lastDice = :lastDice, joueur2 = :joueur2 where code = :code");
    $requete->bindParam(':code', $code);
    $requete->bindParam(':plateauj1', $plateauj1);
    $requete->bindParam(':plateauj2', $plateauj2);
    $requete->bindParam(':tourJoueur', $tourJoueur);
    $requete->bindParam(':joueur2', $joueur2);
    $requete->execute();
}