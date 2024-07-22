<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodepenerbit = $_POST['kodepenerbit'];
    $namapenerbit = $_POST['namapenerbit'];
    $alamatpenerbit = $_POST['alamatpenerbit'];
    $tlppenerbit = $_POST['tlppenerbit'];

    $sql = "UPDATE penerbit SET namapenerbit='$namapenerbit', alamatpenerbit='$alamatpenerbit', tlppenerbit='$tlppenerbit' WHERE kodepenerbit='$kodepenerbit'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data penerbit berhasil diperbarui');</script>";
        echo "<script>window.location.href = 'form_penerbit.php';</script>";
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
    <title>Form Edit Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Form Edit Penerbit</h2>
        <?php
        include '../koneksi.php';

        $kodepenerbit = $_GET['kodepenerbit'];

        $sql = "SELECT * FROM penerbit WHERE kodepenerbit='$kodepenerbit'";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Data penerbit tidak ditemukan.";
            exit();
        }
        ?>
        <form action="edit.php" method="POST">
            <div class="form-group">
                <label>Kode Penerbit</label>
                <input type="text" name="kodepenerbit" class="form-control" value="<?php echo $row['kodepenerbit']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama Penerbit</label>
                <input type="text" name="namapenerbit" class="form-control" value="<?php echo $row['namapenerbit']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat Penerbit</label>
                <input type="text" name="alamatpenerbit" class="form-control" value="<?php echo $row['alamatpenerbit']; ?>" required>
            </div>
            <div class="form-group">
                <label>Telp. Penerbit</label>
                <input type="text" name="tlppenerbit" class="form-control" value="<?php echo $row['tlppenerbit']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="form_penerbit.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
