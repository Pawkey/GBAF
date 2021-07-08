<<<<<<< HEAD

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
  <link rel="stylesheet" type="text/css" href="footer-header.css">

  <title>test</title>
</head>

<body>

  <header>
	 <img src="files/LOGO_GBAF_ROUGE.png"/> 

    <?php if(isset($_SESSION['lastname']) && isset($_SESSION['firstname'])) { ?>

	 <p>Bienvenue <?php echo  $_SESSION['firstname']; ?> <?php echo  $_SESSION['lastname']; ?> !</p>
    
  
    <nav>
      <ul>
        <li>
          <a href="account.php"> Mon compte </a>
        </li>
        <li>
          <a href="homepage.php"> Accueil </a>
        </li>
        <li>
          <a href="logout.php"> Se déconnecter </a>
        </li>
      </ul>
    </nav>

    <?php } ?>
=======

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
  <link rel="stylesheet" type="text/css" href="footer-header.css">

  <title>test</title>
</head>

<body>

  <header>
	 <img src="files/LOGO_GBAF_ROUGE.png"/> 

    <?php if(isset($_SESSION['lastname']) && isset($_SESSION['firstname'])) { ?>

	 <p>Bienvenue <?php echo  $_SESSION['firstname']; ?> <?php echo  $_SESSION['lastname']; ?> !</p>
    
  
    <nav>
      <ul>
        <li>
          <a href="account.php"> Mon compte </a>
        </li>
        <li>
          <a href="homepage.php"> Accueil </a>
        </li>
        <li>
          <a href="logout.php"> Se déconnecter </a>
        </li>
      </ul>
    </nav>

    <?php } ?>
>>>>>>> main
  </header> 