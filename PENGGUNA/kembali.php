<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodetransaksi = $_POST['kodetransaksi'];
    $tglkembali = $_POST['tglkembali'];
    
    $result = $koneksi->query("SELECT * FROM detailtransaksi WHERE kodetransaksi = '$kodetransaksi'");
    if ($result->num_rows == 0) {
        echo "Kode transaksi $kodetransaksi tidak ditemukan.";
    } else {
        $sql_update_detail = "UPDATE detailtransaksi 
                              SET tglkembali = '$tglkembali', status = 'Kembali'
                              WHERE kodetransaksi = '$kodetransaksi'";

        if ($koneksi->query($sql_update_detail) === TRUE) {
            $result = $koneksi->query("SELECT * FROM detailtransaksi WHERE kodetransaksi = '$kodetransaksi' AND status = 'Dipinjam'");
            if ($result->num_rows == 0) {
                $sql_update_master = "UPDATE mastertransaksi 
                                      SET status = 'Selesai'
                                      WHERE kodetransaksi = '$kodetransaksi'";

                if ($koneksi->query($sql_update_master) !== TRUE) {
                    echo "Error updating master transaction: " . $sql_update_master . "<br>" . $koneksi->error;
                }
            }

            echo "Pengembalian berhasil";
        } else {
            echo "Error updating detail transaction: " . $sql_update_detail . "<br>" . $koneksi->error;
        }
    }

    $koneksi->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Form Pengembalian Buku</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="kodetransaksi">Kode Transaksi:</label>
                <input type="text" class="form-control" id="kodetransaksi" name="kodetransaksi" required>
            </div>
            <div class="form-group">
                <label for="tglkembali">Tanggal Pengembalian:</label>
                <input type="date" class="form-control" id="tglkembali" name="tglkembali" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
