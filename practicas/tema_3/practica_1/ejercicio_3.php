<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-6 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  include_once('../../tema_2/practica_2/ejercicio_4/findWord.php');
  include('../../tema_2/practica_2/ejercicio_4/dictionary.php');
  include('../../tema_2/practica_2/ejercicio_4/getIndexOfWord.php');

  if (!isset($_SESSION['word_list_en']) && !isset($_SESSION['word_list_es'])) {
    $_SESSION['word_list_en'] = $word_list_en;
    $_SESSION['word_list_es'] = $word_list_es;
  } else {
    if (isset($_POST['new-english-word']) && isset($_POST['new-spanish-word'])) {
      $englishWord = $_POST['new-english-word'];
      $spanishWord = $_POST['new-spanish-word'];

      $indexEnglishWord = getIndexOfWord($englishWord, $_SESSION['word_list_en']);
      $indexSpanishWord = getIndexOfWord($spanishWord, $_SESSION['word_list_es']);

      if ($indexEnglishWord == -1) {
      } else {
      }
      $_SESSION['word_list_es'][] = $spanishWord;
    }
  }


  function addWordToDictionary($word, &$dictionary)
  {
    $dictionary[] = $word;
  }
  ?>
  <div class="">
    <p>Result: </p>
    <div class="box">
      <h2 class="title is-4">English - Spanish Translator</h2>
      <form class="columns" action="" method="GET">
        <div class="column is-2 field is-mobile">
          <div class="control has-icons-left has-icons-right">
            <?php
            echo '<input required name="word" value="' . (isset($_GET['word']) ? $_GET['word'] : '') . '" class="input" type="text" placeholder="Search">';
            ?>
            <span class="icon is-small is-left">
              <i class="fas fa-search"></i>
            </span>
          </div>
        </div>
        <div class="column">
          <button class="button is-primary" type="submit">Translate</button>
        </div>
      </form>
      <div>
        <?php
        if (isset($_GET['word'])) {
          $foundWord = findWord($_GET['word'], $_SESSION['word_list_en'], $_SESSION['word_list_es']);
          if (!is_null($foundWord)) {
            echo '<div class="notification is-primary is-light" style="display:flex; align-items:center">';
            echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-check"></i></span>';
            echo '<span>' . ucfirst($foundWord[0]) . ' word found: <strong>' . $foundWord[1] . '</strong></span>';
            echo '</div>';
          } else {
            echo '<div class="message is-warning is-light" style="max-width: 350px">';
            echo '  <div class="message-header"';
            echo '    <p>';
            echo '    <span class="icon is-size-4 mr-2"><i class="fas fa-exclamation-circle"></i></span>';
            echo '    <span>Word not found. </span>';
            echo '    </p>';
            echo '  </div>';
            echo '  <div class="message-body"';
            echo '      <p>Alternatively you can add a new word to the dictionary.</p>';
            echo '  </div>';
            echo '</div>';
          }
        } else {
          echo '<div class="notification is-info is-light" style="display:flex; align-items:center">';
          echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-info-circle"></i></span>';
          echo '  <span>Type a word in english or spanish and see the translation.</span>';
          echo '</div>';
        }
        echo '<button id="show-modal-btn" class="button is-primary-light">Add a new word</button>';
        echo '<pre>' . print_r($_SESSION['word_list_en'], true) . '</pre>';
        echo '<pre>' . print_r($_SESSION['word_list_es'], true) . '</pre>';
        ?>
      </div>
      <div id="add-word-modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
          <div class="box">
            <form action="" method="POST">
              <h2 class="title is-4">Add a new word</h2>
              <div class="field">
                <label class="label">Word in spanish</label>
                <div class="control">
                  <input required name="new-spanish-word" class="input" type="text" placeholder="Spanish word">
                </div>
              </div>
              <div class="field">
                <label class="label">Word in english</label>
                <div class="control">
                  <input required name="new-english-word" class="input" type="text" placeholder="English word">
                </div>
              </div>
              <button class="modla-close button is-primary" type="submit">Add word to dictionary</button>
            </form>
          </div>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
      </div>
    </div>
  </div>
</div>
<script src="ejercicio_3/popModal.js"></script>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>