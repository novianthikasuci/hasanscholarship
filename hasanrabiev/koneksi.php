<?php
$host = "localhost";
$user = "root";     // default XAMPP username
$pass = "";          // kosongkan kalau belum ada password
$db   = "db_beasiswa";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
} else {
    // echo "Koneksi berhasil!"; // bisa aktifkan untuk testing
}
?>