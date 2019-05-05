<?php
	session_start();
	?>

<!doctype html>
<html>
<head>
</head>
<body>

<?php
require 'config.php';

//Variables gebruikersnaam en wachtwoord
$Gebruikersnaam = $_POST['Gebruikersnaam'];
$Wachtwoord = sha1($_POST['wachtwoord']);

//Maak de query
$opdracht = "INSERT INTO back12_gebruikers VALUES(NULL, '$Gebruikersnaam', '$Wachtwoord', NULL)";

//Voer de opracht uit
if(mysqli_query($mysqli, $opdracht))
{
	echo "<p>Gebruiker  " .$Gebruikersnaam. " is toegevoegd!</p>";

	?>
	<a href="inlog.php">terug </a>
	<?php
}
else
{
	echo "<p> Fout bij Toevoegen" .$Gebruikersnaam. "</p>";
	echo mysqli_error($mysqli);
	echo $opdracht;
	?>
	
	<!--- Terug naar inlog.php --->
	<a href="inlog.php">Terug</a>
	<?php
}
?>

</body>
</html>