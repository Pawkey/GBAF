
<form method="post" action="comments.php">
		<label for="comment">Entrez votre commentaire :</label> <br/>
		<textarea name="comment" placeholder="Dîtes nous ce que vous en avez pensé !"></textarea>
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

 
if (isset($_POST['send']))
{


	if (isset($_POST['comment']) AND !empty($_POST['comment']) )
	{
		$comment = $bdd->prepare('INSERT INTO comments(user_id, pseudo, comment, acteur_id ) VALUES (:user_id, :pseudo, :comment, :acteur_id)');
	$comment->execute(array(
		'user_id' => $_SESSION['id'],
		'comment' => $_POST['comment'],
		'acteur_id' => $id_acteur));
	
		header('Location : homepage.php');
	}
	else
	{
		$c_erreur = "Vous devez d'abord entrer un commentaire.";
		echo $c_erreur;
	}
}

	?>
