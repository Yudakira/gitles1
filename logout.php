<?php

// start de sessie
session_start();

// vernietig de sessie
session_destroy();

// ga naar de inlogpagina
header ("Location:index.php");
	
?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Logout</title>
</head>
<style>

	
</style>

<body>


<!-- Dit is de HEADER -->
<?php
	require('header.php');
?>


<!-- Dit is de FOOTER -->
<?php
	require('footer.php');
?>


</body>
</html>