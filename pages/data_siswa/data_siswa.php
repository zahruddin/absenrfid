<?php
  if($_SESSION['status']!="login"){
    header("location: ../login.php");
  }
?>     
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-3">
        <a class="btn btn-block btn-primary" href="?pages=tambah_siswa">+ Tambah Siswa</a>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px; text-align: center">No</th>
                    <th>No Kartu</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jenis kelamin</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //baca data siswa
                      $sql = mysqli_query($koneksi, "select * from siswa");
                      $no = 0;
                      while($data = mysqli_fetch_array($sql))
                      {
                        $no++;
                    ?>
                  <tr>
                    <td> <?php echo $no; ?> </td>
                    <td> <?php echo $data['nokartu']; ?> </td>
                    <td> <?php echo $data['nama']; ?> </td>
                    <td> <?php echo $data['kelas']; ?> </td>
                    <td> <?php echo $data['jenis_kelamin']; ?> </td>
                    <td>
                      <a type="button" class="btn btn-success" href="?pages=detail_siswa&id=<?php echo $data['id']; ?>">Detail</a>
                      <a type="button" class="btn btn-primary" name="btnedit" id="btnedit" href="?pages=edit_siswa&id=<?php echo $data['id']; ?>">Edit</a>     
                      <a type="button" class="btn btn-danger" name="btnhapus" id="btnhapus" href="proses/hapus_siswa.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
                    </td>
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