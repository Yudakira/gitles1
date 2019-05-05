<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<!----- band_verwijder ----->
	<title>band_verwijder</title>
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
	session_start();
	
	//session.php nodig
	require 'session.php';
	
	//config.php nodig
	require 'config.php';
	
	//variablen
	$ID_band = $_GET['id']; //haal het user-id uit de url code
	$opdracht = "SELECT * FROM back12_bands WHERE ID_band = " .$ID_band; //maak de query
	$resultaat = mysqli_query($mysqli, $opdracht); //voeg de query toe
	
	if(mysqli_num_rows($resultaat) == 0) //als de query niet bestaat
	{
		echo "<h2> Er is geen user met ID $ID_band. </h2>";
		
	}
	else
		{
			$rij = mysqli_fetch_array($resultaat); //haal de rij user uit het resultaat
			?>
			
			<!----- HTML formulier ---->
			<p>Wilt u de volgende band verwijderen?</p>
			<form name="Verwijder" method="post" action="band_verwijder_verwerk.php">
			<input type="hidden" name="ID_band" value="<?php echo $rij['ID_band'] ?>">
			<p>Band
			<input type="text" name="Naam" value="<?php echo $rij['Naam'] ?>" disabled/></p>
			<p>Land van herkomst: 
			<input type="text" name="Land" value="<?php echo $rij['Land'] ?>" disabled/> </p>
			<p> <input type="submit" name="submit" value="Verwijder" /> </p>
			</form>
			<p> <a href="band_uitlees.php">Terug </a>Naar overzicht </pa>
			<?php
		}
?>


</body>
</html>