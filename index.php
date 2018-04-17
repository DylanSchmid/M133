<?php
	require_once("include/login_functions.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../../Users/mikem/PhpstormProjects/m133_vpe_meier_schmid/css/screen.css">
<script src="../../../Users/mikem/PhpstormProjects/m133_vpe_meier_schmid/js/jquery-3.2.1.min.js" ></script>
</head>
<body>
	
<div id="kopf"> 
  <?PHP
    include "include/kopf.php";	
  ?>
</div>
  
<div id="inhalt_links">
    <?PHP
	if(isLoggedIn()){
		include "include/navigation.php";
	}
    ?>
</div>
			
			
<div id="inhalt_mitte"> 
    <?PHP
	if(isLoggedIn()){
		if(isset($_GET["inhalt_mitte"])){    
			include(htmlspecialchars($_GET["inhalt_mitte"], ENT_QUOTES, 'UTF-8'));
		}
		else{
			include("include/home.php");	
		}
	}else{
		include("include/login_form.php");
	}
    ?>      
</div>
        
</body>
</html>