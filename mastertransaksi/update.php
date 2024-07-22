<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodetransaksi'])) {
    $kodetransaksi = $_GET['kodetransaksi'];

    $sql = "SELECT * FROM mastertransaksi WHERE kodetransaksi='$kodetransaksi'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-warning'>Transaksi tidak ditemukan.</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodetransaksi = $_POST['kodetransaksi'];
    $tgltransaksi = $_POST['tgltransaksi'];
    $kodeanggota = $_POST['kodeanggota'];

    $sql = "UPDATE mastertransaksi SET tgltransaksi='$tgltransaksi', kodeanggota='$kodeanggota' WHERE kodetransaksi='$kodetransaksi'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Data berhasil diupdate</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $koneksi->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Update Transaksi</h2>
        <?php if (isset($row)): ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="kodetransaksi" value="<?php echo $row['kodetransaksi']; ?>">
            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="date" name="tgltransaksi" class="form-control" value="<?php echo $row['tgltransaksi']; ?>" required>
            </div>
            <div class="form-group">
                <label>Kode Anggota</label>
                <input type="text" name="kodeanggota" class="form-control" value="<?php echo $row['kodeanggota']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php else: ?>
        <div class="alert alert-warning">Data transaksi tidak ditemukan. Silakan kembali ke <a href="index.php">halaman utama</a>.</div>
        <?php endif; ?>
    </div>
</body>
</html>
