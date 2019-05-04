<?php 

$kode = $statement->autokode("tbl_pegawai","kd_pegawai","KDP");
$datas = $statement->data_table("tbl_region");

if(isset($_POST['simpan'])){

$kd_pegawai = $_POST['kd_pegawai'];
$nama = $_POST['nama'];
$jk = $_POST['gender'];
$email = $_POST['email'];
$telp = $_POST['no_telp'];
$username = $_POST['username'];
$pass = $_POST['password'];
$rpass = base64_encode($_POST['rpassword']);
$alamat = $_POST['alamat'];
$region = $_POST['region'];

$form = "menus=tambah_pegawai";

$values = "'$kd_pegawai','$nama','$jk','$alamat','$email','$telp','$username','$rpass','$region','ACTIVE'";
if (empty($kd_pegawai) || empty($nama) || empty($jk) || empty($email) || empty($telp) || empty($username) || empty($pass) || empty($rpass) || empty($region) || empty($alamat)) {
	echo "<script>alert('Silahkan Lengkapi Data')</script>";
}
else{

$statement->insert("tbl_pegawai",$values,$form);
}

}	


 ?>

<form action="" method="post" name="pegawaian">
<div class="col-md-12">
	<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><span class="fa fa-user"></span> Tambah Pegawai</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Kode Pegawai</label>
					<input type="text" name="kd_pegawai" value="<?= $kode ?>" placeholder="" class="form-control" readonly required>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				<label for="">Nama Pegawai</label>
				<input type="text" name="nama" value="" placeholder="" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<label for="" style="margin-left:30%">Jenis Kelamin</label>
				<div class="radio" style="font-size:17px">
					<label for="gender" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="L" placeholder="" required="">Laki - Laki</label>
					<label for="gender" class="radio-inline" style="margin-left:10%"><input type="radio" name="gender" value="P" placeholder="" required="">Perempuan</label>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name="email" value="" placeholder="" required="" class="form-control" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">No Telp</label>
					<input type="number" name="no_telp" value="" placeholder="" required="" class="form-control" autocomplete="off" maxlength="12">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Pilih Region</label>
					<select name="region" id="" class="form-control">
						<option value="">Pilih Wilayah</option>
						<?php foreach ($datas as $key ): ?>
						<option value="<?= $key['kd_region'] ?>"><?= $key['wilayah'] ?></option>	
						<?php endforeach ?>
						
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="username" value="" id="" placeholder="" required="" class="form-control" autocomplete="off">	
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password"  value="" placeholder="" class="form-control" required="">
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
			<hr>
			<button type="submit" class="btn btn-primary" style="margin-left:1%" id="simpan" name="simpan">Simpan <span class="fa fa-save"></span></button>
		</div>
	</div>
 </div>
</div>
</form>

<script>
	function check(){
    var pass1 = document.forms['pegawaian']['password'].value;
    var pass2 = document.forms['pegawaian']['rpassword'].value;
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