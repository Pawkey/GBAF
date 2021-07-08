<<<<<<< HEAD
<?php
session_start();
//Traitement pour le mot de passe oublié
 $username = $_POST['username'];

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
	}
	catch(Exception $e)
	{
		die('Erreur :'.$e->getMessage());
	}

	

$req = $bdd->prepare('SELECT * FROM members WHERE pseudo = :pseudo AND question = :question AND answer = :answer');
$req->execute(array(
	'pseudo'=> $username,
	'question' => $_POST["secret_question"],
	'answer' => $_POST["answer_question"]));
$resultat = $req->fetch();

if (isset($_POST["secret_question"]))
{
	if (isset($_POST["secret_question"]) && isset($_POST["answer_question"]) AND !empty($_POST["secret_question"]) && !empty($_POST["answer_question"]))
	
	if(!$resultat)
	{
		

		$_SESSION['error_mdp'] = 'Identifiant ou mot de passe incorrectes.';
		header('Location : passwordforgotten.php');
		
	}
	else
	{
		include("new_password.php");
		/*
	


		if (isset($_POST['send']))
		{
			
			

			$update = $bdd->prepare('UPDATE members SET pass = :pass WHERE id = :id');
			$update->execute(array(
				'pass' => password_hash($_POST["password"]),
				'id' => $resultat["id"]));
			session_start();
			header('Location: connection.php');
		}
		else
		{
	
		}
		*/



	}
}
else
{
	$_SESSION["error_mdp"] = "Identifiant ou mot de passe incorrectes.";
	header('Location : passwordforgotten.php');
}

=======
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
>>>>>>> main
	?>