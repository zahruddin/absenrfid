<?php
  if($_SESSION['status']!="login"){
    header("location: ../login.php");
  }
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Perangkat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Perangkat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Perangkat</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <form method="POST">
              <div class="form-group">
                <label for="inputName">Perangkat</label>
                <input type="text" id="inputName" class="form-control" name="perangkat" id="perangkat" required>
              </div>
              <div class="form-group">
                <label for="inputName">Tanggal Daftar</label>
                <input type="date" id="inputName" class="form-control" name="tgl_daftar" id="tgl_daftar" required>
              </div>
              <div class="form-group">
                <label for="inputStatus">Mode</label>
                <select class="form-control custom-select" name="mode" required>
                  <option selected disabled>Select one</option>
                  <option value="1">Masuk</option>
                  <option value="2">Istirahat</option>
                  <option value="3">Kembali</option>
                  <option value="4">Pulang</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select class="form-control custom-select" name="status" required>
                  <option selected disabled>Select one</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
          <a href="index.php?pages=perangkat" class="btn btn-secondary float-right">Cancel</a><br>
        </div>
      </div>
      </form>
    </section>
<?php 
//membuat huruf dan angka random
function create_random($length)
{
$data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
$string = '';
for($i = 0; $i < $length; $i++) {
$pos = rand(0, strlen($data)-1);
$string .= $data[$pos];
}
return $string;
}
//tutup

  //jika tombol simpan diklik
  if(isset($_POST['btnSimpan']))
  {
    //baca isi inputan form
    $perangkat    = $_POST['perangkat'];
    $tgl_daftar  = $_POST['tgl_daftar'];
    $status    = $_POST['status'];
    $mode = $_POST['mode'];
    $token = create_random(10);
    //simpan ke tabel karyawan
    $simpan = mysqli_query($koneksi, "INSERT into perangkat(perangkat, tgl_daftar, token, mode, status)values('$perangkat','$tgl_daftar', '$token','$mode', '$status')");

    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    //kembali ke data perangkat
    if($simpan)
    { 
      echo "
        <script>
          alert('Tersimpan');
          location.replace('index.php?pages=perangkat');
        </script>
      ";
    }
    else
    {
      echo "
        <script>
          alert('Gagal Tersimpan');
          location.replace('index.php?pages=t_perangkat');
        </script>
      ";
    }
  }
?>