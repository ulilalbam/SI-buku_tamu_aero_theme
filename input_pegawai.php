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
if(isset($_POST['btn_add'])){
    
    $nama = $_POST['tambah_namapgw'];
    $nip = $_POST['tambah_nip'];
    $jabatan = $_POST['tambah_jabatan'];
    $bidang = $_POST['tambah_bidang'];
    
    $insert = $pdo->prepare("insert into data_anggota(namapgw,nip,jabatan,kode_bidang) values(:pname,:pnip,:pjabatan,:pkode)");
            $insert->bindParam(':pname',$nama);
            $insert->bindParam(':pnip',$nip);
            $insert->bindParam(':pjabatan',$jabatan);
            $insert->bindParam(':pkode',$bidang);
            
            $insert->execute();
}
 ?>


            <li><a href="dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li><a href="tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
            <li><a href="pegawai.php"><i class="zmdi zmdi-account"></i><span>Pegawai</span></a></li>
            <li><a href="bidang.php"><i class="zmdi zmdi-account"></i><span>Bidang</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Laporan</span></a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Ekspor Data</a></li>
                    <li><a href="chat.html">Backup Database</a></li>                      
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
                <h2>Pegawai</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
                    <li class="breadcrumb-item active">Tambah Data Pegawai</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
   
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    
                    <div class="card">
                        <div class="body">
                            
                            <h2 class="card-inside-title">Tambah Data Pegawai</h2>
                            
                            <div class="body">
                            <form role="form" class="form-horizontal" action="" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label>Nama Pegawai</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="tambah_namapgw" class="form-control" placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="tambah_nip" class="form-control" placeholder="Masukkan NIP">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="tambah_jabatan" class="form-control" placeholder="Masukkan Jabatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label>Bidang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control show-tick ms select2" name="tambah_bidang" required>
                                            <option value="" disabled  selected>Pilih Bidang</option>
                                            <option value="101">Pelayanan Pendaftaran Penduduk</option>
                                            <option value="102">Pelayanan Pencatatan Sipil</option>
                                            <option value="103">Pengelolaan Informasi Administrasi Kependudukan</option>
                                            <option value="104">Pemanfaatan Data dan Inovasi Pelayanan</option>
                                            <option value="105">Sekretariat</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4">
                                        </div>
                                    <div class="m-l-20 inlineblock">
                                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect" name="btn_add">Tambahkan</button>
                                        </div>
                                        <div class="m-l-20 inlineblock">
                                            <button type="button" class="btn btn-raised btn-danger btn-round waves-effect">Reset</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>

 <?php 
include "footer.php";
?>