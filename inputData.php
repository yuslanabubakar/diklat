<?php

	$connection=mysqli_connect("127.0.0.1", "root", "", "diklatmedan");
	if (!$connection) {
		die("Connection Failed : " . mysqli_connect_error());
	}
	
	$tanggal_db = $_POST['inputTanggal'];
	$datetime = new DateTime($tanggal_db);
	$hari = $datetime->format('l');
	$waktuMulai = mysql_real_escape_string($_POST['inputMulai']);
	$waktuSelesai = mysql_real_escape_string($_POST['inputSelesai']);
	$kegiatan = mysql_real_escape_string($_POST['kegiatan']);
	$jp = mysql_real_escape_string($_POST['listJP']);
	$wi = mysql_real_escape_string($_POST['inputWI']);
	
	$query = mysqli_query($connection , "INSERT into jadwal (hari,tanggal,waktu_mulai,waktu_selesai,kegiatan,jumlah_jp,widyaiswara) values ('$hari','$tanggal_db','$waktuMulai','$waktuSelesai','$kegiatan','$jp','$wi')");
	
	if ($query) {
		header('location: index.php?msg=success');
	}
	else {
		echo mysqli_error($connection);
		// header('location: input_jadwal.php?msg=failed');
	}

?>