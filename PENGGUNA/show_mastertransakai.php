<?php
include '../koneksi.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$kodetransaksi = isset($_GET['kodetransaksi']) ? $_GET['kodetransaksi'] : '';

if (!$kodetransaksi) {
    die("Transaction code not provided.");
}

$sql = "SELECT detailtransaksi.kodetransaksi, buku.judulbuku, detailtransaksi.tglpinjam, detailtransaksi.jumlahbuku, detailtransaksi.status, detailtransaksi.tglkembali
        FROM detailtransaksi
        JOIN buku ON detailtransaksi.kodebuku = buku.kodebuku
        WHERE detailtransaksi.kodetransaksi = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("s", $kodetransaksi);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Query failed: " . $koneksi->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Detail Transaksi</h2>
        <a href="index.php" class="btn btn-success mb-3">KEMBALI</a>
        <?php
        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>Kode Transaksi</th><th>Judul Buku</th><th>Tanggal Pinjam</th><th>Jumlah Buku</th><th>Status</th><th>Tanggal Kembali</th></tr></thead>";
            echo "<tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["kodetransaksi"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["judulbuku"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tglpinjam"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["jumlahbuku"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tglkembali"]) . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>TIDAK ADA DETAIL TRANSAKASI.</p>";
        }
        $koneksi->close(); 
        ?>
    </div>
</body>
</html>
