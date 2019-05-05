<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>foto_verwerk</title>
</head>

<body>


<!-- Dit is de HEADER -->
<?php
	require('header.php');
?>


<?php
// Controleer of de upload geslaagd is
if (isset($_FILES['foto']) && $_FILES['foto']['error'] ==	0) {


	// Controleer het bestandstype
	if ($_FILES['foto'] ['type'] == "image/jpg" ||
	    $_FILES['foto'] ['type'] == "image/jpeg" ||
			$_FILES['foto'] ['type'] == "image/png" ||
			$_FILES['foto'] ['type'] == "image/gif" ||
	    $_FILES['foto'] ['type'] == "image/pjpeg") {

		// Wat is de fysieke locatie van de uploads-map?
		$map = __DIR__ . "/../uploads/";

		// Maak de bestandsnaam
		$bestand = $_POST['id'] . '.jpg';

		// Verplaats de upload naar de juiste map met de juiste naam
		move_uploaded_file($_FILES['foto']['tmp_name'], $map . $bestand);

		// Stuur de gebruiker terug naar de foto-pagina
		header ("Location:foto.php?id=" . $_POST['id']);

	} else {
		echo "Het bestand is van het verkeerde type.";
		}
	} else {
		echo "Er ging iets fout bij het uploaden.";
	}


?>


<!-- Dit is de FOOTER -->
<?php
	require('footer.php');
?>





</body>
</html>
