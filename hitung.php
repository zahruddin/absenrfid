<!-- <?php
// include 'config/koneksi.php';

// $datasiswa = mysqli_query($koneksi,"SELECT * from siswa");

// $jumlahsiswa = mysqli_num_rows($datasiswa);

// echo $jumlahsiswa;

?> -->
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Karyawan</title>
<script type="text/javascript" src="lain/jquery/jquery.min.js"></script>
  <!-- <script type="text/javascript" src="lain/js/bootstrap.min.js"></script> -->
	<!-- pembacaan no kartu otomatis -->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#norfid").load('login.php')
			}, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
		});
	</script>

</head>
<body>
		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>
		</form>
</body>
</html>