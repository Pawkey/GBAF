<?php
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
	echo 'Identifiant ou réponse incorrectes.'
}
else
{
	if($isPasswordCorrect)
	{
		session_start();
		$_SESSION['id'] = $resultat['id'];
		$_SESSION['username'] = $_POST['username'];
		echo 'Un email vous a êtez envoyé.';
	}
	else
	{
		echo 'Identifiant ou réponse incorrectes.';
	}
}
	?>