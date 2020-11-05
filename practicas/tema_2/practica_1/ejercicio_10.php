<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">

  <div class="content is-medium">
    <?php
    $numArr = array();
    $sumPar = 0;
    $countPar = 0;
    for ($i = 0; $i < 10; $i++) {
      $numArr[] = rand(0, 100);
    }

    ?>
    <p>Result: </p>
    <?php
    echo '<div class="box">';
    echo 'Impar numbers: ';
    foreach ($numArr as $num) {
      if ($num % 2 == 0) {
        $sumPar += $num;
        $countPar++;
      } else {
        echo $num . ", ";
      }
    }
    echo '<p>Media par: ' . $sumPar / $countPar . '</p>';
    echo '</div>';
    ?>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>