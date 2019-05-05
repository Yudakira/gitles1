<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>

<body>

<!-- Dit is de HEADER -->
<?php
	require('header.php');

?>

<?php
// lees het config-bestand
require_once '../config.php';

// lees alle formuliervelden
$username = $_POST['username'];
$password = $_POST['password'];

// controleer of alle formuliervelden waren ingevuld
if (strlen($username) > 0 && strlen($password) > 0) {

	// versleutel het wachtwoord
	$password = md5($password);

	// maak de controle-query
	$query = "SELECT * FROM mphp4_users
	WHERE username = '$username' AND password = '$password'";

	// voer de query uit
	$result = mysqli_query($mysqli, $query);

	// controleer of de login correct was
	if (mysqli_num_rows($result) == 1) {

		// login correct, start de sessie
		session_start();

		// sla de username op in de sessie
		$_SESSION['username'] = $username;

		//stuur door naar de homepage
		header("Location:home.php");
} else {
		//login incorrect, terug naar het login-formulier
		header("Location:index.php");
		exit;
		}
} else {
		echo "Niet alle velden zijn ingevuld!";
		exit;
	}


?>



<!-- Dit is de FOOTER -->
<?php
	require('footer.php');
?>

</body>
</html>
