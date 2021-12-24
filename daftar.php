<?php

require_once("koneksi.php");

if (isset($_POST['daftar'])) {

    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $notelp = filter_input(INPUT_POST, 'notelp', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $sql = "INSERT INTO user (nama, username, password, email, notelp) 
            VALUES (:nama, :username, :password, :email, :notelp)";
    $stmt = $db->prepare($sql);

    $params = array(
        ":nama" => $nama,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email,
        ":notelp" => $notelp
    );

    $saved = $stmt->execute($params);
    if($saved) header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MS"-I</title>
        <link rel="shortcut icon" type="image/x-icon" href="" />
        <link rel="stylesheet" href= "https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="css/daftar.css">
    </head>
<body id = "html">
    <div class = "group4">
        <img class = "logo" src="Asset/logo.png">
        <h2 class="atas">
            Micro, Small, and Medium Enterprises
        </h2>
        <h2 class="bawah">
            System Information
        </h2>
        <div>
        <form action="" method="POST">
            <input class = "from-input1" type="text" name="nama" placeholder="Nama Lengkap">
            <input class = "from-input2" type="text" name="username" placeholder="Username">
            <input class = "from-input3" type="email" name="email" placeholder="Email">
            <input class = "from-input4" type="tel" name="notelp" placeholder="No. Telepon">
            <input class = "from-input5" type="password" name="password" placeholder="Password">
            <input class = "from-input6" type="password" name="konfpassword" placeholder="Konformasi Password">

            <input type = "submit" class ="button-daftar" name ="daftar" value ="Daftar" />

        </form>
        </div>
        <div>
            <div class="line1"></div>
            <div class="line2"></div>
            <h3> Atau </h3>
        </div>
        <div>
            <ul class="daftar-google"><a href = "#DaftardenganGoogle"> Daftar dengan Google </a></ul>
            <img class = "google" src="Asset/google-logo-9824.png">
        </div>
        <div>
            <p class="p1">Sudah Memiliki Akun ?</p>
        </div>
        <button class="button-login">
            Klik Disini
        </button>
        <footer>
            <img class = "logo1" src="Asset/logo.png">
            <p class="p2"> © Copyright MS”I Ⓡ 2021 </p>
            <p class="kontak"> Kontak kami</p>
            <p class="alamat"> Alamat .............</p>
            <p class="telepon"> No. Telepon</p>
            <img class = "wa" src="Asset/whatsapp (1) 1.png">
            <img class = "ig" src="Assets/instagram">
            <img class = "fb" src="Asset/facebook 1.png">
        </footer>
    </div>
</body>