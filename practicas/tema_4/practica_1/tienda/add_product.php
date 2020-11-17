<?php
include('./templates/header.php');
?>
<section class="hero is-warning is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Add a new item
      </h1>
      <h2 class="subtitle">
        Add your product to our store
      </h2>
    </div>
  </div>
</section>
<section class="section container is-max-desktop">
  <form id="add-product-form" method="POST" enctype="multipart/form-data">
    <div class="field">
      <label for="title" class="label">Product name</label>
      <div class="control">
        <input name="product-name" class="input" type="text" placeholder="Product name">
      </div>
    </div>

    <div class="field">
      <label class="label">Price</label>
      <div class="control has-icons-left has-icons-right">
        <input name="desc" class="input" type="number" placeholder="Your price">
        <span class="icon is-small is-left">
          <i class="fas fa-euro-sign"></i>
        </span>
      </div>
    </div>

    <div class="file has-name my-4">
      <label class="file-label">
        <input class="file-input" type="file" name="image-file" enctype="multipart/form-data">
        <span class="file-cta">
          <span class="file-icon">
            <i class="fas fa-upload"></i>
          </span>
          <span class="file-label">
            Choose a file…
          </span>
        </span>
        <span class="file-name">
          No file selected
        </span>
      </label>
    </div>

    <div class="field">
      <label class="label">Description</label>
      <div class="control">
        <textarea class="textarea" placeholder="Textarea"></textarea>
      </div>
    </div>

    <div class="field is-grouped">
      <div class="control">
        <button type="submit" class="button is-link">Submit</button>
      </div>
      <div class="control">
        <button type="reset" class="button is-link is-light">Cancel</button>
      </div>
    </div>
  </form>
</section>
<script src="add_product.js"></script>
<?php include('./templates/footer.php') ?>