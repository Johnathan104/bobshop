<?php
include './config/db.php'; // Sesuaikan nama file konfigurasi database Anda
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_gejala'])) {
    $nama_gejala = $_POST['gejala_nama'];

    if (!empty($nama_gejala)) {
        $stmt = $conn->prepare("INSERT INTO gejala (nama_gejala) VALUES (:nama_gejala)");
        $stmt->bindParam(':nama_gejala', $nama_gejala);
        if ($stmt->execute()) {
            echo "Gejala berhasil ditambahkan!";
        } else {
            echo "Gagal menambahkan gejala.";
        }
    } else {
        echo "Nama gejala tidak boleh kosong.";
    }
}
?>

<div class="container">
        <h1>Tambah Gejala</h1>
        <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="gejala_addBox">
        <form action="./backend/addGejala.php" method="POST">
            <div class="mb-3">
                <label for="gejala_nama" class="form-label">Nama Gejala</label>
                <input type="text" class="form-control" id="gejala_nama">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </form>
        </div>
    <div class="container">
        <h1>Tambah Masalah</h1>
        <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="masalah_addBox">
        <form>

            <div class="mb-3">
                <label for="masalah_nama" class="form-label">Nama Masalah</label>
                <input type="text" class="form-control" id="masalah_nama">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    <div class="container">
        <h1>Tambah Rule</h1>
        <div class=" text-dark p-3 my-3 py-5 rounded" id="rules_addBox">
        <form>

            <div class="mb-3">
            
                <label for="rule" class="form-label">rule</label>
                <input type="text" class="form-control "  id="rule">
                <label for="rule_masalah" class="form-label">Masalah yang terkait</label>
                <select id="problem_select"class="form-select" aria-label="Default select example">
                    <?php
                         $stmt = $conn->prepare("SELECT * FROM masalah");
                         $stmt->execute();
                         $masalah = $stmt->fetchAll(PDO::FETCH_ASSOC);
                         if ($masalah) {
                            foreach ($masalah as $key => $value) {
                                echo "<option value= '".$value['id']."'>".$value['kode_masalah']."</option>";
                            }
                        }

                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>