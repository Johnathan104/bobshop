<?php
    // ini_set('display_errors', 1); 
    // ini_set('display_startup_errors', 1); 
    // error_reporting(E_ALL);
    $stmt = $conn->prepare("SELECT * FROM rules");
    $stmt->execute();
    $gejala =  $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<table class="table border-dark table-striped">
  <thead>
    <tr>
      <th scope="col">rule_id</th>
      <th scope="col">gejala_conditions</th>
      <th scope="col">masalah_id</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($gejala as $key => $value) {
            # code...
            echo "<tr>";
            echo '<th scope="row">'.$value['rule_id'].'</th>';
            echo '<td>'.$value['gejala_conditions'].'</td>';
            echo '<td>'.$value['masalah_id'].'</td>';
            echo "</tr>";
        }
    ?>   
  </tbody>
</table>