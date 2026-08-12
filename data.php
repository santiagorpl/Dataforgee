<?php
session_start();

include "koneksi.php";

// Cek apakah admin sedang login
$isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] === true;

// Ambil data peminjaman
$sql = "SELECT * FROM peminjaman ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Data Peminjaman | BookRent</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a class="navbar-brand" href="index.php">
                📚 BookRent
            </a>

            <div>

                <a
                    class="nav-link d-inline"
                    href="index.php">
                    Dashboard
                </a>

                <a
                    class="nav-link d-inline"
                    href="data.php">
                    Data Buku
                </a>

                <?php if ($isAdmin): ?>

                    <!-- Kalau admin sudah login -->
                    <a
                        class="nav-link d-inline"
                        href="logout.php">
                        Logout
                    </a>

                <?php else: ?>

                    <!-- Kalau belum login -->
                    <a
                        class="nav-link d-inline"
                        href="login.php">
                        Login
                    </a>

                <?php endif; ?>

            </div>

        </div>

    </nav>


    <!-- Content -->

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2>
                    📚 Data Peminjaman
                </h2>

                <p class="text-muted">
                    Daftar peminjaman buku yang tersimpan di database.
                </p>

            </div>


            <a
                href="tambah_data.php"
                class="btn btn-primary">

                + Tambah Peminjaman

            </a>

        </div>


        <!-- Tabel -->

        <div class="card">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>
                                    Nama Peminjam
                                </th>

                                <th>
                                    Judul Buku
                                </th>

                                <th>
                                    Penulis
                                </th>

                                <th>
                                    Tanggal Pinjam
                                </th>

                                <th>
                                    Pesan
                                </th>

                                <th>Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php if (mysqli_num_rows($result) > 0): ?>

                                <?php $no = 1; ?>


                                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                                    <tr>

                                        <td>
                                            <?= $no++; ?>
                                        </td>


                                        <td>
                                            <?= htmlspecialchars($row['nama_peminjam']); ?>
                                        </td>


                                        <td>
                                            <?= htmlspecialchars($row['judul_buku']); ?>
                                        </td>


                                        <td>
                                            <?= htmlspecialchars($row['penulis']); ?>
                                        </td>


                                        <td>
                                            <?= htmlspecialchars($row['tanggal_pinjam']); ?>
                                        </td>


                                        <td>

                                            <?php if ($isAdmin): ?>

                                                <!-- ADMIN BISA MELIHAT PESAN -->

                                                <?= htmlspecialchars($row['pesan']); ?>
                                        <td>

                                            <a
                                                href="hapus_data.php?id=<?= $row['id']; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">

                                                🗑 Hapus

                                            </a>

                                        </td>

                                    <?php else: ?>

                                        <!-- PENGGUNA BIASA -->

                                        *****

                                    <?php endif; ?>

                                    </td>

                                    </tr>

                                <?php endwhile; ?>


                            <?php else: ?>

                                <tr>

                                    <td
                                        colspan="6"
                                        class="text-center text-muted py-4">

                                        Belum ada data peminjaman.

                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</body>

</html>