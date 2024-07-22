<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodekategori = $_POST['kodekategori'];
    $namakategori = $_POST['namakategori'];

    $sql = "INSERT INTO kategori (kodekategori, namakategori) 
            VALUES ('$kodekategori', '$namakategori')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data kategori berhasil ditambahkan');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
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
    <title>Form Tambah Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Form Tambah Kategori</h2>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label>Kode Kategori</label>
                <input type="text" name="kodekategori" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="namakategori" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="form_kategori.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
