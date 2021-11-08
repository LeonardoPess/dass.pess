<?php

  namespace PessCode\Models;

  class FilesModel {
    public static function isImageValid($image) {
			["size" => $size, "type" => $type] = $image;
			$allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
			$sizeInMegabytes = intval($size / 1024);
			return in_array($type, $allowedTypes) && $sizeInMegabytes < 300;
		}

		public static function uploadFile($file) {
			$formatFile = explode('.', $file['name']);
			$imageName 	= uniqid().'.'.$formatFile[count($formatFile) - 1];
			return move_uploaded_file($file['tmp_name'], BASE_DIR_PANEL.'assets/uploads/'.$imageName) ? $imageName : false;
		}

		public static function deleteFile($file) {
			@unlink(BASE_DIR_PANEL . './assets/uploads/'.$file);
		}

  }
