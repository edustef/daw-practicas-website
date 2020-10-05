<?php

//Is this the production server or not?
define('DEV_TYPE', "LOCAL");

//Set the site URL.
if (DEV_TYPE == "PRODUCTION") {
  //The URL of our live website.
  define('SITE_URL', 'https://dws-practicas.herokuapp.com/');
} elseif (DEV_TYPE == "PRODUCTION_TEST") {
  //The URL that we use in our development enviornment.
  define('SITE_URL', 'https://dws-practicas-dev.herokuapp.com/');
} else {
  define('SITE_URL', 'http://localhost/dws/practicas/');
}
