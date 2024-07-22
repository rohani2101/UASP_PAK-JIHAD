<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Penerbit</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Penerbit</a>
        <a href="../index.php" class="btn btn-success mb-3">KEMBALI</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Penerbit</th>
                    <th>Nama Penerbit</th>
                    <th>Alamat Penerbit</th>
                    <th>Telp. Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                $sql = "SELECT * FROM penerbit";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['kodepenerbit'] . "</td>";
                        echo "<td>" . $row['namapenerbit'] . "</td>";
                        echo "<td>" . $row['alamatpenerbit'] . "</td>";
                        echo "<td>" . $row['tlppenerbit'] . "</td>";
                        echo "<td>
                                <a href='edit.php?kodepenerbit=" . $row['kodepenerbit'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='hapus.php?kodepenerbit=" . $row['kodepenerbit'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data penerbit.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
