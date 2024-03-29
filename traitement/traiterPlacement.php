<?php
    //Version Hash
    //session_start(); // "premiere instruction; pas de texte, ; entete de communication"

    include_once('../traitement/traiterJeu.php');
    include_once "../traitement/traiterAffichageJeu.php";

    if(isset($_POST['actionInsertion']) && !empty($_POST['actionInsertion'])) {
        
        // Récupérer la valeur du bouton associé au input qui pour name actionInsertion
        $valeur = $_POST['actionInsertion'];

        // Vérifier si la valeur contient une virgule
        if(strpos($valeur, ',') !== false) {
            // Diviser la chaîne en utilisant la virgule comme délimiteur
            $valeurs_separees = explode(',', $valeur);

            // Stocker chaque partie séparée dans une variable distincte
            $valueColumn = (int) $valeurs_separees[0];
            $codePartie = $valeurs_separees[1];

            // Utiliser les valeurs séparées comme nécessaire
            // echo "Première partie : " . $valueColumn . "<br>";
            // echo "Deuxième partie : " . $codePartie . "<br>";
        }

        actionDeJeu($valueColumn,$codePartie);

        //redirection automatique vers la page de jeu
        header("location: ../page/jeu.php");
    }

    
    function actionDeJeu ($valueColumn,$codePartie){
        poserDes($valueColumn,$codePartie);
        //redirection automatique vers la page de jeu
        //header("location: ../page/jeu.php");
    }

?>