<?php
  $id = (int)$_GET['id'];
  $userInfo = \PessCode\Models\DatabaseModel::select('users', 'id = ?', [$id]);
?>
<!DOCTYPE html>
<head>
  <?php include('components/headInfos.php'); ?>

  <title>Editar | dash.pess</title>
</head>
<body>

  <section class="dashboard">
    <?php include('components/header.php'); ?>

    <div>

      <?php include('components/aside.php'); include('components/asideMobile.php'); ?>

      <form class="form" method="post">
        <h1 class="title">Editar usuário</h1>

        <div class="separator"></div>

        <div class="feedbackBox" data-feedbackBox></div>

        <div class="inputWrapper">
          <div>
            <label class="label" for="login">Login</label>
            <Input minlength="5" class="input" name="login" id="login" type="text" value="<?= $userInfo['login'] ?>" required/>
          </div>
          <div>
            <label class="label" for="name">Nome</label>
            <Input minlength="2" class="input" name="name" id="name" type="text" value="<?= $userInfo['name'] ?>" required/>
          </div>

          <div>
            <label class="label" for="password">Senha</label>
            <div class="box-password noselect">
              <input minlength="5" class="input" type="password" name="password" id="password" value="<?= $userInfo['password'] ?>" data-password required>
              <div class="box-toggle-pass">
              <img class="show-pass" src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/eye-off-line.svg" alt="Mostrar senha">
                <img class="hide-pass" src="<?= INCLUDE_PATH_PANEL_VIEWS  ?>assets/icons/eye-line.svg" alt="Esconder senha">
              </div>
              </div>
          </div>

          <div <?= ($_SESSION['id'] == $id) ? 'style="display:none"' : '' ?>>
            <label class="label" for="role">Cargo</label>
            <select name="role" class="input" id="role" required>
            <?php
              foreach (\PessCode\Views\MainView::$roles as $key => $value) {
                $option = (\PessCode\Views\MainView::$roles[$userInfo['role']] == $value) ?
                '<option value="'.$key.'" selected>'.$value.'</option>' :
                '<option value="'.$key.'">'.$value.'</option>';
                echo $option;
              }
            ?>
            </select>
          </div>
        </div>

        <div class="buttonWrapper">
          <a class="button cancel" href="<?= INCLUDE_PATH_PANEL ?>users">Cancelar</a>
          <input type="hidden" name="current_image" value="<?= $userInfo['image'] ?>">
          <input class="button" type="submit" name="acao" value="Salvar"/>
        </div>
      </form>

    </div>
  </section>

<?php include('components/footerInfos.php'); ?>
