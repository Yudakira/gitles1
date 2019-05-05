<?php

require_once 'session.php'

?>

<!-- Dit is de HEADER -->
<?php
	require('header.php');
?>


	<!--- Formulier die doorverwijst naar "lid_nieuw_verwerk.php" --->

	<form action="lid_nieuw_verwerk.php" method="post">

		<p>
			<label for="first_name">Voornaam:</label>
			<input type="text" name="first_name" id="first_name" required="required">
		</p>

		<p>
			<label for="last_name">Achternaam:</label>
			<input type="text" name="last_name" id="last_name" required="required">
		</p>

		<p>
			<label for="birth_date">Geboortedatum</label>
			<input type="date" name="birth_date" id="birth_date" required="required">
		</p>

		<p>
			<label for="member_since">Lid sinds:</label>
			<input type="date" name="member_since" id="member_since" required="required">
		</p>

		<p>
			<input type="submit" name="submit" id="submit" value="Opslaan">
			<button onclick="history.back();return false;">Annuleren</button>
		</p>

	<!--- Formulier afsluiten --->

	</form>


<!-- Dit is de FOOTER -->
<?php
	require('footer.php');
?>
