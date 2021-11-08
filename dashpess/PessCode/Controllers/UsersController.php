<?php

  namespace PessCode\Controllers;

  class UsersController {
    public function index() {
      if(isset($_SESSION['login'])) {
        if ($_SESSION['role'] > 0) {
          \PessCode\Views\MainView::render('forbidden');
          die();
        }

        if(isset($_GET['delete'])) {
          $deleteId = (int)$_GET['delete'];
          if($deleteId != $_SESSION['id']) {
            \PessCode\Models\DatabaseModel::delete('users', $deleteId);
            \PessCode\Utils::redirect(INCLUDE_PATH_PANEL . 'users');
          } else {
            echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
            Você não pode excluir o seu próprio usuário ;)</div>';
          }
        }

        \PessCode\Views\MainView::render('users');
      } else {
        \PessCode\Utils::redirect(INCLUDE_PATH_PANEL);
      }
    }
  }
