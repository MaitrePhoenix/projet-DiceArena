<?php
    session_start();
//On souhaite gérer toute les actions lors de la création
// - Creation du player
// - ajout en base avec le pseudo de la personne ainsi que l'ID
// - rafraichir la page avec le code generer

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

    createJoueur($pseudo, $mdp);
    //var_dump(createJoueur);
    
    header("location: ../page/connexion.php");


    // $result = getJoueurForConnexion($pseudo, $mdp);
    // var_dump($result);
    

    // //header("location: ../page/accueil.php");
    // $_SESSION["pseudo"] = $pseudo;
    // $_SESSION['userId'] = $result[0]['id'];

    // exit();

    //----------------------------------------
    
    // if(isset($_POST['action']) && !empty($_POST['action'])) {
    //     // Exécute la fonction appropriée selon la valeur de l'action
    //     if($_POST['action'] == 'maFonction') {
    //         maFonction();
    //     }
    // }

    // function creerEtDirigerVersPartie(){
    //     $idUtilisateur = $_SESSION["idUser"];

    //     $idPartie = creerPartie($idUtilisateur);

    //     //ajouter la redirection automatique
    // }


    
?>