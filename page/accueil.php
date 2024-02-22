<?php
    // definir les sessions
    session_start();
    if(isset($_SESSION['pseudo'])){
        $current_pseudo = $_SESSION['pseudo'];
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
    <title>Accueil</title>
    <modif>
</head>

<body style="background-color: #f2f2f2">

    <nav class="navbar navbar-expand-md navbar-light" 
         style="background-color: maroon;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a  class="nav-link text-light 
                        font-weight-bold text-uppercase px-3" 
                    href= 'accueil.php'>Accueil</a>
            </li>
            <?php if (!isset($_SESSION['pseudo'])) { ?>
            <li>
                <div class="nav-item position-absolute top-0 end-0 navbar">
                    <input type="button" onclick="window.location.href = 'connexion.php';" value="Connexion" />
                </div>
            </li>
            <?php } else { 
                echo 
                '<div class="nav-item position-absolute top-0 end-0 navbar text-light" style="display: flex; align-items: flex-end;">
                    <span style="margin-right: 20px;">Joueur connecté :</span>'. $_SESSION['pseudo'] . '<span style="margin-right: 9px;"></span>' .
                '</div>';
            } ?>  
        </ul>
    </nav>
    
    <div> 
        <h1><center>Bienvenue sur le site DiceArena !</center></h1>
        <?php if (isset($_SESSION['pseudo'])) { ?>
        <div class="center_container" style="background-color: #fff;
                                    padding: 30px;
                                    border-radius: 8px;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

            <!-- Bouton pour créer une nouvelle partie -->
            <form action="../traitement/traiterCreation.php" method="post">
                <input type="hidden" name="action" value="creerPartie">
                <button class="btn btn-primary" type="submit" id="btnCreate" style="margin-right:10px;">Creer</button>
            </form>
            
            <!-- Bouton pour rejoindre une partie existante -->
            <form action="../traitement/traiterJoin.php" method="post" style="display: flex;">
                <button class="btn btn-warning" type="submit" id="btnJoin" style="margin-right:3px;">Rejoindre</button>
                <input class="form-control input-accueil" id="inCode" name="code" type="number" placeholder="Saisir le code" style="width: 175px;">
            </form>

        </div>

        <?php } else { 
                    echo '<div class="center_container" style="background-color: #fff;
                    padding: 30px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">Veuilliez vous connectez pour acceder aux fonctionnalités du site.</div>';
        } ?>
        <!--<div class="center_container" style="background-color: #fff;
                                    padding: 30px;
                                    border-radius: 8px;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    margin-top: 20px;">
*
            <button class="btn btn-success" onclick="window.location.href = 'regles.php';" >Règles du jeu</button> 

        </div>-->
    </div>

</body>
</html>
