<?php
	$connection=mysqli_connect("127.0.0.1", "root", "", "diklatmedan");
	if (!$connection) {
		die("Connection Failed : " . mysqli_connect_error());
	}
	
	$query = mysqli_query($connection , "SELECT * from jadwal");
	
	$widyaiswara = $_POST['widyaiswara'];
	$pilihan = $_POST['pilihan'];
	$tahun = date("Y");
	$tahunbulan = date("Y")."-".date("m");\
	
	if ($pilihan == "bulan") {
		$data = mysqli_query($connection , "SELECT * from jadwal where widyaiswara='".$widyaiswara."'");
		while ($dt = mysqli_fetch_array($data)) {
			if (substr($dt['tanggal'],0,7) == $tahunbulan) {
				echo $dt['tanggal'];
			}
		}
	}
	else if ($pilihan == "tahun") {
		$data = mysqli_query($connection , "SELECT * from jadwal where widyaiswara='".$widyaiswara."'");
		while ($dt = mysqli_fetch_array($data)) {
			if (substr($dt['tanggal'],0,4) == $tahun) {
				echo $dt['tanggal'];
			}
		}
	}
?>