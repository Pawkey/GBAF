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
	$update = $bdd->prepare('UPDATE members SET pass = ? WHERE id = ?');
	$update->execute(array(password_hash($_POST["password"]), $ins["id"]));

	header('Location: connection.php');
}
else
{
	echo "Oh oh il y a eu un problème !";

}
?>