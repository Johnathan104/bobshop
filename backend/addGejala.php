<?php

include "../config/conn_db.php";
function sendResponse($statusCode, $message) {
    http_response_code($statusCode);
    echo json_encode(['status' => $statusCode, 'message' => $message]);

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $gejala_nama = $_POST['gejala_nama'];
    $kode_gejala = $_POST['gejala_kode'];

    // Cek apakah kode gejala sudah ada
    $sql_cek = "SELECT * FROM gejala WHERE kode_gejala = '$kode_gejala'";
    $stmt_cek = $conn->prepare($sql_cek);
    $stmt_cek->execute();
    $result = $stmt_cek->fetchAll();
    try{
    if ($result->num_rows > 0) {
        sendResponse(400, "Kode gejala sudah ada. Silakan gunakan kode yang berbeda.");
    } else {
        // Jika kode belum ada, lanjutkan insert
        $sql = "INSERT INTO gejala (kode_gejala, nama_gejala) VALUES ('$kode_gejala', '$gejala_nama')";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            sendResponse(200, "Gejala added successfully! ");
        } else {
            sendResponse(500, "Error: " );
        }
    }}catch (PDOException $e) {
        sendResponse(400, "gagal, apakah gejala ini memiliki kode yang sudah ada?");
    }

}

?>