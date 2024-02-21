<?php
    session_start();
    // A ajouter au fur et à mesure

    require_once "../script/scriptAccesBdd.php";
    
    //----------------------------------------
    // Un peu de tracage des valeurs recues
    //----------------------------------------

    echo '$_REQUEST : ';
    var_dump($_REQUEST);
    echo "<br>";

    echo '$_SERVER[\"REQUEST_METHOD\"] : ';
    var_dump($_SERVER['REQUEST_METHOD']);
    echo "<br>";

    echo '$_GET : ';
    var_dump($_GET);
    echo "<br>";

    echo '$_POST : ';
    var_dump($_POST);
    echo "<br>";
    
    //----------------------------------------
    if (empty($_REQUEST['new-pseudo']) || empty($_REQUEST['new-mdp'])){
        header("location:connexion.php?msg=Tous les champs sont obligatoires.");
        exit(); // header ne provoque pas l'arrêt du script
    }

    // on passe par des variables plus rapides à écrire...
    $pseudo = $_REQUEST['new-pseudo'];
    $mdp  = $_REQUEST['new-mdp'];

    var_dump($_REQUEST);

    $idJoueur = createJoueur($pseudo, $mdp);
    //var_dump($createJoueur);
    
    $_SESSION["pseudo"] = $pseudo;
    $_SESSION["userId"] = $$idJoueur;
    
    header("location: ../page/connexion.php");

?>