
<?php

	//KA5fHM
	require "config.php";

	$data = [];

	$query = "SELECT * FROM mphp4_leden";

	$result = mysqli_query($mysqli, $query);

	while ($row = mysqli_fetch_array($result))
		{

		$data[] = $row;
	}

	echo json_encode($data);

	?>
