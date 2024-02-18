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
    $requete = $connexion->prepare("Select id, pseudo from joueur where id = :id");
    $requete->bindParam(':id', $id);
    $requete->execute();
    $result = $requete->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getJoueurForConnexion($pseudo, $mdp){
    global $connexion;
    $requete = $connexion->prepare("Select * from joueur where pseudo = :pseudo and mdp = :mdp");
    $requete->bindParam(':pseudo', $pseudo);
    $requete->bindParam(':mdp', $mdp);
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

function createPartie($plateauJ1, $plateauJ2, $tourJoueur, $currentDice, $joueur1){
    global $connexion;
    $requete = $connexion->prepare("Insert into partie (plateauJ1, plateauJ2, tourJoueur, currentDice, joueur1) values (:plateauJ1, :plateauJ2, :tourJoueur, :currentDice, :joueur1)");
    $requete->bindParam(':plateauJ1', $plateauJ1);
    $requete->bindParam(':plateauJ2', $plateauJ2);
    $requete->bindParam(':tourJoueur', $tourJoueur);
    $requete->bindParam(':currentDice', $currentDice);
    $requete->bindParam(':joueur1', $joueur1);
    $requete->execute();

    //retourne l'id de la partie
    $lastInsertId = $connexion->lastInsertId();
    return $lastInsertId;
}

function updatePartie($code, $plateauJ1, $plateauJ2, $tourJoueur, $currentDice, $joueur2){
    global $connexion;
    $requete = $connexion->prepare("Update partie set plateauJ1 = :plateauJ1, plateauJ2 = :plateauJ2, tourJoueur = :tourJoueur, currentDice = :currentDice, joueur2 = :joueur2 where code = :code");
    $requete->bindParam(':code', $code);
    $requete->bindParam(':plateauJ1', $plateauJ1);
    $requete->bindParam(':plateauJ2', $plateauJ2);
    $requete->bindParam(':tourJoueur', $tourJoueur);
    $requete->bindParam(':currentDice', $currentDice);
    $requete->bindParam(':joueur2', $joueur2);
    $requete->execute();
}

// function updatePartie($partie){
//     updatePartie($partie["code"], $partie["plateauJ1"], $partie["plateauJ2"], $partie["tourJoueur"], $partie["currentDice"], $partie["joueur2"]);
// }
