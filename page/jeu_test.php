<?php
session_start(); // "premiere instruction; pas de texte, ; entete de communication"

// il faut etre connecter

// Utilisez include si la non-disponibilité de inc_headers.php n'est pas critique
include_once('../includes/inc_headers.php');
include_once('../traitement/traiterJeu.php');

// Récupérer les informations depuis la session
$loginUtilisateur = $_SESSION["pseudo"];
$idUtilisateur = $_SESSION["idUser"];

//creer partie
cre


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Jeu</title>
</head>
<body>
    <div class="container">
        <h1><center>Bienvenue sur la partie de jeu de DiceArena !</center></h1>
        <!-- <p>Merci de vous identifier pour accéder à l'application.</p> -->
        <!-- Affichage du message d'erreur -->
        <!-- Code saisit invalide | pseudo deja empreinter | -->
        <div>
            <label for="cdPartie">Code de la partie : 
                <?php
                // Vérifie si la variable "variable" est définie dans l'URL
                if(isset($_GET['code'])) {
                    // Récupère la valeur de la variable "variable" passée dans l'URL
                    $valeur = $_GET['code'];
                    
                    // Affiche la valeur récupérée
                    echo "Code de la partie : ".$valeur;
                } else {
                    // Si la variable n'est pas définie dans l'URL
                    echo "Code Absent";
                }
                ?>
            </label>
            

            <label >
        </div>
        <div>
            <label for="inCreator">Joueur 1/2: </label>
            <input class="form-control" id="inCreator" name="Creator" type="text" placeholder="champ de saisi J1/2">
            <button class="btn btn-primary" type="submit" id="btnCreate">Valider</button>
            
        </div>
        <div>
            <label for="inJoiner">C'est à moi ? : </label>
            <!-- <input class="form-control" id="inJoiner" name="Joiner" type="text" placeholder="champ de saisi J2"> -->
            <button class="btn btn-warning" type="reset" id="btnJoin" action>Prendre la main</button>
        </div>
        <div style="margin-top: 10px;">
            <label id="rappelValue">Rappel des valeurs : </label>
            <!-- Champ entrée + qui l'a saisi-->
        </div>
        <div>
            <!-- Partie log -->
        </div>

        
                <!-- Pour le debug -->
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/accueil.php';" value="Accueil" />
                </div>
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/accueil_test.php';" value="Accueil_test" />
                </div>

                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projetdee/projet-DiceArena/page/jeu.php';" value="Jeu" />
                </div>

                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/connexion.php';" value="Connexion" />
                </div>
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/debugSession.php';" value="DebugSession" />
                </div>


    </div>
</body>
</html>
