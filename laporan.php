<?php

$judul = "Semua Data Barang";
$datas = $statement->data_table("tbl_riwayat_pengiriman");
$brng = $statement->data_table("tbl_barang");
$jumlah = count($datas);
$user = $statement->data_table("tbl_user");
if (isset($_GET['wtt'])) {
	$judul = "Data Barang(Waiting To Take)";
	$datas = $statement->select_datas("tbl_riwayat_pengiriman","status","Waiting To Take");
	$jumlah = count($datas);
}
if (isset($_POST['cari'])) {
	$awal = $_POST['awal'];
	$akhir = $_POST['akhir'];
	$judul = "Data Barang Dari $awal Sampai $akhir";
	$datas = $statement->between_date("tbl_riwayat_pengiriman","tgl_pengiriman",$awal,$akhir);
	$jumlah = count($datas);
}
if (isset($_GET['delay'])) {
	$judul = "Data Barang(On Delayed)";
	$datas = $statement->select_datas("tbl_riwayat_pengiriman","status","On Delayed");
	$jumlah = count($datas);
}
if (isset($_GET['transit'])) {
	$judul = "Data Barang(In Transit)";
	$datas = $statement->select_datas("tbl_riwayat_pengiriman","status","In Transit");
	$jumlah = count($datas);
}
if (isset($_GET['napv'])) {
	$judul = "Data Barang(Not Approved)";
	$datas = $statement->select_datas("tbl_pre_pengiriman","status","Not Approved");
	$jumlah = count($datas);
}
if (isset($_GET['deliver'])) {
	$judul = "Data Barang(Delivered)";
	$datas = $statement->select_datas("tbl_riwayat_pengiriman","status","Delivered");
	$jumlah = count($datas);
}
if (isset($_GET['return'])) {
	$judul = "Data Barang(Return)";
	$datas = $statement->select_datas("tbl_riwayat_pengiriman","status","Return");
	$jumlah = count($datas);
}


 ?>
 <style>
 	@media print{
 		.top_nav{
 			display: none !important;
 		}
 		.a{
 			display: none;
 		}
 		footer{
 			display: none;
 		}
 		br{
 			display:none;
 		}
 		p{
 			display:block !important;
 		}
 	}
 </style>
<form action="" method="post">
<div class="col-md-12">
	<div class="row">
		<h2><?= $judul ?></h2>
		<a onclick="window.print()" class="btn btn-primary a">Print Data <span class="fa fa-print"></span></a>
		<a href="?menus=laporan_barang&wtt" class="btn btn-success a">Status WTT</a>
		<a href="?menus=laporan_barang&delay" class="btn btn-success a">Status Delay</a>
		<a href="?menus=laporan_barang&transit" class="btn btn-success a">Status Transit</a>
		<a href="?menus=laporan_barang&napv " class="btn btn-success a">Status Not Approved</a>
		<a href="?menus=laporan_barang&deliver" class="btn btn-success a">Delivered</a>
		<a href="?menus=laporan_barang&return" class="btn btn-success a">Return</a>
		<p style="display:none">PT. PSend Jl.Raya Jendral Pramudya No.56 Caringin Bogor</p>
		<br>
		<br>
		<div class="form-inline">
		<div class="col-md-12">
			<div class="row">
			<div class="col-md-1">
				
			<h4 class="text-center a">Tanggal</h4>
				
			</div>
			<div class="form-group">
			<div class="col-md-5">
			
				<input type="date" name="awal" value="" placeholder="" class="form-control a">
				
			</div>
			<div class="col-md-2">
				<div class="row">
				<h4 class="text-center a">Sampai</h4>
				</div>
			</div>
			<div class="col-md-5">
				
				<input type="date" name="akhir" value="" placeholder="" class="form-control a">

			</div>
			</div>
			<button type="submit" class="btn btn-primary a" name="cari">Cari <span class="fa fa-search"></span></button>
		</div>
		</div>
		</div>

	
		<br>
				<table class="table table-bordered">
					<thead>
						<th>No</th>
						<th>Nama Barang</th>
						<th>No Resi</th>
						<th>Berat</th>
						<th>Panjang</th>
						<th>Dari Kota</th>
						<th>Ke Kota</th>
						<th>Nama Pelanggan</th>
						<th>Tarif</th>
						<th>Status</th>
						<th>Tanggal</th>
					</thead>
					<tbody>
						<?php
						 $no = 1; 
						 foreach ($datas as $key): ?>
						<tr>
						<td><?= $no++ ?></td>
						<?php foreach ($brng as $barang): ?>
							<?php if ($barang['no_resi'] == $key['no_resi']): ?>
						<td><?= $barang['nama_barang'] ?></td>
						<?php endif ?>
						<?php endforeach ?>
						<td><?= $key['no_resi'] ?></td>
						<?php foreach ($brng as $barang): ?>
							<?php if ($barang['no_resi'] == $key['no_resi']): ?>
						<td><?= $barang['berat'] ?>Kg</td>
						<td><?= $barang['panjang'] ?>Cm</td>
						<?php endif ?>
						<?php endforeach ?>
						<td><?= $key['dari_kota'] ?></td>
						<td><?= $key['ke_kota'] ?></td>
						<?php foreach ($user as $users): ?>
							<?php if ($users['kd_user'] == $key['kd_user']): ?>
						<td><?= $users['nama_user'] ?></td>
							<?php endif ?>
						<?php endforeach ?>
						<td>Rp.<?= number_format($key['tarif']) ?>,00-</td>
						<td><?= $key['status'] ?></td>
						<td><?= $key['tgl_pengiriman'] ?></td>
						</tr>
						
						 <?php endforeach ?>
						
						<tr>
							<td colspan="10">Total Barang</td>
							<td class="text-center"><?= $jumlah ?></td>
						</tr>
					</tbody>
				</table>
	</div>
</div>
</form>