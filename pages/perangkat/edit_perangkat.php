<?php
    if($_SESSION['status']!="login"){
        header("location: ../login.php");
    }
$id = $_GET['id'];
?>
<?php
  if($_SESSION['status']!="login"){
    header("location: ../login.php");
  }
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Perangkat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Perangkat</li>
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
              <h3 class="card-title">Edit Perangkat</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <form method="POST">
              	<?php
	                $data = mysqli_query($koneksi,"SELECT * from perangkat where id='$id'");
	                while($d = mysqli_fetch_array($data)){
                ?>
              <div class="form-group">
                <label for="inputName">Perangkat</label>
                <input type="text" id="inputName" class="form-control" name="perangkat" id="perangkat" value="<?php echo $d['perangkat']; ?>" required>
              </div>
              <div class="form-group">
                <label for="inputName">Tanggal Daftar</label>
                <input type="date" id="inputName" class="form-control" name="tgl_daftar" id="tgl_daftar" value="<?php echo $d['tgl_daftar']; ?>" required>
              </div>
              <div class="form-group">
                <label for="inputName">Token</label>
                <input type="text" id="inputName" class="form-control" name="token" id="token" value="<?php echo $d['token']; ?>" required>
              </div>
              <div class="form-group">
                <label for="inputStatus">Mode</label>
                <select class="form-control custom-select" name="mode" required>
                  <option value="<?php echo $d['mode']; ?>"><?php $mode = $d['mode']; 
                  if ($mode=='1') {
                      echo "Masuk";
                    }elseif ($mode=='2') {
                      echo "Istirahat";
                    }elseif ($mode=='3') {
                      echo "Kembali";
                    }elseif ($mode=='4') {
                      echo "Pulang";
                    } ?></option>
                  <option value="1">Masuk</option>
                  <option value="2">Istirahat</option>
                  <option value="3">Kembali</option>
                  <option value="4">Pulang</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select class="form-control custom-select" name="status" required>
                  <option value="<?php echo $d['status']; ?>"><?php $status = $d['status']; if ($status=='1') {
                      echo "Aktif";
                    }else{
                      echo "Tidak Aktif";
                    } ?></option>
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
  <?php }?>
      </form>
    </section>
<?php 
  //jika tombol simpan diklik
  if(isset($_POST['btnSimpan']))
  {
    //baca isi inputan form
        //baca isi inputan form
    $perangkat    = $_POST['perangkat'];
    $tgl_daftar    = $_POST['tgl_daftar'];
    $token   = $_POST['token'];
    $mode = $_POST['mode'];
    $status = $_POST ['status'];
    //update data ke tabel status
    $simpan = mysqli_query($koneksi, "UPDATE perangkat set perangkat='$perangkat', tgl_daftar='$tgl_daftar', token='$token', mode='$mode', status='$status' where id=$id");
    //jika berhasil tersimpan, tampilkan pesan Tersimpan,
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
          location.replace('index.php?pages=perangkat');
        </script>
      ";
    }

  }
  //kosongkan tabel tmprfid
  mysqli_query($koneksi, "delete from tmprfid");
?>

