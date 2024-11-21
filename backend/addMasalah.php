<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function sendResponse($statusCode, $message) {
    http_response_code($statusCode);
    echo json_encode(['status' => $statusCode, 'message' => $message]);

}
include "../config/conn_db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $kode_masalah = $_POST['kode_masalah'];
    $nama_masalah = $_POST['masalah_nama'];

    try {
        // Check if kode_masalah already exists
        $sql_cek = "SELECT * FROM masalah WHERE kode_masalah = :kode_masalah";
        $stmt_cek = $conn->prepare($sql_cek);
        $stmt_cek->bindParam(':kode_masalah', $kode_masalah);
        $stmt_cek->execute();

        if ($stmt_cek->rowCount() > 0) {
            sendResponse(400, "gagal, apakah masalah ini memiliki kode yang sudah ada?");;
        } else {
            // Insert new masalah
            $sql = "INSERT INTO masalah (kode_masalah, nama_masalah) VALUES (:kode_masalah, :nama_masalah)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':kode_masalah', $kode_masalah);
            $stmt->bindParam(':nama_masalah', $nama_masalah);
            $result = $stmt->execute();

            if ($result) {
                sendResponse(200, "berhasil!");;;
            } else {
                sendResponse(500, "server sedang mengalami gangguan!");;
            }
        }
    } catch (PDOException $e) {
        sendResponse(400, "terjadi kesalahan saat menambah!");;
    }
}
?>
