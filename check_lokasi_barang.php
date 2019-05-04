<?php 
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d");
if (isset($_POST['cari'])) {
	$resi = $_POST['search'];
    $datas = $statement->select_datas_desc("tbl_riwayat_pengiriman","no_resi",$resi,"tgl_pengiriman");
	$brang = $statement->select_data("tbl_barang","no_resi",$resi);
	$kd_user = $statement->select_data("tbl_riwayat_pengiriman","no_resi",$resi);
	$nama = $statement->select_data("tbl_user","kd_user",$kd_user['kd_user']);
	$deliver = $statement->select_data("tbl_pengiriman","no_resi",$resi);
    $n_brng = $statement->select_data("tbl_riwayat_pengiriman","no_resi",$resi);
    $approv = $statement->select_where_2data("tbl_pre_pengiriman","status","Not Approved","no_resi",$resi);
	$n_approved = $statement->select_where_2data("tbl_pre_pengiriman","status","Delivered","no_resi",$resi);
    $return = $statement->select_where_2data("tbl_pre_pengiriman","status","Return","no_resi",$resi);
    $stat_del = $statement->select_where_2data("tbl_pre_pengiriman","status","Delivered","no_resi",$resi);
}

if (isset($_GET['confirm'])) {
   $kode = $statement->autokode("tbl_pre_pengiriman","kd_pre_pengiriman","KPR");
   $kodes = $statement->autokode("tbl_pengiriman","kd_pengiriman","KPG");
   $id = $_GET['id'];
   $data_app = $statement->select_where_2data("tbl_pre_pengiriman","status","Not Approved","no_resi",$id);

    $deliver = $data_app['tgl_pengiriman'];
    $dari = $data_app['dari_kota'];
    $ke = $data_app['ke_kota'];
    $tarif = $data_app['tarif'];
    $status = "Delivered";
    $kd_user = $data_app['kd_user'];
    $kd_kurir = $data_app['kd_kurir'];
    $napen = $data_app['nama_penerima'];
    $alamat = $data_app['alamat_penerima'];
    $des = $data_app['kecamatan'];
    $kec = $data_app['kelurahan'];

    $data_app = $statement->select_where_2data("tbl_pre_pengiriman","status","Not Approved","no_resi",$id);
    $values = "'$kode','$id','$dari','$ke','$des','$kec','$ke','$date','$tarif','$status','$kd_user','$kd_kurir','$napen','$alamat'";
    $value =  "'$kode','$id','$kd_user','$dari','$ke','$deliver','$napen','$alamat','$tarif','$status','$kd_kurir'";
    $update = "status='Delivered'";
    $statement->update("tbl_barang",$update,"no_resi",$id,"user=check_lokasi");
    $statement->insert("tbl_pre_pengiriman",$values,"user=check_lokasi");
    $statement->insert("tbl_pengiriman",$value,"user=check_lokasi");
    $statement->insert("tbl_riwayat_pengiriman",$values,"user=check_lokasi");
    $statement->delete("tbl_pre_pengiriman","no_resi",$id,"user=check_lokasi");
}
if (isset($_GET['return'])) {
    $kode = $statement->autokode("tbl_pre_pengiriman","kd_pre_pengiriman","KPR");
   $kodes = $statement->autokode("tbl_pengiriman","kd_pengiriman","KPG");
   $id = $_GET['id'];
   $data_app = $statement->select_where_2data("tbl_pre_pengiriman","status","Not Approved","no_resi",$id);

    $deliver = $data_app['tgl_pengiriman'];
    $dari = $data_app['dari_kota'];
    $ke = $data_app['ke_kota'];
    $tarif = $data_app['tarif'];
    $status = "Return";
    $kd_user = $data_app['kd_user'];
    $kd_kurir = $data_app['kd_kurir'];
    $napen = $data_app['nama_penerima'];
    $alamat = $data_app['alamat_penerima'];
    $des = $data_app['kecamatan'];
    $kec = $data_app['kelurahan'];

    $data_app = $statement->select_where_2data("tbl_pre_pengiriman","status","Not Approved","no_resi",$id);
    $values = "'$kode','$id','$dari','$ke','$des','$kec','$ke','$date','$tarif','$status','$kd_user','$kd_kurir','$napen','$alamat'";
    $value =  "'$kode','$id','$kd_user','$dari','$ke','$deliver','$napen','$alamat','$tarif','$status','$kd_kurir'";
    $update = "status='Delivered'";
    $statement->update("tbl_barang",$update,"no_resi",$id,"user=check_lokasi");
    $statement->insert("tbl_pre_pengiriman",$values,"user=check_lokasi");
    $statement->insert("tbl_pengiriman",$value,"user=check_lokasi");
    $statement->insert("tbl_riwayat_pengiriman",$values,"user=check_lokasi");
     $statement->delete("tbl_pre_pengiriman","no_resi",$id,"user=check_lokasi");
}

    


 ?>



