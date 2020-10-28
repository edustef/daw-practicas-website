<?php
include('header.php');
include('products/products.php');
include('products/getProducts.php');
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
  <div class="container">
    <?= getProducts($products) ?>
  </div>
</section>
<?php include('footer.php') ?>