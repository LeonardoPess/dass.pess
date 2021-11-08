<?php

  namespace PessCode\Models;

  class DatabaseModel {
    public static function select($table, $query, $arr) {
      $sql = \PessCode\Mysql::connect()->prepare("SELECT * FROM `$table` WHERE $query");
      $sql->execute($arr);
      return $sql->fetch();
    }

    public static function selectAll($table, $start = null, $end = null, $desc = null) {
      ($desc) ? $order = 'ASC' : $order = 'DESC';
      if ($start == null && $end == null) {
        $sql = \PessCode\Mysql::connect()->prepare("SELECT * FROM `$table` ORDER BY id $order");
      }	else {
        $sql = \PessCode\Mysql::connect()->prepare("SELECT * FROM `$table` ORDER BY id $order LIMIT $start, $end");
      }
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function delete($table, $id) {
      $sql = \PessCode\Mysql::connect()->prepare("DELETE FROM `$table` WHERE id = ?");
      $sql->execute([$id]);
    }

    public static function update($arr,$single = false){
      $certo = true;
      $first = false;
      $tableName = $arr['table_name'];

      $query = "UPDATE `$tableName` SET ";
      foreach ($arr as $key => $value) {
        $name = $key;
        if($name == 'acao' || $name == 'table_name' || $name == 'id')
          continue;
        if($value == ''){
          $certo = false;
          break;
        }
        
        if($first == false){
          $first = true;
          $query.="$name=?";
        }
        else{
          $query.=",$name=?";
        }

        $props[] = $value;
      }

      if($certo == true){
        if($single == false){
          $props[] = $arr['id'];
          $sql = \PessCode\Mysql::connect()->prepare($query.' WHERE id=?');
          $sql->execute($props);
        }else{
          $sql = \PessCode\Mysql::connect()->prepare($query);
          $sql->execute($props);
        }
      }
      return $certo;
    }
  }
