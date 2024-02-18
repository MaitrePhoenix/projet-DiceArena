<?php

//On souhaite gérer toute les actions lors de la création
// - generation du code (5 caracteres Unicode aleatoire)
// - ajout en base avec le pseudo de la personne ainsi que l'ID
// - rafraichir la page avec le code generer

// A ajouter au fur et à mesure
    include_once('traiterJeu.php');

    if(isset($_POST['action']) && !empty($_POST['action'])) {
        // Exécute la fonction appropriée selon la valeur de l'action
        if($_POST['action'] == 'maFonction') {
            maFonction();
        }
    }

    function creerEtDirigerVersPartie(){
        $idUtilisateur = $_SESSION["idUser"];

        $idPartie = creerPartie($idUtilisateur);

        //ajouter la redirection automatique
    }

?>