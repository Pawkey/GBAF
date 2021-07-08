<<<<<<< HEAD
<?php
session_start();

include("header.php"); 

	$id_acteur = htmlspecialchars( $_GET['id']);
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


	$infos_acteurs->closeCursor();

	$likes = $bdd->prepare('SELECT id FROM likes WHERE actor_id = ?');
	$likes->execute(array($id_acteur));
	$likes = $likes->rowCount();

	

	$dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE actor_id = ?');
	$dislikes->execute(array($id_acteur));
	$dislikes = $dislikes->rowCount();

	
?>


<h2> <?php echo $detail_article['titre']; ?> </h2>
	<section> 
		<img src="$detail_article['image']">
		
		<?php echo $detail_article['description']; ?>
	</section>

<a href="like-dislike.php?t=1&id=<?php echo $detail_article["id"] ?>"> J'aime </a> (<?= $likes ?>)
<br/>
<a href="like-dislike.php?t=2&id=<?php echo $detail_article["id"] ?>"> Je n'aime pas </a> (<?= $dislikes ?>) <br/> <br/>



	<form method="post" >
		<label for="comment">Entrez votre commentaire :</label> <br/>
		<textarea name="comment" placeholder="Dîtes nous ce que vous en avez pensé !"></textarea><br/>
		<input type="submit" name="send" value="Envoyer">
	</form>
	<br/>

	<?php
	
if (isset($_POST['send']))
{


	if (isset($_POST['comment']) AND !empty($_POST['comment']) )
	{
		$comment = $bdd->prepare('INSERT INTO comments (user_id, pseudo, comment, acteur_id ) VALUES (?,?,?,?)');
	$comment->execute(array(
		$_SESSION['id'],
		$_SESSION['username'],
		$_POST['comment'],
		$id_acteur));
	
	}
	else
	{
		$c_erreur = "Vous devez d'abord entrer un commentaire.";
		echo $c_erreur;
	}
}

	?>


	<?php

	$req = $bdd->prepare(
		'SELECT * 
		FROM comments
		LEFT JOIN acteur ON acteur.id = comments.acteur_id
		WHERE comments.acteur_id = ? ');
	$req->execute(array($id_acteur));

	?>

	<?php while ($test = $req->fetch()) : ?>
	<?= nl2br(($test['pseudo']) . '<br />' . ($test['comment']) . '<br/>' ); ?>
	<?php endwhile ?>
	
=======
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
		
>>>>>>> main
<?php include("footer.php"); ?>