<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodetransaksi'])) {
    $kodetransaksi = $_GET['kodetransaksi'];

    $sql = "DELETE FROM detailtransaksi WHERE kodetransaksi='$kodetransaksi'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Record deleted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $koneksi->error . "</div>";
    }

    $koneksi->close();
}

header("Location: form_datatransaksi.php");
exit();
