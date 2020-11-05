<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">

  <div class="content is-medium">
    <?php
    $lotteryNums = array();

    while (count($lotteryNums) != 7) {
      $randNum = rand(1, 99);
      if (!in_array($randNum, $lotteryNums)) {
        $lotteryNums[] = $randNum;
      }
    }

    ?>
    <p>Result: </p>
    <div class="box">
      <table class="table is-bordered" style="max-width: 600px;">
        <tr>
          <?php
          foreach ($lotteryNums as $num) {
            echo "<td>${num}</td>";
          }
          ?>
        </tr>
      </table>
    </div>
  </div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>