<?php
    // ini_set('display_errors', 1); 
    // ini_set('display_startup_errors', 1); 
    // error_reporting(E_ALL);
    $stmt = $conn->prepare("SELECT * FROM masalah");
    $stmt->execute();
    $gejala =  $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<table class="table border-dark table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">kode_masalah</th>
      <th scope="col">nama_masalah</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($gejala as $key => $value) {
            # code...
            echo "<tr>";
            echo '<th scope="row">'.$value['id'].'</th>';
            echo '<td>'.$value['kode_masalah'].'</td>';
            echo '<td>'.$value['nama_masalah'].'</td>';
            echo "</tr>";
        }
    ?>   
  </tbody>
</table>