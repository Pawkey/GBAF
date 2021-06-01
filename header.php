<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
<title>test</title>
	<style type="text/css">

header
{
  display : flex;
  flex-direction : row;
 justify-content : space-around;
  border-bottom : solid 2px;
  margin: 0.1%;
  
}

img
{
 max-width : 90px;
  margin : 30px 900px 40px 40px;
}

p
{
  margin : 60px 40px 40px 0px
}

	</style>
  </head>

<body>

  <header>

	<img src="files/LOGO_GBAF_ROUGE.png"/>
	 <p>Bienvenue <?php echo htmlspecialchars ($_SESSION['firstname']) ?> <?php echo htmlspecialchars ($_SESSION['lastname']); ?> !</p>
/*    
   <?php 
if(isset($_SESSION['id']) && $_SESSION['id']!=)
{
?>
<nav>
    <ul>
      <li>
        <form method="post" action="account.php">
          <input type="submit" name="account" value="Mon compte"/> </form>
      </li>
      <li><form method="post" action="homepage.ph?OUT=true"><input type="submit" name="logoff" value="Se déconnecter"/> </form></li>   
    </ul>
    </nav>
 <?php
}
else
{
 echo 'Bienvenue';
}
   ?>

*/
 
  </header> 
  

</body>
</html>