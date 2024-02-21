<?php
    // definir les sessions (si besoin)

	$erreurMessIdent = "Erreur d'identification. Veuillez vérifier vos informations.";

?>

<!DOCTYPE html>
<html lang="fr">
<html>

<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<title>Connexion Dice Arena</title>
</head>

<body >

	<nav class="navbar navbar-expand-md navbar-light" 
         style="background-color: maroon;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a  class="nav-link text-light 
                        font-weight-bold text-uppercase px-3" 
                    href= 'accueil.php'>Accueil</a>
            </li>
        </ul>
    </nav>


	<div class="body-center">

		<div class="container form-btn form-btn-hv form_connexion" style="margin-right:30px;">
			
			<form id="login-form" action="../traitement/traiterIdentification.php" method="post">	
				<?php   
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
				<div>
				<button type="submit">Se connecter</button>
				</div>
				<div>
				<button class="btn btn-warning" type="reset">Effacer les champs</button>
				</div>
			</form>	
		</div>

		<div class="container form-btn form-btn-hv form_connexion">
			<form id="signup-form" action="../traitement/traiterCreation_joueur.php" method="post">
				<h2>Créer un compte</h2>
				<div>
					<label for="new-pseudo">Nouveau pseudo :</label>
					<input type="text" id="new-pseudo" name="new-pseudo" placeholder="Nouvel Identifiant" required>
				</div>
				<div>
					<label for="new-mdp">Nouveau mot de passe :</label>
					<input type="password" id="new-mdp" name="new-mdp" placeholder="Nouveau mot de passe" required>
				</div>
				<div>
				<button type="submit">Créer un compte</button>
			</div>
				<div>
				<button class="btn btn-warning" type="reset">Effacer les champs</button>
				</div>
			</form>
			
		</div>

	</div>

</body>

</html>