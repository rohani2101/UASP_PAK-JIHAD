<?php
include '../koneksi.php';

$row = null; // Inisialisasi variabel $row

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodeanggota'])) {
    $kodeanggota = $_GET['kodeanggota'];

    // Tambahkan debugging
    echo "<div class='alert alert-info'>DEBUG: kodeanggota = $kodeanggota</div>";

    $sql = "SELECT * FROM anggota WHERE kodeanggota='$kodeanggota'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-warning'>Anggota tidak ditemukan. Query: $sql</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeanggota = $_POST['kodeanggota'];
    $namaanggota = $_POST['namaanggota'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamatanggota = $_POST['alamatanggota'];
    $tlpanggota = $_POST['tlpanggota'];
    $tempatlahir = $_POST['tempatlahir'];
    $tgllahir = $_POST['tgllahir'];

    $sql = "UPDATE anggota SET namaanggota='$namaanggota', jeniskelamin='$jeniskelamin', alamatanggota='$alamatanggota', tlpanggota='$tlpanggota', tempatlahir='$tempatlahir', tgllahir='$tgllahir' WHERE kodeanggota='$kodeanggota'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Record updated successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $koneksi->error . "</div>";
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Update Anggota</h2>
        <?php if ($row): ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="kodeanggota" value="<?php echo $row['kodeanggota']; ?>">
            <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" name="namaanggota" class="form-control" value="<?php echo $row['namaanggota']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" name="jeniskelamin" class="form-control" value="<?php echo $row['jeniskelamin']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat Anggota</label>
                <input type="text" name="alamatanggota" class="form-control" value="<?php echo $row['alamatanggota']; ?>" required>
            </div>
            <div class="form-group">
                <label>Telepon Anggota</label>
                <input type="text" name="tlpanggota" class="form-control" value="<?php echo $row['tlpanggota']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempatlahir" class="form-control" value="<?php echo $row['tempatlahir']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgllahir" class="form-control" value="<?php echo $row['tgllahir']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php else: ?>
        <div class="alert alert-warning">Data anggota tidak ditemukan. Silakan kembali ke <a href="form_anggota.php">halaman utama</a>.</div>
        <?php endif; ?>
    </div>
</body>
</html>
