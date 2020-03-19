<?php
include_once 'koneksi.php';
session_start();
if($_SESSION['username']!="admin"){
    echo "silahkan login kembali";
    header('location: index.php');
   exit();
}
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Tamu.xls");
?>

<h3>Data Tamu</h3>
    
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Tamu</th>
            <th>Keperluan</th>
            <th>Pegawai yang Ditemui</th>                     
            <th>Bidang</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i=1;
            
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