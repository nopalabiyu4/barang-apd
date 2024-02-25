<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['sebagai'])) {
  header("Location: ../index.php");
}

if (isset($_SESSION['sebagai'])) {
  if ($_SESSION['sebagai'] == 'admin') {
    header('Location: admin.php');
  }
}

$sekarang = date("Y-m-d");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Safety | Input Data karyawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/icon/logosafety.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
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
                    <a href="../logout.php" onclick="return confirm('Apakah anda yakin ingin logout?')"><img src="../assets/images/icon/safetyk3.png" alt="ciilogo" width="100%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
							    <a href="../user/index.php"><i class="ti-pencil-alt"></i><span>Input Data Karyawan</span></a>
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
            
            if(isset($_POST['datakaryawanbaru'])){
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
                <meta http-equiv='refresh' content='1; url= ../user/index.php'/>  ";
                
                } else {
                    echo "<div class='alert alert-warning'>
                    <strong>Failed!</strong> Redirecting you back in 1 seconds.
                  </div>
                 <meta http-equiv='refresh' content='1; url= ../user/index.php'/> ";
                }
            };
            ?>
            
            <div class="main-content-inner">
                <!-- market value area start -->
                <div class="row mt-3 mb-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Input Data Karyawan</h2>
                                    <i><span style="float: center; font-size: 13px; color: red;">* Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</span></i>
                                </div>
                            <div class="modal-body">
							<form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input name="tanggal" type="text" value="<?=$sekarang;?>" class="form-control" readonly>
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
							<div align="right">
								<button type="reset" class="btn btn-outline-danger">Reset</button>
								<input type="submit" class="btn btn-outline-primary" value="Simpan" name="datakaryawanbaru">
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
    
    <script type="text/javascript">
            function isi_otomatis(){
                var bundy = $("#bundy").val();
                $.ajax({
                    url: 'ajax.php',
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
                    url: 'ajax_jurusan.php', 
                    data: 'lokasi_id=' + lokasi_nama, 
                    success: function(response) { 
                        $('#department_nama').html(response); 
                    }
                });
            });
        </script>

	
</body>

</html>
