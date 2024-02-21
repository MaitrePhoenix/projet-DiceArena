<?php 
// Nous sert a afficher un message pop up sur la page de jeu indiquant que l'on attente le second joueur 

// Démarrez la session
session_start();
include_once "../script/scriptAccesBdd.php";


var_dump($_SESSION['idGame']);
var_dump($_SESSION);


$partie = getPartieByCode($_SESSION['idGame']);
var_dump($partie);

//exit();
if ($partie["joueur2"] == null){
    var_dump($partie);
    var_dump($_SESSION);
}

//testJoueur2($code);
//exit();

// Vérifiez si le joueur2 est null (simulé ici par une variable de session)
if (!isset($_SESSION['joueur2']) || $_SESSION['joueur2'] === null) {
    // Si le joueur2 est null, renvoyez "waiting" en réponse à la requête AJAX
    //echo "waiting";
    echo "<script type='text/javascript'>alert('En attente d'un joueur 2');</script>";
    //echo "<script type='text/javascript'>alert('Vous ne pouvez pas rejoindre cette partie (partie pleine)');window.location.href = '../page/accueil.php';</script>";
} else {
    // Si le joueur2 n'est pas null, renvoyez "not_waiting" en réponse à la requête AJAX
    echo "not_waiting";
}

function testJoueur2($code){
    $partie = getPartieByCode($code);   
    if($partie == null){
        exit();
    }
    else if ($partie["joueur2"] == null){
        var_dump($code);
        var_dump($partie);
        var_dump($_SESSION);
        //exit();

        $_SESSION['idGame'] = $joueur2;
    }
    else{
        echo "<script type='text/javascript'>alert('Vous ne pouvez pas rejoindre cette partie (partie pleine)');window.location.href = '../page/accueil.php';</script>";
    }

}
?>
<?php
//var_dump($_SESSION);
//exit();	

// Vérifier si l'ID du joueur est défini dans la session
// if (isset($_SESSION['userId'])) {
//     // Récupérer l'ID du joueur depuis la session
//     $id_joueur = $_SESSION['userId'];

//     // Vérifier si c'est au joueur de jouer
//     // Par exemple, vérifiez si l'ID du joueur correspond à celui dont c'est le tour
//     // Ici, nous supposons simplement qu'un joueur peut jouer si c'est un nombre impair de secondes
//     if (time() % 2 == 1) {
//         echo "peut_jouer";
//     } else {
//         echo "ne_peut_pas_jouer";
//     }
// } else {
//     // Si l'ID du joueur n'est pas défini dans la session, renvoyer une erreur
//     echo "erreur_session_non_definie";
// }

// header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 

// $variable1 = (isset($_GET["variable1"])) ? $_GET["variable1"] : NULL;
// $variable2 = (isset($_GET["variable2"])) ? $_GET["variable2"] : NULL;

// if ($variable1 && $variable2) {
// 	// Faire quelque chose...
// 	echo "OK";
// } else {
// 	echo "FAIL";
// }

?>

<?php
//Dans traiterAffichage
            //echo("<th style=\"padding: 8px; text-align: left;\"> <div style=\"min-height: 30px;text-align:center;\">". 'bouton'. "</div></td>");
            // V1 - echo('<th style="padding: 8px; text-align: left;"> <div style="min-height: 30px;text-align:center;"><button type="button" class="btn btn-warning" onclick="actionDeJeu('.$i.')">Inserer colonne '.$num.'</button></div></td>');}
            //value="'.$i.'"


//TraiterCreationJoueur
            
    // $result = getJoueurForConnexion($pseudo, $mdp);
    // var_dump($result);
    
    //pour se connecter
    // $mdp_hash = password_hash($mdp,PASSWORD_DEFAULT);
    // $requete = $connexion->prepare("Select * from joueur where pseudo = :pseudo and mdp = :mdp");
    // $requete->bindParam(':pseudo', $pseudo);
    // $requete->bindParam(':mdp', $mdp_hash);
    // $requete->execute();
    // $result = $requete->fetch(PDO::FETCH_ASSOC);
    // var_dump($requete);
    // var_dump($result);
    //exit();

    // //header("location: ../page/accueil.php");
    
    //$_SESSION['userId'] = $idUtilisateur;
    // $_SESSION['userId'] = $result[0]['id'];


    //var_dump($_SESSION);
    //exit();

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




//Creation
    // $result = getJoueurForConnexion($pseudo, $mdp);
    // var_dump($result);
    
    //pour se connecter
    // $mdp_hash = password_hash($mdp,PASSWORD_DEFAULT);
    // $requete = $connexion->prepare("Select * from joueur where pseudo = :pseudo and mdp = :mdp");
    // $requete->bindParam(':pseudo', $pseudo);
    // $requete->bindParam(':mdp', $mdp_hash);
    // $requete->execute();
    // $result = $requete->fetch(PDO::FETCH_ASSOC);
    // var_dump($requete);
    // var_dump($result);
    //exit();

    // //header("location: ../page/accueil.php");
    
    //$_SESSION['userId'] = $idUtilisateur;
    // $_SESSION['userId'] = $result[0]['id'];


    //var_dump($_SESSION);
    //exit();

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

//Ident
    //----------------------------------------
    // Un peu de tracage des valeurs recues
    //----------------------------------------

    // echo '$_REQUEST : ';
    // var_dump($_REQUEST);
    // echo "<br>";

    // echo '$_SERVER[\"REQUEST_METHOD\"] : ';
    // var_dump($_SERVER['REQUEST_METHOD']);
    // echo "<br>";

    // echo '$_GET : ';
    // var_dump($_GET);
    // echo "<br>";

    // echo '$_POST : ';
    // var_dump($_POST);
    // echo "<br>";

    //exit() // Pour voir vraiment ce qui est donner à mon formulaire, 
            // aide a donner les parametre à mes variables que je créer ici 
            // en gros on voit toutes les var partager

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

// traiterJoin   
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
    // var_dump($_REQUEST);
    //var_dump($code);
    //exit();

//traiterPlacement
    // else{
    //     //var_dump($action);
    //     //header("location: ../page/jeu.php");   
    // }


// Pour le debug
    //             <div>
    //             <!-- Partie log -->
    //             </div>

    //             <div>
    //                 <!-- Pour le debug -->

    //                 <div>
    //                     <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/accueil_test.php';" value="Accueil_test" />
    //                 </div>

    //                 <div>
    //                     <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/jeu_test.php';" value="Jeu_test" />
    //                 </div>

    //                 <div>
    //                     <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/connexion.php';" value="Connexion" />
    //                 </div>
    //                 <div>
    //                     <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/debugSession.php';" value="DebugSession" />
    //                 </div>
    //             </div>    


// Jeu
    // <div id="conteneur-actions"></div>
    // <!-- <script src="../script/qui_joue.js"></script> -->
    // <!-- <script src="js/test.js"></script> -->
    //<!-- Ajoutez les 3barres pour pouvoir choisir de ce login ou se register -->


    
?>