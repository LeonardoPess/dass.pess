<!DOCTYPE html>
<head>
  <?php include('components/headInfos.php'); ?>

  <title>dash.pess</title>
</head>
<body>

  <section class="dashboard">
    <?php include('components/header.php'); ?>

    <div>

      <?php include('components/aside.php'); include('components/asideMobile.php'); ?>

      <main class="home">
        <h1 class="title"><?= COMPANY_NAME ?></h1>
        <div>
          <div>
            <h2>Usuários onlines</h2>
            <p><?= \PessCode\Models\SiteModel::countUsersOnline(); ?></p>
          </div>

          <div>
            <h2>Visitas Hoje</h2>
            <p><?= \PessCode\Models\SiteModel::countVisitsToday(); ?></p>
          </div>

          <div>
            <h2>Total de visitas</h2>
            <p><?= \PessCode\Models\SiteModel::countAllVisits(); ?></p>
          </div>
        </div>
      </main>

    </div>
  </section>

<?php include('components/footerInfos.php'); ?>
