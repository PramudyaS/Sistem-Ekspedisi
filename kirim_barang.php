<?php
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");

$kode = $statement->autokode("tbl_pre_pengiriman","kd_pre_pengiriman","KPR");
$id = $_GET['id'];
$datas = $statement->select_data("tbl_barang","no_resi",$id);
$wilayah = $statement->data_table("tbl_region");
$sta = $statement->data_table("tbl_pengiriman");
$p = $statement->select_data("tbl_pegawai","username",$_SESSION['pegawai']);
$d_kurir = $statement->select_datas("tbl_kurir","kd_region",$p['kd_region']);
$d_wilayah = $statement->select_data("tbl_region","kd_region",$p['kd_region']);


if(isset($_POST['kirim'])){
	$kd_pengiriman = $_POST['kd_pre_pengiriman'];
	$dari_k = $_POST['dari'];
	$ke_k = $_POST['ke'];
	$no_resi = $_POST['no_resi'];
	$kd_user = $_POST['kd_user'];
	$nama = $_POST['nama'];
	$status = $_POST['status'];
	$kd_kurir = $_POST['kurir'];
	$alamat = $_POST['alamat'];
	$kel = $_POST['kelurahan'];
	$kec = $_POST['kecamatan'];

	$route = $statement->select_where_2data("tbl_route","dari_kota",$dari_k,"ke_kota",$ke_k);

	if($datas['berat'] <= 10){
		$harga = $route['tarif'] + "5000";
	}
	elseif($datas['berat'] >= 10 ){
		$harga = $route['tarif'] + "10000";
	}
	elseif($datas['berat'] >= 20 ){
		$harga = $route['tarif'] + "15000";
	}
	elseif($datas['berat'] >= 30 ){
		$harga = $route['tarif'] + "20000";
	}
	elseif($datas['berat'] >= 40 ){
		$harga = $route['tarif'] + "25000";
	}
	else{
		$harga = $route['tarif'] + "35000";
	}

	$values = "'$kd_pengiriman','$no_resi','$dari_k','$ke_k','$kec','$kel','$dari_k','$date','$harga','$status','$kd_user','$kd_kurir','$nama','$alamat'";
	$statement->insert("tbl_riwayat_pengiriman",$values,"pegawai=struck&id=$kd_pengiriman");
	$statement->insert("tbl_pre_pengiriman",$values,"pegawai=struck&id=$kd_pengiriman");

}


	



?>



<form action="" method="post" name="barang">
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading" style="background-color:#3399CC">
				<h3 style="color:white"><span class="fa fa-briefcase"></span> Kirim Barang</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Kode Pre Pengiriman</label>
						<input type="text" name="kd_pre_pengiriman" value="<?= $kode ?>" placeholder="" class="form-control" required="" readonly="">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">No Resi</label>
						<input type="text" name="no_resi" value="<?= $datas['no_resi'] ?>" placeholder="" required="" readonly="" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Kode User</label>
						<input type="text" name="kd_user" value="<?= $datas['kd_user'] ?>" placeholder="" required="" readonly="" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label for="">Dari Kota</label>
					<select name="dari" id="dari" class="form-control" required="">
						<option value="">Pilih Wilayah</option>
							<option value="<?= $d_wilayah['wilayah'] ?>"><?= $d_wilayah['wilayah'] ?></option>
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Ke Kota</label>
						<select name="ke" id="kota" class="form-control" required="">
							<option value="">Pilih Wilayah</option>
							<?php foreach ($wilayah as $wil): ?>
							<option value="<?= $wil['wilayah'] ?>"><?= $wil['wilayah'] ?></option>
						<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Kecamatan</label>
						<select name="kecamatan" id="kecamatan" class="form-control" required="">
							<option value="">Pilih Kecamatan</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">kelurahan</label>
						<select name="kelurahan" id="kelurahan" class="form-control" required="">
							<option value="">Pilih Kelurahan</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Nama Penerima</label>
						<input type="text" name="nama" value="" autocomplete="off" placeholder="" class="form-control" id="trf" onchange="return hua()" required="">
					</div>
				</div>
			
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Status Barang</label>
					<select name="status" id="" class="form-control" required="">
						<option value="">Pilih Status</option>
						<option value="Waiting To Take">Waiting To Take</option>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Pilih Kurir</label>
					<select name="kurir" id="" class="form-control" required="">
						<option value="">Pilih Kurir</option>
						<?php foreach ($d_kurir as $kk ): ?>
						 	<option value="<?= $kk['kd_kurir'] ?>"><?= $kk['nama_kurir'] ?></option>
						<?php endforeach ?>
						
					</select>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label for="">Alamat Lengkap</label>
					<textarea name="alamat" id="" class="form-control"></textarea>
				</div>
			</div>
			</div>
			<hr>
			<button type="submit" class="btn btn-primary" style="margin-left:2%" name="kirim">Kirim <span class="fa fa-send"></span></button>
		</div>
	</div>
</div>
</form>

 <script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

$('#kota').change(function(){
	var wilayah = $('#kota').val();

	$.ajax({
		type : "POST",
		dataType : "html",
		url : "data_kecamatan.php",
		data : "wilayah=" + wilayah,
		success : function(msg){
			if(msg == ""){

			}
			else{
				$('#kecamatan').html(msg);
			}
		}
	});
});
$('#kecamatan').change(function(){
	var kecamatan = $('#kecamatan').val();
	var wilayah = $('#kota').val();
	$.ajax({
		type : "POST",
		dataType : "html",
		url : "data_kelurahan.php",
		data : {kecamatan : kecamatan,wilayah : wilayah},
		success : function(msg){
			if(msg == ""){

			}
			else{
				$('#kelurahan').html(msg);
			}
		}
	});
	$('#kota').change(function(){
		document.getElementById("kelurahan").innerHTML="<option>Pilih Kelurahan</option>"
	});
});

</script>
