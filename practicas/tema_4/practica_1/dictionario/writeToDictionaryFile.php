<?php

function writeToDictionaryFile($dict)
{
  $result = '';

  foreach ($dict as $spa => $eng) {
    $result .= $spa . ', ' . $eng . "\n";
  }

  // removes last \n
  file_put_contents("dictionario/dictionary.txt", $result);
}
