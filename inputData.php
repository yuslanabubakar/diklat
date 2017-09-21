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
	$penyelenggara = mysql_real_escape_string($_POST['penyelenggara']);
	$nama_diklat = mysql_real_escape_string($_POST['nama_diklat']);
	$kegiatan = mysql_real_escape_string($_POST['kegiatan']);
	$jp = mysql_real_escape_string($_POST['listJP']);
	$wi = mysql_real_escape_string($_POST['inputWI']);
				
	$countdata 	= mysqli_query($connection , "SELECT * FROM jadwal WHERE  widyaiswara = '".$wi."' order by tanggal desc, waktu_mulai");
	$getData 	= mysqli_fetch_array($countdata);
	$cek 		= 1;
	$tanggalAda = "";
	$diklatAda = "";
	$kegiatanAda = "";
	if ($getData[0] == null) {
		$query = mysqli_query($connection , "INSERT into jadwal (hari,tanggal,waktu_mulai,waktu_selesai,penyelenggara,nama_diklat,kegiatan,jumlah_jp,widyaiswara) values ('$hari','$tanggal_db','$waktuMulai','$waktuSelesai','$penyelenggara','$nama_diklat','$kegiatan','$jp','$wi')");
		if ($query) {
			header('location: home.php');
		}
		else {
			echo mysqli_error($connection);
			header('location: input_jadwal.php');
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
			($waktuMulai == $strjammulai && $waktuSelesai == $strjamselesai) ||
			($waktuSelesai > $strjammulai && $waktuSelesai < $strjamselesai) || ($waktuMulai < $strjammulai && $waktuSelesai > $strjamselesai)
			
			) {
			  $cek = 0;
			  $tanggalAda = $dtCek['tanggal'];
			  $diklatAda = $dtCek['nama_diklat'];
			  $kegiatanAda = $dtCek['kegiatan'];
			}
		   }
		}
		
		if ($cek == 1) {
			$query = mysqli_query($connection , "INSERT into jadwal (hari,tanggal,waktu_mulai,waktu_selesai,penyelenggara,nama_diklat,kegiatan,jumlah_jp,widyaiswara) values ('$hari','$tanggal_db','$waktuMulai','$waktuSelesai','$penyelenggara','$nama_diklat','$kegiatan','$jp','$wi')");
			if ($query) {
				echo "<script>alert('Input Data Jadwal Berhasil'); window.location = 'home.php';</script>";
			}
			else {
				echo mysqli_error($connection);
				header('location: input_jadwal.php');
			}
		}
		else {
			echo "<script>alert('Terjadi kegagalan. Widyaiswara " . $wi . " sudah ada jadwal di diklat " . $diklatAda . " dalam kegiatan " . $kegiatanAda . " pada tanggal " . $tanggalAda . "'); window.location = 'input_jadwal.php';</script>";
		}
	}
	

	

?>