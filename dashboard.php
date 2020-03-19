<?php 
include_once 'koneksi.php';
include_once 'tanggal.php';
session_start();
if($_SESSION['username']!="admin"){
    echo "silahkan login kembali";
    header('location: index.php');
   exit();
}
include "header.php";
error_reporting();
//error_reporting(E_ALL & ~E_NOTICE);
$dataPoints=array();
//$select=$pdo->prepare("select nama, count(*) as total from data_bidang order by id");
$select=$pdo->prepare(" select *, count(data_tamu.id_tamu) as total from data_bidang left join data_pegawai on data_bidang.id=data_pegawai.kode_bidang left join data_tamu on data_pegawai.id_pgw=data_tamu.kode_pgw group by data_bidang.id");
//$select=$pdo->prepare("select *, count(data_pegawai.id_pgw) as total from data_bidang left join data_pegawai on data_bidang.id=data_pegawai.kode_bidang group by data_bidang.id");
$select->execute();
while ($row=$select->fetch(PDO::FETCH_OBJ))
{
    array_push($dataPoints, array("label"=> $row->nama, "y"=> $row->total));
}
$link = null;
 ?>


            <li class="active open"><a href="dashboard.php" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="input_tamu.php"><i class="zmdi zmdi-account"></i><span>Tambah Pengunjung</span></a></li>
            <li><a href="tamu.php"><i class="zmdi zmdi-account"></i><span>Pengunjung</span></a></li>
            <li><a href="pegawai.php"><i class="zmdi zmdi-account"></i><span>Pegawai</span></a></li>
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
                <h2>Dashboard</h2>
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
                
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h2><strong>Chart</strong> Permasalahan</h2>
                    </div>
                    <div class="body text-center">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <!--<button class="btn btn-primary mt-4 mb-4">View More</button> -->                           
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
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable"">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Pegawai</th>
                                        <th>Bidang</th>                                    
                                        <th>Tanggal</th>
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
         text: "Permasalahan Bidang Terbanyak"
     },
     legend :{
        verticalAlign: "center",
        horizontalAlign: "left",
    },
     data: [{
         type: "doughnut",
         showInLegend: "true",
         legendText: "{label}",
         indexLabelFontSize: 16,
         indexLabel: "#percent%",
         yValueFormatString: "",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
</script>
<?php 
include "footer.php";
 ?>