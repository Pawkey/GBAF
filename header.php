<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 

	<style type="text/css">
header
{
  display : flex;
  flex-direction : row;
 justify-content : space-around;
  border-bottom : solid 2px;
  
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

	<title>test</title>

</head>

<body>

  <header>

	<img src="files/LOGO_GBAF_ROUGE.png"/>
	 <p>Bienvenue <?php echo htmlspecialchars ($_POST['firstname']) . ($_POST['lastname']); ?> !</p>
 
  </header> 
  

</body>
</html>