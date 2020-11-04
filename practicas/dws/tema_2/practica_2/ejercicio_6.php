<?php include_once(__DIR__ . "/../../../../templates/header.php") ?>
<div class="block">

  <?php
  include("ejercicio_6/caesar_reverse_encrypt_decrypt.php");

  $phrase = "    This is a string       ";
  $clave = 3;

  $phraseEncrypted = CaReEncrypt($phrase, $clave);
  $phraseDecrypted = CaReDecrypt($phraseEncrypted, $clave);

  ?>
  <div class="content is-medium">
    <p>Result: </p>
    <p>Encrypting the string: <?= '<strong> ' . $phrase . '</strong>' . ' with key: ' . '<strong>' . $clave . '</strong>' ?></p>
    <div class="box">
      <?= $phraseEncrypted ?>
    </div>
    <p>Decrypting the string: <?= '<strong>' . $phraseEncrypted . '</strong>' . ' with key: ' . '<strong>' . $clave . '</strong>' ?></p>
    <div class="box">
      <?= $phraseDecrypted ?>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . "/../../../../templates/footer.php") ?>