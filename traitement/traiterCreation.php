<?php
 session_start();
//On souhaite gérer toute les actions lors de la création
// - generation du code (5 caracteres Unicode aleatoire)
// - ajout en base avec le pseudo de la personne ainsi que l'ID
// - rafraichir la page avec le code generer

// A ajouter au fur et à mesure
    include_once('../traitement/traiterJeu.php');

    if(isset($_POST['action']) && !empty($_POST['action'])) {
        // Exécute la fonction appropriée selon la valeur de l'action
        // if($_POST['action'] == 'maFonction') {
        //     maFonction();
        // }
        creerEtDirigerVersPartie();
    }

    function creerEtDirigerVersPartie(){
        $idUtilisateur = $_SESSION["userId"];

        $idPartie = creerPartie($idUtilisateur);
        $_SESSION['idGame'] = $idPartie;

        //redirection automatique vers la page de jeu
        header("location: ../page/jeu.php");
        
    }
   
?>