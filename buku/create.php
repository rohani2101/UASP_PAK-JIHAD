<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judulbuku = $koneksi->real_escape_string($_POST['judulbuku']);
    $isbn = $koneksi->real_escape_string($_POST['isbn']);
    $kodepenulis = $koneksi->real_escape_string($_POST['kodepenulis']);
    $kodepenerbit = $koneksi->real_escape_string($_POST['kodepenerbit']);
    $kodekategori = $koneksi->real_escape_string($_POST['kodekategori']);
    $tglterbit = $koneksi->real_escape_string($_POST['tglterbit']);
    $jmlhhalaman = $koneksi->real_escape_string($_POST['jmlhhalaman']);

    $sql = "INSERT INTO buku (judulbuku, isbn, kodepenulis, kodepenerbit, kodekategori, tglterbit, jmlhhalaman) 
            VALUES ('$judulbuku', '$isbn', '$kodepenulis', '$kodepenerbit', '$kodekategori', '$tglterbit', '$jmlhhalaman')";

    if ($koneksi->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Buku</h2>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="judulbuku">Judul Buku</label>
                <input type="text" class="form-control" id="judulbuku" name="judulbuku" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>
            <div class="form-group">
                <label for="kodepenulis">Penulis</label>
                <select class="form-control" id="kodepenulis" name="kodepenulis" required>
                    <option value="">Pilih Penulis</option>
                    <?php
                    $result = $koneksi->query("SELECT kodepenulisan, namapenulis FROM penulis");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['kodepenulisan'] . "'>" . $row['namapenulis'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kodepenerbit">Penerbit</label>
                <select class="form-control" id="kodepenerbit" name="kodepenerbit" required>
                    <option value="">Pilih Penerbit</option>
                    <?php
                    $result = $koneksi->query("SELECT kodepenerbit, namapenerbit FROM penerbit");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['kodepenerbit'] . "'>" . $row['namapenerbit'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kodekategori">Kategori</label>
                <input type="text" class="form-control" id="kodekategori" name="kodekategori" required>
            </div>
            <div class="form-group">
                <label for="tglterbit">Tanggal Terbit</label>
                <input type="date" class="form-control" id="tglterbit" name="tglterbit" required>
            </div>
            <div class="form-group">
                <label for="jmlhhalaman">Jumlah Halaman</label>
                <input type="number" class="form-control" id="jmlhhalaman" name="jmlhhalaman" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
