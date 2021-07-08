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



	if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id']))
	{
		$getid = (int) $_GET['id'];
		$gett = (int) $_GET['t'];

		$avis = $bdd->prepare('SELECT id FROM comments WHERE id = ? ');
		$avis->execute(array($getid));

		if($avis->rowCount()==1)
		{
			if($gett == 1)
			{
				$check_like = $bdd->prepare('DELETE FROM likes WHERE actor_id = ? AND user_id = ? ');
				$check_like->execute(array($getid,$_SESSION['id']));

				if($check_like->rowCount() == 1)
				{
					$del = $bdd->prepare('SELECT id FROM likes WHERE actor_id = ? AND user_id = ? ');
					$del->execute(array($getid,$_SESSION['id']));
				}
				else
				{
					$ins = $bdd->prepare('INSERT INTO likes (actor_id,user_id) VALUES (?,?)');
					$ins->execute(array($getid, $_SESSION['id']));
				}
				
			}
			elseif ($gett == 2)
			{
				$check_like = $bdd->prepare('DELETE FROM dislikes WHERE actor_id = ? AND user_id = ? ');
				$check_like->execute(array($getid,$_SESSION['id']));

				if($check_like->rowCount() == 1)
				{
					$del = $bdd->prepare('SELECT id FROM dislikes WHERE actor_id = ? AND user_id = ? ');
					$del->execute(array($getid,$_SESSION['id']));
				}
				else
				{
					$ins = $bdd->prepare('INSERT INTO dislikes (actor_id, user_id) VALUES (?,?)');
					$ins->execute(array($getid, $_SESSION['id']));
				}
			}
			header("location:".  $_SERVER['HTTP_REFERER']); 

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
	?>