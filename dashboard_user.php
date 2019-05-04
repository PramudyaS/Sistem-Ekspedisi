<?php 
session_start();
include "library/controller.php";

$statement = new oop();

if($statement->check_session_user() == "false"){
	header("location:Login.php");
}

if(isset($_GET['logout'])){
  session_destroy();
  header("location:Login.php");
}
$nama = $statement->select_data("tbl_user","username",$_SESSION['user']);
	



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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="?content.php" class="site_title" style="font-family: 'Patua One', cursive;"><i class="fa fa-car"></i><span> PSend</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>User</h3>
                <ul class="nav side-menu">
                  <li><a href="?user=check_lokasi"><i class="fa fa-user"></i> Check Lokasi Barang</a>   
                  </li>
              </div>

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
                <li>
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?= $nama['nama_user'] ?>
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
              @$menus = $_GET['user'];
              switch ($menus) {
                case 'check_lokasi':
                include "check_lokasi_barang.php";
                break;

                
                default:
                  # code...
                  break;
              }
              


              



             ?>
            
        </div>
        <!-- /page content -->
       
        
        <!-- /footer content -->
      </div>
    </div>


    <!-- jQuery -->
   <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/jquery.dataTables.min.js"></script> 
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <!-- FastClick -->
    <script src="js/bootstrap-notify.min.js"></script>
    <script src="js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="js/bootstrap-progressbar.min.js"></script>
    <!-- Chart.js -->
    
    <script src="js/custom.min.js"></script>
   


    <script type="text/javascript">
     $(document).ready(function(){
    $('#example').DataTable();

      
</script> 
	
</body>
</html>

