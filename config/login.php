<?php 
include 'koneksi.php';

// PROSES LOGIN
if(isset($_POST['btn_login'])){
    
    $user = $_POST['txt_user'];
    $pass = $_POST['txt_pass'];
    
    $select = $pdo->prepare("select * from admin where username='$user' and password='$pass' ");
    $select->execute();
    
    $row = $select->fetch(PDO::FETCH_ASSOC);
    
    if($row['username']==$user AND $row['password']==$pass){
        
        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['hak_akses']=$row['hak_akses'];
        
        
        header('location: ../dashboard.php');
        
    }   
    }
?>