<?php
	session_start();
	
	if(isset($_SESSION['Gebruikersnaam']))
	{
		echo "<p> welkom " . $_SESSION['Gebruikersnaam'] . "</p>";
	}
	//Als de require session wordt toegevoegd werkt de pagina niet meer en wordt er gezegd dat 81204.ict-lab.nl je te vaak heeft omgeleid
	 //require 'session.php';
	?>

<!doctype html>
<html>
<head>
<meta charset = "UTF-8">
	<!-- inlogpagina -->
	<title>Inlog</title>
<meta charset="utf-8">
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
			
				//voeg de databaseconnectie toe
				require 'config.php';
					
				//als het formulier gestuurd is
				if(isset($_POST['inlog']))
				{
					
					//lees de gegevens uit
					$Gebruikersnaam = $_POST['Gebruikersnaam'];
					$Wachtwoord = sha1($_POST['wachtwoord']);
					
					//maak de query
					//vraagt of inlognaam en ww van query gelijk is aan $Gebruikersnaam en $Wachtwoord
					$opdracht = "SELECT * FROM back12_gebruikers WHERE Gebruikersnaam = '$Gebruikersnaam' AND wachtwoord = '$Wachtwoord'";
				
					//voer de query uit en vang het resultaat op
					$resultaat = mysqli_query($mysqli, $opdracht);
					//Controleer of het $resultaat een rij (user) heeft opgeleverd
					if(mysqli_num_rows($resultaat) > 0)
					{
						
						//haal de user uit het resultaat
						$user= mysqli_fetch_array($resultaat);
						//zet de gebruikersnaam en Level in 2 verschillende sessions
						$_SESSION['ID'] = $user['ID'];
						$_SESSION['Gebruikersnaam'] = $user['Gebruikersnaam'];
						$_SESSION['Level'] = $user['Level'];
						
						echo "<p> Hallo $Gebruikersnaam, u bent ingelogd </p>";
						
					}
					else
					{
						echo $opdracht;
						echo "<p> Naam en/of wachtwoord zijn onjuist. </p>";
						echo "<p><a href='inlog.php'>Probeer opnieuw </a></p>";
					}	
				}
				//als het resultaat leeg is
				else
				{
					?>
						<!--- Inlog formulier --->
						<h2>INLOG</h2>
							<form method="post" acton="">
								<table border="0">
									<tr>
										<td>Gebruikersnaam:</td>
										<td><input type="text" name="Gebruikersnaam"></td>
									</tr>
									<tr>
										<td>Wachtwoord:</td>
										<td><input type="password" name="wachtwoord"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input type="submit" name="inlog" value="Log In"></td>
									</tr>
								</table>
							</form>
					<?php
				}	
			?>
			
		<h2>Geen account, registreer nu.</h2>
		<form name="bandform" method="post" action="Gebruiker_toevoegen_verwerk.php">
			Inlognaam: <input type="text" name="Gebruikersnaam" maxlength="50" required> <br><br>
			wachtwoord: <input type="password" name="wachtwoord" required maxlength="50"> <br><br>
			<input type="submit" name="verzenden" value="Registreren">
		</form>
		<br>
		    <p><a href="band_uitlees.php">
		 	Direct naar de overzicht van de band als je ingelogd bent! </a>
		 	</p>
	      	<p>
	      	Als u wilt inloggen als admin om ook bands aan te passen
	      	en te verwijderen kunt u de volgende inloggegevens gebruiken <br>
			Gebruikersnaam: admin <br>
			Wachtwoord: geheim <br>
			</p>
			
			<p>
	      	Als u wilt inloggen als test gebruiker om de bands te zien, en niet aan te passen
	        of te verwijderen kunt u de volgende inloggegevens gebruiken <br>
			Gebruikersnaam: thomas <br>
			Wachtwoord: hoi <br>
			</p>
			
			
			
<!----------------- uitloggen ---------------->
<p><a href='uitlogpagina.php'>Uitloggen</a></p>

		

</body>
</html>