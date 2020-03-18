<?php 
include_once 'koneksi.php';
session_start();
if($_SESSION['username']!="admin"){
    echo "silahkan login kembali";
    header('location: index.php');
   exit();
}
include "header.php";
error_reporting();
//$date=date('d-m-Y-g-i-s');
//$file="backup@".$date.".sql";
// query untuk menampilkan semua tabel dalam database
//$command = "mysqldump -u root -p bukutamu --single-transaction --quick --lock-tables=false > bukutamu-backup-$(date +%F).sql";
//$hasil=$pdo->prepare($command);
//$hasil->execute();

if(isset($_POST['btn_backup'])){
    $date=date('d-m-Y-g-i-s');
    $file="bukutamu-backup-.$date.sql";
    $command = "mysqldump bukutamu --single-transaction --quick --lock-tables=false > $file";
    $hasil=$pdo->prepare($command);
    $hasil->execute();
    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=$file");
 
    // header yang menunjukkan ukuran file yang akan didownload
    header("Content-length: $file ");
 
    // header yang menunjukkan jenis file yang akan didownload
    header("Content-type:$file ");
 
   // proses membaca isi file yang akan didownload dari folder 'data'
   $fp  = fopen($file, 'r');
   $content = fread($fp, filesize($file));
   fclose($fp);
 
   // menampilkan isi file yang akan didownload
   echo $content;
}

 
 ?>


            <li><a href="dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li><a href="tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
            <li><a href="pegawai.php"><i class="zmdi zmdi-account"></i><span>Pegawai</span></a></li>
            <li><a href="bidang.php"><i class="zmdi zmdi-account"></i><span>Bidang</span></a></li>
            <li class="active open"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Laporan</span></a>
                <ul class="ml-menu">
                    <li><a href="ekspor.php">Ekspor Data</a></li>
                    <li><a href="backup.php">Backup Database</a></li>                    
                </ul>
            </li>
            </li>
        </ul>
    </div>
</aside>

<!-- Main Content -->

 <section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Laporan</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
                    <li class="breadcrumb-item active">Backup Database</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
        <div class="container-fluid">
            <!-- Modal Pop Ups -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Backup</strong> Database</h2>
                        </div>
                        <div class="body">
                            <p>Tekan tombol backup untuk membackup file database.</p>
                            <button type="button" class="btn btn-danger waves-effect m-r-20" data-toggle="modal" data-target="#largeModal">Backup Database</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Modal Pop Ups --> 
            <!-- Modal Dialogs ====== --> 
            <!-- Large Size -->
            
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="title" id="largeModalLabel">Backup Database</h4>
                        </div>
                        <div class="modal-body"> Backup database dilakukan apabila ingin memindah data ke server yang baru. File data berjenis .sql yang hanya bisa dibuka oleh aplikasi pengolah database. Jika ingin dalam bentuk lain silahkan masuk ke tab ekspor data. </div>
                        <form action="" method="post">
                        <div class="modal-footer">
                            <button type="submit" name="btn_backup" class="btn btn-danger btn-round waves-effect">BACKUP</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>

 <?php 
include "footer.php";
 ?>