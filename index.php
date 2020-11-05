  <?php include_once(__DIR__ . "/templates/header.php"); ?>
  <?php

  echo '<pre>' . print_r($filesPaths, true) . '</pre>';

  function createIndexMenu($filePath, $depth = 3)
  {
    if (is_array($filePath)) {
      if ($depth == 0) {
        foreach ($filePath as $key => $value) {
          createListItem($value);
        }
      } else {
        foreach ($filePath as $key => $value) {
          $folder = str_replace('_', '-', $key);
          echo '
                <details id="' . $folder . '" class="mt-2 ml-2">
                  <summary class="menu-label">' . str_replace('-', ' ', $folder) . '</summary>
                  <ul class="menu-list">
              ';

          createMenu($value, $depth - 1);

          echo '
                    </ul>
                  </details>
                ';
        }
      }
    }

    
  }
  ?>
  <?php include_once(__DIR__ . "/templates/footer.php"); ?>