<?php
session_start();
require_once("../db/mysql.class.php");

if(isset($_POST['username'])){
	$DB = new DBConnector();
 // $username = mysqli_real_escape_string($_POST['username']);
 // this fuction ist procedural and uses two parameters
    $username = htmlspecialchars($_POST['username']);
	$login = $DB->getLogin(utf8_decode($username));

	if($login == null || mysqli_num_rows($login) > 1){
		header('Location: index.php');
	}
	
	if(password_verify($_POST['password'], $login['password'])){
		$_SESSION['loggedIn'] = "true";
		header("Location: ../index.php");
	}else{
		header("Location: ../index.php");
	}
}
?>