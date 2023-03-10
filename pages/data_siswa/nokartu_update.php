<?php
include '../../config/koneksi.php';
	//baca isi tabel tmprfid
	$sql = mysqli_query($koneksi, "select * from tmprfid");
	$data = mysqli_fetch_array($sql);
	//baca nokartu
	$nokartu = @$data['nokartu'];
    $id = $_GET['id'];
    $data = mysqli_query($koneksi,"SELECT * from siswa where id='$id'");
    while($d = mysqli_fetch_array($data)){
    	$kartu = $d['nokartu'];

    	if ($nokartu > 0) {
    		$kartu = $nokartu;
    	}
?>

<div class="form-group">
	<label>No.Kartu</label>
	<input type="text" name="nokartu" id="nokartu" placeholder="tempelkan kartu rfid Anda" class="form-control" style="width: 400px" value="<?php echo $kartu; ?>">
</div> <?php } ?>