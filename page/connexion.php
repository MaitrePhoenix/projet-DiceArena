<!DOCTYPE html>
<html lang="fr">
<html>

<head>
	<meta charset="UTF-8">
	<title>Connexion DiceArena</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<form id="login-form" action="login.php" method="post">
			<h2>Connexion</h2>
			<div>
				<label for="pseudo">Pseudo :</label>
				<input type="text" id="pseudo" name="pseudo" required>
			</div>
			<div>
				<label for="password">Mot de passe :</label>
				<input type="password" id="password" name="password" required>
			</div>
			<button type="submit">Se connecter</button>
		</form>

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
	</div>
</body>

</html>