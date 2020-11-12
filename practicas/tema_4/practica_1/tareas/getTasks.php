<?php

function getTasks()
{

  $tasks = array();
  $tasksTxt = file_get_contents('tasks.txt');
  $lines = explode("\n", $tasksTxt);

  if ($lines !== false) {
    foreach ($lines as $line) {
      if ($line != '') {
        $task = explode("#", $line);
        $tasks[] = array('desc' => $task[0], 'dueDate' => $task[1], 'priority' => $task[2]);
      }
    }
  }

  return $tasks;
}
