<?php
    session_start();
    // Hapus semua data sesi
    session_unset();
    session_destroy();
    
    // Redirect kembali ke halaman login atau beranda
    header("Location: index.php");
    exit();
?>
