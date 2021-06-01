<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Accueil </title>
</head>
<body>
	<?php include("header.php"); ?>
	<h1>Qu'est ce ques GBAF ?</h1>
	<p>GBAF propose aux salariés des grands groupes
français un point d’entrée unique, répertoriant un grand nombre d’informations
sur les partenaires et acteurs du groupe ainsi que sur les produits et services
bancaires et financiers.</p>

	<h2> Les acteurs et partenaires</h2>

	<h3>Formation&co</h3>
	<img src="files/formation_co.png"/>
	<p>Formation&co est une association française présente sur tout le territoire.</p>
<form method="post" action="formation_co.php"><input type="submit" name="send" value="En savoir plus"></form>

	<h3>Protectpeople</h3>
	<img src="files/protectpeople.png"/>
	<p>Protectpeople finance la solidarité nationale.</p>
<form method="post" action="protectpeople.php"><input type="submit" name="send" value="En savoir plus"></form>

<h3>Dsa France</h3>
<img src="files/Dsa_france.png"/>
<p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.</p>
<form method="post" action="dsa_france.php"><input type="submit" name="send" value="En savoir plus"></form>

<h3>CDE</h3>
<img src="files/CDE.png"/>
<p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. </p>
<form method="post" action="cde.php"><input type="submit" name="send" value="En savoir plus"></form>

	<?php include("footer.php"); ?>

</body>
</html>