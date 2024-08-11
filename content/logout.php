<?php
// Hapus sesi jika sudah ada sesi yang aktif
if (session_status() == PHP_SESSION_ACTIVE) {
    unset($_SESSION['nama_lengkap']);
    unset($_SESSION['email']);
    unset($_SESSION['id_member']);
    session_destroy(); // Hancurkan sesi jika diperlukan
}

header("Location: index.php");
exit(); // Hentikan eksekusi setelah redirect
