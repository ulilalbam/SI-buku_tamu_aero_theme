<?php 
include_once 'koneksi.php';
session_start();
if($_SESSION['username']!="admin"){
    echo "silahkan login kembali";
    header('location: index.php');
   exit();
}
include "header.php";
$tanggal = date("d-m-Y");
error_reporting();
if(isset($_POST['btn_add'])){
    
    $tmasuk = $_POST['masuk'];
    $tnama = $_POST['tambah_tamu'];
    $tket = $_POST['tambah_ket'];
    $tpgw = $_POST['pilih_pgw'];
    
    $insert = $pdo->prepare("insert into data_tamu(kode_pgw,nama_tamu,masuk,ket) values(:dpgw,:dtamu,:dmasuk,:dket)");
            $insert->bindParam(':dpgw',$tpgw);
            $insert->bindParam(':dtamu',$tnama);
            $insert->bindParam(':dmasuk',$tmasuk);
            $insert->bindParam(':dket',$tket);
            
            $insert->execute();
            header( "refresh:0;url=tamu.php" );
}
 ?>


            <li><a href="dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="active open"><a href="input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li><a href="tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
            <li><a href="pegawai.php"><i class="zmdi zmdi-account"></i><span>Pegawai</span></a></li>
            <li><a href="bidang.php"><i class="zmdi zmdi-account"></i><span>Bidang</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Laporan</span></a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Ekspor Data</a></li>
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
                <h2>Pengunjung</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
                    <li class="breadcrumb-item active">Tambah Pengunjung</li>
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
                            <h2 class="card-inside-title">Tambah Pengunjung</h2>
                            <div class="body">
                            <form role="form" class="form-horizontal" action="" method="post">
                            <input type="hidden" name="masuk" value="<?php echo $tanggal?>">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label>Nama Pengunjung</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="tambah_tamu" class="form-control" placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label>Keperluan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="tambah_ket" class="form-control" placeholder="Masukkan Keperluan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label>Pegawai yang Ditemui</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control show-tick ms select2" name="pilih_pgw" required>
                                            <option value="" disabled  selected>Pilih Pegawai</option>
                                            <?php
                                $select=$pdo->prepare("select * from data_pegawai order by id_pgw asc");
                                $select->execute();
                                while($row=$select->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    //echo "<option value='$row[0].$row[1]'>$row[0]. $row[1]</option>";
                                    ?>
                                    <option value="<?php echo $row['id_pgw'];?>"><?php echo $row['nama_pgw'];?></option>
                                <?php
                                }
                                ?>
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
    </div>
</section>

 <?php 
include "footer.php";
 ?>