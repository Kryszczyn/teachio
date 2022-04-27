<?php
  session_start();
  $pageTitle = "Plan zajęć";
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
  <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/calendar.css">
  <link rel="stylesheet" href="./assets/css/theme.css">
  <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body class="g-sidenav-show  bg-gray-100">
  
  <?php include_once './sidebar.php'; ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include_once './navbar.php'; ?>

    <div class="container-fluid py-4">

      <div class="bg-white p-2 border-radius-xl shadow-blur mx-0" > <!--conteinajner-->
        <div class="row mx-0" > <!--dni tygodnia kolumna-->
          <div class="col-1"></div>
          <div class="col-2 py-2 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0  text-white">Poniedziałek</p>
          </div>
          <div class="col-2 py-2 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">Wtorek</p>
          </div>
          <div class="col-2 py-2 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">Środa</p>
          </div>
          <div class="col-2 py-2 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">Czwartek</p>
          </div>
          <div class="col-2 py-2 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">Piątek</p>
          </div>
          
        </div>
        <div class="row mx-0"> <!--715-800 kolumna-->
          <div class="col-1 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">7:15</p>
            <p class="fw-bold m-0 text-white">-</p>
            <p class="fw-bold m-0 text-white">8:00</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Angielski</p>
            <p class="fw-bold m-0">A. Sylańska</p>
            <p class="fw-bold m-0">S.108</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Geografia</p>
            <p class="fw-bold m-0">S. Mata</p>
            <p class="fw-bold m-0">S.110</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Polski</p>
            <p class="fw-bold m-0">F. Kowal</p>
            <p class="fw-bold m-0">S.216</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">W-F</p>
            <p class="fw-bold m-0">U. Szanka</p>
            <p class="fw-bold m-0">S.Gimnastyczna</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Niemiecki</p>
            <p class="fw-bold m-0">B. Stalin</p>
            <p class="fw-bold m-0">S.115</p>
          </div>
        </div>
        <div class="row mx-0"> <!--805-850 kolumna-->
          <div class="col-1 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">8:05</p>
            <p class="fw-bold m-0 text-white">-</p>
            <p class="fw-bold m-0 text-white">8:50</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Biologia</p>
            <p class="fw-bold m-0">W. Kara</p>
            <p class="fw-bold m-0">S.210</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Geografia</p>
            <p class="fw-bold m-0">S. Mata</p>
            <p class="fw-bold m-0">S.110</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Polski</p>
            <p class="fw-bold m-0">F. Kowal</p>
            <p class="fw-bold m-0">S.216</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">W-F</p>
            <p class="fw-bold m-0">U. Szanka</p>
            <p class="fw-bold m-0">S.Gimnastyczna</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Niemiecki</p>
            <p class="fw-bold m-0">B. Stalin</p>
            <p class="fw-bold m-0">S.115</p>
          </div>
        </div>
        <div class="row mx-0"> <!--855-940 kolumna-->
          <div class="col-1 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">8:55</p>
            <p class="fw-bold m-0 text-white">-</p>
            <p class="fw-bold m-0 text-white">9:40</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Matematyka</p>
            <p class="fw-bold m-0">M. Królik</p>
            <p class="fw-bold m-0">S.121</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Matematyka</p>
            <p class="fw-bold m-0">M. Królik</p>
            <p class="fw-bold m-0">S.121</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Matematyka</p>
            <p class="fw-bold m-0">M. Królik</p>
            <p class="fw-bold m-0">S.121</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Polski</p>
            <p class="fw-bold m-0">F. Kowal</p>
            <p class="fw-bold m-0">S.216</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Matematyka</p>
            <p class="fw-bold m-0">M. Królik</p>
            <p class="fw-bold m-0">S.121</p>
          </div>
        </div> 
        <div class="row mx-0"> <!--945-1030 kolumna-->
          <div class="col-1 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">9:45</p>
            <p class="fw-bold m-0 text-white">-</p>
            <p class="fw-bold m-0 text-white">10:30</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Polski</p>
            <p class="fw-bold m-0">F. Kowal</p>
            <p class="fw-bold m-0">S.216</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Matematyka</p>
            <p class="fw-bold m-0">M. Królik</p>
            <p class="fw-bold m-0">S.121</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Matematyka</p>
            <p class="fw-bold m-0">M. Królik</p>
            <p class="fw-bold m-0">S.121</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Geografia</p>
            <p class="fw-bold m-0">S. Mata</p>
            <p class="fw-bold m-0">S.110</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Angielski</p>
            <p class="fw-bold m-0">A. Sylańska</p>
            <p class="fw-bold m-0">S.108</p>
          </div>
        </div> 
        <div class="row mx-0"> <!--1035-1120 kolumna-->
          <div class="col-1 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">10:35</p>
            <p class="fw-bold m-0 text-white">-</p>
            <p class="fw-bold m-0 text-white">11:20</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Polski</p>
            <p class="fw-bold m-0">F. Kowal</p>
            <p class="fw-bold m-0">S.216</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Chemia</p>
            <p class="fw-bold m-0">A. Szycha</p>
            <p class="fw-bold m-0">S.105</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Niemiecki</p>
            <p class="fw-bold m-0">B. Stalin</p>
            <p class="fw-bold m-0">S.115</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Chemia</p>
            <p class="fw-bold m-0">A. Szycha</p>
            <p class="fw-bold m-0">S.105</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Angielski</p>
            <p class="fw-bold m-0">A. Sylańska</p>
            <p class="fw-bold m-0">S.108</p>
          </div>
        </div> 
        <div class="row mx-0"> <!--1130-1215 kolumna-->
          <div class="col-1 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">11:30</p>
            <p class="fw-bold m-0 text-white">-</p>
            <p class="fw-bold m-0 text-white">12:15</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Fizyka</p>
            <p class="fw-bold m-0">S. Dąb</p>
            <p class="fw-bold m-0">S.205</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Historia</p>
            <p class="fw-bold m-0">A. Himler</p>
            <p class="fw-bold m-0">S.201</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Niemiecki</p>
            <p class="fw-bold m-0">B. Stalin</p>
            <p class="fw-bold m-0">S.115</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Biologia</p>
            <p class="fw-bold m-0">W. Kara</p>
            <p class="fw-bold m-0">S.210</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Historia</p>
            <p class="fw-bold m-0">A. Himler</p>
            <p class="fw-bold m-0">S.201</p>
          </div>
        </div> 
        <div class="row mx-0"> <!--1230-1315 kolumna-->
          <div class="col-1 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">12:30</p>
            <p class="fw-bold m-0 text-white">-</p>
            <p class="fw-bold m-0 text-white">13:15</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Religia</p>
            <p class="fw-bold m-0">B. Szatan</p>
            <p class="fw-bold m-0">S.119</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">W-F</p>
            <p class="fw-bold m-0">U. Szanka</p>
            <p class="fw-bold m-0">S.Gimnastyczna</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">WOS</p>
            <p class="fw-bold m-0">B. Puting</p>
            <p class="fw-bold m-0">S.219</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Fizyka</p>
            <p class="fw-bold m-0">S. Dąb</p>
            <p class="fw-bold m-0">S.205</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Polski</p>
            <p class="fw-bold m-0">F. Kowal</p>
            <p class="fw-bold m-0">S.216</p>
          </div>
        </div> 
        <div class="row mx-0"> <!--1320-1405 kolumna-->
          <div class="col-1 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">13:20</p>
            <p class="fw-bold m-0 text-white">-</p>
            <p class="fw-bold m-0 text-white">14:05</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"></p>
            <p class="fw-bold m-0">-</p>
            <p class="fw-bold m-0"></p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">W-F</p>
            <p class="fw-bold m-0">U. Szanka</p>
            <p class="fw-bold m-0">S.Gimnastyczna</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Plastyka</p>
            <p class="fw-bold m-0">D. Awanka</p>
            <p class="fw-bold m-0">S.219</p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"></p>
            <p class="fw-bold m-0">-</p>
            <p class="fw-bold m-0"></p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">Język Polski</p>
            <p class="fw-bold m-0">F. Kowal</p>
            <p class="fw-bold m-0">S.216</p>
          </div>
        </div> 

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