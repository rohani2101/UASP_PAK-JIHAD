
<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodepenulisan'])) {
    $kodepenulisan = $_GET['kodepenulisan'];

    $sql = "DELETE FROM penulis WHERE kodepenulisan='$kodepenulisan'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data penulis berhasil dihapus');</script>";
        echo "<script>window.location.href = 'form_penulis.php';</script>";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    $koneksi->close();
}
?>
