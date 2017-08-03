<?php
	setlocale (LC_TIME, 'INDONESIA');
	$connection=mysqli_connect("127.0.0.1", "root", "", "diklatmedan");
	if (!$connection) {
		die("Connection Failed : " . mysqli_connect_error());
	}
	
	$tanggal_db = $_POST['inputTanggal'];
	$datetime = new DateTime($tanggal_db);
	$hari = $datetime->format('l');
	$waktuMulai = mysql_real_escape_string($_POST['inputMulai']);
	$waktuSelesai = mysql_real_escape_string($_POST['inputSelesai']);
	$nama_diklat = mysql_real_escape_string($_POST['nama_diklat']);
	$kegiatan = mysql_real_escape_string($_POST['kegiatan']);
	$jp = mysql_real_escape_string($_POST['listJP']);
	$wi = mysql_real_escape_string($_POST['inputWI']);
				
	$countdata 	= mysqli_query($connection , "SELECT * FROM jadwal WHERE  widyaiswara = '".$wi."' order by tanggal desc, waktu_mulai");
	$getData 	= mysqli_fetch_array($countdata);
	$cek 		= 1;
	if ($getData[0] == null) {
		$query = mysqli_query($connection , "INSERT into jadwal (hari,tanggal,waktu_mulai,waktu_selesai,nama_diklat,kegiatan,jumlah_jp,widyaiswara) values ('$hari','$tanggal_db','$waktuMulai','$waktuSelesai','$nama_diklat','$kegiatan','$jp','$wi')");
		if ($query) {
			header('location: index.php?msg=success');
		}
		else {
			echo mysqli_error($connection);
			// header('location: input_jadwal.php?msg=failed');
		}		
	} else {
		$countdata 	= mysqli_query($connection , "SELECT * FROM jadwal WHERE  widyaiswara = '".$wi."' order by tanggal desc, waktu_mulai");
		while($dtCek = mysqli_fetch_array($countdata)) {
		   if ($tanggal_db == $dtCek['tanggal']) {
			$strjammulai 	= date("H:i", strtotime($dtCek['waktu_mulai'])); 
			$strjamselesai 	= date("H:i", strtotime($dtCek['waktu_selesai'])); 
			if (
			($waktuMulai < $strjamselesai && $waktuMulai > $strjammulai) ||
			($waktuMulai > $waktuSelesai) ||
			($waktuSelesai > $strjammulai && $waktuSelesai < $strjamselesai)
			
			) {
			  $cek = 0;
			}
		   }
		}
		
		if ($cek == 1) {
			$query = mysqli_query($connection , "INSERT into jadwal (hari,tanggal,waktu_mulai,waktu_selesai,nama_diklat,kegiatan,jumlah_jp,widyaiswara) values ('$hari','$tanggal_db','$waktuMulai','$waktuSelesai','$nama_diklat','$kegiatan','$jp','$wi')");
			if ($query) {
				header('location: index.php?msg=success');
			}
			else {
				echo mysqli_error($connection);
				// header('location: input_jadwal.php?msg=failed');
			}
		}
		else {
			// JAVASCRIPT
		}
	}
	

	

?>