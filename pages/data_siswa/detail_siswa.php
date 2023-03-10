<?php
    if($_SESSION['status']!="login"){
        header("location: ../login.php");
    }
$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT * from siswa where id='$id'");
$d = mysqli_fetch_array($data)

?>

<div class="row" style="padding-top: 10px;">
  <div class="col-md-12">

    <!-- Profile Image -->
    <center><div class="col-md-8">
      <div class="card card-primary card-outline ">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="dist/img/user1-128x128.jpg" alt="User profile picture">
          </div>

          <h3 class="profile-username text-center"><?php echo $d['nama']; ?></h3>

          <p class="text-muted text-center">Kelas <?php echo $d['kelas']; ?></p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b class="float-left">Hadir</b> <a type="button" class="btn btn-success float-right" style="color: white;">123</a>
            </li>
            <li class="list-group-item">
              <b class="float-left">Izin</b> <a type="button" class="btn btn-warning float-right">123</a>
            </li>
            <li class="list-group-item">
              <b class="float-left">Tanpa Keterangan</b> <a type="button" class="btn btn-danger float-right" style="color: white;">123</a>
            </li>
          </ul>

          <center><a href="index.php?pages=data_siswa" class="btn btn-primary btn-block col-md-3"><b>Kembali</b></a></center>
        </div>
        <!-- /.card-body -->
      </div></center>
    </div>  
    <!-- /.card -->
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>