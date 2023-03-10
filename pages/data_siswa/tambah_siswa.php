<?php
  if($_SESSION['status']!="login"){
    header("location: ../login.php");
  }
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Siswa</li>
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
              <h3 class="card-title">Tambah Siswa</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <script type="text/javascript">
    $(document).ready(function(){
      setInterval(function(){
        $("#norfid").load('pages/data_siswa/nokartu.php')
      }, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
    });
  </script>
              <form method="POST">
                <div id="norfid"></div>
              <div class="form-group">
                <label for="inputName">NISN</label>
                <input type="text" id="inputName" class="form-control" name="nisn" id="nisn" required>
              </div>
              <div class="form-group">
                <label for="inputName">Nama Siswa</label>
                <input type="text" id="inputName" class="form-control" name="nama" id="nama" required>
              </div>
              <div class="form-group">
                <label for="inputName">Kelas</label>
                <input type="text" id="inputName" class="form-control" name="kelas" id="kelas" required>
              </div>
              <div class="form-group">
                <label for="inputStatus">Jenis Kelamin</label>
                <select class="form-control custom-select" name="jenis_kelamin" required>
                  <option selected disabled>Select one</option>
                  <option value="laki-laki">laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputDescription">Alamat</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="alamat" id="alamat" required></textarea>
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
          <a href="index.php?pages=data_siswa" class="btn btn-secondary float-right">Cancel</a><br>
        </div>
      </div>
      </form>
    </section>
<?php 
  //jika tombol simpan diklik
  if(isset($_POST['btnSimpan']))
  {
    //baca isi inputan form
    $nokartu = $_POST['nokartu'];
    $nama    = $_POST['nama'];
    $alamat  = $_POST['alamat'];
    $nisn    = $_POST['nisn'];
    $kelas   = $_POST['kelas'];
    $jenis_kelamin = $_POST ['jenis_kelamin'];


//cek duplikasi kartu
    $kartu = mysqli_query($koneksi,"SELECT * from siswa where nokartu='$nokartu'");

// menghitung jumlah data yang ditemukan
$ckartu = mysqli_num_rows($kartu);

if($ckartu > 0){
  echo "
        <script>
          alert('Kartu sudah digunakan');
          location.replace('index.php?pages=tambah_siswa');
        </script>
      ";
}else{

    //simpan ke tabel karyawan
    $simpan = mysqli_query($koneksi, "INSERT into siswa(nokartu, nisn, nama, kelas, jenis_kelamin, alamat)values('$nokartu','$nisn', '$nama','$kelas', '$jenis_kelamin', '$alamat')");

    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    //kembali ke data karyawan
    if($simpan)
    {
      echo "
        <script>
          alert('Tersimpan');
          location.replace('index.php?pages=tambah_siswa');
        </script>
      ";
    }
    else
    {
      echo "
        <script>
          alert('Gagal Tersimpan');
          location.replace('index.php?pages=tambah_siswa');
        </script>
      ";
    }

  }
}
  //kosongkan tabel tmprfid
  mysqli_query($koneksi, "delete from tmprfid");
?>