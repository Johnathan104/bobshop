<?php
include '../config/conn_db.php'; 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gejala_id = $_POST['gejala_id']; 
    $nama_gejala = $_POST['nama_gejala']; 

    if (!empty($gejala_id) && !empty($nama_gejala)) {
        try {      
            $stmt = $conn->prepare("UPDATE gejala SET nama_gejala = :nama_gejala WHERE id = :gejala_id");
            $stmt->bindParam(':nama_gejala', $nama_gejala);
            $stmt->bindParam(':gejala_id', $gejala_id);

            if ($stmt->execute()) {
                echo "Gejala berhasil diperbarui!";
            } else {
                echo "Gagal memperbarui gejala.";
            }
        } catch (PDOException $e) {
            echo "Kesalahan: " . $e->getMessage();
        }
    } else {
        echo "Semua field harus diisi!";
    }
}
?>
