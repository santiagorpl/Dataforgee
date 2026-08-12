<?php
include "koneksi.php";

/* =========================
   DATA STATISTIK
========================= */

/* Total peminjaman */
$query_total = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM peminjaman"
);

$total_peminjaman = mysqli_fetch_assoc($query_total)['total'];


/* Peminjaman hari ini */
$query_hari_ini = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total
     FROM peminjaman
     WHERE tanggal_pinjam = CURDATE()"
);

$peminjaman_hari_ini = mysqli_fetch_assoc($query_hari_ini)['total'];


/* Data peminjaman terbaru */
$query_terbaru = mysqli_query(
    $conn,
    "SELECT *
     FROM peminjaman
     ORDER BY id DESC
     LIMIT 5"
);
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Dashboard | BookRent</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS sendiri -->
    <link rel="stylesheet" href="style.css">

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a
            class="navbar-brand"
            href="index.php">

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


            <a
                class="nav-link d-inline"
                href="login.php">

                Login

            </a>

        </div>

    </div>

</nav>



<!-- =========================
     CONTENT
========================= -->

<div class="container">


    <!-- HERO -->

    <div class="hero">

        <h2>
            📚 Selamat Datang di BookRent
        </h2>


        <p class="text-muted">

            Kelola data buku, proses peminjaman,
            dan aktivitas perpustakaan dengan mudah
            melalui sistem BookRent.

        </p>


        <a
            href="tambah_data.php"
            class="btn btn-main">

            + Tambah Peminjaman

        </a>

    </div>



    <!-- =========================
         STATISTIK
    ========================= -->

    <div class="row mt-4">


        <!-- TOTAL PEMINJAMAN -->

        <div class="col-md-3 mb-3">

            <div class="stat-card text-center">

                <h6>
                    Total Peminjaman
                </h6>

                <div class="stat-number">

                    <?= $total_peminjaman; ?>

                </div>

            </div>

        </div>



        <!-- SEDANG DIPINJAM -->

        <div class="col-md-3 mb-3">

            <div class="stat-card text-center">

                <h6>
                    Sedang Dipinjam
                </h6>

                <div class="stat-number">

                    <?= $total_peminjaman; ?>

                </div>

            </div>

        </div>



        <!-- BUKU TERSEDIA -->

        <div class="col-md-3 mb-3">

            <div class="stat-card text-center">

                <h6>
                    Data Tersimpan
                </h6>

                <div class="stat-number">

                    <?= $total_peminjaman; ?>

                </div>

            </div>

        </div>



        <!-- HARI INI -->

        <div class="col-md-3 mb-3">

            <div class="stat-card text-center">

                <h6>
                    Peminjaman Hari Ini
                </h6>

                <div class="stat-number">

                    <?= $peminjaman_hari_ini; ?>

                </div>

            </div>

        </div>


    </div>



    <!-- =========================
         AKTIVITAS TERBARU
    ========================= -->

    <div class="activity mt-4">

        <h4>
            📌 Aktivitas Terakhir
        </h4>

        <hr>


        <ul class="list-group list-group-flush">


            <?php if (mysqli_num_rows($query_terbaru) > 0): ?>


                <?php while ($row = mysqli_fetch_assoc($query_terbaru)): ?>


                    <li class="list-group-item">

                        📚

                        <strong>
                            <?= htmlspecialchars($row['nama_peminjam']); ?>
                        </strong>

                        melakukan peminjaman buku

                        <strong>
                            "<?= htmlspecialchars($row['judul_buku']); ?>"
                        </strong>


                        <br>


                        <small class="text-muted">

                            ✍️
                            <?= htmlspecialchars($row['penulis']); ?>

                            &nbsp; • &nbsp;

                            📅
                            <?= htmlspecialchars($row['tanggal_pinjam']); ?>

                        </small>

                    </li>


                <?php endwhile; ?>


            <?php else: ?>


                <li class="list-group-item text-muted">

                    📭 Belum ada aktivitas peminjaman.

                </li>


            <?php endif; ?>


        </ul>

    </div>


</div>


</body>

</html>