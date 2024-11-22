<?php
// Enable error reporting for debugging


// Include database connection file
include "../config/conn_db.php";

function sendResponse($status, $message) {
    http_response_code($status);
    echo json_encode(["message" => $message]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $id = $_POST['id']; // The rule_id for update or delete
    $gejala_conditions = $_POST['gejala_conditions']; // Updated rule conditions
    $id_masalah = $_POST['id_masalah']; // Associated id_masalah
    $event = $_POST['event']; // Determines the type of operation

    if ($event === "update") {
        try {
            // SQL for updating a rule
            $sql = "UPDATE rules 
                    SET gejala_conditions = :gejala_conditions, masalah_id = :id_masalah 
                    WHERE rule_id = :id";
            $stmt = $conn->prepare($sql);

            // Bind parameters to prevent SQL injection
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':gejala_conditions', $gejala_conditions, PDO::PARAM_STR);
            $stmt->bindParam(':id_masalah', $id_masalah, PDO::PARAM_INT);

            // Execute the statement
            $result = $stmt->execute();

            if ($result) {
                sendResponse(200, "Rule berhasil diperbarui!");
            } else {
                sendResponse(500, "Rule gagal diperbarui!");
            }
        } catch (PDOException $e) {
            sendResponse(400, "Terjadi kesalahan saat memperbarui rule: " . $e->getMessage());
        }
    } elseif ($event === "delete") {
        try {
            // SQL for deleting a rule
            $sql = "DELETE FROM rules WHERE rule_id = '".$id."'";
            $stmt = $conn->prepare($sql);

            // Bind parameters to prevent SQL injection

            // Execute the statement
            $result = $stmt->execute();

            if ($result) {
                sendResponse(200, "Rule berhasil dihapus!");
            } else {
                sendResponse(500, "Rule gagal dihapus!");
            }
        } catch (PDOException $e) {
            sendResponse(400, "pada ".$id." Terjadi kesalahan saat menghapus rule: " . $e->getMessage());
        }
    } else {
        sendResponse(400, "Event tidak valid!");
    }
} else {
    sendResponse(405, "Invalid request method.");
}
?>
