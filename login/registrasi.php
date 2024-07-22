<?php
include('../koneksi.php');
// session_start(); // Mulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $pasword = md5($_POST['pasword']); // Menggunakan MD5 untuk hashing pasword
    $role = 'user'; // Default role

    $sql = "INSERT INTO user (nama, email, nim, prodi, pasword, role) VALUES ('$nama', '$email', '$nim', '$prodi', '$pasword', '$role')";

    if ($koneksi->query($sql) === TRUE) {
        // Setelah registrasi berhasil, langsung login
        $last_id = $koneksi->insert_id;
        $_SESSION['user_id'] = $last_id;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        
        header("Location: ../login/login.php"); // Ganti dengan halaman setelah login
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Registrasi</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nama: <input type="text" name="nama" required><br>
            Email: <input type="email" name="email" required><br>
            NIM: <input type="text" name="nim" required><br>
            Prodi: <input type="text" name="prodi" required><br>
            Password: <input type="password" name="pasword" required><br>
            <!-- <select name="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br>  -->

            <input type="submit" name="Register" value="Register">
        </form>
        <p>Sudah punya akun? <a href="../login/login.php">Login disini</a></p>
    </div>
</body>
</html>
