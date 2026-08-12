<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Peminjaman | BookRent</title>

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
                <a class="nav-link d-inline" href="index.php">
                    Dashboard
                </a>

                <a class="nav-link d-inline" href="data.php">
                    Data Buku
                </a>

                <a class="nav-link d-inline" href="login.php">
                    Login
                </a>
            </div>

        </div>
    </nav>


    <!-- Form -->
    <div class="container mt-5">

        <div class="card card-form">

            <div class="card-header">
                <h3 class="mb-0">
                    📚 Tambah Peminjaman Buku
                </h3>
            </div>

            <div class="card-body p-4">

                <form action="simpan_data.php" method="POST">

                    <!-- Nama Peminjam -->
                    <div class="mb-3">
                        <label for="nama_peminjam" class="form-label">
                            Nama Peminjam
                        </label>

                        <input
                            type="text"
                            id="nama_peminjam"
                            name="nama_peminjam"
                            class="form-control"
                            placeholder="Masukkan nama peminjam"
                            required>
                    </div>


                    <!-- Judul Buku -->
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">
                            Judul Buku
                        </label>

                        <input
                            type="text"
                            id="judul_buku"
                            name="judul_buku"
                            class="form-control"
                            placeholder="Masukkan judul buku"
                            required>
                    </div>


                    <!-- Penulis -->
                    <div class="mb-3">
                        <label for="penulis" class="form-label">
                            Penulis
                        </label>

                        <input
                            type="text"
                            id="penulis"
                            name="penulis"
                            class="form-control"
                            placeholder="Masukkan nama penulis"
                            required>
                    </div>


                    <!-- Tanggal Pinjam -->
                    <div class="mb-3">
                        <label for="tanggal_pinjam" class="form-label">
                            Tanggal Pinjam
                        </label>

                        <input
                            type="date"
                            id="tanggal_pinjam"
                            name="tanggal_pinjam"
                            class="form-control"
                            required>
                    </div>


                    <!-- Pesan -->
                    <div class="mb-4">
                        <label for="pesan" class="form-label">
                            Pesan
                        </label>

                        <textarea
                            id="pesan"
                            name="pesan"
                            class="form-control"
                            rows="4"
                            placeholder="Masukkan pesan jika ada"></textarea>
                    </div>


                    <!-- Tombol -->
                    <div class="d-grid gap-2">

                        <button
                            type="submit"
                            class="btn btn-save">
                            💾 Simpan Peminjaman
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>