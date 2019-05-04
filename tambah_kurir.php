<?php 
$data =  $statement->data_table("tbl_region");
$kode = $statement->autokode("tbl_kurir","kd_kurir","KDK");

if(isset($_POST['simpan'])){
	$kd_kurir = $_POST['kd_kurir'];
	$nama = $_POST['nama'];
	$jk = $_POST['gender'];
	$telp = $_POST['no_telp'];
	$email = $_POST['email'];
	$region = $_POST['region'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$rpassword = base64_encode($_POST['rpassword']);
	$alamat = $_POST['alamat'];
	$values = "'$kd_kurir','$nama','$jk','$telp','$email','$region','$username','$rpassword','$alamat','ACTIVE'";
	$statement->insert("tbl_kurir",$values,"pegawai=tambah_kurir");
}






 ?>

<form action="" method="post" name="userin">
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><span class="fa fa-user-circle"></span> Tambah Kurir</h3>
			</div>
		<div class="panel-body">
			<div class="col-md-4">
				<div class="form-group">
				<label for="">Kode Kurir</label>
				<input type="text" name="kd_kurir" value="<?= $kode ?>" placeholder="" readonly="" required="" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Nama Kurir</label>
					<input type="text" name="nama" value="" placeholder="" required="" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<label for="" style="margin-left:30%">Jenis Kelamin</label>
				<div class="radio" style="font-size:16px">
					<label for="gender" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="L" placeholder="" required="">Laki - Laki</label>
					<label for="gender" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="P" placeholder="" required="">Perempuan</label>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">No Telp</label>
					<input type="number" name="no_telp" value="" placeholder="" required="" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name="email" value="" placeholder="" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Nama Region</label>
					<select name="region" id="" class="form-control">
						<option value="">Pilih Wilayah</option>
						<?php foreach ($data as $field): ?>
						<option value="<?= $field['kd_region']?>"><?= $field['wilayah'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="username" value="" placeholder="" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" value="" placeholder="" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Re-Type Password</label>
					<input type="password" name="rpassword" value="" placeholder="" class="form-control" required="" style="border-color:green" id="pass" onblur="return check()">
					<p style="color:red;display:none;" id="tpass">Password Berbeda</p>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label for="">Alamat</label>
					<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" autocomplete="off"></textarea>	
				</div>
			</div>
			
			<button type="submit" class="btn btn-primary" id="simpan" name="simpan" style="margin-left:1%">Simpan <span class="fa fa-save"></span></button>
		</div>
	</div>
	</div>
</div>
</form>

<script>
	function check(){
    var pass1 = document.forms['userin']['password'].value;
    var pass2 = document.forms['userin']['rpassword'].value;
    if (pass1 != pass2) {
     	$(document).ready(function(){
     		$("#alamat").on({
     			mouseenter:function(){
    			$('#pass').css("border-color","red");
    			$('#tpass').css("display","unset");
    			$('#simpan').hide();
    			},
    			mouseleave:function(){
    			$('#pass').css("border-color","red");
    			$('#tpass').css("display","unset");
    			$('#simpan').hide();
    			},
    			focus:function(){
    			$('#pass').css("border-color","red");
    			$('#tpass').css("display","unset");
    			$('#simpan').hide();
    			},
    			click:function(){
    			$('#pass').css("border-color","red");
    			$('#tpass').css("display","unset");
    			$('#simpan').hide();
    			},
    			mouseup:function(){
    			$('#pass').css("border-color","red");
    			$('#tpass').css("display","unset");
    			$('#simpan').hide();
    			},
    			keypress:function(){
    			$('#pass').css("border-color","red");
    			$('#tpass').css("display","unset");
    			$('#simpan').hide();
    			}
     			});
     		});
     	}
     	else {
     		$(document).ready(function(){
     		$("#alamat").on({
     			mouseenter:function(){
    			$('#pass').css("border-color","green");
    			$('#tpass').css("display","none");
    			$('#simpan').show();
    			},
    			mouseleave:function(){
    			$('#pass').css("border-color","green");
    			$('#tpass').css("display","none");
    			$('#simpan').show();
    			},
    			focus:function(){
    			$('#pass').css("border-color","green");
    			$('#tpass').css("display","none");
    			$('#simpan').show();
    			},
    			click:function(){
    			$('#pass').css("border-color","green");
    			$('#tpass').css("display","none");
    			$('#simpan').show();
    			},
    			mouseup:function(){
    			$('#pass').css("border-color","green");
    			$('#tpass').css("display","none");
    			$('#simpan').show();
    			},
    			keypress:function(){
    			$('#pass').css("border-color","green");
    			$('#tpass').css("display","none");
    			$('#simpan').show();
    			}

     			});
     		});
     	}
     }	

</script>