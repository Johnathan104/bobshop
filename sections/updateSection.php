<script src="./js/update.js"></script>
<div class="container">
    <h1>Update Gejala</h1>
    <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="gejala_updateBox">
        <form method="POST" action="updateGejala">
            <div class="mb-3">
                <p class="text-dark-50">Pilih gejala</p>
                <select name="gejala_select" id="gejala_select" class="form-select" aria-label="Default select example">
                        <?php
                            $stmt = $conn->prepare("SELECT * FROM gejala");
                            $stmt->execute();
                            $masalah = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($masalah) {
                                foreach ($masalah as $key => $value) {
                                    echo "<option value= '".$value['id']."'>".$value['kode_gejala']."</option>";
                                }
                            }

                        ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="update_gejala_nama" class="form-label">Nama Gejala</label>
                <input  type="text" class="form-control" id="update_gejala_nama">
            </div>
            <button id="btnUpdateGejala" type="submit" class="btn btn-primary">Update</button>
            <button id="btnDeleteGejala" class="btn btn-danger"> Delete </button>
        </form>
    </div>
</div>
    <div class="container">
        <h1>Update Masalah</h1>
        <div class="bg-dark text-white p-3 my-3 py-5 rounded" id="masalah_updateBox">
        <form>
        <div class="mb-3">
                <p class="text-dark-50">Pilih Masalah</p>
                <select id="masalah_select" class="form-select" aria-label="Default select example">
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
            <div class="mb-3">
                <label for="update_masalah_nama" class="form-label">Nama Masalah</label>
                <input type="text" class="form-control" id="update_masalah_nama">
            </div>

            <button id="btnUpdateMasalah" type="submit" class="btn btn-primary">Update</button>
            <button id="btnDeleteMasalah"class="btn btn-danger"> Delete </button>
        </form>
        </div>
    </div>
    <div class="container">
        <h1>Update Rule</h1>
        <div class=" text-dark p-3 my-3 py-5 rounded" id="rule_updateBox">
        <form>
            <div class="mb-3">
                <p class="text-dark-50">Pilih gejala</p>
                <select id="rule_select" class="form-select" aria-label="Default select example">
                        <?php
                            $stmt = $conn->prepare("SELECT * FROM rules");
                            $stmt->execute();
                            $masalah = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($masalah) {
                                foreach ($masalah as $key => $value) {
                                    echo "<option value= '".$value['rule_id']."'>".$value['rule_id']."</option>";
                                }
                            }

                        ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="update_rule_nama" class="form-label">rule</label>
                <input type="text" class="form-control border-primary" id="update_rule_nama">
                <label for="update_rule_masalah" class="form-label">Masalah yang terkait</label>
                <select id='update_rule_masalah' class="form-select" aria-label="Default select example">
                    <option selected>M001</option>
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

            <button id="btnUpdateRule" type="submit" class="btn btn-primary">Update</button>
            <button id="btnDeleteRule" class="btn btn-danger"> Delete </button>
        </form>
        </div>
    </div>