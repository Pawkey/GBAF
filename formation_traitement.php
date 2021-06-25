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
		$_SESSION['id'],
		$_POST['agence']));
	$resultat = $req->fetch();

	if (!$resultat)
	{
		$req = $bdd->prepare('INSERT INTO comments (id_user, comment, agence ) VALUES (?,?, ?)');
	$req->execute(array(
		$_SESSION['id'],
		$_POST['comment1'],
		$_POST['agence']));
header('Location : formation_co.php');

	}
	else
	{
		$_SESSION['error'] = "Vous ne pouvez pas mettre plus de 1 commentaire par agence.";
  		header('Location: formation_co.php');
	}

	$resultat->closeCursor();

	
$req = $bdd->prepare('SELECT * FROM comments WHERE id_user = ?');
	$req->execute(array(
		$_SESSION['id'],
		$_POST['agence'],
		$_POST['like'],
		$_POST['dislike']));
	$resultat = $req->fetch();

	if (!$resultat)
	{
		$req = $bdd->prepare('INSERT INTO comments (id_user, agence, like ) VALUES (?,?, ?)');
	$req->execute(array(
		$_SESSION['id'],
		$_POST['agence'],
		$_POST['like']));
header('Location : formation_co.php');
}
else 
{
	$req = $bdd->prepare('INSERT INTO comments (id_user, agence, dislike ) VALUES (?,?, ?)');
	$req->execute(array(
		$_SESSION['id'],
		$_POST['agence'],
		$_POST['dislike']));
header('Location : formation_co.php');
}

?>
















