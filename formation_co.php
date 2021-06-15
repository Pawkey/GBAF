<?php
session_start();
?>
<title>Formation&co</title>
<?php include("header.php"); ?>
<img src="files/formation_co.png">
<h2></h2>
<p>Formation&co est une association française présente sur tout le territoire.
Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.
Notre proposition :
<ul> 
<li>un financement jusqu’à 30 000€ ;</li>
<li>un suivi personnalisé et gratuit ;</li>
<li>une lutte acharnée contre les freins sociétaux et les stéréotypes.</li>
</ul>
Le financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.
Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.</p>

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
	'SELECT members.pseudo, comments.comment 
	FROM comments
	LEFT JOIN members ON members.id = comments.id_user
	WHERE comments.agence = ? ');
$req->execute(array(
"formation_co"));
?>

<?php while ($resultat = $req->fetch()) : ?>
<?= nl2br(htmlspecialchars ($resultat['pseudo']) . '<br />' . ($resultat['comment'])); ?>
<?php endwhile ?>

<?php if ($_SESSION['error']): ?>
		<?= $_SESSION['error']; ?>
		<?php endif ?>
		
<?php include("footer.php"); ?>