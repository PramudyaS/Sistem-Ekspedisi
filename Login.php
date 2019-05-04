<?php 
session_start();
include "library/controller.php";

$statement = new oop();
$datas = $statement->data_table("tbl_region");

if($statement->check_session() == "true"){
	header("location:dashboard.php");
}
elseif($statement->check_session2() == "true"){
	header("location:dashboard_kurir.php");
}
elseif($statement->check_session_pegawai() == "true"){
	header("location:dashboard_pegawai.php");
}
elseif($statement->check_session_user() == "true"){
	header("location:dashboard_user.php");
}


if(isset($_POST['login'])){
	$table = "tbl_user";
	$user = $_POST['user'];
	$pass = base64_encode($_POST['pass']);
	$form = "dashboard.php";
	$level = $_POST['level'];

	if($level == "Kurir"){
		$statement->login_kurir("tbl_kurir",$user,$pass);
	} 
	elseif($level == "Pegawai"){
		$statement->login_pegawai("tbl_pegawai",$user,$pass);
	}
	else{
	$statement->login_level($table,$user,$pass,$level);
	}
}




 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | SistemEkspedisi</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fa/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body background="image/pr.jpg" style="margin-left:02%">

<div class="container">
	<form action="" method="post" name="logins">
	<div class="col-md-6 col-md-offset-3">
	<div class="row">
		<div class="panel panel-primary" style="margin-top:30%" >
			<div class="panel-heading" style="background-color:#0066CC">
				<h4 class="text-center" style="color:white">Login</h4>
			</div>
			<div class="panel-body" >
				<div class="col-md-12">
					
					<div class="row">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" name="user" value="" placeholder="Username" class="form-control" autocomplete="off" required="">
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-unlock"></i></span>
							<input type="password" name="pass" value="" placeholder="Password" class="form-control" required="">
						</div>
						<br>
						<div class="form-group">
						<select name="level" id="level" class="form-control" onchange="nilai()" required="">
							<option value="">Pilih Level</option>
							<option value="Admin">Admin</option>
							<option value="User">User</option>
							<option value="Kurir">Kurir</option>
							<option value="Pegawai">Pegawai</option>
						</select>
						</div>
						
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-primary" id="login" name="login"><span class="fa fa-sign-in" id="lname"> Login </span></button>
			</div>
		</div>
		
	</div>
	</form>
	</div>
</div>



<script src="js/jquery-3.2.1.min.js" ></script>
<script src="js/bootstrap.min.js"></script>	
<script>
	
		
			
	
	
</script>
</body>
</html>