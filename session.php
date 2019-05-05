<?php
	session_start();
	
	if(!isset($_SESSION['Gebruikersnaam']))
	{
		header("location:inlog.php");
	}
	else
	{
		echo "<p> Welkom " . $_SESSION['Gebruikersnaam'] . "</p>";
		echo "<p> <a href='uitlogpagina.php'> Uitloggen </a></p>";
	}
?>