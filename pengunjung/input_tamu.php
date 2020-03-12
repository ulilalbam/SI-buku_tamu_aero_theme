<?php 
include_once '../config/koneksi.php';
session_start();

include "../include/header.php";
 ?>

 <!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="../dashboard/index.php"><img src="../assets/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">ABC</span></a>
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
            <li><a href="../dashboard/index.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="active open"><a href="input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li><a href="tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
            <li><a href="../pegawai/pegawai.php"><i class="zmdi zmdi-account"></i><span>Pegawai</span></a></li>
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
                <h2>Pengunjung</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard/index.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
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
                            <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label for="tambah_pengunjung">Nama Pengunjung</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" id="tambah_namapgw" class="form-control" placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label for="tambah_keperluan">Keperluan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" id="tambah_nip" class="form-control" placeholder="Masukkan NIP">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                        <label for="pilih_pgw">Pegawai yang Ditemui</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8">
                                        <div class="form-group">
                                            <select class="form-control show-tick ms select2" data-placeholder="Select">
                                            <option value="" disabled  selected>Pilih Pegawai</option>
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4">
                                        </div>
                                    <div class="m-l-20 inlineblock">
                                            <button type="button" class="btn btn-raised btn-primary btn-round waves-effect">Tambahkan</button>
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
include "../include/footer.php";
 ?>