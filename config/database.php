<?php 
	// koneksi dengan db
$server   = "localhost";
$username = "root";
$password = "";
$database = "db_antari_jaya";

$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
	die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
 ?>
