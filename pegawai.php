<?php 

include_once 'koneksi.php';
session_start();
if($_SESSION['username']!="admin"){
    echo "silahkan login kembali";
    header('location: index.php');
   exit();
}
include_once "header.php";
/*------ Delete Pegawai ------*/
if (isset($_POST['btn_del'])){
    
    $delete=$pdo->prepare("delete from data_pegawai where id_pgw=".$_POST['btn_del']);
    $delete->execute();
}
 ?>


            <li><a href="dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li><a href="tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
            <li class="active open"><a href="pegawai.php"><i class="zmdi zmdi-account"></i><span>Pegawai</span></a></li>
            <li><a href="bidang.php"><i class="zmdi zmdi-account"></i><span>Bidang</span></a></li>
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
                <h2>Pegawai</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
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
                            <h2><strong>Data</strong> Pegawai </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="input_pegawai.php">Tambah Data Pegawai</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <!---<th style="width:60px;">#</th>-->
                                            <th>Nomor</th>
                                            <th>Pegawai</th>
                                            <th>NIP</th>
                                            <th>Bidang</th>                     
                                            <th>Jabatan</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $i=1;
                                    $select=$pdo->prepare("select data_pegawai.id_pgw, data_pegawai.nama_pgw, data_pegawai.nip, data_bidang.nama, data_pegawai.jabatan from data_pegawai inner join data_bidang on data_pegawai.kode_bidang=data_bidang.id");
                                    $select->execute();
                                    while($row=$select->fetch(PDO::FETCH_OBJ)){
                                        echo '
                                        <tr>
                                        <td>'.$row=$i++.'</td>
                                        <td>'.$row->nama_pgw.'</td>
                                        <td>'.$row->nip.'</td>
                                        <td>'.$row->nama.'</td>
                                        <td>'.$row->jabatan.'</td>
                                        <td><a href="edit_pegawai.php?id_pgw='.$row->id_pgw.'" class="btn bg-orange waves-effect waves-light" role="button">Edit</a></td>
                                        <td><button type="submit" value="'.$row->id_pgw.'" class="btn bg-red waves-effect waves-light" name="btn_del">Hapus</button></td>
                                        
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