<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodekategori'])) {
    $kodekategori = $_GET['kodekategori'];

    $sql = "DELETE FROM kategori WHERE kodekategori='$kodekategori'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data kategori berhasil dihapus');</script>";
        echo "<script>window.location.href = 'form_kategori.php';</script>";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    $koneksi->close();
}
?>
