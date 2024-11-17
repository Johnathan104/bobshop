<?php
    // ini_set('display_errors', 1); 
    // ini_set('display_startup_errors', 1); 
    // error_reporting(E_ALL);
    $stmt = $conn->prepare("SELECT * FROM gejala");
    $stmt->execute();
    $gejala =  $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<table class="table border-dark table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">kode_gejala</th>
      <th scope="col">nama_gejala</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($gejala as $key => $value) {
            # code...
            echo "<tr>";
            echo '<th scope="row">'.$value['id'].'</th>';
            echo '<td>'.$value['kode_gejala'].'</td>';
            echo '<td>'.$value['nama_gejala'].'</td>';
            echo "</tr>";
        }
    ?>   
  </tbody>
</table>