<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
}
catch(Exception $e)
{
	die('Erreur :'.$e->getMessage());
}


$req = $bdd->prepare('SELECT * FROM members WHERE id = :id');
$req->execute(array(
	'id'=> $resultat["id"]));
$ins = $req->fetch();

 if (isset($_POST['send']))
		{
			
			$update = $bdd->prepare('UPDATE members SET pass = :pass WHERE id = :id');
			$update->execute(array(
				'pass' => password_hash($_POST["password"]),
				'id' => $ins["id"]));
			header('Location: connection.php');
		}
?>