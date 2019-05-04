<?php 

$data =  $statement->data_table("tbl_user");


if(isset($_GET['edit'])){
$table = "tbl_barang";
$id = $_GET['id'];
$edit = $statement->edit($table,"no_resi",$id);
$kuser = $edit['kd_user'];
$nuser = $statement->edit("tbl_user","kd_user",$kuser);
}

if(isset($_POST['update'])){
	$user = $_POST['user'];
	$nabar = $_POST['nama'];
	$panjang = $_POST['panjang'];
	$berat = $_POST['berat'];
	$keterangan = $_POST['keterangan'];
	$gambar = $_FILES['gambar'];
	$fotos = $statement->foto($gambar);
	$values = "kd_user = '$user',nama_barang='$nabar',gambar ='$fotos',berat='$berat',panjang='$panjang',keterangan='$keterangan'";
	$id = $_GET['id'];
	$form = "pegawai=lihat_barang";
	if($fotos == ""){
		$value = "kd_user = '$user',nama_barang='$nabar',gambar ='$edit[gambar]',berat='$berat',panjang='$panjang',keterangan='$keterangan'";
		$statement->update("tbl_barang",$value,"no_resi",$id,$form);
	}
	else{
	$statement->update("tbl_barang",$values,"no_resi",$id,$form);
	}
}


 ?>

<form action="" method="post" enctype="multipart/form-data">
<div class="col-md-12">
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Edit Barang <?= $edit['no_resi'] ?><p style="margin-left:78%;margin-top:-2%"><?= $edit['created_date'] ?></p></h3>
		</div>
		<div class="panel-body">
			<div class="col-md-4">
				<div class="form-group">
					<select name="user" id="" placeholder="" class="form-control" required="">
						<option value="<?= $edit['kd_user'] ?>"><?= $nuser['nama_user'] ?></option>
						<?php foreach ($data as $field): ?>
							<?php if ($nuser['nama_user'] != $field['nama_user']): ?>
							<?php if ($field['level'] == "User"): ?>
								<option value="<?= $field['kd_user'] ?>"><?= $field['nama_user'] ?></option>
							<?php endif ?>
							<?php endif ?>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="text" name="nama" value="<?= $edit['nama_barang'] ?>" placeholder="Nama Barang" class="form-control" required>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="file" name="gambar" value="" placeholder="" class="form-control" >
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="text" name="panjang" value="<?= $edit['panjang'] ?>" placeholder="Panjang Barang(Cm)" class="form-control" required>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<input type="text" name="berat" value="<?= $edit['berat'] ?>" placeholder="Berat Barang(Kg)" class="form-control" required>
				</div>
			</div>
			<div class="col-md-4">
					<img src="image/<?= $edit['gambar'] ?>" alt="" style="margin-left:50%;width:20%;height:80px">
			</div>
			<div class="col-md-12" style="margin-top:-1%">
				<label for="">Keterangan :</label>
				<textarea name="keterangan" id="" cols="30" rows="10" class="form-control" required=""><?= $edit['keterangan'] ?></textarea>
			</div>
		</div>
		<hr>
			<a href="?pegawai=lihat_barang" class="btn btn-warning" style="margin-left:73%">Cancel <span class="fa fa-close"></span></a>
			<button class="btn btn-success" style="margin-left:82%;margin-top:-5.7%" name="update">Save Changes <span class="fa fa-pencil"></span></button>
	</div>
	
</div>
</form>