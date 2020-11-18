<?php
include('./templates/header.php');


?>
<section class="hero is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Products
      </h1>
      <h2 class="subtitle">
        Buy what you need at an affordable price
      </h2>
    </div>
  </div>
</section>
<section class="section">
  <?php
  if (isset($_GET['successPost'])) {
    echo '
      <div class="level container box notification is-primary p-4">
        <div class="level-left">
          <button class="delete mr-4"></button> Posted added succesfully
        </div>
      </div>';
  }
  ?>
  <div id="products-container" class="container"></div>
</section>
<script src="index.js"></script>
<?php include('./templates/footer.php') ?>