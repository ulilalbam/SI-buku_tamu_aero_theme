<?php 

include_once 'koneksi.php';
error_reporting();
$hariini = date("d-m-Y");
$kemarin = date("d-m-Y", strtotime("-1 days"));
$mingguini = date("d-m-Y", strtotime("-7 days"));

/*----------Hari Ini---------*/
$select=$pdo->prepare("select count(id_tamu) as total from data_tamu where masuk='$hariini' group by masuk");
$select->execute();
while ($row=$select->fetch(PDO::FETCH_OBJ)){
        $hasil1= ($row->total);     
}
/*----------Kemarin---------*/
$select=$pdo->prepare("select count(id_tamu) as kemarin from data_tamu where masuk='$kemarin' group by masuk");
$select->execute();
while ($row=$select->fetch(PDO::FETCH_OBJ)){
    $hasil2= $row->kemarin;
}

/*----------Minggu Ini---------*/
$select=$pdo->prepare("select count(id_tamu) as mingguini from data_tamu where masuk between masuk='$hariini' and masuk='$mingguini' group by masuk");
$select->execute();
while ($row=$select->fetch(PDO::FETCH_OBJ)){
    $hasil3= $row->mingguini;
}
/*----------Bulan Ini---------*/
$select=$pdo->prepare("select count(id_tamu) as bulanini from data_tamu where masuk='$kemarin' group by masuk");
$select->execute();
while ($row=$select->fetch(PDO::FETCH_OBJ)){
    $hasil4= $row->bulanini;
}
?>