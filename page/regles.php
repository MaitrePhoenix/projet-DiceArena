<?php
    //Page des regles permettant d'éviter de ne rien avoir sur la page d'accueil (ou sinon on met un message en grand dans la div principale " Veuilliez vous connecté pour créeer une partie)

    //TODO/IDEE:
    // - faire une liste des regles
    // - Ajouter une vidéo - image du jeu pour mieux comprendre le jeu
    // - 
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
                <a class="nav-link text-light 
                        font-weight-bold text-uppercase px-3" 
                   href= 'accueil.php'>Accueil</a>
            </li>
        </ul>
    </nav>
    
    <div class="container">
        <h1><center>Voici les règles de DiceArena !</center></h1>
        <div>
            
        </div>
        <ul>
            <li>Principales
                <ul>
                    <li>Specifiques 1.1
                    <ul>
                        <li>Specifiques 1.1.1</li>
                        <li>Specifiques 1.2.2</li>
                        <li>Specifiques 1.2.3</li>
                        <li>Specifiques 1.2.4
                        <ul>
                            <li>Specifiques 1.2.4.1</li>
                            <li>Specifiques 1.2.4.2</li>
                        </ul>
                        </li>

                        <li>Specifiques 1.2.5</li>
                    </ul>

                    </li>
                    <li>Specifiques 1.2</li>
                </ul>
            </li>       
        </ul>
        
        <ul>
            <li>Secondaires
                <ul>
                    <li>Specifiques 2.1</li>
                    <li>Specifiques 2.2</li>
                </ul>
            </li>
        </ul>

    </div>
</body>

</html>