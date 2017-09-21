<?php
	
	$connection=mysqli_connect("127.0.0.1", "root", "", "diklatmedan");
	mysqli_select_db($connection, "");

	$date = $_POST['tanggal_berjalan'];
	$day = date('N', strtotime($date));
	$week_start = date('Y-m-d', strtotime('-'.($day-1).' days', strtotime($date)));
	$week_end = date('Y-m-d', strtotime('+'.(6-$day).' days', strtotime($date)));
	$minggu = date('d-m-Y', strtotime('+'.(7-$day).' days', strtotime($date)));

	$nama_diklat = $_POST['listDiklat'];
	$no_dokumen = $_POST['no_dokumen'];
	$no_revisi = $_POST['no_revisi'];
	$tanggal_eff = date("d-m-Y" , strtotime($_POST['tanggal_eff']));
	$tanggal_mulai = date("d-m-Y" , strtotime($_POST['tanggal_mulai']));
	$tanggal_selesai = date("d-m-Y" , strtotime($_POST['tanggal_selesai']));
	$angkatan = $_POST['angkatan'];
	$tahun = $_POST['tahun'];

	$query=mysqli_query($connection, "SELECT * FROM jadwal where nama_diklat='" . $nama_diklat . "' and tanggal between '" . $week_start . "' and '" . $week_end . "' group by tanggal order by tanggal asc, waktu_mulai");

	if (!$query) {
	    printf("Error: %s\n", mysqli_error($connection));
	    exit();
	}
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
				<img src="logo_diklat.png" style="width: 150px; height: 100px; padding: 2px;">
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
			<td><?php echo $angkatan . " / " . $tahun; ?></td>
		</tr>
		<tr>
			<td>TANGGAL PELAKSANAAN</td>
			<td>:</td>
			<td><b><?php echo $tanggal_mulai . ' S.D ' . $tanggal_selesai; ?></td>
		</tr>
		<tr>
			<td width="5%">PENYELENGGARA / LOKASI</td>
			<td width="1%">:</td>
			<td width="30%">BADAN PENGEMBANGAN SUMBER DAYA MANUSIA PROVINSI SUMATERA UTARA</td>
		</tr>
	</table>

	<br>

	<table border="1" width="100%">
		<tr>
			<td width="13%" align="center"><b> HARI / <br> TANGGAL</td>
			<td width="14%" align="center"><b> WAKTU <br> (1 JP = 45')</td>
			<td width="30%" align="center"><b> KEGIATAN / MATA DIKLAT</td>
			<td width="11%" align="center"><b> PENYELENGGARA</td>
			<td width="5%" align="center"><b> JLH <br> JP</td>
			<td width="27%" align="center"><b> WIDYAISWARA / <br> TENAGA PENGAJAR</td>
		</tr>

		<?php while ($row=mysqli_fetch_array($query)) {
			$getTanggal = $row['tanggal'];
			// $hitung = mysqli_query($connection , "SELECT * from jadwal where nama_diklat='" . $nama_diklat . "' and tanggal='"
			// 	. $getTanggal . "'");\
			// $hasil = 
		 ?>

		 	<!-- <tr>
		 		<td>
		 			<?php echo $row['hari'] . " / "?> <br> <?php echo date("d-m-Y" , strtotime($row['tanggal'])); ?>
		 		</td>
		 		<td>
		 			<?php echo $row['waktu_mulai'] . "-" . $row['waktu_selesai']; ?>
		 		</td>
		 	</tr> -->

			<tr>
				<td align="center"><?php echo $row['hari'] . " / "?> <br> <?php echo date("d-m-Y" , strtotime($row['tanggal'])); ?></td>
				<td>
					<table border="0" align="center">
						<?php
							$query1 = mysqli_query($connection , "SELECT * from jadwal where nama_diklat='" . $row['nama_diklat'] . "' and tanggal='" . $getTanggal . "' order by waktu_mulai asc");

							while ($row1=mysqli_fetch_array($query1)) {
						?>
						<tr>
							<td align="center"><?php echo $row1['waktu_mulai'] . "-" . $row1['waktu_selesai']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</td>
				<td>
					<table border="0" align="center">
						<?php
							$query1 = mysqli_query($connection , "SELECT * from jadwal where nama_diklat='" . $row['nama_diklat'] . "' and tanggal='" . $getTanggal . "' order by waktu_mulai asc");

							while ($row1=mysqli_fetch_array($query1)) {
						?>
						<tr>
							<td align="center"><?php echo $row1['kegiatan']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</td>
				<td>
					<table border="0" align="center">
						<?php
							$query1 = mysqli_query($connection , "SELECT * from jadwal where nama_diklat='" . $row['nama_diklat'] . "' and tanggal='" . $getTanggal . "' order by waktu_mulai asc");

							while ($row1=mysqli_fetch_array($query1)) {
						?>
						<tr>
							<td align="center"><?php echo $row1['penyelenggara']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</td>
				<td>
					<table border="0" align="center">
						<?php
							$query1 = mysqli_query($connection , "SELECT * from jadwal where nama_diklat='" . $row['nama_diklat'] . "' and tanggal='" . $getTanggal . "' order by waktu_mulai asc");

							while ($row1=mysqli_fetch_array($query1)) {
						?>
						<tr>
							<td align="center"><?php echo $row1['jumlah_jp']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</td>
				<td>
					<table border="0" align="center">
						<?php
							$query1 = mysqli_query($connection , "SELECT * from jadwal where nama_diklat='" . $row['nama_diklat'] . "' and tanggal='" . $getTanggal . "' order by waktu_mulai asc");

							while ($row1=mysqli_fetch_array($query1)) {
						?>
						<tr>
							<td align="center"><?php echo $row1['widyaiswara']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</td>
			</tr>

		<?php } ?>
		<tr>
			<td align="center"><b>
				Sunday /
				<br>
				<?php echo $minggu; ?>
			</td>
			<td></td>
			<td align="center"><b> LIBUR </td>
			<td align="center"> - </td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<br>
	<br>

	<div class="">
		<b><u>Catatan : </u></b>
		<br>
		10.15-10.30 ........ Istirahat
		<br>
		12.45-14.00 ........ Makan Siang
		<br>
		16.15-16.30 ........ Istirahat
		<br>
		18.45-19.40 ........ Istirahat / Makan Malam
		<br>
	</div>

	<br>

	<div class="" align="center" style="font-family: Times New Roman">
		JADWAL DAPAT BERUBAH SEWAKTU-WAKTU
	</div>

	<br>

	<table align="center" border="1" width="100%" style="font-family:Monotype Corsiva">
		<tr>
			<td align="center">
				Dokumen ini milik Badan Pengembangan Sumber Daya Manusia Provinsi Sumatera Utara <br>
				Dilarang memperbanyak dokumen ini atau menggunakan informasi didalamnya untuk keperluan komersial atau lain-lain <br>
				tanpa ada persetujuan pemilik dokumen
			</td>
		</tr>
	</table>

	<br>
	<div class="print" style="margin-left: 80%" id="cetak">
		<a class="btn btn-primary addWI" href="#" onclick="javascript:cetakHalaman()">
  		<i class="fa fa-print"></i> Cetak Laporan</a>
	</div>
	
</body>

<script>
	function cetakHalaman() {
		var print = document.getElementById('cetak');
		print.style.display = 'none';
		window.print();
		print.style.display = 'block';
	}

	function tombolCetak() {
		var x=1;
	}
</script>

</html>