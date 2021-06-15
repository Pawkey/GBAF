<?php 
session_start();
?>
<title>Retrouver son mot de passe</title>
	<?php include("header.php"); ?>
	<h1>Mot de passe oublié</h1>
	<form method="post" action="traitement3.php">
		<fieldset>
			<legend>Récupérer votre mot de passe</legend>
			<label for="username">Pseudo :</label>
			<input type="text" name="username" id="username" autofocus required>

			<label for="secret_question">Question secrète :</label>
			<select name="secret_question" id="secret_question">
				<option value="" selected> ---Choissisez une question---</option>				
				<option value="animal">Le nom de votre premier animal de compagnie ?</option>
				<option value="road">La rue où vous avez grandit ?</option>
				<option value="mothers_name">Le nom de jeune fille de votre mère ?</option>
				<option value="childhood_game">Un jouet marquant de votre enfance ?</option>
			</select>

			<label for="answer_question">Votre réponse :</label>
			<input type="text" name="answer_question" id="answer_question" required>

			<input type="submit" name="send" value="Envoyer">
			
		</fieldset>
	</form>
	<?php if($_SESSION['error']) : ?>
	<?= $_SESSION['error']; ?>
	<?php endif ?>

<?php include("footer.php"); ?>