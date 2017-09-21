<?php

	setlocale (LC_TIME, 'INDONESIA');
	$connection=mysqli_connect("127.0.0.1", "root", "", "diklatmedan");
	if (!$connection) {
		die("Connection Failed : " . mysqli_connect_error());
	}

	$id_jadwal = $_REQUEST['id_jadwal'];

	$tanggal = $_POST['inputTanggal'];
	$datetime = new DateTime($tanggal);
	$hari = $datetime->format('l');
	$waktuMulai = mysql_real_escape_string($_POST['inputMulai']);
	$waktuSelesai = mysql_real_escape_string($_POST['inputSelesai']);
	$penyelenggara = mysql_real_escape_string($_POST['penyelenggara']);
	$namaDiklat = mysql_real_escape_string($_POST['nama_diklat']);
	$kegiatan = mysql_real_escape_string($_POST['kegiatan']);
	$jumlahJP = mysql_real_escape_string($_POST['listJP']);
	$wi = $_POST['inputWI'];

	// $wi = "";

	// $query = mysqli_query($connection , "SELECT * FROM jadwal where id_jadwal=" . $id_jadwal);
	// while ($data = mysqli_fetch_array($query)) {
	// 	$wi = $data['widyaiswara'];
	// }

	$getData 	= mysqli_query($connection , "SELECT * FROM jadwal WHERE  widyaiswara = '".$wi."' order by tanggal desc, waktu_mulai");
	$cek 		= 1;
	$tanggalAda = "";
	$diklatAda = "";
	$kegiatanAda = "";

		while($dtCek = mysqli_fetch_array($getData)) {
		   if ($tanggal == $dtCek['tanggal']) {
			$strjammulai 	= date("H:i", strtotime($dtCek['waktu_mulai'])); 
			$strjamselesai 	= date("H:i", strtotime($dtCek['waktu_selesai'])); 
			if (
			($waktuMulai < $strjamselesai && $waktuMulai > $strjammulai) ||
			($waktuMulai > $waktuSelesai) ||
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
			$query = mysqli_query($connection , "UPDATE jadwal set hari='" . $hari . "', tanggal='" . $tanggal . "', waktu_mulai='" . $waktuMulai . "', waktu_selesai='" . $waktuSelesai . "', penyelenggara='" . $penyelenggara . "', nama_diklat='" . $namaDiklat . "', kegiatan='" . $kegiatan . "', jumlah_jp=" . $jumlahJP . " where id_jadwal=" . $id_jadwal);
			if ($query) {
				echo "<script>alert('Data Jadwal Berhasil Diganti'); window.location = 'home.php';</script>";
			}
			else {
				echo mysqli_error($connection);
				header('location: input_jadwal.php');
			}
		}
		else {
			echo "<script>alert('Terjadi kegagalan. Widyaiswara " . $wi . " sudah ada di diklat " . $diklatAda . " dalam kegiatan " . $kegiatanAda . " pada tanggal " . $tanggalAda . "'); window.location = 'edit.php?id_jadwal=" . $id_jadwal . "';</script>";
		}
?>