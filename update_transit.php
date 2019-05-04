<?php
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");
$id = $_GET['id'];
$nama = $statement->select_data("tbl_pegawai","username",$_SESSION['pegawai']);
$datas = $statement->select_data("tbl_pre_pengiriman","kd_pre_pengiriman",$id);
$wilayah = $statement->data_table("tbl_region");
$kurir = $statement->select_datas("tbl_kurir","kd_region",$nama['kd_region']);
$kode = $statement->autokode("tbl_pre_pengiriman","kd_pre_pengiriman","KPR");

if (isset($_POST['update'])) {
	$no_resi = $datas['no_resi'];
	$dari_kota = $datas['dari_kota'];
	$ke_kota = $datas['ke_kota'];
	$current_city = $datas['current_city'];
	$tarif = $datas['tarif'];
	$status = $_POST['status'];
	$kd_user= $datas['kd_user'];
	$kd_kurir = $_POST['kurir'];
	$nama_penerima = $datas['nama_penerima'];
	$alamat_penerima = $datas['alamat_penerima'];
	$form = "pegawai=barang_transit";
	$kecamatan = $datas['kecamatan'];
	$kelurahan = $datas['kelurahan'];

	$values = "'$kode','$no_resi','$dari_kota','$ke_kota','$kecamatan','$kelurahan','$current_city','$date','$tarif','$status','$kd_user','$kd_kurir','$nama_penerima','$alamat_penerima'";
	$statement->insert("tbl_pre_pengiriman",$values,$form);
	$statement->insert("tbl_riwayat_pengiriman",$values,$form);
}






?>

<form action="" method="post">
<div class="col-md-7 col-md-offset-2">
	<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="text-center">Kirim Barang <span class="fa fa-cube"></span></h3>
		</div>
		<div class="panel-body" >
		<div class="col-md-12">
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
		<div class="col-md-4" >
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
		</div>
		<div class="col-md-12">
			<div class="row">
			<div class="divider"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Perbarui Status</label>
					<select name="status" id="" class="form-control">
						<option value="">Pilih Status</option>
						<option value="Waiting To Take">Waiting To Take</option>
						<option value="On Delayed">On Delayed</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<label for="">Pilih Kurir</label>
				<select name="kurir" id="" class="form-control">
					<option value="">Pilih Kurir</option>
					<?php foreach ($kurir as $kur): ?>
					<option value="<?= $kur['kd_kurir'] ?>"><?= $kur['nama_kurir'] ?></option>
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