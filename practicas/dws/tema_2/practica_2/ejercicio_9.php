<?php include_once(__DIR__ . "/../../../../templates/header.php") ?>
<div class="block">

  <?php

  include_once("ejercicio_9/posts.php");
  include_once("ejercicio_9/displayPost.php");

  ?>
  <div class="cotent is-medium">
    <p>Result: </p>
  </div>
  <div class="box" style="display:flex; flex-direction:column; align-items:center">
    <?php
    foreach ($posts as $post) {
      displayPost($post);
    }
    ?>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../../templates/footer.php") ?>