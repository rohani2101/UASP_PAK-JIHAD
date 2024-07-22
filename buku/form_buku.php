<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Buku</h2>
        <a href="create.php" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> TAMBAH DATA</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>ISBN</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Kategori</th>
                    <th>Tanggal Terbit</th>
                    <th>Jumlah Halaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                $sql = "SELECT buku.judulbuku, buku.isbn, penulis.namapenulis, penerbit.namapenerbit, kategori.namakategori, buku.tglterbit, buku.jmlhhalaman, buku.kodebuku 
                        FROM buku
                        JOIN penulis ON buku.kodepenulis = penulis.kodepenulisan
                        JOIN penerbit ON buku.kodepenerbit = penerbit.kodepenerbit
                        JOIN kategori ON buku.kodekategori = kategori.kodekategori";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['judulbuku'] . "</td>";
                        echo "<td>" . $row['isbn'] . "</td>";
                        echo "<td>" . $row['namapenulis'] . "</td>";
                        echo "<td>" . $row['namapenerbit'] . "</td>";
                        echo "<td>" . $row['namakategori'] . "</td>";
                        echo "<td>" . $row['tglterbit'] . "</td>";
                        echo "<td>" . $row['jmlhhalaman'] . "</td>";
                        echo "<td>
                                <a href='edit.php?kodebuku=" . $row['kodebuku'] . "' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i> Edit</a>
                                <a href='hapus.php?kodebuku=" . $row['kodebuku'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fas fa-trash'></i> Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data buku.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
