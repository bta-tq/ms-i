<?php
$conn = mysqli_connect('localhost','root',"",'ms-i');

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ms-i";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}
