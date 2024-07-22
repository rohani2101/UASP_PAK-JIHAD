<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodepenulisan = $_POST['kodepenulisan'];
    $namapenulis = $_POST['namapenulis'];
    $alamatpenulis = $_POST['alamatpenulis'];
    $telppenulis = $_POST['telppenulis'];

    $sql = "UPDATE penulis SET namapenulis='$namapenulis', alamatpenulis='$alamatpenulis', telppenulis='$telppenulis' WHERE kodepenulisan='$kodepenulisan'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data penulis berhasil diperbarui');</script>";
        echo "<script>window.location.href = 'form_penulis.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Penulis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Form Edit Penulis</h2>
        <?php
        include '../koneksi.php';

        $kodepenulisan = $_GET['kodepenulisan'];

        $sql = "SELECT * FROM penulis WHERE kodepenulisan='$kodepenulisan'";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Data penulis tidak ditemukan.";
            exit();
        }
        ?>
        <form action="update.php" method="POST">
            <div class="form-group">
                <label>Kode Penulis</label>
                <input type="text" name="kodepenulisan" class="form-control" value="<?php echo $row['kodepenulisan']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama Penulis</label>
                <input type="text" name="namapenulis" class="form-control" value="<?php echo $row['namapenulis']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat Penulis</label>
                <textarea name="alamatpenulis" class="form-control" rows="3" required><?php echo $row['alamatpenulis']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Telp. Penulis</label>
                <input type="text" name="telppenulis" class="form-control" value="<?php echo $row['telppenulis']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="form_penulis.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
