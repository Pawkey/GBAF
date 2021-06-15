<?php
session_start();
?>
	<link rel="stylesheet" href="signincss.css"/>
	<title>S'inscrire à GBAF</title>

	<div id="main">
	<?php include("header.php"); ?>
	<h1>Formulaire d'inscription</h1>
	<section>

	<form method="post" action="traitement.php">
	<fieldset>
		<legend>Vos coordonnées</legend>
			<label for="lastname">Nom :</label>
			<input type="text" name="lastname" id="lastname" autofocus required>

			<label for="firstname">Prénom :</label>
			<input type="text" name="firstname" id="firstname" required>

			<label for="username">Pseudo :</label>
			<input type="text" name="username" id="username" required>
			
			<?php if ($_SESSION['error']): ?>
			<?= $_SESSION['error']; ?>
			<?php endif ?>

			<label for="password">Mot de passe :</label>
			<input type="password" name="password" id="password" required>

			<label for="secret_question">Question secrète :</label>
			<select name="secret_question" id="secret_question">
				<option value="" selected> ---Choissisez une question---</option>				
				<option value="animal">Le nom de votre premier animal de compagnie ?</option>
				<option value="road">La rue où vous avez grandit ?</option>
				<option value="mothers_name">Le nom de jeune fille de votre mère ?</option>
				<option value="childhood_game">Un jouet marquant de votre enfance ?</option>
			</select>

			<label for="answer_question">Votre réponse :</label>
			<input type="text" name="answer_question" id="answer_question" required=>

			<input type="submit" name="send" value="Envoyer">
	</fieldset>
	</form>
	
	<p>Déjà inscris ? <a href="connection.php">Connecte-toi!</a> </p>
</section>
	<?php include("footer.php"); ?>
	</div>