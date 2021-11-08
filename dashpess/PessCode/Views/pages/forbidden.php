<!DOCTYPE html>
<head>
  <?php include('components/headInfos.php'); ?>

  <title>Adicionar | dash.pess</title>
</head>
<body>

  <section class="dashboard">
    <?php include('components/header.php'); ?>

    <div>

      <?php include('components/aside.php'); include('components/asideMobile.php'); ?>

      <main class="forbidden">
        <h1>Access Forbidden</h1>
        <img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/file-forbid-line.svg" alt="Forbidden">
      </main>

    </div>
  </section>

<?php include('components/footerInfos.php'); ?>
