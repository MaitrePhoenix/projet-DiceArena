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
    $mdp_hash = password_hash($mdp,PASSWORD_DEFAULT);
    
    $requete = $connexion->prepare("Select * from joueur where pseudo = :pseudo and mdp = :mdp");
    $requete->bindParam(':pseudo', $pseudo);
    $requete->bindParam(':mdp', $mdp);
    $requete->execute();
    $result = $requete->fetch(PDO::FETCH_ASSOC);
    return $result.id;

    var_dump('Le result est'.$result);
    //exit();
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
    $mdp_hash = password_hash($mdp,PASSWORD_DEFAULT);

    $requete = $connexion->prepare("Insert into joueur (pseudo, mdp) values (:pseudo, :mdp)");
    $requete->bindParam(':pseudo', $pseudo);
    $requete->bindParam(':mdp', $mdp_hash);
    $requete->execute();

    //retourne l'id du joueur
    $lastInsertId = $connexion->lastInsertId();
    return $lastInsertId;
}

function createPartie($plateauJ1, $plateauJ2, $tourJoueur, $currentDice, $joueur1){
    global $connexion;

    $plateau1 = json_encode($plateauJ1);
    $plateau2 = json_encode($plateauJ2);
    $requete = $connexion->prepare("Insert into partie (plateauJ1, plateauJ2, tourJoueur, currentDice, joueur1) values (:plateauJ1, :plateauJ2, :tourJoueur, :currentDice, :joueur1)");
    $requete->bindParam(':plateauJ1',$plateau1 );
    $requete->bindParam(':plateauJ2', $plateau2);
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

    $plateau1 = json_encode($plateauJ1);
    $plateau2 = json_encode($plateauJ2);
    $requete = $connexion->prepare("Update partie set plateauJ1 = :plateauJ1, plateauJ2 = :plateauJ2, tourJoueur = :tourJoueur, currentDice = :currentDice, joueur2 = :joueur2 where code = :code");
    $requete->bindParam(':code', $code);
    $requete->bindParam(':plateauJ1', $plateau1 );
    $requete->bindParam(':plateauJ2', $plateau2);
    $requete->bindParam(':tourJoueur', $tourJoueur);
    $requete->bindParam(':currentDice', $currentDice);
    $requete->bindParam(':joueur2', $joueur2);
    $requete->execute();
}

function shouldIPlay($joueurId): bool 
{
    $partyID = $_SESSION['idGame'];
    $partie = getPartieByCode($partyID);
    $idPlayerTour = ($partie["tourJoueur"] == 1) ? $partie["joueur1"] : $partie["joueur2"];
    return $joueurId == $idPlayerTour; 

}

//prend en paramètre "player" si c'est le plateau du joueur ou 
//"opponent" si c'est le plateau de l'adversaire que l'on veut
function getPlateauOfPlayerOrOpponent($joueur){
    $userId = $_SESSION['userId'];
    $partyID = $_SESSION['idGame'];
    $partie = getPartieByCode($partyID);

    if($joueur == "player"){
        //met dans la variable le plateau du joueur
        $plateau = json_decode($partie["joueur1"] == $userId ? $partie["plateauJ1"] : $partie["plateauJ2"]);
    }
    //si $joueur = "opponent"
    else {
        //met dans la variable le plateau de l'adversaire
        $plateau = json_decode($partie["joueur1"] == $userId ? $partie["plateauJ2"] : $partie["plateauJ1"]);
    }

    return $plateau;
}