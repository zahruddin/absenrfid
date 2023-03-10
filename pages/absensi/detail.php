<?php

$id = $_GET['id'];

    $data = mysqli_query($koneksi,"SELECT * from siswa where id='$id'");
    $d = mysqli_fetch_array($data);

  //baca tabel absensi dan relasikan dengan tabel karyawan berdasarkan nomor kartu RFID untuk tanggal hari ini

  //baca tanggal saat ini
  date_default_timezone_set('Asia/Jakarta');
  $tanggal = date('Y-m-d');

  //filter absensi berdasarkan tanggal saat ini
  $sql = mysqli_query($koneksi, "SELECT b.id, b.nama, a.tanggal, a.jam_masuk,a.jam_istirahat,a.jam_kembali, a.jam_pulang, a.perangkat_masuk, a.perangkat_istirahat, a.perangkat_kembali, a.perangkat_pulang from absensi a, siswa b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");

  $data = mysqli_fetch_array($sql);
?>

<div style="padding-top: 10px;">
	<div class="col-md-12">
	    <!-- Widget: user widget style 2 -->
	    <div class="card card-widget widget-user-2">
	      <!-- Add the bg color to the header using any of the bg-* classes -->
	      <div class="widget-user-header bg-warning">
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
	        <!-- /.widget-user-image -->
	        <h3 class="widget-user-username"><?php echo $d['nama']; ?></h3>
	        <h5 class="widget-user-desc">Kelas <?php echo $d['kelas']; ?></h5>
	      </div>
	      <h5 class="mb-2" style="padding-top: 10px; padding-left: 10px;">Hari Ini</h5>
			<div class="row" style="padding-top: 10px;">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="ion ion-man"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jam Masuk</span>
                <span class="info-box-number"><?php echo $data['jam_masuk']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="ion ion-man"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jam Istirahat</span>
                <span class="info-box-number"><?php echo $data['jam_istirahat']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="ion ion-man"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jam Kembali</span>
                <span class="info-box-number"><?php echo $data['jam_kembali']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="ion ion-man"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jam Pulang</span>
                <span class="info-box-number"><?php echo $data['jam_pulang']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row" style="padding-top: 10px;">
          <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-secondary"><ion-icon name="finger-print-outline"></ion-icon></span>

                <div class="info-box-content">
                  <span class="info-box-text">Perangkat Masuk</span>
                  <span class="info-box-number"><?php echo $data['perangkat_masuk']; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-secondary"><ion-icon name="finger-print-outline"></ion-icon></span>

                <div class="info-box-content">
                  <span class="info-box-text">Perangkat Istirahat</span>
                  <span class="info-box-number"><?php echo $data['perangkat_istirahat']; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-secondary"><ion-icon name="finger-print-outline"></ion-icon></span>

                <div class="info-box-content">
                  <span class="info-box-text">Perangkat Kembali</span>
                  <span class="info-box-number"><?php echo $data['perangkat_kembali']; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-secondary"><ion-icon name="finger-print-outline"></ion-icon></span>

                <div class="info-box-content">
                  <span class="info-box-text">Perangkat Pulang</span>
                  <span class="info-box-number"><?php echo $data['perangkat_pulang']; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
	    </div>
	    <!-- /.widget-user -->
	 </div>
</div>