<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-6 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php
  include('../../tema_2/practica_2/ejercicio_4/dictionary.php');
  include('../../tema_2/practica_2/ejercicio_4/getIndexOfWord.php');
  include('../../tema_2/practica_2/ejercicio_4/translateWord.php');
  include('ejercicio_3/findWord.php');

  // session_destroy();
  $errors = array(
    'englishWordError' => '',
    'spanishWordError' => ''
  );

  $newEnglishWord = '';
  $newSpanishWord = '';

  // create the dictionaries if they dont exist
  if (!isset($_SESSION['dict'])) {
    $_SESSION['dict'] = array_combine($word_list_en, $word_list_es);
  } else {
    // add words to the lists if they don't exist already 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new-english-word']) && isset($_POST['new-spanish-word'])) {
      $newEnglishWord = $_POST['new-english-word'];
      $newSpanishWord = $_POST['new-spanish-word'];
      // clear the word in search input
      $_GET['word'] = null;

      $spanishWordExists = findWord($newSpanishWord, $_SESSION['dict']);
      $englishWordExists = findWord($newEnglishWord, $_SESSION['dict']);

      if (!is_null($spanishWordExists)) {
        if ($spanishWordExists[0] == 'spanish') {
          $errors['spanishWordError'] = 'The word <strong>' . $spanishWordExists[1] . '</strong> was found in the spanish dictionary';
        } else {
          $errors['spanishWordError'] = 'The word <strong>' . $spanishWordExists[1] . '</strong> was found in the english dictionary';
        }
      }

      if (!is_null($englishWordExists)) {
        if ($englishWordExists[0] == 'english') {
          $errors['englishWordError'] = 'The word <strong>' . $englishWordExists[1] . '</strong> was found in the english dictionary';
        } else {
          $errors['englishWordError'] = 'The word <strong>' . $englishWordExists[1] . '</strong> was found in the spanish dictionary';
        }
      }

      if ($errors['englishWordError'] == '' && $errors['spanishWordError'] == '') {
        $_SESSION['dict'][$newEnglishWord] = $newSpanishWord;
      }
    }
  }

  ?>
  <div>
    <div class="box">
      <h2 class="title is-4">English - Spanish Translator</h2>

      <!-- SEARCH FORM -->
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

      <!-- NOTIFICATIONS -->
      <div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['word'])) {
          $translatedWord = translateWord($_GET['word'], array_keys($_SESSION['dict']), array_values($_SESSION['dict']));
          if (!is_null($translatedWord)) {
            echo '<div class="notification is-success is-light" style="display:flex; align-items:center">';
            echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-check"></i></span>';
            echo '<span> Word <strong>' . $translatedWord[1] . '</strong> found in ' . $translatedWord[0] . ' dictionary for the word <strong>' . $_GET['word'] . '</strong>.</span>';
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
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !is_null($newEnglishWord)) {
          echo '<div class="notification is-success is-light" style="display:flex; align-items:center">';
          echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-check"></i></span>';
          echo '  <span>The new english word <strong>' . $newEnglishWord . '</strong> with translation in spanish <strong>' . $newSpanishWord . '</strong> was added to the dictionary.</span>';
          echo '</div>';
        } else {
          echo '<div class="notification is-info is-light" style="display:flex; align-items:center">';
          echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-info-circle"></i></span>';
          echo '  <span>Type a word in english or spanish and see the translation.</span>';
          echo '</div>';
        }

        echo '<button id="show-modal-btn" class="button is-primary-light">Add a new word</button>';
        ?>
      </div>

      <!-- MODAL ADD NEW WORD FORM -->
      <div id="add-word-modal" class="modal <?= ($errors['englishWordError'] != '' || $errors['spanishWordError'] != '' ? 'is-active' : '') ?>">
        <div class="modal-background"></div>
        <div class="modal-content">
          <div class="box">
            <form action="" method="POST">
              <h2 class="title is-4">Add a new word</h2>
              <div class="field">
                <label class="label">Word in english</label>
                <div class="control has-icons-right">
                  <?php
                  $isDanger = $errors['englishWordError'] != '' ? 'is-danger' : '';
                  $englishValue = $isDanger != '' ? $newEnglishWord : '';
                  ?>
                  <input required name="new-english-word" value="<?= $englishValue ?>" class="input <?= $isDanger ?>" type="text" placeholder="English word">
                  <?php
                  if ($errors['englishWordError'] != '') {
                    echo '<span class="icon is-small is-right">';
                    echo '<i class="fas fa-exclamation-triangle"></i>';
                    echo '</span>';
                  }
                  ?>
                </div>
                <p class="help is-danger"><?= $errors['englishWordError'] ?></p>
              </div>
              <div class="field">
                <label class="label">Word in spanish</label>
                <div class="control has-icons-right">
                  <?php
                  $isDanger = $errors['spanishWordError'] != '' ? 'is-danger' : '';
                  $spanishValue = $isDanger != '' ? $newSpanishWord : '';
                  ?>
                  <input required name="new-spanish-word" value="<?= $spanishValue ?>" class="input <?= $isDanger ?>" type="text" placeholder="Spanish word">
                  <?php
                  if ($errors['spanishWordError'] != '') {
                    echo '<span class="icon is-small is-right">';
                    echo '<i class="fas fa-exclamation-triangle"></i>';
                    echo '</span>';
                  }
                  ?>
                </div>
                <p class="help is-danger"><?= $errors['spanishWordError'] ?></p>
              </div>

              <button type="submit" class="button is-primary">Add word to dictionary</button>
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