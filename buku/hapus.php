<?php
include '../koneksi.php';

if (isset($_GET['kodebuku'])) {
    $kodebuku = $_GET['kodebuku'];
    $sql = "DELETE FROM buku WHERE kodebuku = '$kodebuku'";
    
    if ($koneksi->query($sql) === TRUE) {
        header('Location: form_buku.php');
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>
