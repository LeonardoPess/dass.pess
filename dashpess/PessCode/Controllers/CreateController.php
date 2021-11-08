<?php

  namespace PessCode\Controllers;

  class CreateController {
    public function index() {
      if(isset($_SESSION['login'])) {
        if ($_SESSION['role'] > 0) {
          \PessCode\Views\MainView::render('forbidden');
          die();
        }

        if(isset($_POST['create'])) {
          $login = $_POST['login'];
          $name = $_POST['name'];
          $password = $_POST['password'];
          $cargo = $_POST['cargo'];
          $image = '';

          if(\PessCode\Utils::validateLength($login, 5)) {
            echo '<span data-response="O login precisa de no mínimo 5 caracteres!"></span>';
          } else if(\PessCode\Utils::validateLength($name, 2)) {
            echo '<span data-response="O nome precisa de no mínimo 3 caracteres!"></span>';
          } else if(\PessCode\Utils::validateLength($password, 5)) {
            echo '<span data-response="A senha precisa de no mínimo 5 caracteres!"></span>';
          } else if(\PessCode\Utils::validateLength($cargo, 1)) {
            echo '<span data-response="Você precisa selecionar um cargo!"></span>';
          } else if(\PessCode\Models\UsersModel::loginExists($login)) {
            echo '<span data-response="Esse login já está sendo usado por outra conta!"></span>';
          } else {
            $user = new \PessCode\Models\UsersModel();
            $user->signInUser($login, $password, $cargo, $name, $image);
            header('location: ' . INCLUDE_PATH_PANEL . 'users');
          }
        }

        \PessCode\Views\MainView::render('create');
      } else {
        \PessCode\Utils::redirect(INCLUDE_PATH_PANEL);
      }
    }
  }
