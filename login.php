<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = $_POST['nama'] ?? "";
    $password = $_POST['password'] ?? "";
    $invite_code = $_POST['invite_code'] ?? "";

    // Data login admin yang sudah ditentukan sistem
    $admin_nama = "santiago";
    $admin_password = "root";
    $admin_invite_code = "2T2YN54NEQ1";

    // Cek ketiga data
    if (
        $nama === $admin_nama &&
        $password === $admin_password &&
        $invite_code === $admin_invite_code
    ) {

        // Login berhasil
        $_SESSION['admin'] = true;
        $_SESSION['nama_admin'] = $nama;

        header("Location: data.php");
        exit;

    } else {

        $error = "Nama, password, atau kode undangan salah.";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login Admin | BookRent</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body class="register-page">

    <div class="card register-card">

        <div class="card-header">

            <h2>📚 BookRent</h2>

            <p class="mb-0">
                Login Admin
            </p>

        </div>

        <div class="card-body">

            <?php if ($error !== ""): ?>

                <div class="alert alert-danger">
                    <?= htmlspecialchars($error); ?>
                </div>

            <?php endif; ?>

            <form action="login.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        placeholder="Masukkan nama"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Kode Undangan
                    </label>

                    <input
                        type="text"
                        name="invite_code"
                        class="form-control"
                        placeholder="Masukkan kode undangan"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary btn-register w-100">

                    🔐 Login Admin

                </button>

            </form>

            <div class="login-link mt-3">

                <a href="index.php">
                    ← Kembali ke Dashboard
                </a>

            </div>

        </div>

    </div>

</body>

</html>