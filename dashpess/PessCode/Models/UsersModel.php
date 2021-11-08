<?php

  namespace PessCode\Models;

  class UsersModel {
    public static function signInUser($login, $password, $cargo, $name, $image) {
      $sql = \PessCode\Mysql::connect()->prepare("INSERT INTO `users` VALUES (null, ?, ?, ?, ?, ?)");
      $sql->execute([$login, $password, $cargo, $name, $image]);
    }

    public function updateUser($name, $password, $image) {
      $sql = \PessCode\Mysql::connect()->prepare("UPDATE `users` SET `name` = ?, `password` = ?, `image` = ? WHERE `login` = ?");
      return ($sql->execute([$name, $password, $image, $_SESSION['login']]));
    }

    public function editUser($login, $password, $role, $name, $id) {
      $sql = \PessCode\Mysql::connect()->prepare("UPDATE `users` SET `login` = ?, `password` = ?, `role` = ?, `name` = ? WHERE `id` = ?");
      return ($sql->execute([$login, $password, $role, $name, $id]));
    }

    public static function fetchUser($login) {
      $sql = \PessCode\Mysql::connect()->prepare("SELECT * FROM `users` WHERE `login` = ?");
      $sql->execute([$login]);
      return $sql->fetch();
    }

    public static function loginExists($login) {
      $sql = \PessCode\Mysql::connect()->prepare("SELECT `id` FROM `users` WHERE `login` = ?");
      $sql->execute([$login]);
      return $sql->rowCount();
    }
  }
