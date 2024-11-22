<div class="container">
        <h1>Tambah Gejala</h1>
        <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="gejala_addBox">
        <form action="./backend/addGejala.php" method="POST">
            <div class="mb-3">
                <label for="gejala_nama" class="form-label">Nama Gejala</label>
                <input type="text" class="form-control" id="gejala_nama" name="nama_gejala" required>
            </div>
            <button type="submit" name="submit_gejala" class="btn btn-primary">Submit</button>

            </div>
        </form>
        </div>
    <div class="container">
        <h1>Tambah Masalah</h1>
        <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="masalah_addBox">
        <form action="./backend/addMasalah.php" method="POST">

            <div class="mb-3">
                <label for="masalah_nama" class="form-label">Nama Masalah</label>
                <input type="text" class="form-control" id="masalah_nama" name="nama_masalah">
            </div>

            <button type="submit" name="submit_masalah" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    <div class="container">
    <h1>Tambah Rule</h1>
    <div class="text-dark p-3 my-3 py-5 rounded" id="rules_addBox">
        <form action="./backend/addRules.php" method="POST">
            <div class="mb-3">
                <label for="rule_id" class="form-label">Rule ID</label>
                <input type="text" class="form-control" id="rule_id" name="rule_id" placeholder="Contoh: R001" required>

                <label for="gejala_conditions" class="form-label">Kondisi Gejala</label>
                <textarea class="form-control" id="gejala_conditions" name="gejala_conditions" placeholder="Contoh: G001 AND G002" required></textarea>

                <label for="masalah_id" class="form-label">Masalah yang Terkait</label>
                <select id="masalah_id" name="masalah_id" class="form-select" required>
                    <?php
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
