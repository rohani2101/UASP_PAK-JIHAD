<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodekategori = $_POST['kodekategori'];
    $namakategori = $_POST['namakategori'];

    $sql = "UPDATE kategori SET namakategori='$namakategori' WHERE kodekategori='$kodekategori'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data kategori berhasil diperbarui');</script>";
        echo "<script>window.location.href = 'form_kategori.php';</script>";
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
    <title>Form Edit Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Form Edit Kategori</h2>
        <?php
        include '../koneksi.php';

        $kodekategori = $_GET['kodekategori'];

        $sql = "SELECT * FROM kategori WHERE kodekategori='$kodekategori'";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Data kategori tidak ditemukan.";
            exit();
        }
        ?>
        <form action="edit_data.php" method="POST">
            <div class="form-group">
                <label>Kode Kategori</label>
                <input type="text" name="kodekategori" class="form-control" value="<?php echo $row['kodekategori']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="namakategori" class="form-control" value="<?php echo $row['namakategori']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="form_kategori.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
