<?php
session_start();

?>

<title>Accueil</title>
<div id="main">
	<?php include("header.php"); ?>
	
	<h1>Qu'est ce ques GBAF ?</h1>
	<p>GBAF propose aux salariés des grands groupes
français un point d’entrée unique, répertoriant un grand nombre d’informations
sur les partenaires et acteurs du groupe ainsi que sur les produits et services
bancaires et financiers.</p>

	<h2> Les acteurs et partenaires</h2>

<?php 
try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
  }
  catch(Exception $e)
  {
    die('Erreur :'.$e->getMessage());
  }

$req = $bdd->query('SELECT * FROM acteur');

?>
<?php while ($resultat = $req->fetch()) : ?>

 <?= ($resultat['titre']) /*. '<br/>' . ($resultat['image']) */ . '<br/>' . ($resultat['description']) ?>
 <form method="post" action="actor_page.php">
	<input type="submit" name="suite" value="Lira la suite" >
	
</form>;
}
?>
<?php endwhile ?>

 <?php include("footer.php"); ?>
</div>