<?php

include_once "../script/scriptAccesBdd.php";
include_once "../traitement/traiterJeu.php";
include_once "../traitement/traiterPlacement.php";

//prend en paramètre "player" si c'est le plateau du joueur ou 
//"opponent" si c'est le plateau de l'adversaire à afficher
function genererPlateauHTML($joueur){
    
    $plateau = inverserTableau(getPlateauOfPlayerOrOpponent($joueur));

    echo("<table style=\"border-collapse: collapse; width: 100%;table-layout: fixed;\">");
        if($joueur=="player"){
            affichageBoutons($plateau);
        }
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

    //affiche les boutons si la partie n'a pas de vainqueur et si c'est le tour du joueur
    if(getVainqueur() == 0 && shouldIPlay($userId)){
        echo("<tr>");
        for($i = 1; $i <= count($plateau[1]); $i++){
            echo('<th style="padding: 8px; text-align: left;"> <div style="min-height: 30px;text-align:center;"> <form id="placement-form" action="../traitement/traiterPlacement.php" method="post"><input type="hidden" name="actionInsertion" value="'.$i.','.$idGame.'"><button type="submit" id="btnInsert" class="btn btn-warning">Inserer colonne '.$i.'</button></form> </div></td>');
        }
        echo("</tr>");
    }
}

//inverse les lignes et les colonnes
function inverserTableau($tableau) {
    $tableauInverse = array();
    foreach ($tableau as $ligne => $colonnes) {
        foreach ($colonnes as $colonne => $valeur) {
            $tableauInverse[$colonne][$ligne] = $valeur;
        }
    }
    return $tableauInverse;
}