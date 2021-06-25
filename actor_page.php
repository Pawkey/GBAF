<?php
session_start();

?>
<title><?php echo $_GET['title'] ?></title>
<?php include("header.php"); ?>

<h2><?php echo $_GET['title'] ?></h2>



<form  method="post" action="formation_traitement.php">
	<input type="submit" name="like" value="like">
	<input type="submit" name="dislike" value="dislike">
</form>


<form method="post" action="formation_traitement.php">
	<input type="hidden" name="agence" value="formation_co">
	<label for="comment1">Entrez votre commentaire :</label>
	<textarea name="comment1"></textarea>
	<input type="submit" name="send" value="Envoyer">
</form>



<?php
try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
  }
  catch(Exception $e)
  {
    die('Erreur :'.$e->getMessage());
  }


$req = $bdd->prepare(
	'SELECT acteur.id, comments.comment 
	FROM comments
	LEFT JOIN acteur ON acteur.id = comments.acteur_id
	WHERE comments.acteur_id = ? ');
$req->execute(array(
));
?>

<?php while ($resultat = $req->fetch()) : ?>
<?= nl2br(htmlspecialchars ($resultat['pseudo']) . '<br />' . ($resultat['comment'])); ?>
<?php endwhile ?>

<?php if ($_SESSION['error']): ?>
		<?= $_SESSION['error']; ?>
		<?php endif ?>
		
<?php include("footer.php"); ?>