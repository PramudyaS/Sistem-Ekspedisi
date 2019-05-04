
<?php

$id = $_GET['id'];
$datas = $statement->select_data("tbl_pegawai","kd_pegawai",$id);
$region = $statement->data_table("tbl_region");

$wil = $statement->select_data("tbl_region","kd_region",$datas['kd_region']);
if (isset($_POST['update'])) {
	$nama = $_POST['nama'];
	$telp = $_POST['telp'];	
	$email = $_POST['email'];
	$username = $_POST['username'];
	$lpass = base64_encode($_POST['lpass']);
	$npass = base64_encode($_POST['npass']);
	$jk = $_POST['gender'];
	$reg = $_POST['region'];
	$alamat = $_POST['alamat'];

	$form = "menus=lihat_pegawai";
	$value = "nama_pegawai='$nama',jenis_kelamin='$jk',alamat='$alamat',email='$email',no_telp='$telp',username='$username',password='$lpass',kd_region='$reg'";

	$values = "nama_pegawai='$nama',jenis_kelamin='$jk',alamat='$alamat',email='$email',no_telp='$telp',username='$username',password='$npass',kd_region='$reg'";
	if (empty($npass)) {
	$statement->update("tbl_pegawai",$value,"kd_pegawai",$id,$form);	 
	}
	else{
	$statement->update("tbl_pegawai",$values,"kd_pegawai",$id,$form);	 
	}
	

	
}


  ?>

<form action="" method="post">
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Edit Pegawai <?= $datas['kd_pegawai'] ?></h3>
			</div>
			<div class="panel-body">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Nama Pegawai</label>
						<input type="text" name="nama" value="<?= $datas['nama_pegawai'] ?>" placeholder="" class="form-control" required="">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">No Telp</label>
						<input type="number" name="telp" value="<?= $datas['no_telp'] ?>" placeholder="" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="email" value="<?= $datas['email'] ?>" placeholder="" class="form-control" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username" value="<?= $datas['username'] ?>" placeholder="" class="form-control" required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Last Password</label>
						<input type="text" name="lpass" value="<?= base64_decode($datas['password']) ?>" placeholder="" class="form-control" required="" readonly>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label for="">New Password</label>
					<input type="password" name="npass" value="" placeholder="" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<label for="" style="margin-left:30%">Jenis Kelamin</label>
					<div class="radio" style="font-size:17px">

					<label for="gender" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="L" placeholder="" required="" <?php if ($datas['jenis_kelamin'] == "L"): ?>
					 checked <?php endif ?>  >Laki - Laki</label>

					<label for="gender" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="P" placeholder="" required="" <?php if ($datas['jenis_kelamin'] == "P"): ?>
					  checked <?php endif ?> >Perempuan</label>
				</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Pilih Region</label>
						<select name="region" id="" class="form-control" required="">
							<option value="<?= $datas['kd_region'] ?>"><?= $wil['wilayah'] ?></option>
							<?php foreach ($region as $key ): ?>
								<?php if ($key['kd_region'] != $datas['kd_region']): ?>
									<option value="<?= $key['kd_region'] ?>"><?= $key['wilayah'] ?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="col-md-12s">
					<div class="form-group">
						<label for="">Alamat</label>
						<textarea name="alamat" id="" class="form-control" required=""><?= $datas['alamat'] ?></textarea>
					</div>
				</div>
			</div>
			<hr>
			<button type="submit" class="btn btn-success" name="update" style="margin-left:2%">Update <span class="fa fa-pencil"></span></button>
			<a href="?menus=lihat_pegawai" class="btn btn-warning">Cancel <span class="fa fa-close"></span></a>
		</div>
	</div>
</div>
</form>