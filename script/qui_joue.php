<?php
// Démarrer la session si ce n'est pas déjà fait
session_start();

// Inclure le fichier des fonctions
require_once '../scriptAccesBdd.php';

var_dump($_SESSION);
exit();	

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

// Appeler la fonction pour vérifier si le joueur doit jouer
if (shouldIPlay($_SESSION['userId'])) {
    echo "true";
} else {
    echo "false";
}
?>









<?php

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