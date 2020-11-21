<?php

function writeTasksFile($tasks)
{
  $result = "";
  foreach ($tasks as $task) {
    $result .= $task['desc'] . '#' . $task['dueDate'] . '#' . $task['priority'] . "\n";
  }

  file_put_contents('tasks.txt', $result);
}
