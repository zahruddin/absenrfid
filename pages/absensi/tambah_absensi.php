<?php
  if($_SESSION['status']!="login"){
    header("location: ../login.php");
  }
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Absensi</h1>
      </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Tambah Absensi</li>
      </ol>
    </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Absensi</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
      <div class="card-body">   
        <form method="POST"> 
          <div class="form-group">
            <label for="inputStatus">Tambah Absensi</label>
                  <!-- SEARCH FORM -->
              <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
          </div>
          <div class="row">
            <div class="col-12">
              <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
              <a href="index.php?pages=absensi" class="btn btn-secondary float-right">Cancel</a><br>
            </div>
          </div>
        </form>
      </div>
            <!-- /.card-body -->
      </div>
          <!-- /.card -->
    </div>
  </div>
</section>
<?php 
  //jika tombol simpan diklik
  if(isset($_POST['btnSimpan']))
  {
    //baca isi inputan form
    $jam_absensi = $_POST['jam_absensi'];
    //update data ke tabel status
    $simpan = mysqli_query($koneksi, "UPDATE status set mode='$jam_absensi'");
    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
    if($simpan)
    {
      echo "
        <script>
          alert('Tersimpan');
          location.replace('index.php?pages=jam');
        </script>
      ";
    }
    else
    {
      echo "
        <script>
          alert('Gagal Tersimpan');
          location.replace('index.php?pages=jam');
        </script>
      ";
    }

  }
?>
      