<?php
  session_start();
  $pageTitle = "Tablica ogłoszeń";
  if(empty($_SESSION))
    {
      header('Location: ../login.php'); 
    }
  error_reporting(0);
  include './../private/functions.php';
  include './../private/class/DatabaseConnect.php';
  $typeUser = $_SESSION['type'];

  switch($typeUser){
    case "admin":
      include './../private/class/Admin.php';
      $user = new Admin();
      $userData = $user->load_admin('*', $_SESSION['user_id']);
      break;
    case "student":
      include './../private/class/Student.php';
      $user = new Student();
      $userData = $user->load_student('*', $_SESSION['user_id']);
      break;
    case "parent":
      include './../private/class/Parent.php';
      $user = new Parent2();
      $userData = $user->load_parent('*', $_SESSION['user_id']);
      break;
    case "teacher":
      include './../private/class/Teacher.php';
      $user = new Teacher();
      $userData = $user->load_teacher('*', $_SESSION['user_id']);
      break;
    default:
      return 0;
  }

  //r2($userData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>Teachio</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css" rel="stylesheet" />
  <script src="./../node_modules/@fortawesome/fontawesome-free/js/brands.js"></script>
  <script src="./../node_modules/@fortawesome/fontawesome-free/js/solid.js"></script>
  <script src="./../node_modules/@fortawesome/fontawesome-free/js/fontawesome.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
  
  <?php include_once './sidebar.php'; ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include_once './navbar.php'; ?>

      <div class="container-fluid py-4">
      <?php
        if($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'teacher')
        {
          echo '<div class="col-4">
                <button type="button" class="modal-open btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-type="DODAJ_OCENE" data-refresh="0" data-values="" data-bs-target="#modal">Dodaj ocenę</button>
              </div>';
        }
      ?>
      <div class="row" style="background-color: #F2F2F2;">
        <div class="col-12 border d-flex align-items-center justify-content-around m-0 py-4" style="border-radius: 10px;">
          <img src="./assets/img/school_bus.svg"> 
          <p class="h4">Poznaj co mamy ciekawego do ogłoszenia!</p>
          <img src="./assets/img/svg_ogloszenia/class.svg"> 
        </div>
      </div>
      
      <?php
        $tempArr = array(
          'Elżbieta Kraśnik' => 'Wycieczka do Krakowa',
          'Marzena Janik' => 'Zajęcia dodatkowe z matematyki',
          'Grzegorz Golas' => 'Akademia - 11 listopada',
          'Monika Nowak' => 'Zebranie rodziców',
          'Monika Nowak' => 'Rozpoczęcie roku 2021/2022'
        );

      ?>
      <div class="row mt-2">
        <div class="col-12">
          <div class="d-flex flex-column">
            <div class="row" style="background-color: #F2F2F2;">
              <div class="col-12 border d-flex justify-content-center align-items-center m-0 py-3" style="border-radius: 5px 5px 0px 0px;"></div>
            </div>
            <?php foreach($tempArr as $k => $v): ?>
              <div class="row bg-white">
                <div class="col-1 border d-flex justify-content-center align-items-center m-0 py-1">
                    <input type="checkbox">
                </div>

                <div class="col-4 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold"><?php echo $k; ?></p>
                </div>

                <div class="col-6 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold"><?php echo $v; ?></p>
                </div>

                <div class="col-1 border d-flex justify-content-center align-items-center m-0 py-1">
                    <i class="fa-solid fa-trash cursor-pointer text-danger"></i>
                </div>
              </div> 
            <?php endforeach; ?>
          </div>
          </div>
        </div>
      
        <div class="row mt-4">
          <div class="col-4 border d-flex justify-content-center align-items-center m-0 py-1" style="background-color: #F2F2F2; border-radius: 10px;"> 
            <p class="font-weight-bold h3">2021</p>
          </div>
          <div class="col-4 border d-flex justify-content-center align-items-center m-0 py-1" style="background-color: #F2F2F2; border-radius: 10px;">
            <img src="./assets/img/svg_ogloszenia/bell.svg"> 
          </div>
          <div class="col-4 border d-flex justify-content-center align-items-center m-0 py-1" style="background-color: #F2F2F2; border-radius: 10px;"> 
            <p class="font-weight-bold h3">2022</p>
          </div>
        </div>

  </main>

  <script src="./../node_modules/jquery/dist/jquery.min.js"></script>
  
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="./assets/js/soft-ui-dashboard.js"></script>
  <script src="./assets/js/moment.min.js"></script>
  <script type="module" src="./assets/js/main.js"></script>
</body>

</html>