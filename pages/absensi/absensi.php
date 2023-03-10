 <?php
  if($_SESSION['status']!="login"){
    header("location: ../login.php");
  }


  //baca tabel tmprfid
  $baca_kartu = mysqli_query($koneksi, "SELECT * from tmprfid");
  $data_kartu = mysqli_fetch_array($baca_kartu);
  $nokartu    = @$data_kartu['nokartu'];
?>



    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Absensi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Absensi</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-3">
        <a class="btn btn-block btn-primary" href="?pages=tambah_absensi">+ Absensi</a>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Absensi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px; text-align: center">No.</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Istirahat</th>
                    <th>Jam Kembali</th>
                    <th>Jam Pulang</th>
                    <th>Detail</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php

                      //baca tabel absensi dan relasikan dengan tabel karyawan berdasarkan nomor kartu RFID untuk tanggal hari ini

                      //baca tanggal saat ini
                      date_default_timezone_set('Asia/Jakarta');
                      $tanggal = date('Y-m-d');

                      //filter absensi berdasarkan tanggal saat ini
                      $sql = mysqli_query($koneksi, "SELECT b.id, b.nama, a.tanggal, a.jam_masuk,a.jam_istirahat,a.jam_kembali, a.jam_pulang from absensi a, siswa b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");

                      $no = 0;
                      while($data = mysqli_fetch_array($sql))
                      {
                        $no++;
                    ?>
                  <tr>
                    <td> <?php echo $no; ?> </td>
                    <td> <?php echo $data['nama']; ?> </td>
                    <td> <?php echo $data['tanggal']; ?> </td>
                    <td> <?php echo $data['jam_masuk']; ?> </td>
                    <td> <?php echo $data['jam_istirahat']; ?> </td>
                    <td> <?php echo $data['jam_kembali']; ?> </td>
                    <td> <?php echo $data['jam_pulang']; ?> </td>
                    <td> <a type="button" class="btn btn-primary" name="detail" id="detail" href="?pages=detail&id=<?php echo $data['id']; ?>">Detail</a></td>
                  </tr>
                <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>