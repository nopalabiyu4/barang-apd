<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "db_barangapd");

//variabel nim yang dikirimkan form.php
$bundy = $_GET['bundy'];

//mengambil data
$query = mysqli_query($koneksi, "select * from karyawan where bundy='$bundy'");
$kyw = mysqli_fetch_array($query);
$data = array(
            'nama_karyawan'      =>  @$kyw['nama_karyawan'],);

//tampil data
echo json_encode($data);
?>