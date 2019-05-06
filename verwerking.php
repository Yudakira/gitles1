<?php

//sessie beginnen
session_start();

//$mysqli = new mysqli('localhost', 'TestUser', '76715ki5', '80923_db') or die(mysqli_error($mysqli));

//Update eerst ok inactief zetten, dus wanneer je op klikt het aangepast wordt naar een true, dus dat er iets gebeurt
$update = false;

//Variables voor de hand empty strings maken
$id = 0;
$naam = '';
$locatie = '';

//Kijken of de opslaan knop wordt gedruk 
if (isset($_POST['opslaan'])){
$naam = $_POST['naam'];
$locatie = $_POST['locatie'];

//Toevoegen query
$mysqli->query("INSERT INTO crud (naam, locatie) VALUES('$naam', '$locatie')") or die($mysqli->error);

//Sessie berichten
$_SESSION['bericht'] = "Record is opgeslagen!";
$_SESSION['bericht_type'] = "Gelukt";

//Terug gaan naar de hoofdpagina, nadat een gebruiker is toegevoegd
header("location: index.php");
}

//Kijken of de verwijder knop wordt gebruikt
if (isset($_GET['verwijder'])){
$id = $_GET['verwijder'];
$update = true;
$mysqli->query("DELETE FROM crud WHERE id=$id") or die($mysqli->error());

//Sessie berichten
$_SESSION['bericht'] = "Record is verwijdert!";
$_SESSION['bericht_type'] = "Gevaarlijk";

//Terug gaan naar de hoofdpagina, nadat een gebruiker is verwijdert
header("location: index.php");
}

//Kijken of de aanpas knop wordt gebruikt
if (isset($_GET['aanpasen'])){
	$id= $_GET['aanpassen'];
	
	//Aanpas query
	$result = $mysqli->query("SELECT * FROM crud WHERE id=$id") or die($mysqli->error());
	//Als de record gevonden wordt in de database
	if (count($result)==1) {
		//Data terugkeren van de record
		$row = $result->fetch_array();
		$naam = $row['naam'];
		$locatie = $row['locatie'];
	}
}

//Kijken of de update knop gebruikt wordt
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$naam = $_POST['naam'];
	$locatie = $_POST['locatie'];
	
	//Update query
	$mysqli->query("UPDATE crud SET naam='$naam', locatie='$locatie' WHERE id=$id") or die($mysqli->error);
	
	//Sessie berichten
	$_SESSION['bericht'] = "Record is geupdate!";
	$_SESSION['bericht_type'] = "waarschuwing";
	
	//Terug gaan naar de hoofdpagina, nadat een gebruiker is geupdate
	header('location:index.php');
}