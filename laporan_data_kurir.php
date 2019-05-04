<?php 
$datas = $statement->data_table("tbl_kurir");
$wilayah = $statement->data_table("tbl_region");
$jumlah = $statement->count("kd_kurir","tbl_kurir");
$j_l = $statement->count_where("kd_kurir","tbl_kurir","jenis_kelamin","L");
$j_p = $statement->count_where("kd_kurir","tbl_kurir","jenis_kelamin","P");
$judul = "Semua Data Kurir";

if(isset($_GET['active'])){
	$judul = "Data Kurir(Active)";
	$datas = $statement->select_datas("tbl_kurir","status","ACTIVE");
	$jumlah = $statement->count_where("kd_kurir","tbl_kurir","status","ACTIVE");
	$j_l = $statement->count_where2_values("kd_kurir","tbl_kurir","jenis_kelamin","L","status","ACTIVE");
	$j_l = $statement->count_where2_values("kd_kurir","tbl_kurir","jenis_kelamin","P","status","ACTIVE");
}
if (isset($_GET['non-active'])) {
	$judul = "Data Kurir(Non-Active)";
	$datas = $statement->select_datas("tbl_kurir","status","NON-ACTIVE");
	$jumlah = $statement->count_where("kd_kurir","tbl_kurir","status","NON-ACTIVE");
	$j_l = $statement->count_where2_values("kd_kurir","tbl_kurir","jenis_kelamin","L","status","NON-ACTIVE");
	$j_p = $statement->count_where2_values("kd_kurir","tbl_kurir","jenis_kelamin","P","status","NON-ACTIVE");
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
<div class="col-md-12 col-sm-4">
	<div class="row">
		<h3><?= $judul ?></h3>
		<a href="" class="btn btn-primary a" onclick="window.print()" >Print Data <span class="fa fa-print"></span></a>
		<a href="?menus=laporan_data_kurir&active " class="btn btn-success a" >Lihat Data Kurir Active</a>
		<a href="?menus=laporan_data_kurir&non-active " class="btn btn-default a" style="background-color:#0099CC;color:white">Lihat Data Kurir Tidak Aktif</a>
		<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<th>No</th>
				<th>Nama Kurir</th>
				<th>Jenis Kelamin</th>
				<th>No Telp</th>
				<th>Email</th>
				<th class="text-center">Alamat</th>
				<th>Wilayah</th>
				<th>Status</th>
			</thead>
			<tbody>
				<?php
				 $no = 1;
				 foreach ($datas as $key): ?>
				<tr>
				<td><?= $no++ ?></td>
				<td><?= $key['nama_kurir'] ?></td>
				<td><?= $key['jenis_kelamin'] ?></td>
				<td><?= $key['no_telp'] ?></td>
				<td><?= $key['email'] ?></td>
				<td><?= $key['alamat'] ?></td>
				<?php foreach ($wilayah as $wil): ?>
					<?php if ($wil['kd_region'] == $key['kd_region']): ?>
					<td><?= $wil['wilayah'] ?></td>
					<?php endif ?>
				<?php endforeach ?>
				<td><?= $key['status'] ?></td>
				</tr>
				<?php endforeach ?>
				<tr>
					<td colspan="3" rowspan="3" class="text-center"><h2 style="margin-top:8%">Total Kurir</h2></td>
					<td rowspan="3" class="text-center"><h2 style="margin-top:18%"><?= $jumlah['jumlah'] ?></h2></td>
				</tr>
				<tr>
					<td colspan="3">Laki - Laki</td>
					<td><?= $j_l['jumlah'] ?></td>
				</tr>
				<tr>
					<td colspan="3">Perempuan</td>
					<td><?= $j_p['jumlah'] ?></td>
				</tr>
			</tbody>
		</table>
		</div>
	</div>
</div>