<?php 

	require_once '../database/db_connect.php';

	$sql = "DELETE FROM ministry WHERE traitor_id = " .$_GET['id'];
	if (mysqli_query($mysqli,$sql)) {
		echo "<script>alert('successfully deleted!');window.location.href = 'index.php';</script>";
	}


 ?>