<?php
    // definir les sessions
    // partie chiffrement

    // Générer un code unique
    //$code_unique = uniqid();

    // Redirection vers la page avec le code unique dans l'URL
    // header("Location: jeu.php?code=$code_unique");
    // exit;

// Utilisez include si la non-disponibilité de inc_headers.php n'est pas critique
//include('includes/inc_headers.php');

//if(!empty($_GET["msg"]))
//$msg=""
$erreurMessIdent = "Erreur d'identification. Veuillez vérifier vos informations.";
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
</head>

<body style="background-color: #f2f2f2">
    <div >
        <?php 
        include "../script/scriptAccesBdd.php"; 
        getJoueurById(0);?>
        <h1><center>Bienvenue sur le site DiceArena !</center></h1>
        <!-- <p>Merci de vous identifier pour accéder à l'application.</p> -->
        <!-- Affichage du message d'erreur -->
        <!-- Code saisit invalide | pseudo deja empreinter | -->
        
        <div class="center_container" style="background-color: #fff;
                                    padding: 30px;
                                    border-radius: 8px;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

            <?php   
            //if msg!=""
            if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
                echo '<p style="color: red;"><mark>'. $erreurMessIdent .'</mark></p>';
            }
            ?>

            <!-- <label for="inCreator">Pseudo createur: </label> -->
            <!-- <input class="form-control" id="inCreation" name="Creation" type="text" placeholder="identifiant createur"> -->
            <button class="btn btn-primary" type="submit" id="btnCreate" action="traiterCreation.php" style="margin-right:10px;">Creer</button>
            <button class="btn btn-warning" type="reset" id="btnJoin" action="traiterJoin.php" style="margin-right:3px;">Rejoindre</button>
            <!-- <label for="inCode">Code : </label> -->
            <input class="form-control input-accueil" id="inCode" name="Code" type="text" placeholder="Saisir le code" 
                    style="width: 150px;" maxlength="12" >
        </div>
        <!-- <div class="margin-top-acceuil">
            
            
        </div> -->
    </div>
</body>
</html>
