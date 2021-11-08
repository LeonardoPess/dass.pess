<?php

  namespace PessCode\Views;

  class MainView {
    public static function render($filename) {
      include('pages/' . $filename . '.php');
    }

    public static $roles = [
			'0' => 'Dono',
			'1' => 'Administrador'
		];

    public static function isMenuSelected($page) {
			$url = explode('/', @$_GET['url'])[0];
			return ($url == $page) ? 'selected' : '';
		}
	
		public static function isMenuAllowed($allowedTo) {
			return ($_SESSION['role'] <= $allowedTo) ? '' : 'style="display: none;"';
		}
  }
