<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['sebagai'])) {
  header("Location: ../index.php");
}

if (isset($_SESSION['sebagai'])) {
  if ($_SESSION['sebagai'] == 'user') {
    header('Location: user.php');
  }
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
<title>Data Barang Keluar</title>
	   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../assets/images/icon/logosafety.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>

</head>

<body>
    
<div class="container">
			<h2>Data Barang Keluar</h2>
				<div class="data-tables datatable-dark">
					<table class="display" id="mauexport" style="width:100%"><thead class="thead-dark">
                                        <tr>
                                          <th>No</th>
                                          <th>Tanggal</th>
                                          <th>Bundy</th>
                                          <th>Karyawan</th>
                                          <th>Lokasi</th>
                                          <th>Department</th>
                                          <th>APD</th>
                                          <th>Pemakaian</th>
                                          <th>Jumlah</th>
                                          <th>Keterangan</th>
                                        </tr></thead>
                                          <tbody>
                                      <?php
                                      if ($_POST['tgl1'] == '') {
                                        echo "<script>alert('Anda belum menentukan tanggal awal'); window.location='filter.php';</script>";
                                      } else if ($_POST['tgl2'] == '') {
                                        echo "<script>alert('Anda belum menentukan tanggal akhir'); window.location='filter.php';</script>";
                                      } else {
                                      $tgl1 = $_POST['tgl1'];
                                      $tgl2 = $_POST['tgl2'];
                                      
                                            $data=mysqli_query($conn,"SELECT * FROM sbrg_keluar
                                            INNER JOIN sstock_brg ON sbrg_keluar.idx = sstock_brg.idx 
                                            INNER JOIN tbl_lokasi ON sbrg_keluar.lokasi_id = tbl_lokasi.lokasi_id 
                                            INNER JOIN tbl_department ON sbrg_keluar.department_id = tbl_department.department_id 
                                            WHERE tgl BETWEEN '$tgl1' AND '$tgl2' order by tgl");
                                      }
                                      $no=1;
                                      foreach($data as $b) :
                                          $idb = $b['idx'];
                                          $id = $b['id'];
                                        ?>
                                            <tr>
                                              <td align="center"><?php echo $no++ ?></td>
                                              <td><?php $tanggals=$b['tgl']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
                                              <td><?php echo $b['bundy'] ?></td>
                                              <td><?php echo $b['nama_karyawan'] ?></td>
                                              <td><?php echo $b['lokasi_nama'] ?></td>
                                              <td><?php echo $b['department_nama'] ?></td>
                                              <td><?php echo $b['apd'] ?></td>
                                              <td align="center"><?php echo $b['pemakaian'] ?></td>
                                              <td align="center"><?php echo $b['jumlah'] ?></td>
                                              <td><?php echo $b['keterangan'] ?></td>
                                          </tr>
                                          <?php
                                          endforeach;
                                          ?>
                                        </tbody>
                                        </table>
                                    </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>

<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

	

</body>

</html>