<?php
//contient toute les fonctions servant au fonctionnement du jeu

include_once "../script/scriptAccesBdd.php";

function creerTableauVide(){
    return [
        [0,0,0],
        [0,0,0],
        [0,0,0]
    ];
}

function creerPartie($joueur1){
    $plateauJ1 = creerTableauVide();
    $plateauJ2 = creerTableauVide();
    $tourJoueur = rand(1,2);
    $currentDice = rand(1,6);
    $joueur2 = 0;

    //crée la partie et en retourne l'id
    return createPartie($plateauJ1, $plateauJ2, $tourJoueur, $currentDice, $joueur1);
}


//fonction appelé lorsqu'un joueur pose un dé, l'ajoute sur son plateau et enlève les dés adverses
function poserDes($numColonne){
    $codePartie = $_SESSION["idGame"];
    $partie = getPartieByCode($codePartie);
    $de = $partie["currentDice"];

    $plateauPrincipal = json_decode($partie["tourJoueur"] == 1 ? $partie["plateauJ1"] : $partie["plateauJ2"]);
    $plateauAdversaire = json_decode($partie["tourJoueur"] == 1 ? $partie["plateauJ2"] : $partie["plateauJ1"]);

    for($i = 0; $i < 3; $i++){
        if($plateauPrincipal[$numColonne][$i] == 0){
            $plateauPrincipal[$numColonne][$i] = $de;
            break;
        }
    }

    for($i = 0; $i < 3; $i++){
        if($plateauAdversaire[$numColonne][$i] == $de){
            for ($j = $i; $j < 2; $j++){
                $plateauAdversaire[$numColonne][$j] = $plateauAdversaire[$numColonne][$j+1];
            }
            $plateauAdversaire[$numColonne][2] = 0;
            $i--;
        }
    }


    // Mettre à jour les plateaux dans la variable $partie
    if($partie["tourJoueur"] == 1){
        $partie["plateauJ1"] = $plateauPrincipal;
        $partie["plateauJ2"] = $plateauAdversaire;
    } else {
        $partie["plateauJ1"] = $plateauAdversaire;
        $partie["plateauJ2"] = $plateauPrincipal;
    }

    //Anciennement
    //$partie["plateauJ1"] = $partie["tourJoueur"] == 1 ? $plateauPrincipal : $plateauAdversaire;
    //$partie["plateauJ2"] = $partie["tourJoueur"] == 1 ? $plateauAdversaire : $plateauPrincipal;

    changerTour();
}

function changerTour(){
    $codePartie = $_SESSION["idGame"];
    $partie = getPartieByCode($codePartie);
    $partie["currentDice"] = rand(1,6);
    $partie["tourJoueur"] = $partie["tourJoueur"] == 1 ? 2 : 1;
    updatePartie($partie);
}

//retourne le score du plateau passé en paramètre, le score est égal à la somme des dés présents sur le plateau, si sur la colonne il y a 3 dés identiques, le score est multiplié par 4, si il y en a 2 identiques, le score est multiplié par 2
function getScore($plateau){
    $score = 0;
    for($i = 0; $i < 3; $i++){
        $deDejaVu = [0,0];
        for($j = 0; $j < 3; $j++){
            $de = $plateau[$i][$j];
            if($de != 0){
                if ($deDejaVu[0] == $de && $deDejaVu[1] == $de){
                    $score += $de*4;
                }
                else if ($deDejaVu[0] == $de || $deDejaVu[1] == $de){
                    $score += $de*2;
                }
                else{
                    $score += $de;
                }
            }
        }
    }
    return $score;
}

//retourne 1 ou 2 en fonction du vainqueur et 0 s'il n'y a pas de vainqueur
function getVainqueur(){
    $codePartie = $_SESSION["idGame"];
    $partie = getPartieByCode($codePartie);
    $plateauJ1 = json_decode($partie["plateauJ1"]);
    $plateauJ2 = json_decode($partie["plateauJ2"]);
    $scoreJ1 = getScore($plateauJ1);
    $scoreJ2 = getScore($plateauJ2);

    $pJ1Rempli = true;
    $pJ2Rempli = true;

    for($i = 0; $i < 3; $i++){
        for($j = 0; $j < 3; $j++){
            if($plateauJ1[$i][$j] == 0){
                $pJ1Rempli = false;
            }
            if($plateauJ2[$i][$j] == 0){
                $pJ2Rempli = false;
            }
        }
    }
    
    if($pJ1Rempli || $pJ2Rempli){
        if($scoreJ1 > $scoreJ2){
            return 1;
        }
        else if($scoreJ1 < $scoreJ2){
            return 2;
        }
        else{
            return $pJ1Rempli ? 1 : 2;
        }
    }
    return 0;
}