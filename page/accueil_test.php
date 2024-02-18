<?php
// Démarrer la session si elle n'est pas déjà démarrée
session_start();

// Vérifier si les informations du joueur et le tour actuel sont disponibles en session
// $_SESSION['nom_joueur'] = '';
// $_SESSION['tour_joueur'] = '';
if(isset($_SESSION['nom_joueur'], $_SESSION['tour_joueur'])) {
    $nom_joueur = $_SESSION['nom_joueur'];
    $tour_joueur = $_SESSION['tour_joueur'];

    // Afficher le nom du joueur dont c'est le tour
    echo "C'est le tour de $nom_joueur.";

    // Afficher le formulaire pour permettre au joueur de jouer
    if($tour_joueur == 1) {
        echo "Vous êtes le joueur 1, affichez le formulaire pour le joueur 1.";
    } else {
        echo "Vous êtes le joueur 2, affichez le formulaire pour le joueur 2.";
    }

    // Lorsque le joueur soumet le formulaire, mettez à jour le tour du joueur dans la session
    // Assurez-vous de passer le tour au prochain joueur
    // par exemple:
    // if($tour_joueur == 1) {
    //     $_SESSION['tour_joueur'] = 2;
    // } else {
    //     $_SESSION['tour_joueur'] = 1;
    // }
} else {
    // Si les informations du joueur ou le tour actuel ne sont pas disponibles en session, redirigez vers une page de connexion ou d'accueil par exemple
    header("Location: connexion.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Test navbar</title>
</head>

<body>
    <!-- Navbar-->
    <!-- ZeBoss li3-mil -->
    <?php //echo password_hash("li3-mil",PASSWORD_DEFAULT); ?>
    <nav class="navbar navbar-expand-md navbar-light" 
         style="background-color: blueviolet;">
    <a href="#"><i class="fas fa-anchor text-warning fa-2x"></i></a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a  class="nav-link text-light 
                    font-weight-bold text-uppercase px-3" 
                href="#">Home</a>
        </li>
        <li class="nav-item">
            <a  class="nav-link text-light 
                    font-weight-bold text-uppercase px-3" 
                href="#">Skills</a>
        </li>
        <li class="nav-item dropdown">
            <a  class="nav-link text-light 
                    font-weight-bold text-uppercase px-3"
                href="#">Projects</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Project 1</a>
                <a class="dropdown-item" href="#">Project 2</a>
                <a class="dropdown-item" href="#">Project 3</a> 
            </div>
        </li>
    </ul>
    <!-- Ajoutez les 3barres pour pouvoir choisir de ce login ou se register -->
</body>
</html>
