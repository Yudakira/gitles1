<?php

require_once 'session.php';

// lees het config bestand
require_once 'config.php';

// lees het ID uit de URL
$id = $_GET['id'];

// is het ID een nummer?
if (is_numeric($id)) {
	// lees het lid uit de database
	$result = mysqli_query($mysqli, "SELECT * FROM mphp4_leden WHERE ID = $id");

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
	<title>Ledenbeheer</title>
</head>

<body>


	<h1>Lid bewerken</h1>


<!-- Dit is de HEADER -->
<?php
	require('header.php');
?>


	<!--- Formulier die doorverwijst naar "lid_nieuw_verwerk.php" --->

	<form action="lid_bewerk_verwerk.php" method="post">

		<input type="hidden" name="id" value="<?php echo $id; ?>">

		<p>
			<label for="first_name">Voornaam:</label>
			<input type="text" name="first_name" id="first_name" required="required"
			value="<?php echo $row['first_name']; ?>">
		</p>

		<p>
			<label for="first_name">Achternaam:</label>
			<input type="text" name="last_name" id="last_name" required="required"
			value="<?php echo $row['last_name']; ?>">
		</p>

		<p>
			<label for="first_name">Geboortedatum</label>
			<input type="date" name="birth_date" id="birth_date" required="required"
			value="<?php echo $row['birth_date']; ?>">
		</p>

		<p>
			<label for="first_name">Lid sinds:</label>
			<input type="date" name="member_since" id="member_since" required="required"
			value="<?php echo $row['member_since']; ?>">
		</p>

		<p>
			<input type="submit" name="submit" id="submit" value="Bewerken">
			<button onclick="history.back();return false;">Annuleren</button>
		</p>

	<!--- Formulier afsluiten --->

	</form>


<!-- Dit is de FOOTER -->
<?php
	require('footer.php');
?>


</body>
</html>
