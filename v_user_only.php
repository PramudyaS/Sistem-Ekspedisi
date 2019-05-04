<?php 

// $datas = $statement->data_table("tbl_user");
$datas = $statement->select_datas("tbl_user","level","User"); 

if(isset($_GET['delete'])){
	$id = $_GET['id'];
	$statement->delete("tbl_user","kd_user",$id,"pegawai=lihat_user");
}
if(isset($_POST['update'])){
	$user = $_POST['user'];
	$jk = $_POST['gender'];
	$username = $_POST['username'];
	$pass = base64_encode($_POST['npassword']);
	$pass2 = base64_encode($_POST['lpassword']);
	$telp = $_POST['no_telp'];
	$email = $_POST['email'];
	$level = $_POST['level'];
	$alamat = $_POST['alamat'];
	$where = $_POST['kd_user'];
	$form = "pegawai=lihat_user";

	$values = "nama_user = '$user',jenis_kelamin='$jk',alamat='$alamat',email='$email',no_telp='$telp',username='$username',password='$pass2',level='$level'";

	$value = "nama_user = '$user',jenis_kelamin='$jk',alamat='$alamat',email='$email',no_telp='$telp',username='$username',password='$pass',level='$level'";
	if($pass == ""){
	
		$statement->update("tbl_user",$values,"kd_user",$where,$form);
	}
	else{
		$statement->update("tbl_user",$value,"kd_user",$where,$form);
	}
}


 ?>
<form action="" method="post">
<div class="col-md-12">
  <div class="row">
<table class="table table-bordered" id="example">
	<thead>
		<th>Kode User</th>
		<th>Nama User</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>Email</th>
		<th>No Telp</th>
		<th>Username</th>
		<th>Password</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php foreach ($datas as $field): ?>	
		<tr>
			<td><?= $field['kd_user'] ?></td>
			<td><?= $field['nama_user'] ?></td>
			<td><?= $field['jenis_kelamin'] ?></td>
			<td><?= $field['alamat'] ?></td>
			<td><?= $field['email'] ?></td>
			<td><?= $field['no_telp'] ?></td>
			<td><?= $field['username'] ?></td>
			<td><?= base64_encode($field['password']) ?></td>
			<td>
					<a href="?pegawai=lihat_user&delete&id=<?= $field['kd_user'] ?>" class="btn btn-danger" onclick="return confirm('Apa anda yakin ?')">Delete <span class="fa fa-trash"></span></a>
					<a href="#addPage<?= $field['kd_user'] ?>" data-toggle="modal" class="btn btn-info">Edit <span class="fa fa-pencil"></span></a>
			</td>
		</tr>


<div class="modal fade" id="addPage<?= $field['kd_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $field['kd_user'] ?></h4>
        <input type="text" name="kd_user" value="<?= $field['kd_user'] ?>" placeholder="" hidden>
      </div>	
      <div class="modal-body">
      	<div class="col-md-4">
        <div class="form-group">
          <label>Nama User</label>
          <input type="text" class="form-control" name="user" value="<?= $field['nama_user'] ?>" required>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" value="<?= $field['email'] ?>" placeholder="" class="form-control" required>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="">No Telp</label>
          <input type="text" class="form-control" name="no_telp" class="form-control" value="<?= $field['no_telp'] ?>" required>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" placeholder="" value="<?= $field['username'] ?>">
        </div>
        </div>
        <div class="col-md-4">
        	<div class="form-group">
        		<label for="">Password</label>
        		<input type="text" name="lpassword" placeholder="" value="<?= base64_decode($field['password']) ?>" class="form-control" readonly>
        	</div>
        </div>
        <div class="col-md-4">
        	<div class="form-group">
        		<label for="">New Password</label>
        		<input type="password" name="npassword" value="" placeholder="" class="form-control">
        	</div>
        </div>
      
      <div class="col-md-4">
      	<label for="" style="margin-left:30%">Jenis Kelamin</label>
      	<div class="radio">
      	<label for="" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="L" placeholder="" style="" <?php if ($field['jenis_kelamin'] == "L"): ?> checked="true" <?php endif ?> > Laki - Laki</label>
      	<label for="" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="P" placeholder="" <?php if ($field['jenis_kelamin'] == "P"): ?> checked="true"   <?php endif ?> > Perempuan</label>
      	</div>
      </div>
      <div class="col-md-4">
      	<div class="form-group">
      		<label for="">Level</label>
      		<select name="level" id="" class="form-control">
      			<?php if ($field['level'] == "Admin"): ?>
      				<option value="<?= $field['level'] ?>"><?= $field['level'] ?></option>
      				<option value="User">User</option>
      			<?php endif ?>
      			<?php if ($field['level'] == "User"): ?>
      				<option value="<?= $field['level'] ?>"><?= $field['level'] ?></option>
      			<?php endif ?>
      			<?php if ($field['level'] == ""): ?>
      				<option value="Admin">Admin</option>
      				<option value="User">User</option>
      			<?php endif ?>
      		</select>
      	</div>
      </div>
      <div class="col-md-4">
      	<div class="form-group">
      		<label for="">Alamat</label>
      		<textarea name="alamat" id="" class="form-control"><?= $field['alamat'] ?></textarea>
      	</div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close <span class="fa fa-close"></span></button>
        <button type="submit" class="btn btn-success" name="update" >Save changes <span class="fa fa-pencil"></span></button>
      </div>
    </form>
    </div>
  </div>
</div>
  

	<?php endforeach ?>
	</tbody>
</table>
</div>
</div>
</form>