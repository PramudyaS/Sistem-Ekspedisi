<?php 

$datas = $statement->select_datas("tbl_user","level","user");
$jumlah = $statement->count_where("kd_user","tbl_user","level","user");
$jumlah_l = $statement->count_where2_values("kd_user","tbl_user","level","user","jenis_kelamin","L");
$jumlah_p = $statement->count_where2_values("kd_user","tbl_user","level","user","jenis_kelamin","P");



 ?>
 <style>
 	@media print{
		#a{
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
		<h3>Data Pelanggan</h3>
		<a href="" class="btn btn-primary" onclick="window.print()" id="a">Print Data <span class="fa fa-print"></span></a>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>No</th>
				<th>Nama User</th>
				<th>Jenis Kelamin</th>
				<th>No Telp</th>
				<th>Email</th>
				<th class="text-center">Alamat</th>
				</tr>
			</thead>
			<tbody>
				<?php
				 $no = 1;
				 foreach ($datas as $key): ?>
				<tr>
				<td><?= $no++ ?></td>
				<td><?= $key['nama_user'] ?></td>
				<td><?= $key['jenis_kelamin'] ?></td>
				<td><?= $key['no_telp'] ?></td>
				<td><?= $key['email'] ?></td>
				<td><?= $key['alamat'] ?></td>
				</tr>
				<tr>
				<?php endforeach ?>
					<td colspan="3" rowspan="3" class="text-center"><h2 style="margin-top:8%">Total Pelanggan</h2></td>
					<td rowspan="3" class="text-center"><h2 style="margin-top:18%"><?= $jumlah['jumlah'] ?></h2></td>
				</tr>
				<tr>
					<td colspan="1" class="text-center">Laki - Laki</td>
					<td class="text-center"><?= $jumlah_l['jumlah'] ?></td>
				</tr>
				<tr>
					<td colspan="1" class="text-center">Perempuan</td>
					<td class="text-center"><?= $jumlah_p['jumlah'] ?></td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>