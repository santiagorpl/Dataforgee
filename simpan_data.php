<?php
include "koneksi.php";

$nama_peminjam = $_POST['nama_peminjam'];
$judul_buku = $_POST['judul_buku'];
$penulis = $_POST['penulis'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$pesan = $_POST['pesan'];

$sql = "INSERT INTO peminjaman
(nama_peminjam, judul_buku, penulis, tanggal_pinjam, pesan)
VALUES
('$nama_peminjam', '$judul_buku', '$penulis', '$tanggal_pinjam', '$pesan')";

if (mysqli_query($conn, $sql)) {

    // Setelah berhasil disimpan, pindah otomatis ke data.php
    header("Location: data.php");
    exit;

} else {

    echo "Gagal menyimpan data: " . mysqli_error($conn);

}
?>