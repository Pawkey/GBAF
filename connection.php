<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Connectez-vous à GBAF</title>
</head>
<body>
	<?php
	include("header.php");
	?>
	<h1> Se connecter</h1>
 
		<form method="post" action="homepage.php">
			<label for="username">Pseudo :</label>
			<input type="text" name="username" required>

			<label for="password">Mot de passe :</label>
			<input type="password" name="password" required>

			<input type="submit" name="send" value="Se connecter">
		</form>


</body>
</html>