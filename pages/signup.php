<<<<<<< HEAD
<?php
include '../config/conn_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "Signup successful!";
        header("Location: ../index.php"); // Redirect ke halaman utama setelah signup berhasil
        exit();
    } else {
        echo "Error: Could not execute the query.";
    }
}
?>
=======
<?php
include '../config/conn_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "Signup successful!";
        header("Location: ../index.php"); // Redirect ke halaman utama setelah signup berhasil
        exit();
    } else {
        echo "Error: Could not execute the query.";
    }
}
?>
>>>>>>> accccec839be48e0e0ebde625c829670f98ec6b1
