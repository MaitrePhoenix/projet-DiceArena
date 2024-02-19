<?php
session_start(); // "premiere instruction; pas de texte, ; entete de communication"

// il faut etre connecter

// Utilisez include si la non-disponibilité de inc_headers.php n'est pas critique
include('../includes/inc_headers.php');

require_once "../script/scriptAccesBdd.php";

// Récupérer les informations depuis les paramètres d'URL
$loginUtilisateur = $_SESSION["pseudo"];
//$codePartie = isset($_GET['code']) ? $_GET['code'] : '';

// Récupérer le code unique //depuis l'URL
// creerPartie();
//$code_unique = isset($_GET['code']) ? $_GET['code'] : '';
$code_unique = $_SESSION['code'];
//$_SESSION['code'] = $code_unique;

echo "Joueur en ligne : $loginUtilisateur<br>";
// Afficher le code unique
echo "Votre code unique est : $code_unique";
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
    <div class="container">
        <h1><center>Bienvenue sur la partie de jeu de DiceArena !</center></h1>
        <!-- <p>Merci de vous identifier pour accéder à l'application.</p> -->
        <!-- Affichage du message d'erreur -->
        <!-- Code saisit invalide | pseudo deja empreinter | -->
        <div>
            <label for="cdPartie">Code de la partie : </label>
            <label><?php echo $code_unique; ?></label>
            <label >
        </div>

        <?php if(shouldIPlay($_SESSION['userId'],$code_unique)) {  ?>
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
