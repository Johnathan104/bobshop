<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bobshop";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil semua gejala dari database
    $stmt = $conn->prepare("SELECT kode_gejala, nama_gejala FROM gejala");
    $stmt->execute();
    $gejalaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Diagnosis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<section class="survey-section text-center my-5" id="survey">
    <div class="container px-4 px-lg-5">
        <form id="surveyForm">
            <?php foreach ($gejalaList as $gejala): ?>
                <div class="d-flex flex-column my-3">
                    <span><?= htmlspecialchars($gejala['nama_gejala']) ?></span>
                    <div>
                        <input type="radio" name="gejala[<?= htmlspecialchars($gejala['kode_gejala']) ?>]" value="ya" id="gejala_<?= htmlspecialchars($gejala['kode_gejala']) ?>_ya">
                        <label for="gejala_<?= htmlspecialchars($gejala['kode_gejala']) ?>_ya">Yes</label>
                        <input type="radio" name="gejala[<?= htmlspecialchars($gejala['kode_gejala']) ?>]" value="tidak" id="gejala_<?= htmlspecialchars($gejala['kode_gejala']) ?>_tidak">
                        <label for="gejala_<?= htmlspecialchars($gejala['kode_gejala']) ?>_tidak">No</label>
                    </div>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
        
        <!-- Div kosong untuk menampilkan hasil -->
        <div id="result" class="mt-4"></div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#surveyForm').on('submit', function(event) {
            event.preventDefault(); // Mencegah form dari reload halaman

            $.ajax({
                url: 'diagnosis.php',
                type: 'POST',
                data: $(this).serialize(), // Mengirim semua data form
                success: function(response) {
                    $('#result').html(response); // Menampilkan hasil di dalam div #result
                },
                error: function() {
                    $('#result').html('<p class="text-danger">Terjadi kesalahan saat memproses data.</p>');
                }
            });
        });
    });
</script>
</body>
</html>


<style>
    /* Styling untuk elemen hasil */
    #result {
        margin-top: 20px;
        padding: 15px;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .result-item {
        color: #d9534f; /* Warna merah untuk teks masalah */
        font-weight: bold;
        font-size: 16px;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 6px;
        background-color: #fff0f0;
        border: 1px solid #f5c6cb;
    }

    .result-item .icon {
        margin-right: 10px;
        color: #d9534f;
        font-size: 20px;
    }
</style>