<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<!----- band_verwijder_verwerk ----->
	<title>band_verwijder_Verwerk</title>
	<style>
	table, tr, td{
		border: 1px solid red;
		border-collapse: collapse;
		color: royalblue;
	}
	</style>
</head>
<body>

<?php 
	session_start();
	
	
//is het formulieer gestuurd?	
if(isset($_POST['submit']))
{
	require 'config.php';
	
	//variables
	$ID_band = $_POST['ID_band'];
	$Naam = $_POST['Naam'];
	
	//maak de query
	$opdracht = "DELETE FROM back12_bands WHERE ID_band = $ID_band";
	
	    //als de opdracht goed wordt uitgevoerd
		if(mysqli_query($mysqli, $opdracht))
		{
			echo "<p> Band $Naam is verwijderd! </p>";
		}
		//anders
		else
		{
			echo "<p> FOUT BIJ VERWIJDEREN VAN $Naam </p>";
			
		}
		
}
else
{
	echo "<p> Geen gegevens ontvangen </p>";
}

//Terug naar overzicht
echo "<p> <a href='band_uitlees.php'> TERUG </a> Naar overzicht </p>";
?>

</body>
</html>

