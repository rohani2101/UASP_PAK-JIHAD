<?php
include '../koneksi.php';

$sql = "SELECT mastertransaksi.kodetransaksi, mastertransaksi.tgltransaksi, anggota.namaanggota 
        FROM mastertransaksi
        JOIN anggota ON mastertransaksi.kodeanggota = anggota.kodeanggota";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Daftar Transaksi</h2>
        <a href="../index.php" class="btn btn-success mb-3">KEMBALI</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Anggota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["kodetransaksi"]. "</td>";
                        echo "<td>" . $row["tgltransaksi"]. "</td>";
                        echo "<td>" . $row["namaanggota"]. "</td>";
                        echo "<td><a href='update.php?kodetransaksi=".$row["kodetransaksi"]."' class='btn btn-warning'>Edit</a> 
                        <a href='delete.php?kodetransaksi=".$row["kodetransaksi"]."' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data transaksi</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
