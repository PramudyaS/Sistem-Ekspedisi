<?php 

$server = "localhost";
$user = "root";
$pass = "";
$DB = "db_pengirimanbarang";

$con = mysqli_connect($server,$user,$pass,$DB) or die("Failed Connection!");



class oop
{ 

	public function login_level($table,$username,$password,$level)
	{
		global $con;
		$sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password'";
		$query = mysqli_query($con,$sql);
		$row = mysqli_num_rows($query);
		$assoc = mysqli_fetch_assoc($query);
		if($row > 0){
			if($assoc['level'] == "Admin" && $level == "Admin"){
			echo "<script>alert('Selamat Datang $username');document.location.href='?dashboard.php'</script>";
			$_SESSION['username'] = $username;
			}
			elseif($assoc['level'] == "User" && $level == "User"){
			echo "<script>alert('Selamat Datang $username');document.location.href='?dashboard_user.php'</script>";
			$_SESSION['user'] = $username;
			}
			else{
				echo "<script>alert('Hak Akses Salah Salah!');document.location.href='?Login.php'</script>";
			}

		}
			
		else{
			echo "<script>alert('Username/Password Salah!');document.location.href='?Login.php'</script>";
		}
	}

	public function login_kurir($table,$username,$password){
		global $con;
		$sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password' AND status='ACTIVE'";
		$query = mysqli_query($con,$sql);
		$row = mysqli_num_rows($query);
		if($row > 0){
			echo "<script>alert('Selamat Datang $username');document.location.href='?dashboard_kurir.php'</script>";
			$_SESSION['kurir'] = $username;
		}
		else{
			echo "<script>alert('Username/Password Salah!');document.location.href='?Login.php'</script>";
		}
	}

	public function login_pegawai($table,$username,$password){
		global $con;
		$sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password' AND status='ACTIVE'";
		$query = mysqli_query($con,$sql);
		$row = mysqli_num_rows($query);
		if($row > 0){
			echo "<script>alert('Selamat Datang $username');document.location.href='?dashboard_pegawai.php'</script>";
			$_SESSION['pegawai'] = $username;

		}
		else{
			echo "<script>alert('Username/Password Salah!');document.location.href='?Login.php'</script>";
		}
	}


	public function check_session()
	{
		if (isset($_SESSION['username'])) {
			return "true";
		}
		else{
			return "false";
		}
	}

	public function check_session2(){
		if(isset($_SESSION['kurir'])){
			return "true";
		}
		else{
			return "false";	
		}
	}

	public function check_session_pegawai(){
		if(isset($_SESSION['pegawai'])){
			return "true";
		}
		else{
			return "false";	
		}
	}
  public function check_session_user(){
    if (isset($_SESSION['user'])) {
     return "true";
    }
    else{
      return "false";
    }
  }
	
	public function autokode($table,$field,$pre){
            global $con;
            $sqlc   = "SELECT COUNT($field) as jumlah FROM $table";
            $querys = mysqli_query($con,$sqlc);
            $number = mysqli_fetch_assoc($querys);
            if($number['jumlah'] > 0){
                $sql    = "SELECT MAX($field) as kode FROM $table";
                $query  = mysqli_query($con,$sql);
                $number = mysqli_fetch_assoc($query);
                $strnum = substr($number['kode'],3);
                $strnum = $strnum + 1;
               	if (strlen($strnum) == 4) {
               		$kode = $pre.$strnum;
               	}
               	elseif(strlen($strnum) == 3){
               		$kode = $pre."0".$strnum;
               	}
               	elseif(strlen($strnum) == 2){
               		$kode = $pre."00".$strnum;
               	}
               	elseif(strlen($strnum) == 1){
               		$kode = $pre."000".$strnum;
               	}
               }
               else{
               		$kode = $pre."0001";
               }
          

            return $kode;
        }


    public function data_table($table){
		global $con;
		$sql = "SELECT * FROM $table";
		$query = mysqli_query($con,$sql);
		$data = [];
		while ($tampung = mysqli_fetch_assoc($query)) {
			$data[] = $tampung;
		}
		return $data;
	}

	  public function insert($table,$value,$form){
        	global $con;
        	$sql = "INSERT INTO $table VALUES($value)";
        	$query = mysqli_query($con,$sql);
        	if($query > 0){
        		echo "<script>alert('Data Berhasil Di input');document.location.href='?$form'</script>";
        	}else{
        	echo "<script>alert('Data Gagal Di input');document.location.href='?$form'</script>";
        	}
        }

        public function update($table,$values,$where,$value,$form){
        	global $con;
        	$sql = "UPDATE $table SET $values WHERE $where = '$value'";
        	$query = mysqli_query($con,$sql);
        	if($query > 0){
        		echo "<script>alert('Data Berhasil Di ubah');document.location.href='?$form'</script>";
        	}
        	else{
        		echo "<script>alert('Data Gagal Di ubah');document.location.href='?$form'</script>";
        	}
        }


