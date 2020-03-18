<?php 
include_once 'koneksi.php';
session_start();
if($_SESSION['username']!="admin"){
    echo "silahkan login kembali";
    header('location: index.php');
   exit();
}

include "header.php";
/*------ Delete Tamu ------*/
if (isset($_POST['btn_del'])){
    
    $delete=$pdo->prepare("delete from data_tamu where id_tamu=".$_POST['btn_del']);
    $delete->execute();
}
 ?>


            <li><a href="dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li class="active open"><a href="tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
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
                <h2>Pengunjung</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
                    <li class="breadcrumb-item active">Pengunjung</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
   
    <!-- Exportable Table -->
    <div class="container-fluid">
        <form role="form" action="" method="post"> 
            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Data</strong> Pengunjung </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Update Data Pengunjung</a></li>
                                        <li><a href="javascript:void(0);">Tambah Data Pengunjung</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Tamu</th>
                                            <th>Keperluan</th>
                                            <th>Pegawai yang Ditemui</th>                     
                                            <th>Bidang</th>
                                            <th>Tanggal</th>
                                            <th>Hapus</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $i=1;
                                    //$select=$pdo->prepare("select * from data_tamu order by id_tamu asc");
                                    $select=$pdo->prepare("select data_tamu.id_tamu, data_tamu.nama_tamu, data_tamu.ket, data_pegawai.nama_pgw, data_bidang.nama, data_tamu.masuk from data_tamu join data_pegawai on data_tamu.kode_pgw=data_pegawai.id_pgw join data_bidang on data_pegawai.kode_bidang=data_bidang.id");
                                    $select->execute();
                                    while($row=$select->fetch(PDO::FETCH_OBJ)){
                                        echo '
                                        <tr>
                                        <td>'.$row=$i++.'</td>
                                        <td>'.$row->nama_tamu.'</td>
                                        <td>'.$row->ket.'</td>
                                        <td>'.$row->nama_pgw.'</td>
                                        <td>'.$row->nama.'</td>
                                        <td>'.$row->masuk.'</td>
                                        <td><button type="submit" value="'.$row->id_tamu.'" class="btn bg-red waves-effect waves-light" name="btn_del">Hapus</button></td>
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
        </form>
    </div>
</section>

 <?php 
include "footer.php";
 ?>