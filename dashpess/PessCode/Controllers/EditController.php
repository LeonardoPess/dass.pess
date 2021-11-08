<?php

  namespace PessCode\Controllers;

  class EditController {
    public function index() {
      if(isset($_SESSION['login'])) {
        if(!isset($_GET['id'])) {
          \PessCode\Utils::redirect(INCLUDE_PATH_PANEL);
          die();
        }

        if ($_SESSION['role'] > 0) {
          \PessCode\Views\MainView::render('forbidden');
          die();
        }

        if(isset($_POST['acao'])) {
          $login = $_POST['login'];
          $password = $_POST['password'];
          $role = $_POST['role'];
          $name = $_POST['name'];

          $id = (int)$_GET['id'];
          $userInfo = \PessCode\Models\DatabaseModel::select('users', 'id = ?', [$id]);
    
          if(\PessCode\Utils::validateLength($login, 5)) {
            echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
            O login precisa de no mínimo 5 caracteres!</div>';
          } else if(\PessCode\Utils::validateLength($name, 2)) {
            echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
            O nome precisa de no mínimo 3 caracteres!</div>';
          } else if(\PessCode\Utils::validateLength($password, 5)) {
            echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
            A senha precisa de no mínimo 5 caracteres!</div>';
          } else if(\PessCode\Utils::validateLength($role, 1)) {
            echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
            Você precisa selecionar um cargo!</div>';
          } else if($userInfo['login'] != $login && \PessCode\Models\UsersModel::loginExists($login)) {
            echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
            Esse login já está sendo usado por outra conta!</div>';
          } else {
            $user = new \PessCode\Models\UsersModel();
            if($_SESSION['id'] == $id) {
              $role = $_SESSION['role'];
            }
            if($user->editUser($login, $password, $role, $name, $id)) {
              echo '<div class="feedbackSuccess" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/chat-smile-3-line.svg" />
              Usuário&nbsp;<b>"' . $login . '"</b>&nbsp;editado com sucesso!</div>';
              $userInfo = \PessCode\Models\DatabaseModel::select('users', 'id = ?', [$id]);
              if($_SESSION['id'] == $id) {
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $name;
              }
            } else {
              echo '<div class="feedbackWarm data-response"> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
              Ocorreu um erro ao editar...</div>';
            }
          }
        }

        \PessCode\Views\MainView::render('edit');
      } else {
        \PessCode\Utils::redirect(INCLUDE_PATH_PANEL);
        die();
      }
    }
  }
