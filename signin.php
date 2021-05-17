<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="signincss.css"/>
	<title>S'inscrire à GBAF</title>
</head>
<body>
	<?php include("header.php"); ?>
	<h1>Formulaire d'inscription</h1>

	<form method="post" action="account.php">
	<fieldset>
		<legend>Vos coordonnées</legend>
			<label for="lastname">Nom :</label>
			<input type="text" name="lastname" id="lastname" autofocus>

			<label for="firstname">Prénom :</label>
			<input type="text" name="firstname" id="firstname">

			<label for="username">Pseudo :</label>
			<input type="text" name="username" id="username" required>

			<label for="password">Mot de passe :</label>
			<input type="password" name="password" id="password" required>

			<label for="secretquestion">Question secrète :</label>
			<select name="secretquestion" id="secretquestion">
				<option value="" selected> ---Choissisez une question---</option>				
				<option value="animal">Le nom de votre premier animal de compagnie ?</option>
				<option value="road">La rue où vous avez grandit ?</option>
				<option value="mothersname">Le nom de jeune fille de votre mère ?</option>
				<option value="childhoodgame">Un jouet marquant de votre enfance ?</option>
			</select>

			<label for="answerquestion">Votre réponse :</label>
			<input type="text" name="answerquestion" id="answerquestion">

			<input type="submit" name="" value="Envoyer">


	</fieldset>
	</form>

	<p> Déjà inscris ? <a href="connection.php">Connecte-toi!</a> </p>
	<?php include("footer.php"); ?>


</body>
</html>