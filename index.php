<?php 
include_once 'config/koneksi.php';
// LOGIN 
if(isset($_POST['btn_login'])){
    
    $user = $_POST['txt_user'];
    $password = $_POST['txt_pass'];
    
    $select = $pdo->prepare("select * from admin where username='$user' and password='$password' ");
    $select->execute();
    
    $row = $select->fetch(PDO::FETCH_ASSOC);
    
    if($row['username']==$user AND $row['password']==$password){
        
        $_SESSION['username']=$row['username'];
       
        
        header('location: dashboard/dashboard.php');
    }
        
}
    
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">    
</head>
    <!------ Include the above in your HEAD tag ---------->

    <title>Login Page Buku Tamu</title>

<body>
    <div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form action="" class="card auth_form" method="post">
                    <div class="header">
                        <img class="logo" src="assets/images/logo.svg" alt="">
                        <h5>Log in</h5>
                    </div>
                    
                    <div class="body">
                        
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="txt_user" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="txt_pass" required>
                            <div class="input-group-append">                                
                                <span class="input-group-text"><a href="forgot-password.html" class="forgot" title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                            </div>                            
                        </div>
                        <button type="submit" name="btn_login" class="btn btn-primary btn-block waves-effect waves-light">SIGN IN</button>    
                                      
                    </div>
                    
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>Designed by <a href="https://thememakker.com/" target="_blank">ThemeMakker</a></span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="assets/images/signin.svg" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>


</html>