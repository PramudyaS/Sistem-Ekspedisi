<?php 
date_default_timezone_set("Asia/Jakarta");
$waktu = date('Y-m-d H:i:s');

$table = "tbl_barang";

$kode = $statement->autokode($table,"no_resi","NBR");
$np = $statement->data_table("tbl_user");
$reg = $statement->select_data("tbl_pegawai","username",$_SESSION['pegawai']);

if(isset($_POST['simpan'])){
	$kd = $_POST['resi'];
	$pengirim = $_POST['pengirim'];
	$barang = $_POST['barang'];
	$berat = $_POST['berat'];
	$panjang = $_POST['panjang'];
	$foto = $_FILES['gambar'];
	$gambar = $statement->foto($foto);
	$keterangan = $_POST['keterangan'];

	$values = "'$kd','$pengirim','$barang','$gambar','$berat','$panjang','$keterangan','$waktu','$reg[kd_region]','Not Delivered'";
	if (empty($kd) || empty($pengirim) || empty($barang) || empty($berat) || empty($panjang) || empty($gambar) || empty($keterangan)) {
		echo "<script>alert('Data Harus Lengkap')</script>";
	}
	else{
	$statement->insert($table,$values,"pegawai=tambah_barang");
	}
}





 ?>







<div class="col md-12">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="panel panel-default" style="margin-top:5%;">
		<div class="panel-heading" style="background-color:#006699">
			<h3 style="color:white">Tambah Barang <i class="fa fa-cube"></i></h3>
		</div>
		<div class="panel-body">
			<div class="col-md-4">
				<div class="form-group">
					<label for="">No Resi Barang</label>
					<input type="text" name="resi" value="<?= $kode ?>" placeholder="" class="form-control" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Nama Pengirim</label>
					<select name="pengirim" id="" class="form-control" required="">
						<option value="">Pilih User</option>
						<?php foreach ($np as $datas): ?>
							<?php if ($datas['level'] != "Admin"): ?>
								<option value="<?= $datas['kd_user'] ?>"><?= $datas['nama_user'] ?></option>
							<?php endif ?>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Nama Barang</label>
					<input type="text" name="barang" value="" placeholder="" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Berat</label>	
					<input type="number" name="berat" value="" placeholder="Kg" class="form-control" required="" autocomplete="off" min="1">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Panjang</label>
					<input type="number" name="panjang" value="" placeholder="Cm" class="form-control" required="" autocomplete="off" min="1">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Pilih Gambar</label>
					<input type="file" name="gambar" value="" placeholder="" class="form-control" required="" >
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label for="">Keterangan</label>
					<textarea name="keterangan" id="" cols="30" rows="10" class="form-control"  autocomplete="off"></textarea>
				</div>
			</div>
			
		</div>
		<div class="divider"></div>
		<button type="submit" class="btn btn-primary" name="simpan" style="margin-left:85%;width:10%;height:40px">Simpan <span class="fa fa-save"></span></button>

	</div>

	</form>
</div>





