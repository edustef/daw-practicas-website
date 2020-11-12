<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">

  <?php
  include('dictionario/translateWord.php');
  include('dictionario/findWord.php');
  include('dictionario/addWord.php');
  include('dictionario/deleteWord.php');

  $dict = array();

  $dictionaryTXT = file_get_contents('dictionario/dictionary.txt');
  $lines = explode("\n", $dictionaryTXT);
  foreach ($lines as $line) {
    $words = explode(', ', $line);
    // skip lines that are empty
    if (isset($words[1])) {
      $dict[$words[0]] = $words[1];
    }
  }

  // echo '<pre>' . print_r($dict, true) . '</pre>';

  $errors = array(
    'englishWordError' => '',
    'spanishWordError' => ''
  );

  $querySearch = '';
  $wordToDelete = '';
  $newEnglishWord = '';
  $newSpanishWord = '';
  $translatedWord = null;

  if (isset($_GET['new-english-word']) && isset($_GET['new-spanish-word'])) {
    $newEnglishWord = $_GET['new-english-word'];
    $newSpanishWord = $_GET['new-spanish-word'];
    // clear the word in search input
    $querySearch = '';

    $spanishWordExists = findWord($newSpanishWord, $dict);
    $englishWordExists = findWord($newEnglishWord, $dict);

    if (!is_null($spanishWordExists)) {
      $errors['spanishWordError'] = 'The word <strong>' . $spanishWordExists[1] . '</strong> was found in the ' . $spanishWordExists[0] . ' dictionary';
    }

    if (!is_null($englishWordExists)) {
      $errors['englishWordError'] = 'The word <strong>' . $englishWordExists[1] . '</strong> was found in the ' . $englishWordExists[0] . ' dictionary';
    }

    // if the errors are empty add the word to dictionary 
    if (!anyErrors($errors)) {
      addWord($newSpanishWord, $newEnglishWord, $dict);
    }
  } elseif (isset($_GET['word'])) {
    $querySearch = $_GET['word'];
    $translatedWord = translateWord($querySearch, $dict);
  } elseif (isset($_GET['wordToDelete'])) {
    $querySearch = '';

    $wordExists = findWord($_GET['wordToDelete'], $dict);
    $wordToDelete = $wordExists[1];
    if ($wordExists != false) {
      deleteWord($wordExists[1], $dict);
    }
  }

  function anyErrors($errors)
  {
    if ($errors['englishWordError'] == '' && $errors['spanishWordError'] == '') {
      return false;
    }

    return true;
  }

  ?>
  <div>
    <div class="box">
      <h2 class="title is-4">English - Spanish Translator</h2>

      <!-- SEARCH FORM -->
      <form class="" action="" method="GET">
        <div class="field has-addons">
          <div class="control has-icons-left">
            <?php
            echo '<input required name="word" value="' . $querySearch . '" class="input" type="text" placeholder="Search">';
            ?>
            <span class="icon is-small is-left">
              <i class="fas fa-search"></i>
            </span>
          </div>
          <div class="control">
            <button class="button is-primary" type="submit">Translate</button>
          </div>
        </div>

      </form>

      <!-- NOTIFICATIONS -->
      <div>
        <?php
        if ($querySearch != '') {
          if (!is_null($translatedWord)) {
            echo '<div class="notification is-success is-light" style="display:flex; align-items:center">';
            echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-check"></i></span>';
            echo '<span> Word <strong>' . $translatedWord[1] . '</strong> found in ' . $translatedWord[0] . ' dictionary for the word <strong>' . $querySearch . '</strong>.</span>';
            echo '<a href="?wordToDelete=' . $translatedWord[1] . '" class="ml-2 button is-small is-danger is-outlined is-rounded">';
            echo '  <span>Delete</span>';
            echo '  <span class="icon">';
            echo '    <i class="fas fa-trash-alt"></i>';
            echo '  </span>';
            echo '</a>';
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
        } elseif ($newEnglishWord != '' && !anyErrors($errors)) {
          echo '<div class="notification is-success is-light" style="display:flex; align-items:center">';
          echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-check"></i></span>';
          echo '  <span>The new english word <strong>' . $newEnglishWord . '</strong> with translation in spanish <strong>' . $newSpanishWord . '</strong> was added to the dictionary.</span>';
          echo '</div>';
        } elseif ($wordToDelete != '') {
          echo '<div class="notification is-success is-light" style="display:flex; align-items:center">';
          echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-check"></i></span>';
          echo '  <span>The word <strong>' . $wordToDelete . '</strong> and it\'s translation has been removed from the dictionary.</span>';
          echo '</div>';
        } else {
          echo '<div class="notification is-info is-light" style="display:flex; align-items:center">';
          echo '  <span class="icon is-size-4 mr-2"><i class="fas fa-info-circle"></i></span>';
          echo '  <span>Type a word in english or spanish and see the translation.</span>';
          echo '</div>';
        }

        echo '<button data-ref="add-word-modal" class="button is-primary-light">Add a new word</button>';
        echo '<button data-ref="show-dict-modal" class="ml-4 button is-light">Show dictionary</button>';
        ?>
      </div>

      <!-- MODAL ADD NEW WORD FORM -->
      <div id="add-word-modal" class="modal <?= (anyErrors($errors) ? 'is-active' : '') ?>">
        <div class="modal-background"></div>
        <div class="modal-content">
          <div class="box">
            <form action="" method="GET">
              <h2 class="title is-4">Add a new word</h2>
              <div class="field">
                <label class="label">English word: </label>
                <div class="control has-icons-right">
                  <?php
                  $isDanger = $errors['englishWordError'] != '' ? 'is-danger' : '';
                  $englishValue = anyErrors($errors) ? $newEnglishWord : '';
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
                <label class="label">Spanish word:</label>
                <div class="control has-icons-right">
                  <?php
                  $isDanger = $errors['spanishWordError'] != '' ? 'is-danger' : '';
                  $spanishValue = anyErrors($errors) ? $newSpanishWord : '';
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

      <!-- SHOW DICTIONARY MODAL -->
      <div id="show-dict-modal" class="modal <?= (anyErrors($errors) ? 'is-active' : '') ?>">
        <div class="modal-background"></div>
        <div class="modal-content">
          <div class="box content">
            <h1>Dictionary</h1>
            <table class="table is-striped is-hoverable">
              <thead>
                <tr>
                  <th>Spanish</th>
                  <th>English</th>
                </tr>
              </thead>
              <tbody>
                <?php
                ksort($dict);
                foreach ($dict as $spa => $eng) {
                  echo '
                    <tr><td>' . $spa . '</td><td>' . $eng . '</td></tr>
                  ';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
      </div>
    </div>
  </div>
</div>
<script src="dictionario/Modal.class.js"></script>
<script>
  let addWordModal = new Modal("add-word-modal");
  let showDictModal = new Modal("show-dict-modal");
</script>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>