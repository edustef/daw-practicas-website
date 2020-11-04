<?php include_once(__DIR__ . "/../../../../templates/header.php") ?>
<div class="block">

  <?php
  include_once('ejercicio_4/dictionary.php');
  $allWords = array_merge($word_list_en, $word_list_es);
  $randomWord = $allWords[rand(0, count($allWords) - 1)];

  include('ejercicio_4/dictionary.php');
  include_once("ejercicio_4/translateWord.php");


  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <div class="box">
      <?php
      $translatedWord = translateWord($randomWord, $word_list_en, $word_list_es);
      if (!is_null($translatedWord)) {
        echo '<p>Word provided: <strong>' . $randomWord . '</strong></p>';
        echo '<p> Word translated in ' . $translatedWord[0] . ': <strong>' . $translatedWord[1] . '</strong></p>';
      }
      ?>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../../templates/footer.php") ?>