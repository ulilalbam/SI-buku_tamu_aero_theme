<?php 

include_once '../config/koneksi.php';
session_start();
if($_SESSION['username']=="admin"){
    echo "silahkan login kembali";
    //header('location: ../index.php');
   //exit();
}
include_once "../include/header.php";
 ?>

 <!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="../dashboard/dashboard.php"><img src="../assets/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">ABC</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="../assets/images/profile_av.jpg" alt="User"></a>
                    <div class="detail">
                        <h4>User</h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>
            <li><a href="../dashboard/dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="../pengunjung/input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li><a href="../pengunjung/tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
            <li class="active open"><a href="pegawai.php"><i class="zmdi zmdi-account"></i><span>Pegawai</span></a></li>
            <li><a href="../bidang/bidang.php"><i class="zmdi zmdi-account"></i><span>Bidang</span></a></li>
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
                    <li class="breadcrumb-item"><a href="../dashboard/dashboard.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
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
                            <h2><strong>Data</strong> Pegawai</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Update Data Pegawai</a></li>
                                        <li><a href="input_pegawai.php">Tambah Data Pegawai</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover c_table">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Nomor</th>
                                        <th>Pegawai</th>
                                        <th>NIP</th>
                                        <th>Bidang</th>                     
                                        <th>Jabatan</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="http://via.placeholder.com/60x40" alt="Product img"></td>
                                        <td>Hossein</td>
                                        <td>IPONE-7</td>
                                        <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td><button type="button" class="btn bg-red waves-effect waves-light">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://via.placeholder.com/60x40" alt="Product img"></td>
                                        <td>Camara</td>
                                        <td>NOKIA-8</td>
                                        <td>2595 Pearlman Avenue Sudbury, MA 01776 </td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td><button type="button" class="btn bg-red waves-effect waves-light">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://via.placeholder.com/60x40" alt="Product img"></td>
                                        <td>Maryam</td>
                                        <td>NOKIA-456</td>
                                        <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                                        <td>4</td>
                                        <td>3</td>
                                        <td><button type="button" class="btn bg-red waves-effect waves-light">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://via.placeholder.com/60x40" alt="Product img"></td>
                                        <td>Micheal</td>
                                        <td>SAMSANG PRO</td>
                                        <td>508 Virginia Street Chicago, IL 60653</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td><button type="button" class="btn bg-red waves-effect waves-light">Hapus</button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="http://via.placeholder.com/60x40" alt="Product img"></td>
                                        <td>Frank</td>
                                        <td>NOKIA-456</td>
                                        <td>1516 Holt Street West Palm Beach, FL 33401</td>
                                        <td>13</td>
                                        <td>3</td>
                                        <td><button type="button" class="btn bg-red waves-effect waves-light">Hapus</button></td>   
                                    </tr>
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
include "../include/footer.php";
 ?>