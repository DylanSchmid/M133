<?php
	require_once("../include/login_functions.php");
	require_once("../db/mysql.class.php");
	
	if (isLoggedIn()){
		if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['street']) && isset($_POST['place']) && isset($_POST['postcode']) && 
			isset($_POST['mail']) && isset($_POST['group']) && isset($_POST['country']) && isset($_POST['language'])
		){
			$DB = new DBConnector();
			$DB->insertInscription(
				htmlspecialchars(utf8_decode($_POST['lastName'])), htmlspecialchars(utf8_decode($_POST['firstName'])), htmlspecialchars(utf8_decode($_POST['street'])), htmlspecialchars(utf8_decode($_POST['place'])),
				htmlspecialchars(utf8_decode($_POST['postcode'])), htmlspecialchars(utf8_decode($_POST['mail'])), htmlspecialchars(utf8_decode($_POST['group'])), htmlspecialchars(utf8_decode($_POST['country'])),
				htmlspecialchars(utf8_decode($_POST['language']))
			);
			header('Location: ../index.php');
		}
		else{
			header('Location: ../index.php?inhalt_mitte=schlosslauf.php');
		}
	}
	else{
		header('Location: ../index.php');
	}

	

?>