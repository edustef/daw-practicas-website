<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">

  <?php
  $nombres = array("Pepsi", "Tesla", "Nike", "Repsol", "KFC");
  function convierteNombres($nombres, $option)
  {
    $result = array();
    switch ($option) {
      case "L":
        foreach ($nombres as $nombre) {
          $result[] = strtolower($nombre);
        }
        return $result;
      case "U":
        foreach ($nombres as $nombre) {
          $result[] = strtoupper($nombre);
        }
        return $result;
      case "M":
        foreach ($nombres as $nombre) {
          $result[] = ucfirst($nombre);
        }
        return $result;
    }
  }
  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <p>Calling function with option "L"</p>
    <div class="box">
      <?= join(", ", convierteNombres($nombres, "L")); ?>
    </div>
    <p>Calling function with option "U"</p>
    <div class="box">
      <?= join(", ", convierteNombres($nombres, "U")); ?>
    </div>
    <p>Calling function with option "M"</p>
    <div class="box">
      <?= join(", ", convierteNombres($nombres, "M")); ?>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>