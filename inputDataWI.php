<?php

	$connection=mysqli_connect("127.0.0.1", "root", "", "diklatmedan");
	if (!$connection) {
		die("Connection Failed : " . mysqli_connect_error());
	}

	$nip = $_POST['nip_wi'];
	$nama = $_POST['nama_wi'];

	$data = mysqli_query($connection , "SELECT * FROM pengajar WHERE nip=".$nip);
	$countdata = mysqli_fetch_array($data);
	if ($countdata[0] == null) {
		$query = mysqli_query($connection , "INSERT INTO pengajar(nip,nama) VALUES('$nip','$nama')");
		if ($query) {
			echo "<script>alert('Input Data Widyaiswara Berhasil'); window.location = 'dataWidyaiswara.php';</script>";
		}
		else {
			echo mysqli_error($connection);
			header('location: tambahWidyaiswara.php');
		}
	}
	else {
		echo "<script>alert('Data Widyaiswara sudah ada'); window.location = 'tambahWidyaiswara.php';</script>";
	}

?>