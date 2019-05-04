<?php

$kd_kurir = $statement->select_data("tbl_kurir","username",$_SESSION['kurir']);
$datas = $statement->select_where_2datas("tbl_pre_pengiriman","kd_kurir",$kd_kurir['kd_kurir'],"status","Waiting To Take");







 ?>

<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-hover" id="example">
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
						<?php foreach ($datas as $data): ?>
						<tr>
						<td><?= $data['kd_pre_pengiriman'] ?></td>
						<td><?= $data['no_resi'] ?></td>
						<td><?= $data['dari_kota'] ?></td>
						<td><?= $data['ke_kota'] ?></td>
						<td><?= $data['tgl_pengiriman'] ?></td>
						<td><?= $data['tarif'] ?></td>
						<td><?= $data['status'] ?></td>
						<td><?= $data['nama_penerima'] ?></td>
						<td><?= $data['alamat_penerima'] ?></td>
						<td>
							<a href="?kurir=ambil_pengiriman&id=<?= $data['kd_pre_pengiriman'] ?>" class="btn btn-primary">Ambil <span class="fa fa-briefcase"></span></a>
						</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>