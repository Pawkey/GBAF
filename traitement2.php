<?php
session_start();

try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
	}
	catch(Exception $e)
	{
		die('Erreur :'.$e->getMessage());
	}
	
$req = $bdd->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');
$req->execute(array(
'pseudo'=> $_POST['username']));
$resultat = $req->fetch();


$isPasswordCorrect = password_verify($_POST['password'], $resultat['pass']);

if (!$resultat)
{
	$_SESSION['error'] = "Pseudo ou mot de passe incorrect.";
	header('Location: connection.php');

}
else
{
	if($isPasswordCorrect)
	{
		$_SESSION['id'] = $resultat['id'];
		$_SESSION['username'] = $_POST['username'];
		header('Location: account.php');
	}
	else
	{
		$_SESSION['error'] = "Pseudo ou mot de passe incorrect.";
		header('Location: connection.php');
	}
}
	?>