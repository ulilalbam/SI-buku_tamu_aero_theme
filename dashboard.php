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

$dataPoints = array(
	array("label"=> "Food + Drinks", "y"=> 590),
	array("label"=> "Activities and Entertainments", "y"=> 261),
	array("label"=> "Health and Fitness", "y"=> 158)
);
 ?>


            <li class="active open"><a href="dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
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
                <h2>Dashboard ( masih template perlu diganti )</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> ABC</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="42" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#00adef" readonly>
                            <p>Total<strong> Pengunjung</strong></p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Direct</small>
                                    <h5 class="mb-0">254</h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Discovery</small>
                                    <h5 class="mb-0">254</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="81" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#ee2558" readonly>
                            <p>Total<strong> Permasalahan</strong></p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Internal</small>
                                    <h5 class="mb-0">34GB</h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">External</small>
                                    <h5 class="mb-0">531GB</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="62" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#8f78db" readonly>
                            <p>Total<strong> Kunjungan Hari Ini</strong></p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Internal</small>
                                    <h5 class="mb-0">25<small>(-23%)</small></h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">External</small>
                                    <h5 class="mb-0">12<small>(+150%)</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="38" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#f67a82" readonly>
                            <p>Total<strong> Kunjungan Bulan Ini</strong></p>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Inbound</small>
                                    <h5 class="mb-0">15K</h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <small class="text-muted">Outbound</small>
                                    <h5 class="mb-0">2K</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h2><strong>Chart</strong> Permasalahan ( belum connect database )</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body text-center">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <button class="btn btn-primary mt-4 mb-4">View More</button>                            
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Pengunjung</strong> Terbaru</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
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
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Pegawai</th>
                                        <th>Bidang</th>                                    
                                        <th>Permasalahan</th>
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
<script>
window.onload = function () {
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     exportEnabled: true,
     title:{
         text: "Permasalahan Tamu Terbanyak"
     },
     subtitles: [{
         text: "Berdasar bidang"
     }],
     data: [{
         type: "pie",
         showInLegend: "true",
         legendText: "{label}",
         indexLabelFontSize: 16,
         indexLabel: "{label} - #percent%",
         yValueFormatString: "฿#,##0",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
</script>
<?php 
include "footer.php";
 ?>