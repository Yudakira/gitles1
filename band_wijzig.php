<?php
	session_start();
	
	require 'session.php';
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<!----- band_wijzig ----->
	<title>band_wijzig</title>
	<style>
	table, tr, td{
		border: 1px solid #00492C;
		color: royalblue;
		border-collapse: collapse;
	}
	</style>
</head>
<body>


	<?php	
	
//id binnenkrijgen	
$ID_band = $_GET['id'];
echo "<h2>Gegevens van de band met id $ID_band:</h2>";
echo "<tr>";
echo "</tr>";
	
	//Je hebt config.php nodig om de gegevens van de database te krijgen.
	require 'config.php';
	
	//query
	$query = "SELECT * FROM back12_bands WHERE ID_band = " . $ID_band;
	$resultaat = mysqli_query($mysqli, $query);
	if (mysqli_num_rows($resultaat) == 0)
	{
		echo "<p> Er is geen user met ID $ID_band</p>";
		
	}
	else
	{
		$rij = mysqli_fetch_array($resultaat);  //resultaat
	?>
	
	<!---- Pagina, met het verwerken van de bands ---->
	<form name="form1" method="post" action="band_wijzig_verwerk.php">
		<table width="200" border="0">
		   
			<tr>
				<td>Band_ID:</td>
				<td><input type="number" name="ID_band" value="<?php echo $rij['ID_band'] ?> " readonly</td>
			</tr>

			
			<tr>
				<td>Bandnaam</td>
				<td><input type="Naam" name="Naam" value="<?php echo $rij ['Naam'] ?>"</td>
			</tr>
			
			
			<tr>
				<td>Land van herkomst</td>
				<td><input type="Land" name="Land" value="<?php echo $rij ['Land'] ?>"</td>
			</tr>
			
			<tr>
				<td>Aantal leden</td>
				<td><input type="AantalLeden" name="AantalLeden" value="<?php echo $rij ['AantalLeden'] ?>"</td>
			</tr>
			
			<tr>
				<td>Muzieksoort</td>
				<td><input type="Muzieksoort" name="Muzieksoort" value="<?php echo $rij ['Muzieksoort'] ?>"</td>
			</tr>
	
			<tr>
				<td>Info</td>
				<td><input type="Info" name="Info" value="<?php echo $rij ['Info'] ?>"</td>
			</tr>

				
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Aanpassen"</td> <!------ Aanpassen ------>
			</tr>			
		</table>		
	</form>

		
<?php
	
}
					  	
?>


</body>
</html>