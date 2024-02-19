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

                <!-- Pour le debug -->
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projetdee/projet-DiceArena/page/accueil.php';" value="Accueil" />
                </div>
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projetdee/projet-DiceArena/page/accueil_test.php';" value="Accueil_test" />
                </div>

                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projetdee/projet-DiceArena/page/jeu.php';" value="Jeu" />
                </div>
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projetdee/projet-DiceArena/page/jeu_test.php';" value="Jeu_test" />
                </div>

                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projetdee/projet-DiceArena/page/connexion.php';" value="Connexion" />
                </div>
                <div>
                    <input type="button" onclick="window.location.href = 'http://localhost/projetdee/projet-DiceArena/page/debugSession.php';" value="DebugSession" />
                </div>


    </div>
</body>
</html>