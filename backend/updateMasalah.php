<?php
include '../config/conn_db.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $masalah_id = $_POST['masalah_id']; 
    $nama_masalah = $_POST['nama_masalah'];

    if (!empty($masalah_id) && !empty($nama_masalah)) {
        try {
            $stmt = $conn->prepare("UPDATE masalah SET nama_masalah = :nama_masalah WHERE id = :masalah_id");
            $stmt->bindParam(':nama_masalah', $nama_masalah);
            $stmt->bindParam(':masalah_id', $masalah_id);

            if ($stmt->execute()) {
                echo "Masalah berhasil diperbarui!";
            } else {
                echo "Gagal memperbarui masalah.";
            }
        } catch (PDOException $e) {
            echo "Kesalahan: " . $e->getMessage();
        }
    } else {
        echo "Semua field harus diisi!";
    }
}
?>
