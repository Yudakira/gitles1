<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>band_detail</title>
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
	
//config.php, heb je nodig om gegevens van de database te krijgen.
require 'config.php';
	
//user_id uit het URL	
$band = $_GET['id'];
	
//query
$query = "SELECT * FROM back12_bands WHERE ID_band = " . $band;

//'resultaat'                      
$resultaat = mysqli_query($mysqli, $query);
	
//Als het resultaat uit 0 rijen bestaat
if (mysqli_num_rows($resultaat) == 0)
{
	echo "<p>Er is geen user met ID $band.</p>";
	header("location:band_uitlees.php");
}	
	
//Als er wel rijen zijn gevonden
else
{
	echo "<p>Gegevens van user met ID $band:</p>";
	//Haal de rij (user) uit het resultaat
	$rij = mysqli_fetch_array($resultaat);
	
	?>
	
 <!---- Tabel met de gegevens van de bands ---->
 <table>
	
	<tr>
		<td>Naam van land:</td>
		<td> <?php echo $rij['Naam'] ?> </td>
	</tr>
	
	<tr>
		<td>Land van herkomst:</td>
		<td> <?php echo $rij['Land'] ?></td>
	</tr>
	
	<tr>
		<td>Aantal Leden:</td>
		<td> <?php echo $rij['AantalLeden'] ?></td>
	</tr>
	
	<tr>
		<td>Soort muziek:</td>
		<td> <?php echo $rij['Muzieksoort'] ?></td>
	</tr>
	
	<tr>
		<td>Extra informatie:</td>
		<td> <?php echo $rij['Info'] ?></td>
	</tr>
	
	<!---- Overview ---->
	<td> <a href="band_uitlees.php">Overview:</a></td>
 </table>
<?php
}
	
?>
	

</body>
</html>