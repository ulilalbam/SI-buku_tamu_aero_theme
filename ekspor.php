<?php 
include_once 'koneksi.php';
session_start();
if($_SESSION['username']!="admin"){
    echo "silahkan login kembali";
    header('location: index.php');
   exit();
}
if(isset($_POST['btn_ekspor'])){

        
}
include "header.php";
error_reporting();
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
                    <li class="breadcrumb-item active">Ekspor Data</li>
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
                            <h2><strong>Ekspor</strong> Data</h2>
                        </div>
                        <div class="body">
                            <p>Tekan tombol ekspor untuk membackup file dalam bentuk file xls.</p>
                            <button type="button" class="btn btn-danger waves-effect m-r-20" data-toggle="modal" data-target="#largeModal">Ekspor</button>
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
                            <h4 class="title" id="largeModalLabel">Ekspor Data</h4>
                        </div>
                        <div class="modal-body"> Ekspor data berjenis file xls atau berformat excel. Ekspor dilakukan untuk mempermudah pencetakan hard copy. </div>
                        <form action="proses_ekspor.php" method="post">
                        <div class="modal-footer">
                            <button type="submit" //name="btn_ekspor" class="btn btn-danger btn-round waves-effect">EKSPOR</button>
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