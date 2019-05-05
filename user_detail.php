<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>user_detail</title>
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
	
//config.php
require 'config.php'; //Config.php heb je nodig, om het data binnen te krijgen.
	
//user_id uit het URL	
$band = $_GET['id']; //ID binnen krijgen
	
//query
$query = "SELECT * FROM back12_bands WHERE ID_band = " . $band; //Band binnenkrijgen

//'resultaat'                      
$resultaat = mysqli_query($mysqli, $query); //Resultaat
	
//Als het resultaat uit 0 rijen bestaat 
if (mysqli_num_rows($resultaat) == 0)
{
	echo "<p>Er is geen user met ID $band</p>"; 
	header("location:band_uitlees.php");
}	
	
//Als er wel rijen zijn gevonden
else
{
	echo "<p>Gegevens van user met ID $band</p>	";
	//Haal de rij (user) uit het resultaat
	$rij = mysqli_fetch_array($resultaat);
	
	?>

	<table>
	
	<tr>
	<td>Naam:</td>
	<td> <?php echo $rij['Naam'] ?> </td> <!---- Naam van de band ---->
	</tr>
	
	<tr>
	<td>Muzieksoort:</td>
	<td> <?php echo $rij['Muzieksoort'] ?></td> <!---- Naam van de muzieksoort---->
	</tr>
	
	
	</table>
	
<?php
}
	
?>
	

</body>
</html>