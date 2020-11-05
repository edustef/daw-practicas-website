<?php

if ($_SERVER["SERVER_NAME"] == "localhost") {
  define('SITE_URL', 'http://' . $_SERVER["SERVER_NAME"] . '/practicas/dws/');
} else {
  define('SITE_URL', 'https://' . $_SERVER["SERVER_NAME"] . '/');
}

// define folder with practicas depth
define('FOLDER_DEPTH', 2);
