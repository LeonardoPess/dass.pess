<?php

  namespace PessCode\Controllers;

  class SiteController {
    public function index() {
      if(isset($_SESSION['login'])) {
        if(isset($_POST['acao'])) {
          if(\PessCode\Models\DatabaseModel::update($_POST, true)) {
            echo '<div class="feedbackSuccess" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/chat-smile-3-line.svg" />
            Atualizado com sucesso!</div>';
          } else {
            echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
            Ocorreu um erro ao atualizar...</div>';
          }
        }

        \PessCode\Views\MainView::render('site');
      } else {
        \PessCode\Utils::redirect(INCLUDE_PATH_PANEL);
      }
    }
  }
