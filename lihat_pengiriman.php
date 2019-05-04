<?php 
date_default_timezone_set('Asia/Jakarta');
$date = date("Y-m-d H:i:s");


$kd_kurir = $statement->select_data("tbl_kurir","username",$_SESSION['kurir']);
$datas = $statement->select_datas("tbl_pre_pengiriman","kd_kurir",$kd_kurir['kd_kurir']);

if(isset($_GET['ambil_pengiriman'])){
	
}




 ?>

<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hovered" id="example">
				<thead>
					<th>Kode Pre</th>
					<th>No Resi</th>
					<th>Dari Kota</th>
					<th>Ke Kota</th>
					<th>Tgl Pengiriman</th>
					<th>Tarif</th>
					<th>Status</th>
					<th>Nama Penerima</th>
					<th>Alamat Penerima</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php foreach ($datas as $key): ?>
					<tr>
						<td><?= $key['kd_pre_pengiriman'] ?></td>
						<td><?= $key['no_resi'] ?></td>
						<td><?= $key['dari_kota'] ?></td>
						<td><?= $key['ke_kota'] ?></td>
						<td><?= $key['tgl_pengiriman'] ?></td>
						<td><?= $key['tarif'] ?></td>
						<td><?= $key['status'] ?></td>
						<td><?= $key['nama_penerima'] ?></td>
						<td><?= $key['alamat_penerima'] ?></td>
						<td>
							<a href="?kurir=ambil_pengiriman&id=<?= $key['kd_pre_pengiriman'] ?>" class="btn btn-primary">Ambil <span class="fa fa-briefcase"></span></a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>