<form action="" method="post">
<div class="col-md-12">
	<div class="row">
			<label for="">Check Lokasi Barang</label>
			<div class="input-group">
      			<input type="search" name="search" class="form-control" placeholder="No Resi..." autocomplete="off">
     		 <span class="input-group-btn">
       			 <button class="btn btn-default" type="submit" name="cari" id="cari"><a href="">Cari</a></button>
     		 </span>
    		</div>
            <?php if ($approv > 0): ?>
               <?php if ($n_approved['status'] != "Delivered"): ?>
                <?php if ($return['status'] != "Return"): ?>
            <div class="well" style="background-color:white;">
                <h3>Barang Anda Sudah Terkirim <a href="?user=check_lokasi&confirm&id=<?= $resi ?>" class="btn btn-success">Terkirim <span class="fa fa-check"></span></a>
                <a href="?user=check_lokasi&return&id=<?= $resi ?>" class="btn btn-danger" >Kembalikan <span class="fa fa-close"></span></a>
                </h3>
            </div>
             <?php else: ?>
            <div class="well" style="background-color:white;">
                <h3>Barang Anda Sudah Terkirim</h3>
            </div>
            <?php endif ?>
             <?php endif ?>
             <?php endif ?>
    		<?php foreach ($datas as $data): ?>
 			<div class="col-md-6">
    		<div class="panel panel-primary">
    			<div class="panel-heading">
    				<h4 class="text-center"><?= $data['tgl_pengiriman'] ?></h4>
    			</div>
    			<div class="panel-body">
    				<div class="col-md-5">
    					<h5>Nama Barang </h5>
    					<h5>Dari Kota </h5>
    					<h5>Ke Kota </h5>
    					<h5>Current City </h5>
    					<h5>Tarif </h5>
    					<h5>Status </h5>
    					<h5>Nama pengirim </h5>
    					<h5>Nama penerima </h5>
    				</div>
                    <div class="col-md-1">
                        <h5>:</h5>
                        <h5>:</h5>
                        <h5>:</h5>
                        <h5>:</h5>
                        <h5>:</h5>
                        <h5>:</h5>
                        <h5>:</h5>
                        <h5>:</h5>
                    </div>
    				<div class="col-md-6">
    					<h5><?= $brang['nama_barang'] ?></h5>
    					<h5><?= $data['dari_kota'] ?></h5>
    					<h5><?= $data['ke_kota'] ?></h5>
    					<h5><?= $data['current_city'] ?></h5>
    					<h5>Rp.<?= $data['tarif'] ?></h5>
    					<?php if ($data['status'] == "Waiting To Take"): ?>
    						<h5>Di Kantor Cabang <?= $data['current_city'] ?></h5>
    					<?php elseif ($data['status'] == "In Transit"): ?>
    						<h5>Sedang Di Angkut</h5>
    					<?php elseif ($data['status'] == "On The Way"): ?>
    						<h5>Menuju Rumah Penerima</h5>
                        <?php elseif ($data['status'] == "On Delayed"):  ?>
                            <h5>Ada Masalah</h5>
                        <?php elseif ($data['status'] == "Not Approved"):?>
                            <h5>Tunggu Konfirmasi Penerima</h5>
                         <?php elseif ($data['status'] == "Return"):?>
                            <h5>Barang Dikembalikan</h5>    
                         <?php elseif ($data['status'] == "Delivered"):?>
                            <h5>Barang Sudah Terkirim</h5>
    					<?php endif ?>
    					<h5><?= $nama['nama_user'] ?></h5>
    					<h5><?= $data['nama_penerima'] ?></h5>
    				</div>
    			</div>
    		</div>
    		</div>
    		<?php endforeach ?>
    		

	</div>
</div>
</form>