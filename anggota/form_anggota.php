<?php
include '../koneksi.php';

$sql = "SELECT * FROM anggota";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Read Anggota</h2>
        <!-- <a href="tambah_data.php" class="btn btn-primary mb-3">Tambah Anggota Baru</a> -->
        <a href="../index.php" class="btn btn-primary mb-3">KEMBALI</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat Anggota</th>
                    <th>Telepon Anggota</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["kodeanggota"]. "</td>";
                        echo "<td>" . $row["namaanggota"]. "</td>";
                        echo "<td>" . $row["jeniskelamin"]. "</td>";
                        echo "<td>" . $row["alamatanggota"]. "</td>";
                        echo "<td>" . $row["tlpanggota"]. "</td>";
                        echo "<td>" . $row["tempatlahir"]. "</td>";
                        echo "<td>" . $row["tgllahir"]. "</td>";
                        echo "<td>
                                <a href='edit_data.php?kodeanggota=".$row["kodeanggota"]."' class='btn btn-warning btn-sm'>Edit</a> 
                                <a href='hapus_data.php?kodeanggota=".$row["kodeanggota"]."' class='btn btn-danger btn-sm'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
