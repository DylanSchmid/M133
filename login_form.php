<script type="text/javascript">
$('document').ready(function() {
	$("#loginForm").submit(function() {
		$username = $("#username").val();
		$password = $("#password").val();
		
		$valid = true;
		
		if($username == ''){
			$("#username").addClass("error");
			$valid = false;
		}
		else{
			$("#username").removeClass("error");
		}
		
		if($password == ''){
			$("#password").addClass("error");
			$valid = false;
		}
		else{
			$("#password").removeClass("error");
		}
		
		return $valid;
		
	});
});
</script>
<form id="loginForm" action="action/login.php" method="post">
			Username: <input type="text" id="username" name="username" /><br />
			Passwort: <input type="password" id="password" name="password" /><br />
		<input type="submit" value="Anmelden" />
</form>