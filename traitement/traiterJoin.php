<?php

    session_start();
    include_once "../script/scriptAccesBdd.php";

    // on passe par des variables plus rapides à écrire...
    // $code = (int) $_REQUEST['code'];

    $code = isset($_REQUEST['code']) ? intval($_REQUEST['code']) : 0;
    // if (empty($_REQUEST['Code'])){
    //     header("location:accueil.php?msg=Code Invalide.");
    //     exit(); // header ne provoque pas l'arrêt du script
    // }

    rejoindrePartie($code);

    function rejoindrePartie($code){
        $partie = getPartieByCode($code);   
        if($partie == null){
            echo "<script type='text/javascript'>alert('Vous ne pouvez pas rejoindre cette partie (partie non existante)');window.location.href = '../page/accueil.php';</script>";
        }
        else if ($partie["joueur1"] == $_SESSION["userId"] || $partie["joueur2"] == $_SESSION["userId"] || $partie["joueur2"] == null){
            var_dump($code);
            //exit();
            //redirection automatique vers la page de jeu
            $_SESSION['idGame'] = $code;
            $partie["joueur2"] = $_SESSION['userId'];
            updatePartieViaItem($partie);
            header("location: ../page/jeu.php");
        }
        else{
            echo "<script type='text/javascript'>alert('Vous ne pouvez pas rejoindre cette partie (partie pleine)');window.location.href = '../page/accueil.php';</script>";
        }

    }

?>