<?php

  namespace PessCode;

  class Application {
    private $controller;

    private function setApp() {
      $loadname = 'PessCode\Controllers\\';
      $url = explode('/', @$_GET['url']);

      $page = (!$url[0]) ? $loadname.='Home' : $loadname.=ucfirst(strtolower($url[0]));
      $page.='Controller';

      if(!file_exists(str_replace('\\', '/', $page) . '.php')) {
        header('location: ' . INCLUDE_PATH_PANEL);
        die();
      }

      $this->controller = new $page();
    }

    public function run() {
      $this->setApp();
      $this->controller->index();
    }
  }
  