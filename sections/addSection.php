<script src="./js/add.js"></script>
<div class="container">
        <h1>Tambah Gejala</h1>
        <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="gejala_addBox">
            <form id="addGejalaForm" method="POST" action="./backend/addGejala.php">
                <div class="mb-3">
                    <label for="gejala_kode" class="form-label">Kode Gejala</label>
                    <input type="text" class="form-control" name="gejala_kode" id="gejala_kode">
                </div>
                <div class="mb-3">
                    <label for="gejala_nama" class="form-label">Nama Gejala</label>
                    <input type="text" class="form-control" name="gejala_nama" id="gejala_nama">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    <div class="container">
        <h1>Tambah Masalah</h1>
        <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="masalah_addBox">
        <form method="POST" action="./backend/addMasalah.php" id="addMasalahForm">
            <div class="mb-3">
                <label for="kode_masalah" class="form-label">Kode Masalah</label>
                <input type="text" class="form-control" name="kode_masalah" id="kode_masalah">
            </div>
            <div class="mb-3">
                <label for="masalah_nama" class="form-label">Nama Masalah</label>
                <input type="text" class="form-control" name="masalah_nama" id="masalah_nama">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
    </div>
    <div class="container">
        <h1>Tambah Rule</h1>
        <div class=" text-dark p-3 my-3 py-5 rounded" id="rules_addBox">
        <form method="POST" action="./backend/addRule.php" id="addRuleForm">
            <div class="mb-3">
                <label for="rule_id" class="form-label">Rule ID</label>
                <input type="text" class="form-control" name="rule_id" id="rule_id">
            </div>
            <div class="mb-3">
                <label for="rule" class="form-label">Rule</label>
                <input type="text" class="form-control" name="rule" id="rule">
            </div>
            <div class="mb-3">
                <label for="rule_masalah" class="form-label">Masalah yang Terkait</label>
                <select name="rule_masalah" class="form-select" id="problem_select" aria-label="Default select example">
                    <?php
                        // Ensure a valid $conn database connection
                        $stmt = $conn->prepare("SELECT * FROM masalah");
                        $stmt->execute();
                        $masalah = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($masalah) {
                            foreach ($masalah as $value) {
                                echo "<option value='" . $value['id'] . "'>" . $value['kode_masalah'] . "</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
    </div>