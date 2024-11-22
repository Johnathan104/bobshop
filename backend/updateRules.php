<?php
include '../config/conn_db.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rule_id = $_POST['rule_id']; 
    $gejala_conditions = $_POST['gejala_conditions']; 
    $masalah_id = $_POST['masalah_id']; 

    if (!empty($rule_id) && !empty($gejala_conditions) && !empty($masalah_id)) {
        try {
            $stmt = $conn->prepare("UPDATE rules SET gejala_conditions = :gejala_conditions, masalah_id = :masalah_id WHERE rule_id = :rule_id");
            $stmt->bindParam(':gejala_conditions', $gejala_conditions);
            $stmt->bindParam(':masalah_id', $masalah_id);
            $stmt->bindParam(':rule_id', $rule_id);

            if ($stmt->execute()) {
                echo "Rule berhasil diperbarui!";
            } else {
                echo "Gagal memperbarui rule.";
            }
        } catch (PDOException $e) {
            echo "Kesalahan: " . $e->getMessage();
        }
    } else {
        echo "Semua field harus diisi!";
    }
}
?>
