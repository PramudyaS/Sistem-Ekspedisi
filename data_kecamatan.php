<?php 

$con = mysqli_connect("localhost","root","","db_pengirimanbarang") or die("Gagal Connect");
$sqls = "SELECT * FROM tbl_region WHERE wilayah = '$_POST[wilayah]'";
$querys = mysqli_query($con,$sqls);
$data = mysqli_fetch_assoc($querys);
$sql = "SELECT * FROM tbl_kecamatan WHERE kd_region = '$data[kd_region]'";
$query = mysqli_query($con,$sql);
echo '<option value="">Pilih Kecamatan</option>';
while ($datas = mysqli_fetch_assoc($query)): ?>
	<option value="<?= $datas['kecamatan'] ?>"><?= $datas['kecamatan'] ?></option>

<?php endwhile; ?>