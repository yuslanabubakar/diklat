<?php

	$day = date('w');
	$week_start = date('d-m-Y', strtotime('-'.($day-1).' days'));
	$week_end = date('d-m-Y', strtotime('+'.(7-$day).' days'));
	
	$nama_diklat = $_POST['listDiklat'];
	$no_dokumen = $_POST['no_dokumen'];
	$no_revisi = $_POST['no_revisi'];
	$tanggal_eff = $_POST['tanggal_eff'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Badan Pendidikan dan Pelatihan</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <!-- Bootstrap 3.3.6 -->
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	  <!-- AdminLTE Skins. Choose a skin from the css/skins
	       folder instead of downloading all of them to reduce the load. -->
	  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	  <!-- iCheck -->
	  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	  <!-- Morris chart -->
	  <link rel="stylesheet" href="plugins/morris/morris.css">
	  <!-- jvectormap -->
	  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	  <!-- Date Picker -->
	  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
	  <!-- Daterange picker -->
	  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	  <!-- bootstrap wysihtml5 - text editor -->
	  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	  <link rel="stylesheet" type="text/css" href="daterangepicker.css" />
</head>
<body>
	<table border="1" height="8%" width="100%">
		<tr>
			<td rowspan="5" width="10%" align="center">
				<img src="logo_diklat.jpg" style="width: 150px; height: 120px;">
			</td>
			<td colspan="3" width="70%" align="center">
				<b>BADAN PENGEMBANGAN SUMBER DAYA MANUSIA
				<br>
				PROVINSI SUMATERA UTARA
			</td>
		</tr>

		<tr>
			<td rowspan="4" align="center" width="35%"><b>JADWAL / KEGIATAN</td>
			<td width="10%" style="padding-left: 5pt;">No. Dok.</td>
			<td style="padding-left: 5pt;"><?php echo $no_dokumen; ?></td>
		</tr>
		<tr>
			<td style="padding-left: 5pt;">No. Rev.</td>
			<td style="padding-left: 5pt;"><?php echo $no_revisi; ?></td>
		</tr>
		<tr>
			<td style="padding-left: 5pt;">Tgl. Eff.</td>
			<td style="padding-left: 5pt;"><?php echo $tanggal_eff; ?></td>
		</tr>
		<tr>
			<td style="padding-left: 5pt;">Halaman</td>
			<td style="padding-left: 5pt;">1</td>
		</tr>
	</table>

	<table style="font-size: 9pt;" border="0" width="100%">
		<tr>
			<td>NAMA DIKLAT</td>
			<td>:</td>
			<td><?php echo $nama_diklat; ?></td>
		</tr>
		<tr>
			<td>ANGKATAN / TAHUN</td>
			<td>:</td>
			<td>IX / 2017</td>
		</tr>
		<tr>
			<td>TANGGAL PELAKSANAAN</td>
			<td>:</td>
			<td><b><?php echo $week_start . ' S.D ' . $week_end; ?></td>
		</tr>
		<tr>
			<td width="5%">PENYELENGGARA / LOKASI</td>
			<td width="1%">:</td>
			<td width="30%">BADAN PENGEMBANGAN SUMBER DAYA MANUSIA PROVINSI SUMATERA UTARA</td>
		</tr>
	</table>
</body>
</html>