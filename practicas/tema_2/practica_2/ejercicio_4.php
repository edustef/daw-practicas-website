<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
<?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-6 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  include_once("ejercicio_4/dictionary.php");
  $allWords = array_merge($word_list_en, $word_list_es);
  $randomWord = $allWords[rand(0, count($allWords) - 1)];

  function getIndexOfWord($word, $dictionary)
  {
    for ($i = 0; $i < count($dictionary); $i++) {
      if ($dictionary[$i] == $word) {
        return $i;
      }
    }

    return -1;
  }

  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <div class="box">
      <?php
      echo '<p>Word provided: ' . $randomWord . '</p>';

      $wordIndex = getIndexOfWord($randomWord, $word_list_en);
      if ($wordIndex != -1) {
        echo '<p>Word translated in spanish: ' . $word_list_es[$wordIndex] . '</p>';
      } else {
        $wordIndex = getIndexOfWord($randomWord, $word_list_es);
        if ($wordIndex != -1) {
          echo '<p>Word translated in english: ' . $word_list_en[$wordIndex] . '</p>';
        }
      }
      ?>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>