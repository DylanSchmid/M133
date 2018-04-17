<?php
require_once("login_functions.php");
if (isLoggedIn()){
	$siteRoot="index.php?inhalt_mitte=";
	$menuStruct = array("Home"=>array("root"=>$siteRoot."include/home.php"),
						"Vorwort"=>array("root"=>$siteRoot."include/vorwort.php"),
						"Eigenschaften"=>array("root"=>$siteRoot."include/eigenschaften.php"),
						"Aufgaben"=>array("root"=>$siteRoot."include/aufgaben.php"),
						"Anmeldung Schlosslauf"=>array("root"=>$siteRoot."include/schlosslauf.php"),
						"Logout"=>array("root"=>$siteRoot."action/logout.php")
					   );
	$url = "";
	if(isset($_GET["inhalt_mitte"])){
		$aktuell = $_GET["inhalt_mitte"]; 
		$url = $siteRoot.$aktuell;
	}
	foreach($menuStruct as $key=>$value)
	{
	  if($url == $value['root'])
	  {
		echo "<a  class=\"fstLevelActive\" href=".$value['root'].">$key</a>\n";
	  }
	  else
	  {
		echo "<a class=\"fstLevel\" href=".$value['root'].">$key</a>\n";
	  }
	}
}
else {
	header("Location: ../index.php");
}
?>