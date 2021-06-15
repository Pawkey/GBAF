
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
  <link rel="stylesheet" type="text/css" href="footer-header.css">

  <title>test</title>
</head>

<body>

  <header>

<?php
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

	<img src="files/LOGO_GBAF_ROUGE.png"/>
	 <p>Bienvenue <?php echo htmlspecialchars ($resultat['firstname']) ?> <?php echo htmlspecialchars ($resultat['lastname']); ?> !</p>
    
   <?php if(isset($resultat['id']) && !empty($_SESSION['id'])) : ?>
<nav>
    <ul>
      <li>
        <form method="post" action="homepage.php">
          <input type="submit" name="homepage" value="Accueil">
        </form>
      </li>
      <li>
        <form method="post" action="account.php">
          <input type="submit" name="account" value="Mon compte"/> </form>
      </li>
      <li><form method="post" action="account.php"><input type="submit" name="logoff" value="Se déconnecter"/> 
        <?php 
        if ($_POST['logoff'])
 {
$_SESSION = array();
{
  if (ini_get("session.use_cookies")) 

    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
header('Location: connection.php'); 
}

        ?>

      </form></li>   
    </ul>
    </nav>
  <?php endif; ?>


 
  </header> 