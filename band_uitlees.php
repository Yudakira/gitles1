<?php
	session_start();
	
	require 'session.php';
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<!----- band_uitlees ----->
	<title>band_uitlees</title>
	<style>
	table, tr, td{
		border: 1px solid #00492C;
		border-collapse: collapse;
		color: royalblue;
	}
	</style>
</head>
<body>
<table>
<?php
		
	//config.php nodig
	require 'config.php';
	
//Opdracht
$opdracht = "SELECT * FROM back12_bands";
	
//Resultaat
$resultaat = mysqli_query($mysqli, $opdracht);

//Bands
echo "<h2>Alle gegevens uit de tabel 'bands':</h2>";
echo "<tr>";
echo "<td>Band ID</td>";
echo "<td>Bandnaam:</td>";
echo "<td>Detail:</td>";
echo "<td>Wijzig</td>";
echo "<td>Verwijderen</td>";
echo "</tr>";

	while($rij = mysqli_fetch_array($resultaat))
	{
		

		echo "<tr>";
		echo " <td>" .$rij['Naam']. "<br></td>";  
		echo "<td>" .$rij['Muzieksoort']. "<br></td>";
		echo "<td>";
		if($_SESSION['Level'] >= 0)
		{
			echo "<a href='band_detail.php?id=".$rij['ID_band']. "'> Detail </a> <br>";
		}
		echo "</td>";
		echo "<td>";
		if($_SESSION['Level'] >1)
		{
			echo "<a href='band_wijzig.php?id=".$rij['ID_band']. "'> Wijzig </a> <br>";
		}
		echo "</td>";
		echo "<td>";
		if($_SESSION['Level'] >1)
		{
			echo "<a href='band_verwijder.php?id=".$rij['ID_band']. "'> Verwijder </a> <br> ";
		}
		echo "</td>";
		echo " </tr>";
		
	}
	echo "</table>";

?>


</table>


</body>
</html>