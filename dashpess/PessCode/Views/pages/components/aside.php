<?php   $url = explode('/', @$_GET['url'])[0]; ?>
<aside class="aside">
  <div>
    <h1>GERAL</h1>
    <div>
      <a class="<?= \PessCode\Views\MainView::isMenuSelected('home');?> <?= (!$url) ? 'selected' : ''; ?>" href="<?= INCLUDE_PATH_PANEL ?>">
        <img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/dashboard-line.svg" alt="Dashboard">
        Dashboard
      </a>
      <a class="<?= \PessCode\Views\MainView::isMenuSelected('site') ?>" href="<?= INCLUDE_PATH_PANEL ?>site">
        <img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/window-line.svg" alt="Site">
        Site
      </a>
    </div>
  </div>

  <div <?= \PessCode\Views\MainView::isMenuAllowed(0); ?>>
    <h1>ADMINISTRAÇÃO</h1>
    <div>
      <a class="<?= \PessCode\Views\MainView::isMenuSelected('users'); ?><?= \PessCode\Views\MainView::isMenuSelected('create'); ?><?= \PessCode\Views\MainView::isMenuSelected('edit'); ?>"
        href="<?= INCLUDE_PATH_PANEL ?>users">
        <img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/contacts-line.svg" alt="Usuários">
          Usuários
      </a>
    </div>
  </div>

  <div>
    <h1>CONFIGURAÇÃO</h1>
    <div>
      <a class="<?= \PessCode\Views\MainView::isMenuSelected('profile') ?>" href="<?= INCLUDE_PATH_PANEL ?>profile">
        <img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/profile-line.svg" alt="Logout">
        Perfil
      </a>
      <a href="<?= INCLUDE_PATH_PANEL ?>?logout">
        <img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/logout-circle-line.svg" alt="Logout">
        Sair
      </a>
    </div>
  </div>
</aside>
