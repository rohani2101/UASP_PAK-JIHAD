<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penulis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Penulis</h2>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Penulis</a>
        <a href="../index.php" class="btn btn-success mb-3">KEMBALI</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Penulis</th>
                    <th>Nama Penulis</th>
                    <th>Alamat Penulis</th>
                    <th>Telp. Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                $sql = "SELECT * FROM penulis";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['kodepenulisan'] . "</td>";
                        echo "<td>" . $row['namapenulis'] . "</td>";
                        echo "<td>" . $row['alamatpenulis'] . "</td>";
                        echo "<td>" . $row['telppenulis'] . "</td>";
                        echo "<td>
                                <a href='update.php?kodepenulisan=" . $row['kodepenulisan'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='hapus.php?kodepenulisan=" . $row['kodepenulisan'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data penulis.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
