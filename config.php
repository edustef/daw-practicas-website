<?php

//Is this the production server or not?
define('PRODUCTION', false);

//Set the site URL.
if (PRODUCTION) {
  //The URL of our live website.
  define('SITE_URL', 'http://dws-practicas.herokuapp.com/');
} else {
  //The URL that we use in our development enviornment.
  define('SITE_URL', 'http://localhost/dws/practicas/');
}
