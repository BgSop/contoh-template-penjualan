<?php
$base_url = "https://localhost/PROGRAM%20REKOLING%20SMKN%201%20TOBO/penjualan-tes/";
date_default_timezone_set('Asia/Jakarta');
$server = "localhost";
$user = "root";
$password = "";
$database = "db_tes_penjualan";

$koneksi = mysqli_connect($server, $user, $password, $database) or die (mysqli_connect_error());
?>