<?php
    //Version Hash
    session_start(); // "premiere instruction; pas de texte, ; entete de communication"
    
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

    //exit() //Pour voir vraiment ce qui est donner à mon formulaire, 
            // aide a donner les parametre à mes variables que je créer ici 
            //en gros on voit toutes les var partager

    //----------------------------------------------------------------------------------
    // Traitement des valeurs
    // Attention : choix de passer par $_REQUEST par facilité,
    //             pas nécessairement une bonne pratique    
    //----------------------------------------------------------------------------------


    // on passe par des variables plus rapides � �crire...
    $login = $_REQUEST['pseudo'];
    $pass  = $_REQUEST['mdp'];

    var_dump($_REQUEST);

    $text_request = "SELECT pseudo, mdp ";
    $text_request.= "FROM joueur ";
    $text_request.= "WHERE pseudo=:log;";

    $requete = $cnx->prepare($text_request);
    $requete ->bindParam(":log",$login);

    $requete->execute();

    $tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);

    //Partie debug
    //var_dump($tabRes);
    //exit();

    //Si on ne retourne pas une ligne -> il y a un soucis
    if(count($tabRes)!=1){
        $_SESSION["login"] = "";
        // $_SESSION["droits"] = "";
        header("location:connexion.php?erreur=2");//Modifier avec droits non existants
        exit();
    }

    //Si on arrive ici c'est que le login existe

    //$droits = $tabRes[0]["droits"];
    $passHash = $tabRes[0]["mdp"];
    //Est ce que le pass est correct ?
    if(password_verify($pass,$passHash)==false){
        die("Erreur L71");
    }

    //Placer en session : le login et les droits
    $_SESSION["pseudo"] = $login;
    //$_SESSION["droits"] = $droits;

    // if ($droits=="admin"){
    //     // rediriger vers la page d'admin
    //     header("location:pageAdmin.php");
    //     exit(); // header ne provoque pas l'arret du script
    // }
    // elseif ($droits=="etudiant"){
    //    // rediriger vers la page d'affichage du profil de l'etudiant
    //     header("location:pageProfil.php");//?nom=zoe
    //     exit(); // header ne provoque pas l'arret du script
    // }
    if (empty($login) || empty($pass)){
	// Pas re�ues, ou "vide" : on sort
    //if (empty($login) || empty($pass)){
        header("location:connexion.php?erreur=1");
        exit(); // header ne provoque pas l'arret du script
    //}
    }
    else 
    {
        header("location:accueil.php");//?nom=mael
        //exit(); // header ne provoque pas l'arret du script
    }
    

    // si pas connu : rediriger sur la page de co (connexion.php)
    header("location:connexion.php?erreur=1");