<?php include('./templates/header.php') ?>
<section class="hero is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Cart
      </h1>
      <h2 class="subtitle">
        Buy what you need at an affordable price
      </h2>
    </div>
  </div>
</section>
<section class="section">
  <div id="cart-products-container" class="container"></div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    getCartProducts();
  });
</script>
<?php include('./templates/footer.php') ?>