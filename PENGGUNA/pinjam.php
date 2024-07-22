<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeanggota = $_POST['kodeanggota'];
    $tgltransaksi = $_POST['tgltransaksi'];
    $tglpinjam = $_POST['tglpinjam'];
    $tglkembali = $_POST['tglkembali'];
    $buku = $_POST['buku']; 
    $jumlah_buku = $_POST['jumlah_buku']; 
    $kodetransaksi = $_POST['kodetransaksi']; 

    $result = $koneksi->query("SELECT * FROM anggota WHERE kodeanggota = '$kodeanggota'");
    if ($result->num_rows == 0) {
        echo "Anggota dengan kode $kodeanggota tidak terdaftar.";
    } else {
      
        $check_sql = "SELECT * FROM mastertransaksi WHERE kodetransaksi = '$kodetransaksi'";
        $check_result = $koneksi->query($check_sql);

        if ($check_result->num_rows > 0) {
            echo "Kode transaksi $kodetransaksi sudah ada. Silakan gunakan kode lain.";
        } else {
          
            $sql_transaksi = "INSERT INTO mastertransaksi (kodetransaksi, tgltransaksi, kodeanggota) VALUES ('$kodetransaksi', '$tgltransaksi', '$kodeanggota')";

            if ($koneksi->query($sql_transaksi) === TRUE) {

                foreach ($buku as $index => $kode_buku) {
                    $jumlah = $jumlah_buku[$index];
                    $sql_detail = "INSERT INTO detailtransaksi (kodetransaksi, kodebuku, tglpinjam, jumlahbuku, status, tglkembali) 
                    VALUES ('$kodetransaksi', '$kode_buku', '$tglpinjam', '$jumlah', 'Dipinjam', '$tglkembali')";

                    if ($koneksi->query($sql_detail) !== TRUE) {
                        echo "Error inserting detail: " . $sql_detail . "<br>" . $koneksi->error;
                    }
                }

                echo "Peminjaman berhasil";
                header("location: form_master.php");
                exit();
            } else {
                echo "Error inserting master transaction: " . $sql_transaksi . "<br>" . $koneksi->error;
            }
        }
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Form Peminjaman Buku</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="kodetransaksi">Kode Transaksi:</label>
                <input type="text" class="form-control" id="kodetransaksi" name="kodetransaksi" required>
            </div>
            <div class="form-group">
                <label for="kodeanggota">Nama Anggota:</label>
                <select class="form-control" id="kodeanggota" name="kodeanggota" required>
                    <?php
                    $result = $koneksi->query("SELECT kodeanggota, namaanggota FROM anggota");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value=\"" . $row['kodeanggota'] . "\">" . $row['namaanggota'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgltransaksi">Tanggal Transaksi:</label>
                <input type="date" class="form-control" id="tgltransaksi" name="tgltransaksi" required>
            </div>
            <div class="form-group">
                <label for="tglpinjam">Tanggal Peminjaman:</label>
                <input type="date" class="form-control" id="tglpinjam" name="tglpinjam" required>
            </div>
            <div class="form-group">
                <label for="tglkembali">Tanggal Pengembalian:</label>
                <input type="date" class="form-control" id="tglkembali" name="tglkembali" required>
            </div>
            <div id="books">
                <div class="form-group">
                    <label for="buku">Nama Buku:</label>
                    <select class="form-control" name="buku[]" required>
                        <?php
                        $result = $koneksi->query("SELECT kodebuku, judulbuku FROM buku");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . $row['kodebuku'] . "\">" . $row['judulbuku'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah_buku">Jumlah Buku:</label>
                    <input type="number" class="form-control" name="jumlah_buku[]" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>
