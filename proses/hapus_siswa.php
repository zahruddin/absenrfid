<?php 
    include "../config/koneksi.php";
    if($_SESSION['status']!="login"){
        header("location: ../login.php");
    }

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE from siswa where id='$id'");
echo $id;
header('location: ../index.php?pages=data_siswa');
?>