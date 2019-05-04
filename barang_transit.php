<?php
$nama = $statement->select_data("tbl_pegawai","username",$_SESSION['pegawai']);
$wil = $statement->select_data("tbl_region","kd_region",$nama['kd_region']);
$datas = $statement->select_where_2datas("tbl_pre_pengiriman","current_city",$wil['wilayah'],"status","In Transit");
$ds = $statement->select_where_not_exits("tbl_barang","tbl_pengiriman","no_resi","no_resi");




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
					<td>Rp.<?= $data['tarif'] ?></td>
					<td><?= $data['status'] ?></td>
					<td><?= $data['nama_penerima'] ?></td>
					<td><?= $data['alamat_penerima'] ?></td>
					<td>
						<a href="?pegawai=update_transit&kirim&id=<?= $data['kd_pre_pengiriman'] ?>" class="btn btn-primary">Kirim <span class="fa fa-mail-forward"></span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
		</div>
	</div>
</div>