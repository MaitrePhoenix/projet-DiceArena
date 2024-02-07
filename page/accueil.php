<?php
    // definir les sessions
    // partie chiffrement

    // Générer un code unique
    //$code_unique = uniqid();

    // Redirection vers la page avec le code unique dans l'URL
    // header("Location: jeu.php?code=$code_unique");
    // exit;
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

<body>
    <div class="container">
        <h1><center>Bienvenue sur le site DiceArena !</center></h1>
        <!-- <p>Merci de vous identifier pour accéder à l'application.</p> -->
        <!-- Affichage du message d'erreur -->
        <!-- Code saisit invalide | pseudo deja empreinter | -->
        
        <div>
            <!-- <label for="inCreator">Pseudo createur: </label> -->
            <!-- <input class="form-control" id="inCreation" name="Creation" type="text" placeholder="identifiant createur"> -->
            <button class="btn btn-primary" type="submit" id="btnCreate" action="traiterCreation.php">Creation</button>
            
        </div>
        <div class="margin-text">
            <label for="inCode">Code : </label>
            <input class="form-control input-accueil" id="inCode" name="Code" type="text" placeholder="Veuilliez saisir le code de la partie">
            <button class="btn btn-warning" type="reset" id="btnJoin" action="traiterJoin.php">Rejoindre</button>
        </div>
    </div>
</body>
</html>