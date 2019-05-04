<?php 
$table = "tbl_kurir";
$all_reg = $statement->data_table("tbl_region");
if(isset($_GET['edit'])){
$id = $_GET['id'];
$data =  $statement->edit($table,"kd_kurir",$id);
}
if(isset($_POST['update'])){
$nama = $_POST['nama'];
$jk = $_POST['gender'];
$no_telp = $_POST['no_telp'];
$email = $_POST['email'];
$kd_region = $_POST['region'];
$username = $_POST['username'];
$lpass = base64_encode($_POST['password']);
$npass = base64_encode($_POST['npassword']);
$alamat = $_POST['alamat'];
$id = $_GET['id'];
$form = "pegawai=lihat_kurir";

if(empty($npass)){
	$value = "nama_kurir='$nama',jenis_kelamin='$jk',no_telp='$no_telp',email='$email',kd_region='$kd_region',username='$username',password='$lpass',alamat='$alamat'";
	$statement->update("tbl_kurir",$value,"kd_kurir",$id,$form);
}
else{
$values = "nama_kurir='$nama',jenis_kelamin='$jk',no_telp='$no_telp',email='$email',kd_region='$kd_region',username='$username',password='$npass',alamat='$alamat'";
$statement->update("tbl_kurir",$values,"kd_kurir",$id,$form);
}

}



$reg = $statement->select_data("tbl_region","kd_region",$data['kd_region']);


 ?>



<form action="" method="post">
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><span class="fa fa-user-circle"></span> Update Kurir <?= $data['kd_kurir'] ?> </h3>
			</div>
			<div class="panel-body">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Nama</label>
					<input type="text" name="nama" value="<?= $data['nama_kurir'] ?>" placeholder="Nama Kurir" autocomplete="off" required class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">No Telp</label>
						<input type="number" name="no_telp" value="<?= $data['no_telp'] ?>" placeholder="No Telp" required class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="email" value="<?= $data['email'] ?>" placeholder="Email" required class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="col-md-4">
					<label for="" style="margin-left:30%">Jenis Kelamin</label>
					<div class="radio" style="font-size:16px">
					<label for="gender" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="L" placeholder="" required="" <?php if ($data['jenis_kelamin'] == "L"): ?>
					 checked="true" <?php endif ?>>Laki - Laki</label>
					<label for="gender" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="P" placeholder="" required="" <?php if ($data['jenis_kelamin'] == "P"): ?>	
					checked="true" <?php endif ?> >Perempuan</label>
				</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					<label for="">Pilih Region</label>
					<select name="region" id="" class="form-control">
						<option value="<?= $data['kd_region'] ?>"><?= $reg['wilayah'] ?></option>
						<?php foreach ($all_reg as $key): ?>
						<?php if ($data['kd_region'] != $key['kd_region']): ?>
						<option value="<?= $key['kd_region'] ?>"><?= $key['wilayah']  ?></option>
						<?php endif ?>
						<?php endforeach ?>
						
					</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username" value="<?= $data['username'] ?>" placeholder="Username" class="form-control" required autocomplete="off">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Last Password</label>
						<input type="text" name="password" value="<?= base64_decode($data['password']) ?>" placeholder="" class="form-control" readonly required>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">New Password</label>
						<input type="password" name="npassword" value="" placeholder="" class="form-control" autocomplete="off"> 
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="">Alamat</label>
						<textarea name="alamat" id="" class="form-control" ><?= $data['alamat'] ?></textarea>
					</div>
				</div>
			</div>
			<hr>
			<button type="submit" class="btn btn-success" name="update" style="margin-left:2%">Update <span class="fa fa-pencil"></span></button>
			<a href="?pegawai=lihat_kurir" class="btn btn-warning">Cancel <span class="fa fa-close"></span></a>
		</div>
	</div>
</div>
</form>