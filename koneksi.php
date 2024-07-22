<?php
// session_start();

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'perpustakaan_kampus';

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()) {
  echo '<b>Database Error:</b> '.mysqli_connect_error();
  exit;
}
?>