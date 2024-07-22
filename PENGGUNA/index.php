<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location:login/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Perpustakaan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&q=80&w=1080') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            border-radius: 10px;
            color:blue;
        }
        .row {
            display: flex;
            justify-content: center;
        }
        .card {
            margin: 10px;
            border: none;
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.9); 
            text-align: center;
        }
        .card-body {
            padding: 20px;
            color:grey;
        }
        .card-icon {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .card-title {
            font-size: 1.1rem;
            margin-bottom: 15px;
            color:black;
        }
        .btn {
            width: 100%;
            font-size: 1rem;
            padding: 10px;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Dashboard Perpustakaan Pengguna</h2>
        <div class="row">
        <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-sign-out-alt card-icon text-danger"></i>
                        <h5 class="card-title">Logout</h5>
                        <p class="card-text">Keluar dari sistem.</p>
                        <a href="../login/logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-file-alt card-icon text-primary"></i>
                        <h5 class="card-title">Data peminjaman</h5>
                        <p class="card-text">Kelola master data transaksi.</p>
                        <a href="form_master.php" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-book-open card-icon text-info"></i>
                        <h5 class="card-title">Data Buku Dan anggota</h5>
                        <p class="card-text">LIHAT BUKU DAN DAPTAR ANGGOTA.</p>
                        <a href="form_buku.php" class="btn btn-info">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-book card-icon text-warning"></i>
                        <h5 class="card-title">Peminjaman</h5>
                        <p class="card-text">Formulir untuk peminjaman buku.</p>
                        <a href="pinjam.php" class="btn btn-warning">Pinjam</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-undo card-icon text-info"></i>
                        <h5 class="card-title">Pengembalian</h5>
                        <p class="card-text">Formulir untuk pengembalian buku.</p>
                        <a href="kembali.php" class="btn btn-info">Kembali</a>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</body>
</html>
