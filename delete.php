<?php
	$connection=mysqli_connect("127.0.0.1", "root", "", "diklatmedan");
	if (!$connection) {
		die("Connection Failed : " . mysqli_connect_error());
	}
	
	$id_jadwal = $_GET['id_jadwal'];
	$query = mysqli_query($connection , "DELETE FROM jadwal WHERE id_jadwal=".$id_jadwal);
	header('location: index.php');
?>