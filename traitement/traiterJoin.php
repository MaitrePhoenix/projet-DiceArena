<?php

    session_start();
    //require_once "includes/inc_connexionBase.php";
    //require_once "../script/scriptAccesBdd.php";
    include_once "../script/scriptAccesBdd.php";
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

    // if (empty($_REQUEST['Code'])){
    //     header("location:accueil.php?msg=Code Invalide.");
    //     exit(); // header ne provoque pas l'arrêt du script
    // }


    // on passe par des variables plus rapides à écrire...
    // $code = (int) $_REQUEST['code'];

    $code = isset($_REQUEST['code']) ? intval($_REQUEST['code']) : 0;

    // var_dump($_REQUEST);
    //var_dump($code);
    //exit();

    // Vérifier si l'action est définie dans la requête POST
    //if(isset($_POST['action']) && !empty($_POST['action'])) {
        rejoindrePartie($code);
        //exit();
    //}

    function rejoindrePartie($code){
        $partie = getPartieByCode($code);
        if($partie == null){
            echo "<script type='text/javascript'>alert('Vous ne pouvez pas rejoindre cette partie (partie non existante)');</script>";
        }
        else if ($partie["joueur1"] == $_SESSION["userId"] || $partie["joueur2"] == $_SESSION["userId"] || $partie["joueur2"] == null){
            var_dump($code);
            //exit();
            //redirection automatique vers la page de jeu
            header("location: ../page/jeu.php");
            $_SESSION['idGame'] = $code;
        }
        else{
            echo "<script type='text/javascript'>alert('Vous ne pouvez pas rejoindre cette partie (partie pleine)');</script>";
        }

    }

?>