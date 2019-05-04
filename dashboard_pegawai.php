<?php 
  session_start();
include "library/controller.php";

$statement = new oop();

if($statement->check_session_pegawai() == "false"){
  header("location:Login.php");
}
if(isset($_GET['logout'])){
  session_destroy();
  header("location:Login.php");
}

$auth = $statement->select_data("tbl_pegawai","username",$_SESSION['pegawai']);




 ?>           







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | SistemEkspedisi</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="fa/css/font-awesome.css">
   <link href="css/custom.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
   <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Cairo|Patua+One" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="?content.php" class="site_title" style="font-family: 'Patua One', cursive;"><i class="fa fa-car"></i><span>PSend</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Pegawai</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-address-card-o"></i> Kelola Data User <span class="fa fa-chevron-down"></a>
                    <ul class="nav child_menu">
                      <li><a href="?pegawai=tambah_user">Tambah User</a></li>
                      <li><a href="?pegawai=lihat_user">Lihat Data User</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cubes"></i> Kelola Data Barang <span class="fa fa-chevron-down"></a>
                    <ul class="nav child_menu">
                      <li><a href="?pegawai=tambah_barang">Tambah Barang</a></li>
                      <li><a href="?pegawai=lihat_barang">Lihat Data Barang</a></li>
                      <li><a href="?pegawai=barang_transit">Data Barang Transit</a></li>
                      <li><a href="?pegawai=barang_terkirim">Data Barang Terkirim</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Kelola Data Kurir <span class="fa fa-chevron-down"></a>
                    <ul class="nav child_menu">
                      <li><a href="?pegawai=tambah_kurir">Tambah Kurir</a></li>
                      <li><a href="?pegawai=lihat_kurir">Lihat Data Kurir</a></li>
                    </ul>
                  </li>
              </div>

            </div>
            <div class="sidebar-footer hidden-small">
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?= $auth['nama_pegawai'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="?logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col">
            
          



            <?php 
              @$menus = $_GET['pegawai'];
              switch ($menus) {
                case '':
                include "content.php";
                break;

                case 'tambah_barang':
                include "tambah_barang.php";
                break;

                case 'lihat_barang':
                include "lihat_barang.php";
                break;

                case 'edit_barang':
                include "edit_barang.php";
                break;

                case 'kirim_barang':
                include "kirim_barang.php";
                break;

                case 'tambah_user':
                include "user_only.php";
                break;

                case 'lihat_user':
                include "v_user_only.php";  
                break;

                case 'tambah_kurir':
                include "tambah_kurir.php";
                break;

                case 'kelola_region':
                include "kelola_region.php";
                break;

                case 'lihat_kurir':
                include "lihat_kurir.php";
                break;

                case 'update_kurir':
                include "update_kurir.php";
                break;

                case 'barang_transit':
                include "barang_transit.php";
                break;

                case 'update_transit':
                include "update_transit.php";
                break;

                case 'struck':
                include "v_struck_kirim.php";
                break;

                case 'barang_terkirim':
                include 'v_barang_terkirim.php';
                  break;

              }



             ?>
            
        </div>
      </div>
    </div>

    <!-- jQuery -->
   <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/jquery.dataTables.min.js"></script> 
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <!-- FastClick -->
    <script src="js/fastclick.js"></script>
    <!-- NProgress -->
     <script src="js/tinymce/tinymce.min.js"></script>
    <script src="js/bootstrap-progressbar.min.js"></script>
    <!-- Chart.js -->
    
    <script src="js/custom.min.js"></script>


    <script type="text/javascript">
     $(document).ready(function(){
          $('#example').DataTable();
      });
     tinymce.init({  
        selector: "textarea"  
       
     });  

  </script> 
	
  </body>
</html>


