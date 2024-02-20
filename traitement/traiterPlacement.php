<?php
    //Version Hash
    //session_start(); // "premiere instruction; pas de texte, ; entete de communication"

    include_once('../traitement/traiterJeu.php');



    if(isset($_REQUEST['actionInsertion']) && !empty($_REQUEST['actionInsertion'])) {
        
        $valueColumn = $_GET['actionInsertion'];
        
        actionDeJeu($valueColumn);
        
    } else{
        var_dump($valueColumn);
        
    }

    
    function actionDeJeu ($numColonne){
        poserDes($numColonne);
        //redirection automatique vers la page de jeu
        header("location: ../page/jeu.php");
    }

?>