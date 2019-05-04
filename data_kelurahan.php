<?php 

$con = mysqli_connect("localhost","root","","db_pengirimanbarang");

$sql1 = "SELECT * FROM tbl_region WHERE wilayah = '$_POST[wilayah]'";
$querys = mysqli_query($con,$sql1);
$data1 = mysqli_fetch_assoc($querys);

$sqls = "SELECT * FROM tbl_kecamatan WHERE kecamatan = '$_POST[kecamatan]'";
$query = mysqli_query($con,$sqls);
$data = mysqli_fetch_assoc($query);


$sql = "SELECT * FROM tbl_kelurahan WHERE kd_kecamatan = '$data[kd_kecamatan]' AND kd_region='$data1[kd_region]'";
$query = mysqli_query($con,$sql);
echo '<option value="">Pilih Kelurahan</option>';
while ($datas = mysqli_fetch_assoc($query)) : ?>
<option value="<?= $datas['kelurahan'] ?>"><?= $datas['kelurahan'] ?></option>
<?php  endwhile ?>