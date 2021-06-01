<?php
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
'pseudo'-> $_POST['username']));
$resultat = $req->fetch();

$isPasswordCorrect = password_verify($_POST['password'], $resultat['pass']);

if (!$resultat)
{
	header('Location: connection2.php');
}
else
{
	if($isPasswordCorrect)
	{
		session_start();
		$_SESSION['id'] = $resultat['id'];
		$_SESSION['username'] = $_POST['username'];
		header('Location: account.php');
	}
	else
	{
		header('Location: connection2.php');
	}
}
	?>