<?php 
$table = "tbl_kurir";
$reg = $statement->select_data("tbl_pegawai","username",$_SESSION['pegawai']);
$datas = $statement->select_datas($table,"kd_region",$reg['kd_region']);


if(isset($_GET['hapus'])){
	$id = $_GET['id'];
	$statement->delete($table,"kd_kurir",$id,"pegawai=lihat_kurir");
}
if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$values ="status='ACTIVE'";
	$statement->update($table,$values,"kd_kurir",$id,"pegawai=lihat_kurir");	
}
if (isset($_GET['non_act'])) {
	$id = $_GET['id'];
	$values = "status='NON-ACTIVE'";
	$statement->update($table,$values,"kd_kurir",$id,"pegawai=lihat_kurir");
}


 ?>

<style>
	.suc:hover{
		background-color:#CC3333;
		border-color: #CC3333;
	}	
</style>
<form action="">
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
		<div class="panel-body ">
			<table class="table table-bordered table-hovered" id="example">
			<thead>
				<th>Kode Kurir</th>
				<th>Nama Kurir</th>
				<th>Jenis Kelamin</th>
				<th>No Telp</th>
				<th>Kode Region</th>
				<th>Username</th>
				<th>Password</th>
				<th>Alamat</th>
				<th class="text-center">Action</th>
			</thead>
			<tbody>
				<?php foreach ($datas as $field): ?>				
					<tr>
					<td><?= $field['kd_kurir'] ?></td>
					<td><?= $field['nama_kurir'] ?></td>
					<td><?= $field['jenis_kelamin'] ?></td>
					<td><?= $field['no_telp'] ?></td>
					<td><?= $field['kd_region'] ?></td>
					<td><?= $field['username'] ?></td>
					<td><?= $field['password'] ?></td>
					<td><?= $field['alamat'] ?></td>
					<td>
						
						<a href="?pegawai=lihat_kurir&hapus&id=<?= $field['kd_kurir'] ?>" class="btn btn-danger" onclick="return confirm('Apa anda yakin?')">Delete <span class="fa fa-trash"></span></a>
						<a href="?pegawai=update_kurir&edit&id=<?= $field['kd_kurir'] ?>" class="btn btn-info">Edit <span class="fa fa-pencil"></span></a>
						<?php if ($field['status'] == "NON-ACTIVE"): ?>
							<a href="?pegawai=lihat_kurir&act&id=<?= $field['kd_kurir'] ?>" class="btn btn-success suc" onclick="return confirm('Set Status Menjadi Active')" >Active</a>
						<?php else: ?>
							<a href="?pegawai=lihat_kurir&non_act&id=<?= $field['kd_kurir'] ?>" class="btn btn-danger non" onclick="return confirm('Set Status Menjadi Non-Active')" >Non-Active</a>
						<?php endif ?>
						
					</td>
				</tr>
				<?php endforeach ?>

			</tbody>
		</table>
		</div>
		</div>
	</div>
</div>
</form>