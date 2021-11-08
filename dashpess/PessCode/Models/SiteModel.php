<?php

  namespace PessCode\Models;

  class SiteModel {
    public static function clearUsersOnline() {
      $date = date('Y-m-d H:i:s');
      \PessCode\Mysql::connect()->exec("DELETE FROM `tb_site.online` WHERE `last_time` < '$date' - INTERVAL 5 MINUTE");
    }

    public static function countUsersOnline() {
      self::clearUsersOnline();
      $sql = \PessCode\Mysql::connect()->prepare("SELECT * FROM `tb_site.online`");
      $sql->execute();
      return count($sql->fetchAll());
    }

    public static function countVisitsToday() {
      $sql = \PessCode\Mysql::connect()->prepare("SELECT * FROM `tb_site.visits` WHERE `day` = ?");
      $sql->execute([date('Y-m-d')]);
      return count($sql->fetchAll());
    }

    public static function countAllVisits() {
      $sql = \PessCode\Mysql::connect()->prepare("SELECT * FROM `tb_site.visits`");
      $sql->execute();
      return count($sql->fetchAll());
    }
  }
