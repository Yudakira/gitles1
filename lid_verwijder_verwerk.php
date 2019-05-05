<?php

require_once 'session.php';

//lees het config-bestand
require_once '../config.php';

//  lees het ID uit de URL
$id = $_GET['id'];

// is het ID een nummer ?
if (is_numeric($id)) {
	// verwijder het lid ui de database
	$result = mysqli_query($mysqli, "DELETE FROM mphp4_leden WHERE id = $id");

	// controleer het resultaat
	if ($result) {
		// alles OK, stuur terug naar de homepage
		header("Location:home.php");
		exit;
} else {
	echo 'Er ging wat mis met het verwijderen!';
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
	<title>Lid_verwijder_verwerk</title>
</head>

<body>
</body>
</html>
