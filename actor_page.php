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



	<form method="post">
		<label for="comment">Entrez votre commentaire :</label> <br/>
		<textarea name="comment" placeholder="Dîtes nous ce que vous en avez pensé !"></textarea><br/>
		<input type="submit" name="send" value="Envoyer">
	</form>
	<br/>

	<?php
	
if (isset($_POST['send']))
{


	if (isset($_POST['comment']) AND !empty($_POST['comment']))
	{
		$verify = $bdd->prepare('SELECT * FROM comments WHERE user_id = ? AND acteur_id = ?');
		$verify->execute(array($_SESSION['id'], $id_acteur));
		$resultat = $verify->fetch();

		if(!$resultat)
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
			echo "Vous ne pouvez pas mettre plus de 1 commentaire par agence. <br/>"; 
		}
	
	}
	else
	{
		$c_erreur = "Vous devez d'abord entrer un commentaire. <br/>";
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
	
<?php include("footer.php"); ?>