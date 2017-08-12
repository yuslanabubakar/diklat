<?php
	$connection=mysqli_connect("127.0.0.1", "root", "", "diklatmedan");
	if (!$connection) {
		die("Connection Failed : " . mysqli_connect_error());
	}
	
	$nip = $_POST['nip'];
	$query = mysqli_query($connection , "DELETE FROM pengajar WHERE nip=".$nip);
	// header('location: index.php');
?>