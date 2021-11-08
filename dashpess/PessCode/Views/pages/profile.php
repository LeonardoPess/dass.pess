<!DOCTYPE html>
<head>
  <?php include('components/headInfos.php'); ?>

  <title>Perfil | dash.pess</title>
</head>
<body>

  <section class="dashboard">
    <?php include('components/header.php'); ?>

    <div>

      <?php include('components/aside.php'); include('components/asideMobile.php'); ?>

      <form class="form" method="post" enctype="multipart/form-data">
        <h1 class="title">Perfil</h1>

        <div class="separator"></div>

        <div class="feedbackBox" data-feedbackBox></div>

        <div class="inputWrapper">
          <div>
            <label class="label" for="name">Nome</label>
            <Input minlength="2" class="input" name="name" id="name" value="<?= $_SESSION['name']; ?>" required/>
          </div>

          <div>
            <label class="label" for="password">Senha</label>
            <div class="box-password noselect">
              <input minlength="5" class="input" type="password" name="password" id="password" data-password value="<?= $_SESSION['password']; ?>" required>
              <div class="box-toggle-pass">
                <img class="show-pass" src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/eye-off-line.svg" alt="Mostrar senha">
                <img class="hide-pass" src="<?= INCLUDE_PATH_PANEL_VIEWS  ?>assets/icons/eye-line.svg" alt="Esconder senha">
              </div>
              </div>
          </div>

          <div>
            <label class="label" for="image">Imagem</label>
            <Input name="image" type="file" id="image"/>
            <input type="hidden" name="current_image" value="<?= $_SESSION['img'] ?>">
          </div>
        </div>

        <div class="buttonWrapper">
          <a class="button cancel" href="<?= INCLUDE_PATH_PANEL ?>">Cancelar</a>
          <input class="button" type="submit" name="acao" value="Salvar"/>
        </div>
      </form>

    </div>
  </section>

<?php include('components/footerInfos.php'); ?>
