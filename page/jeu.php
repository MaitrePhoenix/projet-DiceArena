<?php
session_start(); // "premiere instruction; pas de texte, ; entete de communication"

// il faut etre connecter

// Utilisez include si la non-disponibilité de inc_headers.php n'est pas critique
require_once('../includes/inc_headers.php');

require_once "../script/scriptAccesBdd.php";
require_once "../traitement/traiterAffichageJeu.php";
require_once "../traitement/traiterJeu.php";

// Récupérer les informations depuis les paramètres d'URL
$loginUtilisateur = $_SESSION["pseudo"];
$codePartie = $_SESSION["idGame"];
$idUser = $_SESSION['userId'];
//$codePartie = isset($_GET['code']) ? $_GET['code'] : '';

// Récupérer le code unique //depuis l'URL
// creerPartie();
//$codePartie = isset($_GET['code']) ? $_GET['code'] : '';

//$_SESSION['code'] = $codePartie;

//echo "Joueur en ligne : $loginUtilisateur<br>";
// Afficher le code unique
//echo "Votre code unique est : $codePartie";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Jeu</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light" 
         style="background-color: maroon;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a  class="nav-link text-light 
                        font-weight-bold text-uppercase px-3" 
                    href= 'accueil.php'>Accueil</a>
            </li>
            <?php echo '<div class="nav-item position-absolute top-0 end-0 navbar text-light" style="display: flex; align-items: flex-end;">
                            <span style="margin-right: 20px;">Joueur connecté :</span>'. $_SESSION['pseudo'] . '<span style="margin-right: 9px;"></span>' .
                    '</div>';
                  echo '<div class="nav-item position-absolute top-1 end-0 navbar text-light" style="margin-top: 10px;">
                            <span style="margin-right: 18px;">Code de la partie :</span>' . $_SESSION['idGame'] . '<span style="margin-right: 33px;"></span>' . 
                    '</div>';    
             ?>

            
        </ul>
        <!-- Ajoutez les 3barres pour pouvoir choisir de ce login ou se register -->
        <ul>
            
        </ul>
    </nav>
    <div class="container">
        
        <h1><center>Bienvenue sur la partie de jeu de DiceArena !</center></h1>
        <?php $vainqueur = getVainqueur();
        if($vainqueur != 0) {
            if($vainqueur == 1 && getPartieByCode($codePartie)["joueur1"] == $idUser ||
            $vainqueur == 2 && getPartieByCode($codePartie)["joueur2"] == $idUser){?>
                <h2>Bravo Vous avez gagné !!! </h2>
            <?php } 
            else{?>
                <h2>Dommage, vous avez perdu </h2>
            <?php } 
        } 
        else {
            if(shouldIPlay($idUser)) {  ?>
                <div>
                    <label for="inCreator">C'est à votre tour </label>
                </div>
                <?php } 
                else { ?>

                <div>
                    <label for="inDemande">C'est au tour de votre adversaire : </label>
                    <!-- <input class="form-control" id="inJoiner" name="Joiner" type="text" placeholder="champ de saisi J2"> -->
                    <button class="btn btn-warning" type="submit" id="btnDemande" action="../script/qui_joue.php" method="post">A-t-il fini?</button>
                    <br>
                    <label>Dès à placer :
                        <?php
                        echo(getPartieByCode($codePartie)["currentDice"]);
                        ?>
                    </label>
                </div>
            <?php } 
        } ?>
        <div style="margin-top: 10px;">
            
            <br>
            <label>Plateau adverse :</label>
            <?php 
                genererPlateauHTML("opponent");
            ?>
            <label>Son score : <?php echo(getScore(getPlateauOfPlayerOrOpponent("opponent"))) ?> </label>
            <br>
            <br>
            <label>Votre plateau :</label>
            <?php 
                genererPlateauHTML("player");
            ?>
            <label>Votre score : <?php echo(getScore(getPlateauOfPlayerOrOpponent("player"))) ?> </label>
            <!-- Champ entrée + qui l'a saisi-->
        </div>
        <div>
            <!-- Partie log -->
        </div>


                <!-- Pour le debug -->

                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/accueil_test.php';" value="Accueil_test" />
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


    </div>
    <div id="conteneur-actions"></div>
    <div>
        </div>
    <button id="boutonPrendreLaMain">Prendre la main</button>
    <script src="../script/qui_joue.js"></script>
</body>
</html>
