<?php
session_start();
/*
try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
  }
  catch(Exception $e)
  {
    die('Erreur :'.$e->getMessage());
  }
 
$req = $bdd->prepare('INSERT INTO comments (id_user, comment, agence ) VALUES (?,?, ?)');
	$req->execute(array(
		$_SESSION['id'],
		$_POST['comment1'],
		$_POST['agence']
	));
	*/?>




<?php

try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
  }
  catch(Exception $e)
  {
    die('Erreur :'.$e->getMessage());
  }

$req = $bdd->prepare('SELECT * FROM comments WHERE id_user = ?');
	$req->execute(array(
		'id_user' => $_SESSION['id'],
		'acteur_id' => $id_acteur));
	$resultat = $req->fetch();

	if (!$resultat)
	{
		$req = $bdd->prepare('INSERT INTO comments (user_id, pseudo, comment, acteur_id ) VALUES (?,?, ?, ?)');
	$req->execute(array(
		'user_id' => $_SESSION['id'],
		'pseudo' => $_SESSION['username'],
		'comment' => $_POST['comment'],
		'acteur_id' => $id_acteur));
header('Location : actor_page.php');

	}
	else
	{
		$_SESSION['error_comment'] = "Vous ne pouvez pas mettre plus de 1 commentaire par agence.";
  		header('Location: actor_page.php');
	}

	$resultat->closeCursor();

	
	if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id']))
	{
		$getid = (int) $_GET['id'];
		$gett = (int) $_GET['t'];

		$req = $bdd->prepare('SELECT * FROM comments WHERE id = ? ');
		$req->execute(array($getid))

		if($req->rowCount()==1)
		{
			if($gett == 1)
			{
				$ins = $bdd->prepare('INSERT INTO likes (actor_id) VALUES (?)');
				$ins->execute(array($getid));
			}
			elseif ($gett == 2)
			{
				$ins = $bdd->prepare('INSERT INTO dislikes (actor_id) VALUES (?)');
				$ins->execute(array($getid));
			}
			header('Location: actor_page.php?id=<?php echo $resultat["id"]; ');

		}
		else
		{
			exit('Erreur fatale');
		}
	}
	else
	{
		exit('Erreur fatale');
	}

























$req = $bdd->prepare('SELECT * FROM comments WHERE user_id = ?');
	$req->execute(array(
		$_SESSION['id'],
		$_POST['comment'],
		$_POST['good'],
		$_POST['bad']));
	$resultat = $req->fetch();

	if (!$resultat)
	{
		$req = $bdd->prepare('INSERT INTO comments (user_id, agence, like ) VALUES (?,?, ?)');
	$req->execute(array(
		$_SESSION['id'],
		$_POST['agence'],
		$_POST['like']));
header('Location : actor_page.php');
}
else 
{
	$req = $bdd->prepare('INSERT INTO comments (id_user, agence, dislike ) VALUES (?,?, ?)');
	$req->execute(array(
		$_SESSION['id'],
		$_POST['agence'],
		$_POST['dislike']));
header('Location : actor_page.php');
}

?>
















