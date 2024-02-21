<?php
    //Version Hash
    session_start(); // "premiere instruction; pas de texte, ; entete de communication"
    
    //include ('../script/scriptAccesBdd.php');
    require_once "../includes/inc_connexionBase.php";


    // Récupérer les données du formulaire
    // Pas reçues, ou "vide" : on sort
    if (empty($_REQUEST['pseudo']) || empty($_REQUEST['mdp'])){
        header("location:connexion.php?msg=Tous les champs sont obligatoires.");
        exit(); // header ne provoque pas l'arrêt du script
    }

    //----------------------------------------------------------------------------------
    // Traitement des valeurs
    // Attention : choix de passer par $_REQUEST par facilité,
    //             pas nécessairement une bonne pratique    
    //----------------------------------------------------------------------------------


    // on passe par des variables plus rapides à écrire...
    $pseudo = $_REQUEST['pseudo'];
    $mdp  = $_REQUEST['mdp'];

    var_dump($_REQUEST);

    // Vérifier si login/pass du formulaire existent dans la table users
    $texteReq = "select *";
    $texteReq.= "from joueur ";
    $texteReq.= "where pseudo=:log  ";

    $requete = $cnx->prepare($texteReq);
    $requete->bindParam(":log",$pseudo);
    
    var_dump($requete);

    $requete->execute();

    var_dump($requete);

    $tabRes = $requete->fetchAll(PDO::FETCH_ASSOC);
    
    //$tabRes = getJoueurForConnexion($pseudo, $mdp);
    
    //Partie debug
    var_dump($tabRes);
    //exit();

    //Si on ne retourne pas une ligne -> il y a un soucis
    if (count($tabRes)!=1) {
        // redirection
        header("location: ../page/connexion.php");
        die("erreur : login non trouvé ");
    }

    // Si on arrive là : l'utilisateur existe
    $passHash = $tabRes[0]["mdp"];
    
    //var_dump($passHash);
    //var_dump($mdp);
    
    //Est ce que le pass est correct ?
    if(password_verify($mdp,$passHash)==false){
        //header("location: ../page/connexion.php?erreur=1");
        header("location: ../page/connexion.php?erreur=1");
    }else{
        // Si on arrive là : login/pass OK
        // // Si login/pass existent : Redirection
        header("location: ../page/accueil.php");
    }

    //Placer en session : le login
    $_SESSION["pseudo"] = $pseudo;
    $_SESSION['userId'] = $tabRes[0]['id'];
   
    // si pas connu : rediriger sur la page de co (acceuil.php) avec l'erreur
    
    //header("location: ../page/connexion.php?erreur=1");