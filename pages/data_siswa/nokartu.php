<?php
include '../../config/koneksi.php';
	//baca isi tabel tmprfid
	$sql = mysqli_query($koneksi, "select * from tmprfid");
	$data = mysqli_fetch_array($sql);
	//baca nokartu
	$nokartu = @$data['nokartu'];
?>

<div class="form-group">
	<label>No.Kartu</label>
	<input type="text" name="nokartu" id="nokartu" placeholder="tempelkan kartu rfid Anda" class="form-control" style="width: 400px" value="<?php echo $nokartu; ?>">
</div>