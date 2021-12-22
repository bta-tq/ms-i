<?php 

require_once("koneksi.php");

if(isset($_POST['submit'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM user WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: dashboard.html");
        }
    }
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
        <form>
            <p></p>
            <p></p>
            <input type="text" name="username" placeholder="Masukkan Username">
            <p></p>
            <input type="password" name="password" placeholder="Masukkan Password">
            <input type="submit" name="submit" value="Login">
            <h2><span>Atau</span></h2>
            
            <a href="#">Lupa Password</a>
            <a href="*">Daftar</a>
        </form>
    </div>
</body>
</html>