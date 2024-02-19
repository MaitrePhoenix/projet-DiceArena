<?php
    // definir les sessions
    session_start();

    // partie chiffrement
    
    // Générer un code unique
    //$code_unique = uniqid();

    // Redirection vers la page avec le code unique dans l'URL
    // header("Location: jeu.php?code=$code_unique");
    // exit;

// Utilisez include si la non-disponibilité de inc_headers.php n'est pas critique
//include('../includes/inc_headers.php');

//if(!empty($_GET["msg"]))
//$msg=""
//$erreurMessIdent = "Erreur d'identification. Veuillez vérifier vos informations.";
// Utilisez require si la non-disponibilité de inc_headers.php doit être traitée comme une erreur fatale
// require('includes/inc_headers.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Accueil</title>
    <modif>
</head>

<body style="background-color: #f2f2f2">
    <div >
        <?php  
        include "../traitement/traiterJeu.php"; 
        //print_r(poserDes(2));?>
        <h1><center>Bienvenue sur le site DiceArena !</center></h1>
        <!-- <p>Merci de vous identifier pour créer une partie.</p> -->
        <!-- Affichage du message d'erreur -->
        <!-- Code saisit invalide | pseudo deja empreinter | -->
        <?php if (isset($_SESSION['pseudo'])) { ?>
        <div class="center_container" style="background-color: #fff;
                                    padding: 30px;
                                    border-radius: 8px;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

            <?php   
            //if msg!=""
            // if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
            //     echo '<p style="color: red;"><mark>'. $erreurMessIdent .'</mark></p>';
            // }
            ?>

            <!-- Bouton pour créer une nouvelle partie -->
            <form action="../traitement/traiterCreation.php" method="post">
                <input type="hidden" name="action" value="creerPartie">
                <button class="btn btn-primary" type="submit" id="btnCreate" style="margin-right:10px;">Creer</button>
            </form>
            
            <!-- Bouton pour rejoindre une partie existante -->
            <form action="../traitement/traiterJoin.php" method="post">
                <button class="btn btn-warning" action="../traitement/traiterJoin.php" type="submit" id="btnJoin" style="margin-right:3px;">Rejoindre</button>
                <input class="form-control input-accueil" id="inCode" name="code" type="number" placeholder="Saisir le code" 
                    style="width: 150px;" maxlength="12" >
            </form>

            


            
            <!-- <form id="joinGame" action="../traitement/traiterJoin.php" method="post">  -->
            <!-- <button class="btn btn-warning" action="../traitement/traiterJoin.php" type="reset" id="btnJoin" style="margin-right:3px;">Rejoindre</button>
            <input class="form-control input-accueil" id="inCode" name="Code" type="text" placeholder="Saisir le code" 
                    style="width: 150px;" maxlength="12" > -->
            <!-- </form> -->

                <!-- Lien pour créer une nouvelle partie -->
    <!-- <a href="traiterJoin.php?action=creerPartie">Créer une nouvelle partie</a> -->

    <!-- Lien pour rejoindre une partie existante -->
    <!-- <a href="traiterJoin.php?action=rejoindrePartie">Rejoindre une partie existante</a> -->

            

            


        </div>

        <?php } else { 
                    echo '<div class="center_container" style="background-color: #fff;
                    padding: 30px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">Veuilliez vous connectez pour acceder aux fonctionnalités du site.</div>';
        } ?>

        <!-- <div class="margin-top-acceuil">
            
            
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
