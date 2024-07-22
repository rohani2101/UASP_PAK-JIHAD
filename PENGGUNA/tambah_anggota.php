<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeanggota = $_POST['kodeanggota'];
    $namaanggota = $_POST['namaanggota'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamatanggota = $_POST['alamatanggota'];
    $tlpanggota = $_POST['tlpanggota'];
    $tempatlahir = $_POST['tempatlahir'];
    $tgllahir = $_POST['tgllahir'];

    $sql = "INSERT INTO anggota (kodeanggota, namaanggota, jeniskelamin, alamatanggota, tlpanggota, tempatlahir, tgllahir) VALUES ('$kodeanggota', '$namaanggota', '$jeniskelamin', '$alamatanggota', '$tlpanggota', '$tempatlahir', '$tgllahir')";

    if ($koneksi->query($sql) === TRUE) {
        // Redirect to the form_anggota.php page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Create Anggota</h2>
        <a href="index.php" class="btn btn-primary mb-3">KEMBALI</a>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="kodeanggota">Kode Anggota:</label>
                <input type="text" class="form-control" id="kodeanggota" name="kodeanggota">
            </div>
            <div class="form-group">
                <label for="namaanggota">Nama Anggota:</label>
                <input type="text" class="form-control" id="namaanggota" name="namaanggota">
            </div>
            <div class="form-group">
                <label for="jeniskelamin">Jenis Kelamin:</label>
                <input type="text" class="form-control" id="jeniskelamin" name="jeniskelamin">
            </div>
            <div class="form-group">
                <label for="alamatanggota">Alamat Anggota:</label>
                <input type="text" class="form-control" id="alamatanggota" name="alamatanggota">
            </div>
            <div class="form-group">
                <label for="tlpanggota">Telepon Anggota:</label>
                <input type="text" class="form-control" id="tlpanggota" name="tlpanggota">
            </div>
            <div class="form-group">
                <label for="tempatlahir">Tempat Lahir:</label>
                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir">
            </div>
            <div class="form-group">
                <label for="tgllahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgllahir" name="tgllahir">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
