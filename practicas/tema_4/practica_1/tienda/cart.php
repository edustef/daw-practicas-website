<?php include('./templates/header.php') ?>
<style>
  /* this turns of the arrows on input number */
  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
</style>
<section class="hero is-info is-bold">
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
  <div id="cart-products-container" class="container mb-6"></div>
  <div class="level container">
    <div class="level-left">
      <div class="level-item">
        <p class="is-size-3">Total: <span id="total-price">0</span>€</p>
      </div>
    </div>
    <div class="level-right">
      <div class="level-item">
        <button class="button is-large is-primary">Confirm Purchase</button>
      </div>
    </div>
  </div>
</section>
<script src="cart.js"></script>
<?php include('./templates/footer.php') ?>