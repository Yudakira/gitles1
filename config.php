<?php
// database logingegevens
$db_hostname = 'localhost';
$db_username = '80923';
$db_password = 'QsaAB3';
$db_database = 'db80923';

// maak de database-verbinding
if ($mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database))
{

}
else
{
	echo "Er is een fout opgetreden met het verbinden met de database!";
}

?>



