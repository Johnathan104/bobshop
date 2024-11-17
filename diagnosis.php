<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bobshop";
ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $problems_found = false;
    $userGejala = $_POST['gejala'] ?? [];

    $userGejalaYes = array_keys(array_filter($userGejala, fn($val) => $val === 'ya'));

    // Konversi pilihan pengguna menjadi format yang sesuai dengan kondisi rules
    $userGejalaStr = implode(" AND ", $userGejalaYes);
    

    // Ambil rules yang sesuai
    $stmt = $conn->prepare("SELECT * FROM rules");
    $stmt->execute();
    $rule = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($rule) {
        foreach ($rule as $key => $value) {
            // mengubah gejala dari string menjadi array
            $conditionArray = explode(" AND ", $value['gejala_conditions']);
            // nilai tujuan dari counter, yang menghitung gejala yang ditemukan
            $mustFind= sizeof($conditionArray);
            // counter buat ngitung gejala yang ditemukan sesuai dengan conditionArray
            $found=0;
            //cek semua setiap gejala yang ada pada condition Array, dan cek jika 
            // gejala itu ada di gejala yang dikasih user apa tidak
            foreach($conditionArray as $conditionkey => $conditionvalue){
                if(str_contains($userGejalaStr, $conditionvalue)){
                         $found++;
                    }
            }
            // jika semua gejala ketemu, display gejala tersebut
            if($found != 0){
                $problems_found=true;
                // Jika rule ditemukan, ambil nama masalah
                $stmt = $conn->prepare("SELECT nama_masalah FROM masalah WHERE id = :masalah_id");
                $stmt->bindParam(':masalah_id', $value['masalah_id']);
                $stmt->execute();
                $masalah = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<div class='w-auto rounded text-white container bg-dark py-3 mb-2'>";
                echo "<p>Masalah yang terdeteksi: " . htmlspecialchars($masalah['nama_masalah']) . "</p>";
                echo "<p>memiliki kemungkinan: " . htmlspecialchars(round($found/$mustFind*100, 2)) ."%</p>";
                echo "</div>";

            }
        }
    } else {
        echo "<h3 style='font-size: 1.5em; color: blue;'>{rule base kosong.}</h3>";
    }
    if(!$problems_found){
        echo "<h3 style='font-size: 1.5em; color: blue;'>{Tidak ditemukan masalah yang sesuai dengan gejala yang dipilih.}</h3>";
    }
} catch(PDOException $e) {
    echo "<p style='font-size: 1.5em; color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>