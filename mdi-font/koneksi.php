<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_suhulembab";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
  echo "Belum Terkoneksi";
} else {
  //echo "Sudah Terkoneksi";
}
