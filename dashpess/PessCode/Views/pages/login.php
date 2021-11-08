<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('components/headInfos.php'); ?>

  <title>Login | dash.pess</title>
</head>
<body>

  <section class="login">
    <div>
      <h1 class="logo">dash<span>.pess</span></h1>
      <form method="post">

        <label class="label" for="login">Login</label>
        <input class="input" name="login" id="login" type="text" required/>

        <div class="inputWrapper">
          <label class="label" for="password">Senha</label>
          <div class="box-password noselect">
            <input class="input" type="password" name="password" id="password" data-password required>
            <div class="box-toggle-pass">
            <img class="show-pass" src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/eye-off-line.svg" alt="Mostrar senha">
                <img class="hide-pass" src="<?= INCLUDE_PATH_PANEL_VIEWS  ?>assets/icons/eye-line.svg" alt="Esconder senha">
            </div>
            </div>
        </div>

        <input class="button" type="submit" name="acao" value="Entrar"/>

        <div class="checkboxWrapper">
          <label class="checkbox bounce">
            <input type="checkbox" id="checkbox" name="remember">
            <svg viewBox="0 0 21 21"><polyline points="5 10.75 8.5 14.25 16 6"></polyline></svg>
          </label>
          <label for="checkbox">Mantenha me conectado</label>
        </div>
      </form>
    </div>
  </section>

<?php include('components/footerInfos.php'); ?>
