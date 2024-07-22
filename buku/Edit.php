<?php
include '../koneksi.php';

if (isset($_GET['kodebuku'])) {
    $kodebuku = $_GET['kodebuku'];
    $result = $koneksi->query("SELECT * FROM buku WHERE kodebuku = '$kodebuku'");
    $buku = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodebuku = $_POST['kodebuku'];
    $judulbuku = $koneksi->real_escape_string($_POST['judulbuku']);
    $isbn = $koneksi->real_escape_string($_POST['isbn']);
    $kodepenulis = $koneksi->real_escape_string($_POST['kodepenulis']);
    $kodepenerbit = $koneksi->real_escape_string($_POST['kodepenerbit']);
    $kodekategori = $koneksi->real_escape_string($_POST['kodekategori']);
    $tglterbit = $koneksi->real_escape_string($_POST['tglterbit']);
    $jmlhhalaman = $koneksi->real_escape_string($_POST['jmlhhalaman']);

    $sql = "UPDATE buku SET judulbuku='$judulbuku', isbn='$isbn', kodepenulis='$kodepenulis', kodepenerbit='$kodepenerbit', 
            kodekategori='$kodekategori', tglterbit='$tglterbit', jmlhhalaman='$jmlhhalaman' WHERE kodebuku='$kodebuku'";

    if ($koneksi->query($sql) === TRUE) {
        header('Location: form_buku.php');
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
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Buku</h2>
        <form action="edit.php" method="POST">
            <input type="hidden" name="kodebuku" value="<?php echo $buku['kodebuku']; ?>">
            <div class="form-group">
                <label for="judulbuku">Judul Buku</label>
                <input type="text" class="form-control" id="judulbuku" name="judulbuku" value="<?php echo $buku['judulbuku']; ?>" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $buku['isbn']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kodepenulis">Penulis</label>
                <select class="form-control" id="kodepenulis" name="kodepenulis" required>
                    <option value="">Pilih Penulis</option>
                    <?php
                    $result = $koneksi->query("SELECT kodepenulisan, namapenulis FROM penulis");
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['kodepenulisan'] == $buku['kodepenulis']) ? 'selected' : '';
                        echo "<option value='" . $row['kodepenulisan'] . "' $selected>" . $row['namapenulis'] . "</option>";
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
                        $selected = ($row['kodepenerbit'] == $buku['kodepenerbit']) ? 'selected' : '';
                        echo "<option value='" . $row['kodepenerbit'] . "' $selected>" . $row['namapenerbit'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kodekategori">Kategori</label>
                <input type="text" class="form-control" id="kodekategori" name="kodekategori" value="<?php echo $buku['kodekategori']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tglterbit">Tanggal Terbit</label>
                <input type="date" class="form-control" id="tglterbit" name="tglterbit" value="<?php echo $buku['tglterbit']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jmlhhalaman">Jumlah Halaman</label>
                <input type="number" class="form-control" id="jmlhhalaman" name="jmlhhalaman" value="<?php echo $buku['jmlhhalaman']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
