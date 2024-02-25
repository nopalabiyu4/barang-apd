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
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Safety | Barang Keluar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/icon/logosafety.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
	
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                    <a href="../admin/dashboard.php"><img src="../assets/images/icon/safetyk3.png" alt="ciilogo" width="100%"></a>
            </div>
            <div class="sidebar-header container-fluid px-3">
                <div class="user-panel mt-0 pb-0 mb-0 d-flex" style="float: center;">
                    <div class="image">
                    <img src="../assets/img/user.png" class="m-2 img-circle" alt="User Image" width="40">
                    </div>
                    <div class="info">
                        <a class="d-block m-1 font-weight-bold text-white" style="cursor: default; margin-top:-12px;"><?= $_SESSION["nama"] ?></a>
                        <a class="m-1 font-weight-bold text-white badge badge-success" style="cursor: default;"><?= $_SESSION["sebagai"] ?></a>
                    </div>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
							    <a href="../admin/dashboard.php"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="../admin/stock.php"><i class="ti-server"></i><span>Data Barang APD</span></a>
                            </li>
                            <li>
                                <a href="../admin/karyawan.php"><i class="ti-id-badge"></i><span>Kelola Data Karyawan</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-map-alt"></i><span>Area Kerja
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="../admin/department.php"><i class="ti-map"></i><span>Department</span></a></li>
                                </ul>
                                <ul class="collapse">
                                    <li><a href="../admin/lokasi.php"><i class="ti-location-pin"></i><span>Lokasi</span></a></li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-view-list-alt"></i><span>Data Barang
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="../admin/masuk.php"><i class="ti-share"></i><span>Barang Masuk</span></a></li>
                                </ul>
                                <ul class="collapse">
                                    <li class="active"><a href="../admin/keluar.php"><i class="ti-share-alt"></i><span>Barang Keluar</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="../admin/akun.php"><i class="ti-user"></i><span>Kelola Pengguna</span></a>
                            </li>
                            <li>
                                <a href="../admin/report.php"><i class="ti-notepad"></i><span>Report</span></a>
                            </li>
                            <li>
                                <a href="../logout.php" onclick="return confirm('Apakah anda yakin ingin logout?')"><i class="ti-shift-left"></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <?php 
			
            $periksa_bahan=mysqli_query($conn,"select * from sstock_brg where stock <26");
            while($p=mysqli_fetch_array($periksa_bahan)){	
                if($p['stock']<=26){	
                    ?>	
                    <script>
                        $(document).ready(function(){
                            $('#pesan_sedia').css("color","white");
                            $('#pesan_sedia').append("<i class='ti-flag'></i>");
                        });
                    </script>
                    <?php
                    echo "<div class='alert alert-warning alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button> APD <strong><u>".$p['apd']. "</u> |Dengan masa pemakaian <u>".($p['pemakaian'])."</u> | Stock yang tersisa tinggal &nbsp<u>".$p['stock']."</u></strong></div>";		
                }
            }
            ?>

            <div class="main-content-inner">
                 <!-- market value area start -->
                <div class="row mt-3 mb-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Barang Keluar</h2>
                                    <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang Keluar</button>
                                </div>
                                <ol class="breadcrumb mb-4">
                                    <ul class="breadcrumbs pull-left">
                                        <li><a href="../admin/dashboard.php">Home</a></li>
                                        <li><span>Barang Keluar</span></li>
                                    </ul>
                                </ol>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
										 <table id="dataTable3" class="table table-hover"><thead class="thead-dark" align="center">
											<tr align="center">
												<th>No</th>
												<th>Tanggal</th>
												<th>Bundy</th>
												<th>Nama</th>
												<th>Lokasi</th>
												<th>Department</th>
												<th>APD</th>
												<th>Pemakaian</th>
												<th>Jumlah</th>
												<th>Keterangan</th>
												
												<th>Opsi</th>
											</tr></thead><tbody>
											<?php 
											$data=mysqli_query($conn,"SELECT * FROM sbrg_keluar
                                            INNER JOIN sstock_brg ON sbrg_keluar.idx = sstock_brg.idx 
                                            INNER JOIN tbl_lokasi ON sbrg_keluar.lokasi_id = tbl_lokasi.lokasi_id 
                                            INNER JOIN tbl_department ON sbrg_keluar.department_id = tbl_department.department_id 
                                            where id order by tgl desc");
											$no=1;
											foreach($data as $b) :
                                                $idb = $b['idx'];
                                                $id = $b['id'];
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php $tanggals=$b['tgl']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
													<td><?php echo $b['bundy'] ?></td>
													<td><?php echo $b['nama_karyawan'] ?></td>
													<td><?php echo $b['lokasi_nama'] ?></td>
													<td><?php echo $b['department_nama'] ?></td>
													<td><?php echo $b['apd'] ?></td>
													<td align="center"><?php echo $b['pemakaian'] ?></td>
													<td align="center"><?php echo $b['jumlah'] ?></td>
													<td><?php echo $b['keterangan'] ?></td>
                                                    <td><button data-toggle="modal" data-target="#del<?=$id;?>" class="btn btn-danger" title="Hapus"><i class="ti-trash"></i></button></td>
												</tr>		

                                                    <!-- The Modal -->
                                                    <div class="modal fade" id="del<?=$id;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Data | <?php echo $b['bundy']?> - <?php echo $b['nama_karyawan']?> - <?php echo $b['apd']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data ini dari daftar barang keluar?
                                                            <br>
                                                            *Stock barang akan bertambah
                                                            <input type="hidden" name="id" value="<?=$id;?>">
                                                            <input type="hidden" name="idx" value="<?=$idb;?>">
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success" name="hapus">Hapus</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
												<?php 
											endforeach;
                                            
                                            if(isset($_POST['keluarbaru'])){
                                                $barang=$_POST['barang']; //id barang
                                                $qty=$_POST['qty'];
                                                $tanggal=$_POST['tanggal'];
                                                $bundy=$_POST['bundy'];
                                                $nama_karyawan=$_POST['nama_karyawan'];
                                                $department_id=$_POST['department_id'];
                                                $lokasi_id=$_POST['lokasi_id'];
                                                $ket=$_POST['ket'];
                                                
                                                $dt=mysqli_query($conn,"select * from sstock_brg where idx='$barang'");
                                                $data=mysqli_fetch_array($dt);
                                                $sisa=$data['stock']-$qty;
                                                $query1 = mysqli_query($conn,"update sstock_brg set stock='$sisa' where idx='$barang'");
                                                
                                                $query2 = mysqli_query($conn,"insert into sbrg_keluar (idx,tgl,jumlah,bundy,nama_karyawan,department_id,lokasi_id,keterangan) values('$barang','$tanggal','$qty','$bundy','$nama_karyawan','$department_id','$lokasi_id','$ket')");
                                                
                                                if($query1 && $query2){
                                                    echo " <div class='alert alert-success'>
                                                    <strong>Success!</strong> Redirecting you back in 1 seconds.
                                                  </div>
                                                <meta http-equiv='refresh' content='1; url= ../admin/keluar.php'/>  ";
                                                
                                                } else {
                                                    echo "<div class='alert alert-warning'>
                                                    <strong>Failed!</strong> Redirecting you back in 1 seconds.
                                                  </div>
                                                 <meta http-equiv='refresh' content='1; url= ../admin/keluar.php'/> ";
                                                }
                                            };

                                            if(isset($_POST['hapus'])){
                                                $id = $_POST['id'];
                                                $idx = $_POST['idx'];
                                        
                                                $lihatstock = mysqli_query($conn,"select * from sstock_brg where idx='$idx'"); //lihat stock barang itu saat ini
                                                $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
                                                $stockskrg = $stocknya['stock'];//jumlah stocknya skrg
                                        
                                                $lihatdataskrg = mysqli_query($conn,"select * from sbrg_keluar where id='$id'"); //lihat qty saat ini
                                                $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
                                                $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg
                                        
                                                $adjuststock = $stockskrg+$qtyskrg;
                                        
                                                $queryx = mysqli_query($conn,"update sstock_brg set stock='$adjuststock' where idx='$idx'");
                                                $del = mysqli_query($conn,"delete from sbrg_keluar where id='$id'");
                                        
                                                
                                                //cek apakah berhasil
                                                if ($queryx && $del){
                                        
                                                    echo " <div class='alert alert-success'>
                                                        <strong>Success!</strong> Redirecting you back in 1 seconds.
                                                      </div>
                                                    <meta http-equiv='refresh' content='1; url= keluar.php'/>  ";
                                                    } else { echo "<div class='alert alert-warning'>
                                                        <strong>Failed!</strong> Redirecting you back in 1 seconds.
                                                      </div>
                                                     <meta http-equiv='refresh' content='1; url= keluar.php'/> ";
                                                    }
                                            };
											?>
										</tbody>
										</table>
                                        </div>
                                    </div>
									<a href="exportbrgklr.php" target="_blank" class="btn btn-info">Export Barang Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

	<!-- modal input -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Masukkan Barang</h4>
						</div>
						<div class="modal-body">
                        <form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input name="tanggal" type="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label >Bundy</label>
                                        <input type="text" name="bundy" id="bundy" class="form-control" onkeyup="isi_otomatis()" placeholder="Bundy" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label >Nama Karyawan</label>
                                        <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" placeholder="Nama Karyawan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Lokasi</label>
									<select name="lokasi_id" class="form-control" id="lokasi_nama" required>
									<option value="">Pilih Lokasi</option>
									<?php
									$lokasi = mysqli_query($conn,"select * from tbl_lokasi");
									while($d = mysqli_fetch_array($lokasi)){
                                        ?>
                                        <option value="<?php echo $d['lokasi_id'] ?>"><?php echo $d['lokasi_nama']; ?></option>
                                        <?php
                                    }
                                    ?>
									</select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control" name="department_id" id="department_nama" required>					
                                        </select>
                                    </div>
                                </div>
                            </div>
								<div class="form-group">
									<label>APD</label>
									<select name="barang" class="form-control">
									<option selected>Pilih APD</option>
									<?php
									$det=mysqli_query($conn,"select * from sstock_brg order by apd ASC");
									while($d=mysqli_fetch_array($det)){
									?>
										<option value="<?php echo $d['idx'] ?>"><?php echo $d['apd'] ?> | <?php echo $d['pemakaian'] ?> | Sisa Stock : <?php echo $d['stock'] ?></option>
										<?php
								}
								?>
									</select>
								</div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input name="qty" type="number" min="1" class="form-control" placeholder="Jumlah" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input name="ket" type="text" class="form-control" placeholder="Keterangan">
                                    </div>
							    </div>
							</div>
                            <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input type="submit" class="btn btn-primary" value="Simpan" name="keluarbaru">
							</div>
						</form>
					</div>
				</div>
			</div>

    <script>
    $(document).ready(function() {
    $('input').on('keydown', function(event) {
        if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
            var $t = $(this);
            event.preventDefault();
            var char = String.fromCharCode(event.keyCode);
            $t.val(char + $t.val().slice(this.selectionEnd));
            this.setSelectionRange(1,1);
        }
    })});
	
	
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>

    
    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
	<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
	
	<script>
		$(document).ready(function() {
		$('input').on('keydown', function(event) {
			if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
			   var $t = $(this);
			   event.preventDefault();
			   var char = String.fromCharCode(event.keyCode);
			   $t.val(char + $t.val().slice(this.selectionEnd));
			   this.setSelectionRange(1,1);
			}
		});
	});
	</script>
    
    <script type="text/javascript">
            function isi_otomatis(){
                var bundy = $("#bundy").val();
                $.ajax({
                    url: '../user/ajax.php',
                    data:"bundy="+bundy ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama_karyawan').val(obj.nama_karyawan);
                });
            }
        </script>

        <script type="text/javascript">
            $('#lokasi_nama').change(function() { 
                var lokasi_nama = $(this).val(); 
                $.ajax({
                    type: 'POST', 
                    url: '../user/ajax_jurusan.php', 
                    data: 'lokasi_id=' + lokasi_nama, 
                    success: function(response) { 
                        $('#department_nama').html(response); 
                    }
                });
            });
        </script>

	
</body>

</html>
