<?php
/********SWITCHER********/
?>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src='img/favorite_black_24dp.svg'>&nbsp;<b>ChiKa</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <!--  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src='img/summarize_white_24dp.svg'> Журналы
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="/?inc=operations_dates"><img src='img/assignment_black_24dp.svg'>  Производственные операции</a></li>
              <li><a class="dropdown-item" href="/?inc=helper_operations"><img src='img/view_list_black_24dp.svg'>  Заказы</a></li>
              <li><a class="dropdown-item" href="/?inc=helper_products"><img src='img/paid_black_24dp.svg'>  Кассовые операции</a></li>
              <li><a class="dropdown-item" href="/?inc=salary"><img src='img/paid_black_24dp.svg'>  Зарплата</a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/?inc=about">Some else</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src='img/book_white_24dp.svg'> Store
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="/?inc=workers"><img src='img/assignment_black_24dp.svg'>  Icoming operations</a></li>
              <li><a class="dropdown-item" href="/?inc=helper_operations"><img src='img/view_list_black_24dp.svg'>  Outgoing operations</a></li>
              <li><a class="dropdown-item" href="/?inc=helper_products"><img src='img/view_list_black_24dp.svg'>  Viewer</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/?inc=about">Some else</a></li>
            </ul>
          </li>-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src='img/assignment_white_24dp.svg'>&nbsp;  Производственные операции
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="/?inc=operations_dates">Все</a></li>
              <li><hr class="dropdown-divider"></li>
              <?php
              $worker = "SELECT * FROM `helper_workers` ORDER BY `name`";
              foreach ($pdo->query($worker) as $row) {
              echo '<li><a class="dropdown-item" href="/?inc=operations_dates&worker='.$row['id'].'">'.$row['name'].'</a></li>';
              }
              ?>
            </ul>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src='img/paid_white_24dp.svg'>&nbsp;  Зарплата
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="/?inc=salary">Все</a></li>
                <li><hr class="dropdown-divider"></li>
                <?php
                $worker = "SELECT * FROM `helper_workers` ORDER BY `name`";
                foreach ($pdo->query($worker) as $row) {
                echo '<li><a class="dropdown-item" href="/?inc=salary&worker='.$row['id'].'">'.$row['name'].'</a></li>';
                }
                ?>
              </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src='img/book_white_24dp.svg'> Справочники
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="/?inc=workers"><img src='img/account_circle_black_24dp.svg'>  Сотрудники</a></li>
              <li><a class="dropdown-item" href="/?inc=helper_operations"><img src='img/pending_actions_black_24dp.svg'>  Операции</a></li>
              <li><a class="dropdown-item" href="/?inc=helper_products"><img src='img/view_list_black_24dp.svg'>  Изделия</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/?inc=about">О программе</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/actions/auth.php?action=exit">Выход&nbsp;&nbsp;<img src='img/logout_white_24dp.svg'></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<section class="container">
<?php
/********SWITCHER********/
if(isset($_GET['inc'])){
  $inc=$_GET['inc'];
  switch ($inc) {
    case 'helper':
      include_once('helper.php');
      break;
    case 'helper_operations':
      include_once('helper_operations.php');
      break;
    case 'card_operation':
      include_once('card_operation.php');
      break;
    case 'operation_details':
      include_once('operation_details.php');
      break;
    case 'operations_dates':
      include_once('operations_dates.php');
      break;
    case 'workers':
      include_once('workers.php');
      break;
      case 'worker':
        include_once('./app/views/view_worker.php');
        break;
        case 'helper_products':
          include_once('./app/views/view_products.php');
        break;
    case 'store':
      include_once('store.php');
      break;
      case 'salary':
        include_once('salary.php');
        break;
    default:
      include_once('dashboard.php');
      break;
  }
}else{
  include_once('dashboard.php');
}
?>
</section>
