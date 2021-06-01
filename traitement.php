<?php
session_start();

if (isset($_POST['firstname']) AND !empty($_POST['firstname']))
{
	$_SESSION['firstname'] = $_POST['firstname'];
}
if (isset($_POST['lastname']) AND !empty($_POST['lastname']))
{
	$_SESSION['lastname'] = $_POST['lastname'];
}
if (isset($_POST['username']) AND !empty($_POST['username']))
{
	$_SESSION['username'] = $_POST['username'];
}
if (isset($_POST['password']) AND !empty($_POST['password']))
{
	$_SESSION['password'] = $_POST['password'];
} 
			
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','root');
	}
	catch(Exception $e)
	{
		die('Erreur :'.$e->getMessage());
	}
	
	$verify = $bdd->prepare('SELECT pseudo FROM members WHERE pseudo = ?');
	$verify->execute(array($_POST['username']));
	$username = $verify->fetch();

	if (isset($username)&&!empty($username))
	{

  		header('Location: signin2.php');
  		
	}
	else
	{
		$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

	
	$req = $bdd->prepare('INSERT INTO members (pseudo, pass, question, answer) VALUES (:pseudo, :pass, :question, :answer)');
	$req->execute(array(
		'pseudo' => $_POST['username'],
		'pass' => $pass_hache,
		'question' => $_POST['secret_question'],
		'answer' => $_POST['answer_question']));
	header('Location: account.php');
	
	}
?>
