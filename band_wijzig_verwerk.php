<?php
session_start();
//Is het formulier verstuurd?	
if (isset($_POST['submit']))
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<!----- Band_wijzig_verwerk ----->
	<title>band_wijzig_verwerk</title>
</head>
<body>

<?php
	
	
//Is het formulier verstuurd?	
if (isset($_POST['submit']))
{

	//Voeg de koppelingen naar de database toe
	require 'config.php';
	
	//Lees het formulier uit
	$ID_band = $_POST['ID_band'];
	$Naam = $_POST['Naam'];
	$Muzieksoort = $_POST['Muzieksoort'];
	$Info = $_POST['Info'];
	$Land = $_POST['Land'];
	$AantalLeden = $_POST['AantalLeden'];
	$Aanpassen = $_POST['Aanpassen'];
	
	//Maak de query
	$query = "UPDATE back12_bands SET Naam = '$Naam', Muzieksoort = '$Muzieksoort', Info = '$Info', Land = '$Land', AantalLeden = $AantalLeden WHERE ID_band = $ID_band";
	
	echo $query . "<br/>"; //TIJDELIJKE TEST
	print_r($_POST);
	
	//Als de opdracht goed wordt uitgevoerd:
	if(mysqli_query($mysqli, $query))
	{
		echo "<p>Band $Naam is aangepast!.</p>";
	}
	
	//Anders:
	else
	{
		echo "<p>FOUT bij aanpassen user met id $ID_band.</p>";
		echo mysqli_error($mysqli);		//TIJDELIJK
	}
	
	}
	else
	{
		echo "<p>Geen gegevens ontvangen....</p>";
	}

	echo "<p><a href='band_uitlees.php'>TERUG</a> naar overzicht</p>";

?>




</body>
</html>