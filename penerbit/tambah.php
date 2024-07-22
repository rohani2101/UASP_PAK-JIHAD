<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodepenerbit = $_POST['kodepenerbit'];
    $namapenerbit = $_POST['namapenerbit'];
    $alamatpenerbit = $_POST['alamatpenerbit'];
    $tlppenerbit = $_POST['tlppenerbit'];

    $sql = "INSERT INTO penerbit (kodepenerbit, namapenerbit, alamatpenerbit, tlppenerbit) 
            VALUES ('$kodepenerbit', '$namapenerbit', '$alamatpenerbit', '$tlppenerbit')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data penerbit berhasil ditambahkan');</script>";
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
    <title>Form Tambah Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Form Tambah Penerbit</h2>
        <form action="tambah.php" method="POST">
            <div class="form-group">
                <label>Kode Penerbit</label>
                <input type="text" name="kodepenerbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Penerbit</label>
                <input type="text" name="namapenerbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat Penerbit</label>
                <input type="text" name="alamatpenerbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Telp. Penerbit</label>
                <input type="text" name="tlppenerbit" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="form_penerbit.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
