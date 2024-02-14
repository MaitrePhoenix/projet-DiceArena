<!DOCTYPE html>
<html lang="fr">
<html>

<head>
	<meta charset="UTF-8">
	<title>Connexion Dice Arena</title>
	<link rel="stylesheet" href="../css/styles.css">
</head>

<body class="body-center">
    <!-- Je suis occupé de gerer -->
	<div class="container form-btn form-btn-hv" style="margin-right:30px;">
		
		<form id="login-form" action="../traitement/traiterIdentification.php" method="post">
			<h2>Connexion</h2>
			<div>
				<label for="inLogin">Pseudo :</label>
				<input id="inLogin" name="login" type="text" placeholder="Identifiant" required>
			</div>
			<div>
				<label for="inPass">Mot de passe :</label>
				<input id="inPass" name="pass" type="password" placeholder="Secret" tooltip="attention" required>
			</div>
			<button type="submit">Se connecter</button>
			<button class="btn btn-warning" type="reset">Effacer</button>
		</form>
		
	</div>

	<!-- A faire -->
	<div class="container form-btn form-btn-hv">
		<form id="signup-form" action="signup.php" method="post">
			<h2>Créer un compte</h2>
			<div>
				<label for="new-pseudo">Nouveau pseudo :</label>
				<input type="text" id="new-pseudo" name="new-pseudo" required>
			</div>
			<div>
				<label for="new-password">Nouveau mot de passe :</label>
				<input type="password" id="new-password" name="new-password" required>
			</div>
			<button type="submit">Créer un compte</button>
			
		</form>
		<button class="btn btn-warning" type="reset">Effacer</button>
	</div>
	

	
</body>

</html>