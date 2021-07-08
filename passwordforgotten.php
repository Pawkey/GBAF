<?php 
session_start();
?>
<title>Retrouver son mot de passe</title>
	<?php include("header.php"); ?>
	<h1>Mot de passe oublié</h1>
	<form method="post">
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

			<input type="submit" name="submit" value="Envoyer">
			
		</fieldset>
	</form>
	<?php if(isset($_SESSION['error_mdp'])) : ?>
	<?= $_SESSION['error_mdp']; ?>
	<?php endif ?>

<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
}
catch(Exception $e)
{
	die('Erreur :'.$e->getMessage());
}

	

if (isset($_POST["submit"]))
{
$req = $bdd->prepare('SELECT * FROM members WHERE pseudo = :pseudo AND question = :question AND answer = :answer');
$req->execute(array(
	'pseudo'=> $_POST["username"],
	'question' => $_POST["secret_question"],
	'answer' => $_POST["answer_question"]));
$resultat = $req->fetch();

	
	if(!$resultat)
	{
		

		$_SESSION['error_mdp'] = 'Identifiant ou mot de passe incorrectes.';
		
	}
	else
	{
		?>
		<form method="post" action="new_password.php">
			<label for="password">Nouveau mot de passe :</label>
			<input type="password" name="password" id="password" required>
			<input type="submit" name="send" value="Envoyer">
		</form>
		<?php

	}
}
else
{
	$_SESSION["error_mdp"] = "Identifiant ou mot de passe incorrectes.";
}

	?>

<?php include("footer.php"); ?>