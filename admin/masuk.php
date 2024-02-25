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
    <title>Safety | Barang Masuk</title>
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
                                    <li class="active"><a href="../admin/masuk.php"><i class="ti-share"></i><span>Barang Masuk</span></a></li>
                                </ul>
                                <ul class="collapse">
                                    <li><a href="../admin/keluar.php"><i class="ti-share-alt"></i><span>Barang Keluar</span></a></li>
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
									<h2>Barang Masuk</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang Masuk</button>
                                </div>
                                <ol class="breadcrumb mb-4">
                                    <ul class="breadcrumbs pull-left">
                                        <li><a href="../admin/dashboard.php">Home</a></li>
                                        <li><span>Barang Masuk</span></li>
                                    </ul>
                                </ol>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
										 <table id="dataTable3" class="table table-hover"><thead class="thead-dark">
											<tr align="center">
												<th>No</th>
												<th>Tanggal</th>
												<th>APD</th>
												<th>Pemakaian</th>
												<th>Jumlah</th>
												<th>Supplier</th>
												<th>Keterangan</th>
												
												<th>Opsi</th>
											</tr></thead><tbody>
											<?php 
											$brg=mysqli_query($conn,"SELECT * from sbrg_masuk sb, sstock_brg st where st.idx=sb.idx order by sb.id DESC");
											$no=1;
											while($b=mysqli_fetch_array($brg)){
                                                $idb = $b['idx'];
                                                $id = $b['id'];

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php $tanggals=$b['tgl']; echo date("d-M-Y", strtotime($tanggals)) ?></td>
													<td><?php echo $b['apd'] ?></td>
													<td><?php echo $b['pemakaian'] ?></td>
													<td><?php echo $b['jumlah'] ?></td>
													<td><?php echo $b['supplier'] ?></td>
													<td><?php echo $b['keterangan'] ?></td>
                                                    <td><button data-toggle="modal" data-target="#edit<?=$id;?>" class="btn btn-warning" title="Edit"><i class="ti-pencil-alt"></i></button> <button data-toggle="modal" data-target="#del<?=$id;?>" class="btn btn-danger" title="Hapus"><i class="ti-trash"></i></button></td>
												</tr>

                                                <!-- The Modal -->
                                                <div class="modal fade" id="edit<?=$id;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Edit Barang Masuk</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">

                                                            <label for="tanggal">Tanggal</label>
                                                            <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?php echo $b['tgl'] ?>">
                                                            
                                                            <label for="apd">APD</label>
                                                            <input type="text" id="apd" name="apd" class="form-control" value="<?php echo $b['apd'] ?> <?php echo $b['pemakaian'] ?>" disabled>
                                                            
                                                            <label for="jumlah">Jumlah</label>
                                                            <input type="text" id="jumlah" name="jumlah" class="form-control" value="<?php echo $b['jumlah'] ?>">
                                                            
                                                            <label for="supplier">Supplier</label>
                                                            <input type="text" id="supplier" name="supplier" class="form-control" value="<?php echo $b['supplier'] ?>">
                                                            
                                                            <label for="keterangan">Keterangan</label>
                                                            <input type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $b['keterangan'] ?>">
                                                            <input type="hidden" name="id" value="<?=$id;?>">
                                                            <input type="hidden" name="idx" value="<?=$idb;?>">

                                                            
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" name="update">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>



                                                    <!-- The Modal -->
                                                    <div class="modal fade" id="del<?=$id;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Barang Masuk <?php echo $b['apd']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus barang ini dari daftar barang masuk?
                                                            <br>
                                                            *Stock barang akan berkurang
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
											}
                                            
                                            if(isset($_POST['masukbaru'])){
                                                $barang=$_POST['barang']; // ini ID barang nya
                                                $qty=$_POST['qty'];
                                                $tanggal=$_POST['tanggal'];
                                                $supplier=$_POST['supplier'];
                                                $ket=$_POST['ket'];

                                                $dt=mysqli_query($conn,"select * from sstock_brg where idx='$barang'");
                                                $data=mysqli_fetch_array($dt);
                                                $sisa=$data['stock']+$qty;
                                                $query1 = mysqli_query($conn,"update sstock_brg set stock='$sisa' where idx='$barang'");

                                                $query2 = mysqli_query($conn,"insert into sbrg_masuk (idx,tgl,jumlah,supplier,keterangan) values('$barang','$tanggal','$qty','$supplier','$ket')");

                                                if($query1 && $query2){
                                                    echo " <div class='alert alert-success'>
                                                    <strong>Success!</strong> Redirecting you back in 1 seconds.
                                                </div>
                                                <meta http-equiv='refresh' content='1; url= ../admin/masuk.php'/>  ";
                                                } else {
                                                    echo "<div class='alert alert-warning'>
                                                    <strong>Failed!</strong> Redirecting you back in 1 seconds.
                                                </div>
                                                <meta http-equiv='refresh' content='1; url= ../admin/masuk.php'/> ";
                                                }
                                            };

                                            if(isset($_POST['update'])){
                                                $id = $_POST['id']; //iddata
                                                $idx = $_POST['idx']; //idbarang
                                                $jumlah = $_POST['jumlah'];
                                                $supplier = $_POST['supplier'];
                                                $keterangan = $_POST['keterangan'];
                                                $tanggal = $_POST['tanggal'];
                                        
                                                $lihatstock = mysqli_query($conn,"select * from sstock_brg where idx='$idx'"); //lihat stock barang itu saat ini
                                                $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
                                                $stockskrg = $stocknya['stock'];//jumlah stocknya skrg
                                        
                                                $lihatdataskrg = mysqli_query($conn,"select * from sbrg_masuk where id='$id'"); //lihat qty saat ini
                                                $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
                                                $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg
                                        
                                                if($jumlah >= $qtyskrg){
                                                    //ternyata inputan baru lebih besar jumlah masuknya, maka tambahi lagi stock barang
                                                    $hitungselisih = $jumlah-$qtyskrg;
                                                    $tambahistock = $stockskrg+$hitungselisih;
                                        
                                                    $queryx = mysqli_query($conn,"update sstock_brg set stock='$tambahistock' where idx='$idx'");
                                                    $updatedata1 = mysqli_query($conn,"update sbrg_masuk set tgl='$tanggal',jumlah='$jumlah',supplier='$supplier',keterangan='$keterangan' where id='$id'");
                                                    
                                                    //cek apakah berhasil
                                                    if ($updatedata1 && $queryx){
                                        
                                                        echo " <div class='alert alert-success'>
                                                            <strong>Success!</strong> Redirecting you back in 1 seconds.
                                                        </div>
                                                        <meta http-equiv='refresh' content='1; url= ../admin/masuk.php'/>  ";
                                                        } else { echo "<div class='alert alert-warning'>
                                                            <strong>Failed!</strong> Redirecting you back in 3 seconds.
                                                        </div>
                                                        <meta http-equiv='refresh' content='3; url= ../admin/masuk.php'/> ";
                                                        };
                                        
                                                } else {
                                                    //ternyata inputan baru lebih kecil jumlah masuknya, maka kurangi lagi stock barang
                                                    $hitungselisih = $qtyskrg-$jumlah;
                                                    $kurangistock = $stockskrg-$hitungselisih;
                                        
                                                    $query1 = mysqli_query($conn,"update sstock_brg set stock='$kurangistock' where idx='$idx'");
                                        
                                                    $updatedata = mysqli_query($conn,"update sbrg_masuk set tgl='$tanggal', jumlah='$jumlah', supplier='$supplier', keterangan='$keterangan' where id='$id'");
                                        
                                                    //cek apakah berhasil
                                                    if ($query1 && $updatedata){
                                        
                                                        echo " <div class='alert alert-success'>
                                                            <strong>Success!</strong> Redirecting you back in 1 seconds.
                                                        </div>
                                                        <meta http-equiv='refresh' content='1; url= ../admin/masuk.php'/>  ";
                                                        } else { echo "<div class='alert alert-warning'>
                                                            <strong>Failed!</strong> Redirecting you back in 3 seconds.
                                                        </div>
                                                        <meta http-equiv='refresh' content='3; url= ../admin/masuk.php'/> ";
                                                        };
                                        
                                                };
                                        
                                        
                                                
                                            };
                                        
                                            if(isset($_POST['hapus'])){
                                                $id = $_POST['id'];
                                                $idx = $_POST['idx'];
                                        
                                                $lihatstock = mysqli_query($conn,"select * from sstock_brg where idx='$idx'"); //lihat stock barang itu saat ini
                                                $stocknya = mysqli_fetch_array($lihatstock); //ambil datanya
                                                $stockskrg = $stocknya['stock'];//jumlah stocknya skrg
                                        
                                                $lihatdataskrg = mysqli_query($conn,"select * from sbrg_masuk where id='$id'"); //lihat qty saat ini
                                                $preqtyskrg = mysqli_fetch_array($lihatdataskrg); 
                                                $qtyskrg = $preqtyskrg['jumlah'];//jumlah skrg
                                        
                                                $adjuststock = $stockskrg-$qtyskrg;
                                        
                                                $queryx = mysqli_query($conn,"update sstock_brg set stock='$adjuststock' where idx='$idx'");
                                                $del = mysqli_query($conn,"delete from sbrg_masuk where id='$id'");
                                        
                                                
                                                //cek apakah berhasil
                                                if ($queryx && $del){
                                        
                                                    echo " <div class='alert alert-success'>
                                                        <strong>Success!</strong> Redirecting you back in 1 seconds.
                                                      </div>
                                                    <meta http-equiv='refresh' content='1; url= ../admin/masuk.php'/>  ";
                                                    } else { echo "<div class='alert alert-warning'>
                                                        <strong>Failed!</strong> Redirecting you back in 1 seconds.
                                                      </div>
                                                     <meta http-equiv='refresh' content='1; url= ../admin/masuk.php'/> ";
                                                    }
                                            };
                                            ?>
										</tbody>
										</table>
                                        </div>
									<a href="exportbrgmsk.php" target="_blank" class="btn btn-info">Export Barang Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

	<!-- modal input -->
    <div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Masukkan Barang</h4>
						</div>
						<div class="modal-body">
							<form method="post">
                            <div class="form-group">
									<label>Tanggal</label>
									<input name="tanggal" type="date" class="form-control" required>
								</div>
								<div class="form-group">
									<label>APD</label>
									<select name="barang" class="custom-select form-control" required>
									<option selected>Pilih APD</option>
									<?php
									$det=mysqli_query($conn,"select * from sstock_brg order by apd ASC");
									while($d=mysqli_fetch_array($det)){
									?>
										<option value="<?php echo $d['idx'] ?>"><?php echo $d['apd'] ?> | <?php echo $d['pemakaian'] ?></option>
										<?php
								}
								?>
									</select>
								</div>
								<div class="form-group">
									<label>Jumlah</label>
									<input name="qty" type="number" min="1" class="form-control" placeholder="Qty" required>
								</div>
								<div class="form-group">
									<label>Supplier</label>
									<input name="supplier" type="text" class="form-control" placeholder="Supplier" required>
								</div>
								<div class="form-group">
									<label>Keterangan</label>
									<input name="ket" type="text" class="form-control" placeholder="Keterangan">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input type="submit" class="btn btn-primary" value="Simpan" name="masukbaru">
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
</body>

</html>