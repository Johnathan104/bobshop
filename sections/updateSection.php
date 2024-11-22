<script src="./js/update.js"></script>

<div class="container">
    <h1>Update Gejala</h1>
    <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="gejala_updateBox">
    <form action="./backend/updateGejala.php" method="POST">            
        <div class="mb-3">
                <p class="text-dark-50">Pilih gejala</p>
                <select id="gejala_select" name="gejala_id" class="form-select" aria-label="Default select example">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM gejala");
                    $stmt->execute();
                    $gejala = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($gejala as $value) {
                        echo "<option value='" . $value['id'] . "'>" . $value['kode_gejala'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="update_gejala_nama" class="form-label">Nama Gejala</label>
                <input type="text" class="form-control" id="update_gejala_nama" name="nama_gejala" required>
            </div>
            <button type="submit" name="update_gejala" class="btn btn-primary">Update</button>
            <button type="submit" name="delete_gejala" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

<div class="container">
    <h1>Update Masalah</h1>
    <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="masalah_updateBox">
    <form action="./backend/updateMasalah.php" method="POST">            
            <div class="mb-3">
                <p class="text-dark-50">Pilih Masalah</p>
                <select id="masalah_select" name="masalah_id" class="form-select" aria-label="Default select example">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM masalah");
                    $stmt->execute();
                    $masalah = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($masalah as $value) {
                        echo "<option value='" . $value['id'] . "'>" . $value['kode_masalah'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="update_masalah_nama" class="form-label">Nama Masalah</label>
                <input type="text" class="form-control" id="update_masalah_nama" name="nama_masalah" required>
            </div>
            <button type="submit" name="update_masalah" class="btn btn-primary">Update</button>
            <button type="submit" name="delete_masalah" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

<div class="container">
    <h1>Update Rule</h1>
    <div class="text-dark p-3 my-3 py-5 rounded" id="rule_updateBox">
    <form action="./backend/updateRules.php" method="POST">            
            <div class="mb-3">
                <p class="text-dark-50">Pilih Rule</p>
                <select id="rule_select" name="rule_id" class="form-select" aria-label="Default select example">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM rules");
                    $stmt->execute();
                    $rules = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rules as $value) {
                        echo "<option value='" . $value['rule_id'] . "'>" . $value['rule_id'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="update_rule_nama" class="form-label">Rule</label>
                <input type="text" class="form-control" id="update_rule_nama" name="gejala_conditions" required>

                <label for="update_rule_masalah" class="form-label">Masalah yang Terkait</label>
                <select id="update_rule_masalah" name="masalah_id" class="form-select" aria-label="Default select example" required>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM masalah");
                    $stmt->execute();
                    $masalah = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($masalah as $value) {
                        echo "<option value='" . $value['id'] . "'>" . $value['kode_masalah'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="update_rule" class="btn btn-primary">Update</button>
            <button type="submit" name="delete_rule" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>