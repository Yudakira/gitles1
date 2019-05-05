<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Inloggen</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

<!-- Dit is de HEADER -->
<?php
	require('header.php');
?>


<h1>Inloggen</h1>
	<!-- Info over admin en gebruikers -->
	<p>Hier moet u inloggen als admin en kunt u de details van leden zien, bewerken, verwijderen en een foto uploaden!
	<br>
	Daarnaast kunt u ook nieuwe leden registeren die in de navbar staat. Login in met de volgende gegevens: Gebruikersnaam: "admin" en wachtwoord: "geheim".
  </p>

<form action="login.php" method="post">

	<p>
		<label for="username">Gebruikersnaam:</label>
		<input type="text" name="username" id="username" required="required">
	</p>

	<p>
		<label for="password">Wachtwoord:</label>
		<input type="password" name="password" id="password" required="required">
	</p>

	<p>
		<input type="submit" name="submit" id="submit" value="Inloggen">
	</p>


</form>

<!-- Dit is de FOOTER -->
<?php
	require('footer.php');
?>



</body>
</html>
