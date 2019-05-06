<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Homepagina</title>

	<!-- Scripts -->
	<script src="../js/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>

	<!-- verwerken van de formulieren, slaat de gegevens op naar de database -->
<?php 
	require_once 'verwerking.php';
?>

	<?php
	
	//Als de bericht lukt, dan komt de class alert aanbod dat aangeeft of iets toevoegd of verwijder wordt, de achtergrondkleur van het bericht wordt dan aangepast naarmate iets toegevoegd of verwijdert wordt
	if (isset($_SESSION['bericht'])): ?>
	
	<!-- Type van het bericht bekijken en daar een achtergrondkleur meegeven -->
	<div class="alert alert-<?=$_SESSION['bericht_type']?>">
		
		<?php
			echo $_SESSION['bericht'];
			unset($_SESSION['bericht']);
		 ?>
	</div>
	
	<!-- if statement beeindigen -->
	<?php endif ?>
	
<!-- paddingsen margins -->
<div class="container">
<?php

//$mysqli = new mysqli('localhost', 'TestUser', '76715ki5', '80923_db') or die(mysqli_error($mysqli));

// maak de database-verbinding
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

$result = $mysqli->query("SELECT * FROM crud") or die($mysqli->error);
//pre_r($result);
?>

<div class="row justify-content-center">
<table class="table">
		<thead>
			<tr>
				<th>Naam</th>
				<th>Locatie</th>
				<th collspan="2">Actie</th>
			</tr>
		</thead>

	<?php
	//Looping door de result assoc functie, haalt de records op van de database en komen als resultaat uit
	while ($row = $result-fetch_assoc());
	
	?>
	<tr>
		<td><?php echo $row['naam']; ?></td>
		<td><?php echo $row['locatie']; ?></td>
		<td>
			<!-- waar onze form bevind -->
			<a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Aanpassen</a>
			<a href="verwerk.php?delete=<?php echo $row['id']; ?>"
					 class="btn btn-danger">Verwijderen</a>
		</td>
	</tr>
	<!-- While loop beindigen -->
	<?php endwhile; ?>
	</table>
</div>
<?php

function pre_r ($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

?>

<!-- Formulieren -->
<div class="row justify-content-center">
	<form action="verwerking.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="form-group">
			<label>Naam</label>
			<input type="text" name="naam" class="form-control" value="<?php echo $naam; ?>" placeholder="Voer je naam in">
		</div>

		<div class="form-group">
			<label>Locatie</label>
			<input type="text" name="locatie" class="form-control" value="<?php echo $locatie; ?>" placeholder="Voer je locatie in">
		</div>

		<div class="form-group">
			<?php
			//Als de update knop gedrukt wordt
			if ($update == true):
			?>
			<button type="submit" class="btn btn-info" name="update">Update</button>
			<!-- else -->
			<?php else: ?>
			
			<button type="submit" class="btn btn-primary" name="opslaan">Opslaan</button>
			<!-- if statement beeindigen -->
			<?php endif; ?>
		</div>
	</form>	
</div>
</div>
</body>
</html>