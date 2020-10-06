<?php include_once(__DIR__ . "/../../../templates/header.php") ?><div class="block">
  <h1 class="title">Practica 1 Ejercicio 12</h1>
  <div class="content is-medium">
    <?php
    $dictonary = [
      "document" => "documento",
      "word" => "palabra",
      "one" => "uno",
      "about" => "sobre",
      "all" => "todo",
      "out" => "fuera",
      "up" => "arriba",
      "down" => "abajo",
      "time" => "tiempo",
      "know" => "conozca",
      "peope" => "gente",
      "see" => "ver",
      "back" => "volver",
      "work" => "trabajo",
      "first" => "primero",
      "good" => "bueno",
      "bad" => "mal",
      "new" => "nuevo",
      "egg" => "huevo",
      "meat" => "carne"
    ];

    $allWords = array_merge(array_keys($dictonary), array_values($dictonary));
    $word = $allWords[rand(0, count($allWords) - 1)];
    $wordFound = false;

    ?>
    <p>Result: </p>
    <?php
    echo '<div class="box">';
    foreach ($dictonary as $englishWord => $spanishWord) {
      if ($englishWord == $word) {
        echo '<p>Translation for "' . $englishWord . '": </p>';
        echo '<p>' . $spanishWord . '</p>';
        $wordFound = true;
      } elseif ($spanishWord == $word) {
        echo '<p>Translation for "' . $spanishWord . '": </p>';
        echo '<p>' . $englishWord . '</p>';
        $wordFound = true;
      }
    }
    if (!$wordFound) {
      echo '<p>Word "' . $word  . '" is not in dictionary</p>';
    }
    echo '</div>';
    echo '<div class="box">';
    echo '<h3>Dictionary in Spanish in aphabetical order: </h3>';
    sort($dictonary);
    foreach ($dictonary as $englishWord => $spanishWord) {
      echo '<p>' . $spanishWord . '</p>';
    }
    echo '</div>';
    ?>
  </div>
</div><?php include_once(__DIR__ . "/../../../templates/footer.php") ?>