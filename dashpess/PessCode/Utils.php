<?php

  namespace PessCode;

  class Utils {
    public static function redirect($url) {
      echo '<script>location.href ="' . $url . '"</script>';
      die();
    }

		public static function validateLength($string, $length){
			return (strlen($string) < $length) ? true : false;
		}
  }
