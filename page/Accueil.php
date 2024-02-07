<?php
// definir les sessions
//         partie chiffrement
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Accueil</title>
</head>
<body>
    <div class="container">
    <h1><center>Bienvenue sur le site du Demineur en ligne !</center></h1>
    <!-- <p>Merci de vous identifier pour accéder à l'application.</p> -->
    <!-- Affichage du message d'erreur -->
    <!-- Code saisit invalide | pseudo deja empreinter | -->
    </div>
    <div>
        <label for="inCreator">Pseudo createur: </label>
        <input class="form-control" id="inCreator" name="Creator" type="text" placeholder="identifiant createur">
        <button class="btn btn-primary" type="submit" id="btnCreate">Creation</button>
        
    </div>
    <div>
        <label for="inJoiner">Pseudo joueur 2 : </label>
        <input class="form-control" id="inJoiner" name="Joiner" type="text" placeholder="Veuilliez saisir le code de la partie">
        <button class="btn btn-warning" type="reset" id="btnJoin">Rejoindre</button>
        <h3>Un lien pour déclencher un script JavaScript</h3>
        <a href="javascript:alert('Le code a bien été générer');">Generation</a>
    </div>
    
</body>
</html>