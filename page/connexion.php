<?php
    // definir les sessions
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
$erreurMessIdent = "Erreur d'identification. Veuillez vérifier vos informations.";
// Utilisez require si la non-disponibilité de inc_headers.php doit être traitée comme une erreur fatale
// require('includes/inc_headers.php');
?>

<!DOCTYPE html>
<html lang="fr">
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/styles.css">
	<title>Connexion Dice Arena</title>
</head>

<body class="body-center">
    <!-- Je suis occupé de gerer -->
	<div class="container form-btn form-btn-hv" style="margin-right:30px;">
		
		
		<form id="login-form" action="../traitement/traiterIdentification.php" method="post">
		<?php   
            //if msg!=""
            if (isset($_GET['erreur']) && $_GET['erreur'] == 1) {
                echo '<p style="color: red;"><mark>'. $erreurMessIdent .'</mark></p>';
            }
        ?>
			<h2>Connexion</h2>
			<div>
				<label for="inPseudo">Pseudo :</label>
				<input id="inPseudo" name="pseudo" type="text" placeholder="Identifiant" required>
			</div>
			<div>
				<label for="inMdp">Mot de passe :</label>
				<input id="inMdp" name="mdp" type="password" placeholder="Secret" tooltip="attention" required>
			</div>
			<button type="submit">Se connecter</button>
			<button class="btn btn-warning" type="reset">Effacer</button>
		</form>
		
	</div>

	<!-- A faire -->
	<div class="container form-btn form-btn-hv">
		<form id="signup-form" action="../traitement/traiterCreation_joueur.php" method="post">
			<h2>Créer un compte</h2>
			<div>
				<label for="new-pseudo">Nouveau pseudo :</label>
				<input type="text" id="new-pseudo" name="new-pseudo" required>
			</div>
			<div>
				<label for="new-mdp">Nouveau mot de passe :</label>
				<input type="password" id="new-mdp" name="new-mdp" required>
			</div>
			<button type="submit">Créer un compte</button>
			
		</form>
		<button class="btn btn-warning" type="reset">Effacer</button>
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
                    <input type="button" onclick="window.location.href = 'http://localhost/projet-DiceArena/page/debugSession.php';" value="DebugSession" />
                </div>


</body>

</html>