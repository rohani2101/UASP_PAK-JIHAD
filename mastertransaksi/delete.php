
<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodetransaksi'])) {
    $kodetransaksi = $_GET['kodetransaksi'];

    $sql = "DELETE FROM mastertransaksi WHERE kodetransaksi='$kodetransaksi'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data penulis berhasil dihapus');</script>";
        echo "<script>window.location.href = 'form_master.php';</script>";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    $koneksi->close();
}
?>
