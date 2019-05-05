<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<!----- band_toevoeg_verwerk ----->
	<title>band_toevoeg_verwerk</title>
	<style>
	table, tr, td{
		border: 1px solid #00492C;
		border-collapse: collapse;
		color: royalblue;
	}
	</style>
</head>
<body>

<?php
// voeg de databasegegevens toe aan de pagina
require 'config.php'; // Je hebt config.php nodig om de gegevens van de database te gebruiken
	
if (isset($_POST['VoegToe'])) 
{
	 //Variables
	 $Bandnaam = $_POST['Bandnaam'];
	 $Landnaam  = $_POST['Landnaam'];
	 $AantalLeden = $_POST['Leden'];
	 $Muziek = $_POST['Muziek'];
	 $info = $_POST['info'];
	
	
	//Maak de query
	$opdracht = "INSERT INTO back12_bands VALUES (NULL, '$Bandnaam', '$Landnaam', '$AantalLeden', '$Muziek', '$info')";
	
	if (mysqli_query($mysqli, $opdracht)){
		echo "$Bandnaam is toegevoegd.<br>"; //Band is toegevoegd
	} 

	else {
		echo "FOUT bij toevoegen $Bandnaam! <br/>"; //Als een band toevoegen niet werkt
		echo "Query: $opdracht <br/>";
		echo "Foutmelding: " . mysqli_error($mysqli);
	}
	
}
?><br>
	
<!--- Terug naar band_toevoeg.html --->	
<a href="band_toevoeg.html">Terug</a> 

	
	
</body>
</html>