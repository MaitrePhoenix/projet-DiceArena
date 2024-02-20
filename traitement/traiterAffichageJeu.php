<?php

include_once "../script/scriptAccesBdd.php";

//prend en paramètre "player" si c'est le plateau du joueur ou 
//"opponent" si c'est le plateau de l'adversaire à afficher
function genererPlateauHTML($joueur){
    $idGame = $_SESSION['idGame'];
    $userId = $_SESSION['userId'];
    $partie = getPartieByCode($idGame);
    if($joueur == "player"){
        //met dans la variable le plateau du joueur
        $plateau = json_decode($partie["joueur1"] == $userId ? $partie["plateauJ1"] : $partie["plateauJ2"]);
    }
    //si $joueur = "opponent"
    else {
        //met dans la variable le plateau de l'adversaire
        $plateau = json_decode($partie["joueur2"] == $userId ? $partie["plateauJ2"] : $partie["plateauJ1"]);
    }   
    $plateau = inverserTableau($plateau);

    echo("<table style=\"border-collapse: collapse; width: 100%;table-layout: fixed;\">");
        affichageBoutons($plateau);
        for($i = 0; $i < count($plateau); $i++){
            echo("<tr>");
            for($j = 0; $j < count($plateau[$i]); $j++){
                echo("<th style=\"border: 1px solid black; background-color: #f2f2f2; padding: 8px; text-align: left;\"> <div style=\"min-height: 30px;text-align:center;\">". ($plateau[$i][$j] != 0 ? $plateau[$i][$j] : ""). "</div></td>");
            }
            echo("</tr>");
        }
    echo("</table>");
}

function affichageBoutons($plateau){
    $idGame = $_SESSION['idGame'];
    $userId = $_SESSION['userId'];
    $partie = getPartieByCode($idGame);
    //id du player donc c'est el tours
    if(shouldIPlay($userId)){
        echo("<tr>");
        for($i = 0; $i < count($plateau[1]); $i++){
            echo("<th style=\"padding: 8px; text-align: left;\"> <div style=\"min-height: 30px;text-align:center;\">". 'bouton'. "</div></td>");
        }
        echo("</tr>");
    }
}

function inverserTableau($tableau) {
    $tableauInverse = array();
    foreach ($tableau as $ligne => $colonnes) {
        foreach ($colonnes as $colonne => $valeur) {
            $tableauInverse[$colonne][$ligne] = $valeur;
        }
    }
    return $tableauInverse;
}