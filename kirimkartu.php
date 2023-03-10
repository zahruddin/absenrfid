<?php
	include "config/koneksi.php";


	//baca nomor kartu dari NodeMCU
	$nokartu = @$_GET['nokartu'];
	$token = @$_GET['token'];
	//kosongkan tabel tmprfid
	mysqli_query($koneksi, "DELETE from tmprfid");
	$data = mysqli_query($koneksi,"SELECT * from token where token='$token'");

	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($data);

	if($cek > 0){
		$_SESSION['token'] = $token;
		//simpan nomor kartu yang baru ke tabel tmprfid
		$simpan = mysqli_query($koneksi, "INSERT into tmprfid(nokartu)values('$nokartu')");
		if($simpan)
			echo "Berhasil";
		else
			echo "Gagal";
	}else{
		echo "perangkat tidak dikenal";
	}
?>