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
	
$req = $bdd->prepare('SELECT * FROM members WHERE id = :id');
$req->execute(array(
'id'=> $_SESSION['id']));
$resultat = $req->fetch();

?>

<title>Mon compte</title>

	<div id="main">
	<?php include("header.php"); ?>

<h1>Mon compte</h1>
<p>
	Nom : <?php echo $resultat['lastname']; ?><br/>
	Prénom : <?php echo $resultat['firstname']; ?><br />
	Pseudo : <?php echo $resultat['pseudo']; ?> <br />
</p>


<?php include("footer.php"); ?>

	</div>