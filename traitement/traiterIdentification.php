<?php
    //Version Hash
    session_start(); // "premiere instruction; pas de texte, ; entete de communication"
    
    //include ('../script/scriptAccesBdd.php');
    require_once "../includes/inc_connexionBase.php";
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

    if (count($tabRes)!=1) {
        // redirection
        header("location:connexion.php");
        die("erreur : login non trouvé ");
    }

    //Si on ne retourne pas une ligne -> il y a un soucis
    // if(count($tabRes)!=1){
    //     $_SESSION["pseudo"] = "";
    //     // $_SESSION["droits"] = "";
    //     header("location:connexion.php?erreur=2");//Modifier avec droits non existants
    //     exit();
    // }


    // Si on arrive là : l'utilisateur existe

    // if (password_verify($pass,$tabRes[0]["mdp"])==false){
    //     // redirection
    //     header("location:connexion.php");
    //     die("erreur : mdp non correct");        
    // }

    // Si on arrive là : login/pass OK

    // Si login/pass existent :

    $passHash = $tabRes[0]["mdp"];
    
    var_dump($passHash);
    var_dump($mdp);
    
    //Est ce que le pass est correct ?
    if(password_verify($mdp,$passHash)==false){
        //header("location: ../page/connexion.php?erreur=1");
        die("Erreur LLLL");
    }else{
        header("location: ../page/jeu.php");
    }

    //Placer en session : le login
    $_SESSION["pseudo"] = $pseudo;
    $_SESSION['userId'] = $tabRes[0]['id'];
    //$_SESSION["id"] = $id;

    // if (empty($pseudo) || empty($mdp)){
	// // Pas re�ues, ou "vide" : on sort
    // //if (empty($login) || empty($pass)){
    //     header("location:connexion.php?erreur=1");
    //     exit(); // header ne provoque pas l'arret du script
    // //}
    // }
    // else 
    // {
    //     header("location:accueil.php");//?nom=mael
    //     //exit(); // header ne provoque pas l'arret du script
    // }
    

    // si pas connu : rediriger sur la page de co (connexion.php)
    
    //header("location: ../page/connexion.php?erreur=1");