<?php
include('createTasksHTML.php');
include('getTasks.php');
include('writeTasksFile.php');

$tasks = getTasks();

// desc, fecha limite, prioridad

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'addTask') {
    addTask($tasks);
    writeTasksFile($tasks);
  } elseif ($_POST['action'] == 'clearTasks') {
    clearTasks($tasks);
    writeTasksFile($tasks);
  } elseif ($_POST['action'] == 'deleteTask') {
    deleteTask($_POST['id'], $tasks);
    writeTasksFile($tasks);
  } elseif ($_POST['action'] == 'sortTasksDesc') {
    uasort($tasks, function ($a, $b) {
      return ($a['priority'] <=> $b['priority']);
    });
  } elseif ($_POST['action'] == 'sortTasksAsc') {
    uasort($tasks, function ($a, $b) {
      return ($b['priority'] <=> $a['priority']);
    });
  } elseif ($_POST['action'] == 'filterDate') {
    filterDate($tasks, $_POST['date']);
  }
}

echo createTasksHTML($tasks);

function addTask(&$tasks)
{
  $desc = $_POST['desc'];
  $priority = $_POST['priority'];
  $dueDate = $_POST['due-date'];
  $tasks[] = array('desc' => $desc, 'dueDate' => $dueDate, 'priority' => $priority);
}

function deleteTask($id, &$tasks)
{
  unset($tasks[$id]);
  $tasks = array_values($tasks);
}

function clearTasks(&$tasks)
{
  $tasks = array();
}

function filterDate(&$tasks, $date)
{
  $tasks = array_filter($tasks, function ($task) use ($date) {
    return $task['dueDate'] == $date;
  });
}