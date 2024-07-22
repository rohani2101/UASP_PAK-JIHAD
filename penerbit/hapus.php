
<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodepenerbit'])) {
    $kodepenerbit = $_GET['kodepenerbit'];

    $sql = "DELETE FROM penerbit WHERE kodepenerbit='$kodepenerbit'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data penulis berhasil dihapus');</script>";
        echo "<script>window.location.href = 'form_penerbit.php';</script>";
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    $koneksi->close();
}
?>
