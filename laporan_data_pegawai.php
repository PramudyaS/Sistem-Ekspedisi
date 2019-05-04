<?php 
$datas = $statement->data_table("tbl_pegawai");
$wil = $statement->data_table("tbl_region");
$jumlah = $statement->count("kd_pegawai","tbl_pegawai");
$j_laki = $statement->count_where("kd_pegawai","tbl_pegawai","jenis_kelamin","L");
$j_perempuan = $statement->count_where("kd_pegawai","tbl_pegawai","jenis_kelamin","P");
if (isset($_GET['act'])) {
	$datas = $statement->select_datas("tbl_pegawai","status","ACTIVE");
	$jumlah = $statement->count_where("kd_pegawai","tbl_pegawai","status","ACTIVE");
	$j_laki = $statement->count_where2_values("kd_pegawai","tbl_pegawai","jenis_kelamin","L","status","ACTIVE");
	$j_perempuan = $statement->count_where2_values("kd_pegawai","tbl_pegawai","jenis_kelamin","P","status","ACTIVE");
}
if (isset($_GET['non_act'])) {
	$datas = $statement->select_datas("tbl_pegawai","status","NON-ACTIVE");
	$jumlah = $statement->count_where("kd_pegawai","tbl_pegawai","status","NON-ACTIVE");
	$j_laki = $statement->count_where2_values("kd_pegawai","tbl_pegawai","jenis_kelamin","L","status","NON-ACTIVE");
	$j_perempuan = $statement->count_where2_values("kd_pegawai","tbl_pegawai","jenis_kelamin","P","status","NON-ACTIVE");
}

 ?>
<style>
	@media print{
		.a{
			display: none;
		}
		.top_nav{
 			display: none !important;
 		}
 		footer{
 			display: none;
 		}
 	}
</style>

<div class="col-md-12">
	<div class="row">
		<h3>Data Pegawai</h3>
		<a href="" class="btn btn-primary a"  onclick="window.print()">Print Data <span class="fa fa-print"></span></a>
		<a href="?menus=laporan_data_pegawai&act" class="btn btn-success a" >Data Pegawai Active</a>
		<a href="?menus=laporan_data_pegawai&non_act" class="btn btn-danger a">Data Pegawai Non-Active</a>
		<table class="table table-bordered">
			<thead>
				<th>No</th>
				<th>Nama Pegawai</th>
				<th>Jenis Kelamin</th>
				<th>No Telp</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Kantor Wilayah</th>
				<th>Status</th>
			</thead>
			<tbody>
				<?php
				 $no = 1;
				 foreach ($datas as $key): ?>
				<tr>
				<td><?= $no++ ?></td>
				<td><?= $key['nama_pegawai'] ?></td>
				<td><?= $key['jenis_kelamin'] ?></td>
				<td><?= $key['no_telp'] ?></td>
				<td><?= $key['email'] ?></td>
				<td><?= $key['alamat'] ?></td>
				<?php foreach ($wil as $wilayah): ?>
				<?php if ($wilayah['kd_region'] == $key['kd_region']): ?>
				<td><?= $wilayah['wilayah'] ?></td>
				<?php endif ?>
				<?php endforeach ?>
				<td><?= $key['status'] ?></td>
				</tr>
				 <?php endforeach ?>
				<tr>
					<td colspan="3" rowspan="3" class="text-center"><h2 style="margin-top:8%">Jumlah Pegawai</h2></td>
					<td rowspan="3" class="text-center"><h2 style="margin-top:18%"><?= $jumlah['jumlah'] ?></h2></td>
				</tr>
				<tr>
					<td colspan="3">Laki -Laki</td>
					<td class="text-center"><?= $j_laki['jumlah'] ?></td>
				</tr>
				<tr>
					<td colspan="3">Perempuan</td>
					<td class="text-center"><?= $j_perempuan['jumlah'] ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>