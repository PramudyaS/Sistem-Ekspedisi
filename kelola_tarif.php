<?php 

$table = "tbl_route";
$kode = $statement->autokode($table,"kd_route","ROT");
$wil = $statement->data_table("tbl_region");
$datas = $statement->data_table($table);

if (isset($_POST['simpan'])) {
	$kd_route = $_POST['kd_route'];
	$dari_kota = $_POST['dari_kota'];
	$ke_kota = $_POST['ke_kota'];
	$tarif = $_POST['tarif'];
	$form = "menus=kelola_tarif";

	$values = "'$kd_route','$dari_kota','$ke_kota','$tarif'";
	$value = "'$kode','$ke_kota','$dari_kota','$tarif'";
	$statement->insert($table,$values,$form);
	$statement->insert($table,$value,$form);

}
if(isset($_GET['delete'])){
	$id = $_GET['id'];
	$form = "menus=kelola_tarif";
	$statement->delete("tbl_route","kd_route",$id,$form);
}
if(isset($_GET['edit'])){
	$id = $_GET['id'];
	$data_e = $statement->edit($table,"kd_route",$id);
	$kode = $data_e['kd_route'];

}
if (isset($_POST['update'])) {
	$id = $_GET['id'];
	$dari_kota = $_POST['dari_kota'];
	$ke_kota = $_POST['ke_kota'];
	$tarif = $_POST['tarif'];
	$form = "menus=kelola_tarif";

	$values = "dari_kota='$dari_kota',ke_kota='$ke_kota',tarif='$tarif'";

	$statement->update($table,$values,"kd_route",$id,$form);
}





 ?>




<form action="" method="post">
<div class="col-md-12">
	<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 style="color:#299617"><span class="fa fa-money"></span> Kelola Tarif</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Kode Route</label>
					<input type="" name="kd_route" value="<?= $kode ?>" placeholder="" class="form-control" required="" readonly="">
				</div>
				<div class="form-group">
					<label for="">Tarif</label>
					<input type="number" name="tarif" min="5000" value="<?= $data_e['tarif'] ?>" placeholder="" class="form-control" required="" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Dari Kota</label>
					<select name="dari_kota" id="" class="form-control" required="">
						<?php if (isset($_GET['edit'])): ?>
						<option value="<?= $data_e['dari_kota'] ?>"><?= $data_e['dari_kota'] ?></option>
						<?php else: ?>
							<option value="">Pilih Kota</option>
						<?php endif ?>
						<?php foreach ($wil as $wilayah): ?>
							<?php if ($data_e['dari_kota'] != $wilayah['wilayah']): ?>
								<option value="<?= $wilayah['wilayah'] ?>"><?= $wilayah['wilayah'] ?></option>
							<?php endif ?>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="">Ke Kota</label>
					<select name="ke_kota" id="" class="form-control" required="">
						<?php if (isset($_GET['edit'])): ?>
						<option value="<?= $data_e['ke_kota'] ?>"><?= $data_e['ke_kota'] ?></option>
						<?php else: ?>
							<option value="">Pilih Kota</option>
						<?php endif ?>
						<?php foreach ($wil as $wilayah): ?>
							<?php if ($data_e['ke_kota'] != $wilayah['wilayah'] ): ?>
								<option value="<?= $wilayah['wilayah'] ?>"><?= $wilayah['wilayah'] ?></option>
							<?php endif ?>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-12">
				<?php if (isset($_GET['edit'])): ?>
					<button type="submit" class="btn btn-success" name="update">Update <span class="fa fa-pencil"></span></button>
					<a href="?pegawai=kelola_tarif" class="btn btn-warning">Cancel <span class="fa fa-close"></span></a>
				<?php else: ?>
					<button type="submit" class="btn btn-primary" name="simpan">Simpan <span class="fa fa-save"></span></button>
				<?php endif ?>
				
			</div>
			<div class="col-md-12" style="margin-top:2%">

				<table class="table table-bordered" id="example">
			<thead>
				<th>Kode Route</th>
				<th>Dari Kota</th>
				<th>Ke Kota</th>
				<th>Tarif</th>
				<th class="text-center">Action</th>
			</thead>
			<tbody>
				<?php foreach ($datas as $data): ?>
				<tr>
				<td><?= $data['kd_route'] ?></td>
				<td><?= $data['dari_kota'] ?></td>
				<td><?= $data['ke_kota'] ?></td>
				<td>Rp.<?= $data['tarif'] ?></td>
				<td>
					<div class="btn-group" style="margin-left:25%">
					<a href="?menus=kelola_tarif&delete&id=<?= $data['kd_route'] ?>" class="btn btn-danger" onclick="return confirm('Apa Anda Yakin?')">Delete <span class="fa fa-trash"></span></a>
					<a href="?menus=kelola_tarif&edit&id=<?= $data['kd_route'] ?>" class="btn btn-info">Edit <span class="fa fa-pencil"></span></a>
					</div>
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
</form>