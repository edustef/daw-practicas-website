<?php

define("PRODUCTION", "PRODUCTION");
define("PRODUCTION_TEST", "PRODUCTION_TEST");
define("LOCAL", "LOCAL");

define('SERVER_TYPE', PRODUCTION_TEST);


if ($_SERVER["SERVER_NAME"] == "localhost") {
  define('SITE_URL', 'http://' . $_SERVER["SERVER_NAME"] . '/practicas/dws/');
} else {
  define('SITE_URL', 'https://' . $_SERVER["SERVER_NAME"] . '/');
}