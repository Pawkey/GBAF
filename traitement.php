<<<<<<< HEAD
<?php
session_start();
//Traitement inscription

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
			
=======
<?php
session_start();
//Traitement inscription

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
			
>>>>>>> main
?>