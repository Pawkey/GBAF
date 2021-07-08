<<<<<<< HEAD
<?php
session_start();
?>
<title>Connexion</title>

<?php include("header.php"); ?>


	<h1> Se connecter</h1>

 
		<form method="post" action="traitement2.php">
			<label for="username">Pseudo :</label>
			<input type="text" name="username" required>

			<label for="password">Mot de passe :</label>
			<input type="password" name="password" required>

			<input type="submit" name="send" value="Se connecter">
			
		</form>









		<a href='passwordforgotten.php'> Mot de passe oublié ? </a>

<?php include("footer.php"); ?>
=======
<?php
session_start();
?>
<title>Connexion</title>

<?php include("header.php"); ?>


	<h1> Se connecter</h1>

 
		<form method="post" action="traitement2.php">
			<label for="username">Pseudo :</label>
			<input type="text" name="username" required>

			<label for="password">Mot de passe :</label>
			<input type="password" name="password" required>

			<input type="submit" name="send" value="Se connecter">
			
		</form>

		<?php if (isset($_SESSION['error'])): ?>
		<?= $_SESSION['error']; ?>
		<?php endif ?>

		<a href='passwordforgotten.php'> Mot de passe oublié ? </a>

<?php include("footer.php"); ?>
>>>>>>> main
