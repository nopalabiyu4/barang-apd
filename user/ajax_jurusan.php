<?php 
include '../koneksi.php';
$lokasi_nama = $_POST['lokasi_id'];
$tampil=mysqli_query($conn,"SELECT * FROM tbl_department WHERE lokasi_id='$lokasi_nama' order by department_nama");
$jml=mysqli_num_rows($tampil);
 
if($jml > 0){    
    while($r=mysqli_fetch_array($tampil)){
        ?>
        <option value="<?php echo $r['department_id'] ?>"><?php echo $r['department_nama'] ?></option>
        <?php        
    }

    echo "<option selected>- Silahkan Pilih Department -</option>";
}
 
?>