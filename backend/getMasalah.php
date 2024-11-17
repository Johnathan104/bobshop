<?php
    include "../config/conn_db.php";
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM masalah WHERE id =".$id);
    $stmt->execute();
    $masalah = $stmt->fetch(PDO::FETCH_ASSOC);
    if($masalah){
        echo json_encode($masalah);
    }else{
        echo "not found";
    }
?>