<?php 
$table = "tbl_region";
$form = "menus=kelola_region";
$kode = $statement->autokode($table,"kd_region","REG");
$datas = $statement->data_table($table);
if(isset($_POST['simpan'])){
	$nama = $_POST['region'];
	$kd_region = $_POST['kd_region'];
	$values = "'$kd_region','$nama'";
	$statement->insert($table,$values,$form);
}
if(isset($_GET['hapus'])){
	$id = $_GET['id'];
	$statement->delete($table,"kd_region",$id,$form);
}
if(isset($_GET['edit'])){
	$id = $_GET['id'];
	$edit = $statement->edit($table,"kd_region",$id);
	$kode = $edit['kd_region'];
}
if(isset($_POST['update'])){
	$nama = $_POST['region'];
	$kd_region = $_POST['kd_region'];
	$value = "kd_region='$kd_region',wilayah='$nama'";
	$statement->update($table,$value,"kd_region",$kd_region,$form);
}




 ?>
<form action="" method="post">
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 style="color:#5DADEC"><span class="fa fa-sitemap"></span> Kelola Data Region</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
							<label for="">Kode Region</label>
							<input type="text" name="kd_region" value="<?= $kode ?>" placeholder="" class="form-control" name="kd_region" required readonly> 
							</div>
							<div class="form-group">
								<label for="">Nama Region</label>
								<input type="text" value="<?= @$edit['wilayah'] ?>" placeholder="" class="form-control" name="region" required="">
							</div>
							<br>
							<?php if (!isset($_GET['edit'])): ?>
								<button type="submit" class="btn btn-primary" name="simpan">Simpan <span class="fa fa-save"></span></button>
							<?php else: ?>
							<button type="submit" class="btn btn-success" name="update">Update <span class="fa fa-pencil"></span></button>	
							<a href="?menus=kelola_region" class="btn btn-warning">Cancel <span class="fa fa-close"></span></a>
							<?php endif ?>
						</div>
						<div class="col-md-8">
						<table class="table table-bordered" id="example" style="width:100%s">
							<thead>
								<th>No</th>
								<th>Kode Region</th>
								<th>Nama Region</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php
								$no = 1;
								 foreach ($datas as $field): ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $field['kd_region'] ?></td>
									<td><?= $field['wilayah'] ?></td>
									<td>
										<div class="btn-group">
										<a href="?menus=kelola_region&hapus&id=<?= $field['kd_region'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin')">Delete <span class="fa fa-trash"></span></a>
										<a href="?menus=kelola_region&edit&id=<?= $field['kd_region'] ?>" class="btn btn-info" ">Edit <span class="fa fa-pencil"></span></a>
										</div>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>