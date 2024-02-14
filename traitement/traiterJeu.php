<?php
//contient toute les fonctions servant au fonctionnement du jeu

include_once "../script/scriptAccesBdd.php";

$codePartie = Null;

function creerTableauVide(){
    return [
        [0,0,0],
        [0,0,0],
        [0,0,0]
    ];
}

function poserDes($numColonne){
    global $codePartie;
    $partie = getPartieByCode($codePartie);
    $de = $partie["currentDice"];
    $plateauJ1 = $partie["plateauJ1"];
    $plateauJ2 = $partie["plateauJ2"];
}