<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Connectez-vous à GBAF</title>
</head>
<body>
<?php include("header.php"); ?>


	<h1> Se connecter</h1>

 
		<form method="post" action="traitement2.php">
			<label for="username">Pseudo :</label>
			<input type="text" name="username" required>

			<label for="password">Mot de passe :</label>
			<input type="password" name="password" required>

			<input type="submit" name="send" value="Se connecter">
			<p> Mauvais identifiant ou mot de passe. </p>
			
		</form>
		<a href='passwordforgotten.php'> Mot de passe oublié ? </a>

<?php include("footer.php"); ?>
</body>
</html>