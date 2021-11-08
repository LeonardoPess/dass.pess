<?php
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 4;
    $users = \PessCode\Models\DatabaseModel::selectAll('users', ($currentPage - 1) * $perPage, $perPage);
    $totalUsersLength = count(\PessCode\Models\DatabaseModel::selectAll('users'));
?>
<!DOCTYPE html>
<head>
  <?php include('components/headInfos.php'); ?>
  <title>Usuários | dash.pess</title>
</head>
<body>

  <section class="dashboard">
    <?php include('components/header.php'); ?>

    <div>

    <?php include('components/aside.php'); include('components/asideMobile.php'); ?>

    <main class="users">
      <div>
        <h1 class="title">Usuários</h1>
        <a href="<?= INCLUDE_PATH_PANEL ?>create" class="button">
          <img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/add-line.svg" alt="Adicionar">
          Criar novo usuário
        </a>
      </div>

      <table>
        <thead>
          <tr>
            <th>USUÁRIO</th>
            <th>CARGO</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach ($users as $key => $value) {
        ?>
          <tr>
            <td>
              <div>
                <a href="<?= INCLUDE_PATH_PANEL ?>edit?id=<?= $value['id'] ?>" class="textLimited"><?= $value['name'] ?></a>
                <p class="textLimited"><?= $value['login'] ?></p>
              </div>
            </td>
            <td><?= \PessCode\Views\MainView::$roles[$value['role']] ?></td>
            <td>
                <a href="<?= INCLUDE_PATH_PANEL ?>edit?id=<?= $value['id'] ?>" class="button edit">
                  <img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/pencil-line.svg" alt="Editar">
                  Editar
                </a>
            </td>
            <td>
              <a data-actionbtn="delete" href="<?= INCLUDE_PATH_PANEL ?>users?delete=<?= $value['id'] ?>" class="button delete">
                <img src="<?= INCLUDE_PATH_PANEL_VIEWS ?>assets/icons/delete-bin-6-line.svg" alt="Editar">
                Excluir
              </a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>

    <div class="pagination">
      <div class="perPages">
        <p>
          Mostrando <strong><?= count($users); ?></strong> de 
          <strong><?= $totalUsersLength; ?></strong>
        </p>
      </div>
      <div class="pages">
        <?php
          $totalPages = ceil(count(\PessCode\Models\DatabaseModel::selectAll('users')) / $perPage);

          for ($i = 1; $i <= $totalPages; $i++) {
            $page = ($i == $currentPage) ? '<a href="' . INCLUDE_PATH_PANEL . 'users?page=' . $i . '" class="selected">' . $i . '</a>' : 
            '<a href="' . INCLUDE_PATH_PANEL . 'users?page=' . $i . '">' . $i . '</a>';
            echo $page;
          }
        ?>
      </div>
    </div>
  </section>

<?php include('components/footerInfos.php'); ?>
