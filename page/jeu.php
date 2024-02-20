<?php
session_start(); // "premiere instruction; pas de texte, ; entete de communication"

// il faut etre connecter

// Utilisez include si la non-disponibilité de inc_headers.php n'est pas critique
require_once('../includes/inc_headers.php');

require_once "../script/scriptAccesBdd.php";
require_once "../traitement/traiterAffichageJeu.php";

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
        <?php  
        include "../traitement/traiterJeu.php"; 
        //print_r(poserDes(2));?>
        
        <h1><center>Bienvenue sur la partie de jeu de DiceArena !</center></h1>
        
        <?php if(shouldIPlay($idUser)) {  ?>
            <div>
                <label for="inCreator">Joueur 1/2: </label>
                <input class="form-control" id="inChamp" name="Champ" type="text" placeholder="champ de saisi J1/2">
                <button class="btn btn-primary" type="submit" id="btnCreate">Valider</button>
            </div>
        <?php } ?>

        <div>
            <label for="inDemande">C'est à moi ? : </label>
            <!-- <input class="form-control" id="inJoiner" name="Joiner" type="text" placeholder="champ de saisi J2"> -->
            <button class="btn btn-warning" type="submit" id="btnDemande" action="../script/qui_joue.php" method="post">Prendre la main</button>
        </div>
        <div style="margin-top: 10px;">
            <label>Dès à placer :
                <?php
                echo(getPartieByCode($codePartie)["currentDice"]);
                ?>
            </label>
            <label>Plateau adverse :</label>
            <?php 
                genererPlateauHTML("opponent");
            ?>

            <label>Votre plateau :</label>
            <?php 
                genererPlateauHTML("player");
            ?>
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
