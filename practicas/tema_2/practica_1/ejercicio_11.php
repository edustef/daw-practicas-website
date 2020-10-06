<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <h1 class="title">Practica 1 Ejercicio 11</h1>
  <div class="content is-medium">
    <?php
    $arr = array();

    for ($i = 0; $i < 7; $i++) {
      for ($j = 0; $j < 7; $j++) {
        if ($i == $j || $i + $j == 6) {
          $arr[$i][$j] = 1;
        } else {
          $arr[$i][$j] = rand(2, 100);
        }
      }
    }
    ?>
    <p>Result: </p>
    <?php
    echo '<div class="box">';
    echo '<table class="table is-hoverable">';
    foreach ($arr as $row) {
      echo '<tr>';
      foreach ($row as $col) {
        echo '<td>' . $col . '</td>';
      }
      echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    ?>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>