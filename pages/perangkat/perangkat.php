<?php
  if($_SESSION['status']!="login"){
    header("location: ../login.php");
  }
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perangkat </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perangkat</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-3">
        <a class="btn btn-block btn-primary" href="?pages=t_perangkat">+ Perangkat</a>
      </div><br>
      <div class="col-3">
        <a class="btn btn-block btn-primary" href="?pages=ubah_semua_mode">Ubah Semua Mode Perangkat</a>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Perangkat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px; text-align: center">No.</th>
                    <th>Perangkat</th>
                    <th>Tgl Daftar</th>
                    <th>Token</th>
                    <th>Mode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      //baca data karyawan
                      $sql = mysqli_query($koneksi, "SELECT * from perangkat");
                      $no = 0;
                      while($data = mysqli_fetch_array($sql))
                      {
                        $no++;
                    ?>
                  <tr>
                    <td> <?php echo $no; ?> </td>
                    <td> <?php echo $data['perangkat']; ?> </td>
                    <td> <?php echo $data['tgl_daftar']; ?> </td>
                    <td> <?php echo $data['token']; ?> </td>
                    <td> <?php $mode = $data['mode']; 
                    if ($mode=='1') {
                      echo "Masuk";
                    }elseif ($mode=='2') {
                      echo "Istirahat";
                    }elseif ($mode=='3') {
                      echo "Kembali";
                    }elseif ($mode=='4') {
                      echo "Pulang";
                    } ?> </td>
                    <td class="project-state"><?php $status = $data['status']; if ($status=='1') {?>
                      <span class="badge badge-success"><?php echo "Aktif";?></span><?php
                    }else{ ?>
                      <span class="badge badge-danger"><?php echo "Tidak Aktif";?></span><?php
                    } ?> </td>
                    <td>
                      <a type="button" class="btn btn-primary" name="btnedit" id="btnedit" href="?pages=edit_perangkat&id=<?php echo $data['id']; ?>">edit</a>
                      <a type="button" class="btn btn-danger" name="btnhapus" id="btnhapus" href="proses/hapus_perangkat.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus?')">hapus</a></td>
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