<?php 
$datas = $statement->data_table("tbl_pegawai");



if(isset($_GET['delete'])){
	$id = $_GET['id'];
	$statement->delete("tbl_pegawai","kd_pegawai",$id,"menus=lihat_pegawai");
}
if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$values ="status='ACTIVE'";
	$statement->update("tbl_pegawai",$values,"kd_pegawai",$id,"menus=lihat_pegawai");	
}
if (isset($_GET['non_act'])) {
	$id = $_GET['id'];
	$values = "status='NON-ACTIVE'";
	$statement->update("tbl_pegawai",$values,"kd_pegawai",$id,"menus=lihat_pegawai");
}


 ?>

<style>
	.suc:hover{
		background-color:#CC3333;
		border-color: #CC3333;
	}	
</style>
<form action="" method="post">
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-bordered" id="example" style="width:100%">
			<thead>
				<tr>
				<th>Kode Pegawai</th>
				<th>Nama Pegawai</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>No Telp</th>
				<th>Username</th>
				<th>Password</th>
				<th>Kode Region</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($datas as $key): ?>
				<tr>
					<td><?= $key['kd_pegawai'] ?></td>
					<td><?= $key['nama_pegawai'] ?></td>
					<td><?= $key['jenis_kelamin'] ?></td>
					<td><?= $key['alamat'] ?></td>
					<td><?= $key['no_telp'] ?></td>
					<td><?= $key['username'] ?></td>
					<td><?= $key['password'] ?></td>
					<td><?= $key['kd_region'] ?></td>
					<td>
							<a href="?menus=lihat_pegawai&delete&id=<?= $key['kd_pegawai'] ?>" class="btn btn-danger" onclick="return confirm('Apa anda Yakin ?')">Delete </a>
							<a href="?menus=update_pegawai&edit&id=<?= $key['kd_pegawai'] ?>" class="btn btn-info">Edit</a>
							<?php if ($key['status'] == "NON-ACTIVE"): ?>
							<a href="?menus=lihat_pegawai&act&id=<?= $key['kd_pegawai'] ?>" class="btn btn-success suc" onclick="return confirm('Set Status Menjadi Active')" >Active</a>
							<?php else: ?>
							<a href="?menus=lihat_pegawai&non_act&id=<?= $key['kd_pegawai'] ?>" class="btn btn-danger non" onclick="return confirm('Set Status Menjadi Non-Active')" >Non-Active</a>
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
	</div>
</div>
</form>
<script>
	
</script>