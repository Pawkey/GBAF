<?php
session_start();

?>

	<?php include("header.php"); 

	$id_acteur = $_GET['id'];
	try
  	{
    	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
  	}
  catch(Exception $e)
  	{
    	die('Erreur :'.$e->getMessage());
  	}

	$infos_acteurs = $bdd->prepare('SELECT * FROM acteur WHERE id=:id');
	$infos_acteurs->execute(array('id' => $id_acteur));
	$detail_article = $infos_acteurs->fetch();

	?>

<h2> <?php echo $detail_article['titre']; ?> </h2>
	<section> 
		<img src="$detail_article['image']?id=$id_acteur">
		<?php echo $detail_article['description']; ?>

<a href="traitement_actor.php?t=1&id=$id_acteur"> J'aime </a>
<br/>
<a href="traitement_actor.php?t=2&id=$id_acteur"> Je n'aime pas </a>


	<form method="post" action="traitement_actor.php">
		<label for="comment">Entrez votre commentaire :</label>
		<textarea name="comment"></textarea>
		<input type="submit" name="send" value="Envoyer">
	</form>

	<?php
	$req = $bdd->prepare(
		'SELECT * 
		FROM comments
		LEFT JOIN acteur ON acteur.id = comments.acteur_id
		WHERE comments.acteur_id = ? ');
	$req->execute(array($id_acteur));

	?>

	<?php while ($test = $req->fetch()) : ?>
	<?= nl2br(($test['pseudo']) . '<br />' . ($test['comment'])); ?>
	<?php endwhile ?>

	<?php if (isset($_SESSION['error_comment'])) : ?>
	<?= $_SESSION['error_comment']; ?>
	<?php endif ?>
		
<?php include("footer.php"); ?>