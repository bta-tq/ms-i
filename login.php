<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $hasil = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");

    if(mysqli_num_rows($hasil) === 1 ) {
        $row = mysqli_fetch_assoc($hasil);
        if (password_verify($pass, $row["password"])) {
            header("Location: dashboard.php");
            exit;   
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="login-box">
        <img src="Asset/logo.png" class="logo">
        <h1>Micro, Small, and Medium Enterprises System Information</h1>
        <?php
        if(isset($error)):
        ?>
        <p style="color: red; font-style: italic;">Username atau Password anda salah</p>
        <?php endif; ?>
        <form action="" method="POST">
            <p></p>
            <p></p>
            <input type="text" name="username" placeholder="Masukkan Username">
            <p></p>
            <input type="password" name="password" placeholder="Masukkan Password">
            <input type="submit" name="login" value="Login">
            <h2><span>Atau</span></h2>
            
            <a href="#">Lupa Password</a>
            <a href="*">Daftar</a>
        </form>
    </div>
</body>
</html>