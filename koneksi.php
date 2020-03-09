<?php
$koneksi = mysqli_connect("localhost","root","","bukutamu");

// cek koneksi
if (mysqli_connect_error()){
    echo "koneksi database gagal : ".mysqli_connect_error();
}else{
    echo "berhasil masuk";
}

?>