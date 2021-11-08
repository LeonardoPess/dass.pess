<?php

  namespace PessCode\Controllers;

  class ProfileController {
    public function index() {
      if(isset($_SESSION['login'])) {
        if(isset($_POST['acao'])) {
          $user = new \PessCode\Models\UsersModel();
          $name = $_POST['name'];
          $password = $_POST['password'];
          $image = $_FILES['image'];
          $currentImage = $_POST['current_image'];
    
          if($image['name'] != '') {
            if(\PessCode\Models\FilesModel::isImageValid($image)) {
              \PessCode\Models\FilesModel::deleteFile($currentImage);
              $image = \PessCode\Models\FilesModel::uploadFile($image);
              
              if(\PessCode\Utils::validateLength($name, 3)) {
                echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
                O nome precisa de no mínimo 3 caracteres!</div>';
              } else if(\PessCode\Utils::validateLength($password, 5)) {
                echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
                A senha precisa de no mínimo 5 caracteres!</div>';
              } else if($user->updateUser($name, $password, $image)) {
                $_SESSION['name'] = $name;
                $_SESSION['password'] = $password;
                $_SESSION['img'] = $image;
                echo '<div class="feedbackSuccess" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/chat-smile-3-line.svg" />
                Atualizado com sucesso!</div>';
              } else {
                echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
                Ocorreu um erro ao atualizar...</div>';
              };
            } else {
              echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
              Formato de imagem inválido!</div>';
            }
          } else {
            $image = $currentImage;
            if(\PessCode\Utils::validateLength($name, 2)) {
              echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
              O nome precisa de no mínimo 3 caracteres!</div>';
            } else if(\PessCode\Utils::validateLength($password, 5)) {
              echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
              A senha precisa de no mínimo 5 caracteres!</div>';
            } else if($user->updateUser($name, $password, $image)) {
              $_SESSION['name'] = $name;
              $_SESSION['password'] = $password;
              $_SESSION['img'] = $image;
              echo '<div class="feedbackSuccess" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/chat-smile-3-line.svg" />
              Atualizado com sucesso!</div>';
            } else {
              echo '<div class="feedbackWarm" data-response> <img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/alert-line.svg" />
              Ocorreu um erro ao atualizar...</div>';
            };
          }
        }
        

        \PessCode\Views\MainView::render('profile');
      } else {
        \PessCode\Utils::redirect(INCLUDE_PATH_PANEL);
      }
    }
  }
