<?php
	if (strpos($_SERVER['PHP_SELF'], 'include') !== false){
		require_once("login_functions.php");
	} else {
		require_once("include/login_functions.php");
	}
	if (isLoggedIn()): ?>
<br>
<title>Anmeldung Schlosslauf</title>
<script type="text/javascript">
$( document ).ready(function() {
	
	$("#schlosslaufForm").submit(function() {
	
		var lastName = $("#lastName").val();
		var firstName = $("#firstName").val();
		var street = $("#street").val();
		var place = $("#place").val();
		var postcode = $("#postcode").val();
		var mail = $("#mail").val();
		var group = $("#group").val();
		var country = $("#country").val();
		var language = $("#language").val();
		
		var valid = true;
		
		if (group <= 0 || group == null){
			$("#group").addClass("error");
			valid = false;
		}
		else{
			$("#group").removeClass("error");
		}
		
		if (country <= 0 || country == null){
			$("#country").addClass("error");
			valid = false;
		}
		else{
			$("#country").removeClass("error");
		}
		
		if (language <= 0 || language == null){
			$("#language").addClass("error");
			valid = false;
		}
		else{
			$("#language").removeClass("error");
		}
		
		var format = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
		
		return valid;
	  
	  
	});
});
</script>
</head>
<body>

<?php
	require_once("db/mysql.class.php");
	$DB = new DBConnector();
?>

<h2>Anmeldung Schlosslauf</h2>

<form id="schlosslaufForm" action="action/save.php" method="post">
	<table>
		<tr>
			<td>Name: *</td>
			<td><input type="text" id="lastName" name="lastName" required></td>
		</tr>
		<tr>
			<td>Vorname: *</td>
			<td>    <input type="text" id="firstName" name="firstName" required></td>
		</tr>
		<tr>
			<td>Strasse: *</td>
			<td> <input type="text"  id="street" name="street" required></td>
		</tr>
		<tr>
			<td>Ort: *</td>
			<td>  <input type="text" id="place" name="place" required></td>
		</tr>
		<tr>
			<td>PLZ: *</td>
			<td> <input type="number"  id="postcode" name="postcode" required></td>
		</tr>
		<tr>
			<td>E-Mail: * </td>
			<td> <input type="email"  id="mail" name="mail" required></td>
		</tr>
		<tr>
			<td>Gruppe: *</td>
			<td>
				<select  id="group" name="group" required>
					<option value="-1" selected="selected" disabled="true">Bitte wählen...</option>
					<?php
						$result = $DB->getGroups();
						while($row = $result->fetch()){
							echo '<option value="'.$row['ID'].'">'.utf8_encode($row['name']).'</option>';
						}
						
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Land: * </td>
			<td>
				<select  id="country" name="country" required>
					<option value="-1" selected="selected" disabled="true">Bitte wählen...</option>
					<?php
						$result = $DB->getCountrys();
						while($row = $result->fetch()){
							echo '<option value="'.$row['ID'].'">'.utf8_encode($row['name']).'</option>';
						}
						
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Sprache: *</td>
			<td>
				<select  id="language" name="language" required>
					<option value="-1" selected="selected" disabled="true">Bitte wählen...</option>
					<?php
						$result = $DB->getLanguages();
						while($row = $result->fetch()){
							echo '<option value="'.$row['ID'].'">'.utf8_encode($row['name']).'</option>';
						}
						
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Absenden">
			</td>
			<td>
				<input type="reset" value="Abbrechen">
			</td>
		</tr>
	</table>
</form>
<?php else:
	header("Location: ../index.php");
endif; ?>