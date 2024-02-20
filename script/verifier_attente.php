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