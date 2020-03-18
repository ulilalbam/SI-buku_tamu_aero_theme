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
 ?>


            <li><a href="dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li><a href="tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
            <li><a href="pegawai.php"><i class="zmdi zmdi-account"></i><span>Pegawai</span></a></li>
            <li class="active open"><a href="bidang.php"><i class="zmdi zmdi-account"></i><span>Bidang</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Laporan</span></a>
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
                <h2>Bidang</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
                    <li class="breadcrumb-item active">Bidang</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
   
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Data</strong> Bidang</h2>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Kode Bidang</th>
                                        <th>Nama Bidang</th>
                                        <th>Ruangan</th>
                                        <th>Jumlah Pegawai</th>                     
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $i=1;
                                    $select=$pdo->prepare("select *, count(data_pegawai.id_pgw) as total from data_bidang left join data_pegawai on data_bidang.id=data_pegawai.kode_bidang group by data_bidang.id");
                                    $select->execute();
                                    //$count=$pdo->prepare("select count(data_pegawai.id_pgw) as total from data_bidang join data_pegawai on data_bidang.id=data_pegawai.kode_bidang group by data_bidang.id");
                                    //$count->execute();
                                    //$total=$count->fetch(PDO::FETCH_OBJ);
                                    while($row=$select->fetch(PDO::FETCH_OBJ)){
                                        echo '
                                        <tr>
                                        <td>'.$row->id.'</td>
                                        <td>'.$row->kode_bdg.'</td>
                                        <td>'.$row->nama.'</td>
                                        <td>'.$row->lokasi.'</td>
                                        <td>'.$row->total.'</td>
                                    </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
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