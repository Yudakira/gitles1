<?php

// lees het sessie bestand
require_once 'session.php';

// lees het config bestand
require_once '../config.php';

	//lees alle formuliervelden
	$id = $_POST['id'];
	$first_name = $_POST ['first_name'];
	$last_name = $_POST ['last_name'];
	$birth_date= $_POST ['birth_date'];
	$member_since = $_POST ['member_since'];

	// controleer of alle formuliervelden waren ingevuld

	if (is_numeric($id) &&
		strlen($id) > 0 &&
	  strlen($first_name) > 0 &&
	  strlen($last_name) > 0 &&
		strlen($birth_date) > 0 &&
	  strlen($member_since) > 0) {

		// controleer of de data wel correct zijn
		$check1 = strtotime($birth_date);
		$check2 = strtotime($member_since);
		if (date('Y-m-d', $check1) == $birth_date &&
			date ('Y-m-d', $check2) == $member_since) {


			// alle data zijn OK, maak de query
			$query = "UPDATE mphp4_leden
				SET
				first_name = '$first_name',
				last_name = '$last_name',
				birth_date = '$birth_date',
				member_since = '$member_since'
				WHERE id = $id";

			// voer de query uit
			$result = mysqli_query($mysqli, $query);

			// controleer het resultaat
			if ($result) {
			// alles OK, stuur terug naar de homepage
			header("Location:home.php");
			exit;
			} else {
				echo 'Er ging wat mis met het toevoegen!';
			}
		} else {
			// er is iets mis met een datum
			echo 'Een van de ingevulde data was ongeldig!';
		}
	} else {
	echo 'Niet alle velden waren ingevuld!';
	}


?>


<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>lid_nieuw_verwerk</title>
</head>

<body>
</body>
</html>
