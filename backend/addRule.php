<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function sendResponse($statusCode, $message) {
    http_response_code($statusCode);
    echo json_encode(['status' => $statusCode, 'message' => $message]);

}
// Include database connection file
include "../config/conn_db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $rule_id = $_POST['rule_id'];
    $rule = $_POST['rule'];
    $rule_masalah = $_POST['rule_masalah']; // Refers to id_masalah from the dropdown


    try {
        // Insert the new rule into the database
        $sql = "INSERT INTO rules (rule_id, gejala_conditions, masalah_id) VALUES (:rule_id, :rule, :rule_masalah)";
        $stmt = $conn->prepare($sql);

        // Bind parameters to prevent SQL injection
        $stmt->bindParam(':rule_id', $rule_id);
        $stmt->bindParam(':rule', $rule);
        $stmt->bindParam(':rule_masalah', $rule_masalah);

        // Execute the statement
        $result = $stmt->execute();

        if ($result) {
            sendResponse(201, "Rule berhasil ditambahkan!");
        } else {
            sendResponse(500, "Rule tidak berhasil!");
        }
    } catch (PDOException $e) {
        sendResponse(400, "gagal, apakah rule ini memiliki kode yang sudah ada?");
    }
} else {
    sendResponse(400, "wrong method!");;
}
?>
