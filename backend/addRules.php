<?php
include '../config/conn_db.php'; 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rule_id = $_POST['rule_id'] ?? ''; 
    $gejala_conditions = $_POST['gejala_conditions'] ?? ''; 
    $masalah_id = $_POST['masalah_id'] ?? null; 

    if (!empty($rule_id) && !empty($gejala_conditions) && !empty($masalah_id)) {
        try {
            $stmt = $conn->prepare("INSERT INTO rules (rule_id, gejala_conditions, masalah_id) VALUES (:rule_id, :gejala_conditions, :masalah_id)");
            $stmt->bindParam(':rule_id', $rule_id);
            $stmt->bindParam(':gejala_conditions', $gejala_conditions);
            $stmt->bindParam(':masalah_id', $masalah_id);

            if ($stmt->execute()) {
                echo "Rule berhasil ditambahkan!";
            } else {
                echo "Gagal menambahkan rule.";
            }
        } catch (PDOException $e) {
            echo "Kesalahan: " . $e->getMessage();
        }
    } else {
        echo "Semua field harus diisi!";
    }
}
?>
