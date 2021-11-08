<?php
  $infoSite = \PessCode\Mysql::connect()->prepare("SELECT * FROM `tb_site.general`");
  $infoSite->execute();
  $infoSite = $infoSite->fetch();
?>
<!DOCTYPE html>
<head>
  <?php include('components/headInfos.php'); ?>

  <title>Site | dash.pess</title>
</head>
<body>

  <section class="dashboard">
    <?php include('components/header.php'); ?>

    <div>

      <?php include('components/aside.php'); include('components/asideMobile.php'); ?>

      <form class="form" method="post">
        <h1 class="title">Site geral</h1>

        <div class="separator"></div>

        <div class="feedbackBox" data-feedbackBox></div>

        <div class="inputWrapper">
          <div>
            <label class="label" for="title">Título do site</label>
            <input class="input" name="title" id="title" type="text" value="<?= $infoSite['title'] ?>" required/>
          </div>
          <div class="lg">
            <label class="label" for="description">Descrição do site</label>
            <textarea class="input" data-textarea="autoGrow" name="description" id="description" required><?= $infoSite['description'] ?></textarea>
          </div>
          <div class="lg">
            <label class="label" for="slogan">Slogan</label>
            <textarea class="input" data-textarea="autoGrow" name="slogan" id="slogan" required><?= $infoSite['slogan'] ?></textarea>
          </div>
          <div>
            <label class="label" for="author">Autor</label>
            <input class="input" name="author" id="author" type="text" value="<?= $infoSite['author'] ?>" required/>
          </div>
        </div>

        <div class="buttonWrapper">
          <a class="button cancel" href="<?= INCLUDE_PATH_PANEL ?>">Cancelar</a>
          <input type="hidden" name="table_name" value="tb_site.general">
          <input class="button" type="submit" name="acao" value="Salvar"/>
        </div>
      </form>

    </div>
  </section>

<?php include('components/footerInfos.php'); ?>
