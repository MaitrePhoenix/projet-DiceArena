<?php
// Démarrer la session si elle n'est pas déjà démarrée
session_start();

// Vérifier si les informations du joueur et le tour actuel sont disponibles en session

// $loginUtilisateur = $_SESSION["pseudo"];
// echo "Joueur en ligne : $loginUtilisateur";
// $_SESSION['tour_joueur'] = '';


// if(isset($_SESSION['nom_joueur'], $_SESSION['tour_joueur'])) {
//     $nom_joueur = $_SESSION['nom_joueur'];
//     $tour_joueur = $_SESSION['tour_joueur'];

//     // Afficher le nom du joueur dont c'est le tour
//     echo "C'est le tour de $nom_joueur.";

//     // Afficher le formulaire pour permettre au joueur de jouer
//     if($tour_joueur == 1) {
//         echo "Vous êtes le joueur 1, affichez le formulaire pour le joueur 1.";
//     } else {
//         echo "Vous êtes le joueur 2, affichez le formulaire pour le joueur 2.";
//     }

//     // Lorsque le joueur soumet le formulaire, mettez à jour le tour du joueur dans la session
//     // Assurez-vous de passer le tour au prochain joueur
//     // par exemple:
//     // if($tour_joueur == 1) {
//     //     $_SESSION['tour_joueur'] = 2;
//     // } else {
//     //     $_SESSION['tour_joueur'] = 1;
//     // }
// } else {
//     // Si les informations du joueur ou le tour actuel ne sont pas disponibles en session, redirigez vers une page de connexion ou d'accueil par exemple
//     header("Location: connexion.php");
//     exit;
// }

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
    <!-- mael ZeBoss  max li3-mil -->
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

            <?php if (!isset($_SESSION['pseudo'])) { ?>
            <li>
                <div class="nav-item position-absolute top-0 end-0 navbar">
                    <input type="button" onclick="window.location.href = 'connexion.php';" value="Connexion" />
                </div>
            </li>
            <?php } else { 
                    echo '<div class="nav-item position-absolute top-0 end-0 navbar text-light">Joueur connecté :  ' . $_SESSION['pseudo'] . '</div>';
            } ?>

            
        </ul>
        <!-- Ajoutez les 3barres pour pouvoir choisir de ce login ou se register -->
        <ul>
            
        </ul>
    </nav>

    <!-- <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h4 class="text-white">Collapsed content</h4>
            <span class="text-muted">Toggleable via the navbar brand.</span>
        </div>
    </div> -->

    <!-- <nav class="position-absolute top-0 end-0 navbar navbar-dark ">
        <input type="button" onclick="window.location.href = 'http://localhost/projetdee/projet-DiceArena/page/connexion.php';" value="Connexion" />
        <input type="button" class="btn btn-info" value="Connexion" onclick=" relocate_home()">

        <script>
            function relocate_home()
            {
                location.href = "http://localhost/projetdee/projet-DiceArena/page/connexion.php";
            } 
        </script>    
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    
                <span class="navbar-toggler-icon"></span>
                
                <form>
                    
                </form>

            </button>
    </nav> -->

    <!-- <div class="position-relative">
    <div class="position-absolute top-0 start-0"><label for="in1">Test top-0 start-0</label></div>
    <div class="position-absolute top-0 end-0"><label for="in2">Test top-0 end-0</label></div>
    <div class="position-absolute top-50 start-50"><label for="in3">Test top-50 start-50</label></div>
    <div class="position-absolute bottom-50 end-50"><label for="in4">Test bottom-50 end-50</label></div>
    <div class="position-absolute bottom-0 start-0"><label for="in5">Test bottom-0 start-0</label></div>
    <div class="position-absolute bottom-0 end-0"><label for="in6">Test bottom-0 end-0</label></div> -->

    <!-- <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown button
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div> -->

    <!-- <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown link
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div> -->

    <!-- <div>
        <button> 
            
        </button>
        <form>
            <input type="button" onclick="window.location.href = 'http://localhost/projetdee/projet-DiceArena/page/accueil.php';" value="Connexion" />
        </form>
    </div> -->


</div>
                
                <!-- Pour le debug -->
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/accueil.php';" value="Accueil" />
                </div>
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/accueil_test.php';" value="Accueil_test" />
                </div>

                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/jeu.php';" value="Jeu" />
                </div>
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/jeu_test.php';" value="Jeu_test" />
                </div>

                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/connexion.php';" value="Connexion" />
                </div>
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/debugSession.php';" value="DebugSession" />
                </div>

</body>
</html>
