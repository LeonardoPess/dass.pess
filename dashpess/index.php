<?php
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  require('vendor/autoload.php');

  define('BASE_DIR_PANEL', __DIR__ . '/PessCode/Views/pages/');

  $app = new \PessCode\Application();
  $app->run();
