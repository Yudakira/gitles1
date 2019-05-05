<?php

$id = $_GET['id'];

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>foto</title>
</head>

<body>


<!-- Dit is de HEADER -->
<?php
	require('header.php');
?>

<h1>Upload hier een foto!</h1>
<form action="foto_verwerk.php" method="post" enctype="multipart/form-data">
 <div class="form-group">
		<input type="hidden" name="id" value="<?php echo $id; ?>">

		<p>
			<!----------- Foto ----------->
			<label for="foto">Foto:</label>
			<input type="file" name="foto" id="foto" required="required">
		</p>

		<p>
			<!---------------------- Bevestigen --------------------------->
			<input type="submit" name="submit"value="Uploaden">
			<button onclick="history.back();return false;">Annuleren/Terug</button>
		</p>
 </div>



</form>

<?php
// Is er al een foto voor dit lid?
	if(file_exists(__DIR__ . '/../uploads/' . $id . '.jpg')) {

		echo "<p><img src='../uploads/" . $id . ".jpg' alt='foto'></p>";
	}

?>


<!-- Dit is de FOOTER -->
<?php
	require('footer.php');
?>








</body>
</html>
