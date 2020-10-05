<?php include_once(__DIR__ . "/../../templates/header.php") ?><div class="block">
  <h1 class="title"> Ejercicio 13</h1>
  <div class="content is-medium">
    <?php
    $queue = array();

    function addToQueue(&$queue, $n)
    {
      for ($i = 0; $i < $n; $i++) {
        array_push($queue, rand(1, 50));
      }
    }

    function removeFromQueue(&$queue, $n)
    {
      for ($i = 0; $i < $n; $i++) {
        array_pop($queue);
      }
    }

    function emptyQueue(&$queue)
    {
      $queue = array();
    }

    function printQueue($queue)
    {
      echo '<div class="box"';
      foreach ($queue as $val) {
        echo '<p>' . $val . '</p>';
      }
      echo '</div>';
    }
    ?>
    <p>Result: </p>
    <?php
    echo 'Add 5 to queue';
    addToQueue($queue, 5);
    printQueue($queue);
    echo 'Remove 2 to queue';
    removeFromQueue($queue, 2);
    printQueue($queue);
    echo 'Empty queue';
    emptyQueue($queue);
    printQueue($queue);
    ?>
  </div>
</div><?php include_once(__DIR__ . "/../../templates/footer.php") ?>