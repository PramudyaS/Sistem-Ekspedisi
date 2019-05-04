
<?php

$nama = $statement->select_data("tbl_pegawai","username",$_SESSION['pegawai']);
$ds = $statement->select_datas("tbl_barang","kd_region",$nama['kd_region']);
$dats = $statement->select_data("tbl_barang","kd_region",$nama['kd_region']);
$barang = $statement->select_data("tbl_pengiriman","no_resi",$dats['no_resi']);
// $ds = $statement->select_where_not_exits("tbl_barang","tbl_pengiriman","no_resi","no_resi");


if(isset($_GET['hapus'])){
	$id = $_GET['id'];
	$statement->delete("tbl_barang","no_resi",$id,"pegawai=lihat_barang");
}

 ?>

<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
<table id="example" class="table table-hover" style="width:100%">
	<thead>
		<tr>
		<th>No Resi</th>
		<th>Kode User</th>
		<th>Nama Barang</th>
		<th>Panjang</th>
		<th>Berat</th>
		<th>Keterangan</th>
		<th>Dibuat Tanggal</th>
		<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($ds as $data): ?>
			<?php if ($data['status'] != "Delivered"): ?>
				
			
			<tr>
				<td><?= $data['no_resi'] ?></td>
				<td><?= $data['kd_user'] ?></td>
				<td><?= $data['nama_barang'] ?></td>
				<td><?= $data['panjang'] ?> Cm</td>
				<td><?= $data['berat'] ?> Kg</td>
				<td><?= $data['keterangan'] ?></td>
				<td><?= $data['created_date'] ?></td>
				<td>
						<div class="btn-group">
						<a href="?pegawai=lihat_barang&hapus&id=<?= $data['no_resi'] ?>" class="btn btn-danger" onclick="return confirm('Apa Anda Yakin?')"><span class="fa fa-trash"></span></a>
						<a href="?pegawai=edit_barang&edit&id=<?= $data['no_resi'] ?>" class="btn btn-info"><span class="fa fa-pencil"></span></a>
						<a href="?pegawai=kirim_barang&id=<?= $data['no_resi'] ?>" class="btn btn-primary">Kirim <span class="fa fa-send"></span></a>	
						</div>
				</td>
			</tr>
			<?php endif ?>
		<?php endforeach ?>
		
	</tbody>
</table>
</div>
</div>
</div>
</div>




