<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodetransaksi = $_POST['kodetransaksi'];
    $tgltransaksi = $_POST['tgltransaksi'];
    $kodeanggota = $_POST['kodeanggota'];

    $sql = "INSERT INTO mastertransaksi (kodetransaksi, tgltransaksi, kodeanggota) 
            VALUES ('$kodetransaksi', '$tgltransaksi', '$kodeanggota')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Data berhasil ditambahkan</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $koneksi->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi Baru</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Tambah Transaksi Baru</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label>Kode Transaksi</label>
                <input type="text" name="kodetransaksi" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="date" name="tgltransaksi" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kode Anggota</label>
                <input type="text" name="kodeanggota" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>
