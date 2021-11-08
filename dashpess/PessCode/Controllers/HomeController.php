<?php

  namespace PessCode\Controllers;

  class HomeController {
    public function index() {
      if(isset($_SESSION['login'])) {
        if(isset($_GET['logout'])){
          setcookie('remember', true, time() - 1, '/');
          session_destroy();
          header('location: ' . INCLUDE_PATH_PANEL);
        }

        \PessCode\Views\MainView::render('home');
      } else {
        if (isset($_COOKIE['remember'])) {
          $login = $_COOKIE['login'];
          $password = $_COOKIE['password'];
          $user = new \PessCode\Models\UsersModel();

          if ($user->loginExists($login)) {
            $data = $user->fetchUser($login);
            $_SESSION['id'] = $data['id'];
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['name'] = $data['name'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['img'] = $data['image'];
            \PessCode\Utils::redirect(INCLUDE_PATH_PANEL);
            die();
          }
        }

        if (isset($_POST['acao'])) {
          $login = $_POST['login'];
          $password = $_POST['password'];
          $user = new \PessCode\Models\UsersModel();

          if (!$user->loginExists($login)) {
            echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
            Esse usuário não existe!</div>';
          } else {
            $data = $user->fetchUser($login);
            $passwordDB = $data['password'];
            if ($password === $passwordDB) {
              $_SESSION['id'] = $data['id'];
              $_SESSION['login'] = $login;
              $_SESSION['password'] = $password;
              $_SESSION['role'] = $data['role'];
              $_SESSION['name'] = $data['name'];
              $_SESSION['img'] = $data['image'];
              if (isset($_POST['remember'])) {
                setcookie('remember', true, time() + (60 * 60 * 24 * 7), '/');
                setcookie('login', $login, time() + (60 * 60 * 24 * 7), '/');
                setcookie('password', $password, time() + (60 * 60 * 24 * 7), '/');
              }
              \PessCode\Utils::redirect(INCLUDE_PATH_PANEL);
              die();
            } else {
              echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
              Senha incorreta!</div>';
            }
          }
        }

        \PessCode\Views\MainView::render('login');
      }
    }
  }
