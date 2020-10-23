<?php include_once(__DIR__ . "/../../../templates/header.php") ?>
<div class="block">
  <?php
  $activePageFormated = explode(".", str_replace("_", " ", $activePage))[0];
  $activePageArr = explode("/", $activePageFormated);
  ?>
  <p class="mb-6 is-italic"><?= str_replace("/", "  /  ", $activePageFormated) ?></p>
  <h1 class="title"><?= ucfirst($activePageArr[2]) ?></h1>
  <?php

  ?>
  <div class="content is-medium">
    <div class="box">
      <div style="display: flex; max-width:900px">
        <form class="" action="" method="GET" style="flex-grow: 3;">
          <div class="field has-addons">
            <div class="control is-expanded has-icons-left">
              <?php
              echo '<input required name="word" class="input" type="text" placeholder="Search">';
              ?>
              <span class="icon is-small is-left">
                <i class="fas fa-tasks"></i>
              </span>
            </div>
            <div class="control">
              <button type="submit" class="button is-primary" type="submit">Add task</button>
            </div>
          </div>
        </form>
        <button id="delete-tasks" class="ml-6 button is-danger is-light">
          <span>Clear all tasks</span>
          <span class="icon">
            <i class="fas fa-trash"></i>
          </span>
          </a>
      </div>
    </div>
  </div>
</div>
</div>
<script src="ejercicio_5/deleteTasks.js"></script>
<?php include_once(__DIR__ . "/../../../templates/footer.php") ?>