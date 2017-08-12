<?php
	
	$connection=mysqli_connect("127.0.0.1", "root", "", "diklatmedan");
	if (!$connection) {
		die("Connection Failed : " . mysqli_connect_error());
	}

	$nip = $_REQUEST['nip'];
	$nama = $_POST['nama_wi'];


	$query = mysqli_query($connection , "UPDATE pengajar set nama='".$nama."' WHERE nip='".$nip."'");

	if ($query) {
		echo "<script>alert('Data Widyaiswara Berhasil Diganti'); window.location = 'dataWidyaiswara.php';</script>";
	}
	else {
		echo mysqli_error($connection);
		header('location: dataWidyaiswara.php');
	}

?>