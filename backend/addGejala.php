<?php
include '../config/conn_db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_gejala'])) {
    $nama_gejala = $_POST['nama_gejala'] ?? '';

    if (!empty($nama_gejala)) {
        try {
            $stmt = $conn->query("SELECT COUNT(*) FROM gejala");
            $total_gejala = $stmt->fetchColumn() + 1;

            $kode_gejala = 'G' . str_pad($total_gejala, 3, '0', STR_PAD_LEFT);

            $stmt = $conn->prepare("INSERT INTO gejala (nama_gejala, kode_gejala) VALUES (:nama_gejala, :kode_gejala)");
            $stmt->bindParam(':nama_gejala', $nama_gejala);
            $stmt->bindParam(':kode_gejala', $kode_gejala);

            if ($stmt->execute()) {
                echo "Gejala berhasil ditambahkan dengan kode: $kode_gejala";
            } else {
                echo "Gagal menambahkan gejala.";
            }
        } catch (Exception $e) {
            echo "Gagal menambahkan gejala: " . $e->getMessage();
        }
    } else {
        echo "Nama gejala tidak boleh kosong.";
    }
}
?>