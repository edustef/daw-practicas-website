<?php

define("PRODUCTION", "PRODUCTION");
define("PRODUCTION_TEST", "PRODUCTION_TEST");
define("LOCAL", "LOCAL");

define('SERVER_TYPE', PRODUCTION);

//Set the site URL.
if (SERVER_TYPE == PRODUCTION) {
  //The URL of our live website.
  define('SITE_URL', 'https://dws-practicas.herokuapp.com/');
} elseif (SERVER_TYPE == PRODUCTION_TEST) {
  //The URL that we use in our development enviornment.
  define('SITE_URL', 'https://dws-practicas-dev.herokuapp.com/');
} elseif (SERVER_TYPE == LOCAL) {
  define('SITE_URL', 'http://localhost/dws/practicas/');
}
