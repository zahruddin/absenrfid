<?php
	include "config/koneksi.php";
//baca tabel status untuk mode absensi
	$sql = mysqli_query($koneksi, "SELECT * from perangkat");
	$data = mysqli_fetch_array($sql);
	$mode_absen = $data['mode'];

	//baca nomor kartu dari NodeMCU
	$nokartu = @$_GET['nokartu'];
	$token = @$_GET['token'];
	//kosongkan tabel tmprfid
	mysqli_query($koneksi, "DELETE from tmprfid");
	//cek perangkat
	$data = mysqli_query($koneksi,"SELECT * from perangkat where token='$token' and status='1'");
	$cek = mysqli_num_rows($data);
	if($cek > 0){
		$cekcard = mysqli_query($koneksi,"SELECT * from siswa where nokartu='$nokartu'");
		$ccard = mysqli_num_rows($cekcard);
			if($ccard > 0){
					//ambil nama perangkat
					$ambil_nama = mysqli_fetch_array($data);
					$perangkat = $ambil_nama['perangkat'];
					//ambil nama siswa
					$data_siswa = mysqli_fetch_array($cekcard);
					$nama = $data_siswa['nama'];

					//tanggal dan jam hari ini
					date_default_timezone_set('Asia/Jakarta') ;
					$tanggal = date('Y-m-d');
					$jam     = date('H:i:s');

					//cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
					$cari_absen = mysqli_query($koneksi, "SELECT * from absensi where nokartu='$nokartu' and tanggal='$tanggal'");
					//hitung jumlah datanya
					$jumlah_absen = mysqli_num_rows($cari_absen);
					if($jumlah_absen == 0)
					{
						mysqli_query($koneksi, "INSERT into absensi(nokartu, tanggal, jam_masuk, perangkat_masuk)values('$nokartu', '$tanggal', '$jam', '$perangkat')");
						echo "masuk";
					}
					else
					{
						//update sesuai pilihan mode absen
						if($mode_absen == 2)
						{
							mysqli_query($koneksi, "UPDATE absensi set jam_istirahat='$jam', perangkat_istirahat='$perangkat' where nokartu='$nokartu' and tanggal='$tanggal'");
						}
						else if($mode_absen == 3)
						{
							mysqli_query($koneksi, "UPDATE absensi set jam_kembali='$jam', perangkat_kembali='$perangkat' where nokartu='$nokartu' and tanggal='$tanggal'");
						}
						else if($mode_absen == 4)
						{
							mysqli_query($koneksi, "UPDATE absensi set jam_pulang='$jam', perangkat_pulang='$perangkat' where nokartu='$nokartu' and tanggal='$tanggal'");
						}
					}
			}else{
			//simpan nomor kartu yang baru ke tabel tmprfid
			$simpan = mysqli_query($koneksi, "INSERT into tmprfid(nokartu)values('$nokartu')");
			if($simpan)
				echo "Berhasil memasukan ke temp";
			else
				echo "Gagal";
				}
	}else{
			echo "perangkat tidak dikenal";
	}
?>