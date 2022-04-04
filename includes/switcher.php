<?php
/********SWITCHER********/
?>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Chirvabase</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Дашбоард</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Список человеков
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="/?inc=operations">Все</a></li>
              <li><hr class="dropdown-divider"></li>
              <?php
              $worker = "SELECT * FROM `helper_workers` ORDER BY `name`";
              foreach ($pdo->query($worker) as $row) {
              echo '<li><a class="dropdown-item" href="/?inc=operations&worker='.$row['id'].'">'.$row['name'].'</a></li>';
              }
              ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/actions/auth.php?action=exit">Выход</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<?php
/********SWITCHER********/
if(isset($_GET['inc'])){
  $inc=$_GET['inc'];
  switch ($inc) {
    case 'helper':
      include_once('helper.php');
      break;
      case 'operations':
        include_once('operations.php');
        break;
    default:
      include_once('dashboard.php');
      break;
  }
}else{
  include_once('dashboard.php');
}
?>
