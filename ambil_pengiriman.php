<?php 
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");

$id = $_GET['id'];
$datas = $statement->select_data("tbl_pre_pengiriman","kd_pre_pengiriman",$id);
$wilayah = $statement->data_table("tbl_region");
$data_barang = $statement->select_datas("tbl_pre_pengiriman","no_resi",$id);
$kode = $statement->autokode("tbl_pre_pengiriman","kd_pre_pengiriman","KPR");
$kodes = $statement->autokode("tbl_pengiriman","kd_pengiriman","KPG");

if(isset($_POST['update'])){
	$id = $_GET['id'];
	
	$no_resi = $datas['no_resi'];
	$dari = $datas['dari_kota'];
	$ke = $datas['ke_kota'];
	$city = $_POST['lokasi'];
	$tarif = $datas['tarif'];
	$status = $_POST['status'];
	$kd_user = $datas['kd_user'];
	$kd_kurir = $datas['kd_kurir'];
	$namapen = $datas['nama_penerima'];
	$alampen = $datas['alamat_penerima'];
	$des = $datas['kecamatan'];
	$kelurahan = $datas['kelurahan'];

	$values = "'$kode','$no_resi','$dari','$ke','$des','$kelurahan','$city','$date','$tarif','$status','$kd_user','$kd_kurir','$namapen','$alampen'";
	if (empty($city) || empty($status)) {
		echo "<script>alert('Data Harus Lengkap')</script>";
	}
	else{
	$statement->insert("tbl_pre_pengiriman",$values,"");
	$statement->insert("tbl_riwayat_pengiriman",$values,"");
	}
		}
if(isset($_POST['delivered'])){
	$no_resi = $datas['no_resi'];
	$kd_user = $datas['kd_user'];
	$kd_kurir = $datas['kd_kurir'];
	$namapen = $datas['nama_penerima'];
	$alampen = $datas['alamat_penerima'];
	$dari = $datas['dari_kota'];
	$ke = $datas['ke_kota'];
	$tarif = $datas['tarif'];
	$des = $datas['kecamatan'];
	$kec = $datas['kelurahan'];
	$status = "Not Approved";

	$value = "'$kode','$no_resi','$dari','$ke','$des','$kec','$ke','$date','$tarif','$status','$kd_user','$kd_kurir','$namapen','$alampen'";
	$values = "'$kodes','$no_resi','$kd_user','$dari','$ke','$date','$namapen','$alampen','$tarif','$status','$kd_kurir'";
	// $statement->insert("tbl_pengiriman",$values,"kurir=struck&id=$no_resi");
	$statement->insert("tbl_pre_pengiriman",$value,"kurir=struck&id=$no_resi");
	$statement->insert("tbl_riwayat_pengiriman",$value,"kurir=struck&id=$no_resi");
}










 ?>


<form action="" method="post">
<div class="col-md-7 col-md-offset-2">
	<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="text-center">Ambil Barang <span class="fa fa-cube"></span></h3>
		</div>
		<div class="panel-body" >
		<div class="col-md-5 col-md-offset-1">
			<div class="row">
			<h4>Kode Pre Pengiriman </h4>
			<h4>No Resi </h4>
			<h4>Dari Kota </h4>
			<h4>Ke Kota </h4>
			<h4>Current City </h4>
			<h4>Tanggal Pengiriman </h4>
			<h4>Tarif </h4>
			<h4>Status </h4>
			<h4>Kode User </h4>
			<h4>Kode Kurir </h4>
			<h4>Nama Penerima </h4>
			<h4>Alamat Penerima </h4>
			</div>
			
		</div>
		<div class="col-md-1">
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
			<h4>:</h4>
		</div>
		<div class="col-md-5" >
			<div class="row">
			<h4><?= $datas['kd_pre_pengiriman'] ?></h4>
			<h4><?= $datas['no_resi'] ?></h4>
			<h4><?= $datas['dari_kota'] ?></h4>
			<h4><?= $datas['ke_kota'] ?></h4>
			<h4><?= $datas['current_city'] ?></h4>
			<h4><?= $datas['tgl_pengiriman'] ?></h4>
			<h4>Rp.<?= $datas['tarif'] ?></h4>
			<h4><?= $datas['status'] ?></h4>
			<h4><?= $datas['kd_user'] ?></h4>
			<h4><?= $datas['kd_kurir'] ?></h4>
			<h4><?= $datas['nama_penerima'] ?></h4>
			<h4><?= $datas['alamat_penerima'] ?></h4>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="row">
			<div class="divider"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Perbarui Status</label>
					<select name="status" id="" class="form-control">
						<option value="">Pilih Status</option>
						<option value="In Transit">In Transit</option>
						<option value="On Delayed">On Delayed</option>
						<option value="On The Way">On The Way</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<label for="">Perbarui Lokasi</label>
				<select name="lokasi" id="" class="form-control">
					<option value="">Pilih Wilayah</option>
					<?php foreach ($wilayah as $wil): ?>
					<option value="<?= $wil['wilayah'] ?>"><?= $wil['wilayah'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			</div>
			<button type="submit" name="update" class="btn btn-primary btn-block">Update <span class="fa fa-pencil"></span></button>
			<button type="submit" class="btn btn-success btn-block" name="delivered">Mark As Delivered <span class="fa fa-check-circle"></span></button>
		</div>
		</div>
		</div>
	</div>
	</div>
</div>
</form>