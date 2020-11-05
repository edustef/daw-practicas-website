<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">

  <?php
  $directionIP = "192.168.11.200";
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <p>Show IP without dot</p>
    <div class="box">
      <?php
      $directionIPArr = explode(".", $directionIP);
      foreach ($directionIPArr as $digit) {
        echo $digit . " ";
      }
      ?>
    </div>
    <p>Show IP with ::</p>
    <div class="box">
      <?php
      $directionIP = implode("::", $directionIPArr);
      echo $directionIP;
      ?>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>