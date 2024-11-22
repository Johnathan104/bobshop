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
    $id = $_POST['id'];
    $gejala = $_POST['nama'];
    $event = $_POST['event']; // Refers to id_masalah from the dropdown

    if($event =="delete"){
        try {
            // SQL for deleting a record
            $sql = "DELETE FROM gejala WHERE id = :id";
            $stmt = $conn->prepare($sql);

            // Bind parameter to prevent SQL injection
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the statement
            $result = $stmt->execute();

            if ($result) {
                sendResponse(200, "Gejala berhasil dihapus!");
            } else {
                sendResponse(500, "Gejala gagal dihapus!");
            }
        } catch (PDOException $e) {
            sendResponse(400, "Terjadi kesalahan saat menghapus gejala, apakah ada gejala dengan kode itu?");
        }
    }else{
        try {
            // SQL for updating a record
            $sql = "UPDATE gejala SET nama_gejala = :nama WHERE id = :id";
            $stmt = $conn->prepare($sql);

            // Bind parameters to prevent SQL injection
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nama', $gejala, PDO::PARAM_STR);

            // Execute the statement
            $result = $stmt->execute();

            if ($result) {
                sendResponse(200, "Gejala berhasil diperbarui!");
            } else {
                sendResponse(500, "Gejala gagal diperbarui!");
            }
        } catch (PDOException $e) {
            sendResponse(400, "Terjadi kesalahan saat memperbarui gejala: " . $e->getMessage());
        }
    }
   
} else {
    sendResponse(400, "wrong method!");;
}
?>
