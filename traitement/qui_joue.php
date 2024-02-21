<?php
// Démarrer la session si ce n'est pas déjà fait
session_start();

// Inclure le fichier des fonctions
require_once '../scriptAccesBdd.php';

// Appeler la fonction pour vérifier si le joueur doit jouer
if (shouldIPlay($_SESSION['userId'])) {
    echo "true";
} else {
    echo "false";
}
?>