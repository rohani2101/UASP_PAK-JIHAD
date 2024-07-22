<?php
include '../koneksi.php';

if (isset($_GET['kodeanggota'])) {
    $kodeanggota = $_GET['kodeanggota'];

    $sql = "DELETE FROM anggota WHERE kodeanggota='$kodeanggota'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}

header("Location: form_anggota.php");
?>
