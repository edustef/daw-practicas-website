<?php
function deleteWord($word, &$dict)
{
  include('writeToDictionaryFile.php');

  if (isset($dict[$word])) {
    unset($dict[$word]);
  } else {
    $keyFound = array_search($word, $dict);
    if ($keyFound != false) {
      unset($dict[$keyFound]);
    }
  }

  writeToDictionaryFile($dict);
}