        public function foto($file){
        $nama_file = $file['name'];
       	$tmp_file = $file['tmp_name'];
       	$ukuran_file = $file['size'];

       	$folder = 'image/';
       	$ektensi = ['jpg','png','jpeg'];
       	$ekstensi_gambar = explode('.',$nama_file);
       	$ekstensi_gambar = strtolower(end($ekstensi_gambar));
       	if(file_exists("image/".$nama_file)){
       		echo "<script>alert('Foto Sudah Ada/Nama File Sama')</script>";
          return false;
       	}
       	else{
       		if (in_array($ekstensi_gambar,$ektensi) == true) {
       			if ($ukuran_file < 1500000) {
       				move_uploaded_file($tmp_file,$folder.$nama_file);
       			}
       			else{
       				echo "<script>alert('Ukuran Terlalu Besar')</script>";
              return false;
       			}
       		}
       		else{
       			echo "<script>alert('Ekstensi Tidak Di Perbolehkan')</script>";
            return false;
       		}
       	}
       	return $nama_file;
        }


        public function delete($table,$where,$values,$form){
        	global $con;
        	$sql = "DELETE FROM $table WHERE $where = '$values'";
        	$query = mysqli_query($con,$sql);
        	if($query > 0){
        		echo "<script>alert('Data Berhasil Di hapus');document.location.href='?$form'</script>";
        	}
        	else{
        		echo "<script>alert('Data Gagal Hapus');document.location.href='?$form'</script>";
        	}
        }


         public function edit($table,$where,$values){
        	global $con;
        	$sql = "SELECT * FROM $table WHERE $where = '$values'";
        	$query = mysqli_query($con,$sql);
        	$data = mysqli_fetch_assoc($query);
        	return $data;
        		
        }


         public function select_data($table,$where,$whereValues){
            global $con;
            $sql = "SELECT * FROM $table WHERE $where = '$whereValues'";
            $query = mysqli_query($con,$sql);
            $data = mysqli_fetch_assoc($query);
            return $data;
        }

        public function select_datas($table,$where,$whereValues){
            global $con;
            $sql = "SELECT * FROM $table WHERE $where = '$whereValues'";
            $query = mysqli_query($con,$sql);
            $datas = [];
            while ( $data = mysqli_fetch_assoc($query)) {
            	$datas[] = $data;
            }
            return $datas;
        }

        public function select_where_2data($table,$where1,$whereValues1,$where2,$whereValues2){
          global $con;
          $sql = "SELECT * FROM $table WHERE $where1 = '$whereValues1' AND $where2 = '$whereValues2'";
          $query = mysqli_query($con,$sql);
          $data = mysqli_fetch_assoc($query);
          return $data;
        }
        public function select_where_not_exits($table1,$table2,$field1,$field2){
          global $con;
          $sql = "SELECT * FROM $table1 WHERE NOT EXISTS(SELECT * FROM $table2 WHERE $table1.$field1 = $table2.$field2)";
          $query = mysqli_query($con,$sql);
          $datas = [];
          while ($assoc = mysqli_fetch_assoc($query)) {
                $datas[] = $assoc;
          }
          return $datas;
        }
        public function select_where_2datas($table,$where1,$whereValues1,$where2,$whereValues2){
          global $con;
          $sql = "SELECT * FROM $table WHERE $where1 = '$whereValues1' AND $where2 = '$whereValues2'";
          $query = mysqli_query($con,$sql);
          $data = [];
          while (  $tampung = mysqli_fetch_assoc($query)) {
           $data[] = $tampung;
          }
         
          return $data;
        }

        public function count($field,$table){
          global $con;
          $sql = "SELECT COUNT($field) as jumlah FROM $table";
          $query = mysqli_query($con,$sql);
          $datas = mysqli_fetch_assoc($query);
          return $datas;
        }
        public function count_where($field,$table,$where,$values){
          global $con;
          $sql = "SELECT COUNT($field) as jumlah FROM $table WHERE $where='$values'";
          $query = mysqli_query($con,$sql);
          $datas = mysqli_fetch_assoc($query);
          return $datas;
        }
        public function count_where2_values($field,$table,$where1,$values1,$where2,$values2){
          global $con;
          $sql = "SELECT COUNT($field) as jumlah FROM $table WHERE $where1 = '$values1' AND $where2 = '$values2'";
          $query = mysqli_query($con,$sql);
          $datas = mysqli_fetch_assoc($query);
          return $datas;
        }
        public function between_date($table,$field,$v1,$v2){
          global $con;
          $sql = "SELECT * FROM $table WHERE $field BETWEEN '$v1' AND '$v2'";
          $query = mysqli_query($con,$sql);
          $datas = [];
          while ($assoc = mysqli_fetch_assoc($query)) {
              $datas[] = $assoc;
          }
          return $datas ;
        }
        public function select_datas_desc($table,$field,$v1,$field2){
          global $con;
          $sql = "SELECT * FROM $table WHERE $field = '$v1' ORDER BY $field2 DESC";
          $query = mysqli_query($con,$sql);
          $datas = [];
          while ($tampung = mysqli_fetch_assoc($query)) {
              $datas[] = $tampung;
          }
          return $datas;
        }
        public function between_date_where(){
          global $con;
          $sql = "SELECT * FROM $table WHERE $field BETWEEN '$v1' AND '$v2' AND $field2 = '$v3'";
          $query = mysqli_query($con,$sql);
          $datas = [];
          while ($tampung = mysqli_fetch_assoc($query)) {
              $datas[] = $tampung;
          }
          return $datas;

        }



        






}










 ?>