<?php
include '../config/conn_db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_masalah'])) {
    $nama_masalah = $_POST['nama_masalah'] ?? '';

    if (!empty($nama_masalah)) {
        try {
            $stmt = $conn->query("SELECT COUNT(*) FROM masalah");
            $total_masalah = $stmt->fetchColumn() + 1;

            $kode_masalah = 'M' . str_pad($total_masalah, 3, '0', STR_PAD_LEFT);

            $stmt = $conn->prepare("INSERT INTO masalah (nama_masalah, kode_masalah) VALUES (:nama_masalah, :kode_masalah)");
            $stmt->bindParam(':nama_masalah', $nama_masalah);
            $stmt->bindParam(':kode_masalah', $kode_masalah);

            if ($stmt->execute()) {
                echo "masalah berhasil ditambahkan dengan kode: $kode_masalah";
            } else {
                echo "Gagal menambahkan masalah.";
            }
        } catch (Exception $e) {
            echo "Gagal menambahkan masalah: " . $e->getMessage();
        }
    } else {
        echo "Nama masalah tidak boleh kosong.";
    }
}
?>