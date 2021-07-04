<?php
session_start();
//Traitement pour le mot de passe oublié
try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
	}
	catch(Exception $e)
	{
		die('Erreur :'.$e->getMessage());
	}
	
$req = $bdd->prepare('SELECT id, pseudo, question, answer FROM members WHERE pseudo = :pseudo');
$req->execute(array(
'pseudo'-> $_POST['username']));
$resultat = $req->fetch();

$isPasswordCorrect = password_verify(($_POST['secret_question'], $resultat['question']) AND ($_POST['answer_question'], $resultat['answer']));

if (!$resultat)
{
	$_SESSION['error'] = 'Identifiant ou mot de passe incorrectes.'
	header('Location : passwordforgotten.php')
}
else
{
	if($isPasswordCorrect)
	{
		session_start();
		$_SESSION['id'] = $resultat['id'];
		$_SESSION['username'] = $resultat['pseudo'];
		echo 'Un email vous a êtez envoyé.';
	}
	else
	{
		$_SESSION['error'] = 'Identifiant ou mot de passe incorrectes.'
		header('Location : passwordforgotten.php')
}
	}
}
	?>