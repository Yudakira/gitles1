<?php

//lees het sessie bestand
require_once 'session.php';

//lees het config-bestand
require_once 'config.php';

// lees het ID uit de URL
$id = $_GET['id'];

// is het ID een nummer?
if (is_numeric($id)) {
	//lees het lid uit de database
	$result = mysqli_query($mysqli, "SELECT * FROM mphp4_leden WHERE id = $id");

	// is er een lid gevonden met dit ID?
	if (mysqli_num_rows($result) == 1) {
		// ja, lees het lid uit de dataset
		$row = mysqli_fetch_array($result);
	} else {
		echo "Geen lid gevonden.";
		exit;
	}
} else {
	// het ID was geen nummer
	echo "Onjuist ID.";
	exit;
}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lid verwijderen</title>
</head>
<body>

	<h1>Lid verwijderen</h1>


<!-- Dit is de HEADER -->
<?php
	require('header.php');
?>


	<p>
		Weet je zeker dat je het lid
		<strong><?php echo $row['first_name'] . " " . $row['last_name']; ?></strong>
		wilt verwijderen?
	</p>

	<p>
		<a href="lid_verwijder_verwerk.php?id=<?php echo $id; ?>">Ja, verwijderen</a>
		/
		<a href="home.php">Nee, terug</a>
	</p>


<!-- Dit is de FOOTER -->
<?php
	require('footer.php');
?>







</body>
</html>
