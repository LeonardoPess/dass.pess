<header class="header">
  <button class="button menu" data-menubtn="open"><img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/menu-2-line.svg" alt="Menu"></button>
  <a href="<?= INCLUDE_PATH_PANEL ?>" class="logo">dash<span>.pess</span></a>
  <div>
    <div>
      <a href="<?= COMPANY_SITE ?>" target="_blank"><img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/window-line.svg" alt="Site"></a>
    </div>
    <a href="<?= INCLUDE_PATH_PANEL ?>profile">
      <div>
        <p><?= $_SESSION['name'] ?></p>
        <span><?= \PessCode\Views\MainView::$roles[$_SESSION['role']] ?></span>
      </div>

      <div>
        <?php
          if($_SESSION['img']) {
            echo '<img alt="' . $_SESSION['name'] . '" src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/uploads/' . $_SESSION['img'] . '" />';
          } else {
            echo '<img src="' . INCLUDE_PATH_PANEL_VIEWS . 'assets/icons/user-line.svg" alt="Usuários"/>';
          }
        ?>
      </div>
    </a>
  </div>
</header>
