<?php 
include_once 'koneksi.php';
error_reporting();
$command = "mysqldump -u root -p bukutamu --single-transaction --quick --lock-tables=false > bukutamu-backup-$(date +%F).sql";
    $hasil=$pdo->prepare($command);
    $hasil->execute();
//$query = "SHOW TABLES";
//$hasil = mysql_query($query);




//$backup=exec($command);

?>