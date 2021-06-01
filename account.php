<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon compte</title>
</head>
<body>
	<div id="main">
	<?php include("header.php"); ?>

<h1>Mon compte</h1>
<p>
	Nom : <?php echo $_SESSION['lastname']; ?><br/>
	Prénom : <?php echo $_SESSION['firstname']; ?><br />
	Pseudo : <?php echo $_SESSION['username']; ?> <br />
</p>

<?php include("footer.php"); ?>

</div>

</body>
</html>